/**
 * Aquí definimos que se utilice el modo html5 para escapar el # en nuestras
 * rutas.
 */

ulance.config(['$locationProvider', function ($locationProvider) {
    $locationProvider.html5Mode(true);
}]);

/**
 * Aquí definimos que se utilice CORS desde otros dominios.
 */
ulance.config(['$httpProvider', function ($httpProvider) {
    $httpProvider.defaults.withCredentials = true;
}]);