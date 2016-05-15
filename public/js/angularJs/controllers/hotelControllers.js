/*** Hotel Controllers
------------------------------------------------ ****/

/*** Hotel Controller ***/
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

/*** All Hotels ***/
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

/*** Add Hotel Controller ***/
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



