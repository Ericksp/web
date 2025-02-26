/*
SQLyog Community
MySQL - 10.4.28-MariaDB-log : Database - parroquia
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `catequesis` */
use database parroquia

CREATE TABLE `catequesis` (
  `codcat` int(11) NOT NULL AUTO_INCREMENT,
  `nomcat` varchar(100) NOT NULL,
  `descat` text NOT NULL,
  `precat` double NOT NULL,
  `cancat` int(11) NOT NULL,
  `estcat` bit(1) NOT NULL,
  PRIMARY KEY (`codcat`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `catequesis` */

insert  into `catequesis`(`codcat`,`nomcat`,`descat`,`precat`,`cancat`,`estcat`) values 
(1,'Catequesis de Bautismo','Niños de 0-7 años',25,50,''),
(2,'Catequesis de Primera Comunión','Niños de 8-10 años',25,50,''),
(3,'Catequesis de Confirmación','Jovenes de 14-18años',25,50,''),
(4,'Catequesis de Novios','Jóvenes y Adultos',900,50,''),
(5,'Catequesis de Adultos','Adultos de 20-60 años',25,50,'');

/*Table structure for table `consulta` */

CREATE TABLE `consulta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres_apellidos` varchar(120) DEFAULT NULL,
  `celular` varchar(25) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `mensaje` tinytext DEFAULT NULL,
  `fecha_registro` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `consulta` */

insert  into `consulta`(`id`,`nombres_apellidos`,`celular`,`correo`,`mensaje`,`fecha_registro`) values 
(2,'PEDRO PABLO','985858536','pablo@gmail.com','Es posible hacer una misa de noche a las 12pm','2024-04-14 23:54:32'),
(3,'MOISES','946886668','linuxmen1@gmail.com','asdasdasd','2024-04-16 18:38:38'),
(5,'JOHN CONNOR','989898989','john@gmail.com','consulta el padre tessa sigue dando misas los domingos','2024-04-17 22:16:09'),
(6,'MARIO','RODRIGUEZ','mario@gmail.com','Mensaje de prueba','2024-04-22 22:18:53');

/*Table structure for table `distrito` */

CREATE TABLE `distrito` (
  `coddis` int(11) NOT NULL AUTO_INCREMENT,
  `nomdis` varchar(50) NOT NULL,
  `estdis` bit(1) NOT NULL,
  PRIMARY KEY (`coddis`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `distrito` */

insert  into `distrito`(`coddis`,`nomdis`,`estdis`) values 
(1,'Ancón',''),
(2,'Ate',''),
(3,'Barranco',''),
(4,'Breña',''),
(5,'Carabayllo',''),
(6,'Chaclacayo',''),
(7,'Chorrillos',''),
(8,'Cieneguilla',''),
(9,'Comas',''),
(10,'El Agustino',''),
(11,'Independencia',''),
(12,'Jesús María',''),
(13,'La Molina',''),
(14,'La Victoria',''),
(15,'Lima',''),
(16,'Lince',''),
(17,'Los Olivos',''),
(18,'Lurigancho',''),
(19,'Lurín',''),
(20,'Magdalena del Mar',''),
(21,'Miraflores',''),
(22,'Pachacámac',''),
(23,'Pucusana',''),
(24,'Pueblo Libre',''),
(25,'Puente Piedra',''),
(26,'Punta Hermosa',''),
(27,'Punta Negra',''),
(28,'Rímac',''),
(29,'San Bartolo',''),
(30,'San Borja',''),
(31,'San Isidro',''),
(32,'San Juan de Lurigancho',''),
(33,'San Juan de Miraflores',''),
(34,'San Luis',''),
(35,'San Martín de Porres',''),
(36,'San Miguel',''),
(37,'Santa Anita',''),
(38,'Santa María del Mar',''),
(39,'Santa Rosa',''),
(40,'Santiago de Surco',''),
(41,'Surquillo',''),
(42,'Villa El Salvador',''),
(43,'Villa María del Triunfo',''),
(44,'Callao',''),
(45,'Bellavista',''),
(46,'Carmen de La Legua-Reynoso',''),
(47,'La Perla',''),
(48,'La Punta',''),
(49,'Ventanilla',''),
(50,'Mi Perú','');

/*Table structure for table `documentos` */

CREATE TABLE `documentos` (
  `coddoc` int(11) NOT NULL AUTO_INCREMENT,
  `nomdoc` varchar(100) NOT NULL,
  `desdoc` text NOT NULL,
  `predoc` double NOT NULL,
  `candoc` int(11) NOT NULL,
  `estdoc` bit(1) NOT NULL,
  `codcat` int(11) NOT NULL,
  PRIMARY KEY (`coddoc`),
  KEY `codcat` (`codcat`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `documentos` */

insert  into `documentos`(`coddoc`,`nomdoc`,`desdoc`,`predoc`,`candoc`,`estdoc`,`codcat`) values 
(1,'Constancia de Bautismo','',30,0,'\0',0),
(2,'Constancia de Primera Comunión','',50,0,'\0',0),
(3,'Constancia de Confirmación','',55,0,'\0',0),
(4,'Constancia de Matrimonio','',60,0,'\0',0);

/*Table structure for table `empleado` */

CREATE TABLE `empleado` (
  `codemp` int(11) NOT NULL AUTO_INCREMENT,
  `nomemp` varchar(50) NOT NULL,
  `apepemp` varchar(50) NOT NULL,
  `apememp` varchar(50) NOT NULL,
  `docemp` varchar(11) NOT NULL,
  `diremp` varchar(100) NOT NULL,
  `telemp` varchar(7) DEFAULT NULL,
  `celemp` varchar(9) NOT NULL,
  `coremp` varchar(100) NOT NULL,
  `sexemp` char(1) NOT NULL,
  `usuemp` varchar(50) NOT NULL,
  `claemp` varchar(50) NOT NULL,
  `estemp` bit(1) NOT NULL,
  `coddis` int(11) NOT NULL,
  `codrol` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`codemp`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `empleado` */

insert  into `empleado`(`codemp`,`nomemp`,`apepemp`,`apememp`,`docemp`,`diremp`,`telemp`,`celemp`,`coremp`,`sexemp`,`usuemp`,`claemp`,`estemp`,`coddis`,`codrol`) values 
(5,'Pedro','Centeno','Trillo','09875656','Av. Pedregal 1250','5462553','991789254','raul.centeno@gmail.com','M','pedro','123456','',18,5),
(6,'Moises','Perez','Acosta','41120623','',NULL,'946886667','linuxmen1@gmail.com','','mramos','123456','\0',0,0);

/*Table structure for table `horario_misa` */

CREATE TABLE `horario_misa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `misa` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `estado` int(11) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `horario_misa` */

insert  into `horario_misa`(`id`,`misa`,`fecha`,`hora`,`fecha_registro`,`estado`) values 
(1,5,'2024-04-17','18:00:00','2024-04-14 23:05:08',0),
(2,3,'2024-04-15','09:00:00','2024-04-14 23:28:07',0),
(3,2,'2024-04-15','09:00:00','2024-04-14 23:31:14',0),
(5,5,'2024-04-15','10:00:00','2024-04-15 08:28:35',0),
(6,6,'2024-04-17','19:00:00','2024-04-15 18:36:39',1),
(7,5,'2024-04-18','09:00:00','2024-04-17 22:09:35',0),
(8,5,'2024-04-18','11:00:00','2024-04-17 22:09:46',1),
(9,3,'2024-04-23','08:00:00','2024-04-22 22:13:05',0),
(10,2,'2024-04-23','12:00:00','2024-04-22 22:13:18',0),
(11,2,'2024-04-23','16:00:00','2024-04-22 22:13:28',1);

/*Table structure for table `misa` */

CREATE TABLE `misa` (
  `codmisa` int(11) NOT NULL AUTO_INCREMENT,
  `nommisa` varchar(100) NOT NULL,
  `desmisa` text NOT NULL,
  `premisa` double NOT NULL,
  `canmisa` int(11) NOT NULL,
  `estmisa` bit(1) NOT NULL,
  PRIMARY KEY (`codmisa`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `misa` */

insert  into `misa`(`codmisa`,`nommisa`,`desmisa`,`premisa`,`canmisa`,`estmisa`) values 
(1,'Misa Comunitaria','Misa Comunitaria de Salud',20,100,''),
(2,'Misa Comunitaria','Misa Comunitaria de Difunto',20,100,''),
(3,'Misa Comunitaria','Misa Comunitaria de Aniversario',20,100,''),
(4,'Misa Personal','Misa Personal de Salud',100,50,''),
(5,'Misa Personal','Misa Personal de Difunto',100,50,''),
(6,'Misa Personal','Misa Personal de Aniversario',100,50,''),
(7,'Misa Personal','Misa Personal de Renovacion de Votos Matrioniales',450,50,''),
(8,'Misa Festivas','Misa Festiva en honor a un Santo',100,50,'');

/*Table structure for table `quejas` */

CREATE TABLE `quejas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(100) DEFAULT NULL,
  `dni` varchar(8) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `queja` tinytext DEFAULT NULL,
  `descripcion` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `quejas` */

/*Table structure for table `reserva` */

CREATE TABLE `reserva` (
  `reserva_id` int(11) NOT NULL AUTO_INCREMENT,
  `servicio` int(11) DEFAULT NULL,
  `codigo_servicio` int(11) DEFAULT NULL,
  `razon_social` varchar(120) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `celular` varchar(30) DEFAULT NULL,
  `destinatario` varchar(120) DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_reserva` date DEFAULT NULL,
  `hora_reserva` time DEFAULT NULL,
  `monto` float(10,2) DEFAULT 0.00,
  PRIMARY KEY (`reserva_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `reserva` */

insert  into `reserva`(`reserva_id`,`servicio`,`codigo_servicio`,`razon_social`,`correo`,`celular`,`destinatario`,`fecha_registro`,`fecha_reserva`,`hora_reserva`,`monto`) values 
(34,1,5,'PEDRO PABLO LEON JARAMILLO','pedro@gmail.com','9855656565','LORENA CARAVEDO','2024-04-17 22:11:15','2024-04-18','09:00:00',100.00),
(35,2,5,'ROSA TORO','rosa@gmail.com','977777777',NULL,'2024-04-17 22:13:04',NULL,NULL,25.00),
(36,3,4,'LUIS GODOY','luis@gmail.com','989999999',NULL,'2024-04-17 22:14:10',NULL,NULL,60.00),
(37,2,1,'Moises RAMOS','linuxmen1@gmail.com','946886667',NULL,'2024-04-18 16:45:48',NULL,NULL,25.00),
(38,3,3,'álberto PAREDES','macostafran@gmail.com','9468866667',NULL,'2024-04-22 22:15:33',NULL,NULL,55.00),
(39,1,2,'CAROLINA SIFUENTES','carolina@gmail.com','98589586','LAURA BRICELL','2024-04-22 22:16:46','2024-04-23','12:00:00',20.00),
(40,2,3,'LUIS GALLEGOS','luis@gmail.com','9898989898',NULL,'2024-04-22 22:18:01',NULL,NULL,25.00);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
