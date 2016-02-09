


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
    "flow","angularSpinners"]).config(["uiSelectConfig", function (uiSelectConfig) {
        uiSelectConfig.theme = "bootstrap"
    }]).config(["cfpLoadingBarProvider", function (cfpLoadingBarProvider) {
        cfpLoadingBarProvider.includeSpinner = 1, cfpLoadingBarProvider.latencyThreshold = 50
    }]).config(["$routeProvider", "$locationProvider", function ($routeProvider) {
        function setRoutes(route) {



                var url = "/" + route, config = {templateUrl: route };


            return $routeProvider.when(url, config), $routeProvider
        }

        var routes = ["home", "hotels", "newhotel", "hotelData", "addnewroom", "ui/buttons", "ui/typography", "ui/panels", "ui/grids", "ui/icons", "ui/misc", "ui/tabs", "ui/toasts", "forms/form-elems", "forms/form-validation", "forms/form-wizard", "charts/charts", "pages/404", "pages/login", "pages/register", "pages/invoice", "pages/search", "pages/projects", "pages/project-detail", "pages/lock-screen", "pages/forget-pass", "pages/timeline", "pages/profile", "tables/data-table", "tables/static-table", "email/inbox", "email/single-mail"];

        routes.forEach(function (route) {

            setRoutes(route)
        }),

            $routeProvider.

            when("/", {redirectTo: "home"}).

            when("/404", {templateUrl: "views/pages/404.html"}).

            otherwise({redirectTo: "/404"})
    }])
}();




/**********Started here******************/
var hotels = angular.module('app.hotels',[]);

hotels.controller('hotelController',function($scope, Request){

    $scope.push =  function()
    {


        var res = Request.post("post",   "auth/register",   $scope.person);


       res.then(

        function successCallback(response){

            swal({
                title:response.data.title,
                text: response.data.message,
                type: response.data.type,
                timer: 2000,
                showConfirmButton:false
            });

        },
        function errorCallback(response) {



            var errors = [];


            if(response.status == 422)  {

                angular.forEach(response.data, function(value, key){


                    errors.push(value[0]);

                });


            }else{


                errors.push("your session is expired")
            }



            $scope.errors=errors;
        }
    );

    }

});



hotels.controller("AllHotels", ["$scope", "$filter", "Request", function ($scope, $filter, Request) {

    var res = Request.post("get",   "listallhotels",   $scope.person);
    var datas = [];

res.then(

        function successCallback(response){





            angular.forEach(response.data, function(value, key){


             datas.push(value);

            });

            $scope.datas = datas;




            $scope.searchKeywords = "", $scope.filteredData = [], $scope.row = "", $scope.numPerPageOpts = [5, 7, 10, 25, 50, 100], $scope.numPerPage = $scope.numPerPageOpts[1], $scope.currentPage = 1, $scope.currentPageStores = [], $scope.select = function (page) {
                var start = (page - 1) * $scope.numPerPage, end = start + $scope.numPerPage;
                $scope.currentPageStores = $scope.filteredData.slice(start, end)
            }, $scope.onFilterChange = function () {
                $scope.select(1), $scope.currentPage = 1, $scope.row = ""
            }, $scope.onNumPerPageChange = function () {
                $scope.select(1), $scope.currentPage = 1
            }, $scope.onOrderChange = function () {
                $scope.select(1), $scope.currentPage = 1
            }, $scope.search = function () {
                $scope.filteredData = $filter("filter")($scope.datas, $scope.searchKeywords), $scope.onFilterChange()
            }, $scope.order = function (rowName) {
                $scope.row != rowName && ($scope.row = rowName, $scope.filteredData = $filter("orderBy")($scope.datas, rowName), $scope.onOrderChange())
            }, $scope.search(), $scope.select($scope.currentPage)

        }
    );

}]);


