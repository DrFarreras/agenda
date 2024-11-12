<?php

function ctrlpaneleditview($request, $response, $container){
    $response->setTemplate("/views/admin-panel.php");
    return $response;
}