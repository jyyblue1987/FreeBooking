<?php

namespace App\Commands\Arrangement;

use App\AdministerArrangement;
use App\Commands\Command;
use App\Freebooking\Repositories\Arrangement\AdministerAvailabilityRepository;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Freebooking\Exceptions\Hotel\HotelNotFound;
use App\Freebooking\Exceptions\Hotel\HotelNotBelongToUser;
use App\Freebooking\Repositories\Hotel\HotelRepository;
use App\Freebooking\Repositories\Arrangement\HotelArrangementRepository;
use App\Freebooking\Exceptions\Arrangements\ArrangementNotFound;


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
        $this->user_id = $user_id;

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
    public function handle(HotelArrangementRepository $hotelArrangementRepository, HotelRepository $hotelRepository, AdministerAvailabilityRepository $administerAvailabilityRepository)
    {

        $hotel = $hotelRepository->getHotelByUserId($this->user_id);

        if ( ! $hotel) {
            throw new HotelNotFound();
        }

        if($hotel->id != $this->hotel_id)
        {
            throw new HotelNotBelongToUser();
        }
        $arrangement = $hotelArrangementRepository->getById($this->arrangement_id);

        if(!$arrangement)
        {
            throw new ArrangementNotFound();
        }

        $availability = new AdministerArrangement();

        $availability->arrangement_id = $this->arrangement_id;
        $availability->hotel_id = $this->hotel_id;
        $availability->date = $this->date;
        $availability->status = $this->status;
        $availability->available = $this->available;


        $administerAvailabilityRepository->create($availability);


        return $availability;
    }
}
