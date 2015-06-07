DROP TABLE IF EXISTS `auth`.`user`;
DROP TABLE IF EXISTS `auth`.`group`;

CREATE TABLE IF NOT EXISTS `auth`.`group` (
    `groupid`       int( 12 )       NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `groupname`     varchar( 255 )  NOT NULL,
    `blacklist`     tinyint( 1 )    NOT NULL DEFAULT '0',

    KEY( `blacklist` )
) ENGINE = InnoDB, DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

INSERT INTO `auth`.`group` (`groupid`, `groupname`, `blacklist`) VALUES
(1, 'ROOT', 0),
(2, 'ADMIN', 0),
(3, 'USERS', 0),
(4, 'GUEST', 0),
(5, 'FORBIDDEN', 1);

CREATE TABLE IF NOT EXISTS `auth`.`user` (
    `username`      varchar( 255 )  NOT NULL PRIMARY KEY,
    `groupid`       int( 12 )       NOT NULL,
    `firstname`     varchar( 255 )  NOT NULL,
    `lastname`      varchar( 255 )  NOT NULL,
    `password`      varchar( 512 )  NOT NULL,
    `email`         varchar( 255 )  NOT NULL,
    `blacklist`     tinyint( 1 )    NOT NULL DEFAULT '0',

    FOREIGN KEY ( `groupid` )
        REFERENCES `auth`.`group` ( `groupid` ),
    KEY( `email` ),
    KEY( `blacklist` )
) ENGINE = InnoDB, DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;
