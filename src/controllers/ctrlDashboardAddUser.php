<?php

function ctrlDashboardAddUser($request, $response, $container){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $username = $request->get(INPUT_POST, 'username');
        $surname = $request->get(INPUT_POST, 'surname');
        $name = $request->get(INPUT_POST, 'name');
        $role = $request->get(INPUT_POST, 'userole');
        $profile_img = $request->get("FILES", 'img_profile');
        $email = $request->get(INPUT_POST, 'email');
        $password = $request->get(INPUT_POST, 'password');

        $unique_id = uniqid();
        $dir_file = "uploads/img/" . $unique_id . "_" . $profile_img['name'];
        move_uploaded_file($profile_img["tmp_name"], $dir_file);

        $userModel = $container->Users();
        $userModel->addAllUser($username, $surname, $name, $email, $role, $dir_file, $password);
    }

    $response->redirect("Location: index.php"); 
    return $response;
}