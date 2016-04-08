
!function () {
    "use strict";
    angular.module("app", ["ngRoute",
        "ngAnimate",
        "ngSanitize",
        "ui.bootstrap",
        "ui.select",
        "textAngular",
        "easypiechart",
        "angular-skycons",
        "angular-loading-bar",
        "FBAngular",
        "app.ctrls",
        "app.directives",
        "app.services",
        "app.hotels",
        "app.ServerRequest",
        "app.rooms",
        "flow","angularSpinners"])

    .config(["uiSelectConfig", function (uiSelectConfig) {
        uiSelectConfig.theme = "bootstrap"
    }])
    .config(["cfpLoadingBarProvider", function (cfpLoadingBarProvider) {
        cfpLoadingBarProvider.includeSpinner = 1, cfpLoadingBarProvider.latencyThreshold = 50
    }])
    .config(["$routeProvider", function ($routeProvider) {
        function setRoutes(route) {
            var url = "/" + route,
                config = {templateUrl: route },
                ctrlJs = "../../public/js/angularJs/controllers/hotelControllers.js";
                // ctrlJs = "../../public/js/angularJs/controllers/hotel" + route + "Controllers.js";
            return $routeProvider.when(url, config), $routeProvider
        }

        var routes = ["home", "hotels", "newhotel", "hotelData", "addnewroom", "pages/404"];

        routes.forEach(function (route) {
            setRoutes(route)
        }),
        $routeProvider
        .when("/", {
                redirectTo: "home"
            })
        .when("/404", {
            templateUrl: "views/404.html"
        })
        .otherwise({
            redirectTo: "/404"
        })
    }]);


    /*.config(['$routeProvider', function($routeProvider) {
        $routeProvider
        .when('/', {
            templateUrl: 'home'
        })
        .when('/hotels', {
            templateUrl: '/hotels',
            controller: '/js/angularJs/controllers/hotelControllers.js'
        })
        .when('/newhotel', {
            templateUrl: '/newhotel',
            controller: '/js/angularJs/controllers/hotelControllers.js'
        })
        .when('/hotelData', {
            templateUrl: '/hotelData',
            controller: '/js/angularJs/controllers/hotelControllers.js'
        })
        .when('/addnewroom', {
            templateUrl: '/addnewroom',
            controller: '/js/angularJs/controllers/roomControllers.js'
        })
        .otherwise({
            redirectTo: 'views/404.html'
        });
    }]);*/


}();



/**********Started here******************/
var hotels = angular.module('app.hotels',[]);

/***Rooms module started here***/
var rooms = angular.module('app.rooms',[]).config(['$routeProvider', function($routeProvider) {
        $routeProvider.when('/getRoom/:name/:id', {
            templateUrl: function(urlattr){
                return 'getRoom/' + urlattr.name + '/' + urlattr.id;
            },
            controller: 'roomsController'
        });
    }
]);


/*** App Controllers Module ***/
var ctrls = angular.module("app.ctrls", []);

/*** App Directives Module ***/
var appDirective = angular.module("app.directives", []).directive("toggleNavMin", ["$rootScope", function ($rs) {
    return function (scope, el) {
        var app = $("#app");
        $rs.$watch("isMobile", function () {
            $rs.isMobile && app.removeClass("nav-min")
        }), el.on("touchstart click", function (e) {
            $rs.isMobile || (app.toggleClass("nav-min"), $rs.$broadcast("nav.reset"), $rs.$broadcast("chartist.update")), e.preventDefault()
        })
    }
}]);

/*** App Services Module ***/
angular.module("app.services", []);


//# sourceMappingURL=app.js.map
