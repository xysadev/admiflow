<?php

// Cargar el autoloader de Composer
require 'vendor/autoload.php';
use Xysdev\Admiflow\Config;

// Los archivos globales ya se cargan automáticamente
// No es necesario incluirlos manualmente aquí

echo "<html><body>";

// Test para base_url()
echo "<h2>Testing base_url()</h2>";
echo "<p>Base URL: " . base_url() . "</p><br>";

// Test para sanitize_input()
echo "<h2>Testing sanitize_input()</h2>";
$input = "<script>alert('test');</script>";
$sanitized = sanitize_input($input);
echo "<p>Sanitized input: " . $sanitized . "</p><br>";

// Test para config()
echo "<h2>Testing config()</h2>";
echo "<p>Base URL from config: " . config('base_url') . "</p>";
echo "<p>Database host from config: " . config('db_host') . "</p><br>";

// Test para is_authenticated()
echo "<h2>Testing is_authenticated()</h2>";
session_start();
$_SESSION['user_id'] = 1;
echo "<p>User authenticated: " . (is_authenticated() ? 'Yes' : 'No') . "</p>";
unset($_SESSION['user_id']);
echo "<p>User authenticated after unset: " . (is_authenticated() ? 'Yes' : 'No') . "</p><br>";

// Test para generate_token()
echo "<h2>Testing generate_token()</h2>";
echo "<p>Generated token: " . generate_token() . "</p>";
echo "<p>Generated token with custom length: " . generate_token(64) . "</p><br>";

// Test para generate_password()
echo "<h2>Testing generate_password()</h2>";
echo "<p>Generated password: " . generate_password() . "</p>";
echo "<p>Generated password with custom length: " . generate_password(16) . "</p><br>";

// Test para include_layout()
echo "<h2>Testing include_layout()</h2>";
echo "<p>Including layout file...</p>";
include_layout('template/ui8/layouts/test.layout.php');  // Ruta actualizada para incluir el layout
echo "<br>";

echo "<p>All tests completed.</p>";

echo "</body></html>";
