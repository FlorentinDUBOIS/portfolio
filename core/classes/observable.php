<?php
    // ------------------------------------------------------------------------
    // Observable object
    // ------------------------------------------------------------------------
    class Observable {
        // ------------------------------------------------------------------------
        /**
            * constructor
            * @param void
            * @return void
        **/
        public function __construct() {

        }

        // ------------------------------------------------------------------------
        /**
            * destructor
            * @param void
            * @return void
        **/
        public function __destruct() {
            unset( $this -> observer );
        }

        // ------------------------------------------------------------------------
        /**
            * function that add observer
            * @param Observer
            * @return bool
        **/
        public function addObserver( Observer $observer ) : bool {
            $this -> observers[] = $observer;

            return true;
        }

        // ------------------------------------------------------------------------
        /**
            * function that notify to observer
            * @param void
            * @return bool
        **/
        public function notify() : bool {
            foreach( $this -> observers as $observer ) {
                $observer -> update();
            }

            return true;
        }

        private $observers = [];
    }
?>
