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
