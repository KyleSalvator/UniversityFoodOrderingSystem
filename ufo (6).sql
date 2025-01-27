-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2025 at 11:58 AM
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
-- Database: `ufo`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` varchar(50) NOT NULL,
  `payment_method` varchar(255) NOT NULL DEFAULT 'Cash'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `price`, `image`, `status`, `description`) VALUES
(102, 'Spaghetti', 200.00, 'uploads/spagetti.jpg', 'AVAILABLE', 'Filipino-style spaghetti is a sweet and savory dish with a tomato sauce base, garlic, onions, and ground meat, typically pork or beef. What makes it unique is the addition of hot dogs or sliced sausages, giving it a slightly sweet taste.'),
(103, 'Burger', 55.00, 'uploads/burger.jpg', 'AVAILABLE', 'Burgers: seasoned meat patty, soft buns, classic toppings. Satisfying simplicity.'),
(104, 'fries', 40.00, 'uploads/fries.jpg', 'AVAILABLE', 'Fries: crispy golden perfection, deep-fried potatoes. A universally loved side, adding a delightful crunch to any meal.'),
(105, 'Coca Cola', 37.00, 'uploads/coke.jpg', 'AVAILABLE', 'Coca-Cola: the iconic fizzy drink, sweet and refreshing. A timeless beverage enjoyed worldwide, perfect for quenching thirst and lifting spirits.'),
(114, 'sandwich', 70.00, 'uploads/sandwich.jpg', 'AVAILABLE', 'Very Good Delicious Sandwich'),
(116, 'CAKE', 250.00, 'uploads/cake.jpg', 'AVAILABLE', 'good Cake');

-- --------------------------------------------------------

--
-- Table structure for table `ss`
--

CREATE TABLE `ss` (
  `order_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `status` varchar(50) DEFAULT 'Pending',
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `to_deliver`
--

CREATE TABLE `to_deliver` (
  `order_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `Paid_By` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `to_deliver`
--

INSERT INTO `to_deliver` (`order_id`, `address`, `email`, `phone`, `product_name`, `quantity`, `total_price`, `payment_method`, `Paid_By`) VALUES
(245, 'AprilRicohermoso', 'april@gmail.com', '090900909', 'Spaghetti:5,Burger:6', 11, 505.00, 'cash', 'Paid'),
(247, 'AprilGirl', 'April@yahoobebot.com', '98765432', 'Spaghetti:4,Burger:3,fries:1,sandwich:1,Coca Cola:1', 10, 431.00, 'cash', 'Paid'),
(248, '', 'xzcwzc@sad', '', 'Spaghetti:3,Burger:3', 6, 270.00, '', 'Paid'),
(249, 'biba', 'bibi@bii', 'ibi', 'Spaghetti:2,Burger:2,fries:1', 5, 220.00, 'cash', 'Paid'),
(250, 'bobo', 'qwe@qwe', 'bobo', 'Spaghetti:1,Burger:3', 4, 200.00, 'cash', 'Paid'),
(251, 'BObo', 'april123@yahoo.com', '1234567', 'Spaghetti:3,Burger:2,Coca Cola:1,CupCake:1', 7, 277.00, 'cash', 'Paid'),
(253, 'Dougie', 'deathdrake127@gmail.com', '09652207844', 'Spaghetti:3,Burger:1', 4, 160.00, 'cash', 'Paid'),
(254, 'CL3 Comlab', 'deathdrake127@gmail.com', '09652207844', 'Spaghetti:3,Burger:1', 4, 160.00, '', 'Paid'),
(255, 'CL3', 'deathdrake127@gmail.com', '0906653290', 'Burger:1,sandwich:1', 2, 104.00, '', 'Paid'),
(264, 'room154', 'genos.otaku@gmail.com', '312312', 'Spaghetti:1,Burger:1', 2, 90.00, 'cash', 'Paid'),
(265, '124', 'genos.otaku@gmail.com', '32423', 'Spaghetti:1,Burger:1,fries:1', 3, 130.00, 'cash', 'Paid'),
(266, '123', 'genos.otaku@gmail.com', '342234', '', 0, 0.00, 'cash', 'Paid'),
(267, '400', 'genos.otaku@gmail.com', '342234', 'Spaghetti:2,Burger:1,fries:2', 5, 205.00, 'cash', 'Paid'),
(268, '401', 'genos.otaku@gmail.com', '342234', 'Spaghetti:1,Burger:1,fries:1', 3, 130.00, 'cash', 'Paid'),
(285, '', '', '', 'Spaghetti:1,Burger:1', 2, 90.00, 'cash', 'Paid'),
(297, '', '', '', 'Spaghetti:1', 1, 35.00, 'cash', 'Paid'),
(300, '', '', '', 'Spaghetti:1', 1, 35.00, 'cash', 'Paid'),
(309, '', '', '342234', 'Spaghetti:1,Burger:1', 2, 90.00, 'cash', 'Paid'),
(323, 'room 300', 'deathdrake127@gmail.com', '1234123', 'Spaghetti:1,Burger:1', 2, 110.00, 'cash', 'Paid'),
(326, 'room 400', 'aprilboyricohermoso@yahoo.com', '1213', 'Spaghetti:1,Burger:1', 2, 110.00, 'cash', 'Paid'),
(328, 'ROOM 301', 'deathdrake127@gmail.com', '1234123', 'Spaghetti:2', 2, 212.00, 'cash', 'Paid'),
(330, 'ROOM 301', 'deathdrake127@gmail.com', '25324', 'Spaghetti:1,Burger:1', 2, 161.00, 'cash', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `school_id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Type` varchar(100) NOT NULL DEFAULT 'student'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `school_id`, `email`, `Type`) VALUES
(3, 'admin123', 'admin123', 'admin123', '0101', 'admin123@gmail.com', 'admin'),
(7, 'aprilboy123', 'april111', 'april111', 'AY2021-3232', 'aprilboyricohermoso@yahoo.com', 'student'),
(222, 'staff123', 'staff123', 'staff123', 'staff123', 'staff123@gmail.com', 'staff'),
(223, 'staff2', 'staff2', 'staff2', '030303', 'staff2@gmail.com', 'staff'),
(229, 'Testing', 'Testing123', 'Testing123', '22541351253', 'deathdrake127@gmail.com', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `ss`
--
ALTER TABLE `ss`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `to_deliver`
--
ALTER TABLE `to_deliver`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=331;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `ss`
--
ALTER TABLE `ss`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=331;

--
-- AUTO_INCREMENT for table `to_deliver`
--
ALTER TABLE `to_deliver`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=331;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
