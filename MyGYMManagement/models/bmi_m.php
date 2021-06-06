<?php

class Bmi_m {

    public $cod_bmi;
    public $date;
    public $weight;
    public $height;
    public $bmi;
    public $user;

    public static function getBmiCalcsByUser($id_user) {
        $db = new Database();
        $db->consult("SELECT * FROM bmi_calc WHERE user = '$id_user' ORDER BY cod_bmi DESC");
        return $db->result();
    }

    public static function getLastBmiCalcByuser($id_user) {
        $db = new Database();
        $db->consult("SELECT * FROM bmi_calc WHERE user = '$id_user' AND cod_bmi = (SELECT MAX(cod_bmi) from bmi_calc WHERE user = '$id_user')");
        return $db->row();
    }

    public static function insertBmiCalc($bmiCalc) {
        $db = new Database();
        $db->consult("INSERT INTO bmi_calc values(
            '$bmiCalc->cod_bmi',
            '$bmiCalc->date',
            '$bmiCalc->weight',
            '$bmiCalc->height',
            '$bmiCalc->bmi',
            '$bmiCalc->user'
        )");
    }

    public static function deleteBmiCalc($cod_bmi) {
        $db = new Database();
        $db->consult("DELETE FROM bmi_calc WHERE cod_bmi = '$cod_bmi'");
    }

}

?>