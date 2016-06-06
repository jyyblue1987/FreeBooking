<?php

namespace App\Commands\Reservation;

use App\Commands\Command;
use App\Freebooking\Repositories\Reservation\ReservationPaymentRepository;
use App\ReservationPayment;
use Illuminate\Contracts\Bus\SelfHandling;

class CreateReservationPaymentCommand extends Command implements SelfHandling
{

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
    public function __construct( $reservation_id, $option, $cc_name, $cc_num, $cc_type, $cvv )
    {
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
    public function handle(ReservationPaymentRepository $reservationPaymentRepository)
    {
        $reservation_id = $reservationPaymentRepository->getReservation( $this->reservation_id );
        //dd($reservation_id);
        if($reservation_id->id != $this->reservation_id)
        {
            throw new HotelNotBelongToUser();
        }

        $reservation = new ReservationPayment();

        $fields = ['reservation_id', 'option', 'cc_name', 'cc_num', 'cc_type', 'cvv' ];

        foreach ($fields as $field )
        {
            $reservation->$field = $this->$field;
        }


        $reservationPaymentRepository->create($reservation);


        return $reservation;
    }
}
