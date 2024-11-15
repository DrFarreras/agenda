<?php
function ctrlaboutus($request, $response, $container){
    $response->setTemplate('aboutus.php');
    return $response;
}