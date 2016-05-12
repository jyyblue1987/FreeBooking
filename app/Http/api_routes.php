<?php
/**
 * Created by PhpStorm.
 * User: Shams Hashmi
 * Date: 12-05-2016
 * Time: 2:26 PM
 */

Route::group(['prefix' => 'api',  'namespace' => 'API'], function(){

    Route::group(['namespace' => 'Arrangement'], function() {

        Route::resource('arrangements/{hotelId}/hotel-arrangement', 'HotelArrangmentsController@index');
    });

});