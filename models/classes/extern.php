<?php
    // ------------------------------------------------------------------------
    // Extern object
    // ------------------------------------------------------------------------
    abstract class Extern {
        // ------------------------------------------------------------------------
        /**
            * function that do a curl
            * @param string
            * @return string
        **/
        public static function curl( string $url ) : string {
            $curl = curl_init( $url );

            curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
            curl_setopt( $curl, CURLOPT_BINARYTRANSFER, true );
            $content = curl_exec( $curl );

            curl_close( $curl );

            return $content;
        }
    }
?>
