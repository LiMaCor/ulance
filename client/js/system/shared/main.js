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
            function getDataFromServer() {
                sessionServerCallService.checkSession().then(function (response) {
                    if (response.data.status == 200) {
                        $scope.idUsuario = response.data.json.id;
                        $scope.imgUsuario = response.data.json.imagen;
                        $scope.tipoUsuario = response.data.json.tipousuario_id;
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
                                    if (response.data.cantidad < 0) {
                                        $scope.gastos += parseInt(response.data.json.cantidad);
                                    } else {
                                        $scope.ingresos += parseInt(response.data.json[0].cantidad);
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
            $scope.usuarios = function () {
                $location.path("/usuarios");
            };
            $scope.bancos = function () {
                $location.path("/banco");
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