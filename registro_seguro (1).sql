-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-01-2026 a las 06:29:30
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
-- Base de datos: `registro_seguro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `rol` enum('admin','usuario') NOT NULL DEFAULT 'usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`, `telefono`, `fecha_registro`, `rol`) VALUES
(28, 'jose maria', 'jose@gmail.com', '$2y$10$/OzqE0j4WTxcOybtZ/f7gOzZvc10f6IjtE7qAzj.wmdOEulprzpY2', '7721458974', '2026-01-23 02:30:08', ''),
(29, 'PEPE cruz2w', 'pepe@admin.com', '$2y$10$RfAdr6vYJOZblRUCuc7jf.rlSu/jAB2dTID88hvG8PlbA3xA9NUmy', '7721458965', '2026-01-23 02:39:23', 'admin'),
(31, 'MARIA CRUZ', 'maria@admin.com', '$2y$10$IbKpAyDYhvWErYBq/fhv/eWhfdleIxVgf4MThINvUJVayYQMCKim2', '1234567892', '2026-01-23 04:36:05', ''),
(32, 'MARIA CRUZ Paz', 'maria2@admin.com', '$2y$10$jWlPZywrRxzxZm.ufXKw1uYfKg2HEtYllLsItcKlIelgvowt2Lf66', '7721547896', '2026-01-23 04:38:25', 'admin'),
(33, 'jose', 'joss@gmail.com', '$2y$10$tQLzmK7YQfBhYDjVhBOsXeBRC3kmQCOZCDSXqGCuntryVjRWjbiIa', '7721548796', '2026-01-23 04:43:51', 'usuario'),
(34, 'jose', 'pepe2@admin.com', '$2y$10$V9zm.xGvJciZlUv/FGtDQ.fpn5ZV9i1QSGhvj3mGU6AObBg.hbC3i', '1234512343', '2026-01-23 04:44:28', 'admin'),
(35, 'eer3', 'e@gmail.com', '$2y$10$zWStNH1Ff24V1bRReADB2OGe6LyMMKIiemXPrv1H8mdUlJruem0Ay', '1231231231', '2026-01-23 04:46:29', 'usuario'),
(36, 'jose', 'Miguel1320@gmail.com', '$2y$10$RXtN/zK3afWbYsNCApBrCODAqQzsIjKDqTwIEvlC9G/qyUdhGfQXW', '1231231231', '2026-01-23 04:49:13', 'usuario'),
(37, 'MARCELA PEREZ', 'ma@gmail.com', '$2y$10$vcovom2AL4./UjKMK4spguVUN/EeEQkGocE4fv6WXzAgp6EYqpfLu', '7894561237', '2026-01-23 04:50:45', 'usuario'),
(38, 'jose', 'j@gmail.com', '$2y$10$ruLx0QXMkYTzfqpk8IdCfuGckJK2GResyR5mxT8wuzPCydOBvwzUS', '4564564564', '2026-01-23 04:52:58', 'usuario'),
(39, 'asq', 'as@gmail.com', '$2y$10$jtVK0wDNbpWxWr7TkIE8n.YpOeiwTTlyCO/xGXFUDIJS2/D8UaaqO', '7721458956', '2026-01-23 04:54:43', 'usuario'),
(40, 'jose', 'pepwe@admin.com', '$2y$10$R3YoeTxvys7e8lVgsCH7GurLAsOlz2OnE1tSHCTA2alMVzBxpkiJy', '1234123412', '2026-01-23 05:21:01', 'admin'),
(41, 'vvv', 'vvv@gmail.com', '$2y$10$CzStqWXqI2B39y2qX7Kntu.YqE5IRn6TvXaV6fHqjI5NqDc7KpZ7m', '1231231231', '2026-01-23 05:23:24', 'usuario'),
(42, 'jose', 'ser@gmail.com', '$2y$10$DSOw4fxwkMQ2gniASDaPR.pfQtSEel0aXi3s3qJiqTbGj9fk.XRF2', '1111122222', '2026-01-23 05:27:46', 'usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
