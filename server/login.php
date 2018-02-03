<?php

require 'connection.php';

/**
* Loggea al usuario en la aplicación utilizando consultas preparadas
*/

	$usuario = $_GET['user'];
	$hashedPassword = hash('sha256', $_GET['pass']);
        $resultSet = [];

	$preparedStatement = $mysqli->prepare("SELECT * FROM usuario WHERE login LIKE ? AND pass LIKE ?");
	$preparedStatement->bind_param('ss', $usuario, $hashedPassword);
        $preparedStatement->execute();
        $preparedStatement->store_result();
        
	if($preparedStatement->num_rows > 0) {
            
            $filas->mysqli_fetch_array(MYSQLI_ASSOC);
            $resultSet = $filas;
            
            $userBean = new UsuarioBean();
            
	} else {
            print '<h3>Error: acces denied</h3>';
	}

	// DEBUGG
	
	print $usuario . "<br>";
	print $hashedPassword . "<br>";
