-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2023 at 02:02 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stock`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(5) NOT NULL,
  `name` varchar(35) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`, `email`, `created_at`, `updated_at`) VALUES
(1, '@narayan', 'narayan123', 'narayanswami750@gmail.com', '2023-02-24 05:36:08', '2023-02-24 05:36:08');

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `id` int(5) NOT NULL,
  `customer_id` int(5) DEFAULT NULL,
  `product_id` int(5) DEFAULT NULL,
  `bill_date` date DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `discount` decimal(5,2) DEFAULT NULL,
  `tax` decimal(5,2) DEFAULT NULL,
  `invoice_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(5) NOT NULL,
  `name` varchar(35) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'food', '2023-02-24 07:16:28', '2023-02-24 07:16:28'),
(2, 'electronic', '2023-02-24 07:18:56', '2023-02-24 07:18:56'),
(3, 'furniture', '2023-02-24 10:03:02', '2023-02-24 10:03:02'),
(4, 'mobile', '2023-02-24 11:29:09', '2023-02-24 11:29:09'),
(5, 'cars', '2023-02-28 12:43:58', '2023-02-28 12:43:58'),
(6, 'home apliances', '2023-02-28 12:46:47', '2023-02-28 12:46:47'),
(7, 'fruit', '2023-02-28 12:49:38', '2023-02-28 12:49:38'),
(11, 'shutup', '2023-02-28 12:52:21', '2023-02-28 12:52:21'),
(12, 'cycle', '2023-02-28 12:52:32', '2023-02-28 12:52:32'),
(14, 'truck', '2023-02-28 12:54:38', '2023-02-28 12:54:38');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(5) NOT NULL,
  `name` varchar(35) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'parle', '2023-02-24 07:19:53', '2023-02-24 07:19:53'),
(2, 'symphony', '2023-02-24 10:03:16', '2023-02-24 10:03:16'),
(3, 'vivo', '2023-02-24 11:29:24', '2023-02-24 11:29:24'),
(4, 'pulse', '2023-02-25 04:33:51', '2023-02-25 04:33:51'),
(5, 'samsung', '2023-02-28 11:57:25', '2023-02-28 11:57:25'),
(6, 'hyundai', '2023-03-01 09:11:43', '2023-03-01 09:11:43');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(5) NOT NULL,
  `profile` varchar(200) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `mobile` varchar(13) NOT NULL,
  `whatsup_no` varchar(13) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` tinytext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `profile`, `name`, `mobile`, `whatsup_no`, `email`, `address`, `created_at`, `updated_at`) VALUES
(1, 'images/daniel.jpg', 'narayan swami', '964259856', '52324313131', 'naryanaswami@gmail.com', 'bikaner se phele', '2023-02-24 12:23:27', '2023-02-24 12:23:27'),
(3, 'images/whitehat.jpg', 'deen swami', '34323444', '34242344', 'q@gmail.com', 'bikaner rajasthan', '2023-02-24 12:25:30', '2023-02-28 05:59:54'),
(11, 'images/slimpy.jpg', 'Ritik vyas', '962541242', '524125222', 'ritikbatra@gmail.com', 'near bikaner gate', '2023-02-28 04:26:29', '2023-02-28 06:00:10'),
(14, NULL, 'panchayati', '852145252', '225225332', 'pannu@gmail.com', 'sdsada', '2023-03-01 12:24:06', '2023-03-01 12:24:06'),
(16, NULL, 'wwawwe', '343444344', '3324324324', 'sourabh@gmai.com', 'sdsada ffdsf', '2023-03-01 12:38:39', '2023-03-01 12:38:39'),
(17, NULL, 'rahul', '464373378487', '45845849858', 'superfd@gmail.com', 'sdsada sdf', '2023-03-01 12:55:35', '2023-03-01 12:55:35'),
(18, NULL, 'fsdfsdf', '32324423432', '234342234', 'werewr@gamil.com', 'sfsfsdfsd', '2023-03-01 12:56:58', '2023-03-01 12:56:58'),
(19, 'images/slimpy.jpg', 'wesdfsd', '4343223423', '23234552', 'sdfdsf@gmail.com', 'adas tw4j ', '2023-03-01 12:58:48', '2023-03-01 12:58:48'),
(24, 'images/pexels.jpg', 'erer ', '324554435', '232423', 'super@gmaidfl.com', 'esdf sdfsdgd jkehf dfs', '2023-03-02 04:58:28', '2023-03-02 04:58:28'),
(35, 'images/daniel.jpg', 'narayan swami', '96425232', '52324313131', 'naryc32anaswami@gmail.com', 'bikaner se phele', '2023-02-24 12:23:27', '2023-02-24 12:23:27'),
(36, 'images/pexels.jpg', 'narayan swami', '4344234', '4523435', 'werweq@gmail.com', 'fsfsd zsvv ', '2023-03-02 05:45:29', '2023-03-02 05:45:29');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(5) NOT NULL,
  `invoice` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `invoice`) VALUES
