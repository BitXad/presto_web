# SQL Manager 2010 for MySQL 4.5.0.9
# ---------------------------------------
# Host     : localhost
# Port     : 3306
# Database : presto_web


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES latin1 */;

SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE `presto_web`
    CHARACTER SET 'latin1'
    COLLATE 'latin1_swedish_ci';

USE `presto_web`;

#
# Structure for the `estado` table : 
#

CREATE TABLE `estado` (
  `estado_id` int(11) NOT NULL AUTO_INCREMENT,
  `estado_descripcion` varchar(50) DEFAULT NULL,
  `estado_tipo` int(11) DEFAULT NULL,
  `estado_color` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`estado_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Structure for the `asesor` table : 
#

CREATE TABLE `asesor` (
  `asesor_id` int(11) NOT NULL AUTO_INCREMENT,
  `estado_id` int(11) DEFAULT NULL,
  `asesor_nombre` varchar(50) DEFAULT NULL,
  `asesor_apellido` varchar(50) DEFAULT NULL,
  `asesor_ci` varchar(50) DEFAULT NULL,
  `asesor_telefono` varchar(50) DEFAULT NULL,
  `asesor_celular` varchar(50) DEFAULT NULL,
  `asesor_latitud` varchar(50) DEFAULT NULL,
  `asesor_longitud` varchar(50) DEFAULT NULL,
  `asesor_foto` varchar(250) DEFAULT NULL,
  `asesor_fechanac` date DEFAULT NULL,
  `asesor_profesion` varchar(150) DEFAULT NULL,
  `asesor_espcialidad` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`asesor_id`),
  KEY `fk_estado_asesor` (`estado_id`),
  CONSTRAINT `fk_estado_asesor` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`estado_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Structure for the `usuario` table : 
#

CREATE TABLE `usuario` (
  `usuario_id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Structure for the `grupo` table : 
#

CREATE TABLE `grupo` (
  `grupo_id` int(11) NOT NULL AUTO_INCREMENT,
  `asesor_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `estado_id` int(11) DEFAULT NULL,
  `grupo_fecha` date DEFAULT NULL,
  `grupo_hora` time DEFAULT NULL,
  `grupo_nombre` varchar(150) DEFAULT NULL,
  `grupo_codigo` varchar(20) DEFAULT NULL,
  `grupo_iniciosolicitud` date DEFAULT NULL,
  `grupo_monto` float DEFAULT NULL,
  `grupo_integrantes` int(11) DEFAULT NULL,
  PRIMARY KEY (`grupo_id`),
  KEY `fk_asesor_grupo` (`asesor_id`),
  KEY `fk_estado_grupo` (`estado_id`),
  KEY `fk_usuario_grupo` (`usuario_id`),
  CONSTRAINT `fk_asesor_grupo` FOREIGN KEY (`asesor_id`) REFERENCES `asesor` (`asesor_id`),
  CONSTRAINT `fk_estado_grupo` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`estado_id`),
  CONSTRAINT `fk_usuario_grupo` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `reunion` table : 
#

CREATE TABLE `reunion` (
  `reunion_id` int(11) NOT NULL AUTO_INCREMENT,
  `grupo_id` int(11) DEFAULT NULL,
  `reunion_fecha` date DEFAULT NULL,
  `reunion_hora` time DEFAULT NULL,
  PRIMARY KEY (`reunion_id`),
  KEY `fk_grupo_reunion` (`grupo_id`),
  CONSTRAINT `fk_grupo_reunion` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`grupo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `asistencia` table : 
#

CREATE TABLE `asistencia` (
  `aistencia_id` int(11) NOT NULL AUTO_INCREMENT,
  `reunion_id` int(11) DEFAULT NULL,
  `aistencia_fecha` date DEFAULT NULL,
  `aistencia_hora` time DEFAULT NULL,
  `aistencia_registro` varchar(20) DEFAULT NULL,
  `asistencia_observacion` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`aistencia_id`),
  KEY `fk_asistencia_reunion` (`reunion_id`),
  CONSTRAINT `fk_asistencia_reunion` FOREIGN KEY (`reunion_id`) REFERENCES `reunion` (`reunion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `categoria` table : 
#

CREATE TABLE `categoria` (
  `categoria_id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria_nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`categoria_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Structure for the `estado_civil` table : 
#

CREATE TABLE `estado_civil` (
  `estadocivil_id` int(11) NOT NULL AUTO_INCREMENT,
  `estadocivil_nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`estadocivil_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

#
# Structure for the `extencion` table : 
#

CREATE TABLE `extencion` (
  `cliente_extencionci` varchar(20) NOT NULL,
  PRIMARY KEY (`cliente_extencionci`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `cliente` table : 
#

CREATE TABLE `cliente` (
  `cliente_id` int(11) NOT NULL AUTO_INCREMENT,
  `estadocivil_id` int(11) DEFAULT NULL,
  `estado_id` int(11) DEFAULT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  `cliente_extencionci` varchar(20) DEFAULT NULL,
  `asesor_id` int(11) DEFAULT NULL,
  `cliente_nombre` varchar(50) DEFAULT NULL,
  `cliente_apellido` varchar(50) DEFAULT NULL,
  `cliente_ci` varchar(50) DEFAULT NULL,
  `cliente_codigo` varchar(50) DEFAULT NULL,
  `cliente_telefono` varchar(50) DEFAULT NULL,
  `cliente_celular` varchar(50) DEFAULT NULL,
  `cliente_direccion` varchar(250) DEFAULT NULL,
  `cliente_latitud` varchar(50) DEFAULT NULL,
  `cliente_longitud` varchar(50) DEFAULT NULL,
  `cliente_referencia` varchar(250) DEFAULT NULL,
  `cliente_foto` varchar(250) DEFAULT NULL,
  `cliente_email` varchar(50) DEFAULT NULL,
  `cliente_fechanac` date DEFAULT NULL,
  `cliente_nit` varchar(50) DEFAULT NULL,
  `cliente_razon` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`cliente_id`),
  KEY `fk_asesor_credito` (`asesor_id`),
  KEY `fk_categoria_cliente` (`categoria_id`),
  KEY `fk_estadocivil_cliente` (`estadocivil_id`),
  KEY `fk_estado_cliente` (`estado_id`),
  KEY `fk_extencion_ci` (`cliente_extencionci`),
  CONSTRAINT `fk_asesor_credito` FOREIGN KEY (`asesor_id`) REFERENCES `asesor` (`asesor_id`),
  CONSTRAINT `fk_categoria_cliente` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`categoria_id`),
  CONSTRAINT `fk_estadocivil_cliente` FOREIGN KEY (`estadocivil_id`) REFERENCES `estado_civil` (`estadocivil_id`),
  CONSTRAINT `fk_estado_cliente` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`estado_id`),
  CONSTRAINT `fk_extencion_ci` FOREIGN KEY (`cliente_extencionci`) REFERENCES `extencion` (`cliente_extencionci`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `garantia` table : 
#

CREATE TABLE `garantia` (
  `garantia_id` int(11) NOT NULL AUTO_INCREMENT,
  `estado_id` int(11) DEFAULT NULL,
  `garantia_descripcion` varchar(250) DEFAULT NULL,
  `garantia_codigo` varchar(20) DEFAULT NULL,
  `garantia_cantidad` float DEFAULT NULL,
  `garantia_precio` float DEFAULT NULL,
  `garantia_observacion` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`garantia_id`),
  KEY `fk_estado_garantia` (`estado_id`),
  CONSTRAINT `fk_estado_garantia` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`estado_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `tipo_credito` table : 
#

CREATE TABLE `tipo_credito` (
  `tipocredito_id` int(11) NOT NULL AUTO_INCREMENT,
  `tipocredito_nombre` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`tipocredito_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `credito` table : 
#

CREATE TABLE `credito` (
  `credito_id` int(11) NOT NULL AUTO_INCREMENT,
  `estado_id` int(11) DEFAULT NULL,
  `grupo_id` int(11) DEFAULT NULL,
  `garantia_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `tipocredito_id` int(11) DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `credito_fechainicio` date DEFAULT NULL,
  `credito_horainicio` time DEFAULT NULL,
  `credito_monto` float DEFAULT NULL,
  `credito_interes` float DEFAULT NULL,
  `credito_cuotas` float DEFAULT NULL,
  `credito_fechalimite` date DEFAULT NULL,
  PRIMARY KEY (`credito_id`),
  KEY `fk_credito_cliente` (`cliente_id`),
  KEY `fk_credito_garantia` (`garantia_id`),
  KEY `fk_credito_grupo` (`grupo_id`),
  KEY `fk_credito_usuario` (`usuario_id`),
  KEY `fk_estado_credito` (`estado_id`),
  KEY `fk_tipo_credito` (`tipocredito_id`),
  CONSTRAINT `fk_credito_cliente` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`cliente_id`),
  CONSTRAINT `fk_credito_garantia` FOREIGN KEY (`garantia_id`) REFERENCES `garantia` (`garantia_id`),
  CONSTRAINT `fk_credito_grupo` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`grupo_id`),
  CONSTRAINT `fk_credito_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`usuario_id`),
  CONSTRAINT `fk_estado_credito` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`estado_id`),
  CONSTRAINT `fk_tipo_credito` FOREIGN KEY (`tipocredito_id`) REFERENCES `tipo_credito` (`tipocredito_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `cuota` table : 
#

CREATE TABLE `cuota` (
  `cuota_id` int(11) NOT NULL AUTO_INCREMENT,
  `credito_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `estado_id` int(11) DEFAULT NULL,
  `cuota_numero` int(11) DEFAULT NULL,
  `cuota_capital` float DEFAULT NULL,
  `cuota_interes` float DEFAULT NULL,
  `cuota_descuento` float DEFAULT NULL,
  `cuota_monto` float DEFAULT NULL,
  `cuota_fechalimite` date DEFAULT NULL,
  `cuota_montocancelado` float DEFAULT NULL,
  `cuota_fechapago` date DEFAULT NULL,
  `cuota_horapago` time DEFAULT NULL,
  `cuota_saldocapital` float DEFAULT NULL,
  `cuota_numrecibo` int(11) DEFAULT NULL,
  `cuota_banco` varchar(250) DEFAULT NULL,
  `cuota_glosa` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`cuota_id`),
  KEY `fk_cuota_credito` (`credito_id`),
  KEY `fk_estado_cuota` (`estado_id`),
  KEY `fk_usuario_cuota` (`usuario_id`),
  CONSTRAINT `fk_cuota_credito` FOREIGN KEY (`credito_id`) REFERENCES `credito` (`credito_id`),
  CONSTRAINT `fk_estado_cuota` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`estado_id`),
  CONSTRAINT `fk_usuario_cuota` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `factura` table : 
#

CREATE TABLE `factura` (
  `factura_id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) DEFAULT NULL,
  `cuota_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`factura_id`),
  KEY `fk_factura_cuota` (`cuota_id`),
  KEY `fk_usuario_factura` (`usuario_id`),
  CONSTRAINT `fk_factura_cuota` FOREIGN KEY (`cuota_id`) REFERENCES `cuota` (`cuota_id`),
  CONSTRAINT `fk_usuario_factura` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `garante` table : 
#

CREATE TABLE `garante` (
  `garante_id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_id` int(11) DEFAULT NULL,
  `garantia_id` int(11) DEFAULT NULL,
  `credito_id` int(11) DEFAULT NULL,
  `garante_fecha` date DEFAULT NULL,
  `garante_hora` time DEFAULT NULL,
  PRIMARY KEY (`garante_id`),
  KEY `fk_garante_cliente` (`cliente_id`),
  KEY `fk_garante_credito` (`credito_id`),
  KEY `fk_garantia_garante` (`garantia_id`),
  CONSTRAINT `fk_garante_cliente` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`cliente_id`),
  CONSTRAINT `fk_garante_credito` FOREIGN KEY (`credito_id`) REFERENCES `credito` (`credito_id`),
  CONSTRAINT `fk_garantia_garante` FOREIGN KEY (`garantia_id`) REFERENCES `garantia` (`garantia_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `tipo_integrante` table : 
#

CREATE TABLE `tipo_integrante` (
  `tipointeg_id` int(11) NOT NULL AUTO_INCREMENT,
  `tipointeg_nombre` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`tipointeg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `integrante` table : 
#

CREATE TABLE `integrante` (
  `integrante_id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_id` int(11) DEFAULT NULL,
  `tipointeg_id` int(11) DEFAULT NULL,
  `garantia_id` int(11) DEFAULT NULL,
  `grupo_id` int(11) DEFAULT NULL,
  `integrante_fechareg` date DEFAULT NULL,
  `integrante_horareg` time DEFAULT NULL,
  PRIMARY KEY (`integrante_id`),
  KEY `fk_es_un` (`cliente_id`),
  KEY `fk_garantia_integrante` (`garantia_id`),
  KEY `fk_integrante_grupo` (`grupo_id`),
  KEY `fk_tipo_integrante` (`tipointeg_id`),
  CONSTRAINT `fk_es_un` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`cliente_id`),
  CONSTRAINT `fk_garantia_integrante` FOREIGN KEY (`garantia_id`) REFERENCES `garantia` (`garantia_id`),
  CONSTRAINT `fk_integrante_grupo` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`grupo_id`),
  CONSTRAINT `fk_tipo_integrante` FOREIGN KEY (`tipointeg_id`) REFERENCES `tipo_integrante` (`tipointeg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `multa` table : 
#

CREATE TABLE `multa` (
  `multa_id` int(11) NOT NULL AUTO_INCREMENT,
  `reunion_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `multa_monto` float DEFAULT NULL,
  `multa_fecha` date DEFAULT NULL,
  `multa_hora` time DEFAULT NULL,
  `multa_detalle` varchar(250) DEFAULT NULL,
  `multa_numrec` int(11) DEFAULT NULL,
  PRIMARY KEY (`multa_id`),
  KEY `fk_multa_reunion` (`reunion_id`),
  KEY `fk_usuario_multa` (`usuario_id`),
  CONSTRAINT `fk_multa_reunion` FOREIGN KEY (`reunion_id`) REFERENCES `reunion` (`reunion_id`),
  CONSTRAINT `fk_usuario_multa` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for the `estado` table  (LIMIT 0,500)
#

INSERT INTO `estado` (`estado_id`, `estado_descripcion`, `estado_tipo`, `estado_color`) VALUES 
  (1,'ACTIVO',1,'WHITE'),
  (2,'INACTIVO',2,'GRAY');
COMMIT;

#
# Data for the `asesor` table  (LIMIT 0,500)
#

INSERT INTO `asesor` (`asesor_id`, `estado_id`, `asesor_nombre`, `asesor_apellido`, `asesor_ci`, `asesor_telefono`, `asesor_celular`, `asesor_latitud`, `asesor_longitud`, `asesor_foto`, `asesor_fechanac`, `asesor_profesion`, `asesor_espcialidad`) VALUES 
  (1,1,'JUAN MARCIAL','PEREZ LOPEZ','465443','4546432','77567890','','','','0000-00-00','ING. COMERCIAL','CONTABILIDAD MINERA'),
  (2,1,'MAGDA MARCELA','MARTINEZ ROSALES','345435','4566567','776544567','','','','0000-00-00','LIC. EN ADMINNISTRACION DE EMPRESAS','NINGUNA');
COMMIT;

#
# Data for the `usuario` table  (LIMIT 0,500)
#

INSERT INTO `usuario` (`usuario_id`, `usuario_nombre`) VALUES 
  (1,'MARCIAL');
COMMIT;

#
# Data for the `categoria` table  (LIMIT 0,500)
#

INSERT INTO `categoria` (`categoria_id`, `categoria_nombre`) VALUES 
  (1,'CATEGORIA A'),
  (2,'CATEGORIA B'),
  (3,'CATEGORIA C');
COMMIT;

#
# Data for the `estado_civil` table  (LIMIT 0,500)
#

INSERT INTO `estado_civil` (`estadocivil_id`, `estadocivil_nombre`) VALUES 
  (1,'SOLTERO(A)'),
  (2,'CASADO(A)'),
  (3,'VIUDO(A)'),
  (4,'DIVORCIADO(A)'),
  (5,'CONCUVINADO(A)');
COMMIT;

#
# Data for the `extencion` table  (LIMIT 0,500)
#

INSERT INTO `extencion` (`cliente_extencionci`) VALUES 
  ('BN'),
  ('CB'),
  ('LP'),
  ('OR'),
  ('OTRO'),
  ('PN'),
  ('PT'),
  ('SC'),
  ('TR');
COMMIT;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;