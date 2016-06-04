<?php

namespace App\Http\Controllers\API\Reservation;

use App\Commands\Reservation\CreateReservationCommand;
use App\Commands\Reservation\ListReservationCommand;
use App\Freebooking\Exceptions\DatabaseException;
use App\Freebooking\Exceptions\Reservation\GuestNotFound;
use App\Freebooking\Exceptions\Reservation\ReservationNotFound;
use App\Freebooking\Transformers\Reservation\ReservationTransformer;
use App\Http\Controllers\API\ApiController;
use Illuminate\Http\Request;

use App\Http\Requests;

class ReservationController extends ApiController
{
    /**
     * @var
     */
    private $reservationTransformer;

    /**
     * ReservationController constructor.
     * @param ReservationTransformer $reservationTransformer
     */
    public function __construct(ReservationTransformer $reservationTransformer)
    {
        $this->reservationTransformer = $reservationTransformer;
    }

    /**
     * @param Requests\Reservation\ListReservationRequest $request
     * @return mixed
     */
    public function index( Requests\Reservation\ListReservationRequest $request )
    {
        try
        {
            $reservations = $this->dispatchFrom(ListReservationCommand::class, $request);

            return $this->respond([
                'Guest' => $reservations,
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
    public function store( Requests\Reservation\CreateReservationRequest $request )
    {
        try
        {

            $reservation = $this->dispatchFrom(CreateReservationCommand::class, $request, ['user_id' => 2]);

            return $this->respond([
                'Guest' => $this->reservationTransformer->transform($reservation),
                'flash' => flash("Guest","New reservation created successfully for the guest", "success")
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
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
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
}
