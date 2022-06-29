-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-06-2022 a las 23:46:58
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `web_de_peliculas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `correo` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `n_usuario` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `contra` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id_admin`, `nombre`, `apellido`, `correo`, `n_usuario`, `contra`) VALUES
(1, 'User', 'User', 'user@gmail.com', 'User123', 'User1234.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE `pelicula` (
  `id_pelicula` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `director` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `anio` int(11) NOT NULL,
  `ns_prota` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `descrip` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `video` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`id_pelicula`, `nombre`, `director`, `anio`, `ns_prota`, `descrip`, `video`, `img`) VALUES
(1, 'Iron Man: El hombre de hierro', 'Jon Favreau', 2008, 'Robert Downey Jr.*\r\nJon Favreau*\r\nGwyneth Paltrow*\r\nTerrence Howard*', 'Tony Stark es un inventor de armamento brillante que es secuestrado en el extranjero. Sus captores son unos terroristas que le obligan a construir una máquina destructiva pero Tony se construirá una armadura para poder enfrentarse a ellos y escapar.', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/WUvq_9XW2Do\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'portada_iron_man.jpg'),
(2, 'Maze Runner: correr o morir', 'Wes Ball', 2014, 'Dylan O\'Brien*\r\nThomas Brodie-Sangster*\r\nKaya Scodelario*\r\nWill Poulter*\r\nKi Hong Lee*\r\nDexter Darden*', 'Thomas es un adolescente cuya memoria fue borrada y que ha sido encerrado junto a otros chicos de su edad en un laberinto plagado de monstruos y misterios. Para sobrevivir, tendrá que adaptarse a las normas y a los demás habitantes del laberinto.', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/KNYPRt6SfrE\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Maze_Runner_Correr_o_morir-377064363-large.jpg'),
(3, 'Spontaneous', 'Brian Duffield', 2020, 'Katherine Langford*\r\nCharlie Plummer*\r\nHayley Law*\r\nPiper Perabo*\r\nLaine MacNeil*\r\nMellany Barros*', 'Los estudiantes de una escuela secundaria empiezan a explotar espontáneamente. Mara y Dylan deben encontrar la manera de sobrevivir en un mundo en el que cada momento podría ser el último.', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/w5f-5wquVmo\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'spontaneous.jpg'),
(4, 'Animales fantásticos: los secretos de Dumbledore', 'David Yates', 2022, 'Mads Mikkelsen*\r\nEddie Redmayne*\r\nJude Law*\r\nKatherine Waterston*\r\nDan Fogler*\r\nCallum Turner*', 'Ante una severa amenaza, el magizoólogo Newt Scamander lidera a un valiente grupo de magos y brujas que busca detener al malvado Gellert Grindelwald.', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/-wHuLZ9ssg0\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '0138242.jpg'),
(5, 'Uncharted: Fuera del mapa', 'Ruben Fleischer', 2022, 'Tom Holland*\r\nMark Wahlberg*\r\nSophia Ali*\r\nTati Gabrielle*\r\nRudy Pankow*\r\nAntonio Banderas*', 'El cazador de tesoros Victor Sullivan recluta a Nathan Drake para que lo ayude a recuperar una fortuna de 500 años de antigüedad. Lo que comienza como un atraco se convierte en una competencia contra el despiadado Santiago Moncada.', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/3oV6ZSqhzKI\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Uncharted-341409600-large.jpg'),
(6, 'Morbius', 'Daniel Espinosa', 2022, 'Jared Leto*\r\nMichael Keaton*\r\nMatt Smith*\r\nAdria Arjona*\r\nJared Harris*\r\nTyrese Gibson*', 'Ambientada en el universo de Spider Man, se centra en uno de sus villanos más icónicos, Morbius, un doctor que tras sufrir una enfermedad en la sangre y fallar al intentar curarse, se convirtió en un vampiro.', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/xEGoxnjoM5E\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'poster-morbius-clip.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD PRIMARY KEY (`id_pelicula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  MODIFY `id_pelicula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
