<?php

require 'connection.php';

/**
* Loggea al usuario en la aplicación
*/

	$usuario = $_GET['user'];
	$password = $_GET['pass'];

	$sqlUsuario = "SELECT * FROM usuario WHERE login LIKE '" . $usuario . "'";
	$sqlPassword = "SELECT * FROM usuario WHERE pass LIKE '" . $password . "'";

	if($mysqli->query($sqlUsuario) == true && $mysqli->query($sqlPassword) == true) {
			print '<h3>Welcome back, ' . $usuario . '</h3>';
	} else {
			print '<h3>Error: acces denied</h3>';
	}

		// if ($usuario == mysqli && $contraseña == "") {
		// 	print '<h3>Welcome back, ' . $usuario . '</h3>';
		// } else {
		// 	print '<h3>Error: acces denied</h3>';
		// }

?>