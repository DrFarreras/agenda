<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function isAuthenticated() {
    return isset($_SESSION['usuario']) && !empty($_SESSION['usuario']['id']);
}

function checkAuth() {
    if (!isAuthenticated()) {
        header('Location: /public/login.php');
        exit();
    }
}

function logout() {
    session_start();
    session_unset();
    session_destroy();
    header('Location: /public/login.php');
    exit();
} 