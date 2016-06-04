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
}
