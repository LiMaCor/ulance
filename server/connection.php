<?php

require 'dbConstants.php';

/**
 * Devuelve 200 si se ha realizado la conexión con la base de datos
 */

	$code = null;

	$mysqli = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

	if ($mysqli->connect_errno) {
		die();
		$code = 500;
		return $code;
	} else {
		$code = 200;
	}

	return $code;