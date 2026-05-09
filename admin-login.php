<?php
declare(strict_types=1);
require __DIR__ . '/_lib.php';

if (!is_setup_complete()) {
    redirect('/setup.php');
}

if (validate_admin_session() !== null) {
    redirect('/admin.php');
}

$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_same_origin();
    $cfg = load_config();
    $pw  = (string)($_POST['password'] ?? '');

    if ($pw === '') {
        $error = 'Bitte das Admin-Passwort eingeben.';
    } elseif (!password_verify($pw, $cfg['admin_password_hash'])) {
        usleep(400_000);
        $error = 'Admin-Passwort ist nicht korrekt.';
    } else {
        start_admin_session();
        redirect('/admin.php');
    }
}

page_head('Admin-Anmeldung');
?>
<div class="card">
  <p class="eyebrow">Admin</p>
  <h1>Auswertung anmelden</h1>
  <p>Zugang zur Auswertung der Zugriffsprotokolle. Separates Passwort, nur für PITapp.</p>

  <?php if ($error !== null): ?>
    <div class="error"><?= safe_html($error) ?></div>
  <?php endif; ?>

  <form method="post" autocomplete="off">
    <label for="password">Admin-Passwort</label>
    <input id="password" name="password" type="password" required autofocus>

    <button class="primary" type="submit">Anmelden</button>
  </form>
</div>
<?php
page_foot('Auswertung · Zugang nur für PITapp.');
