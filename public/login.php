<?php
declare(strict_types=1);
require __DIR__ . '/_lib.php';

// Renders the login form on GET, validates name + shared password on POST.
// On success: creates a visitor session and redirects to /.

if (!is_setup_complete()) {
    redirect('/setup.php');
}

// Already logged in? Skip the form.
if (validate_visitor_session() !== null) {
    redirect('/');
}

$error = null;
$name_prefill = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_same_origin();
    $cfg  = load_config();
    $name = trim((string)($_POST['name']     ?? ''));
    $pw   = (string)($_POST['password']      ?? '');
    $name_prefill = $name;

    if ($name === '' || mb_strlen($name) < 2) {
        $error = 'Bitte geben Sie Ihren Namen ein (mindestens 2 Zeichen).';
    } elseif ($pw === '') {
        $error = 'Bitte das Zugangspasswort eingeben.';
    } elseif (!password_verify($pw, $cfg['visitor_password_hash'])) {
        // Constant delay to slow brute-force attempts; sub-second so legit users barely notice.
        usleep(400_000);
        $error = 'Name oder Passwort ist nicht korrekt.';
    } else {
        start_visitor_session($name);
        redirect('/');
    }
}

page_head('Anmelden');
?>
<div class="card">
  <p class="eyebrow">Vertrauliche Präsentation</p>
  <h1>Anmeldung</h1>
  <p>Diese Präsentation ist nur für autorisierte Empfänger zugänglich.
     Bitte geben Sie Ihren Namen und das Zugangspasswort ein.</p>

  <?php if ($error !== null): ?>
    <div class="error"><?= safe_html($error) ?></div>
  <?php endif; ?>

  <form method="post" autocomplete="off">
    <label for="name">Ihr Name</label>
    <input id="name" name="name" type="text" required minlength="2" maxlength="80"
           value="<?= safe_html($name_prefill) ?>" autofocus>

    <label for="password">Zugangspasswort</label>
    <input id="password" name="password" type="password" required>

    <button class="primary" type="submit">Anmelden</button>
  </form>

  <p class="note" style="margin-top:1.5rem">
    Datenschutz-Hinweis: Zur Nachvollziehbarkeit werden Anmeldezeit, der eingegebene
    Name, die IP-Adresse sowie die angesehenen Sektionen protokolliert. Die Daten
    werden ausschließlich von PITapp im Rahmen dieser Präsentation ausgewertet
    und nach Abschluss des Projekts gelöscht.
  </p>
</div>
<?php
page_foot();
