<?php
    // ------------------------------------------------------------------------
    // Server object
    // ------------------------------------------------------------------------
    abstract class Server {
        // ------------------------------------------------------------------------
        /**
            * function that allow to get env variables
            * @param string
            * @return mixed
        **/
        public static function env( string $name ) {
            return getenv( $name );
        }

        // ------------------------------------------------------------------------
        /**
            * function that load librairies
            * @param void
            * @return void
        **/
        public static function loadLibs() {
            $libs   = array();

            foreach( get_defined_constants() as $constant => $value ) {
                if( preg_match( '#^LIB_[A-Z_]+$#', $constant )) {
                    require_once( constant( $constant ));

                    $libs[] = array(
                        'name'      => constant( $constant ),
                        'realname'  => $constant
                    );
                }
            }

            Storage::store( array(
               'libs'   => $libs
            ));
        }
    }
?>
