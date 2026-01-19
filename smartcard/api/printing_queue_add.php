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
$status = isset($_POST['status']) ? trim($_POST['status']) : 'Pending';
$remarks = isset($_POST['remarks']) ? trim($_POST['remarks']) : '';

if ($reg === '') {
	http_response_code(400);
	echo 'missing reg_no';
	exit;
}

// validate eto and remarks
if ($eto <= 0) {
	http_response_code(400);
	echo 'eto_id_required';
	exit;
}
if (mb_strlen($remarks) < 12) {
	http_response_code(400);
	echo 'remarks_too_short';
	exit;
}

$pdo = get_db();
try {
	$priority = isset($_POST['priority']) ? intval($_POST['priority']) : 0;
	// try inserting including priority column if present
	$stmt = $pdo->prepare('INSERT INTO printing_que (reg_no, district_id, eto_id, Datetime, status, remarks, priority) VALUES (:reg, :district, :eto, NOW(), :status, :remarks, :priority)');
	$stmt->execute(['reg'=>$reg,'district'=>$district,'eto'=>$eto,'status'=>$status,'remarks'=>$remarks,'priority'=>$priority]);
	echo 'ok';
} catch (PDOException $e) {
	$msg = $e->getMessage();
	// if priority column doesn't exist, fall back to insert without priority
	if (stripos($msg, 'unknown column') !== false || stripos($msg, 'sqlstate[42s22]') !== false) {
		try {
			$stmt = $pdo->prepare('INSERT INTO printing_que (reg_no, district_id, eto_id, Datetime, status, remarks) VALUES (:reg, :district, :eto, NOW(), :status, :remarks)');
			$stmt->execute(['reg'=>$reg,'district'=>$district,'eto'=>$eto,'status'=>$status,'remarks'=>$remarks]);
			echo 'ok';
			exit;
		} catch (PDOException $e2) {
			http_response_code(500);
			echo 'db_error';
			exit;
		}
	}
	http_response_code(500);
	echo 'db_error';
}
