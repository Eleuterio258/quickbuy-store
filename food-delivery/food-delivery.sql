-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 17, 2021 at 07:52 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food-delivery`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`) VALUES
(1, ' All Biryani and Rice'),
(2, 'Appetizer or Starter'),
(3, 'Pasta'),
(4, 'Chicken'),
(5, 'Burger'),
(6, 'Rice Bowls'),
(7, 'Platters');

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `short_desc` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` varchar(100) NOT NULL,
  `available` enum('yes','no') NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`id`, `name`, `category_id`, `short_desc`, `image`, `price`, `available`) VALUES
(1, 'Naga Pasta', 3, 'This is so spicy', 'naga_pasta.jpeg', '2.00', 'yes'),
(2, 'B B Q BOWL', 6, 'With chiken', 'b_b_q_bowl.jpeg', '2.5', 'yes'),
(3, 'Chiken Handi Dum Biriyani', 1, 'Yummy Food, Healthy Food', 'chicken_handi_dam_biryani.jpeg', '6.5', 'yes'),
(4, 'Mexican  Wraps', 4, 'Good Food', 'mexican_wraps.jpeg', '7.00', 'yes'),
(5, 'Kentucky Platter', 7, 'This is yummy  food', 'kentucky_platter.png', '8.7', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `delivery_address` text NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `payment_option` varchar(255) NOT NULL,
  `order_total_amount` varchar(100) NOT NULL,
  `order_total_quantity` int(11) NOT NULL,
  `status` enum('Pending','Processing','Picked','Shipped','Delivered','Cancelled') NOT NULL DEFAULT 'Pending',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `delivery_address`, `contact_no`, `full_name`, `payment_option`, `order_total_amount`, `order_total_quantity`, `status`, `created`, `updated`) VALUES
(1, 1, 'uk', '0000000000', 'Mr. Admin', 'COD', '50', 3, 'Pending', '2021-04-17 11:44:37', '2021-04-17 11:44:37');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `item_price` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `item_id`, `item_quantity`, `item_price`) VALUES
(1, 1, 1, 2, '2.00'),
(2, 1, 2, 1, '2.5'),
(3, 1, 5, 5, '8.7');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `about_title` text NOT NULL,
  `about_detail` text NOT NULL,
  `about_img` varchar(255) NOT NULL,
  `fb_link` varchar(255) NOT NULL,
  `tw_link` varchar(255) NOT NULL,
  `ins_link` varchar(255) NOT NULL,
  `gplus_link` varchar(255) NOT NULL,
  `contact_info` text NOT NULL,
  `opening_hours` text NOT NULL,
  `currency` enum('GBP','USD','EURO') NOT NULL DEFAULT 'GBP'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `about_title`, `about_detail`, `about_img`, `fb_link`, `tw_link`, `ins_link`, `gplus_link`, `contact_info`, `opening_hours`, `currency`) VALUES
(1, 'Welcome To <span>Home Delivery Restauran</span>', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'about-us.png', '#', '#', '#', '#', 'Ipsum Street, Lorem Tower, MO, Columbia, 508000\r\n				<br>\r\n				<br>\r\n				<a href=\"#\">+01 2000 800 9999</a><br>\r\n				<a href=\"#\">info@admin.com</a><br>', 'Monday: Closed\r\n				<br>\r\n				<br>\r\n				Tue-Wed : 9:Am - 10PM\r\n				<br>\r\n				<br>\r\n				Thu-Fri : 9:Am - 10PM\r\n				<br>\r\n				<br>\r\n				Sat-Sun : 5:PM - 10PM', 'GBP');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `type` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `phone`, `password`, `fname`, `lname`, `address`, `type`) VALUES
(1, 'admin@admin.com', '+4499292223', '$2y$10$jF7HcbfCtCqlYy0LiXvkLOxylUErYdkmPAOhTRpWseijeOWten/kW', 'Mr.', 'Admin', 'Testing', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
