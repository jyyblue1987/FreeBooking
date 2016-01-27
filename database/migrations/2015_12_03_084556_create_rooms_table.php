<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name', 255);
            /*$table->longText('description');*/
            $table->integer('number');
            $table->integer('number_persons');
            $table->string('price', 40);
            $table->enum('status', ['1', '0']);
            $table->enum('special_room', ['1', '0']);
            $table->text('special_text');
            $table->enum('single_use', ['1', '0']);
            $table->string('single_use_discount', 10);
            $table->enum('ex_breakfast', ['1', '0']);
            $table->string('ex_breakfast_discount', 10);

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::drop('rooms');
    }
}
