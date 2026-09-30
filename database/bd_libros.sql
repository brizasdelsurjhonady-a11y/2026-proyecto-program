-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-09-2026 a las 06:38:22
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_libros`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE `autores` (
  `ID_autores` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Apellidos` varchar(50) DEFAULT NULL,
  `telefono` bigint(14) NOT NULL,
  `correo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `autores`
--

INSERT INTO `autores` (`ID_autores`, `Nombre`, `Apellidos`, `telefono`, `correo`) VALUES
(10, 'Brayan', 'Toro Bustos', 573102984722, 'prueba@test.com'),
(11, 'Don patricio', 'carvajal', 2347672310, 'si@test.com.co.test'),
(18, 'Jhonady', 'Baldeon Gutierrez', 987654321, 'gabriel@ejemplo.com'),
(19, 'Mario', 'Vargas Llosa', 986543210, 'mario@ejemplo.com'),
(20, 'Gabriel', 'García Márquez', 987654321, 'gabriel@ejemplo.com'),
(21, 'Mario', 'Vargas Llosa', 986543210, 'mario@ejemplo.com'),
(22, 'Gabriel', 'García Márquez', 987654321, 'gabriel.garcia@example.com'),
(23, 'Mario', 'Vargas Llosa', 986543210, 'mario.vargas@example.com'),
(24, 'Julio', 'Cortázar', 985432109, 'julio.cortazar@example.com'),
(25, 'Isabel', 'Allende', 984321098, 'isabel.allende@example.com'),
(26, 'Jorge Luis', 'Borges', 983210987, 'jorge.borges@example.com'),
(27, 'José María', 'Arguedas', 982109876, 'jose.arguedas@example.com'),
(28, 'César', 'Vallejo', 981098765, 'cesar.vallejo@example.com'),
(29, 'Ricardo', 'Palma', 980987654, 'ricardo.palma@example.com'),
(30, 'Clorinda', 'Matto de Turner', 979876543, 'clorinda.matto@example.com'),
(31, 'Abraham', 'Valdelomar', 978765432, 'abraham.valdelomar@example.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editores`
--

