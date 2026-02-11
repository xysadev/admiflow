<?php

require '../../../vendor/autoload.php';

use Xysdev\Admiflow\Client\Client;
use Xysdev\Admiflow\Auth;
use Xysdev\Admiflow\Session;

header('Content-Type: application/json');

$response = [
    'success' => false
];

try {

    /* =========================
       MÉTODO
    ========================= */
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        http_response_code(405);
        throw new Exception('Método no permitido');
    }

    /* =========================
       AUTH + CSRF
    ========================= */
    Auth::requirePermission('client.update');
    Session::requireCsrf($_SERVER['HTTP_X_CSRF_TOKEN'] ?? null);

    /* =========================
       INPUT
    ========================= */
    $data = json_decode(file_get_contents('php://input'), true);

    if (
        !isset($data['id']) ||
        !is_numeric($data['id']) ||
        (int)$data['id'] <= 0
    ) {
        http_response_code(400);
        throw new Exception('ID de cliente inválido');
    }

    if (empty($data['nombre'])) {
        http_response_code(422);
        throw new Exception('El nombre es obligatorio');
    }

    /* =========================
       UPDATE
    ========================= */
    $client = new Client();

    $updated = $client->update(
        (int)$data['id'],
        [
            'nombre'    => trim($data['nombre']),
            'dni'       => trim($data['dni'] ?? ''),
            'celular'   => trim($data['celular'] ?? ''),
            'email'     => trim($data['email'] ?? ''),
            'direccion' => trim($data['direccion'] ?? ''),
        ]
    );

    if (!$updated) {
        http_response_code(500);
        throw new Exception('No se pudo actualizar el cliente');
    }

    $response['success'] = true;

} catch (Throwable $e) {

    if (http_response_code() === 200) {
        http_response_code(400);
    }

    $response['message'] = $e->getMessage();
}

echo json_encode($response);
exit;
