<?php 

function ctrlDashboardList($request, $response, $container){

    // Obtiene la instancia del modelo Users
    $usuarioModel = $container->Users();

    // Llama al método para obtener todos los usuarios
    $usuarios = $usuarioModel->getAllUsers();

    // Pasa los datos a la vista
    $response->set('usuarios', $usuarios);
    $response->setTemplate('dashboardusers.php'); // La vista que muestra la tabla

    return $response;
}