<?php
    // ------------------------------------------------------------------------
    // Storage object
    // ------------------------------------------------------------------------
    abstract class Storage {
        // ------------------------------------------------------------------------
        /**
            * function that init session
            * @param array
            * @return bool
        **/
        public static function init( array $data = null ) : bool {
            session_start();

            if( !empty( $data )) {
                self::store( $data );
            }

            return true;
        }

        // ------------------------------------------------------------------------
        /**
            * function that store variable
            * @param array
            * @return bool
        **/
        public static function store( array $data ) : bool {
            foreach( $data as $name => $value ) {
                $_SESSION[$name] = $value;
            }

            return true;
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
            * @return bool
        **/
        public static function destroy() : bool {
            session_destroy();

            return true;
        }
    }
?>
