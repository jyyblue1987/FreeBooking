<?php

namespace App\Commands\Reservation;

use App\Commands\Command;
use App\Freebooking\Repositories\Reservation\ReservationRepository;
use App\Reservation;
use Illuminate\Contracts\Bus\SelfHandling;

class DeleteReservationCommand extends Command implements SelfHandling
{
    /**
     * @var
     */
    protected $id;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct( $id )
    {
        $this->id               = $id;
    }

    /**
     * Execute the command.
     *
     * @return void
     */
    public function handle( ReservationRepository $reservationRepository )
    {

        $reservation = new Reservation();

        $reservationRepository->delete ( $reservation, $this->id );

        return $reservation;
    }
}
