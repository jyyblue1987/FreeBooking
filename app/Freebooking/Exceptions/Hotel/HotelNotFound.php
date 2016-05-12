<?php

namespace App\Freebooking\Exceptions\Hotel;

use App\Freebooking\Exceptions\NotFoundException;

class HotelNotFound extends NotFoundException {
    protected $message = 'There is no hotel exits with this user';
}