<!DOCTYPE html>
<html>
    <head>
        <meta charset="<?= Document::CHARSET ?>" >
        <meta http-equiv="content-type"  content="<?= Document::HTML ?>" >
        <meta http-equiv="default-style" content="<?= Document::CSS  ?>" >

        <title><?= ifindexsetor( $args, 'title', APPLICATION_NAME ) ?></title>
    </head>

    <body>
        <?= $args['content'] ?>
    </body>
</html>
