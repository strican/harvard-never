--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `users` (
  `uid` int(11) unsigned NOT NULL auto_increment,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY  (`uid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Add an admin field to table
--
ALTER TABLE `users` ADD `admin` BOOL NOT NULL DEFAULT '0'  


--
-- Set a user as admin
-- MAKE THIS AN ADMIN PRIVILEGE
--
UPDATE `neverhav_??`.`users` SET `admin` = '1' WHERE `users`.`uid` = ??;

--
-- Table structure for table `posts`
--
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `neverhav_test`.`posts` (
`message` TEXT NOT NULL ,
`sex` ENUM( 'M', 'F' ) NOT NULL ,
`class` VARCHAR( 255 ) NOT NULL ,
`time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
`yes` INT NOT NULL DEFAULT '0',
`no` INT NOT NULL DEFAULT '0',
`message_id` INT NOT NULL ,
PRIMARY KEY ( `message_id` )
) ENGINE = MYISAM ;

--
-- Correctly set message_id as auto-incrementing unique primary key
--
ALTER TABLE `posts` ADD UNIQUE (
`message_id`
)

ALTER TABLE `posts` CHANGE `message_id` `message_id` INT( 11 ) NOT NULL AUTO_INCREMENT 

ALTER TABLE `posts` DROP INDEX `message_id_2` 
