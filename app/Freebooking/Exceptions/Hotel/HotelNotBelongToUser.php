<?php

namespace App\Freebooking\Exceptions\Hotel;

use App\Freebooking\Exceptions\NotFoundException;

class HotelNotBelongToUser extends NotFoundException {
    protected $message = 'Hotel does not belongs to the user';
}