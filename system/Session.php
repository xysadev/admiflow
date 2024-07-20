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
}
