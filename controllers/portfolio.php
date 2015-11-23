<?php
    // ----------------------------------------------------------------------------
    // create the view
    Route::on( '/', [], function( array $args = null ) : bool {
        Document::mime( Document::HTML );

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
            'comment' => 'Ces deux langages sont ceux que je préfère avec le JavaScript, Ce sont aussi les premiers langages que j\'ai appris'
        ], [
            'header'  => 'Qt',
            'image'   => Document::file( 'assets/images/qt.png' ),
            'comment' => 'Une magnifique bibliothèque multi-platforme que j\'utilise pour mes projets ayant besoin d\'une IHM'
        ], [
            'header'  => 'SFML',
            'image'   => Document::file( 'assets/images/sfml.png' ),
            'comment' => 'Une autre bibliothèque multi-platforme que j\'utilise cette fois-ci avec la bibliothèque OpenGL'
        ], [
            'header'  => 'OpenGL',
            'image'   => Document::file( 'assets/images/opengl.png' ),
            'comment' => 'Une bibliothèque multi-platforme graphique qui me permet de faire plein de triangles ^^'
        ], [
            'header'  => 'Java',
            'image'   => Document::file( 'assets/images/java.jpg' ),
            'comment' => 'Langage sur lequel, j\'ai appris les design patterns notamment ceux du livre Gang of Four design patterns'
        ], [
            'header'  => 'Assembleur',
            'image'   => Document::file( 'assets/images/assembly.png' ),
            'comment' => 'J\'ai fait de l\'assembleur pour une carte ST7 à l\'ISEN'
        ], [
            'header'  => 'Python',
            'image'   => Document::file( 'assets/images/python.png' ),
            'comment' => 'Découvert en cours de phyique, pour modéliser les principes de la magnétostatique'
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
            'comment' => 'La base de n\'importe qu\'elle site web'
        ], [
            'header'  => 'CSS',
            'image'   => Document::file( 'assets/images/css3.png' ),
            'comment' => 'Sans le monde serai moin beau'
        ], [
            'header'  => 'SASS',
            'image'   => Document::file( 'assets/images/sass.png' ),
            'comment' => 'Langage de préprocessing vraiment très pratique et utile, personnellement je préfère son petit frère SCSS'
        ], [
            'header'  => 'LESS',
            'image'   => Document::file( 'assets/images/less.png' ),
            'comment' => 'Langage de préprocessing intérréssant concurrant de SASS'
        ], [
            'header'  => 'JavaScript',
            'image'   => Document::file( 'assets/images/javascript.png' ),
            'comment' => 'Un de mes langage préféré vraiment très pratique avec des concepts très intérréssant'
        ], [
            'header'  => 'CoffeeScript',
            'image'   => Document::file( 'assets/images/coffeescript.png' ),
            'comment' => 'Pour ce simplifier la vie, cependant ECMAScript 2015 comprends la plupart des apports de ce langage de préprocessing'
        ], [
            'header'  => 'Angular JS',
            'image'   => Document::file( 'assets/images/angularjs.png' ),
            'comment' => 'Un framework JavaScript qui me passionne'
        ], [
            'header'  => 'jQuery',
            'image'   => Document::file( 'assets/images/jquery.png' ),
            'comment' => 'Un autre framework JavaScript incontournable'
        ],  [
            'header'  => 'Node JS',
            'image'   => Document::file( 'assets/images/nodejs.png' ),
            'comment' => 'L\'environnement JavaScript le plus connu'
        ], [
            'header'  => 'Express JS',
            'image'   => Document::file( 'assets/images/express.png' ),
            'comment' => 'Un framework JavaScript pour Node'
        ], [
            'header'  => 'Jade',
            'image'   => Document::file( 'assets/images/jade.png' ),
            'comment' => 'Un langage de préprocessing html vraiment très pratique'
        ], [
            'header'  => 'Gulp',
            'image'   => Document::file( 'assets/images/gulp.png' ),
            'comment' => 'Gestionnaire de tâches géniale'
        ], [
            'header'  => 'Apache',
            'image'   => Document::file( 'assets/images/apache.png' ),
            'comment' => 'Un vieux de la vieille'
        ], [
            'header'  => 'PHP',
            'image'   => Document::file( 'assets/images/php.png' ),
            'comment' => 'Langage de préprocessing html très pratique, j\'affectionne beaucoup la version 7'
        ], [
            'header'  => 'Materialize',
            'image'   => Document::file( 'assets/images/materialize.png' ),
            'comment' => 'Framework css basée sur le style material design que je trouve magnifique'
        ], [
            'header'  => 'Foundation',
            'image'   => Document::file( 'assets/images/foundation.png' ),
            'comment' => 'Framework css géniale comme base à un nouveau projet'
        ], [
            'header'  => 'Bootstrap',
            'image'   => Document::file( 'assets/images/bootstrap.png' ),
            'comment' => 'Plus besoin de le présenter ^^'
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
            'comment' => 'Ma distribution Linux préféré elle m\'offre toujours les nouveautés dés que possible (rolling release) <br /><br />Elle suit aussi un de mes principes "KISS" (Keep It Simple, Stupid)'
        ], [
            'header'  => 'Ubuntu',
            'image'   => Document::file( 'assets/images/ubuntu.png' ),
            'comment' => 'Comment passé à côté la distribution Linux la plus connu'
        ], [
            'header'  => 'Windows',
            'image'   => Document::file( 'assets/images/windows.png' ),
            'comment' => 'Dure de ne pas connaître, le système d\'exploitation le plus utilisé sur les ordinateurs'
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
            'comment' => 'MongoDB est un projet NoSQL, auquelle je me suis intérréssé lorsque je découvrit l\'environnement Node.'
        ], [
            'header'  => 'MySQL',
            'image'   => Document::file( 'assets/images/mysql.png' ),
            'comment' => 'Principal Base de données utilisé, notamment pour sa gratuité'
        ], [
            'header'  => 'MariaDB',
            'image'   => Document::file( 'assets/images/mariadb.png' ),
            'comment' => 'Base de données sur laquel je fais la plupart de mes projets descendante de MySQL'
        ], [
            'header'  => 'Git',
            'image'   => Document::file( 'assets/images/git.png' ),
            'comment' => 'Gestionnaire de version bien utile pour retracer tout ce qui est fait, utilisé en adéquation avec <a href="http://github.com/FlorentinDUBOIS" >github</a>'
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
            'description' => 'Alternance durant l\'année scolaire 2014-2015 dans le cadre de la formation ISEN ainsi que l\'organisme "Union des Industries et Métiers de la Métallurgie" (abrégé UIMM) dans le but d\'obtenir le "Certificat de Qualification Paritaire de la Métallurgie" avec le titre "Chargé de projet informatiques et réseaux"'
        ], [
            'name'        => 'Stage à aC3',
            'date'        => '16 juin 2014 au 29 âout 2014',
            'description' => 'Stage dit "technicien" dans le cadre de la formation ISEN. <br /><br />Ce stage a durée tout l\'été 2014, dans l\'entreprise aC3 dans le service s\'occupant de la maintenance et le développement de nouvelles fonctionnalités du logiciel'
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
            'description' => 'Diplôme qui me sera délivré en octobre 2017, ce sera un diplôme d\'ingénieur généraliste mais je me suis spécialiser (choix de la majeur) dans le domaine de l\'informatique, choix qui suit une continuité via la formation Cycle informatiques et Réseaux (CIR) de l\'ISEN Brest qui à précédé'
        ], [
            'name'        => 'Certificat de Qualification Paritaire de la Métallurgie',
            'date'        => 'Septembre 2015',
            'description' => 'Certificat délivré par l\'organisme "Union des Industries et Métiers de la Métallurgie" (abrégé UIMM) en fin du Cycle Informatiques et Réseaux avec l\'intitulée "Chargé de projets informatiques et réseaux"'
        ], [
            'name'        => 'CISCO',
            'date'        => 'Septembre 2013 - âout 2014',
            'description' => 'J\'ai suivi les cours des modules 1 et 2, j\'ai aussi suivi différents cours sur les principaux concepts des modules 3 et 4'
        ], [
            'name'        => 'Baccalauréat scientifique',
            'date'        => 'Juillet 2012',
            'description' => 'Baccalauréat scientifique obtenue, avec l\'option science de l\'ingénieur et la spécialité mathématiques'
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
            'name'        => 'Framework PHP',
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
