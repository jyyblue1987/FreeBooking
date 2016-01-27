<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomOption extends Model
{
    protected $fillable = [

        'option',
        'custom_option',
        'custom_options_title',
        'user_id',
        "hotel_id"

    ];




    public function room_option_user()
    {
        return $this->belongsTo('App\User');
    }

    public function room_option_hotel()
    {
        return $this->belongsTo('App\Hotel');
    }


    public function room_option_room()
    {
        return $this->belongsTo('App\Room');
    }
}