hotels.controller('addHotelController',function($scope, Request){


    $scope.rate = 7;
    $scope.max = 10;
    $scope.isReadonly = false;


    $scope.loadHotelData = function()
    {
        var res = Request.post("get",   "getHotelData",   "");

        res.then(

            function successCallback(response){

                    $scope.countries = response.data.countries;

                    if(response.data.exists){


                        $scope.hotel = response.data.hotel;
                        $scope.hotel.states = response.data.states;
                    }





            });

}

    $scope.loadHotelText = function()
    {
        var res = Request.post("get",   "getHotelText",   "");
        res.then(

            function successCallback(response){

                $scope.countries = response.data.countries;

                if(response.data.exists){



                    $scope.text = response.data.hotel_text;
                    //$scope.language ="en";

                }





            });
    };



    $scope.getState = function() {



        if($scope.hotel.country){


            var res = Request.post("get",   "getStates/"+$scope.hotel.country,  "");


            res.then(

                function successCallback(response){

                   $scope.hotel.states = response.data;

                });

        }
    };

    $scope.loadHotelSettings = function()
    {
        var res = Request.post("get",   "getHotelSettings",   "");
        res.then(

            function successCallback(response){


                if(response.data.exists){

                    if(response.data.hotel_settings.creditcards)
                    {
                        response.data.hotel_settings.creditcards  = JSON.parse(response.data.hotel_settings.creditcards);
                    }

                    if(response.data.hotel_settings.creditcards_text_checked)
                    {
                        response.data.hotel_settings.creditcards_text_checked  = JSON.parse(response.data.hotel_settings.creditcards_text_checked);
                    }

                    if(response.data.hotel_settings.creditcards_text)
                    {
                        response.data.hotel_settings.creditcards_text  = JSON.parse(response.data.hotel_settings.creditcards_text);
                    }

                    if(response.data.hotel_settings.payment_option_text_checked)
                    {
                        response.data.hotel_settings.payment_option_text_checked  = JSON.parse(response.data.hotel_settings.payment_option_text_checked);
                    }

                    if(response.data.hotel_settings.payment_option_text)
                    {
                        response.data.hotel_settings.payment_option_text  = JSON.parse(response.data.hotel_settings.payment_option_text);
                    }

                    if(response.data.hotel_settings.invoice_by_freebookings)
                    {
                        response.data.hotel_settings.invoice_by_freebookings  = JSON.parse(response.data.hotel_settings.invoice_by_freebookings);
                    }

                    if(response.data.hotel_settings.reservations_by_freebookings)
                    {
                        response.data.hotel_settings.reservations_by_freebookings  = JSON.parse(response.data.hotel_settings.reservations_by_freebookings);
                    }

                    if(response.data.hotel_settings.no_rooms_freebookings)
                    {
                        response.data.hotel_settings.no_rooms_freebookings  = JSON.parse(response.data.hotel_settings.no_rooms_freebookings);
                    }


                    if(response.data.hotel_settings.guest_arrival)
                    {
                        response.data.hotel_settings.guest_arrival  = JSON.parse(response.data.hotel_settings.guest_arrival);
                    }

                    $scope.settings = response.data.hotel_settings;
                }





            });
    }


    $scope.loadHotelOptions = function()
    {
        var res = Request.post("get",   "getHotelOptions",   "");
        res.then(

            function successCallback(response){


                if(response.data.exists){

                    if(response.data.options.option)
                    {
                        response.data.options.option  = JSON.parse(response.data.options.option);
                    }

                    if(response.data.options.custom_option)
                    {
                        response.data.options.custom_option = JSON.parse(response.data.options.custom_option);
                    }

                    if(response.data.options.custom_options_title)
                    {
                        response.data.options.custom_options_title   = JSON.parse(response.data.options.custom_options_title);
                    }



                    $scope.options = response.data.options;
                }





            });
    }


    $scope.hoveringOver = function(value) {

        $scope.overStar = value;
        $scope.percent = 100 * (value / $scope.max);


    };


    $scope.addHotel = function(){



        var res = Request.post("post",   "addHotel/"+$scope.user_id,   $scope.hotel);


        res.then(

            function successCallback(response){



                swal({
                    title:response.data.title,
                    text: response.data.message,
                    type: response.data.type,
                    timer: 2000,
                    showConfirmButton:false
                });

            },
            function errorCallback(response) {



                var errors = [];


                if(response.status == 422)  {

                    angular.forEach(response.data, function(value, key){


                        errors.push(value[0]);

                    });


                }else{


                    errors.push("your session is expired")
                }



                $scope.errors=errors;
            }
        );

    };


    $scope.hotelText = function()
    {



        var res = Request.post("post",   "addHotelText/"+$scope.user_id,   $scope.text);


        res.then(

            function successCallback(response){



                swal({
                    title:response.data.title,
                    text: response.data.message,
                    type: response.data.type,
                    timer: 2000,
                    showConfirmButton:false
                });

            },
            function errorCallback(response) {



                var errors = [];


                if(response.status == 422)  {

                    angular.forEach(response.data, function(value, key){


                        errors.push(value[0]);

                    });


                }else{


                    errors.push("your session is expired")
                }



                $scope.errors=errors;
            }
        );


    };


    $scope.addHotelSettings = function()
    {

        var data = {

            'tax_excluding':$scope.settings.tax_excluding,
            'creditcards' : JSON.stringify($scope.settings.creditcards),
            'creditcards_text_checked':JSON.stringify($scope.settings.creditcards_text_checked),
            'creditcards_text':JSON.stringify($scope.settings.creditcards_text),
            'payment_option_text_checked':JSON.stringify($scope.settings.payment_option_text_checked),
            'payment_option_text':JSON.stringify($scope.settings.payment_option_text),
            'reserve_without_credit_card':$scope.settings.reserve_without_credit_card,
            'booking_without_credit_card_email':$scope.settings.booking_without_credit_card_email,
            'guest_check_in_form':$scope.settings.guest_check_in_form,
            'tourist_tax_checkbox':$scope.settings.tourist_tax_checkbox,
            'tax_amt':$scope.settings.tax_amt,
            'tax_amt_val':$scope.settings.tax_amt_val,
            'invoice_by_freebookings':JSON.stringify($scope.settings.invoice_by_freebookings),
            'reservations_by_freebookings':JSON.stringify($scope.settings.reservations_by_freebookings),
            'no_rooms_freebookings':JSON.stringify($scope.settings.no_rooms_freebookings),
            'guest_arrival':JSON.stringify($scope.settings.guest_arrival),
            'engine_page_display':$scope.settings.engine_page_display


        }

         var res = Request.post("post",   "addHotelSettings/"+$scope.user_id,  data);

        res.then(

            function successCallback(response){



                swal({
                    title:response.data.title,
                    text: response.data.message,
                    type: response.data.type,
                    timer: 2000,
                    showConfirmButton:false
                });

            },
            function errorCallback(response) {



                var errors = [];


                if(response.status == 422)  {

                    angular.forEach(response.data, function(value, key){


                        errors.push(value[0]);

                    });


                }else{


                    errors.push("your session is expired")
                }



                $scope.errors=errors;
            }
        );



    };

    $scope.addHotelOptions = function()
    {

        var data = {

                    'option':JSON.stringify($scope.options.option),
                    'custom_options_title' : JSON.stringify($scope.options.custom_options_title),
                    'custom_option':JSON.stringify($scope.options.custom_option)

                   }

        var res = Request.post("post",   "addHotelOption/"+$scope.user_id,  data);


        res.then(

            function successCallback(response){



                swal({
                    title:response.data.title,
                    text: response.data.message,
                    type: response.data.type,
                    timer: 2000,
                    showConfirmButton:false
                });

            },
            function errorCallback(response) {



                var errors = [];


                if(response.status == 422)  {

                    angular.forEach(response.data, function(value, key){


                        errors.push(value[0]);

                    });


                }else{


                    errors.push("your session is expired")
                }



                $scope.errors=errors;
            }
        );

    }


});



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

