-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 23, 2020 at 12:48 AM
-- Server version: 5.7.24
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bocetarte`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombreCategoria` varchar(45) NOT NULL,
  `tipoCategoria` varchar(45) NOT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `comentario`
--

DROP TABLE IF EXISTS `comentario`;
CREATE TABLE IF NOT EXISTS `comentario` (
  `idComentario` int(11) NOT NULL AUTO_INCREMENT,
  `contenidoComentario` varchar(200) NOT NULL,
  `fechaComentario` datetime NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idPublicacion` int(11) NOT NULL,
  PRIMARY KEY (`idComentario`),
  KEY `fk_COMENTARIO_USUARIO1_idx` (`idUsuario`),
  KEY `fk_COMENTARIO_PUBLICACION1_idx` (`idPublicacion`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
  `idLike` int(11) NOT NULL AUTO_INCREMENT,
  `fechaLike` datetime NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idPublicacion` int(11) NOT NULL,
  PRIMARY KEY (`idLike`),
  KEY `fk_LIKE_USUARIO1_idx` (`idUsuario`),
  KEY `fk_LIKE_PUBLICACION1_idx` (`idPublicacion`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notificacion`
--

DROP TABLE IF EXISTS `notificacion`;
CREATE TABLE IF NOT EXISTS `notificacion` (
  `idNotificacion` int(11) NOT NULL AUTO_INCREMENT,
  `nickNotificacion` varchar(45) NOT NULL,
  `estadoNotificacion` varchar(45) NOT NULL,
  `tipoNotificacion` varchar(45) NOT NULL,
  `fechaNotificacion` datetime NOT NULL,
  `USUARIO_idUsuario` int(11) NOT NULL,
  `PUBLICACION_idPublicacion` int(11) NOT NULL,
  PRIMARY KEY (`idNotificacion`),
  KEY `fk_NOTIFICACION_USUARIO1_idx` (`USUARIO_idUsuario`),
  KEY `fk_NOTIFICACION_PUBLICACION1_idx` (`PUBLICACION_idPublicacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `publicacion`
--

DROP TABLE IF EXISTS `publicacion`;
CREATE TABLE IF NOT EXISTS `publicacion` (
  `idPublicacion` int(11) NOT NULL AUTO_INCREMENT,
  `archivoPublicacion` varchar(200) NOT NULL,
  `tituloPublicacion` varchar(45) NOT NULL,
  `descripcionPublicacion` varchar(200) NOT NULL,
  `fechaPublicacion` datetime NOT NULL,
  `estadoPublicacion` varchar(45) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  PRIMARY KEY (`idPublicacion`),
  KEY `fk_PUBLICACION_USUARIO_idx` (`idUsuario`),
  KEY `fk_PUBLICACION_CATEGORIA1_idx` (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nickUsuario` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `emailUsuario` varchar(45) NOT NULL,
  `telefonoUsuario` int(11) NOT NULL,
  `visiUsuario` varchar(45) NOT NULL,
  `tipoUsuario` varchar(45) NOT NULL,
  `estadoUsuario` varchar(45) NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `fk_COMENTARIO_PUBLICACION1` FOREIGN KEY (`idPublicacion`) REFERENCES `publicacion` (`idPublicacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_COMENTARIO_USUARIO1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `fk_LIKE_PUBLICACION1` FOREIGN KEY (`idPublicacion`) REFERENCES `publicacion` (`idPublicacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_LIKE_USUARIO1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notificacion`
--
ALTER TABLE `notificacion`
  ADD CONSTRAINT `fk_NOTIFICACION_PUBLICACION1` FOREIGN KEY (`PUBLICACION_idPublicacion`) REFERENCES `publicacion` (`idPublicacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_NOTIFICACION_USUARIO1` FOREIGN KEY (`USUARIO_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `publicacion`
--
ALTER TABLE `publicacion`
  ADD CONSTRAINT `fk_PUBLICACION_CATEGORIA1` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_PUBLICACION_USUARIO` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
