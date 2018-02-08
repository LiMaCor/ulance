<?php

require 'dbConstants.php';

/**
 * Devuelve true o false si se ha realizado la conexión con la base de datos
 */
class ConnectionHelper {

    // VARIABLES
    
    private $mysqli;

    // MÉTODOS
    
    public static function getConnectionDB() {
        $mysqli = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
        if ($mysqli->connect_errno) {
            die();
            return false;
        } else {
            return $mysqli;
        }
    }

}
