<?php
    // ------------------------------------------------------------------------
    // Architecture
    // ------------------------------------------------------------------------

    // ------------------------------------------------------------------------
    // Global
    // ------------------------------------------------------------------------
    define( 'DIR_CONFIGURATIONS', 'confs' );
    define( 'DIR_CONTROLLERS', 'controllers' );
    define( 'DIR_MODELS', 'models' );
        define( 'DIR_CLASSES', DIR_MODELS.'/classes' );

        define( 'DIR_HTML', DIR_MODELS.'/html.dis' );
            define( 'DIR_TEMPLATES', DIR_HTML.'/templates' );
            define( 'DIR_LAYOUTS', DIR_HTML.'/layouts' );

    define( 'DIR_PACKAGES', 'packages' );
    define( 'DIR_VIEWS', 'views' );
        define( 'DIR_LANGUAGES', DIR_VIEWS.'/languages' );
        define( 'DIR_RESSOURCES', DIR_VIEWS.'/ressources' );
            define( 'DIR_LESS', DIR_RESSOURCES.'/less' );
            define( 'DIR_CSS', DIR_RESSOURCES.'/css' );
            define( 'DIR_FONTS', DIR_RESSOURCES.'/fonts' );
            define( 'DIR_IMAGES', DIR_RESSOURCES.'/images' );
            define( 'DIR_JS', DIR_RESSOURCES.'/js' );
            define( 'DIR_LIVESCRIPT', DIR_RESSOURCES.'/ls' );
?>
