<?php

/**
 * Description of ConnectionHelper
 *
 * @author PixelZer0
 */


class ConnectionHelper {

    // VARIABLES
    
    private $mysqli;
    
    // MÉTODOS

    /**
     * Método checkDBConnection: Comprueba una conexión con una base de datos
     */
    
    public function checkDBConnection() {
        $connection = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
        if ($connection->connect_errno) {
            return false;
        } else {
            $this->mysqli = $connection;
            return true;
        }
    }
    
    /**
     * Método getConnection: Obtiene una conexión con una base de datos
     *
     * @return mysqli Object
     */
    public function getConnection() {
        return $this->mysqli;
    }

}
