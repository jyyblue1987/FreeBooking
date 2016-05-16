<?php

namespace App\Commands\Arrangement;

use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Foundation\Application;
use App\Freebooking\Repositories\Hotel\HotelRepository;
use App\Freebooking\Repositories\Arrangement\HotelArrangementRepository;
use App\Freebooking\Repositories\Arrangement\HotelArrangementDescriptionRepository;
use App\Freebooking\Exceptions\Hotel\HotelNotFound;
use App\Freebooking\Exceptions\Hotel\HotelNotBelongToUser;
use App\Freebooking\Exceptions\Arrangements\ArrangementNotFound;
use App\Arrangement;

class UpdateHotelArrangementCommand extends Command implements SelfHandling
{
    /**
     * @var
     */
    private $user_id;
    /**
     * @var
     */
    private $arrangement_id;
    /**
     * @var
     */
    private $hotel_id;
    /**
     * @var
     */
    private $name;
    /**
     * @var array
     */
    private $rooms = array();
    /**
     * @var
     */
    private $description;
    /**
     * @var
     */
    private $special;
    /**
     * @var
     */
    private $persons;
    /**
     * @var
     */
    private $price = array();
    /**
     * @var not Required in post params
     */
    private $status;
    /**
     * @var
     */
    private $date_from;
    /**
     * @var
     */
    private $date_to;
    /**
     * @var array
     */
    private $patroon = array();
    /**
     * @var
     */
    private $standard_room;
    /**
     * @var
     */
    private $price_from;
    /**
     * @var
     */
    private $maximum_available;
    /**
     * @var
     */
    private $on_request;
    /**
     * @var array
     */
    private $language = array();
    /**
     * @var
     */
    private $more_days;
    /**
     * @var
     */
    private $nights;
    /**
     * @var
     */
    private $type;
    /**
     * @var
     */
    private $discount_type;
    /**
     * @var Not Needed
     */
    private $position;
    /**
     * @var
     */
    private $linked_rooms_available;
    /**
     * @var
     */
    private $extra_price_with_room_price;


    /**
     * @param $hotel_id
     * @param $name
     * @param $rooms
     * @param $special
     * @param string $persons
     * @param string $price
     * @param $date_from
     * @param $date_to
     * @param $patroon
     * @param string $standard_room
     * @param string $price_from
     * @param string $maximum_available
     * @param $on_request
     * @param $language
     * @param string $more_days
     * @param string $nights
     * @param $type
     * @param $discount_type
     * @param $linked_rooms_available
     * @param string $extra_price_with_room_price
     */
    public function __construct($user_id, $arrangement_id, $hotel_id, $name, $rooms, $description, $special, $persons = '',
                                $price = '', $date_from, $date_to, $patroon,
                                $standard_room = '', $price_from = '', $maximum_available = '',
                                $on_request, $language, $more_days = '', $nights = '', $type, $discount_type,
                                $linked_rooms_available, $extra_price_with_room_price = '' )
    {

        $this->user_id = $user_id;
        $this->arrangement_id = $arrangement_id;
        $this->hotel_id = $hotel_id;
        $this->name = $name;
        $this->rooms = $rooms;
        $this->description = $description;
        $this->special = $special;
        $this->persons = $persons;
        $this->price = $price;
        $this->date_from = $date_from;
        $this->date_to = $date_to;
        $this->patroon = $patroon;
        $this->standard_room = $standard_room;
        $this->price_from = $price_from;
        $this->maximum_available = $maximum_available;
        $this->on_request = $on_request;
        $this->language = $language;
        $this->more_days = $more_days;
        $this->nights = $nights;
        $this->type = $type;
        $this->discount_type = $discount_type;
        $this->linked_rooms_available = $linked_rooms_available;
        $this->extra_price_with_room_price = $extra_price_with_room_price;
    }

    /**
     * @param HotelRepository $hotelRepository
     * @param HotelArrangementRepository $hotelArrangementRepository
     * @return Arrangement
     * @throws HotelNotBelongToUser
     * @throws HotelNotFound
     */
    public function handle(Application $app, HotelRepository $hotelRepository, HotelArrangementRepository $hotelArrangementRepository, HotelArrangementDescriptionRepository $hotelArrangementDescriptionRepository)
    {


        $hotel = $hotelRepository->getHotelByUserId($this->user_id);
        if ( ! $hotel) {
            throw new HotelNotFound();
        }

        if($hotel->id != $this->hotel_id)
        {
            throw new HotelNotBelongToUser();
        }

        $arrangement = $hotelArrangementRepository->getByArragementIdAndHotelId($this->arrangement_id, $this->hotel_id);


        if(!$arrangement)
        {
            throw new ArrangementNotFound();
        }




        $arrangement->hotel_id = $this->hotel_id;
        $arrangement->name = $this->name;
        $arrangement->rooms = implode("|",$this->rooms);
        $arrangement->special = $this->special;
        $arrangement->persons = $this->persons;
        $arrangement->price = implode("|",$this->price);
        $arrangement->date_from = $this->date_from;
        $arrangement->date_to = $this->date_to;
        $arrangement->patroon = implode("-",$this->patroon);
        $arrangement->standard_room = $this->standard_room;
        $arrangement->price_from = $this->price_from;
        $arrangement->maximum_available = $this->maximum_available;
        $arrangement->on_request = $this->on_request;
        $arrangement->language = implode(",",$this->language);
        $arrangement->more_days = $this->more_days;
        $arrangement->nights = $this->nights;
        $arrangement->type = implode(",",$this->type);
        $arrangement->discount_type = $this->discount_type;
        $arrangement->linked_rooms_available = $this->linked_rooms_available;
        $arrangement->extra_price_with_room_price = $this->extra_price_with_room_price;

        $arrDescription = $hotelArrangementDescriptionRepository->getByArrangementIdAndHotelIdAndLanguage($this->arrangement_id, $this->hotel_id, $app->getLocale());

        $arrDescription->description = $this->description;
        $hotelArrangementDescriptionRepository->create($arrDescription);


        $hotelArrangementRepository->create($arrangement);


        return $arrangement;

    }
}
