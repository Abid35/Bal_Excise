<?php
// Mark printing queue record as Printed and insert a log (API-key protected)

$EXPECTED_API_KEY = '547264DYQD983243243BBZ';

// Read API key
$apiKey = null;
if (isset($_SERVER['HTTP_API_KEY'])) $apiKey = $_SERVER['HTTP_API_KEY'];
if (isset($_SERVER['HTTP_APIKEY'])) $apiKey = $_SERVER['HTTP_APIKEY'];
if (isset($_SERVER['HTTP_X_API_KEY'])) $apiKey = $_SERVER['HTTP_X_API_KEY'];
if (!$apiKey && isset($_GET['api_key'])) $apiKey = $_GET['api_key'];

if (!$apiKey || $apiKey !== $EXPECTED_API_KEY) {
    header('Content-Type: application/json');
    http_response_code(401);
    echo json_encode(['error' => 'invalid_api_key']);
    exit;
}

require_once __DIR__ . '/db.php';

$headerSet = false;
if (!headers_sent()) {
    header('Content-Type: application/json');
    $headerSet = true;
}

$method = $_SERVER['REQUEST_METHOD'];
// Accept GET requests with URL parameters
if ($method !== 'GET') {
    http_response_code(405);
    echo json_encode(['error' => 'Method Not Allowed']);
    exit;
}

// Accept either an id (existing behavior) or full fields to create a log entry.
$pdo = get_db();

// gather possible input fields
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$input_reg = isset($_GET['reg_no']) ? trim($_GET['reg_no']) : null;
$input_district = isset($_GET['district_id']) ? intval($_GET['district_id']) : null;
$input_eto = isset($_GET['eto_id']) ? intval($_GET['eto_id']) : null;
$input_psid = isset($_GET['psid']) ? trim($_GET['psid']) : null;
$input_remarks = isset($_GET['remarks']) ? trim($_GET['remarks']) : null;
$input_serial = isset($_GET['serial_no']) ? intval($_GET['serial_no']) : null;

try {
    if ($id > 0) {
        // existing behavior: mark the queue row as Printed and insert a log
        $stmt = $pdo->prepare('SELECT * FROM printing_que WHERE id = :id LIMIT 1');
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$row) {
            http_response_code(404);
            echo json_encode(['error' => 'not_found']);
            exit;
        }

        // use input values to override row values if provided
        $reg = $input_reg !== null ? $input_reg : $row['reg_no'];
        $district = $input_district !== null ? $input_district : intval($row['district_id']);
        $eto = $input_eto !== null ? $input_eto : intval($row['eto_id']);
        $psid = $input_psid !== null ? $input_psid : (isset($row['psid']) ? $row['psid'] : '');
        $remarks = $input_remarks !== null ? $input_remarks : (isset($row['remarks']) ? $row['remarks'] : '');
        // serial_no if provided should be used, otherwise use the printing_que id
        $serial_no = $input_serial !== null ? $input_serial : $id;

        $pdo->beginTransaction();
        $u = $pdo->prepare('UPDATE printing_que SET status = :status WHERE id = :id');
        $u->execute(['status' => 'Printed', 'id' => $id]);

        $ins = $pdo->prepare('INSERT INTO printing_logs (reg_no, district_id, eto_id, datetime, remarks, psid, serial_no) VALUES (:reg, :district, :eto, NOW(), :remarks, :psid, :serial_no)');
        $ins->execute(['reg' => $reg, 'district' => $district, 'eto' => $eto, 'remarks' => $remarks, 'psid' => $psid, 'serial_no' => $serial_no]);

        $pdo->commit();

        header('Content-Type: application/json');
        echo json_encode(['ok' => true]);
        exit;
    }

    // If no id provided, require the full set of required fields to create a log entry
    // At minimum reg_no, district_id and eto_id should be present
    if ($input_reg === null) {
        http_response_code(400);
        echo json_encode(['error' => 'missing_fields', 'required' => ['reg_no','district_id','eto_id']]);
        exit;
    }

    // insert a log entry without updating any printing_que row
    $reg = $input_reg;
    $district = $input_district;
    $eto = $input_eto;
    $psid = $input_psid !== null ? $input_psid : '';
    $remarks = $input_remarks !== null ? $input_remarks : '';
    $serial_no = $input_serial !== null ? $input_serial : null;

    $ins = $pdo->prepare('INSERT INTO printing_logs (reg_no, district_id, eto_id, datetime, remarks, psid, serial_no) VALUES (:reg, :district, :eto, NOW(), :remarks, :psid, :serial_no)');
    $ins->execute(['reg' => $reg, 'district' => $district, 'eto' => $eto, 'remarks' => $remarks, 'psid' => $psid, 'serial_no' => $serial_no]);

    header('Content-Type: application/json');
    echo json_encode(['ok' => true]);
} catch (PDOException $e) {
    if ($pdo->inTransaction()) $pdo->rollBack();
    http_response_code(500);
    echo json_encode(['error' => 'db_error', 'detail' => $e->getMessage()]);
    exit;
}
