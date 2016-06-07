<?php

namespace App\Commands\Hotel;

use App\Commands\Command;
use App\Freebooking\Repositories\Hotel\HotelExtraServicesRepository;
use App\HotelExtraServices;
use Illuminate\Contracts\Bus\SelfHandling;

class ShowHotelExtraServicesCommand extends Command implements SelfHandling
{
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Execute the command.
     *
     * @return void
     */
    public function handle( HotelExtraServicesRepository $hotelExtraServicesRepository )
    {
        if( ! is_numeric($this->id) ) {
            throw new InvalidArgumentException();
        }

        $hotelExtraServices = new HotelExtraServices();

        $data = $hotelExtraServicesRepository->getExtraServices( $hotelExtraServices, $this->id );

        return $data;
    }
}
