<?php

namespace App\Commands\Arrangement;

use App\Arrangement;
use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;

class ListHotelArrangementCommand extends Command implements SelfHandling
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
    public function handle()
    {
        $arrangements = new Arrangement();
        return $arrangements->all()->toArray();
    }
}
