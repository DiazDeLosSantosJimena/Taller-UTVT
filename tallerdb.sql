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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `alumno_tallers` */

insert  into `alumno_tallers`(`id`,`user_id`,`taller_id`,`constancia`,`estatus`,`created_at`,`updated_at`) values 
(1,27,1,0,'Activo','2025-02-25 23:59:33','2025-02-25 23:59:33'),
(2,37,1,0,'Activo','2025-02-25 23:59:33','2025-02-25 23:59:33'),
(3,36,1,0,'Activo','2025-02-25 23:59:33','2025-02-25 23:59:33'),
(4,20,2,0,'Activo','2025-02-25 23:59:33','2025-02-25 23:59:33'),
(5,33,2,0,'Activo','2025-02-25 23:59:33','2025-02-25 23:59:33'),
(6,13,2,0,'Activo','2025-02-25 23:59:33','2025-02-25 23:59:33'),
(7,17,3,0,'Activo','2025-02-25 23:59:33','2025-02-25 23:59:33'),
(8,32,3,0,'Activo','2025-02-25 23:59:33','2025-02-25 23:59:33'),
(9,21,3,0,'Activo','2025-02-25 23:59:33','2025-02-25 23:59:33'),
(10,15,4,0,'Activo','2025-02-25 23:59:33','2025-02-25 23:59:33'),
(11,22,4,0,'Activo','2025-02-25 23:59:33','2025-02-25 23:59:33'),
(12,24,4,0,'Activo','2025-02-25 23:59:33','2025-02-25 23:59:33'),
(13,28,5,0,'Activo','2025-02-25 23:59:33','2025-02-25 23:59:33'),
(14,26,5,0,'Activo','2025-02-25 23:59:33','2025-02-25 23:59:33'),
(15,19,5,0,'Activo','2025-02-25 23:59:33','2025-02-25 23:59:33'),
(16,17,6,0,'Activo','2025-02-25 23:59:33','2025-02-25 23:59:33'),
(17,26,6,0,'Activo','2025-02-25 23:59:33','2025-02-25 23:59:33'),
(18,25,6,0,'Activo','2025-02-25 23:59:33','2025-02-25 23:59:33'),
(19,37,7,0,'Activo','2025-02-25 23:59:33','2025-02-25 23:59:33'),
(20,24,7,0,'Activo','2025-02-25 23:59:33','2025-02-25 23:59:33'),
(21,22,7,0,'Activo','2025-02-25 23:59:33','2025-02-25 23:59:33'),
(22,36,8,0,'Activo','2025-02-25 23:59:33','2025-02-25 23:59:33'),
(23,16,8,0,'Activo','2025-02-25 23:59:33','2025-02-25 23:59:33'),
(24,17,8,0,'Activo','2025-02-25 23:59:33','2025-02-25 23:59:33'),
(25,32,9,0,'Activo','2025-02-25 23:59:33','2025-02-25 23:59:33'),
(26,25,9,0,'Activo','2025-02-25 23:59:33','2025-02-25 23:59:33'),
(27,20,9,0,'Activo','2025-02-25 23:59:33','2025-02-25 23:59:33'),
(28,27,3,0,'activo','2025-02-26 02:09:18','2025-02-26 02:09:18'),
(30,11,7,0,'Activo','2025-03-12 21:08:34','2025-03-12 21:08:34');

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `asistencia` */

