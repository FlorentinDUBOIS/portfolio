<?php
    Route::on( '/', [], function( array $args = null ) {
        $args['title'] = 'Florentin DUBOIS - Portfolio';

        echo View::make( 'portfolio', $args, 'portfolio' );

        return true;
    });

    Route::on( '/portfolio/languages', [], function( $args ) {
        echo json_encode([[
            'header'  => 'C et C++',
            'image'   => Document::file( 'assets/images/cpp.jpg' ),
            'comment' => ''
        ], [
            'header'  => 'Java',
            'image'   => Document::file( 'assets/images/java.jpg' ),
            'comment' => ''
        ], [
            'header'  => 'Assembleur',
            'image'   => Document::file( 'assets/images/assembly.png' ),
            'comment' => ''
        ], [
            'header'  => 'Python',
            'image'   => Document::file( 'assets/images/python.png' ),
            'comment' => ''
        ]]);

        return true;
    });

    Route::on( '/portfolio/webs', [], function( $args ) {
        echo json_encode([[
            'header'  => 'HTML',
            'image'   => Document::file( 'assets/images/html5.png' ),
            'comment' => ''
        ], [
            'header'  => 'CSS',
            'image'   => Document::file( 'assets/images/css3.png' ),
            'comment' => ''
        ], [
            'header'  => 'SASS',
            'image'   => Document::file( 'assets/images/sass.png' ),
            'comment' => ''
        ], [
            'header'  => 'LESS',
            'image'   => Document::file( 'assets/images/less.png' ),
            'comment' => ''
        ], [
            'header'  => 'JavaScript',
            'image'   => Document::file( 'assets/images/javascript.png' ),
            'comment' => ''
        ], [
            'header'  => 'CoffeeScript',
            'image'   => Document::file( 'assets/images/coffeescript.png' ),
            'comment' => ''
        ], [
            'header'  => 'PHP',
            'image'   => Document::file( 'assets/images/php.png' ),
            'comment' => ''
        ], [
            'header'  => 'Node JS',
            'image'   => Document::file( 'assets/images/nodejs.png' ),
            'comment' => ''
        ], [
            'header'  => 'Angular JS',
            'image'   => Document::file( 'assets/images/angularjs.png' ),
            'comment' => ''
        ], [
            'header'  => 'jQuery',
            'image'   => Document::file( 'assets/images/jquery.png' ),
            'comment' => ''
        ], [
            'header'  => 'Bootstrap',
            'image'   => Document::file( 'assets/images/bootstrap.png' ),
            'comment' => ''
        ], [
            'header'  => 'Foundation',
            'image'   => Document::file( 'assets/images/foundation.png' ),
            'comment' => ''
        ], [
            'header'  => 'Materialize',
            'image'   => Document::file( 'assets/images/materialize.png' ),
            'comment' => ''
        ]]);

        return true;
    });

    Route::on( '/portfolio/OSs', [], function( $args ) {
        echo json_encode([[
            'header'  => 'Arch Linux',
            'image'   => Document::file( 'assets/images/arch.png' ),
            'comment' => ''
        ], [
            'header'  => 'Ubuntu',
            'image'   => Document::file( 'assets/images/ubuntu.png' ),
            'comment' => ''
        ], [
            'header'  => 'Windows',
            'image'   => Document::file( 'assets/images/windows.png' ),
            'comment' => ''
        ]]);

        return true;
    });

    Route::on( '/portfolio/others', [], function( $args ) {
        echo json_encode([[
            'header'  => 'MongoDB',
            'image'   => Document::file( 'assets/images/mongodb.png' ),
            'comment' => ''
        ], [
            'header'  => 'MySQL',
            'image'   => Document::file( 'assets/images/mysql.png' ),
            'comment' => ''
        ], [
            'header'  => 'Git',
            'image'   => Document::file( 'assets/images/git.png' ),
            'comment' => ''
        ]]);

        return true;
    });
?>
