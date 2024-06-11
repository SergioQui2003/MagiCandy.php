SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`) VALUES
(2, 13, 14, 1),
(3, 13, 13, 1),
(11, 14, 26, 45);

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cat_slug` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `category` (`id`, `name`, `cat_slug`) VALUES
(2, 'chocolates', 'chocolates'),
(3, 'gomas', 'gomas'),
(16, 'acidos', 'acidos'),
(17, 'importados', 'importados'),
(19, 'caseros', 'caseros'),
(20, 'refrescos', 'refrescos');

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(26, 3, 'Sonrics', '<h2>Un dulce cl&aacute;sico que recuerda a la infancia, el barrilete es un caramelo suave y masticable, a menudo con forma de barril o cilindro. Viene en una variedad de sabores frutales, desde fresa y lim&oacute;n hasta naranja y uva, ofreciendo una explosi&oacute;n de dulzura en cada bocado</h2>\r\n', 'sonrrr', 4000, 'sonrrr_1717025698.webp', '0000-00-00', 0, 65);

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `total` double NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `sales` (`id`, `total`, `date`) VALUES
(1, 4000, '2023-03-01 03:05:28'),
(2, 4500, '2023-03-05 23:15:28'),
(3, 5000, '2023-03-13 19:05:28');

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`id`, `username`, `password`, `email`, `type`) VALUES
(13, 'Paco', 'Paco', 'paco@paco.com', 'Cliente'),
(14, 'Luis', 'Luis', 'luis@luis.com', 'Cliente');

ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

COMMIT;
