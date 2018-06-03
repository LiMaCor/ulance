'use strict'
moduloBanco.controller('BancoNew1Controller',
    ['$scope', '$location', 'sessionServerCallService', 'serverCallService', 'constantService',
        function ($scope, $location, sessionServerCallService, serverCallService, constantService) {
            $scope.ob = "banco";
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
                    } else {
                        return false;
                    }
                });
            };
            $scope.add = function () {
                console.log($scope.datosFormulario);
                serverCallService.set($scope.ob, $scope.datosFormulario).then(function (response) {
                    if (response.data.status == 200) {
                        $scope.status = "Banco creado correctamente";
                    } else {
                        $scope.status = "Error en la recepción de datos en el servidor";
                    }
                });
            };
            getDataFromServer();
        }
    ])