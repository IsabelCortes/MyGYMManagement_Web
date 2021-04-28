<?php

/*
* Esta clase es el modelo que controla el destino de neustra página que se introduce en la url
*
* @author
*/
class Options_m {

    /*
    * Este método estático comprueba el destino introducido en la url y lo asocia a un archivo .php, si no encuentra el destino lo asocia con el archivo error.php
    *
    * @param $seleccion El destino introducido en la url
    * @return Devuelve el archivo al que corresponde el destino introducido o error.php si no se corresponde a ningun archivo
    */
    static public function menuElection($election) {

        $elections = [
            "inicio" => "home_v.php",
            "ejercicios" => "exercises_v.php",
            "rutinas" => "routines_v.php",
            "imc" => "bmi_v.php",
            "otros" => "others_v.php",
            "login" => "login_v.php",
            "logout" => "logout_v.php",
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