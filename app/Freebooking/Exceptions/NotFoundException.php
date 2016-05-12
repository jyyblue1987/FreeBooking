<?php

namespace App\Freebooking\Exceptions;

use Exception;
use App\Freebooking\Contracts\HTTPStatusCode;

class NotFoundException extends Exception
{
    protected $message = 'Not Found';

    protected $code = HTTPStatusCode::NOT_FOUND;
}