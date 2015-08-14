DROP TABLE IF EXISTS `docs`.`f-parameter`;
DROP TABLE IF EXISTS `docs`.`function`;

DROP TABLE IF EXISTS `docs`.`m-parameter`;
DROP TABLE IF EXISTS `docs`.`method`;
DROP TABLE IF EXISTS `docs`.`attribute`;
DROP TABLE IF EXISTS `docs`.`inheritance`;
DROP TABLE IF EXISTS `docs`.`object`;

DROP TABLE IF EXISTS `docs`.`scope`;
DROP TABLE IF EXISTS `docs`.`type`;

CREATE TABLE IF NOT EXISTS `docs`.`type` (
    `type`          varchar( 255 ) NOT NULL PRIMARY KEY
) ENGINE = InnoDB, DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `docs`.`scope` (
    `scope`         varchar( 255 ) NOT NULL PRIMARY KEY
) ENGINE = InnoDB, DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `docs`.`function` (
    `name`          varchar( 255 ) NOT NULL PRIMARY KEY,
    `description`   varchar( 4096 ) NOT NULL,
    `type`          varchar( 255 ) NOT NULL,

    FOREIGN KEY ( `type` )
        REFERENCES `docs`.`type` ( `type` )
            ON DELETE CASCADE
) ENGINE = InnoDB, DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `docs`.`f-parameter` (
    `name`          varchar( 255 ) NOT NULL,
    `function`      varchar( 255 ) NOT NULL,
    `type`          varchar( 255 ) NOT NULL,
    `reference`     tinyint( 1 ) NOT NULL,
    `optionnal`     tinyint( 1 ) NOT NULL,
    `position`      int( 12 ) NOT NULL,

    PRIMARY KEY ( `function`, `name` ),
    FOREIGN KEY ( `function` )
        REFERENCES `docs`.`function` ( `name` )
            ON DELETE CASCADE,
    FOREIGN KEY ( `type` )
        REFERENCES `docs`.`type` ( `type` )
            ON DELETE CASCADE
) ENGINE = InnoDB, DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `docs`.`object` (
    `name`          varchar( 255 ) NOT NULL PRIMARY KEY,
    `description`   varchar( 4096 ) NOT NULL,
    `abstract`      tinyint( 1 ) NOT NULL,

    FOREIGN KEY ( `name` )
        REFERENCES `docs`.`type` ( `type` )
            ON DELETE CASCADE
) ENGINE = InnoDB, DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `docs`.`inheritance` (
    `parent`        varchar( 255 ) NOT NULL,
    `children`      varchar( 255 ) NOT NULL,

    PRIMARY KEY ( `parent`, `children` ),
    FOREIGN KEY ( `parent` )
        REFERENCES `docs`.`object` ( `name` )
            ON DELETE CASCADE,
    FOREIGN KEY ( `children` )
        REFERENCES `docs`.`object` ( `name` )
            ON DELETE CASCADE
) ENGINE = InnoDB, DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `docs`.`attribute` (
    `name`          varchar( 255 ) NOT NULL,
    `object`        varchar( 255 ) NOT NULL,
    `type`          varchar( 255 ) NOT NULL,
    `scope`         varchar( 255 ) NOT NULL,
    `default`       varchar( 255 ) NOT NULL,
    `static`        tinyint( 1 ) NOT NULL,
    `const`         tinyint( 1 ) NOT NULL,

    PRIMARY KEY ( `object`, `name` ),
    FOREIGN KEY ( `object` )
        REFERENCES `docs`.`object` ( `name` )
            ON DELETE CASCADE,
    FOREIGN KEY ( `type` )
        REFERENCES `docs`.`type` ( `type` )
            ON DELETE CASCADE,
    FOREIGN KEY ( `scope` )
        REFERENCES `docs`.`scope` ( `scope` )
            ON DELETE CASCADE
) ENGINE = InnoDB, DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `docs`.`method` (
    `name`          varchar( 255 ) NOT NULL PRIMARY KEY,
    `description`   varchar( 4096 ) NOT NULL,
    `type`          varchar( 255 ) NOT NULL,
    `scope`         varchar( 255 ) NOT NULL,
    `static`        tinyint( 1 ) NOT NULL,

    FOREIGN KEY ( `type` )
        REFERENCES `docs`.`type` ( `type` )
            ON DELETE CASCADE,
    FOREIGN KEY ( `scope` )
        REFERENCES `docs`.`scope` ( `scope` )
            ON DELETE CASCADE
) ENGINE = InnoDB, DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `docs`.`m-parameter` (
    `name`          varchar( 255 ) NOT NULL,
    `method`        varchar( 255 ) NOT NULL,
    `type`          varchar( 255 ) NOT NULL,
    `reference`     tinyint( 1 ) NOT NULL,
    `position`      int( 12 ) NOT NULL,
    `optionnal`     tinyint( 1 ) NOT NULL,

    PRIMARY KEY ( `method`, `name` ),
    FOREIGN KEY ( `method` )
        REFERENCES `docs`.`method` ( `name` )
            ON DELETE CASCADE,
    FOREIGN KEY ( `type` )
        REFERENCES `docs`.`type` ( `type` )
            ON DELETE CASCADE
) ENGINE = InnoDB, DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;
