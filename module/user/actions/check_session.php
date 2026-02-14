<?php

require '../../../vendor/autoload.php';

use Xysdev\Admiflow\Auth;

header('Content-Type: application/json');

// Solo GET
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode([
        'success' => false,
        'message' => 'Método no permitido'
    ]);
    exit;
}

// Verificar autenticación
if (!Auth::check()) {
    echo json_encode([
        'loggedIn' => false
    ]);
    exit;
}

// Obtener usuario desde sesión (sin DB)
$user = Auth::user();

echo json_encode([
    'loggedIn' => true,
    'username' => $user['nombre'] ?? 'Usuario',
    'role' => $user['role'] ?? null
]);
