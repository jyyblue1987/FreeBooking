<?php

namespace App\Http\Requests\Arrangement;

use App\Http\Requests\Request;

class CreateAdministerAvailabilityRequest extends Request
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'hotel_id' => 'required|exists:hotels,id',
            'date' => 'required|date',
            'available' => '',
            'price' => '',
            'status' => '',
        ];
    }
}
