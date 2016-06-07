<?php

namespace App\Commands\Hotel;

use App\Commands\Command;
use App\Freebooking\Repositories\Hotel\HotelExtraServicesRepository;
use App\HotelExtraServices;
use Illuminate\Contracts\Bus\SelfHandling;

class CreateHotelExtraServicesCommand extends Command implements SelfHandling
{
    /**
     * @var
     */
    private $name;

    /**
     * @var
     */
    private $description;

    /**
     * @var
     */
    private $price;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct( $name, $description, $price )
    {
        $this->name = $name;

        $this->description = $description;

        $this->price = $price;

    }

    /**
     * @param HotelExtraServicesRepository $hotelExtraServicesRepository
     * @return HotelExtraServices
     * @throws HotelNotBelongToUser
     */
    public function handle( HotelExtraServicesRepository $hotelExtraServicesRepository )
    {
        
        $reservation = new HotelExtraServices();

        $fields = ['name', 'description', 'price' ];

        foreach ($fields as $field )
        {
            $reservation->$field = $this->$field;
        }


        $hotelExtraServicesRepository->create($reservation);


        return $reservation;
    }
}
