<?php

/*
* Esta clase es el controlador principal de nuestra aplicación
*/
class Controller {

    /*
    * Este método carga la vista plantilla de nuestra aplicación
    */
    public function showMainPage() {
        include_once "views/template.php";
    }

    /*
    * Este método comprueba qué destino se ha introducito en la url, lo comprueba en el modelo de selección y carga la vista para ese destino, si no se ha introducido destino manda inicio
    */
    public function pageElection() {

        if (!isset($_REQUEST['option'])) {
            $election = "inicio";
        }
        else {
            $election = $_REQUEST['option'];
        }

        $view = Options_m::menuElection($election);
        include "views/" . $view;

    }

}

?>