<?php

namespace Xysdev\Admiflow;

class Config
{
    private static $config = [];

    /**
     * Cargar la configuración y las variables de entorno.
     *
     * @param string|null $file Archivo de configuración adicional (opcional).
     * @throws \Exception Si alguna variable de entorno requerida no está cargada o el archivo de configuración no se encuentra.
     */
    public static function load($file = null)
    {
        // Cargar variables de entorno desde el archivo .env
        $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
        $dotenv->safeLoad();

        // Verificar si las variables de entorno están cargadas
        $requiredEnvVars = [
            'BASE_URL', 
            'DB_HOST', 
            'DB_NAME', 
            'DB_USER', 
            'DB_PASS',
            'DB_TRUST_SERVER_CERTIFICATE' 
        ];
        foreach ($requiredEnvVars as $var) {
            if (empty($_ENV[$var])) {
                throw new \Exception("Variable de entorno no cargada: $var. Verifica el archivo .env.");
            }
        }

        // Asignar variables de entorno a la configuración
        self::$config = [
            'base_url' => $_ENV['BASE_URL'],
            'db_host' => $_ENV['DB_HOST'],
            'db_name' => $_ENV['DB_NAME'],
            'db_user' => $_ENV['DB_USER'],
            'db_pass' => $_ENV['DB_PASS'],
            'db_trust_server_certificate' => $_ENV['DB_TRUST_SERVER_CERTIFICATE'],
        ];

        // Cargar configuración adicional desde un archivo si se proporciona
        if ($file && file_exists($file)) {
            $additionalConfig = require $file;
            self::$config = array_merge(self::$config, $additionalConfig);
        } elseif ($file) {
            throw new \Exception("Archivo de configuración no encontrado: $file");
        }
    }

    /**
     * Obtener un valor de configuración.
     *
     * @param string $key La clave de configuración.
     * @return mixed El valor de la configuración, o null si la clave no existe.
     */
    public static function get($key)
    {
        return self::$config[$key] ?? null;
    }
}
