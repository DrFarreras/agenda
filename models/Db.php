<?php

class Db {
    private $pdo;

    public function __construct($config) {
        try {
            $dsn = "mysql:host=" . $config['host'] . ";dbname=" . $config['dbname'] . ";charset=" . $config['charset'];
            $this->pdo = new PDO($dsn, $config['user'], $config['pass']);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    public function get() {
        return $this->pdo;
    }
}

?>