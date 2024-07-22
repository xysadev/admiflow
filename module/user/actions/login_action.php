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
<<<<<<< HEAD
        echo json_encode(['success' => true]);
=======
        echo "Login successful!";
        header("Location: ../../../index.php"); 
        exit(); 
>>>>>>> a1e5048edad68d1ca78c13d8f4e15ceb9920a11f
    } else {
        echo json_encode(['success' => false, 'message' => 'Correo o contraseña incorrectos.']);
    }
}
