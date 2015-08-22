<?php
    define( 'TYPEHINT_PCRE' , '/^Argument (\d)+ passed to (?:(\w+)::)?(\w+)\(\) must be an instance of (\w+), (\w+) given/' );

    abstract class Typehint {
        public static function initializeHandler() {
            set_error_handler( 'Typehint::handleTypehint' );

            return TRUE;
        }

        private static function getTypehintedArgument( $ThBackTrace, $ThFunction, $ThArgIndex, &$ThArgValue ) {
            foreach( $ThBackTrace as $ThTrace ) {
                if( isset( $ThTrace['function'] ) && $ThTrace['function'] == $ThFunction ) {
                    $ThArgValue = $ThTrace['args'][$ThArgIndex - 1];

                    return TRUE;
                }
            }

            return FALSE;
        }

        public static function handleTypehint( $ErrLevel, $ErrMessage ) {
            if( $ErrLevel == E_RECOVERABLE_ERROR ) {
                if( preg_match( TYPEHINT_PCRE, $ErrMessage, $ErrMatches )) {
                    list( $ErrMatch, $ThArgIndex, $ThClass, $ThFunction, $ThHint, $ThType ) = $ErrMatches;

                    if( isset( self::$Typehints[$ThHint] )){
                        $ThBacktrace = debug_backtrace();
                        $ThArgValue  = NULL;

                        if( self::getTypehintedArgument( $ThBacktrace, $ThFunction, $ThArgIndex, $ThArgValue )) {
                            if( call_user_func( self::$Typehints[$ThHint], $ThArgValue )) {
                                return TRUE;
                            }
                        }
                    }
                }
            }

            return FALSE;
        }

        private static $Typehints = [
            'bool'   => 'is_bool',
            'integer'   => 'is_int',
            'float'     => 'is_float',
            'string'    => 'is_string',
            'resource'  => 'is_resource'
        ];
    }

    Typehint::initializeHandler();
?>
