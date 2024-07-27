<?php

use Xysdev\Admiflow\User\User;

use Xysdev\Admiflow\Session;

// Verifica si el usuario tiene un rol específico
function hasRole($role) {
    return Session::get('role') === $role;
}

// Redirige a una URL si el usuario tiene un rol específico
function redirectIfRole($role, $url) {
    if (hasRole($role)) {
        header("Location: $url");
        exit();
    }
}

// Redirige a una URL si el usuario no tiene un rol específico
function redirectIfNotRole($role, $url) {
    if (!hasRole($role)) {
        header("Location: $url");
        exit();
    }
}

// Verifica si el usuario es admin o superadmin
function isAdminOrSuperadmin() {
    return hasRole('admin') || hasRole('superadmin');
}

// Verifica si el usuario es superadmin
function isSuperadmin() {
    return hasRole('superadmin');
}

// Verifica si el usuario es admin
function isAdmin() {
    return hasRole('admin');
}

?>
