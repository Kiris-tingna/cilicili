-- MySQL dump 10.13  Distrib 5.7.16, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: laravel
-- ------------------------------------------------------
-- Server version	5.7.16

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `band` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `_lft` int(10) unsigned NOT NULL,
  `_rgt` int(10) unsigned NOT NULL,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categories__lft__rgt_parent_id_index` (`_lft`,`_rgt`,`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'首页','测试2',1,10,NULL,'2017-01-06 00:58:09','2017-01-06 00:58:09'),(2,'新番组','测试3',6,7,1,'2017-01-06 00:59:05','2017-01-17 19:28:56'),(3,'旧番','测试5',4,5,1,'2017-01-06 01:05:17','2017-01-17 19:28:38'),(4,'OVA/剧场','eqwe',2,3,1,'2017-01-06 01:38:52','2017-01-17 20:24:02'),(5,'新番','41241',8,9,1,'2017-01-06 01:41:04','2017-01-06 02:39:50');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category_special`
--

DROP TABLE IF EXISTS `category_special`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category_special` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned NOT NULL,
  `special_id` int(10) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_special_category_id_index` (`category_id`),
  KEY `category_special_special_id_index` (`special_id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_special`
--

LOCK TABLES `category_special` WRITE;
/*!40000 ALTER TABLE `category_special` DISABLE KEYS */;
INSERT INTO `category_special` VALUES (4,1,3,NULL),(36,2,10,NULL),(40,2,13,NULL),(41,2,14,NULL),(42,2,15,NULL),(43,2,16,NULL),(44,2,9,NULL),(46,2,7,NULL),(50,2,2,NULL),(56,3,8,NULL),(57,4,6,NULL),(58,4,4,NULL),(59,5,5,NULL),(60,5,1,NULL),(61,4,11,NULL),(62,3,12,NULL);
/*!40000 ALTER TABLE `category_special` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_reserved_reserved_at_index` (`queue`,`reserved`,`reserved_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `thread_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2016_12_04_063628_create_roles_table',1),('2015_01_15_105324_create_roles_table',2),('2016_12_04_064335_create_role_user_table',2),('2016_12_04_064458_create_permissions_table',2),('2016_12_04_064636_create_permission_role_table',2),('2016_12_04_064728_create_permission_user_table',2),('2016_12_04_064825_create_posts_table',2),('2016_12_06_135249_create_jobs_table',3),('2016_12_06_142622_create_failed_jobs_table',4),('2016_12_11_083929_create_videos_table',5),('2016_12_11_090445_create_specials_table',5),('2016_12_11_092544_create_pictures_table',5),('2016_12_17_133817_create_comments_table',6),('2017_01_06_080959_create_categories_table',6),('2017_01_08_035145_create_category_special_table',7),('2017_01_30_121304_add_posts_table',8),('2014_10_28_175635_create_threads_table',9),('2014_10_28_175710_create_messages_table',9),('2014_10_28_180224_create_participants_table',9),('2014_11_03_154831_add_soft_deletes_to_participants_table',9),('2014_12_04_124531_add_softdeletes_to_threads_table',9);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `participants`
--

DROP TABLE IF EXISTS `participants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `participants` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `thread_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `last_read` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `participants`
--

LOCK TABLES `participants` WRITE;
/*!40000 ALTER TABLE `participants` DISABLE KEYS */;
/*!40000 ALTER TABLE `participants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` VALUES (1,1,2,'2016-12-04 00:27:46','2016-12-04 00:27:46'),(2,2,3,'2016-12-04 00:27:46','2016-12-04 00:27:46'),(3,3,4,'2016-12-04 00:27:46','2016-12-04 00:27:46'),(4,1,1,'2016-12-04 00:27:46','2016-12-04 00:27:46'),(5,2,1,'2016-12-04 00:27:46','2016-12-04 00:27:46'),(6,3,1,'2016-12-04 00:27:46','2016-12-04 00:27:46');
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_user`
--

DROP TABLE IF EXISTS `permission_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_user_permission_id_index` (`permission_id`),
  KEY `permission_user_user_id_index` (`user_id`),
  CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_user`
--

LOCK TABLES `permission_user` WRITE;
/*!40000 ALTER TABLE `permission_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `permission_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'Manage Users','manage.users',NULL,NULL,'2016-12-04 00:27:46','2016-12-04 00:27:46'),(2,'Manage Roles','manage.roles',NULL,NULL,'2016-12-04 00:27:46','2016-12-04 00:27:46'),(3,'Manage Permissions','manage.permissions',NULL,NULL,'2016-12-04 00:27:46','2016-12-04 00:27:46');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pictures`
--

DROP TABLE IF EXISTS `pictures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pictures` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uri` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uri_small` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uri_middle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uri_large` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pictures`
--

LOCK TABLES `pictures` WRITE;
/*!40000 ALTER TABLE `pictures` DISABLE KEYS */;
/*!40000 ALTER TABLE `pictures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `topic` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `votes` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'测试文章','抢我的群无多群无多群无多群无我的钱无多群无多我确定群无',2,'2016-12-07 20:05:56','2016-12-07 20:05:56',0),(2,'母亲做的煎饼咸菜 让他行李超重30斤','2017年2月2日，农历大年初六，记者在机场遇到一位大叔，\n因为带了太多老母亲亲手做的煎饼和咸菜，导致行李超重30多斤。陈忧子 摄\n\n母亲亲手做的煎饼。陈忧子 摄\n \n由于不能顺利托运，最后这位大叔只能把饼子拿出来自己拎在手上登机了。陈忧子 摄\n\n这个故事其实年年上演。\n在2016年春节过后，大年初三，另一位记者在老家过完大年要回济南前，\n大清早不到七点，78岁的老娘就把家里的食物装满了车辆的后备箱。图：齐鲁壹点\n\n被母亲塞满的后备箱。图：齐鲁壹点\n\n临走的行囊，也装着沉甸甸的爱。图：齐鲁壹点',1,'2017-02-02 23:21:49','2017-02-02 23:39:58',1),(3,'共有83个罕见基因变异可显著影响你的身高','一个国际研究小组2月1日在《自然》杂志线上版发表论文称，他们对70余万人的基因组进行研究后，发现了83个可显著影响人类身高的罕见基因变异，其对人类身高的影响较此前发现的基因变异大很多，有些对身高的影响超过2厘米。\n此项研究由人体性状遗传研究（GIANT）协会主导。早在2014年，GIANT研究团队就通过对25万人的基因组研究，发现了分布在人体400多个基因区域的近700个与身高有关的基因变异。研究人员当时使用的方法是全基因组关联研究，通过对大规模人群进行全基因组测序扫描，追踪特定性状基因变异。全基因组关联',1,'2017-02-02 23:23:35','2017-02-02 23:23:35',0);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_user_role_id_index` (`role_id`),
  KEY `role_user_user_id_index` (`user_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` VALUES (1,1,1,'2016-12-04 00:27:46','2016-12-04 00:27:46'),(2,2,1,'2016-12-04 00:27:46','2016-12-04 00:27:46'),(3,3,1,'2016-12-04 00:27:46','2016-12-04 00:27:46'),(4,4,1,'2016-12-04 00:27:46','2016-12-04 00:27:46');
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Super Admin','admin.super','Super Admin',1,'2016-12-04 00:27:46','2016-12-04 00:27:46'),(2,'User Admin','admin.user','Can manage users',1,'2016-12-04 00:27:46','2016-12-04 00:27:46'),(3,'Role Admin','admin.role','Can manage user roles',1,'2016-12-04 00:27:46','2016-12-04 00:27:46'),(4,'Permission Admin','admin.permission','Can manage permissions',1,'2016-12-04 00:27:46','2016-12-04 00:27:46');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `specials`
--

DROP TABLE IF EXISTS `specials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `specials` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `info` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `picture_uri` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `area` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `year` smallint(6) NOT NULL,
  `month` smallint(6) NOT NULL,
  `weekday` smallint(6) NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `particles` smallint(6) NOT NULL,
  `played` int(11) NOT NULL DEFAULT '0',
  `commented` int(11) NOT NULL DEFAULT '0',
  `liked` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `specials`
--

LOCK TABLES `specials` WRITE;
/*!40000 ALTER TABLE `specials` DISABLE KEYS */;
INSERT INTO `specials` VALUES (1,'只有我不存在的城市','','一位不成功的漫画家“藤沼悟”拥有某种情况下，可以进行时光回溯的能力。某天，在他发现母亲被昔日的诱拐儿童事件真凶给谋杀后，悟决定发动这项能力来挽救一切，却没想到他却回到了小学时代……原来在那里有着整件事件的起源，他必须化解全部难题才能扭转命运。','iSPlCxgQvCzX0n5VSem5.png','日本',2014,9,7,'连载',0,0,0,0,'2016-12-11 05:37:11','2017-01-03 03:44:35'),(2,'夏目友人帐 伍','','从小便能看见妖怪的少年夏目贵志。自从他从祖母玲子那里继承了与妖怪成为主从并将其名字书写在上的契约书“友人帐”以来，便与自称为保镖的妖怪猫咪老师一同，开始了将名字返还给妖怪的每一天。夏目与各种各样的妖怪与善良人们相遇，在构筑温暖的场所同时，也反复寄托着想要守护重要之物的想法。','http://i0.hdslb.com/bfs/bangumi/2673ac643b48eb5bda64c960a2ca850fbebb839d.jpg_225x300.jpg','日本',0,0,1,'完结',0,0,0,0,'2016-12-16 05:09:16','2017-01-03 03:44:35'),(4,'无畏魔女','','1930年代，以欧洲为中心突然出现的人类之敌“涅洛伊”。\n能够对抗以通常的兵器难以破坏的涅洛伊的，\n只有被称作魔女的、拥有特殊魔法力的少女们而已……。\n1944年9月，在以第501统合战斗航空团“Strike Witches”为中心的联合军活跃之下，高卢共和国上空的涅洛伊巢穴消灭，欧洲西部的安全得到了确保。\n以此为机，联合军开始正式计划对欧洲中央—东部方面的反抗作战。\n在欧拉西亚帝国彼得堡构筑了基地的，\n第502统合战斗航空团“Brave Witches”也被下达了出击的命令。\n背负人类的希望，充满勇气的魔女们，在东欧的寒空中巡航。','http://i0.hdslb.com/bfs/bangumi/375067c6f49a706855595a32f4bd9f007bb60e7b.jpg_225x300.jpg','日本',2016,10,3,'完结',10,20,0,6,'2016-12-16 06:16:57','2017-01-17 06:25:03'),(5,'终末的伊泽塔','','——如果公主殿下与我约定的话，我便会为了公主殿下而战。身为最后的魔女——\n公元1939年，帝国主义国家日耳曼尼亚帝国突然开始了对邻国的侵略。\n战火瞬间蔓延到整个欧洲，时代被卷入了大战的漩涡之中。\n之后，1940年，日耳曼尼亚将其矛头指向了青山绿水的阿尔卑斯小国——埃尔施塔特公国。','http://i0.hdslb.com/bfs/bangumi/27b426240a5cef004b98ba9825cc1dced1f3e8ea.jpg_225x300.jpg','日本',2016,10,1,'完结',11,10,0,4,'2016-12-16 07:10:56','2017-02-02 23:24:45'),(6,'WWW.迷糊餐厅','','由于家境困难而开始在家庭餐厅打工的东田大辅。但那里却是有着料理白痴的外场主管、一切都以金钱衡量的服务员等等，没什么正经人的家庭餐厅……！？','http://i0.hdslb.com/bfs/bangumi/4588937c1f0118af6cec14f55eca43bf1141f328.jpg_225x300.jpg','日本',2016,10,6,'完结',11,70,0,0,'2016-12-16 07:14:35','2017-01-18 01:07:17'),(7,'魔法少女育成计划','','欺骗、隐瞒、互相残杀。获得了魔法之力的少女们的残酷无情生存游戏！\n拥有极大人气的社交游戏《魔法少女育成计划》，是能制造出万中无一的正牌魔法少女的奇迹游戏。几位少女幸运地获得了魔法之力，度过着充实的每一天。但在某天，运营方单方面宣告“要把增加得过多的魔法少女减少一半”，在收到这一通告后，十六位魔法少女进行的残酷无情的生存竞赛开幕了','http://i0.hdslb.com/bfs/bangumi/927fc75f3f044d4115392ffdad8fbcce9dbe2f95.jpg_225x300.jpg','日本',2016,10,6,'连载',11,4,0,1,'2016-12-16 07:17:33','2017-01-12 01:36:06'),(8,'Fate/Grand Order ‐First Order‐','','【2016年12月31日bilibili独播】2015年。示巴所观测到的未来领域毫无前兆地消失。根据计算，发现——不，是证明了人类将于2017年灭绝。人理延续保障机构·迦勒底将“无法观测的领域”假定为人类灭绝的原因，决定执行尚处于试验阶段的第六实验。那就是回到过去的时间旅行。将术者灵子化送往过去，通过介入事象，寻找出时空奇点，究明真相或予以破坏的禁断的仪式。其名为圣杯探索——冠位指定（Grand Order）。','http://i0.hdslb.com/bfs/bangumi/b75c55d209d156c8631f5ceb21e5c52c834dbb60.jpg_225x300.jpg','日本',2016,12,5,'连载中',2,2,0,0,'2017-01-03 03:29:58','2017-01-12 01:24:31'),(9,'Regalia 三圣星','','【因制作质量没有达到预期，雷加利亚三圣星动画制作委员会决议将从第五集开始会先暂停，预计9月会重新播出第一至四集再接第五集。】12年前，利姆加尔德王国发生的事件在留下了巨大的谜团的情况下，正从人们的记忆中被忘却。时光流转，主人公唯和蕾娜两姐妹在艾纳斯特利亚皇国度过着平稳的日常。某天，一台巨大机体袭击了艾纳斯特利亚。以这一天为分界线，少女们的命运被卷入了漩涡当中。','http://i0.hdslb.com/bfs/bangumi/6b9897aac3417d02a5e305f24d3499735194cc9b.jpg_225x300.jpg','日本',2016,7,6,'连载中',17,1,0,0,'2017-01-03 03:48:48','2017-01-15 22:26:08'),(10,'乌冬面之国的金色毛球','','俵宗太30岁。他在回到故乡时遇到了，\n喜欢乌龙面和青蛙的，有着耳朵和尾巴的不可思议的孩子……！？\n俵宗太是住在东京的网页设计师。\n由于父亲去世而回到故乡的宗太，\n在自家的乌龙面店，发现了睡在锅里的小孩子。\n乍一看是普通人类孩子的模样，\n但这个孩子实际上是化作人类形态的狸猫！？\n以时间闲适地流逝，通称“乌龙面县”的香川县为舞台，\n柔和温暖，稍微有些奇怪的家族物语开始了——。','http://i0.hdslb.com/bfs/bangumi/3c3f4544bb6f8175d24c6022a23fc9bd4bc4ce59.jpg_225x300.jpg','日本',2016,10,2,'已完结',12,20,0,4,'2017-01-03 03:51:59','2017-01-26 01:21:41'),(11,'超自然9人组','','幽灵？那种东西不可能存在吧！\n我闻悠太是高中2年生。\n他运营着以一夜致富为目标的超自然汇总系营销博客“轻轻松松破假象”，为了将世上存在的多数超常现象以科学的解释来“干净利落地砍掉！”，而日夜挑战着超自然现象。\n然而，以他的博客为契机，彻底、狂热、古怪的同志们全都集结到一起了。\n自我矛盾型自称救世主、神愈灵能媒介者、全否定型超理论派大学生、萌系占卜大老师、死后世界引导人、未来预知型同人漫画家大姐姐、黑魔术代行屋、现充系杂志记者、残念系Cosplay阿宅刑警，本来不应相遇的他们的命运不可思议地交错起来。\n之后，他们的周围开始产生一些小小的“违和感”。\n它们逐渐化作巨大的波澜，并发展成为超乎想象的大事件——','http://i0.hdslb.com/bfs/bangumi/5d1364ae198c6e29c2daa64e48ad539fe5094496.jpg_225x300.jpg','日本',2016,10,2,'已完结',12,3,0,0,'2017-01-03 03:56:20','2017-01-18 23:00:25'),(12,'风夏','','由于双亲前往美国而与姐妹一同生活，因此转学到东京的高中的榛名优。\n内向且不擅与人交往的他，交流的主要领域只有推特上的互相来往而已。\n在搬来的街道上散步的优正在刷推特时，与出现在自己面前的少女秋月风夏相遇……。\n内向且不擅与人交往的榛名优，与拥有不可思议魅力的少女秋月风夏。\n出现在两人面前的优的青梅竹马，冰无小雪。\n由音乐编织而成的全新恋爱物语，就此开始——。','//i0.hdslb.com/bfs/bangumi/72ef3f2a86c96a8db9abf8c4b7f7fe3c2d17e27b.jpg_225x300.jpg','日本',2017,1,6,'连载中',3,6,0,0,'2017-01-08 06:50:00','2017-01-18 01:05:13'),(13,'秋叶原之旅 THE ANIMATION','','秋叶原——从菜鸟到老手通通接纳，有着深厚包容力的街道。\n即使独自一人，只要去了秋叶原也会遇到理解自己的某人。\n可以做到、感觉能够做到什么事的自由场所，无论身心都可以尽情裸露在外的街道。\n在不论动画、游戏、女仆、偶像、废品、B级美食，全部都充满了“秋叶原”的这条街道上，与破缲者战斗，不会停歇的“BOY MEETS GIRL”的故事，就此开始！','//i0.hdslb.com/bfs/bangumi/75c4d7a8577a8816316884637b3a9f5207b13cf4.jpg_225x300.jpg','日本',2017,1,4,'连载中',1,8,0,0,'2017-01-09 02:57:51','2017-01-14 00:36:35'),(14,'信长的忍者','','1555年，时为战国时代。\n有位青年怀抱着远大的梦想，被人称作大傻瓜的他正是后来的织田信长。\n有一位仰慕着青年的少女，被信长的梦想所吸引的她笑着说道“我要成为信长大人的忍者！”\n目标只有一个，那就是天下布武！','//i0.hdslb.com/bfs/bangumi/6b4a565e9c06fa7368f97254bfe5ad2db61cf9d1.jpg_225x300.jpg','日本',2016,10,6,'连载中',15,5,0,0,'2017-01-11 18:35:53','2017-01-15 19:55:04'),(15,'TRICKSTER','','他为了能够死亡，选择了侦探之路……\n\n时值2030年代。聚集于谜之侦探·明智小五郎身边的「少年侦探团」，他们凭借着自己的行动力，解决了许多大大小小的事件。\n某一日，成员之一的花崎健介与谜之少年·小林芳雄相遇了。由于「不明雾霭」而成为了“死不了”体质的小林，渴望着自身的死亡，拒绝着与他人的接触。\n对着这样的小林抱有了兴趣的花崎，向小林提案「加入『少年侦探团』吗」。\n小林与花崎，他们的相遇终是与世纪罪犯·怪人二十面相和明智小五郎之间的因缘相缠结，他们两人的命运就此转动…','//i0.hdslb.com/bfs/bangumi/3501378364ff84cbb42d2ee946334cd3b2dec453.jpg_225x300.jpg','日本',2016,10,2,'连载中',13,1,0,0,'2017-01-11 18:36:15','2017-01-16 01:11:30'),(16,'双星之阴阳师','','曾是最强最年少的阴阳师、以祓除所有污秽为目标的少年焰魔堂辘轤，自经历被称为”雏月之悲剧“的污秽屠杀事件之後，决心放弃阴阳师身份来度过漫无目标的人生……但某天宿舍搬来一位名门阴阳师少女化野红绪，以最强为目标的她丝毫看不起毫无干劲的辘轤，造成两人间水火不容。只是根据总会所占卜的结果，显示了两人就是千百年来所有阴阳师们所等待的”双星之阴阳师“，他们将会产下”神子“终结这千百年来的人魔之争…','//i0.hdslb.com/bfs/bangumi/4d06e660b8da9cb5335552f4ebde89bbcb2e9d4f.jpg_225x300.jpg','日本',2016,4,6,'连载中',39,0,0,0,'2017-01-11 18:37:45','2017-01-11 18:37:48');
/*!40000 ALTER TABLE `specials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `threads`
--

DROP TABLE IF EXISTS `threads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `threads` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `threads`
--

LOCK TABLES `threads` WRITE;
/*!40000 ALTER TABLE `threads` DISABLE KEYS */;
/*!40000 ALTER TABLE `threads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `oauth_provider` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `oauth_provider_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_verified` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `email_verification_code` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,NULL,NULL,'admin','admin123@example.com','$2y$10$4QiR5fyGZy7tIJQCI6Ppi.ty842VARVKi78Vn36cLkY84ZTe268r2',NULL,'1',NULL,'ZuNrTnMELILv5qEVfNP3yZfQYrrzLQEB0NhEAlz9IlVgfw1JzLDWrc91JTRs','2016-12-03 23:01:43','2017-01-17 19:32:32'),(2,NULL,NULL,'root','12345@example.com','',NULL,'0',NULL,NULL,'2016-12-04 01:03:17','2016-12-04 01:03:17');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `videos`
--

DROP TABLE IF EXISTS `videos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `videos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `av` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `episode` int(11) NOT NULL,
  `special_id` int(11) NOT NULL,
  `source_uri` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picture_uri` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `played` int(11) NOT NULL DEFAULT '0',
  `commented` int(11) NOT NULL DEFAULT '0',
  `liked` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_videos_av` (`av`)
) ENGINE=InnoDB AUTO_INCREMENT=198 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videos`
--

LOCK TABLES `videos` WRITE;
/*!40000 ALTER TABLE `videos` DISABLE KEYS */;
INSERT INTO `videos` VALUES (27,'av00027','第1话 佐世保的魔法少女？','',1,4,'','http://i2.hdslb.com/bfs/archive/3df0e8905c34f48a6bb3dbad56ed64f3cf630a71.jpg_96x60.jpg',3,0,1,'2016-12-10 11:28:31','2017-01-01 18:36:28'),(28,'av00028','第2话 展翅吧 白鸻','',2,4,'','http://i1.hdslb.com/bfs/archive/3d413f8d22c2b1dfa065de6c91012415465cca9e.jpg_96x60.jpg',1,0,0,'2016-12-10 11:28:31','2016-12-26 20:11:09'),(29,'av00029','第3话 第502统合战斗航空团','',3,4,'','http://i2.hdslb.com/bfs/archive/dceb64232caa99ce8e5d08fe4a3ea9d94c35d1d3.jpg_96x60.jpg',1,0,0,'2016-12-10 11:28:31','2016-12-26 20:11:13'),(30,'av00030','第4话 想战斗 就要变强','',4,4,'','http://i1.hdslb.com/bfs/archive/13c7495a8525b1cc36f975820cac8a159d445ec9.jpg_96x60.jpg',0,0,0,'2016-12-10 11:28:31','2016-12-16 07:05:59'),(31,'av00031','第5话 极寒死斗','',5,4,'','http://i2.hdslb.com/bfs/archive/c3317a8ab24d2dccec5aa3a565ea64bead8227cf.jpg_96x60.jpg',2,0,0,'2016-12-10 11:28:31','2017-01-02 03:11:14'),(32,'av00032','第6话 召唤好运','',6,4,'','http://i0.hdslb.com/bfs/archive/217ff29c9f613229c7694457c834addb21b5086f.jpg_96x60.jpg',0,0,0,'2016-12-10 11:28:31','2016-12-16 07:05:59'),(33,'av00033','第7话 神圣之夜','',7,4,'','http://i0.hdslb.com/bfs/archive/9a98868b84c28d3d9ffb571a840ade5deb892936.jpg_96x60.jpg',0,0,0,'2016-12-10 11:28:31','2016-12-16 07:05:59'),(34,'av00034','第8话 为你的眼眸干杯','',8,4,'','http://i2.hdslb.com/bfs/archive/6ee85035dfcd52684cf8c1b9640752e87e008f95.jpg_96x60.jpg',0,0,0,'2016-12-10 11:28:31','2016-12-16 07:05:59'),(35,'av00035','第9话 破坏魔女','',9,4,'','http://i0.hdslb.com/bfs/archive/7fe92907de54cb5e1e26fda22f33c8f3b45d608a.jpg_96x60.jpg',1,0,1,'2016-12-10 11:28:31','2017-01-01 18:50:52'),(36,'av00036','第10话 姐姐和妹妹','',10,4,'','http://i0.hdslb.com/bfs/archive/a2dab0ef555f461fcad6bfdd1d220163db31a530.jpg_96x60.jpg',0,0,0,'2016-12-10 11:28:31','2016-12-16 07:05:59'),(48,'av00048','第1话 战斗的开端','',1,5,'','http://i2.hdslb.com/bfs/archive/a51697138f6327a21a5b3446bb1f244f67b0eb30.jpg_96x60.jpg',0,0,0,'2016-12-10 11:28:31','2016-12-16 07:12:33'),(49,'av00049','第2话 伤痕和枪声','',2,5,'','http://i0.hdslb.com/bfs/archive/3d92326cf2a3e7bf69e7315e27d7a20358e2b15c.jpg_96x60.jpg',0,0,0,'2016-12-10 11:28:31','2016-12-16 07:12:33'),(50,'av00050','第3话 破天之剑','',3,5,'','http://i1.hdslb.com/bfs/archive/203bdab203e56c1d83f9ddd5e58db7256e443973.jpg_96x60.jpg',1,0,0,'2016-12-10 11:28:31','2017-01-05 22:43:50'),(51,'av00051','第4话 魔女的秘密','',4,5,'','http://i0.hdslb.com/bfs/archive/d4db1b4011e7dcc6127306dfebab9407175cfeb9.jpg_96x60.jpg',0,0,0,'2016-12-10 11:28:31','2016-12-16 07:12:33'),(52,'av00052','第5话 虚假的奇迹','',5,5,'','http://i2.hdslb.com/bfs/archive/b7e8ba4f8600812e9d2be0f2732ada0f666934d6.jpg_96x60.jpg',0,0,0,'2016-12-10 11:28:31','2016-12-16 07:12:33'),(53,'av00053','第6话 安稳的日子','',6,5,'','http://i0.hdslb.com/bfs/archive/70b492bd50450448600427537ae74f80e83f9709.jpg_96x60.jpg',0,0,0,'2016-12-10 11:28:31','2016-12-16 07:12:33'),(54,'av00054','第7话 松恩峡湾海战','',7,5,'','http://i1.hdslb.com/bfs/archive/9f0602316a2dd98fefa1e17760ea0be726c17818.jpg_96x60.jpg',0,0,0,'2016-12-10 11:28:31','2016-12-16 07:12:33'),(55,'av00055','第8话 残酷的传说','',8,5,'','http://i1.hdslb.com/bfs/archive/fa208aa796c41ec8a0d83ee1682655034984d417.jpg_96x60.jpg',0,0,0,'2016-12-10 11:28:31','2016-12-16 07:12:33'),(56,'av00056','第9话 塞伦走廊燃烧吧','',9,5,'','http://i1.hdslb.com/bfs/archive/235dac37e58b357247dbbc9435f9ab702f54d192.jpg_96x60.jpg',0,0,0,'2016-12-10 11:28:31','2016-12-16 07:12:33'),(57,'av00057','第10话 魔女的铁锤','',10,5,'','http://i0.hdslb.com/bfs/archive/03e2e6b2e10ed5e17ba52022fe113825c9946746.jpg_96x60.jpg',0,0,0,'2016-12-10 11:28:31','2016-12-16 07:12:33'),(58,'av00058','第11话 菲涅','',11,5,'','http://i1.hdslb.com/bfs/archive/0181bf80067520daeea0f301d07227e567fff7bb.jpg_96x60.jpg',0,0,0,'2016-12-10 11:28:31','2016-12-16 07:12:33'),(59,'av00059','第1话 打工改变人生','',1,6,'','http://i2.hdslb.com/bfs/archive/6d4004c1bbdd1344595c9f1d26b1b6769997ad3a.jpg_96x60.jpg',4,0,1,'2016-12-10 11:28:31','2017-01-11 20:01:39'),(60,'av00060','第2话 人生不会一帆风顺','',2,6,'','http://i0.hdslb.com/bfs/archive/a85bc5eb327711055410551860d5e8f53ce1ea18.jpg_96x60.jpg',1,0,0,'2016-12-10 11:28:31','2017-01-05 23:24:19'),(61,'av00061','第3话 我只能拜托你了','',3,6,'','http://i2.hdslb.com/bfs/archive/7628e9dd56339b8876ea507a3cb04a416a310356.jpg_96x60.jpg',0,0,0,'2016-12-10 11:28:31','2016-12-16 07:14:35'),(62,'av00062','第4话 感觉能行','',4,6,'','http://i2.hdslb.com/bfs/archive/f00d9fb5a502604d2797bc15491ef3afbd714772.jpg_96x60.jpg',0,0,0,'2016-12-10 11:28:31','2016-12-16 07:14:35'),(63,'av00063','第5话 我要报仇','',5,6,'','http://i2.hdslb.com/bfs/archive/bcf851af725ee38e4bd2c8ea735c26f0fd4e5a8f.jpg_96x60.jpg',0,0,0,'2016-12-10 11:28:31','2016-12-16 07:14:35'),(64,'av00064','第6话 命运幸存者','',6,6,'','http://i0.hdslb.com/bfs/archive/c29de5ce657e32693f99572835179b4fbc1725e3.jpg_96x60.jpg',0,0,0,'2016-12-10 11:28:31','2016-12-16 07:14:36'),(65,'av00065','第7话 料理即是爱情','',7,6,'','http://i2.hdslb.com/bfs/archive/cc2791d6e526668c6156d86243fb45696e7ce630.jpg_96x60.jpg',0,0,0,'2016-12-10 11:28:31','2016-12-16 07:14:36'),(66,'av00066','第8话 奇怪的话题','',8,6,'','http://i2.hdslb.com/bfs/archive/096064d6a655429e7260544ee2903e1e43d26dbf.jpg_96x60.jpg',0,0,0,'2016-12-10 11:28:31','2016-12-16 07:14:36'),(67,'av00067','第9话 我们都病了','',9,6,'','http://i2.hdslb.com/bfs/archive/0d059c08b3fded1f4ade918b208435bd8f6eba9d.jpg_96x60.jpg',0,0,0,'2016-12-10 11:28:31','2016-12-16 07:14:36'),(68,'av00068','第10话 向着明天怒吼吧','',10,6,'','http://i2.hdslb.com/bfs/archive/586d0376a17383ffb4e3db9cc1a05844426b2383.jpg_96x60.jpg',0,0,0,'2016-12-10 11:28:31','2016-12-16 07:14:36'),(69,'av00069','第11话 右脸被打就用左手还击','',11,6,'','http://i2.hdslb.com/bfs/archive/df9d6f2f65858c70d7e6fb85718eaea94956819f.jpg_96x60.jpg',0,0,0,'2016-12-10 11:28:31','2016-12-16 07:14:36'),(70,'av00070','第1话 欢迎来到梦与魔法的世界','',1,7,'','http://i0.hdslb.com/bfs/archive/bcfbdc2133758ae536945d04287f0898addc3d99.jpg_96x60.jpg',0,0,0,'2016-12-10 11:28:31','2016-12-16 07:17:33'),(71,'av00071','第2话 收集魔法糖','',2,7,'','http://i1.hdslb.com/bfs/archive/1b499162f865b7849efc9da318b3bf57a7877d2e.jpg_96x60.jpg',0,0,0,'2016-12-10 11:28:31','2016-12-16 07:17:33'),(72,'av00072','第3话 版本更新的通知','',3,7,'','http://i1.hdslb.com/bfs/archive/400b740c4523b63fbb126803a999806489c6a4fb.jpg_96x60.jpg',0,0,0,'2016-12-10 11:28:31','2016-12-16 07:17:33'),(73,'av00073','第4话 增加朋友吧','',4,7,'','http://i2.hdslb.com/bfs/archive/2a2cb919491953d6d41effdb51ddaedeb3438d15.jpg_96x60.jpg',0,0,0,'2016-12-10 11:28:31','2016-12-16 07:17:33'),(74,'av00074','第5话 追加新角色','',5,7,'','http://i2.hdslb.com/bfs/archive/e3fcabacab9eeb1bdeba8849aa378b16aa8704a1.jpg_96x60.jpg',0,0,0,'2016-12-10 11:28:31','2016-12-16 07:17:33'),(75,'av00075','第6话 获得超稀有道具吧','',6,7,'','http://i0.hdslb.com/bfs/archive/36739298ff8cf25cafe25c6571ade350f37dcab8.jpg_96x60.jpg',0,0,0,'2016-12-10 11:28:31','2016-12-16 07:17:33'),(76,'av00076','第7话 提升亲密度吧','',7,7,'','http://i0.hdslb.com/bfs/archive/3d47b78e8dce2f534cf2de9247496608c19d0c0b.jpg_96x60.jpg',0,0,0,'2016-12-10 11:28:31','2016-12-16 07:17:33'),(77,'av00077','第8话 游击事件发生中','',8,7,'','http://i0.hdslb.com/bfs/archive/268fdca6b6eec9aaa7c14b4cf4904570c537f3c1.jpg_96x60.jpg',0,0,0,'2016-12-10 11:28:31','2016-12-16 07:17:33'),(78,'av00078','第9话 规则改变的通知','',9,7,'','http://i1.hdslb.com/bfs/archive/ba9dab8e1894b0d971d8d53c5b219b92f60f026e.jpg_96x60.jpg',0,0,0,'2016-12-10 11:28:31','2016-12-16 07:17:33'),(79,'av00079','第10话 闯入战机率变动中','',10,7,'','http://i2.hdslb.com/bfs/archive/3e4d0773e9d4b5b339e568f6dac63adcea76b935.jpg_96x60.jpg',0,0,0,'2016-12-10 11:28:31','2016-12-16 07:17:33'),(80,'av00080','第11话 服务器更新中','',11,7,'','http://i1.hdslb.com/bfs/archive/485560f5648e7abea0d48f0574f873ce3b81d7eb.jpg_96x60.jpg',0,0,0,'2016-12-10 11:28:31','2016-12-16 07:17:34'),(81,'av00081','PV ','',1,8,'','http://i2.hdslb.com/bfs/archive/a252b0fa31fd5fd1647f6eb4784052f374995ab4.jpg_96x60.jpg',0,0,0,'2017-01-03 03:29:58','2017-01-03 03:29:58'),(82,'av00082','第1话 特别篇','',2,8,'','http://i2.hdslb.com/bfs/archive/34b46557045ce4729bdb4536d3e27b34e562852f.jpg_96x60.jpg',0,0,0,'2017-01-03 03:29:58','2017-01-03 03:29:58'),(83,'av00083','第1话 姐妹','',1,9,'','http://i1.hdslb.com/bfs/archive/3c607c4a1a4d5945134a62e7b5ada9e2e5b0ebfb.jpg_96x60.jpg',0,0,0,'2017-01-03 03:48:48','2017-01-03 03:48:48'),(84,'av00084','第2话 宣告','',2,9,'','http://i1.hdslb.com/bfs/archive/2db80cfcb180ddd593a189849afb4a9c1a856391.jpg_96x60.jpg',0,0,0,'2017-01-03 03:48:48','2017-01-03 03:48:48'),(85,'av00085','第3话 真心','',3,9,'','http://i2.hdslb.com/bfs/archive/3dadc287f0f85bfd1754afd480b4712e116e5e1c.jpg_96x60.jpg',0,0,0,'2017-01-03 03:48:48','2017-01-03 03:48:48'),(86,'av00086','第4话 虚张声势','',4,9,'','http://i1.hdslb.com/bfs/archive/fe7e1687196842c07a82ffa8174ff8bdb3dacc9f.jpg_96x60.jpg',0,0,0,'2017-01-03 03:48:48','2017-01-03 03:48:48'),(87,'av00087','1重制 姐 妹','',5,9,'','http://i1.hdslb.com/bfs/archive/30ca6619dff18507d8e6a0ce57d59e91eb2e399e.jpg_96x60.jpg',0,0,0,'2017-01-03 03:48:48','2017-01-03 03:48:48'),(88,'av00088','2重制 宣 告','',6,9,'','http://i2.hdslb.com/bfs/archive/466adf681c04b9c80e4d6760d6446cc688aa36b7.jpg_96x60.jpg',0,0,0,'2017-01-03 03:48:48','2017-01-03 03:48:48'),(89,'av00089','3重制 真 心','',7,9,'','http://i2.hdslb.com/bfs/archive/4ac214ebd8fb1f0eb980dfab4414f72bf34ba5dd.jpg_96x60.jpg',0,0,0,'2017-01-03 03:48:48','2017-01-03 03:48:48'),(90,'av00090','4重制 虚张声势','',8,9,'','http://i2.hdslb.com/bfs/archive/7cc774eebc9873f5397d9d68a965dfc6ff3d0103.jpg_96x60.jpg',0,0,0,'2017-01-03 03:48:48','2017-01-03 03:48:48'),(91,'av00091','第5话 反 击','',9,9,'','http://i0.hdslb.com/bfs/archive/f09c71935b814b1a560852bf3eacf32e1dfa1d75.jpg_96x60.jpg',0,0,0,'2017-01-03 03:48:48','2017-01-03 03:48:48'),(92,'av00092','第6话 神 机','',10,9,'','http://i0.hdslb.com/bfs/archive/cfc86cf04423c07ee3ddbe0fdd779fcea65ac371.jpg_96x60.jpg',0,0,0,'2017-01-03 03:48:49','2017-01-03 03:48:49'),(93,'av00093','第7话 过 去','',11,9,'','http://i0.hdslb.com/bfs/archive/8e9c02f60e2fdf6f64b4743e60a0cf7a867d425c.jpg_96x60.jpg',0,0,0,'2017-01-03 03:48:49','2017-01-03 03:48:49'),(94,'av00094','第8话 归 还','',12,9,'','http://i1.hdslb.com/bfs/archive/d07adaae813a7fb140c4f3cbcc6d42db642f395a.jpg_96x60.jpg',0,0,0,'2017-01-03 03:48:49','2017-01-03 03:48:49'),(95,'av00095','第9话 继 承','',13,9,'','http://i1.hdslb.com/bfs/archive/097d5cfbc57c46ac9c781e774c25a3a411208bc6.jpg_96x60.jpg',0,0,0,'2017-01-03 03:48:49','2017-01-03 03:48:49'),(96,'av00096','第10话 孤 立','',14,9,'','http://i1.hdslb.com/bfs/archive/881d7310c80566aca538ae4ed07c5bf27f769f84.jpg_96x60.jpg',0,0,0,'2017-01-03 03:48:49','2017-01-03 03:48:49'),(97,'av00097','第11话 牢 狱','',15,9,'','http://i2.hdslb.com/bfs/archive/faab11687c798f763d263b030549b85b4fa5e738.jpg_96x60.jpg',0,0,0,'2017-01-03 03:48:49','2017-01-03 03:48:49'),(98,'av00098','第12话 夺 还','',16,9,'','http://i2.hdslb.com/bfs/archive/7a3689bd764d0a1d2f133829b797fb6b6341bea6.jpg_96x60.jpg',0,0,0,'2017-01-03 03:48:49','2017-01-03 03:48:49'),(99,'av00099','第13话 家 人','',17,9,'','http://i1.hdslb.com/bfs/archive/685fd7dbde1c5b861118ed4f431cfe626f18ddf7.jpg_96x60.jpg',0,0,0,'2017-01-03 03:48:49','2017-01-03 03:48:49'),(100,'av00100','第1话 酱汁拌乌龙凉面','',1,10,'','http://i2.hdslb.com/bfs/archive/3f34e4772c25da889d0059ded571807598602b65.jpg_96x60.jpg',6,0,0,'2017-01-03 03:51:59','2017-01-26 01:21:45'),(101,'av00101','第2话 琴电','',2,10,'','http://i2.hdslb.com/bfs/archive/1e0f0b8176908a1eeb635b4c3d6153df4e8c2aa9.jpg_96x60.jpg',43,0,0,'2017-01-03 03:51:59','2017-01-14 02:32:31'),(102,'av00102','第3话 赤灯台','',3,10,'','http://i0.hdslb.com/bfs/archive/f63159b12d2a4260142afbd5a8c12db7aaeb23a2.jpg_96x60.jpg',0,0,0,'2017-01-03 03:51:59','2017-01-03 03:51:59'),(103,'av00103','第4话 屋岛','',4,10,'','http://i0.hdslb.com/bfs/archive/fd793ec54defff81c77aa556bf1e6951cb416139.jpg_96x60.jpg',0,0,0,'2017-01-03 03:51:59','2017-01-03 03:51:59'),(104,'av00104','第5话 带骨鸡肉','',5,10,'','http://i1.hdslb.com/bfs/archive/9af4160745c1ecbf224d7da0882337c8cd31dc5f.jpg_96x60.jpg',0,0,0,'2017-01-03 03:51:59','2017-01-03 03:51:59'),(105,'av00105','第6话 东京塔','',6,10,'','http://i1.hdslb.com/bfs/archive/5011f9712bb53773b0aad3260bfc3f6739df14c8.jpg_96x60.jpg',0,0,0,'2017-01-03 03:52:00','2017-01-03 03:52:00'),(106,'av00106','第7话 栗林公园','',7,10,'','http://i2.hdslb.com/bfs/archive/4f61c5ad23e049bb785df53d9c70b98846e7280d.jpg_96x60.jpg',0,0,0,'2017-01-03 03:52:00','2017-01-03 03:52:00'),(107,'av00107','第8话 「嘎嗷嘎嗷先生和天上」之卷','',8,10,'','http://i0.hdslb.com/bfs/archive/253bb25c4eb76c4599015619b46b8ba3929b2236.jpg_96x60.jpg',0,0,0,'2017-01-03 03:52:00','2017-01-03 03:52:00'),(108,'av00108','第9话 干海参高汤','',9,10,'','http://i1.hdslb.com/bfs/archive/0aacfddbd889faa53ffeeda759eaa49280477b5d.jpg_96x60.jpg',0,0,0,'2017-01-03 03:52:00','2017-01-03 03:52:00'),(109,'av00109','第10话 储水池','',10,10,'','http://i2.hdslb.com/bfs/archive/b8c82ad8354bb1b2c561add4e3a594ed5efebd62.jpg_96x60.jpg',0,0,0,'2017-01-03 03:52:00','2017-01-03 03:52:00'),(110,'av00110','第11话 高松祭','',11,10,'','http://i2.hdslb.com/bfs/archive/300f37b7c3f3fcc73811b04f5e8bdbb762dde126.jpg_96x60.jpg',0,0,0,'2017-01-03 03:52:00','2017-01-03 03:52:00'),(111,'av00111','第12话 乌冬挂面','',12,10,'','http://i0.hdslb.com/bfs/archive/05c229c72e537ab1412ef98b3dc496a2ae76e7fe.jpg_96x60.jpg',0,0,0,'2017-01-03 03:52:00','2017-01-03 03:52:00'),(112,'av00112','第1话 众多之人 ','',1,11,'','http://i1.hdslb.com/bfs/archive/782749c847408737baf39972c0e4efe70a682129.jpg_96x60.jpg',0,0,0,'2017-01-03 03:56:20','2017-01-03 03:56:20'),(113,'av00113','第2话 并没有可以改变命运的力量 ','',2,11,'','http://i2.hdslb.com/bfs/archive/ed237126f894cf587555bccb8383d259246033a8.jpg_96x60.jpg',0,0,0,'2017-01-03 03:56:20','2017-01-03 03:56:20'),(114,'av00114','第3话 真的是妄想吗','',3,11,'','http://i1.hdslb.com/bfs/archive/9d0d2cf9c2b7b09cd5d5a884315e276971eadde7.jpg_96x60.jpg',0,0,0,'2017-01-03 03:56:20','2017-01-03 03:56:20'),(115,'av00115','第4话 犯人是我闻悠太','',4,11,'','http://i2.hdslb.com/bfs/archive/d7f62d7c1a1018057b1b973771b8bb34a4d5119c.jpg_96x60.jpg',0,0,0,'2017-01-03 03:56:21','2017-01-03 03:56:21'),(116,'av00116','第5话 这里就是新世界吧','',5,11,'','http://i1.hdslb.com/bfs/archive/6a8d5f347ac471c8bba22ce60ea20b546989a687.jpg_96x60.jpg',0,0,0,'2017-01-03 03:56:21','2017-01-03 03:56:21'),(117,'av00117','第6话 原来是你啊','',6,11,'','http://i1.hdslb.com/bfs/archive/13ca667dcba15bd7905aaae7f948247cc5d7eced.jpg_96x60.jpg',0,0,0,'2017-01-03 03:56:21','2017-01-03 03:56:21'),(118,'av00118','第7话 上映开始','',7,11,'','http://i1.hdslb.com/bfs/archive/8b2ab1aa388d63eb97b1ecb1d43b58b481cc60bb.jpg_96x60.jpg',0,0,0,'2017-01-03 03:56:21','2017-01-03 03:56:21'),(119,'av00119','第8话 这即是我等追求的究极医疗','',8,11,'','http://i0.hdslb.com/bfs/archive/6a4bdb83db9e32e0b83c5b3ed8c8ecee5acb71a1.jpg_96x60.jpg',0,0,0,'2017-01-03 03:56:21','2017-01-03 03:56:21'),(120,'av00120','第9话 世界终将迎来末日','',9,11,'','http://i0.hdslb.com/bfs/archive/558a2230c91c8317cab8f1cfd4c1f636abf45267.jpg_96x60.jpg',0,0,0,'2017-01-03 03:56:21','2017-01-03 03:56:21'),(121,'av00121','第10话 真正的我','',10,11,'','http://i0.hdslb.com/bfs/archive/ef4386461cc0b5de059e578bf40a96462e6f743d.jpg_96x60.jpg',0,0,0,'2017-01-03 03:56:21','2017-01-03 03:56:21'),(122,'av00122','第11话 为了远大的目标','',11,11,'','http://i0.hdslb.com/bfs/archive/c620ebfc2f7541b7811ba6847b758ebb6c262146.jpg_96x60.jpg',0,0,0,'2017-01-03 03:56:21','2017-01-03 03:56:21'),(123,'av00123','第12话 启动新世界系统','',12,11,'','http://i0.hdslb.com/bfs/archive/73f7683b92af2270d4b98c101561a815b0f22e62.jpg_96x60.jpg',0,0,0,'2017-01-03 03:56:21','2017-01-03 03:56:21'),(124,'av00124','第1话 风夏！','',1,12,'XMTkzMDYxNjMyOA==','//i0.hdslb.com/bfs/archive/3bf22b9d3c579a592c608ebadb59312bd5993925.jpg_96x60.jpg',3,0,4,'2017-01-08 06:50:38','2017-01-17 06:15:37'),(125,'av00125','第2话 翱翔吧','',2,12,'XMTkzMDYxNjMxNg==','//i0.hdslb.com/bfs/archive/8f25c38045284dc8d723714e53e6607f5423b721.jpg_96x60.jpg',0,0,0,'2017-01-08 06:50:38','2017-01-08 06:50:38'),(126,'av00126','第1话 AKIBA\'S FIRST TRIP','',1,13,'','//i2.hdslb.com/bfs/archive/60980af21e00f37b2a94650a8a9eea54b60ead51.jpg_96x60.jpg',0,0,0,'2017-01-09 02:57:52','2017-01-09 02:57:52'),(127,'av00127','第1话 去见信长大人','',1,14,'XMTc1MTc5OTcwMA==','//i2.hdslb.com/bfs/archive/96e205f6b01170ed23d3e9af0b86dd08f47b1e21.jpg_96x60.jpg',5,0,0,'2017-01-11 18:35:54','2017-01-15 19:36:49'),(128,'av00128','第2话 织田家和愉快的伙伴们','',2,14,'','//i1.hdslb.com/bfs/archive/4296f241b241ae5d790ab0a4b2f33d8463ce76c3.jpg_96x60.jpg',0,0,0,'2017-01-11 18:35:54','2017-01-11 18:35:54'),(129,'av00129','第3话 突击!!隔壁的今川先生','',3,14,'','//i2.hdslb.com/bfs/archive/60b3ebe5595bdb8b5604bf988f5ebb94368b52f6.jpg_96x60.jpg',0,0,0,'2017-01-11 18:35:54','2017-01-11 18:35:54'),(130,'av00130','第4话 猴子和傲娇娘','',4,14,'','//i2.hdslb.com/bfs/archive/00d129be2e4228030233512be3ba549a2756fce9.jpg_96x60.jpg',0,0,0,'2017-01-11 18:35:54','2017-01-11 18:35:54'),(131,'av00131','第5话 今川军来了','',5,14,'','//i0.hdslb.com/bfs/archive/518e55a88ecfbeed6d0bf63132353cdfb31d0a20.jpg_96x60.jpg',0,0,0,'2017-01-11 18:35:54','2017-01-11 18:35:54'),(132,'av00132','第6话 千鸟、如鸟一般','',6,14,'','//i1.hdslb.com/bfs/archive/fc4270b3a7f3335e548c817c07a84d5676daf858.jpg_96x60.jpg',0,0,0,'2017-01-11 18:35:54','2017-01-11 18:35:54'),(133,'av00133','第7话 在桶狭间的中心、义元呼唤','',7,14,'','//i2.hdslb.com/bfs/archive/f18c18842f5cdb3bc888a29f63325b2a015c70c8.jpg_96x60.jpg',0,0,0,'2017-01-11 18:35:54','2017-01-11 18:35:54'),(134,'av00134','第8话 史中有人','',8,14,'','//i2.hdslb.com/bfs/archive/fee287e5c0b1fc40f9ebb3b686626d12608cc429.jpg_96x60.jpg',0,0,0,'2017-01-11 18:35:54','2017-01-11 18:35:54'),(135,'av00135','第9话 清州同盟和元康的忍者','',9,14,'','//i0.hdslb.com/bfs/archive/69bd5670acb55c1652a1a34ddd0bba8c14a0cfbf.jpg_96x60.jpg',0,0,0,'2017-01-11 18:35:54','2017-01-11 18:35:54'),(136,'av00136','第10话 得美浓者得天下','',10,14,'','//i0.hdslb.com/bfs/archive/827d43ccbd4257967df5e71b8358e689291952da.jpg_96x60.jpg',0,0,0,'2017-01-11 18:35:54','2017-01-11 18:35:54'),(137,'av00137','第11话 遇上司不淑','',11,14,'','//i0.hdslb.com/bfs/archive/171b8ba132ac571e17f459cf923b6a5f6c6be0d4.jpg_96x60.jpg',0,0,0,'2017-01-11 18:35:54','2017-01-11 18:35:54'),(138,'av00138','第12话 天才是个病秧子','',12,14,'','//i2.hdslb.com/bfs/archive/d094b04a1dbe5d8bea673ce1ee093360578165d5.jpg_96x60.jpg',0,0,0,'2017-01-11 18:35:54','2017-01-11 18:35:54'),(139,'av00139','第13话 风云!!稻叶山城!!','',13,14,'','//i0.hdslb.com/bfs/archive/6cf8fba746503671f121fd67e81aa0793a1b5961.jpg_96x60.jpg',0,0,0,'2017-01-11 18:35:54','2017-01-11 18:35:54'),(140,'av00140','第14话 出人头地真辛苦','',14,14,'','//i2.hdslb.com/bfs/archive/2a891f2057a6c0574f58695307acc65aae918367.jpg_96x60.jpg',0,0,0,'2017-01-11 18:35:54','2017-01-11 18:35:54'),(141,'av00141','第15话 大家一起来筑墨俣城','',15,14,'','//i0.hdslb.com/bfs/archive/004ea7d7c2f56a4160de03918ccef653da14b457.jpg_96x60.jpg',0,0,0,'2017-01-11 18:35:54','2017-01-11 18:35:54'),(142,'av00142','第1话 D坂海市蜃楼','',1,15,'','//i2.hdslb.com/bfs/archive/61b5b5104b8c6177bbc8af53267a2348128ad042.jpg_96x60.jpg',0,0,0,'2017-01-11 18:36:15','2017-01-11 18:36:15'),(143,'av00143','第2话 金色的追踪者','',2,15,'','//i0.hdslb.com/bfs/archive/8e955660bfbf059a9d247c696184e6f96e3d07ac.jpg_96x60.jpg',0,0,0,'2017-01-11 18:36:15','2017-01-11 18:36:15'),(144,'av00144','第3话 塔上的无业者','',3,15,'','//i0.hdslb.com/bfs/archive/a740cdac4c2076af4f320f946ff7881e9fa05b12.jpg_96x60.jpg',0,0,0,'2017-01-11 18:36:15','2017-01-11 18:36:15'),(145,'av00145','第4话 地底迷宫','',4,15,'','//i2.hdslb.com/bfs/archive/6666da988ba1fa6c5b7a3d2c01f621784d019b2c.jpg_96x60.jpg',0,0,0,'2017-01-11 18:36:16','2017-01-11 18:36:16'),(146,'av00146','第5话 蜘蛛丝','',5,15,'','//i0.hdslb.com/bfs/archive/c8124c82390aec63e4ddfb7eb9f86ebc6b3a5d7f.jpg_96x60.jpg',0,0,0,'2017-01-11 18:36:16','2017-01-11 18:36:16'),(147,'av00147','第6话 闲暇的散步者','',6,15,'','//i2.hdslb.com/bfs/archive/fb3ed360afe273bf9c326be79ee3430a9cec5e57.jpg_96x60.jpg',0,0,0,'2017-01-11 18:36:16','2017-01-11 18:36:16'),(148,'av00148','第7话 纯洁的幽会','',7,15,'','//i1.hdslb.com/bfs/archive/7455acf452abfd15a8c64fbcb2618b30238e3cb2.jpg_96x60.jpg',0,0,0,'2017-01-11 18:36:16','2017-01-11 18:36:16'),(149,'av00149','第8话 箱庭的快乐天地','',8,15,'','//i0.hdslb.com/bfs/archive/c9a79c7cfab5b6778d6896ce21382e94c8dfaa82.jpg_96x60.jpg',0,0,0,'2017-01-11 18:36:16','2017-01-11 18:36:16'),(150,'av00150','第9话 陷落的英雄','',9,15,'','//i1.hdslb.com/bfs/archive/70043f158c335b5bdbe5df580fdf9bb9a48060ac.jpg_96x60.jpg',0,0,0,'2017-01-11 18:36:16','2017-01-11 18:36:16'),(151,'av00151','第10话 纯洁的天平','',10,15,'','//i0.hdslb.com/bfs/archive/2c86791aaefd50f76764f84c89d4b5e856d884c5.jpg_96x60.jpg',0,0,0,'2017-01-11 18:36:16','2017-01-11 18:36:16'),(152,'av00152','第11话 残酷戏剧','',11,15,'','//i2.hdslb.com/bfs/archive/ef6f253d6ef628c0a74345a5fc905afbab10fe63.jpg_96x60.jpg',0,0,0,'2017-01-11 18:36:16','2017-01-11 18:36:16'),(153,'av00153','第12话 烟雾笼罩','',12,15,'','//i1.hdslb.com/bfs/archive/a805cdb90614dd4a6966cec28fd411a68ddefe71.jpg_96x60.jpg',0,0,0,'2017-01-11 18:36:16','2017-01-11 18:36:16'),(154,'av00154','第13话 夜光人、乱舞','',13,15,'','//i0.hdslb.com/bfs/archive/69398f7e6dc3f2438cbedb5566633ef606b591c4.jpg_96x60.jpg',0,0,0,'2017-01-11 18:36:16','2017-01-11 18:36:16'),(155,'av00155','第1话 命中注定的二人','',1,16,'','//i1.hdslb.com/bfs/archive/f7cf2b25d3440c93c1b66cfd3936b46e97d839f0.jpg_96x60.jpg',0,0,0,'2017-01-11 18:37:46','2017-01-11 18:37:46'),(156,'av00156','第2话 双星交汇','',2,16,'','//i1.hdslb.com/bfs/archive/8cd23408b622dc9a3b7a0b360e3a416b46da942c.jpg_96x60.jpg',0,0,0,'2017-01-11 18:37:46','2017-01-11 18:37:46'),(157,'av00157','第3话 擦肩而过','',3,16,'','//i2.hdslb.com/bfs/archive/bdd883117fd2f0490d6315882f838ef97700e57b.jpg_96x60.jpg',0,0,0,'2017-01-11 18:37:46','2017-01-11 18:37:46'),(158,'av00158','第4话 祸野之音','',4,16,'','//i0.hdslb.com/bfs/archive/59632ae1dcb8609dfedcdc030b61ce931219357b.jpg_96x60.jpg',0,0,0,'2017-01-11 18:37:46','2017-01-11 18:37:46'),(159,'av00159','第5话 十二天将 朱雀','',5,16,'','//i0.hdslb.com/bfs/archive/e3d061aa93b4ec55be9fc37383729defd51d738c.jpg_96x60.jpg',0,0,0,'2017-01-11 18:37:46','2017-01-11 18:37:46'),(160,'av00160','第6话 红绪与茧良','',6,16,'','//i1.hdslb.com/bfs/archive/f1422620646d326f7f7fe2e9305d559555802f3b.jpg_96x60.jpg',0,0,0,'2017-01-11 18:37:46','2017-01-11 18:37:46'),(161,'av00161','第7话 新的试炼','',7,16,'','//i0.hdslb.com/bfs/archive/e59c5ce4bc0570a5be1f1b6956c76d6f7dcfb4fe.jpg_96x60.jpg',0,0,0,'2017-01-11 18:37:46','2017-01-11 18:37:46'),(162,'av00162','第8话 辘轳的心意','',8,16,'','//i0.hdslb.com/bfs/archive/a6a6d90d2838ea3cec6bc522990c970407ab1495.jpg_96x60.jpg',0,0,0,'2017-01-11 18:37:46','2017-01-11 18:37:46'),(163,'av00163','第9话 交错的悲剧','',9,16,'','//i0.hdslb.com/bfs/archive/cab2697518b39d903a8cdcab101ab5c82f86ad7d.jpg_96x60.jpg',0,0,0,'2017-01-11 18:37:46','2017-01-11 18:37:46'),(164,'av00164','第10话 昴的修行','',10,16,'','//i2.hdslb.com/bfs/archive/5e2540801a33947dafc9bb2123bdc9546adf6187.jpg_96x60.jpg',0,0,0,'2017-01-11 18:37:46','2017-01-11 18:37:46'),(165,'av00165','第11话 新婚夫妇加油哦','',11,16,'','//i0.hdslb.com/bfs/archive/6f1d2b9c52a90546338ad0491a21fb8bb49546ca.jpg_96x60.jpg',0,0,0,'2017-01-11 18:37:46','2017-01-11 18:37:46'),(166,'av00166','第12话 真受不了','',12,16,'','//i0.hdslb.com/bfs/archive/71d4eb9b3a1aac2f9faa742348aa720496f935ff.jpg_96x60.jpg',0,0,0,'2017-01-11 18:37:46','2017-01-11 18:37:46'),(167,'av00167','第13话 你的勇气 我的勇气','',13,16,'','//i1.hdslb.com/bfs/archive/aa7f3aa17ab5f37f549111bc9f6a9080f3498c7f.jpg_96x60.jpg',0,0,0,'2017-01-11 18:37:46','2017-01-11 18:37:46'),(168,'av00168','第14话 浴衣 星星与愿望','',14,16,'','//i1.hdslb.com/bfs/archive/5cbff41ceeb92664fd0c0ca4c2f8a33189b7aeb0.jpg_96x60.jpg',0,0,0,'2017-01-11 18:37:46','2017-01-11 18:37:46'),(169,'av00169','第15话 告别孤身一人','',15,16,'','//i1.hdslb.com/bfs/archive/8b573f32c2a3a4f1f3a3a61dac9260243187a01a.jpg_96x60.jpg',0,0,0,'2017-01-11 18:37:46','2017-01-11 18:37:46'),(170,'av00170','第16话 作为阴阳师','',16,16,'','//i0.hdslb.com/bfs/archive/d1c0000d022e651c5db15888cb7addf308b00392.jpg_96x60.jpg',0,0,0,'2017-01-11 18:37:46','2017-01-11 18:37:46'),(171,'av00171','第17话 师傅赋予的红色证明','',17,16,'','//i2.hdslb.com/bfs/archive/310a494a10dde9aa9ccdac35a9670e0017244183.jpg_96x60.jpg',0,0,0,'2017-01-11 18:37:46','2017-01-11 18:37:46'),(172,'av00172','第18话 决战前夜','',18,16,'','//i1.hdslb.com/bfs/archive/4867a1dbc2f83b00750c8f143b7e3d900a5b4c07.jpg_96x60.jpg',0,0,0,'2017-01-11 18:37:46','2017-01-11 18:37:46'),(173,'av00173','第19话 罪孽也好污秽也罢','',19,16,'','//i1.hdslb.com/bfs/archive/70d21c3e3f6d241a04cfa5b208c949fa08fe0d53.jpg_96x60.jpg',0,0,0,'2017-01-11 18:37:46','2017-01-11 18:37:47'),(174,'av00174','第20话 两人之路','',20,16,'','//i0.hdslb.com/bfs/archive/14c21cae0ad8613a19ba342fbbd7a9c6378bdcdc.jpg_96x60.jpg',0,0,0,'2017-01-11 18:37:47','2017-01-11 18:37:47'),(175,'av00175','第21话 双星新生','',21,16,'','//i1.hdslb.com/bfs/archive/450cc66fc9e291d8f3253407f80b311f2651fc59.jpg_96x60.jpg',0,0,0,'2017-01-11 18:37:47','2017-01-11 18:37:47'),(176,'av00176','第22话 不是染上污秽了嘛~','',22,16,'','//i2.hdslb.com/bfs/archive/c3b213a0162a13d0555466b532136d955db954b9.jpg_96x60.jpg',0,0,0,'2017-01-11 18:37:47','2017-01-11 18:37:47'),(177,'av00177','第23话 双星 西行','',23,16,'','//i0.hdslb.com/bfs/archive/afb0018f3f7ed1098acee2a018282c63d0fa9af4.jpg_96x60.jpg',0,0,0,'2017-01-11 18:37:47','2017-01-11 18:37:47'),(178,'av00178','第24话 污秽所见之梦','',24,16,'','//i0.hdslb.com/bfs/archive/d26cee2c6382381ad2528c6a264da846105c28bc.jpg_96x60.jpg',0,0,0,'2017-01-11 18:37:47','2017-01-11 18:37:47'),(179,'av00179','第25话 天·元·空·我','',25,16,'','//i1.hdslb.com/bfs/archive/c5a732d59d0885712e4d2cf6ec2971b3a740987a.jpg_96x60.jpg',0,0,0,'2017-01-11 18:37:47','2017-01-11 18:37:47'),(180,'av00180','第26话 双星VS双生','',26,16,'','//i1.hdslb.com/bfs/archive/a37e26df1a06b784ce963ae80b11bece9ab04b98.jpg_96x60.jpg',0,0,0,'2017-01-11 18:37:47','2017-01-11 18:37:47'),(181,'av00181','第27话 秘密的茧良','',27,16,'','//i2.hdslb.com/bfs/archive/8b26be0c1005fa939850a8252fe6b004f0cd1e20.jpg_96x60.jpg',0,0,0,'2017-01-11 18:37:47','2017-01-11 18:37:47'),(182,'av00182','第28话 鸬宫天马','',28,16,'','//i2.hdslb.com/bfs/archive/21f60c4f18bc492ea9a1e8c04fffcf49ab2acc46.jpg_96x60.jpg',0,0,0,'2017-01-11 18:37:47','2017-01-11 18:37:47'),(183,'av00183','第29话 与小枝的约定','',29,16,'','//i1.hdslb.com/bfs/archive/29a307811ae785a2ca99aedd9f235530c32e415f.jpg_96x60.jpg',0,0,0,'2017-01-11 18:37:47','2017-01-11 18:37:47'),(184,'av00184','第30话 无论何时都要绽放笑容','',30,16,'','//i0.hdslb.com/bfs/archive/fcf4f73fdeef090db51ab8eb060a3baaadf02041.jpg_96x60.jpg',0,0,0,'2017-01-11 18:37:47','2017-01-11 18:37:47'),(185,'av00185','第31话 我会在你身边','',31,16,'','//i0.hdslb.com/bfs/archive/0672579cb2d131a0853ab2dcc2c851585ef8fec3.jpg_96x60.jpg',0,0,0,'2017-01-11 18:37:47','2017-01-11 18:37:47'),(186,'av00186','第32话 在混沌的中心','',32,16,'','//i1.hdslb.com/bfs/archive/49adbf0821c8dd52f0e97938e854c52dd6e46267.jpg_96x60.jpg',0,0,0,'2017-01-11 18:37:47','2017-01-11 18:37:47'),(187,'av00187','第33话 师的报恩','',33,16,'','//i0.hdslb.com/bfs/archive/c933c7b707336619f8e979c3cfb520bda4ddb71c.jpg_96x60.jpg',0,0,0,'2017-01-11 18:37:47','2017-01-11 18:37:47'),(188,'av00188','第34话 才不是名搭档','',34,16,'','//i0.hdslb.com/bfs/archive/e8bba0388c0e6e705b6d422c4de0e8f6185715e3.jpg_96x60.jpg',0,0,0,'2017-01-11 18:37:47','2017-01-11 18:37:47'),(189,'av00189','第35话 复仇的傀儡师','',35,16,'','//i0.hdslb.com/bfs/archive/7139c37b8aa76ae7640d9491833a5a2d474df7b5.jpg_96x60.jpg',0,0,0,'2017-01-11 18:37:47','2017-01-11 18:37:47'),(190,'av00190','第36话 应当守护的东西','',36,16,'','//i0.hdslb.com/bfs/archive/f551ffe11f3a46834dec37e15426a253f3decd0a.jpg_96x60.jpg',0,0,0,'2017-01-11 18:37:47','2017-01-11 18:37:47'),(191,'av00191','第37话 纵情飞舞在这恋爱之都','',37,16,'','//i0.hdslb.com/bfs/archive/89ad8be1dff882c9a4d0bc010b4bd672103fc4a7.jpg_96x60.jpg',0,0,0,'2017-01-11 18:37:47','2017-01-11 18:37:47'),(192,'av00192','第38话 鸣神町最糟糕的一天','',38,16,'','//i2.hdslb.com/bfs/archive/791b9f66c8b3b635b46a00bf3ef1f76b7c337707.jpg_96x60.jpg',0,0,0,'2017-01-11 18:37:47','2017-01-11 18:37:47'),(193,'av00193','第39话 慈爱的灵兽','',39,16,'','//i2.hdslb.com/bfs/archive/bddc2a20ab369aa941ca7f4176bbc4a23b1adf43.jpg_96x60.jpg',0,0,0,'2017-01-11 18:37:48','2017-01-11 18:37:48'),(197,'av00197','第3话 Triangle','',3,12,'','//i0.hdslb.com/bfs/archive/251ecff751c91d0f4665cacbbe1183e37b315568.jpg_96x60.jpg',0,0,0,'2017-01-18 01:00:44','2017-01-18 01:00:44');
/*!40000 ALTER TABLE `videos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-02-04 14:49:06
