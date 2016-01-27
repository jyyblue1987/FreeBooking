/**
 * Created by Awais Muhammad on 16-11-2015.
 */


var Server = angular.module('app.ServerRequest',[]);

Server.factory('Request',function($http){
    return{
        post:function(type, url, data){

            return $http({
                        method  : type,
                        url     : url,
                        data    : data, //forms user object
                        headers : {'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')}
                    });

        }

    }

});


Server.factory('regRooms', function(){
    return [];
});


Server.factory('Data', function(){
    return {};
});



Server.factory('hotelRoomPhotos', function(){
    return [];
});