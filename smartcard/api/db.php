<?php

function get_db() {
	$host = '127.0.0.1';
	$db   = 'etanb_smartcard';
	$user = 'etanb_deo';
	$pass = 'k0_H2Kx3ZuZ4';
	$charset = 'utf8mb4';

	$dsn = "mysql:host=$host;port=3306;dbname=$db;charset=$charset";
	$options = [
		PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		PDO::ATTR_EMULATE_PREPARES   => false,
	];
	try {
		$pdo = new PDO($dsn, $user, $pass, $options);
		return $pdo;
	} catch (PDOException $e) {
		http_response_code(500);
		echo 'Database connection failed.';
		exit;
	}
}