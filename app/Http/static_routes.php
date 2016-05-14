<?php
/**
 * Created by PhpStorm.
 * User: Shams Hashmi
 * Date: 12-05-2016
 * Time: 2:26 PM
 */

Route::get('arrangement', function()
{
    return View::make('admin.partials.arrangements.arrangement');
});