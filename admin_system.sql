-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 03, 2023 at 07:32 PM
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
  `category_name` varchar(255) NOT NULL COMMENT '名字',
  `introduction` tinytext DEFAULT NULL COMMENT '简介',
  `category_photo` varchar(256) NOT NULL DEFAULT '''assets/img/profile.png''' COMMENT '种类图片',
  `create_time` timestamp NULL DEFAULT NULL,
  `id_creator` bigint(20) NOT NULL,
  `is_delete` tinyint(1) DEFAULT 0 COMMENT '是否删除',
  `delete_time` timestamp NULL DEFAULT NULL COMMENT '删除时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='分类';

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `category_name`, `introduction`, `category_photo`, `create_time`, `id_creator`, `is_delete`, `delete_time`) VALUES
(1, 'food', 'Category for food products', 'food.jpeg', '2023-04-30 11:43:58', 1, 0, NULL),
(2, 'electronics', 'Category for electronic products', 'electronics.jpeg', '2023-04-30 11:44:05', 1, 0, NULL),
(3, 'clothing', 'Category for clothing products', 'clothing.jpeg', '2023-04-30 11:44:08', 2, 0, NULL),
(5, 'test', 'testxxx', 'assets/category_photo/profile.png', '2023-05-02 22:14:34', 2, 1, '2023-05-02 22:14:47'),
(6, 'asdas', 'testxxx', 'assets/category_photo/profile.png', '2023-05-02 22:23:41', 2, 1, '2023-05-02 22:23:45'),
(7, 'testasdad', 'This is product 3', 'assets/category_photo/profile.png', '2023-05-02 22:30:31', 2, 1, '2023-05-02 22:30:41'),
(8, 'test', 'This is product 1', 'assets/category_photo/profile.png', '2023-05-02 22:33:08', 2, 1, '2023-05-02 22:33:20'),
(9, 'asdas', 'This is product 3', 'assets/category_photo/profile.png', '2023-05-02 22:48:47', 2, 1, '2023-05-02 22:48:59'),
(10, 'testasdad', 'sadadfasdad', 'assets/category_photo/profile.png', '2023-05-02 22:52:26', 2, 1, '2023-05-02 22:52:34');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `id_coupon` bigint(20) NOT NULL COMMENT '主键id',
  `id_product` bigint(20) NOT NULL COMMENT 'id_product',
  `coupon_name` varchar(255) DEFAULT NULL COMMENT 'coupon_name',
  `discount` varchar(20) DEFAULT NULL COMMENT '打几折/减多少',
  `is_valid` tinyint(1) NOT NULL DEFAULT 0,
  `deadline` timestamp NULL DEFAULT current_timestamp(),
  `create_time` timestamp NULL DEFAULT current_timestamp() COMMENT '创建时间',
  `id_creator` bigint(20) NOT NULL DEFAULT 0,
  `is_delete` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否删除',
  `delete_time` timestamp NULL DEFAULT NULL COMMENT '删除时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='历史记录';

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`id_coupon`, `id_product`, `coupon_name`, `discount`, `is_valid`, `deadline`, `create_time`, `id_creator`, `is_delete`, `delete_time`) VALUES
(1, 2, 'coupon1', '20%', 0, '2023-05-12 22:34:00', '2023-04-29 22:18:23', 1, 0, NULL),
(2, 4, 'coupon2', '50', 1, '2023-06-29 08:00:00', '2023-04-29 22:18:23', 2, 0, NULL),
(3, 5, 'asdsad', '100', 1, '2023-05-17 14:42:00', '2023-04-30 14:43:00', 3, 0, NULL),
(106, 3, 'asdsad', '20%', 1, '2023-05-25 17:15:00', '2023-05-03 17:15:23', 2, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id_order` bigint(20) NOT NULL COMMENT '主键id',
  `id_user` bigint(20) DEFAULT NULL COMMENT '用户ID',
  `id_product` bigint(20) DEFAULT NULL COMMENT 'productID',
  `id_coupon` bigint(20) DEFAULT -1 COMMENT '用的优惠卷，没用默认为-1',
  `user_name` varchar(255) DEFAULT NULL COMMENT 'userName',
  `product_name` varchar(255) DEFAULT NULL COMMENT 'productName',
  `price` bigint(20) DEFAULT NULL COMMENT '价格',
  `quantity` bigint(20) NOT NULL COMMENT '数量',
  `subtotal` bigint(20) DEFAULT NULL COMMENT '价格总量',
  `shipping_address` varchar(255) DEFAULT NULL COMMENT '地址',
  `payment_method` varchar(255) DEFAULT NULL COMMENT '付款方式',
  `create_time` timestamp NULL DEFAULT current_timestamp() COMMENT '创建时间',
  `id_creator` bigint(20) NOT NULL DEFAULT 0,
  `is_delete` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否删除',
  `delete_time` timestamp NULL DEFAULT NULL COMMENT '删除时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='历史记录';

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id_order`, `id_user`, `id_product`, `id_coupon`, `user_name`, `product_name`, `price`, `quantity`, `subtotal`, `shipping_address`, `payment_method`, `create_time`, `id_creator`, `is_delete`, `delete_time`) VALUES
(1, 1, 1, -1, 'John', 'Product 1', 100, 1, 100, '123 Main St, Anytown USA', 'credit card', '2023-04-29 22:18:23', 1, 0, NULL),
(2, 2, 2, -1, 'Jane', 'Product 2', 200, 2, 400, '456 Broad St, Anytown USA', 'paypal', '2023-04-29 22:18:23', 1, 0, NULL),
(3, 3, 6, -1, 'Amy', 'Pizza', 50, 1, 50, '789 Main St, Anytown USA', 'credit card', '2023-04-30 18:30:00', 1, 0, NULL),
(4, 4, 7, -1, 'Bob', 'Jeans', 150, 1, 150, '456 Pine St, Anytown USA', 'paypal', '2023-04-30 19:00:00', 1, 0, NULL),
(5, 5, 1, -1, 'David', 'Product 1', 100, 1, 100, '123 Main St, Anytown USA', 'credit card', '2023-04-30 14:18:23', 1, 0, NULL),
(6, 6, 2, -1, 'Emily', 'Product 2', 200, 2, 400, '456 Broad St, Anytown USA', 'paypal', '2023-04-30 14:18:23', 2, 0, NULL),
(7, 1, 2, -1, 'John', 'Product 2', 200, 1, 200, '123 Main St, Anytown USA', 'credit card', '2023-04-30 13:36:11', 2, 0, NULL),
(8, 2, 1, -1, 'Jane', 'Product 1', 100, 1, 100, '456 Broad St, Anytown USA', 'paypal', '2023-04-30 13:36:11', 2, 0, NULL),
(9, 3, 5, -1, 'Amy', 'test', 50, 1, 50, '789 Main St, Anytown USA', 'credit card', '2023-04-30 13:36:11', 2, 0, NULL),
(10, 4, 7, -1, 'Bob', 'Jeans', 150, 1, 150, '456 Pine St, Anytown USA', 'paypal', '2023-04-30 13:36:11', 2, 0, NULL),
(11, 5, 10, -1, 'David', 'Laptop', 20000, 2, 40000, '123 Main St, Anytown USA', 'credit card', '2023-04-30 13:36:11', 3, 0, NULL),
(12, 3, 7, -1, 'Amy', 'Jeans', 150, 1, 150, '123 Main St, Anytown USA', 'credit card', '2023-04-30 12:00:00', 3, 0, NULL),
(13, 4, 1, -1, 'Bob', 'Product 1', 100, 1, 100, '456 Broad St, Anytown USA', 'paypal', '2023-04-30 12:00:00', 3, 0, NULL),
(14, 5, 2, -1, 'David', 'Product 2', 200, 1, 200, '123 Main St, Anytown USA', 'credit card', '2023-04-30 12:00:00', 3, 0, NULL),
(15, 6, 6, -1, 'Emily', 'Pizza', 50, 2, 100, '456 Broad St, Anytown USA', 'paypal', '2023-04-30 12:00:00', 3, 0, NULL),
(16, 1, 5, -1, 'John', 'test', 50, 1, 50, '123 Main St, Anytown USA', 'credit card', '2023-04-30 12:00:00', 4, 0, NULL),
(17, 2, 10, -1, 'Jane', 'Laptop', 20000, 1, 20000, '456 Broad St, Anytown USA', 'paypal', '2023-04-30 12:00:00', 4, 0, NULL),
(18, 3, 7, -1, 'Amy', 'Jeans', 150, 1, 150, '123 Main St, Anytown USA', 'credit card', '2023-04-30 12:30:00', 4, 0, NULL),
(19, 4, 1, -1, 'Bob', 'Product 1', 100, 1, 100, '456 Broad St, Anytown USA', 'paypal', '2023-04-30 12:30:00', 4, 0, NULL),
(20, 5, 2, -1, 'David', 'Product 2', 200, 1, 200, '123 Main St, Anytown USA', 'credit card', '2023-04-30 12:30:00', 4, 0, NULL),
(21, 6, 6, -1, 'Emily', 'Pizza', 50, 2, 100, '456 Broad St, Anytown USA', 'paypal', '2023-04-30 12:30:00', 5, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` bigint(20) NOT NULL COMMENT '主键id',
  `name_product` varchar(255) NOT NULL COMMENT '名字',
  `id_category` bigint(20) NOT NULL COMMENT '分类ID',
  `category_name` varchar(255) DEFAULT '''类名''',
  `description` text DEFAULT NULL COMMENT '介绍',
  `price` bigint(20) DEFAULT NULL COMMENT '价格',
  `stock` bigint(20) NOT NULL COMMENT '存量',
  `product_photo` varchar(256) NOT NULL,
  `create_time` timestamp NULL DEFAULT current_timestamp() COMMENT '创建时间',
  `id_creator` bigint(20) NOT NULL DEFAULT 0,
  `is_delete` tinyint(1) DEFAULT 0 COMMENT '是否删除',
  `delete_time` timestamp NULL DEFAULT NULL COMMENT '删除时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品';

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `name_product`, `id_category`, `category_name`, `description`, `price`, `stock`, `product_photo`, `create_time`, `id_creator`, `is_delete`, `delete_time`) VALUES
(1, 'Product 1', 1, 'food', 'This is product 2asda', 100, 10, 'lays.jpeg', '2023-04-29 22:18:23', 1, 0, NULL),
(2, 'Product 2', 2, 'electronics', 'This is product 2', 200, 20, 'earpods.jpeg', '2023-04-29 22:18:23', 1, 0, NULL),
(3, 'Pizza', 1, 'food', 'A delicious pizza with your favorite toppings', 50, 20, 'pizza.jpeg', '2023-04-30 08:00:00', 3, 0, NULL),
(4, 'Jeans', 3, 'clothing', 'A classic pair of denim jeans for any occasion', 150, 17, 'jeans.jpeg', '2023-04-30 08:00:00', 3, 0, NULL),
(5, 'Laptop', 2, 'electronics', 'A powerful laptop for work or gaming', 20000, 20, 'laptop.jpeg', '2023-04-30 08:00:00', 4, 0, NULL),
(6, 'Smartphone', 2, 'electronics', 'The latest smartphone with high-end features', 10000, 50, 'smartphone.jpeg', '2023-04-30 08:00:00', 5, 0, NULL),
(7, 'Banana', 1, 'food', 'A delicious fruit with lots of nutrients', 50, 100, 'banana.jpeg', '2023-04-30 08:00:00', 5, 0, NULL),
(8, 'T-shirt', 3, 'clothing', 'A comfortable cotton t-shirt for everyday wear', 100, 30, 'tshirt.jpeg', '2023-04-30 08:00:00', 5, 0, NULL),
(9, 'Headphones', 2, 'electronics', 'High-quality headphones for music lovers', 499, 10, 'headphones.jpeg', '2023-04-30 08:00:00', 5, 0, NULL),
(11, 'testasdad', 2, 'electronics', 'asfaf', 4, 4, 'profile.png', '2023-05-02 22:15:05', 2, 1, '2023-05-02 22:15:28'),
(12, 'testasdaf', 1, 'food', 'afsasfa', 3, 3, 'profile.png', '2023-05-02 22:24:12', 2, 1, '2023-05-02 22:24:47'),
(13, 'testasdaf', 3, 'clothing', 'asdasfa', 3, 3, 'profile.png', '2023-05-02 22:30:56', 2, 1, '2023-05-02 22:31:02'),
(14, 'testasdaf', 3, 'clothing', 'asdasfa', 4, 3, 'profile.png', '2023-05-02 22:33:36', 2, 1, '2023-05-02 22:33:44'),
(15, 'asda', 3, 'clothing', 'dfasfa', 3, 3, 'profile.png', '2023-05-02 22:49:12', 2, 1, '2023-05-02 22:52:54'),
(16, 'testasfa', 3, 'clothing', 'sadsaf', 3, 4, 'profile.png', '2023-05-02 22:52:49', 2, 1, '2023-05-02 22:52:57');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` bigint(20) NOT NULL COMMENT '主键id',
  `username` varchar(20) NOT NULL COMMENT '名字',
  `password` varchar(128) DEFAULT NULL COMMENT '密码',
  `mail` varchar(255) DEFAULT NULL COMMENT '邮箱',
  `phone_number` varchar(20) DEFAULT NULL COMMENT '电话号',
  `authority` tinyint(4) NOT NULL DEFAULT 3 COMMENT '权限',
  `user_photo` varchar(256) NOT NULL DEFAULT '''assets/img/png''',
  `create_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_creator` bigint(20) NOT NULL DEFAULT 0,
  `is_delete` tinyint(1) DEFAULT 0 COMMENT '是否删除',
  `delete_time` timestamp NULL DEFAULT NULL COMMENT '删除时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户';

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `mail`, `phone_number`, `authority`, `user_photo`, `create_time`, `id_creator`, `is_delete`, `delete_time`) VALUES
(1, 'John', 'password1', 'John@example.com', '123-456-7890', 1, 'assets/img/team-2.jpg', '2023-05-01 07:16:25', 1, 0, NULL),
(2, 'Jane', 'password2', 'jane@example.com', '987-654-3212', 2, 'assets/img/team-1.jpg', '2023-05-01 07:16:25', 1, 0, NULL),
(3, 'customer1', '123456', 'customer@gmail.com', '123456', 3, 'assets/img/team-3.jpg', '2023-05-01 07:16:25', 1, 0, NULL),
(4, 'admin1', '123456', 'admin1@gmail.com', '123456', 1, 'assets/img/team-1.jpg', '2023-05-01 07:16:25', 2, 0, NULL),
(5, 'David', 'password5', 'david@example.com', '123-456-7890', 3, 'assets/img/team-4.jpg', '2023-05-01 07:16:25', 2, 0, NULL),
(6, 'Emily', 'password6', 'emily@example.com', '987-654-3210', 3, 'assets/img/team-3.jpg', '2023-05-01 07:16:25', 3, 0, NULL),
(8, 'Amy', 'password3', 'amy@example.com', '123-456-7890', 3, 'assets/img/team-3.jpg', '2023-05-01 07:16:25', 4, 0, NULL),
(9, 'Bob', 'password4', 'bob@example.com', '987-654-3210', 3, 'assets/img/team-2.jpg', '2023-05-01 07:16:25', 5, 0, NULL),
(10, 'Test User 1', 'password1', 'testuser1@example.com', '111-111-1111', 3, 'assets/img/team-1.jpg', '2023-05-01 07:16:25', 0, 0, NULL),
(11, 'Test User 2', 'password2', 'testuser2@example.com', '222-222-2222', 3, 'assets/img/team-3.jpg', '2023-05-01 07:16:25', 0, 0, NULL),
(12, 'Test User 3', 'password3', 'testuser3@example.com', '333-333-3333', 3, 'assets/img/team-1.jpg', '2023-05-01 07:16:25', 0, 0, NULL),
(13, 'Test User 4', 'password4', 'testuser4@example.com', '444-444-4444', 3, 'assets/img/team-4.jpg', '2023-05-01 07:16:25', 0, 0, NULL),
(14, 'Test User 5', 'password5', 'testuser5@example.com', '555-555-5555', 2, 'assets/img/team-3.jpg', '2023-05-01 07:16:25', 0, 0, NULL),
(16, 'admin1asdsa', '123456', 'shining3169@icloud.comas', '18273891789841', 3, 'profile.png', '2023-05-02 22:50:45', 2, 1, '2023-05-02 22:51:01'),
(17, 'asdfaa', '123456', 'asdafasfa', '18273891789841', 3, 'profile.png', '2023-05-02 22:54:10', 2, 1, '2023-05-02 22:54:15');

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `id_user_address` bigint(20) NOT NULL COMMENT '主键id',
  `id_customer` bigint(20) NOT NULL COMMENT '用户id',
  `customer_name` varchar(255) NOT NULL COMMENT '用户名字',
  `shipping_address` varchar(255) DEFAULT NULL COMMENT '地址',
  `create_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_creator` bigint(20) NOT NULL DEFAULT 0,
  `is_delete` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否删除',
  `delete_time` timestamp NULL DEFAULT NULL COMMENT '删除时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户地址';

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`id_user_address`, `id_customer`, `customer_name`, `shipping_address`, `create_time`, `id_creator`, `is_delete`, `delete_time`) VALUES
(1, 1, 'John', '123 Main St, Anytown USAA', '2023-05-01 07:17:09', 0, 0, NULL),
(2, 2, 'Jane', '456 Broad St, Anytown USA', '2023-05-01 07:17:09', 0, 0, NULL),
(3, 2, 'Jane', '789 Maple Ave, Los Angeles, CA 90001', '2023-05-01 07:17:09', 0, 0, NULL),
(4, 2, 'Jane', '987 Oak Rd, San Francisco, CA 94102', '2023-05-01 07:17:09', 0, 0, NULL),
(5, 3, 'customer1', '321 Cherry St, Chicago, IL 60601', '2023-05-01 07:17:09', 0, 0, NULL),
(6, 4, 'admin1', '654 Pine Ave, Miami, FL 33130', '2023-05-01 07:17:09', 0, 1, '2023-05-02 22:37:16'),
(7, 5, 'David', '246 Walnut Blvd, Austin, TX 78701', '2023-05-01 07:17:09', 0, 0, NULL),
(8, 6, 'Emily', '135 Cedar Dr, Seattle, WA 98101', '2023-05-01 07:17:09', 0, 0, NULL),
(9, 8, 'Amy', '369 Birch Ln, Atlanta, GA 30301', '2023-05-01 07:17:09', 0, 0, NULL),
(10, 9, 'Bob', '753 Spruce Rd, Denver, CO 80201', '2023-05-01 07:17:09', 0, 0, NULL),
(11, 1, 'John', '123 Main St, New York, NY 10001', '2023-05-01 07:17:09', 0, 0, NULL),
(12, 1, 'John', '456 Elm St, Boston, MA 02115', '2023-05-01 07:17:09', 0, 0, NULL),
(13, 8, 'Amy', 'asdadasd', '2023-05-02 09:21:34', 0, 0, NULL),
(14, 8, 'Amy', 'sdabjfbkaf', '2023-05-02 21:45:02', 2, 0, NULL),
(15, 11, 'Test User 2', '123 Main St, Anytown USAA', '2023-05-02 21:45:27', 2, 0, NULL),
(16, 14, 'Test User 5', 'askdhiafpasdasd', '2023-05-02 21:46:15', 2, 0, NULL),
(17, 6, 'Emily', 'askdhiafp', '2023-05-02 22:17:31', 2, 1, '2023-05-02 22:40:07'),
(18, 5, 'David', '123 Main St, Anytown USAA', '2023-05-02 22:34:29', 2, 0, NULL),
(19, 8, 'Amyasda', '123 Main St, Anytown USA', '2023-05-02 22:50:16', 2, 1, '2023-05-02 22:50:27'),
(20, 8, 'Amyasda', '123 Main St, Anytown USA', '2023-05-02 22:53:49', 2, 1, '2023-05-02 22:53:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`) USING BTREE,
  ADD UNIQUE KEY `categories_id_uindex` (`id_category`),
  ADD KEY `userkey` (`id_creator`) USING BTREE;

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id_coupon`),
  ADD KEY `products_id1213` (`id_product`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `user_product_index` (`id_user`) USING BTREE,
  ADD KEY `products_id1323` (`id_product`),
  ADD KEY `coupons_id1323` (`id_coupon`);

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
  MODIFY `id_category` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '主键id', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id_coupon` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '主键id', AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id_order` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '主键id', AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '主键id', AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '主键id', AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id_user_address` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '主键id', AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
