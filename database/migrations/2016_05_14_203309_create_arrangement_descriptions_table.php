<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArrangementDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arrangement_descriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description');
            $table->text('options');
            $table->text('options_text');
            $table->text('options_text_checked');
            $table->enum('language', ['nl', 'en', 'de', 'fr']);
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
        Schema::drop('arrangement_descriptions');
    }
}
