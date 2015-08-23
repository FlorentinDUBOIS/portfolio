<?php
    Route::on( '/', [], function( array $args = null ) : bool {        
        View::make( 'root', $args, 'html' );

        return true;
    });
?>
