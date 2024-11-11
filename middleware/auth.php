<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/**
 * Verifica si el usuario está autenticado y tiene los permisos necesarios
 */
function checkAuth() {
    // Si no hay sesión de usuario, redirigir al login
    if (!isset($_SESSION['usuario']) || empty($_SESSION['usuario'])) {
        header("Location: login.php");
        exit();
    }

    // Obtener la página actual
    $current_page = basename($_SERVER['PHP_SELF']);

    // Páginas que requieren ser administrador
    $admin_pages = ['admin-panel.php'];

    // Si es una página de admin y el usuario no es admin, redirigir
    if (in_array($current_page, $admin_pages) && !isAdmin()) {
        header("Location: main.php");
        exit();
    }
}

/**
 * Verifica si el usuario está logueado
 */
function isLoggedIn() {
    return isset($_SESSION['usuario']) && !empty($_SESSION['usuario']);
}

/**
 * Verifica si el usuario es administrador
 */
function isAdmin() {
    return isset($_SESSION['usuario']['rol']) && $_SESSION['usuario']['rol'] === 'admin';
}

/**
 * Redirige si el usuario ya está logueado
 * (útil para páginas de login y registro)
 */
function redirectIfLoggedIn() {
    if (isLoggedIn()) {
        header("Location: main.php");
        exit();
    }
}