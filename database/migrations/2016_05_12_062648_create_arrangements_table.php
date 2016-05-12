<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArrangementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arrangements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->text('rooms');
            $table->enum('special', ['0', '1']);
            $table->string('persons', 3);
            $table->string('price', 10);
            $table->enum('status', ['1', '0']);
            $table->date("date_from");
            $table->date("date_to");
            $table->string('patroon', 30);
            $table->mediumInteger("standard_room");
            $table->string('price_from', 10);
            $table->tinyInteger("maximum_available");
            $table->enum('on_request', ['0', '1']);
            $table->string('language', 30);
            $table->enum('more_days', ['0', '1']);
            $table->tinyInteger("nights");
            $table->text('type');
            $table->string('discount_type', 30);
            $table->tinyInteger("position");
            $table->enum('linked_rooms_available', ['1', '0']);
            $table->string('extra_price_with_room_price', 10);
            $table->integer('hotel_id')->unsigned();
            $table->foreign('hotel_id')->references('id')->on('hotels');
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
        Schema::drop('arrangements');
    }
}
