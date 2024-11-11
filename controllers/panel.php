<?php

function panelcontroller($request, $response, $container){
    $response-> setTemplate("admin-panel.php");
    return $response;
} 