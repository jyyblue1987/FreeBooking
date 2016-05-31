<?php

namespace App\Http\Requests\Arrangement;

use App\Http\Requests\Request;

class DeleteHotelArrangementRequest extends Request
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
            'hotel_id' => 'required|exists:hotels,id',
            'arrangement_id' => 'required|exists:arrangements,id'
        ];
    }
}
