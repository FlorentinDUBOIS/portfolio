<?php
    // ------------------------------------------------------------------------
    // Iterator interface
    // ------------------------------------------------------------------------
    interface Iterator {
        public function next();
        public function hasNext() : bool;
        public function &current();
    }
?>
