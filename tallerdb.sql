/*
SQLyog Community v13.1.9 (64 bit)
MySQL - 10.4.28-MariaDB : Database - taller
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`taller` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `taller`;

/*Table structure for table `alumno_tallers` */

DROP TABLE IF EXISTS `alumno_tallers`;

CREATE TABLE `alumno_tallers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `taller_id` bigint(20) unsigned NOT NULL,
  `constancia` tinyint(1) NOT NULL,
  `estatus` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `alumno_tallers_user_id_foreign` (`user_id`),
  KEY `alumno_tallers_taller_id_foreign` (`taller_id`),
  CONSTRAINT `alumno_tallers_taller_id_foreign` FOREIGN KEY (`taller_id`) REFERENCES `talleres` (`id`),
  CONSTRAINT `alumno_tallers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `alumno_tallers` */

/*Table structure for table `asistencia` */

DROP TABLE IF EXISTS `asistencia`;

CREATE TABLE `asistencia` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `alumtalle_id` bigint(20) unsigned NOT NULL,
  `periodo_id` bigint(20) unsigned NOT NULL,
  `fecha` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `asistencia_alumtalle_id_foreign` (`alumtalle_id`),
  KEY `asistencia_periodo_id_foreign` (`periodo_id`),
  CONSTRAINT `asistencia_alumtalle_id_foreign` FOREIGN KEY (`alumtalle_id`) REFERENCES `alumno_tallers` (`id`),
  CONSTRAINT `asistencia_periodo_id_foreign` FOREIGN KEY (`periodo_id`) REFERENCES `periodos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `asistencia` */

/*Table structure for table `docente_tallers` */

DROP TABLE IF EXISTS `docente_tallers`;

CREATE TABLE `docente_tallers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `taller_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `docente_tallers_user_id_foreign` (`user_id`),
  KEY `docente_tallers_taller_id_foreign` (`taller_id`),
  CONSTRAINT `docente_tallers_taller_id_foreign` FOREIGN KEY (`taller_id`) REFERENCES `talleres` (`id`),
  CONSTRAINT `docente_tallers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `docente_tallers` */

insert  into `docente_tallers`(`id`,`user_id`,`taller_id`,`created_at`,`updated_at`) values 
(1,2,1,'2025-02-13 15:41:00','2025-02-13 15:41:02');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_06_07_152938_create_roles_table',1),
(2,'2014_10_12_000000_create_users_table',1),
(3,'2014_10_12_100000_create_password_reset_tokens_table',1),
(4,'2019_08_19_000000_create_failed_jobs_table',1),
(5,'2019_12_14_000001_create_personal_access_tokens_table',1),
(6,'2025_01_18_005115_create_periodo_table',1),
(7,'2025_01_18_040209_create_publicaciones_table',1),
(8,'2025_01_18_040229_create_talleres_table',1),
(9,'2025_01_18_040441_create_alumnotaller_table',1),
(10,'2025_01_18_040456_create_docentetaller_table',1),
(11,'2025_01_19_040515_create_asistencia_table',1),
(12,'2025_02_10_213502_create_porcentaje_view',1);

/*Table structure for table `password_reset_tokens` */

DROP TABLE IF EXISTS `password_reset_tokens`;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_reset_tokens` */

/*Table structure for table `periodos` */

DROP TABLE IF EXISTS `periodos`;

CREATE TABLE `periodos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `periodos` */

insert  into `periodos`(`id`,`fecha_inicio`,`fecha_fin`,`created_at`,`updated_at`) values 
(1,'2025-01-06','2025-04-15','2025-02-13 20:31:22','2025-02-13 20:31:22');

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `publicaciones` */

DROP TABLE IF EXISTS `publicaciones`;

CREATE TABLE `publicaciones` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `imagen` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `publicaciones_user_id_foreign` (`user_id`),
  CONSTRAINT `publicaciones_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `publicaciones` */

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`name`,`created_at`,`updated_at`) values 
(1,'Administrador','2025-02-13 20:29:00','2025-02-13 20:29:00'),
(2,'Docente','2025-02-13 20:29:00','2025-02-13 20:29:00'),
(3,'Alumno','2025-02-13 20:29:00','2025-02-13 20:29:00');

/*Table structure for table `talleres` */

DROP TABLE IF EXISTS `talleres`;

CREATE TABLE `talleres` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_taller` varchar(255) NOT NULL,
  `horarios` varchar(255) NOT NULL,
  `ubicacion` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `talleres` */

