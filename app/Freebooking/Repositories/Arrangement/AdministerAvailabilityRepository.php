<?php

namespace App\Freebooking\Repositories\Arrangement;

use App\Availability;
use Illuminate\Support\Facades\DB;
use App\Arrangement;

class AdministerAvailabilityRepository
{

    public function create(Availability $availability)
    {
        return $availability->save();
    }

    public function update( Availability $availability, $id )
    {
        return $availability->where('id', $id)->update($availability->getAttributes());
    }

    public function getByArragementIdAndHotelId($arragementId, $hotelId)
    {

        return Availability::whereId($arragementId)->whereHotelId($hotelId)->first();

    }

    public function getHotelByUserID($user_id, $hotelId)
    {

        return Arrangement::whereId($user_id)->whereHotelId($hotelId)->first();

    }

    public function getAvailability($id)
    {
        return Availability::where('id', $id)->first();
    }

}
