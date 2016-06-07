<?php

namespace App\Freebooking\Repositories\Hotel;

use App\Hotel;
use App\HotelExtraServices;
use App\Reservation;
use App\ReservationPayment;
use Illuminate\Support\Facades\DB;

class HotelExtraServicesRepository
{
    public function create(HotelExtraServices $hotelExtraServices)
    {
        return $hotelExtraServices -> save();
    }

    public function getReservation( $id )
    {
        return Reservation::where( 'id', $id )->first();
    }
    public function update( HotelExtraServices $hotelExtraServices, $id )
    {
        return $hotelExtraServices->where( 'id', $id )->update( $hotelExtraServices->getAttributes() );
    }
    public function getExtraServices(HotelExtraServices $hotelExtraServices, $id )
    {
        return $hotelExtraServices->where( 'id', $id )->first();
    }

    public function delete(HotelExtraServices $hotelExtraServices, $id )
    {
        return $hotelExtraServices->destroy($id);
    }
}
