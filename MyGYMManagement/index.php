<?php
/*
* Esta es la página principal de nuestra aplicación en la que se cargan los controladores y modelos principales y se inicia el controlador principal y la sesión
*
* @author
*/
session_start();

require_once "controllers/controller.php";

require_once "models/database.class.php";
require_once "models/options_m.php";

$controller = new Controller();
$controller->showMainPage();
?>