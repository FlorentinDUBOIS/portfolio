<?php
    // ------------------------------------------------------------------------
    // Controller object
    // ------------------------------------------------------------------------
    abstract class Controller {
        // ------------------------------------------------------------------------
        /**
            * function that launch the framework
            * @param void
            * @return void
        **/
        public static function render() {
            self::get( 'confs' );
            self::get( DIR_MODELS );
            self::get( DIR_CONTROLLERS );

            $url = '/';
            if( !empty( $_GET['url'] )) {
                $url = $_GET['url'];
            }

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
            Route::run( $url );
        }

        // ------------------------------------------------------------------------
        /**
            * function that get all in the directory
            * @param string
            * @return void
        **/
        private static function get( $path ) {
            $dir          = opendir( $path );
            $dirs         = array();
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
        }
    }
?>
