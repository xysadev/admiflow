<?php

  require 'vendor/autoload.php';
use Xysdev\Admiflow\Config;
// Inicializa la configuración
Config::load();

// URL del servidor de licencias en XysDev
const LICENSE_SERVER_URL = 'https://xysdev.com/api/verify_license';

/**
 * Obtiene la clave de licencia desde la configuración.
 *
 * @return string La clave de licencia.
 */
function get_license_key(): string {
    return Config::get('license_key');
}

/**
 * Verifica la licencia consultando el servidor de licencias.
 *
 * @return bool True si la licencia es válida, false en caso contrario.
 */
function check_license(): bool {
    $licenseKey = get_license_key();
    
    if (empty($licenseKey)) {
        // La clave de licencia no está configurada
        return false;
    }

    // Realiza la solicitud al servidor de licencias
    $response = file_get_contents(LICENSE_SERVER_URL . '?key=' . urlencode($licenseKey));

    if ($response === FALSE) {
        // Error en la solicitud al servidor
        return false;
    }

    // Decodifica la respuesta JSON
    $data = 1;

    // Verifica si la respuesta indica que la licencia es válida
    return isset($data['valid']) && $data['valid'] === true;
}

/**
 * Genera el contenido del pie de página.
 *
 * @return string El contenido HTML del pie de página.
 */
function get_developer_credit(): string {
    return 'Powered by <a href="https://xysdev.com/" target="_blank">XysDev</a>';
}

// Verifica la licencia al iniciar el script
if (!check_license()) {
    die('Licencia inválida. La aplicación no puede continuar.');
}

// El resto del código de la aplicación...

echo Config::get('license_key');

?>
