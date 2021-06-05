<?php

/*
* Esta clase es uno de los controladores principales de nuestra aplicación, encargado de controlar el sistema de ejercicios
*
* This class is one of the main controllers of the app, it controlls the exercises system
*/
class Exercises_c {

    /*
    * Este método busca y devuelve todos los ejercicios de nuestra base de datos, llama al método del modelo para ello
    * @return Devuelve un array de todos los ejercicios de la base de datos
    *
    * This method search and returns all the exercises in the database, it calls the model method for this
    * @return Returns an array with all the database exercises
    */
    public function loadAllExercises() {
        return Exercise_m::getExercises();
    }


    public function loadAllExercisesByName($name) {
        return Exercise_m::getExercisesByName($name);
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
    public function loadExercisesByMuscle($cod_muscle, $name) {

        $exercisesId = Exercise_m::getExercisesByMuscle($cod_muscle);
        $exercises = [];

        foreach($exercisesId as $exerciseId){
            $exercise = Exercise_m::getExerciseByIdAndName($exerciseId['exercise'], $name);
            if($exercise) {
                array_push($exercises, $exercise);
            }
        }
        return $exercises;

    }

}

?>