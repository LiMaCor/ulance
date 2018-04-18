'use strict';
moduloServicios.factory('serverCallService',
    ['$http', 'constantService',
        function ($http, constantService) {
            $http.defaults.headers.put['Content-Type'] = 'application/json;charset=utf-8';
            return {
                get: function (ob, id) {
                    var data = { ob: ob, op: "get", json: { id: id } };
                    return $http({
                        url: constantService.getAppUrl() + "?XDEBUG_SESSION_START",
                        method: 'GET',
                        params: data
                    })
                },
                getCount: function (ob) {
                    var data = { ob: ob, op: "getCount" };
                    return $http({
                        url: constantService.getAppUrl() + "?XDEBUG_SESSION_START",
                        method: 'GET',
                        params: data                        
                    })
                },
                getPage: function (ob, np, rpp, filter) {
                    var data = { ob: ob, op: "getPage", json: { np: np, rpp: rpp, filter: filter } };
                    return $http({
                        url: constantService.getAppUrl() + "?XDEBUG_SESSION_START",
                        method: 'GET',
                        params: data
                    })
                }
            }
        }
    ]);