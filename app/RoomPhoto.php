<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomPhoto extends Model
{
    protected  $table = "room_photos";
    protected  $guarded = [];



    public function room_option_room()
    {
        return $this->belongsTo('App\Room');
    }
}
