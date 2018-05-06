'use strict';
moduloUsuario.controller('Usuarios1Controller',
    ['$scope', '$location', 'serverCallService', 'sessionServerCallService', 'toolService', 'constantService',
        function ($scope, $location, serverCallService, sessionServerCallService, toolService, constantService) {
            $scope.ob = "usuario";
            //-------------------------
            $scope.numeroPagina = 1;
            $scope.registrosPorPagina = 10;
            //-------------------------
            function getDataFromServer() {
                sessionServerCallService.checkSession().then(function (response) {
                    if (response.data.status == 200) {
                        $scope.usuarioEnSesion = response.data.json;
                        return serverCallService.getCount($scope.ob);
                    } else {
                        return false;
                    }
                }).then(function (response) {
                    if (response.data.status == 200) {
                        $scope.registros = response.data.json;
                        $scope.paginas = toolService.calculatePages($scope.registrosPorPagina, $scope.registros)
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
            $scope.anyadirUsuario = function () {
                $location.path("/usuario/add");
            };
            getDataFromServer();
        }
    ]);