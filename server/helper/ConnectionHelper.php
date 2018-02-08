<?php

/**
 * Description of ConnectionHelper
 *
 * @author PixelZer0
 */

// CLASES REQUERIDAS

require 'static/dbConstants.php';

class ConnectionHelper {

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
