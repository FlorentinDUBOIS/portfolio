<?php
    // ------------------------------------------------------------------------
    // Item object
    // ------------------------------------------------------------------------
    class Item {
        // ------------------------------------------------------------------------
        /**
            * constructor
            * @param int
            * @return none
        **/
        public function __construct( int $itemid ) {
            $this -> itemid = $itemid;
            $this -> attrs = Database::query( TABLE_NAVBAR_ITEM, ['*'], '`itemid` = '.$this -> itemid )[0];
        }

        // ------------------------------------------------------------------------
        /**
            * destructor
            * @param void
            * @return none
        **/
        public function __destruct() {
            unset( $this -> itemid );
            unset( $this -> attrs );
        }

        // ------------------------------------------------------------------------
        /**
            * function that return a field value
            * @param string
            * @return mixed
        **/
        public function get( string $name ) {
            return ifindexsetor( $this -> attrs, $name, null );
        }

        // ------------------------------------------------------------------------
        /**
            * function that set a value
            * @param string
            * @param mixed
            * @return bool
        **/
        public function set( string $name, $value ) : bool {
            if( Database::perform( TABLE_NAVBAR_ITEM, [$name => $value], 'update', '`itemid` = '.$this -> itemid )) {
                $this -> attrs[$name] = $value;

                return true;
            }

            return false;
        }

        private $itemid;
        private $attrs;
    }
?>
