<?php

namespace App\Freebooking\Repositories\Room;

use Illuminate\Support\Facades\DB;
use App\Room;

class RoomRepository
{

    public function create(Room $room)
    {
        return $room->save();
    }

}
