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
	<title>New Requests</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-" crossorigin="anonymous">
	<link rel="stylesheet" href="src/css/common.css">
	<link rel="stylesheet" href="src/css/sidebar.css">
	<link rel="stylesheet" href="src/css/new_requests.css">
</head>
<body>
	<?php include __DIR__ . '/../layout/sidebar.php'; ?>

	<main style="margin-left:240px;padding:28px" data-eto-id="<?php echo isset($user['eto_id']) ? htmlspecialchars($user['eto_id']) : ''; ?>" data-district-id="<?php echo isset($user['district_id']) ? htmlspecialchars($user['district_id']) : ''; ?>">
		<h2>New Requests</h2>
		<div class="card mb-3">
			<div class="card-body">
				
			</div>
		</div>

		<div class="card">
			<div class="card-body">
				<div id="nrLoader" class="nr-loader d-none">
					<div class="nr-spinner"></div>
					<div class="nr-loading-text">Loading requests...</div>
				</div>
				<div class="table-responsive">
					<table class="table table-hover" id="nrTable">
						<thead><tr><th>Registration No</th><th>EtoId</th><th>District</th><th>PSID</th><th>Date</th><th>Actions</th></tr></thead>
						<tbody></tbody>
					</table>
				</div>

				<nav aria-label="Page navigation example">
					<ul class="pagination" id="nrPagination"></ul>
				</nav>
			</div>
		</div>
	</main>

	<!-- View Request Modal -->
	<div class="modal fade" id="viewRequestModal" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<div class="modal-header"><h5 class="modal-title">Request Review</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
				<div class="modal-body">
					<div class="mb-3"><strong>Registration:</strong> <span id="vrReg"></span></div>
					<form id="vrForm">
						<div class="form-check mb-2"><input class="form-check-input" type="checkbox" id="vrVerify" name="verify" required><label class="form-check-label" for="vrVerify">Verification Completed</label></div>
						<div class="form-check mb-2"><input class="form-check-input" type="checkbox" id="vrData" name="data_entered" required><label class="form-check-label" for="vrData">Data Entered</label></div>
						<div class="form-check mb-2"><input class="form-check-input" type="checkbox" id="vrFee" name="fee_paid" required><label class="form-check-label" for="vrFee">Fee Paid</label></div>
						<input type="hidden" name="reg_no" id="vrRegInput">
						<input type="hidden" name="district_id" id="vrDistrictInput">
						<input type="hidden" name="eto_id" id="vrEtoInput">
						<input type="hidden" name="psid" id="vrPsIdInput">
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
					<button type="button" class="btn btn-success" id="vrApprove">Approve</button>
				</div>
			</div>
		</div>
	</div>

	<script src="src/js/new_requests.js"></script>
	<?php include __DIR__ . '/../layout/close.php'; ?>
</body>
</html>
