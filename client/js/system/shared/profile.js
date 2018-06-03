'use strict'
moduloSistema.controller('ProfileController',
    ['$http', '$scope', '$location', 'constantService', 'sessionServerCallService', 'serverCallService',
        function ($http, $scope, $location, constantService, sessionServerCallService, serverCallService) {
            $scope.ob = "usuario";
            $scope.subir = {};
            //----------------
            $scope.status = null;
            //----------------
            function getDataFromServer() {
                sessionServerCallService.checkSession().then(function (response) {
                    if (response.data.status == 200) {
                        $scope.idUsuario = response.data.json.id;
                        $scope.imgUsuario = response.data.json.imagen;
                        $scope.isUserImageNull = response.data.json.imagen;
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