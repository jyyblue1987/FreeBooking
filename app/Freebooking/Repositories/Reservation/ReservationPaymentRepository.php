<?php

namespace App\Freebooking\Repositories\Reservation;

use App\Hotel;
use App\Reservation;
use App\ReservationPayment;
use Illuminate\Support\Facades\DB;

class ReservationPaymentRepository
{
    public function create(ReservationPayment $reservationPayment)
    {
        return $reservationPayment -> save();
    }

    public function getReservation( $id )
    {
        return Reservation::where( 'id', $id )->first();
    }
    public function update( ReservationPayment $reservation, $id )
    {
        return $reservation->where( 'id', $id )->update( $reservation->getAttributes() );
    }
    public function getReservationPayment(ReservationPayment $reservation, $id )
    {
        return $reservation->where( 'id', $id )->first();
    }

    public function delete(ReservationPayment $reservation, $id )
    {
        return $reservation->destroy($id);
    }
}
