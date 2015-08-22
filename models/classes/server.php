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
            * @return bool
        **/
        public static function loadLibs() : bool {
            $libs   = [];

            foreach( get_defined_constants() as $constant => $value ) {
                if( preg_match( '#^LIB_[A-Z_]+$#', $constant )) {
                    require_once( constant( $constant ));

                    $libs[] = [
                        'name'      => constant( $constant ),
                        'realname'  => $constant
                    ];
                }
            }

            Storage::store([
               'libs'   => $libs
            ]);

            return true;
        }
    }
?>
