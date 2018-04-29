/**
 * Rutas generales
 */

ulance.config(['$routeProvider', '$locationProvider', function ($routeProvider) {
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
    .when('/registros', {
        templateUrl: 'js/system/shared/app/movimiento/plist.html',
        controller: 'RegistrosController'
    })
    .when('/logout', {
        templateUrl: 'js/system/shared/logout.html',
        controller: 'LogoutController'
    })
    .when('/profile', {
        templateUrl: 'js/system/shared/profile.html',
        controller: 'ProfileController'
    })
    // .when('/usuario/1/plist/:np?/:rpp?', {
    //     templateUrl: 'js/app/usuario/1/plist.html',
    //     controller: 'Usuario1PlistController'
    // })
    .when('/cuentas', {
        templateUrl: 'js/app/cuentabancaria/1/plist.html',
        controller: 'CuentasBancarias1Controller'
    })
    .when('/banco', {
        templateUrl: 'js/app/banco/1/plist.html',
        controller: 'Banco1Controller'
    })
    .when('/cuentas-banco/:id', {
        templateUrl: 'js/system/shared/app/cuentabancaria/plist.html',
        controller: 'CuentasBancariasController'
    })
    //--------- PERFIL 1 -----------
    .when('/cuentas/1/:id', {
        templateUrl: 'js/system/shared/app/movimiento/plist.html',
        controller: 'Movimientos1Controller'
    })
    .otherwise({
        redirectTo: '/'
    });
}]);