<?php

namespace Xysdev\Admiflow;

class Auth
{
    public static function requirePermission(string $permission): void
    {
        Session::start();

        if (!Session::has('user_id')) {
            self::deny(401, 'No autenticado');
        }

        $role = Session::get('role');

        $permissionsMap = require __DIR__ . '/../config/permissions.php';

        if (
            !isset($permissionsMap[$role]) ||
            !in_array($permission, $permissionsMap[$role], true)
        ) {
            self::deny(403, 'Permisos insuficientes');
        }
    }

    private static function deny(int $code, string $message): void
    {
        http_response_code($code);
        echo json_encode([
            'success' => false,
            'message' => $message
        ]);
        exit;
    }
}
