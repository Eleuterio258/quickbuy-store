-- --------------------------------------------------------
-- Anfitrião:                    127.0.0.1
-- Versão do servidor:           5.7.24 - MySQL Community Server (GPL)
-- SO do servidor:               Win64
-- HeidiSQL Versão:              11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- A despejar estrutura da base de dados para food-delivery
CREATE DATABASE IF NOT EXISTS `food-delivery` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `food-delivery`;

-- A despejar estrutura para tabela food-delivery.carts
CREATE TABLE IF NOT EXISTS `carts` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `food_id` int(10) unsigned DEFAULT NULL,
  `quantity` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `food_id` (`food_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `FK_carts_foods` FOREIGN KEY (`food_id`) REFERENCES `foods` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_carts_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- A despejar dados para tabela food-delivery.carts: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;
INSERT INTO `carts` (`id`, `user_id`, `food_id`, `quantity`, `created_at`, `updated_at`) VALUES
	(1, 2, 2, 12, '2021-09-07 08:44:35', '2021-09-07 08:44:34');
/*!40000 ALTER TABLE `carts` ENABLE KEYS */;

-- A despejar estrutura para tabela food-delivery.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- A despejar dados para tabela food-delivery.category: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`id`, `title`) VALUES
	(1, ' All Biryani and Rice'),
	(2, 'Appetizer or Starter'),
	(3, 'Pasta'),
	(4, 'Chicken'),
	(5, 'Burger'),
	(6, 'Rice Bowls'),
	(7, 'Platters'),
	(8, 'Cafe');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- A despejar estrutura para tabela food-delivery.foods
CREATE TABLE IF NOT EXISTS `foods` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) unsigned NOT NULL,
  `short_desc` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` varchar(100) NOT NULL,
  `available` enum('yes','no') NOT NULL DEFAULT 'yes',
  `rattinng` decimal(10,6) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `FK_foods_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- A despejar dados para tabela food-delivery.foods: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `foods` DISABLE KEYS */;
INSERT INTO `foods` (`id`, `name`, `category_id`, `short_desc`, `image`, `price`, `available`, `rattinng`) VALUES
	(1, 'Naga Pasta', 3, 'This is so spicy', 'naga_pasta.jpeg', '2.00', 'yes', NULL),
	(2, 'B B Q BOWL', 6, 'With chiken', 'b_b_q_bowl.jpeg', '2.5', 'yes', NULL),
	(3, 'Chiken Handi Dum Biriyani', 1, 'Yummy Food, Healthy Food', 'chicken_handi_dam_biryani.jpeg', '6.5', 'yes', NULL),
	(4, 'Mexican  Wraps', 4, 'Good Food', 'mexican_wraps.jpeg', '7.00', 'yes', NULL),
	(5, 'Kentucky Platter', 7, 'This is yummy  food', 'kentucky_platter.png', '8.7', 'yes', NULL);
/*!40000 ALTER TABLE `foods` ENABLE KEYS */;

-- A despejar estrutura para tabela food-delivery.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `delivery_address` text NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `payment_option` varchar(255) NOT NULL,
  `order_total_amount` varchar(100) NOT NULL,
  `order_total_quantity` int(11) unsigned NOT NULL,
  `status` enum('Pending','Processing','Picked','Shipped','Delivered','Cancelled') NOT NULL DEFAULT 'Pending',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- A despejar dados para tabela food-delivery.orders: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (`id`, `user_id`, `delivery_address`, `contact_no`, `full_name`, `payment_option`, `order_total_amount`, `order_total_quantity`, `status`, `created`, `updated`) VALUES
	(1, 1, 'uk', '0000000000', 'Mr. Admin', 'COD', '50', 3, 'Delivered', '2021-04-17 11:44:37', '2021-09-04 20:48:21'),
	(2, 2, 'Maputo\r\nBagamoyo', '871985339', 'Enigma Studio', 'COD', '38', 3, 'Delivered', '2021-09-04 22:39:29', '2021-09-04 20:49:02'),
	(3, 2, 'Maputo\r\nBagamoyo', '871985339', 'Enigma Studio', 'COD', '117.8', 5, 'Delivered', '2021-09-04 22:52:15', '2021-09-04 20:53:14'),
	(4, 2, 'Maputo\r\nBagamoyo', '860675700', 'Eleuterio Notico', 'COD', '4.5', 2, 'Delivered', '2021-09-05 10:44:04', '2021-09-05 15:16:33'),
	(5, 2, 'Maputo\r\nBagamoyo', '860675700', 'Eleuterio Notico', 'COD', '4.5', 2, 'Pending', '2021-09-06 20:02:19', '2021-09-06 20:02:19'),
	(6, 2, 'Maputo\r\nBagamoyo', '860675700', 'Eleuterio Notico', 'COD', '12', 1, 'Pending', '2021-09-11 19:18:11', '2021-09-11 19:18:11'),
	(7, 2, 'Maputo\r\nBagamoyo', '860675700', 'Eleuterio Notico', 'COD', '38.5', 3, 'Pending', '2021-10-24 21:04:38', '2021-10-24 21:04:38');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- A despejar estrutura para tabela food-delivery.order_items
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) unsigned NOT NULL,
  `item_id` int(11) unsigned NOT NULL,
  `item_quantity` int(11) unsigned NOT NULL,
  `item_price` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  KEY `item_id` (`item_id`),
  CONSTRAINT `FK_order_items_foods` FOREIGN KEY (`item_id`) REFERENCES `foods` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_order_items_orders` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- A despejar dados para tabela food-delivery.order_items: ~19 rows (aproximadamente)
/*!40000 ALTER TABLE `order_items` DISABLE KEYS */;
INSERT INTO `order_items` (`id`, `order_id`, `item_id`, `item_quantity`, `item_price`) VALUES
	(1, 1, 1, 2, '2.00'),
	(2, 1, 2, 1, '2.5'),
	(3, 1, 5, 5, '8.7'),
	(4, 2, 2, 5, '2.5'),
	(5, 2, 1, 3, '2.00'),
	(6, 2, 3, 3, '6.5'),
	(7, 3, 1, 5, '2.00'),
	(8, 3, 2, 5, '2.5'),
	(9, 3, 3, 5, '6.5'),
	(10, 3, 4, 4, '7.00'),
	(11, 3, 5, 4, '8.7'),
	(12, 4, 1, 1, '2.00'),
	(13, 4, 2, 1, '2.5'),
	(14, 5, 1, 1, '2.00'),
	(15, 5, 5, 1, '2.5'),
	(16, 6, 1, 6, '2.00'),
	(17, 7, 1, 5, '2.00'),
	(18, 7, 2, 1, '2.5'),
	(19, 7, 3, 4, '6.5');
/*!40000 ALTER TABLE `order_items` ENABLE KEYS */;

-- A despejar estrutura para tabela food-delivery.settings
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `about_title` text NOT NULL,
  `about_detail` text NOT NULL,
  `about_img` varchar(255) NOT NULL,
  `fb_link` varchar(255) NOT NULL,
  `tw_link` varchar(255) NOT NULL,
  `ins_link` varchar(255) NOT NULL,
  `gplus_link` varchar(255) NOT NULL,
  `contact_info` text NOT NULL,
  `opening_hours` text NOT NULL,
  `currency` enum('GBP','USD','EURO','MZN') NOT NULL DEFAULT 'GBP',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- A despejar dados para tabela food-delivery.settings: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` (`id`, `about_title`, `about_detail`, `about_img`, `fb_link`, `tw_link`, `ins_link`, `gplus_link`, `contact_info`, `opening_hours`, `currency`) VALUES
	(1, 'Welcome To <span>QuickBuyStore</span>', 'QuickBuyStore', 'about-us.png', '#', '#', '#', '#', 'Maputo, Bagamoyo,Cep 1111, +258860675700\r\n				<br>\r\n				<br>\r\n				<a href="#">+258 860 675 700</a><br>\r\n				<a href="#">info@admin.com</a><br>', 'Monday: Closed\r\n				<br>\r\n				<br>\r\n				Tue-Wed : 9:Am - 10PM\r\n				<br>\r\n				<br>\r\n				Thu-Fri : 9:Am - 10PM\r\n				<br>\r\n				<br>\r\n				Sat-Sun : 5:PM - 10PM', 'USD');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;

-- A despejar estrutura para tabela food-delivery.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `type` enum('user','admin') NOT NULL DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- A despejar dados para tabela food-delivery.users: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `email`, `phone`, `password`, `fname`, `lname`, `address`, `type`, `created_at`, `updated_at`) VALUES
	(1, 'admin@admin.com', '+4499292223', '$2y$10$jF7HcbfCtCqlYy0LiXvkLOxylUErYdkmPAOhTRpWseijeOWten/kW', 'Mr.', 'Admin', 'Testing', 'admin', NULL, NULL),
	(2, 'eleuterio3d@gmail.com', '860675700', '$2y$10$pdLJkc4tua7WObMyjNs4yuUkzABU0diXP2lhZmQFnonpOJ6TPFTvq', 'Eleuterio', 'Notico', 'Maputo\r\nBagamoyo', 'user', NULL, NULL),
	(3, 'gessicagungulo1221@gmail.com', '879908275', '$2y$10$m1iZ6LZCqebTg7qMNilJcuUCLoYh87BAbQUEE1ADOVURM6c.e6lC.', 'Gessica', 'Gungulo', '', 'user', NULL, NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- A despejar estrutura para tabela food-delivery.wishlist
CREATE TABLE IF NOT EXISTS `wishlist` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `food_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `food_id` (`food_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `FK_wishlist_foods` FOREIGN KEY (`food_id`) REFERENCES `foods` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_wishlist_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- A despejar dados para tabela food-delivery.wishlist: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `wishlist` DISABLE KEYS */;
INSERT INTO `wishlist` (`id`, `user_id`, `food_id`, `created_at`, `updated_at`) VALUES
	(1, 2, 3, '2021-09-05 22:13:00', '2021-09-05 22:13:01');
/*!40000 ALTER TABLE `wishlist` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
