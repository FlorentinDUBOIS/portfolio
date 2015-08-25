<?php
    // ------------------------------------------------------------------------
    // Button object
    // ------------------------------------------------------------------------
    class Button {
        // ------------------------------------------------------------------------
        /**
            * constructor
            * @param int
            * @return none
        **/
        public function __construct( int $btnid ) {
            $this -> btnid = $btnid;
            $this -> attrs = Database::query( TABLE_NAVBAR_BTN, ['*'], '`btnid` = '.$this -> btnid )[0];
        }

        // ------------------------------------------------------------------------
        /**
            * destructor
            * @param void
            * @return none
        **/
        public function __destruct() {
            unset( $this -> btnid );
            unset( $this -> attrs );
        }

        // ------------------------------------------------------------------------
        /**
            * function that return a field value
            * @param string
            * @return mixed
        **/
        public function get( string $name ) {
            return $this -> attrs[$name];
        }

        // ------------------------------------------------------------------------
        /**
            * function that set a value
            * @param string
            * @param mixed
            * @return bool
        **/
        public function set( string $name, $value ) : bool {
            if( Database::perform( TABLE_NAVBAR_BTN, [$name => $value], 'update', '`btnid` = '.$this -> btnid )) {
                $this -> attrs[$name] = $value;

                return true;
            }

            return false;
        }

        private $btnid;
        private $attrs;
    }
?>
