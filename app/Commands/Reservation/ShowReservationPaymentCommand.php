<?php

namespace App\Commands\Reservation;

use App\Commands\Command;
use App\Freebooking\Repositories\Reservation\ReservationPaymentRepository;
use App\ReservationPayment;
use Illuminate\Contracts\Bus\SelfHandling;

class ShowReservationPaymentCommand extends Command implements SelfHandling
{
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct( $id )
    {
        $this->id = $id;
    }

    /**
     * Execute the command.
     *
     * @return void
     */
    public function handle( ReservationPaymentRepository $reservationPaymentRepository )
    {
        if( ! is_numeric($this->id) ) {
            throw new InvalidArgumentException();
        }

        $reservation = new ReservationPayment();

        $data = $reservationPaymentRepository->getReservationPayment( $reservation, $this->id );

        return $data;
    }
}
