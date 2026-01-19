<?php
// ... existing code ...

session_start();
require_once __DIR__ . '/db.php';

if (!isset($_SESSION['user'])) {
	http_response_code(403);
	echo json_encode(['error'=>'forbidden']);
	exit;
}

$pdo = get_db();
$page = isset($_GET['page']) ? max(1,intval($_GET['page'])) : 1;
$per_page = isset($_GET['per_page']) ? max(1,intval($_GET['per_page'])) : 25;
$offset = ($page - 1) * $per_page;

$isAdmin = isset($_SESSION['user']['role']) && strtolower($_SESSION['user']['role']) === 'admin';
$userEto = $isAdmin ? 0 : (isset($_SESSION['user']['eto_id']) ? intval($_SESSION['user']['eto_id']) : 0);
$userDistrict = $isAdmin ? 0 : (isset($_SESSION['user']['district_id']) ? intval($_SESSION['user']['district_id']) : 0);

$reg_no = isset($_GET['reg_no']) ? trim($_GET['reg_no']) : '';

if ($reg_no !== '') {
	if ($isAdmin) {
		$countStmt = $pdo->prepare('SELECT COUNT(*) FROM printing_logs WHERE reg_no = :reg');
		$countStmt->execute(['reg'=>$reg_no]);
		$total = intval($countStmt->fetchColumn());

		$stmt = $pdo->prepare('SELECT * FROM printing_logs WHERE reg_no = :reg ORDER BY id DESC LIMIT :l OFFSET :o');
		$stmt->bindValue(':reg', $reg_no);
		$stmt->bindValue(':l', $per_page, PDO::PARAM_INT);
		$stmt->bindValue(':o', $offset, PDO::PARAM_INT);
		$stmt->execute();
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	} else {
		$countStmt = $pdo->prepare('SELECT COUNT(*) FROM printing_logs WHERE reg_no = :reg AND eto_id = :eto AND district_id = :district');
		$countStmt->execute(['reg'=>$reg_no,'eto'=>$userEto,'district'=>$userDistrict]);
		$total = intval($countStmt->fetchColumn());

		$stmt = $pdo->prepare('SELECT * FROM printing_logs WHERE reg_no = :reg AND eto_id = :eto AND district_id = :district ORDER BY id DESC LIMIT :l OFFSET :o');
		$stmt->bindValue(':reg', $reg_no);
		$stmt->bindValue(':eto', $userEto, PDO::PARAM_INT);
		$stmt->bindValue(':district', $userDistrict, PDO::PARAM_INT);
		$stmt->bindValue(':l', $per_page, PDO::PARAM_INT);
		$stmt->bindValue(':o', $offset, PDO::PARAM_INT);
		$stmt->execute();
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
} else {
	if ($isAdmin) {
		$countStmt = $pdo->query('SELECT COUNT(*) FROM printing_logs');
		$total = intval($countStmt->fetchColumn());

		$stmt = $pdo->prepare('SELECT * FROM printing_logs ORDER BY id DESC LIMIT :l OFFSET :o');
		$stmt->bindValue(':l', $per_page, PDO::PARAM_INT);
		$stmt->bindValue(':o', $offset, PDO::PARAM_INT);
		$stmt->execute();
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	} else {
		$countStmt = $pdo->prepare('SELECT COUNT(*) FROM printing_logs WHERE eto_id = :eto AND district_id = :district');
		$countStmt->execute(['eto'=>$userEto,'district'=>$userDistrict]);
		$total = intval($countStmt->fetchColumn());

		$stmt = $pdo->prepare('SELECT * FROM printing_logs WHERE eto_id = :eto AND district_id = :district ORDER BY id DESC LIMIT :l OFFSET :o');
		$stmt->bindValue(':eto', $userEto, PDO::PARAM_INT);
		$stmt->bindValue(':district', $userDistrict, PDO::PARAM_INT);
		$stmt->bindValue(':l', $per_page, PDO::PARAM_INT);
		$stmt->bindValue(':o', $offset, PDO::PARAM_INT);
		$stmt->execute();
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}

$last_page = (int) ceil($total / $per_page);

header('Content-Type: application/json');
echo json_encode(['data'=>$rows,'pagination'=>['current_page'=>$page,'last_page'=>$last_page,'per_page'=>$per_page,'total'=>$total]]);
