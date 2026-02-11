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

$email = $_POST['email'] ?? '';
$pass  = $_POST['pass']  ?? '';

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

// ✅ Login OK
Session::set('user_id', $authenticatedUser['id']);
Session::set('role', $authenticatedUser['role']);

// 📌 Por ahora todos van al mismo lugar
echo json_encode([
    'success'  => true,
    'redirect' => 'index.html'
]);
