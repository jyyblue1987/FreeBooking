<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Guests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guests', function (Blueprint $table) {

            $table->increments('id');


            $table->integer('hotel_id')->unsigned();
            $table->foreign('hotel_id')->references('id')->on('hotels');


            $table->string('gender');
            $table->string('name', 40);
            $table->string('address',240);
            $table->string('state', 40);
            $table->string('city', 40);
            $table->string('zip', 5);
            $table->string('country', 40);


            $table->string('phone', 40);
            $table->string('fax', 40);


            $table->string('email', 120);
            $table->string('language', 2);

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
        Schema::drop('guests');
    }
}
