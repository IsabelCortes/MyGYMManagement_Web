<?php

/*
* Esta clase es uno de los controladores principales de nuestra aplicación, encargado de cargar las vistas
*
* This class is one of the main controllers of the app, it loads the views
*/
class Views_c {

    /*
    * Este método carga la vista plantilla de nuestra aplicación
    *
    * This method loads the template view of the app
    */
    public function showMainPage() {
        include_once "views/template.php";
    }

    /*
    * Este método comprueba qué destino se ha introducito en la url, lo comprueba en el modelo de selección y carga la vista para ese destino, si no se ha introducido destino manda inicio
    *
    * This method checks what destination is introduced in the url, checks it in the options model and loads the view for that destination, if nothing is introduced it sends the user to the home view
    */
    public function pageElection() {

        if (!isset($_REQUEST['option'])) {
            $election = "home";
        }
        else {
            $election = $_REQUEST['option'];
        }

        $view = Options_m::menuElection($election);
        include "views/" . $view;

    }

}

?>