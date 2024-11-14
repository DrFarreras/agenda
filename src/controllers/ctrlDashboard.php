<?php

function ctrlDashboard($request, $response, $container){
    $response-> setTemplate("dashboard.php");
    return $response;
} 