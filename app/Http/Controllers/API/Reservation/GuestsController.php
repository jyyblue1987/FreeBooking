<?php

namespace App\Http\Controllers\API\Reservation;

use App\Commands\Reservation\CreateGuestCommand;
use App\Commands\Reservation\UpdateGuestCommand;
use App\Freebooking\Exceptions\Hotel\HotelNotFound;
use App\Freebooking\Exceptions\Reservation\GuestNotFound;
use App\Freebooking\Transformers\Reservation\GuestsTransformer;
use App\Http\Requests\Reservation\UpdateGuestRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\API\ApiController;
use App\Commands\Reservation\ListGuestsCommand;
use Illuminate\Http\Response;

class GuestsController extends ApiController
{
    private $guestTransformer;

    public function __construct(GuestsTransformer $guestsTransformer)
    {
        $this->guestTransformer = $guestsTransformer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index( Requests\Reservation\ListGuestsRequest $request)
    {
        try
        {
            $guests = $this->dispatchFrom(ListGuestsCommand::class, $request);

            return $this->respond([
                'Guest' => $guests,
                //'flash' => flash("Guest","New guest created succefully for the hotel", "success")
            ]);


        } catch (HotelNotFound $e) {
            return $this->respondNotFound($e->getMessage());
        } catch (HotelNotFound $e) {
            return $this->respondNotFound($e->getMessage());
        }catch (DatabaseException $e) {
            return $this->respondNotFound($e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Requests\Reservation\CreateGuestRequest|Request $request
     * @return Response
     */
    public function store(Requests\Reservation\CreateGuestRequest $request)
    {

        try
        {

            $guest = $this->dispatchFrom(CreateGuestCommand::class, $request, ['user_id' => 2]);

            return $this->respond([
                'Guest' => $this->guestTransformer->transform($guest),
                'flash' => flash("Guest","New guest created successfully for the hotel", "success")
            ]);

        } catch (GuestNotFound $e) {
            return $this->respondNotFound($e->getMessage());
        } catch (HotelNotBelongToUser $e) {
            return $this->respondNotFound($e->getMessage());
        } catch (ArrangementNotFound $e) {
            return $this->respondNotFound($e->getMessage());
        }catch (DatabaseException $e) {
            return $this->respondNotFound($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateGuestRequest|Request $request
     * @param  int $id
     * @return Response
     */
    public function update(UpdateGuestRequest $request, $id)
    {

        try
        {
            $guest = $this->dispatchFrom(UpdateGuestCommand::class, $request, ['user_id' => 2]);

            return $this->respond([
                'Guest' => $this->guestTransformer->transform($guest),
                'flash' => flash("Guest","New guest created succefully for the hotel", "success")
            ]);

        } catch (GuestNotFound $e) {
            return $this->respondNotFound($e->getMessage());
        } catch (HotelNotBelongToUser $e) {
            return $this->respondNotFound($e->getMessage());
        } catch (ArrangementNotFound $e) {
            return $this->respondNotFound($e->getMessage());
        }catch (DatabaseException $e) {
            return $this->respondNotFound($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
