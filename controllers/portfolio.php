<?php
    // ----------------------------------------------------------------------------
    // create the view
    Route::on( '/', [], function( array $args = null ) : bool {
        $args['title'] = 'Florentin DUBOIS - Portfolio';

        echo View::make( 'portfolio', $args, 'portfolio' );

        return true;
    });

    // ----------------------------------------------------------------------------
    // respond json
    Route::on( '/portfolio/languages', [], function( $args ) {
        Document::mime( Document::JSON );

        echo json_encode([[
            'header'  => 'C / C++',
            'image'   => Document::file( 'assets/images/cpp.jpg' ),
            'comment' => ''
        ],[
            'header'  => 'Qt',
            'image'   => Document::file( 'assets/images/qt.png' ),
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

    // ----------------------------------------------------------------------------
    // respond json
    Route::on( '/portfolio/webs', [], function( array $args = null ) : bool {
        Document::mime( Document::JSON );

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
            'header'  => 'Node JS',
            'image'   => Document::file( 'assets/images/nodejs.png' ),
            'comment' => ''
        ], [
            'header'  => 'Express JS',
            'image'   => Document::file( 'assets/images/express.png' ),
            'comment' => ''
        ], [
            'header'  => 'Jade',
            'image'   => Document::file( 'assets/images/jade.png' ),
            'comment' => ''
        ], [
            'header'  => 'Gulp',
            'image'   => Document::file( 'assets/images/gulp.png' ),
            'comment' => ''
        ], [
            'header'  => 'Apache',
            'image'   => Document::file( 'assets/images/apache.png' ),
            'comment' => ''
        ], [
            'header'  => 'PHP',
            'image'   => Document::file( 'assets/images/php.png' ),
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
            'header'  => 'Materialize',
            'image'   => Document::file( 'assets/images/materialize.png' ),
            'comment' => ''
        ], [
            'header'  => 'Foundation',
            'image'   => Document::file( 'assets/images/foundation.png' ),
            'comment' => ''
        ], [
            'header'  => 'Bootstrap',
            'image'   => Document::file( 'assets/images/bootstrap.png' ),
            'comment' => ''
        ]]);

        return true;
    });

    // ----------------------------------------------------------------------------
    // respond json
    Route::on( '/portfolio/OSs', [], function( array $args = null ) : bool {
        Document::mime( Document::JSON );

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

    // ----------------------------------------------------------------------------
    // respond json
    Route::on( '/portfolio/others', [], function( array $args = null ) : bool {
        Document::mime( Document::JSON );

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

    // ----------------------------------------------------------------------------
    // respond json
    Route::on( '/portfolio/experiences', [], function( array $args = null ) : bool {
        Document::mime( Document::JSON );

        echo json_encode([[
            'name'        => 'Alternance à aC3',
            'date'        => '1 octobre 2014 au 30 septembre 2015',
            'description' => ''
        ], [
            'name'        => 'Stage à aC3',
            'date'        => '16 juin 2014 au 29 âout 2015',
            'description' => ''
        ]]);

        return true;
    });

    // ----------------------------------------------------------------------------
    // respond json
    Route::on( '/portfolio/formations', [], function( array $args = null ) : bool {
        Document::mime( Document::JSON );

        echo json_encode([[
            'name'        => 'Diplôme d\'ingénieur',
            'date'        => 'Prévu courant 2017',
            'description' => ''
        ], [
            'name'        => 'Certificat de Qualification Paritaire de la Métallurgie',
            'date'        => 'Septembre 2015',
            'description' => ''
        ], [
            'name'        => 'Baccalauréat scientifique',
            'date'        => 'Juillet 2012',
            'description' => ''
        ]]);

        return true;
    });

    // ----------------------------------------------------------------------------
    // respond json
    Route::on( '/portfolio/projects', [], function( array $args = null ) : bool {
        Document::mime( Document::JSON );

        echo json_encode([[
            'name'        => 'Festigeek',
            'date'        => 'Prévu Décembre 2015',
            'description' => ''
        ], [
            'name'        => 'Portfolio',
            'date'        => 'Novembre 2015',
            'description' => ''
        ], [
            'name'        => 'ShellChooser',
            'date'        => 'Juillet 2015',
            'description' => ''
        ], [
            'name'        => 'Framework',
            'date'        => 'Âout 2014',
            'description' => ''
        ]]);

        return true;
    });

    // ----------------------------------------------------------------------------
    // envoie du message
    Route::on( '/portfolio/message', [], function( array $args = null ) : bool {
        Document::mime( Document::JSON );

        $send = mail( 'dubois.florentin@live.fr', 'Portfolio - Message de '.$args['firstname'].' '.$args['lastname'], $args['mail-content'] );

        echo json_encode([ 'send' => $send ]);

        return $send;
    });
?>
