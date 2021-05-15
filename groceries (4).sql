-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2021 at 05:06 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `groceries`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartID` int(10) NOT NULL,
  `ProductInListID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `listname`
--

CREATE TABLE `listname` (
  `ListID` int(10) NOT NULL,
  `ListName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `listname`
--

INSERT INTO `listname` (`ListID`, `ListName`) VALUES
(1, 'choc');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(10) NOT NULL,
  `p_cat_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `product_name` text NOT NULL,
  `product_price` decimal(10,0) NOT NULL,
  `product_img` varchar(100) NOT NULL,
  `product_quantity` int(10) NOT NULL,
  `product_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `p_cat_id`, `date`, `product_name`, `product_price`, `product_img`, `product_quantity`, `product_desc`) VALUES
(1, 1, '2021-04-25 08:43:02', 'banana', '50', 'banana.jpg', 12, '<p>asdad</p>'),
(11, 1, '2021-04-25 10:12:29', 'broccoli', '98', 'BROCCOLI.jpg', 12, '<p>aad</p>'),
(12, 1, '2021-04-30 18:24:50', 'garlic', '20', 'garlic.jpeg', 12, '<p>gjhhjb</p>');

-- --------------------------------------------------------

--
-- Table structure for table `productinlist`
--

CREATE TABLE `productinlist` (
  `ProductInListID` int(10) NOT NULL,
  `ListID` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `quantity` int(100) NOT NULL,
  `id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productinlist`
--

INSERT INTO `productinlist` (`ProductInListID`, `ListID`, `product_id`, `quantity`, `id`) VALUES
(1, 1, 1, 4, 81);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `p_cat_id` int(10) NOT NULL,
  `p_cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`p_cat_id`, `p_cat_title`) VALUES
(1, 'Fruits'),
(2, 'Vegetables'),
(3, 'Meat'),
(4, 'Cookies&Snacks'),
(5, 'Beverages');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(10) NOT NULL,
  `slider_name` varchar(255) NOT NULL,
  `slider_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `passwordd` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `passwordd`, `user_type`) VALUES
(82, 'hazieq', 'muhammadhaazieq@gmail.com', '0cc175b9c0f1b6a831c399e269772661', 'user'),
(89, 'muhd', 'muhammadhaazieq@gmail.com', '0cc175b9c0f1b6a831c399e269772661', 'user'),
(90, 'hazieq1', 'muhammadhazieq00@gmail.com', '0cc175b9c0f1b6a831c399e269772661', 'user'),
(91, 'hazieq2', 'muhammadhaazieq@gmail.com', '0cc175b9c0f1b6a831c399e269772661', 'user'),
(92, 'admin', 'muhammadhaazieq@gmail.com', '0cc175b9c0f1b6a831c399e269772661', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `userDetailID` int(10) NOT NULL,
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phoneNo` varchar(100) NOT NULL,
  `dateOfBirth` varchar(100) NOT NULL,
  `street` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `zipcode` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`userDetailID`, `id`, `name`, `phoneNo`, `dateOfBirth`, `street`, `city`, `state`, `zipcode`) VALUES
(9, 82, 'hazi', '0175116129', '12/3', 'asdadsadad', 'asd', 'asdad', 15020),
(12, 85, 'sada', '252', '12/3/2000', 'THE SPRING', 'GEORGETOWN', 'PENANG', 11600),
(13, 89, '', '', '', '', '', '', 0),
(14, 90, '', '', '', '', '', '', 0),
(15, 91, 'muhammad hazieq', '0175116129', '2', 'THE SPRING', 'GEORGETOWN', 'PENANG', 11600);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartID`);

--
-- Indexes for table `listname`
--
ALTER TABLE `listname`
  ADD PRIMARY KEY (`ListID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `productinlist`
--
ALTER TABLE `productinlist`
  ADD PRIMARY KEY (`ProductInListID`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`p_cat_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`userDetailID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `listname`
--
ALTER TABLE `listname`
  MODIFY `ListID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `productinlist`
--
ALTER TABLE `productinlist`
  MODIFY `ProductInListID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `p_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `userDetailID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;