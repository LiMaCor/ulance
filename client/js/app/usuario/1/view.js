'use strict'
moduloUsuario.controller('UsuariosViewController',
    ['$scope', '$routeParams', '$location', 'serverCallService', 'sessionServerCallService', 'constantService',
        function ($scope, $routeParams, $location, serverCallService, sessionServerCallService, constantService) {
            $scope.ob = "usuario";
            $scope.idUsuario = $routeParams.id;
            $scope.subir = {};
            //----------------
            $scope.status = null;
            //----------------
            function getDataFromServer() {
                sessionServerCallService.checkSession().then(function (response) {
                    if (response.data.status == 200) {
                        $scope.imgUsuario = response.data.json.imagen;
                        $scope.username = response.data.json.login;
                        return serverCallService.get($scope.ob, $scope.idUsuario);
                    } else {
                        return false;
                    }
                }).then(function (response) {
                    if (response.data.status == 200) {
                        $scope.datosUsuario = response.data.json;
                        $scope.isUserImageNull = response.data.json.imagen;
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
            $scope.submit = function () {
                serverCallService.uploadImg($scope.ob, $scope.subir, $scope.isUserImageNull).then(function (response) {
                    if (response.data.status == 200) {
                        $scope.status = "La imagen se ha subido correctamente";
                    } else {
                        $scope.status = "Error en la transmisión de datos";
                    }
                });
            }
            getDataFromServer();
        }
    ]);