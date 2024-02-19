-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2024 at 08:35 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cartdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `adress_types`
--

CREATE TABLE `adress_types` (
  `adr_type_id` int(11) NOT NULL,
  `adr_type_name` varchar(50) DEFAULT NULL,
  `adr_type_desc` text DEFAULT NULL,
  `adr_type_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1-active 0-deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adress_types`
--

INSERT INTO `adress_types` (`adr_type_id`, `adr_type_name`, `adr_type_desc`, `adr_type_status`) VALUES
(1, 'HOME', NULL, 1),
(2, 'OFFICE', NULL, 1),
(3, 'SHIPPING', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(50) DEFAULT NULL,
  `prod_price` double NOT NULL DEFAULT 0,
  `prod_cat` smallint(6) DEFAULT NULL,
  `prod_img` text DEFAULT NULL,
  `prod_status` smallint(6) NOT NULL DEFAULT 1 COMMENT '1-active 0-deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `prod_name`, `prod_price`, `prod_cat`, `prod_img`, `prod_status`) VALUES
(1, 'HP LAPTOP', 34000, 1, '1708256046631_electonic1.jpg', 1),
(2, 'DELL LAPTOP', 32000, 1, '1708256098916_electonic2.jpg', 1),
(3, 'UNISEX GREEN SWEATH SHIRT', 1200, 3, '1708256140518_cloth1.jpg', 1),
(4, 'UNISEX PINK SWEAT SHIRT', 1300, 3, '1708256164361_cloth2.jpg', 1),
(5, 'APPLE IPHONE 10', 120000, 2, '1708256205163_mobile2.jpg', 1),
(6, 'SAMSUNG GALAXY S20', 23000, 2, '1708256230639_mobile1.jpg', 1),
(7, 'ASSAM PREMIM COFFEE', 450, 4, '1708256261368_food2.jpg', 1),
(8, 'MAC D BURGER', 350, 4, '1708256298416_food1.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) DEFAULT NULL,
  `cat_desc` text DEFAULT NULL,
  `cat_status` int(11) NOT NULL DEFAULT 1 COMMENT '1-active 0-deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`cat_id`, `cat_name`, `cat_desc`, `cat_status`) VALUES
(1, 'LAPTOPS', 'LAPTOPS', 1),
(2, 'MOBILES', 'MOBILES', 1),
(3, 'CLOTHS', 'CLOTHS', 1),
(4, 'FOOD', 'FOOD', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_stock`
--

CREATE TABLE `product_stock` (
  `stock_id` int(11) NOT NULL,
  `prod_id` int(11) DEFAULT NULL,
  `prod_qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_fname` varchar(50) DEFAULT NULL,
  `user_mname` varchar(50) DEFAULT NULL,
  `user_lname` varchar(50) DEFAULT NULL,
  `user_dob` varchar(50) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_pass` varchar(20) DEFAULT NULL,
  `user_phone` bigint(20) DEFAULT NULL,
  `user_photo` text DEFAULT NULL,
  `user_role` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1-customer 2-admin',
  `user_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1-acitve 0-deactive',
  `user_regdate` varchar(20) DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_fname`, `user_mname`, `user_lname`, `user_dob`, `user_email`, `user_pass`, `user_phone`, `user_photo`, `user_role`, `user_status`, `user_regdate`) VALUES
(1, 'user', NULL, 'user', NULL, 'user@gmail.com', 'User@123', NULL, NULL, 1, 1, '2024-02-18 11:31:07'),
(2, 'user2', NULL, 'user2', NULL, 'user2@gmail.com', 'User@123', NULL, NULL, 1, 1, '2024-02-18 11:40:09'),
(3, 'admin', 'admin', 'admin', NULL, 'admin@gmail.com', 'Admin@123', 9879879878, NULL, 2, 1, 'current_timestamp()'),
(4, 'test', NULL, 'test', NULL, 'test@gmail.com', 'Test@123', NULL, NULL, 1, 1, '2024-02-18 15:30:14');

-- --------------------------------------------------------

--
-- Table structure for table `user_addresses`
--

CREATE TABLE `user_addresses` (
  `adr_id` int(11) NOT NULL,
  `adr_type` tinyint(4) DEFAULT NULL,
  `adr_desc` text DEFAULT NULL,
  `adr_city` varchar(50) DEFAULT NULL,
  `adr_state` varchar(50) DEFAULT NULL,
  `adr_country` varchar(50) DEFAULT NULL,
  `adr_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1-active 0-deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adress_types`
--
ALTER TABLE `adress_types`
  ADD PRIMARY KEY (`adr_type_id`),
  ADD UNIQUE KEY `adr_type_name` (`adr_type_name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `product_stock`
--
ALTER TABLE `product_stock`
  ADD PRIMARY KEY (`stock_id`),
  ADD UNIQUE KEY `prod_id` (`prod_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `CUSTOMER_UNQ_EMAIL_PHONE` (`user_phone`,`user_email`);

--
-- Indexes for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD PRIMARY KEY (`adr_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adress_types`
--
ALTER TABLE `adress_types`
  MODIFY `adr_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_stock`
--
ALTER TABLE `product_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_addresses`
--
ALTER TABLE `user_addresses`
  MODIFY `adr_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
