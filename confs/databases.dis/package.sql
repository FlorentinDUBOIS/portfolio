DROP TABLE IF EXISTS `package`.`package-to-group`;
DROP TABLE IF EXISTS `package`.`package`;

CREATE TABLE IF NOT EXISTS `package`.`package` (
    `packageid`     int( 12 )       NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `name`          varchar( 255 )  NOT NULL,
    `repertory`     varchar( 255 )  NOT NULL
) ENGINE = InnoDB, CHARSET = utf8 COLLATE = utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `package`.`package-to-group` (
    `packageid`     int( 12 )       NOT NULL,
    `groupid`       int( 12 )       NOT NULL,

    PRIMARY KEY( `packageid`, `groupid` ),
    FOREIGN KEY( `packageid` )
        REFERENCES `package`.`package` ( `packageid` )
            ON DELETE CASCADE,
    FOREIGN KEY( `groupid` )
        REFERENCES `auth`.`group` ( `groupid` )
            ON DELETE CASCADE
) ENGINE = InnoDB, CHARSET = utf8 COLLATE = utf8_unicode_ci;
