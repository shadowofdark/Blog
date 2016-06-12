/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.6.16 : Database - blog
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`blog` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `blog`;

/*Table structure for table `chat` */

DROP TABLE IF EXISTS `chat`;

CREATE TABLE `chat` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `username` varchar(55) NOT NULL,
  `mensaje` varchar(255) DEFAULT NULL,
  `fecha` varchar(50) DEFAULT NULL,
  `destinatario` varchar(55) NOT NULL,
  `asunto` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `chat` */

insert  into `chat`(`id`,`username`,`mensaje`,`fecha`,`destinatario`,`asunto`) values (1,'admin','mensaje nuevo','hoy','admin','esto es un asunto'),(2,'admin','','6-6-2016','admin','Mensaje de Prueba'),(3,'admin','contenido del mensaje\r\n','6-6-2016','admin','Asunto del mensaje'),(4,'admin','Mensaje mensaje mensaje','6-6-2016','Daniela','Mensaje de Prueba');

/*Table structure for table `comentario` */

DROP TABLE IF EXISTS `comentario`;

CREATE TABLE `comentario` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `fk_usuario` varchar(30) DEFAULT NULL,
  `comentario` text,
  PRIMARY KEY (`id`),
  KEY `fk_usuario` (`fk_usuario`),
  CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`fk_usuario`) REFERENCES `usuario` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `comentario` */

/*Table structure for table `datos` */

DROP TABLE IF EXISTS `datos`;

CREATE TABLE `datos` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `fk_usuario` varchar(30) NOT NULL,
  `fecha` varchar(50) NOT NULL,
  `contenido` text NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `fk_comentario` int(15) DEFAULT NULL,
  `archivo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comentario` (`fk_comentario`),
  KEY `fk_usuario` (`fk_usuario`),
  CONSTRAINT `datos_ibfk_2` FOREIGN KEY (`fk_comentario`) REFERENCES `comentario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `datos` */

insert  into `datos`(`id`,`fk_usuario`,`fecha`,`contenido`,`titulo`,`fk_comentario`,`archivo`) values (5,'admin','6-6-2016','Contenido de Entrada','Titulo de Entrada',NULL,NULL);

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `username` varchar(30) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `estado` int(1) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `usuario` */

insert  into `usuario`(`username`,`nombre`,`apellido`,`imagen`,`email`,`password`,`estado`) values ('admin','Administrador','Administrador',NULL,NULL,'12345',1),('Daniela','Daniela','Garro',NULL,NULL,'12345',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
