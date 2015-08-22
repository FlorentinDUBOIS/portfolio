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
            * @return bool
        **/
        public static function on( string $url, array $depens, callable $func ) : bool {
            $url = str_replace( '/', '\/', $url );

            self::$routes[$url] = [
                'depens' => $depens,
                'func'   => $func
            ];

            return true;
        }

        // ------------------------------------------------------------------------
        /**
            * function that launch the controller associate to the url
            * @param string
            * @return bool
        **/
        public static function run( string $url ) : bool {
            foreach( self::$routes as $key => $route ) {
                if( preg_match( '#^'.$key.'$#', $url )) {
                    foreach( $route['depens'] as $depen ) {
                        Task::exec( $depen, ['url' => $url]);
                    }

                    return $route['func'](['url' => $url]);
                }
            }

            foreach( self::$routes as $key => $route ) {
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

                    $args        = [];
                    $args['url'] = $url;
                    for( $i = 0; $i < count( $urls ); ++$i ) {
                        if( preg_match( '#:#', $keys[$i] )) {
                            $args[ str_replace([':', '\\'], '', $keys[$i] )] = $urls[$i];
                        }
                    }

                    foreach( $route['depens'] as $depen ) {
                        Task::exec( $depen, $args );
                    }

                    return $route['func']( $args );
                }
            }

            if( !empty( self::$routes['404'] )) {
                $func = self::$routes['404']['func'];

                return $func(['url' => '404']);
            }
        }

        // ------------------------------------------------------------------------
        /**
            * function that redirect to the given url
            * @see exit
            * @param string
            * @return void
        **/
        public static function redirect( string $url, array $args = null ) {
            header( 'Location: '.Document::rewrite( $url, $args ));

            exit();
        }

        private static $routes = [];
    }
?>
