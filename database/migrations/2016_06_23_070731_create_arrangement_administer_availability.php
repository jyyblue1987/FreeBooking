<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArrangementAdministerAvailability extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administer_arrangements', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hotel_id')->unsigned();
            $table->foreign('hotel_id')->references('id')->on('hotels');
            $table->integer('arrangement_id')->unsigned();
            $table->foreign('arrangement_id')->references('id')->on('arrangements');
            $table->date('date');
            $table->string('price', 10);
            $table->boolean('status');
            $table->tinyInteger('available');

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
        Schema::drop('administer_arrangements');
    }
}
