-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-01-2024 a las 06:00:53
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `universidad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `ciudad` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `id_clase` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `nombre`, `apellido`, `ciudad`, `telefono`, `id_clase`) VALUES
(1, 'Allisson chillona', 'Gutierrez', 'Armenia', '321890365', 1),
(2, 'Andres', 'Gutierrez', 'Quindio', '321456987', 2),
(4, 'santiago', 'Arenas', 'Quimbaya  Colombia patria', '123789-456-123456', 1),
(7, 'Salome', 'Arenas', 'Tapao', '123-456-789', 1),
(8, 'Julio', 'Palta', 'Santander', '963-852-741', 6),
(9, 'Fanny', 'Cecilia', 'Bogota', '852-852-741', 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases`
--

CREATE TABLE `clases` (
  `id` int(11) NOT NULL,
  `clase` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clases`
--

INSERT INTO `clases` (`id`, `clase`) VALUES
(1, 'Ingles'),
(2, 'Frances'),
(6, 'Geografia'),
(9, 'geometria'),
(14, 'españolete'),
(17, 'geometria'),
(19, 'ciencias basicas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestros`
--

CREATE TABLE `maestros` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `id_clase` int(11) NOT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `estado` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `maestros`
--

INSERT INTO `maestros` (`id`, `email`, `name`, `lastname`, `direccion`, `fecha`, `id_clase`, `id_rol`, `estado`) VALUES
(22, 'andresBodsdgota@gmail.com', 'Andres  David ', 'Davidf fdsfs  fsdf dsada', 'colombia  fdsdf  dfsfsd', '2024-01-03', 1, 2, 'Activo'),
(37, '25@gmail.com', 'medellin', 'colombia', 'manzana', '2024-01-03', 6, 1, 'Activo'),
(38, 'buga@gmail.com', 'hader', 'casa', ' tunja', '2024-01-08', 9, 2, 'activo'),
(45, 'Jose@gmail.com', 'Jose', 'ruiz', 'Manizales', '2024-01-04', 1, NULL, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Maestro'),
(3, 'Alumno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `password` varchar(250) NOT NULL,
  `rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `correo`, `password`, `rol_id`) VALUES
(2, 'maestro@maestro', '$2y$10$0pJPpSyjrAL/vcUMMJbu6.FYIU4rA1QUEe/qiaQElJhbly4wNgeGS', 2),
(3, 'admin@admin', '$2y$10$7x6cl99yFUxMJL7NDBMWYOSzsowii7VQfjN2MlvWPz4FiL4L0hPHa', 1),
(5, 'alumno@alumno', '$2y$10$YpYS1JRtDdALAnsZ58Kt4un7YfZXDHQjZdzfbVELy/OLgblNtkn/S', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_clase` (`id_clase`);

--
-- Indices de la tabla `clases`
--
ALTER TABLE `clases`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `maestros`
--
ALTER TABLE `maestros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_clase` (`id_clase`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol_id` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `clases`
--
ALTER TABLE `clases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `maestros`
--
ALTER TABLE `maestros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `alumnos_ibfk_1` FOREIGN KEY (`id_clase`) REFERENCES `clases` (`id`);

--
-- Filtros para la tabla `maestros`
--
ALTER TABLE `maestros`
  ADD CONSTRAINT `maestros_ibfk_1` FOREIGN KEY (`id_clase`) REFERENCES `clases` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `maestros_rol_id` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
