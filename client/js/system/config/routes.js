/**
 * Rutas generales
 */

var anyAuthenticationPromise = function (sessionService) {
    return sessionService.anyAuthenticationPromise();
};

var administradorPromise = function (sessionService) {
    return sessionService.administradorPromise();
};

ulance.config(['$routeProvider', '$locationProvider', function ($routeProvider) {
    //--------- SISTEMA -------------
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
        controller: 'MainController',
        resolve: {auth: anyAuthenticationPromise}
    })
    .when('/logout', {
        templateUrl: 'js/system/shared/logout.html',
        controller: 'LogoutController',
        resolve: {auth: anyAuthenticationPromise}
    })
    //-------- SHARED ------------
    .when('/registros', {
        templateUrl: 'js/system/shared/app/movimiento/plist.html',
        controller: 'RegistrosController',
        resolve: {auth: administradorPromise}
    })
    .when('/profile', {
        templateUrl: 'js/system/shared/profile.html',
        controller: 'ProfileController',
        resolve: {auth: anyAuthenticationPromise}
    })
    .when('/cuentas', {
        templateUrl: 'js/app/cuentabancaria/1/plist.html',
        controller: 'CuentasBancarias1Controller',
        resolve: {auth: anyAuthenticationPromise}
    })
    .when('/banco', {
        templateUrl: 'js/app/banco/1/plist.html',
        controller: 'Banco1Controller',
        resolve: {auth: anyAuthenticationPromise}
    })
    .when('/banco/add', {
        templateUrl: 'js/app/banco/1/new.html',
        controller: 'BancoNew1Controller',
        resolve: {auth: administradorPromise}
    })
    .when('/cuentasbanco/:id', {
        templateUrl: 'js/system/shared/app/cuentabancaria/plist.html',
        controller: 'CuentasBancariasController',
        resolve: {auth: anyAuthenticationPromise}
    })
    //--------- PERFIL 1 -----------
    .when('/usuario/add', {
        templateUrl: 'js/app/usuario/1/new.html',
        controller: 'UsuarioNew1Controller',
        resolve: {auth: administradorPromise}
    })
    .when('/usuarios', {
        templateUrl: 'js/app/usuario/1/plist.html',
        controller: 'Usuarios1Controller',
        resolve: {auth: administradorPromise}
    })
    .when('/usuario/:id', {
        templateUrl: 'js/app/usuario/1/view.html',
        controller: 'UsuariosViewController',
        resolve: {auth: anyAuthenticationPromise}
    })
    .when('/cuentas/1/:id', {
        templateUrl: 'js/system/shared/app/movimiento/plist.html',
        controller: 'Movimientos1Controller',
        resolve: {auth: anyAuthenticationPromise}
    })
    .otherwise({
        redirectTo: '/main'
    });
}]);