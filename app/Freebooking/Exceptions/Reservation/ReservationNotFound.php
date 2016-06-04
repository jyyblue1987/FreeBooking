<?php

namespace App\Freebooking\Exceptions\Reservation;

use App\Freebooking\Exceptions\NotFoundException;

class ReservationNotFound extends NotFoundException {
    protected $message = 'There is no Reservation exits for the given request';
}