insert  into `talleres`(`id`,`nombre_taller`,`horarios`,`ubicacion`,`created_at`,`updated_at`) values 
(1,'Voleibol','Lunes (8:00 - 17:00) | Martes, Miercoles y Viernes (16:00 - 19:00)','Canchas detras de docencia','2025-02-13 21:33:24','2025-02-13 21:37:17'),
(2,'Basquetbol','Lunes (12:00 - 15:00 hrs) Miercoles (8:00 - 15:00 hrs) y Viernes (9:00 - 13:00 hrs)','Canchas detras de docencia','2025-02-13 21:34:50','2025-02-13 21:34:50'),
(3,'Tocho Bandera','Lunes (9:00 - 12:00 hrs) y Viernes (13:00 - 16:00 hrs)','Cancha de futbol','2025-02-13 21:36:05','2025-02-13 21:36:05');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `app` varchar(50) NOT NULL,
  `apm` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `carrera` varchar(255) DEFAULT NULL,
  `matricula` varchar(255) DEFAULT NULL,
  `nss` varchar(255) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `sexo` varchar(255) NOT NULL,
  `genero` varchar(255) DEFAULT NULL,
  `rol_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_rol_id_foreign` (`rol_id`),
  CONSTRAINT `users_rol_id_foreign` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`app`,`apm`,`email`,`email_verified_at`,`password`,`remember_token`,`carrera`,`matricula`,`nss`,`fecha_nac`,`sexo`,`genero`,`rol_id`,`created_at`,`updated_at`) values 
(1,'Administrador','Sistemas','Talleres','admin@talleres.com',NULL,'$2y$12$0WrOfkGd2r1gvoiYeYqkGOdgGTzdq/JVVmmhuFbL4q2yKXHvO8PpW',NULL,'Sistemas','000000000','49180365113','2001-01-01','F','NB',1,'2025-02-13 20:29:00','2025-02-13 20:29:00'),
(2,'Docente','Taller','Voleibol','docente@talleres.com',NULL,'$2y$12$2F2Llh28VZF5GBAbM/HlceMKriNInPk/YKcHC801tOhFkJTzIfogi',NULL,'Mtro. Educación Motriz','000000000','49180365114','2001-01-01','F','NB',2,'2025-02-13 20:29:00','2025-02-13 20:29:00'),
(3,'Alumno','-','UTVT','alumno@talleres.com',NULL,'$2y$12$TZmIbmFRJTU4sYQTTUeFROHrw2DX8E6SyxZaIr5mx2vAjSKIA18tC',NULL,'Ingenieria en Desarrollo y Gestión de Software','000000000','49180365115','2001-01-01','F','NB',3,'2025-02-13 20:29:01','2025-02-13 20:29:01');

/*Table structure for table `asistencia_porcentaje` */

DROP TABLE IF EXISTS `asistencia_porcentaje`;

/*!50001 DROP VIEW IF EXISTS `asistencia_porcentaje` */;
/*!50001 DROP TABLE IF EXISTS `asistencia_porcentaje` */;

/*!50001 CREATE TABLE  `asistencia_porcentaje`(
 `user_id` bigint(20) unsigned ,
 `total_asistencias` bigint(21) ,
 `total_semanas` bigint(21) ,
 `porcentaje_asistencia` decimal(28,5) 
)*/;

/*View structure for view asistencia_porcentaje */

/*!50001 DROP TABLE IF EXISTS `asistencia_porcentaje` */;
/*!50001 DROP VIEW IF EXISTS `asistencia_porcentaje` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `asistencia_porcentaje` AS select `at`.`user_id` AS `user_id`,count(`a`.`id`) AS `total_asistencias`,(select count(distinct week(`asistencia`.`fecha`)) from `asistencia` where `asistencia`.`periodo_id` = `p`.`id`) AS `total_semanas`,count(`a`.`id`) * 100.0 / nullif((select count(distinct week(`asistencia`.`fecha`)) from `asistencia` where `asistencia`.`periodo_id` = `p`.`id`),0) AS `porcentaje_asistencia` from ((`alumno_tallers` `at` left join `asistencia` `a` on(`at`.`id` = `a`.`alumtalle_id`)) left join `periodos` `p` on(`a`.`periodo_id` = `p`.`id`)) group by `at`.`user_id`,`p`.`id` */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
