<?php

namespace App\Commands\Rooms;

use App\Commands\Command;
use App\Room;
use App\RoomDescription;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Freebooking\Repositories\Room\RoomRepository;
use App\Freebooking\Repositories\Hotel\HotelRepository;
use App\Freebooking\Repositories\Room\RoomDescriptionRepository;

class CreateNewHotelRoomCommand extends Command implements SelfHandling
{
    /**
     * @var array
     */
    private $roomData = array();
    /**
     * @var
     */
    private $userId;

    /**
     * @param $roomData
     * @param $userId
     */
    public function __construct($roomData, $userId)
    {
        $this->roomData = $roomData;
        $this->userId = $userId;
    }

    /**
     * @param RoomRepository $roomRepository
     * @param HotelRepository $hotelRepository
     * @param RoomDescriptionRepository $roomDescriptionRepository
     * @return Room
     */
    public function handle(RoomRepository $roomRepository, HotelRepository $hotelRepository, RoomDescriptionRepository $roomDescriptionRepository)
    {

        $hotel = $hotelRepository->getHotelByUserId($this->userId);

        $room = new Room($this->roomData[0]);
        $room->hotel_id = $hotel->id;
        $room->user_id = $this->userId;
        $roomRepository->create($room);

        //Getting the application support languages
        $langCodes = config('app.locales');

        //Insert each entry of application supported languages in rooms table.
            foreach($langCodes as $code => $langName)
            {

                $room_desc = new RoomDescription($this->roomData[0]);

                $room_desc->language = $code;
                $room_desc->user_id = $this->userId;
                $room_desc->hotel_id = $hotel->id;
                $room_desc->room_id = $room->id;
                $roomDescriptionRepository->create($room_desc);
            }

        return $room;

    }
}
