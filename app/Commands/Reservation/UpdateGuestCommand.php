<?php

namespace App\Commands\Reservation;

use App\Commands\Command;
use App\Freebooking\Exceptions\Hotel\HotelNotBelongToUser;
use App\Freebooking\Repositories\Reservation\GuestsRepository;
use App\Guests;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Foundation\Application;

class UpdateGuestCommand extends Command implements SelfHandling
{

    /**
     * @var
     */
    private $id;

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
     * Get all the values in constructor and attach to relevant property so we can access them in handler.
     *
     * @param $id
     * @param $hotel_id
     * @param $gender
     * @param $name
     * @param $address
     * @param $state
     * @param $city
     * @param $zip
     * @param $country
     * @param $phone
     * @param $fax
     * @param $email
     * @param $language
     *
     * @return void returns nothing
     */

    public function __construct( $id, $hotel_id, $gender, $name, $address, $state, $city, $zip, $country, $phone, $fax, $email, $language )
    {

        $this->id           = $id;

        $this->hotel_id     = $hotel_id;

        $this->gender       = $gender;

        $this->name         = $name;

        $this->address      = $address;

        $this->state        = $state;

        $this->city         = $city;

        $this->zip          = $zip;

        $this->country      = $country;

        $this->phone        = $phone;

        $this->fax          = $fax;

        $this->email        = $email;

        $this->language     = $language;

    }


    /**
     * Execute the command.
     *
     * @param Application $app
     * @param GuestsRepository $guestsrepository
     * @throws HotelNotBelongToUser
     *
     * @return  array   returns an array of updated data.
     */
    public function handle(Application $app, GuestsRepository $guestsrepository )
    {
        
        $hotel = $guestsrepository->getHotel( $this->hotel_id );

        //Check whether the provided hotel id is valid otherwise throw error
        if($hotel->id != $this->hotel_id)
        {
            throw new HotelNotBelongToUser();
        }

        /**
         * Model call and attach the data with model to be updated.
         */
        $guest = new Guests();

        $guest->id          = $this->id;
        $guest->hotel_id    = $this->hotel_id;
        $guest->name        = $this->name;
        $guest->gender      = $this->gender;
        $guest->address     = $this->address;
        $guest->state       = $this->state;
        $guest->city        = $this->city;
        $guest->zip         = $this->zip;
        $guest->country     = $this->country;
        $guest->phone       = $this->phone;
        $guest->fax         = $this->fax;
        $guest->email       = $this->email;
        $guest->language    = $this->language;


        $guestsrepository->update($guest);


        return $guest;
    }
}
