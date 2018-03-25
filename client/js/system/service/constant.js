'use strict';
moduloServicios.factory('constantService', function() {
    return {
        getAppUrl: function() {
            return "http://localhost:8080/ulance/server/controller.php";
        },
        getCAppUrl: function() {
            return "http://localhost:8080/ulance/client/index.html";
        }
    }
});