<?php
    Task::on( 'login', [], function( array $args = null ) : bool {
        Auth::guest();

        return true;
    });

    Route::on( '/', ['login'], function( array $args = null ) : bool {
        View::make( 'root', $args, 'html' );
        
        return true;
    });
?>
