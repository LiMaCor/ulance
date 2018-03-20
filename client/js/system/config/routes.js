/**
 * Rutas generales
 */

ulance.config(['$routeProvider', function ($routeProvider) {
    $routeProvider.when('/', {
        templateUrl: 'js/system/shared/login.html',
        controller: 'LoginController'
    })
    .when('/login', {
        templateUrl: 'js/system/shared/login.html',
        controller: 'LoginController'
    })
    .when('/main', {
        templateUrl: 'js/system/shared/main.html',
        controller: 'HomeController'
    })
    .when('/logout', {
        templateUrl: 'js/system/shared/logout.html',
        controller: 'LogoutController'
    })
    .otherwise({
        redirectTo: '/'
    });
}]);