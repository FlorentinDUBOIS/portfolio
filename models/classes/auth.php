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
            * @return bool
        **/
        public static function signin( array $user ) : bool {
            if( !isset( $user['username'] ))     throw new Exception( 'No username given' );
            if( !isset( $user['firstname'] ))    throw new Exception( 'No firstname given' );
            if( !isset( $user['lastname'] ))     throw new Exception( 'No lastname given' );
            if( !isset( $user['password'] ))     throw new Exception( 'No password given' );
            if( !isset( $user['email'] ))        throw new Exception( 'No email given' );

            $query = Database::query( TABLE_USER, ['username'], '`username` = "'.$user['username'].'"' );
            if( !empty( $query )) {
                return false;
            }

            Database::perform( TABLE_USER, [
                  'username'    => $user['username'],
                  'groupid'     => 3,
                  'firstname'   => $user['firstname'],
                  'lastname'    => $user['lastname'],
                  'password'    => self::encrypt( $user['password'] ),
                  'email'       => $user['email'],
                  'blacklist'   => 0
            ]);

            return true;
        }

        // ------------------------------------------------------------------------
        /**
            * function that sign out an user
            * @param array
            * @return bool
        **/
        public static function signout( string $username ) : bool {
            $query = Database::query( TABLE_USER, ['username'], '`username` = '.$username );
            if( empty( $query )) {
                return false;
            }

            Database::delete( TABLE_USER, '`username` = "'.$username.'"' );

            return true;
        }

        // ------------------------------------------------------------------------
        /**
            * function that login user give in parameter
            * @throw Exception
            * @param array
            * @return bool
        **/
        public static function login( array $user = null ) : bool {
            if( !isset( $user )) {
                if( !empty( Storage::get( 'username' )) && !empty( Storage::get( 'password' ))) {
                    $user = [
                        'username' => Storage::get( 'username' ),
                        'password' => Storage::get( 'password' )
                    ];

                    return self::login( $user );
                }

                return self::guest();
            }

            if( !isset( $user['username'] )) throw new Exception( 'No username given' );
            if( !isset( $user['password'] )) throw new Exception( 'No password given' );

            $data = Database::query( TABLE_USER, ['*'], '`username` = "'.$user['username'].'"' );
            if( empty( $data )) {
                return false;
            }


            $group = Database::query( TABLE_GROUP, ['*'], '`groupid` = '.$data[0]['groupid'] );
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
            Database::perform( TABLE_CONNEXION, [
                'username'  => $user['username'],
                'address'   => Client::ip(),
                'date'      => date( 'Y-m-d H:i:s' )
            ]);

            Package::load( $data[0]['groupid'] );

            return true;
        }

        // ------------------------------------------------------------------------
        /**
            * function that login you in guest
            * @param void
            * @return bool
        **/
        public static function guest() : bool {
            $user = Database::query( TABLE_USER, ['*'], '`username` = "guest"' );

            if( empty( $user )) {
                self::signin([
                    'username'  => 'guest',
                    'firstname' => '',
                    'lastname'  => '',
                    'password'  => [],
                    'email'     => ''
                ]);

                Database::perform( TABLE_USER, ['groupid' => 4], 'update', '`username` = "guest"' );
            }

            $user = [
                'username' => 'guest',
                'password' => []
            ];

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
        public static function encrypt( array $data ) : string {
            return hash( 'sha512', implode( ':', $data ));
        }
    }
?>
