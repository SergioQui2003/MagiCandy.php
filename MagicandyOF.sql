-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-06-2024 a las 20:58:23
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`) VALUES
(2, 13, 14, 1),
(3, 13, 13, 1),
(13, 16, 18, 1),
(59, 14, 29, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cat_slug` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id`, `name`, `cat_slug`) VALUES
(16, 'CARAMELOS MASTICABLES', 'CARAMELOS MASTICABLES'),
(19, 'CARAMELOS DUROS', 'CARAMELOS DUROS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `photo` varchar(200) NOT NULL,
  `date_view` date NOT NULL,
  `counter` int(11) NOT NULL,
  `quantity_in` int(11) NOT NULL DEFAULT 0,
  `quantity_sold` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `slug`, `price`, `photo`, `date_view`, `counter`, `quantity_in`, `quantity_sold`) VALUES
(28, 16, 'Anisada', '<p>Un dulce inolvidable con sabor anis</p>\r\n', 'anisada', 4000, 'anisada.webp', '2024-06-14', 9, 20000, 1510),
(29, 19, 'Super Coco', '<p>Un dulce unico con sabor a coco</p>\r\n', 'super-coco', 4000, 'super-coco.webp', '2024-06-14', 3, 100, 78),
(30, 16, 'Moritas', '<p>Un dulce con sabor a mora&nbsp;</p>\r\n', 'moritas', 4000, 'moritas.webp', '2024-06-14', 3, 100, 500999),
(31, 16, 'MiniGelatinas', '<p>Unas expectaculares gelatinas con muchos sabores unicos&nbsp;</p>\r\n', 'minigelatinas', 3700, 'minigelatinas.webp', '2024-06-13', 2, 100, 10),
(32, 16, 'Max', '<p>Un max con miles de sabores</p>\r\n', 'max', 3700, 'max.webp', '2024-06-13', 1, 100, 12),
(33, 19, 'Pastillitas', '<p>Dulces pastillitas con diferentes sabores tropicales</p>\r\n', 'pastillitas', 4000, 'pastillitas.webp', '2024-06-14', 1, 5000, 216),
(34, 16, 'Sonrics', '<p>Dulces con sabores extremadamente acidos&nbsp;</p>\r\n', 'sonrics', 5000, 'sonrics.webp', '0000-00-00', 0, 100, 1000),
(36, 16, 'Corazones', '<p>Dulces con relleno de chocolate&nbsp;</p>\r\n', 'corazones', 5000, 'corazones.webp', '2024-06-13', 2, 100, 50),
(44, 16, 'prueba', '<p>ds</p>\r\n', 'prueba', 3700, 'prueba.webp', '2024-06-13', 2, 100, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pay_id` varchar(50) NOT NULL,
  `sales_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(60) NOT NULL,
  `type` int(1) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `contact_info` varchar(100) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `activate_code` varchar(15) NOT NULL,
  `reset_code` varchar(15) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `type`, `firstname`, `lastname`, `address`, `contact_info`, `photo`, `status`, `activate_code`, `reset_code`, `created_on`) VALUES
(1, 'admin@gmail.com', '$2y$10$VZUxZl4MAEC0vZSH2tH4fOgQ5mNIfergHCpq4FtHTB05RUazH5hiu', 1, 'Sergio', 'Quiroga', '', '', 'Sergio.jpg', 1, '', '', '2024-04-01'),
(14, 'sergioquirogab2003@gmail.com', '$2y$10$GKzOikEnmy3uGHWio9F9z.xAh9If1I9YJGNleAZ2e26/uMIh4zVoK', 0, 'Sergio Alejandro', 'Quiroga Baez', 'calle 80', '3133813153', 'Sergio.jpg', 1, 'DhBS4friYZMb', '6HEnMxoN7LQgV1G', '2024-05-08'),
(16, 'diego@gmail.com', '$2y$10$cPMbY1TrL9ByCZON2xq4HeceI4MjaL5sR6SQ52BIyiFpmnnBdFsI2', 0, 'Diego', 'Martinez', '', '', '', 1, 'ZqCoeNfl75Ax', '', '2024-05-09'),
(17, 'diegooo@gmail.com', '$2y$10$68zuPQ62CBQWww09Lirh5.Z/ZnucXP1Aaj6tKGAGCdJwON34CHSFG', 0, 'sol', 'quiroga baes', '', '', '', 0, 'eYZVFxqGU9Lt', '', '2024-05-09'),
(18, 'diegoo@gmail.com', '$2y$10$q.T1j0mgj0y4.8MWIc9bteL8pDvNVnp3at03kC9tC3XUXRVmAHAGq', 0, 'sol', 'quiroga baes', '', '', '', 0, 'Ed4xVpGiUShO', '', '2024-05-09'),
(19, 'diegojose150@gmail.com', '$2y$10$4i.dtICOqewiU6g4D.cECu/yiP4ivLSq9B5za8u1ArTxdjmUQx.oq', 0, 'Diego', 'navarro ruiz', '', '', '', 0, 'wMVR8Wt9cSoN', '', '2024-05-10'),
(20, 'alejandroquiroga0811@gmail.com', '$2y$10$2ZTAHf4iA0mZSFDszJdf8.ZEFKxwdVr2WV3eRSOJrh00hWuO0//AG', 0, 'Sergio', 'quiroga baes', '', '', '', 0, 'LpaF8vD6wNzK', '', '2024-05-19'),
(21, 'baezalejandro0811@gmail.com', '$2y$10$NUEQpqpKqcYf7lkedCfiB.vTBO9cmx/yQ8blVVNj.JqDdQG9/dMTu', 0, 'alejandro', 'baez mojica', '', '', '', 0, 'NjdEa4OMbGD7', '', '2024-05-19'),
(22, 'saquiroga43@misena.edu.co', '$2y$10$g8gJV6nj.gTZX2qdu31imOloAXNMqat1HcgrAfaG1HzlBopx0Hvni', 0, 'Sergio', 'navarro ruiz', '', '', '', 0, 'X6fTwxegLa8y', '', '2024-05-19'),
(24, 'quirogasoraca20@gmail.com', '$2y$10$FNGHIu7/vCrTjrYcdWvM4uKUTTWm4cwkfhlNFPe6B7Temcyco9VHK', 0, 'Sergio', 'navarro ruiz', '', '', '', 0, 'ado4pjCnHFSE', '', '2024-05-19'),
(25, 'luisaceronq@gmail.com', '$2y$10$ThyKNDmsCywyZ3x9Jl5gk.hw4Uovl/6MN5k8q8frJaWPN9W.khnwa', 0, 'Luisa', 'Ceron Quiroga', '', '', '', 1, 'gK1rfJyt2ce5', 'r7cVy2RAz8TnvEF', '2024-05-19'),
(26, 'danielcapataz1@gmail.com', '$2y$10$QsLfKv81KJBXjGFXfIxgw.GX/QAUBlqMCjgXNKA3hq.2BVL3jfdlO', 0, 'yeison', 'capataz sol', '', '', '', 1, 'iMSh2wEDQdre', '', '2024-05-30');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
