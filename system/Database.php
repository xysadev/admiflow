<?php 

namespace Xysdev\Admiflow;

use PDO;
use PDOException;

class Database
{
    private $pdo;

    public function __construct()
    {
        $dbType = Config::get('db_type');

        switch ($dbType) {
            case 'sqlsrv':
                $this->pdo = $this->createSqlServerConnection();
                break;
            case 'mysql':
                $this->pdo = $this->createMySqlConnection();
                break;
            default:
                throw new \Exception("Tipo de base de datos no soportado: $dbType");
        }
    }

    private function createSqlServerConnection()
    {
        $trustServerCertificate = Config::get('db_trust_server_certificate') === 'true' ? 'TrustServerCertificate=true' : '';
        $dsn = 'sqlsrv:Server=' . Config::get('db_host') . ';Database=' . Config::get('db_name') . ($trustServerCertificate ? ";$trustServerCertificate" : '');
        $username = Config::get('db_user');
        $password = Config::get('db_pass');

        try {
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        } catch (PDOException $e) {
            error_log('Error al conectar a la base de datos SQL Server: ' . $e->getMessage());
            echo json_encode(['success' => false, 'message' => 'Error al conectar a la base de datos SQL Server']);
            exit;
        }
    }

    private function createMySqlConnection()
    {
        $dsn = 'mysql:host=' . Config::get('db_host') . ';dbname=' . Config::get('db_name') . ';charset=utf8';
        $username = Config::get('db_user');
        $password = Config::get('db_pass');

        try {
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        } catch (PDOException $e) {
            error_log('Error al conectar a la base de datos MySQL: ' . $e->getMessage());
            echo json_encode(['success' => false, 'message' => 'Error al conectar a la base de datos MySQL']);
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
