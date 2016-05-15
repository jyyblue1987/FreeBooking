
!function () {
    "use strict";
    angular.module("app", ["ngRoute",
        "ngAnimate",
        "ngSanitize",
        "ui.bootstrap",
        "app.ui.form.ctrls",
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
        "app.arrangements",
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
                config = {templateUrl: route };
<<<<<<< HEAD
           
            return $routeProvider.when(url, config), $routeProvider
        }

        var routes = ["home", "hotels", "newhotel", "hotelData", "addnewroom", "pages/404", "arrangement"];
=======
            return $routeProvider.when(url, config), $routeProvider
        }

        var routes = ["home", "hotels", "newhotel", "hotelData", "addnewroom", "arrangements", "pages/404"];
>>>>>>> dev

        routes.forEach(function (route) {
            setRoutes(route)
        }),
        $routeProvider
        .when("/", {
                redirectTo: "home"
            })
        .when("/arrangements", {
            templateUrl: "views/pages/arrangements.html"
        })
        .when("/404", {
            templateUrl: "views/404.html"
        })
        .otherwise({
            redirectTo: "/404"
        })
    }]);

}();



/**********Started here******************/
var hotels = angular.module("app.hotels", []);

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

var arrangements = angular.module("app.arrangements", []);


/*** App Controllers Module ***/
var ctrls = angular.module("app.ctrls", []);

/*** UI Form Controllers Module ***/
var uiFormCtrls = angular.module("app.ui.form.ctrls", []);

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
