-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2022 at 10:19 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bighall`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `Id` int(11) NOT NULL,
  `Pro_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `URI` varchar(510) NOT NULL,
  `Description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `Name`, `URI`, `Description`) VALUES
(149, 'aaaaa', 'aaaaa', '<p>aaaa</p>\n');

-- --------------------------------------------------------

--
-- Table structure for table `fourgrig`
--

CREATE TABLE `fourgrig` (
  `Id` int(11) NOT NULL,
  `Name` varchar(1000) NOT NULL,
  `Pro_id_1` int(11) NOT NULL,
  `Pro_id_2` int(11) NOT NULL,
  `Pro_id_3` int(11) NOT NULL,
  `Pro_id_4` int(11) NOT NULL,
  `Description` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `Id` int(11) NOT NULL,
  `Image` varchar(1000) NOT NULL,
  `Pro_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Password` varchar(1000) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Active` int(11) NOT NULL,
  `Code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Id`, `Name`, `Password`, `Email`, `Active`, `Code`) VALUES
(1, 'uzair', '$2y$10$EjHXQIziUGK3Pbm8Icuv1umzCAMtNkFOLs1fSy.FKxIsmjhk19kOG', 'uzair@gmail.com', 1, '448685'),
(2, 'Uzair-Shafi', '$2y$10$kGKIr4N4GaZEe8brpmY7Qu6S3w1JFhtvCiRlOlRON/GRak5x/vew2', 'daruzair420@gmail.com', 1, '376571'),
(3, 'Uzair-Shafi', '$2y$10$av0CSee0xS3X9Gc6mqUDUeh0qkMaKH0ErMPlNGLZxLIgN1x0zorCm', 'daruzair440@gmail.com', 1, '192574');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `Pro_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `delivery_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `Name` varchar(1000) NOT NULL,
  `URI` varchar(1000) NOT NULL,
  `Description` varchar(5000) NOT NULL,
  `Details` varchar(1000) NOT NULL,
  `Tags` varchar(5000) NOT NULL,
  `Catid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `Name`, `URI`, `Description`, `Details`, `Tags`, `Catid`) VALUES
(29, 'aaaaaa', 'aaaaaa', '<p>dddsd</p>\n\n<p><strong>sdfsdf</strong></p>\n\n<p>hfsdhljf <strong> fffff </strong></p>\n', 'aaaaaaaaaaa', 'aaaa', 130),
(30, 'dsds', 'dsds', '<p>dddsd</p>\n\n<p><strong>sdfsdf</strong></p>\n\n<p>hfsdhljf <strong> fffff </strong></p>\n', 'sdsds', 'sdsd', 136),
(31, 'fsdfds', 'fsdfds', '<p><strong>sdfsdf</strong></p>\n\n<p>hfsdhljf <strong> fffff </strong></p>\n', 'dfdf', 'sdfd', 131),
(32, 'asdasa', 'asdasa', '<p>asasa</p>\n\n<p>asasa</p>\n', 'sasas', 'sasas', 130),
(33, 'kjkj', 'kjkj', '<p>jkjkj</p>\n', 'sss', 'kjkj', 138),
(34, 'sss', 'sss', '<p>ssss</p>\n', 'sss', 'ssss', 136),
(35, 'ddd', 'ddd', '<p>a</p>\n', 'dd', 'ddd', 130);

-- --------------------------------------------------------

--
-- Table structure for table `product_types`
--

CREATE TABLE `product_types` (
  `Id` int(11) NOT NULL,
  `Name` varchar(1000) NOT NULL,
  `Price` int(11) NOT NULL,
  `Offer` int(11) NOT NULL,
  `Qty` int(11) NOT NULL,
  `Pro_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_types`
--

INSERT INTO `product_types` (`Id`, `Name`, `Price`, `Offer`, `Qty`, `Pro_Id`) VALUES
(1, '6GB RAM 128Gb Storage', 13000, 20, 1, 1),
(2, '12GB RAM 128Gb Storage\r\n', 15000, 25, 0, 1),
(3, 'product 2', 22000, 15, 1, 2),
(4, 'product 3', 19000, 30, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `Id` int(11) NOT NULL,
  `Image` varchar(1000) NOT NULL,
  `Name` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`Id`, `Image`, `Name`) VALUES
(1, 'https://m.media-amazon.com/images/I/51hzerPAguL._SR1242,870_.jpg', 'first.png');

-- --------------------------------------------------------

--
-- Table structure for table `threegrid`
--

CREATE TABLE `threegrid` (
  `Id` int(11) NOT NULL,
  `Pro_id_1` int(11) NOT NULL,
  `Pro_id_2` int(11) NOT NULL,
  `Pro_id_3` int(11) NOT NULL,
  `Name` varchar(1000) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `Catid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `threegrid`
--

INSERT INTO `threegrid` (`Id`, `Pro_id_1`, `Pro_id_2`, `Pro_id_3`, `Name`, `Description`, `Catid`) VALUES
(1, 29, 32, 32, 'aaaaaaaa', 'sssssssssss', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_search_tags`
--

CREATE TABLE `user_search_tags` (
  `Id` int(11) NOT NULL,
  `Tages` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `Id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Pro_id` (`Pro_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `fourgrig`
--
ALTER TABLE `fourgrig`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Pro_id_1` (`Pro_id_1`),
  ADD KEY `Pro_id_2` (`Pro_id_2`),
  ADD KEY `Pro_id_3` (`Pro_id_3`),
  ADD KEY `Pro_id_4` (`Pro_id_4`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Pro_id` (`Pro_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Name` (`Name`) USING HASH;

--
-- Indexes for table `product_types`
--
ALTER TABLE `product_types`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `threegrid`
--
ALTER TABLE `threegrid`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Pro_id_1` (`Pro_id_1`),
  ADD KEY `Pro_id_2` (`Pro_id_2`),
  ADD KEY `Pro_id_3` (`Pro_id_3`);

--
-- Indexes for table `user_search_tags`
--
ALTER TABLE `user_search_tags`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `fourgrig`
--
ALTER TABLE `fourgrig`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `product_types`
--
ALTER TABLE `product_types`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `threegrid`
--
ALTER TABLE `threegrid`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_search_tags`
--
ALTER TABLE `user_search_tags`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`Pro_id`) REFERENCES `products` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fourgrig`
--
ALTER TABLE `fourgrig`
  ADD CONSTRAINT `fourgrig_ibfk_1` FOREIGN KEY (`Pro_id_1`) REFERENCES `products` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fourgrig_ibfk_2` FOREIGN KEY (`Pro_id_2`) REFERENCES `products` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fourgrig_ibfk_3` FOREIGN KEY (`Pro_id_3`) REFERENCES `products` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fourgrig_ibfk_4` FOREIGN KEY (`Pro_id_4`) REFERENCES `products` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`Pro_id`) REFERENCES `products` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `threegrid`
--
ALTER TABLE `threegrid`
  ADD CONSTRAINT `threegrid_ibfk_1` FOREIGN KEY (`Pro_id_1`) REFERENCES `products` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `threegrid_ibfk_2` FOREIGN KEY (`Pro_id_2`) REFERENCES `products` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `threegrid_ibfk_3` FOREIGN KEY (`Pro_id_3`) REFERENCES `products` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `products` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
