<?php

namespace App\Freebooking\Repositories\Reservation;

use App\Hotel;
use App\Reservation;
use Illuminate\Support\Facades\DB;

class ReservationRepository
{

    public function getAll( Reservation $reservation )
    {
        $data = $reservation->all()->toArray();

        return $data;
    }

    public function create( Reservation $reservation )
    {
        return $reservation->save();
    }

    public function update( Reservation $reservation, $id )
    {
        return $reservation->where( 'id', $id )->update( $reservation->getAttributes() );
    }

    public function delete( Reservation $reservation, $id )
    {
        $data = $reservation->destroy($id);

        return $data;
    }

    public function getReservation( Reservation $reservation, $id )
    {
        return $reservation->where( 'id', $id )->first();
    }
}
