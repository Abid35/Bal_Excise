<?php
session_start();
$error = '';
if (isset($_SESSION['login_error'])) {
	$error = $_SESSION['login_error'];
	unset($_SESSION['login_error']);
}
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-" crossorigin="anonymous">
	<link rel="stylesheet" href="src/css/common.css">
	<link rel="stylesheet" href="src/css/login.css">
</head>
<body>
	<div class="container">
		<div class="login-card shadow-sm">
			<div class="login-header text-center">
				<img src="src/img/logo.png" alt="Logo" class="logo">
				<p class="text-muted">Sign in to access your dashboard</p>
			</div>
			<?php if ($error): ?>
				<div class="alert alert-danger" role="alert"><?php echo htmlspecialchars($error); ?></div>
			<?php endif; ?>
			<form method="post" action="api/login.php">
				<div class="mb-3">
					<label class="form-label">Username</label>
					<input type="text" name="username" class="form-control" required />
				</div>
				<div class="mb-3">
					<label class="form-label">Password</label>
					<input type="password" name="password" class="form-control" required />
				</div>
				<div class="d-grid">
					<button type="submit" class="btn btn-primary btn-primary-custom">Sign in</button>
				</div>
				<div class="login-footer text-center mt-3">Forgot your password? Contact admin.</div>
			</form>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="" crossorigin="anonymous"></script>
	<script src="src/js/common.js"></script>
</body>
</html>
