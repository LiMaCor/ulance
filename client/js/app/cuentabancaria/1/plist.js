'use strict'
moduloCuentaBancaria.controller('CuentasBancarias1Controller',
    ['$http', '$scope', '$location', 'constantService', 'sessionServerCallService', 'serverCallService',
        function ($http, $scope, $location, constantService, sessionServerCallService, serverCallService) {
            $scope.ob = "cuentabancaria";
            $scope.profile = 1;
            //-------------------
            $scope.numeroPagina = null;
            $scope.registrosPorPagina = null;
            //-------------------
            function getDataFromServer() {
                sessionServerCallService.checkSession().then(function (response) {
                    if (response.data.status == 200) {
                        $scope.idUsuario = response.data.json.id;
                        $scope.nombreUsuario = response.data.json.nombre;
                        $scope.primerApellidoUsuario = response.data.json.primerapellido;
                        $scope.segundoApellidoUsuario = response.data.json.segundoapellido;
                        $scope.filtros = { id_1: $scope.idUsuario };
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