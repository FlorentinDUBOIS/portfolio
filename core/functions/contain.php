<?php
    // ------------------------------------------------------------------------
    /**
        * function that return true if the value is in
        * @param string
        * @param string
        * @return bool
    **/
    function contain( string $haystack, string $needle ) : bool {
        return strpos( $haystack, $needle ) === false;
    }

    // ------------------------------------------------------------------------
    /**
        * function that return true if the value is in (issensible)
        * @param string
        * @param string
        * @return bool
    **/
    function icontain( string $haystack, string $needle ) : bool {
        return stripos( $haystack, $needle ) === false;
    }
?>
