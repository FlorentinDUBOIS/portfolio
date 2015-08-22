<?php
    // ------------------------------------------------------------------------
    /**
        * function that return the default value if the primary parameter is not set or empty
        * @param [mixed]
        * @param mixed
        * @return mixed
    **/
    function ifsetor( $value = null, $default ) {
        if( isset( $value ) && !empty( $value )) {
            return $value;
        }

        return $default;
    }

    // ------------------------------------------------------------------------
    /**
        * function that return the default value if the primary parameter is not set or empty
        * @param array
        * @param mixed
        * @param mixed
        * @return mixed
    **/
    function ifindexsetor( array $value, $index,  $default ) {
        if( isset( $value[$index] ) && !empty( $value[$index] )) {
            return $value[$index];
        }

        return $default;
    }
?>
