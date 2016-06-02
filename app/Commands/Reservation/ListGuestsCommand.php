<?php

namespace App\Commands\Reservation;

use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Freebooking\Repositories\Reservation\GuestsRepository;
use App\Guests;
use Illuminate\Foundation\Application;

class ListGuestsCommand extends Command implements SelfHandling
{
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the command.
     *
     * @return void
     */
    public function handle(Application $app, GuestsRepository $guestsrepository)
    {
        
        $guests_res = $guestsrepository->getAll();


        return $guests_res;
    }
}
