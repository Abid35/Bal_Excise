<?php
session_start();
require_once __DIR__ . '/db.php';
if (!isset($_SESSION['user'])) {
	http_response_code(403);
	echo 'forbidden';
	exit;
}
$pdo = get_db();
$userId = $_SESSION['user']['id'];

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
	http_response_code(405);
	echo 'Method Not Allowed';
	exit;
}

// Change password
if (isset($_POST['new_password']) && $_POST['new_password'] !== '') {
	$stmt = $pdo->prepare('UPDATE users SET password = :pw WHERE id = :id');
	$stmt->execute(['pw' => $_POST['new_password'], 'id' => $userId]);
}

// eto_id
if (isset($_POST['eto_id'])) {
	$stmt = $pdo->prepare('UPDATE users SET eto_id = :eto WHERE id = :id');
	$stmt->execute(['eto' => $_POST['eto_id'], 'id' => $userId]);
}

// signature base64
if (isset($_POST['signature_base64']) && $_POST['signature_base64'] !== '') {
	$stmt = $pdo->prepare('UPDATE users SET signature = :sig WHERE id = :id');
	$stmt->execute(['sig' => $_POST['signature_base64'], 'id' => $userId]);
}

echo 'ok';
