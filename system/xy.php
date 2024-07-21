<?php

use Xysdev\Admiflow\Config;

// Inicializa la configuración
Config::load();

// URL del servidor de licencias en XysDev
const LICENSE_SERVER_URL = 'https://xysdev.com/api/verify_license';
const CACHE_FILE = __DIR__ . '/cache/license.admiflow';  // Ruta al archivo de caché
const CACHE_EXPIRY_TIME = 3600;  // 1 hora en segundos
const REQUIRED_USER_ID = 20;    // ID de usuario requerido

/**
 * Obtiene la clave de licencia desde la configuración.
 *
 * @return string La clave de licencia.
 */
function get_license_key(): string {
    return Config::get('license_key') ?? '';  // Asegúrate de que nunca sea null
}

/**
 * Lee el archivo de caché de licencia.
 *
 * @return array Contiene 'timestamp', 'valid' y 'user_id'.
 */
function get_cached_license(): array {
    if (!file_exists(CACHE_FILE)) {
        // Si el archivo no existe, se crea uno nuevo con datos por defecto
        save_license_cache([
            'timestamp' => 0,
            'valid' => false,
            'user_id' => null
        ]);
        return ['timestamp' => 0, 'valid' => false, 'user_id' => null];
    }

    $content = file_get_contents(CACHE_FILE);
    $lines = explode("\n", trim($content));

    $cache = [];
    foreach ($lines as $line) {
        list($key, $value) = explode(': ', $line, 2);
        $cache[$key] = trim($value);
    }

    return [
        'timestamp' => (int)($cache['timestamp'] ?? 0),
        'valid' => filter_var($cache['valid'] ?? false, FILTER_VALIDATE_BOOLEAN),
        'user_id' => $cache['user_id'] ?? null
    ];
}

/**
 * Guarda los datos de la licencia en el archivo de caché.
 *
 * @param array $data Los datos de la licencia a guardar.
 */
function save_license_cache(array $data): void {
    $content = sprintf(
        "timestamp: %d\nvalid: %s\nuser_id: %s",
        time(),
        $data['valid'] ? 'true' : 'false',
        $data['user_id'] ?? 'null'
    );
    file_put_contents(CACHE_FILE, $content);
}

/**
 * Verifica la licencia consultando el servidor de licencias.
 *
 * @return array Contiene 'valid' y 'user_id' si la licencia es válida.
 */
function check_license(): array {
    $licenseKey = get_license_key();

    // Depuración
    error_log("License Key: " . $licenseKey);

    if (empty($licenseKey)) {
        // La clave de licencia no está configurada
        return ['valid' => false, 'user_id' => null];
    }

    // Configuración del contexto de stream
    $context = stream_context_create([
        'http' => [
            'method' => 'GET',
            'header' => 'Accept: application/json',
            'timeout' => 10
        ]
    ]);

    // Realizar la solicitud
    $url = LICENSE_SERVER_URL . '?key=' . urlencode($licenseKey);
    $response = @file_get_contents($url, false, $context);

    // Depuración
    if ($response === false) {
        error_log("HTTP Error: Unable to fetch response from URL: " . $url);
        return ['valid' => false, 'user_id' => null];
    }

    // Decodifica la respuesta JSON
    $data = json_decode($response, true);

    // Depuración
    if (json_last_error() !== JSON_ERROR_NONE) {
        error_log("JSON Decode Error: " . json_last_error_msg());
        return ['valid' => false, 'user_id' => null];
    }

    error_log("Decoded Data: " . print_r($data, true));

    // Verifica si la respuesta indica que la licencia es válida
    return [
        'valid' => isset($data['valid']) && $data['valid'] === true,
        'user_id' => $data['user_id'] ?? null
    ];
}

/**
 * Verifica si la caché de licencia es válida.
 *
 * @return bool True si la caché es válida y no ha expirado.
 */
function is_license_cache_valid(): bool {
    $cache = get_cached_license();
    return (time() - $cache['timestamp']) < CACHE_EXPIRY_TIME && $cache['valid'];
}

// Verifica la licencia al iniciar el script

// if (!is_license_cache_valid()) {
//     $licenseData = check_license();
//     save_license_cache($licenseData);
// } else {
//     $licenseData = get_cached_license();
// }


// if (!$licenseData['valid']) {
//     die('Licencia inválida. La aplicación no puede continuar.');
// }

// $user_id = $licenseData['user_id'];

// if ($licenseData['user_id'] != REQUIRED_USER_ID) {
// 	die('Licencia inválida. La aplicación no puede continuar...');
// }

// El resto del código de la aplicación...

/**
 * Genera el contenido del pie de página.
 *
 * @return string El contenido HTML del pie de página.
 */
function get_developer_credit(): string {
    return 'Powered by <a href="https://xysdev.com/" target="_blank">XysDev</a>';
}

?>
