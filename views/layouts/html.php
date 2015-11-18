<!DOCTYPE html>
<html lang="<?= ifindexsetor( $args, 'lang', DEFAULT_LANGUAGE ) ?>" >
    <head>
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

        <title><?= ifindexsetor( $args, 'title', APPLICATION_NAME ) ?></title>

        <?php
            $links = View::links( ifindexsetor( $args, 'url', '' ));
            foreach( $links as $path => $link ) {
                foreach( $link as $file ) {
                    echo '<link rel="stylesheet" type="'.Document::CSS.'" href="'.Document::file( $path.'/'.$file ).'" />'.PHP_EOL;
                }
            }

            $scripts = View::scripts( ifindexsetor( $args, 'url', '' ));
            foreach( $scripts as $path => $script ) {
                foreach( $script as $file ) {
                    echo '<script type="'.Document::JS.'" src="'.Document::file( $path.'/'.$file ).'" ></script>'.PHP_EOL;
                }
            }
        ?>
    </head>

    <body>
        <?= $args['content'] ?>
    </body>
</html>