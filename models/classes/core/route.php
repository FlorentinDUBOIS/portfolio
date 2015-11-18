<?php
    // ------------------------------------------------------------------------
    // Route object
    // ------------------------------------------------------------------------
    abstract class Route {
        // ------------------------------------------------------------------------
        /**
            * function that append a controller to an url
            * @param string
            * @param callable( array = null ) : bool
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
            * @param array
            * @return bool
        **/
        public static function run( string $url, array $args ) : bool {
            // ------------------------------------------------------------------------
            // match with no parameter(s)
            foreach( self::$routes as $key => $route ) {
                if( preg_match( '#^'.$key.'$#', $url )) {
                    $args['url'] = $url;
                    foreach( $route['depens'] as $depen ) {
                        if( icontain( $depen, 'before:' )) {
                            Task::exec( explode( ':', $depen )[1], $args );
                        } elseif( !icontain( $depen, 'after:' )) {
                            Task::exec( $depen, $args );
                        }
                    }

                    $state = $route['func']( $args );
                    foreach( $route['depens'] as $depen ) {
                        if( icontain( $depen, 'after:' )) {
                            Task::exec( explode( ':', $depen )[1], $args );
                        }
                    }

                    return $state;
                }
            }

            // ------------------------------------------------------------------------
            // match route with parameter(s)
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
                        if( icontain( $depen, 'before:' )) {
                            Task::exec( explode( ':', $depen )[1], $args );
                        } elseif( !icontain( $depen, 'after:' )) {
                            Task::exec( $depen, $args );
                        }
                    }

                    $state = $route['func']( $args );
                    foreach( $route['depens'] as $depen ) {
                        if( icontain( $depen, 'after:' )) {
                            Task::exec( explode( ':', $depen )[1], $args );
                        }
                    }

                    return $state;
                }
            }

            // ------------------------------------------------------------------------
            // match no route
            if( !empty( self::$routes['404'] )) {
                $args['url'] = '404';
                $func        = self::$routes['404']['func'];

                foreach( $routes['404']['depens'] as $depen ) {
                    if( icontain( $depen, 'before:' )) {
                        Task::exec( explode( ':', $depen )[1], $args );
                    } elseif( !icontain( $depen, 'after:' )) {
                        Task::exec( $depen, $args );
                    }
                }

                $state = $routes['404']['func']( $args );
                foreach( $routes['404']['depens'] as $depen ) {
                    if( icontain( $depen, 'after:' )) {
                        Task::exec( explode( ':', $depen )[1], $args );
                    }
                }

                return $state;
            } else {
                echo 'Cannot GET or POST '.$url;
            }

            return false;
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
