<?php

/**
 * Aquest fitxer és un exemple de Front Controller, pel qual passen totes les requests.
 */

include "../controllers/ctrlindex.php";
include "../controllers/ctrljson.php";
include '../controllers/ctrlpanel.php';
include '../controllers/ctrlmakeevent.php';
include '../controllers/ctrlsaveevent.php';
include '../controllers/ctrlfavorites.php';
include '../controllers/ctrllogin.php';
include '../controllers/ctrlregister.php';
include '../controllers/ctrlprofile.php';
include '../controllers/ctrldoregister.php';
include '../controllers/ctrlpanelList.php';
include '../controllers/ctrlpaneldelete.php';
include "../controllers/ctrlpaneledit.php";
include "../controllers/ctrlpaneleditupdate.php";
include "../controllers/ctrlpaneladduser.php";
include "../controllers/ctrldologin.php";
include "../controllers/ctrldologout.php";
include "../controllers/ctrltips.php";
include_once "../controllers/ctrlmakeevent.php";
include_once "../controllers/ctrlsaveevent.php";

// Archivos Middleware

include "../middleware/whenisLogged.php";
include "../middleware/whenisAdmin.php";

/** 
 * Carreguem les classes del Framework Emeset
 */

include "../src/emeset/Container.php";
include "../projectcontainer.php";
include "../src/emeset/Request.php";
include "../src/emeset/Response.php"; 
include "../models/Db.php";
include "../models/users.php";
include "../models/events.php";

include_once "../config.php";

$request = new \Emeset\Request();
$response = new \Emeset\Response();
$container = new \Emeset\Container($config);

$sql = new Db($config);
$users = new users($sql->get());

$sql = new Db($config);
$pdoConnection = $sql->get(); // Obtiene la conexión PDO

try {
    $pdoConnection->query("SELECT 1"); // Prueba simple de conexión
    echo "Conexión a la base de datos exitosa.";
} catch (PDOException $e) {
    die("Error en la conexión a la base de datos: " . $e->getMessage());
}

$users = new users($pdoConnection); // Continuar si la conexión es exitosa


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
    $response = ctrlindex($request, $response, $container);
  } elseif($r == "consejos"){
    $response = ctrltips($request, $response, $container);
  } elseif($r == "dologout"){
    $response = ctrlDologout($request, $response, $container);
  }elseif($r == "ctrldologin"){
    $response = ctrlDoLogin($request, $response, $container);
  } elseif($r == "paneladduser"){
    $response = whenisAdmin($request, $response, $container, "ctrlpaneladduser");
  } elseif($r == "paneldelete"){ctrlpaneldelete(users: $users);
  }elseif ($r == "paneleditupdate") {
    $response = whenisAdmin($request, $response, $container, "ctrlpaneleditupdate");
  }elseif($r == "panellist"){
    $response = whenisAdmin($request, $response, $container, "ctrlpaneleditview");
  }elseif($r == "paneledit"){
    $response = whenisAdmin($request, $response, $container, "ctrlpaneledit");
  }elseif($r == "panellist"){
    $response = whenisAdmin($request, $response, $container, "ctrlpanelist");
  }elseif ($r == "ctrlpanelview") {
    $response = whenisAdmin($request, $response, $container, "ctrlpanelview");
  } elseif ($r == "ctrlevento") {
    $response = ctrlevent($request, $response, $container);
  } elseif ($r == "login") {
    $response = ctrllogin($request, $response, $container);
  } elseif ($r == "register") {
    $response = ctrlregister($request, $response, $container);
  } elseif ($r == "doregister"){
    $response = ctrlDoregister($request, $response, $container);
  } elseif ($r == "perfil") {
    $response = whenisLogged($request, $response, $container, "ctrlProfile");
  } elseif ($r == "events") {
    $response = ctrlevents($request, $response, $container);
  } elseif ($r == "favoritos") {
    $response = whenisLogged($request, $response, $container, "ctrlFavoritos");
  } elseif ($r == "makeevent") {
    $response = ctrlmakeevent($request, $response, $container);
  } elseif ($r == "saveevent") {
    $response = ctrlsaveevent($request, $response, $container);
  } elseif ($r == "json") {
    $response = ctrlJson($request, $response, $container);
  } else {
    echo "No existe la ruta";
  }
  
  $response->response();