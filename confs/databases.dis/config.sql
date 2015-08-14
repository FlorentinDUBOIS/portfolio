DROP TABLE IF EXISTS `config`.`navbar-btn-to-group`;
DROP TABLE IF EXISTS `config`.`navbar-btn`;

DROP TABLE IF EXISTS `config`.`navbar-menu-to-group`;
DROP TABLE IF EXISTS `config`.`item-to-menu`;
DROP TABLE IF EXISTS `config`.`navbar-item`;
DROP TABLE IF EXISTS `config`.`navbar-menu`;

CREATE TABLE IF NOT EXISTS `config`.`navbar-btn` (
    `btnid`       int( 12 )       NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `file`        varchar( 255 )  NOT NULL,
    `name`        varchar( 255 )  NOT NULL,
    `icon`        varchar( 255 )  NOT NULL,
    `link`        varchar( 255 )  NOT NULL,
    `side`        varchar( 30 )   NOT NULL,
    `active`      tinyint( 1 )    NOT NULL DEFAULT '0',

    KEY( `file` ),
    KEY( `side` ),
    KEY( `active` )
) ENGINE = InnoDB, CHARSET = utf8 COLLATE = utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `config`.`navbar-btn-to-group` (
    `btnid`       int( 12 )       NOT NULL,
    `groupid`     int( 12 )       NOT NULL,

    PRIMARY KEY( `btnid`, `groupid` ),
    FOREIGN KEY( `btnid` )
        REFERENCES `config`.`navbar-btn` ( `btnid` )
            ON DELETE CASCADE,
    FOREIGN KEY( `groupid` )
        REFERENCES `auth`.`group` ( `groupid` )
            ON DELETE CASCADE
) ENGINE = InnoDB, CHARSET = utf8 COLLATE = utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `config`.`navbar-menu` (
    `menuid`      int( 12 )       NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `file`        varchar( 255 )  NOT NULL,
    `name`        varchar( 255 )  NOT NULL,
    `icon`        varchar( 255 )  NOT NULL,
    `side`        varchar( 60 )   NOT NULL,

    KEY( `file` ),
    KEY( `side` )
) ENGINE = InnoDB, CHARSET = utf8 COLLATE = utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `config`.`navbar-item` (
    `itemid`      int( 12 )       NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `name`        varchar( 255 )  NOT NULL,
    `icon`        varchar( 255 )  NOT NULL,
    `link`        varchar( 255 )  NOT NULL,
    `active`      tinyint( 1 )    NOT NULL DEFAULT '0',

    KEY( `active` )
) ENGINE = InnoDB, CHARSET = utf8 COLLATE = utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `config`.`item-to-menu` (
    `menuid`      int( 12 )       NOT NULL,
    `itemid`      int( 12 )       NOT NULL,

    PRIMARY KEY( `menuid`, `itemid` ),
    FOREIGN KEY( `menuid` )
        REFERENCES `config`.`navbar-menu` ( `menuid` )
            ON DELETE CASCADE,
    FOREIGN KEY( `itemid` )
        REFERENCES `config`.`navbar-item` ( `itemid` )
            ON DELETE CASCADE
) ENGINE = InnoDB, CHARSET = utf8 COLLATE = utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `config`.`navbar-menu-to-group` (
    `menuid`      int( 12 )       NOT NULL,
    `groupid`     int( 12 )       NOT NULL,

    PRIMARY KEY( `menuid`, `groupid` ),
    FOREIGN KEY( `menuid` )
        REFERENCES `config`.`navbar-menu` ( `menuid` )
            ON DELETE CASCADE,
    FOREIGN KEY( `groupid` )
        REFERENCES `auth`.`group` ( `groupid` )
            ON DELETE CASCADE
) ENGINE = InnoDB, CHARSET = utf8 COLLATE = utf8_unicode_ci;
