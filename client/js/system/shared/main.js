'use strict'
moduloSistema.controller('MainController',
    ['$http', '$scope', '$location', 'constantService', 'sessionServerCallService',
        function ($http, $scope, $location, constantService, sessionServerCallService) {
            $scope.registros = function () {
                sessionServerCallService.checkSession().then(function (response) {
                    if (response.data.status == 200) {
                        $location.path("/registros");
                    } else {
                        return false;
                    }
                });
            };
        }
    ]);