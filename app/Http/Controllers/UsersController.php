<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Auth;
use CountryState;
use App\Hotel;
use App\User;
use App\HotelText;
use App\HotelSettings;
use App\HotelOption;



class UsersController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



        return view('admin.partials.allhotels');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }



    public function hotelList()
    {

             return User::get();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateHotelData(Request $request, $id)
    {


        $hotel = new Hotel($request->all());
        $validator = $hotel->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }



        $model = $hotel->where('user_id', '=', $id)->first();


        if(!$model){

            User::locatedAt($id)->addHotel($hotel);

        }else{


            $model->fill($request->all())->save();
        }


        return flash("Hotel","Hotel data updated!", "success");

    }


    public function updateHotelText(Application $app, Request $request, $id)
    {

        $matchThese = ['user_id' => $id, 'language' => $app->config->get('app.locale')];

        $hotel_text = new HotelText($request->all());

        $model = $hotel_text->where($matchThese)->first();


        if(!$model){

            User::locatedAt($id)->addHotel_texts($hotel_text);

        }else {

            $model->fill($request->all())->save();


        }
        return flash("Hotel","Hotel text updated!", "success");


    }



    public function updateHotelSettings(Request $request, $id)
    {
       // json_decode($request);


        $hotel_settings = new HotelSettings($request->all());

        //dd($hotel_settings->toArray());


        $model = $hotel_settings->where('user_id', '=', $id)->first();


        if(!$model){

            User::locatedAt($id)->addHotel_settings($hotel_settings);

        }else{

           $model->fill($request->all())->save();
        }


        return flash("Hotel","Hotel settings updated!", "success");



    }


    public function updateHotelOptions(Request $request, $id)
    {
        // json_decode($request);


        $hotel_options = new HotelOption($request->all());

        //dd($hotel_settings->toArray());


        $model = $hotel_options->where('user_id', '=', $id)->first();


        if(!$model){

            User::locatedAt($id)->addHotel_options($hotel_options);

        }else{

            $model->fill($request->all())->save();
        }


        return flash("Hotel","Hotel options updated!", "success");



    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }





    public function getHotelData(){

        $states=[];
        $exists=true;

        $countries = CountryState::getCountries();
        $hotel = Hotel::where('user_id', '=', Auth::User()->id)->first();



        if($hotel){

            $states = CountryState::getStates($hotel->country);

        }else{
            $hotel = [];
            $exists = false;
        }





        return compact('countries','hotel', 'states', 'exists');


    }

    public function getHotelText(Application $app){

        $exists = false;
        $matchThese = ['user_id' => Auth::User()->id, 'language' => $app->config->get('app.locale')];


        $hotel_text = HotelText::where($matchThese)->first();

        if($hotel_text)
        {
            $exists = true;
        }
        //return response()->json(['name' =>'shams']);
       return compact('hotel_text', 'exists');


    }


    public function getHotelSettings()
    {
        $exists = false;
        $matchThese = ['user_id' => Auth::User()->id];


        $hotel_settings = HotelSettings::where($matchThese)->first();


        if($hotel_settings)
        {

            $exists = true;
        }

        return compact('hotel_settings', 'exists');
    }

    public function getHotelOptions()
    {
        $exists = false;
        $matchThese = ['user_id' => Auth::User()->id];


        $options= HotelOption::where($matchThese)->first();


        if($options)
        {

            $exists = true;
        }

        return compact('options', 'exists');
    }



    public function hotelData(){



        $countries = CountryState::getCountries();

        $hotel = Hotel::where('user_id', '=', Auth::User()->id)->first();



        return view('admin.partials.hotelData', compact('countries', 'hotel'));

    }



}
