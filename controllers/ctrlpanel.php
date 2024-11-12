<?php

function ctrlpanel($request, $response, $container){
    $response-> setTemplate("dashboard.php");
    return $response;
} 