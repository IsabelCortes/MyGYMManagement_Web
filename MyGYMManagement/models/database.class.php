<?php

require_once "configdb.php";

/*
* Esta clase se encarga de realizar y gestionar la conexión con la base de datos y nos ofrece algunos métodos básicos para trabajar con esta
*/
class Database {

    /*
    * Estas propiedades guardan los valores de las constantes que hemos incluído para conectarnos a la base de datos
    */
    private $host = HOST;
    private $username = USERNAME; 
    private $password = PASSWORD; 
    private $database = DATABASE;

    /*
    * Estas propiedades se usarán para guardar la conexión con la base, el resultado de las consultas y los errores, si se producen
    */
    private $connection;
    private $result;
    public $error;

    /*
    * Este es el constructor de la base de datos, el cual realiza la conexión con esta
    */
    function __construct() {

            $this->connection = mysqli_connect(
                $this->host,
                $this->username,
                $this->password,
                $this->database
            );

            if (!$this->connection) {
                $this->error = mysqli_connect_error();
            }

    }

    /*
    * Este método realiza una consulta a la base de datos y guarda el resultado
    *
    * @param $query La consulta a realizar
    * @return Devuelve false si no se realiza correctamente la consulta o true si sí se realiza correctamente
    */
    public function consult($query){
        $this->result = mysqli_query($this->connection, $query);
    }

    /*
    * Este método devuelve los datos de la base de datos al realizar una consulta
    *
    * @return Devuelve un array asociativo con el resultado de la consulta
    */
    public function result(){
        return mysqli_fetch_all($this->result, MYSQLI_ASSOC);
    }

    /*
    * Este método devuelve la única fila de datos de la base de datos al realizar una consulta de resultado único
    *
    * @return Devuelve un array asociativo con el resultado de la consulta
    */
    public function row(){
        return mysqli_fetch_array($this->result, MYSQLI_ASSOC);
    }

    /*
    * Este método devuelve el número de filas que se obtienen de la base de datos al realizar una consulta
    *
    * @return Devuelve el número de filas
    */
    public function count() {
        return mysqli_num_rows($this->result);
    }

}

?>