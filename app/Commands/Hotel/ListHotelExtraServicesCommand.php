<?php

namespace App\Commands\Hotel;

use App\Commands\Command;
use App\Freebooking\Repositories\Hotel\HotelExtraServicesRepository;
use App\HotelExtraServices;
use Illuminate\Contracts\Bus\SelfHandling;

class ListHotelExtraServicesCommand extends Command implements SelfHandling
{
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the command.
     *
     * @return void
     */
    public function handle( HotelExtraServicesRepository $hotelExtraServicesRepository )
    {
        $reservation = new HotelExtraServices();

        return $reservation->all()->toArray();
    }
}
