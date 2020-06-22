-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u7
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 16-01-2020 a las 14:32:26
-- Versión del servidor: 5.5.62-0+deb8u1
-- Versión de PHP: 5.6.40-0+deb8u7

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
-- Estructura de tabla para la tabla `albun`
--

CREATE TABLE IF NOT EXISTS `albun` (
`co_albun` int(9) NOT NULL,
  `tx_albun` varchar(250) NOT NULL,
  `fe_albun` date NOT NULL,
  `in_habilitado` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `albun`
--

INSERT INTO `albun` (`co_albun`, `tx_albun`, `fe_albun`, `in_habilitado`) VALUES
(2, 'Universidad', '2018-01-29', 1),
(3, 'Metro de Madrid', '2018-01-29', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `audio`
--

CREATE TABLE IF NOT EXISTS `audio` (
`co_audio` int(9) NOT NULL,
  `tx_nombre` varchar(250) NOT NULL,
  `tx_audio` varchar(200) NOT NULL,
  `in_habilitado` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `audio`
--

INSERT INTO `audio` (`co_audio`, `tx_nombre`, `tx_audio`, `in_habilitado`) VALUES
(4, 'Salsa ', '1517438045721.mp3', 1),
(7, 'Salsa 3', '1517440611355.mp3', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bibliografia`
--

CREATE TABLE IF NOT EXISTS `bibliografia` (
`co_bibliografia` int(9) NOT NULL,
  `tx_bibliografia` varchar(2000) NOT NULL,
  `tx_imagen` varchar(200) NOT NULL,
  `in_habilitado` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bibliografia`
--

INSERT INTO `bibliografia` (`co_bibliografia`, `tx_bibliografia`, `tx_imagen`, `in_habilitado`) VALUES
(1, 'Simón A. Rondón Farías\nViolinista\n\nNació en Ciudad Guayana - Venezuela, donde a la corta edad de 6 años inicia sus estudios de música en el kínder musical de la Orquesta Nacional Juvenil “Juan José Landaeta”. El año siguiente se inicia en la cátedra de violín hasta la edad de 19 años recibiendo clase con diferentes maestros del Conservatorio de Música Simón Bolívar como Igor Lara, Fernando Fuentes, Borgan Ascanio, entre otros.\n\nDurante los años 1993 hasta el 2003 formo parte de fila de violines de la Orquesta Sinfónica de Ciudad Guayana, cual pertenece al sistema nacional de Orquestas Sinfónicas de Venezuela al bajo la batuta de Ennio Palumbi, teniendo a su vez la oportunidad de estar bajo la dirección de prestigiosos maestros de talla nacional como internacional tales como: Igor Lanz, Rodolfo Saglimberni, Gustavo Medina, Nassir Hedariam, Inocente Carreño, Ruben Cóva, Aldemaro Romero, Gustavo Dudamel entre Otros. ', '1519845180666.jpg', 1),
(2, 'Durante los años 1993 hasta el 2003 formo parte de fila de violines de la Orquesta \n                  	Sinfónica de Ciudad Guayana, cual pertenece al sistema nacional de Orquestas \n                  	Sinfónicas de Venezuela al bajo la batuta de Ennio Palumbi, teniendo a su vez \n                  	la oportunidad de estar bajo la dirección de prestigiosos maestros de talla nacional \n                  	como internacional tales como: Igor Lanz, Rodolfo Saglimberni, Gustavo Medina, \n                  	Nassir Hedariam, Inocente Carreño, Ruben Cóva, Aldemaro Romero, Gustavo Dudamel \n                  	entre Otros.', 'no_imagen.jpg', 1),
(3, 'En 2003 al iniciar sus estudios de Ingeniería \n                  	en la Universidad de Oriente núcleo Bolívar – Venezuela, se incorpora en la \n                  	estudiantina universitaria “Tono y Entono” como violinista donde dos años más tarde \n                  	asume el papel de director y arreglista, participando en festivales nacionales hasta \n                  	el 2010. También perteneció a la Estudiantina de Asociación de los Profesores de la \n                  	Universidad de Oriente donde grabo su primera producción discográfica.', '1519847265733.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE IF NOT EXISTS `contacto` (
`co_contacto` int(9) NOT NULL,
  `tx_contacto` varchar(500) NOT NULL,
  `in_habilitado` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`co_contacto`, `tx_contacto`, `in_habilitado`) VALUES
(1, 'info@simonrondonmusic.com', 2),
(2, 'simon.rondon@gmail.com', 2),
(4, 'Teléfono: 631 511638', 2);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`co_evento`, `tx_evento`, `tx_descripcion`, `fe_evento`, `h_evento`, `tx_imagen`, `in_habilitado`) VALUES
(2, 'Net-Working', 'Al evento acudirán figuras importantes de la gastronomía Nacional y el mundo empresarial. Por lo que resulta una oportunidad maravillosa para intercambiar contactos. Además contaremos con la actuación de Simón Rondón, un joven talento que está revolucionando Madrid con su música, amenizará la velada con la magia de su violín aportando el toque que faltaba. Gastronomía, música y buena compañía.', '2018-01-31', '19:00:00', '1516714794454.jpg', 1),
(4, 'Probando foto 1', 'Probando foto 1Probando foto 1Probando foto 1Probando foto 1Probando foto 1Probando foto 1Probando foto 1Probando foto 1Probando foto 1Probando foto 1Probando foto 1Probando foto 1Probando foto 1', '2018-01-26', '18:30:00', '1516721032923.jpg', 1),
(6, 'Siete pecados', 'Cook Eat Home, reune a Siete de los mejores chefs de Restaurantes prestigiosos de la ciudad de Madrid, para elaborar un plato cada uno, con los que sorprenderán a nuestros invitados la segunda quincena del mes de Junio de 2017. Siete de nuestros mejores chefs, han decidido romper con la monotonía de sus cocinas y se han dedicado a elaborar, diseñar y crear una experiencia gastronómica totalmente diferente. Presentan una interesante trayectoria en el mundo de la gastronomía y están decididos a sorprender a sus invitado\n\nCook Eat Home, reune a Siete de los mejores chefs de Restaurantes prestigiosos de la ciudad de Madrid, para elaborar un plato cada uno, con los que sorprenderán a nuestros invitados la segunda quincena del mes de Junio de 2017. Siete de nuestros mejores chefs, han decidido romper con la monotonía de sus cocinas y se han dedicado a elaborar, diseñar y crear una experiencia gastronómica totalmente diferente. Presentan una interesante trayectoria en el mundo de la gastronomía y están decididos a sorprender a sus invitado\n\nCook Eat Home, reune a Siete de los mejores chefs de Restaurantes prestigiosos de la ciudad de Madrid, para elaborar un plato cada uno, con los que sorprenderán a nuestros invitados la segunda quincena del mes de Junio de 2017. Siete de nuestros mejores chefs, han decidido romper con la monotonía de sus cocinas y se han dedicado a elaborar, diseñar y crear una experiencia gastronómica totalmente diferente. Presentan una interesante trayectoria en el mundo de la gastronomía y están decididos a sorprender a sus invitado', '2018-01-31', '18:30:00', '1516718697555.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foto`
--

CREATE TABLE IF NOT EXISTS `foto` (
`co_foto` int(9) NOT NULL,
  `co_albun` int(9) NOT NULL,
  `tx_nombre` varchar(250) NOT NULL,
  `tx_foto` varchar(200) NOT NULL,
  `in_habilitado` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `foto`
--

INSERT INTO `foto` (`co_foto`, `co_albun`, `tx_nombre`, `tx_foto`, `in_habilitado`) VALUES
(2, 3, 'Foto 2', '1517517414404.jpg', 1),
(4, 3, 'Foto3 ', '1517834684784.jpg', 2),
(5, 2, 'Prueba Universidad', '1517834831719.jpg', 1),
(6, 3, 'Prueba', '1517856889004.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`co_usuario` int(9) NOT NULL,
  `tx_usuario` varchar(200) NOT NULL,
  `tx_clave` varchar(200) NOT NULL,
  `tx_nombre` varchar(500) NOT NULL,
  `in_habilitado` int(2) NOT NULL,
  `co_permisologia` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`co_usuario`, `tx_usuario`, `tx_clave`, `tx_nombre`, `in_habilitado`, `co_permisologia`) VALUES
(1, 'belizarioja', 'loemy4200', 'JESUS BELIZARIO', 1, 1),
(2, 'rondonnp', 'loquequieras', 'NORELYS RONDON', 1, 1),
(4, 'rondonsp', '123456', 'SIMON RONDON', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `video`
--

CREATE TABLE IF NOT EXISTS `video` (
`co_video` int(9) NOT NULL,
  `tx_nombre` varchar(250) NOT NULL,
  `tx_video` varchar(200) NOT NULL,
  `in_habilitado` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `video`
--

INSERT INTO `video` (`co_video`, `tx_nombre`, `tx_video`, `in_habilitado`) VALUES
(3, 'prueba mp4', '1517265691367.mp4', 2),
(4, 'Metro de Madrid Salsa', '1517265569338.mp4', 1),
(5, 'prueba mp4', '1517265667379.mp4', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `albun`
--
ALTER TABLE `albun`
 ADD PRIMARY KEY (`co_albun`);

--
-- Indices de la tabla `audio`
--
ALTER TABLE `audio`
 ADD PRIMARY KEY (`co_audio`);

--
-- Indices de la tabla `bibliografia`
--
ALTER TABLE `bibliografia`
 ADD PRIMARY KEY (`co_bibliografia`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
 ADD PRIMARY KEY (`co_contacto`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
 ADD PRIMARY KEY (`co_evento`);

--
-- Indices de la tabla `foto`
--
ALTER TABLE `foto`
 ADD PRIMARY KEY (`co_foto`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`co_usuario`);

--
-- Indices de la tabla `video`
--
ALTER TABLE `video`
 ADD PRIMARY KEY (`co_video`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `albun`
--
ALTER TABLE `albun`
MODIFY `co_albun` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `audio`
--
ALTER TABLE `audio`
MODIFY `co_audio` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `bibliografia`
--
ALTER TABLE `bibliografia`
MODIFY `co_bibliografia` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
MODIFY `co_contacto` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
MODIFY `co_evento` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `foto`
--
ALTER TABLE `foto`
MODIFY `co_foto` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `co_usuario` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `video`
--
ALTER TABLE `video`
MODIFY `co_video` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
