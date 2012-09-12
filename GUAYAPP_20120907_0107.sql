-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.22-0ubuntu1


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema guayapp
--

CREATE DATABASE IF NOT EXISTS guayapp;
USE guayapp;

--
-- Definition of table `guayapp`.`gua_alojamientos`
--

DROP TABLE IF EXISTS `guayapp`.`gua_alojamientos`;
CREATE TABLE  `guayapp`.`gua_alojamientos` (
  `al_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `al_descripcion` varchar(300) NOT NULL,
  `al_costo` varchar(20) NOT NULL,
  `al_longitud` varchar(20) NOT NULL,
  `al_latitud` varchar(20) NOT NULL,
  `al_telefonos` varchar(50) NOT NULL,
  `al_paginaweb` varchar(20) NOT NULL,
  `ref_tipo` bigint(20) NOT NULL,
  `al_estado` char(2) NOT NULL,
  PRIMARY KEY (`al_id`),
  KEY `fk_al_tipo` (`ref_tipo`),
  CONSTRAINT `fk_al_tipo` FOREIGN KEY (`ref_tipo`) REFERENCES `gua_detalle_tipos` (`de_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guayapp`.`gua_alojamientos`
--

/*!40000 ALTER TABLE `gua_alojamientos` DISABLE KEYS */;
LOCK TABLES `gua_alojamientos` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `gua_alojamientos` ENABLE KEYS */;


--
-- Definition of table `guayapp`.`gua_atractivos`
--

DROP TABLE IF EXISTS `guayapp`.`gua_atractivos`;
CREATE TABLE  `guayapp`.`gua_atractivos` (
  `at_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `at_descripcion` varchar(400) NOT NULL,
  `at_imagen` varchar(100) NOT NULL,
  `ref_tipo` bigint(20) NOT NULL,
  `at_longitud` varchar(20) NOT NULL,
  `at_latitud` varchar(20) NOT NULL,
  `at_estado` char(2) NOT NULL,
  PRIMARY KEY (`at_id`),
  KEY `fk_at_tipo` (`ref_tipo`),
  CONSTRAINT `fk_at_tipo` FOREIGN KEY (`ref_tipo`) REFERENCES `gua_detalle_tipos` (`de_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guayapp`.`gua_atractivos`
--

/*!40000 ALTER TABLE `gua_atractivos` DISABLE KEYS */;
LOCK TABLES `gua_atractivos` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `gua_atractivos` ENABLE KEYS */;


--
-- Definition of table `guayapp`.`gua_centro_comerciales`
--

DROP TABLE IF EXISTS `guayapp`.`gua_centro_comerciales`;
CREATE TABLE  `guayapp`.`gua_centro_comerciales` (
  `cc_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `cc_descripcion` varchar(300) NOT NULL,
  `cc_longitud` varchar(20) NOT NULL,
  `cc_latitud` varchar(20) NOT NULL,
  `ref_zona` bigint(20) NOT NULL,
  `cc_estado` char(2) NOT NULL,
  PRIMARY KEY (`cc_id`),
  KEY `fk_cc_zona` (`ref_zona`),
  CONSTRAINT `fk_cc_zona` FOREIGN KEY (`ref_zona`) REFERENCES `gua_detalle_zonas` (`dz_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guayapp`.`gua_centro_comerciales`
--

/*!40000 ALTER TABLE `gua_centro_comerciales` DISABLE KEYS */;
LOCK TABLES `gua_centro_comerciales` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `gua_centro_comerciales` ENABLE KEYS */;


--
-- Definition of table `guayapp`.`gua_comida`
--

DROP TABLE IF EXISTS `guayapp`.`gua_comida`;
CREATE TABLE  `guayapp`.`gua_comida` (
  `co_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `co_descripcion` varchar(300) NOT NULL,
  `co_lugar` varchar(100) NOT NULL,
  `co_latitud` varchar(20) NOT NULL,
  `co_longitud` varchar(20) NOT NULL,
  `ref_tipo` bigint(20) NOT NULL,
  `co_estado` char(2) NOT NULL,
  PRIMARY KEY (`co_id`),
  KEY `fk_co_tipo` (`ref_tipo`),
  CONSTRAINT `fk_co_tipo` FOREIGN KEY (`ref_tipo`) REFERENCES `gua_detalle_tipos` (`de_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guayapp`.`gua_comida`
--

/*!40000 ALTER TABLE `gua_comida` DISABLE KEYS */;
LOCK TABLES `gua_comida` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `gua_comida` ENABLE KEYS */;


--
-- Definition of table `guayapp`.`gua_detalle_tipos`
--

DROP TABLE IF EXISTS `guayapp`.`gua_detalle_tipos`;
CREATE TABLE  `guayapp`.`gua_detalle_tipos` (
  `de_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `de_descripcion` varchar(100) NOT NULL,
  `de_estado` char(2) NOT NULL,
  PRIMARY KEY (`de_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guayapp`.`gua_detalle_tipos`
--

/*!40000 ALTER TABLE `gua_detalle_tipos` DISABLE KEYS */;
LOCK TABLES `gua_detalle_tipos` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `gua_detalle_tipos` ENABLE KEYS */;


--
-- Definition of table `guayapp`.`gua_detalle_zonas`
--

DROP TABLE IF EXISTS `guayapp`.`gua_detalle_zonas`;
CREATE TABLE  `guayapp`.`gua_detalle_zonas` (
  `dz_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `dz_descripcion` varchar(100) NOT NULL,
  `dz_estado` char(2) NOT NULL,
  PRIMARY KEY (`dz_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guayapp`.`gua_detalle_zonas`
--

/*!40000 ALTER TABLE `gua_detalle_zonas` DISABLE KEYS */;
LOCK TABLES `gua_detalle_zonas` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `gua_detalle_zonas` ENABLE KEYS */;


--
-- Definition of table `guayapp`.`gua_diversion_nocturna`
--

DROP TABLE IF EXISTS `guayapp`.`gua_diversion_nocturna`;
CREATE TABLE  `guayapp`.`gua_diversion_nocturna` (
  `dn_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `dn_descripcion` varchar(300) NOT NULL,
  `dn_latitud` varchar(20) NOT NULL,
  `dn_longitud` varchar(20) NOT NULL,
  `dn_paginaweb` varchar(50) NOT NULL,
  `ref_tipo` bigint(20) NOT NULL,
  `dn_estado` char(2) NOT NULL,
  PRIMARY KEY (`dn_id`),
  KEY `fk_dn_tipo` (`ref_tipo`),
  CONSTRAINT `fk_dn_tipo` FOREIGN KEY (`ref_tipo`) REFERENCES `gua_detalle_tipos` (`de_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guayapp`.`gua_diversion_nocturna`
--

/*!40000 ALTER TABLE `gua_diversion_nocturna` DISABLE KEYS */;
LOCK TABLES `gua_diversion_nocturna` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `gua_diversion_nocturna` ENABLE KEYS */;


--
-- Definition of table `guayapp`.`gua_eventos`
--

DROP TABLE IF EXISTS `guayapp`.`gua_eventos`;
CREATE TABLE  `guayapp`.`gua_eventos` (
  `ev_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ev_descripcion` varchar(300) NOT NULL,
  `ev_fecha_hora` varchar(100) NOT NULL,
  `ev_lugar` varchar(100) NOT NULL,
  `ev_costo` varchar(50) NOT NULL,
  `ref_tipo` bigint(20) NOT NULL,
  `ev_estado` char(2) NOT NULL,
  PRIMARY KEY (`ev_id`),
  KEY `fk_ev_tipo` (`ref_tipo`),
  CONSTRAINT `fk_ev_tipo` FOREIGN KEY (`ref_tipo`) REFERENCES `gua_detalle_tipos` (`de_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guayapp`.`gua_eventos`
--

/*!40000 ALTER TABLE `gua_eventos` DISABLE KEYS */;
LOCK TABLES `gua_eventos` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `gua_eventos` ENABLE KEYS */;


--
-- Definition of table `guayapp`.`gua_informacion`
--

DROP TABLE IF EXISTS `guayapp`.`gua_informacion`;
CREATE TABLE  `guayapp`.`gua_informacion` (
  `in_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `in_descripcion` varchar(300) NOT NULL,
  PRIMARY KEY (`in_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guayapp`.`gua_informacion`
--

/*!40000 ALTER TABLE `gua_informacion` DISABLE KEYS */;
LOCK TABLES `gua_informacion` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `gua_informacion` ENABLE KEYS */;


--
-- Definition of table `guayapp`.`gua_publicidad`
--

DROP TABLE IF EXISTS `guayapp`.`gua_publicidad`;
CREATE TABLE  `guayapp`.`gua_publicidad` (
  `pu_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `pu_ruta_multimedia` varchar(100) NOT NULL,
  `pu_estado` char(2) NOT NULL,
  PRIMARY KEY (`pu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guayapp`.`gua_publicidad`
--

/*!40000 ALTER TABLE `gua_publicidad` DISABLE KEYS */;
LOCK TABLES `gua_publicidad` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `gua_publicidad` ENABLE KEYS */;


--
-- Definition of table `guayapp`.`gua_taxis`
--

DROP TABLE IF EXISTS `guayapp`.`gua_taxis`;
CREATE TABLE  `guayapp`.`gua_taxis` (
  `ta_id` bigint(20) NOT NULL,
  `ta_descripcion` varchar(300) NOT NULL,
  `ta_telefonos` varchar(50) NOT NULL,
  `ref_zona` bigint(20) NOT NULL,
  `ta_estado` char(2) NOT NULL,
  PRIMARY KEY (`ta_id`),
  KEY `fk_ta_zona` (`ref_zona`),
  CONSTRAINT `fk_ta_zona` FOREIGN KEY (`ref_zona`) REFERENCES `gua_detalle_zonas` (`dz_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guayapp`.`gua_taxis`
--

/*!40000 ALTER TABLE `gua_taxis` DISABLE KEYS */;
LOCK TABLES `gua_taxis` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `gua_taxis` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
