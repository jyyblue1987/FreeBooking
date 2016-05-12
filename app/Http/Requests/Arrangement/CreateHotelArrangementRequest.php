<?php

namespace App\Http\Requests\Arrangement;

use App\Http\Requests\Request;

class CreateHotelArrangementRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'hotel_id' => 'required|exists:hotels,id',
            'name' => 'required',
            'rooms' => 'required',
            'special' => '',
            'persons' => '',
            'price' => '',
            /*'status' => '',*/
            'date_from' => 'required|date',
            'date_to' => 'required|date',
            'patroon' => 'required',
            'standard_room' => '',
            'price_from' => '',
            'maximum_available' => '',
            'on_request' => '',
            'language' => 'required',
            'more_days' => '',
            'nights' => '',
            'type' => 'required',
            'discount_type' => '',
           /* 'position' => '',*/
            'linked_rooms_available' => 'required',
            'extra_price_with_room_price' => 'required',
        ];
    }
}
