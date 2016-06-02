<?php

namespace App\Commands\Reservation;

use App\Commands\Command;
use App\Freebooking\Repositories\Reservation\GuestsRepository;
use App\Guests;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Foundation\Application;

class CreateGuestCommand extends Command implements SelfHandling
{

    /**
     * @var
     */
    private $hotel_id;

    /**
     * @var
     */
    private $gender;

    /**
     * @var
     */
    private $name;

    /**
     * @var
     */
    private $address;

    /**
     * @var
     */
    private $state;

    /**
     * @var
     */
    private $city;

    /**
     * @var
     */
    private $zip;

    /**
     * @var
     */
    private $country;

    /**
     * @var
     */
    private $phone;

    /**
     * @var
     */
    private $fax;

    /**
     * @var
     */
    private $email;

    /**
     * @var
     */
    private $language;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct($hotel_id, $gender, $name, $address, $state, $city, $zip, $country, $phone, $fax, $email, $language )
    {

        $this->hotel_id = $hotel_id;

        $this->gender = $gender;

        $this->name = $name;

        $this->address = $address;

        $this->state = $state;

        $this->city = $city;

        $this->zip = $zip;

        $this->country = $country;

        $this->phone = $phone;

        $this->fax = $fax;

        $this->email = $email;

        $this->language = $language;
        
    }

    /**
     * Execute the command.
     *
     * @return void
     */
    
    public function handle(Application $app, GuestsRepository $guestsrepository)
    {

        $hotel = $guestsrepository->getHotel( $this->hotel_id );

        if($hotel->id != $this->hotel_id)
        {
            throw new HotelNotBelongToUser();
        }

        $guest = new Guests();

        $guest->hotel_id = $this->hotel_id;
        $guest->name = $this->name;
        $guest->gender = $this->gender;
        $guest->address = $this->address;
        $guest->state = $this->state;
        $guest->city = $this->city;
        $guest->zip = $this->zip;
        $guest->country = $this->country;
        $guest->phone = $this->phone;
        $guest->fax = $this->fax;
        $guest->email = $this->email;
        $guest->language = $this->language;


        $guestsrepository->create($guest);


        return $guest;

    }
}
