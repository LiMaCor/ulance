'use strict';
moduloServicios.factory("sessionServerCallService",
    ["$http", "constantService",
        function ($http, constantService) {
            return {
                login: function (username, password) {
                    password = forge_sha256(password);
                    var data = { ob: "usuario", op: "login", json: { login: username, pass: password } };
                    // return $http.post(constantService.getAppUrl() + "?XDEBUG_SESSION_START", data);
                    return $http({
                        url: constantService.getAppUrl() + "?XDEBUG_SESSION_START",
                        method: 'GET',
                        params: data,
                        headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                    })
                },
                logout: function () {
                    var data = { ob: "usuario", op: "logout" };
                    return $http({
                        url: constantService.getAppUrl(),
                        method: "POST",
                        params: data
                    })
                },
                checkSession: function () {
                    var data = { ob: "usuario", op: "getSessionStatus" };
                    return $http({
                        url: constantService.getAppUrl(),
                        method: "POST",
                        params: data
                    })
                }
            }
        }
    ]);