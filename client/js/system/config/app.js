'use strict';

var ulance = angular.module("app", [
    'ngRoute',
    'sistemaControllers',
    'serviciosControllers',
    'usuarioControllers',
    'tipoUsuarioControllers',
    'movimientoControllers',
    'cuentaBancariaControllers',
    'cuentaAsociadaControllers',
    'categoriaMovimientoControllers',
    'bancoControllers'
]);

var moduloSistema = angular.module("sistemaControllers", []);
var moduloServicios = angular.module("serviciosControllers", []);
var moduloUsuario = angular.module("usuarioControllers", []);
var moduloTipoUsuario = angular.module("tipoUsuarioControllers", []);
var moduloMovimiento = angular.module("movimientoControllers", []);
var moduloCuentaBancaria = angular.module("cuentaBancariaControllers", []);
var moduloCuentaAsociada = angular.module("cuentaAsociadaControllers", []);
var moduloCategoriaMovimiento = angular.module("categoriaMovimientoControllers", []);
var moduloBanco = angular.module("bancoControllers", []);
// -------------------------
// var moduloCharts = angular.module("chart.js", []);