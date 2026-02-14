<?php

namespace Xysdev\Admiflow;

class Session
{
    /**
     * Iniciar la sesión si aún no ha sido iniciada.
     */
    public static function start()
    {
        if (session_status() === PHP_SESSION_NONE) {

            // 🔐 Configuración segura
            ini_set('session.use_strict_mode', 1);
            ini_set('session.use_only_cookies', 1);
            ini_set('session.cookie_httponly', 1);

            // Activar secure solo si hay HTTPS
            if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') {
                ini_set('session.cookie_secure', 1);
            }

            ini_set('session.cookie_samesite', 'Strict');

            session_start();
        }
    }

    /**
     * Regenerar el ID de sesión (anti session fixation).
     */
    public static function regenerate()
    {
        self::start();
        session_regenerate_id(true);
    }

    /**
     * Establecer una variable de sesión.
     */
    public static function set($key, $value)
    {
        self::start();
        $_SESSION[$key] = $value;
    }

    /**
     * Obtener una variable de sesión.
     */
    public static function get($key)
    {
        self::start();
        return $_SESSION[$key] ?? null;
    }

    /**
     * Verificar si una variable de sesión está establecida.
     */
    public static function has($key)
    {
        self::start();
        return isset($_SESSION[$key]);
    }

    /**
     * Eliminar una variable de sesión.
     */
    public static function delete($key)
    {
        self::start();
        unset($_SESSION[$key]);
    }

    /**
     * Destruir completamente la sesión.
     */
    public static function destroy()
    {
        self::start();

        $_SESSION = [];

        if (ini_get('session.use_cookies')) {
            $params = session_get_cookie_params();

            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params['path'],
                $params['domain'],
                $params['secure'],
                $params['httponly']
            );
        }

        session_destroy();
    }

    /**
     * Verificar si el usuario está autenticado.
     */
    public static function is_authenticated()
    {
        self::start();
        return self::has('user_id');
    }

    /**
     * Requiere que el usuario esté autenticado.
     */
    public static function requireLogin()
    {
        self::start();

        if (!self::is_authenticated()) {
            http_response_code(401);
            echo json_encode([
                'success' => false,
                'message' => 'No autenticado'
            ]);
            exit;
        }
    }

    /**
     * Genera o devuelve el CSRF token.
     */
    public static function csrfToken()
    {
        self::start();

        if (!isset($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }

        return $_SESSION['csrf_token'];
    }

    /**
     * Valida el CSRF token recibido.
     */
    public static function requireCsrf($token = null)
    {
        self::start();

        if (
            !$token ||
            !isset($_SESSION['csrf_token']) ||
            !hash_equals($_SESSION['csrf_token'], $token)
        ) {
            http_response_code(419);
            echo json_encode([
                'success' => false,
                'message' => 'CSRF token inválido'
            ]);
            exit;
        }
    }
}
