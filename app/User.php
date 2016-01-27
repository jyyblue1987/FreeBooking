<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;


class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'initials',
        'first_name',
        'last_name',
        'hotel_name',
        "hotel_type",
        "website_url",
        'address',
        'postcode',
        'city',
        'state',
        'country',
        'phone',
        'fax',
        'password',
        'email',
        'status',
        'type',
        'birth_date',
        'gender',
        'language',
        'profile_picture'

    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];





    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {



        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'website_url' => 'required|url|max:255',
        ]);
    }



    public static function locatedAt($id){


        return static::where(compact('id'))->first();
    }



    public function addHotel(Hotel $data)
    {


        return $this->hotels()->save($data);

    }



    public function addHotel_texts(HotelText $data)
    {


        return $this->hotel_texts()->save($data);
    }


    public function addHotel_settings(HotelSettings $data)
    {

        return $this->hotel_settings()->save($data);
    }


    public function addHotel_options(HotelOption $data)
    {


        return $this->hotel_options()->save($data);
    }









    public function hotels()
    {
        return $this->hasOne('App\Hotel');
    }





    public function hotel_texts()
    {
        return $this->hasMany('App\HotelText');
    }




    public function hotel_settings()
    {
        return $this->hasMany('App\HotelSettings');
    }





    public function hotel_options()
    {
        return $this->hasOne('App\HotelOption');
    }





    public function hotel_rooms()
    {
        return $this->hasMany('App\Hotel');
    }









}