rooms.controller('roomsController',["$scope", "Request", "regRooms","spinnerService", function($scope, Request, regRooms,spinnerService){





    $scope.loadRooms = function ()
    {

        /*$scope.regRooms = regRooms;
        while($scope.regRooms.length > 0) {
            $scope.regRooms.pop();
        }*/


       spinnerService.show('html5spinner');

        var res = Request.post("get",   "loadRooms",  "");

        res.then(

            function successCallback(response){

               $scope.regRooms = regRooms;


                for (var key in response.data.rooms) {
                    var arr = response.data.rooms[key];
                    $scope.regRooms.push(arr);

                }

                spinnerService.hide('html5spinner');

            },
            function errorCallback(response) {


                $scope.loadRooms();

            }
        );


    }


    $scope.addNewRoom = function ()
    {

        spinnerService.show('html5spinner');
        var data =[];

        data.push($scope.newroom);
        data.push($scope.des);
        var res = Request.post("post",   "addRoom/"+$scope.newroom.user_id,  data);

        res.then(

            function successCallback(response){


                $scope.regRooms = regRooms;
                $scope.regRooms.push(response.data.rooms);

                swal({
                    title:response.data.flash.title,
                    text: response.data.flash.message,
                    type: response.data.flash.type,
                    timer: 2000,
                    showConfirmButton:false
                });

                spinnerService.hide('html5spinner');

            },
            function errorCallback(response) {




            }
        );

    }
}]);

