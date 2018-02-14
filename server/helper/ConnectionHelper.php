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
    
    public function checkDBConnection() {
        $connection = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
        if ($connection->connect_errno) {
            return false;
        } else {
            $this->mysqli = $connection;
            return true;
        }
    }
    
    public function getConnection() {
        return $this->mysqli;
    }

}
