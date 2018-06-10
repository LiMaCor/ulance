'use strict'
moduloMovimiento.controller('Movimientos1Controller',
    ['$http', '$scope', '$location', '$routeParams', 'constantService', 'toolService', 'sessionServerCallService', 'serverCallService',
        function ($http, $scope, $location, $routeParams, constantService, toolService, sessionServerCallService, serverCallService) {
            $scope.ob = "movimiento";
            $scope.profile = 1;
            //-------------------
            $scope.numeroPagina = toolService.checkDefault(1, 10); // Debugg: no es un valor fijo
            $scope.registrosPorPagina = toolService.checkDefault(10, 50); // Debugg: no es un valor fijo
            $scope.idCuentaBancaria = $routeParams.id;
            //-------------------
            function getDataFromServer() {
                sessionServerCallService.checkSession().then(function (response) {
                    if (response.data.status == 200) {
                        $scope.imgUsuario = response.data.json.imagen;
                        return serverCallService.getCount($scope.ob);
                    } else {
                        return false;
                    }
                }).then(function (response) {
                    if (response.data.status == 200) {
                        $scope.registros = response.data.json.rows;
                        $scope.paginas = toolService.calculatePages($scope.registrosPorPagina, $scope.registros);
                        if ($scope.numeroPagina > $scope.paginas) {
                            $scope.numeroPagina = $scope.paginas;
                        }
                        return serverCallService.getPage($scope.ob, $scope.numeroPagina, $scope.registrosPorPagina, $scope.idCuentaBancaria);
                    } else {
                        return false;
                    }
                }).then(function (response) {
                    if (response.data.status == 200) {
                        $scope.pagina = response.data.json;
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
            function chartMovimientos() {
                toolService.chartJS();
            }
            getDataFromServer();
            chartMovimientos();
        }
    ]);