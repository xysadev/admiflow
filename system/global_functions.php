<?php

namespace Xysdev\Admiflow;

/**
 * Get the base URL of the application.
 *
 * @return string
 */
function base_url() {
    // URL base de tu aplicación
    return 'http://localhost/admiflow/';
}

/**
 * Redirect to a different URL.
 *
 * @param string $url
 */
function redirect($url) {
    header("Location: $url");
    exit;
}

/**
 * Sanitize input data.
 *
 * @param string $data
 * @return string
 */
function sanitize_input($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

/**
 * Get a configuration value.
 *
 * @param string $key
 * @return mixed
 */
function config($key) {
    return Config::get($key);
}

/**
 * Check if a user is authenticated.
 *
 * @return bool
 */
function is_authenticated() {
    return isset($_SESSION['user_id']);
}

/**
 * Generate a random token.
 *
 * @param int $length
 * @return string
 */
function generate_token($length = 32) {
    return bin2hex(random_bytes($length / 2));
}

/**
 * Send an email.
 *
 * @param string $to
 * @param string $subject
 * @param string $message
 * @param string $headers
 * @return bool
 */
function send_email($to, $subject, $message, $headers) {
    return mail($to, $subject, $message, $headers);
}

/**
 * Generate a random password.
 *
 * @param int $length
 * @return string
 */
function generate_password($length = 12) {
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()';
    return substr(str_shuffle($chars), 0, $length);
}


/**
 * Get the URL of an asset file (CSS or JS).
 *
 * @param string $filePath The path to the asset file relative to the base URL.
 * @return string The URL of the asset file.
 */
function include_assets(string $filePath): string {
    $baseURL = base_url(); // Cambia esto a la URL base de tu proyecto
    $fullPath = __DIR__ . '/../' . $filePath;
    
    if (file_exists($fullPath)) {
        return $baseURL . $filePath;
    } else {
        return "Error: File not found - $fullPath";
    }
}


/**
 * Include a layout file.
 *
 * @param string $filePath The path to the layout file relative to the base URL.
 * @return void
 */
function include_layout(string $filePath): void {
    $fullPath = __DIR__ . '/../' . $filePath;
    if (file_exists($fullPath)) {
        include $fullPath;
    } else {
        echo "<p>Error: File not found - $fullPath</p>";
    }
}

/**
 * Validate an email address.
 *
 * @param string $email
 * @return bool
 */
function validate_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

/**
 * Generate a URL-friendly slug from a string.
 *
 * @param string $string
 * @return string
 */
function generate_slug($string) {
    return strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $string));
}

/**
 * Check if a directory exists, and create it if it does not.
 *
 * @param string $directory
 * @return void
 */
function check_or_create_directory($directory) {
    if (!is_dir($directory)) {
        mkdir($directory, 0777, true);
    }
}

/**
 * Format a date.
 *
 * @param string $date
 * @param string $format
 * @return string
 */
function format_date($date, $format = 'Y-m-d H:i:s') {
    $dateTime = new DateTime($date);
    return $dateTime->format($format);
}
