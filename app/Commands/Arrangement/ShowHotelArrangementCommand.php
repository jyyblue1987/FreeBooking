<?php

namespace App\Commands\Arrangement;

use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Freebooking\Repositories\Hotel\HotelRepository;
use App\Freebooking\Repositories\Arrangement\HotelArrangementRepository;
use App\Freebooking\Repositories\Arrangement\HotelArrangementDescriptionRepository;
use App\Freebooking\Exceptions\Hotel\HotelNotFound;
use App\Freebooking\Exceptions\Hotel\HotelNotBelongToUser;
use App\Arrangement;
use App\ArrangementDescription;
use Illuminate\Foundation\Application;

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
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct( $user_id, $hotel_id, $arrangement_id )
    {
        $this->user_id = $user_id;

        $this->hotel_id = $hotel_id;

        $this->arrangement_id = $arrangement_id;
    }

    /**
     * Execute the command.
     *
     * @return void
     */
    public function handle(HotelRepository $hotelRepository, HotelArrangementRepository $hotelArrangementRepository)
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

        /*//dd($this->arrangement_id);
        $arrangement = new Arrangement();

        $data = (object)$arrangement->find($this->arrangement_id)->toArray();
        //dd((object)$data);
        $data->arrangementDescription = '';*/

        return $arrangement;
    }
}
