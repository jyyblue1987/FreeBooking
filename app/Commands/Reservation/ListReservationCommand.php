<?php

namespace App\Commands\Reservation;

use App\Commands\Command;
use App\Freebooking\Repositories\Reservation\ReservationRepository;
use App\Reservation;
use Illuminate\Contracts\Bus\SelfHandling;

class ListReservationCommand extends Command implements SelfHandling
{
    /**
     * ListReservationCommand constructor.
     */
    public function __construct()
    {
        //
    }

    /**
     * @param ReservationRepository $reservationRepository
     * @return array
     */
    public function handle( ReservationRepository $reservationRepository )
    {
        $model = new Reservation();

        $reservations = $reservationRepository->getAll( $model );

        return $reservations;
    }
}
