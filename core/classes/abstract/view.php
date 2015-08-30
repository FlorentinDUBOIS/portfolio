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
            * @return string
        **/
        public static function template( string $name, array $args ) : string {
            if( file_exists( DIR_TEMPLATES.'/'.$name.'.php' )) {
                ob_start();
                    require( DIR_TEMPLATES.'/'.$name.'.php' );

                return ob_get_clean();
            }
        }

        // ------------------------------------------------------------------------
        /**
            * function that return the script of the page
            * @param string
            * @return array
        **/
        public static function scripts( string $url ) : array {
            $scripts = [];

            if( file_exists( DIR_JS.'/load.json' )) {
                $temp = json_decode( file_get_contents( DIR_JS.'/load.json' ), true );

                if( !empty( $temp )) {
                    foreach( $temp as $key => $script ) {
                        $scripts[ DIR_JS.'/'.$key] = $script;
                    }
                }
            }

            if( file_exists( DIR_ASSETS_JS.'/load.json' ) && !empty( $url )) {
                $temp = json_decode( DIR_ASSETS_JS.'/load.json', true );

                if( !empty( $temp )) {
                    foreach( $temp as $key => $link ) {
                        if( $url == $key ) {
                            $scripts[ DIR_ASSETS_JS.'/'.$key] = $link;
                        }
                    }
                }
            }

            return $scripts;
        }

        // ------------------------------------------------------------------------
        /**
            * function that return the link of the page
            * @param string
            * @return array
        **/
        public static function links( string $url = null ) : array {
            $links = [];

            if( file_exists( DIR_CSS.'/load.json' )) {
                $temp = json_decode( file_get_contents( DIR_CSS.'/load.json' ), true );

                if( !empty( $temp )) {
                    foreach( $temp as $key => $link ) {
                        $links[ DIR_CSS.'/'.$key] = $link;
                    }
                }
            }

            if( file_exists( DIR_ASSETS_CSS.'/load.json' ) && !empty( $url )) {
                if( !empty( $temp )) {
                    foreach( $temp as $key => $link ) {
                        if( $url == $key ) {
                            $links[ DIR_ASSETS_CSS.'/'.$key] = $link;
                        }
                    }
                }
            }

            return $links;
        }
    }
?>
