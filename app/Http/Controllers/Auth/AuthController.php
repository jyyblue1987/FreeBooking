<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Auth;

use App\Room;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    protected $loginPath = 'en/auth/login';

    protected $redirectPath = 'en/administrator';
    protected $redirectAfterLogout = 'en/administrator';

    public function __construct()
    {
        //$this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {



        return Validator::make($data, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }
    /*public function getLogout()
    {
        Auth::logout();
        return redirect()->back();
    }*/



    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {


        return User::create([

            'gender' => $data['gender'],
            'initials' => $data['initials'],
            'birth_date' => $data['birth_date'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'hotel_name' => $data['hotel_name'],
            'email' => $data['email'],
            'website_url' => $data['website_url'],
            'password' => bcrypt($data['password']),
            'hotel_type' => $data['hotel_type'],
            'address' => $data['address'],
            'postcode' => $data['postcode'],
            'city' => $data['city'],
            'state' => $data['state'],
            'country' => $data['country'],
            'phone' => $data['phone'],
            'fax' => $data['fax'],

        ]);

    }


    protected function loadHotelData(Request $request)
    {
        $request->session()->forget('user');

        //$request->session()->push("hotel", Auth::User()->all());

        //dd($request->session()->get("hotel.hotel_name"));

        $hotelRooms = Room::where("user_id", Auth::User()->id)->get();

        foreach($hotelRooms as $room => $data){
            $request->session()->push("user.rooms", $data);
        }

    return;
    }
}
