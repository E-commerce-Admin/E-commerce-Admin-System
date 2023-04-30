-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2023-04-30 14:18:23
-- 服务器版本： 10.4.27-MariaDB
-- PHP 版本： 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `e-test`
--

-- --------------------------------------------------------

--
-- 表的结构 `category`
--

CREATE TABLE `category` (
  `id` bigint(20) NOT NULL COMMENT 'ID',
  `is_delete` tinyint(1) DEFAULT 0 COMMENT '是否删除',
  `NAME` varchar(255) NOT NULL COMMENT '名字',
  `creator` bigint(20) NOT NULL COMMENT '创建者',
  `creator_name` varchar(20) NOT NULL COMMENT '创建者姓名',
  `introduction` tinytext DEFAULT NULL COMMENT '简介'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='分类';

-- --------------------------------------------------------

--
-- 表的结构 `coupon`
--

CREATE TABLE `coupon` (
  `id` bigint(20) NOT NULL COMMENT '主键id',
  `user_id` bigint(20) DEFAULT NULL COMMENT '用户ID',
  `product_id` bigint(20) DEFAULT NULL COMMENT 'productID',
  `coupon_name` varchar(255) DEFAULT NULL COMMENT 'coupon_name',
  `price` bigint(20) DEFAULT NULL COMMENT '价格',
  `discount` bigint(20) DEFAULT NULL COMMENT 'jiangjia',
  `is_delete` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否删除',
  `create_time` timestamp NULL DEFAULT current_timestamp() COMMENT '创建时间',
  `deadline` timestamp NULL DEFAULT current_timestamp() COMMENT '截至日期'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='历史记录';

-- --------------------------------------------------------

--
-- 表的结构 `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) NOT NULL COMMENT '主键id',
  `user_id` bigint(20) DEFAULT NULL COMMENT '用户ID',
  `product_id` bigint(20) DEFAULT NULL COMMENT 'productID',
  `user_name` varchar(255) DEFAULT NULL COMMENT 'userName',
  `product_name` varchar(255) DEFAULT NULL COMMENT 'productName',
  `status` tinyint(4) DEFAULT NULL COMMENT '请求状态',
  `price` bigint(20) DEFAULT NULL COMMENT '价格',
  `subtotal` bigint(20) DEFAULT NULL COMMENT '价格总量？原表内容',
  `quantity` int(11) NOT NULL COMMENT '数量',
  `coupon` bigint(20) DEFAULT -1 COMMENT '用的优惠卷，没用默认为-1',
  `is_delete` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否删除',
  `shipping_address` varchar(255) DEFAULT NULL COMMENT '地址',
  `create_time` timestamp NULL DEFAULT current_timestamp() COMMENT '创建时间',
  `payment_method` varchar(255) DEFAULT NULL COMMENT '付款方式'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='历史记录';

-- --------------------------------------------------------

--
-- 表的结构 `product`
--

CREATE TABLE `product` (
  `id_product` bigint(20) NOT NULL COMMENT 'ID',
  `is_delete` tinyint(1) DEFAULT 0 COMMENT '是否删除',
  `name_product` varchar(255) NOT NULL COMMENT '名字',
  `stock` bigint(20) NOT NULL COMMENT '存量',
  `create_time` timestamp NULL DEFAULT current_timestamp() COMMENT '创建时间',
  `delete_time` timestamp NULL DEFAULT current_timestamp() COMMENT '删除时间',
  `description` text DEFAULT NULL COMMENT '介绍',
  `category_name` varchar(255) DEFAULT '',
  `product_photo` varchar(256) NOT NULL,
  `category_id` bigint(20) NOT NULL COMMENT '分类ID',
  `price` bigint(20) DEFAULT NULL COMMENT '价格'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='商品';

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` bigint(20) NOT NULL COMMENT 'ID',
  `is_delete` tinyint(1) DEFAULT 0 COMMENT '是否删除',
  `username` varchar(20) NOT NULL COMMENT '名字',
  `mail` varchar(255) DEFAULT NULL COMMENT '邮箱',
  `phone_number` varchar(20) DEFAULT NULL COMMENT '电话号',
  `authority` tinyint(4) DEFAULT NULL COMMENT '权限',
  `user_photo` varchar(256) NOT NULL,
  `password` varchar(128) DEFAULT NULL COMMENT '密码',
  `introduction` varchar(400) DEFAULT 'This is an self introduction editing by yourself.' COMMENT '自我介绍'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='用户';

-- --------------------------------------------------------

--
-- 表的结构 `user_address`
--

CREATE TABLE `user_address` (
  `user_id` bigint(20) DEFAULT NULL COMMENT '用户ID',
  `shipping_address` varchar(255) DEFAULT NULL COMMENT '地址',
  `create_time` timestamp NULL DEFAULT current_timestamp() COMMENT '创建时间',
  `id` bigint(20) NOT NULL COMMENT '主键id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='用户地址';

-- --------------------------------------------------------

--
-- 表的结构 `user_product`
--

CREATE TABLE `user_product` (
  `id` bigint(20) NOT NULL COMMENT '主键id',
  `introduction` text DEFAULT NULL COMMENT '介绍',
  `user_id` bigint(20) DEFAULT NULL COMMENT '用户ID',
  `product_id` bigint(20) DEFAULT NULL COMMENT 'productID',
  `is_delete` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否删除',
  `is_collect` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否收藏',
  `user_type` tinyint(1) NOT NULL DEFAULT 0 COMMENT '顾客还是商家',
  `create_time` timestamp NULL DEFAULT current_timestamp() COMMENT '创建时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='用户与商品的关系';

--
-- 转储表的索引
--

--
-- 表的索引 `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `categories_id_uindex` (`id`),
  ADD KEY `userkey` (`creator`) USING BTREE;

--
-- 表的索引 `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_product_index` (`user_id`) USING BTREE,
  ADD KEY `products_id1213` (`product_id`);

--
-- 表的索引 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_product_index` (`user_id`) USING BTREE,
  ADD KEY `products_id1323` (`product_id`),
  ADD KEY `coupons_id1323` (`coupon`);

--
-- 表的索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`) USING BTREE,
  ADD KEY `categories_` (`category_id`);

--
-- 表的索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `mail` (`mail`) USING BTREE,
  ADD KEY `user_id_index` (`id`) USING BTREE;

--
-- 表的索引 `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id213` (`user_id`);

--
-- 表的索引 `user_product`
--
ALTER TABLE `user_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_product_index` (`user_id`) USING BTREE,
  ADD KEY `products_id13233` (`product_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'ID';

--
-- 使用表AUTO_INCREMENT `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '主键id';

--
-- 使用表AUTO_INCREMENT `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '主键id';

--
-- 使用表AUTO_INCREMENT `product`
--
ALTER TABLE `product`
  MODIFY `category_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '分类ID';

--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'ID';

--
-- 使用表AUTO_INCREMENT `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '主键id';

--
-- 使用表AUTO_INCREMENT `user_product`
--
ALTER TABLE `user_product`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '主键id';


COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
