<?php

namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Freebooking\Traits\ApiDocErrorBlocs;
use App\Freebooking\Traits\Responder;


abstract class ApiController extends Controller
{

    const DEFAULT_ORDER_BY = 'id';
    const DEFAULT_ORDER_DIRECTION = 'DESC';
    const DEFAULT_OFFSET = 0;
    const DEFAULT_LIMIT = 15;


    use Responder, ApiDocErrorBlocs;
}
