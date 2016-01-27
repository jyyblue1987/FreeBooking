<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomPriceInfo extends Model
{
    protected  $table = "room_price_info";
    protected  $guarded = [];



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
