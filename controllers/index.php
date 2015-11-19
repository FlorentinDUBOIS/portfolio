<?php
    Route::on( '/', [], function( array $args = null ) {
        $args['title'] = 'Florentin DUBOIS - Portfolio';

        echo View::make( 'index', $args, 'portfolio' );

        return true;
    });
?>
