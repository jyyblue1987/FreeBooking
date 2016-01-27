<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('referral', 16);
            $table->string('initials', 10);
            $table->string('first_name');
            $table->string('last_name');
            $table->string('hotel_name');
            $table->string('email');
            $table->string('profile_picture');
            $table->string('website_url');
            $table->string('address');
            $table->string('postcode', 10);
            $table->string('city', 40);
            $table->string('state', 40);
            $table->string('country',40);
            $table->string('phone', 40);
            $table->string('fax', 40);
            $table->string('password', 60);

            $table->enum('hotel_type', ['hotel', 'Bed & Breakfast']);
            $table->enum('type', ['hotel', 'admin']);
            $table->enum('status',['active', 'deactive', 'deleted']);

            $table->date('birth_date');
            $table->enum('gender',['m','f']);
            $table->enum('language', ['nl', 'en', 'fr', 'du']);
            $table->rememberToken();

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
        Schema::drop('users');
    }
}
