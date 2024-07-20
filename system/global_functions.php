<?php

use System\Config;

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
        echo "Error: File not found - $fullPath";
    }
}