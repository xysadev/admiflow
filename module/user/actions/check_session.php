<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../../../vendor/autoload.php';
require '../../../system/user_functions.php';

use Xysdev\Admiflow\Session;

header('Content-Type: application/json');

// Iniciar la sesión
Session::start();

$response = [
    'loggedIn' => false,
    'username' => 'Usuario Desconocido',
    'role' => 'Desconocido'
];

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    // Verificar si el usuario está autenticado
    if (Session::is_authenticated()) {
        // Usuario autenticado
        $userClass = new Xysdev\Admiflow\User\User();
        $user = $userClass->getAuthenticatedUser();

        if ($user) {
            $response['loggedIn'] = true;
            $response['username'] = htmlspecialchars($user['nombre']);
            $response['role'] = htmlspecialchars($user['role']);
        }
    }
} else {
    // Método de solicitud no permitido
    http_response_code(405);
    $response['message'] = 'Método de solicitud no permitido';
}

echo json_encode($response);
?>
