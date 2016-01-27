<?php

        /**
         * @param $title
         * @param $message
         * @param $type
         * @return A flash message to pretty message library view.
         */
        function flash($title, $message, $type){

            $flash = app('App\Http\Flash');
            return $flash->message($title, $message, $type);

        }


        /**
         * @param $amount
         * @return bool
         */

        function is_price_format($amount)
        {
            # simple function

            # 23,-- => 23.00 => oke
            # 23,-  => 23.00 => oke
            # text  => text  => wrong

            $amount = str_replace(",", ".", $amount);
            $amount = str_replace("--", "00", $amount);
            $amount = str_replace("-", "00", $amount);

            return is_numeric($amount);
        }


        function get_next_date($date = '', $add = 1)
        {
            if ($date == "")
            {
                $date = date("Y-m-d");
            }

            return date("Y-m-d", strtotime($date) + (86400 * $add));
        }