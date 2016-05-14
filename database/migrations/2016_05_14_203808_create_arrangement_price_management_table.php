<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArrangementPriceManagementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arrangement_price_management', function (Blueprint $table) {
            $table->increments('id');
            $table->date("date");
            $table->string('price', 10);
            $table->tinyInteger("maximum_available");
            $table->enum('status', ['1', '0'])->default(1);
            $table->integer('arrangement_id')->unsigned();
            $table->foreign('arrangement_id')->references('id')->on('arrangements');
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
        Schema::drop('arrangement_price_management');
    }
}
