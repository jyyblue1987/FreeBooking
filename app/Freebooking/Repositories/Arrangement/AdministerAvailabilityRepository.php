<?php

namespace App\Freebooking\Repositories\Arrangement;

use App\AdministerArrangement;
use App\Arrangement;

class AdministerAvailabilityRepository
{

    public function create(AdministerArrangement $availability)
    {
        return $availability->save();
    }

    public function update( AdministerArrangement $availability, $id )
    {
        return $availability->where('id', $id)->update($availability->getAttributes());
    }

    public function getByArragementIdAndHotelId($arragementId, $hotelId)
    {

        return AdministerArrangement::whereId($arragementId)->whereHotelId($hotelId)->first();

    }

    public function getHotelByUserID($user_id, $hotelId)
    {

        return Arrangement::whereId($user_id)->whereHotelId($hotelId)->first();

    }

    public function getAvailability($id)
    {
        return AdministerArrangement::where('id', $id)->first();
    }

}
