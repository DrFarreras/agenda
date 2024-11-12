<?php

function ctrlindex($request, $response, $container){
    $name = $request->get(INPUT_GET, "name");

    $response->set("name", $name);

    $response->setTemplate("/views/main.php");

    //print_r($_SESSION);
    return $response;
}
