<?php
function ctrlmap($request, $response, $container){
    $response->setTemplate('map.php');
    return $response;
}