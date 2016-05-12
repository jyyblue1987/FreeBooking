<?php

namespace App\Http\Controllers\API\Arrangements;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\Arrangement\CreateHotelArrangementRequest;
use App\Http\Controllers\API\ApiController;
use App\Commands\Arrangment\CreateHotelArrangementCommand;

class HotelArrangmentsController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $hotel_id)
    {
       dd("CAlled");
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
    public function store(CreateHotelArrangementRequest $request, $hotel_id)
    {

        try
        {

            $arrangement = $this->dispatchFrom(CreateHotelArrangementCommand::class, $request, ['user_id' => Auth::User()->id]);


           /* return $this->respond([
                'data' => $this->leagueLocationTransformer->transform($leagueLocation)
            ]);*/
        } catch (LeagueNotFound $e) {
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
