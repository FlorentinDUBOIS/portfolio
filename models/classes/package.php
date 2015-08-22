<?php
    // ------------------------------------------------------------------------
    // Package object
    // ------------------------------------------------------------------------
    abstract class Package {
        // ------------------------------------------------------------------------
        /**
            * function that load packages and register them in storage
            * @param integer
            * @return void
        **/
        public static function load( int $group ) : bool {
            $packages = Database::query( TABLE_PACKAGE_TO_GROUP, ['packageid'], '`groupid` = '.$group );
            $list     = [];
            $store    = [];

            foreach( $packages as $package ) {
                $list[]  = $package['packageid'];
            }

            if( !empty( $list )) {
                $packages = Database::query( TABLE_PACKAGE, ['*'], '`packageid` IN ( '.implode( ', ', $list ).' )' );
                foreach( $packages as $package ) {
                    if( file_exists( DIR_PACKAGES.'/'.$package['repertory'].'/confs.php' )) {
                        require( DIR_PACKAGES.'/'.$package['repertory'].'/confs.php' );
                    }

                    if( file_exists( DIR_PACKAGES.'/'.$package['repertory'].'/models' )) {
                        Document::get( DIR_PACKAGES.'/'.$package['repertory'].'/models' );
                    }

                    if( file_exists( DIR_PACKAGES.'/'.$package['repertory'].'/controllers' )) {
                        Document::get( DIR_PACKAGES.'/'.$package['repertory'].'/controllers' );
                    }

                    $store[] = $package;
                }
            }

            Storage::store([
               'packages'   => $store
            ]);

            return true;
        }
    }
?>
