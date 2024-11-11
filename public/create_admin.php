<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../models/imagespdo.php';

$config = require __DIR__ . '/../config/db.php';
$usuarisPDO = new \Daw\UsuarisPDO($config);

$nombre = 'alex';
$apellido = 'moncayo';
$email = 'amoncayobudo@gmail.com';
$usuario = 'admin';
$password = 'admin12345';

$resultado = $usuarisPDO->createAdmin($nombre, $apellido, $email, $usuario, $password);

if (isset($resultado['success'])) {
    echo "Usuario administrador creado con éxito.";
} else {
    echo "Error al crear el usuario administrador: " . $resultado['error'];
}
?>
