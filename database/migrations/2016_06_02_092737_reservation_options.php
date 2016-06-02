<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReservationOptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation_options', function (Blueprint $table) {
            $table->increments('id');


            $table->integer('guest_id')->unsigned();
            $table->foreign('guest_id')->references('id')->on('guests');


            $table->string('book_via',40);
            $table->boolean('send_booking_mail');
            $table->boolean('send_booking_fax');

            $table->timestamps();
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('reservation_options');
    }
}
