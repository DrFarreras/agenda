<?php

function ctrlDashboardEditView($request, $response, $container){
    $response->setTemplate("dashboardedit.php");
    return $response;
}