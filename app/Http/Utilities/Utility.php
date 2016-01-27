<?php
/**
 * Created by PhpStorm.
 * User: Awais Muhammad
 * Date: 12-12-2015
 * Time: 12:06 PM
 */

namespace App\Http\Utilities;
use Illuminate\Foundation\Application;

class Utility {

    protected static $lang;
    public function __construct(Application $app) {


       static::$lang = $app;

    }

    public static function get_day_list()
    {
        $list =[
            "en" => [
                "ma-di-wo-do-vr-za-zo"  => "All days",
                "ma-di-wo-do"           => "Weekdays (mo-tu-we-th)" ,
                "ma-di-wo-do-vr"        => "Working (mo-tu-we-th-fr)",
                "zo-ma-di-wo-do"        => "Weekdays (su-mo-tu-we-th)",
                "vr-za"                 => "Weekend (fr-sa)",
                "vr-za-zo"              =>"Weekend (fr-sa-su)"  ,
                "za-zo"                 => "Weekend (sa-su)" ,
                "ma"                    => "Monday"  ,
                "di"                    => "Tuesday" ,
                "wo"                    => "Wednesday" ,
                "do"                    =>"Thursday"  ,
                "vr"                    => "Friday" ,
                "za"                    => "Saturday",
                "zo"                    => "Sunday",

            ],
            "nl" => [
                "ma-di-wo-do-vr-za-zo"  => "All days",
                "ma-di-wo-do"           => "Weekdays (mo-tu-we-th)" ,
                "ma-di-wo-do-vr"        => "Working (mo-tu-we-th-fr)",
                "zo-ma-di-wo-do"        => "Weekdays (su-mo-tu-we-th)",
                "vr-za"                 => "Weekend (fr-sa)",
                "vr-za-zo"              =>"Weekend (fr-sa-su)"  ,
                "za-zo"                 => "Weekend (sa-su)" ,
                "ma"                    => "Monday"  ,
                "di"                    => "Tuesday" ,
                "wo"                    => "Wednesday" ,
                "do"                    =>"Thursday"  ,
                "vr"                    => "Friday" ,
                "za"                    => "Saturday",
                "zo"                    => "Sunday",

            ],
            "fr" => [
                "ma-di-wo-do-vr-za-zo"  => "All days",
                "ma-di-wo-do"           => "Weekdays (mo-tu-we-th)" ,
                "ma-di-wo-do-vr"        => "Working (mo-tu-we-th-fr)",
                "zo-ma-di-wo-do"        => "Weekdays (su-mo-tu-we-th)",
                "vr-za"                 => "Weekend (fr-sa)",
                "vr-za-zo"              =>"Weekend (fr-sa-su)"  ,
                "za-zo"                 => "Weekend (sa-su)" ,
                "ma"                    => "Monday"  ,
                "di"                    => "Tuesday" ,
                "wo"                    => "Wednesday" ,
                "do"                    =>"Thursday"  ,
                "vr"                    => "Friday" ,
                "za"                    => "Saturday",
                "zo"                    => "Sunday",

            ],
            "de" => [
                "ma-di-wo-do-vr-za-zo"  => "All days",
                "ma-di-wo-do"           => "Weekdays (mo-tu-we-th)" ,
                "ma-di-wo-do-vr"        => "Working (mo-tu-we-th-fr)",
                "zo-ma-di-wo-do"        => "Weekdays (su-mo-tu-we-th)",
                "vr-za"                 => "Weekend (fr-sa)",
                "vr-za-zo"              =>"Weekend (fr-sa-su)"  ,
                "za-zo"                 => "Weekend (sa-su)" ,
                "ma"                    => "Monday"  ,
                "di"                    => "Tuesday" ,
                "wo"                    => "Wednesday" ,
                "do"                    =>"Thursday"  ,
                "vr"                    => "Friday" ,
                "za"                    => "Saturday",
                "zo"                    => "Sunday",

            ]
        ];


        return $list[static::$lang->config->get("app.locale")];

    }
}