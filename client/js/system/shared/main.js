'use strict'
moduloSistema.controller('MainController',
    ['$http', '$scope', '$location', 'constantService', 'sessionServerCallService', 'serverCallService', 'toolService',
        function ($http, $scope, $location, constantService, sessionServerCallService, serverCallService, toolService) {
            $scope.ob_cuentabancaria = "cuentabancaria";
            $scope.ob_movimiento = "movimiento";
            //-------------------
            $scope.numeroPagina = 1;
            $scope.registrosPorPagina = 100;
            //-------------------
            $scope.gastos = 0;
            $scope.ingresos = 0;
            //-------------------
            function getDataFromServer() {
                sessionServerCallService.checkSession().then(function (response) {
                    if (response.data.status == 200) {
                        $scope.idUsuario = response.data.json.id;
                        $scope.filtros = { id_1: $scope.idUsuario };
                        return serverCallService.getPage($scope.ob_cuentabancaria, $scope.numeroPagina, $scope.registrosPorPagina, $scope.filtros);
                    } else {
                        return false;
                    }
                }).then(function (response) {
                    if (response.data.status == 200) {
                        $scope.cuentas = response.data.json;
                        angular.forEach($scope.cuentas, function (valor, indice) {
                            return serverCallService.getPage($scope.ob_movimiento, $scope.numeroPagina, $scope.registrosPorPagina, valor.id).then(function (response) {
                                if (response.data.status == 200) {
                                    if (response.data.json.cantidad < 0) {
                                        $scope.gastos += response.data.json.cantidad;
                                    } else {
                                        $scope.ingresos += response.data.json.cantidad;
                                    }
                                } else {
                                    return false;
                                }
                            });
                        });
                    } else {
                        return false;
                    }
                });
            }
            function chartMain() {
                toolService.chartJS();
            };
            $scope.registros = function () {
                $location.path("/registros");
            };
            $scope.logout = function () {
                sessionServerCallService.logout().then(function (response) {
                    if (response.data.status == 200) {
                        $location.path("/login");
                    } else {
                        return false;
                    }
                })
            };
            getDataFromServer();
            chartMain();
        }
    ]);