<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelText extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'short_description',
        'long_description',
        'hotel_locations',
        'custom_title_1',
        "custom_description_1",
        "custom_title_2",
        'custom_description_2',
        'event',
        'event_description',
        'language',
        'user_id',
        'hotel_id',
    ];




    public function text_user()
    {
        return $this->belongsTo('App\User');
    }



}
