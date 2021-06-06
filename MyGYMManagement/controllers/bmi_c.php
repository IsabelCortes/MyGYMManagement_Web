<?php

/*
* Esta clase es uno de los controladores principales de nuestra aplicación, encargado de controlar el sistema de ejercicios
*
* This class is one of the main controllers of the app, it controlls the exercises system
*/
class Bmi_c {

    /*
    * Este método busca y devuelve todos los ejercicios de nuestra base de datos, llama al método del modelo para ello
    * @return Devuelve un array de todos los ejercicios de la base de datos
    *
    * This method search and returns all the exercises in the database, it calls the model method for this
    * @return Returns an array with all the database exercises
    */
    public function loadBmiCalcByUser($id_user) {
        return Bmi_m::getBmiCalcsByUser($id_user);
    }

    /*
    * Este método busca y devuelve todos los ejercicios de nuestra base de datos que coinciden con el código del músculo introducido por parámaetro, llama a los métodos del modelo para ello
    * @param $cod_muscle El código del músculo del que se quiere buscar ejercicios
    * @return Devuelve un array de todos los ejercicios de la base de datos que corresponden con el músculo introducido
    *
    * This method search and returns all the exercises in the database that correspond with the muscle code introduced by parameter, it calls the model methods for this
    * @param $cod_muscle The muscle code that the user want to search exercises for
    * @return Returns an array with all the database exercises
    */
    public function loadLastBmiCalcByUser($id_user) {
        return Bmi_m::getLastBmiCalcByuser($id_user);
    }

    public function makeBmiCalc($bmiCalc) {
        $currentDate = getdate();
        $bmiCalc->bmi = round($bmiCalc->weight / (($bmiCalc->height / 100) * ($bmiCalc->height / 100)), 2);
        $bmiCalc->date = $currentDate['year'] . "-" . $currentDate['mon'] . "-" . $currentDate['mday'];
        Bmi_m::insertBmiCalc($bmiCalc);
    }

    public function calcBmiRange($bmi) {
        if($bmi < 18.5) {
            $range = "Delgadez";
        }
        elseif($bmi < 24.9) {
            $range = "Saludable";
        }
        elseif($bmi < 29.9) {
            $range = "Sobrepeso";
        }
        elseif($bmi < 34.9) {
            $range = "Obesidad I";
        }
        elseif($bmi < 39.9) {
            $range = "Obesidad II";
        }
        else {
            $range = "Obesidad III";
        }
        return $range;
    }

}

?>