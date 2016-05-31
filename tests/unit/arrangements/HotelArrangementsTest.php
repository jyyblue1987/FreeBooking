<?php

use Illuminate\Foundation\Bus\DispatchesJobs;


use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Auth;
use App\Commands\Arrangment\CreateHotelArrangementCommand;

class HotelArrangementsUnitTest extends TestCase
{
    use DispatchesJobs;

    protected $headers = [
        'HTTP_X-Requested-With' => 'XMLHttpRequest',
    ];









    /**
     * @test
     */
    public function create_hotel_arrangement()
    {


        Session::start();

        //Request Params
     $request = [

          "hotel_id" => 2,
          "name" => "New arrangement for Shahbaz",
         "description"=> "New Arrangment",
           "rooms"=> [1,2,3],
            "special" => 0,
            "persons" => '',
            "price" =>[0,0,20],
            "date_from" => '2016-05-12',
            "date_to" => '2016-05-31',
            "patroon" => ['ma', 'di', 'wo', 'zo'],
            "standard_room" => 3,
            "price_from" => 180,
            "maximum_available"=>'',
            "on_request"=> 0,
            "language" => ['nl','en'],
            "more_days" => 1,
            "nights" => 3,
            "type" => ['voorjaar', 'bosrijk', 'culinaire'],
            "discount_type" => '3is2',
            "linked_rooms_available" => 1,
            "extra_price_with_room_price",

        ];

       /* $request = [

            "hotel_id" => 2,
            "name" => "I'm Updated",
            "rooms"=> [1,2,3],
            "special" => 0,
            "persons" => '',
            "price" =>[0,0,20],
            "description"=>'de stuff',
            "date_from" => '2016-05-12',
            "date_to" => '2016-05-31',
            "patroon" => ['ma', 'di', 'wo', 'zo'],
            "standard_room" => 3,
            "price_from" => 258,
            "maximum_available"=>'',
            "on_request"=> 0,
            "language" => ['nl','en'],
            "more_days" => 1,
            "nights" => 3,
            "type" => ['voorjaar', 'bosrijk', 'culinaire'],
            "discount_type" => '3is2',
            "linked_rooms_available" => 1,
            "extra_price_with_room_price",
            '_token' => csrf_token()
        ];*/

       /* $this->dispatchFromArray(CreateHotelArrangementCommand::class, $request);
        dd("done");
        //Generate a dispacth request;
       // $this->dispatchFromArray(ReadQnapLeagueVideoCommand::class, $request);
        //dd("done");
        //$this->post('api/league-passcode', $request, $this->headers);*/





        $this->call('GET', 'api/de/arrangements/2/hotel-arrangement/2');

        dd($this->response->content());


        $del = [
            'arrangement_id' => 1,
            'hotel_id'      => 2,
            'user_id'       => 2,
            '_token'        => csrf_token()
        ];
        //$this->call('DELETE', 'api/de/arrangements/2/hotel-arrangement/1', $del);

        //dd($this->response->content());

        /*$this->call('GET', 'api/de/arrangements/2/hotel-arrangement');

        $data = json_decode($this->response->content(), TRUE);

        dd($this->response->content());*/

        $this->call('POST', 'api/de/arrangements/2/hotel-arrangement', $request);
        $data =  json_decode($this->response->content(), TRUE);
        dd($this->response->content());
        $this->call('GET', 'api/qnap/getVideos', $request);
        $data =  json_decode($this->response->content(), TRUE);

        $server = $data["data"];


        foreach($server as $leagueId => $videos)
        {
            foreach($videos as $videoHash => $video)
            {


               if(!empty($this->qnapFolder[$leagueId][$videoHash]))
               {
                   continue;
               }

                $videoDelete[$leagueId][$videoHash] = $video;
            }
        }



        foreach($this->qnapFolder as $leagueId => $videos)
        {
            foreach($videos as $videoHash => $video)
            {

                if(!empty($server[$leagueId][$videoHash]))
                {
                    continue;
                }

                $videoAdd[$leagueId][$videoHash] = $video;
            }
        }


        foreach($server as $leagueId => $videos)
        {
            foreach($videos as $videoHash => $video)
            {


                if(!empty($this->qnapFolder[$leagueId][$videoHash]) && $this->qnapFolder[$leagueId][$videoHash]["file_name"] != $server[$leagueId][$videoHash]["file_name"])
                {
                    $videoUpdate[$leagueId][$videoHash] = $this->qnapFolder[$leagueId][$videoHash];
                }
            continue;

            }
        }






        $request = [
            'video' => $videoDelete,

        ];
        $this->dispatchFromArray(DeleteQnapLeagueVideoCommand::class, $request);

        $request = [
            'qnap_videos' => $videoAdd,

        ];
        $this->dispatchFromArray(CreateQnapLeagueVideoCommand::class, $request);


        $request = [
            'qnap_videos' => $videoUpdate,

        ];
        $this->call('POST', 'api/qnap/updateVideos', $request);
        //$this->dispatchFromArray(UpdateQnapLeagueVideoCommand::class, $request);


        dd("yes, Updated, deleted and also added");
        $this->assertResponseOk();
        $this->isJson();
        $result = json_decode($this->response->content(),true);




    }


    /**
     * @test
     */
    public function create_league_videos()
    {



        //Request Params
        $request = [
            'qnap_videos' => $this->qnapFolder,

        ];



        //Generate a dispacth request;
        $this->dispatchFromArray(CreateQnapLeagueVideoCommand::class, $request);
        dd("done");
        $this->post('api/league-passcode', $request, $this->headers);
        $this->call('POST', 'api/league-passcode', $request);
        /*$this->call('POST', 'leagues/46/create-passcode', $request);


        $this->assertResponseOk();
        $this->isJson();
        $result = json_decode($this->response->content(),true);*/




    }




}
