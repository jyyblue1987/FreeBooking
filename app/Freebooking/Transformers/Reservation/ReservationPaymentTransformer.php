<?php

namespace App\Freebooking\Transformers\Reservation;

use App\Freebooking\Transformers\Transformer;


class ReservationTransformer extends Transformer
{
    /**
     * ReservationTransformer constructor.
     */
    public function __construct()
    {

    }

    /**
     * @param $reservation
     * @return array
     */
    public function transform($reservation)
    {

        return [
            'guest_id'          => $reservation->guest_id,
            'hotel_id'          => $reservation->hotel_id,
            'room_id'           => $reservation->room_id,
            'checkin'           => $reservation->checkin,
            'checkout'          => $reservation->checkout,
            'arrangement_id'    => $reservation->arrangement_id,
            'num_of_rooms'      => $reservation->num_of_rooms,
            'num_of_persons'    => $reservation->num_of_persons,
            'arrival_time'      => $reservation->arrival_time,

        ];

    }
}