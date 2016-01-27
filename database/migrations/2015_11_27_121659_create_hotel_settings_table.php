<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_settings', function (Blueprint $table) {
            $table->increments('id');

            $table->enum('tax_excluding', ['excluding', 'including']);
            $table->text('creditcards');
            $table->text('creditcards_text_checked');
            $table->text('creditcards_text');
            $table->text('payment_option_text_checked');
            $table->text('payment_option_text');
            $table->enum('reserve_without_credit_card', ['0', '1']);
            $table->enum('booking_without_credit_card_email', ['false', 'true']);
            $table->enum('guest_check_in_form', ['false', 'true']);
            $table->enum('tourist_tax_checkbox', ['false', 'true']);
            $table->enum('tax_amt', ['per room', 'per person', 'percentage']);
            $table->string('tax_amt_val', 40);
            $table->string('invoice_by_freebookings', 255);
            $table->string('reservations_by_freebookings', 255);
            $table->string('no_rooms_freebookings', 255);
            $table->string('guest_arrival', 255);
            $table->enum('engine_page_display', ['hotel_info', 'arrangement', 'kamer', 'hotel_review']);


            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('Cascade');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('hotel_settings');
    }
}