(1, 0),
(2, 0),
(3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(5) NOT NULL,
  `category_id` int(5) DEFAULT NULL,
  `company_id` int(5) DEFAULT NULL,
  `product_name` varchar(35) NOT NULL,
  `p_price` int(5) DEFAULT NULL,
  `s_price` int(5) DEFAULT NULL,
  `qty` varchar(13) DEFAULT NULL,
  `mfg_date` varchar(20) DEFAULT NULL,
  `exp_date` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `company_id`, `product_name`, `p_price`, `s_price`, `qty`, `mfg_date`, `exp_date`, `created_at`, `updated_at`) VALUES
(2, 2, 1, 'biscuts', 780, 45, '0', '2023-02-07', '2023-02-15', '2023-02-24 09:28:04', '2023-02-24 09:28:04'),
(4, 1, 1, 'bread', 15, 50, '0', '2023-02-07', '2023-03-08', '2023-02-24 10:05:29', '2023-02-24 10:05:29'),
(5, 1, 1, 'biskoot', 25, 50, '0', '2023-02-07', '2023-03-08', '2023-02-24 10:55:12', '2023-02-24 10:55:12'),
(6, 4, 3, 'vivo s1', 15500, 23, '0', '2023-02-14', '2023-02-12', '2023-02-24 11:30:08', '2023-02-24 11:30:08'),
(7, 4, 3, 'vivo v12', 12500, 12, '', '2023-02-21', '2023-02-20', '2023-02-24 11:32:08', '2023-02-24 11:32:08'),
(8, 2, 3, 'vivo smart watch', 1300, 0, '12', '2023-02-07', '2023-02-26', '2023-02-24 11:33:51', '2023-02-24 11:33:51'),
(9, 1, 1, 'rice', 45, 60, '15', '2023-02-06', '2023-02-27', '2023-02-24 11:35:25', '2023-02-24 11:35:25'),
(12, 1, 4, 'pulse toffe', 3, 5, '100', '2023-02-15', '2023-02-27', '2023-02-25 04:34:24', '2023-02-25 04:34:24'),
(13, 3, 4, 'chair', 1200, 1250, '5', '2023-02-15', '2023-02-14', '2023-02-25 04:35:39', '2023-02-25 04:35:39'),
(14, 2, 2, 'water cooler', 344, 443, '34', '2023-02-22', '2023-02-20', '2023-02-25 10:54:22', '2023-02-25 10:54:22'),
(15, 3, 4, 'cooler', 434, 344, '34', '2023-02-07', '2023-02-21', '2023-02-25 10:55:07', '2023-02-25 10:55:07'),
(17, 2, 3, 'viso v15', 12000, 13500, '12', '2023-02-12', '2023-02-07', '2023-02-28 04:24:50', '2023-02-28 04:24:50'),
(18, 4, 5, 'S20 ultra pro max', 95000, 150000, '12', '2023-02-13', '2023-02-17', '2023-02-28 11:58:04', '2023-02-28 12:34:09'),
(26, 5, 6, 'verna', 1200, 1500, '2', '2023-03-17', '2023-03-06', '2023-03-01 09:55:04', '2023-03-01 09:55:04'),
(30, 5, 6, 'creta', 12, 121, '12', '2023-03-22', '2023-03-13', '2023-03-01 09:57:36', '2023-03-01 09:57:36'),
(32, 12, 4, 'rer', 44, 44, '44', '2023-03-29', '2023-03-21', '2023-03-01 10:00:48', '2023-03-01 10:00:48'),
(35, 5, 6, 'fdf', 3435, 445, '54', '2023-03-01', '2023-03-02', '2023-03-01 10:05:47', '2023-03-01 10:05:47'),
(50, 5, 6, 'alcazar', 2322, 32, '23', '2023-03-15', '2023-03-24', '2023-03-01 11:06:50', '2023-03-01 11:06:50'),
(51, 2, 5, 'samsung galaxy j7', 20, 20, '12', '2023-03-15', '2023-03-30', '2023-03-01 11:10:15', '2023-03-01 11:10:15'),
(62, 1, 1, 'souce', 23, 343, '34', '2023-03-14', '2023-03-29', '2023-03-01 11:24:43', '2023-03-01 11:24:43'),
(66, 7, 2, 'apple', 45, 454, '54', '2023-04-03', '2023-04-06', '2023-03-01 11:29:15', '2023-03-01 11:29:15'),
(75, 4, 3, 'vivo v8', 323, 323, '23', '2023-03-06', '2023-03-21', '2023-03-01 11:58:21', '2023-03-01 11:58:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `name` varchar(25) NOT NULL,
  `address` varchar(25) NOT NULL,
  `age` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `age`) VALUES
(1, 'narayan swami', 'bikaner rajasthan', '12'),
(8, '@narayan', 'da wewe arer sfd ', '43434');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `billing_ibfk_3` (`invoice_id`),
  ADD KEY `billing_ibfk_1` (`customer_id`),
  ADD KEY `billing_ibfk_2` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mobile` (`mobile`),
  ADD UNIQUE KEY `mobile_2` (`mobile`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_name` (`product_name`),
  ADD KEY `product_ibfk_1` (`category_id`),
  ADD KEY `product_ibfk_2` (`company_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `billing`
--
ALTER TABLE `billing`
  ADD CONSTRAINT `billing_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `billing_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `billing_ibfk_3` FOREIGN KEY (`invoice_id`) REFERENCES `invoice` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
