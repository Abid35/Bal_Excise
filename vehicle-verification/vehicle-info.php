<?php
declare(strict_types=1);

header('Content-Type: application/json; charset=utf-8');

/* ---------- CORS ---------- */
$allowedOrigins = ['https://etanb.com', 'https://www.etanb.com'];
$origin = $_SERVER['HTTP_ORIGIN'] ?? '';
if (in_array($origin, $allowedOrigins, true)) {
    header("Access-Control-Allow-Origin: $origin");
    header('Access-Control-Allow-Credentials: true');
    header('Vary: Origin');
}
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With, Email, Pwd');
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

/* ---------- Helpers ---------- */
function error_json(int $code, string $message, array $meta = []): void {
    http_response_code($code);
    echo json_encode(['error' => $message, 'meta' => $meta], JSON_UNESCAPED_UNICODE);
    exit;
}
function ok_json($data): void {
    http_response_code(200);
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
    exit;
}

/* ---------- Read request ---------- */
$raw = file_get_contents('php://input') ?: '';
$ctype = $_SERVER['CONTENT_TYPE'] ?? $_SERVER['HTTP_CONTENT_TYPE'] ?? '';
$payload = [];

if (stripos($ctype, 'application/json') !== false && $raw !== '') {
    $payload = json_decode($raw, true);
    if (!is_array($payload)) error_json(400, 'Invalid JSON payload');
} else {
    $payload = $_POST;
}

$regNo      = isset($payload['regNo']) ? strtoupper(trim((string)$payload['regNo'])) : '';
$regNo      = preg_replace('/\s+/', '', $regNo ?? '');
$districtId = isset($payload['districtId']) ? trim((string)$payload['districtId']) : '';

if ($regNo === '' || $districtId === '') {
    error_json(400, 'Registration number and District ID are required.');
}
if (!preg_match('/^[A-Z0-9\-]{3,20}$/', $regNo)) {
    error_json(422, 'Invalid registration number format.');
}
if (!preg_match('/^\d{1,6}$/', $districtId)) {
    error_json(422, 'Invalid districtId format.');
}

/* ---------- Config ---------- */
$apiUrl = 'https://115.186.182.227/api/1.0/vehicle/Info';
$email  = 'exice.job.pk@etanb.com';
$pwd    = '7?.id@Z[eH';

$body = json_encode(['RegNo' => $regNo, 'DistrictID' => $districtId], JSON_UNESCAPED_UNICODE);
if ($body === false) error_json(500, 'Failed to encode request body.');

$requestId = bin2hex(random_bytes(8));

/* ---------- Upstream call ---------- */
$ch = curl_init($apiUrl);
$headers = [
    'Accept: application/json',
    'Content-Type: application/json',
    'Email: ' . $email,
    'Pwd: ' . $pwd,
    'User-Agent: VehicleInfoApp/1.0 (+etanb.com)',
    'X-Request-Id: ' . $requestId,
    'Expect:',
    'Host: etanb.com'   // 👈 force Host header to match domain
];

curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST           => true,
    CURLOPT_HTTPHEADER     => $headers,
    CURLOPT_POSTFIELDS     => $body,
    CURLOPT_CONNECTTIMEOUT => 10,
    CURLOPT_TIMEOUT        => 30,
    CURLOPT_SSL_VERIFYPEER => false, // 👈 disable SSL verify (since IP used)
    CURLOPT_SSL_VERIFYHOST => false,
]);

$response = curl_exec($ch);
$errno    = curl_errno($ch);
$error    = curl_error($ch);
$httpcode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

/* ---------- Handle response ---------- */
if ($errno !== 0) {
    error_json(502, 'Upstream connectivity error', ['curlErrno' => $errno, 'curlError' => $error]);
}
if ($httpcode < 200 || $httpcode >= 300) {
    error_json($httpcode, 'Upstream returned error', ['status' => $httpcode, 'body' => $response]);
}

$data = json_decode((string)$response, true);
if (json_last_error() !== JSON_ERROR_NONE) {
    error_json(502, 'Invalid JSON received from upstream', ['body' => $response]);
}

ok_json($data);
