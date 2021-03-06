<?php

namespace App\Freebooking\Exceptions;

use Exception;

class DatabaseException extends Exception
{
    protected $message = 'There was an error with the database';

    protected $code = 400;
}