<?php
// ... existing code ...
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
	<title>Printing Logs</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-" crossorigin="anonymous">
	<link rel="stylesheet" href="src/css/common.css">
	<link rel="stylesheet" href="src/css/sidebar.css">
	<link rel="stylesheet" href="src/css/printing_logs.css">
</head>
<body>
	<?php include __DIR__ . '/../layout/sidebar.php'; ?>

	<main style="margin-left:240px;padding:28px">
		<h2>Printing Logs</h2>
		<div class="card mb-3">
			<div class="card-body">
				<form id="plSearchForm" class="row g-2 align-items-end">
					<div class="col-md-4"><label class="form-label">Registration No.</label><input name="reg_no" class="form-control" placeholder="e.g. BSD592"></div>
					<div class="col-md-2"><button class="btn btn-primary">Search</button></div>
				</form>
			</div>
		</div>

		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped" id="plTable">
						<thead><tr><th>ID</th><th>Serial No</th><th>Reg No</th><th>District</th><th>ETO</th><th>Date</th><th>Remarks</th><th>PSID</th></tr></thead>
						<tbody></tbody>
					</table>
				</div>

				<nav aria-label="Page navigation example">
					<ul class="pagination" id="plPagination"></ul>
				</nav>
			</div>
		</div>
	</main>

	<script src="src/js/printing_logs.js"></script>
	<?php include __DIR__ . '/../layout/close.php'; ?>
</body>
</html>
