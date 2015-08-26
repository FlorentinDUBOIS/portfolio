<?php
    // ------------------------------------------------------------------------
    // Architecture
    // ------------------------------------------------------------------------

    // ------------------------------------------------------------------------
    // Global
    // ------------------------------------------------------------------------
    define( 'DIR_CONFIGURATIONS', 'confs' );
    define( 'DIR_CONTROLLERS', 'controllers' );
    define( 'DIR_CORE', 'core' );
        define( 'DIR_CORE_CLASSES', DIR_CORE.'/classes' );
        define( 'DIR_CORE_FUNCTIONS', DIR_CORE.'/functions' );
        define( 'DIR_CORE_INTERFACES', DIR_CORE.'/interfaces' );

    define( 'DIR_MODELS', 'models' );
        define( 'DIR_CLASSES', DIR_MODELS.'/classes' );
        define( 'DIR_FUNCTIONS', DIR_MODELS.'/functions' );
        define( 'DIR_INTERFACES', DIR_MODELS.'/interfaces' );

        define( 'DIR_HTML', DIR_MODELS.'/html.dis' );
            define( 'DIR_TEMPLATES', DIR_HTML.'/templates' );
            define( 'DIR_LAYOUTS', DIR_HTML.'/layouts' );

    define( 'DIR_PACKAGES', 'packages' );
    define( 'DIR_ASSETS', 'assets' );
            define( 'DIR_LESS', DIR_ASSETS.'/less' );
            define( 'DIR_SCSS', DIR_ASSETS.'/scss');
            define( 'DIR_SASS', DIR_ASSETS.'/sass' );
            define( 'DIR_LIVESCRIPT', DIR_ASSETS.'/ls' );
            define( 'DIR_COFFEESCRIPT', DIR_ASSETS.'/coffee' );
            define( 'DIR_ASSETS_BUILD', DIR_ASSETS.'/build' );
                define( 'DIR_ASSETS_CSS', DIR_ASSETS_BUILD.'/css' );
                define( 'DIR_ASSETS_JS', DIR_ASSETS_BUILD.'/js' );

    define( 'DIR_VIEWS', 'views' );
        define( 'DIR_LANGUAGES', DIR_VIEWS.'/languages' );
        define( 'DIR_RESSOURCES', DIR_VIEWS.'/ressources' );
            define( 'DIR_CSS', DIR_RESSOURCES.'/css' );
            define( 'DIR_FONTS', DIR_RESSOURCES.'/fonts' );
            define( 'DIR_IMAGES', DIR_RESSOURCES.'/images' );
            define( 'DIR_JS', DIR_RESSOURCES.'/js' );
?>
