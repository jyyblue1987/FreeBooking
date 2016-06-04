<?php

namespace App\Commands\Reservation;

use App\Commands\Command;
use App\Freebooking\Repositories\Reservation\GuestsRepository;
use App\Guests;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Illuminate\Contracts\Bus\SelfHandling;

class DestroyGuestCommand extends Command implements SelfHandling
{
    /**
     * @var
     */
    protected $id;

    /**
     * Create a new command instance.
     *
     * @param $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Execute the command.
     *
     * @param GuestsRepository $guestsRepository
     * @return int
     * @throws InvalidArgumentException
     */
    public function handle(GuestsRepository $guestsRepository)
    {
        if( ! is_numeric($this->id) ) {
            throw new InvalidArgumentException();
        }

        $guest = new Guests();

        $data = $guestsRepository->deleteGuest( $guest, $this->id );

        return $data;
    }
}
