<?php

namespace App\Freebooking\Transformers\Reservation;

use App\Freebooking\Transformers\Transformer;


class ReservationPaymentTransformer extends Transformer
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
            'id'                      => $reservation->id,
            'reservation_id'          => $reservation->reservation_id,
            'option'                  => $reservation->option,
            'cc_name'                 => $reservation->cc_name,
            'cc_num'                  => $reservation->cc_num,
            'cc_type'                 => $reservation->cc_type,
            'cvv'                     => $reservation->cvv

        ];

    }
}