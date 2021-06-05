<?php

/*
* Esta clase es el modelo que controla el destino de nuestra página que se introduce en la url
*
* This class is the model that controls the destination of te page that is introduced in the url
*/
class Options_m {

    /*
    * Este método estático comprueba el destino introducido en la url y lo asocia a un archivo .php, si no encuentra el destino lo asocia con el archivo error.php
    * @param $election El destino introducido en la url
    * @return Devuelve la vista a la que corresponde el destino introducido o error.php si no se corresponde a ningun archivo
    *
    * This static method checks the destination introduced in the url y associates it with a .php file, if a destination is not found it associates it with a error.php file
    * @param $election The destination introduced in the url
    * @return Returns the view that corresponds with the destination introduced or error.php if it doesn't correspond with any file
    */
    static public function menuElection($election) {

        $elections = [
            "inicio" => "home_v.php",
            "home" => "home_v.php",
            "index" => "home_v.php",

            "ejercicios" => "exercises_v.php",
            "exercises" => "exercises_v.php",

            "ejercicio" => "exercise_v.php",
            "exercise" => "exercise_v.php",

            "explorar" => "explore_v.php",
            "explore" => "explore_v.php",

            "rutinas" => "routines_v.php",
            "routines" => "routines_v.php",

            "exrutina" => "exroutine_v.php",
            "exroutine" => "exroutine_v.php",

            "imc" => "bmi_v.php",
            "bmi" => "bmi_v.php",

            "otros" => "others_v.php",
            "others" => "others_v.php",

            "login" => "login_v.php",
            "logout" => "logout_v.php",

            "registro" => "register_v.php",
            "register" => "register_v.php"
        ];

        if(isset($elections[$election])) {
            return $elections[$election];
        }
        else {
            return "error_v.php";
        }

    }

}

?>