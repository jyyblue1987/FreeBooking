<?php

namespace App\Freebooking\Transformers\Room;

use App\Freebooking\Transformers\Transformer;

class RoomTransformer extends Transformer
{
    public function transform($room)
    {


        return [
            'id' => $room->id,
            'name' => $room->name,
            'price' => $room->price,
            'number' => $room->number,
            'number_persons' => $room->number_persons

        ];

    }
}