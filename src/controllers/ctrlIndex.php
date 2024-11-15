<?php

function ctrlIndex($request, $response, $container){
    $name = $request->get(INPUT_GET, "name");

    $response->set("name", $name);

    $response->setTemplate("index.php");

    //print_r($_SESSION);
    return $response;
}
