<?php

namespace App\Freebooking\Transformers\Arrangements;

use App\Freebooking\Transformers\Transformer;
use App\Freebooking\Transformers\Arrangements\ArrangementDescriptionTransformer;

class ArrangementTransformer extends Transformer
{
    private $arrangementDescriptionTransformer;

    public function __construct(ArrangementDescriptionTransformer $arrangementDescriptionTransformer)
    {

        $this->arrangementDescriptionTransformer = $arrangementDescriptionTransformer;

    }
    public function transform($arrangement)
    {
        $descriptions = [];
        if($arrangement->arrangementDescription)
        {
            $descriptions = $this->arrangementDescriptionTransformer->transformCollection($arrangement->arrangementDescription);
        }

        return [
                "id"                            => $arrangement->id,
                "hotel_id"                      => $arrangement->hotel_id,
                "name"                          => $arrangement->name,
                "rooms"                         => $arrangement->rooms,
                "special"                       => $arrangement->special,
                "persons"                       => $arrangement->persons,
                "price"                         => $arrangement->price,
                "date_from"                     => $arrangement->date_from,
                "date_to"                       => $arrangement->date_to,
                "patroon"                       => $arrangement->patroon,
                "standard_room"                 => $arrangement->standard_room,
                "price_from"                    => $arrangement->price_from,
                "maximum_available"             => $arrangement->maximum_available,
                "on_request"                    => $arrangement->on_request,
                "language"                      => $arrangement->language,
                "more_days"                     => $arrangement->more_days,
                "nights"                        => $arrangement->nights,
                "type"                          => $arrangement->type,
                "discount_type"                 => $arrangement->discount_type,
                "linked_rooms_available"        => $arrangement->linked_rooms_available,
                "extra_price_with_room_price"   => $arrangement->extra_price_with_room_price,
                "descriptions"                  => $descriptions


         ];

    }
}