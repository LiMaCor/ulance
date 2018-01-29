<?php

/**
 * Devuelve 200 si se ha realizado la conexión con la base de datos
 */

function dbConnection() {

	$user = 'root';
	$pass = 'admin';
	// $pass = 'bitnami'; // -->  Conexión de clase
	$dbName = 'ulance';
	$host = '192.168.122.26';
	// $host = '127.0.0.1'; // -->  Conexión de clase
	$code = null;

	$mysqli = new mysqli($host, $user, $pass, $dbName);

	if ($mysqli->connect_errno) {
		$code = 500;
	} else {
		$code = 200;
	}

	return $code;

}

?>