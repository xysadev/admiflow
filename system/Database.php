<?php

namespace System;

use PDO;
use PDOException;

class Database
{
    private $pdo;

    public function __construct()
    {
        $dsn = 'sqlsrv:Server=' . Config::get('db_host') . ';Database=' . Config::get('db_name');
        $username = Config::get('db_user');
        $password = Config::get('db_pass');

        try {
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
