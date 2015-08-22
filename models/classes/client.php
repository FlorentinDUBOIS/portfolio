<?php
    // ------------------------------------------------------------------------
    // Client object
    // ------------------------------------------------------------------------
    abstract class Client {
        // ------------------------------------------------------------------------
        /**
            * function that return client ip
            * @param void
            * @return string
        **/
        public static function ip() : string {
            if( !empty( $_SERVER['HTTP_CLIENT_IP'] )) {
                return $_SERVER['HTTP_CLIENT_IP'];
            } elseif( !empty($_SERVER['HTTP_X_FORWARDED_FOR'] )) {
                return $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
                return $_SERVER['REMOTE_ADDR'];
            }
        }
    }
?>
