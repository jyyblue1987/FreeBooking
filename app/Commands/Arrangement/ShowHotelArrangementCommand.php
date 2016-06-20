<?php

namespace App\Commands\Arrangement;

use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Freebooking\Repositories\Hotel\HotelRepository;
use App\Freebooking\Repositories\Arrangement\HotelArrangementRepository;
use App\Freebooking\Repositories\Arrangement\HotelArrangementDescriptionRepository;
use App\Freebooking\Exceptions\Hotel\HotelNotFound;
use App\Freebooking\Exceptions\Hotel\HotelNotBelongToUser;
use App\Freebooking\Exceptions\Arrangements\ArrangementNotFound;
use App\Arrangement;
use App\ArrangementDescription;
use Illuminate\Foundation\Application;

/**
 * Class ShowHotelArrangementCommand
 * @package App\Commands\Arrangement
 */
class ShowHotelArrangementCommand extends Command implements SelfHandling
{

    /**
     * @var
     */
    private $user_id;

    /**
     * @var
     */
    private $hotel_id;

    /**
     * @var
     */
    private $arrangement_id;

	/**
	 * ShowHotelArrangementCommand constructor.
	 * @param $user_id
	 * @param $hotel_id
	 * @param $arrangement_id
	 */

    public function __construct( $user_id, $hotel_id, $arrangement_id )
    {
        $this->user_id = $user_id;

        $this->hotel_id = $hotel_id;

        $this->arrangement_id = $arrangement_id;
    }

    /**
     * @param HotelRepository $hotelRepository
     * @param HotelArrangementRepository $hotelArrangementRepository
     * @return mixed
     * @throws ArrangementNotFound
     * @throws HotelNotBelongToUser
     * @throws HotelNotFound
     */

    public function handle(HotelRepository $hotelRepository, HotelArrangementRepository $hotelArrangementRepository)
    {
        $hotel = $hotelRepository->getById($this->hotel_id);

        if ( ! $hotel) {
            throw new HotelNotFound();
        }

        if($hotel->id != $this->hotel_id)
        {
            throw new HotelNotBelongToUser();
        }

        $arrangement = $hotelArrangementRepository->getByArragementIdAndHotelId($this->arrangement_id, $this->hotel_id);

        if( ! $arrangement )
        {
            throw new ArrangementNotFound();
        }
        /*//dd($this->arrangement_id);
        $arrangement = new Arrangement();

        $data = (object)$arrangement->find($this->arrangement_id)->toArray();
        //dd((object)$data);
        $data->arrangementDescription = '';*/

        return $arrangement;
    }
}
