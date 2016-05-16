<?php

include 'api_routes.php';
include 'static_routes.php';
/**
 * @Author: Shams Hashmi
 * 1- Keep only routes that must be need to load application in this file
 * 2- Keep all database interaction routes that load data in api_routes.php file
 * 3- Keep all static page routes in static_route.php file
 */

//@todo: @aliShams will organize the routes by following shams techniques for routing


// Authentication Routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration Routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


/**
 * Two roles defined for routing
 * 1- Auth (General for all registered users)
 * 2- Role (Specific for system administrator)
 */

/*Route::get('login', 'AuthController@loginView');*/

/*Route::get('/', function() {

    return view('auth.login');

});*/
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
