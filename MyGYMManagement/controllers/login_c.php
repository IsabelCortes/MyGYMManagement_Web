<?php

/*
* Esta clase es uno de los controladores principales de nuestra aplicación, encargado de controlar el sistema de inicio de sesión
*
* This class is one of the main controllers of the app, it controlls the login system
*/
class Login_c {

    /*
    * Este método comprueba que el usuario y contraseña introducidos existan en la base de datos
    * @param $username El username introducido por el usuario que se comprobará si existe en la base de datos
    * @param $password La contraseña introducida por el usuario que se comprobará si correponde con la del username introducido
    * @return Devuelde el id de usuario si los datos son correctos, un error si el usuario no existe en la base de datos u otro error si la contraseña no correponde para ese usuario
    *
    * This method checks that the username and password introduced by the app user exist in the database
    * @param $username The username introduced by the app user that will be checked if it exists in the database
    * @param $password The password introduced by the app user that will be checked if it corresponds with the one of the username introduced
    * @return Returns the user id if the data is correct, an error if the username doesn't exist in the database or another error if the password doesn't correspond with the one of that username
    */
    public function checkLogin($username, $password) {

        $user = User_m::getUserByField("username", $username);

        if($user) {
            if(password_verify($password, $user['password'])) {
                return $user['id_user'];
            }
            else {
                return "passwordError";
            }
        }
        else {
            return "usernameError";
        }

    }

    /*
    * Este método comprueba que el usuario y el email introducidos existan en la base de datos
    * @param $username El username introducido por el usuario que se comprobará si existe en la base de datos
    * @param $email El email introducido por el usuario que se comprobará si existe en la base de datos
    * @return Devuelde un error si el usuario existe en la base de datos, otro error si el email existe en la base de datos o false si ninguno de los dos existe en la base de datos
    *
    * This method checks that the username and email introduced by the app user exist in the database
    * @param $username The username introduced by the app user that will be checked if it exists in the database
    * @param $email The email introduced by the app user that will be checked if it exists in the database
    * @return Returns an error if the username exists in the database, another error if email exists in the database or false if any of both exist in the database
    */
    public function checkRegister($username, $email) {

        $usernameExists = User_m::getUserByField("username", $username);
        $emailExists = User_m::getUserByField("email", $email);

        if($usernameExists) {
            return "usernameError";
        }
        else {
            if($emailExists) {
                return "emailError";
            }
            else {
                return false;
            }
        }
    }

    /*
    * Este método encripta la contraseña introducida por el usuario y crea un registro en la base de datos con el usuario que recibe por parámetro
    *
    * This method encrypts the password introduced by the app user and makes a database register with the user data received by parameter
    */
    public function makeRegister($user) {
        $user->password = password_hash($user->password, PASSWORD_DEFAULT);
        User_m::insertUser($user);
    }

}

?>