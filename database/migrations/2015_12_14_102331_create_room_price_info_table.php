<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomPriceInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_price_info', function (Blueprint $table) {
            $table->increments('id');
            $table->date("date");
            $table->enum('status', ['', 'v', 'b']);
            $table->string('price', 10);
            $table->enum('last_minute', ['n', 'j']);
            $table->string('lm_price', 10);
            $table->tinyInteger('available');
            $table->tinyInteger('leased');
            $table->mediumInteger("lm_ref_id");
            $table->string('lm_patroon', 30);

            $table->mediumInteger("ms_ref_id");
            $table->string('ms_patroon', 30);
            $table->tinyInteger('ms_nights');
            $table->enum('ms_on_request', ['n', 'j']);
            $table->enum('minimal_stay', ['n', 'j']);

            $table->enum('discount', ['n', 'j']);
            $table->string("discount_percentage", 40);
            $table->string("discount_price", 10);
            $table->tinyInteger('discount_start');
            $table->tinyInteger('discount_end');
            $table->string('discount_patroon', 30);
            $table->mediumInteger("discount_ref_id");
            $table->enum('discount_compare', ['dailyprice', 'totalprice']);
            $table->enum('discount_type', ['', 'earlybooking']);

            $table->mediumInteger("ex_ref_id");
            $table->enum('ex_breakfast', ['n', 'j']);
            $table->string("ex_breakfast_price", 10);

            $table->mediumInteger("single_use_ref_id");
            $table->enum('single_use', ['n', 'j']);
            $table->string("single_use_price", 10);

            $table->mediumInteger("non_refundable_ref_id");
            $table->enum('nonrefundable', ['n', 'j']);
            $table->string("nonrefundable_price", 10);



            $table->integer('room_id')->unsigned();
            $table->foreign('room_id')->references('id')->on('rooms');
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
        Schema::drop('room_price_info');
    }
}
