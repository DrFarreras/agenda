<?php

function ctrlDoregister($request, $response, $container)
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Obtener datos del formulario
        $username = $request->get(INPUT_POST, 'nom_usuari');
        $surname = $request->get(INPUT_POST, 'cognoms');
        $name = $request->get(INPUT_POST, 'nom');
        $email = $request->get(INPUT_POST, 'correu_electronic');
        $role = $request->get(INPUT_POST, 'rol');
        $password = $request->get(INPUT_POST, 'contrasenya');

        // Obtener instancia de la base de datos
        $db = $container->users();

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
        $response->redirect("Location: main.php"); 
    }

    return $response;
}

