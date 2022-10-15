-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-10-2022 a las 20:33:36
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_mangas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id_genero` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `imagen` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id_genero`, `nombre`, `descripcion`, `imagen`) VALUES
(1, 'Fantasía', 'El género fantástico es un género artístico en el que hay presencia de elementos que rompen con la realidad establecida. Se caracteriza por no dar prioridad a una representación realista que respete las leyes de funcionamiento del mundo.', 'images/63474dde9becd.jpg'),
(20, 'Ciencia Ficción', 'Es un género especulativo que relata acontecimientos posibles desarrollados en un marco imaginario, cuya verosimilitud se fundamenta narrativamente en los campos de las ciencias físicas, naturales y sociales.', 'images/6348ac6e4dda5.jpg'),
(24, 'aaaaa', 'qqqqqq', 'images/6348ce63152fd.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `manga`
--

CREATE TABLE `manga` (
  `id` int(11) NOT NULL,
  `titulo` varchar(40) NOT NULL,
  `autor` varchar(20) NOT NULL,
  `sinopsis` varchar(255) NOT NULL,
  `editorial` varchar(20) NOT NULL,
  `portada` varchar(100) DEFAULT NULL,
  `id_genero_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `manga`
--

INSERT INTO `manga` (`id`, `titulo`, `autor`, `sinopsis`, `editorial`, `portada`, `id_genero_fk`) VALUES
(1, 'The promised neverland 1', 'Kaiu Shirai', 'Los niños del hogar Grace Field House viven una vida feliz. Solo deben seguir las reglas y jamás cruzar el muro que los separa del resto del mundo. Pero poco antes de que les toque partir descubren un espeluznante secreto sobre qué les espera afuera', 'Ivrea', 'images/6348a5f752f4e.jpg', 1),
(2, 'Spy family 1', 'Tatsuya Endo', 'Los países de Westalis y Ostania libran desde hace años una guerra fría donde el espionaje y los asesinatos son moneda corriente. El espía conocido como “Twilight” es el mejor agente de Westalis que tiene por objetivo encargarse del poderoso Donovan.', 'Ivrea', 'images/63474d77b9435.jpg', 1),
(5, 'Sakura Card Captor 1', 'Clamp', 'Cardcaptor Sakura es una de las series más consagradas de todos los tiempos, catapultada a la fama hace ya 17 años en nuestro país cuando se pasó la versión anime por Cartoon Network, dejando un recuerdo imborrable.', 'Ivrea', 'images/63474da519163.jpg', 1),
(6, 'Psyco-pass', 'Hikaru Miyoshi', 'Anime policíaco ambientado en el año 2113 y en un Japón distópico controlado por el Sistema Sibyl, con el que se establece el nivel de criminalidad de cada ciudadano a través de una prueba de su estado mental.', 'Planeta', 'images/6348ac860214e.jpg', 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `email`, `password`) VALUES
(2, 'admin@admin.com', '$2a$12$gO45ZwF5MS8BTdZoQeeETO0QW4Hti9Yn8BVGLvoGBJr4X4Exj3fAq');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id_genero`);

--
-- Indices de la tabla `manga`
--
ALTER TABLE `manga`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_genero_fk` (`id_genero_fk`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `manga`
--
ALTER TABLE `manga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `manga`
--
ALTER TABLE `manga`
  ADD CONSTRAINT `manga_ibfk_1` FOREIGN KEY (`id_genero_fk`) REFERENCES `genero` (`id_genero`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
