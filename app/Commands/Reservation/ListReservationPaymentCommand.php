<?php

namespace App\Commands\Reservation;

use App\Commands\Command;
use App\Freebooking\Repositories\Reservation\ReservationPaymentRepository;
use App\ReservationPayment;
use Illuminate\Contracts\Bus\SelfHandling;

class ListReservationPaymentCommand extends Command implements SelfHandling
{
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the command.
     *
     * @return void
     */
    public function handle(ReservationPaymentRepository $reservationPaymentRepository )
    {
        $reservation = new ReservationPayment();

        return $reservation->all()->toArray();
    }
}
