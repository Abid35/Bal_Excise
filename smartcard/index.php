<?php
// Simple router
$page = isset($_GET['page']) ? $_GET['page'] : 'login';
$allowed_pages = ['login', 'dashboard', 'settings', 'new_requests', 'printing_queue', 'single_print', 'printing_logs'];

if (!in_array($page, $allowed_pages)) {
	header('HTTP/1.0 404 Not Found');
	echo 'Page not found';
	exit;
}

include __DIR__ . '/pages/' . $page . '.php';
?>
