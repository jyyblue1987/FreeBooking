<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arrangement extends Model
{
    protected $table = 'arrangements';

    protected $fillable = [

        'name',
        'rooms',
        'special',
        'persons',
        'price',
        'status',
        'date_from',
        'date_to',
        'patroon',
        'standard_room',
        'price_from',
        'maximum_available',
        'on_request',
        'language',
        'more_days',
        'nights',
        'type',
        'discount_type',
        'position',
        'linked_rooms_available',
        'extra_price_with_room_price',
        'hotel_id',


    ];



    /**
     * The arrangment that is belong to hotel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */


    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }



}
