'use strict'
moduloCuentaBancaria.controller('CuentasBancariasController',
    ['$http', '$scope', '$location', 'constantService', 'sessionServerCallService', 'serverCallService',
        function ($http, $scope, $location, constantService, sessionServerCallService, serverCallService) {
            $scope.ob = "cuentabancaria";
            //-------------------
            $scope.np = null;
            $scope.rpp = null;
            //-------------------
            function getDataFromServer() {
                sessionServerCallService.checkSession().then(function (response) {
                    if (response.data.status == 200) {
                        $scope.idUsuario = response.data.json.id;
                        return serverCallService.getPage($scope.ob, $scope.np, $scope.rpp, $scope.idUsuario);
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