<?php

namespace App\Freebooking\Repositories\Hotel;

use Illuminate\Support\Facades\DB;
use App\Hotel;

class HotelRepository
{

    public function getById($id)
    {
        return Hotel::whereId($id)->first();
    }
        public function getHotelByUserId($id)
        {
            return Hotel::whereUserId($id)->first();
        }
}
