<?php

namespace App\Freebooking\Repositories\Arrangement;

use Illuminate\Support\Facades\DB;
use App\ArrangementDescription;

class HotelArrangementDescriptionRepository
{

    public function create(ArrangementDescription $arrangementDescription)
    {
        return $arrangementDescription->save();
    }

    public function getByArrangementIdAndHotelIdAndLanguage($arragementId, $hotelId, $language)
    {

        return ArrangementDescription::whereArrangementId($arragementId)
                                        ->whereHotelId($hotelId)
                                        ->whereLanguage($language)->first();

    }

}
