<?php

namespace App\Http\Controllers\API\Hotel;

use App\Commands\Arrangement\UpdateHotelArrangementCommand;
use App\Commands\Hotel\CreateHotelExtraServicesCommand;
use App\Commands\Hotel\DeleteHotelExtraServicesCommand;
use App\Commands\Hotel\ListHotelExtraServicesCommand;
use App\Commands\Hotel\ShowHotelExtraServicesCommand;
use App\Commands\Hotel\UpdateHotelExtraServicesCommand;
use App\Freebooking\Transformers\Hotel\HotelExtraServicesTransformer;
use App\Http\Controllers\API\ApiController;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HotelExtraServicesController extends ApiController
{
    private $hotelExtraServices;

    /**
     * ReservationController constructor.
     * @param ReservationTransformer $reservationTransformer
     */
    public function __construct( HotelExtraServicesTransformer $hotelExtraServicesTransformer)
    {
        $this->hotelExtraServices = $hotelExtraServicesTransformer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Requests\Hotel\ListHotelExtraServicesRequest $request )
    {
        try
        {
            $hotel_extra_services = $this->dispatchFrom(ListHotelExtraServicesCommand::class, $request);

            return $this->respond([
                'HotelExtraServices' => $hotel_extra_services,
                //'flash' => flash("Guest","New guest created successfully for the hotel", "success")
            ]);


        } catch (ReservationNotFound $e) {
            return $this->respondNotFound($e->getMessage());
        }catch (DatabaseException $e) {
            return $this->respondNotFound($e->getMessage());
        }
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
    public function store( Requests\Hotel\CreateHotelExtraServicesRequest $request )
    {
        try
        {

            $reservation = $this->dispatchFrom(CreateHotelExtraServicesCommand::class, $request, ['user_id' => 2]);


            return $this->respond([
                'Guest' => $reservation,//$this->reservationTransformer->transform($reservation),
                'flash' => flash("Guest","New Payment created successfully for the guest", "success")
            ]);

        } catch (ReservationNotFound $e) {
            return $this->respondNotFound($e->getMessage());
        } catch (GuestNotFound $e) {
            return $this->respondNotFound($e->getMessage());
        } catch (DatabaseException $e) {
            return $this->respondNotFound($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( Requests\Hotel\ShowHotelExtraServicesRequest $request, $locale, $id )
    {
        try
        {
            $hotelextraservices = $this->dispatchFrom(ShowHotelExtraServicesCommand::class, $request, ['id' => $id ]);

            return $this->respond([
                'Reservation' => $this->hotelExtraServices->transform($hotelextraservices),
                'flash' => flash("Reservation","Reservation successfully received", "success")
            ]);


        } catch (GuestNotFound $e) {
            return $this->respondNotFound($e->getMessage());
        }catch (DatabaseException $e) {
            return $this->respondNotFound($e->getMessage());
        }
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
    public function update( Requests\Hotel\UpdateHotelExtraServicesRequest $request, $id )
    {
        try
        {

            $reservation_payment = $this->dispatchFrom(UpdateHotelExtraServicesCommand::class, $request, ['user_id' => 2]);

            return $this->respond([
                'Reservation' => $this->hotelExtraServices->transform($reservation_payment),
                'flash' => flash("Guest","New Payment created successfully for the guest", "success")
            ]);

        } catch (ReservationNotFound $e) {
            return $this->respondNotFound($e->getMessage());
        } catch (GuestNotFound $e) {
            return $this->respondNotFound($e->getMessage());
        } catch (DatabaseException $e) {
            return $this->respondNotFound($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Requests\Hotel\DeleteHotelExtraServicesRequest $request, $locale, $id )
    {
        try
        {
            $hotelextraservices = $this->dispatchFrom(DeleteHotelExtraServicesCommand::class, $request, ['id' => $id ]);

            return $this->respond([
                'Reservation' => $hotelextraservices,
                'flash' => flash("Reservation","Specified Reservation Payment successfully deleted", "success")
            ]);


        } catch (GuestNotFound $e) {
            return $this->respondNotFound($e->getMessage());
        }catch (DatabaseException $e) {
            return $this->respondNotFound($e->getMessage());
        }
    }
}
