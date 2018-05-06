'use strict'
moduloBanco.controller('Banco1Controller',
    ['$http', '$scope', '$location', 'constantService', 'sessionServerCallService', 'serverCallService',
        function ($http, $scope, $location, constantService, sessionServerCallService, serverCallService) {
            $scope.ob = 'banco';
            //------------------
            $scope.numeroPagina = 1;
            $scope.registrosPorPagina = 100;
            //------------------
            function getDataFromServer() {
                sessionServerCallService.checkSession().then(function (response) {
                    if (response.data.status == 200) {
                        $scope.usuarioEnSesion = response.data.json;
                        return serverCallService.getPage($scope.ob, $scope.numeroPagina, $scope.RegistrosPorPagina);
                    } else {
                        return false;
                    }
                }).then(function (response) {
                    if (response.data.status == 200) {
                        $scope.bancos = response.data.json;
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
                })
            };
            $scope.anyadirBanco = function () {
                $location.path("/banco/add");
            };
            getDataFromServer();
        }
    ]);