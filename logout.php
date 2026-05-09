<?php
declare(strict_types=1);
require __DIR__ . '/_lib.php';

if (!is_setup_complete()) {
    redirect('/setup.php');
}

end_visitor_session();
redirect('/login.php');
