-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2019 at 05:53 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salsadelourdes`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `addressID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `address1` varchar(75) NOT NULL,
  `address2` varchar(75) DEFAULT NULL,
  `city` varchar(40) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `phone` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`addressID`, `userID`, `address1`, `address2`, `city`, `state`, `zip`, `phone`) VALUES
(1, 1, '123 Test st', NULL, 'Lincoln', 'NE', '68526', '4021234567');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryID`, `categoryName`) VALUES
(1, 'Mild'),
(2, 'Medium'),
(3, 'Spicy'),
(4, 'Insane');

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `itemID` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `itemPrice` decimal(10,2) NOT NULL,
  `discountAmount` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `orderDate` datetime NOT NULL,
  `shipAmount` decimal(10,2) NOT NULL,
  `taxAmount` decimal(10,2) NOT NULL,
  `shipDate` datetime DEFAULT NULL,
  `shipAddressID` int(11) NOT NULL,
  `cardType` int(11) NOT NULL,
  `cardNumber` char(16) NOT NULL,
  `cardExpires` char(7) NOT NULL,
  `billingAddressID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `price` float(3,2) NOT NULL,
  `description` varchar(500) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(100) NOT NULL DEFAULT 'images/product_images/default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `categoryID`, `productName`, `price`, `description`, `date`, `image`) VALUES
(1, 1, 'Salsa Classico', 4.99, 'Salsa Classico focuses on the rich flavors of traditional Mexican culture without any of the pain.', '2019-03-11 06:13:02', 'images/product_images/1.jpg'),
(2, 2, 'Salsa Rojo', 4.99, 'All the same flavors as Salsa Classico, but with an added kick.', '2019-03-11 16:41:33', 'images/product_images/2.jpg'),
(3, 2, 'Salsa Verde', 5.99, 'Salsa made with primarily tomatillos.', '2019-03-12 07:33:41', 'images/product_images/3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `userType` varchar(20) NOT NULL DEFAULT 'customer',
  `firstName` varchar(40) DEFAULT NULL,
  `lastName` varchar(40) DEFAULT NULL,
  `email` varchar(320) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `shipAddressID` int(11) DEFAULT NULL,
  `billAddressID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userType`, `firstName`, `lastName`, `email`, `password`, `shipAddressID`, `billAddressID`) VALUES
(8, 'admin', 'Adam', 'Almazan', 'email@gmail.com', '$2y$11$0FU6qlcNaRJj2IHJ0m9o8OtKALXykaSc1V1L74g0bAqnf3FBfJjva', 1, NULL),
(10, 'customer', 'Felipe', 'Almazan', 'felipe@gmail.com', '$2y$11$8Q0QyyeQ9gfUX8wHczzJbulRQVCflHhZVNIKq/JZ3FunhgPdnpZea', NULL, NULL),
(11, 'customer', 'Test', 'Almazan', 'test@gmail.com', '$2y$11$fmq0uT4QyX6FskSuxCBlpu8DnfIrn9FdqkbTvm5WZyKe4mQgX6GeK', NULL, NULL),
(12, 'customer', 'Felipe', 'Almazan', 'test2@gmail.com', '$2y$11$MySabXQOOCwgQXCk7NFpv.BZs0jPK.b4elfP6q2Nq6FqGasdU6Vkm', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`addressID`),
  ADD KEY `customerID` (`userID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`itemID`),
  ADD KEY `orderID` (`orderID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `customerID` (`customerID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `FK_CategoryID` (`categoryID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `addressID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `itemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