rooms.controller('roomsEditController',["$scope", "Request", "Data", "regRooms", "hotelRoomPhotos","spinnerService",  function($scope, Request, Data, regRooms, hotelRoomPhotos, spinnerService){


    $scope.obj = {};

    $scope.loadData = function( id ) {

        $scope.getloadspinner = function () {

            $scope.showRoom=true;
            spinnerService.show("roomData");
            dg = Data;
            dg.id = id;

            var roomData = Request.post("get", "getRoomData/" + dg.id, "");

            dg.roomData = roomData;
            roomData.then(
                function successCallback(response) {

                    $scope.des = response.data.roomDesc;
                    $scope.newroom = response.data.room;

                    dg.room = response.data.totRooms;
                    dg.room_name = response.data.room.name;
                    $scope.showRoom=false;
                    spinnerService.hide("roomData");
                },
                function errorCallback(response) {


                    $scope.loadData(id);

                }
            );
        }
    }
$scope.loadRoomPhotos = function() {

    $scope.getPhotoLoad = function() {

        dg = Data;
        spinnerService.show("roomPhoto");
        var res = Request.post("get", "getRoomPhotos/" + dg.id, "");


        res.then(
            function successCallback(response) {


                $scope.roomPhotos = hotelRoomPhotos;
                $scope.roomPhotos = [];
                for (var key in response.data.roomPhotos) {


                    var arr = response.data.roomPhotos[key];
                    $scope.roomPhotos.push(arr);

                }

                spinnerService.hide("roomPhoto");
            },
            function errorCallback(response) {


                $scope.loadRoomPhotos();

            }
        );
    }
}



    $scope.loadRoomOptions = function () {

        $scope.loadOptionspinner = function () {

            $scope.showOptions = true;
            spinnerService.show("roomOptions");
            dg = Data;

            var res = Request.post("get", "getRoomOptions/" + dg.id, "");


            res.then(
                function successCallback(response) {

                    if (response.data.roomOption) {
                        if (response.data.roomOption.option) {

                            $scope.options.option = JSON.parse(response.data.roomOption.option);
                        }

                        if (response.data.roomOption.custom_option) {
                            $scope.options.custom_option = JSON.parse(response.data.roomOption.custom_option);
                        }

                        if (response.data.roomOption.custom_options_title) {
                            $scope.options.custom_options_title = JSON.parse(response.data.roomOption.custom_options_title);
                        }
                    }
                    $scope.showOptions = false;
                    spinnerService.hide("roomOptions");
                },
                function errorCallback(response) {


                    $scope.loadRoomOptions();

                }
            );
        }
    }
    $scope.loadRoomSpecs = function()
    {
        dg = Data;

        dg.roomData.then(

            function successCallback(response){

                $scope.count = dg.room;

                }
        );
       // $scope.room.count = dg.room;
        //$scope.room.name = dg.room_name;

    }

    $scope.addNewRoom = function()
    {




        dg = Data;


        var data = [];

        data.push($scope.newroom);
        data.push($scope.des);

        var res = Request.post("post",   "updateRoomData/"+dg.id, data);

        res.then(

            function successCallback(response){


                $scope.regRooms = regRooms
                for (var key in $scope.regRooms ) {
                    var arr = $scope.regRooms[key];
                    for (var prop in arr) {
                        if (prop == "id" && arr[prop] == response.data.room.id) {
                            $scope.regRooms.pop(key);
                        }
                    }
                }
                $scope.regRooms.push(response.data.room);
                //
                swal({
                    title:response.data.flash.title,
                    text: response.data.flash.message,
                    type: response.data.flash.type,
                    timer: 2000,
                    showConfirmButton:false
                });

            },
            function errorCallback(response) {


                //Have to work on errors

            }
        );

    }





    $scope.addRoomOptions = function()
    {

        var data = {

            'option':JSON.stringify($scope.options.option),
            'custom_options_title' : JSON.stringify($scope.options.custom_options_title),
            'custom_option':JSON.stringify($scope.options.custom_option)

        }

        var res = Request.post("post",   "addRoomOptions/"+$scope.options.user_id+"/"+$scope.options.room_id,  data);



        res.then(

            function successCallback(response){


                //
                swal({
                    title:response.data.flash.title,
                    text: response.data.flash.message,
                    type: response.data.flash.type,
                    timer: 2000,
                    showConfirmButton:false
                });

            },
            function errorCallback(response) {


                //Have to work on errors

            }
        );
    }

    $scope.changeRoomData = function()
    {

        dg = Data;

        var res = Request.post("post",   "setRoomPrice/"+$scope.user.user_id+"/"+dg.id,  $scope.price);


        res.then(

            function successCallback(response){


                //
                swal({
                    title:response.data.flash.title,
                    text: response.data.flash.message,
                    type: response.data.flash.type,
                    timer: 2000,
                    showConfirmButton:false
                });

            },
            function errorCallback(response) {


                //Have to work on errors

            }
        );
    }

/***********Last Minute************/

    $scope.setlastMinute = function()
    {
        dg = Data;

        var res = Request.post("post",   "setlmPrice/"+$scope.user.user_id+"/"+dg.id,  $scope.price);
        res.then(

            function successCallback(response){


                //
                swal({
                    title:response.data.flash.title,
                    text: response.data.flash.message,
                    type: response.data.flash.type,
                    timer: 2000,
                    showConfirmButton:false
                });
                $scope.getLastMinutePrices($scope.user.user_id);

            },
            function errorCallback(response) {


                //Have to work on errors

            }
        );
    }



    $scope.getLastMinutePrices = function(uid)
    {

        $scope.lmData = [];
        $scope.show = false;


        dg = Data;

        var res = Request.post("get",   "getLstMinutePrice/"+uid+"/"+dg.id,  "");

        var datas = [];


        res.then(

            function successCallback(response){

                if(response.data != ""){

                   angular.forEach(response.data, function(value, key){

                        $scope.lmData.push(value);

                    });

                    $scope.show = true;

                }

            },
            function errorCallback(response) {


                $scope.getLastMinutePrices(uid);

            }
        );
    }

    $scope.edit = function(uid, refId, start, end, days, price)
    {

        $scope.price.days = days;
        $scope.price.from = start;
        $scope.price.to = end;
        $scope.price.cost = price;
        $scope.price.ref_id = refId;
        $scope.price.edit = "change";

    }

    $scope.delete = function (title, msg, uid, refId, start, end, days)
    {

        for (var key in $scope.lmData ) {

            var arr = $scope.lmData[key];

            for (var prop in arr) {
                if (prop == "ref_id" && arr[prop] == refId) {

                   // $scope.lmData.pop(key);
                    $scope.lmData.splice(key, 1);
                }
            }
        }

        if($scope.lmData.length == 0){
            $scope.show = false;
        }

        var delData = {};
        delData.from = start;
        delData.to = end;

        delData.ref_id = refId;
        delData.edit = "delete";
        delData.days = days;


        dg = Data;

        var res = Request.post("post",   "setlmPrice/"+uid+"/"+dg.id, delData);

        swal({
            title:title,
            text: msg,
            type: "success",
            timer: 2000,
            showConfirmButton:false
        });

    }

    /************Min Stay*************/

    $scope.setMinStay = function()
    {
        dg = Data;

        var res = Request.post("post",   "setMinStay/"+dg.id,  $scope.price);

        res.then(

            function successCallback(response){


                //
                swal({
                    title:response.data.flash.title,
                    text: response.data.flash.message,
                    type: response.data.flash.type,
                    timer: 2000,
                    showConfirmButton:false
                });
                $scope.getMinimumStay($scope.user.user_id);

            },
            function errorCallback(response) {


                //Have to work on errors

            }
        );
    }


    $scope.getMinimumStay = function(uid)
    {


        $scope.msData = [];
        $scope.show = false;
        dg = Data;

        var res = Request.post("get",   "getMinimumStay/"+uid+"/"+dg.id,  "");

        var datas = [];


        res.then(

            function successCallback(response){

                if(response.data != ""){

                    angular.forEach(response.data, function(value, key){

                        $scope.msData.push(value);

                    });

                    $scope.show = true;


                }

            },
            function errorCallback(response) {


                $scope.getMinimumStay(uid);

            }
        );
    }


    $scope.editMs = function(uid, refId, start, end, days, nights)
    {

        $scope.price.days = days;
        $scope.price.from = start;
        $scope.price.to = end;
        $scope.price.nights = nights;
        $scope.price.ref_id = refId;
        $scope.price.edit = "change";

    }

    $scope.deleteMs = function (title, msg, uid, refId, start, end, days)
    {

        for (var key in $scope.msData ) {

            var arr = $scope.msData[key];

            for (var prop in arr) {
                if (prop == "ref_id" && arr[prop] == refId) {

                    // $scope.lmData.pop(key);
                    $scope.msData.splice(key, 1);
                }
            }
        }

        if($scope.msData.length == 0){
            $scope.show = false;
        }

        var delData = {};
        delData.from = start;
        delData.to = end;

        delData.ref_id = refId;
        delData.edit = "delete";
        delData.days = days;


        dg = Data;

        var res = Request.post("post",   "setMinStay/"+dg.id, delData);

        swal({
            title:title,
            text: msg,
            type: "success",
            timer: 2000,
            showConfirmButton:false
        });

    }


    /******* Set Discount Dates Module ****/

    $scope.getDiscountDates = function(uid, nextFlag) {
        $scope.show = false;
        $scope.disCountData = [];
        $scope.showTable = false;
        dg = Data;


        if (nextFlag)
        {
            $scope.next = true;
        }



        var res = Request.post("get",   "getDiscountDates/"+uid+"/"+dg.id,  "");


        var datas = [];


        res.then(

            function successCallback(response){

                if(response.data != ""){

                    angular.forEach(response.data, function(value, key){

                        $scope.disCountData.push(value);

                    });

                    $scope.showTable = true;




                }

            },
            function errorCallback(response) {


                $scope.getMinimumStay(uid);

            }
        );

    }


    $scope.discountDatesNext = function(uid)
    {

        $scope.next = false;
        $scope.save = true;

        dg = Data;
        $scope.priceVanaf = [];
        $scope.discountPrice = [];
        spinnerService.show('html5spinner');
        var res = Request.post("post",   "getRoomNormalPrice/"+dg.id, "");

        res.then(

            function successCallback(response){

                if(response.data != ""){

                    for(var i = 1; i < $scope.price.start; i++)
                    {

                        $scope.priceVanaf.push(response.data.rooms.price);
                    }

                    for(var i = parseInt($scope.price.start); i <= $scope.price.till; i++)
                    {

                        $scope.discountPrice.push(i);


                    }



                    spinnerService.hide('html5spinner');


                }

            },
            function errorCallback(response) {


                discountDatesNext();

            }
        );





    }


    $scope.setDiscountDates = function(uid)
    {


        spinnerService.show('html5spinner');
        dg = Data;

        var res = Request.post("post",   "setDiscountDatesPrice/"+dg.id, $scope.price);


        res.then(

            function successCallback(response){

                if(response.data != ""){


                    swal({
                        title:response.data.flash.title,
                        text: response.data.flash.message,
                        type: response.data.flash.type,
                        timer: 2000,
                        showConfirmButton:false
                    });

                    $scope.getDiscountDates(uid, false);
                    spinnerService.hide('html5spinner');
                    $scope.next = true;
                    $scope.save = false;

                }

            },
            function errorCallback(response) {


                discountDatesNext();

            }
        );
    }



    $scope.discountDateEdit = function (uid, ref_id, start, end, days, discount_type, discount_compare, from, till)
    {


        $scope.price.days = days;
        $scope.price.from = start;
        $scope.price.to = end;
        $scope.price.discount_compare = discount_compare;
        $scope.price.discount_type = discount_type;
        $scope.price.start = from;
        $scope.price.till = till;
        $scope.price.ref_id = ref_id;
        $scope.price.edit = "change";

    }




    $scope.discountDateDelete = function (title, msg, uid, refId, start, end, days)
    {

        for (var key in $scope.disCountData ) {

            var arr = $scope.disCountData[key];

            for (var prop in arr) {
                if (prop == "ref_id" && arr[prop] == refId) {

                    // $scope.lmData.pop(key);
                    $scope.disCountData.splice(key, 1);
                }
            }
        }

        if($scope.disCountData.length == 0){
            $scope.showTable = false;
        }

        var delData = {};
        delData.from = start;
        delData.to = end;

        delData.ref_id = refId;
        delData.edit = "delete";
        delData.days = days;


        dg = Data;

        var res = Request.post("post",   "setDiscountDatesPrice/"+dg.id, delData);

        swal({
            title:title,
            text: msg,
            type: "success",
            timer: 2000,
            showConfirmButton:false
        });

    }

    /******* Set Excluding Break Fast ********/

    $scope.setexBreakFast = function ()
    {
        dg = Data;

        var res = Request.post("post",   "setexBreakFast/"+dg.id,  $scope.price);
        res.then(

            function successCallback(response){


                //
                swal({
                    title:response.data.flash.title,
                    text: response.data.flash.message,
                    type: response.data.flash.type,
                    timer: 2000,
                    showConfirmButton:false
                });
               $scope.getexBreakFast($scope.user.user_id);

            },
            function errorCallback(response) {


                //Have to work on errors

            }
        );
    }

    $scope.getexBreakFast = function(uid)
    {
        $scope.exData = [];
        $scope.show = false;
        dg = Data;

        var res = Request.post("get",   "getexBreakFast/"+uid+"/"+dg.id,  "");

        var datas = [];


        res.then(

            function successCallback(response){

                if(response.data != ""){

                    angular.forEach(response.data, function(value, key){

                        $scope.exData.push(value);

                    });

                    $scope.show = true;


                }

            },
            function errorCallback(response) {


                $scope.getexBreakFast(uid);

            }
        );
    }


    $scope.editEx = function(uid, refId, start, end, price)
    {


        $scope.price.from = start;
        $scope.price.to = end;
        $scope.price.cost = price;
        $scope.price.ref_id = refId;
        $scope.price.edit = "change";

    }

    $scope.deleteEx = function (title, msg, uid, refId, start, end)
    {

        for (var key in $scope.exData ) {

            var arr = $scope.exData[key];

            for (var prop in arr) {
                if (prop == "ref_id" && arr[prop] == refId) {

                    // $scope.lmData.pop(key);
                    $scope.exData.splice(key, 1);
                }
            }
        }

        if($scope.exData.length == 0){
            $scope.show = false;
        }

        var delData = {};
        delData.from = start;
        delData.to = end;

        delData.ref_id = refId;
        delData.edit = "delete";



        dg = Data;

        var res = Request.post("post",   "setexBreakFast/"+dg.id, delData);

        swal({
            title:title,
            text: msg,
            type: "success",
            timer: 2000,
            showConfirmButton:false
        });

    }


    /******* Single Use ***********/

    $scope.setSingleUse = function ()
    {
        dg = Data;

        var res = Request.post("post",   "setSingleUse/"+dg.id,  $scope.price);
        res.then(

            function successCallback(response){


                //
                swal({
                    title:response.data.flash.title,
                    text: response.data.flash.message,
                    type: response.data.flash.type,
                    timer: 2000,
                    showConfirmButton:false
                });
                $scope.getSingleUse($scope.user.user_id);

            },
            function errorCallback(response) {


                //Have to work on errors

            }
        );
    }


    $scope.getSingleUse = function(uid)
    {
        $scope.suData = [];
        $scope.show = false;
        dg = Data;

        var res = Request.post("get",   "getSingleUse/"+uid+"/"+dg.id,  "");

        var datas = [];


        res.then(

            function successCallback(response){

                if(response.data != ""){

                    angular.forEach(response.data, function(value, key){

                        $scope.suData.push(value);

                    });

                    $scope.show = true;


                }

            },
            function errorCallback(response) {


                $scope.getSingleUse(uid);

            }
        );
    }



    $scope.editSu = function(uid, refId, start, end, price)
    {


        $scope.price.from = start;
        $scope.price.to = end;
        $scope.price.cost = price;
        $scope.price.ref_id = refId;
        $scope.price.edit = "change";

    }


    $scope.deleteSu = function (title, msg, uid, refId, start, end)
    {

        for (var key in $scope.suData ) {

            var arr = $scope.suData[key];

            for (var prop in arr) {
                if (prop == "ref_id" && arr[prop] == refId) {

                    // $scope.lmData.pop(key);
                    $scope.suData.splice(key, 1);
                }
            }
        }

        if($scope.suData.length == 0){
            $scope.show = false;
        }

        var delData = {};
        delData.from = start;
        delData.to = end;

        delData.ref_id = refId;
        delData.edit = "delete";



        dg = Data;

        var res = Request.post("post",   "setSingleUse/"+dg.id, delData);

        swal({
            title:title,
            text: msg,
            type: "success",
            timer: 2000,
            showConfirmButton:false
        });

    }

    /******* Non-Refundable ******/

    $scope.setNonRefundable = function ()
    {
        dg = Data;

        var res = Request.post("post",   "setNonRefundable/"+dg.id,  $scope.price);
        res.then(

            function successCallback(response){


                //
                swal({
                    title:response.data.flash.title,
                    text: response.data.flash.message,
                    type: response.data.flash.type,
                    timer: 2000,
                    showConfirmButton:false
                });
                $scope.getNonRefundable($scope.user.user_id);

            },
            function errorCallback(response) {


                //Have to work on errors

            }
        );
    }


    $scope.getNonRefundable = function(uid)
    {
        $scope.nfData = [];
        $scope.show = false;
        dg = Data;

        var res = Request.post("get",   "getNonRefundable/"+uid+"/"+dg.id,  "");

        var datas = [];


        res.then(

            function successCallback(response){

                if(response.data != ""){

                    angular.forEach(response.data, function(value, key){

                        $scope.nfData.push(value);

                    });

                    $scope.show = true;


                }

            },
            function errorCallback(response) {


                $scope.getNonRefundable(uid);

            }
        );
    }


    $scope.editNf = function(uid, refId, start, end, price)
    {


        $scope.price.from = start;
        $scope.price.to = end;
        $scope.price.cost = price;
        $scope.price.ref_id = refId;
        $scope.price.edit = "change";

    }


    $scope.deleteNf = function (title, msg, uid, refId, start, end)
    {

        for (var key in $scope.nfData ) {

            var arr = $scope.nfData[key];

            for (var prop in arr) {
                if (prop == "ref_id" && arr[prop] == refId) {

                    // $scope.lmData.pop(key);
                    $scope.nfData.splice(key, 1);
                }
            }
        }

        if($scope.nfData.length == 0){
            $scope.show = false;
        }

        var delData = {};
        delData.from = start;
        delData.to = end;

        delData.ref_id = refId;
        delData.edit = "delete";



        dg = Data;

        var res = Request.post("post",   "setNonRefundable/"+dg.id, delData);

        swal({
            title:title,
            text: msg,
            type: "success",
            timer: 2000,
            showConfirmButton:false
        });

    }

    /******* Photo upload**********/
    $scope.config =  {


        target: 'roomPhotos',
        permanentErrors: [404, 500, 501],
        maxChunkRetries: 1,
        chunkRetryInterval: 5000,
        simultaneousUploads: 4,
        testChunks:false,
        query: function (flowFile, flowChunk) {
            dg = Data;

            return {
                room_id:dg.id, source: 'flow_query'
            };
        }

    }


        $scope.imageSuccess = function (file, msg, flow)
        {
            jMsg = JSON.parse(msg)

           // $scope.roomPhotos = hotelRoomPhotos;


            $scope.roomPhotos.push(jMsg.photo);

            swal({
                title:"Room Photo",
                text: "Photo Uploaded",
                type: "success",
                timer: 2000,
                showConfirmButton:false
            });



        }

    $scope.deletePhoto = function (id, index)
    {



        for (var key in $scope.roomPhotos ) {

            var arr = $scope.roomPhotos[key];

            for (var prop in arr) {
                if (prop == "id" && arr[prop] == id) {

                    // $scope.lmData.pop(key);
                    $scope.roomPhotos.splice(key, 1);
                }
            }
        }
        swal({
            title:"Room Photo",
            text: "Photo Deleted",
            type: "success",
            timer: 2000,
            showConfirmButton:false
        });

        var res = Request.post("get",   "deleteRoomPhoto/"+id, "");
    }



    $scope.checkPhotoIndex = function ($index){
        console.log($index);
        return false;
    }


}]);

