-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-06-2024 a las 20:45:37
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
-- Base de datos: `magicandy`
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
(11, 14, 26, 45),
(12, 14, 17, 1);

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
(2, 'chocolates', 'chocolates'),
(3, 'gomas', 'gomas'),
(16, 'acidos', 'acidos'),
(17, 'importados', 'importados'),
(19, 'caseros', 'caseros'),
(20, 'refrescos', 'refrescos');

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
  `quantity` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `slug`, `price`, `photo`, `date_view`, `counter`, `quantity`) VALUES
(13, 20, 'BonBum', '<h2>Una tentadora delicia que combina lo mejor de dos mundos: el crujido de una galleta y la suavidad de un relleno cremoso. Los bonbums suelen tener forma de peque&ntilde;as esferas o discos, con una capa exterior crujiente y un centro de crema que puede ser de chocolate, avellana o vainilla. Son perfectos para satisfacer antojos dulces y a&ntilde;adir un toque de indulgencia a cualquier momento del d&iacute;a.</h2>\r\n', 'bonbum', 3100, 'bonbum_1715224124.webp', '2024-05-30', 4, 44),
(14, 3, 'Anisada', '<h2>Una deliciosa golosina con sabor a an&iacute;s, que se presenta en peque&ntilde;as pastillas redondas o en forma de gota. Su sabor suave y refrescante evoca notas de regaliz y hierbas, ofreciendo un placer dulce y arom&aacute;tico con cada mordida.</h2>\r\n', 'anisadas', 3700, 'anisadas_1715223950.webp', '2024-05-10', 1, 90),
(15, 2, 'Gelatina', '<p>Una opci&oacute;n refrescante y divertida entre los dulces, la gelatina es una golosina que combina sabor y textura de manera &uacute;nica. Con una variedad de sabores que van desde frutales hasta cremosos, la gelatina puede presentarse en forma de cubos, figuras o incluso en capas multicolores. Su textura suave y ligeramente el&aacute;stica la convierte en un postre ligero y refrescante, perfecto para disfrutar en cualquier ocasi&oacute;n..</p>\r\n', 'gelatina', 4000, 'gelatina_1715224168.webp', '2024-05-30', 5, 0),
(17, 20, 'Max', '<h2>Un cl&aacute;sico entre los dulces de caramelo, el Max es conocido por su sabor intenso y su textura suave y masticable. Estos caramelos suelen presentarse en forma de peque&ntilde;as tabletas o barras envueltas individualmente, ofreciendo una explosi&oacute;n de dulzura que perdura en el paladar. Con sabores que van desde la tradicional crema de leche hasta el ex&oacute;tico caramelo salado, el Max es una opci&oacute;n popular para satisfacer antojos de dulces en cualquier momento del d&iacute;a.</h2>\r\n', 'max', 3400, 'max_1715224144.webp', '2024-05-29', 1, 12),
(18, 20, 'Fruticas', '<h2>Peque&ntilde;as y coloridas, las fruticas son una explosi&oacute;n de sabor en cada mordisco. Estas golosinas gelatinosas vienen en una variedad de formas y sabores que representan frutas reales, como fresa, manzana, cereza, naranja y pi&ntilde;a. Su textura suave y jugosa las hace irresistibles para los amantes de los dulces, ofreciendo una experiencia de dulzura fresca y frutal..</h2>\r\n', 'fruticas', 1700, 'fruticas_1715224177.webp', '2024-05-09', 1, 44),
(19, 3, 'Barriletete', '<h2>Un dulce cl&aacute;sico que recuerda a la infancia, el barrilete es un caramelo suave y masticable, a menudo con forma de barril o cilindro. Viene en una variedad de sabores frutales, desde fresa y lim&oacute;n hasta naranja y uva, ofreciendo una explosi&oacute;n de dulzura en cada bocado</h2>\r\n', 'barrilete', 5000, 'barrilete_1715224115.webp', '2024-05-09', 2, 44),
(21, 2, 'deditos', '<h2>Un dulce cl&aacute;sico que recuerda a la infancia, el barrilete es un caramelo suave y masticable, a menudo con forma de barril o cilindro. Viene en una variedad de sabores frutales, desde fresa y lim&oacute;n hasta naranja y uva, ofreciendo una explosi&oacute;n de dulzura en cada bocado</h2>\r\n', 'rjrf', 9000, 'rjrf_1717025664.webp', '0000-00-00', 0, 44),
(22, 3, 'Super Coco', '<h2>Un dulce cl&aacute;sico que recuerda a la infancia, el barrilete es un caramelo suave y masticable, a menudo con forma de barril o cilindro. Viene en una variedad de sabores frutales, desde fresa y lim&oacute;n hasta naranja y uva, ofreciendo una explosi&oacute;n de dulzura en cada bocado</h2>\r\n', 'otro', 3700, 'otro_1717025572.webp', '0000-00-00', 0, 44),
(23, 3, 'Moritas', '<p>gtgtgtg</p>\r\n', 'gtgtgtg', 4000, 'gtgtgtg_1717024460.webp', '0000-00-00', 0, 89),
(24, 3, 'Candy Ranch', '<h2>Un dulce cl&aacute;sico que recuerda a la infancia, el barrilete es un caramelo suave y masticable, a menudo con forma de barril o cilindro. Viene en una variedad de sabores frutales, desde fresa y lim&oacute;n hasta naranja y uva, ofreciendo una explosi&oacute;n de dulzura en cada bocado</h2>\r\n', 'otrooooo', 3700, 'otrooooo_1717025608.webp', '0000-00-00', 0, 12),
(25, 2, 'pandas', '<p>Un dulce cl&aacute;sico que recuerda a la infancia, el barrilete es un caramelo suave y masticable, a menudo con forma de barril o cilindro. Viene en una variedad de sabores frutales, desde fresa y lim&oacute;n hasta naranja y uva, ofreciendo una explosi&oacute;n de dulzura en cada bocado</p>\r\n', 'pandas', 6500, 'pandas_1717025643.webp', '0000-00-00', 0, 44),
(26, 3, 'Sonrics', '<h2>Un dulce cl&aacute;sico que recuerda a la infancia, el barrilete es un caramelo suave y masticable, a menudo con forma de barril o cilindro. Viene en una variedad de sabores frutales, desde fresa y lim&oacute;n hasta naranja y uva, ofreciendo una explosi&oacute;n de dulzura en cada bocado</h2>\r\n', 'anisadassasas', 3700, 'anisadassasas_1717025547.webp', '0000-00-00', 0, 44);

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
(14, 'sergioquirogab2003@gmail.com', '$2y$10$LiHzFZBblR73tiZB5mwuLObwQTMHdDhc8y1IcUllaoAK.GF2Hyiyu', 0, 'Sergio Alejandro', 'Quiroga Baez', 'calle 80', '3133813153', 'Sergio.jpg', 1, 'DhBS4friYZMb', '6HEnMxoN7LQgV1G', '2024-05-08'),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
