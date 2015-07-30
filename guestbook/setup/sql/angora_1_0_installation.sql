# MySql Dump
# Host:localhost
# -------------------------------------------------
# Server version 5.0.51b-community

 #
 # Table structure for table '#__config'
 #

DROP TABLE IF EXISTS #__config;
CREATE TABLE `#__config` (
  `id` int(11) NOT NULL,
  `offline` tinyint(1) NOT NULL,
  `offlineMessage` varchar(255) NOT NULL,
  `guestbookLang` varchar(255) NOT NULL,
  `guestbookTheme` varchar(255) NOT NULL,
  `mobileTheme` varchar(255) NOT NULL,
  `pagesFormat` varchar(255) NOT NULL,
  `numPostsPerPage` varchar(255) NOT NULL,
  `adminLang` varchar(255) NOT NULL,
  `dateFormat` varchar(25) NOT NULL,
  `gbTitle` varchar(255) NOT NULL,
  `checkEmail` tinyint(1) NOT NULL,
  `maxCharField` int(11) NOT NULL,
  `maxCharMsg` int(11) NOT NULL,
  `floodTime` int(11) NOT NULL,
  `moderateMsg` tinyint(1) NOT NULL default '0',
  `checkCaptcha` tinyint(1) NOT NULL,
  `headTitle` varchar(255) NOT NULL,
  `resizeImg` tinyint(1) NOT NULL,
  `imgWidth` int(10) NOT NULL,
  `imgHeight` int(10) NOT NULL,
  `metaKeywords` varchar(255) NOT NULL,
  `metaDescription` varchar(255) NOT NULL,
  `backupFolder` varchar(255) NOT NULL,
  `smiliesFolder` varchar(255) NOT NULL,
  `langFolder` varchar(255) NOT NULL,
  `themesFolder` varchar(255) NOT NULL,
  `receiveEmailNotification` tinyint(1) NOT NULL,
  `email` varchar(50) NOT NULL,
  `autoCensor` tinyint(1) NOT NULL,
  `debug` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


# MySql Dump
# Host:localhost
# -------------------------------------------------
# Server version 5.0.51b-community

 #
 # Table structure for table '#__admin'
 #

DROP TABLE IF EXISTS #__admin;
CREATE TABLE `#__admin` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `privilege` int(5) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;


# MySql Dump
# Host:localhost
# -------------------------------------------------
# Server version 5.0.51b-community

 #
 # Table structure for table '#__posts'
 #

DROP TABLE IF EXISTS #__posts;
CREATE TABLE `#__posts` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `country` varchar(2) NOT NULL,
  `date` varchar(25) NOT NULL,
  `location` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `useragent` varchar(255) NOT NULL,
  `rating` varchar(5) NOT NULL,
  `publish` tinyint(1) NOT NULL default '1',
  `ip` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=104 DEFAULT CHARSET=latin1;


# MySql Dump
# Host:localhost
# -------------------------------------------------
# Server version 5.0.51b-community

 #
 # Table structure for table '#__ip'
 #

DROP TABLE IF EXISTS #__ip;
CREATE TABLE `#__ip` (
  `id` int(11) NOT NULL auto_increment,
  `ip` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `ip` (`ip`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;


# MySql Dump
# Host:localhost
# -------------------------------------------------
# Server version 5.0.51b-community

 #
 # Table structure for table '#__censored'
 #

DROP TABLE IF EXISTS #__censored;
CREATE TABLE `#__censored` (
  `id` int(11) NOT NULL auto_increment,
  `original` varchar(255) NOT NULL,
  `replacement` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `original` (`original`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;


# MySql Dump
# Host:localhost
# -------------------------------------------------
# Server version 5.0.51b-community

 #
 # Table structure for table '#__smilies'
 #

DROP TABLE IF EXISTS #__smilies;
CREATE TABLE `#__smilies` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(25) NOT NULL,
  `code` varchar(10) NOT NULL,
  `path` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;


# MySql Dump
# Host:localhost
# -------------------------------------------------
# Server version 5.0.51b-community

 #
 # Table structure for table '#__trash'
 #

DROP TABLE IF EXISTS #__trash;
CREATE TABLE `#__trash` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `country` varchar(2) NOT NULL,
  `date` varchar(25) NOT NULL,
  `location` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `useragent` varchar(255) NOT NULL,
  `rating` varchar(5) NOT NULL,
  `publish` tinyint(1) NOT NULL default '1',
  `ip` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;


# MySql Dump
# Host:localhost
# -------------------------------------------------
# Server version 5.0.51b-community

 #
 # Table structure for table '#__reply'
 #

DROP TABLE IF EXISTS #__reply;
CREATE TABLE `#__reply` (
  `id` int(11) NOT NULL auto_increment,
  `admin_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` varchar(25) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;


# MySql Dump
# Host:localhost
# -------------------------------------------------
# Server version 5.0.51b-community

 #
 # Table structure for table '#__backupLog'
 #

DROP TABLE IF EXISTS #__backupLog;
CREATE TABLE `#__backupLog` (
  `id` int(11) NOT NULL auto_increment,
  `date` varchar(255) NOT NULL,
  `operation` varchar(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
