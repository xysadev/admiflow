<?php

require '../../../vendor/autoload.php';

use Xysdev\Admiflow\Client\Client;
use Xysdev\Admiflow\Auth;
use Xysdev\Admiflow\Session;

header('Content-Type: application/json');

$response = [
    'success' => false,
    'data'    => null,
    'message' => ''
];

try {

    /* =========================
       METHOD
    ========================= */
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        http_response_code(405);
        throw new Exception('Método no permitido');
    }

    /* =========================
       AUTH
    ========================= */
    Auth::requirePermission('client.create');

    /* =========================
       CSRF (VALIDADO EXPLÍCITO)
    ========================= */
    $csrf = $_SERVER['HTTP_X_CSRF_TOKEN'] ?? '';

    if (!$csrf) {
        http_response_code(419);
        throw new Exception('CSRF token faltante');
    }

    Session::requireCsrf($csrf);

    /* =========================
       INPUT
    ========================= */
    $raw = file_get_contents('php://input');
    $input = json_decode($raw, true);

    if (!is_array($input)) {
        http_response_code(400);
        throw new Exception('JSON inválido');
    }

    if (empty($input['nombre'])) {
        http_response_code(422);
        throw new Exception('El nombre es obligatorio');
    }

    /* =========================
       CREATE
    ========================= */
    $client = new Client();

    $clientData = $client->create([
        'nombre'    => trim($input['nombre']),
        'dni'       => trim($input['dni'] ?? ''),
        'celular'   => trim($input['celular'] ?? ''),
        'email'     => trim($input['email'] ?? ''),
        'direccion' => trim($input['direccion'] ?? ''),
    ]);

    if (!$clientData || !isset($clientData['id'])) {
        http_response_code(500);
        throw new Exception('Error al crear cliente');
    }

    /* =========================
       RESPONSE
    ========================= */
    $response['success'] = true;
    $response['data'] = $clientData;

} catch (Throwable $e) {

    if (http_response_code() === 200) {
        http_response_code(400);
    }

    $response['message'] = $e->getMessage();
}

echo json_encode($response);
exit;
