<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReservationPayment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation_payment', function (Blueprint $table) {

            $table->increments('id');


            $table->integer('reservation_id')->unsigned();
            $table->foreign('reservation_id')->references('id')->on('reservation');
            $table->string('option',20);
            $table->string('cc_name', 40);
            $table->bigInteger('cc_num');
            $table->string('cc_type', 40);
            $table->string('cvv', 3);

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
        Schema::drop('reservation_payment');
    }
}
