<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Hotel;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $shamx = User::create(['first_name' => 'Shams',
                'last_name' => 'Hashmi',
                'hotel_name' => 'Hotel Hogerhuys',
                'email' => 'shams@freebookings.nl',
                'gender' => 'male',
                'password' => bcrypt('shams123'),
                'type' => 'admin',
                'status' => 'active']
        );



        $userHotel = new Hotel;
        $userHotel->user_id = $shamx->id;
        $userHotel->save();

        $aaldert = User::create([
                'first_name' => 'Aaldert',
                'last_name' => 'Lageveen',
                'hotel_name' => 'Hotel Hogerhuys',
                'email' => 'info@freebookings.nl',
                'gender' => 'male',
                'password' => bcrypt('aaldert123'),
                'type' => 'hotel',
                'status' => 'active']
        );

        $userHotel = new Hotel;
        $userHotel->user_id = $aaldert->id;
        $userHotel->save();
    }
}