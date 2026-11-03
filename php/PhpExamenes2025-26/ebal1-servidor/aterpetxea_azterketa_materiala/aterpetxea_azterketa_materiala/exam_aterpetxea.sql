-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 03-11-2025 a las 12:13:06
-- Versión del servidor: 5.7.24
-- Versión de PHP: 8.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `exam_aterpetxea`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `breeds`
--

CREATE TABLE `breeds` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `breeds`
--

INSERT INTO `breeds` (`id`, `name`, `description`) VALUES
(1, 'Txakurra mestizoa', 'Arraza nahastuko txakurra'),
(2, 'Katua europar', 'Europar katua, oso ohikoa'),
(3, 'Txakur Golden Retriever', 'Lagunkoiak eta familia onekoak'),
(4, 'Txakur Labrador', 'Energia handiko txakurra eta jostaria'),
(5, 'Katua siames', 'Katua elebakar eta atsegina'),
(6, 'Txakur Chihuahua', 'Txakur txiki eta oso leial'),
(7, 'Katua persa', 'Ilea luzeko katua eta lasaia'),
(8, 'Txakur Pastor alemán', 'Intelektua handia, lan txakurra'),
(9, 'Katua bengalí', 'Aktiboa eta jostaria'),
(10, 'Txakur Beagle', 'Ehiza txakurra, oso zoriontsua'),
(11, 'Untxi arrunta', 'Untxi mestizoa eta atsegina'),
(12, 'Hegazti periquito', 'Hegazti txikia eta koloretakoa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pets`
--

CREATE TABLE `pets` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `breed_id` int(11) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `size` enum('Txikia','Ertaina','Handia') DEFAULT 'Ertaina',
  `sex` enum('Arra','Emea') NOT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `adopted` tinyint(1) DEFAULT '0',
  `entry_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pets`
--

INSERT INTO `pets` (`id`, `name`, `breed_id`, `age`, `size`, `sex`, `description`, `image`, `adopted`, `entry_date`) VALUES
(1, 'Luna', 1, 3, 'Ertaina', 'Emea', 'Txakur atsegina eta haurrekin oso ona. Paseatzea maite du.', 'pet1.jpg', 0, '2024-01-15'),
(2, 'Max', 3, 5, 'Handia', 'Arra', 'Golden Retriever ederra, oso jostaria eta familia onekoa.', 'pet2.jpg', 0, '2024-02-20'),
(3, 'Misi', 2, 2, 'Txikia', 'Emea', 'Katu europar txikia, oso maitakorra eta lasaia.', 'pet3.jpg', 0, '2024-03-10'),
(4, 'Rocky', 4, 4, 'Handia', 'Arra', 'Labrador energetikoa, egunero ariketa behar du.', 'pet4.jpg', 1, '2023-11-05'),
(5, 'Nieve', 7, 6, 'Ertaina', 'Emea', 'Katu persa ederra, ilea luzekoa eta oso lasaia.', 'pet5.jpg', 0, '2024-01-28'),
(6, 'Thor', 8, 3, 'Handia', 'Arra', 'Pastor alemán intelektua handia duena, trebakuntza ona behar du.', 'pet6.jpg', 0, '2024-04-02'),
(7, 'Bella', 6, 2, 'Txikia', 'Emea', 'Chihuahua txikia baina ausarta, leiala eta babeslaria.', 'pet7.jpg', 0, '2023-12-18'),
(8, 'Simón', 5, 4, 'Ertaina', 'Arra', 'Katu siames elebakar eta arreta asko behar duena.', 'pet8.jpg', 0, '2024-02-14'),
(9, 'Coco', 1, 1, 'Txikia', 'Arra', 'Txakur gazte eta jostaria, etxe aktibo batean ondo egongo da.', 'pet9.jpg', 1, '2024-05-01'),
(10, 'Pelusa', 2, 5, 'Txikia', 'Emea', 'Katu lasai eta independentea, apartamentu batean ondo.', 'pet10.jpg', 1, '2023-10-22'),
(11, 'Bruno', 10, 3, 'Ertaina', 'Arra', 'Beagle jostaria, sudurra jarraitzen maite du.', 'pet11.jpg', 0, '2024-03-25'),
(12, 'Manchas', 9, 2, 'Ertaina', 'Emea', 'Katu bengalí oso aktiboa, jolasak eta igogailuak maite ditu.', 'pet12.jpg', 0, '2024-04-18'),
(13, 'Toby', 1, 7, 'Ertaina', 'Arra', 'Txakur zaharragoa baina oso atsegina eta lasaia.', 'pet13.jpg', 0, '2024-01-08'),
(14, 'Nina', 2, 3, 'Txikia', 'Emea', 'Katu gazte eta zoragarria, oso jostaria.', 'pet14.jpg', 1, '2024-05-10'),
(16, 'Copito', 11, 1, 'Txikia', 'Arra', 'Untxi zuri eta ilebigun, haurrek harrituta uzten dituena.', 'pet16.jpg', 0, '2024-04-05'),
(17, 'Piolín', 12, 2, 'Txikia', 'Arra', 'Periquito horia eta berdea, txioa eta kantatzea maite du.', 'pet17.jpg', 0, '2024-05-15'),
(18, 'Daisy', 3, 4, 'Handia', 'Emea', 'Golden Retriever atsegina, haurrentzat perfektua.', 'pet18.jpg', 0, '2024-02-28'),
(19, 'Tigre', 9, 3, 'Ertaina', 'Arra', 'Katu bengalí energetikoa, espazioa behar du.', 'pet19.jpg', 0, '2024-03-20'),
(20, 'Canela', 6, 4, 'Txikia', 'Emea', 'Chihuahua maitakorra, maiz besarkatzea maite du.', 'pet20.jpg', 1, '2023-11-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `registration_date`) VALUES
(1, 'admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Administratzailea', '2025-11-03 07:53:53'),
(2, 'jon', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Jon Azpiroz', '2025-11-03 07:53:53'),
(3, 'ane', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Ane Etxeberria', '2025-11-03 07:53:53'),
(4, 'mikel', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Mikel Garmendia', '2025-11-03 07:53:53');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `breeds`
--
ALTER TABLE `breeds`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indices de la tabla `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `breed_id` (`breed_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `breeds`
--
ALTER TABLE `breeds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `pets`
--
ALTER TABLE `pets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pets`
--
ALTER TABLE `pets`
  ADD CONSTRAINT `pets_ibfk_1` FOREIGN KEY (`breed_id`) REFERENCES `breeds` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
