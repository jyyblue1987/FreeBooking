<?php

namespace App\Http\Requests\Reservation;

use App\Http\Requests\Request;

class UpdateGuestRequest extends Request
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
            'id'        => 'required',
            'hotel_id' => 'required|exists:hotels,id',
            'gender' => 'required',
            'name' => 'required',
            'address' => 'required',
            'state' => 'required',
            'city' => 'required',
            'zip' => 'required|integer',
            'country' => 'required',
            'phone' => 'required',
            'fax' => 'required',
            'email' => 'required|email',
            'language' => 'required',
        ];
    }
}
