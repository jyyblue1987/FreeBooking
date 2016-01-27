<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomDescription extends Model
{

    protected $fillable = [

        'description',
        'language',

        "room_id",
        "user_id",
        "hotel_id",

    ];



    public function room()
    {
        return $this->belongsTo('App\Room');
    }
}
