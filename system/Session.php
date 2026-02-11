<?php

namespace Xysdev\Admiflow;

class Session
{
    /**
     * Iniciar la sesión si aún no ha sido iniciada.
     */
    public static function start()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**
     * Establecer una variable de sesión.
     *
     * @param string $key
     * @param mixed $value
     */
    public static function set($key, $value)
    {
        self::start();
        $_SESSION[$key] = $value;
    }

    /**
     * Obtener una variable de sesión.
     *
     * @param string $key
     * @return mixed
     */
    public static function get($key)
    {
        self::start();
        return $_SESSION[$key] ?? null;
    }

    /**
     * Verificar si una variable de sesión está establecida.
     *
     * @param string $key
     * @return bool
     */
    public static function has($key)
    {
        self::start();
        return isset($_SESSION[$key]);
    }

    /**
     * Eliminar una variable de sesión.
     *
     * @param string $key
     */
    public static function delete($key)
    {
        self::start();
        unset($_SESSION[$key]);
    }

    /**
     * Destruir la sesión.
     */
    public static function destroy()
    {
        self::start();
        session_unset();
        session_destroy();
    }

    /**
     * Verificar si el usuario está autenticado.
     *
     * @return bool
     */
    public static function is_authenticated()
    {
        self::start();
        return self::has('user_id');
    }



    /**
 * Requiere que el usuario esté autenticado
 * (middleware manual)
 */
public static function requireLogin(): void
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
 * Genera o devuelve el CSRF token
 */
public static function csrfToken(): string
{
    self::start();

    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

    return $_SESSION['csrf_token'];
}

/**
 * Valida el CSRF token recibido
 */
public static function requireCsrf(string $token = null): void
{
    self::start();

    if (
        !$token ||
        !isset($_SESSION['csrf_token']) ||
        !hash_equals($_SESSION['csrf_token'], $token)
    ) {
        throw new \Exception('CSRF token inválido');
    }
}




}
