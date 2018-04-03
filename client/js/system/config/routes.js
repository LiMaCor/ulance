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
        controller: 'MainController'
    })
    .when('/logout', {
        templateUrl: 'js/system/shared/logout.html',
        controller: 'LogoutController'
    })
    .when('/usuario/1/plist/:np?/:rpp?', {
        templateUrl: 'js/app/usuario/1/plist.html',
        controller: 'Usuario1PlistController'
    })
    .otherwise({
        redirectTo: '/'
    });
}]);