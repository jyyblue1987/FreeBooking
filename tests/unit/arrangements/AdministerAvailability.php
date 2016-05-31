<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdministerAvailability extends TestCase
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
            'id'    => '1',
            'hotel_id' => '2',
            'date' => '2016-06-03',
            'arrangement_id' => '2',
            'available' => '1',
            'price' => '',
            'status' => '',
            '_token' => csrf_token()
        ];

        $this->call('PUT', 'api/de/administer-availability/hotel/2/arrangement/1', $avail);
        dd($this->response->content());
    }
}
