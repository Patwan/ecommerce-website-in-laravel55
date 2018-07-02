-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2018 at 03:59 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lara`
--

-- --------------------------------------------------------

--
-- Table structure for table `cats`
--

CREATE TABLE `cats` (
  `id` int(10) UNSIGNED NOT NULL,
  `cat_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cats`
--

INSERT INTO `cats` (`id`, `cat_name`, `p_id`, `created_at`, `updated_at`) VALUES
(1, 'Fruits', 3, '2018-04-04 00:33:45', '2018-04-04 00:33:45'),
(2, 'Good Drinks', 3, '2018-04-04 00:34:09', '2018-04-04 00:34:09'),
(3, 'Foods', 0, '2018-04-04 03:04:40', '2018-04-04 03:04:40'),
(4, 'Clothes', 0, '2018-04-04 14:13:54', '2018-04-04 14:13:54'),
(5, 'Water', NULL, '2018-04-06 13:13:37', '2018-04-06 13:13:37');

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE `inbox` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inbox`
--

INSERT INTO `inbox` (`id`, `user_id`, `subject`, `status`, `message`, `created_at`, `updated_at`) VALUES
(1, 4, 'hi', 0, 'Hello, Are you there?', '2018-04-08 05:13:09', '2018-04-08 05:28:15'),
(2, 3, 'hello', 0, 'hi, are you there?', '2018-04-08 05:13:09', '2018-04-08 05:24:27'),
(3, 5, 'Hello', 1, 'Awesome work in programming web applications ', '2018-04-08 07:15:43', '2018-04-08 05:26:21'),
(4, 6, 'Awesome', 0, 'Awesome web applications at Java, C# and JavaScript', '2018-04-08 07:15:43', '2018-04-08 05:30:36');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_04_04_021217_create_products_table', 2),
(4, '2018_04_04_030551_create_cats_table', 3),
(5, '2018_04_08_022625_create_inbox_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `pro_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_id` int(11) NOT NULL,
  `pro_info` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `pro_name`, `pro_code`, `pro_img`, `cat_id`, `pro_info`, `pro_price`, `created_at`, `updated_at`) VALUES
(1, 'Mangoes', '9099', '1523019172boy-1300226__340.png', 1, 'Updated Mangoes has been a success', '120', '2018-04-03 23:44:42', '2018-04-06 09:52:52'),
(2, 'Oranges', '989', 'img.jpg', 1, 'Sweet and nice oranges', '180', '2018-04-04 00:54:02', '2018-04-04 00:54:02'),
(3, 'Juice', '98999', 'img.jpg', 1, 'Sweet juice', '908877', '2018-04-04 00:57:51', '2018-04-04 00:57:51'),
(4, 'Soda', '3456', 'img.jpg', 2, 'Cool Drinks and awesome', '8988', '2018-04-04 02:03:18', '2018-04-04 02:03:18'),
(5, 'Githeri', '898', '1522862135jp4.jpg', 3, 'asnbasbvsagvsagvashgavshgavshgasvhgasvghasvghsa', '8777', '2018-04-04 03:05:23', '2018-04-04 14:15:35'),
(6, 'Mokimo', '898', 'img.jpg', 3, 'asnbasbvsagvsagvashgavshgavshgasvhgasvghasvghsa', '8777', '2018-04-04 03:05:54', '2018-04-04 03:05:54'),
(7, 'Coffee', '898', 'img.jpg', 2, 'asnbasbvsagvsagvashgavshgavshgasvhgasvghasvghsa', '8777', '2018-04-04 03:06:21', '2018-04-04 03:06:21'),
(8, 'Mtumba', '9089', 'img.jpg', 4, 'mbjmbjbjh jbsdvjhdbsvhjsd vdsjvh dsvjhdsjvds vjhds vjh dshvjdvjhds vjhv sjhvs hjds jhvs djhvs djs', '9898', '2018-04-04 14:14:37', '2018-04-04 14:14:37'),
(9, 'MAr', '000', 'img.jpg', 2, 'Hhhsjagsjgashasnabsasgagssahgahsg', '9888', '2018-04-06 13:11:52', '2018-04-06 13:11:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Admin', 'admin@admin.com', '$2y$10$RNSY7M2PPfTsAZtFrSzS0e0HRRwmqWn/msRY2fpg0QnFMuNVXlJtq', NULL, NULL, 'Vrd7AYttmCsenS1FXwNenIwveNlTvbYFifC0CkacdbHBEJd04kbUy8Ior6r4', '2018-07-02 10:55:26', '2018-07-02 10:55:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cats`
--
ALTER TABLE `cats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cats`
--
ALTER TABLE `cats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
