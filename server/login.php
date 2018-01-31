<?php

require 'connection.php';

/**
* Loggea al usuario en la aplicación
*/

	$usuario = $_GET['user'];
	$password = $_GET['pass'];

	$sqlUsuario = "SELECT * FROM usuario WHERE login LIKE '" . $usuario . "'";
	$sqlPassword = "SELECT * FROM usuario WHERE pass LIKE '" . $password . "'";

	$resultSet = $mysqli->query($sqlUsuario);

	if($resultSet->num_rows > 0) {

		$resultSet = $mysqli->query($sqlPassword);

		if ($resultSet->num_rows > 0) {
			print '<h3>Welcome back, ' . $usuario . '</h3>';
		} else {
			print '<h3>Error: acces denied</h3>';
		}
	} else {
			print '<h3>Error: acces denied</h3>';
	}

	// DEBUGG
	
	print $usuario;
	print $password;

		// if ($usuario == mysqli && $contraseña == "") {
		// 	print '<h3>Welcome back, ' . $usuario . '</h3>';
		// } else {
		// 	print '<h3>Error: acces denied</h3>';
		// }

?>