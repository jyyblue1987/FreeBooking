<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArrangementPriceManagement extends Model
{
    protected $table = 'arrangement_price_management';

    protected $fillable = [

        'date',
        'price',
        'maximum_available',
        'status',
         'arrangement_id',
        'hotel_id',
    ];

    /**
     * The arrangment description that is belong to arrangement
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */


    public function arrangement()
    {
        return $this->belongsTo(Arrangement::class);
    }

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
