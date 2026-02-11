<?php

require '../../../vendor/autoload.php';
require '../../../system/user_functions.php'; 

use Xysdev\Admiflow\Client\Client;
use Xysdev\Admiflow\Session;

header('Content-Type: application/json');

Session::start();
Session::requireLogin();

$response = [
    'success' => false,
    'data' => [],
    'message' => ''
];

try {
    if ($_SERVER["REQUEST_METHOD"] === "GET") {

        $clientClass = new Client();
        $clientsList = $clientClass->getClientList();

        if ($clientsList !== false) {
            $response['success'] = true;
            $response['data'] = $clientsList;
        } else {
            $response['message'] = 'No se encontraron clientes.';
        }

    } else {
        http_response_code(405);
        $response['message'] = 'Método de solicitud no permitido';
    }
} catch (Exception $e) {
    http_response_code(500);
    $response['message'] = 'Error del servidor: ' . $e->getMessage();
}

echo json_encode($response);
exit;
