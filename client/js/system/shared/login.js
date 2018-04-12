'use strict';
moduloSistema.controller('LoginController',
    ['$http', '$scope', '$location', 'constantService', 'sessionServerCallService',
        function ($http, $scope, $location, constantService, sessionServerCallService) {
            $scope.title = "Formulario de acceso al sistema";
            $scope.user = {};
            //------------------
            $scope.login = function () {
                sessionServerCallService.login($scope.user.username, $scope.user.password).then(function (response) {
                    if (response.data.status == 200) {
                        $location.path("/main");
                    } else {
                        return false;
                    }
                });
            };
        }
    ]);