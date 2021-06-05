<?php

/*
* Esta clase es el modelo que controla la conexion con la tabla usuarios
*
* This class is the model that controlls the database conexion with users
*/
class User_m {

    public $id_user;
    public $fullname;
    public $age;
    public $username;
    public $password;
    public $email;
    public $premium;

    /*
    * Este método nos vuelca los datos del usuario introducido por el campo que queremos comprobar
    * @param $campo El campo de usuarios que queremos comprobar, si no se introduce comprueba el campo username
    * @param $valor El valor del campo introducido que queremos comprobar
    * @return Devuelve los datos del usuario introducido o false si no existe el campo introducido
    *
    * This method dummps the data of the user introduced by the field the app user want to check
    * @param $field The field of user the app user want to check
    * @param $value The value of the field the user want to check
    * @return Returns the data of the user introduced or false if it doesn't exist any user with those values
    */
    public static function getUserByField($field, $value) {
        $db = new Database();
        $db->consult("SELECT * FROM user WHERE $field = '$value'");
        
        if($db->count() > 0) {
            return $db->row();
        }
        else {
            return false;
        }
        
    }

    /*
    * Este método introduce un usuario en la base de datos con la información recibida por parámetro
    * @param $user El objeto usuario que tiene la información que será introducida en la base de datos
    *
    * This method introduces an user in the database with the information received by parameter
    * @param $user The user object with the data that will be introduced in the database
    */
    public static function insertUser($user) {
        $db = new Database();
        $db->consult("INSERT INTO user values(
            '$user->id_user',
            '$user->fullname',
            '$user->age',
            '$user->username',
            '$user->password',
            '$user->email',
            '$user->premium'
        )");
    }

}

?>