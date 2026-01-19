<?php
session_start();
require_once __DIR__ . '/db.php';

if (!isset($_SESSION['user']) || strtolower($_SESSION['user']['role']) !== 'admin') {
	http_response_code(403);
	echo json_encode(['error' => 'forbidden']);
	exit;
}

$pdo = get_db();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
	if (isset($_GET['id'])) {
		$stmt = $pdo->prepare('SELECT id, username, district_id, eto_id, role, signature FROM users WHERE id = :id');
		$stmt->execute(['id' => $_GET['id']]);
		$user = $stmt->fetch();
		echo json_encode($user);
		exit;
	} else {
		$stmt = $pdo->query('SELECT id, username, district_id, eto_id, role, signature FROM users ORDER BY id DESC');
		$users = $stmt->fetchAll();
		echo json_encode($users);
		exit;
	}
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$id = isset($_POST['id']) && $_POST['id'] !== '' ? intval($_POST['id']) : null;
	$username = isset($_POST['username']) ? trim($_POST['username']) : '';
	$password = isset($_POST['password']) ? $_POST['password'] : '';
	$role = isset($_POST['role']) ? $_POST['role'] : '';
	$district_id = isset($_POST['district_id']) ? intval($_POST['district_id']) : 0;
	$eto_id = isset($_POST['eto_id']) ? intval($_POST['eto_id']) : 0;
	$signature = isset($_POST['signature_base64']) && $_POST['signature_base64'] !== '' ? $_POST['signature_base64'] : null;

	if ($id) {
		// update
		try {
			if ($password !== '') {
				if ($signature !== null) {
					$stmt = $pdo->prepare('UPDATE users SET username = :username, password = :password, district_id = :district_id, eto_id = :eto_id, role = :role, signature = :signature WHERE id = :id');
					$stmt->execute(['username'=>$username,'password'=>$password,'district_id'=>$district_id,'eto_id'=>$eto_id,'role'=>$role,'signature'=>$signature,'id'=>$id]);
				} else {
					$stmt = $pdo->prepare('UPDATE users SET username = :username, password = :password, district_id = :district_id, eto_id = :eto_id, role = :role WHERE id = :id');
					$stmt->execute(['username'=>$username,'password'=>$password,'district_id'=>$district_id,'eto_id'=>$eto_id,'role'=>$role,'id'=>$id]);
				}
			} else {
				if ($signature !== null) {
					$stmt = $pdo->prepare('UPDATE users SET username = :username, district_id = :district_id, eto_id = :eto_id, role = :role, signature = :signature WHERE id = :id');
					$stmt->execute(['username'=>$username,'district_id'=>$district_id,'eto_id'=>$eto_id,'role'=>$role,'signature'=>$signature,'id'=>$id]);
				} else {
					$stmt = $pdo->prepare('UPDATE users SET username = :username, district_id = :district_id, eto_id = :eto_id, role = :role WHERE id = :id');
					$stmt->execute(['username'=>$username,'district_id'=>$district_id,'eto_id'=>$eto_id,'role'=>$role,'id'=>$id]);
				}
			}
			echo 'ok';
			exit;
		} catch (PDOException $e) {
			http_response_code(500);
			echo 'db_error: ' . $e->getMessage();
			exit;
		}
	} else {
		// create
		try {
			$stmt = $pdo->prepare('INSERT INTO users (username,password,district_id,eto_id,role,signature) VALUES (:username,:password,:district_id,:eto_id,:role,:signature)');
			$stmt->execute(['username'=>$username,'password'=>$password,'district_id'=>$district_id,'eto_id'=>$eto_id,'role'=>$role,'signature'=>$signature]);
			echo 'ok';
			exit;
		} catch (PDOException $e) {
			http_response_code(500);
			echo 'db_error: ' . $e->getMessage();
			exit;
		}
	}
}

http_response_code(405);
echo 'Method Not Allowed';
