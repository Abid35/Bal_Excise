<?php
session_start();
if (!isset($_SESSION['user'])) {
	header('Location: /?page=login');
	exit;
}
$user = $_SESSION['user'];
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Dashboard</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-" crossorigin="anonymous">
	<link rel="stylesheet" href="src/css/common.css">
	<link rel="stylesheet" href="src/css/sidebar.css">
	<link rel="stylesheet" href="src/css/dashboard.css">
</head>
<body>
	<?php include __DIR__ . '/../layout/sidebar.php'; ?>

	<main style="margin-left:240px;padding:28px">
		<h2>Dashboard</h2>
		<p>Welcome to your dashboard. Role: <?php echo htmlspecialchars($user['role']); ?></p>
		<div class="row g-3 mt-2">
			<div class="col-md-4">
				<div class="card"><div class="card-body"><div class="text-muted">Total Printed</div><div class="h4" id="dsPrinted">-</div></div></div>
			</div>
			<div class="col-md-4">
				<div class="card"><div class="card-body"><div class="text-muted">Pending for Printing</div><div class="h4" id="dsPending">-</div></div></div>
			</div>
			<div class="col-md-4">
				<div class="card"><div class="card-body"><div class="text-muted">In Printing</div><div class="h4" id="dsInPrinting">-</div></div></div>
			</div>
		</div>
	</main>

	<script src="src/js/dashboard.js"></script>
	<?php include __DIR__ . '/../layout/close.php'; ?>
</body>
</html>
