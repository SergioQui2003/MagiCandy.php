SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tiendaonline`
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
(3, 13, 13, 1);

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
(2, 'CPUS', 'desktop-pc'),
(3, 'CELULARES', 'tablets'),
(16, 'TECLADOS', 'TECLADOS'),
(17, 'DISCO DURO', 'DISCO DURO'),
(19, 'MONITOR', 'MONITOR'),
(20, 'LAPTOPS', 'LAPTOPS');

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
  `counter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `slug`, `price`, `photo`, `date_view`, `counter`) VALUES
(13, 20, 'LAPTOP ASUS VIVOBOOK 15 OLED K513EA-L12004T INTEL CORE I5 8GB RAM 512GB SSD 15.6\'\'', '<h2>La laptop K513EA-L12004T de Asus cuenta con un potente procesador Intel Core i5, 8GB de RAM, almacenamiento SSD de 512GB y un elegante y resistente chasis de aluminio</h2>\r\n', 'laptop-asus-vivobook-15-oled-k513ea-l12004t-intel-core-i5-8gb-ram-512gb-ssd-15-6', 2700, 'laptop-asus-vivobook-15-oled-k513ea-l12004t-intel-core-i5-8gb-ram-512gb-ssd-15-6.jpg', '2022-02-22', 8),
(14, 20, 'LAPTOP ACER AN515-55-50U5 INTEL CORE I5 10300H 8GB 512GB 15.6\"', '<h2>Nueva laptop gamer marca Acer con procesador Intel Core i5, memoria RAM de 8GB, Disco duro 512GB, FHD, 144Hz nitro y LED IPS. Encuentra las mejores ofertas en laptops solo en Ripley.</h2>\r\n', 'laptop-acer-an515-55-50u5-intel-core-i5-10300h-8gb-512gb-15-6', 3700, 'laptop-acer-an515-55-50u5-intel-core-i5-10300h-8gb-512gb-15-6_1645289044.jpg', '2022-02-22', 5),
(15, 20, 'LAPTOP LENOVO LEGION 5 INTEL CORE I7 8GB 1TB + 256GB GEFORCE GTX 1650 15.6\"', '<h2>La laptop Legion 5 de Lenovo combina toda la potencia de los procesadores Intel y las gr&aacute;ficas de NVIDIA con una bater&iacute;a de larga duraci&oacute;n y un dise&ntilde;o elegante</h2>\r\n', 'laptop-lenovo-legion-5-intel-core-i7-8gb-1tb-256gb-geforce-gtx-1650-15-6', 4000, 'laptop-lenovo-legion-5-intel-core-i7-8gb-1tb-256gb-geforce-gtx-1650-15-6.jpg', '2022-02-22', 1),
(16, 20, 'MACBOOK AIR 13.3\" APPLE M1 256GB 8GB', '<h2>Disfruta de toda la potencia y elegancia de la nueva Macbook Air, equipada con el poderoso Chip M1, el primero de una estirpe de procesadores dise&ntilde;ados espec&iacute;ficamente para tus productos Appl</h2>\r\n', 'macbook-air-13-3-apple-m1-256gb-8gb', 4500, 'macbook-air-13-3-apple-m1-256gb-8gb.jpg', '2022-02-19', 1),
(17, 20, 'LAPTOP LENOVO IDEAPAD 5I INTEL CORE I7-1165G7 16GB 256GB SSD 15.6\"', '<h2>Nueva Lenovo IdeaPad 5i, con procesador Intel core de 11va generaci&oacute;n, Windows 10 Home - Espa&ntilde;ol, tarjeta gr&aacute;fica Intel Iris Xe Graphics (Integrada) y pantalla IPS Antireflejo. Encuentra en Ripley las mejores ofertas en laptops.</h2>\r\n', 'laptop-lenovo-ideapad-5i-intel-core-i7-1165g7-16gb-256gb-ssd-15-6', 3400, 'laptop-lenovo-ideapad-5i-intel-core-i7-1165g7-16gb-256gb-ssd-15-6_1645289380.jpg', '0000-00-00', 0),
(18, 20, 'LAPTOP ASUS X415 X415EA-EB112T 8GB DDR4 256GB SSD 14\'\'', '<h2>Laptop X415EA-EB112T de Asus. Procesador Intel&reg; Core i3-1115G4. Memoria RAM de 8GB. 256GB de almacenamiento en estado s&oacute;lido. &iexcl;Adqui&eacute;rela ya en Ripley.com!</h2>\r\n', 'laptop-asus-x415-x415ea-eb112t-8gb-ddr4-256gb-ssd-14', 1700, 'laptop-asus-x415-x415ea-eb112t-8gb-ddr4-256gb-ssd-14.jpg', '2022-02-19', 2),
(19, 20, 'LAPTOP ASUS FX516PC-HN004T INTEL CORE I7 16GB RAM 512GB SSD 15.6\'\'', '<h2>Si buscas una laptop compacta, potente y con un exclusivo dise&ntilde;o, la laptop FX516PC-HN004T es perfecta para ti</h2>\r\n', 'laptop-asus-fx516pc-hn004t-intel-core-i7-16gb-ram-512gb-ssd-15-6', 5000, 'laptop-asus-fx516pc-hn004t-intel-core-i7-16gb-ram-512gb-ssd-15-6.jpg', '2022-02-22', 2);

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
(1, 'admin@gmail.com', '$2y$10$VZUxZl4MAEC0vZSH2tH4fOgQ5mNIfergHCpq4FtHTB05RUazH5hiu', 1, 'Tarea', 'Completo', '', '', 'tarea.png', 1, '', '', '2018-05-01'),
(13, 'joel@gmail.com', '$2y$10$M566C0GZvd8pq1UQ/4XzMOx59isKq.3qvVWkadyeJftvlwbtysIMW', 0, 'Joel', 'Tarea', 'Tarea', '876745653', 'tarea.png', 1, '', '', '2022-02-19');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
