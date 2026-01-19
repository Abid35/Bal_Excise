<?php

session_start();
require_once __DIR__ . '/db.php';

if (!isset($_SESSION['user']) || strtolower($_SESSION['user']['role']) !== 'admin') {
	http_response_code(403);
	echo 'forbidden';
	exit;
}

// Accept POST or GET
$id = 0;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
} else {
	$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
}

if ($id <= 0) {
	http_response_code(400);
	echo 'invalid id';
	exit;
}

$pdo = get_db();
try {
	$stmt = $pdo->prepare('DELETE FROM users WHERE id = :id');
	$stmt->execute(['id'=>$id]);
	echo 'ok';
} catch (PDOException $e) {
	http_response_code(500);
	echo 'db_error';
}
