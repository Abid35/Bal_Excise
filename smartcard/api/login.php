<?php
session_start();
require_once __DIR__ . '/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
	http_response_code(405);
	echo 'Method Not Allowed';
	exit;
}

$username = isset($_POST['username']) ? trim($_POST['username']) : '';
$password = isset($_POST['password']) ? trim($_POST['password']) : '';

if ($username === '' || $password === '') {
	$_SESSION['login_error'] = 'Please provide username and password.';
	header('Location: ../?page=login');
	exit;
}

$pdo = get_db();
$stmt = $pdo->prepare('SELECT id, username, password, district_id, eto_id, signature, role FROM users WHERE username = :username LIMIT 1');
$stmt->execute(['username' => $username]);
$user = $stmt->fetch();

if ($user && $password === $user['password']) {
	// Successful login
	$_SESSION['user'] = [
		'id' => $user['id'],
		'username' => $user['username'],
		'district_id' => $user['district_id'],
		'eto_id' => $user['eto_id'],
		'role' => $user['role'],
		'signature' => $user['signature'],
	];
	header('Location: ../?page=dashboard');
	exit;
} else {
	$_SESSION['login_error'] = 'Invalid username or password.';
	header('Location: ../?page=login');
	exit;
}
