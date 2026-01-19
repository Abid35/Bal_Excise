<?php
	// ... existing code ...
	session_start();
	if (!isset($_SESSION['user'])) {
		header('Location: /?page=login');
		exit;
	}
	$user = $_SESSION['user'];
	$isAdmin = (isset($user['role']) && strtolower($user['role']) === 'admin');
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Settings</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-" crossorigin="anonymous">
	<link rel="stylesheet" href="src/css/common.css">
	<link rel="stylesheet" href="src/css/sidebar.css">
	<link rel="stylesheet" href="src/css/settings.css">
</head>
<body>
	<?php include __DIR__ . '/../layout/sidebar.php'; ?>

	<main style="margin-left:240px;padding:28px">
		<h2>Settings</h2>
		<ul class="nav nav-tabs" id="settingsTabs" role="tablist">
			<?php if ($isAdmin): ?>
				<li class="nav-item" role="presentation"><button class="nav-link active" id="users-tab" data-bs-toggle="tab" data-bs-target="#users" type="button" role="tab">Users</button></li>
				<li class="nav-item" role="presentation"><button class="nav-link" id="account-tab" data-bs-toggle="tab" data-bs-target="#account" type="button" role="tab">My Account</button></li>
			<?php else: ?>
				<li class="nav-item" role="presentation"><button class="nav-link active" id="account-tab" data-bs-toggle="tab" data-bs-target="#account" type="button" role="tab">Account</button></li>
			<?php endif; ?>
		</ul>
		<div class="tab-content mt-3">
			<?php if ($isAdmin): ?>
				<div class="tab-pane fade show active" id="users" role="tabpanel">
					<div class="d-flex justify-content-between mb-3">
						<h4>Users</h4>
						<button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#userModal" id="createUserBtn">Create User</button>
					</div>
					<table class="table table-striped" id="usersTable">
						<thead><tr><th>ID</th><th>Username</th><th>Role</th><th>District</th><th>ETO</th><th>Actions</th></tr></thead>
						<tbody></tbody>
					</table>
				</div>
				<div class="tab-pane fade" id="account" role="tabpanel">
					<h4>Change my password</h4>
					<form id="changePasswordForm">
						<div class="mb-3">
							<label>New password</label>
							<input type="password" name="new_password" class="form-control" required>
						</div>
						<button class="btn btn-primary">Save</button>
					</form>
				</div>
			<?php else: ?>
				<div class="tab-pane fade show active" id="account" role="tabpanel">
					<h4>Account settings</h4>
					<form id="userSettingsForm" enctype="multipart/form-data">
						<div class="mb-3">
							<label>Signature (image)</label>
							<input type="file" name="signature" accept="image/*" class="form-control">
						</div>
						<div class="mb-3">
							<label>Change password</label>
							<input type="password" name="new_password" class="form-control">
						</div>
						<button class="btn btn-primary">Save</button>
					</form>
				</div>
			<?php endif; ?>
		</div>
	</main>

	<!-- User modal -->
	<div class="modal fade" id="userModal" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header"><h5 class="modal-title">User</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
				<div class="modal-body">
					<form id="userForm">
						<input type="hidden" name="id">
						<div class="mb-3"><label>Username</label><input name="username" class="form-control" required></div>
						<div class="mb-3"><label>Password</label><input type="password" name="password" class="form-control"></div>
						<div class="mb-3"><label>Role</label><input name="role" class="form-control"></div>
						<div class="mb-3"><label>District ID</label><input name="district_id" type="number" class="form-control"></div>
						<div class="mb-3"><label>ETO ID</label><input name="eto_id" type="number" class="form-control"></div>
						<div class="mb-3">
							<label>Signature (image)</label><input type="file" name="signature" accept="image/*" class="form-control" required></div>
						<button class="btn btn-primary">Save</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<script src="src/js/settings.js"></script>
	<?php include __DIR__ . '/../layout/close.php'; ?>
</body>
</html>
