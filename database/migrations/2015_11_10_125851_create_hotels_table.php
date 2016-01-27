<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->increments('id');



            $table->string('address');
            $table->string('postcode', 10);
            $table->string('country',40);
            $table->string('state', 40);
            $table->string('city', 40);


            $table->string('phone', 40);
            $table->string('fax', 40);

            $table->time('check_in');
            $table->time('check_out');
            $table->enum('overStar',['1', '2', '3', '4', '5']);
            $table->string('account_number', 100);
            $table->string('giro_account_number', 100);
            $table->string('iban_number', 100);
            $table->enum('swift_ibc',['swift', 'ibc', '3', '4', '5']);

            $table->string('swift_ibc_number', 100);
            $table->string('ihk_number', 100);
            $table->string('tax_number', 100);
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
        Schema::drop('hotels');
    }
}
