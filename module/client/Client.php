<?php

namespace Xysdev\Admiflow\Client;

use Xysdev\Admiflow\Database;
use PDO;

class Client
{
    private PDO $pdo;

    public function __construct()
    {
        $db = new Database();
        $this->pdo = $db->getPdo();
    }

    /* =========================
       LISTAR CLIENTES
    ========================= */
    public function getClientList(): array
    {
        $stmt = $this->pdo->query("
            SELECT 
                id,
                nombre,
                dni,
                celular,
                direccion,
                email,
                created_at
            FROM clientes
            ORDER BY id DESC
        ");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /* =========================
       CREAR CLIENTE
    ========================= */
    public function create(array $data): array
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO clientes (
                nombre,
                dni,
                celular,
                direccion,
                email,
                created_at,
                updated_at
            ) VALUES (
                :nombre,
                :dni,
                :celular,
                :direccion,
                :email,
                NOW(),
                NOW()
            )
        ");

        $stmt->execute([
            ':nombre'    => $data['nombre'],
            ':dni'       => $data['dni'] ?: null,
            ':celular'   => $data['celular'] ?: null,
            ':direccion' => $data['direccion'] ?: null,
            ':email'     => $data['email'] ?: null,
        ]);

        $id = (int)$this->pdo->lastInsertId();

        return $this->getById($id);
    }

    /* =========================
       ACTUALIZAR CLIENTE
    ========================= */
    public function update(int $id, array $data): bool
    {
        $stmt = $this->pdo->prepare("
            UPDATE clientes SET
                nombre = :nombre,
                dni = :dni,
                celular = :celular,
                direccion = :direccion,
                email = :email,
                updated_at = NOW()
            WHERE id = :id
        ");

        return $stmt->execute([
            ':id'        => $id,
            ':nombre'    => $data['nombre'],
            ':dni'       => $data['dni'] ?: null,
            ':celular'   => $data['celular'] ?: null,
            ':direccion' => $data['direccion'] ?: null,
            ':email'     => $data['email'] ?: null,
        ]);
    }

    /* =========================
       OBTENER CLIENTE POR ID
    ========================= */
    public function getById(int $id): ?array
    {
        $stmt = $this->pdo->prepare("
            SELECT 
                id,
                nombre,
                dni,
                celular,
                direccion,
                email,
                created_at,
                updated_at
            FROM clientes
            WHERE id = :id
            LIMIT 1
        ");

        $stmt->execute([':id' => $id]);
        $client = $stmt->fetch(PDO::FETCH_ASSOC);

        return $client ?: null;
    }

    public function deleteClient(int $id): bool {
        $stmt = $this->pdo->prepare("DELETE FROM clientes WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }



}

