<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelSettings extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'tax_excluding',
        'creditcards',
        'creditcards_text_checked',
        'creditcards_text',
        "payment_option_text_checked",
        "payment_option_text",
        'reserve_without_credit_card',
        'booking_without_credit_card_email',
        'guest_check_in_form',
        'tourist_tax_checkbox',
        'tax_amt',
        'tax_amt_val',


        'invoice_by_freebookings',
        'reservations_by_freebookings',
        'no_rooms_freebookings',
        'guest_arrival',
        'engine_page_display',

    ];




    public function settings_user()
    {
        return $this->belongsTo('App\User');
    }
}
