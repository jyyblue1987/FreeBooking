<?php

namespace App\Http\Requests\Hotel;

use App\Http\Requests\Request;

class UpdateHotelExtraServicesRequest extends Request
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
            //'id'                => 'required',
            'name'              => 'required',
            'description'       => 'required',
            'price'             => 'required',
        ];
    }
}
