<?php

namespace Xysdev\Admiflow\User;

use Xysdev\Admiflow\Database;
use Xysdev\Admiflow\Session;

class User
{
    private $pdo;

    public function __construct()
    {
        $db = new Database();
        $this->pdo = $db->getPdo();
    }

    /**
     * Autentica usuario.
     * NO maneja sesión. Solo valida credenciales.
     */
    public function authenticate($email, $pass)
    {
        $stmt = $this->pdo->prepare(
            "SELECT id, pass, role FROM users WHERE email = ? LIMIT 1"
        );

        $stmt->execute([$email]);
        $user = $stmt->fetch(\PDO::FETCH_ASSOC);

        // Si no existe el usuario, usamos password_verify contra hash falso
        // para evitar timing attacks.
        $dummyHash = '$2y$10$abcdefghijklmnopqrstuv';
        $hashToCheck = $user['pass'] ?? $dummyHash;

        if (!password_verify($pass, $hashToCheck)) {
            return false;
        }

        if (!$user) {
            return false;
        }

        return [
            'id'   => (int) $user['id'],
            'role' => (string) $user['role']
        ];
    }

    /**
     * Crear usuario nuevo.
     */
    public function createUser($email, $nombre, $pass, $role)
    {
        $passHash = password_hash($pass, PASSWORD_BCRYPT);

        $stmt = $this->pdo->prepare(
            "INSERT INTO users (email, nombre, pass, role) VALUES (?, ?, ?, ?)"
        );

        return $stmt->execute([$email, $nombre, $passHash, $role]);
    }

    /**
     * Obtener nombre por ID.
     */
    public function getUserNameById($id)
    {
        $stmt = $this->pdo->prepare(
            "SELECT nombre FROM users WHERE id = ? LIMIT 1"
        );

        $stmt->execute([$id]);
        $user = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $user ? $user['nombre'] : 'Usuario';
    }

    /**
     * Obtener usuario autenticado desde sesión.
     */
    public function getAuthenticatedUser()
    {
        $userId = Session::get('user_id');

        if (!$userId) {
            return false;
        }

        $stmt = $this->pdo->prepare(
            "SELECT id, nombre, email, role FROM users WHERE id = ? LIMIT 1"
        );

        $stmt->execute([$userId]);
        $user = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $user ?: false;
    }
}
