-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2024 at 07:26 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodieconnect`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(15) NOT NULL,
  `reg_id` int(15) NOT NULL,
  `blog_title` varchar(60) NOT NULL,
  `blog` varchar(30) NOT NULL,
  `blog_img` varchar(30) NOT NULL,
  `blog_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `p_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(15) NOT NULL,
  `blog_id` int(15) NOT NULL,
  `reg_id` int(15) NOT NULL,
  `comment` varchar(50) NOT NULL,
  `comment_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `email` varchar(60) NOT NULL,
  `password` varchar(25) NOT NULL,
  `question` varchar(50) NOT NULL,
  `answer` varchar(50) NOT NULL,
  `usertype` varchar(25) NOT NULL,
  `status` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`email`, `password`, `question`, `answer`, `usertype`, `status`) VALUES
('admin@gmail.com', 'admin123', 'Nick name', 'admin', 'admin', 1),
('jishnu123@gmail.com', 'Jishnu@123', 'Favourite Food?', 'Biriyani', 'customer', 1),
('testuser1234@gmail.com', 'Test@1234', 'Name of your first pet', 'lulu', 'seller', 1),
('testuser123@gmail.com', 'Test@123', 'Favourite Food?', 'Biriyani', 'seller', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `qty` int(11) NOT NULL,
  `order_price` float NOT NULL,
  `order_status` varchar(20) NOT NULL,
  `order_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `p_id`, `email`, `qty`, `order_price`, `order_status`, `order_timestamp`) VALUES
(1, 4, 'jishnu123@gmail.com', 1, 60, 'Payment Completed', '2024-10-17 16:37:56'),
(2, 5, 'jishnu123@gmail.com', 2, 120, 'Payment Completed', '2024-10-17 16:37:56'),
(3, 6, 'jishnu123@gmail.com', 1, 600, 'Payment Completed', '2024-10-17 17:16:12');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(15) NOT NULL,
  `email` varchar(60) NOT NULL,
  `p_name` varchar(35) NOT NULL,
  `category` varchar(30) NOT NULL,
  `p_mrp` int(20) NOT NULL,
  `p_expiry_date` varchar(20) NOT NULL,
  `p_packed_date` varchar(20) NOT NULL,
  `p_description` text NOT NULL,
  `p_qty` int(20) NOT NULL,
  `p_pic` varchar(60) NOT NULL,
  `p_stock` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `email`, `p_name`, `category`, `p_mrp`, `p_expiry_date`, `p_packed_date`, `p_description`, `p_qty`, `p_pic`, `p_stock`) VALUES
(4, 'testuser123@gmail.com', 'EC Chappathi', 'Food', 60, '2024-10-24', '2024-10-16', 'Half baked chapathi', 12, 'ec-half-cooked-chapathi.jpg', 20),
(5, 'testuser123@gmail.com', 'Aashirvad Chappathi', 'Food', 60, '2024-10-24', '2024-10-16', 'Half baked chapathi', 10, 'chappathi.jpg', 20),
(6, 'testuser1234@gmail.com', 'Nuts', 'Dry Fruits', 600, '2025-01-01', '2024-10-01', 'nuts', 1, 'ec-half-cooked-chapathi.jpg', 20);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `name` int(35) NOT NULL,
  `pfp` varchar(15) NOT NULL,
  `bio` varchar(50) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `reg_id` int(15) NOT NULL,
  `name` varchar(35) NOT NULL,
  `email` varchar(60) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `home` varchar(30) NOT NULL,
  `street` varchar(30) NOT NULL,
  `district` varchar(30) NOT NULL,
  `pin` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`reg_id`, `name`, `email`, `phone`, `home`, `street`, `district`, `pin`) VALUES
(23, 'Jishnu', 'jishnu123@gmail.com', 7994245510, 'ss', 'ss', 'Ernakulam', 686691),
(25, 'Test User', 'testuser123@gmail.com', 9778146653, 'ss', 'ss', 'Ernakulam', 686691),
(26, 'Test user', 'testuser1234@gmail.com', 7994245510, 'ss', 'ss', 'Ernakulam', 686691);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `rev_id` int(15) NOT NULL,
  `p_id` int(15) NOT NULL,
  `reg_id` int(15) NOT NULL,
  `review` varchar(30) NOT NULL,
  `rev_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `s_id` int(15) NOT NULL,
  `email` varchar(60) NOT NULL,
  `s_photo` varchar(60) NOT NULL,
  `s_license` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`s_id`, `email`, `s_photo`, `s_license`) VALUES
(11, 'testuser123@gmail.com', 'hook-keychain-93755794143489.jpg', 'hook-keychain-93755794143489.jpg'),
(12, 'testuser1234@gmail.com', 'AI Assisted (1).png', 'ec-half-cooked-chapathi.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`s_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `reg_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `s_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