CREATE TABLE `editores` (
  `ID_editores` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Apellidos` varchar(50) DEFAULT NULL,
  `nombre_editorial` varchar(70) DEFAULT NULL,
  `pais` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `editores`
--

INSERT INTO `editores` (`ID_editores`, `Nombre`, `Apellidos`, `nombre_editorial`, `pais`) VALUES
(1, 'Pedro', 'Diaz Perea', 'Editorial Andina', 'Perú'),
(2, 'Alejandro', 'Peralta', NULL, NULL),
(3, 'Irene', 'Dussan Pineda', NULL, NULL),
(5, 'Carlos', 'Ramírez', 'Editorial Andina', 'Perú'),
(6, 'Laura', 'Martínez', 'Editorial Hispanoamericana', 'Colombia'),
(7, 'Carlos', 'Ramírez', 'Editorial Andina', 'Perú'),
(8, 'Laura', 'Martínez', 'Editorial Hispanoamericana', 'Colombia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `ID_libro` int(11) NOT NULL,
  `Titulo` varchar(45) DEFAULT NULL,
  `Tipo` varchar(45) DEFAULT NULL,
  `ID_autor` int(11) DEFAULT NULL,
  `ID_editor` int(11) DEFAULT NULL,
  `ID_traductor` int(11) DEFAULT NULL,
  `genero` varchar(50) DEFAULT NULL,
  `archivo` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`ID_libro`, `Titulo`, `Tipo`, `ID_autor`, `ID_editor`, `ID_traductor`, `genero`, `archivo`) VALUES
(7, 'La Odisea - Edición Especial', 'Novela', 10, 3, 2, 'Aventura', 'https://edicioneshispanicas.com/wp-content/uploads/9788497945943.webp'),
(12, 'Cien años de soledad', 'Novela', 20, 5, 7, 'Realismo mágico', 'https://commons.wikimedia.org/wiki/Special:Redirect/file/Odisea003.jpg'),
(13, 'La ciudad y los perros', 'Novela', 19, 6, 8, 'Drama', 'https://m.media-amazon.com/images/I/71EyHH99GfL._SL1500_.jpg'),
(29, 'Cien años de soledad', 'Novela', 20, 1, 1, 'Realismo mágico', 'https://covers.openlibrary.org/b/isbn/9780307474728-L.jpg'),
(30, 'La ciudad y los perros', 'Novela', 21, 5, 2, 'Drama', 'https://covers.openlibrary.org/b/isbn/9780060732787-L.jpg'),
(31, 'Rayuela', 'Novela', 24, 6, 3, 'Literatura', 'https://covers.openlibrary.org/b/isbn/9780394743146-L.jpg'),
(32, 'La casa de los espíritus', 'Novela', 25, 7, 7, 'Realismo mágico', 'https://covers.openlibrary.org/b/isbn/9781501117015-L.jpg'),
(33, 'Ficciones', 'Cuento', 26, 8, 8, 'Fantasía', 'https://covers.openlibrary.org/b/isbn/9780802130303-L.jpg'),
(34, 'Los ríos profundos', 'Novela', 27, 1, 9, 'Indigenismo', 'https://covers.openlibrary.org/b/isbn/9780253202343-L.jpg'),
(35, 'Trilce', 'Poesía', 28, 5, 10, 'Poesía', 'https://covers.openlibrary.org/b/isbn/9780811216003-L.jpg'),
(36, 'Tradiciones peruanas', 'Cuento', 29, 6, 1, 'Historia', 'https://covers.openlibrary.org/b/isbn/9786123041234-L.jpg'),
(37, 'Aves sin nido', 'Novela', 30, 7, 2, 'Indigenismo', 'https://covers.openlibrary.org/b/isbn/9789972511552-L.jpg'),
(38, 'El caballero Carmelo', 'Cuento', 31, 8, 3, 'Narrativa', 'https://covers.openlibrary.org/b/isbn/9786123040015-L.jpg'),
(39, 'El amor en los tiempos del cólera', 'Novela', 20, 1, 7, 'Romance', 'https://covers.openlibrary.org/b/isbn/9780307389732-L.jpg'),
(40, 'Conversación en La Catedral', 'Novela', 21, 5, 8, 'Drama', 'https://covers.openlibrary.org/b/isbn/9780374526934-L.jpg'),
(41, 'Bestiario', 'Cuento', 24, 6, 9, 'Fantasía', 'https://covers.openlibrary.org/b/isbn/9780394758706-L.jpg'),
(42, 'Paula', 'Novela', 25, 7, 10, 'Biografía', 'https://covers.openlibrary.org/b/isbn/9780062316187-L.jpg'),
(43, 'El Aleph', 'Cuento', 26, 8, 1, 'Fantasía', 'https://covers.openlibrary.org/b/isbn/9780802130303-L.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `traductores`
--

CREATE TABLE `traductores` (
  `ID_traductores` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Apellidos` varchar(50) DEFAULT NULL,
  `idioma_nativo` varchar(30) DEFAULT NULL,
  `idiomas_traduccion` varchar(50) DEFAULT NULL,
  `certificaciones` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `traductores`
--

INSERT INTO `traductores` (`ID_traductores`, `Nombre`, `Apellidos`, `idioma_nativo`, `idiomas_traduccion`, `certificaciones`) VALUES
(1, 'Luis', 'Ruiz', 'Español', 'Inglés, Francés', 2),
(2, 'Amador', 'Peralta', NULL, NULL, NULL),
(3, 'Alejandra', 'Pineda', NULL, NULL, NULL),
(7, 'Juan', 'Pérez', 'Español', 'Inglés, Francés', 2),
(8, 'Sofía', 'Gómez', 'Español', 'Inglés, Alemán', 3),
(9, 'Juan', 'Pérez', 'Español', 'Inglés, Francés', 2),
(10, 'Sofía', 'Gómez', 'Español', 'Inglés, Alemán', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`ID_autores`);

--
-- Indices de la tabla `editores`
--
ALTER TABLE `editores`
  ADD PRIMARY KEY (`ID_editores`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`ID_libro`),
  ADD KEY `ID_autor` (`ID_autor`),
  ADD KEY `ID_editor` (`ID_editor`),
  ADD KEY `ID_traductor` (`ID_traductor`);

--
-- Indices de la tabla `traductores`
--
ALTER TABLE `traductores`
  ADD PRIMARY KEY (`ID_traductores`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autores`
--
ALTER TABLE `autores`
  MODIFY `ID_autores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `editores`
--
ALTER TABLE `editores`
  MODIFY `ID_editores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `ID_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `traductores`
--
ALTER TABLE `traductores`
  MODIFY `ID_traductores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`ID_autor`) REFERENCES `autores` (`ID_autores`),
  ADD CONSTRAINT `libros_ibfk_2` FOREIGN KEY (`ID_editor`) REFERENCES `editores` (`ID_editores`),
  ADD CONSTRAINT `libros_ibfk_3` FOREIGN KEY (`ID_traductor`) REFERENCES `traductores` (`ID_traductores`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
