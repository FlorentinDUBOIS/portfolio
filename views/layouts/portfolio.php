<!DOCTYPE html>
<html lang="<?= ifindexsetor( $args, 'lang', DEFAULT_LANGUAGE ) ?>" >
    <head>
        <!-- meta -->
        <meta charset="<?= Document::CHARSET ?>" lang="<?= ifindexsetor( $args, 'lang', DEFAULT_LANGUAGE ) ?>" >
        <meta http-equiv="pragma"        content="no-cache" />
        <meta http-equiv="cache-control" content="no-store, no-cache, must-revalidate" />
        <meta http-equiv="content-type"  content="<?= Document::HTML ?>; charset=<?= Document::CHARSET ?>" />
        <meta http-equiv="default-style" content="<?= Document::CSS  ?>; charset=<?= Document::CHARSET ?>" />

        <meta name="application-name" lang="<?= ifindexsetor( $args, 'lang', DEFAULT_LANGUAGE ) ?>" content="<?= APPLICATION_NAME ?>" />
        <meta name="author"           lang="<?= ifindexsetor( $args, 'lang', DEFAULT_LANGUAGE ) ?>" content="<?= APPLICATION_AUTHOR ?>" />
        <meta name="publisher"        lang="<?= ifindexsetor( $args, 'lang', DEFAULT_LANGUAGE ) ?>" content="<?= APPLICATION_PUBLISHER ?>" />
        <meta name="description"      lang="<?= ifindexsetor( $args, 'lang', DEFAULT_LANGUAGE ) ?>" content="" />
        <meta name="keywords"         lang="<?= ifindexsetor( $args, 'lang', DEFAULT_LANGUAGE ) ?>" content="" />
        <meta name="identifier-url"   lang="<?= ifindexsetor( $args, 'lang', DEFAULT_LANGUAGE ) ?>" content="http://<?= $_SERVER['SERVER_NAME'] ?>, https://<?= $_SERVER['SERVER_NAME'] ?>" />
        <meta name="copyright"        lang="<?= ifindexsetor( $args, 'lang', DEFAULT_LANGUAGE ) ?>" content="<?= APPLICATION_COPYRIGHT ?>" />
        <meta name="date"             lang="<?= ifindexsetor( $args, 'lang', DEFAULT_LANGUAGE ) ?>" content="<?= APPLICATION_DATE_CREATION ?>" />
        <meta name="robots"           lang="<?= ifindexsetor( $args, 'lang', DEFAULT_LANGUAGE ) ?>" content="<?= APPLICATION_ROBOT_INDEX ?>" />
        <meta name="revisit-after"    lang="<?= ifindexsetor( $args, 'lang', DEFAULT_LANGUAGE ) ?>" content="<?= APPLICATION_REVISIT_AFTER ?>" />

        <!-- title -->
        <title><?= ifindexsetor( $args, 'title', APPLICATION_NAME ) ?></title>

        <!-- link materialize -->
        <link rel="stylesheet" type="text/css" href="<?= Document::file( 'assets/extern/materialize/css/materialize.min.css' ); ?>" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
        <style type="text/css">
            h1, h2, h3, h4, h5, h6 {
                font-weight: 300;
                line-height: 110%;
                color: rgb( 238, 110, 115 );
            }

            h1 { font-size: 2.875rem; }
            h2 { font-size: 2.875rem; }
            h3 { font-size: 2.25rem; }
            h4 { font-size: 1.625rem; }
            h5 { font-size: 1rem; }
            h6 { font-size: 0.9rem; }
            .text-high { font-size: 1.3125rem; }

            .color-pink {
                color: rgb( 238, 110, 115 );
            }

            .card-content h1,
            .card-content h2,
            .card-content h3,
            .card-content h4,
            .card-content h5,
            .card-content h6 {
                margin: 0;
            }

            footer.page-footer {
                margin-top: 0;
            }

            ul#mobile-nav > li {
                width: 100%;
            }

            header {
                position: fixed;

                width: 100%;
                height: 100%;

                background-color: rgb( 238, 110, 115 );

                z-index: 100;
            }
        </style>

        <!-- script materialize -->
        <script type="application/javascript" src="<?= Document::file( 'assets/extern/jquery/2.1.4/jquery.js' ); ?>"></script>
        <script type="application/javascript" src="<?= Document::file( 'assets/extern/materialize/js/materialize.min.js' ); ?>" ></script>

        <!-- script angular -->
        <script type="application/javascript" src="<?= Document::file( 'assets/extern/angular/1.4.7/angular.min.js' ); ?>" ></script>
    </head>

    <body>
        <?= $args['content'] ?>
    </body>
</html>
