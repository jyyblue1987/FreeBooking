<?php

namespace App\Http\Controllers\API\Arrangements;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\Arrangement\CreateHotelArrangementRequest;
use App\Http\Controllers\API\ApiController;
use App\Commands\Arrangement\CreateHotelArrangementCommand;
use App\Commands\Arrangement\UpdateHotelArrangementCommand;
use Auth;
use App\Freebooking\Exceptions\Hotel\HotelNotFound;
use App\Freebooking\Exceptions\Hotel\HotelNotBelongToUser;
use App\Freebooking\Exceptions\Arragements\ArrangementNotFound;
use App\Freebooking\Exceptions\DatabaseException;
use App\Freebooking\Transformers\Arrangements\ArrangementTransformer;


class HotelArrangmentsController extends ApiController
{

    private $arrangementTransformer;


    public function __construct(ArrangementTransformer $arrangementTransformer)
    {
        $this->arrangementTransformer = $arrangementTransformer;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //
    }


    /**
     * @param CreateHotelArrangementRequest $request
     * @param $hotel_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateHotelArrangementRequest $request,$locale,  $hotel_id)
    {

        try
        {
//dd( Auth::User()->id);
            $arrangement = $this->dispatchFrom(CreateHotelArrangementCommand::class, $request, ['user_id' => 2]);

            return $this->respond([
                'Arrangement' => $this->arrangementTransformer->transform($arrangement),
                'flash' => flash("Arrangement","New arrangement created succefully for the hotel", "success")
            ]);
        } catch (HotelNotFound $e) {
            return $this->respondNotFound($e->getMessage());
        } catch (HotelNotBelongToUser $e) {
            return $this->respondNotFound($e->getMessage());
        }catch (DatabaseException $e) {
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateHotelArrangementRequest $request, $locale, $hotel_id, $arrangement_id)
    {
        try
        {

//dd( Auth::User()->id);
            $arrangement = $this->dispatchFrom(UpdateHotelArrangementCommand::class, $request, ['user_id' => 2, 'arrangement_id' => $arrangement_id]);

            return $this->respond([
                'Arrangement' => $this->arrangementTransformer->transform($arrangement),
                'flash' => flash("Arrangement","Arrangement updated succefully for the hotel", "success")
            ]);
        } catch (HotelNotFound $e) {
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
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
