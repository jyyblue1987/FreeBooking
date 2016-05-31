<?php

namespace App\Http\Requests\Arrangement;

use App\Http\Requests\Request;

class UpdateAdministerAvailabilityRequest extends Request
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
            'id'    => 'required',
            'hotel_id' => 'required|exists:hotels,id',
            'date' => 'required|date',
            'arrangement_id' => 'required|exists:arrangements,id',
            'available' => 'required',
            'price' => '',
            'status' => '',
        ];
    }
}
