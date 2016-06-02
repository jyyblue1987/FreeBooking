<?php

namespace App\Freebooking\Repositories\Reservation;

use App\Guests;
use App\Hotel;
use Illuminate\Support\Facades\DB;

class GuestsRepository
{

    public function create( Guests $guests )
    {
        return $guests->save();
    }

    public function update( Guests $guests )
    {
        $id = $guests->getAttribute('id');
        
        return $guests->where('id', $id)->update($guests->getAttributes());
    }

    public function getAll()
    {
        $results = Guests::all()->toArray();
        return $results;
    }


    public function getHotel( $id )
    {
        $hotel = Hotel::where('id', $id)->first();

        return $hotel;
    }
}
