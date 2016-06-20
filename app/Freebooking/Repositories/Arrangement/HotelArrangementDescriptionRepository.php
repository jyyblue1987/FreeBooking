<?php

namespace App\Freebooking\Repositories\Arrangement;

use Illuminate\Support\Facades\DB;
use App\ArrangementDescription;

/**
 * Class HotelArrangementDescriptionRepository
 * @package App\Freebooking\Repositories\Arrangement
 */

class HotelArrangementDescriptionRepository
{

	/**
	 * @param ArrangementDescription $arrangementDescription
	 * @return bool
	 */
    public function create(ArrangementDescription $arrangementDescription)
    {
        return $arrangementDescription->save();
    }

	/**
	 * @param $arragementId
	 * @param $hotelId
	 * @param $language
	 * @return mixed
	 */
    public function getByArrangementIdAndHotelIdAndLanguage($arragementId, $hotelId, $language)
    {

        return ArrangementDescription::whereArrangementId($arragementId)
                                        ->whereHotelId($hotelId)
                                        ->whereLanguage($language)->first();

    }

}
