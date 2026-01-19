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
	<title>Printing Queue</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-" crossorigin="anonymous">
	<link rel="stylesheet" href="src/css/common.css">
	<link rel="stylesheet" href="src/css/sidebar.css">
	<link rel="stylesheet" href="src/css/printing_queue.css">
</head>
<body>
	<?php include __DIR__ . '/../layout/sidebar.php'; ?>

	<main style="margin-left:240px;padding:28px" data-is-admin="<?php echo (isset($user['role']) && strtolower($user['role']) === 'admin') ? '1' : '0'; ?>">
		<h2>Printing Queue</h2>
		<div class="card mb-3">
			<div class="card-body">
				<form id="pqSearchForm" class="row g-2 align-items-end">
					<div class="col-md-4"><label class="form-label">Registration No.</label><input name="reg_no" class="form-control" placeholder="e.g. BSD592"></div>
					<div class="col-md-2"><button class="btn btn-primary" id="pqSearchBtn">Search</button></div>
				</form>
			</div>
		</div>
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped" id="pqTable">
						<thead><tr><th>ID</th><th>Reg No</th><th>District</th><th>ETO</th><th>Date</th><th>Status</th><th>Actions</th></tr></thead>
						<tbody></tbody>
					</table>
				</div>

				<nav aria-label="Page navigation example">
					<ul class="pagination" id="pqPagination"></ul>
				</nav>
			</div>
		</div>

		<!-- Delete confirm modal -->
		<div class="modal fade" id="pqDeleteModal" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header"><h5 class="modal-title">Confirm Delete</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
					<div class="modal-body">Are you sure you want to delete this record?</div>
					<div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button><button type="button" id="pqDeleteConfirm" class="btn btn-danger">Delete</button></div>
				</div>
			</div>
		</div>
	</main>

	<script src="src/js/printing_queue.js"></script>
	<?php include __DIR__ . '/../layout/close.php'; ?>
</body>
</html>
