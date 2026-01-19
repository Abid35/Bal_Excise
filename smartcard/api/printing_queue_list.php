<?php

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

// Determine if user is admin — admins see all records
$isAdmin = isset($_SESSION['user']['role']) && strtolower($_SESSION['user']['role']) === 'admin';

// Limit to logged-in user's eto_id and district_id when not admin
$userEto = $isAdmin ? 0 : (isset($_SESSION['user']['eto_id']) ? intval($_SESSION['user']['eto_id']) : 0);
$userDistrict = $isAdmin ? 0 : (isset($_SESSION['user']['district_id']) ? intval($_SESSION['user']['district_id']) : 0);

// if reg_no provided -> exact match search; admins search globally, others limited to user's eto/district
$reg_no = isset($_GET['reg_no']) ? trim($_GET['reg_no']) : '';
if ($reg_no !== '') {
    if ($isAdmin) {
        $countStmt = $pdo->prepare('SELECT COUNT(*) FROM printing_que WHERE reg_no = :reg');
        $countStmt->execute(['reg'=>$reg_no]);
        $total = intval($countStmt->fetchColumn());

        $stmt = $pdo->prepare('SELECT id, reg_no, district_id, eto_id, Datetime, status FROM printing_que WHERE reg_no = :reg ORDER BY id DESC LIMIT :l OFFSET :o');
        $stmt->bindValue(':reg', $reg_no);
        $stmt->bindValue(':l', $per_page, PDO::PARAM_INT);
        $stmt->bindValue(':o', $offset, PDO::PARAM_INT);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $countStmt = $pdo->prepare('SELECT COUNT(*) FROM printing_que WHERE reg_no = :reg AND eto_id = :eto AND district_id = :district');
        $countStmt->execute(['reg'=>$reg_no, 'eto'=>$userEto, 'district'=>$userDistrict]);
        $total = intval($countStmt->fetchColumn());

        $stmt = $pdo->prepare('SELECT id, reg_no, district_id, eto_id, Datetime, status FROM printing_que WHERE reg_no = :reg AND eto_id = :eto AND district_id = :district ORDER BY id DESC LIMIT :l OFFSET :o');
        $stmt->bindValue(':reg', $reg_no);
        $stmt->bindValue(':eto', $userEto, PDO::PARAM_INT);
        $stmt->bindValue(':district', $userDistrict, PDO::PARAM_INT);
        $stmt->bindValue(':l', $per_page, PDO::PARAM_INT);
        $stmt->bindValue(':o', $offset, PDO::PARAM_INT);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
} else {
    // default: show Pending or In Printing. Admins see all; others limited to user's eto/district
    if ($isAdmin) {
        $countStmt = $pdo->query("SELECT COUNT(*) FROM printing_que WHERE status IN ('Pending','In Printing')");
        $total = intval($countStmt->fetchColumn());

        $stmt = $pdo->prepare("SELECT id, reg_no, district_id, eto_id, Datetime, status FROM printing_que WHERE status IN ('Pending','In Printing') ORDER BY id DESC LIMIT :l OFFSET :o");
        $stmt->bindValue(':l', $per_page, PDO::PARAM_INT);
        $stmt->bindValue(':o', $offset, PDO::PARAM_INT);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $countStmt = $pdo->prepare("SELECT COUNT(*) FROM printing_que WHERE status IN ('Pending','In Printing') AND eto_id = :eto AND district_id = :district");
        $countStmt->execute(['eto'=>$userEto, 'district'=>$userDistrict]);
        $total = intval($countStmt->fetchColumn());

        $stmt = $pdo->prepare("SELECT id, reg_no, district_id, eto_id, Datetime, status FROM printing_que WHERE status IN ('Pending','In Printing') AND eto_id = :eto AND district_id = :district ORDER BY id DESC LIMIT :l OFFSET :o");
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
