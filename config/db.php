<?php
return [
    'host' => 'mysql',  // Nombre del servicio en docker-compose
    'dbname' => 'agendafgrs',
    'user' => 'admin',
    'pass' => 'admin1234',
    'charset' => 'utf8mb4'
];
try {
    $dsn = "mysql:host={$host};port={$port};dbname={$dbname};charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ];
    
    $pdo = new PDO($dsn, $username, $password, $options);
    
    // Establecer el charset mediante una consulta
    $pdo->exec("SET NAMES utf8mb4");
    
    return $pdo;
    
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage() . 
        "\nDetalles de conexión:" .
        "\nHost: $host" .
        "\nPuerto: $port" .
        "\nBase de datos: $dbname" .
        "\nUsuario: $username" .
        "\nDSN: $dsn");
}
?>