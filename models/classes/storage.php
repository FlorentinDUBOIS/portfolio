<?php
    // ------------------------------------------------------------------------
    // Storage object
    // ------------------------------------------------------------------------
    abstract class Storage {
        // ------------------------------------------------------------------------
        /**
            * function that init session
            * @param array
            * @return void
        **/
        public static function init( array $data = null ) {
            session_start();

            if( !empty( $data )) {
                self::store( $data );
            }
        }

        // ------------------------------------------------------------------------
        /**
            * function that store variable
            * @param array
            * @return void
        **/
        public static function store( array $data ) {
            foreach( $data as $name => $value ) {
                $_SESSION[$name] = $value;
            }
        }

        // ------------------------------------------------------------------------
        /**
            * function that return value
            * @param string
            * @return &mixed
        **/
        public static function &get( string $name ) {
            return $_SESSION[ $name];
        }

        // ------------------------------------------------------------------------
        /**
            * function that destroy session
            * @param void
            * @return void
        **/
        public static function destroy() {
            session_destroy();
        }
    }
?>