insert  into `asistencia`(`id`,`alumtalle_id`,`periodo_id`,`fecha`,`created_at`,`updated_at`) values 
(1,7,1,'2025-02-11','2025-02-18 00:05:49','2025-02-26 00:05:49'),
(2,8,1,'2025-02-21','2025-02-26 00:09:18','2025-02-26 00:09:18'),
(3,7,1,'2025-02-18','2025-02-26 00:44:14','2025-02-26 00:44:14'),
(4,9,1,'2025-02-05','2025-02-26 00:44:14','2025-02-26 00:44:14'),
(5,7,1,'2025-02-25','2025-02-26 00:45:22','2025-02-26 00:45:22'),
(6,8,1,'2025-02-25','2025-02-26 00:54:38','2025-02-26 00:54:38'),
(7,9,1,'2025-02-25','2025-02-26 00:56:51','2025-02-26 00:56:51'),
(8,1,1,'2025-03-04','2025-03-04 20:43:30','2025-03-04 20:43:30'),
(9,3,1,'2025-03-04','2025-03-04 20:43:30','2025-03-04 20:43:30'),
(10,7,1,'2025-03-05','2025-03-05 19:10:36','2025-03-05 19:10:36'),
(11,9,1,'2025-03-05','2025-03-05 19:10:36','2025-03-05 19:10:36'),
(12,3,1,'2025-03-12','2025-03-12 22:04:49','2025-03-12 22:04:49'),
(13,2,1,'2025-03-12','2025-03-12 22:21:53','2025-03-12 22:21:53'),
(14,2,1,'2025-03-12','2025-03-12 22:25:28','2025-03-12 22:25:28'),
(15,1,1,'2025-03-12','2025-03-12 22:25:28','2025-03-12 22:25:28');

/*Table structure for table `avisos` */

DROP TABLE IF EXISTS `avisos`;

CREATE TABLE `avisos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `taller_id` bigint(20) unsigned NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `avisos_user_id_foreign` (`user_id`),
  KEY `avisos_taller_id_foreign` (`taller_id`),
  CONSTRAINT `avisos_taller_id_foreign` FOREIGN KEY (`taller_id`) REFERENCES `talleres` (`id`),
  CONSTRAINT `avisos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `avisos` */

insert  into `avisos`(`id`,`user_id`,`taller_id`,`titulo`,`descripcion`,`imagen`,`created_at`,`updated_at`) values 
(1,4,3,'Torneo de Voleibol','El día viernes habrá un torneo para todos los equipos interesados en el taller de Voleibol, junta a tus amigos y únanse a los partidos. El ganador recibirá un premio y la posibilidad de otorgar su constancia sin importar el porcentaje de asistencias de los integrantes.',NULL,'2025-02-26 01:03:30','2025-02-26 01:03:30'),
(2,2,1,'Por la constancia!','Junta a tu equipo para que represente a tu carrera y enfrentate contra las demás para saber que carrera sabe jugar a futbol! Para más información asistir a la bodega a un lado de la papelería.',NULL,'2025-03-12 22:48:35','2025-03-12 22:48:35');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `docente_tallers` */

insert  into `docente_tallers`(`id`,`user_id`,`taller_id`,`created_at`,`updated_at`) values 
(2,3,2,'2025-02-25 23:31:33','2025-02-25 23:31:33'),
(3,4,3,'2025-02-25 23:32:30','2025-02-25 23:32:30'),
(4,5,4,'2025-02-25 23:32:38','2025-02-25 23:32:38'),
(5,6,5,'2025-02-25 23:33:02','2025-02-25 23:33:02'),
(6,7,6,'2025-02-25 23:33:07','2025-02-25 23:33:07'),
(7,2,1,'2025-03-05 23:59:04','2025-03-05 23:59:04');

/*Table structure for table `eventos` */

DROP TABLE IF EXISTS `eventos`;

CREATE TABLE `eventos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `imagen` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `eventos_user_id_foreign` (`user_id`),
  CONSTRAINT `eventos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `eventos` */

