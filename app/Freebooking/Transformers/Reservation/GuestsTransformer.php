<?php

namespace App\Freebooking\Transformers\Reservation;

use App\Freebooking\Transformers\Transformer;


class GuestsTransformer extends Transformer
{

    public function __construct()
    {

    }

    public function transform($guest)
    {

        return [
            'id'                         => $guest->id,
            'hotel_id'                   => $guest->hotel_id,
            'gender'                     => $guest->gender,
            'name'                       => $guest->name,
            'address'                    => $guest->address,
            'state'                      => $guest->state,
            'city'                       => $guest->city,
            'zip'                        => $guest->zip,
            'country'                    => $guest->country,
            'phone'                      => $guest->phone,
            'fax'                        => $guest->fax,
            'email'                      => $guest->email,
            'language'                   => $guest->language,
            
        ];

    }
}