<?php

namespace App\Http\Requests\Reservation;

use App\Http\Requests\Request;

class CreateReservationPaymentRequest extends Request
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
            'reservation_id'          => 'required|exists:reservation,id',
            'option'                  => 'required',
            'cc_name'                 => 'required',
            'cc_num'                  => 'required',
            'cc_type'                 => 'required',
            'cvv'                     => 'required'
        ];
    }
}
