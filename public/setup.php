<?php
declare(strict_types=1);
require __DIR__ . '/_lib.php';

// One-shot bootstrap. Asks for visitor + admin password, writes their bcrypt
// hashes to .private/config.php, initializes the SQLite schema, then deletes
// itself. Refuses to run a second time as long as config.php exists.

if (is_setup_complete()) {
    http_response_code(410);
    page_head('Setup bereits abgeschlossen');
    echo '<div class="card">';
    echo '<p class="eyebrow">Setup</p>';
    echo '<h1>Bereits eingerichtet</h1>';
    echo '<p>Diese Setup-Seite wurde bereits einmal aufgerufen und ist deshalb deaktiviert.</p>';
    echo '<p class="note">Falls Sie das Zugangs- oder Admin-Passwort zurücksetzen möchten, '
       . 'müssen Sie die Datei <code>.private/config.php</code> auf dem Server entfernen — '
       . 'beim nächsten Deploy steht <code>setup.php</code> wieder zur Verfügung.</p>';
    echo '</div>';
    page_foot();
    exit;
}

$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_same_origin();

    $vp1 = (string)($_POST['visitor_password']         ?? '');
    $vp2 = (string)($_POST['visitor_password_confirm'] ?? '');
    $ap1 = (string)($_POST['admin_password']           ?? '');
    $ap2 = (string)($_POST['admin_password_confirm']   ?? '');

    if (mb_strlen($vp1) < 6) {
        $error = 'Das Zugangspasswort muss mindestens 6 Zeichen haben.';
    } elseif ($vp1 !== $vp2) {
        $error = 'Die beiden Zugangspasswörter stimmen nicht überein.';
    } elseif (mb_strlen($ap1) < 8) {
        $error = 'Das Admin-Passwort muss mindestens 8 Zeichen haben.';
    } elseif ($ap1 !== $ap2) {
        $error = 'Die beiden Admin-Passwörter stimmen nicht überein.';
    } elseif ($vp1 === $ap1) {
        $error = 'Zugangs- und Admin-Passwort müssen unterschiedlich sein.';
    } else {
        // Write config atomically so a partial write never leaves a half-broken file.
        if (!is_dir(PRIVATE_DIR)) {
            mkdir(PRIVATE_DIR, 0750, true);
        }
        $cfg = [
            'visitor_password_hash' => password_hash($vp1, PASSWORD_BCRYPT),
            'admin_password_hash'   => password_hash($ap1, PASSWORD_BCRYPT),
            'session_ttl'           => 8 * 3600,
            'admin_ttl'             => 1 * 3600,
            'cookie_name'           => 'optimo_session',
            'admin_cookie_name'     => 'optimo_admin',
        ];
        $payload = "<?php\nreturn " . var_export($cfg, true) . ";\n";

        $tmp = CONFIG_FILE . '.tmp';
        if (file_put_contents($tmp, $payload, LOCK_EX) === false) {
            $error = 'Konnte Konfigurationsdatei nicht schreiben. Server-Berechtigungen prüfen.';
        } elseif (!rename($tmp, CONFIG_FILE)) {
            @unlink($tmp);
            $error = 'Konnte Konfigurationsdatei nicht ablegen.';
        } else {
            @chmod(CONFIG_FILE, 0640);
            // Touch DB so the schema gets created right away.
            db();
            // Remove ourselves so a second visitor cannot re-run setup.
            @unlink(__FILE__);

            page_head('Setup abgeschlossen');
            echo '<div class="card">';
            echo '<p class="eyebrow">Setup</p>';
            echo '<h1>Einrichtung abgeschlossen</h1>';
            echo '<div class="success">Die Passwörter sind gespeichert und die Setup-Seite wurde deaktiviert.</div>';
            echo '<p>Sie können sich nun mit dem Zugangspasswort unter '
               . '<a href="/login.php">/login.php</a> anmelden, '
               . 'oder die Auswertung unter <a href="/admin-login.php">/admin-login.php</a> öffnen.</p>';
            echo '</div>';
            page_foot();
            exit;
        }
    }
}

page_head('Erst-Einrichtung');
?>
<div class="card">
  <p class="eyebrow">Setup</p>
  <h1>Passwörter festlegen</h1>
  <p>Diese Seite läuft nur einmal. Bitte legen Sie hier das gemeinsame
     <strong>Zugangspasswort</strong> (für die Präsentations-Seite) und
     ein separates <strong>Admin-Passwort</strong> (für die Log-Auswertung)
     fest. Beide werden als BCRYPT-Hash gespeichert; die Klartexte werden nicht abgelegt.</p>

  <?php if ($error !== null): ?>
    <div class="error"><?= safe_html($error) ?></div>
  <?php endif; ?>

  <form method="post" autocomplete="off">
    <label for="visitor_password">Zugangspasswort (mind. 6 Zeichen)</label>
    <input id="visitor_password" name="visitor_password" type="password" required minlength="6">

    <label for="visitor_password_confirm">Zugangspasswort wiederholen</label>
    <input id="visitor_password_confirm" name="visitor_password_confirm" type="password" required minlength="6">

    <label for="admin_password">Admin-Passwort (mind. 8 Zeichen)</label>
    <input id="admin_password" name="admin_password" type="password" required minlength="8">

    <label for="admin_password_confirm">Admin-Passwort wiederholen</label>
    <input id="admin_password_confirm" name="admin_password_confirm" type="password" required minlength="8">

    <button class="primary" type="submit">Einrichtung abschließen</button>
  </form>

  <p class="note" style="margin-top:1.25rem">
    Hinweis: Nach erfolgreicher Einrichtung löscht sich diese Datei selbst.
    Die Hashes liegen unter <code>.private/config.php</code> und sind über das Web nicht erreichbar.
  </p>
</div>
<?php
page_foot();
