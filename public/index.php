<?php

/**
 * Aquest fitxer és un exemple de Front Controller, pel qual passen totes les requests.
 */

include "../src/config.php";
include "../src/controllers/ctrlIndex.php";
include "../src/controllers/ctrlJson.php";
include '../src/controllers/ctrlDashboard.php';
include '../src/controllers/ctrlEvento.php';
include '../src/controllers/ctrlEventos.php';
include '../src/controllers/ctrlFilterEvents.php';
include '../src/controllers/ctrlFavoritos.php';
include '../src/controllers/ctrlLogin.php';
include '../src/controllers/ctrlRegister.php';
include '../src/controllers/ctrlProfile.php';
include '../src/controllers/ctrlDoRegister.php';
include '../src/controllers/ctrlDashboardList.php';
include '../src/controllers/ctrlDashboardDelete.php';
include "../src/controllers/ctrlDashboardEdit.php";
include "../src/controllers/ctrlDashboardEditUpdate.php";
include "../src/controllers/ctrlDashboardAddUser.php";
include "../src/controllers/ctrlDoLogin.php";
include "../src/controllers/ctrlDoLogout.php";
include "../src/controllers/ctrlConsejos.php";
include "../src/controllers/ctrlCrearEvento.php";
include "../src/controllers/ctrlGuardarEvento.php";
include "../src/controllers/ctrlEventList.php";
include "../src/controllers/ctrlDeleteEvent.php";
include "../src/controllers/ctrlEditEvent.php";
include "../src/controllers/ctrlsearchEvents.php";
// Archivos Middleware

include "../src/middleware/isLogged.php";
include "../src/middleware/isAdmin.php";

/** 
 * Carreguem les classes del Framework Emeset
 */

include "../src/Emeset/Container.php";
include "../src/ProjectContainer.php";
include "../src/Emeset/Request.php";
include "../src/Emeset/Response.php"; 
include "../src/models/Db.php";
include "../src/models/Users.php";
include "../src/models/Events.php";

$request = new \Emeset\Request();
$response = new \Emeset\Response();
$container = new ProjectContainer($config);

$sql = new Db($config);
$users = new Users($sql->get());

/* 
  * Aquesta és la part que fa que funcioni el Front Controller.
  * Si no hi ha cap paràmetre, carreguem la pàgina d'inici.
  * Si hi ha paràmetre, carreguem la pàgina que correspongui.
  * Si no existeix la pàgina, carreguem la pàgina d'error.
  */
if (isset($_REQUEST["r"])) {
  $r = $_REQUEST["r"];
}

if (!isset($r)) {
  $response = ctrlIndex($request, $response, $container);
} elseif($r == "consejos"){
  $response = ctrlConsejos($request, $response, $container);
} elseif($r == "dologout"){
  $response = ctrlDoLogout($request, $response, $container);
}elseif($r == "dologin"){
  $response = ctrlDoLogin($request, $response, $container);
} elseif($r == "dashboardadduser"){
  $response = isAdmin($request, $response, $container, "ctrlDashboardAddUser");
} elseif($r == "delete"){
  ctrlDashboardDelete(users: $users);
}elseif ($r == "dashboardeditupdate") {
  $response = isAdmin($request, $response, $container, "ctrlDashboardEditUpdate");
}elseif($r == "dashboardeditview"){
  $response = isAdmin($request, $response, $container, "ctrlDashboardEditView");
}elseif($r == "dashboardedit"){
  $response = isAdmin($request, $response, $container, "ctrlDashboardEdit");
}elseif($r == "dashboard"){
  $response = isAdmin($request, $response, $container, "ctrlDashboardList");
}elseif ($r == "dashboardview") {
  $response = isAdmin($request, $response, $container, "ctrlDashboard");
} elseif ($r == "evento") {
  $response = ctrlEvento($request, $response, $container);
} elseif ($r == "login") {
  $response = ctrlLogin($request, $response, $container);
} elseif ($r == "register") {
  $response = ctrlRegister($request, $response, $container);
} elseif ($r == "doregister"){
  $response = ctrlDoRegister($request, $response, $container);
} elseif ($r == "profile") {
  $response = isLogged($request, $response, $container, "ctrlProfile");
// } elseif ($r == "eventos") {
//   $response = ctrlEventos($request, $response, $container);
} elseif ($r == "favoritos") {
  $response = isLogged($request, $response, $container, "ctrlFavoritos"); 
} elseif ($r == "crearevento") {
  $response = ctrlCrearEvento($request, $response, $container);
} elseif ($r == "guardarevento") {
  $response = ctrlGuardarEvento($request, $response, $container);
} elseif ($r == "eventos") {
  $response = ctrlEventList($request, $response, $container);
} elseif ($r == "json") {
  $response = ctrlJson($request, $response, $container);
} elseif ($r == "eliminarevento") {
  $response = ctrlDeleteEvent($request, $response, $container);
} elseif ($r == "editarevento") {
  $response = ctrlEditEvent($request, $response, $container);
} elseif ($r == "filterevents") {
  $response = ctrlFilterEvents($request, $response, $container);
} elseif ($r == "buscareventos") {
  $response = ctrlSearchEvents($request, $response, $container);
} else {
  echo "No existe la ruta";
}

$response->response();