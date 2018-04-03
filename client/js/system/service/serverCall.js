'use strict';
moduloServicios.factory('serverCallService',
    ['$http', 'constantService',
        function ($http, constantService) {
            return {
                get: function (ob, id) {
                    var data = { ob: ob, op: "get", json: { id: id } };
                    return $http({
                        url: constantService.getAppUrl(),
                        method: "POST",
                        params: data
                    })
                },
                getCount: function (ob) {
                    var data = { ob: ob, op: "getCount" };
                    return $http({
                        url: constantService.getAppUrl(),
                        method: "POST",
                        params: data
                    })
                },
                getPage: function (ob, np, rpp) {
                    var data = { ob: ob, op: "getPage", json: { np: np, rpp: rpp } };
                    return $http({
                        url: constantService.getAppUrl(),
                        method: "POST",
                        params: data
                    })
                }
            }
        }
    ]);