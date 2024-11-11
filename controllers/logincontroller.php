<?php

function logincontroller($request, $response, $container) {
    // Set the template for the login page
    $response->setTemplate('login.php');

    return $response;
} 