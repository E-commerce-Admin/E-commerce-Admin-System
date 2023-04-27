CREATE TABLE `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1;

CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `address_city` varchar(100) DEFAULT NULL,
  `address_district` varchar(100) DEFAULT NULL,
  `address_street` varchar(100) DEFAULT NULL,
  `zip_code` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1;

CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `product_photo` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1;

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=5262;


INSERT INTO `order` (id, customer_id, product_id, quantity, subtotal, order_date) VALUES
(53, 123, 1, 1, 25, '2023-04-15'),
(54, 123, 2, 1, 50, '2023-04-15'),
(55, 123, 1, 2, 50, '2023-04-15'),
(56, 123, 4, 3, 825, '2023-04-15'),
(57, 123, 1, 1, 25, '2023-04-15'),
(58, 165, 2, 1, 50, '2023-04-15'),
(59, 165, 1, 1, 25, '2023-04-17'),
(60, 165, 1, 1, 25, '2023-04-17'),
(61, 165, 1, 1, 25, '2023-04-18'),
(62, 165, 4, 2, 550, '2023-04-18'),
(63, 165, 2, 1, 50, '2023-04-19'),
(64, 165, 4, 1, 275, '2023-04-19'),
(65, 165, 1, 1, 25, '2023-04-19'),
(66, 165, 1, 3, 75, '2023-04-19'),
(67, 888, 2, 1, 50, '2023-04-21'),
(68, 888, 1, 1, 25, '2023-04-21'),
(69, 888, 4, 1, 275, '2023-04-21'),
(70, 888, 4, 1, 275, '2023-04-21'),
(71, 888, 4, 1, 275, '2023-04-21'),
(72, 888, 1, 1, 25, '2023-04-21'),
(73, 888, 1, 1, 25, '2023-04-21'),
(74, 888, 1, 1, 25, '2023-04-21'),
(75, 888, 1, 2, 50, '2023-04-21'),
(76, 888, 4, 2, 550, '2023-04-27');


INSERT INTO `customer` (id, name, address_city, address_district, address_street, zip_code, phone) VALUES
(123, 'Dummy Name', 'Suzhou', 'Suzhou Industrial Park', 'Renai Road No. 111', '215000', '13966666666'),
(165, 'Another Dummy Name', 'Suzhou', 'Suzhou Industrial Park', 'Renai Road No. 111', '215000', '15266666666'),
(521, 'Fasdhagj Sdwuif', 'Shanghai', 'Huangpu District', 'xxxx', '200001', '081671829017'),
(888, 'Asff Sfreas', 'Shanghai', 'Huangpu District', 'xxxxx', '200001', '081671829017');

INSERT INTO `product` (id, name, description, price, product_photo) VALUES
(1, 'product1', 'description', 25, 'panarybody.jpg'),
(2, 'product2', 'description', 50, 'ortuseight.jpg'),
(3, 'product3', 'description', 200, 'pvn.jpg'),
(4, 'product4', 'description', 275, 'mayonette.jpg');

INSERT INTO `admin` (id, name, username, password) VALUES
(1, 'real name', 'admin1', '123456'),
(2, 'xx xxx', 'xxx', 'password'),
(3, 'xxx xxxx', 'admin2', '123456'),
(4, 'xxxxxx xx', 'admin3', '123456');