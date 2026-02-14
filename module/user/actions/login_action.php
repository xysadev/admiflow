<?php

require '../../../vendor/autoload.php';

use Xysdev\Admiflow\User\User;
use Xysdev\Admiflow\Session;

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode([
        'success' => false,
        'message' => 'Método no permitido'
    ]);
    exit;
}

$email = strtolower(trim($_POST['email'] ?? ''));
$pass  = trim($_POST['pass'] ?? '');

if (empty($email) || empty($pass)) {
    http_response_code(422);
    echo json_encode([
        'success' => false,
        'message' => 'Email y contraseña son obligatorios'
    ]);
    exit;
}

$user = new User();
$authenticatedUser = $user->authenticate($email, $pass);

if (!$authenticatedUser) {
    http_response_code(401);
    echo json_encode([
        'success' => false,
        'message' => 'Correo o contraseña incorrectos'
    ]);
    exit;
}

// 🔐 Seguridad anti session fixation
Session::start();
session_regenerate_id(true);

Session::set('user_id', $authenticatedUser['id']);
Session::set('role', $authenticatedUser['role']);

echo json_encode([
    'success'  => true,
    'redirect' => 'index.html'
]);
