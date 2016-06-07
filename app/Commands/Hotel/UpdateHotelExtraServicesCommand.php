<?php

namespace App\Commands\Hotel;

use App\Commands\Command;
use App\Freebooking\Repositories\Hotel\HotelExtraServicesRepository;
use App\HotelExtraServices;
use Illuminate\Contracts\Bus\SelfHandling;

class UpdateHotelExtraServicesCommand extends Command implements SelfHandling
{

    /**
     * @var
     */
    private $id;

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
    public function __construct( $id, $name, $description, $price )
    {
        $this->id = $id;

        $this->name = $name;

        $this->description = $description;

        $this->price = $price;
    }

    /**
     * Execute the command.
     *
     * @return void
     */
    public function handle( HotelExtraServicesRepository $hotelExtraServicesRepository )
    {
        $fields = ['id', 'name', 'description', 'price' ];

        $reservation = new HotelExtraServices();

        foreach ($fields as $field )
        {
            $reservation->$field = $this->$field;
        }

        $hotelExtraServicesRepository->update( $reservation, $this->id );

        return $reservation;
    }
}
