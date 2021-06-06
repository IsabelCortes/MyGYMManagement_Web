<?php

/*
* Esta clase es uno de los controladores principales de nuestra aplicación, encargado de controlar el sistema de ejercicios
*
* This class is one of the main controllers of the app, it controlls the exercises system
*/
class Routines_c {

    /*
    * Este método busca y devuelve todos los ejercicios de nuestra base de datos que coinciden con el código del músculo introducido por parámaetro, llama a los métodos del modelo para ello
    * @param $cod_muscle El código del músculo del que se quiere buscar ejercicios
    * @return Devuelve un array de todos los ejercicios de la base de datos que corresponden con el músculo introducido
    *
    * This method search and returns all the exercises in the database that correspond with the muscle code introduced by parameter, it calls the model methods for this
    * @param $cod_muscle The muscle code that the user want to search exercises for
    * @return Returns an array with all the database exercises
    */
    public function loadRoutineById($cod_routine) {
        return Routine_m::getRoutineById($cod_routine);
    }

    /*
    * Este método busca y devuelve todos los ejercicios de nuestra base de datos, llama al método del modelo para ello
    * @return Devuelve un array de todos los ejercicios de la base de datos
    *
    * This method search and returns all the exercises in the database, it calls the model method for this
    * @return Returns an array with all the database exercises
    */
    public function loadRoutinesByUser($id_user) {
        $userRoutines = Routine_m::getRoutinesByUser($id_user);
        $routines = [];

        foreach($userRoutines as $userRoutine){
            $routine = Routine_m::getRoutineById($userRoutine['routine']);
            if($routine) {
                array_push($routines, $routine);
            }
        }
        return $routines;
    }

    public function loadRoutinesByUserAndObjective($id_user, $objective) {

        $userRoutines = Routine_m::getRoutinesByUser($id_user);
        $routines = [];

        foreach($userRoutines as $userRoutine){
            $routine = Routine_m::getRoutineByIdAndObjective($userRoutine['routine'], $objective);
            if($routine) {
                array_push($routines, $routine);
            }
        }
        return $routines;

    }

    public function loadRoutinesByUserAndDifficulty($id_user, $difficulty) {

        $userRoutines = Routine_m::getRoutinesByUser($id_user);
        $routines = [];

        foreach($userRoutines as $userRoutine){
            $routine = Routine_m::getRoutineByIdAndDifficulty($userRoutine['routine'], $difficulty);
            if($routine) {
                array_push($routines, $routine);
            }
        }
        return $routines;

    }

    public function loadRoutinesByUserObjectiveAndDifficulty($id_user, $objective, $difficulty) {

        $userRoutines = Routine_m::getRoutinesByUser($id_user);
        $routines = [];

        foreach($userRoutines as $userRoutine){
            $routine = Routine_m::getRoutineByIdObjectiveAndDifficulty($userRoutine['routine'], $objective, $difficulty);
            if($routine) {
                array_push($routines, $routine);
            }
        }
        return $routines;

    }

}

?>