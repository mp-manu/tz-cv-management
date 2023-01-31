/*
SQLyog Ultimate v12.14 (64 bit)
MySQL - 10.4.19-MariaDB-log : Database - tz_anketa
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`tz_anketa` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `tz_anketa`;

/*Table structure for table `city` */

DROP TABLE IF EXISTS `city`;

CREATE TABLE `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ИД',
  `region_id` int(11) DEFAULT NULL COMMENT 'Регион',
  `name` varchar(255) NOT NULL COMMENT 'Город',
  `status` tinyint(2) DEFAULT NULL COMMENT 'Статус',
  `created_at` datetime DEFAULT NULL COMMENT 'Дата и время создания',
  `craeted_by` int(11) DEFAULT NULL COMMENT 'Создал',
  `updated_at` datetime DEFAULT NULL COMMENT 'Дата и время обновления',
  `updated_by` int(11) DEFAULT NULL COMMENT 'Обновил',
  PRIMARY KEY (`id`),
  KEY `region_id` (`region_id`),
  CONSTRAINT `city_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

/*Data for the table `city` */

insert  into `city`(`id`,`region_id`,`name`,`status`,`created_at`,`craeted_by`,`updated_at`,`updated_by`) values 
(1,1,'Город 1',NULL,NULL,NULL,NULL,NULL),
(2,1,'Город 5',NULL,NULL,NULL,NULL,NULL),
(3,1,'Город 4',NULL,NULL,NULL,NULL,NULL),
(4,1,'Город 3',NULL,NULL,NULL,NULL,NULL),
(5,1,'Город 2',NULL,NULL,NULL,NULL,NULL),
(6,2,'Город 6',NULL,NULL,NULL,NULL,NULL),
(7,2,'Город 7',NULL,NULL,NULL,NULL,NULL),
(8,2,'Город 8',NULL,NULL,NULL,NULL,NULL),
(9,3,'Город 9',NULL,NULL,NULL,NULL,NULL),
(10,3,'Город 10',NULL,NULL,NULL,NULL,NULL),
(11,3,'Город 11',NULL,NULL,NULL,NULL,NULL),
(12,4,'Город 12',NULL,NULL,NULL,NULL,NULL),
(13,4,'Город 13',NULL,NULL,NULL,NULL,NULL),
(14,5,'Город 14',NULL,NULL,NULL,NULL,NULL),
(15,5,'Город 15',NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `cv` */

DROP TABLE IF EXISTS `cv`;

CREATE TABLE `cv` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ИД',
  `name` varchar(255) NOT NULL COMMENT 'Имя',
  `email` varchar(255) NOT NULL COMMENT 'Email',
  `phone` varchar(255) NOT NULL COMMENT 'Телефон',
  `region_id` int(11) NOT NULL COMMENT 'Регион',
  `city_id` int(11) NOT NULL COMMENT 'Город',
  `gender` tinyint(1) NOT NULL COMMENT 'Пол',
  `question` text NOT NULL COMMENT 'Порекомендовали ли вы нас...?',
  `grade` int(6) NOT NULL COMMENT 'Оценка',
  `comment` text NOT NULL COMMENT 'Комментария',
  `created_at` datetime DEFAULT NULL COMMENT 'Дата и время создания',
  `created_by` int(11) DEFAULT NULL COMMENT 'Создал',
  `updated_at` datetime DEFAULT NULL COMMENT 'Дата и время обновления',
  `updated_by` int(11) DEFAULT NULL COMMENT 'Обновил',
  PRIMARY KEY (`id`),
  KEY `region_id` (`region_id`),
  KEY `city_id` (`city_id`),
  CONSTRAINT `cv_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`),
  CONSTRAINT `cv_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `cv` */

insert  into `cv`(`id`,`name`,`email`,`phone`,`region_id`,`city_id`,`gender`,`question`,`grade`,`comment`,`created_at`,`created_by`,`updated_at`,`updated_by`) values 
(1,'Тестов Тест','test@mail.ru','+992927001911',2,6,1,'Да. Типа того',5,'ТЕЕЕЕЕЕЕЕЕЕЕЕЕЕЕЕЕЕЕЕЕЕЕЕЕЕЕЕЕЕЕСТ',NULL,NULL,NULL,NULL);

/*Table structure for table `region` */

DROP TABLE IF EXISTS `region`;

CREATE TABLE `region` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ИД',
  `name` varchar(255) NOT NULL COMMENT 'Регион',
  `status` tinyint(2) DEFAULT 1 COMMENT 'Статус',
  `created_at` datetime DEFAULT NULL COMMENT 'Дата и время создания',
  `created_by` int(11) DEFAULT NULL COMMENT 'Создал',
  `updated_at` datetime DEFAULT NULL COMMENT 'Дата и время обновления',
  `updated_by` int(11) DEFAULT NULL COMMENT 'Обновил',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `region` */

insert  into `region`(`id`,`name`,`status`,`created_at`,`created_by`,`updated_at`,`updated_by`) values 
(1,'Регион 1',1,NULL,NULL,NULL,NULL),
(2,'Регион 2',1,NULL,NULL,NULL,NULL),
(3,'Регион 3',1,NULL,NULL,NULL,NULL),
(4,'Регион 4',1,NULL,NULL,NULL,NULL),
(5,'Регион 5',1,NULL,NULL,NULL,NULL);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `fio` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `username` varchar(65) NOT NULL,
  `user_password` varchar(150) NOT NULL,
  `email` varchar(64) DEFAULT NULL,
  `user_type` char(2) NOT NULL,
  `is_block` tinyint(1) NOT NULL DEFAULT 0,
  `avatar` varchar(500) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `secret_key` varchar(255) DEFAULT NULL,
  `auth_key` varchar(255) DEFAULT NULL,
  `session_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_login_id` (`username`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8;

/*Data for the table `user` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
