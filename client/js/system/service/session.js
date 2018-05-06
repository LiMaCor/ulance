'use strict';
moduloServicios.factory('sessionService', function ($q, sessionServerCallService, $location) {
    var isSessionActiveTF = false;
    var sessionInfo = null;
    var nextUrl = null;
    return {
        anyAuthenticationPromise: function () {
            var deferred = $q.defer();
            sessionServerCallService.checkSession().then(function (response) {
                if (response.data.status == 200) {
                    isSessionActiveTF = true;
                    sessionInfo = response.data.json;
                    deferred.resolve();
                } else {
                    isSessionActiveTF = false;
                    deferred.resolve();
                    $location.path("/");
                }
            }).catch(function (data) {
                isSessionActiveTF = false;
                deferred.resolve();
                $location.path("/");
            });
            return deferred.promise;
        },
        isSessionActive: function () {
            return isSessionActiveTF;
        },
        setSessionInactive: function () {
            isSessionActiveTF = false;
            sessionInfo = null;
        },
        setSessionActive: function () {
            isSessionActiveTF = true;
        },
        getSessionInfo: function () {
            return sessionInfo;
        },
        setSessionInfo: function (value) {
            sessionInfo = value;
        },
        setNextURL: function (value) {
            nextUrl = value;
        }
    };
});