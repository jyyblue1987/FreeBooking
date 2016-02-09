<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use App\Http\Requests;
use Response;
use App\Http\Controllers\Controller;
use Auth;
use Schema;
use Validator;
use App\Http\Utilities\Utility;
use Imageupload;
use App\User;
use App\Room;
use App\Hotel;
use App\RoomDescription;
use App\RoomOption;
use App\RoomPriceInfo;
use App\RoomPhoto;




class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Application $app, Request $request, $id)
    {
            //Grabing the request params for room and room description
            $http_req = $request->all();

            //Room specific params and room table transaction
            $room = new Room($http_req[0]);

            $hotel = Hotel::where('user_id', '=', $id)->first();

            Hotel::locatedAt($hotel->id)->hotel_rooms()->save($room);


            //Getting the application support languages
            $langCodes = $app->config->get('app.locales');

            //Insert each entry of application supported languages in rooms table.
            foreach($langCodes as $code => $langName)
            {

                $room_desc = new RoomDescription($http_req[1]);

                $room_desc->language = $code;
                $room_desc->user_id = $id;
                $room_desc->hotel_id = $hotel->id;
                Room::locatedAt($room->id)->room_descriptions($room_desc);
            }

            $matchThese = ['id' =>$room->id];
            $rooms = $room->where($matchThese)->first();
            $flash = flash("Room","Room is successfully added to hotel!", "success");
            return compact('rooms', 'flash');



    }

    /**
     * Loads only the room view
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name, $id)
    {



        return view('admin.partials.roomData', compact('id', 'name'));
    }




    public function getRoomData(Application $app, $id)
    {

        $totRoom = Room::select('id')->where('user_id', '=', 2)->get();
        $totRooms =count($totRoom);

        $room = Room::where('id', '=', $id)->first();

        $matchThese = ['room_id' =>$id, 'language' => $app->config->get('app.locale')];
        $roomDesc = RoomDescription::where($matchThese)->first();



        return compact('room', 'roomDesc', 'totRooms');
    }

    /**
     * @param $id
     * @return array
     */


    public function getRoomOptions($id)
    {
            $roomOption = RoomOption::where('room_id', '=', $id)->first();

            return compact( 'roomOption' );
     }


    public function getRoomPhotos($id)
    {

        $roomPhotos = RoomPhoto::where('room_id', '=', $id)->get();

        return compact( 'roomPhotos' );
    }



    public function updateRoomData(Application $app, $id, Request $request)
    {

        //Grabing the request params for room and room description
        $http_req = $request->all();

        $room = Room::where('id', '=', $id)->first();

        $room->fill($http_req[0])->save();

        $matchThese = ['room_id' =>$id, 'language' => $app->config->get('app.locale')];


        $roomDesc = RoomDescription::where($matchThese)->first();

        $roomDesc->fill($http_req[1])->save();


       $flash=  flash($room->name,"Room is successfully updated!", "success");
        return compact('room', 'flash');
    }

    /**
     * @param $id
     * @param $roomId
     * @param Request $request
     * @return room Update status
     */

    public function updateRoomOptions($id,$roomId, Request $request)
    {

        $room_options = new RoomOption($request->all());

        $hotel = Hotel::where('user_id', '=', $id)->first();

        $model = $room_options->where('room_id', '=', $roomId)->first();

        $room = Room::where('id', '=', $roomId)->first();

        if(!$model){
            $room_options->room_id = $roomId;
            $room_options->user_id = Auth::User()->id;
            $room_options->hotel_id = $hotel->id;

            Room::locatedAt($roomId)->addRoom_options($room_options);

        }else{

            $model->fill($request->all())->save();
        }

        $flash=  flash($room->name,"Room Options are successfully updated!", "success");
        return compact('flash');

    }

    /**
     * @param Application $app
     * @param Request $request
     * @param $id
     * @param $room_id
     * @return array
     */

    public  function setRoomPrice(Application $app, Request $request, $id, $room_id)
    {
        $req_data = $request->all();

        $_pattern_days = $app->config->get('app.day_pattern');

        $date_from = $req_data["from"];

        $date_to = $req_data["to"];

        $date = $date_from;

        $days = explode("-", $req_data["days"]); # ma - di - wo - do - vr - za - zo


        $currRoom = Room::where('id', '=', $room_id)->first();
        $hotel = Hotel::where('user_id', '=', $id)->first();

        $msg = "";

        if($req_data["edit"] == "price"):

            if(!is_price_format($req_data["cost"]))
            {
                //Errors return
            }

            while ($date <= $date_to)
            {
                $w = $_pattern_days[date("w", strtotime($date))]; # day number

                if (in_array($w, $days))
                {


                    if ( ($date >= $date_from) and ($date < $date_to) )
                    {
                        $matchThese = ['room_id' =>$room_id, 'date' => $date];
                        $model = RoomPriceInfo::where($matchThese)->first();

                        if(!$model){

                            $roomPriceInfo = new RoomPriceInfo();

                            $roomPriceInfo->date = $date;
                            $roomPriceInfo->available = $currRoom->number;
                            $roomPriceInfo->price = $req_data['cost'];
                            $roomPriceInfo->room_id = $room_id;
                            $roomPriceInfo->user_id = $id;
                            $roomPriceInfo->hotel_id = $hotel->id;

                            Room::locatedAt($room_id)->addRoom_priceInfo($roomPriceInfo);

                        }else{

                            $priceData = [];

                            $priceData["date"] = $date;
                            $priceData["available"] = $currRoom->number;
                            $priceData["price"] = $req_data['cost'];
                            $priceData["room_id"] = $room_id;
                            $priceData["user_id"] = $id;
                            $priceData["hotel_id"] = $hotel->id;

                            $model->fill($priceData)->save();
                        }

                    }


                }

                $date = get_next_date($date);
            }
                $msg = "Room prices are successfully updated!";
        endif;


        if ( ($req_data["edit"] == "available") or ($req_data["edit"] == "open") or ($req_data["edit"] == "close") or ($req_data["edit"] == "increase")):


            $room_ids = array();

            if($req_data["rooms"] == "all")
            {
                $rooms = $request->session()->get("user.rooms");

                foreach($rooms as $room => $data):

                    $room_ids[$data->id] = array($data->name, $data->number, $data->price);

                endforeach;
            }



            if(count($room_ids) == 0):

                $room_ids[$room_id] = array($currRoom->name, $currRoom->number, $currRoom->price) ;

            endif;





            while ($date <= $date_to)
            {
                $available = 0;
                $w = $_pattern_days[date("w", strtotime($date))]; # day number

                if (in_array($w, $days))
                {
                    if ( ($date >= $date_from) and ($date < $date_to) )
                    {




                        foreach($room_ids as $roomId => $data):

                            $matchThese = ['room_id' =>$roomId, 'date' => $date];
                            $model = RoomPriceInfo::where($matchThese)->first();

                            if ($req_data["edit"] == "open")
                            {
                                $available = $data[1];

                            }elseif($req_data["edit"] == "close"){

                                $available = 0;

                            }elseif($req_data["edit"] == "available"){

                                $available = $req_data["available"];

                            }else if($req_data["edit"] == "increase"){

                                if(!$model){

                                    $available = $data[1] + $req_data["available"];

                                }else
                                {
                                    $available = $model->available + $req_data["available"];
                                }


                            }



                            if(!$model){

                                $roomPriceInfo = new RoomPriceInfo();

                                $roomPriceInfo->date = $date;
                                $roomPriceInfo->available  = $available;
                                $roomPriceInfo->price = $data[2];
                                $roomPriceInfo->room_id = $roomId;
                                $roomPriceInfo->user_id = $id;
                                $roomPriceInfo->hotel_id = $hotel->id;

                                Room::locatedAt($roomId)->addRoom_priceInfo($roomPriceInfo);

                            }else{


                                $priceData = [];

                                $priceData["date"] = $date;
                                $priceData["available"] = $available;

                                /*$priceData["room_id"] = $room_id;
                                $priceData["user_id"] = $id;
                                $priceData["hotel_id"] = $hotel->id;*/

                                $model->fill($priceData)->save();
                            }
                        endforeach;
                    }
                }

                $date = get_next_date($date);
            }
            $msg = "Room data is successfully updated!";
        endif;

        $flash = flash($currRoom->name,"$msg", "success");
        return compact('flash');


    }

    /**
     * @param Application $app
     * @param Request $request
     * @param $id
     * @param $room_id
     */

    public  function setlmPrice(Application $app, Request $request, $id, $room_id)
    {

        $req_data = $request->all();


        $_pattern_days = $app->config->get('app.day_pattern');

        $date_from = $req_data["from"];

        $date_to = $req_data["to"];

        $date = $date_from;



        if( $date_to >= $date_from)
        {
            $days = explode("-", $req_data["days"]); # ma - di - wo - do - vr - za - zo

            $currRoom = Room::where('id', '=', $room_id)->first();
            $hotel = Hotel::where('user_id', '=', $id)->first();



            $available = $currRoom->number;


            if($req_data["edit"] == "change" or $req_data["edit"] == "delete"):

                $matchThese = ['room_id' =>$room_id, 'lm_ref_id' => $req_data["ref_id"]];
                $model_status = RoomPriceInfo::where($matchThese)->update(['last_minute' => 'n']);



            endif;


         if($req_data["edit"] == "new" or $req_data["edit"] == "change"):

            $data = array();

            $ref_id = "";

            while ($date <= $date_to)
            {
                $available = 0;
                $w = $_pattern_days[date("w", strtotime($date))]; # day number

                if (in_array($w, $days))
                {

                    $data[$date] = "j";

                    $matchThese = ['room_id' =>$room_id, 'date' => $date];
                    $model = RoomPriceInfo::where($matchThese)->first();

                    if(!$model){

                        $roomPriceInfo = new RoomPriceInfo();

                        $roomPriceInfo->date = $date;
                        $roomPriceInfo->last_minute  = 'j';
                        $roomPriceInfo->lm_price = $req_data['cost'];
                        $roomPriceInfo->lm_ref_id = $ref_id;
                        $roomPriceInfo->lm_patroon = $req_data["days"];
                        $roomPriceInfo->room_id = $room_id;
                        $roomPriceInfo->user_id = $id;
                        $roomPriceInfo->hotel_id = $hotel->id;

                        $lm = Room::locatedAt($room_id)->addRoom_priceInfo($roomPriceInfo);

                        if(empty($ref_id)):
                            $ref_id = $lm->id;
                            $update_model = RoomPriceInfo::where('id',$ref_id)->first();
                            $refData = [];
                            $refData["lm_ref_id"] = $ref_id;
                            $update_model->fill($refData)->save();
                            endif;

                    }else{


                        if ( ($model->id == $model->lm_ref_id) and ($model->lm_patroon <> $req_data["days"]) and ($model->last_minute == "j") )
                        {


                            $model->delete();

                            $roomPriceInfo = new RoomPriceInfo();
                            $columns = Schema::getColumnListing("room_price_info");

                            foreach($columns as $col_id => $colName):

                                if($colName == "id" or $colName == "created_at" or $colName == "updated_at")
                                   continue;

                                if($colName == "last_minute"):
                                    $roomPriceInfo->$colName = "j";
                                    continue;
                                elseif($colName == "lm_price"):
                                    $roomPriceInfo->$colName = $req_data["cost"];
                                    continue;
                                elseif($colName == "lm_patroon"):
                                    $roomPriceInfo->$colName = $req_data["days"];
                                    continue;
                                elseif($colName == "lm_ref_id"):
                                    $roomPriceInfo->$colName = $ref_id;
                                    continue;

                                endif;

                                $roomPriceInfo->$colName = $model->$colName;

                            endforeach;

                            $lm = Room::locatedAt($room_id)->addRoom_priceInfo($roomPriceInfo);

                            if(empty($ref_id)):
                                $ref_id = $lm->id;
                                $update_model = RoomPriceInfo::where('id',$ref_id)->first();
                                $refData = [];
                                $refData["lm_ref_id"] = $ref_id;
                                $update_model->fill($refData)->save();
                            endif;


                        }else{

                            if ($ref_id == "")
                            {
                                $ref_id = $model->id;
                            }

                            $refData = [];
                            $refData["lm_ref_id"] = $ref_id;
                            $refData["last_minute"]  = 'j';
                            $refData["lm_price"] = $req_data['cost'];
                            $refData["lm_patroon"] = $req_data["days"];
                            $model->fill($refData)->save();



                        }

                    }


                }
                $date = get_next_date($date);
            }
         endif;

        }

        $flash = flash($currRoom->name,"Last minute price is added!", "success");
        return compact('flash');

    }

    public function getLstMinutePrice(Application $app, $id, $room_id)
    {
        $utility = new Utility($app);
        $app_day_patern = $utility::get_day_list();

        $matchThese = ['room_id' =>$room_id, 'last_minute' => 'j'];
        $model = RoomPriceInfo::select( 'lm_ref_id','lm_price', 'lm_patroon' )->distinct()->where($matchThese)->orderBy('date')->get();

        $hotel = Hotel::where('user_id', '=', $id)->first();
        if(!$model):

            return null;

        else:

            $result = $model->all();

            $data = array();
            foreach($result as $row => $col):

                $start = "";
                $end  = "";
                $matchThese = ['lm_ref_id' =>$col->lm_ref_id, 'last_minute' => 'j'];

                $singleLmSetup = RoomPriceInfo::select('id','date')->where($matchThese)->orderBy('date')->get();
                $singleLmSetupD = $singleLmSetup->all();

                $totalRows = count($singleLmSetupD);

                $i = 0;


                foreach($singleLmSetupD as $singleRow => $singleCol):

                    $i++;

                    if ($i == 1)
                    {
                        $start = $singleCol->date;
                    }
                    if ($i == $totalRows)
                    {
                        $end = $singleCol->date;
                    }

                endforeach;

                if (date("Y-m-d") > $end)
                {
                    $disabled = true;
                }
                else
                {
                    $disabled = false;
                }


            $data[] = [
                        "id"                => $col->lm_ref_id,
                        "room_id"           => $room_id,
                        "hotel"             => $hotel->id,
                        "ref_id"            => $col->lm_ref_id,
                        "start"             => $start,
                        "end"               => $end,
                        "price"             => $col->lm_price,
                        "Days"              => $app_day_patern[$col->lm_patroon],
                        "format_days"       => $col->lm_patroon,
                        "uid"               => $id,
                ];


            endforeach;



        endif;


        return $data;
    }


    public function setMinStay(Application $app, Request $request, $room_id)
    {
        $req_data = $request->all();

        $_pattern_days = $app->config->get('app.day_pattern');

        $date_from = $req_data["from"];

        $date_to = $req_data["to"];

        $date = $date_from;

        $id = Auth::User()->id;

        if( $date_to >= $date_from)
        {
            $days = explode("-", $req_data["days"]); # ma - di - wo - do - vr - za - zo

            $currRoom = Room::where('id', '=', $room_id)->first();
            $hotel = Hotel::where('user_id', '=', $id)->first();



            $available = $currRoom->number;


            if($req_data["edit"] == "change" or $req_data["edit"] == "delete"):

                $matchThese = ['room_id' =>$room_id, 'ms_ref_id' => $req_data["ref_id"]];
                $model_status = RoomPriceInfo::where($matchThese)->update(['minimal_stay' => 'n']);
            endif;


            if($req_data["edit"] == "new" or $req_data["edit"] == "change"):

                $data = array();

                $ref_id = "";

                while ($date <= $date_to)
                {
                    $available = 0;
                    $w = $_pattern_days[date("w", strtotime($date))]; # day number

                    if (in_array($w, $days))
                    {

                        $data[$date] = "j";

                        $matchThese = ['room_id' =>$room_id, 'date' => $date];
                        $model = RoomPriceInfo::where($matchThese)->first();

                        if(!$model){

                            $roomPriceInfo = new RoomPriceInfo();

                            $roomPriceInfo->date = $date;
                            $roomPriceInfo->minimal_stay  = 'j';
                            $roomPriceInfo->ms_nights = $req_data['nights'];
                            $roomPriceInfo->ms_ref_id = $ref_id;
                            $roomPriceInfo->ms_patroon = $req_data["days"];
                            $roomPriceInfo->room_id = $room_id;
                            $roomPriceInfo->user_id = $id;
                            $roomPriceInfo->hotel_id = $hotel->id;

                            $ms = Room::locatedAt($room_id)->addRoom_priceInfo($roomPriceInfo);

                            if(empty($ref_id)):
                                $ref_id = $ms->id;
                                $update_model = RoomPriceInfo::where('id',$ref_id)->first();
                                $refData = [];
                                $refData["ms_ref_id"] = $ref_id;
                                $update_model->fill($refData)->save();
                            endif;

                        }else{


                            if ( ($model->id == $model->ms_ref_id) and ($model->ms_patroon <> $req_data["days"]) and ($model->minimal_stay == "j") )
                            {


                                $model->delete();

                                $roomPriceInfo = new RoomPriceInfo();
                                $columns = Schema::getColumnListing("room_price_info");

                                foreach($columns as $col_id => $colName):

                                    if($colName == "id" or $colName == "created_at" or $colName == "updated_at")
                                        continue;

                                    if($colName == "minimal_stay"):
                                        $roomPriceInfo->$colName = "j";
                                        continue;
                                    elseif($colName == "ms_nights"):
                                        $roomPriceInfo->$colName = $req_data["nights"];
                                        continue;
                                    elseif($colName == "ms_patroon"):
                                        $roomPriceInfo->$colName = $req_data["days"];
                                        continue;
                                    elseif($colName == "ms_ref_id"):
                                        $roomPriceInfo->$colName = $ref_id;
                                        continue;

                                    endif;

                                    $roomPriceInfo->$colName = $model->$colName;

                                endforeach;

                                $ms = Room::locatedAt($room_id)->addRoom_priceInfo($roomPriceInfo);

                                if(empty($ref_id)):
                                    $ref_id = $ms->id;
                                    $update_model = RoomPriceInfo::where('id',$ref_id)->first();
                                    $refData = [];
                                    $refData["ms_ref_id"] = $ref_id;
                                    $update_model->fill($refData)->save();
                                endif;


                            }else{

                                if ($ref_id == "")
                                {
                                    $ref_id = $model->id;
                                }

                                $refData = [];
                                $refData["ms_ref_id"] = $ref_id;
                                $refData["minimal_stay"]  = 'j';
                                $refData["ms_nights"] = $req_data['nights'];
                                $refData["ms_patroon"] = $req_data["days"];
                                $model->fill($refData)->save();



                            }

                        }


                    }
                    $date = get_next_date($date);
                }
            endif;

        }

        $flash = flash($currRoom->name,"Minimum Stay is added!", "success");
        return compact('flash');
    }


    public function getMinimumStay(Application $app, $id, $room_id)
    {
        $utility = new Utility($app);
        $app_day_patern = $utility::get_day_list();

        $matchThese = ['room_id' =>$room_id, 'minimal_stay' => 'j'];
        $model = RoomPriceInfo::select( 'ms_ref_id','ms_nights', 'ms_patroon' )->distinct()->where($matchThese)->orderBy('date')->get();

        $hotel = Hotel::where('user_id', '=', $id)->first();
        if(!$model):

            return null;

        else:

            $result = $model->all();

            $data = array();
            foreach($result as $row => $col):

                $start = "";
                $end  = "";
                $matchThese = ['ms_ref_id' =>$col->ms_ref_id, 'minimal_stay' => 'j'];

                $singleMsSetup = RoomPriceInfo::select('id','date')->where($matchThese)->orderBy('date')->get();
                $singleMsSetupD = $singleMsSetup->all();

                $totalRows = count($singleMsSetupD);

                $i = 0;


                foreach($singleMsSetupD as $singleRow => $singleCol):

                    $i++;

                    if ($i == 1)
                    {
                        $start = $singleCol->date;
                    }
                    if ($i == $totalRows)
                    {
                        $end = $singleCol->date;
                    }

                endforeach;

                if (date("Y-m-d") > $end)
                {
                    $disabled = true;
                }
                else
                {
                    $disabled = false;
                }


                $data[] = [
                    "id"                => $col->ms_ref_id,
                    "room_id"           => $room_id,
                    "hotel"             => $hotel->id,
                    "ref_id"            => $col->ms_ref_id,
                    "start"             => $start,
                    "end"               => $end,
                    "nights"             => $col->ms_nights,
                    "Days"              => $app_day_patern[$col->ms_patroon],
                    "format_days"       => $col->ms_patroon,
                    "uid"               => $id,
                ];


            endforeach;



        endif;


        return $data;
    }


    /**
     * Excluding Break-Fast Setup
     * @param Application $app
     * @param Request $request
     * @param $room_id
     * @return array
     */


    public  function setexBreakFast(Application $app, Request $request, $room_id)
    {

        $req_data = $request->all();

        $date_from = $req_data["from"];

        $date_to = $req_data["to"];

        $date = $date_from;

        $id = Auth::User()->id;

        if( $date_to >= $date_from)
        {


            $currRoom = Room::where('id', '=', $room_id)->first();
            $hotel = Hotel::where('user_id', '=', $id)->first();



            $available = $currRoom->number;


            if($req_data["edit"] == "change" or $req_data["edit"] == "delete"):

                $matchThese = ['room_id' =>$room_id, 'ex_ref_id' => $req_data["ref_id"]];
                $model_status = RoomPriceInfo::where($matchThese)->update(['ex_breakfast' => 'n']);



            endif;


            if($req_data["edit"] == "new" or $req_data["edit"] == "change"):

                $data = array();

                $ref_id = "";

                while ($date <= $date_to)
                {
                    $available = 0;


                        $data[$date] = "j";

                        $matchThese = ['room_id' =>$room_id, 'date' => $date];
                        $model = RoomPriceInfo::where($matchThese)->first();

                        if(!$model){

                            $roomPriceInfo = new RoomPriceInfo();

                            $roomPriceInfo->date = $date;
                            $roomPriceInfo->ex_breakfast  = 'j';
                            $roomPriceInfo->ex_breakfast_price = $req_data['cost'];
                            $roomPriceInfo->ex_ref_id = $ref_id;
                            $roomPriceInfo->room_id = $room_id;
                            $roomPriceInfo->user_id = $id;
                            $roomPriceInfo->hotel_id = $hotel->id;

                            $exB = Room::locatedAt($room_id)->addRoom_priceInfo($roomPriceInfo);

                            if(empty($ref_id)):
                                $ref_id = $exB->id;
                                $update_model = RoomPriceInfo::where('id',$ref_id)->first();
                                $refData = [];
                                $refData["ex_ref_id"] = $ref_id;
                                $update_model->fill($refData)->save();
                            endif;

                        }else{


                            if ( ($model->id == $model->ex_ref_id) and ($model->ex_breakfast == "j") )
                            {


                                $model->delete();

                                $roomPriceInfo = new RoomPriceInfo();
                                $columns = Schema::getColumnListing("room_price_info");

                                foreach($columns as $col_id => $colName):

                                    if($colName == "id" or $colName == "created_at" or $colName == "updated_at")
                                        continue;

                                    if($colName == "ex_breakfast"):
                                        $roomPriceInfo->$colName = "j";
                                        continue;
                                    elseif($colName == "ex_breakfast_price"):
                                        $roomPriceInfo->$colName = $req_data["cost"];
                                        continue;
                                    elseif($colName == "ex_ref_id"):
                                        $roomPriceInfo->$colName = $ref_id;
                                        continue;

                                    endif;

                                    $roomPriceInfo->$colName = $model->$colName;

                                endforeach;

                                $exB = Room::locatedAt($room_id)->addRoom_priceInfo($roomPriceInfo);

                                if(empty($ref_id)):
                                    $ref_id = $exB->id;
                                    $update_model = RoomPriceInfo::where('id',$ref_id)->first();
                                    $refData = [];
                                    $refData["ex_ref_id"] = $ref_id;
                                    $update_model->fill($refData)->save();
                                endif;


                            }else{

                                if ($ref_id == "")
                                {
                                    $ref_id = $model->id;
                                }

                                $refData = [];
                                $refData["ex_ref_id"] = $ref_id;
                                $refData["ex_breakfast"]  = 'j';
                                $refData["ex_breakfast_price"] = $req_data['cost'];
                                $model->fill($refData)->save();



                            }

                        }



                    $date = get_next_date($date);
                }
            endif;

        }

        $flash = flash($currRoom->name,"Excluding Break-Fast price is added!", "success");
        return compact('flash');

    }

    /**
     * @param Application $app
     * @param $id
     * @param $room_id
     * @return array|null
     */



    public function getexBreakFast(Application $app, $id, $room_id)
    {
        $utility = new Utility($app);


        $matchThese = ['room_id' =>$room_id, 'ex_breakfast' => 'j'];
        $model = RoomPriceInfo::select( 'ex_ref_id','ex_breakfast_price')->distinct()->where($matchThese)->orderBy('date')->get();

        $hotel = Hotel::where('user_id', '=', $id)->first();
        if(!$model):

            return null;

        else:

            $result = $model->all();

            $data = array();
            foreach($result as $row => $col):

                $start = "";
                $end  = "";
                $matchThese = ['ex_ref_id' =>$col->ex_ref_id, 'ex_breakfast' => 'j'];

                $singleMsSetup = RoomPriceInfo::select('id','date')->where($matchThese)->orderBy('date')->get();
                $singleMsSetupD = $singleMsSetup->all();

                $totalRows = count($singleMsSetupD);

                $i = 0;


                foreach($singleMsSetupD as $singleRow => $singleCol):

                    $i++;

                    if ($i == 1)
                    {
                        $start = $singleCol->date;
                    }
                    if ($i == $totalRows)
                    {
                        $end = $singleCol->date;
                    }

                endforeach;

                if (date("Y-m-d") > $end)
                {
                    $disabled = true;
                }
                else
                {
                    $disabled = false;
                }


                $data[] = [
                    "id"                => $col->ex_ref_id,
                    "room_id"           => $room_id,
                    "hotel"             => $hotel->id,
                    "ref_id"            => $col->ex_ref_id,
                    "start"             => $start,
                    "end"               => $end,
                    "price"             => $col->ex_breakfast_price,
                    "uid"               => $id,
                ];


            endforeach;



        endif;


        return $data;
    }


    public  function setSingleUse(Application $app, Request $request, $room_id)
    {

        $req_data = $request->all();

        $date_from = $req_data["from"];

        $date_to = $req_data["to"];

        $date = $date_from;

        $id = Auth::User()->id;

        if( $date_to >= $date_from)
        {


            $currRoom = Room::where('id', '=', $room_id)->first();
            $hotel = Hotel::where('user_id', '=', $id)->first();



            $available = $currRoom->number;


            if($req_data["edit"] == "change" or $req_data["edit"] == "delete"):

                $matchThese = ['room_id' =>$room_id, 'single_use_ref_id' => $req_data["ref_id"]];
                $model_status = RoomPriceInfo::where($matchThese)->update(['single_use' => 'n']);



            endif;


            if($req_data["edit"] == "new" or $req_data["edit"] == "change"):

                $data = array();

                $ref_id = "";

                while ($date <= $date_to)
                {
                    $available = 0;


                    $data[$date] = "j";

                    $matchThese = ['room_id' =>$room_id, 'date' => $date];
                    $model = RoomPriceInfo::where($matchThese)->first();

                    if(!$model){

                        $roomPriceInfo = new RoomPriceInfo();

                        $roomPriceInfo->date = $date;
                        $roomPriceInfo->single_use  = 'j';
                        $roomPriceInfo->single_use_price = $req_data['cost'];
                        $roomPriceInfo->single_use_ref_id = $ref_id;
                        $roomPriceInfo->room_id = $room_id;
                        $roomPriceInfo->user_id = $id;
                        $roomPriceInfo->hotel_id = $hotel->id;

                        $sU = Room::locatedAt($room_id)->addRoom_priceInfo($roomPriceInfo);

                        if(empty($ref_id)):
                            $ref_id = $sU->id;
                            $update_model = RoomPriceInfo::where('id',$ref_id)->first();
                            $refData = [];
                            $refData["single_use_ref_id"] = $ref_id;
                            $update_model->fill($refData)->save();
                        endif;

                    }else{


                        if ( ($model->id == $model->single_use_ref_id) and ($model->single_use == "j") )
                        {


                            $model->delete();

                            $roomPriceInfo = new RoomPriceInfo();
                            $columns = Schema::getColumnListing("room_price_info");

                            foreach($columns as $col_id => $colName):

                                if($colName == "id" or $colName == "created_at" or $colName == "updated_at")
                                    continue;

                                if($colName == "single_use"):
                                    $roomPriceInfo->$colName = "j";
                                    continue;
                                elseif($colName == "single_use_price"):
                                    $roomPriceInfo->$colName = $req_data["cost"];
                                    continue;
                                elseif($colName == "single_use_ref_id"):
                                    $roomPriceInfo->$colName = $ref_id;
                                    continue;

                                endif;

                                $roomPriceInfo->$colName = $model->$colName;

                            endforeach;

                            $sU = Room::locatedAt($room_id)->addRoom_priceInfo($roomPriceInfo);

                            if(empty($ref_id)):
                                $ref_id = $sU->id;
                                $update_model = RoomPriceInfo::where('id',$ref_id)->first();
                                $refData = [];
                                $refData["single_use_ref_id"] = $ref_id;
                                $update_model->fill($refData)->save();
                            endif;


                        }else{

                            if ($ref_id == "")
                            {
                                $ref_id = $model->id;
                            }

                            $refData = [];
                            $refData["single_use_ref_id"] = $ref_id;
                            $refData["single_use"]  = 'j';
                            $refData["single_use_price"] = $req_data['cost'];
                            $model->fill($refData)->save();



                        }

                    }



                    $date = get_next_date($date);
                }
            endif;

        }

        $flash = flash($currRoom->name,"Single Use price is added!", "success");
        return compact('flash');

    }


    public function getSingleUse(Application $app, $id, $room_id)
    {
        $utility = new Utility($app);


        $matchThese = ['room_id' =>$room_id, 'single_use' => 'j'];
        $model = RoomPriceInfo::select( 'single_use_ref_id','single_use_price')->distinct()->where($matchThese)->orderBy('date')->get();

        $hotel = Hotel::where('user_id', '=', $id)->first();
        if(!$model):

            return null;

        else:

            $result = $model->all();

            $data = array();
            foreach($result as $row => $col):

                $start = "";
                $end  = "";
                $matchThese = ['single_use_ref_id' =>$col->single_use_ref_id, 'single_use' => 'j'];

                $singleMsSetup = RoomPriceInfo::select('id','date')->where($matchThese)->orderBy('date')->get();
                $singleMsSetupD = $singleMsSetup->all();

                $totalRows = count($singleMsSetupD);

                $i = 0;


                foreach($singleMsSetupD as $singleRow => $singleCol):

                    $i++;

                    if ($i == 1)
                    {
                        $start = $singleCol->date;
                    }
                    if ($i == $totalRows)
                    {
                        $end = $singleCol->date;
                    }

                endforeach;

                if (date("Y-m-d") > $end)
                {
                    $disabled = true;
                }
                else
                {
                    $disabled = false;
                }


                $data[] = [
                    "id"                => $col->single_use_ref_id,
                    "room_id"           => $room_id,
                    "hotel"             => $hotel->id,
                    "ref_id"            => $col->single_use_ref_id,
                    "start"             => $start,
                    "end"               => $end,
                    "price"             => $col->single_use_price,
                    "uid"               => $id,
                ];


            endforeach;



        endif;


        return $data;
    }


    public function setNonRefundable(Application $app, Request $request, $room_id)
    {

        $req_data = $request->all();

        $date_from = $req_data["from"];

        $date_to = $req_data["to"];

        $date = $date_from;

        $id = Auth::User()->id;

        if( $date_to >= $date_from)
        {


            $currRoom = Room::where('id', '=', $room_id)->first();
            $hotel = Hotel::where('user_id', '=', $id)->first();



            $available = $currRoom->number;


            if($req_data["edit"] == "change" or $req_data["edit"] == "delete"):

                $matchThese = ['room_id' =>$room_id, 'non_refundable_ref_id' => $req_data["ref_id"]];
                $model_status = RoomPriceInfo::where($matchThese)->update(['nonrefundable' => 'n']);



            endif;


            if($req_data["edit"] == "new" or $req_data["edit"] == "change"):

                $data = array();

                $ref_id = "";

                while ($date <= $date_to)
                {
                    $available = 0;


                    $data[$date] = "j";

                    $matchThese = ['room_id' =>$room_id, 'date' => $date];
                    $model = RoomPriceInfo::where($matchThese)->first();

                    if(!$model){

                        $roomPriceInfo = new RoomPriceInfo();

                        $roomPriceInfo->date = $date;
                        $roomPriceInfo->nonrefundable  = 'j';
                        $roomPriceInfo->nonrefundable_price = $req_data['cost'];
                        $roomPriceInfo->non_refundable_ref_id = $ref_id;
                        $roomPriceInfo->room_id = $room_id;
                        $roomPriceInfo->user_id = $id;
                        $roomPriceInfo->hotel_id = $hotel->id;

                        $nF = Room::locatedAt($room_id)->addRoom_priceInfo($roomPriceInfo);

                        if(empty($ref_id)):
                            $ref_id = $nF->id;
                            $update_model = RoomPriceInfo::where('id',$ref_id)->first();
                            $refData = [];
                            $refData["non_refundable_ref_id"] = $ref_id;
                            $update_model->fill($refData)->save();
                        endif;

                    }else{


                        if ( ($model->id == $model->non_refundable_ref_id) and ($model->nonrefundable == "j") )
                        {


                            $model->delete();

                            $roomPriceInfo = new RoomPriceInfo();
                            $columns = Schema::getColumnListing("room_price_info");

                            foreach($columns as $col_id => $colName):

                                if($colName == "id" or $colName == "created_at" or $colName == "updated_at")
                                    continue;

                                if($colName == "nonrefundable"):
                                    $roomPriceInfo->$colName = "j";
                                    continue;
                                elseif($colName == "nonrefundable_price"):
                                    $roomPriceInfo->$colName = $req_data["cost"];
                                    continue;
                                elseif($colName == "non_refundable_ref_id"):
                                    $roomPriceInfo->$colName = $ref_id;
                                    continue;

                                endif;

                                $roomPriceInfo->$colName = $model->$colName;

                            endforeach;

                            $nF = Room::locatedAt($room_id)->addRoom_priceInfo($roomPriceInfo);

                            if(empty($ref_id)):
                                $ref_id = $nF->id;
                                $update_model = RoomPriceInfo::where('id',$ref_id)->first();
                                $refData = [];
                                $refData["non_refundable_ref_id"] = $ref_id;
                                $update_model->fill($refData)->save();
                            endif;


                        }else{

                            if ($ref_id == "")
                            {
                                $ref_id = $model->id;
                            }

                            $refData = [];
                            $refData["non_refundable_ref_id"] = $ref_id;
                            $refData["nonrefundable"]  = 'j';
                            $refData["nonrefundable_price"] = $req_data['cost'];
                            $model->fill($refData)->save();



                        }

                    }



                    $date = get_next_date($date);
                }
            endif;

        }

        $flash = flash($currRoom->name,"Non-Refundable price is added!", "success");
        return compact('flash');

    }




    public function getNonRefundable(Application $app, $id, $room_id)
    {
        $utility = new Utility($app);


        $matchThese = ['room_id' =>$room_id, 'nonrefundable' => 'j'];
        $model = RoomPriceInfo::select( 'non_refundable_ref_id','nonrefundable_price')->distinct()->where($matchThese)->orderBy('date')->get();

        $hotel = Hotel::where('user_id', '=', $id)->first();
        if(!$model):

            return null;

        else:

            $result = $model->all();

            $data = array();
            foreach($result as $row => $col):

                $start = "";
                $end  = "";
                $matchThese = ['non_refundable_ref_id' =>$col->non_refundable_ref_id, 'nonrefundable' => 'j'];

                $singleMsSetup = RoomPriceInfo::select('id','date')->where($matchThese)->orderBy('date')->get();
                $singleMsSetupD = $singleMsSetup->all();

                $totalRows = count($singleMsSetupD);

                $i = 0;


                foreach($singleMsSetupD as $singleRow => $singleCol):

                    $i++;

                    if ($i == 1)
                    {
                        $start = $singleCol->date;
                    }
                    if ($i == $totalRows)
                    {
                        $end = $singleCol->date;
                    }

                endforeach;

                if (date("Y-m-d") > $end)
                {
                    $disabled = true;
                }
                else
                {
                    $disabled = false;
                }


                $data[] = [
                    "id"                => $col->non_refundable_ref_id,
                    "room_id"           => $room_id,
                    "hotel"             => $hotel->id,
                    "ref_id"            => $col->non_refundable_ref_id,
                    "start"             => $start,
                    "end"               => $end,
                    "price"             => $col->nonrefundable_price,
                    "uid"               => $id,
                ];


            endforeach;



        endif;


        return $data;
    }

    /**
     * @param Request $request
     * @return array
     */

    public function roomPhotosPost(Request $request)
    {
        $data = [];
        $rules = array(

            'room_id' => 'required|numeric|exists:rooms,id',
            'file'=>'required|image'

        );

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){

            return Response::make("There is some problem in the uploaded image", 204);
        }

        $hotel = Hotel::where('user_id', '=', Auth::User()->id)->first();
        $dir =  "/uploads/$hotel->id/rooms/$request->room_id";



        $random_name = str_random(8);
        $extension = $request->file('file')->getClientOriginalExtension();



        $filename = $request->room_id."_".$random_name.'_room_image';
        $filename_db = $request->room_id."_".$random_name.'_room_image.'.$extension;


        $data['result'] =  Imageupload::upload($request->file('file'), $filename, $dir);



        $roomPhoto = new RoomPhoto();

        $roomPhoto->image = $filename_db;

        $roomPhoto->room_id = $request->room_id;
        $roomPhoto->user_id = Auth::User()->id;
        $roomPhoto->hotel_id = $hotel->id;

        $photo = Room::locatedAt($request->room_id)->addRoom_photo($roomPhoto);

        return compact('photo');
    }





    public function deleteRoomPhoto($id)
    {
        $model = RoomPhoto::where('id', $id)->first();

        $model->delete();
    }

    /**
     * Get room normal price
     * @param $room_id
     * @return array
     */

    public function getRoomNormalPrice($room_id)
    {
        $room = new Room();


        $matchThese = ['id' => $room_id];
        $rooms = $room->select(['name','price'])->where($matchThese)->first();

        return compact('rooms');
    }


    /**
     * @param Application $app
     * @param Request $request
     * @param $room_id
     * @return array
     */

    public function setDiscountDatesPrice(Application $app, Request $request, $room_id)
    {
        $req_data = $request->all();

        $_pattern_days = $app->config->get('app.day_pattern');

        $date_from = $req_data["from"];

        $date_to = $req_data["to"];

        $date = $date_from;

        $id = Auth::User()->id;

        $discount_type = "";

        if(isset($req_data["discount_type"]))
        {


            $discount_type =$req_data["discount_type"];
        }


        if( $date_to >= $date_from)
        {
            $days = explode("-", $req_data["days"]); # ma - di - wo - do - vr - za - zo

            $currRoom = Room::where('id', '=', $room_id)->first();
            $hotel = Hotel::where('user_id', '=', $id)->first();



            $available = $currRoom->number;


            if($req_data["edit"] == "change" or $req_data["edit"] == "delete"):

                $matchThese = ['room_id' =>$room_id, 'discount_ref_id' => $req_data["ref_id"]];
                $model_status = RoomPriceInfo::where($matchThese)->update(['discount' => 'n']);
            endif;


            if($req_data["edit"] == "new" or $req_data["edit"] == "change"):

                $data = array();

                $ref_id = "";

                while ($date <= $date_to)
                {
                    $available = 0;
                    $w = $_pattern_days[date("w", strtotime($date))]; # day number

                    if (in_array($w, $days))
                    {

                        $data[$date] = "j";

                        $matchThese = ['room_id' =>$room_id, 'date' => $date];
                        $model = RoomPriceInfo::where($matchThese)->first();

                        if(!$model){

                            $roomPriceInfo = new RoomPriceInfo();

                            $roomPriceInfo->date = $date;
                            $roomPriceInfo->discount  = 'j';
                            $roomPriceInfo->discount_price = implode("|", $req_data["discount_price"]);
                            $roomPriceInfo->discount_ref_id = $ref_id;
                            $roomPriceInfo->discount_patroon = $req_data["days"];
                            $roomPriceInfo->discount_start = $req_data["start"];
                            $roomPriceInfo->discount_end = $req_data["till"];
                            $roomPriceInfo->discount_compare = $req_data["discount_compare"];
                            $roomPriceInfo->discount_type = $discount_type;
                            $roomPriceInfo->room_id = $room_id;
                            $roomPriceInfo->user_id = $id;
                            $roomPriceInfo->hotel_id = $hotel->id;

                            $discount = Room::locatedAt($room_id)->addRoom_priceInfo($roomPriceInfo);

                            if(empty($ref_id)):
                                $ref_id = $discount->id;
                                $update_model = RoomPriceInfo::where('id',$ref_id)->first();
                                $refData = [];
                                $refData["discount_ref_id"] = $ref_id;
                                $update_model->fill($refData)->save();
                            endif;

                        }else{


                            if ( ($model->id == $model->discount_ref_id) and ($model->discount_patroon <> $req_data["days"]) and ($model->discount == "j") )
                            {


                                $model->delete();

                                $roomPriceInfo = new RoomPriceInfo();
                                $columns = Schema::getColumnListing("room_price_info");

                                foreach($columns as $col_id => $colName):


                                    if($colName == "id" or $colName == "created_at" or $colName == "updated_at")
                                        continue;

                                    if($colName == "discount"):
                                        $roomPriceInfo->$colName = "j";
                                        continue;
                                    elseif($colName == "discount_price"):
                                        $roomPriceInfo->$colName = implode("|", $req_data["discount_price"]);
                                        continue;
                                    elseif($colName == "discount_patroon"):
                                        $roomPriceInfo->$colName = $req_data["days"];
                                        continue;
                                    elseif($colName == "discount_start"):
                                        $roomPriceInfo->$colName = $req_data["start"];
                                        continue;
                                    elseif($colName == "discount_end"):
                                        $roomPriceInfo->$colName = $req_data["till"];
                                        continue;
                                    elseif($colName == "discount_compare"):
                                        $roomPriceInfo->$colName = $req_data["discount_compare"];
                                        continue;
                                    elseif($colName == "discount_type"):
                                        $roomPriceInfo->$colName = $discount_type;
                                        continue;
                                    elseif($colName == "discount_ref_id"):
                                        $roomPriceInfo->$colName = $ref_id;
                                        continue;
                                     endif;

                                    $roomPriceInfo->$colName = $model->$colName;

                                endforeach;

                                $discount = Room::locatedAt($room_id)->addRoom_priceInfo($roomPriceInfo);

                                if(empty($ref_id)):
                                    $ref_id = $discount->id;
                                    $update_model = RoomPriceInfo::where('id',$ref_id)->first();
                                    $refData = [];
                                    $refData["discount_ref_id"] = $ref_id;
                                    $update_model->fill($refData)->save();
                                endif;


                            }else{

                                if ($ref_id == "")
                                {
                                    $ref_id = $model->id;
                                }

                                $refData = [];
                                $refData["discount_ref_id"] = $ref_id;
                                $refData["discount"]  = 'j';
                                $refData["discount_price"] = implode("|", $req_data["discount_price"]);
                                $refData["discount_patroon"] = $req_data["days"];
                                $refData["discount_start"] = $req_data["start"];
                                $refData["discount_end"] = $req_data["till"];
                                $refData["discount_compare"] = $req_data["discount_compare"];
                                $refData["discount_type"] = $discount_type;
                                $model->fill($refData)->save();



                            }

                        }


                    }
                    $date = get_next_date($date);
                }
            endif;

        }

        $flash = flash($currRoom->name,"Discount dates has been added!", "success");
        return compact('flash');
    }


    /**
     * @param Application $app
     * @param $id
     * @param $room_id
     * @return array|null
     */



    public function getDiscountDates(Application $app, $id, $room_id)
    {
        $utility = new Utility($app);
        $app_day_patern = $utility::get_day_list();

        $matchThese = ['room_id' =>$room_id, 'discount' => 'j'];
        $model = RoomPriceInfo::select( 'discount_ref_id','discount_price', 'discount_patroon', 'discount_start', 'discount_end', 'discount_type', 'discount_compare' )->distinct()->where($matchThese)->orderBy('date')->get();

        $hotel = Hotel::where('user_id', '=', $id)->first();
        if(!$model):

            return null;

        else:

            $result = $model->all();

            $data = array();
            foreach($result as $row => $col):

                $start = "";
                $end  = "";
                $matchThese = ['discount_ref_id' =>$col->discount_ref_id, 'discount' => 'j'];

                $singleMsSetup = RoomPriceInfo::select('id','date')->where($matchThese)->orderBy('date')->get();
                $singleMsSetupD = $singleMsSetup->all();

                $totalRows = count($singleMsSetupD);

                $i = 0;


                foreach($singleMsSetupD as $singleRow => $singleCol):

                    $i++;

                    if ($i == 1)
                    {
                        $start = $singleCol->date;
                    }
                    if ($i == $totalRows)
                    {
                        $end = $singleCol->date;
                    }

                endforeach;

                if (date("Y-m-d") > $end)
                {
                    $disabled = true;
                }
                else
                {
                    $disabled = false;
                }


                $data[] = [
                    "id"                => $col->discount_ref_id,
                    "room_id"           => $room_id,
                    "hotel"             => $hotel->id,
                    "ref_id"            => $col->discount_ref_id,
                    "start"             => $start,
                    "end"               => $end,
                    "from"              => $col->discount_start,
                    "till"              => $col->discount_end,
                    "discount_price"    => explode("|", $col->discount_price),
                    "discount_type"     => $col->discount_type,
                    "Days"              => $app_day_patern[$col->discount_patroon],
                    "format_days"       => $col->discount_patroon,
                    "discount_compare"  => $col->discount_compare,
                    "uid"               => $id,
                ];


            endforeach;



        endif;


        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     *
     */
    public function getRooms(Application $app)
    {

        $room = new Room();


        $matchThese = ['user_id' => Auth::User()->id];
        $rooms = $room->where($matchThese)->get();

        //$data = $rooms->all();

        return compact('rooms');


    }
}
