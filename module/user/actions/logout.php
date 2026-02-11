<?php

require '../../../vendor/autoload.php';
require '../../../system/user_functions.php';

use Xysdev\Admiflow\Session;

Session::start();

// 🔒 validar CSRF antes de destruir
$csrfToken = $_SERVER['HTTP_X_CSRF_TOKEN'] ?? null;
Session::requireCsrf($csrfToken);

// destruir sesión
Session::destroy();

header('Content-Type: application/json');
echo json_encode([
    'success' => true,
    'redirect' => base_url() . 'signin.html'
]);
exit;
