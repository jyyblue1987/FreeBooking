<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HotelExtraServices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_extra_services', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name', 120);
            $table->text('description');
            $table->string('price',20);

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
        Schema::destroy('hotel_extra_services');
    }
}
