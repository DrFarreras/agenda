<?php
function isAdmin() {
    return isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin';
}

function requireAdmin() {
    if (!isAdmin()) {
        header("Location: main.php");
        exit();
    }
} 