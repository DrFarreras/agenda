<?php
//This controller will handle the home page

function ctrlHome($request, $response, $container) {

    $response->set("title", "Home - agendafigueres");
    $response->set("heading", "Home");
    $response->setTemplate("main.php");

    return $response;
}