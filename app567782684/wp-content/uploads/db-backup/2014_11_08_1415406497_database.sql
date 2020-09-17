

CREATE TABLE `u5yuikrjy5commentmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`meta_id`),
  KEY `comment_id` (`comment_id`),
  KEY `meta_key` (`meta_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




CREATE TABLE `u5yuikrjy5comments` (
  `comment_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_post_ID` bigint(20) unsigned NOT NULL DEFAULT '0',
  `comment_author` tinytext NOT NULL,
  `comment_author_email` varchar(100) NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) NOT NULL DEFAULT '',
  `comment_type` varchar(20) NOT NULL DEFAULT '',
  `comment_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`comment_ID`),
  KEY `comment_post_ID` (`comment_post_ID`),
  KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  KEY `comment_date_gmt` (`comment_date_gmt`),
  KEY `comment_parent` (`comment_parent`),
  KEY `comment_author_email` (`comment_author_email`(10))
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO u5yuikrjy5comments VALUES("","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5comments VALUES("","","","","","","","","","","","","","","");



CREATE TABLE `u5yuikrjy5links` (
  `link_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `link_url` varchar(255) NOT NULL DEFAULT '',
  `link_name` varchar(255) NOT NULL DEFAULT '',
  `link_image` varchar(255) NOT NULL DEFAULT '',
  `link_target` varchar(25) NOT NULL DEFAULT '',
  `link_description` varchar(255) NOT NULL DEFAULT '',
  `link_visible` varchar(20) NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) unsigned NOT NULL DEFAULT '1',
  `link_rating` int(11) NOT NULL DEFAULT '0',
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) NOT NULL DEFAULT '',
  `link_notes` mediumtext NOT NULL,
  `link_rss` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`link_id`),
  KEY `link_visible` (`link_visible`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




CREATE TABLE `u5yuikrjy5options` (
  `option_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `option_name` varchar(64) NOT NULL DEFAULT '',
  `option_value` longtext NOT NULL,
  `autoload` varchar(20) NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`option_id`),
  UNIQUE KEY `option_name` (`option_name`)
) ENGINE=InnoDB AUTO_INCREMENT=186 DEFAULT CHARSET=utf8;

INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");
INSERT INTO u5yuikrjy5options VALUES("","","","");



CREATE TABLE `u5yuikrjy5postmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`meta_id`),
  KEY `post_id` (`post_id`),
  KEY `meta_key` (`meta_key`)
) ENGINE=InnoDB AUTO_INCREMENT=420 DEFAULT CHARSET=utf8;

INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");
INSERT INTO u5yuikrjy5postmeta VALUES("","","","");



CREATE TABLE `u5yuikrjy5posts` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_author` bigint(20) unsigned NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext NOT NULL,
  `post_title` text NOT NULL,
  `post_excerpt` text NOT NULL,
  `post_status` varchar(20) NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) NOT NULL DEFAULT 'open',
  `post_password` varchar(20) NOT NULL DEFAULT '',
  `post_name` varchar(200) NOT NULL DEFAULT '',
  `to_ping` text NOT NULL,
  `pinged` text NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext NOT NULL,
  `post_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `guid` varchar(255) NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `post_name` (`post_name`),
  KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  KEY `post_parent` (`post_parent`),
  KEY `post_author` (`post_author`)
) ENGINE=InnoDB AUTO_INCREMENT=3097 DEFAULT CHARSET=utf8;

INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO u5yuikrjy5posts VALUES("","","","","","","","","","","","","","","","","","","","","","","");



