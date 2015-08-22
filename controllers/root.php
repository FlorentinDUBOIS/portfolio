<?php
    Task::on( 'login', [], function( array $args = null ) : bool {
        Auth::guest();

        return true;
    });

    Route::on( '/', ['login'], function( array $args = null ) : bool {
        var_dump( $_SESSION );

        return true;
    });
?>
