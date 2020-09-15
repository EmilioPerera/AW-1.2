-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-09-2020 a las 00:48:25
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ex-aw`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posits`
--

CREATE TABLE `posits` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Título` varchar(30) NOT NULL,
  `Color` varchar(30) NOT NULL,
  `Texto` text NOT NULL,
  `RutaImg` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `posits`
--

INSERT INTO `posits` (`ID`, `UserID`, `Título`, `Color`, `Texto`, `RutaImg`) VALUES
(1, 1, 'Pósit 1', 'orange', 'La colleja de Neymar a Álvaro Gonzalez durante el PSG-OM de ayer le puede salir muy cara al brasileño. De acuerdo con la información de RMC Sport, el exjugador del Barcelona podría ser suspendido de 4 a 7 partidos y se perderá el miércoles el encuentro que enfrentará a los parisinos contra el Metz.\r\n\r\nSegún la Comisión de Disciplina de la LFP, una acción agresiva cometida fuera de un lance de juego y sin provocar lesión del adversario puede llegar a acarrear la suspensión de siete encuentros, tal como indica el anexo 2 del artículo 13.1 del Reglamento de la LFP. Si el motivo de la tarjeta roja es un intento de agresión, la sanción podría alcanzar los seis.\r\n\r\nEl Comité Disciplinario de la LFP se reúne cada miércoles para analizar todas las sanciones que se han producido en la Ligue 1. Sin embargo, al ser un partido de tal magnitud como el clásico entre PSG y Marsella y dado las múltiples acciones polémicas que se produjeron, el máximo organismo del fútbol francés podría retrasar su decisión una semana.', ''),
(3, 1, 'Pósit 3', 'white', 'Eyyyyyyyyyy eyyyyyyyyyyyy eyyyyyyyyyyyyyyyyy', ''),
(4, 1, 'Pósit 4', 'yellow', 'Según la Comisión de Disciplina de la LFP, una acción agresiva cometida fuera de un lance de juego y sin provocar lesión del adversario puede llegar a acarrear la suspensión de siete encuentros, tal como indica el anexo 2 del artículo 13.1 del Reglamento de la LFP. Si el motivo de la tarjeta roja es un intento de agresión, la sanción podría alcanzar los seis.\r\n\r\nEl Comité Disciplinario de la LFP se reúne cada miércoles para analizar todas las sanciones que se han producido en la Ligue 1. Sin embargo, al ser un partido de tal magnitud como el clásico entre PSG y Marsella y dado las múltiples acciones polémicas que se produjeron, el máximo organismo del fútbol francés podría retrasar su decisión una semana.', ''),
(11, 4, 'Receta 1', 'yellow', 'Palitos de quesote con guacamole.', ''),
(13, 1, 'Receta 3', 'orange', 'Patatas al ajillo con puerros con miel y espuma de mango de Brasil.', 'disco2.jpg'),
(15, 1, 'Receta 3', 'white', 'Queso con pan.', 'img1.jpg'),
(16, 1, 'Receta 3', 'grey', 'Pan con queso.', 'img2.jpg'),
(26, 1, 'Pósit 2', 'orange', 'Pósit 2 con fotitoooooooooooooooooooooooooooo.', 'img3.jpg'),
(29, 1, 'Pósit 2', 'yellow', 'No fotito aquí', ''),
(30, 1, 'Tampoco fotito', 'white', 'Sin fotito', ''),
(31, 1, 'Pósit 1', 'yellow', 'UUUUUUUUUUOOOOOOOOOOOOO', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Contraseña` varchar(255) NOT NULL,
  `Admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `Nombre`, `Contraseña`, `Admin`) VALUES
(1, 'Pepe123', '123', 0),
(2, 'PepitoPepote', '123', 0),
(4, 'Admin', 'Admin', 1),
(6, 'Pepe12345', '$2y$10$Kt6.bFC.JYm5CL6xvGmnHOioOmluWWewD9KPAWOFtk9yDls7sZQ0m', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `posits`
--
ALTER TABLE `posits`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD UNIQUE KEY `Nombre` (`Nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `posits`
--
ALTER TABLE `posits`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `posits`
--
ALTER TABLE `posits`
  ADD CONSTRAINT `posits_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `usuarios` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
