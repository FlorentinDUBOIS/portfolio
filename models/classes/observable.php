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
            * @return void
        **/
        public function addObserver( Observer $observer ) {
            $this -> observers[] = $observer;
        }

        // ------------------------------------------------------------------------
        /**
            * function that notify to observer
            * @param void
            * @return void
        **/
        public function notify() {
            foreach( $this -> observers as $observer ) {
                $observer -> update();
            }
        }

        private $observers = array();
    }
?>
