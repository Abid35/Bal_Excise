<?php
// ... existing code ...

// External feed for printing queue (API-key protected)
// Returns: { printing_que: {...}, user: {...}|null, vehicle: { ...external json... } }

// Configure API key here (change to a secure value)
$EXPECTED_API_KEY = '547264DYQD983243243BBZ';

// Read API key from header or query param
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
$pdo = get_db();

// Fetch top 1 record ordered by priority asc, id asc
$stmt = $pdo->query('SELECT * FROM printing_que WHERE status = "Pending" ORDER BY priority ASC, id ASC LIMIT 1');
$queue = $stmt->fetch(PDO::FETCH_ASSOC);

$result = ['printing_que' => null, 'user' => null, 'vehicle' => null];

if ($queue) {
	$result['printing_que'] = $queue;
	// find user matching eto_id and district_id
	$user = null;
	if (isset($queue['eto_id']) && isset($queue['district_id'])) {
		$uStmt = $pdo->prepare('SELECT * FROM users WHERE eto_id = :eto AND district_id = :district LIMIT 1');
		$uStmt->execute(['eto' => $queue['eto_id'], 'district' => $queue['district_id']]);
		$user = $uStmt->fetch(PDO::FETCH_ASSOC);
		if ($user) $result['user'] = $user;
	}

		// fetch vehicle info from our local endpoint (api/vehicle_info.php)
    $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
    $scriptDir = rtrim(dirname($_SERVER['SCRIPT_NAME']), '\/');
    $localUrl = $scheme . '://' . $host . $scriptDir . '/vehicle_info.php';

    $reg = isset($queue['reg_no']) ? $queue['reg_no'] : '';
    $district = isset($queue['district_id']) ? $queue['district_id'] : '';

    $postFields = http_build_query(['RegNo' => $reg, 'DistrictID' => $district]);

    $ch = curl_init($localUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/x-www-form-urlencoded',
        'Expect:',
        'Host: ' . $host
    ]);
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

    $response = curl_exec($ch);
    $err = curl_error($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($response === false) {
        $result['vehicle'] = ['error' => 'upstream_error', 'detail' => $err];
    } else {
        $decoded = json_decode($response, true);
        $result['vehicle'] = $decoded !== null ? $decoded : ['raw' => $response];
    }
}

header('Content-Type: application/json');
echo json_encode($result);
