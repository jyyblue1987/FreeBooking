<?php

namespace App\Commands\Reservation;

use App\Commands\Command;
use App\Freebooking\Repositories\Reservation\ReservationPaymentRepository;
use App\ReservationPayment;
use Illuminate\Contracts\Bus\SelfHandling;

class UpdateReservationPaymentCommand extends Command implements SelfHandling
{
    /**
     * @var
     */
    private $id;

    /**
     * @var
     */
    private $reservation_id;

    /**
     * @var
     */
    private $option;

    /**
     * @var
     */
    private $cc_name;

    /**
     * @var
     */
    private $cc_num;

    /**
     * @var
     */
    private $cc_type;

    /**
     * @var
     */
    private $cvv;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct( $id, $reservation_id, $option, $cc_name, $cc_num, $cc_type, $cvv )
    {
        $this->id = $id;

        $this->reservation_id = $reservation_id;

        $this->option = $option;

        $this->cc_name = $cc_name;

        $this->cc_num = $cc_num;

        $this->cc_type = $cc_type;

        $this->cvv = $cvv;
    }

    /**
     * Execute the command.
     *
     * @return void
     */
    public function handle( ReservationPaymentRepository $reservationPaymentRepository )
    {
        $fields = ['id', 'reservation_id', 'option', 'cc_name', 'cc_num', 'cc_type', 'cvv' ];

        $reservation = new ReservationPayment();

        foreach ($fields as $field )
        {
            $reservation->$field = $this->$field;
        }

        $reservationPaymentRepository->update( $reservation, $this->id );

        return $reservation;
    }
}