!function () {
    "use strict";
    angular.module("app.ctrls", []).controller("AppCtrl", ["$rootScope", "$scope","spinnerService", function ($rs, $scope,spinnerService) {

$scope.getLoaded1 =  function() {


    var mm = window.matchMedia("(max-width: 767px)");
        $rs.isMobile = mm.matches ? !0 : !1, $rs.safeApply = function (fn) {
            var phase = this.$root.$$phase;
            "$apply" == phase || "$digest" == phase ? fn && "function" == typeof fn && fn() : this.$apply(fn)
        }, mm.addListener(function (m) {
            $rs.safeApply(function () {
                $rs.isMobile = m.matches ? !0 : !1
            })
        }), $scope.themeActive = "theme-zero", $scope.onThemeChange = function (theme) {
            $scope.themeActive = theme
        }, $rs.changeLayout = function () {
            $rs.isLayoutHorizontal = !$rs.isLayoutHorizontal
        }

}
    }]).controller("HeadCtrl", ["$scope", "Fullscreen", "$rootScope", function ($scope, Fullscreen) {
        $scope.toggleSidebar = function () {
            $scope.sidebarOpen = $scope.sidebarOpen ? !1 : !0
        }, $scope.fullScreen = function () {
            Fullscreen.isEnabled() ? Fullscreen.cancel() : Fullscreen.all()
        }, $scope.toggleHorizontalNav = function () {
            $scope.isHorizontalCollapsed = !$scope.isHorizontalCollapsed
        }
    }]).controller("NavCtrl", ["$scope", "$rootScope", function ($scope) {
        $scope.isCollapsed = !1
    }]).controller("DashboardCtrl", ["$scope", "$rootScope", function ($scope) {
        $scope.linedata = {
            labels: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
            series: [{name: "Earnings", data: [100, 150, 90, 40, 30, 50, 40]}, {
                name: "Downloads",
                data: [50, 100, 40, 25, 20, 35, 30]
            }]
        }, $scope.lineopts = {
            axisY: {offset: 25, labelOffset: {y: 5}},
            axisX: {showGrid: !1},
            showArea: !0,
            showLine: !1,
            showPoint: !0,
            fullWidth: !0
        }, $scope.serverpieoptions = {barColor: "#5974d9"}, $scope.serverpiepercent = 80, $scope.bouncepiepercent = 40, $scope.weathertoday = {
            icon: Skycons.PARTLY_CLOUDY_DAY,
            size: 48,
            color: "#38B4EE"
        }, $scope.forecastDetails = [{type: "Wind:", value: "7mph"}, {
            type: "Humidity:",
            value: "46%"
        }, {type: "Dew Pt:", value: "44"}, {type: "Visibility:", value: "1mi"}, {
            type: "Pressure:",
            value: "1015 mb"
        }, {type: "Precipitation", value: "55%"}], $scope.weatherweeks = [{
            icon: Skycons.PARTLY_CLOUDY_DAY,
            size: 32,
            color: "#fff",
            day: "Tue",
            temp: "34"
        }, {icon: Skycons.RAIN, size: 32, color: "#fff", day: "Wed", temp: "28"}, {
            icon: Skycons.SNOW,
            size: 32,
            color: "#fff",
            day: "Thu",
            temp: "4"
        }, {icon: Skycons.CLEAR_NIGHT, size: 32, color: "#fff", day: "Fri", temp: "40"}, {
            icon: Skycons.FOG,
            size: 28,
            color: "#fff",
            day: "Sat",
            temp: "-3"
        }, {
            icon: Skycons.SLEET,
            size: 28,
            color: "#fff",
            day: "Sun",
            temp: "18"
        }], $scope.donutdata = {
            series: [48, 17, 19, 16],
            labels: ["Chrome: 48%", "Firefox: 17%", "IE: 19%", "Other: 16%"]
        }, $scope.donutopts = {
            donut: !0,
            donutWidth: 40,
            startAngle: 320,
            total: 0,
            showLabel: !0,
            chartPadding: 25,
            labelOffset: 30,
            labelDirection: "explode"
        }, $scope.donutdraw = function (data) {
            var colors = ["#EC407A", "#7E57C2", "#A1887F", "#90A4AE"], elem = data.element._node;
            "label" == data.type && (elem.style.fill = colors[data.index]), "slice" == data.type && (elem.style.stroke = colors[data.index], elem.style["-webkit-transition"] = ".2s ease-in", elem.style.transition = ".2s ease-in", elem.addEventListener("mouseover", function () {
                elem.style["stroke-width"] = "48px"
            }), elem.addEventListener("mouseout", function () {
                elem.style["stroke-width"] = "40px"
            }))
        }, $scope.storedEmails = ["Jkae@gmail.com", "Rks@gmail.com", "dino13@yahoo.com", "streeks_sam@outlook.com", "Kangle@msn.com", "RoniScrew@gmail.com"], $scope.storedEmailsDemo = ["Rks@gmail.com", "dino13@yahoo.com"]
    }]).controller("PageProfileCtrl", ["$scope", function ($scope) {
        $scope.linedata = {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Nov", "Dec"],
            series: [{data: [50, 80, 100, 90, 120, 50, 80, 56, 135, 75, 148]}]
        }, $scope.lineopts = {axisY: {offset: 25, labelOffset: {y: 5}}, axisX: {showGrid: !1, labelOffset: {x: 10}}}
    }])
}();


