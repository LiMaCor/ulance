<?php

/**
* Loggea al usuario en la aplicación
*/
	function userLogin () {
		$usuario = $_POST['user'];
		$contraseña = $_POST['password'];

		if ($usuario == "" && $contraseña == "") {
			print '<h3>Welcome back, ' . $usuario . '</h3>';
		} else {
			print '<h3>Error: acces denied</h3>';
		}
	}

	userLogin();

?>