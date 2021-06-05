<?php

class Exercise_m {

    public $cod_routine_exercise;
    public $exercise;
    public $routine;
    public $load;
    public $repetitions;
    public $sets;

    public static function getExercises() {
        $db = new Database();
        $db->consult("SELECT * FROM exercise");
        return $db->result();
    }

    public static function getExercisesByName($name) {
        $db = new Database();
        $db->consult("SELECT * FROM exercise WHERE name LIKE '%$name%'");
        return $db->result();
    }

    public static function getExerciseById($cod_exercise) {
        $db = new Database();
        $db->consult("SELECT * FROM exercise WHERE cod_exercise = '$cod_exercise'");
        return $db->row();
    }

    public static function getExerciseByIdAndName($cod_exercise, $name) {
        $db = new Database();
        $db->consult("SELECT * FROM exercise WHERE cod_exercise = '$cod_exercise' AND name LIKE '%$name%'");
        return $db->row();
    }

    public static function getMuscles() {
        $db = new Database();
        $db->consult("SELECT * FROM muscle");
        return $db->result();
    }

    public static function getExercisesByMuscle($cod_muscle) {
        $db = new Database();
        $db->consult("SELECT * FROM exercise_muscle WHERE muscle = '$cod_muscle'");
        return $db->result();
    }

    public static function insertRoutineExercise($exercise) {
        $db = new Database();
        $db->consult("INSERT INTO routine_exercise values(
            '$exercise->cod_routine_exercise',
            '$exercise->exercise',
            '$exercise->routine',
            '$exercise->load',
            '$exercise->repetitions',
            '$exercise->sets'
        )");
    }

}

?>