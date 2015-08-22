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
                    self::exec( $depen );
                }
            }

            return self::$tasks[ $task]( $args );
        }

        // ------------------------------------------------------------------------
        /**
            * function that declare a task
            * @param string
            * @param array
            * @param callable
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

        private static $tasks  = array();
        private static $depens = array();
    }
?>
