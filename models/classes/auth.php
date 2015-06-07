<?php
    // ------------------------------------------------------------------------
    // Auth object
    // ------------------------------------------------------------------------
    abstract class Auth {
        // ------------------------------------------------------------------------
        /**
            * function that sign in a user
            * @throw Exception
            * @param array
            * @return boolean
        **/
        public static function signin( array $user ) {
            if( !isset( $user['username'] ))     throw new Exception( 'No username given' );
            if( !isset( $user['firstname'] ))    throw new Exception( 'No firstname given' );
            if( !isset( $user['lastname'] ))     throw new Exception( 'No lastname given' );
            if( !isset( $user['password'] ))     throw new Exception( 'No password given' );
            if( !isset( $user['email'] ))        throw new Exception( 'No email given' );

            $query = Database::query( TABLE_USER, array( 'username' ), '`username` = "'.$user['username'].'"' );
            if( !empty( $query )) {
                return false;
            }

            Database::perform( TABLE_USER, array(
                  'username'    => $user['username'],
                  'groupid'     => 3,
                  'firstname'   => $user['firstname'],
                  'lastname'    => $user['lastname'],
                  'password'    => self::encrypt( $user['password'] ),
                  'email'       => $user['email'],
                  'blacklist'   => 0
            ));

            return true;
        }

        // ------------------------------------------------------------------------
        /**
            * function that sign out an user
            * @param array
            * @return boolean
        **/
        public static function signout( string $username ) {
            $query = Database::query( TABLE_USER, array( 'username' ), '`username` = '.$username );
            if( empty( $query )) {
                return false;
            }

            Database::delete( TABLE_CONNEXION, '`username` = "'.$username.'"' );
            Database::delete( TABLE_USER, '`username` = "'.$username.'"' );

            return true;
        }

        // ------------------------------------------------------------------------
        /**
            * function that login user give in parameter
            * @throw Exception
            * @param array
            * @return boolean
        **/
        public static function login( array $user = null ) {
            if( !isset( $user )) {
                if( !empty( Storage::get( 'username' )) && !empty( Storage::get( 'password' ))) {

                    $user = array(
                        'username' => Storage::get( 'username' ),
                        'password' => Storage::get( 'password' )
                    );

                    return self::login( $user );
                }

                return self::guest();
            }

            if( !isset( $user['username'] )) throw new Exception( 'No username given' );
            if( !isset( $user['password'] )) throw new Exception( 'No password given' );

            $data = Database::query( TABLE_USER, array( '*' ), '`username` = "'.$user['username'].'"' );
            if( empty( $data )) {
                return false;
            }


            $group = Database::query( TABLE_GROUP, array( '*' ), '`groupid` = '.$data[0]['groupid'] );
            if( $group[0]['blacklist'] == 1 || $data[0]['blacklist'] == 1 ) {
                return false;
            }

            if( is_array( $user['password'] )) {
                if( self::encrypt( $user['password'] ) != $data[0]['password'] ) {
                    return false;
                }
            } else {
                if( $user['password'] != $data[0]['password'] ) {
                    return false;
                }
            }

            Storage::store( $data[0] );
            Storage::store( $group[0] );
            Database::perform( TABLE_CONNEXION, array(
                'username'  => $user['username'],
                'address'   => Client::ip(),
                'date'      => date( 'Y-m-d H:i:s' )
            ));

            Package::load((integer) $data[0]['groupid'] );

            return true;
        }

        // ------------------------------------------------------------------------
        /**
            * function that login you in guest
            * @param void
            * @return void
        **/
        public static function guest() {
            $user = Database::query( TABLE_USER, array( '*' ), '`username` = "guest"' );

            if( empty( $user )) {
                self::signin( array(
                    'username'  => 'guest',
                    'firstname' => '',
                    'lastname'  => '',
                    'password'  => array(),
                    'email'     => ''
                ));

                Database::perform( TABLE_USER, array( 'groupid' => 4 ), 'update', '`username` = "guest"' );
            }

            $user = array(
                'username' => 'guest',
                'password' => array()
            );

            return self::login( $user );
        }

        // ------------------------------------------------------------------------
        /**
            * function that logout the user
            * @param void
            * @return void
        **/
        public static function logout() {
            Storage::destroy();
        }

        // ------------------------------------------------------------------------
        /**
            * function that encrypt the array given use for password
            * @param array
            * @return string (512)
        **/
        public static function encrypt( array $data ) {
            return hash( 'sha512', implode( ':', $data ));
        }
    }
?>
