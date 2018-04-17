'use strict'
moduloSistema.controller('ProfileController',
    ['$http', '$scope', '$location', 'constantService', 'sessionServerCallService', 'serverCallService',
        function ($http, $scope, $location, constantService, sessionServerCallService, serverCallService) {
            $scope.ob = "usuario";
            //----------------
            function getDataFromServer() {
                serverCallService.checkSession().then(function (response) {
                    if (response.data.status == 200) {
                        $scope.idUsuario = response.data.json[0].id;
                        return serverCallService.get($scope.ob, $scope.idUsuario);
                    } else {
                        return false;
                    }
                }).then(function (response) {
                    if (response.data.status == 200) {
                        $scope.datosUsuario = response.data.json;
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
            }
            getDataFromServer();
        }
    ]);