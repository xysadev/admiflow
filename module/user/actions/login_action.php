<?php

require '../../../vendor/autoload.php'; // Asegúrate de que la ruta sea correcta

use Xysdev\Admiflow\User\User;

session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $user = new User();
    $authenticatedUser = $user->authenticate($email, $pass);

    if ($authenticatedUser) {
        $_SESSION['user_id'] = $authenticatedUser['id'];
        $_SESSION['role'] = $authenticatedUser['role'];
        echo "Login successful!"; // Cambiado para depuración
        header("Location: ../index.php"); // Redirigir al index
        exit(); // Añadido para asegurarse de que no se ejecute más código después de la redirección
    } else {
        echo "Correo o contraseña incorrectos.";
    }
}
