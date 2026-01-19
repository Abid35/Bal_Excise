<?php

session_start();
require_once __DIR__ . '/db.php';

if (!isset($_SESSION['user'])) {
	http_response_code(403);
	echo json_encode(['error'=>'forbidden']);
	exit;
}

$user = $_SESSION['user'];
$isAdmin = isset($user['role']) && strtolower($user['role']) === 'admin';
$pdo = get_db();

try {
	if ($isAdmin) {
		$printed = (int)$pdo->query("SELECT COUNT(*) FROM printing_logs")->fetchColumn();
		$pending = (int)$pdo->query("SELECT COUNT(*) FROM printing_que WHERE status = 'Pending'")->fetchColumn();
		$inPrinting = (int)$pdo->query("SELECT COUNT(*) FROM printing_que WHERE status = 'In Printing'")->fetchColumn();
	} else {
		$eto = (int)$user['eto_id'];
		$district = (int)$user['district_id'];
		$stmt = $pdo->prepare("SELECT COUNT(*) FROM printing_logs WHERE eto_id = :eto AND district_id = :district");
		$stmt->execute(['eto'=>$eto,'district'=>$district]);
		$printed = (int)$stmt->fetchColumn();
		$stmt = $pdo->prepare("SELECT COUNT(*) FROM printing_que WHERE status = 'Pending' AND eto_id = :eto AND district_id = :district");
		$stmt->execute(['eto'=>$eto,'district'=>$district]);
		$pending = (int)$stmt->fetchColumn();
		$stmt = $pdo->prepare("SELECT COUNT(*) FROM printing_que WHERE status = 'In Printing' AND eto_id = :eto AND district_id = :district");
		$stmt->execute(['eto'=>$eto,'district'=>$district]);
		$inPrinting = (int)$stmt->fetchColumn();
	}

	header('Content-Type: application/json');
	echo json_encode([
		'printed' => $printed,
		'pending' => $pending,
		'in_printing' => $inPrinting
	]);
} catch (PDOException $e) {
	http_response_code(500);
	echo json_encode(['error'=>'db_error']);
}
