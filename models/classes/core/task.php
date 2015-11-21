<?php
    // ------------------------------------------------------------------------
    // Task object
    // ------------------------------------------------------------------------
    abstract class Task {
        // ------------------------------------------------------------------------
        /**
            * function that execute a task
            * @param string
            * @param [array]
            * @return void
        **/
        public static function exec( string $task, array $args = null ) : bool {
            if( !isset( self::$tasks[ $task] )) {
                throw new Exception( 'Task doesn\'t exists : '.$task );
            }

            if( !empty( self::$depens[ $task] )) {
                foreach( self::$depens[ $task] as $depen ) {
                    if( icontain( $depen, 'before:' )) {
                        self::exec( explode( ':', $depen )[1], $args );
                    } elseif( !icontain( $depen, 'after:' )) {
                        self::exec( $depen, $args );
                    }
                }
            }

            $state = self::$tasks[ $task]( $args );
            if( !empty( self::$depens[ $task] )) {
                foreach( self::$depens[ $task] as $depen ) {
                    if( icontain( $depen, 'after:' )) {
                        Task::exec( explode( ':', $depen )[1], $args );
                    }
                }
            }

            return $state;
        }

        // ------------------------------------------------------------------------
        /**
            * function that declare a task
            * @param string
            * @param array
            * @param callable( array = null ) : bool
            * @return void
        **/
        public static function on( string $task, array $depens, callable $func ) : bool {
            if( !empty( self::$tasks[ $task] )) {
                throw new Exception( 'Task already exists : '.$task );
            }

            self::$tasks[ $task]  = $func;
            self::$depens[ $task] = $depens;

            return true;
        }

        private static $tasks  = [];
        private static $depens = [];
    }
?>
