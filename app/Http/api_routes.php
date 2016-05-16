<?php
/**
 * Created by PhpStorm.
 * User: Shams Hashmi
 * Date: 12-05-2016
 * Time: 2:26 PM
 */

Route::group(['prefix' => 'api',  'namespace' => 'API'], function(){

    Route::group(['namespace' => 'Arrangements'], function() {
       // Route::get('arrangements/test-route', 'HotelArrangmentsController@index');
        Route::resource('{locale}/arrangements/{hotelId}/hotel-arrangement', 'HotelArrangmentsController');

    });

});