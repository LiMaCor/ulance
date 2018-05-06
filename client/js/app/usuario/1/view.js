'use strict'
moduloUsuario.controller('UsuariosViewController',
    ['$scope', '$routeParams', '$location', 'serverCallService', 'constantService',
        function ($scope, $routeParams, $location, serverCallService, constantService) {
            $scope.ob = "usuario";
            $scope.idUsuario = $routeParams.id;
            //----------------
            function getDataFromServer() {
                serverCallService.get($scope.ob, $scope.idUsuario).then(function (response) {
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
                });
            }
            getDataFromServer();
        }
    ]);