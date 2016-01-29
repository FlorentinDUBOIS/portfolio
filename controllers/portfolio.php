<?php
    // ----------------------------------------------------------------------------
    // create the view
    Route::on( '/', [], 'root' );
    Route::on( '/portfolio/:lang/(index\.\w{3,})?', [], 'root' );

    function root( array $args = null ) : bool {
        $args['lang']  = $args['lang'] ?? DEFAULT_LANGUAGE;

        Document::mime( Document::HTML );
        Document::language( $args['lang'], 'portfolio' );

        $args['title'] = PORTFOLIO_TITLE;

        echo View::make( 'portfolio', $args, 'portfolio' );

        return true;
    }

    // ----------------------------------------------------------------------------
    // respond json
    Route::on( '/portfolio/languages', [], 'languages' );
    Route::on( '/portfolio/:lang/languages', [], 'languages' );

    function languages( array $args = null ) : bool {
        $args['lang']  = $args['lang'] ?? DEFAULT_LANGUAGE;

        Document::mime( Document::JSON );
        Document::language( $args['lang'], 'portfolio' );

        echo json_encode([[
            'header'  => 'C / C++',
            'image'   => Document::file( 'assets/images/cpp.jpg' ),
            'comment' => C_CPP
        ], [
            'header'  => 'Qt',
            'image'   => Document::file( 'assets/images/qt.png' ),
            'comment' => QT
        ], [
            'header'  => 'SFML',
            'image'   => Document::file( 'assets/images/sfml.png' ),
            'comment' => SFML
        ], [
            'header'  => 'OpenGL',
            'image'   => Document::file( 'assets/images/opengl.png' ),
            'comment' => OPENGL
        ], [
            'header'  => 'Java',
            'image'   => Document::file( 'assets/images/java.jpg' ),
            'comment' => JAVA
        ], [
            'header'  => 'Assembleur',
            'image'   => Document::file( 'assets/images/assembly.png' ),
            'comment' => ASSEMBLY
        ], [
            'header'  => 'Python',
            'image'   => Document::file( 'assets/images/python.png' ),
            'comment' => PYTHON
        ]]);

        return true;
    }

    // ----------------------------------------------------------------------------
    // respond json
    Route::on( '/portfolio/webs', [], 'webs' );
    Route::on( '/portfolio/:lang/webs', [], 'webs' );

    function webs( array $args = null ) : bool {
        $args['lang']  = $args['lang'] ?? DEFAULT_LANGUAGE;

        Document::mime( Document::JSON );
        Document::language( $args['lang'], 'portfolio' );

        echo json_encode([[
            'header'  => 'HTML',
            'image'   => Document::file( 'assets/images/html5.png' ),
            'comment' => HTML
        ], [
            'header'  => 'CSS',
            'image'   => Document::file( 'assets/images/css3.png' ),
            'comment' => CSS
        ], [
            'header'  => 'SASS',
            'image'   => Document::file( 'assets/images/sass.png' ),
            'comment' => SASS
        ], [
            'header'  => 'LESS',
            'image'   => Document::file( 'assets/images/less.png' ),
            'comment' => LESS
        ], [
            'header'  => 'JavaScript',
            'image'   => Document::file( 'assets/images/javascript.png' ),
            'comment' => JAVASCRIPT
        ], [
            'header'  => 'CoffeeScript',
            'image'   => Document::file( 'assets/images/coffeescript.png' ),
            'comment' => COFFEESCRIPT
        ], [
            'header'  => 'Angular JS',
            'image'   => Document::file( 'assets/images/angularjs.png' ),
            'comment' => ANGULAR
        ], [
            'header'  => 'jQuery',
            'image'   => Document::file( 'assets/images/jquery.png' ),
            'comment' => JQUERY
        ],  [
            'header'  => 'Node JS',
            'image'   => Document::file( 'assets/images/nodejs.png' ),
            'comment' => NODE
        ], [
            'header'  => 'Express JS',
            'image'   => Document::file( 'assets/images/express.png' ),
            'comment' => EXPRESS
        ], [
            'header'  => 'Jade',
            'image'   => Document::file( 'assets/images/jade.png' ),
            'comment' => JADE
        ], [
            'header'  => 'Gulp',
            'image'   => Document::file( 'assets/images/gulp.png' ),
            'comment' => GULP
        ], [
            'header'  => 'Apache',
            'image'   => Document::file( 'assets/images/apache.png' ),
            'comment' => APACHE
        ], [
            'header'  => 'PHP',
            'image'   => Document::file( 'assets/images/php.png' ),
            'comment' => PHP
        ], [
            'header'  => 'Materialize',
            'image'   => Document::file( 'assets/images/materialize.png' ),
            'comment' => MATERIALIZE
        ], [
            'header'  => 'Foundation',
            'image'   => Document::file( 'assets/images/foundation.png' ),
            'comment' => FOUNDATION
        ], [
            'header'  => 'Bootstrap',
            'image'   => Document::file( 'assets/images/bootstrap.png' ),
            'comment' => BOOTSTRAP
        ]]);

        return true;
    }

    // ----------------------------------------------------------------------------
    // respond json
    Route::on( '/portfolio/OSs', [], 'OSs' );
    Route::on( '/portfolio/:lang/OSs', [], 'OSs' );

    function OSs( array $args = null ) : bool {
        $args['lang']  = $args['lang'] ?? DEFAULT_LANGUAGE;

        Document::mime( Document::JSON );
        Document::language( $args['lang'], 'portfolio' );

        echo json_encode([[
            'header'  => 'Arch Linux',
            'image'   => Document::file( 'assets/images/arch.png' ),
            'comment' => ARCHLINUX
        ], [
            'header'  => 'Debian',
            'image'   => Document::file( 'assets/images/debian.png' ),
            'comment' => DEBIAN
        ], [
            'header'  => 'Ubuntu',
            'image'   => Document::file( 'assets/images/ubuntu.png' ),
            'comment' => UBUNTU
        ], [
            'header'  => 'Windows',
            'image'   => Document::file( 'assets/images/windows.png' ),
            'comment' => WINDOWS
        ], [
            'header'  => 'Fedora',
            'image'   => Document::file( 'assets/images/fedora.png' ),
            'comment' => FEDORA
        ]]);

        return true;
    }

    // ----------------------------------------------------------------------------
    // respond json
    Route::on( '/portfolio/others', [], 'others' );
    Route::on( '/portfolio/:lang/others', [], 'others' );

    function others( array $args = null ) : bool {
        $args['lang']  = $args['lang'] ?? DEFAULT_LANGUAGE;

        Document::mime( Document::JSON );
        Document::language( $args['lang'], 'portfolio' );

        echo json_encode([[
            'header'  => 'MongoDB',
            'image'   => Document::file( 'assets/images/mongodb.png' ),
            'comment' => MONGODB
        ], [
            'header'  => 'MySQL',
            'image'   => Document::file( 'assets/images/mysql.png' ),
            'comment' => MYSQL
        ], [
            'header'  => 'MariaDB',
            'image'   => Document::file( 'assets/images/mariadb.png' ),
            'comment' => MARIADB
        ], [
            'header'  => 'Git',
            'image'   => Document::file( 'assets/images/git.png' ),
            'comment' => GIT
        ]]);

        return true;
    }

    // ----------------------------------------------------------------------------
    // respond json
    Route::on( '/portfolio/experiences', [], 'experiences' );
    Route::on( '/portfolio/:lang/experiences', [], 'experiences' );

    function experiences( array $args = null ) : bool {
        $args['lang']  = $args['lang'] ?? DEFAULT_LANGUAGE;

        Document::mime( Document::JSON );
        Document::language( $args['lang'], 'portfolio' );

        echo json_encode([[
            'name'        => NAME_SANDWICH,
            'date'        => DATE_SANDWICH,
            'description' => DESC_SANDWICH
        ], [
            'name'        => NAME_STAGE,
            'date'        => DATE_STAGE,
            'description' => DESC_STAGE
        ]]);

        return true;
    }

    // ----------------------------------------------------------------------------
    // respond json
    Route::on( '/portfolio/formations', [], 'formations' );
    Route::on( '/portfolio/:lang/formations', [], 'formations' );

    function formations( array $args = null ) : bool {
        $args['lang']  = $args['lang'] ?? DEFAULT_LANGUAGE;

        Document::mime( Document::JSON );
        Document::language( $args['lang'], 'portfolio' );

        echo json_encode([[
            'name'        => NAME_ENGINEER,
            'date'        => DATE_ENGINEER,
            'description' => DESC_ENGINEER
        ], [
            'name'        => NAME_CQPM,
            'date'        => DATE_CQPM,
            'description' => DESC_CQPM
        ], [
            'name'        => NAME_CISCO,
            'date'        => DATE_CISCO,
            'description' => DESC_CISCO
        ], [
            'name'        => NAME_CIR,
            'date'        => DATE_CIR,
            'description' => DESC_CIR
        ], [
            'name'        => NAME_BAC,
            'date'        => DATE_BAC,
            'description' => DESC_BAC
        ]]);

        return true;
    }

    // ----------------------------------------------------------------------------
    // respond json
    Route::on( '/portfolio/projects', [], 'projects' );
    Route::on( '/portfolio/:lang/projects', [], 'projects' );

    function projects( array $args = null ) : bool {
        $args['lang']  = $args['lang'] ?? DEFAULT_LANGUAGE;

        Document::mime( Document::JSON );
        Document::language( $args['lang'], 'portfolio' );

        echo json_encode([[
            'name'        => NAME_MONITEUR_OVH,
            'date'        => DATE_MONITEUR_OVH,
            'description' => DESC_MONITEUR_OVH
        ], [
            'name'        => NAME_FESTIGEEK,
            'date'        => DATE_FESTIGEEK,
            'description' => DESC_FESTIGEEK
        ], [
            'name'        => NAME_PORTFOLIO,
            'date'        => DATE_PORTFOLIO,
            'description' => DESC_PORTFOLIO
        ], [
            'name'        => NAME_SHELLCHOOSER,
            'date'        => DATE_SHELLCHOOSER,
            'description' => DESC_SHELLCHOOSER
        ], [
            'name'        => NAME_FRAMEWORK,
            'date'        => DATE_FRAMEWORK,
            'description' => DESC_FRAMEWORK
        ], [
            'name'        => NAME_FROST,
            'date'        => DATE_FROST,
            'description' => DESC_FROST
        ]]);

        return true;
    }

    // ----------------------------------------------------------------------------
    // envoie du message
    Route::on( '/portfolio/message', [], function( array $args = null ) : bool {
        Document::mime( Document::JSON );

        $url  = 'https://www.google.com/recaptcha/api/siteverify';
        $data = [
            'secret'   => EMAIL_PRIVATE_KEY,
            'response' => $args['g-recaptcha-response'],
            'remoteip' => Client::ip()
        ];

        $options = array(
            'https' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded;CHARSET=UTF-8\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data),
            ),
        );

        $context  = stream_context_create($options);
        $result = json_decode( file_get_contents($url, false, $context));

        var_dump( $result );

        if ( $result['success'] == false  ) {
            echo json_encode([ 'send' => false ]);

            return true;
        }

        $headers  = 'From: '.$args['firstname'].' '.$args['lastname'].' <'.$args['mail'].">\r\n";
        $headers .= 'Mime-Version: 1.0'."\r\n";
        $headers .= 'Content-type: text/plain; charset=utf-8'."\r\n";
        $headers .= 'Reply-To: webmaster@example.com'."\r\n";
        $headers .= 'X-Mailer: PHP/'.phpversion()."\r\n";
        $headers .= "\r\n";

        $send = mail( 'dubois.florentin@live.fr', 'Portfolio - Message de '.$args['firstname'].' '.$args['lastname'], $args['mail-content'], $headers );

        echo json_encode([ 'send' => $send ]);

        return true;
    });
?>
