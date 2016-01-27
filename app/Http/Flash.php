<?php
/**
 * Created by PhpStorm.
 * User: Awais Muhammad
 * Date: 15-11-2015
 * Time: 12:31 PM
 */

namespace App\Http;


class Flash {


    public function message($title, $message, $type)
    {
        /*session()->flash("flash_message",[
            'title' => $title,
            'message' => $message
        ]);*/


        return array( "title"=>$title, "message" => $message, "type" => $type);



    }

}