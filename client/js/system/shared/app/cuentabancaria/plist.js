'use strict'
moduloCuentaBancaria.controller('CuentasBancariasController',
    ['$http', '$scope', '$location', '$routeParams', 'constantService', 'sessionServerCallService', 'serverCallService',
        function ($http, $scope, $location, $routeParams, constantService, sessionServerCallService, serverCallService) {
            $scope.ob = "cuentabancaria";
            //---------------
            $scope.numeroPagina = 1;
            $scope.registrosPorPagina = 50;
            //---------------
            function getDataFromServer() {
                sessionServerCallService.checkSession().then(function (response) {
                    if (response.data.status == 200) {
                        $scope.idUsuario = response.data.json.id;
                        $scope.nombreUsuario = response.data.json.nombre;
                        $scope.primerApellidoUsuario = response.data.json.primerapellido;
                        $scope.segundoApellidoUsuario = response.data.json.segundoapellido;
                        $scope.filtros = { id_1: $scope.idUsuario, id_2: parseInt($routeParams.id) };
                        if (response.data.json.tipousuario_id == 1) {
                            $scope.profile = 1;
                        } else {
                            $scope.profile = 2;
                        }
                        return serverCallService.getPage($scope.ob, $scope.numeroPagina, $scope.registrosPorPagina, $scope.filtros);
                    } else {
                        return false;
                    }
                }).then(function (response) {
                    if (response.data.status == 200) {
                        $scope.cuentasBancarias = response.data.json;
                    } else {
                        return false;
                    }
                });
            }
            $scope.logout = function () {
                sessionServerCallService.logout().then(function (response) {
                    if (response.data.status == 200) {
                        $location.path("/login");
                    } else {
                        return false;
                    }
                });
            }
            getDataFromServer();
        }
    ]);