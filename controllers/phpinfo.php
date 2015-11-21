<?php
    Route::on( "/phpinfo", [], function( array $args = null ) : bool {
        return phpinfo();
    });
?>
