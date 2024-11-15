<?php

function ctrlDashboardEditView($request, $response, $container) {
    // Your logic here
    $response->setTemplate('dashboardevents.php');
    return $response;
}