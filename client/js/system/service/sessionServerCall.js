'use strict';
moduloServicios.factory("sessionServerCallService",
    ["$http", "constantService",
        function ($http, constantService) {
            $http.defaults.headers.put['Content-Type'] = 'application/json;charset=utf-8';
            return {
                login: function (username, password) {
                    password = forge_sha256(password);
                    var data = { ob: "usuario", op: "login", json: { login: username, pass: password } };
                    return $http({
                        url: constantService.getAppUrl() + "?XDEBUG_SESSION_START",
                        method: 'GET',
                        params: data
                    })
                },
                logout: function () {
                    var data = { ob: "usuario", op: "logout" };
                    return $http({
                        url: constantService.getAppUrl() + "?XDEBUG_SESSION_START",
                        method: 'GET',
                        params: data
                    })
                },
                checkSession: function () {
                    var data = { ob: "usuario", op: "getSessionStatus" };
                    return $http({
                        url: constantService.getAppUrl() + "?XDEBUG_SESSION_START",
                        method: 'GET',
                        params: data
                    })
                }
            }
        }
    ]);