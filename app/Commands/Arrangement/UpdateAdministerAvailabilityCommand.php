<?php

namespace App\Commands\Arrangement;

use App\Availability;
use App\Commands\Command;
use App\Freebooking\Exceptions\DatabaseException;
use App\Freebooking\Repositories\Arrangement\AdministerAvailabilityRepository;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Freebooking\Repositories\Hotel\HotelRepository;
use App\Freebooking\Exceptions\Hotel\HotelNotFound;
use App\Freebooking\Exceptions\Hotel\HotelNotBelongToUser;


class UpdateAdministerAvailabilityCommand extends Command implements SelfHandling
{
    /**
     * @var
     */
    private $id;

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
    public function __construct( $id, $user_id, $arrangement_id, $hotel_id, $date, $status, $available )
    {
        $this->id = $id;

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
    public function handle(AdministerAvailabilityRepository $administerAvailabilityRepository)
    {
        $hotel = $administerAvailabilityRepository->getHotelByUserId($this->user_id, $this->hotel_id);
        if ( ! $hotel) {
            throw new HotelNotFound();
        }

        if($hotel->id != $this->hotel_id)
        {
            throw new HotelNotBelongToUser();
        }

        $check = $administerAvailabilityRepository->getAvailability($this->id);

        if( ! $check ) throw new DatabaseException( 'Invalid availability ID passed' );

        $availability = new Availability();

        $availability->id = $this->id;
        $availability->arrangement_id = $this->arrangement_id;
        $availability->hotel_id = $this->hotel_id;
        $availability->date = $this->date;
        $availability->status = $this->status;
        $availability->available = $this->available;

        $administerAvailabilityRepository->update($availability, $this->id);


        return $availability;
    }
}
