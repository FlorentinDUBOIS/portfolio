<?php
    // ------------------------------------------------------------------------
    // MenuGroup object
    // ------------------------------------------------------------------------
    class MenuGroup {
        // ------------------------------------------------------------------------
        /**
            * constructor
            * @param int
            * @return none
        **/
        public function __construct( int $groupid ) {
            $this -> groupid = $groupid;
            $this -> menus   = [];
            $query = Database::query( TABLE_NAVBAR_MENU_TO_GROUP, ['menuid'], '`groupid` = '.$this -> groupid );

            foreach( $query as $value ) {
                $this -> menus[] = new Menu( $value['menuid'] );
            }
        }

        // ------------------------------------------------------------------------
        /**
            * destructor
            * @param void
            * @return none
        **/
        public function __destruct() {
            unset( $this -> groupid );
            foreach( $this -> menus as &$value ) {
                unset( $value );
            }

            unset( $this -> menus );
        }

        // ------------------------------------------------------------------------
        /**
            * function that return the menu in parameter
            * @param int
            * @return Menu
        **/
        public function &get( int $index ) : Menu {
            if( isset( $this -> menus[ $index] )) {
                return $this -> menus[ $index];
            }

            return null;
        }

        // ------------------------------------------------------------------------
        /**
            * function that return the number of menu
            * @param void
            * @return int
        **/
        public function number() : int {
            return count( $this -> menus );
        }

        private $groupid;
        private $menus;
    }
?>
