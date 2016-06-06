<?php

namespace App\Commands\Reservation;

use App\Commands\Command;
use App\Freebooking\Repositories\Reservation\ReservationRepository;
use App\Reservation;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Illuminate\Contracts\Bus\SelfHandling;

class ShowReservationCommand extends Command implements SelfHandling
{
    /**
     * @var
     */
    private $id;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Execute the command.
     *
     * @return void
     */
    public function handle(ReservationRepository $reservationRepository)
    {
        if( ! is_numeric($this->id) ) {
            throw new InvalidArgumentException();
        }

        $reservation = new Reservation();

        $data = $reservationRepository->getReservation( $reservation, $this->id );

        return $data;
    }
}
