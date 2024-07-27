<?php

namespace Xysdev\Admiflow\User;

use Xysdev\Admiflow\Database;
use Xysdev\Admiflow\Session;

class User {
    private $pdo;

    public function __construct() {
        $db = new Database();
        $this->pdo = $db->getPdo();
    }

    public function authenticate($email, $pass) {
        $stmt = $this->pdo->prepare("SELECT id, pass, role FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($pass, $user['pass'])) {
            // Almacenar el ID del usuario en la sesión
            Session::set('user_id', $user['id']);
            Session::set('user_role', $user['role']);
            return $user;
        }
        return false;
    }

    public function createUser($email, $nombre, $pass, $role) {
        $passHash = password_hash($pass, PASSWORD_BCRYPT);
        $stmt = $this->pdo->prepare("INSERT INTO users (email, nombre, pass, role) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$email, $nombre, $passHash, $role]);
    }

    public function getUserNameById($id) {
        $stmt = $this->pdo->prepare("SELECT nombre FROM users WHERE id = ?");
        $stmt->execute([$id]);
        $user = $stmt->fetch();
        return $user ? $user['nombre'] : 'Usuario';
    }

    // Nuevo método para obtener los datos del usuario autenticado
    public function getAuthenticatedUser() {
        $userId = Session::get('user_id');
        if ($userId) {
            $stmt = $this->pdo->prepare("SELECT id, nombre, email, role FROM users WHERE id = ?");
            $stmt->execute([$userId]);
            $user = $stmt->fetch();
            return $user ? $user : false;
        }
        return false;
    }
}
