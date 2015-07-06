<?php
    // ------------------------------------------------------------------------
    // Database object
    // ------------------------------------------------------------------------
    abstract class Database {
        // ------------------------------------------------------------------------
        /**
            * function that connect to one database
            * @throw Exception
            * @param array
            * @return void
        **/
        public static function connect( array $args ) {
            if( empty( $args['host'] )) throw new Exception( 'No host given' );
            if( empty( $args['name'] )) throw new Exception( 'No name given' );
            if( empty( $args['user'] )) throw new Exception( 'No user given' );
            if( empty( $args['pswd'] )) throw new Exception( 'No password given' );

            try {
                self::$databases[ $args['name']] = new PDO(
                    'mysql:dbname='.$args['name'].';host:'.$args['host'],
                    $args['user'],
                    $args['pswd']
                );
            } catch( PDOException $e ) {
                throw new Exception( $e -> getMessage());
            }
        }

        // ------------------------------------------------------------------------
        /**
            * function that return a boolean for know if you are connect to a database
            * @param string
            * @return boolean
        **/
        public static function isConnected( string $base ) {
            return isset( self::$databases[$base] );
        }

        // ------------------------------------------------------------------------
        /**
            * function that auto connect to database
            * @param void
            * @return void
        **/
        public static function autoConnect() {
            foreach( get_defined_constants() as $constant => $value ) {
                if( preg_match( '#^DB_[A-Z]+_AUTOCONNECT$#', $constant )) {
                    $base =  explode( '_', $constant );
                    $base = $base[1];

                    if(
                        defined(  'DB_'.$base.'_HOST' ) &&
                        defined(  'DB_'.$base.'_NAME' ) &&
                        defined(  'DB_'.$base.'_USER' ) &&
                        defined(  'DB_'.$base.'_PSWD' ) &&
                        constant( 'DB_'.$base.'_AUTOCONNECT' ) == true
                    ) {
                        Database::connect([
                            'host' => constant( 'DB_'.$base.'_HOST' ),
                            'name' => constant( 'DB_'.$base.'_NAME' ),
                            'user' => constant( 'DB_'.$base.'_USER' ),
                            'pswd' => constant( 'DB_'.$base.'_PSWD' )
                        ]);
                    }
                }
            }
        }

        // ------------------------------------------------------------------------
        /**
            * function that do a simple query
            * @throw Exception
            * @param string
            * @param array
            * @param [string]
            * @return array
        **/
        public static function query( string $table, array $columns, string $cond = null ) {
            if( empty( $table ))   throw new Exception( 'No table given' );
            if( empty( $columns )) throw new Exception( 'No columns given' );
            if( empty( $cond )) {
                $cond = '1';
            }

            $temp    = explode( '.', $table );
            if( count( $temp ) != 2 ) {
                throw new Exception( 'No base or table given' );
            }

            $base    = trim( $temp[0], TRIM_TABLE_NAME );
            $table   = trim( $temp[1], TRIM_TABLE_NAME );

            foreach( $columns as $key => $column ) {
                if( trim( $column, TRIM_TABLE_NAME ) != '*' ) {
                    $columns[ $key] = '`'.trim( $column, TRIM_TABLE_NAME ).'`';
                } else {
                    $columns[ $key] = trim( $column, TRIM_TABLE_NAME );
                }
            }

            $request = 'SELECT '.implode( ', ', $columns ).' FROM `'.$base.'`.`'.$table.'` WHERE '.trim( $cond );

            if( !isset( self::$databases[$base] )) {
                throw new Exception( 'No connection to database : '.$base );
            }

            $back = self::$databases[$base] -> query( $request );
            if( $back === FALSE ) {
                throw new Exception( 'Query failed on base '.$base.' in table '.$table.' with request: '.$request );
            }

            return self::format( $back );
        }

        // ------------------------------------------------------------------------
        /**
            * function that do a perform
            * @throw Exception
            * @param string
            * @param array
            * @param [string]
            * @param [string]
            * @return void
        **/
        public static function perform( string $table, array $columns, string $type = null, string $cond = null ) {
            if( empty( $table ))    throw new Exception( 'No table given' );
            if( empty( $columns ))  throw new Exception( 'No data given' );

            $temp    = explode( '.', $table );
            if( count( $temp ) != 2 ) {
                throw new Exception( 'No base or table given' );
            }

            $base    = trim( $temp[0], TRIM_TABLE_NAME );
            $table   = trim( $temp[1], TRIM_TABLE_NAME );

            switch( $type ) {
                case 'update': {
                    if( empty( $cond ) || trim( $cond ) == '1' ) {
                        throw new Exception( 'No condition given for update' );
                    }

                    $request = 'UPDATE `'.$base.'`.`'.$table.'` SET ';
                    $data    = [];
                    foreach( $columns as $name => $value ) {
                        $data[':'.trim( $name )] = $value;
                        $request .= trim( $name ).' = :'.trim( $name ).', ';
                    }

                    if( !isset( self::$databases[$base] )) {
                        throw new Exception( 'No connection to database : '.$base );
                    }

                    $request   = substr( $request, 0, -2 ).' WHERE '.trim( $cond );
                    $statement = self::$databases[$base] -> prepare( $request );
                    $statement = $statement -> execute( $data );

                    if( $statement === FALSE ) {
                        throw new Exception( 'Query failed on base '.$base.' in table '.$table.' with request: '.$request );
                    }

                    return;
                }

                case 'insert': case null: {
                    $request = 'INSERT INTO `'.$base.'`.`'.$table.'` ';
                    $data    = [];
                    $names   = '';
                    $values  = '';
                    foreach( $columns as $name => $value ) {
                        $data[':'.trim( $name )] = $value;
                        $names  .= trim( $name ).', ';
                        $values .= ':'.trim( $name ).', ';
                    }

                    if( !isset( self::$databases[$base] )) {
                        throw new Exception( 'No connection to database : '.$base );
                    }

                    $request .= '( '.substr( $names, 0, -2 ).' ) VALUES ( '.substr( $values, 0, -2 ).' )';
                    $statement = self::$databases[$base] -> prepare( $request );
                    $statement = $statement -> execute( $data );

                    if( $statement === FALSE ) {
                        throw new Exception( 'Query failed on base '.$base.' in table '.$table.' with request: '.$request );
                    }

                    return;
                }

                default: {
                    break;
                }
            }
        }

        // ------------------------------------------------------------------------
        /**
            * function that delete rows
            * @throw Exception
            * @param string
            * @param string
            * @return void
        **/
        public static function delete( string $table, string $cond ) {
            if( empty( $table ))   throw new Exception( 'No table given' );
            if( !isset( $cond ) || empty( trim( $cond )) || trim( $cond ) == '1' ) {
                throw new Exception( 'No condition given' );
            }

            $temp    = explode( '.', $table );
            if( count( $temp ) != 2 ) {
                throw new Exception( 'No base or table given' );
            }

            $base    = trim( $temp[0], TRIM_TABLE_NAME );
            $table   = trim( $temp[1], TRIM_TABLE_NAME );

            $request = 'DELETE FROM `'.$base.'`.`'.$table.'` WHERE '.trim( $cond );

            if( !isset( self::$databases[$base] )) {
                throw new Exception( 'No connection to database : '.$base );
            }

            if( !isset( self::$databases[$base] )) {
                throw new Exception( 'No connection to database : '.$base );
            }

            $back = self::$databases[$base] -> query( $request );
            if( $back === FALSE ) {
                throw new Exception( 'Query failed on base '.$base.' in table '.$table.' with request: '.$query );
            }
        }

        // ------------------------------------------------------------------------
        /**
            * function that format PDOStatement
            * @param PDOStatement
            * @return array
        **/
        public static function format( PDOStatement $statement ) {
            return $statement -> fetchAll( PDO::FETCH_ASSOC );
        }

        private static $databases = [];
    }
?>
