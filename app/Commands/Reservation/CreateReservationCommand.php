<?php

namespace App\Commands\Reservation;

use App\Commands\Command;
use App\Freebooking\Repositories\Reservation\ReservationRepository;
use App\Reservation;
use Illuminate\Contracts\Bus\SelfHandling;

class CreateReservationCommand extends Command implements SelfHandling
{
    /**
     * @var
     */
    protected $guest_id;

    /**
     * @var
     */
    protected $hotel_id;

    /**
     * @var
     */
    protected $room_id;

    /**
     * @var
     */
    protected $checkin;

    /**
     * @var
     */
    protected $checkout;

    /**
     * @var
     */
    protected $arrangement_id;

    /**
     * @var
     */
    protected $num_of_rooms;

    /**
     * @var
     */
    protected $num_of_persons;

    /**
     * @var
     */
    protected $arrival_time;


    /**
     * CreateReservationCommand constructor.
     * @param $guest_id
     * @param $hotel_id
     * @param $room_id
     * @param $checkin
     * @param $checkout
     * @param $arrangement_id
     * @param $num_of_rooms
     * @param $num_of_persons
     * @param $arrival_time
     */
    public function __construct( $guest_id, $hotel_id, $room_id, $checkin, $checkout, $arrangement_id, $num_of_rooms, $num_of_persons, $arrival_time
)
    {
        $this->guest_id         = $guest_id;
        $this->hotel_id         = $hotel_id;
        $this->room_id          = $room_id;
        $this->checkin          = $checkin;
        $this->checkout         = $checkout;
        $this->arrangement_id   = $arrangement_id;
        $this->num_of_rooms     = $num_of_rooms;
        $this->num_of_persons   = $num_of_persons;
        $this->arrival_time     = $arrival_time;

    }

    /**
     * @param ReservationRepository $reservationRepository
     * @return Reservation
     */
    public function handle( ReservationRepository $reservationRepository )
    {
        // @todo check whether guest is already reserved with this hotel

        $fields = ['guest_id', 'hotel_id', 'room_id', 'checkin', 'checkout', 'arrangement_id', 'num_of_rooms', 'num_of_persons', 'arrival_time' ];

        $reservation = new Reservation();

        foreach ($fields as $field )
        {
            $reservation->$field = $this->$field;
        }

        $reservationRepository->create($reservation);

        return $reservation;
    }
}
