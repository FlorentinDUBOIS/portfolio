DROP TABLE IF EXISTS `log`.`connexion`;

CREATE TABLE IF NOT EXISTS `log`.`connexion` (
    `connexionid`   int( 12 )       NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `username`      varchar( 255 )  NOT NULL,
    `address`       varchar( 45 )   NOT NULL,
    `date`          datetime        NOT NULL,

    FOREIGN KEY( `username` )
        REFERENCES `auth`.`user` ( `username` ),
    KEY( `address` ),
    KEY( `date` )
) ENGINE = InnoDB, CHARSET = utf8 COLLATE = utf8_unicode_ci;