!function () {
    "use strict";
    angular.module("app.directives", []).directive("toggleNavMin", ["$rootScope", function ($rs) {
        return function (scope, el) {
            var app = $("#app");
            $rs.$watch("isMobile", function () {
                $rs.isMobile && app.removeClass("nav-min")
            }), el.on("touchstart click", function (e) {
                $rs.isMobile || (app.toggleClass("nav-min"), $rs.$broadcast("nav.reset"), $rs.$broadcast("chartist.update")), e.preventDefault()
            })
        }
    }]).directive("collapseNavAccordion", [function () {
        return {
            restrict: "A", link: function (scope, el) {
                var lists = el.find("ul").parent("li"), a = lists.children("a"), listsRest = el.children("ul").children("li").not(lists), aRest = listsRest.children("a"), app = $("#app"), stopClick = 0;
                a.on("touchstart click", function (e) {
                    if (e.timeStamp - stopClick > 300) {
                        if (app.hasClass("nav-min") && window.innerWidth > 767)return;
                        var self = $(this), parent = self.parent("li");
                        a.not(self).next("ul").slideUp(), self.next("ul").slideToggle(), lists.not(parent).removeClass("open"), parent.toggleClass("open"), stopClick = e.timeStamp
                    }
                    e.preventDefault()
                }), aRest.on("touchstart click", function () {
                    var parent = aRest.parent("li");
                    lists.not(parent).removeClass("open").find("ul").slideUp()
                }), scope.$on("nav.reset", function (e) {
                    a.next("ul").removeAttr("style"), lists.removeClass("open"), e.preventDefault()
                })
            }
        }
    }]).directive("toggleOffCanvas", ["$rootScope", function () {
        return {
            restrict: "A", link: function (scope, el) {
                el.on("touchstart click", function () {
                    $("#app").toggleClass("on-canvas")
                })
            }
        }
    }]).directive("highlightActive", ["$location", function ($location) {
        return {
            restrict: "A", link: function (scope, el) {
                var links = el.find("a"), path = function () {
                    return $location.path()
                }, highlightActive = function (links, path) {
                    var path = "#" + path;
                    angular.forEach(links, function (link) {
                        var link = angular.element(link), li = link.parent("li"), href = link.attr("href");
                        li.hasClass("active") && li.removeClass("active"), 0 == path.indexOf(href) && li.addClass("active"), console.log(path, href, path.indexOf(href))
                    })
                };
                highlightActive(links, $location.path()), scope.$watch(path, function (newVal, oldVal) {
                    newVal != oldVal && highlightActive(links, $location.path())
                })
            }
        }
    }]).directive("uiCheckbox", [function () {
        return {
            restrict: "A", link: function (scope, el) {
                el.children().on("touchstart click", function (e) {
                    el.hasClass("checked") ? (el.removeClass("checked"), el.children().removeAttr("checked")) : (el.addClass("checked"), el.children().attr("checked", !0)), e.stopPropagation()
                })
            }
        }
    }]).directive("customScrollbar", ["$interval", function ($interval) {
        return {
            restrict: "A", link: function (scope, el) {
                el.perfectScrollbar({suppressScrollX: !0}), $interval(function () {
                    el[0].scrollHeight >= el[0].clientHeight && el.perfectScrollbar("update")
                }, 60)
            }
        }
    }]).directive("customPage", [function () {
        return {
            restrict: "A", controller: ["$scope", "$element", "$location", function ($scope, $element, $location) {
                var path = function () {
                    return $location.path()
                }, addBg = function (path) {
                    switch ($element.removeClass("body-full"), path) {
                        case"/404":
                        case"/pages/404":
                        case"/pages/login":
                        case"/pages/register":
                        case"/pages/forget-pass":
                        case"/pages/lock-screen":
                            $element.addClass("body-full")
                    }
                };
                addBg($location.path()), $scope.$watch(path, function (newVal, oldVal) {
                    angular.equals(newVal, oldVal) || addBg($location.path())
                })
            }]
        }
    }])
}();


!function () {
    "use strict";
    angular.module("app.services", [])
}();




//# sourceMappingURL=app.js.map
