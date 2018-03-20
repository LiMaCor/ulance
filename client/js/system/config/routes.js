/**
 * Rutas generales
 */

ulance.config(['$routeProvider', function ($routeProvider) {
    $routeProvider.when('/', {
        templateUrl: 'js/system/shared/index.html',
        controller: 'HomeController'
    })
    .when('/login', {
        templateUrl: 'js/system/shared/login.html',
        controller: 'LoginController'
    })
    .when('/logout', {
        templateUrl: 'js/system/shared/logout.html',
        controller: 'LogoutController'
    })
    .otherwise({
        redirectTo: '/'
    });
}]);