<?php

require 'connection.php';

/**
* Loggea al usuario en la aplicación utilizando consultas preparadas
*/

	$usuario = $_GET['user'];
	$hashedPassword = hash('sha256', $_GET['pass']);

	$sqlPreparedUsuario = $mysqli->prepare("SELECT * FROM usuario WHERE login LIKE ?");
	$sqlPreparedUsuario->bind_param('s', $usuario);
        $sqlPreparedUsuario->execute();
        $sqlPreparedUsuario->store_result();
        
	if(($sqlPreparedUsuario->num_rows) > 0) {
            
            $sqlPreparedUsuario->close();
            
            $sqlPreparedPassword = $mysqli->prepare("SELECT * FROM usuario WHERE pass LIKE ?");
            $sqlPreparedPassword->bind_param('s', $hashedPassword);
            $sqlPreparedPassword->execute();
            $sqlPreparedPassword->store_result();
            
		if (($sqlPreparedPassword->num_rows) > 0) {
			print '<h3>Welcome back, ' . $usuario . '</h3>';
                        $sqlPreparedPassword->close();
		} else {
			print '<h3>Error: acces denied</h3>';
		}
	} else {
			print '<h3>Error: acces denied</h3>';
	}

	// DEBUGG
	
	print $usuario . "<br>";
	print $hashedPassword . "<br>";
