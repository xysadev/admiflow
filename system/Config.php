<?php

namespace System;

class Config
{
    private static $config = [];

    public static function load($file)
    {
        $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
        $dotenv->safeLoad();
        $requiredEnvVars = ['BASE_URL', 'DB_HOST', 'DB_NAME', 'DB_USER', 'DB_PASS'];
        foreach ($requiredEnvVars as $var) {
            if (empty($_ENV[$var])) {
                throw new \Exception("Variable de entorno no cargada: $var. Verifica el archivo .env.");
            }
        }

        if (file_exists($file)) {
            self::$config = require $file;

            foreach ($requiredEnvVars as $var) {
                $key = strtolower($var);
                self::$config[$key] = $_ENV[$var];
            }
        } else {
            throw new \Exception("Archivo de configuración no encontrado: $file");
        }
    }

    public static function get($key)
    {
        return self::$config[$key] ?? null;
    }
}
