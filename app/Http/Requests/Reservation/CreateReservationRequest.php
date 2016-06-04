<?php

namespace App\Http\Requests\Reservation;

use App\Http\Requests\Request;

class CreateReservationRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'guest_id'          => 'required|exists:guests,id',
            'hotel_id'          => 'required|exists:hotels,id',
            'room_id'           => 'required|exists:rooms,id',
            'checkin'           => 'required',
            'checkout'          => 'required',
            'arrangement_id'    => 'required',
            'num_of_rooms'      => 'required',
            'num_of_persons'    => 'required',
            'arrival_time'      => 'required'
        ];
    }
}
