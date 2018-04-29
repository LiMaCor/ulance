'use strict'
moduloMovimiento.controller('RegistrosController',
    ['$http', '$scope', '$location', 'constantService', 'serverCallService','sessionServerCallService', 'toolService',
        function ($http, $scope, $location, constantService, serverCallService, sessionServerCallService, toolService) {
            $scope.ob = "movimiento";
            //-----------------------
            $scope.numeroPagina = toolService.checkDefault(1, 10); // Debugg: no es un valor fijo
            $scope.registrosPorPagina = toolService.checkDefault(10, 50); // Debugg: no es un valor fijo
            //-----------------------
            function getDataFromServer() {
                serverCallService.getCount($scope.ob).then(function (response) {
                    if (response.data.status == 200) {
                        $scope.registros = response.data.json.rows;
                        $scope.paginas = toolService.calculatePages($scope.registrosPorPagina, $scope.registros);
                        if ($scope.numeroPagina > $scope.paginas) {
                            $scope.numeroPagina = $scope.paginas;
                        }
                        return serverCallService.getPage($scope.ob, $scope.numeroPagina, $scope.registrosPorPagina);
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
            };
            function chartMovimientos() {
                toolService.chartJS();
            };
            $scope.logout = function () {
                sessionServerCallService.logout().then(function (response) {
                    if (response.data.status == 200) {
                        $location.path("/login");
                    } else {
                        return false;
                    }
                })
            }
            getDataFromServer();
            chartMovimientos();
        }
    ]);