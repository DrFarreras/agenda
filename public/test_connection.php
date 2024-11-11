<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

try {
    echo "Iniciando prueba de conexión...<br>";
    
    require_once __DIR__ . '/../config/db.php';
    
    echo "Archivo de configuración cargado correctamente.<br>";
    
    if (isset($conn)) {
        $stmt = $conn->query('SELECT NOW() as tiempo');
        $resultado = $stmt->fetch();
        echo "¡Conexión exitosa! Hora del servidor: " . $resultado['tiempo'];
    } else {
        echo "Error: Variable \$conn no disponible";
    }
} catch (Exception $e) {
    echo "Error detallado: " . $e->getMessage() . "<br>";
    echo "Archivo: " . $e->getFile() . "<br>";
    echo "Línea: " . $e->getLine() . "<br>";
}