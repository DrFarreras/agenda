<?php

function ctrlpaneledit($request, $response, $container){
    $users = $container->Users();
    $id = $request->get(INPUT_GET, "id");

    $user = $users->getByID($id);

    $response->set("user", $user);
    $response->setTemplate("dashboardedit.php");

    return $response;
}