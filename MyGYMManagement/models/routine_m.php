<?php

class Routine_m {

    public $cod_routine;
    public $name;
    public $info;
    public $objective;
    public $difficulty;
    public $user_created;

    public $cod_user_routine;
    public $user;
    public $routine;
    public $color;
    public $monday;
    public $tuesday;
    public $wednesday;
    public $thursday;
    public $friday;
    public $saturday;
    public $sunday;

    public static function getRoutinesByUser($id_user) {
        $db = new Database();
        $db->consult("SELECT * FROM user_routine WHERE user = '$id_user'");
        return $db->result();
    }

    public static function getUserRoutineById($cod_routine) {
        $db = new Database();
        $db->consult("SELECT * FROM user_routine WHERE routine = '$cod_routine'");
        return $db->row();
    }

    public static function getUserRoutineByUserRoutineId($cod_user_routine) {
        $db = new Database();
        $db->consult("SELECT * FROM user_routine WHERE cod_user_routine = '$cod_user_routine'");
        return $db->row();
    }

    public static function getRoutineById($cod_routine) {
        $db = new Database();
        $db->consult("SELECT * FROM routine WHERE cod_routine = '$cod_routine'");
        return $db->row();
    }

    public static function getRoutineByIdAndObjective($cod_routine, $objective) {
        $db = new Database();
        $db->consult("SELECT * FROM routine WHERE cod_routine = '$cod_routine' AND objective = '$objective'");
        return $db->row();
    }

    public static function getRoutineByIdAndDifficulty($cod_routine, $difficulty) {
        $db = new Database();
        $db->consult("SELECT * FROM routine WHERE cod_routine = '$cod_routine' AND difficulty = '$difficulty'");
        return $db->row();
    }

    public static function getRoutineByIdObjectiveAndDifficulty($cod_routine, $objective, $difficulty) {
        $db = new Database();
        $db->consult("SELECT * FROM routine WHERE cod_routine = '$cod_routine' AND objective = '$objective' AND difficulty = '$difficulty'");
        return $db->row();
    }

    public static function getLastRoutine() {
        $db = new Database();
        $db->consult("SELECT * FROM routine WHERE cod_routine = (SELECT MAX(cod_routine) from routine)");
        return $db->row();
    }

    public static function getAdminRoutines() {
        $db = new Database();
        $db->consult("SELECT * FROM routine WHERE user_created = 'false'");
        return $db->result();
    }

    public static function getAdminRoutinesByObjective($objective) {
        $db = new Database();
        $db->consult("SELECT * FROM routine WHERE user_created = 'false' AND objective = '$objective'");
        return $db->result();
    }

    public static function getAdminRoutinesByDifficulty($difficulty) {
        $db = new Database();
        $db->consult("SELECT * FROM routine WHERE user_created = 'false' AND difficulty = '$difficulty'");
        return $db->result();
    }

    public static function getAdminRoutinesByObjectiveAndDifficulty($objective,$difficulty) {
        $db = new Database();
        $db->consult("SELECT * FROM routine WHERE user_created = 'false' AND objective = '$objective' AND difficulty = '$difficulty'");
        return $db->result();
    }

    public static function getRoutineObjectives() {
        $db = new Database();
        $db->consult("SELECT * FROM routine_objective");
        return $db->result();
    }

    public static function getRoutineObjectiveById($cod_objective) {
        $db = new Database();
        $db->consult("SELECT * FROM routine_objective WHERE cod_objective = '$cod_objective'");
        return $db->row();
    }

    public static function getRoutineDifficulties() {
        $db = new Database();
        $db->consult("SELECT * FROM routine_difficulty ORDER BY cod_difficulty");
        return $db->result();
    }

    public static function getRoutineDifficultyById($cod_difficulty) {
        $db = new Database();
        $db->consult("SELECT * FROM routine_difficulty WHERE cod_difficulty = '$cod_difficulty'");
        return $db->row();
    }

    public static function getRoutineColors() {
        $db = new Database();
        $db->consult("SELECT * FROM routine_color");
        return $db->result();
    }

    public static function getRoutineColorById($cod_color) {
        $db = new Database();
        $db->consult("SELECT * FROM routine_color WHERE cod_color = '$cod_color'");
        return $db->row();
    }

    public static function insertRoutine($routine) {
        $db = new Database();
        $db->consult("INSERT INTO routine values(
            '$routine->cod_routine',
            '$routine->name',
            '$routine->info',
            '$routine->objective',
            '$routine->difficulty',
            '$routine->user_created'
        )");
    }

    public static function insertUserRoutine($routine) {
        $db = new Database();
        $db->consult("INSERT INTO user_routine values(
            '$routine->cod_user_routine',
            '$routine->user',
            '$routine->routine',
            '$routine->color',
            '$routine->monday',
            '$routine->tuesday',
            '$routine->wednesday',
            '$routine->thursday',
            '$routine->friday',
            '$routine->saturday',
            '$routine->sunday'
        )");
    }

}

?>