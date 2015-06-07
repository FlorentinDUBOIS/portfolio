<?php
    // ------------------------------------------------------------------------
    // View object
    // ------------------------------------------------------------------------
    abstract class View {
        // ------------------------------------------------------------------------
        /**
            * function that make the view
            * @echo
            * @param string
            * @param array
            * @param string
            * @param string
            * @return void
        **/
        public static function make( string $name, array $args, string $layout = null, string $package = null ) {
            $repertory = DIR_VIEWS;
            if( !empty( $package )) {
                $repertory = DIR_PACKAGES.'/'.$package.'/views';
            }

            if( file_exists( $repertory.'/'.$name.'.php' ) && empty( $layout )) {
                require( $repertory.'/'.$name.'.php' );
            }

            if( file_exists( $repertory.'/'.$name.'.php' ) && file_exists( DIR_LAYOUTS.'/'.$layout.'.php' ) && !empty( $layout )) {
                ob_start();
                    require( $repertory.'/'.$name.'.php' );

                $args['content'] = ob_get_clean();

                require( DIR_LAYOUTS.'/'.$layout.'.php' );
            }
        }

        // ------------------------------------------------------------------------
        /**
            * function that make a template
            * @echo
            * @param string
            * @param array
            * @param string
            * @return void
        **/
        public static function template( string $name, array $args ) {
            if( file_exists( DIR_TEMPLATES.'/'.$name.'.php' )) {
                ob_start();
                    require( DIR_TEMPLATES.'/'.$name.'.php' );

                return ob_get_clean();
            }
        }
    }
?>
