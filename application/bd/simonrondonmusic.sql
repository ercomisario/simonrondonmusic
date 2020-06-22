-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 23-01-2018 a las 16:43:14
-- Versión del servidor: 5.5.58-0+deb8u1
-- Versión de PHP: 5.6.30-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `simonrondonmusic`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE IF NOT EXISTS `evento` (
`co_evento` int(9) NOT NULL,
  `tx_evento` varchar(200) NOT NULL,
  `tx_descripcion` varchar(2000) NOT NULL,
  `fe_evento` date NOT NULL,
  `h_evento` time NOT NULL,
  `tx_imagen` varchar(100) NOT NULL,
  `in_habilitado` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`co_evento`, `tx_evento`, `tx_descripcion`, `fe_evento`, `h_evento`, `tx_imagen`, `in_habilitado`) VALUES
(1, '7 Pecados Gastronómicos', 'Cook Eat Home, reune a Siete de los mejores chefs de Restaurantes prestigiosos de la ciudad de Madrid, para elaborar un plato cada uno, con los que sorprenderán a nuestros invitados la segunda quincena del mes de Junio de 2017. Siete de nuestros mejores chefs, han decidido romper con la monotonía de sus cocinas y se han dedicado a elaborar, diseñar y crear una experiencia gastronómica totalmente diferente. Presentan una interesante trayectoria en el mundo de la gastronomía y están decididos a sorprender a sus invitado', '2018-01-30', '16:20:00', '1516720967043.jpg', 1),
(2, 'Net-Working', 'Al evento acudirán figuras importantes de la gastronomía Nacional y el mundo empresarial. Por lo que resulta una oportunidad maravillosa para intercambiar contactos. Además contaremos con la actuación de Simón Rondón, un joven talento que está revolucionando Madrid con su música, amenizará la velada con la magia de su violín aportando el toque que faltaba. Gastronomía, música y buena compañía.', '2018-01-31', '19:00:00', '1516714794454.jpg', 1),
(3, 'Evento Bueno', 'Recuerdos del Metro de Madrid', '2018-01-20', '18:30:00', '1516720914801.jpg', 2),
(4, 'Probando foto 1', 'Probando foto 1Probando foto 1Probando foto 1Probando foto 1Probando foto 1Probando foto 1Probando foto 1Probando foto 1Probando foto 1Probando foto 1Probando foto 1Probando foto 1Probando foto 1', '2018-01-26', '18:30:00', '1516721032923.jpg', 1),
(5, 'sd asd asd a', 'fsdfsdf sadf sdf sdf sdf sdf sdf0', '2018-01-31', '18:30:00', '1516721019845.jpg', 1),
(6, 'Siete pecados', 'Cook Eat Home, reune a Siete de los mejores chefs de Restaurantes prestigiosos de la ciudad de Madrid, para elaborar un plato cada uno, con los que sorprenderán a nuestros invitados la segunda quincena del mes de Junio de 2017. Siete de nuestros mejores chefs, han decidido romper con la monotonía de sus cocinas y se han dedicado a elaborar, diseñar y crear una experiencia gastronómica totalmente diferente. Presentan una interesante trayectoria en el mundo de la gastronomía y están decididos a sorprender a sus invitado', '2018-01-31', '18:30:00', '1516718697555.jpg', 1),
(8, 'dsdfsdfsdfsd', 'fgdfgdfgdf', '2018-01-25', '18:00:00', 'no_imagen.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`co_usuario` int(9) NOT NULL,
  `tx_usuario` varchar(200) NOT NULL,
  `tx_clave` varchar(200) NOT NULL,
  `tx_nombre` varchar(500) NOT NULL,
  `co_permisologia` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`co_usuario`, `tx_usuario`, `tx_clave`, `tx_nombre`, `co_permisologia`) VALUES
(1, 'belizarioja', 'loemy4200', 'JESUS BELIZARIO', 1),
(2, 'rondonnp', '123456', 'NORELYS RONDON', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
 ADD PRIMARY KEY (`co_evento`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`co_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
MODIFY `co_evento` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `co_usuario` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
