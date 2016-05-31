<?php

namespace App\Commands\Arrangement;

use App\Availability;
use App\Commands\Command;
use App\Freebooking\Repositories\Arrangement\AdministerAvailabilityRepository;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Freebooking\Repositories\Hotel\HotelRepository;
use App\Freebooking\Repositories\Arrangement\HotelArrangementRepository;
use App\Freebooking\Repositories\Arrangement\HotelArrangementDescriptionRepository;
use App\Freebooking\Exceptions\Hotel\HotelNotFound;
use App\Freebooking\Exceptions\Hotel\HotelNotBelongToUser;
use App\Arrangement;
use App\ArrangementDescription;
use Illuminate\Foundation\Application;

class CreateAdministerAvailabilityCommand extends Command implements SelfHandling
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
    private $date;
    /**
     * @var array
     */
    private $status;

    /**
     * @var
     */
    private $available;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct( $user_id, $arrangement_id, $hotel_id, $date, $status, $available )
    {
        $this->user_id = 2;

        $this->arrangement_id = $arrangement_id;

        $this->hotel_id = $hotel_id;

        $this->date = $date;

        $this->status = $status;

        $this->available = $available;
    }

    /**
     * Execute the command.
     *
     * @return void
     */
    public function handle(Application $app, HotelRepository $hotelRepository, AdministerAvailabilityRepository $administerAvailabilityRepository)
    {
        $hotel = $administerAvailabilityRepository->getHotelByUserId($this->user_id, $this->hotel_id);
        if ( ! $hotel) {
            throw new HotelNotFound();
        }

        if($hotel->id != $this->hotel_id)
        {
            throw new HotelNotBelongToUser();
        }

        $availability = new Availability();

        $availability->arrangement_id = $this->arrangement_id;
        $availability->hotel_id = $this->hotel_id;
        $availability->date = $this->date;
        $availability->status = $this->status;
        $availability->available = $this->available;


        $administerAvailabilityRepository->create($availability);


        return $availability;
    }
}