insert  into `eventos`(`id`,`user_id`,`titulo`,`imagen`,`created_at`,`updated_at`) values 
(1,1,'Exposición de Arte','20250315011237_artes.jpg','2025-03-15 01:12:37','2025-03-15 01:12:37'),
(2,1,'Convenio de colaboración','20250315013021_convenio.jpg','2025-03-15 01:30:21','2025-03-15 01:30:21');

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(9,'2025_01_18_040441_create_alumno_taller_table',1),
(10,'2025_01_18_040456_create_docentetaller_table',1),
(11,'2025_01_19_040515_create_asistencia_table',1),
(12,'2025_02_10_213502_create_porcentaje_view',1),
(13,'2025_02_21_002933_create_eventos',1),
(14,'2025_02_21_003002_create_avisos',1);

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
(1,'2025-01-06','2025-04-15','2025-02-25 23:31:02','2025-02-25 23:31:02');

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
  `titulo` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL,
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
(1,'Administrador','2025-02-25 02:00:19','2025-02-25 02:00:19'),
(2,'Docente','2025-02-25 02:00:19','2025-02-25 02:00:19'),
(3,'Alumno','2025-02-25 02:00:19','2025-02-25 02:00:19');

/*Table structure for table `talleres` */

DROP TABLE IF EXISTS `talleres`;

