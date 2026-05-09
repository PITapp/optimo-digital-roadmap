<?php
declare(strict_types=1);
require __DIR__ . '/_lib.php';

// Admin dashboard: lists visitor sessions, lets you drill into the events of a
// single session, and exports the filtered view as CSV.

if (!is_setup_complete()) {
    redirect('/setup.php');
}

if (validate_admin_session() === null) {
    redirect('/admin-login.php');
}

// --- Logout shortcut --------------------------------------------------------

if (isset($_GET['logout'])) {
    end_admin_session();
    redirect('/admin-login.php');
}

// --- Read filters -----------------------------------------------------------

$today      = (new DateTimeImmutable('today'))->format('Y-m-d');
$default_to = (new DateTimeImmutable('today'))->modify('+1 day')->format('Y-m-d');
$default_from = (new DateTimeImmutable('today'))->modify('-30 days')->format('Y-m-d');

$from_str   = (string)($_GET['from'] ?? $default_from);
$to_str     = (string)($_GET['to']   ?? $default_to);
$name_q     = trim((string)($_GET['name'] ?? ''));
$session_id = (string)($_GET['session'] ?? '');
$export     = (string)($_GET['export']   ?? '');

$from_ts = strtotime($from_str . ' 00:00:00') ?: strtotime($default_from . ' 00:00:00');
$to_ts   = strtotime($to_str   . ' 00:00:00') ?: strtotime($default_to   . ' 00:00:00');

// --- Helpers ----------------------------------------------------------------

function fmt_ts(?int $ts): string {
    return $ts ? (new DateTimeImmutable('@' . $ts))->setTimezone(new DateTimeZone('Europe/Vienna'))->format('Y-m-d H:i:s') : '';
}
function fmt_duration(?int $sec): string {
    if ($sec === null || $sec <= 0) return '–';
    if ($sec < 60)    return $sec . ' s';
    if ($sec < 3600)  return floor($sec / 60) . ' min ' . ($sec % 60) . ' s';
    return floor($sec / 3600) . ' h ' . floor(($sec % 3600) / 60) . ' min';
}

// --- Fetch sessions (filtered) ---------------------------------------------

$sql = "
    SELECT  s.id, s.name, s.ip, s.ua, s.login_at, s.last_seen_at, s.ended_at,
            (SELECT GROUP_CONCAT(DISTINCT section)
               FROM events e
              WHERE e.session_id = s.id AND e.section IS NOT NULL) AS sections_seen,
            (SELECT COUNT(*) FROM events e
              WHERE e.session_id = s.id AND e.kind = 'pageview')   AS pageviews
      FROM sessions s
     WHERE s.login_at >= :from_ts
       AND s.login_at <  :to_ts
       AND (:name = '' OR s.name LIKE :name_like)
  ORDER BY s.login_at DESC
";
$stmt = db()->prepare($sql);
$stmt->execute([
    ':from_ts'   => $from_ts,
    ':to_ts'     => $to_ts,
    ':name'      => $name_q,
    ':name_like' => '%' . $name_q . '%',
]);
$sessions = $stmt->fetchAll();

// --- CSV exports (must run before any HTML output) -------------------------

if ($export === 'sessions') {
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename="optimo-sessions-' . $today . '.csv"');
    $out = fopen('php://output', 'w');
    fwrite($out, "\xEF\xBB\xBF"); // UTF-8 BOM for Excel
    fputcsv($out, ['session_id', 'name', 'ip', 'login_at', 'last_seen_at', 'ended_at', 'duration_seconds', 'pageviews', 'sections_seen', 'user_agent']);
    foreach ($sessions as $s) {
        $end = $s['ended_at'] ?: $s['last_seen_at'];
        fputcsv($out, [
            $s['id'],
            $s['name'],
            $s['ip'],
            fmt_ts((int)$s['login_at']),
            fmt_ts((int)$s['last_seen_at']),
            fmt_ts($s['ended_at'] ? (int)$s['ended_at'] : null),
            $end - (int)$s['login_at'],
            $s['pageviews'],
            $s['sections_seen'] ?? '',
            $s['ua'],
        ]);
    }
    fclose($out);
    exit;
}

