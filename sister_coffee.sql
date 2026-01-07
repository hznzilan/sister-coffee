-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2026 at 04:04 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sister_coffee`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `coffee_id` varchar(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `coffee_id`, `quantity`, `created_at`, `updated_at`) VALUES
(3, '3', '4', 2, '2026-01-05 18:06:41', '2026-01-05 18:07:08'),
(4, '3', '5', 1, '2026-01-05 18:07:00', '2026-01-05 18:07:00'),
(9, '4', '12', 1, '2026-01-07 03:39:56', '2026-01-07 03:39:56'),
(10, '4', '11', 1, '2026-01-07 03:40:02', '2026-01-07 03:40:02'),
(11, '4', '4', 2, '2026-01-07 03:46:42', '2026-01-07 03:50:37'),
(12, '4', '6', 1, '2026-01-07 03:47:52', '2026-01-07 03:47:52'),
(13, '4', '5', 5, '2026-01-07 03:55:55', '2026-01-07 04:00:10');

-- --------------------------------------------------------

--
-- Table structure for table `coffees`
--

CREATE TABLE `coffees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `detail` longtext NOT NULL,
  `category` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coffees`
--

INSERT INTO `coffees` (`id`, `name`, `detail`, `category`, `price`, `image`, `created_at`, `updated_at`, `status`) VALUES
(3, 'Signature Coffee', 'Our house-blend espresso is carefully crafted and combined with steamed milk. This smooth, balanced coffee offers a rich aroma and full-bodied flavour, perfect for any coffee lover.\r\n\r\nIngredients\r\n-espresso (signature bean)\r\n- milk\r\n- sugar', 'Coffee Series', 8.00, '1767602012.png', '2026-01-05 00:33:32', '2026-01-06 11:35:30', 'active'),
(4, 'Hazelnut', 'Aromatic hazelnut syrup is blended with freshly brewed espresso and milk. The result is a nutty, indulgent drink that’s both smooth and comforting\r\n\r\nIngredients:\r\n- Espresso \r\n- Milk \r\n- Hazelnut syrup', 'Coffee Series', 9.00, '1767603877.png', '2026-01-05 01:04:37', '2026-01-05 01:04:37', 'active'),
(5, 'Green Tea', 'Only the finest green tea leaves are selected and carefully brewed, then blended with creamy milk. This creates a smooth, comforting drink with a delicate, earthy flavour\r\n\r\nIngredients:\r\n- green tea \r\n- milk\r\n- sweetener', 'Non-Coffee Series', 8.00, '1767604054.png', '2026-01-05 01:07:34', '2026-01-05 01:07:34', 'active'),
(6, 'Thai Tea', 'Strongly brewed Thai tea is combined with milk and sugar for a creamy, sweet, and fragrant beverage. Its distinctive orange hue and bold flavour make it a favourite treat.\r\n\r\nIngredients:\r\n- thai tea\r\n- milk\r\n- sugar', 'Non-Coffee Series', 8.00, '1767604114.png', '2026-01-05 01:08:34', '2026-01-05 01:08:34', 'active'),
(7, 'Matcha Chocolate', 'High-quality matcha is combined with rich chocolate and creamy milk. The result is a smooth, indulgent drink with a harmonious balance of earthy and sweet flavours.\r\n\r\nIngredients:\r\n- matcha green tea\r\n- chocolate\r\n- milk\r\n- sugar', 'Non-Coffee Series', 9.00, '1767604173.png', '2026-01-05 01:09:33', '2026-01-05 01:09:33', 'active'),
(8, 'Matcha Latte', 'Premium matcha powder is whisked to perfection with milk, producing a velvety texture and vibrant green colour. Each sip offers a rich, energizing taste that awakens the senses.\r\n\r\nIngredients:\r\n- matcha green tea\r\n- milk\r\n- sugar', 'Non-Coffee Series', 8.00, '1767604290.png', '2026-01-05 01:10:56', '2026-01-05 01:11:30', 'active'),
(9, 'Matcha Strawberry', 'Vibrant matcha meets sweet, juicy strawberries, blended with milk for a refreshing and balanced flavour. This drink is both visually appealing and delightfully tasty.\r\n\r\nIngredients:\r\n- Matcha green tea\r\n- Strawberry\r\n- Milk\r\n- Sugar', 'Non-Coffee Series', 9.50, '1767604356.png', '2026-01-05 01:12:36', '2026-01-05 04:22:15', 'active'),
(10, 'Matcha Espresso', 'Earthy matcha is paired with bold espresso and creamy milk, creating a unique and energizing fusion. Each sip delivers a rich depth of flavour with a subtle sweetness.\r\n\r\nIngredients:\r\n- Matcha green tea \r\n- Espresso \r\n- Milk \r\n- Sugar', 'Coffee Series', 8.00, '1767604412.png', '2026-01-05 01:13:32', '2026-01-05 01:13:32', 'active'),
(11, 'Chocolate', 'Premium chocolate is mixed with creamy milk to create a rich, smooth, and comforting classic. Perfect for chocolate lovers seeking warmth and sweetness in every sip.\r\n\r\nIngredients:\r\n- Chocolate  \r\n- Milk \r\n- Sugar', 'Non-Coffee Series', 9.00, '1767604480.png', '2026-01-05 01:14:40', '2026-01-05 01:14:40', 'active'),
(12, 'Blue Ocean', 'Natural butterfly pea flowers are brewed and lightly sweetened, producing a vibrant, refreshing drink. A hint of citrus adds a delicate, revitalizing flavour.\r\n\r\nIngredients:\r\n- Blue tea \r\n- Lemon  \r\n- Sugar \r\n- Sparkling Water', 'Sparkling', 6.00, '1767604569.png', '2026-01-05 01:16:09', '2026-01-05 01:16:09', 'active'),
(13, 'Mango', 'Ripe mangoes are blended with ice and just the right amount of sweetness. This bright and tropical drink is perfectly refreshing on a hot day.\r\n\r\nIngredients:\r\n- Mango syrup \r\n- Sugar \r\n- Water', 'Sparkling', 6.00, '1767604620.png', '2026-01-05 01:17:00', '2026-01-05 01:17:00', 'active'),
(14, 'Strawberry', 'Juicy strawberries are combined with ice and sugar for a cool, sweet, and revitalizing beverage. A perfect balance of fruity freshness in every sip.\r\n\r\nIngredients:\r\n- Strawberry syrup \r\n- Sugar \r\n- Sparkling water', 'Sparkling', 6.00, '1767604680.png', '2026-01-05 01:18:00', '2026-01-05 01:18:00', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2026_01_03_145807_create_sessions_table', 1),
(7, '2026_01_05_072347_create_coffees_table', 2),
(8, '2026_01_05_180614_create_carts_table', 3),
(10, '2026_01_06_053343_add_phone_to_users_table', 4),
(12, '2026_01_06_134522_create_orders_table', 5),
(13, '2026_01_06_191955_add_status_to_coffees_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `coffee_title` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `delivery_status` varchar(255) NOT NULL DEFAULT 'processing',
  `payment_status` varchar(255) NOT NULL DEFAULT 'cash on delivery',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `email`, `phone`, `address`, `coffee_title`, `quantity`, `price`, `image`, `date`, `delivery_status`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, '1', 'hani', 'hznzilan@gmail.com', '01112239857', 'Mahallah maryam block B', 'Signature Coffee', '2', '8.00', '1767602012.png', '2026-01-06', 'delivered', 'cash on delivery', '2026-01-06 06:29:55', '2026-01-07 01:55:19'),
(2, '1', 'hani', 'hznzilan@gmail.com', '01112239857', 'Maryam Blok A', 'Signature Coffee', '1', '8.00', '1767602012.png', '2026-01-06', 'processing', 'cash on delivery', '2026-01-06 08:57:43', '2026-01-06 08:57:43'),
(3, '1', 'hani', 'hznzilan@gmail.com', '01112239857', 'Maryam Blok A', 'Hazelnut', '2', '9.00', '1767603877.png', '2026-01-06', 'processing', 'cash on delivery', '2026-01-06 08:57:43', '2026-01-06 08:57:43'),
(4, '1', 'hani', 'hznzilan@gmail.com', '01112239857', 'Maryam Blok A', 'Strawberry', '1', '6.00', '1767604680.png', '2026-01-06', 'processing', 'cash on delivery', '2026-01-06 08:57:44', '2026-01-06 08:57:44'),
(5, '1', 'hani', 'hznzilan@gmail.com', '01112239857', 'Mahallah maryam block B', 'Mango', '1', '6.00', '1767604620.png', '2026-01-07', 'processing', 'cash on delivery', '2026-01-07 04:28:13', '2026-01-07 04:28:13'),
(6, '1', 'hani', 'hznzilan@gmail.com', '01112239857', 'KICT cafe', 'Matcha Latte', '1', '8.00', '1767604290.png', '2026-01-07', 'processing', 'cash on delivery', '2026-01-07 04:55:55', '2026-01-07 04:55:55'),
(7, '1', 'hani', 'hznzilan@gmail.com', '01112239857', 'KICT cafe', 'Thai Tea', '1', '8.00', '1767604114.png', '2026-01-07', 'processing', 'cash on delivery', '2026-01-07 04:59:41', '2026-01-07 04:59:41'),
(8, '1', 'hani', 'hznzilan@gmail.com', '01112239857', 'test3', 'Thai Tea', '1', '8.00', '1767604114.png', '2026-01-07', 'processing', 'cash on delivery', '2026-01-07 05:02:39', '2026-01-07 05:02:39'),
(9, '1', 'hani', 'hznzilan@gmail.com', '01112239857', 'test4', 'Green Tea', '1', '8.00', '1767604054.png', '2026-01-07', 'delivered', 'cash on delivery', '2026-01-07 05:07:26', '2026-01-07 06:14:26');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('ROOyZOo2Idh77L74LTy6toOjRZV2nOPOdOEowtVo', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiTThwN1NOcnJXU2VsQ2x0bmFLN0JsY0xUQVgzU2JmbzhBYkM2NEhKMCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC92aWV3X2NvZmZlZSI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkTHFhV1lFSGE5V3FvLjltVVl1S3E5dWZ6NnFsRC5zeFdRdjc0TjNnc0t3M2Y1UC5Neng0ckciO30=', 1767796306);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `usertype` varchar(255) NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `usertype`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'hani', 'hznzilan@gmail.com', '01112239857', 'user', NULL, '$2y$10$JCzra3gsXyxenUFG5fg/ZuYOQYBAUsNSDEYmTEH/Q7RfgwLn2bnuK', NULL, NULL, NULL, NULL, NULL, NULL, '2026-01-03 07:07:12', '2026-01-03 07:07:12'),
(2, 'admin', 'admin@gmail.com', NULL, 'admin\r\n', NULL, '$2y$10$LqaWYEHa9Wqo.9mUYuKq9ufz6qlD.sxWQv74N3gsKw3f5P.Mzx4rG', NULL, NULL, NULL, NULL, NULL, NULL, '2026-01-03 07:15:48', '2026-01-03 07:15:48'),
(3, 'zaf', 'zafeera@gmail.com', '0193879040', 'user', NULL, '$2y$10$ONdjEOyDuVepCjKwT6atiePBzh3xcvTA3jHs3qka1pdCZCzc8nXb2', NULL, NULL, NULL, NULL, NULL, NULL, '2026-01-05 10:45:40', '2026-01-05 10:45:40'),
(4, 'hanna', 'hanna@gmail.com', NULL, 'user', NULL, '$2y$10$uqefMlQuCTqyurdAH8JRQuIHCNGoYFaJsia0hoRmx11E05f088whe', NULL, NULL, NULL, NULL, NULL, NULL, '2026-01-07 03:38:36', '2026-01-07 03:38:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coffees`
--
ALTER TABLE `coffees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `coffees`
--
ALTER TABLE `coffees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
