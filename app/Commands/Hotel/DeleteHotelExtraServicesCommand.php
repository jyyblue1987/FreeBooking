<?php

namespace App\Commands\Hotel;

use App\Commands\Command;
use App\Freebooking\Repositories\Hotel\HotelExtraServicesRepository;
use App\HotelExtraServices;
use Illuminate\Contracts\Bus\SelfHandling;

class DeleteHotelExtraServicesCommand extends Command implements SelfHandling
{
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id               = $id;
    }

    /**
     * Execute the command.
     *
     * @return void
     */
    public function handle( HotelExtraServicesRepository $hotelExtraServicesRepository )
    {
        $hotelextraservices = new HotelExtraServices();

        $hotelExtraServicesRepository->delete ( $hotelextraservices, $this->id );

        return $hotelextraservices;
    }
}
