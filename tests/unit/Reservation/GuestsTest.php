<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class GuestsTest extends TestCase
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
            'gender' => 'male',
            'name' => 'This is new My Name',
            'address' => 'New state blue area',
            'state' => 'Calinfornia',
            'city' => 'Calinfornia',
            'zip' => '60000',
            'country' => 'Pakistan',
            'phone' => '+9213213123213',
            'fax' => '+92131231313213',
            'email' => 'mail@example.com',
            'language' => 'en',
            '_token' => csrf_token()
        ];

        $this->call('PUT', 'api/de/guests/1', $avail);
        dd($this->response->content());
    }
}
