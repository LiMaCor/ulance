<?php

/**
 * Devuelve true o false si la conexion con la BBDD se ha realizado
 */

function dbConnection() {

	$user = 'root';
	$pass = 'admin';
	$dbName = 'ulance';
	$host = '192.168.122.26';

	$mysqli = mysqli_init();

	mysqli_real_connect($mysqli, $host, $user, $pass, $dbName)
		or die('<h3>Unable to connect</h3>');

	return '<h3>Connection completed!</h3>';

}

dbConnection();

?>