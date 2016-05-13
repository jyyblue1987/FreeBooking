<?php

namespace App\Freebooking\Repositories\Arrangement;

use Illuminate\Support\Facades\DB;
use App\Arrangement;

class HotelArrangementRepository
{

    public function create(Arrangement $arrangement)
    {
        return $arrangement->save();
    }

    public function getByArragementIdAndHotelId($arragementId, $hotelId)
    {

        return Arrangement::whereId($arragementId)->whereHotelId($hotelId)->first();

    }

}
