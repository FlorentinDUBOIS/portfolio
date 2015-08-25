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

        private $menuid;
        private $attrs;
        private $items;
    }
?>
