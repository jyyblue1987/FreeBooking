<?php
/**
 * Created by PhpStorm.
 * User: Shams Hashmi
 * Date: 12-05-2016
 * Time: 2:26 PM
 */

Route::get('arrangements', function()
{
    return View::make('admin.partials.arrangements.arrangements');
});

Route::get('blacklist', function()
{
    return View::make('admin.partials.bilk.bilk');
});
Route::get('addblacklist', function()
{
    return View::make('admin.partials.bilk.addbilk');
});

//----------------------------------------------------------------------

Route::get('hotels', 'UsersController@index')->middleware(['auth', 'role']);

Route::get('hotelData',  function () {

    return view('admin.partials.hotelData');

})->middleware(['auth']);

//----------------------------------------------------------------------

Route::get('newhotel',  function () {

    return view('admin.partials.newHotel');

})->middleware(['auth', 'role']);

//----------------------------------------------------------------------

Route::get('addnewroom',  function () {

    return view('admin.partials.newRoom');

})->middleware(['auth']);