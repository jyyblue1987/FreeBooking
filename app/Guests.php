<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guests extends Model
{
    protected $table = 'guests';

    /**
     * @var
     */
    private $id;

    /**
     * @var
     */
    private $hotel_id;

    /**
     * @var
     */
    private $gender;

    /**
     * @var
     */
    private $name;

    /**
     * @var
     */
    private $address;

    /**
     * @var
     */
    private $state;

    /**
     * @var
     */
    private $city;

    /**
     * @var
     */
    private $zip;

    /**
     * @var
     */
    private $country;

    /**
     * @var
     */
    private $phone;

    /**
     * @var
     */
    private $fax;

    /**
     * @var
     */
    private $email;

    /**
     * @var
     */
    private $language;
}
