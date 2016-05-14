<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Hotel extends Model
{
    protected $table = 'hotels';


    protected $fillable = [


        'address',
        'postcode',
        'country',
        'state',
        'city',
        'phone',
        'fax',
        'user_id',
        'check_in',
        'check_out',
        'overStar',
        'account_number',
        'giro_account_number',
        'iban_number',
        'swift_ibc',
        'swift_ibc_number',
        'ihk_number',
        'tax_number'


    ];





    public function validator(array $data)
    {


       return Validator::make($data, [

            'address' => 'required|max:255',
           'postcode' => 'required|max:10',
           'city' => 'required|max:100',
           'country' => 'required|max:40',
           'phone' => 'required|max:40',
           'check_in' => 'required|max:40',
           'check_out' => 'required|max:40',
           'overStar' => 'required|max:10',
]);
    }


    public static function locatedAt($id){


        return static::where(compact('id'))->first();
    }

    public function hotel()
    {
        return $this->belongsTo('App\User');
    }


    public function hotel_rooms()
    {
        return $this->hasMany('App\Room');
    }

    public function arrangement()
    {
        return $this->hasMany(Arrangement::class);
    }




}
