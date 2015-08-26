<?php
    // ------------------------------------------------------------------------
    // Menu object
    // ------------------------------------------------------------------------
    class Menu {
        // ------------------------------------------------------------------------
        /**
            * constructor
            * @param int
            * @return none
        **/
        public function __construct( int $menuid ) {
            $this -> menuid = $menuid;
            $this -> attrs  = Database::query( TABLE_NAVBAR_MENU, ['*'], '`menuid` = '.$this -> menuid )[0];

            $query   = Database::query( TABLE_NAVBAR_ITEM_TO_MENU, ['itemid'], '`menuid` = '.$this -> menuid );
            foreach( $query as $value ) {
                $this -> items[] = new Item( $value['itemid'] );
            }
        }

        // ------------------------------------------------------------------------
        /**
            * destructor
            * @param void
            * @return none
        **/
        public function __destruct() {
            unset( $this -> menuid );
            unset( $this -> attrs );
            foreach( $this -> items as &$value ) {
                unset( $value );
            }

            unset( $this -> items );
        }

        // ------------------------------------------------------------------------
        /**
            * function that return the value of the attribute given in parameter
            * @param string
            * @return mixed
        **/
        public function get( string $name ) {
            return ifindexsetor( $this -> attrs, $name, null );
        }

        // ------------------------------------------------------------------------
        /**
             * function that set a value for an attribute
             * @param string
             * @param mixed
             * @return bool
        **/
        public function set( string $name, $value ) : bool {
            if( Database::perform( TABLE_NAVBAR_MENU, [$name => $value], '`menuid` = '.$this -> menuid )) {
                $this -> attrs[ $name] = $value;

                return true;
            }

            return false;
        }

        // ------------------------------------------------------------------------
        /**
            * function that return the number of item of the menu
            * @param void
            * @return int
        **/
        public function itemNumber() : int {
            return count( $this -> items );
        }

        // ------------------------------------------------------------------------
        /**
            * function that return the item that ask in parameter
            * @param int
            * @return Item
        **/
        public function &getItem( int $index ) : Item {
            if( isset( $this -> items[ $index] )) {
                return $this -> items[ $index];
            }

            return null;
        }

        private $menuid;
        private $attrs;
        private $items;
    }
?>