CREATE TABLE `u5yuikrjy5term_relationships` (
  `object_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  KEY `term_taxonomy_id` (`term_taxonomy_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO u5yuikrjy5term_relationships VALUES("","","");
INSERT INTO u5yuikrjy5term_relationships VALUES("","","");
INSERT INTO u5yuikrjy5term_relationships VALUES("","","");
INSERT INTO u5yuikrjy5term_relationships VALUES("","","");
INSERT INTO u5yuikrjy5term_relationships VALUES("","","");
INSERT INTO u5yuikrjy5term_relationships VALUES("","","");
INSERT INTO u5yuikrjy5term_relationships VALUES("","","");
INSERT INTO u5yuikrjy5term_relationships VALUES("","","");
INSERT INTO u5yuikrjy5term_relationships VALUES("","","");
INSERT INTO u5yuikrjy5term_relationships VALUES("","","");
INSERT INTO u5yuikrjy5term_relationships VALUES("","","");
INSERT INTO u5yuikrjy5term_relationships VALUES("","","");
INSERT INTO u5yuikrjy5term_relationships VALUES("","","");
INSERT INTO u5yuikrjy5term_relationships VALUES("","","");
INSERT INTO u5yuikrjy5term_relationships VALUES("","","");
INSERT INTO u5yuikrjy5term_relationships VALUES("","","");
INSERT INTO u5yuikrjy5term_relationships VALUES("","","");
INSERT INTO u5yuikrjy5term_relationships VALUES("","","");
INSERT INTO u5yuikrjy5term_relationships VALUES("","","");
INSERT INTO u5yuikrjy5term_relationships VALUES("","","");
INSERT INTO u5yuikrjy5term_relationships VALUES("","","");
INSERT INTO u5yuikrjy5term_relationships VALUES("","","");
INSERT INTO u5yuikrjy5term_relationships VALUES("","","");
INSERT INTO u5yuikrjy5term_relationships VALUES("","","");
INSERT INTO u5yuikrjy5term_relationships VALUES("","","");
INSERT INTO u5yuikrjy5term_relationships VALUES("","","");
INSERT INTO u5yuikrjy5term_relationships VALUES("","","");
INSERT INTO u5yuikrjy5term_relationships VALUES("","","");
INSERT INTO u5yuikrjy5term_relationships VALUES("","","");
INSERT INTO u5yuikrjy5term_relationships VALUES("","","");
INSERT INTO u5yuikrjy5term_relationships VALUES("","","");
INSERT INTO u5yuikrjy5term_relationships VALUES("","","");
INSERT INTO u5yuikrjy5term_relationships VALUES("","","");
INSERT INTO u5yuikrjy5term_relationships VALUES("","","");
INSERT INTO u5yuikrjy5term_relationships VALUES("","","");



CREATE TABLE `u5yuikrjy5term_taxonomy` (
  `term_taxonomy_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) NOT NULL DEFAULT '',
  `description` longtext NOT NULL,
  `parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_taxonomy_id`),
  UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  KEY `taxonomy` (`taxonomy`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

INSERT INTO u5yuikrjy5term_taxonomy VALUES("","","","","","");
INSERT INTO u5yuikrjy5term_taxonomy VALUES("","","","","","");
INSERT INTO u5yuikrjy5term_taxonomy VALUES("","","","","","");
INSERT INTO u5yuikrjy5term_taxonomy VALUES("","","","","","");
INSERT INTO u5yuikrjy5term_taxonomy VALUES("","","","","","");
INSERT INTO u5yuikrjy5term_taxonomy VALUES("","","","","","");
INSERT INTO u5yuikrjy5term_taxonomy VALUES("","","","","","");
INSERT INTO u5yuikrjy5term_taxonomy VALUES("","","","","","");
INSERT INTO u5yuikrjy5term_taxonomy VALUES("","","","","","");
INSERT INTO u5yuikrjy5term_taxonomy VALUES("","","","","","");
INSERT INTO u5yuikrjy5term_taxonomy VALUES("","","","","","");
INSERT INTO u5yuikrjy5term_taxonomy VALUES("","","","","","");
INSERT INTO u5yuikrjy5term_taxonomy VALUES("","","","","","");
INSERT INTO u5yuikrjy5term_taxonomy VALUES("","","","","","");
INSERT INTO u5yuikrjy5term_taxonomy VALUES("","","","","","");
INSERT INTO u5yuikrjy5term_taxonomy VALUES("","","","","","");
INSERT INTO u5yuikrjy5term_taxonomy VALUES("","","","","","");



CREATE TABLE `u5yuikrjy5terms` (
  `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL DEFAULT '',
  `slug` varchar(200) NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

INSERT INTO u5yuikrjy5terms VALUES("","","","");
INSERT INTO u5yuikrjy5terms VALUES("","","","");
INSERT INTO u5yuikrjy5terms VALUES("","","","");
INSERT INTO u5yuikrjy5terms VALUES("","","","");
INSERT INTO u5yuikrjy5terms VALUES("","","","");
INSERT INTO u5yuikrjy5terms VALUES("","","","");
INSERT INTO u5yuikrjy5terms VALUES("","","","");
INSERT INTO u5yuikrjy5terms VALUES("","","","");
INSERT INTO u5yuikrjy5terms VALUES("","","","");
INSERT INTO u5yuikrjy5terms VALUES("","","","");
INSERT INTO u5yuikrjy5terms VALUES("","","","");
INSERT INTO u5yuikrjy5terms VALUES("","","","");
INSERT INTO u5yuikrjy5terms VALUES("","","","");
INSERT INTO u5yuikrjy5terms VALUES("","","","");
INSERT INTO u5yuikrjy5terms VALUES("","","","");
INSERT INTO u5yuikrjy5terms VALUES("","","","");
INSERT INTO u5yuikrjy5terms VALUES("","","","");



CREATE TABLE `u5yuikrjy5usermeta` (
  `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`umeta_id`),
  KEY `user_id` (`user_id`),
  KEY `meta_key` (`meta_key`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

INSERT INTO u5yuikrjy5usermeta VALUES("","","","");
INSERT INTO u5yuikrjy5usermeta VALUES("","","","");
INSERT INTO u5yuikrjy5usermeta VALUES("","","","");
INSERT INTO u5yuikrjy5usermeta VALUES("","","","");
INSERT INTO u5yuikrjy5usermeta VALUES("","","","");
INSERT INTO u5yuikrjy5usermeta VALUES("","","","");
INSERT INTO u5yuikrjy5usermeta VALUES("","","","");
INSERT INTO u5yuikrjy5usermeta VALUES("","","","");
INSERT INTO u5yuikrjy5usermeta VALUES("","","","");
INSERT INTO u5yuikrjy5usermeta VALUES("","","","");
INSERT INTO u5yuikrjy5usermeta VALUES("","","","");
INSERT INTO u5yuikrjy5usermeta VALUES("","","","");
INSERT INTO u5yuikrjy5usermeta VALUES("","","","");
INSERT INTO u5yuikrjy5usermeta VALUES("","","","");
INSERT INTO u5yuikrjy5usermeta VALUES("","","","");



CREATE TABLE `u5yuikrjy5users` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) NOT NULL DEFAULT '',
  `user_pass` varchar(64) NOT NULL DEFAULT '',
  `user_nicename` varchar(50) NOT NULL DEFAULT '',
  `user_email` varchar(100) NOT NULL DEFAULT '',
  `user_url` varchar(100) NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(60) NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`),
  KEY `user_login_key` (`user_login`),
  KEY `user_nicename` (`user_nicename`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO u5yuikrjy5users VALUES("","","","","","","","","","");

