<?php

session_start();

require_once 'helper/JsonHelper.php';
require_once 'helper/SQLHelper.php';
require_once 'static/dbConstants.php';
require_once 'helper/ConnectionHelper.php';
require_once 'dao/DaoTableInterface.php';
require_once 'dao/DaoViewInterface.php';
require_once 'dao/BancoDao.php';
require_once 'dao/CategoriaMovimientoDao.php';
require_once 'dao/CuentaAsociadaDao.php';
require_once 'dao/CuentaBancariaDao.php';
require_once 'dao/MovimientoDao.php';
require_once 'dao/TipoUsuarioDao.php';
require_once 'dao/UsuarioDao.php';
require_once 'service/ServiceTableInterface.php';
require_once 'service/ServiceViewInterface.php';
require_once 'service/BancoService.php';
require_once 'service/CategoriaMovimientoService.php';
require_once 'service/CuentaAsociadaService.php';
require_once 'service/CuentaBancariaService.php';
require_once 'service/MovimientoService.php';
require_once 'service/TipoUsuarioService.php';
require_once 'service/UsuarioService.php';
require_once 'helper/MappingHelper.php';


/**
 * Controlador de la aplicación
 */
function jsonHeader($code = 200) {
    header('Content-Type: application/json; charset=utf-8', true, $code);
    header("HTTP/1.1 $code");
    header("Expires: on, 01 Jan 1970 00:00:00 GMT");
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    if (isset($_SERVER['HTTP_ORIGIN'])) { //no valdría el *
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400'); // 24h cache
    }
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
        exit(0);
    }
}

jsonHeader();

// VARIABLES

$json = json_decode($_GET['json'], true);
$ob = $_GET['ob'];
$op = $_GET['op'];

//if (!isset($ob) && !isset($op)) {
//    
//    // Comprobamos la conexión a la base de datos
//    
//    $connection = new ConnectionHelper();
//
//    if ($connection->checkDBConnection()) {
//        print '<h3>Connection succesfully done!</h3>';
//    } else {
//        print '<h3>Error: unable to connect. Contact your administrator</h3>';
//    }
//}
// Accedemos a las operaciones de la aplicación y devolvemos los resultados

$control = new MappingHelper();

// DEBUGG
//print $json['json'];
//print $ob;
//print $op;

$resultado = $control->methodToExecute($ob, $op, $json);
echo json_encode(array("status" => $resultado['code'], "json" => $resultado['json']));
