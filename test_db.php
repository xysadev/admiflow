<?php

require 'vendor/autoload.php';

use Xysdev\Admiflow\Config;
use Xysdev\Admiflow\Database;

// Cargar la configuración
Config::load();

// Probar la conexión usando la clase Database
try {
    // Crear una instancia de la clase Database
    $db = new Database();

    // Obtener el PDO de la instancia
    $pdo = $db->getPdo();

    // Ejecutar una consulta simple para verificar la conexión
    $stmt = $pdo->query('SELECT 1');
    $result = $stmt->fetch();

    echo "<html><body>";
    echo "<h2>Testing Database Connection</h2>";
    
    if ($result) {
        echo "<p>Conexión exitosa!</p>";
    } else {
        echo "<p>La prueba de conexión falló.</p>";
    }
    
    echo "</body></html>";
} catch (Exception $e) {
    echo "<html><body>";
    echo "<h2>Testing Database Connection</h2>";
    echo "<p>Error al conectar: " . $e->getMessage() . "</p>";
    echo "</body></html>";
}
