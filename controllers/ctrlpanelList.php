<?php 

function ctrlpanelList($request, $response, $container){

    // Obtiene la instancia del modelo Users
    $usuarioModel = $container->users();

    // Llama al método para obtener todos los usuarios
    $usuarios = $usuarioModel->getAllUsers();

    // Pasa los datos a la vista
    $response->set('usuarios', $usuarios);
    $response->setTemplate('/views/admin-panel.php'); // La vista que muestra la tabla

    return $response;
}