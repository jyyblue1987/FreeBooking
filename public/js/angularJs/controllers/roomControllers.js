/*** Room Controllers
------------------------------------------------ ****/

/*** Rooms Controller ***/
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
            function errorCallback(response) {}
        );
    }
}]);

/*** Rooms Edit Controller ***/
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



    $scope.loadRoomOptions = function() {

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
                console.log('error message');
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
        return false;
    }


}]);




arrangements.controller('arrangementsController',["$scope", function($scope){

    $scope.loadArrangements = "Arrangements";

}]);

