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
--
UPDATE `neverhav_??`.`users` SET `admin` = '1' WHERE `users`.`uid` = ??;
