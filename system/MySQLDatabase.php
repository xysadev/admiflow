<?php

namespace Xysdev\Admiflow;

use PDO;
use PDOException;

class MySQLDatabase
{
    private $pdo;

    public function __construct()
    {
        // Construir el DSN utilizando la configuración
        $dsn = 'mysql:host=' . Config::get('db_host') . ';dbname=' . Config::get('db_name') . ';charset=utf8';
        $username = Config::get('db_user');
        $password = Config::get('db_pass');

        try {
            // Inicializar PDO con el DSN y las credenciales
            $this->pdo = new PDO($dsn, $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log('Error al conectar a la base de datos: ' . $e->getMessage());
            echo json_encode(['success' => false, 'message' => 'Error al conectar a la base de datos']);
            exit;
        }
    }

    public function getPdo()
    {
        return $this->pdo;
    }

    public function query($sql, $params = [])
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    public function fetch($sql, $params = [])
    {
        $stmt = $this->query($sql, $params);
        return $stmt->fetch();
    }

    public function fetchAll($sql, $params = [])
    {
        $stmt = $this->query($sql, $params);
        return $stmt->fetchAll();
    }

    public function execute($sql, $params = [])
    {
        $stmt = $this->query($sql, $params);
        return $stmt->rowCount();
    }
}
