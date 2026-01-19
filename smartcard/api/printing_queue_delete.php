<?php
session_start();
require_once __DIR__ . '/db.php';
if (!isset($_SESSION['user'])) {
	http_response_code(403);
	echo 'forbidden';
	exit;
}
// Only admins may delete
if (!isset($_SESSION['user']['role']) || strtolower($_SESSION['user']['role']) !== 'admin') {
    http_response_code(403);
    echo 'forbidden';
    exit;
}
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
	http_response_code(405);
	echo 'Method Not Allowed';
	exit;
}
$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
if ($id <= 0) {
	http_response_code(400);
	echo 'invalid id';
	exit;
}
$pdo = get_db();
try {
	$stmt = $pdo->prepare('DELETE FROM printing_que WHERE id = :id');
	$stmt->execute(['id'=>$id]);
	echo 'ok';
} catch (PDOException $e) {
	http_response_code(500);
	echo 'db_error';
}
