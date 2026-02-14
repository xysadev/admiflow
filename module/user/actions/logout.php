<?php

require '../../../vendor/autoload.php';

use Xysdev\Admiflow\Auth;
use Xysdev\Admiflow\Session;

header('Content-Type: application/json');

// 🔐 Solo permitir POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode([
        'success' => false,
        'message' => 'Método no permitido'
    ]);
    exit;
}

// 🔒 Validar CSRF
$csrfToken = $_SERVER['HTTP_X_CSRF_TOKEN'] ?? null;
Session::requireCsrf($csrfToken);

// 🚪 Logout centralizado
Auth::logout();

echo json_encode([
    'success' => true,
    'redirect' => base_url() . 'signin.html'
]);
