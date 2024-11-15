<?php

include "../src/config.php";

$db = $config["db"]["name"];
echo "Creando la base de datos: {$db} \n";
$dsn = "mysql:dbname={$config['db']['name']};host={$config['db']['host']}";

$user = $config["db"]["user"];
$password = $config["db"]["password"];
try {
    $sql = new PDO($dsn, $user, $password);
    echo "Conexión exitosa\n";
} catch (\PDOException $e) {
    die('Ha fallado la conexión: ' . $e->getMessage());
}