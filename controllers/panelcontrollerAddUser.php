<?php

function panelcontrollerAddUser($request, $response, $container){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $nom_usuari = $request->get(INPUT_POST, 'username');
        $cognom = $request->get(INPUT_POST, 'cognom');
        $nom = $request->get(INPUT_POST, 'nom');
        $correu_electronic = $request->get(INPUT_POST, 'correu_electronic');
        $rol = $request->get(INPUT_POST, 'rol');
        $contrassenya = $request->get(INPUT_POST, 'contrassenya');
        $imatge_perfil = $request->get("FILES", 'imatge_perfil');

        $unique_id = uniqid();
        $dir_file = "uploads/img/" . $unique_id . "_" . $imatge_perfil['name'];
        move_uploaded_file($imatge_perfil["tmp_name"], $dir_file);

        $userModel = $container->Users();
        $userModel->addAllUser($nom_usuari, $cognom, $nom, $correu_electronic, $rol, $dir_file, $contrassenya);
    }

    $response->redirect("Location: admin-panel.php"); 
    return $response;
}