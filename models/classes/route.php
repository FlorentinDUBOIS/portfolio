<?php
    // ------------------------------------------------------------------------
    // Route object
    // ------------------------------------------------------------------------
    abstract class Route {
        // ------------------------------------------------------------------------
        /**
            * function that append a controller to an url
            * @param string
            * @param callable
            * @return void
        **/
        public static function on( string $url, callable $func ) {
            $url = str_replace( '/', '\/', $url );

            self::$routes[$url] = $func;
        }

        // ------------------------------------------------------------------------
        /**
            * function that launch the controller associate to the url
            * @param string
            * @return void
        **/
        public static function run( string $url ) {
            foreach( self::$routes as $key => $func ) {
                if( preg_match( '#^'.$key.'$#', $url )) {
                    return $func( array( 'url' => $url ));
                }
            }

            foreach( self::$routes as $key => $func ) {
                if( preg_match( '#:#', $key )) {
                    $urls  = explode( '/', $url );
                    $keys  = explode( '/', $key );
                    $error = false;

                    if( count( $urls ) != count( $keys )) {
                        continue;
                    }

                    $urlbuild   = '';
                    for( $i = 0;  $i < count( $urls ); ++$i ) {
                        if( preg_match( '#:#', $keys[$i] )) {
                            $urlbuild .= $keys[$i].'/';
                        } else $urlbuild .= $urls[$i].'/';
                    }

                    $urlbuild = substr( $urlbuild, 0, -1 );
                    $urlbuild = str_replace( '\\', '', $urlbuild );

                    if( !preg_match( '#^'.$key.'$#', $urlbuild )) {
                        continue;
                    }

                    $args       = array();
                    $args['url'] = $url;
                    for( $i = 0; $i < count( $urls ); ++$i ) {
                        if( preg_match( '#:#', $keys[$i] )) {
                            $args[ str_replace( array( ':', '\\' ), '', $keys[$i] )] = $urls[$i];
                        }
                    }

                    return $func( $args );
                }
            }

            if( !empty( self::$routes['404'] )) {
                $func = self::$routes['404'];

                return $func( array( 'url' => '404' ));
            }
        }

        // ------------------------------------------------------------------------
        /**
            * function that redirect to the given url
            * @see exit
            * @param string
            * @return void
        **/
        public static function redirect( string $url ) {
            header( 'Location: '.Document::rewrite( $url ));

            exit();
        }

        private static $routes   = array();
    }
?>
