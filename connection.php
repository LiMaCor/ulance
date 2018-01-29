<?php

/**
 * Devuelve true o false si la conexion con la BBDD se ha realizado
 */

function dbConnection() {

	$user = 'root';
	// $pass = 'admin';
	$pass = 'bitnami'; // -->  Conexión de clase
	$dbName = 'ulance';
	// $host = '192.168.122.26';
	$host = '127.0.0.1'; // -->  Conexión de clase

	$mysqli = mysqli_init();

	mysqli_real_connect($mysqli, $host, $user, $pass, $dbName)
		or die('<h3>Unable to connect</h3>');

	echo '<h3>Connection completed!</h3>';

}

?>