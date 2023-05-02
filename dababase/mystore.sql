-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2023 at 03:09 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'ruth', 'ruth@gmail.com', '$2y$10$PCIwmIzEwdyByUqGUfNWUOdft.j9kOwqmKsLzyyvDIqRBtgzCK.qa');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Asmarino'),
(2, 'Shenen'),
(3, 'Siwinwano'),
(4, 'Wuba');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `cart_detail_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(1, 'Women'),
(2, 'Men'),
(3, 'Kids'),
(4, 'Jewelry'),
(5, 'Accessories');

-- --------------------------------------------------------

--
-- Table structure for table `orders_pending`
--

CREATE TABLE `orders_pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_pending`
--

INSERT INTO `orders_pending` (`order_id`, `user_id`, `invoice_number`, `product_id`, `quantity`, `order_status`) VALUES
(1, 1, 1604435865, 28, 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keywords`, `category_id`, `brand_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `date`, `status`) VALUES
(1, 'Shifon', 'Shifon Habesha Dress', 'shifon, women, dress, eritrean, habesha, girls, custom made, any occasion, casual, church, long', 1, 2, 'dress13.png', 'dress14.png', 'dress15.png', '155', '2023-04-26 16:31:01', 'true'),
(2, 'Zuriya', 'Zuriya Habesha Dress with Netsela', 'zuriya, habesha, dress, church, wedding, timiket, christianing, women, any occasion, dressup, organic, cottoncotto, handmade, tilifi, long dress, girls', 1, 2, 'dress2.png', 'dress3.png', 'dress7.png', '455', '2023-04-26 18:24:43', 'true'),
(3, 'Shifon', 'Shifon Habesha Dress', 'shifon, women, dress, eritrean, habesha, girls, custom made, any occasion, casual, church, long, asmarino', 1, 1, 'dress15.png', 'dress13.png', 'dress14.png', '275', '2023-04-26 18:31:15', 'true'),
(4, 'Zuriya Gown', 'Zuriya Habesha Gown', 'zuriya, habesha, dress, church, wedding, timiket, christianing, women, any occasion, dressup, organic, cotton, handmade, tilifi, long dress, girls, siwinwano, wedding, gown, traditional', 1, 3, 'dress10.png', 'wed1.png', 'wed2.png', '450', '2023-04-26 18:36:28', 'true'),
(5, 'Zirzir Zuriya', 'Menen Habesha Dress', 'zuriya, habesha, dress, church, wedding, timiket, christianing, women, any occasion, dressup, organic, cotton, handmade, tilifi, long dress, girls, wuba, wedding, gown, traditional, menen, fital', 1, 4, 'women1.png', 'dress12.png', 'dress9.png', '350', '2023-04-26 18:41:39', 'true'),
(6, 'Kaba', 'Kaba Men or Women', 'kaba, gown, wedding, occasion, men, women, dino, tilifi, girls', 5, 4, 'acc2.png', 'tifany.png', 'dress6.png', '150', '2023-04-26 18:52:52', 'true'),
(7, 'Kaba', 'Kaba Original', 'kaba, original, black, golden, any occasion, wedding, anniversary', 5, 3, 'kaba.png', 'acc2.png', 'tifanny_1.png', '195', '2023-04-26 19:36:26', 'true'),
(8, 'Zuriya ', 'Zuriya Habesha Dress ', 'zuriya, habesha, dress, church, wedding, timiket, christianing, women, any occasion, dressup, organic, cotton, handmade, tilifi, long dress, girls, wuba, wedding, gown, traditional, menen, fital', 1, 1, 'acc14.png', 'women1.png', 'dress9.png', '375', '2023-04-26 19:46:09', 'true'),
(9, 'Tilifi Cass', 'Menen habesha Tilifi ', 'Tilifi, habesha, dress, church, wedding, timiket, christianing, women, any occasion, dressup, organic, cotton, handmade,  long dress, girls,  traditional, menen, fital, anniversary ', 1, 2, 'acc12.png', 'acc13.png', 'dress11.png', '255', '2023-04-26 19:50:36', 'true'),
(11, 'Men Shirt', 'Men Habesha Shirt', 'men, organic, cotton, shirt, tshirt, habesha, wedding, celebration, occasion', 2, 3, 'men_special.png', 'men17.png', 'men15.png', '150', '2023-04-26 22:20:16', 'true'),
(12, 'Men T-Shirt', 'Men Habeshs T-Shirt', 'men, habesha, t-shirt, shirt, long sleeve, embroidered, cotton, organic', 2, 4, 'men20.png', 'men21.png', 'men13.png', '200', '2023-04-26 22:23:22', 'true'),
(13, 'Men T-shirt', 'Men Meskel T-shirt', 'men, meskel, cross, t-shirt, shirt, short sleeve, cotton, casual, cotton', 2, 1, 'men6.png', 'men12.png', 'men9.png', '75', '2023-04-26 22:27:47', 'true'),
(14, 'Men T-shirt', 'Men Embroidered T-shirt', 'men,  t-shirt, shirt, short sleeve, cotton, casual, cotton, embroidered', 2, 2, 'men4.png', 'men12.png', 'men7.png', '60', '2023-04-26 22:32:47', 'true'),
(15, 'Men T-Shirt', 'Men Cross T-Shirt', 'men,  t-shirt, shirt, short sleeve, cotton, casual, cotton, embroidered, organic', 2, 4, 'men15.png', 'men21.png', 'men20.png', '85', '2023-04-26 23:47:04', 'true'),
(16, 'Men T-shirt', 'Men Meskel T-Shirt', 'men, meskel, cross, t-shirt, shirt, short sleeve, cotton, casual, cotton', 2, 3, 'men12.png', 'men13.png', 'men19.png', '85', '2023-04-27 00:05:16', 'true'),
(17, 'Men Tebab', 'Men Habesha Outfit', 'men, habesha, traditional, hadnmade, custom made, cotton, embroidered, boys', 2, 1, 'men18.png', 'men16.png', 'men23.png', '125', '2023-04-27 00:10:00', 'true'),
(18, 'Women Dress', 'Women Traditional Gown', 'women, traditional, cotton, wedding, occasion, anniversary, embroidery ', 1, 3, 'wed1.png', 'wed2.png', 'acc2.png', '495', '2023-04-27 00:14:56', 'true'),
(19, 'Girls Raya Dress', 'Little Girls Raya Tilifi', 'little girls, girls, raya, kids, tilifi, traditional dress, cotton, church, any accasion, embroidered', 3, 2, 'kids5.png', 'kids3.png', 'kids8.png', '195', '2023-04-27 00:38:57', 'true'),
(20, 'Silimat', 'Habesha Complet Jewelry', 'Gold, habesha jewelry, gobagib, girls, women', 4, 2, 'jewel9.png', 'jewel.jpg', 'jewel8.png', '1500', '2023-04-27 13:48:08', 'true'),
(21, 'Gabi Fital', 'Dirib Gabi-Men or Women', 'gabi, netsela, scarf, cotton, white, fitfit, dirib, organic, warm', 5, 3, 'fital_kuta1.png', 'gabi2.png', 'gabi3.png', '350', '2023-04-27 13:54:03', 'true'),
(22, 'Necklace', 'Geez Letters Necklace', 'jewelry, gold, letters, geez, gils, boys, men, women', 4, 3, 'habil.png', 'acc5.png', 'acc8.png', '150', '2023-04-27 13:58:42', 'true'),
(23, 'Netsela', 'Netsela Habesha Scarf', 'netsela, habesha scarf, scarf, cotton, ediat, tilet', 5, 1, 'netsela4.png', 'netsela1.png', 'netsela3.png', '150', '2023-04-27 14:05:05', 'true'),
(24, 'Kids Outfit', 'Little Boys Habesha Outfit', 'little boys habesha outfit, bahilawi, tilifi, kids, boys', 3, 2, 'kids10.png', 'kids.png', 'kids11.png', '250', '2023-04-27 14:09:14', 'true'),
(25, 'kids Zuriya', 'Habesha Kids Zuriya', 'kids, girls, zuriya, cotton, tilifi', 3, 3, 'kids3.png', 'kids4.png', 'kids14.png', '155', '2023-04-27 14:10:51', 'true'),
(26, 'Kids Tilifi', 'Little Kids Traditional Zuriya', 'little girls habesha outfit, bahilawi, tilifi, kids, girls, cotton, church', 3, 4, 'kids14.png', 'kids4.png', 'kids_special.png', '200', '2023-04-27 14:20:17', 'true'),
(27, 'Gobagib Jewelry', 'Habesha Complete Jewelry', 'gold, habesha jewelry, gobagib, girls, women, silimat', 4, 2, 'acc11.png', 'acc9.png', 'kutisha1.png', '1775', '2023-04-27 14:22:54', 'true'),
(28, 'Traditional Silimat', 'Habesha Complete Jewelry In Silver', 'silver, habesha jewelry, gobagib, girls, women', 4, 3, 'kutisha4.png', 'acc9.png', 'kutisha1.png', '500', '2023-04-27 14:27:00', 'true'),
(29, 'Habesha Gown', 'Habesha Wedding Gown', 'wedding, gown, habesha, traditional', 1, 1, 'wed2.png', 'wed1.png', 'acc2.png', '750', '2023-04-27 14:31:50', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES
(1, 1, 200, 701598002, 1, '2023-04-26 22:55:57', 'complete'),
(2, 1, 60, 1339144515, 1, '2023-04-26 22:56:04', 'complete'),
(3, 1, 275, 1144690195, 1, '2023-04-26 23:32:42', 'complete'),
(4, 1, 500, 1604435865, 1, '2023-04-27 14:36:36', 'complete');

-- --------------------------------------------------------

--
-- Table structure for table `user_payments`
--

CREATE TABLE `user_payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_payments`
--

INSERT INTO `user_payments` (`payment_id`, `order_id`, `invoice_number`, `amount`, `payment_mode`, `date`) VALUES
(1, 1, 701598002, 200, 'Visa', '2023-04-26 22:55:57'),
(2, 2, 1339144515, 60, 'Debit', '2023-04-26 22:56:04'),
(3, 3, 1144690195, 275, 'Visa', '2023-04-26 23:32:42'),
(4, 4, 1604435865, 500, 'Credit', '2023-04-27 14:36:36');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_phone`) VALUES
(1, 'ruth', 'ruth@gmail.com', '$2y$10$CcI.ShpsXdQoHh.JWQfVy.Ce3DSIg.sclwTCXBvNWaSGweMtIKrLi', 'acc11.png', '::1', 'maryland', '45678955');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`cart_detail_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders_pending`
--
ALTER TABLE `orders_pending`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_payments`
--
ALTER TABLE `user_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart_details`
--
ALTER TABLE `cart_details`
  MODIFY `cart_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders_pending`
--
ALTER TABLE `orders_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_payments`
--
ALTER TABLE `user_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
