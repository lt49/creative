//var app = angular.module("app-iprosap", ['ngAnimate', 'ngSanitize', 'ui.bootstrap', 'mwl.calendar', 'colorpicker.module', "ui.router"]);
var app = angular.module("app-iprosap", ["ui.router", 'ngAnimate', 'ngSanitize','ui.bootstrap', 'mwl.calendar', 'colorpicker.module','ui.toggle', 'ngMask', 'ngCookies', 'ngclipboard']);

app.config(function($stateProvider, $urlRouterProvider, $locationProvider){
    $locationProvider.html5Mode(true).hashPrefix("!");
    $stateProvider
    .state("dashboard",{
        url: "/dashboard",
        templateUrl: "public/view/main/dashboardHome.php",
        //templateUrl: "public/view/main/homeContentEx.php",
        controller: "Dashboard"
    })
//:::::::::::::::::::: CLIENTES :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    .state("clientes",{
        url: "/clientes",
        templateUrl: "public/view/mantenimiento/cg_clientes.php",
        controller: "CGClientes"
    })
//:::::::::::::::::::: REPORTES :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    .state("rep_creditos",{
        url: "/rep_creditos",
        templateUrl: "public/view/reportes/rep_creditos.php",
        controller: "RGcreditos"
    })
//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    .state("usuario",{
        url: "/usuario",
        templateUrl: "public/view/mantenimiento/usuario.php",
        controller: "MGusuario"
    })
    .state("roles",{
        url: "/roles",
        templateUrl: "public/view/mantenimiento/roles.php",
        controller: "MGroles"
    })
//:::::::::::: PRODUCTOS ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    .state("producto",{
        url: "/producto",
        templateUrl: "public/view/mantenimiento/producto.php",
        controller: "MGproducto"
    })
//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    .state("credito-grifo",{
        url: "/credito",
        templateUrl: "public/view/puntoventa/credito-grifo/cg-busqueda.php",
        controller: "Credito-grifo"
    })
    .state("pagar-credito-grifo",{
        url: "/pagarcredito",
        templateUrl: "public/view/puntoventa/pagar-credito-grifo/cg-busqueda.php",
        controller: "PagarCredito-grifo"
    })
    .state("pagar-credito-grifo.deuda",{
        url: "/deuda",
        params: {parametros: null},
        views: {
            "creditoIP": {
                templateUrl: "public/view/puntoventa/pagar-credito-grifo/cg-datosCliente.php",
                controller: "CGcliente"
            },
            "creditoIPdetail": {
                templateUrl: "public/view/puntoventa/pagar-credito-grifo/cg-findCreditoDeuda.php",
                controller: "CGDeudaPagar"
            }
        }
    })
//:::::::::::: CREDITOS ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::    
    .state("credito-grifo.credito",{
        url: "/vender",
        params: {parametros: null},
        views: {
            "creditoIP": {
                templateUrl: "public/view/puntoventa/credito-grifo/cg-datosCliente.php",
                controller: "CGcliente"
                },
            "creditoIPdetail": {
                templateUrl: "public/view/puntoventa/credito-grifo/cg-producto.php",
                controller: "CGProducto"
               }
        }
    })
    .state("credito-grifo.vender",{
        url: "/vender",
        params: {parametros: null},
        views: {
            "creditoIP": {
                templateUrl: "public/view/puntoventa/credito-grifo/cg-datosCliente.php",
                controller: "CGcliente"
                },
            "creditoIPdetail": {
                templateUrl: "public/view/puntoventa/credito-grifo/cg-vender.php",
                controller: "CGVender"
               }
        }
    })
    .state("credito-grifo.deuda",{
        url: "/deuda",
        params: {parametros: null},
        views: {
            "creditoIP": {
                templateUrl: "public/view/puntoventa/credito-grifo/cg-datosCliente.php",
                controller: "CGcliente"
            },
            "creditoIPdetail": {
                templateUrl: "public/view/puntoventa/credito-grifo/cg-findCreditoDeuda.php",
                controller: "CGDeuda"
            }
        }
    })
    .state("credito-grifo.diario",{
        url: "/diario",
        params: {parametros: null},
        views: {
            "creditoIP": {
                templateUrl: "public/view/puntoventa/credito-grifo/cg-datosCliente.php",
                controller: "CGcliente"
            },
            "creditoIPdetail": {
                templateUrl: "public/view/puntoventa/credito-grifo/cg-findPagoDiario.php",
                controller: "CGPagoDiario"
            }
        }

        //templateUrl: "public/view/puntoventa/credito-grifo/cg-findPagoDiario.php"
        /*,
        controller: "CGPagoDiario"*/
    })
//:::::: POS ::::::::::::::::::::::::::::::::::::
    .state("cg_despachopos",{
        url: "/despachopos",
        templateUrl: "public/view/puntoventa/despacho/cg_despachopos.php",
        controller: "cg_despachopos"
    })
    .state("cg_despacho",{
        url: "/despacho",
        templateUrl: "public/view/puntoventa/despacho/cg_despacho.php",
        controller: "cg_despacho"
    });
    
//:::::: FIN POS ::::::::::::::::::::::::::::::::::::
    $urlRouterProvider.otherwise("dashboard");

});

app.value("btn","btn-warning");

app.run(function($rootScope,btn) {
  $rootScope.btnwarning=btn;
});
/*app.factory("ajax", function($http, $q){
    var ajax = {};

    ajax.objlist = {};
    ajax.objlist.getList = function (op, url){
        var defered = $q.defer();
        var promise = defered.promise;

        ajax.objlist.op = op;
        $http.post(url, ajax.objlist)
        .then(function (data){
            defered.resolve(data);
        }, function(error){
            defered.reject(error);
        });
        return promise;
    }
    return ajax;
});*/



/*
app.controller("Dashboard", function($scope, $log, $filter, $timeout, $http, $q, $state, $rootScope, ajax){
    $scope.saludo = "Hola Home!";


});*/



/*app.controller("Otro", function($scope, $log, $filter, $timeout, $http, $q, $state){
    $scope.saludo = "Hola Otro!";
});*/
//el peligro que entraña el conocimiento especulativo y la educacion correcta
