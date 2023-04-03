


-- Volcando estructura de base de datos para decameron
CREATE DATABASE IF NOT EXISTS `hoteles` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `hoteles`;


-- Volcando estructura para tabla hoteles.hoteles
CREATE TABLE IF NOT EXISTS `hoteles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nit` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nombre` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `direccion` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `idCiudad` int NOT NULL,
  `numeroHabitaciones` int NOT NULL DEFAULT '0',
  KEY `id` (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla hoteles.hoteles: ~1 rows (aproximadamente)
INSERT INTO `hoteles` (`id`, `nit`, `nombre`, `direccion`, `idCiudad`, `numeroHabitaciones`) VALUES
	(59, 'g44-7788uj', 'Cameron', 'calle 12', 1, 4);

-- Volcando estructura para tabla hoteles.hoteles_habitaciones
CREATE TABLE IF NOT EXISTS `hoteles_habitaciones` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cantidad` int NOT NULL,
  `idHotel` int NOT NULL,
  `tipo` int NOT NULL DEFAULT '0',
  `acomodacion` int NOT NULL DEFAULT '1',
  KEY `id` (`id`) USING BTREE,
  KEY `Indice` (`idHotel`),
  CONSTRAINT `FK_hoteles_habitaciones_hoteles` FOREIGN KEY (`idHotel`) REFERENCES `hoteles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla decameron.hoteles_habitaciones: ~2 rows (aproximadamente)




