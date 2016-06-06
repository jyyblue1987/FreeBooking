<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ReservationTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        Session::start();

        //$this->assertTrue(true);

        $avail = [
            'id'                => '1',
            'guest_id'          => '1',
            'hotel_id'          => '2',
            'room_id'           => '2',
            'checkin'           => '2016-08-16',
            'checkout'          => '2016-08-18',
            'arrangement_id'    => '2',
            'num_of_rooms'      => '2',
            'num_of_persons'    => '8',
            'arrival_time'      => '20:00',
            '_token' => csrf_token()
        ];

        $this->call('GET', 'api/de/reservation/2');
        dd($this->response->content());
    }
}
