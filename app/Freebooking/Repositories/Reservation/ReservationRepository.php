<?php

namespace App\Freebooking\Repositories\Reservation;

use App\Hotel;
use App\Reservation;
use Illuminate\Support\Facades\DB;


/**
 * Class ReservationRepository
 * @package App\Freebooking\Repositories\Reservation
 */
class ReservationRepository
{

	/**
	 * @param Reservation $reservation
	 * @return array
	 */
    public function getAll( Reservation $reservation )
    {
        $data = $reservation->all()->toArray();

        return $data;
    }

	/**
	 * @param Reservation $reservation
	 * @return bool
	 */
    public function create( Reservation $reservation )
    {
        return $reservation->save();
    }

	/**
	 * @param Reservation $reservation
	 * @param $id
	 * @return mixed
	 */
    public function update( Reservation $reservation, $id )
    {
        return $reservation->where( 'id', $id )->update( $reservation->getAttributes() );
    }

	/**
	 * @param Reservation $reservation
	 * @param $id
	 * @return int
	 */
    public function delete( Reservation $reservation, $id )
    {
        $data = $reservation->destroy($id);

        return $data;
    }

    /**
     * @param Reservation $reservation
     * @param $id
     * @return mixed
     */
    public function getReservation( Reservation $reservation, $id )
    {
        return $reservation->where( 'id', $id )->first();
    }
}
