'use strict';
moduloUsuario.controller('Usuario1PlistController',
    ['$scope', '$routeParams', '$location', 'serverCallService', 'toolService', 'constantService',
        function ($scope, $routeParams, $location, serverCallService, toolService, constantService) {
            $scope.ob = "usuario";
            $scope.op = "plist";
            $scope.profile = 1;
            //-------------------------
            $scope.np = toolService.checkDefault(1, $routeParams.np);
            $scope.rpp = toolService.checkDefault(10, $routeParams.rpp);
            //-------------------------
            function getDataFromServer() {
                serverCallService.getCount($scope.ob).then(function (response) {
                    if (response.status == 200) {
                        $scope.registers = response.data.json;
                        $scope.pages = toolService.calculatePages($scope.rpp, $scope.registers)
                        if ($scope.np > $scope.pages) {
                            $scope.np = $scope.pages;
                        }
                        return serverCallService.getPage($scope.ob, $scope.np, $scope.rpp);
                    } else {
                        return false;
                    }
                }).then(function (response) {
                    if (response.status == 200) {
                        // Añadir "$scope" para mostrar los datos en la vista
                    } else {
                        return false;
                    }
                });
            }
            getDataFromServer();
        }
    ]);