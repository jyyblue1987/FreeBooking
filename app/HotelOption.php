<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelOption extends Model
{
    protected $fillable = [

        'option',
        'custom_option',
        'custom_options_title',
        'user_id',

    ];




    public function option_user()
    {
        return $this->belongsTo('App\User');
    }
}
