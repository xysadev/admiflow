<?php

namespace Xysdev\Admiflow;

class Auth
{
    /**
     * Cache interno de permisos (evita múltiples require).
     */
    private static $permissions = null;

    /**
     * Obtiene el mapa de permisos (cacheado).
     */
    private static function getPermissions()
    {
        if (self::$permissions === null) {
            self::$permissions = require __DIR__ . '/../config/permissions.php';
        }

        return self::$permissions;
    }

    /**
     * Inicia sesión del usuario.
     */
    public static function login(int $userId, string $role)
    {
        Session::regenerate();

        Session::set('user_id', $userId);
        Session::set('role', $role);
    }

    /**
     * Cierra sesión.
     */
    public static function logout()
    {
        Session::destroy();
    }

    /**
     * Verifica si el usuario está autenticado.
     */
    public static function check()
    {
        return Session::is_authenticated();
    }

    /**
     * Requiere que el usuario esté autenticado.
     */
    public static function requireLogin()
    {
        if (!self::check()) {
            self::deny(401, 'No autenticado');
        }
    }

    /**
     * Requiere que el usuario tenga un permiso específico.
     */
    public static function requirePermission(string $permission)
    {
        self::requireLogin();

        $role = Session::get('role');
        $permissionsMap = self::getPermissions();

        if (
            !isset($permissionsMap[$role]) ||
            !in_array($permission, $permissionsMap[$role], true)
        ) {
            self::deny(403, 'Permisos insuficientes');
        }
    }

    /**
     * Respuesta uniforme de denegación.
     */
    private static function deny(int $code, string $message)
    {
        http_response_code($code);

        echo json_encode([
            'success' => false,
            'message' => $message
        ]);

        exit;
    }

    /**
 * Devuelve datos básicos del usuario desde sesión.
 */
public static function user(): ?array
{
    if (!self::check()) {
        return null;
    }

    return [
        'id' => Session::get('user_id'),
        'role' => Session::get('role')
    ];
}

}
