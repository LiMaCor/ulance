<?php

require 'connection.php';

/**
* Loggea al usuario en la aplicación
*/

	$usuario = $_GET['user'];
	$hashedPassword = hash('sha256', $_GET['pass']);

	$sqlUsuario = "SELECT * FROM usuario WHERE login LIKE '" . $usuario . "'";
	$sqlPassword = "SELECT * FROM usuario WHERE pass LIKE '" . $hashedPassword . "'";

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
	
	print $usuario . "<br>";
	print $hashedPassword . "<br>";
	print $resultSet->num_rows;

		// if ($usuario == mysqli && $contraseña == "") {
		// 	print '<h3>Welcome back, ' . $usuario . '</h3>';
		// } else {
		// 	print '<h3>Error: acces denied</h3>';
		// }

?>