<?php

include 'connection.php';

/**
* Controlador de la aplicación
*/

// function jsonHeader($code = 200) {
//     header('Content-Type: application/json; charset=utf-8', true, $code);
//     header("HTTP/1.1 $code");
//     header("Expires: on, 01 Jan 1970 00:00:00 GMT");
//     header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
//     header("Cache-Control: no-store, no-cache, must-revalidate");
//     header("Cache-Control: post-check=0, pre-check=0", false);
//     header("Pragma: no-cache");
//     if (isset($_SERVER['HTTP_ORIGIN'])) { //no valdría el *
//         header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
//         header('Access-Control-Allow-Credentials: true');
//         header('Access-Control-Max-Age: 86400'); // 24h cache
//     }
//     if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
//         if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
//             header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
//         if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
//             header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
//         exit(0);
//     }
// }

// jsonHeader();

// Comprobamos la conexión a la base de datos

$connection = $mysqli;

if ($connection) {
    print '<h3>Connection succesfully done!</h3>';
} else {
    print '<h3>Error: unable to connect. Contact your administrator</h3>';
}

// Comprobamos la sesión: si existe, la reanuda. Si no, indica que no existe la sesión.

if (!isset($_SESSION['user'])) {
    print "<h3>No hay una sesión abierta</h3>";
} else {
    session_start();
    print $_SESSION['user'];
}

// Accedemos a las operaciones de la aplicación y devolvemos los resultados

$control = new MappingHelper();

$resultado = $control->methodToExecute();

return "{\"status\":" + $resultado->code + ", \"json\":" + $resultado->json + "}";
