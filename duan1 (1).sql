-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 16, 2025 at 11:07 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duan1`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `cate_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `type` tinyint(1) NOT NULL,
  `soft_delete` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cate_name`, `type`, `soft_delete`) VALUES
(16, 'iPhone', 1, 0),
(17, 'iPad', 1, 0),
(18, 'Macbooks', 0, 0),
(19, 'Tai nghe', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `content` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `product_id`, `content`, `created_at`) VALUES
(1, 10, 42, '123', '2024-12-10 18:47:39'),
(20, 16, 68, '123', '2025-06-10 17:38:43');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int NOT NULL,
  `code` varchar(50) NOT NULL,
  `discount_type` enum('percent','fixed') NOT NULL,
  `discount_value` float NOT NULL,
  `expiry_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `discount_type`, `discount_value`, `expiry_date`, `created_at`) VALUES
(1, 'DISC10', 'percent', 10, '2025-06-30', '2025-06-13 11:46:04'),
(2, 'DISC15', 'percent', 15, '2025-06-30', '2025-06-13 11:46:04'),
(3, 'DISC20', 'percent', 20, '2025-06-30', '2025-06-13 11:46:04'),
(4, 'GIAM50', 'percent', 50, '2025-06-30', '2025-06-13 11:46:04'),
(5, 'DISC25', 'percent', 25, '2025-06-30', '2025-06-13 11:46:04'),
(6, 'DISC30', 'percent', 30, '2025-06-30', '2025-06-13 11:46:04'),
(7, 'DISC12', 'percent', 12, '2025-06-30', '2025-06-13 11:46:04'),
(8, 'DISC8', 'percent', 8, '2025-06-30', '2025-06-13 11:46:04'),
(9, 'DISC1800', 'percent', 18, '2025-06-30', '2025-06-13 11:46:04'),
(11, 'GIAM100K', 'fixed', 100000, '2025-06-16', '2025-06-14 17:42:08');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `payment_method` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `status`, `payment_method`, `total_price`, `created_at`) VALUES
(19, 18, '4', 'cod', '12300000.00', '2025-06-12 15:47:10'),
(20, 16, '4', 'cod', '61500000.00', '2025-06-13 05:27:58'),
(21, 16, '4', 'cod', '20000000.00', '2025-06-13 05:34:26'),
(22, 16, '4', 'cod', '12300000.00', '2025-06-13 05:54:53'),
(23, 16, '4', 'cod', '56900000.00', '2025-06-13 06:16:07'),
(24, 16, '4', 'cod', '12300000.00', '2025-06-13 06:40:29'),
(25, 16, '4', 'cod', '12300000.00', '2025-06-13 06:42:15'),
(26, 16, '4', 'cod', '12300000.00', '2025-06-13 06:44:20'),
(27, 16, '1', 'cod', '0.00', '2025-06-13 06:45:39'),
(28, 16, '4', 'bank', '24621468.00', '2025-06-13 07:31:01'),
(29, 16, '4', 'cod', '12300000.00', '2025-06-15 07:29:31'),
(30, 16, '4', 'cod', '61500000.00', '2025-06-15 07:34:40'),
(31, 16, '3', 'cod', '21345.00', '2025-06-15 07:38:33'),
(32, 16, '3', 'cod', '61500000.00', '2025-06-15 07:42:45'),
(33, 16, '1', 'cod', '10000000.00', '2025-06-16 06:40:02');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `price` bigint NOT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `price`, `quantity`) VALUES
(32, 19, 70, 12300000, 1),
(33, 20, 68, 12300000, 5),
(34, 21, 81, 20000000, 1),
(35, 22, 68, 12300000, 1),
(36, 23, 70, 12300000, 3),
(37, 23, 81, 20000000, 1),
(38, 24, 69, 12300000, 1),
(39, 25, 68, 12300000, 1),
(40, 26, 70, 12300000, 1),
(41, 28, 69, 12300000, 1),
(42, 28, 70, 12300000, 1),
(43, 28, 67, 21345, 1),
(44, 28, 78, 123, 1),
(45, 29, 70, 12300000, 1),
(46, 30, 69, 12300000, 5),
(47, 31, 67, 21345, 1),
(48, 32, 69, 12300000, 5),
(49, 33, 68, 10000000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` bigint NOT NULL,
  `quantity` int NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `category_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`, `quantity`, `description`, `status`, `category_id`) VALUES
(59, '123123', 'images/6525391_sd.avif', 23123, 1231231, '23123', 1, 1),
(63, 'iPhone 16', 'images/AT-T-iPhone-16-Plus-512GB-Pink-Apple-Intelligence_e8d5aff8-c298-49ca-a859-e5f046275df4.beb1a9564cbb57530406ecbb67e34e5b.webp', 15000000, 123, '1231231', 1, 1),
(65, 'Airpods 3 Pro', 'images/tai-nghe-bluetooth-airpods-3-lightning-charge-apple-mpny3-trang-2-750x500 (1).jpg', 213452, 123123, '1231231', 1, 18),
(66, 'Apple Magic Keyboard', 'images/Ban-Phim-Apple-Magic-Keyboard-2-1 (1).jpg', 13245, 132454, '12345y65', 1, 19),
(67, 'Apple 2022 10.9-inch iPad (Wi-Fi, 256GB)', 'images/10th_gen._CB606154559_.jpg', 21345, 32145, '3124y6', 1, 17),
(68, 'iPhone 14', 'images/iphone-14-midnight-256gb_2.jpg', 10000000, 123, 'iPhone 16 sở hữu thiết kế tinh tế với màn hình 6.1 inch Super Retina XDR, chip A18 mạnh mẽ, hỗ trợ Apple Intelligence. Camera kép 48MP cải tiến, tích hợp tính năng chụp ảnh chuyên nghiệp và Dynamic Island. Hiệu năng vượt trội, kết nối 5G, phù hợp cho người dùng yêu thích sự cân bằng giữa hiệu suất và giá trị. Màu sắc đa dạng, thời lượng pin ấn tượng.', 1, 16),
(69, 'iPhone 14 Pro Max', 'images/dien-thoai-iphone-14-pro-max-256gb-den-1.webp', 12300000, 123, 'iPhone 16 sở hữu thiết kế tinh tế với màn hình 6.1 inch Super Retina XDR, chip A18 mạnh mẽ, hỗ trợ Apple Intelligence. Camera kép 48MP cải tiến, tích hợp tính năng chụp ảnh chuyên nghiệp và Dynamic Island. Hiệu năng vượt trội, kết nối 5G, phù hợp cho người dùng yêu thích sự cân bằng giữa hiệu suất và giá trị. Màu sắc đa dạng, thời lượng pin ấn tượng.\r\n', 1, 16),
(70, 'iPhone 13 Pro Max', 'images/apple-iphone-13-pro-max-pakistan-priceoye-qgwvt.jpg', 12300000, 123, 'iPhone 16 sở hữu thiết kế tinh tế với màn hình 6.1 inch Super Retina XDR, chip A18 mạnh mẽ, hỗ trợ Apple Intelligence. Camera kép 48MP cải tiến, tích hợp tính năng chụp ảnh chuyên nghiệp và Dynamic Island. Hiệu năng vượt trội, kết nối 5G, phù hợp cho người dùng yêu thích sự cân bằng giữa hiệu suất và giá trị. Màu sắc đa dạng, thời lượng pin ấn tượng.', 1, 16),
(71, 'Apple iPad Pro 11-inch (M4)', 'images/ipadairpurple.jpg', 123, 123, '123', 1, 17),
(72, 'Samsung S23', 'images/samsung-galaxy-s23-plus-lavender-render-1.avif', 123, 123, '123', 1, 17),
(73, 'Apple iPad Air 13-inch with M3 chip', 'images/61k05QwLuML.jpg', 123, 123, '123', 1, 17),
(74, 'Samsung S25', 'images/galaxy-s25-azul-marinho.webp', 123, 123, '123', 1, 17),
(75, 'Bàn phím cơ gaming SPARTAN', 'images/ban-phim-co-gaming-spartan-tc3218_e178f83dee794d999ac19dc0724be991_master.webp', 123, 1231, '23', 1, 19),
(76, 'Bàn phím cơ AKKO 5075B ', 'images/3244-5075-asa---------_rgb------.png', 123, 123, '123', 1, 19),
(77, 'Bàn phím cơ AKKO 5075B Plus Multi-modes Dragon Ball Super', 'images/25374-akko.png', 123, 123, '123', 1, 19),
(78, 'Airpods Pro', 'images/th.jpg', 123, 123, '123', 1, 18),
(79, 'Airpod 2', 'images/710rzW2RGcL._SL1500_-2.jpg', 123, 123, '123', 1, 18),
(80, 'Airpod Max', 'images/6373460_sd.avif', 123, 123, '123', 1, 18),
(81, 'iPhone 16', 'images/apple_iphone_16_128gb_pink_ac78322_50589.jpg', 20000000, 123, 'iPhone 16 sở hữu thiết kế tinh tế với màn hình 6.1 inch Super Retina XDR, chip A18 mạnh mẽ, hỗ trợ Apple Intelligence. Camera kép 48MP cải tiến, tích hợp tính năng chụp ảnh chuyên nghiệp và Dynamic Island. Hiệu năng vượt trội, kết nối 5G, phù hợp cho người dùng yêu thích sự cân bằng giữa hiệu suất và giá trị. Màu sắc đa dạng, thời lượng pin ấn tượng.', 1, 16),
(82, 'Vũ Hoàng Hiệp', 'images/61k05QwLuML.jpg', 123, 123, '123', 1, 16);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `fullname` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(199) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(199) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` enum('admin','user') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'user',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `password`, `email`, `phone`, `address`, `role`, `active`, `created_at`, `updated_at`) VALUES
(16, 'Vũ Hoàng Hiệp', '$2y$10$Iy7B53LFL/K0OhZPqB84Gec8l0qxFEnDjT.M.zR7oix3JWScOME6.', 'hipphipp2952005@gmail.com', '0868882950', 'Van Tien Dung', 'admin', 1, '2025-06-10 16:31:32', '2025-06-10 16:31:32'),
(17, 'USER', '$2y$10$/YVcnc0V2JLeTm8XK8cWW.Yb33o9Snn.7q3u/HE1HsyIICs1R2K4y', 'hipphipp2952005@gmail.com', '0868882950', 'Van Tien Dung', 'admin', 1, '2025-06-10 16:36:22', '2025-06-10 16:36:22'),
(18, 'user', '$2y$10$gbosnFr//70Duy3/FQ6S.Ot8nhZPPQWT8yz84aNIl4yn8h2NaaE0C', 'user@gmail.com', '123', '123', 'admin', 1, '2025-06-11 12:22:52', '2025-06-11 12:22:52'),
(19, 'Vũ Hoàng Hiệp', '$2y$10$ts6B.P.w14HzKGN8olEtN.0hp4H33Eja8GHUM8M9QQ7nKT3c1L9/m', '123@gmail.com', '0868882950', 'Van Tien Dung', 'user', 1, '2025-06-14 18:05:55', '2025-06-14 18:05:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
