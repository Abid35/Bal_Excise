<?php

$user = isset($_SESSION['user']) ? $_SESSION['user'] : null;
$current_page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
function nav_active($page, $current) {
    return $page === $current ? ' active' : '';
}
?>
<nav class="bg-white border-end" style="width:240px;min-height:100vh;position:fixed;left:0;top:0;padding:20px">
	<div class="sidebar-brand mb-4 text-center">
		<img src="src/img/logo.png" alt="Logo" class="logo" style="width: 50%; height: auto;">
	</div>
	<ul class="nav flex-column">
		<li class="nav-item"><a class="nav-link<?php echo nav_active('dashboard', $current_page); ?>" href="?page=dashboard">Dashboard</a></li>
		<li class="nav-item"><a class="nav-link<?php echo nav_active('new_requests', $current_page); ?>" href="?page=new_requests">New Requests</a></li>
		<li class="nav-item"><a class="nav-link<?php echo nav_active('printing_queue', $current_page); ?>" href="?page=printing_queue">Printing Queue</a></li>
		<li class="nav-item"><a class="nav-link<?php echo nav_active('single_print', $current_page); ?>" href="?page=single_print">Single Record</a></li>
		<li class="nav-item"><a class="nav-link<?php echo nav_active('printing_logs', $current_page); ?>" href="?page=printing_logs">Printing Logs</a></li>
		<li class="nav-item"><a class="nav-link<?php echo nav_active('settings', $current_page); ?>" href="?page=settings">Settings</a></li>
		<li class="nav-item"><a class="nav-link text-danger" href="api/logout.php">Logout</a></li>
	</ul>
</nav>
<div style="width:240px;flex-shrink:0"></div>
