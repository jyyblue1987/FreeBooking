<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelTextsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_texts', function (Blueprint $table) {
            $table->increments('id');


            $table->text('short_description');
            $table->longText('long_description');
            $table->text('hotel_locations');
            $table->string('custom_title_1', 40);
            $table->text('custom_description_1');




            $table->string('custom_title_2', 40);
            $table->text('custom_description_2');


            $table->enum('event', ['0', '1']);
            $table->text('event_description');





            $table->enum('language', ['nl', 'en', 'fr', 'de']);

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
        Schema::drop('hotel_texts');
    }
}
