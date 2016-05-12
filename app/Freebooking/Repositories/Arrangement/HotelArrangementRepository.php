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

}
