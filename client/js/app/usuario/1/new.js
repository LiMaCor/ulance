'use strict'
moduloUsuario.controller('UsuarioNew1Controller',
    ['$scope', '$location', 'sessionServerCallService', 'serverCallService', 'constantService',
        function ($scope, $location, sessionServerCallService, serverCallService, constantService) {
            $scope.ob = "usuario";
            $scope.obExterno = "tipousuario";
            $scope.datosFormulario = {};
            //---------------------
            $scope.status = null;
            //---------------------
            $scope.numeroPagina = 1;
            $scope.registrosPorPagina = 10;
            //---------------------
            function getDataFromServer() {
                sessionServerCallService.checkSession().then(function (response) {
                    if (response.data.status == 200) {
                        $scope.imgUsuario = response.data.json.imagen;
                        return serverCallService.getPage($scope.obExterno, $scope.numeroPagina, $scope.registrosPorPagina);
                    } else {
                        return false;
                    }
                }).then(function (response) {
                    if (response.data.status == 200) {
                        $scope.tipoUsuarios = response.data.json;
                    } else {
                        return false;
                    }
                });
            };
            $scope.add = function() {
                console.log($scope.datosFormulario);
                serverCallService.set($scope.ob, $scope.datosFormulario).then(function (response) {
                    if (response.data.status == 200) {
                        $scope.status = "El usuario se ha creado correctamente";
                    } else {
                        $scope.status = "Error en la recepción de datos en el servidor";
                    }
                });
            };
            getDataFromServer();
        }
    ])