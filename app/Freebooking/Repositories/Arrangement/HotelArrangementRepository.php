<?php

namespace App\Freebooking\Repositories\Arrangement;

use Illuminate\Support\Facades\DB;
use App\Arrangement;

/**
 * Class HotelArrangementRepository
 * @package App\Freebooking\Repositories\Arrangement
 */
class HotelArrangementRepository
{

	/**
	 * @param Arrangement $arrangement
	 * @return bool
	 */
	public function create(Arrangement $arrangement)
    {
        return $arrangement->save();
    }

	/**
	 * @param $arragementId
	 * @param $hotelId
	 * @return mixed
	 */
    public function getByArragementIdAndHotelId($arragementId, $hotelId)
    {

        return Arrangement::whereId($arragementId)->whereHotelId($hotelId)->first();

    }

}
