<?php

$loginUrl = 'http://localhost/admiflow/module/user/actions/login_action.php';

// Datos de prueba
$postData = [
    'email' => 'juanserrano173@gmail.com',
    'pass' => '123456'
];

// Inicializar cURL
$ch = curl_init($loginUrl);

// Configurar cURL
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/x-www-form-urlencoded',
]);

// Ejecutar la solicitud y obtener la respuesta
$response = curl_exec($ch);

// Comprobar si hubo errores
if ($response === false) {
    echo 'Error: ' . curl_error($ch);
} else {
    echo 'Response: ' . $response;
}

// Cerrar cURL
curl_close($ch);