CREATE TABLE `talleres` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_taller` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `horarios_img` text NOT NULL,
  `imagen` text NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `estatus` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `talleres` */

insert  into `talleres`(`id`,`nombre_taller`,`descripcion`,`horarios_img`,`imagen`,`tipo`,`estatus`,`created_at`,`updated_at`) values 
(1,'Futbol','Deporte de equipo donde 11 jugadores buscan anotar goles pateando un balón en la portería contraria. Se juega en una cancha rectangular y gana el equipo con más goles.','FUTBOL.jpg','futbolSoccer.jpg','Deportivo','Activo','2025-02-25 02:00:27','2025-02-25 02:00:27'),
(2,'Basquetbol','Deporte de equipo donde 5 jugadores buscan anotar puntos en una canasta contraria. Se juega en una cancha rectangular y gana el equipo con más puntos.','BASQUETBOL.jpg','basquetbol.jpg','Deportivo','Activo','2025-02-25 02:00:27','2025-02-25 02:00:27'),
(3,'Voleibol','Es un deporte donde dos equipos se enfrentan sobre un terreno de juego liso separados por una red central, tratando de pasar el balón por encima de la red hacia el suelo del campo contrario.','VOLEIBOL.jpg','voleibol.jpg','Deportivo','Activo','2025-02-25 02:00:27','2025-02-25 02:00:27'),
(4,'Tocho Bandera','Es un deporte de equipo donde dos equipos buscan anotar puntos llevando un balón hacia la zona de anotación contraria. Se juega en una cancha rectangular y gana el equipo con más puntos.','TOCHO.jpg','tocho.jpg','Deportivo','Activo','2025-02-25 02:00:27','2025-02-25 02:00:27'),
(5,'Danza','Es una forma de arte que se refiere al movimiento del cuerpo rítmicamente en un espacio determinado, con el propósito de expresar una idea o sentimiento, liberar energía, o simplemente disfrutar del movimiento.','DANZA.jpg','danza.jpg','Cultural','Activo','2025-02-25 02:00:27','2025-02-25 02:00:27'),
(6,'Rondalla','Agrupación musical que interpreta canciones con instrumentos de cuerda, como guitarras y laúdes, generalmente con un estilo romántico y tradicional.','RONDALLA.jpg','rondalla.jpg','Cultural','Activo','2025-02-25 02:00:27','2025-02-25 02:00:27'),
(7,'Teatro','Es una forma de arte donde los actores representan una historia o situación frente a un público. Se puede realizar en un escenario o en un espacio abierto.','TEATRO.jpg','teatro.jpg','Cultural','Activo','2025-02-25 02:00:27','2025-02-25 02:00:27'),
(8,'Ortografía y Redacción','Taller enfocado en mejorar la escritura y la redacción de textos, así como en el correcto uso de la ortografía y la gramática.','ORTOGRAFIA_Y_REDACCION.jpg','redaccion.jpg','Cultural','Activo','2025-02-25 02:00:27','2025-02-25 02:00:27'),
(9,'Artes Visuales','Taller enfocado en la creación de obras de arte visuales, como pinturas, dibujos, esculturas, fotografías, entre otras.','ARTES.jpg','artesVisuales.jpg','Cultural','Activo','2025-02-25 02:00:27','2025-02-25 02:00:27');

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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`app`,`apm`,`email`,`email_verified_at`,`password`,`remember_token`,`carrera`,`matricula`,`nss`,`fecha_nac`,`sexo`,`genero`,`rol_id`,`created_at`,`updated_at`) values 
(1,'Administrador','Sistemas','Talleres','admin@utvt.com',NULL,'$2y$12$LCtFILZMx1XU/REhIrHeT.48sOmluvVVOcPQMqu0irziCwnAEiyxO',NULL,'Sistemas','000000000','49180365113','2001-01-01','F','NB',1,'2025-02-25 02:00:19','2025-02-25 02:00:19'),
(2,'Docente','1','UTVT','docente1@utvt.com',NULL,'$2y$12$p7bBkyMIfSrB/kqvQsMii.a8IgfqP2xNv.1p4NceuzfNvYwTt0DyS',NULL,'Mtro. Educación Motriz','000000000','49180000000','2001-01-01','F','NB',2,'2025-02-25 02:00:20','2025-02-25 02:00:20'),
(3,'Docente','2','UTVT','docente2@utvt.com',NULL,'$2y$12$ccpULKdrxmdU4XIeQFuSi.1JRWie7lvYCxQe4EJXukfxbHFsTiaDi',NULL,'Mtro. Educación Motriz','000000000','49180000001','2001-01-01','F','NB',2,'2025-02-25 02:00:20','2025-02-25 02:00:20'),
(4,'Docente','3','UTVT','docente3@utvt.com',NULL,'$2y$12$P8GsxFeSHbEJFg9RDu7q7.4vmhI4mhwgHotvKjrC9BYPF.cP/eLdi',NULL,'Mtro. Educación Motriz','000000000','49180000002','2001-01-01','F','NB',2,'2025-02-25 02:00:20','2025-02-25 02:00:20'),
(5,'Docente','4','UTVT','docente4@utvt.com',NULL,'$2y$12$Hs8gL4/P96Ywa9UULLdazeeUCM6rDoQV2X6gy/CrQAXqSAIKvmHmi',NULL,'Mtro. Educación Motriz','000000000','49180000003','2001-01-01','F','NB',2,'2025-02-25 02:00:20','2025-02-25 02:00:20'),
(6,'Docente','5','UTVT','docente5@utvt.com',NULL,'$2y$12$UXPgtE1txz/m/FCa.jYRAuwco.qrZ6BSyUXbshwPGVaRKjYG2F88.',NULL,'Mtro. Educación Motriz','000000000','49180000004','2001-01-01','F','NB',2,'2025-02-25 02:00:21','2025-02-25 02:00:21'),
(7,'Docente','6','UTVT','docente6@utvt.com',NULL,'$2y$12$dRVKweNAvJv.0uXmOfUin.I4llfbfnM1YHEDesIgWaWkTn6wQDIfm',NULL,'Mtro. Educación Motriz','000000000','49180000005','2001-01-01','F','NB',2,'2025-02-25 02:00:21','2025-02-25 02:00:21'),
(8,'Docente','7','UTVT','docente7@utvt.com',NULL,'$2y$12$3ZCqCBI12CUOOUUa6fKRZO5v.oIbr79Fd987BdMpoI8m2n9yj01ya',NULL,'Mtro. Educación Motriz','000000000','49180000006','2001-01-01','F','NB',2,'2025-02-25 02:00:21','2025-02-25 02:00:21'),
(9,'Docente','8','UTVT','docente8@utvt.com',NULL,'$2y$12$4VhJOGFZVds7bSPD52jvw.wPNXnShQLw4b5PEvUoLjhYJfppzfQ8i',NULL,'Mtro. Educación Motriz','000000000','49180000007','2001-01-01','F','NB',2,'2025-02-25 02:00:21','2025-02-25 02:00:21'),
(10,'Docente','9','UTVT','docente9@utvt.com',NULL,'$2y$12$XTPf7x28Z0BmYQVGBvsLjeWozzq7oMiDqn43o1lsRg/.AREppAMU.',NULL,'Mtro. Educación Motriz','000000000','49180000008','2001-01-01','F','NB',2,'2025-02-25 02:00:21','2025-02-25 02:00:21'),
(11,'Alumno','1','UTVT','alumno1@utvt.com',NULL,'$2y$12$Ulg936GEUSBeQ2bsnnVkJewM3f9ZOsHzgsIoGRCl12Gd/RZcieO/u',NULL,'ING. Redes Inteligentes y Ciberseguridad.','000000001','49180000009','2003-08-06','M','SN',3,'2025-02-25 02:00:22','2025-02-25 02:00:22'),
(12,'Alumno','2','UTVT','alumno2@utvt.com',NULL,'$2y$12$Zr2v3bkJeWwvLlk4Xe8CN.d7BQQpsm9gMEwtblSxz53j2tS45NQwC',NULL,'LIC. Innovación de Negocios y Mercadotecnica.','000000002','49180000010','2004-03-09','F','SN',3,'2025-02-25 02:00:22','2025-02-25 02:00:22'),
(13,'Alumno','3','UTVT','alumno3@utvt.com',NULL,'$2y$12$iwt6aezirenXv5f.tw5awub9JlSW6H/5GhxSozu5pPlmQLa.zLOZu',NULL,'ING. Sistemas Productivos.','000000003','49180000011','2005-09-22','F','SN',3,'2025-02-25 02:00:22','2025-02-25 02:00:22'),
(14,'Alumno','4','UTVT','alumno4@utvt.com',NULL,'$2y$12$MDNU4/4Obi2j4pwCve6O4ecuYrJbDoDUGGkx9.bZoK.O5vzeooqwG',NULL,'T.S.U Mantenimiento, Área industrial.','000000004','49180000012','2003-03-08','M','SN',3,'2025-02-25 02:00:22','2025-02-25 02:00:22'),
(15,'Alumno','5','UTVT','alumno5@utvt.com',NULL,'$2y$12$EVCGJWs4VbGfdi.T7DCc2.yNBlQDzXiMhk5Lr4tiPAnTwZaatJGlG',NULL,'T.S.U Química, Área Tecnología Ambiental.','000000005','49180000013','2005-08-03','M','SN',3,'2025-02-25 02:00:23','2025-02-25 02:00:23'),
(16,'Alumno','6','UTVT','alumno6@utvt.com',NULL,'$2y$12$GEKk5Z.6HNQKpv.NWx5v..WuYn1ncDZrladwnNfkHLwGp.7Ar5ba.',NULL,'ING. Mecatrónica.','000000006','49180000014','2005-06-17','F','SN',3,'2025-02-25 02:00:23','2025-02-25 02:00:23'),
(17,'Alumno','7','UTVT','alumno7@utvt.com',NULL,'$2y$12$VTcvFRCdCu5TU2Jn/y4wxOpgFyvNJ3dQ8HWXLJ9.2HPQAdwphVfnG',NULL,'T.S.U Mecatrónica, Área Sistermas Manufactura Flexible.','000000007','49180000015','2005-09-25','F','SN',3,'2025-02-25 02:00:23','2025-02-25 02:00:23'),
(18,'Alumno','8','UTVT','alumno8@utvt.com',NULL,'$2y$12$iBKk8kHItMzXC3LSzeW9JurqEhHRtwLHRjThN32ZHSrIzH9FgNmei',NULL,'ING. Mantenimiento Industrial.','000000008','49180000016','2003-04-30','M','SN',3,'2025-02-25 02:00:23','2025-02-25 02:00:23'),
(19,'Alumno','9','UTVT','alumno9@utvt.com',NULL,'$2y$12$E.i6j2qF6LX/lTY6x8Qav.4aKp1i2t2XVhiu6YlgH6kQW7H76b52C',NULL,'LIC. Innovación de Negocios y Mercadotecnica.','000000009','49180000017','2004-09-13','M','SN',3,'2025-02-25 02:00:23','2025-02-25 02:00:23'),
(20,'Alumno','10','UTVT','alumno10@utvt.com',NULL,'$2y$12$ZiG45QRBJn.cgVhZOcu2MeXvNUdLQTEQBovjF64Jg5M2ZszWhWJOy',NULL,'T.S.U Mantenimiento, Área industrial.','0000000010','49180000018','2005-10-19','F','SN',3,'2025-02-25 02:00:24','2025-02-25 02:00:24'),
(21,'Alumno','11','UTVT','alumno11@utvt.com',NULL,'$2y$12$9L9qwCztTZtZpv83RAMsSOE/ja5mTDqpHeswZf3xH3T4TBIvWYwSW',NULL,'T.S.U Mantenimiento, Área industrial.','0000000011','49180000019','2004-05-22','M','SN',3,'2025-02-25 02:00:24','2025-02-25 02:00:24'),
(22,'Alumno','12','UTVT','alumno12@utvt.com',NULL,'$2y$12$iScTn58mmeB2Hijf.Z/fj.7OlVwSZlBxl99WmHm9TEieghsSfnjj.',NULL,'T.S.U Desarrollo de Negocios, Área Ventas.','0000000012','49180000020','2003-03-09','F','SN',3,'2025-02-25 02:00:24','2025-02-25 02:00:24'),
(23,'Alumno','13','UTVT','alumno13@utvt.com',NULL,'$2y$12$un30sl0NYAMVO5st26jjM.zpN176UrT5JdqiAKI636W/2DBRoasWu',NULL,'LIC. Protección Civil y Emergencias.','0000000013','49180000021','2005-09-18','M','SN',3,'2025-02-25 02:00:24','2025-02-25 02:00:24'),
(24,'Alumno','14','UTVT','alumno14@utvt.com',NULL,'$2y$12$PctcwSNG6CCQaAY0lznk8.DPpx25ygv3.DsXQbQovHCXIRRJ2Zym.',NULL,'LIC. Innovación de Negocios y Mercadotecnica.','0000000014','49180000022','2005-10-12','M','SN',3,'2025-02-25 02:00:25','2025-02-25 02:00:25'),
(25,'Alumno','15','UTVT','alumno15@utvt.com',NULL,'$2y$12$hCS4P4tfbuSRdVn4MprVMO2n7bka0dda4lkFKCF1cnlzeWULiATZa',NULL,'T.S.U Tecnologías de la información, Área infraestructura de Redes Digitales.','0000000015','49180000023','2004-11-12','F','SN',3,'2025-02-25 02:00:25','2025-02-25 02:00:25'),
(26,'Alumno','16','UTVT','alumno16@utvt.com',NULL,'$2y$12$ScULsyKWOD/jvdr1cEnsHuoxABqIgaaXyTEXlVE5/qBnOVfJoDdU.',NULL,'ING. Mecatrónica.','0000000016','49180000024','2005-03-28','F','SN',3,'2025-02-25 02:00:25','2025-02-25 02:00:25'),
(27,'Alumno','17','UTVT','alumno17@utvt.com',NULL,'$2y$12$uvp5SSPaClIDPSD.R7XAau.I9iNOPLB8ZU58ojJC5WdxjzKsGuaKO',NULL,'T.S.U Procesos Industriales, Área Manufactura.','0000000017','49180000025','2005-08-21','F','SN',3,'2025-02-25 02:00:25','2025-02-25 02:00:25'),
(28,'Alumno','18','UTVT','alumno18@utvt.com',NULL,'$2y$12$2GO3ISUsrLgacLefU0fogesTrZsgLVjfS3rLsjs9T3z9OJooZJfE2',NULL,'ING. Mecatrónica.','0000000018','49180000026','2004-06-30','F','SN',3,'2025-02-25 02:00:25','2025-02-25 02:00:25'),
(29,'Alumno','19','UTVT','alumno19@utvt.com',NULL,'$2y$12$kE5uNPOnFBCAVgtNL7c0HeXv.8F5Q8OXE/60oJiDcn1WuOdxOtRFK',NULL,'ING. Mantenimiento Industrial.','0000000019','49180000027','2003-11-28','F','SN',3,'2025-02-25 02:00:26','2025-02-25 02:00:26'),
(30,'Alumno','20','UTVT','alumno20@utvt.com',NULL,'$2y$12$VN5rSgLmVPHFlLCaBRtkquaTECIf.QlYJP1X9EL0WBLH.NvGM2cr2',NULL,'ING. Redes Inteligentes y Ciberseguridad.','0000000020','49180000028','2003-08-20','F','SN',3,'2025-02-25 02:00:26','2025-02-25 02:00:26'),
(31,'Alumno','21','UTVT','alumno21@utvt.com',NULL,'$2y$12$ESa0Ug8XWcODnGEFlj2dceFTG9aa5ipslW6pFZVdF4B3tUmauzyZm',NULL,'T.S.U Química, Área Tecnología Ambiental.','0000000021','49180000029','2003-07-30','F','SN',3,'2025-02-25 02:00:26','2025-02-25 02:00:26'),
(32,'Alumno','22','UTVT','alumno22@utvt.com',NULL,'$2y$12$TrJEqVu/y.bcT60xbDhj8uRXn4LoDIhLHJbdSxxGlisYyhYaT99F.',NULL,'ING. Mecatrónica.','0000000022','49180000030','2005-03-14','M','SN',3,'2025-02-25 02:00:26','2025-02-25 02:00:26'),
(33,'Alumno','23','UTVT','alumno23@utvt.com',NULL,'$2y$12$jcWKVBpLmsK/yPveKuxrMuFBBORqbwWNQuyexWG6vx1hefh14gJGW',NULL,'LIC. Enfermería.','0000000023','49180000031','2003-05-03','F','SN',3,'2025-02-25 02:00:27','2025-02-25 02:00:27'),
(34,'Alumno','24','UTVT','alumno24@utvt.com',NULL,'$2y$12$6aKowYfCWHsvD315Qm/nUugP/dgEYWdb4kC6HzmiOo3Hrg.JwTohq',NULL,'ING. Tecnología Ambiental.','0000000024','49180000032','2003-01-13','F','SN',3,'2025-02-25 02:00:27','2025-02-25 02:00:27'),
(35,'Alumno','25','UTVT','alumno25@utvt.com',NULL,'$2y$12$5cDdzuksryHLiZ45lpXf8uUn9d9vHXi7yvbY4574NTP4TY7EjJANq',NULL,'T.S.U Química, Área Tecnología Ambiental.','0000000025','49180000033','2003-10-30','M','SN',3,'2025-02-25 02:00:27','2025-02-25 02:00:27'),
(36,'Alumno','26','UTVT','alumno26@utvt.com',NULL,'$2y$12$cZDEXpdQQGtrfV1E3IwyZOcT8WstT356uSUCToeoicrmXCbtaOAsi',NULL,'T.S.U Mecatrónica, Área Sistermas Manufactura Flexible.','0000000026','49180000034','2005-05-13','F','SN',3,'2025-02-25 02:00:27','2025-02-25 02:00:27'),
(37,'Alumno','27','UTVT','alumno27@utvt.com',NULL,'$2y$12$x9APxKyHwToTrPB6114iIOnCu0pFqwl.a3PITEkwtdaF5i5DNJpoK',NULL,'T.S.U Desarrollo de Negocios, Área Ventas.','0000000027','49180000035','2003-06-01','M','SN',3,'2025-02-25 02:00:27','2025-02-25 02:00:27');

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
