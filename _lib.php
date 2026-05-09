<?php
declare(strict_types=1);

// Shared helpers for the auth + tracking layer.
// Side-effect free on include — only function definitions and constants.

const PRIVATE_DIR  = __DIR__ . '/.private';
const CONFIG_FILE  = PRIVATE_DIR . '/config.php';
const DB_FILE      = PRIVATE_DIR . '/db.sqlite';

function is_setup_complete(): bool {
    return is_file(CONFIG_FILE);
}

function load_config(): array {
    if (!is_setup_complete()) {
        http_response_code(503);
        exit('Setup not completed.');
    }
    /** @var array $cfg */
    $cfg = require CONFIG_FILE;
    return $cfg;
}

function db(): PDO {
    static $pdo = null;
    if ($pdo === null) {
        if (!is_dir(PRIVATE_DIR)) {
            mkdir(PRIVATE_DIR, 0750, true);
        }
        $pdo = new PDO('sqlite:' . DB_FILE, null, null, [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
        $pdo->exec('PRAGMA journal_mode = WAL');
        $pdo->exec('PRAGMA foreign_keys = ON');
        $pdo->exec("
            CREATE TABLE IF NOT EXISTS sessions (
                id           TEXT PRIMARY KEY,
                name         TEXT NOT NULL,
                ip           TEXT,
                ua           TEXT,
                login_at     INTEGER NOT NULL,
                last_seen_at INTEGER NOT NULL,
                ended_at     INTEGER
            )
        ");
        $pdo->exec("
            CREATE TABLE IF NOT EXISTS events (
                id         INTEGER PRIMARY KEY AUTOINCREMENT,
                session_id TEXT NOT NULL,
                kind       TEXT NOT NULL,
                section    TEXT,
                ts         INTEGER NOT NULL,
                dwell_ms   INTEGER,
                FOREIGN KEY (session_id) REFERENCES sessions(id)
            )
        ");
        $pdo->exec("CREATE INDEX IF NOT EXISTS idx_events_session ON events(session_id)");
        $pdo->exec("CREATE INDEX IF NOT EXISTS idx_events_ts      ON events(ts)");
        $pdo->exec("CREATE INDEX IF NOT EXISTS idx_sessions_login ON sessions(login_at)");
        $pdo->exec("
            CREATE TABLE IF NOT EXISTS admin_sessions (
                id           TEXT PRIMARY KEY,
                login_at     INTEGER NOT NULL,
                last_seen_at INTEGER NOT NULL
            )
        ");
    }
    return $pdo;
}

function random_id(): string {
    return bin2hex(random_bytes(16));
}

function get_client_ip(): string {
    $fwd = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? '';
    if ($fwd !== '') {
        $first = trim(explode(',', $fwd)[0]);
        if (filter_var($first, FILTER_VALIDATE_IP)) return $first;
    }
    return $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
}

function set_session_cookie(string $name, string $value, int $ttl): void {
    setcookie($name, $value, [
        'expires'  => time() + $ttl,
        'path'     => '/',
        'secure'   => true,
        'httponly' => true,
        'samesite' => 'Lax',
    ]);
}

function clear_session_cookie(string $name): void {
    setcookie($name, '', [
        'expires'  => time() - 3600,
        'path'     => '/',
        'secure'   => true,
        'httponly' => true,
        'samesite' => 'Lax',
    ]);
}

function start_visitor_session(string $name): string {
    $cfg = load_config();
    $id  = random_id();
    $now = time();
    $stmt = db()->prepare('
        INSERT INTO sessions (id, name, ip, ua, login_at, last_seen_at)
        VALUES (:id, :name, :ip, :ua, :login_at, :last_seen_at)
    ');
    $stmt->execute([
        ':id'           => $id,
        ':name'         => mb_substr($name, 0, 80),
        ':ip'           => get_client_ip(),
        ':ua'           => mb_substr($_SERVER['HTTP_USER_AGENT'] ?? '', 0, 255),
        ':login_at'     => $now,
        ':last_seen_at' => $now,
    ]);
    set_session_cookie($cfg['cookie_name'], $id, $cfg['session_ttl']);
    log_event($id, 'login');
    return $id;
}

function validate_visitor_session(): ?array {
    $cfg = load_config();
    $id  = $_COOKIE[$cfg['cookie_name']] ?? '';
    if ($id === '' || !ctype_xdigit($id)) return null;

    $stmt = db()->prepare('SELECT * FROM sessions WHERE id = :id AND ended_at IS NULL');
    $stmt->execute([':id' => $id]);
    $row = $stmt->fetch();
    if (!$row) return null;

    if (((int)$row['login_at']) + $cfg['session_ttl'] < time()) {
        end_visitor_session();
        return null;
    }

    db()->prepare('UPDATE sessions SET last_seen_at = :ts WHERE id = :id')
        ->execute([':ts' => time(), ':id' => $id]);
    return $row;
}

function end_visitor_session(): void {
    $cfg = load_config();
    $id  = $_COOKIE[$cfg['cookie_name']] ?? '';
    if ($id !== '' && ctype_xdigit($id)) {
        log_event($id, 'logout');
        db()->prepare('UPDATE sessions SET ended_at = :ts WHERE id = :id AND ended_at IS NULL')
            ->execute([':ts' => time(), ':id' => $id]);
    }
    clear_session_cookie($cfg['cookie_name']);
}

function start_admin_session(): string {
    $cfg = load_config();
    $id  = random_id();
    $now = time();
    db()->prepare('
        INSERT INTO admin_sessions (id, login_at, last_seen_at)
        VALUES (:id, :login_at, :last_seen_at)
    ')->execute([
        ':id'           => $id,
        ':login_at'     => $now,
        ':last_seen_at' => $now,
    ]);
    set_session_cookie($cfg['admin_cookie_name'], $id, $cfg['admin_ttl']);
    return $id;
}

function validate_admin_session(): ?array {
    $cfg = load_config();
    $id  = $_COOKIE[$cfg['admin_cookie_name']] ?? '';
    if ($id === '' || !ctype_xdigit($id)) return null;

    $stmt = db()->prepare('SELECT * FROM admin_sessions WHERE id = :id');
    $stmt->execute([':id' => $id]);
    $row = $stmt->fetch();
    if (!$row) return null;

    if (((int)$row['login_at']) + $cfg['admin_ttl'] < time()) {
        end_admin_session();
        return null;
    }

    db()->prepare('UPDATE admin_sessions SET last_seen_at = :ts WHERE id = :id')
        ->execute([':ts' => time(), ':id' => $id]);
    return $row;
}

function end_admin_session(): void {
    $cfg = load_config();
    $id  = $_COOKIE[$cfg['admin_cookie_name']] ?? '';
    if ($id !== '' && ctype_xdigit($id)) {
        db()->prepare('DELETE FROM admin_sessions WHERE id = :id')->execute([':id' => $id]);
    }
    clear_session_cookie($cfg['admin_cookie_name']);
}

function log_event(string $session_id, string $kind, ?string $section = null, ?int $dwell_ms = null): void {
    $allowed = ['login', 'logout', 'pageview', 'pageview_end', 'section_in', 'section_out', 'heartbeat'];
    if (!in_array($kind, $allowed, true)) return;
    db()->prepare('
        INSERT INTO events (session_id, kind, section, ts, dwell_ms)
        VALUES (:session_id, :kind, :section, :ts, :dwell_ms)
    ')->execute([
        ':session_id' => $session_id,
        ':kind'       => $kind,
        ':section'    => $section ? mb_substr($section, 0, 64) : null,
        ':ts'         => time(),
        ':dwell_ms'   => $dwell_ms,
    ]);
}

function require_same_origin(): void {
    $origin = $_SERVER['HTTP_ORIGIN']  ?? '';
    $ref    = $_SERVER['HTTP_REFERER'] ?? '';
    $host   = 'https://' . ($_SERVER['HTTP_HOST'] ?? '');
    $ok = ($origin !== '' && str_starts_with($origin, $host))
       || ($ref    !== '' && str_starts_with($ref,    $host));
    if (!$ok) {
        http_response_code(403);
        exit('Forbidden.');
    }
}

function safe_html(string $s): string {
    return htmlspecialchars($s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function redirect(string $url): never {
    header('Location: ' . $url);
    exit;
}

// Page rendering helpers — kept here so all PHP-rendered shells stay
// visually consistent without duplicating the inline stylesheet.

const PAGE_CSS = <<<CSS
:root {
  --surface: rgb(250 249 247);
  --surface-alt: rgb(255 255 255);
  --surface-muted: rgb(243 241 238);
  --ink: rgb(20 20 22);
  --ink-muted: rgb(78 78 82);
  --ink-subtle: rgb(130 130 135);
  --line: rgb(228 226 222);
  --brand: rgb(200 16 46);
  --brand-hover: rgb(168 14 39);
}
* { box-sizing: border-box; }
html, body { margin: 0; padding: 0; }
body {
  background: var(--surface);
  color: var(--ink);
  font-family: Inter, ui-sans-serif, system-ui, -apple-system, "Segoe UI", Roboto, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  min-height: 100vh;
  display: flex;
  flex-direction: column;
}
main {
  flex: 1;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 4rem 1.5rem;
}
.card {
  background: var(--surface-alt);
  border: 1px solid var(--line);
  border-radius: 12px;
  box-shadow: 0 1px 2px rgba(0,0,0,0.04), 0 4px 16px rgba(0,0,0,0.04);
  padding: 2.25rem 2rem;
  width: 100%;
  max-width: 28rem;
}
.card.wide { max-width: 64rem; }
.eyebrow {
  font-size: 0.7rem;
  font-weight: 600;
  letter-spacing: 0.18em;
  text-transform: uppercase;
  color: var(--brand);
  margin: 0 0 0.75rem;
}
h1 {
  font-size: 1.5rem;
  font-weight: 600;
  letter-spacing: -0.01em;
  margin: 0 0 0.75rem;
}
p { margin: 0 0 1rem; color: var(--ink-muted); line-height: 1.55; }
p.note { font-size: 0.85rem; color: var(--ink-subtle); }
label {
  display: block;
  font-size: 0.85rem;
  font-weight: 500;
  margin: 1rem 0 0.4rem;
  color: var(--ink);
}
input[type=text], input[type=password] {
  display: block;
  width: 100%;
  padding: 0.65rem 0.8rem;
  border: 1px solid var(--line);
  border-radius: 8px;
  background: var(--surface);
  color: var(--ink);
  font: inherit;
  font-size: 0.95rem;
  transition: border-color 120ms, box-shadow 120ms;
}
input:focus {
  outline: none;
  border-color: var(--brand);
  box-shadow: 0 0 0 3px rgba(200, 16, 46, 0.15);
}
button.primary {
  margin-top: 1.5rem;
  width: 100%;
  padding: 0.75rem 1rem;
  background: var(--brand);
  color: white;
  font: inherit;
  font-weight: 500;
  border: 0;
  border-radius: 8px;
  cursor: pointer;
  transition: background 120ms;
}
button.primary:hover { background: var(--brand-hover); }
.error {
  margin: 0 0 1rem;
  padding: 0.75rem 0.9rem;
  background: rgba(200, 16, 46, 0.08);
  border: 1px solid rgba(200, 16, 46, 0.25);
  border-radius: 8px;
  color: rgb(120 10 28);
  font-size: 0.9rem;
}
.success {
  margin: 0 0 1rem;
  padding: 0.75rem 0.9rem;
  background: rgba(34, 120, 60, 0.08);
  border: 1px solid rgba(34, 120, 60, 0.25);
  border-radius: 8px;
  color: rgb(28 90 48);
  font-size: 0.9rem;
}
footer {
  text-align: center;
  padding: 1.5rem;
  font-size: 0.8rem;
  color: var(--ink-subtle);
  border-top: 1px solid var(--line);
}
table {
  width: 100%;
  border-collapse: collapse;
  margin: 1rem 0 0;
  font-size: 0.85rem;
}
th, td {
  text-align: left;
  padding: 0.55rem 0.75rem;
  border-bottom: 1px solid var(--line);
  vertical-align: top;
}
th {
  font-weight: 600;
  color: var(--ink-muted);
  background: var(--surface-muted);
  position: sticky;
  top: 0;
}
tr:hover td { background: var(--surface-muted); }
.toolbar {
  display: flex;
  gap: 0.75rem;
  align-items: end;
  flex-wrap: wrap;
  margin-bottom: 1rem;
}
.toolbar label { margin: 0 0 0.25rem; }
.toolbar input { width: auto; min-width: 11rem; }
.toolbar button {
  padding: 0.55rem 0.9rem;
  border: 1px solid var(--line);
  background: var(--surface-alt);
  border-radius: 8px;
  font: inherit;
  cursor: pointer;
}
.toolbar button.primary { width: auto; margin-top: 0; }
.muted { color: var(--ink-subtle); font-size: 0.8rem; }
a { color: var(--brand); }
CSS;

function page_head(string $title): void {
    $safe = safe_html($title);
    echo "<!doctype html>\n<html lang=\"de\">\n<head>\n";
    echo "<meta charset=\"UTF-8\">\n";
    echo "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">\n";
    echo "<meta name=\"robots\" content=\"noindex, nofollow\">\n";
    echo "<title>{$safe} · Optimo Business Central Roadmap</title>\n";
    echo "<link rel=\"icon\" type=\"image/svg+xml\" href=\"/favicon.svg\">\n";
    echo "<style>" . PAGE_CSS . "</style>\n";
    echo "</head>\n<body>\n<main>\n";
}

function page_foot(string $hint = ''): void {
    $safe = $hint !== '' ? safe_html($hint) : 'Vertraulich · nur für autorisierte Empfänger.';
    echo "</main>\n<footer>{$safe}</footer>\n</body>\n</html>\n";
}
