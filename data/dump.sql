CREATE DATABASE  IF NOT EXISTS `elgg` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `elgg`;
-- MySQL dump 10.13  Distrib 5.6.13, for osx10.6 (i386)
--
-- Host: localhost    Database: elgg
-- ------------------------------------------------------
-- Server version	5.5.35-0ubuntu0.13.10.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `elgg_access_collection_membership`
--

DROP TABLE IF EXISTS `elgg_access_collection_membership`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `elgg_access_collection_membership` (
  `user_guid` int(11) NOT NULL,
  `access_collection_id` int(11) NOT NULL,
  PRIMARY KEY (`user_guid`,`access_collection_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `elgg_access_collection_membership`
--

LOCK TABLES `elgg_access_collection_membership` WRITE;
/*!40000 ALTER TABLE `elgg_access_collection_membership` DISABLE KEYS */;
/*!40000 ALTER TABLE `elgg_access_collection_membership` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `elgg_access_collections`
--

DROP TABLE IF EXISTS `elgg_access_collections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `elgg_access_collections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `owner_guid` bigint(20) unsigned NOT NULL,
  `site_guid` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `owner_guid` (`owner_guid`),
  KEY `site_guid` (`site_guid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `elgg_access_collections`
--

LOCK TABLES `elgg_access_collections` WRITE;
/*!40000 ALTER TABLE `elgg_access_collections` DISABLE KEYS */;
/*!40000 ALTER TABLE `elgg_access_collections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `elgg_annotations`
--

DROP TABLE IF EXISTS `elgg_annotations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `elgg_annotations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entity_guid` bigint(20) unsigned NOT NULL,
  `name_id` int(11) NOT NULL,
  `value_id` int(11) NOT NULL,
  `value_type` enum('integer','text') NOT NULL,
  `owner_guid` bigint(20) unsigned NOT NULL,
  `access_id` int(11) NOT NULL,
  `time_created` int(11) NOT NULL,
  `enabled` enum('yes','no') NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`id`),
  KEY `entity_guid` (`entity_guid`),
  KEY `name_id` (`name_id`),
  KEY `value_id` (`value_id`),
  KEY `owner_guid` (`owner_guid`),
  KEY `access_id` (`access_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `elgg_annotations`
--

LOCK TABLES `elgg_annotations` WRITE;
/*!40000 ALTER TABLE `elgg_annotations` DISABLE KEYS */;
INSERT INTO `elgg_annotations` VALUES (1,48,21,20,'text',40,-2,1393326627,'yes');
/*!40000 ALTER TABLE `elgg_annotations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `elgg_api_users`
--

DROP TABLE IF EXISTS `elgg_api_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `elgg_api_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_guid` bigint(20) unsigned DEFAULT NULL,
  `api_key` varchar(40) DEFAULT NULL,
  `secret` varchar(40) NOT NULL,
  `active` int(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `api_key` (`api_key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `elgg_api_users`
--

LOCK TABLES `elgg_api_users` WRITE;
/*!40000 ALTER TABLE `elgg_api_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `elgg_api_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `elgg_config`
--

DROP TABLE IF EXISTS `elgg_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `elgg_config` (
  `name` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `site_guid` int(11) NOT NULL,
  PRIMARY KEY (`name`,`site_guid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `elgg_config`
--

LOCK TABLES `elgg_config` WRITE;
/*!40000 ALTER TABLE `elgg_config` DISABLE KEYS */;
INSERT INTO `elgg_config` VALUES ('view','s:7:\"default\";',1),('language','s:2:\"en\";',1),('default_access','s:1:\"0\";',1),('allow_registration','b:0;',1),('walled_garden','b:0;',1),('allow_user_default_access','i:0;',1);
/*!40000 ALTER TABLE `elgg_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `elgg_datalists`
--

DROP TABLE IF EXISTS `elgg_datalists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `elgg_datalists` (
  `name` varchar(255) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `elgg_datalists`
--

LOCK TABLES `elgg_datalists` WRITE;
/*!40000 ALTER TABLE `elgg_datalists` DISABLE KEYS */;
INSERT INTO `elgg_datalists` VALUES ('filestore_run_once','1393325540'),('plugin_run_once','1393325540'),('elgg_widget_run_once','1393325540'),('installed','1393325706'),('path','/projects/cayugasoft/elgg/elgg/'),('dataroot','/projects/cayugasoft/elgg/elgg_uploads/'),('default_site','1'),('version','2014110100'),('simplecache_enabled','1'),('system_cache_enabled','1'),('processed_upgrades','a:44:{i:0;s:14:\"2008100701.php\";i:1;s:14:\"2008101303.php\";i:2;s:14:\"2009022701.php\";i:3;s:14:\"2009041701.php\";i:4;s:14:\"2009070101.php\";i:5;s:14:\"2009102801.php\";i:6;s:14:\"2010010501.php\";i:7;s:14:\"2010033101.php\";i:8;s:14:\"2010040201.php\";i:9;s:14:\"2010052601.php\";i:10;s:14:\"2010060101.php\";i:11;s:14:\"2010060401.php\";i:12;s:14:\"2010061501.php\";i:13;s:14:\"2010062301.php\";i:14;s:14:\"2010062302.php\";i:15;s:14:\"2010070301.php\";i:16;s:14:\"2010071001.php\";i:17;s:14:\"2010071002.php\";i:18;s:14:\"2010111501.php\";i:19;s:14:\"2010121601.php\";i:20;s:14:\"2010121602.php\";i:21;s:14:\"2010121701.php\";i:22;s:14:\"2010123101.php\";i:23;s:14:\"2011010101.php\";i:24;s:61:\"2011021800-1.8_svn-goodbye_walled_garden-083121a656d06894.php\";i:25;s:61:\"2011022000-1.8_svn-custom_profile_fields-390ac967b0bb5665.php\";i:26;s:60:\"2011030700-1.8_svn-blog_status_metadata-4645225d7b440876.php\";i:27;s:51:\"2011031300-1.8_svn-twitter_api-12b832a5a7a3e1bd.php\";i:28;s:57:\"2011031600-1.8_svn-datalist_grows_up-0b8aec5a55cc1e1c.php\";i:29;s:61:\"2011032000-1.8_svn-widgets_arent_plugins-61836261fa280a5c.php\";i:30;s:59:\"2011032200-1.8_svn-admins_like_widgets-7f19d2783c1680d3.php\";i:31;s:14:\"2011052801.php\";i:32;s:60:\"2011061200-1.8b1-sites_need_a_site_guid-6d9dcbf46c0826cc.php\";i:33;s:62:\"2011092500-1.8.0.1-forum_reply_river_view-5758ce8d86ac56ce.php\";i:34;s:54:\"2011123100-1.8.2-fix_friend_river-b17e7ff8345c2269.php\";i:35;s:53:\"2011123101-1.8.2-fix_blog_status-b14c2a0e7b9e7d55.php\";i:36;s:50:\"2012012000-1.8.3-ip_in_syslog-87fe0f068cf62428.php\";i:37;s:50:\"2012012100-1.8.3-system_cache-93100e7d55a24a11.php\";i:38;s:59:\"2012041800-1.8.3-dont_filter_passwords-c0ca4a18b38ae2bc.php\";i:39;s:58:\"2012041801-1.8.3-multiple_user_tokens-852225f7fd89f6c5.php\";i:40;s:59:\"2013030600-1.8.13-update_user_location-8999eb8bf1bdd9a3.php\";i:41;s:62:\"2013051700-1.8.15-add_missing_group_index-52a63a3a3ffaced2.php\";i:42;s:53:\"2013052900-1.8.15-ipv6_in_syslog-f5c2cc0196e9e731.php\";i:43;s:50:\"2013060900-1.8.15-site_secret-404fc165cf9e0ac9.php\";}'),('admin_registered','1'),('simplecache_lastupdate_default','1393750703'),('simplecache_lastcached_default','1393750703'),('__site_secret__','zIy6WoVmqjVA0QvFzGYLI-q5ZIhXkvmA'),('simplecache_lastupdate_failsafe','1393750703'),('simplecache_lastcached_failsafe','1393750703'),('simplecache_lastupdate_foaf','1393750703'),('simplecache_lastcached_foaf','1393750703'),('simplecache_lastupdate_ical','1393750703'),('simplecache_lastcached_ical','1393750703'),('simplecache_lastupdate_installation','1393750703'),('simplecache_lastcached_installation','1393750703'),('simplecache_lastupdate_json','1393750703'),('simplecache_lastcached_json','1393750703'),('simplecache_lastupdate_opendd','1393750703'),('simplecache_lastcached_opendd','1393750703'),('simplecache_lastupdate_php','1393750703'),('simplecache_lastcached_php','1393750703'),('simplecache_lastupdate_rss','1393750703'),('simplecache_lastcached_rss','1393750703'),('simplecache_lastupdate_xml','1393750703'),('simplecache_lastcached_xml','1393750703');
/*!40000 ALTER TABLE `elgg_datalists` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `elgg_entities`
--

DROP TABLE IF EXISTS `elgg_entities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `elgg_entities` (
  `guid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` enum('object','user','group','site') NOT NULL,
  `subtype` int(11) DEFAULT NULL,
  `owner_guid` bigint(20) unsigned NOT NULL,
  `site_guid` bigint(20) unsigned NOT NULL,
  `container_guid` bigint(20) unsigned NOT NULL,
  `access_id` int(11) NOT NULL,
  `time_created` int(11) NOT NULL,
  `time_updated` int(11) NOT NULL,
  `last_action` int(11) NOT NULL DEFAULT '0',
  `enabled` enum('yes','no') NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`guid`),
  KEY `type` (`type`),
  KEY `subtype` (`subtype`),
  KEY `owner_guid` (`owner_guid`),
  KEY `site_guid` (`site_guid`),
  KEY `container_guid` (`container_guid`),
  KEY `access_id` (`access_id`),
  KEY `time_created` (`time_created`),
  KEY `time_updated` (`time_updated`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `elgg_entities`
--

LOCK TABLES `elgg_entities` WRITE;
/*!40000 ALTER TABLE `elgg_entities` DISABLE KEYS */;
INSERT INTO `elgg_entities` VALUES (1,'site',0,0,1,0,2,1393325705,1393750705,1393325705,'yes'),(2,'object',2,1,1,1,2,1393325706,1393325706,1393325706,'yes'),(3,'object',2,1,1,1,2,1393325706,1393325706,1393325706,'yes'),(4,'object',2,1,1,1,2,1393325706,1393325706,1393325706,'yes'),(5,'object',2,1,1,1,2,1393325706,1393325706,1393325706,'yes'),(6,'object',2,1,1,1,2,1393325706,1393325706,1393325706,'yes'),(7,'object',2,1,1,1,2,1393325706,1393325706,1393325706,'yes'),(8,'object',2,1,1,1,2,1393325706,1393325706,1393325706,'yes'),(9,'object',2,1,1,1,2,1393325706,1393325706,1393325706,'yes'),(10,'object',2,1,1,1,2,1393325706,1393325706,1393325706,'yes'),(11,'object',2,1,1,1,2,1393325706,1393325706,1393325706,'yes'),(12,'object',2,1,1,1,2,1393325706,1393325706,1393325706,'yes'),(13,'object',2,1,1,1,2,1393325706,1393325706,1393325706,'yes'),(14,'object',2,1,1,1,2,1393325706,1393325706,1393325706,'yes'),(15,'object',2,1,1,1,2,1393325706,1393325706,1393325706,'yes'),(16,'object',2,1,1,1,2,1393325706,1393325706,1393325706,'yes'),(17,'object',2,1,1,1,2,1393325706,1393325706,1393325706,'yes'),(18,'object',2,1,1,1,2,1393325706,1393325706,1393325706,'yes'),(19,'object',2,1,1,1,2,1393325706,1393325706,1393325706,'yes'),(20,'object',2,1,1,1,2,1393325706,1393325706,1393325706,'yes'),(21,'object',2,1,1,1,2,1393325706,1393325706,1393325706,'yes'),(22,'object',2,1,1,1,2,1393325706,1393325706,1393325706,'yes'),(23,'object',2,1,1,1,2,1393325706,1393325706,1393325706,'yes'),(24,'object',2,1,1,1,2,1393325706,1393325706,1393325706,'yes'),(25,'object',2,1,1,1,2,1393325706,1393325706,1393325706,'yes'),(26,'object',2,1,1,1,2,1393325706,1393325706,1393325706,'yes'),(27,'object',2,1,1,1,2,1393325706,1393325706,1393325706,'yes'),(28,'object',2,1,1,1,2,1393325706,1393325706,1393325706,'yes'),(29,'object',2,1,1,1,2,1393325706,1393325706,1393325706,'yes'),(30,'object',2,1,1,1,2,1393325706,1393325706,1393325706,'yes'),(31,'object',2,1,1,1,2,1393325706,1393325706,1393325706,'yes'),(32,'object',2,1,1,1,2,1393325706,1393325706,1393325706,'yes'),(33,'user',0,0,1,0,2,1393325729,1393750789,1393750835,'yes'),(34,'object',3,33,1,33,0,1393325729,1393325729,1393325729,'yes'),(35,'object',3,33,1,33,0,1393325729,1393325729,1393325729,'yes'),(36,'object',3,33,1,33,0,1393325729,1393325729,1393325729,'yes'),(37,'object',3,33,1,33,0,1393325729,1393325729,1393325729,'yes'),(38,'object',3,33,1,33,0,1393325729,1393325729,1393325729,'yes'),(39,'user',0,0,1,0,2,1393325975,1393325975,1393325975,'no'),(40,'user',0,0,1,0,2,1393326377,1393326580,1393326392,'yes'),(41,'object',6,33,1,33,0,1393326407,1393326407,1393326407,'yes'),(48,'object',7,40,1,40,-2,1393326627,1393326627,1393326627,'yes'),(49,'object',5,40,1,40,2,1393326674,1393326674,1393326674,'yes'),(50,'object',2,1,1,1,2,1393679181,1393679181,1393679181,'yes');
/*!40000 ALTER TABLE `elgg_entities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `elgg_entity_relationships`
--

DROP TABLE IF EXISTS `elgg_entity_relationships`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `elgg_entity_relationships` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guid_one` bigint(20) unsigned NOT NULL,
  `relationship` varchar(50) NOT NULL,
  `guid_two` bigint(20) unsigned NOT NULL,
  `time_created` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `guid_one` (`guid_one`,`relationship`,`guid_two`),
  KEY `relationship` (`relationship`),
  KEY `guid_two` (`guid_two`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `elgg_entity_relationships`
--

LOCK TABLES `elgg_entity_relationships` WRITE;
/*!40000 ALTER TABLE `elgg_entity_relationships` DISABLE KEYS */;
INSERT INTO `elgg_entity_relationships` VALUES (1,2,'active_plugin',1,1393325706),(2,3,'active_plugin',1,1393325706),(3,11,'active_plugin',1,1393325706),(4,12,'active_plugin',1,1393325706),(5,13,'active_plugin',1,1393325706),(6,14,'active_plugin',1,1393325706),(7,15,'active_plugin',1,1393325706),(8,16,'active_plugin',1,1393325706),(9,17,'active_plugin',1,1393325706),(10,18,'active_plugin',1,1393325706),(11,19,'active_plugin',1,1393325706),(12,20,'active_plugin',1,1393325706),(13,21,'active_plugin',1,1393325706),(14,22,'active_plugin',1,1393325706),(15,23,'active_plugin',1,1393325706),(16,24,'active_plugin',1,1393325706),(17,25,'active_plugin',1,1393325706),(18,26,'active_plugin',1,1393325706),(19,28,'active_plugin',1,1393325706),(20,29,'active_plugin',1,1393325706),(21,31,'active_plugin',1,1393325706),(22,32,'active_plugin',1,1393325706),(23,33,'member_of_site',1,1393325729),(24,39,'member_of_site',1,1393325975),(25,40,'member_of_site',1,1393326377),(27,50,'active_plugin',1,1393681932);
/*!40000 ALTER TABLE `elgg_entity_relationships` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `elgg_entity_subtypes`
--

DROP TABLE IF EXISTS `elgg_entity_subtypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `elgg_entity_subtypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('object','user','group','site') NOT NULL,
  `subtype` varchar(50) NOT NULL,
  `class` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `type` (`type`,`subtype`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `elgg_entity_subtypes`
--

LOCK TABLES `elgg_entity_subtypes` WRITE;
/*!40000 ALTER TABLE `elgg_entity_subtypes` DISABLE KEYS */;
INSERT INTO `elgg_entity_subtypes` VALUES (1,'object','file','ElggFile'),(2,'object','plugin','ElggPlugin'),(3,'object','widget','ElggWidget'),(4,'object','blog','ElggBlog'),(5,'object','thewire','ElggWire'),(6,'object','reported_content',''),(7,'object','page_top','');
/*!40000 ALTER TABLE `elgg_entity_subtypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `elgg_geocode_cache`
--

DROP TABLE IF EXISTS `elgg_geocode_cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `elgg_geocode_cache` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(128) DEFAULT NULL,
  `lat` varchar(20) DEFAULT NULL,
  `long` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `location` (`location`)
) ENGINE=MEMORY DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `elgg_geocode_cache`
--

LOCK TABLES `elgg_geocode_cache` WRITE;
/*!40000 ALTER TABLE `elgg_geocode_cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `elgg_geocode_cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `elgg_groups_entity`
--

DROP TABLE IF EXISTS `elgg_groups_entity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `elgg_groups_entity` (
  `guid` bigint(20) unsigned NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`guid`),
  KEY `name` (`name`(50)),
  KEY `description` (`description`(50)),
  FULLTEXT KEY `name_2` (`name`,`description`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `elgg_groups_entity`
--

LOCK TABLES `elgg_groups_entity` WRITE;
/*!40000 ALTER TABLE `elgg_groups_entity` DISABLE KEYS */;
/*!40000 ALTER TABLE `elgg_groups_entity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `elgg_hmac_cache`
--

DROP TABLE IF EXISTS `elgg_hmac_cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `elgg_hmac_cache` (
  `hmac` varchar(255) NOT NULL,
  `ts` int(11) NOT NULL,
  PRIMARY KEY (`hmac`),
  KEY `ts` (`ts`)
) ENGINE=MEMORY DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `elgg_hmac_cache`
--

LOCK TABLES `elgg_hmac_cache` WRITE;
/*!40000 ALTER TABLE `elgg_hmac_cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `elgg_hmac_cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `elgg_metadata`
--

DROP TABLE IF EXISTS `elgg_metadata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `elgg_metadata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entity_guid` bigint(20) unsigned NOT NULL,
  `name_id` int(11) NOT NULL,
  `value_id` int(11) NOT NULL,
  `value_type` enum('integer','text') NOT NULL,
  `owner_guid` bigint(20) unsigned NOT NULL,
  `access_id` int(11) NOT NULL,
  `time_created` int(11) NOT NULL,
  `enabled` enum('yes','no') NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`id`),
  KEY `entity_guid` (`entity_guid`),
  KEY `name_id` (`name_id`),
  KEY `value_id` (`value_id`),
  KEY `owner_guid` (`owner_guid`),
  KEY `access_id` (`access_id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `elgg_metadata`
--

LOCK TABLES `elgg_metadata` WRITE;
/*!40000 ALTER TABLE `elgg_metadata` DISABLE KEYS */;
INSERT INTO `elgg_metadata` VALUES (1,1,1,2,'text',0,2,1393325705,'yes'),(2,33,3,4,'text',33,2,1393325729,'yes'),(3,33,5,4,'text',0,2,1393325729,'yes'),(4,33,6,7,'text',0,2,1393325729,'yes'),(5,39,3,4,'text',39,2,1393325975,'no'),(6,39,8,9,'text',0,2,1393325975,'no'),(7,39,5,10,'text',0,2,1393325975,'yes'),(8,39,6,11,'text',0,2,1393325975,'yes'),(9,40,3,4,'text',40,2,1393326377,'yes'),(10,40,12,4,'text',40,2,1393326377,'yes'),(11,40,13,14,'integer',40,2,1393326377,'yes'),(12,41,15,16,'text',33,0,1393326407,'yes'),(13,41,17,18,'text',33,0,1393326407,'yes'),(14,48,19,4,'text',40,-2,1393326627,'yes'),(15,49,22,23,'text',40,2,1393326674,'yes'),(16,49,24,25,'integer',40,2,1393326674,'yes'),(23,33,26,4,'integer',33,2,1393750835,'yes'),(24,33,27,33,'integer',33,2,1393750835,'yes'),(25,33,28,34,'integer',33,2,1393750835,'yes'),(26,33,29,35,'integer',33,2,1393750835,'yes'),(22,33,30,32,'integer',33,2,1393750835,'yes');
/*!40000 ALTER TABLE `elgg_metadata` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `elgg_metastrings`
--

DROP TABLE IF EXISTS `elgg_metastrings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `elgg_metastrings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `string` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `string` (`string`(50))
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `elgg_metastrings`
--

LOCK TABLES `elgg_metastrings` WRITE;
/*!40000 ALTER TABLE `elgg_metastrings` DISABLE KEYS */;
INSERT INTO `elgg_metastrings` VALUES (1,'email'),(2,'krydos@inbox.ru'),(3,'notification:method:email'),(4,'1'),(5,'validated'),(6,'validated_method'),(7,'admin_user'),(8,'disable_reason'),(9,'uservalidationbyemail_new_user'),(10,'0'),(11,''),(12,'admin_created'),(13,'created_by_guid'),(14,'33'),(15,'address'),(16,'http://elgg.my/profile/test2'),(17,'state'),(18,'active'),(19,'write_access_id'),(20,'<p>111111</p>'),(21,'page'),(22,'method'),(23,'site'),(24,'wire_thread'),(25,'49'),(26,'x1'),(27,'x2'),(28,'y1'),(29,'y2'),(30,'icontime'),(31,'1393750820'),(32,'1393750835'),(33,'426'),(34,'3'),(35,'428');
/*!40000 ALTER TABLE `elgg_metastrings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `elgg_objects_entity`
--

DROP TABLE IF EXISTS `elgg_objects_entity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `elgg_objects_entity` (
  `guid` bigint(20) unsigned NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`guid`),
  FULLTEXT KEY `title` (`title`,`description`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `elgg_objects_entity`
--

LOCK TABLES `elgg_objects_entity` WRITE;
/*!40000 ALTER TABLE `elgg_objects_entity` DISABLE KEYS */;
INSERT INTO `elgg_objects_entity` VALUES (2,'blog',''),(3,'bookmarks',''),(4,'categories',''),(5,'custom_index',''),(6,'dashboard',''),(7,'developers',''),(8,'diagnostics',''),(9,'embed',''),(10,'externalpages',''),(11,'file',''),(12,'garbagecollector',''),(13,'groups',''),(14,'htmlawed',''),(15,'invitefriends',''),(16,'likes',''),(17,'logbrowser',''),(18,'logrotate',''),(19,'members',''),(20,'messageboard',''),(21,'messages',''),(22,'notifications',''),(23,'pages',''),(24,'profile',''),(25,'reportedcontent',''),(26,'search',''),(27,'tagcloud',''),(28,'thewire',''),(29,'tinymce',''),(30,'twitter_api',''),(31,'uservalidationbyemail',''),(32,'zaudio',''),(34,'',''),(35,'',''),(36,'',''),(37,'',''),(38,'',''),(41,'test2','<p>Добавь аву блеать</p>'),(48,'1111','<p>111111</p>'),(49,'','lol'),(50,'testplugin','');
/*!40000 ALTER TABLE `elgg_objects_entity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `elgg_private_settings`
--

DROP TABLE IF EXISTS `elgg_private_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `elgg_private_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entity_guid` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `entity_guid` (`entity_guid`,`name`),
  KEY `name` (`name`),
  KEY `value` (`value`(50))
) ENGINE=MyISAM AUTO_INCREMENT=86 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `elgg_private_settings`
--

LOCK TABLES `elgg_private_settings` WRITE;
/*!40000 ALTER TABLE `elgg_private_settings` DISABLE KEYS */;
INSERT INTO `elgg_private_settings` VALUES (1,2,'elgg:internal:priority','1'),(2,3,'elgg:internal:priority','2'),(3,4,'elgg:internal:priority','3'),(4,5,'elgg:internal:priority','4'),(5,6,'elgg:internal:priority','5'),(6,7,'elgg:internal:priority','6'),(7,8,'elgg:internal:priority','7'),(8,9,'elgg:internal:priority','8'),(9,10,'elgg:internal:priority','9'),(10,11,'elgg:internal:priority','10'),(11,12,'elgg:internal:priority','11'),(12,13,'elgg:internal:priority','12'),(13,14,'elgg:internal:priority','13'),(14,15,'elgg:internal:priority','14'),(15,16,'elgg:internal:priority','15'),(16,17,'elgg:internal:priority','16'),(17,18,'elgg:internal:priority','17'),(18,19,'elgg:internal:priority','18'),(19,20,'elgg:internal:priority','19'),(20,21,'elgg:internal:priority','20'),(21,22,'elgg:internal:priority','21'),(22,23,'elgg:internal:priority','22'),(23,24,'elgg:internal:priority','23'),(24,25,'elgg:internal:priority','24'),(25,26,'elgg:internal:priority','25'),(26,27,'elgg:internal:priority','26'),(27,28,'elgg:internal:priority','27'),(28,29,'elgg:internal:priority','28'),(29,30,'elgg:internal:priority','29'),(30,31,'elgg:internal:priority','30'),(31,32,'elgg:internal:priority','31'),(32,34,'handler','control_panel'),(33,34,'context','admin'),(34,34,'column','1'),(35,34,'order','0'),(36,35,'handler','admin_welcome'),(37,35,'context','admin'),(38,35,'order','10'),(39,35,'column','1'),(40,36,'handler','online_users'),(41,36,'context','admin'),(42,36,'column','2'),(43,36,'order','0'),(44,37,'handler','new_users'),(45,37,'context','admin'),(46,37,'order','10'),(47,37,'column','2'),(48,38,'handler','content_stats'),(49,38,'context','admin'),(50,38,'order','20'),(51,38,'column','2'),(52,36,'num_display','8'),(53,37,'num_display','5'),(54,38,'num_display','8'),(85,50,'elgg:internal:priority','32');
/*!40000 ALTER TABLE `elgg_private_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `elgg_river`
--

DROP TABLE IF EXISTS `elgg_river`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `elgg_river` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(8) NOT NULL,
  `subtype` varchar(32) NOT NULL,
  `action_type` varchar(32) NOT NULL,
  `access_id` int(11) NOT NULL,
  `view` text NOT NULL,
  `subject_guid` int(11) NOT NULL,
  `object_guid` int(11) NOT NULL,
  `annotation_id` int(11) NOT NULL,
  `posted` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `type` (`type`),
  KEY `action_type` (`action_type`),
  KEY `access_id` (`access_id`),
  KEY `subject_guid` (`subject_guid`),
  KEY `object_guid` (`object_guid`),
  KEY `annotation_id` (`annotation_id`),
  KEY `posted` (`posted`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `elgg_river`
--

LOCK TABLES `elgg_river` WRITE;
/*!40000 ALTER TABLE `elgg_river` DISABLE KEYS */;
INSERT INTO `elgg_river` VALUES (1,'user','','friend',2,'river/relationship/friend/create',33,40,0,1393326392),(2,'object','page_top','create',-2,'river/object/page/create',40,48,0,1393326627),(3,'object','thewire','create',2,'river/object/thewire/create',40,49,0,1393326674),(5,'user','','update',2,'river/user/default/profileiconupdate',33,33,0,1393750835);
/*!40000 ALTER TABLE `elgg_river` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `elgg_sites_entity`
--

DROP TABLE IF EXISTS `elgg_sites_entity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `elgg_sites_entity` (
  `guid` bigint(20) unsigned NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`guid`),
  UNIQUE KEY `url` (`url`),
  FULLTEXT KEY `name` (`name`,`description`,`url`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `elgg_sites_entity`
--

LOCK TABLES `elgg_sites_entity` WRITE;
/*!40000 ALTER TABLE `elgg_sites_entity` DISABLE KEYS */;
INSERT INTO `elgg_sites_entity` VALUES (1,'Ego community','','http://elgg.my/');
/*!40000 ALTER TABLE `elgg_sites_entity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `elgg_system_log`
--

DROP TABLE IF EXISTS `elgg_system_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `elgg_system_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `object_id` int(11) NOT NULL,
  `object_class` varchar(50) NOT NULL,
  `object_type` varchar(50) NOT NULL,
  `object_subtype` varchar(50) NOT NULL,
  `event` varchar(50) NOT NULL,
  `performed_by_guid` int(11) NOT NULL,
  `owner_guid` int(11) NOT NULL,
  `access_id` int(11) NOT NULL,
  `enabled` enum('yes','no') NOT NULL DEFAULT 'yes',
  `time_created` int(11) NOT NULL,
  `ip_address` varchar(46) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `object_id` (`object_id`),
  KEY `object_class` (`object_class`),
  KEY `object_type` (`object_type`),
  KEY `object_subtype` (`object_subtype`),
  KEY `event` (`event`),
  KEY `performed_by_guid` (`performed_by_guid`),
  KEY `access_id` (`access_id`),
  KEY `time_created` (`time_created`),
  KEY `river_key` (`object_type`,`object_subtype`,`event`)
) ENGINE=MyISAM AUTO_INCREMENT=126 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `elgg_system_log`
--

LOCK TABLES `elgg_system_log` WRITE;
/*!40000 ALTER TABLE `elgg_system_log` DISABLE KEYS */;
INSERT INTO `elgg_system_log` VALUES (1,2,'ElggPlugin','object','plugin','create',0,1,2,'yes',1393325706,'127.0.0.1'),(2,3,'ElggPlugin','object','plugin','create',0,1,2,'yes',1393325706,'127.0.0.1'),(3,4,'ElggPlugin','object','plugin','create',0,1,2,'yes',1393325706,'127.0.0.1'),(4,5,'ElggPlugin','object','plugin','create',0,1,2,'yes',1393325706,'127.0.0.1'),(5,6,'ElggPlugin','object','plugin','create',0,1,2,'yes',1393325706,'127.0.0.1'),(6,7,'ElggPlugin','object','plugin','create',0,1,2,'yes',1393325706,'127.0.0.1'),(7,8,'ElggPlugin','object','plugin','create',0,1,2,'yes',1393325706,'127.0.0.1'),(8,9,'ElggPlugin','object','plugin','create',0,1,2,'yes',1393325706,'127.0.0.1'),(9,10,'ElggPlugin','object','plugin','create',0,1,2,'yes',1393325706,'127.0.0.1'),(10,11,'ElggPlugin','object','plugin','create',0,1,2,'yes',1393325706,'127.0.0.1'),(11,12,'ElggPlugin','object','plugin','create',0,1,2,'yes',1393325706,'127.0.0.1'),(12,13,'ElggPlugin','object','plugin','create',0,1,2,'yes',1393325706,'127.0.0.1'),(13,14,'ElggPlugin','object','plugin','create',0,1,2,'yes',1393325706,'127.0.0.1'),(14,15,'ElggPlugin','object','plugin','create',0,1,2,'yes',1393325706,'127.0.0.1'),(15,16,'ElggPlugin','object','plugin','create',0,1,2,'yes',1393325706,'127.0.0.1'),(16,17,'ElggPlugin','object','plugin','create',0,1,2,'yes',1393325706,'127.0.0.1'),(17,18,'ElggPlugin','object','plugin','create',0,1,2,'yes',1393325706,'127.0.0.1'),(18,19,'ElggPlugin','object','plugin','create',0,1,2,'yes',1393325706,'127.0.0.1'),(19,20,'ElggPlugin','object','plugin','create',0,1,2,'yes',1393325706,'127.0.0.1'),(20,21,'ElggPlugin','object','plugin','create',0,1,2,'yes',1393325706,'127.0.0.1'),(21,22,'ElggPlugin','object','plugin','create',0,1,2,'yes',1393325706,'127.0.0.1'),(22,23,'ElggPlugin','object','plugin','create',0,1,2,'yes',1393325706,'127.0.0.1'),(23,24,'ElggPlugin','object','plugin','create',0,1,2,'yes',1393325706,'127.0.0.1'),(24,25,'ElggPlugin','object','plugin','create',0,1,2,'yes',1393325706,'127.0.0.1'),(25,26,'ElggPlugin','object','plugin','create',0,1,2,'yes',1393325706,'127.0.0.1'),(26,27,'ElggPlugin','object','plugin','create',0,1,2,'yes',1393325706,'127.0.0.1'),(27,28,'ElggPlugin','object','plugin','create',0,1,2,'yes',1393325706,'127.0.0.1'),(28,29,'ElggPlugin','object','plugin','create',0,1,2,'yes',1393325706,'127.0.0.1'),(29,30,'ElggPlugin','object','plugin','create',0,1,2,'yes',1393325706,'127.0.0.1'),(30,31,'ElggPlugin','object','plugin','create',0,1,2,'yes',1393325706,'127.0.0.1'),(31,32,'ElggPlugin','object','plugin','create',0,1,2,'yes',1393325706,'127.0.0.1'),(32,1,'ElggRelationship','relationship','active_plugin','create',0,0,2,'yes',1393325706,'127.0.0.1'),(33,23,'ElggRelationship','relationship','member_of_site','create',0,0,2,'yes',1393325729,'127.0.0.1'),(34,33,'ElggUser','user','','create',0,0,2,'yes',1393325729,'127.0.0.1'),(35,2,'ElggMetadata','metadata','notification:method:email','create',0,33,2,'yes',1393325729,'127.0.0.1'),(36,34,'ElggWidget','object','widget','create',0,33,0,'yes',1393325729,'127.0.0.1'),(37,35,'ElggWidget','object','widget','create',0,33,0,'yes',1393325729,'127.0.0.1'),(38,36,'ElggWidget','object','widget','create',0,33,0,'yes',1393325729,'127.0.0.1'),(39,37,'ElggWidget','object','widget','create',0,33,0,'yes',1393325729,'127.0.0.1'),(40,38,'ElggWidget','object','widget','create',0,33,0,'yes',1393325729,'127.0.0.1'),(41,33,'ElggUser','user','','make_admin',0,0,2,'yes',1393325729,'127.0.0.1'),(42,3,'ElggMetadata','metadata','validated','create',0,0,2,'yes',1393325729,'127.0.0.1'),(43,4,'ElggMetadata','metadata','validated_method','create',0,0,2,'yes',1393325729,'127.0.0.1'),(44,33,'ElggUser','user','','update',33,0,2,'yes',1393325729,'127.0.0.1'),(45,33,'ElggUser','user','','login',33,0,2,'yes',1393325729,'127.0.0.1'),(46,33,'ElggUser','user','','logout',33,0,2,'yes',1393325932,'127.0.0.1'),(47,33,'ElggUser','user','','update',33,0,2,'yes',1393325932,'127.0.0.1'),(48,24,'ElggRelationship','relationship','member_of_site','create',0,0,2,'yes',1393325975,'127.0.0.1'),(49,39,'ElggUser','user','','create',0,0,2,'yes',1393325975,'127.0.0.1'),(50,5,'ElggMetadata','metadata','notification:method:email','create',0,39,2,'yes',1393325975,'127.0.0.1'),(51,39,'ElggUser','user','','disable',0,0,2,'yes',1393325975,'127.0.0.1'),(52,6,'ElggMetadata','metadata','disable_reason','create',0,0,2,'yes',1393325975,'127.0.0.1'),(53,5,'ElggMetadata','metadata','notification:method:email','disable',0,39,2,'yes',1393325975,'127.0.0.1'),(54,6,'ElggMetadata','metadata','disable_reason','disable',0,0,2,'yes',1393325975,'127.0.0.1'),(55,7,'ElggMetadata','metadata','validated','create',0,0,2,'yes',1393325975,'127.0.0.1'),(56,8,'ElggMetadata','metadata','validated_method','create',0,0,2,'yes',1393325975,'127.0.0.1'),(57,33,'ElggUser','user','','update',33,0,2,'yes',1393326010,'127.0.0.1'),(58,33,'ElggUser','user','','login',33,0,2,'yes',1393326010,'127.0.0.1'),(59,25,'ElggRelationship','relationship','member_of_site','create',33,0,2,'yes',1393326377,'127.0.0.1'),(60,40,'ElggUser','user','','create',33,0,2,'yes',1393326377,'127.0.0.1'),(61,9,'ElggMetadata','metadata','notification:method:email','create',33,40,2,'yes',1393326377,'127.0.0.1'),(62,40,'ElggUser','user','','update',33,0,2,'yes',1393326377,'127.0.0.1'),(63,10,'ElggMetadata','metadata','admin_created','create',33,40,2,'yes',1393326377,'127.0.0.1'),(64,11,'ElggMetadata','metadata','created_by_guid','create',33,40,2,'yes',1393326377,'127.0.0.1'),(65,26,'ElggRelationship','relationship','friend','create',33,0,2,'yes',1393326392,'127.0.0.1'),(66,26,'ElggRelationship','relationship','friend','delete',33,0,2,'yes',1393326395,'127.0.0.1'),(67,12,'ElggMetadata','metadata','address','create',33,33,0,'yes',1393326407,'127.0.0.1'),(68,41,'ElggObject','object','reported_content','create',33,33,0,'yes',1393326407,'127.0.0.1'),(69,13,'ElggMetadata','metadata','state','create',33,33,0,'yes',1393326407,'127.0.0.1'),(70,33,'ElggUser','user','','update',33,0,2,'yes',1393326514,'127.0.0.1'),(71,33,'ElggUser','user','','profileupdate',33,0,2,'yes',1393326514,'127.0.0.1'),(72,42,'ElggWidget','object','widget','create',33,33,0,'yes',1393326531,'127.0.0.1'),(73,43,'ElggWidget','object','widget','create',33,33,0,'yes',1393326533,'127.0.0.1'),(74,42,'ElggWidget','object','widget','delete',33,33,0,'yes',1393326540,'127.0.0.1'),(75,43,'ElggWidget','object','widget','delete',33,33,0,'yes',1393326542,'127.0.0.1'),(76,44,'ElggWidget','object','widget','create',33,40,0,'yes',1393326562,'127.0.0.1'),(77,45,'ElggWidget','object','widget','create',33,40,0,'yes',1393326563,'127.0.0.1'),(78,33,'ElggUser','user','','logout',33,0,2,'yes',1393326566,'127.0.0.1'),(79,33,'ElggUser','user','','update',33,0,2,'yes',1393326566,'127.0.0.1'),(80,40,'ElggUser','user','','update',40,0,2,'yes',1393326580,'127.0.0.1'),(81,40,'ElggUser','user','','login',40,0,2,'yes',1393326580,'127.0.0.1'),(82,45,'ElggWidget','object','widget','delete',40,40,0,'yes',1393326592,'127.0.0.1'),(83,44,'ElggWidget','object','widget','delete',40,40,0,'yes',1393326594,'127.0.0.1'),(84,46,'ElggWidget','object','widget','create',40,40,0,'yes',1393326600,'127.0.0.1'),(85,47,'ElggWidget','object','widget','create',40,40,0,'yes',1393326600,'127.0.0.1'),(86,46,'ElggWidget','object','widget','delete',40,40,0,'yes',1393326603,'127.0.0.1'),(87,47,'ElggWidget','object','widget','delete',40,40,0,'yes',1393326605,'127.0.0.1'),(88,14,'ElggMetadata','metadata','write_access_id','create',40,40,-2,'yes',1393326627,'127.0.0.1'),(89,48,'ElggObject','object','page_top','create',40,40,-2,'yes',1393326627,'127.0.0.1'),(90,48,'ElggObject','object','page_top','annotate',40,40,-2,'yes',1393326627,'127.0.0.1'),(91,1,'ElggAnnotation','annotation','page','create',40,40,-2,'yes',1393326627,'127.0.0.1'),(92,15,'ElggMetadata','metadata','method','create',40,40,2,'yes',1393326674,'127.0.0.1'),(93,49,'ElggWire','object','thewire','create',40,40,2,'yes',1393326674,'127.0.0.1'),(94,16,'ElggMetadata','metadata','wire_thread','create',40,40,2,'yes',1393326674,'127.0.0.1'),(95,33,'ElggUser','user','','update',33,0,2,'yes',1393623266,'192.168.33.1'),(96,33,'ElggUser','user','','login',33,0,2,'yes',1393623266,'192.168.33.1'),(97,33,'ElggUser','user','','update',33,0,2,'yes',1393678589,'192.168.33.1'),(98,33,'ElggUser','user','','login',33,0,2,'yes',1393678589,'192.168.33.1'),(99,50,'ElggPlugin','object','plugin','create',33,1,2,'yes',1393679181,'192.168.33.1'),(100,27,'ElggRelationship','relationship','active_plugin','create',33,0,2,'yes',1393681932,'192.168.33.1'),(101,33,'ElggUser','user','','logout',33,0,2,'yes',1393750596,'192.168.33.1'),(102,33,'ElggUser','user','','update',33,0,2,'yes',1393750596,'192.168.33.1'),(103,33,'ElggUser','user','','update',33,0,2,'yes',1393750649,'192.168.33.1'),(104,33,'ElggUser','user','','login',33,0,2,'yes',1393750649,'192.168.33.1'),(105,1,'ElggSite','site','','update',33,0,2,'yes',1393750705,'192.168.33.1'),(106,33,'ElggUser','user','','logout',33,0,2,'yes',1393750717,'192.168.33.1'),(107,33,'ElggUser','user','','update',33,0,2,'yes',1393750717,'192.168.33.1'),(108,33,'ElggUser','user','','update',33,0,2,'yes',1393750789,'192.168.33.1'),(109,33,'ElggUser','user','','login',33,0,2,'yes',1393750789,'192.168.33.1'),(110,17,'ElggMetadata','metadata','x1','create',33,33,2,'yes',1393750820,'192.168.33.1'),(111,18,'ElggMetadata','metadata','x2','create',33,33,2,'yes',1393750820,'192.168.33.1'),(112,19,'ElggMetadata','metadata','y1','create',33,33,2,'yes',1393750820,'192.168.33.1'),(113,20,'ElggMetadata','metadata','y2','create',33,33,2,'yes',1393750820,'192.168.33.1'),(114,21,'ElggMetadata','metadata','icontime','create',33,33,2,'yes',1393750820,'192.168.33.1'),(115,33,'ElggUser','user','','profileiconupdate',33,0,2,'yes',1393750820,'192.168.33.1'),(116,21,'ElggMetadata','metadata','icontime','delete',33,33,2,'yes',1393750835,'192.168.33.1'),(117,22,'ElggMetadata','metadata','icontime','create',33,33,2,'yes',1393750835,'192.168.33.1'),(118,17,'ElggMetadata','metadata','x1','delete',33,33,2,'yes',1393750835,'192.168.33.1'),(119,23,'ElggMetadata','metadata','x1','create',33,33,2,'yes',1393750835,'192.168.33.1'),(120,18,'ElggMetadata','metadata','x2','delete',33,33,2,'yes',1393750835,'192.168.33.1'),(121,24,'ElggMetadata','metadata','x2','create',33,33,2,'yes',1393750835,'192.168.33.1'),(122,19,'ElggMetadata','metadata','y1','delete',33,33,2,'yes',1393750835,'192.168.33.1'),(123,25,'ElggMetadata','metadata','y1','create',33,33,2,'yes',1393750835,'192.168.33.1'),(124,20,'ElggMetadata','metadata','y2','delete',33,33,2,'yes',1393750835,'192.168.33.1'),(125,26,'ElggMetadata','metadata','y2','create',33,33,2,'yes',1393750835,'192.168.33.1');
/*!40000 ALTER TABLE `elgg_system_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `elgg_users_apisessions`
--

DROP TABLE IF EXISTS `elgg_users_apisessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `elgg_users_apisessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_guid` bigint(20) unsigned NOT NULL,
  `site_guid` bigint(20) unsigned NOT NULL,
  `token` varchar(40) DEFAULT NULL,
  `expires` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_guid` (`user_guid`,`site_guid`),
  KEY `token` (`token`)
) ENGINE=MEMORY DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `elgg_users_apisessions`
--

LOCK TABLES `elgg_users_apisessions` WRITE;
/*!40000 ALTER TABLE `elgg_users_apisessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `elgg_users_apisessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `elgg_users_entity`
--

DROP TABLE IF EXISTS `elgg_users_entity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `elgg_users_entity` (
  `guid` bigint(20) unsigned NOT NULL,
  `name` text NOT NULL,
  `username` varchar(128) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `salt` varchar(8) NOT NULL DEFAULT '',
  `email` text NOT NULL,
  `language` varchar(6) NOT NULL DEFAULT '',
  `code` varchar(32) NOT NULL DEFAULT '',
  `banned` enum('yes','no') NOT NULL DEFAULT 'no',
  `admin` enum('yes','no') NOT NULL DEFAULT 'no',
  `last_action` int(11) NOT NULL DEFAULT '0',
  `prev_last_action` int(11) NOT NULL DEFAULT '0',
  `last_login` int(11) NOT NULL DEFAULT '0',
  `prev_last_login` int(11) NOT NULL DEFAULT '0',
  `day_count` datetime NOT NULL DEFAULT '0',
  PRIMARY KEY (`guid`),
  UNIQUE KEY `username` (`username`),
  KEY `password` (`password`),
  KEY `email` (`email`(50)),
  KEY `code` (`code`),
  KEY `last_action` (`last_action`),
  KEY `last_login` (`last_login`),
  KEY `admin` (`admin`),
  FULLTEXT KEY `name` (`name`),
  FULLTEXT KEY `name_2` (`name`,`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `elgg_users_entity`
--

LOCK TABLES `elgg_users_entity` WRITE;
/*!40000 ALTER TABLE `elgg_users_entity` DISABLE KEYS */;
INSERT INTO `elgg_users_entity` VALUES (33,'ADMIN (эльф большой)','Admin','9177b87ffa34ebb816dd98dc6638ee0a','44790fd8','krydos@inbox.ru','en','','no','yes',1393750859,1393750845,1393750789,1393750649),(39,'test_user','test','b200def8418e2f08c565adb970831716','e2dcb9ae','test@mail.ru','en','','no','no',0,0,0,0),(40,'test2','test2','291556f5e7c1a63d349b671dbce7388a','47ce3d33','test2@mail.ru','en','','no','no',1393326884,1393326865,1393326580,0);
/*!40000 ALTER TABLE `elgg_users_entity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `elgg_users_sessions`
--

DROP TABLE IF EXISTS `elgg_users_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `elgg_users_sessions` (
  `session` varchar(255) NOT NULL,
  `ts` int(11) unsigned NOT NULL DEFAULT '0',
  `data` mediumblob,
  PRIMARY KEY (`session`),
  KEY `ts` (`ts`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `elgg_users_sessions`
--

LOCK TABLES `elgg_users_sessions` WRITE;
/*!40000 ALTER TABLE `elgg_users_sessions` DISABLE KEYS */;
INSERT INTO `elgg_users_sessions` VALUES ('bkhpcl3793co9v4hse6gqaoqu3',1393325998,'__elgg_session|s:32:\"708c0775d75fd08524cf38b5852f8f51\";msg|a:0:{}sticky_forms|a:0:{}'),('0siq9o7adgm79vi48ga86ldjn1',1393326566,'__elgg_session|s:32:\"04a581a1efd7287a689c425e3e74b65a\";msg|a:0:{}'),('8k3tba92het8594tmsav8av0h5',1393326884,'__elgg_session|s:32:\"04a581a1efd7287a689c425e3e74b65a\";msg|a:0:{}user|O:8:\"ElggUser\":8:{s:15:\"\0*\0url_override\";N;s:16:\"\0*\0icon_override\";N;s:16:\"\0*\0temp_metadata\";a:0:{}s:19:\"\0*\0temp_annotations\";a:0:{}s:24:\"\0*\0temp_private_settings\";a:0:{}s:11:\"\0*\0volatile\";a:0:{}s:13:\"\0*\0attributes\";a:25:{s:4:\"guid\";i:40;s:4:\"type\";s:4:\"user\";s:7:\"subtype\";s:1:\"0\";s:10:\"owner_guid\";s:1:\"0\";s:9:\"site_guid\";s:1:\"1\";s:14:\"container_guid\";s:1:\"0\";s:9:\"access_id\";s:1:\"2\";s:12:\"time_created\";s:10:\"1393326377\";s:12:\"time_updated\";s:10:\"1393326580\";s:11:\"last_action\";s:10:\"1393326865\";s:7:\"enabled\";s:3:\"yes\";s:12:\"tables_split\";i:2;s:13:\"tables_loaded\";i:2;s:4:\"name\";s:5:\"test2\";s:8:\"username\";s:5:\"test2\";s:8:\"password\";s:32:\"291556f5e7c1a63d349b671dbce7388a\";s:4:\"salt\";s:8:\"47ce3d33\";s:5:\"email\";s:13:\"test2@mail.ru\";s:8:\"language\";s:2:\"en\";s:4:\"code\";s:0:\"\";s:6:\"banned\";s:2:\"no\";s:5:\"admin\";s:2:\"no\";s:16:\"prev_last_action\";s:10:\"1393326865\";s:10:\"last_login\";s:10:\"1393326580\";s:15:\"prev_last_login\";s:1:\"0\";}s:8:\"\0*\0valid\";b:0;}guid|i:40;id|i:40;username|s:5:\"test2\";name|s:5:\"test2\";sticky_forms|a:0:{}'),('kusdm3g99dakhlugfit74f00r1',1393512929,'__elgg_session|s:32:\"602ff45dae301ee8571897fd4a718ff5\";msg|a:0:{}'),('8c2l7ojtmracdcgmk9ch29ha11',1393623257,'__elgg_session|s:32:\"b813dff04561bea916d8cb974ea65d6e\";msg|a:0:{}'),('5phqaf76nfrhg1rrsu87ltto70',1393623868,'__elgg_session|s:32:\"b813dff04561bea916d8cb974ea65d6e\";msg|a:0:{}user|O:8:\"ElggUser\":8:{s:15:\"\0*\0url_override\";N;s:16:\"\0*\0icon_override\";N;s:16:\"\0*\0temp_metadata\";a:0:{}s:19:\"\0*\0temp_annotations\";a:0:{}s:24:\"\0*\0temp_private_settings\";a:0:{}s:11:\"\0*\0volatile\";a:0:{}s:13:\"\0*\0attributes\";a:25:{s:4:\"guid\";i:33;s:4:\"type\";s:4:\"user\";s:7:\"subtype\";s:1:\"0\";s:10:\"owner_guid\";s:1:\"0\";s:9:\"site_guid\";s:1:\"1\";s:14:\"container_guid\";s:1:\"0\";s:9:\"access_id\";s:1:\"2\";s:12:\"time_created\";s:10:\"1393325729\";s:12:\"time_updated\";s:10:\"1393623266\";s:11:\"last_action\";s:10:\"1393623568\";s:7:\"enabled\";s:3:\"yes\";s:12:\"tables_split\";i:2;s:13:\"tables_loaded\";i:2;s:4:\"name\";s:31:\"ADMIN (эльф большой)\";s:8:\"username\";s:5:\"Admin\";s:8:\"password\";s:32:\"9177b87ffa34ebb816dd98dc6638ee0a\";s:4:\"salt\";s:8:\"44790fd8\";s:5:\"email\";s:15:\"krydos@inbox.ru\";s:8:\"language\";s:2:\"en\";s:4:\"code\";s:0:\"\";s:6:\"banned\";s:2:\"no\";s:5:\"admin\";s:3:\"yes\";s:16:\"prev_last_action\";s:10:\"1393623268\";s:10:\"last_login\";s:10:\"1393623266\";s:15:\"prev_last_login\";s:10:\"1393326010\";}s:8:\"\0*\0valid\";b:0;}guid|i:33;id|i:33;username|s:5:\"Admin\";name|s:31:\"ADMIN (эльф большой)\";'),('e7hl26hgfh28vqcjfcf6toe9m7',1393678579,'__elgg_session|s:32:\"27af819262a1089c1c4b2b5799847e4d\";msg|a:0:{}'),('4t8agk5sib11fokr05eo7t3cn7',1393750596,'__elgg_session|s:32:\"90819033b2df5439d0e470b81ec7befa\";msg|a:0:{}'),('vaatpve65obsuoplcmpqlb1pt5',1393750859,'__elgg_session|s:32:\"0d5689726cae39a9bf7355509e761554\";msg|a:0:{}user|O:8:\"ElggUser\":8:{s:15:\"\0*\0url_override\";N;s:16:\"\0*\0icon_override\";N;s:16:\"\0*\0temp_metadata\";a:0:{}s:19:\"\0*\0temp_annotations\";a:0:{}s:24:\"\0*\0temp_private_settings\";a:0:{}s:11:\"\0*\0volatile\";a:0:{}s:13:\"\0*\0attributes\";a:25:{s:4:\"guid\";i:33;s:4:\"type\";s:4:\"user\";s:7:\"subtype\";s:1:\"0\";s:10:\"owner_guid\";s:1:\"0\";s:9:\"site_guid\";s:1:\"1\";s:14:\"container_guid\";s:1:\"0\";s:9:\"access_id\";s:1:\"2\";s:12:\"time_created\";s:10:\"1393325729\";s:12:\"time_updated\";s:10:\"1393750789\";s:11:\"last_action\";s:10:\"1393750845\";s:7:\"enabled\";s:3:\"yes\";s:12:\"tables_split\";i:2;s:13:\"tables_loaded\";i:2;s:4:\"name\";s:31:\"ADMIN (эльф большой)\";s:8:\"username\";s:5:\"Admin\";s:8:\"password\";s:32:\"9177b87ffa34ebb816dd98dc6638ee0a\";s:4:\"salt\";s:8:\"44790fd8\";s:5:\"email\";s:15:\"krydos@inbox.ru\";s:8:\"language\";s:2:\"en\";s:4:\"code\";s:0:\"\";s:6:\"banned\";s:2:\"no\";s:5:\"admin\";s:3:\"yes\";s:16:\"prev_last_action\";s:10:\"1393750835\";s:10:\"last_login\";s:10:\"1393750789\";s:15:\"prev_last_login\";s:10:\"1393750649\";}s:8:\"\0*\0valid\";b:0;}guid|i:33;id|i:33;username|s:5:\"Admin\";name|s:31:\"ADMIN (эльф большой)\";'),('n7a0ac0uprc16nv0r0qb73v4r7',1393750736,'__elgg_session|s:32:\"0d5689726cae39a9bf7355509e761554\";msg|a:0:{}');
/*!40000 ALTER TABLE `elgg_users_sessions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-03-02 11:02:46
