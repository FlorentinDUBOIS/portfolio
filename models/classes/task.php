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
        public static function exec( string $task, array $args = null ) {
            if( !isset( self::$tasks[ $task] )) {
                throw new Exception( 'Task doesn\'t exists : '.$task );
            }

            if( !empty( self::$depens[ $task] )) {
                foreach( self::$depens[ $task] as $depen ) {
                    self::exec( $depen );
                }
            }

            $func = self::$tasks[ $task];
            $func( $args );
        }

        // ------------------------------------------------------------------------
        /**
            * function that declare a task
            * @param string
            * @param array
            * @param callable
            * @return void
        **/
        public static function on( string $task, array $depens, callable $func ) {
            if( !empty( self::$tasks[ $task] )) {
                throw new Exception( 'Task already exists : '.$task );
            }

            self::$tasks[ $task]  = $func;
            self::$depens[ $task] = $depens;
        }

        private static $tasks  = array();
        private static $depens = array();
    }
?>
