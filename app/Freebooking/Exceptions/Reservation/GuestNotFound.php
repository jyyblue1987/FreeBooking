<?php

namespace App\Freebooking\Exceptions\Reservation;

use App\Freebooking\Exceptions\NotFoundException;

class GuestNotFound extends NotFoundException {
    protected $message = 'There is no Guest exits for the given request';
}