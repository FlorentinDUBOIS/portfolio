<?php
    // ------------------------------------------------------------------------
    // auth database
    // ------------------------------------------------------------------------
    define( 'TABLE_GROUP', '`auth`.`group`' );
    define( 'TABLE_USER', '`auth`.`user`' );

    // ------------------------------------------------------------------------
    // config database
    // ------------------------------------------------------------------------
    define( 'TABLE_NAVBAR_BTN_TO_GROUP', '`config`.`navbar-btn-to-group`' );
    define( 'TABLE_NAVBAR_BTN', '`config`.`navbar-btn`' );

    define( 'TABLE_NAVBAR_MENU_TO_GROUP', '`config`.`navbar-menu-to-group`' );
    define( 'TABLE_ITEM_TO_MENU', '`config`.`item-to-menu`' );
    define( 'TABLE_NAVBAR_ITEM', '`config`.`navbar-item`' );
    define( 'TABLE_NAVBAR_MENU', '`config`.`navbar-menu`' );

    // ------------------------------------------------------------------------
    // package database
    // ------------------------------------------------------------------------
    define( 'TABLE_PACKAGE_TO_GROUP', '`package`.`package-to-group`' );
    define( 'TABLE_PACKAGE', '`package`.`package`' );

    // ------------------------------------------------------------------------
    // log database
    // ------------------------------------------------------------------------
    define( 'TABLE_CONNEXION', '`log`.`connexion`' );

    // ------------------------------------------------------------------------
    // docs database
    // ------------------------------------------------------------------------
    define( 'TABLE_FUNCTION_PARAMETER', '`docs`.`f-parameter`' );
    define( 'TABLE_FUNCTION', '`docs`.`function`' );

    define( 'TABLE_METHOD_PARAMETER', '`docs`.`m-parameter`' );
    define( 'TABLE_METHOD', '`docs`.`method`' );
    define( 'TABLE_ATTRIUBUTE', '`docs`.`attribute`' );
    define( 'TABLE_INHERITANCE', '`docs`.`inheritance`' );
    define( 'TABLE_OBJECT', '`docs`.`object`' );

    define( 'TABLE_SCOPE', '`docs`.`scope`' );
    define( 'TABLE_TYPE', '`docs`.`type`' );
?>
