<?php
    // ------------------------------------------------------------------------
    // ButtonGroup object
    // ------------------------------------------------------------------------
    class ButtonGroup {
        // ------------------------------------------------------------------------
        /**
            * constructor
            * @param int
            * @return none
        **/
        public function __construct( int $groupid ) {
            $this -> groupid = $groupid;
            $query = Database::query( TABLE_NAVBAR_BTN_TO_GROUP, ['btnid'], '`groupid` = '.$this -> groupid );

            foreach( $query as $value ) {
                $buttons[] = new Button( $value['btnid'] );
            }
        }

        // ------------------------------------------------------------------------
        /**
            * destructor
            * @param void
            * @param none
        **/
        public function __destruct() {
            foreach( $this -> buttons as &$value ) {
                unset( $value );
            }

            unset( $this -> buttons );
            unset( $this -> groupid );
        }

        // ------------------------------------------------------------------------
        /**
            * function that give button in parameter
            * @param int
            * @return Button
        **/
        public function &get( int $index ) : Button {
            return $this -> buttons[ $index];
        }

        // ------------------------------------------------------------------------
        /**
            * function that return the number of button for the group
            * @param void
            * @return int
        **/
        public function number() : int {
            return count( $this -> buttons );
        }

        private $groupid;
        private $buttons;
    }
?>
