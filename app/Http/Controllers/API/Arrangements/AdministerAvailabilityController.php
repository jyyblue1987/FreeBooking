<?php

namespace App\Http\Controllers\API\Arrangements;

use App\Commands\Arrangement\UpdateAdministerAvailabilityCommand;
use Illuminate\Http\Request;
use App\Http\Controllers\API\ApiController;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Commands\Arrangement\CreateAdministerAvailabilityCommand;
use Auth;
use App\Freebooking\Exceptions\Hotel\HotelNotFound;
use App\Freebooking\Exceptions\Hotel\HotelNotBelongToUser;
use App\Freebooking\Transformers\Arrangements\AvailabilityTransformer;

class AdministerAvailabilityController extends ApiController
{

    private $administerTransformer;

    public function __construct()
    {
        $this->administerTransformer = new AvailabilityTransformer();
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
    public function store(Requests\Arrangement\CreateAdministerAvailabilityRequest $request)
    {

        try
        {

            $availability = $this->dispatchFrom(CreateAdministerAvailabilityCommand::class, $request, ['user_id' => 2]);

            return $this->respond([
                'Availability' => $this->administerTransformer->transform($availability),
                'flash' => flash("Availability","New administer availability created", "success")
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
    public function update(Requests\Arrangement\UpdateAdministerAvailabilityRequest $request, $id)
    {
        try
        {

            $availability = $this->dispatchFrom(UpdateAdministerAvailabilityCommand::class, $request, ['user_id' => 2]);

            return $this->respond([
                'Availability' => $this->administerTransformer->transform($availability),
                'flash' => flash("Availability","New administer availability created", "success")
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
