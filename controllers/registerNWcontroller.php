<?php

function registerNWcontroller($request, $response, $container) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Obtener datos del formulario
        $nom_usuari = $request->get(INPUT_POST, 'username');
        $cognom = $request->get(INPUT_POST, 'cognom');
        $nom = $request->get(INPUT_POST, 'nom');
        $correu_electronic = $request->get(INPUT_POST, 'correu_electronic');
        $rol = $request->get(INPUT_POST, 'rol');
        $contrassenya = $request->get(INPUT_POST, 'contrassenya');

        // Acceder al modelo de Usuarios desde el contenedor
        $db = $container->Users();

        // Insertar el nuevo usuario en la base de datos
        $db->add($nom_usuari, $cognom, $nom, $correu_electronic, $rol, $contrassenya);

        // Obtener el ID del último usuario insertado
        $userId = $db->lastInsertId(); // Asegúrate de que este método esté definido en tu clase Users

        // Recuperar la información del usuario usando el userId
        $userData = $db->getById($userId);

        // Crear una sesión si el usuario fue recuperado exitosamente
        if ($userData) {
            $response->setSession('usuario', $userData);
        }

        $response->redirect("perfil.php");
    }

    return $response;
} 