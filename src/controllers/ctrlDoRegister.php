<?php

function ctrlDoRegister($request, $response, $container)
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Obtener datos del formulario
        $username = $request->get(INPUT_POST, 'username');
        $surname = $request->get(INPUT_POST, 'surname');
        $name = $request->get(INPUT_POST, 'name');
        $email = $request->get(INPUT_POST, 'email');
        $role = $request->get(INPUT_POST, 'role');
        $password = $request->get(INPUT_POST, 'password');

        // Obtener instancia de la base de datos
        $db = $container->Users();

        // Insertar usuario en la base de datos
        $db->add($username, $surname, $name, $email, $role, $password);

        // Obtener el ID del último usuario insertado
        $userId = $db->lastInsertId(); // Este método debe estar definido en tu clase Users

        // Recuperar la información del usuario usando el userId
        $userData = $db->getById($userId);

        // Crear la sesión si el usuario fue recuperado exitosamente
        if ($userData) {
            $response->setSession('user', $userData);
        }

        // Redirigir a la página de perfil
        $response->redirect("Location: index.php"); 
    }

    return $response;
}

