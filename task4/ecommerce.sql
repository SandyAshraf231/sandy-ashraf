-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2022 at 10:41 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `street` text NOT NULL,
  `building` text NOT NULL,
  `floor` int(20) UNSIGNED NOT NULL,
  `flat` int(20) UNSIGNED NOT NULL,
  `nots` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `region_id` bigint(20) UNSIGNED NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `verification_code` int(6) UNSIGNED DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(40) NOT NULL,
  `name_ar` varchar(40) NOT NULL,
  `image` varchar(100) NOT NULL DEFAULT 'brand_image.jpg',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'found',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` smallint(3) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(40) NOT NULL,
  `name_ar` varchar(40) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0-not active , 1-active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(40) NOT NULL,
  `name_ar` varchar(40) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0-not access , 1-access',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` text NOT NULL,
  `max_usage_count` int(7) UNSIGNED NOT NULL DEFAULT 1,
  `max_usage_count_per_user` int(3) UNSIGNED NOT NULL DEFAULT 1,
  `mini_order_price` int(7) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0-not used yet,,1 used',
  `
 discount` int(5) NOT NULL,
  `discount_type` int(5) NOT NULL COMMENT '#dont know',
  `start_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `end_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `favs`
--

CREATE TABLE `favs` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_en` varchar(100) NOT NULL,
  `title_ar` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `discount` int(5) NOT NULL,
  `discount type` int(5) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0-not have offer,1-have offer',
  `start_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `end_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number` int(7) UNSIGNED NOT NULL,
  `payment_method` varchar(40) NOT NULL,
  `total_price` decimal(9,0) UNSIGNED NOT NULL,
  `notes` varchar(255) NOT NULL DEFAULT 'order_note',
  `status` tinyint(1) NOT NULL COMMENT '0-deleverd , 1-not delederd ,canceld order',
  `delivered_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `address_id` bigint(20) UNSIGNED NOT NULL,
  `coupons_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(9,0) NOT NULL,
  `quantity` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `price` decimal(9,0) NOT NULL,
  `quantity` smallint(4) NOT NULL DEFAULT 1,
  `code` bigint(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1-active , 0-not active',
  `image` varchar(100) NOT NULL,
  `details_ar` text NOT NULL,
  `details_en` text NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_offer`
--

CREATE TABLE `product_offer` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `offer_id` bigint(20) UNSIGNED NOT NULL,
  `price_after_discound` decimal(9,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_spec`
--

CREATE TABLE `product_spec` (
  `spec_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(40) NOT NULL,
  `name_ar` varchar(40) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0-not access, 1-access region',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `city_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment` varchar(255) NOT NULL,
  `rate` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `specs`
--

CREATE TABLE `specs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(40) NOT NULL,
  `name_ar` varchar(40) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1-found,0-not found',
  `image` varchar(100) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1-active U , 0-not active U',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `verification_code` int(7) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `address_region_fk` (`region_id`),
  ADD KEY `address_user_fk` (`user_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`product_id`,`user_id`),
  ADD KEY `cart_user_fk` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favs`
--
ALTER TABLE `favs`
  ADD PRIMARY KEY (`product_id`,`user_id`),
  ADD KEY `fav_user_fk` (`user_id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_address_fk` (`address_id`),
  ADD KEY `order_coupon_fk` (`coupons_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`product_id`,`order_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `product_subcategory_fk` (`subcategory_id`),
  ADD KEY `product_brand_fk` (`brand_id`);

--
-- Indexes for table `product_offer`
--
ALTER TABLE `product_offer`
  ADD PRIMARY KEY (`product_id`,`offer_id`),
  ADD KEY `product_offer_fk` (`offer_id`);

--
-- Indexes for table `product_spec`
--
ALTER TABLE `product_spec`
  ADD PRIMARY KEY (`spec_id`,`product_id`),
  ADD KEY `product_spect_fk` (`product_id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `region_city_fk` (`city_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`product_id`,`user_id`),
  ADD KEY `reviewOf_user_fk` (`user_id`);

--
-- Indexes for table `specs`
--
ALTER TABLE `specs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategory_category_fk` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `specs`
--
ALTER TABLE `specs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `address_region_fk` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `address_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `cart_product_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `favs`
--
ALTER TABLE `favs`
  ADD CONSTRAINT `fav_product_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fav_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `order_address_fk` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`),
  ADD CONSTRAINT `order_coupon_fk` FOREIGN KEY (`coupons_id`) REFERENCES `coupons` (`id`);

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `product_brand_fk` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `product_subcategory_fk` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`);

--
-- Constraints for table `product_offer`
--
ALTER TABLE `product_offer`
  ADD CONSTRAINT `product_offerProduct_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `product_offer_fk` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`);

--
-- Constraints for table `product_spec`
--
ALTER TABLE `product_spec`
  ADD CONSTRAINT `product_spectV_fk` FOREIGN KEY (`spec_id`) REFERENCES `specs` (`id`),
  ADD CONSTRAINT `product_spect_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `regions`
--
ALTER TABLE `regions`
  ADD CONSTRAINT `region_city_fk` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviewOf_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `review_product_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategory_category_fk` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
