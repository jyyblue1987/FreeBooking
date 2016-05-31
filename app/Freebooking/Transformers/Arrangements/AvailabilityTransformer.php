<?php

namespace App\Freebooking\Transformers\Arrangements;

use App\Freebooking\Transformers\Transformer;


class AvailabilityTransformer extends Transformer
{


    public function __construct()
    {
    }

    public function transform($availability)
    {

        return [
            'id'    => $availability->id,
            'hotel_id' => $availability->hotel_id,
            'date' => $availability->date,
            'arrangement_id' => $availability->arrangement_id,
            'available' => $availability->available,
            'price' => $availability->price,
            'status' => $availability->status,
        ];

    }
}