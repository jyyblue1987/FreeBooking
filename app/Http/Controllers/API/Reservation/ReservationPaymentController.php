<?php

namespace App\Http\Controllers\API\Reservation;

use App\Commands\Reservation\CreateReservationPaymentCommand;
use App\Commands\Reservation\DeleteReservationPaymentCommand;
use App\Commands\Reservation\ListReservationPaymentCommand;
use App\Commands\Reservation\ShowReservationPaymentCommand;
use App\Commands\Reservation\UpdateReservationCommand;
use App\Commands\Reservation\UpdateReservationPaymentCommand;
use App\Freebooking\Transformers\Reservation\ReservationPaymentTransformer;
use App\Http\Controllers\API\ApiController;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ReservationPaymentController extends ApiController
{

    /**
     * ReservationController constructor.
     * @param ReservationTransformer $reservationTransformer
     */
    public function __construct(ReservationPaymentTransformer $reservationTransformer)
    {
        $this->reservationTransformer = $reservationTransformer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Requests\Reservation\ListReservationPaymentRequest $request )
    {
        try
        {
            $reservations_payment = $this->dispatchFrom(ListReservationPaymentCommand::class, $request);

            return $this->respond([
                'ReservationPayment' => $reservations_payment,
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
    public function store( Requests\Reservation\CreateReservationPaymentRequest $request )
    {
        try
        {

            $reservation = $this->dispatchFrom(CreateReservationPaymentCommand::class, $request, ['user_id' => 2]);


            return $this->respond([
                'Guest' => $this->reservationTransformer->transform($reservation),
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
    public function show( Requests\Reservation\ShowReservationPaymentRequest $request, $locale, $id )
    {
        try
        {
            $reservation = $this->dispatchFrom(ShowReservationPaymentCommand::class, $request, ['id' => $id ]);

            return $this->respond([
                'Reservation' => $this->reservationTransformer->transform($reservation),
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
    public function update( Requests\Reservation\UpdateReservationPaymentRequest $request, $id )
    {
        try
        {

            $reservation_payment = $this->dispatchFrom(UpdateReservationPaymentCommand::class, $request, ['user_id' => 2]);

            return $this->respond([
                'Reservation' => $this->reservationTransformer->transform($reservation_payment),
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
    public function destroy( Requests\Reservation\DeleteReservationPaymentRequest $request, $locale, $id )
    {
        try
        {
            $reservation_payment = $this->dispatchFrom(DeleteReservationPaymentCommand::class, $request, ['id' => $id ]);

            return $this->respond([
                'Reservation' => $reservation_payment,
                'flash' => flash("Reservation","Specified Reservation Payment successfully deleted", "success")
            ]);


        } catch (GuestNotFound $e) {
            return $this->respondNotFound($e->getMessage());
        }catch (DatabaseException $e) {
            return $this->respondNotFound($e->getMessage());
        }
    }
}
