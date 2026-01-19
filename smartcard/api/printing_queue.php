<?php
session_start();
require_once __DIR__ . '/db.php';

if (!isset($_SESSION['user'])) {
	http_response_code(403);
	echo 'forbidden';
	exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
	http_response_code(405);
	echo 'Method Not Allowed';
	exit;
}

$reg = isset($_POST['reg_no']) ? trim($_POST['reg_no']) : '';
$district = isset($_POST['district_id']) ? intval($_POST['district_id']) : 0;
$eto = isset($_POST['eto_id']) ? intval($_POST['eto_id']) : 0;
$psid = isset($_POST['psid']) ? trim($_POST['psid']) : '';
$remarks = isset($_POST['remarks']) ? trim($_POST['remarks']) : '';
$status = 'Pending';

if ($reg === '') {
	http_response_code(400);
	echo 'missing reg_no';
	exit;
}

if ($psid === '') {
	http_response_code(400);
	echo 'missing psid';
	exit;
}

$pdo = get_db();
try {
    // try insert including psid column if it exists
    $stmt = $pdo->prepare('INSERT INTO printing_que (reg_no, district_id, eto_id, psid, remarks, Datetime, status) VALUES (:reg, :district, :eto, :psid, :remarks, NOW(), :status)');
    $stmt->execute(['reg'=>$reg,'district'=>$district,'eto'=>$eto,'psid'=>$psid,'remarks'=>$remarks,'status'=>$status]);
} catch (PDOException $e) {
    $msg = $e->getMessage();
    // If the psid column doesn't exist, fall back to insert without psid
    if (stripos($msg, 'unknown column') !== false || stripos($msg, 'sqlstate[42s22]') !== false) {
        try {
            $stmt = $pdo->prepare('INSERT INTO printing_que (reg_no, district_id, eto_id, remarks, Datetime, status) VALUES (:reg, :district, :eto, :remarks, NOW(), :status)');
            $stmt->execute(['reg'=>$reg,'district'=>$district,'eto'=>$eto,'remarks'=>$remarks,'status'=>$status]);
        } catch (PDOException $e2) {
            http_response_code(500);
            echo 'db_error: ' . $e2->getMessage();
            exit;
        }
    } else {
        http_response_code(500);
        echo 'db_error: ' . $msg;
        exit;
    }
}

// call our local proxy to update SmartCardStatus
	$scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
	$host = $_SERVER['HTTP_HOST'] ?? 'localhost';
	$scriptDir = rtrim(dirname($_SERVER['SCRIPT_NAME']), '\/');
	$localUrl = $scheme . '://' . $host . $scriptDir . '/smartcard_update.php';

	$postParams = ['registration_no' => $reg, 'district_id' => $district];
	if ($psid !== '') $postParams['psid'] = $psid;
	$postFields = http_build_query($postParams);
	$ch = curl_init($localUrl);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
	curl_setopt($ch, CURLOPT_HTTPHEADER, [
		'Content-Type: application/x-www-form-urlencoded',
		'Expect:',
		'Host: ' . $host
	]);
	curl_setopt($ch, CURLOPT_TIMEOUT, 15);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

	$response = curl_exec($ch);
	$err = curl_error($ch);
	$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	curl_close($ch);

	if ($response === false) {
		http_response_code(502);
		echo 'upstream_error';
		exit;
	}

	echo 'ok';
