/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.7.19 : Database - dbimportadora
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dbimportadora` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `dbimportadora`;

/*Table structure for table `detalle_oc` */

DROP TABLE IF EXISTS `detalle_oc`;

CREATE TABLE `detalle_oc` (
  `id_oc` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `sub_total` int(11) DEFAULT NULL,
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `detalle_oc` */

/*Table structure for table `orden_compra` */

DROP TABLE IF EXISTS `orden_compra`;

CREATE TABLE `orden_compra` (
  `id_oc` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_emision` datetime DEFAULT NULL,
  `total_oc` int(11) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_oc`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `orden_compra` */

/*Table structure for table `perfil` */

DROP TABLE IF EXISTS `perfil`;

CREATE TABLE `perfil` (
  `id_perfil` char(3) NOT NULL,
  `descripcion_perfil` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `perfil` */

/*Table structure for table `producto` */

DROP TABLE IF EXISTS `producto`;

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(30) DEFAULT NULL,
  `precio_unidad` int(11) DEFAULT NULL,
  `id_tipo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `producto` */

/*Table structure for table `tipo_producto` */

DROP TABLE IF EXISTS `tipo_producto`;

CREATE TABLE `tipo_producto` (
  `id_tipoproducto` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion_tipo` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_tipoproducto`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tipo_producto` */

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `login_usuario` varchar(40) DEFAULT NULL,
  `pass_usuario` varchar(40) DEFAULT NULL,
  `nombre_usuario` varchar(40) DEFAULT NULL,
  `apellido_usuario` varchar(40) DEFAULT NULL,
  `correo_usuario` varchar(40) DEFAULT NULL,
  `edad_usuario` int(11) DEFAULT NULL,
  `codigo_perfil` char(3) DEFAULT NULL,
  `fechaNacimiento_usuario` datetime DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `usuario` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
