<?php
    // ------------------------------------------------------------------------
    // Controller object
    // ------------------------------------------------------------------------
    abstract class Controller {
        // ------------------------------------------------------------------------
        /**
            * function that launch the framework
            * @param void
            * @return bool
        **/
        public static function render() : bool {
            self::get( 'confs' );
            self::get( DIR_MODELS );
            self::get( DIR_CONTROLLERS );

            // ------------------------------------------------------------------------
            // get arguments
            $args = array_merge( $_GET, $_POST );
            if( empty( $args['url'] )) {
                $args['url'] = '/';
            }

            try {
                // ------------------------------------------------------------------------
                // load external librairies
                Server::loadLibs();

                // ------------------------------------------------------------------------
                // allow storage for all applications
                Storage::init();

                // ------------------------------------------------------------------------
                // allow access to database
                Database::autoConnect();

                // ------------------------------------------------------------------------
                // authenfication
                Auth::login();

                // ------------------------------------------------------------------------
                // launch controller
                if( !empty( $args['task'] )) {
                    Task::exec( $args['task'], $args );
                } else {
                    Route::run( $args['url'], $args );
                }
            } catch( Exception $e ) {
                echo( $e -> getMessage());
            }

            return true;
        }

        // ------------------------------------------------------------------------
        /**
            * function that get all in the directory
            * @see Document::get
            * @param string
            * @return bool
        **/
        private static function get( $path ) : bool {
            $dir         = opendir( $path );
            $dirs        = [];
            while( $file = readdir( $dir )) {
                if( $file == '.' || $file == '..' ) {
                    continue;
                } elseif( preg_match( '#^[\w\d\s_\-]+\.(dis|old)\.[\w\d\s_\-]+$#', $file )) {
                    continue;
                } elseif( is_file( $path.'/'.$file )) {
                    require_once( $path.'/'.$file );
                } else $dirs[] = $path.'/'.$file;
            }

            closedir( $dir );
            foreach( $dirs as $dirpath ) {
                if( !preg_match( '#^[\w\d\s_\-]+\.(dis|old)$#', basename( $dirpath ))) {
                    self::get( $dirpath );
                }
            }

            return true;
        }
    }
?>
