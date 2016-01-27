<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [

        'name',
        'number',
        'number_persons',
        "price",
        "status",
        "special_room",
        "special_text",
        "single_use",
        "single_use_discount",
        "ex_breakfast",
        "ex_breakfast_discount",
        "user_id",
        "hotel_id",

    ];


    public static function locatedAt($id){


        return static::where(compact('id'))->first();
    }


    public function room_descriptions(RoomDescription $data)
    {


        return $this->room_description()->save($data);
    }


    public function addRoom_options(RoomOption $data)
    {


        return $this->room_options()->save($data);
    }


    public function addRoom_priceInfo(RoomPriceInfo $data)
    {


        return $this->room_priceInfo()->save($data);
    }


    public function addRoom_photo(RoomPhoto $data)
    {


        return $this->room_photos()->save($data);
    }



    public function room_user()
    {
        return $this->belongsTo('App\User');
    }

    public function room_hotel()
    {
        return $this->belongsTo('App\Hotel');
    }



    public function room_options()
    {
        return $this->hasOne('App\RoomOption');
    }


    public function room_description()
    {
        return $this->hasMany('App\RoomDescription');
    }


    public function room_priceInfo()
    {
        return $this->hasMany('App\RoomPriceInfo');
    }


    public function room_photos()
    {
        return $this->hasMany('App\RoomPhoto');
    }
}
