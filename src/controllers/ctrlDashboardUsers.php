<?php
function ctrlDashboardUsers($request, $response, $container){
    $response->setTemplate('dashboardusers.php');
    return $response;
}