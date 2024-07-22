<?php

require '../../../vendor/autoload.php';

use Xysdev\Admiflow\User\User;

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $user = new User();
    $authenticatedUser = $user->authenticate($email, $pass);

    if ($authenticatedUser) {
        $_SESSION['user_id'] = $authenticatedUser['id'];
        $_SESSION['role'] = $authenticatedUser['role'];
        echo "Login successful!";
        header("Location: ../../../index.php"); 
        exit(); 
    } else {
        echo "Correo o contraseña incorrectos.";
    }
}
