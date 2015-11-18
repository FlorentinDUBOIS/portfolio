<?php
    // ------------------------------------------------------------------------
    // Document object
    // ------------------------------------------------------------------------
    abstract class Document {
        // ------------------------------------------------------------------------
        /**
            * function that change the mime of document
            * @param string
            * @return bool
        **/
        public static function mime( string $contentType ) : bool {
            header( 'Content-Type: '.$contentType );

            return true;
        }


        // ------------------------------------------------------------------------
        /**
            * function that return file with last modification date
            * @param string
            * @return string
        **/
        public static function file( string $file ) : string {
            if( file_exists( $file )) {
                $file .= '?v='.filemtime( $file );
            }

            return $file;
        }

        // ------------------------------------------------------------------------
        /**
            * function that rewrite link url
            * @param string
            * @param array
            * @return string
        **/
        public static function rewrite( string $url, array $args = null ) : string {
            if( !empty( $args )) {
                foreach( $args as $name => $arg ) {
                    $url = preg_replace( '#:'.$name.'#', trim( $arg ), $url );
                }
            }

            return '.?url='.trim( $url );
        }

        // ------------------------------------------------------------------------
        /**
            * function that load the language
            * @param string
            * @return bool
        **/
        public static function language( string $language, string $file = null ) : bool {
            if( file_exists( DIR_LANGUAGES.'/'.$language.'.php' )) {
                require( DIR_LANGUAGES.'/'.$language.'.php' );
            }

            if( file_exists( DIR_LANGUAGES.'/'.$language.'/packages.php' )) {
                require( DIR_LANGUAGES.'/'.$language.'/packages.php' );
            }

            if( file_exists( DIR_LANGUAGES.'/'.$language.'/'.$file.'.php' ) && !empty( $file )) {
                require( DIR_LANGUAGES.'/'.$language.'/'.$file.'.php' );
            }

            if( !empty( Storage::get( 'packages' ))) {
                foreach( Storage::get( 'packages' ) as $package ) {
                    if( file_exists( DIR_PACKAGES.'/'.$package['repertory'].'/languages/'.$language.'.php' )) {
                        require( DIR_PACKAGES.'/'.$package['repertory'].'/languages/'.$language.'.php' );
                    }

                    if( file_exists( DIR_PACKAGES.'/'.$package['repertory'].'/languages/'.$language.'/'.$file.'.php' ) && !empty( $file )) {
                        require( DIR_PACKAGES.'/'.$package['repertory'].'/languages/'.$language.'/'.$file.'.php' );
                    }
                }
            }

            return true;
        }

        // ------------------------------------------------------------------------
        /**
            * function that get all in the directory
            * @param string
            * @return bool
        **/
        public static function get( string $path ) : bool {
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

        const HTML    = 'text/html';
        const CSS     = 'text/css';
        const TEXT    = 'text/plain';
        const JS      = 'application/javascript';
        const JSON    = 'application/json';
        const LS      = 'text/livescript';
        const LSON    = 'text/lson';
        const COFFEE  = 'text/coffescript';
        const CSON    = 'text/cson';

        const CHARSET = DEFAULT_CHARSET;
    }
?>
