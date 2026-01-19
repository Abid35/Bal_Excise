<?php
// ... existing code ...
session_start();
if (!isset($_SESSION['user'])) {
	header('Location: /?page=login');
	exit;
}
// Only admins may access SinglePrint
// if (!isset($_SESSION['user']['role']) || strtolower($_SESSION['user']['role']) !== 'admin') {
// 	header('Location: ?page=dashboard');
// 	exit;
// }
$user = $_SESSION['user'];
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Single Record</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-" crossorigin="anonymous">
	<link rel="stylesheet" href="src/css/common.css">
	<link rel="stylesheet" href="src/css/sidebar.css">
	<link rel="stylesheet" href="src/css/single_print.css">
</head>
<body>
	<?php include __DIR__ . '/../layout/sidebar.php'; ?>

	<main style="margin-left:240px;padding:28px" data-eto-id="<?php echo isset($user['eto_id']) ? htmlspecialchars($user['eto_id']) : ''; ?>">
		<h2>Single Record</h2>
		<div class="card mb-3">
			<div class="card-body">
				<form id="spSearchForm" class="row g-2 align-items-end">
					<div class="col-md-4"><label class="form-label">Registration</label><input name="RegNo" class="form-control" placeholder="e.g. MAQ8192"></div>
					<div class="col-md-3"><label class="form-label">District ID</label><input name="DistrictID" type="number" class="form-control"></div>
					<div class="col-md-2"><button class="btn btn-primary" id="spSearchBtn">Search</button></div>
				</form>
				<div id="spMessage" class="alert d-none mt-3" role="alert"></div>
			</div>
		</div>

		<div id="spResult" class="card d-none">
			<div class="card-body">
				<h5 id="spReg" class="mb-2"></h5>
				<div class="row">
					<div class="col-md-6">
						<ul id="spDetails" class="list-group list-group-flush"></ul>
					</div>
					<div class="col-md-6">
						<div class="mb-3"><label>ETO ID</label><input name="sp_eto" id="spEto" type="number" class="form-control"></div>
						<div class="mb-3"><label>Remarks</label><textarea id="spRemarks" class="form-control" rows="3"></textarea></div>
						<div class="d-flex gap-2"><button id="spAddBtn" class="btn btn-success">Add to Print</button><button id="spClearBtn" class="btn btn-secondary">Clear</button></div>
					</div>
					<?php if (isset($_SESSION['user']['role']) && strtolower($_SESSION['user']['role']) === 'admin'): ?>
					
					<?php endif; ?>
				</div>
			</div>
		</div>

	</main>

	<script src="src/js/single_print.js"></script>
	<?php include __DIR__ . '/../layout/close.php'; ?>
</body>
</html>
