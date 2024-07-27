<?php

require '../../../vendor/autoload.php';
require '../../../system/user_functions.php';

use Xysdev\Admiflow\User\User;
use Xysdev\Admiflow\Session;

header('Content-Type: application/json');

Session::start();

$response = [
    'success' => false,
    'username' => 'Usuario Desconocido',
    'role' => 'Desconocido'
];

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    // Crear una instancia de User y obtener el usuario autenticado
    $userClass = new User();
    $user = $userClass->getAuthenticatedUser();

    if ($user) {
        // Usuario autenticado
        $response['success'] = true;
        $response['username'] = htmlspecialchars($user['nombre']);
        $response['role'] = htmlspecialchars($user['role']);
    } else {
        // Usuario no autenticado
        $response['username'] = 'Usuario Desconocido';
        $response['role'] = 'Desconocido';
    }
} else {
    // Método de solicitud no permitido
    http_response_code(405);
    $response['message'] = 'Método de solicitud no permitido';
}

echo json_encode($response);
?>
