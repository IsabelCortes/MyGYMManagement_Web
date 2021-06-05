<?php
/*
* Esta es la página principal de nuestra aplicación en la que se cargan los controladores y modelos principales y se inicia el controlador principal y la sesión
*
* This is the main page on the app, it loads the main models and controllers and initiate the main controller and the session
*/
session_start();

require_once "controllers/views_c.php";
require_once "controllers/login_c.php";
require_once "controllers/exercises_c.php";
require_once "controllers/routines_c.php";
require_once "controllers/bmi_c.php";

require_once "models/database.class.php";
require_once "models/options_m.php";
require_once "models/user_m.php";
require_once "models/exercise_m.php";
require_once "models/routine_m.php";
require_once "models/bmi_m.php";

$viewsController = new Views_c();
$loginController = new Login_c();
$exercisesController = new Exercises_c();
$routinesController = new Routines_c();
$bmiController = new Bmi_c();

$viewsController->showMainPage();
?>