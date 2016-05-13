<?php

namespace App\Freebooking\Exceptions\Arragements;

use App\Freebooking\Exceptions\NotFoundException;

class ArrangementNotFound extends NotFoundException {
    protected $message = 'Arrangement does not exists!';
}