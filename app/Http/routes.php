<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Dirty routing

die("here it is");

// Authentication Routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration Routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


/**
 * Two roles defined for ruting
 * 1- Auth (General for all registered users)
 * 2- Role (Specific for system administrator)
 */

/*Route::get('login', 'AuthController@loginView');*/


Route::group(array('prefix' => 'administrator', "middleware" => "auth"), function()
{

     Route::get('/', function()
    {
        return View::make('admin.dashboard');
    });



    Route::get('header', function () {
    return view('admin.common.header');
    });

    Route::get('navigation', function () {
        return view('admin.common.navigation');
    });


});




    Route::get('home', function () {

        return view('admin.pages.home');

    });



Route::get('hotels', 'UsersController@index')->middleware(['auth', 'role']);

//Route::get('hotelData', 'UsersController@hotelData')->middleware(['auth']);





/** Routes for hotels for hotel owners */
Route::post('addHotel/{id}', 'UsersController@updateHotelData')->middleware(['auth']);


Route::post('addHotelText/{id}', 'UsersController@updateHotelText')->middleware(['auth']);
Route::post('addHotelSettings/{id}', 'UsersController@updateHotelSettings')->middleware(['auth']);

Route::post('addHotelOption/{id}', 'UsersController@updateHotelOptions')->middleware(['auth']);

Route::get('hotelData',  function () {

    return view('admin.partials.hotelData');

})->middleware(['auth']);


Route::get('getHotelData', 'UsersController@getHotelData')->middleware(['auth']);



Route::get('getHotelText', 'UsersController@getHotelText')->middleware(['auth']);
Route::get('getHotelSettings', 'UsersController@getHotelSettings')->middleware(['auth']);
Route::get('getHotelOptions', 'UsersController@getHotelOptions')->middleware(['auth']);



        Route::get('newhotel',  function () {

            return view('admin.partials.newHotel');

        })->middleware(['auth', 'role']);





Route::get('listallhotels', 'UsersController@hotelList')->middleware(['auth', 'role']);



/****Hotel owner routs ended here**/




// Route for getting states for the selected country
Route::get('getStates/{country}', 'CountriesController@getStates')->middleware(['auth']);



/*** Routes for hotel owner rooms**/


Route::get('loadRooms', 'RoomsController@getRooms')->middleware(['auth']);

Route::get('getRoom/{name}/{id}', 'RoomsController@show')->middleware(['auth']);

Route::get('getRoomData/{id}', 'RoomsController@getRoomData')->middleware(['auth']);
Route::get('getRoomOptions/{id}', 'RoomsController@getRoomOptions')->middleware(['auth']);
Route::get('getRoomPhotos/{id}', 'RoomsController@getRoomPhotos')->middleware(['auth']);

Route::get('deleteRoomPhoto/{id}', 'RoomsController@deleteRoomPhoto')->middleware(['auth']);

Route::get('addnewroom',  function () {

    return view('admin.partials.newRoom');

})->middleware(['auth']);


Route::post('addRoom/{id}', 'RoomsController@store')->middleware(['auth']);


Route::post('addRoomOptions/{id}/{roomId}', 'RoomsController@updateRoomOptions')->middleware(['auth']);

Route::post('setRoomPrice/{id}/{room_id}', 'RoomsController@setRoomPrice')->middleware(['auth']);
Route::post('setlmPrice/{id}/{room_id}', 'RoomsController@setlmPrice')->middleware(['auth']);
Route::get('getLstMinutePrice/{id}/{room_id}', 'RoomsController@getLstMinutePrice')->middleware(['auth']);

Route::post('roomPhotos', 'RoomsController@roomPhotosPost')->middleware(['auth']);

Route::post('updateRoomData/{id}', 'RoomsController@updateRoomData')->middleware(['auth']);
Route::post('setMinStay/{room_id}', 'RoomsController@setMinStay')->middleware(['auth']);
Route::get('getMinimumStay/{id}/{room_id}', 'RoomsController@getMinimumStay')->middleware(['auth']);
Route::post('getRoomNormalPrice/{room_id}', 'RoomsController@getRoomNormalPrice')->middleware(['auth']);
Route::post('setDiscountDatesPrice/{room_id}', 'RoomsController@setDiscountDatesPrice')->middleware(['auth']);
Route::get('getDiscountDates/{id}/{room_id}', 'RoomsController@getDiscountDates')->middleware(['auth']);

Route::post('setexBreakFast/{room_id}', 'RoomsController@setexBreakFast')->middleware(['auth']);
Route::get('getexBreakFast/{id}/{room_id}', 'RoomsController@getexBreakFast')->middleware(['auth']);


Route::post('setSingleUse/{room_id}', 'RoomsController@setSingleUse')->middleware(['auth']);
Route::get('getSingleUse/{id}/{room_id}', 'RoomsController@getSingleUse')->middleware(['auth']);

Route::post('setNonRefundable/{room_id}', 'RoomsController@setNonRefundable')->middleware(['auth']);
Route::get('getNonRefundable/{id}/{room_id}', 'RoomsController@getNonRefundable')->middleware(['auth']);


/** Hotel owner rooms routing data ended here */



Route::post('userData/{id}', 'UsersController@updateUserData')->middleware(['auth']);

