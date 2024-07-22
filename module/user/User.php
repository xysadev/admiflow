<?php

namespace Xysdev\Admiflow\User;

use Xysdev\Admiflow\Database;

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
            return $user;
        }
        return false;
    }

    public function createUser($email, $nombre, $pass, $role) {
        $passHash = password_hash($pass, PASSWORD_BCRYPT);
        $stmt = $this->pdo->prepare("INSERT INTO users (email, nombre, pass, role) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$email, $nombre, $passHash, $role]);
    }
}
