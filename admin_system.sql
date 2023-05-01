-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 01, 2023 at 02:10 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_category` bigint(20) NOT NULL COMMENT '主键id',
  `is_delete` tinyint(1) DEFAULT 0 COMMENT '是否删除',
  `category_name` varchar(255) NOT NULL COMMENT '名字',
  `creator_id` bigint(20) NOT NULL COMMENT '创建者id',
  `creator_name` varchar(20) NOT NULL COMMENT '创建者姓名',
  `introduction` tinytext DEFAULT NULL COMMENT '简介',
  `category_photo` varchar(256) NOT NULL DEFAULT 'assets/img/profile.png' COMMENT '种类图片',
  `create_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='分类';

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `is_delete`, `category_name`, `creator_id`, `creator_name`, `introduction`, `category_photo`, `create_time`) VALUES
(1, 0, 'food', 1, 'John', 'Category for food products', 'food.jpeg', '2023-04-30 19:43:58'),
(2, 0, 'electronics', 1, 'John', 'Category for electronic products', 'electronics.jpeg', '2023-04-30 19:44:05'),
(3, 0, 'clothing', 1, 'John', 'Category for clothing products', 'clothing.jpeg', '2023-04-30 19:44:08');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `id_coupon` bigint(20) NOT NULL COMMENT '主键id',
  `product_name` varchar(255) DEFAULT NULL COMMENT 'product_name',
  `coupon_name` varchar(255) DEFAULT NULL COMMENT 'coupon_name',
  `discount` varchar(20) DEFAULT NULL COMMENT '打几折/减多少',
  `is_valid` tinyint(1) NOT NULL DEFAULT 0,
  `is_delete` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否删除',
  `create_time` timestamp NULL DEFAULT current_timestamp() COMMENT '创建时间',
  `deadline` timestamp NULL DEFAULT current_timestamp() COMMENT '截至日期'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='历史记录';

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`id_coupon`, `product_name`, `coupon_name`, `discount`, `is_valid`, `is_delete`, `create_time`, `deadline`) VALUES
(1, 'Banana', 'coupon1', '20%', 0, 0, '2023-04-30 06:18:23', '2023-04-30 23:40:00'),
(2, 'Jeans', 'coupon2', '50', 1, 0, '2023-04-30 06:18:23', '2023-06-29 16:00:00'),
(3, 'Laptop', 'asdsad', '100', 1, 0, '2023-04-30 22:43:00', '2023-05-17 22:42:00');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id_order` bigint(20) NOT NULL COMMENT '主键id',
  `id_user` bigint(20) DEFAULT NULL COMMENT '用户ID',
  `id_product` bigint(20) DEFAULT NULL COMMENT 'productID',
  `user_name` varchar(255) DEFAULT NULL COMMENT 'userName',
  `product_name` varchar(255) DEFAULT NULL COMMENT 'productName',
  `status` tinyint(4) DEFAULT NULL COMMENT '请求状态',
  `price` bigint(20) DEFAULT NULL COMMENT '价格',
  `subtotal` bigint(20) DEFAULT NULL COMMENT '价格总量',
  `quantity` int(11) NOT NULL COMMENT '数量',
  `coupon_name` bigint(20) DEFAULT -1 COMMENT '用的优惠卷，没用默认为-1',
  `is_delete` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否删除',
  `shipping_address` varchar(255) DEFAULT NULL COMMENT '地址',
  `create_time` timestamp NULL DEFAULT current_timestamp() COMMENT '创建时间',
  `payment_method` varchar(255) DEFAULT NULL COMMENT '付款方式'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='历史记录';

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id_order`, `id_user`, `id_product`, `user_name`, `product_name`, `status`, `price`, `subtotal`, `quantity`, `coupon_name`, `is_delete`, `shipping_address`, `create_time`, `payment_method`) VALUES
(1, 1, 1, 'John', 'Product 1', 1, 100, 100, 1, 1, 0, '123 Main St, Anytown USA', '2023-04-30 06:18:23', 'credit card'),
(2, 2, 2, 'Jane', 'Product 2', 2, 200, 400, 2, -1, 0, '456 Broad St, Anytown USA', '2023-04-30 06:18:23', 'paypal'),
(3, 3, 6, 'Amy', 'Pizza', 1, 50, 50, 1, -1, 0, '789 Main St, Anytown USA', '2023-05-01 02:30:00', 'credit card'),
(4, 4, 7, 'Bob', 'Jeans', 1, 150, 150, 1, -1, 0, '456 Pine St, Anytown USA', '2023-05-01 03:00:00', 'paypal'),
(5, 5, 1, 'David', 'Product 1', 1, 100, 100, 1, -1, 0, '123 Main St, Anytown USA', '2023-04-30 22:18:23', 'credit card'),
(6, 6, 2, 'Emily', 'Product 2', 2, 200, 400, 2, -1, 0, '456 Broad St, Anytown USA', '2023-04-30 22:18:23', 'paypal'),
(7, 1, 2, 'John', 'Product 2', 1, 200, 200, 1, -1, 0, '123 Main St, Anytown USA', '2023-04-30 21:36:11', 'credit card'),
(8, 2, 1, 'Jane', 'Product 1', 2, 100, 100, 1, -1, 0, '456 Broad St, Anytown USA', '2023-04-30 21:36:11', 'paypal'),
(9, 3, 5, 'Amy', 'test', 1, 50, 50, 1, -1, 0, '789 Main St, Anytown USA', '2023-04-30 21:36:11', 'credit card'),
(10, 4, 7, 'Bob', 'Jeans', 1, 150, 150, 1, -1, 0, '456 Pine St, Anytown USA', '2023-04-30 21:36:11', 'paypal'),
(11, 5, 10, 'David', 'Laptop', 2, 20000, 40000, 2, -1, 0, '123 Main St, Anytown USA', '2023-04-30 21:36:11', 'credit card'),
(12, 3, 7, 'Amy', 'Jeans', 1, 150, 150, 1, -1, 0, '123 Main St, Anytown USA', '2023-04-30 20:00:00', 'credit card'),
(13, 4, 1, 'Bob', 'Product 1', 2, 100, 100, 1, -1, 0, '456 Broad St, Anytown USA', '2023-04-30 20:00:00', 'paypal'),
(14, 5, 2, 'David', 'Product 2', 1, 200, 200, 1, -1, 0, '123 Main St, Anytown USA', '2023-04-30 20:00:00', 'credit card'),
(15, 6, 6, 'Emily', 'Pizza', 2, 50, 100, 2, -1, 0, '456 Broad St, Anytown USA', '2023-04-30 20:00:00', 'paypal'),
(16, 1, 5, 'John', 'test', 1, 50, 50, 1, -1, 0, '123 Main St, Anytown USA', '2023-04-30 20:00:00', 'credit card'),
(17, 2, 10, 'Jane', 'Laptop', 1, 20000, 20000, 1, -1, 0, '456 Broad St, Anytown USA', '2023-04-30 20:00:00', 'paypal'),
(18, 3, 7, 'Amy', 'Jeans', 1, 150, 150, 1, -1, 0, '123 Main St, Anytown USA', '2023-04-30 20:30:00', 'credit card'),
(19, 4, 1, 'Bob', 'Product 1', 2, 100, 100, 1, -1, 0, '456 Broad St, Anytown USA', '2023-04-30 20:30:00', 'paypal'),
(20, 5, 2, 'David', 'Product 2', 1, 200, 200, 1, -1, 0, '123 Main St, Anytown USA', '2023-04-30 20:30:00', 'credit card'),
(21, 6, 6, 'Emily', 'Pizza', 2, 50, 100, 2, -1, 0, '456 Broad St, Anytown USA', '2023-04-30 20:30:00', 'paypal');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` bigint(20) NOT NULL COMMENT '主键id',
  `is_delete` tinyint(1) DEFAULT 0 COMMENT '是否删除',
  `name_product` varchar(255) NOT NULL COMMENT '名字',
  `stock` bigint(20) NOT NULL COMMENT '存量',
  `create_time` timestamp NULL DEFAULT current_timestamp() COMMENT '创建时间',
  `delete_time` timestamp NULL DEFAULT NULL COMMENT '删除时间',
  `description` text DEFAULT NULL COMMENT '介绍',
  `category_name` varchar(255) DEFAULT '类名',
  `product_photo` varchar(256) NOT NULL,
  `id_category` bigint(20) NOT NULL COMMENT '分类ID',
  `price` bigint(20) DEFAULT NULL COMMENT '价格'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品';

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `is_delete`, `name_product`, `stock`, `create_time`, `delete_time`, `description`, `category_name`, `product_photo`, `id_category`, `price`) VALUES
(1, 0, 'Product 1', 10, '2023-04-30 06:18:23', NULL, 'This is product 1', 'food', 'lays.jpeg', 1, 100),
(2, 0, 'Product 2', 20, '2023-04-30 06:18:23', NULL, 'This is product 2', 'electronics', 'earpods.jpeg', 2, 200),
(5, 1, 'test', 20, '2023-04-30 19:35:49', '2023-04-30 21:56:35', 'sdasda', 'clothing', 'dataset.png', 3, 50),
(6, 0, 'Pizza', 20, '2023-04-30 16:00:00', NULL, 'A delicious pizza with your favorite toppings', 'food', 'pizza.jpeg', 2, 50),
(7, 0, 'Jeans', 15, '2023-04-30 16:00:00', NULL, 'A classic pair of denim jeans for any occasion', 'clothing', 'jeans.jpeg', 3, 150),
(10, 0, 'Laptop', 20, '2023-04-30 16:00:00', NULL, 'A powerful laptop for work or gaming', 'electronics', 'laptop.jpeg', 1, 20000),
(11, 0, 'Smartphone', 50, '2023-04-30 16:00:00', NULL, 'The latest smartphone with high-end features', 'electronics', 'smartphone.jpeg', 1, 10000),
(12, 0, 'Banana', 100, '2023-04-30 16:00:00', NULL, 'A delicious fruit with lots of nutrients', 'food', 'banana.jpeg', 2, 50),
(13, 0, 'T-shirt', 30, '2023-04-30 16:00:00', NULL, 'A comfortable cotton t-shirt for everyday wear', 'clothing', 'tshirt.jpeg', 3, 100),
(14, 0, 'Headphones', 10, '2023-04-30 16:00:00', NULL, 'High-quality headphones for music lovers', 'electronics', 'headphones.jpeg', 1, 500);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` bigint(20) NOT NULL COMMENT '主键id',
  `is_delete` tinyint(1) DEFAULT 0 COMMENT '是否删除',
  `username` varchar(20) NOT NULL COMMENT '名字',
  `mail` varchar(255) DEFAULT NULL COMMENT '邮箱',
  `phone_number` varchar(20) DEFAULT NULL COMMENT '电话号',
  `authority` tinyint(4) DEFAULT NULL COMMENT '权限',
  `user_photo` varchar(256) NOT NULL DEFAULT 'assets/img/png',
  `password` varchar(128) DEFAULT NULL COMMENT '密码',
  `introduction` varchar(400) DEFAULT 'This is an self introduction editing by yourself.' COMMENT '自我介绍'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户';

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `is_delete`, `username`, `mail`, `phone_number`, `authority`, `user_photo`, `password`, `introduction`) VALUES
(1, 0, 'John', 'john@example.com', '123-456-7890', 1, 'assets/img/team1.jpg', 'password1', 'Hi, I am John'),
(2, 0, 'Jane', 'jane@example.com', '987-654-3210', 2, 'assets/img/team2.jpg', 'password2', 'Hi, I am Jane'),
(3, 0, 'customer1', 'customer@gmail.com', '123456', 3, '', '123456', 'This is an self introduction editing by yourself.'),
(4, 0, 'admin1', 'admin1@gmail.com', '123456', 1, 'assets/img/profile.png', '123456', 'This is an self introduction editing by yourself.'),
(5, 0, 'David', 'david@example.com', '123-456-7890', 3, 'assets/img/team5.jpg', 'password5', 'Hi, I am David'),
(6, 0, 'Emily', 'emily@example.com', '987-654-3210', 3, 'assets/img/team6.jpg', 'password6', 'Hi, I am Emily'),
(8, 0, 'Amy', 'amy@example.com', '123-456-7890', 3, 'assets/img/team3.jpg', 'password3', 'Hi, I am Amy'),
(9, 0, 'Bob', 'bob@example.com', '987-654-3210', 3, 'assets/img/team4.jpg', 'password4', 'Hi, I am Bob'),
(10, 0, 'Test User 1', 'testuser1@example.com', '111-111-1111', 3, 'assets/img/profile.png', 'password1', 'Hi, I am Test User 1'),
(11, 0, 'Test User 2', 'testuser2@example.com', '222-222-2222', 3, 'assets/img/profile.png', 'password2', 'Hi, I am Test User 2'),
(12, 0, 'Test User 3', 'testuser3@example.com', '333-333-3333', 3, 'assets/img/profile.png', 'password3', 'Hi, I am Test User 3'),
(13, 0, 'Test User 4', 'testuser4@example.com', '444-444-4444', 3, 'assets/img/profile.png', 'password4', 'Hi, I am Test User 4'),
(14, 0, 'Test User 5', 'testuser5@example.com', '555-555-5555', 3, 'assets/img/profile.png', 'password5', 'Hi, I am Test User 5');

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `id_user_address` bigint(20) NOT NULL COMMENT '主键id',
  `shipping_address` varchar(255) DEFAULT NULL COMMENT '地址',
  `id_customer` bigint(20) NOT NULL COMMENT '用户id',
  `customer_name` varchar(255) NOT NULL COMMENT '用户名字',
  `is_delete` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否删除'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户地址';

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`id_user_address`, `shipping_address`, `id_customer`, `customer_name`, `is_delete`) VALUES
(1, '123 Main St, Anytown USA', 1, 'John', 0),
(2, '456 Broad St, Anytown USA', 2, 'Jane', 0),
(3, '789 Maple Ave, Los Angeles, CA 90001', 2, 'Jane', 0),
(4, '987 Oak Rd, San Francisco, CA 94102', 2, 'Jane', 0),
(5, '321 Cherry St, Chicago, IL 60601', 3, 'customer1', 0),
(6, '654 Pine Ave, Miami, FL 33130', 4, 'admin1', 0),
(7, '246 Walnut Blvd, Austin, TX 78701', 5, 'David', 0),
(8, '135 Cedar Dr, Seattle, WA 98101', 6, 'Emily', 0),
(9, '369 Birch Ln, Atlanta, GA 30301', 8, 'Amy', 0),
(10, '753 Spruce Rd, Denver, CO 80201', 9, 'Bob', 0),
(11, '123 Main St, New York, NY 10001', 1, 'John', 0),
(12, '456 Elm St, Boston, MA 02115', 1, 'John', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`) USING BTREE,
  ADD UNIQUE KEY `categories_id_uindex` (`id_category`),
  ADD KEY `userkey` (`creator_id`) USING BTREE;

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id_coupon`),
  ADD KEY `products_id1213` (`product_name`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `user_product_index` (`id_user`) USING BTREE,
  ADD KEY `products_id1323` (`id_product`),
  ADD KEY `coupons_id1323` (`coupon_name`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`) USING BTREE,
  ADD KEY `categories_` (`id_category`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`) USING BTREE,
  ADD UNIQUE KEY `mail` (`mail`) USING BTREE,
  ADD KEY `user_id_index` (`id_user`) USING BTREE;

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`id_user_address`),
  ADD KEY `user_id213` (`id_user_address`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '主键id', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id_coupon` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '主键id', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id_order` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '主键id', AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '主键id', AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '主键id', AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id_user_address` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '主键id', AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
