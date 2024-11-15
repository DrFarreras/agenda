<?php 

function ctrlDashboardEditUpdate($request, $response, $container) {
    $users = $container->Users();
    $id = $request->get(INPUT_POST, 'user_id'); // Se obtiene el ID del usuario desde el formulario

    // Obtener todos los datos del formulario
    $user = [
        'username' => $request->get(INPUT_POST, 'username'),
        'surname' => $request->get(INPUT_POST, 'surname'),
        'name' => $request->get(INPUT_POST, 'name'),
        'email' => $request->get(INPUT_POST, 'email'),
        'role' => $request->get(INPUT_POST, 'role'),
        'profile_img' => $request->get(INPUT_POST, "imgProfile") ?: null,
        'password' => $request->get(INPUT_POST, "Password") ?: null,
    ];

    // Llama a la función update en el modelo Users
    $users->update($id, $user);

    header("Location: /index.php?r=dashboard&status=success");
    exit();
}


