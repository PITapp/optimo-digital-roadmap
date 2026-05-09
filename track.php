<?php
declare(strict_types=1);
require __DIR__ . '/_lib.php';

// Receives JSON-encoded tracking events from the visitor's browser.
// Quietly drops anything that isn't authenticated, isn't same-origin,
// or doesn't match the allowed event kinds. Always responds with 204.

header('Cache-Control: no-store');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit;
}

if (!is_setup_complete()) {
    http_response_code(503);
    exit;
}

require_same_origin();

$session = validate_visitor_session();
if ($session === null) {
    http_response_code(401);
    exit;
}

$raw = file_get_contents('php://input');
if ($raw === false || $raw === '' || strlen($raw) > 4096) {
    http_response_code(400);
    exit;
}

try {
    $payload = json_decode($raw, true, 4, JSON_THROW_ON_ERROR);
} catch (Throwable) {
    http_response_code(400);
    exit;
}

if (!is_array($payload)) {
    http_response_code(400);
    exit;
}

$kind     = is_string($payload['kind'] ?? null) ? $payload['kind'] : '';
$section  = is_string($payload['section'] ?? null) ? $payload['section'] : null;
$dwell_ms = isset($payload['dwell_ms']) && is_numeric($payload['dwell_ms'])
    ? max(0, min(24 * 3600 * 1000, (int)$payload['dwell_ms']))
    : null;

log_event($session['id'], $kind, $section, $dwell_ms);

http_response_code(204);