if ($export === 'events') {
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename="optimo-events-' . $today . '.csv"');
    $out = fopen('php://output', 'w');
    fwrite($out, "\xEF\xBB\xBF");
    fputcsv($out, ['event_id', 'session_id', 'session_name', 'kind', 'section', 'ts', 'dwell_ms']);

    $rows = db()->prepare("
        SELECT e.id, e.session_id, s.name AS session_name, e.kind, e.section, e.ts, e.dwell_ms
          FROM events e
          JOIN sessions s ON s.id = e.session_id
         WHERE s.login_at >= :from_ts
           AND s.login_at <  :to_ts
           AND (:name = '' OR s.name LIKE :name_like)
      ORDER BY e.ts ASC
    ");
    $rows->execute([
        ':from_ts'   => $from_ts,
        ':to_ts'     => $to_ts,
        ':name'      => $name_q,
        ':name_like' => '%' . $name_q . '%',
    ]);
    while ($row = $rows->fetch()) {
        fputcsv($out, [
            $row['id'],
            $row['session_id'],
            $row['session_name'],
            $row['kind'],
            $row['section'] ?? '',
            fmt_ts((int)$row['ts']),
            $row['dwell_ms'] ?? '',
        ]);
    }
    fclose($out);
    exit;
}

// --- Optional drill-down: events of a single session -----------------------

$detail_session = null;
$detail_events  = [];
$section_totals = [];
if ($session_id !== '' && ctype_xdigit($session_id)) {
    $st = db()->prepare('SELECT * FROM sessions WHERE id = :id');
    $st->execute([':id' => $session_id]);
    $detail_session = $st->fetch() ?: null;

    if ($detail_session) {
        $ev = db()->prepare('SELECT * FROM events WHERE session_id = :id ORDER BY ts ASC');
        $ev->execute([':id' => $session_id]);
        $detail_events = $ev->fetchAll();

        $tot = db()->prepare("
            SELECT section, SUM(dwell_ms) AS total_ms
              FROM events
             WHERE session_id = :id AND section IS NOT NULL AND dwell_ms IS NOT NULL
          GROUP BY section
          ORDER BY total_ms DESC
        ");
        $tot->execute([':id' => $session_id]);
        $section_totals = $tot->fetchAll();
    }
}

// --- HTML output ------------------------------------------------------------

$qs = function (array $overrides) use ($from_str, $to_str, $name_q, $session_id) {
    $base = ['from' => $from_str, 'to' => $to_str, 'name' => $name_q];
    if ($session_id !== '') $base['session'] = $session_id;
    return http_build_query(array_merge($base, $overrides));
};

page_head('Auswertung');
?>
<div class="card wide">
  <p class="eyebrow">Admin</p>
  <h1 style="display:flex;justify-content:space-between;align-items:center;gap:1rem;">
    <span>Zugriffs-Auswertung</span>
    <a href="?logout=1" class="muted" style="text-decoration:none;">Abmelden</a>
  </h1>

  <form method="get" class="toolbar">
    <div>
      <label for="from">Von</label>
      <input id="from" name="from" type="date" value="<?= safe_html($from_str) ?>">
    </div>
    <div>
      <label for="to">Bis</label>
      <input id="to" name="to" type="date" value="<?= safe_html($to_str) ?>">
    </div>
    <div>
      <label for="name">Name (enthält)</label>
      <input id="name" name="name" type="text" value="<?= safe_html($name_q) ?>" placeholder="z. B. Müller">
    </div>
    <button class="primary" type="submit">Filtern</button>
    <a class="muted" href="/admin.php" style="margin-left:auto;align-self:center;">Filter zurücksetzen</a>
  </form>

  <div style="display:flex;gap:0.5rem;margin: 0.5rem 0 1.25rem;">
    <a class="muted" href="?<?= safe_html($qs(['export' => 'sessions'])) ?>">⬇ Sessions als CSV</a>
    <span class="muted">·</span>
    <a class="muted" href="?<?= safe_html($qs(['export' => 'events'])) ?>">⬇ Einzel-Events als CSV</a>
    <span class="muted" style="margin-left:auto;">
      <?= count($sessions) ?> Sitzung<?= count($sessions) === 1 ? '' : 'en' ?> im gewählten Zeitraum
    </span>
  </div>

  <?php if (count($sessions) === 0): ?>
    <p class="muted">Keine Daten im gewählten Zeitraum.</p>
  <?php else: ?>
    <div style="overflow:auto;max-height:60vh;">
      <table>
        <thead>
          <tr>
            <th>Login</th>
            <th>Name</th>
            <th>Dauer</th>
            <th>Pageviews</th>
            <th>Sektionen</th>
            <th>IP</th>
            <th>Beendet</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($sessions as $s):
            $end = $s['ended_at'] ?: $s['last_seen_at'];
            $dur = $end - (int)$s['login_at'];
        ?>
          <tr>
            <td><?= safe_html(fmt_ts((int)$s['login_at'])) ?></td>
            <td><strong><?= safe_html($s['name']) ?></strong></td>
            <td><?= safe_html(fmt_duration($dur)) ?></td>
            <td><?= (int)$s['pageviews'] ?></td>
            <td class="muted" style="max-width:18rem;"><?= safe_html($s['sections_seen'] ?? '') ?></td>
            <td class="muted"><?= safe_html((string)$s['ip']) ?></td>
            <td class="muted"><?= $s['ended_at'] ? safe_html(fmt_ts((int)$s['ended_at'])) : '—' ?></td>
            <td><a href="?<?= safe_html($qs(['session' => $s['id']])) ?>">Details</a></td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php endif; ?>

  <?php if ($detail_session): ?>
    <hr style="margin:2rem 0;border:0;border-top:1px solid var(--line);">
    <h1 style="font-size:1.15rem;">Details: <?= safe_html($detail_session['name']) ?> · <?= safe_html(fmt_ts((int)$detail_session['login_at'])) ?></h1>

    <?php if (count($section_totals) > 0): ?>
      <p class="muted" style="margin-top:1rem;font-weight:600;color:var(--ink);">Verweildauer pro Sektion</p>
      <table>
        <thead><tr><th>Sektion</th><th>Summierte Dauer</th></tr></thead>
        <tbody>
          <?php foreach ($section_totals as $t): ?>
            <tr>
              <td><?= safe_html($t['section']) ?></td>
              <td><?= safe_html(fmt_duration((int)round(((int)$t['total_ms']) / 1000))) ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php endif; ?>

    <p class="muted" style="margin-top:1.5rem;font-weight:600;color:var(--ink);">Alle Events</p>
    <div style="overflow:auto;max-height:50vh;">
      <table>
        <thead><tr><th>Zeit</th><th>Ereignis</th><th>Sektion</th><th>Dwell</th></tr></thead>
        <tbody>
          <?php foreach ($detail_events as $e): ?>
            <tr>
              <td class="muted"><?= safe_html(fmt_ts((int)$e['ts'])) ?></td>
              <td><?= safe_html($e['kind']) ?></td>
              <td><?= safe_html($e['section'] ?? '') ?></td>
              <td class="muted"><?= $e['dwell_ms'] !== null ? (int)$e['dwell_ms'] . ' ms' : '—' ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php endif; ?>
</div>
<?php
page_foot('Auswertung · Zugang nur für PITapp.');
