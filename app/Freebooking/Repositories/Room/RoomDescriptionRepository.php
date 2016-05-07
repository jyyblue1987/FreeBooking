<?php

namespace App\Freebooking\Repositories\Room;

use Illuminate\Support\Facades\DB;
use App\RoomDescription;

class RoomDescriptionRepository
{

    public function create(RoomDescription $roomDescription)
    {
        return $roomDescription->save();
    }

}
