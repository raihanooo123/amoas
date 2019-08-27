-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2019 at 09:42 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appointment`
--

-- --------------------------------------------------------

--
-- Table structure for table `addons`
--

CREATE TABLE `addons` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` double(8,2) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `photo_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `addon_booking`
--

CREATE TABLE `addon_booking` (
  `id` int(10) UNSIGNED NOT NULL,
  `addon_id` int(10) UNSIGNED NOT NULL,
  `booking_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `package_id` int(10) UNSIGNED NOT NULL,
  `booking_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `booking_instructions` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `booking_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `booking_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_calendar_event_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Processing',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking_times`
--

CREATE TABLE `booking_times` (
  `id` int(10) UNSIGNED NOT NULL,
  `day` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opening_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `closing_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_off_day` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking_times`
--

INSERT INTO `booking_times` (`id`, `day`, `opening_time`, `closing_time`, `is_off_day`, `created_at`, `updated_at`) VALUES
(1, 'Monday', '08:00 AM', '04:00 PM', 0, '2019-08-10 12:16:42', '2019-08-10 12:30:55'),
(2, 'Tuesday', '08:00 AM', '04:00 PM', 0, '2019-08-10 12:16:42', '2019-08-10 12:31:02'),
(3, 'Wednesday', '08:00 AM', '04:00 PM', 0, '2019-08-10 12:16:42', '2019-08-10 12:31:45'),
(4, 'Thursday', '08:00 AM', '04:00 PM', 0, '2019-08-10 12:16:42', '2019-08-10 12:31:53'),
(5, 'Friday', '08:00 AM', '04:00 PM', 1, '2019-08-10 12:16:42', '2019-08-10 12:32:06'),
(6, 'Saturday', '08:00 AM', '04:00 PM', 0, '2019-08-10 12:16:42', '2019-08-10 12:30:47'),
(7, 'Sunday', '08:00 AM', '04:00 PM', 0, '2019-08-10 12:16:42', '2019-08-10 12:30:28');

-- --------------------------------------------------------

--
-- Table structure for table `cancel_requests`
--

CREATE TABLE `cancel_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `booking_id` int(10) UNSIGNED NOT NULL,
  `reason` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `photo_id`, `created_at`, `updated_at`) VALUES
(1, 'All Services', 7, '2019-08-10 12:20:45', '2019-08-20 03:10:22'),
(2, 'Legal Services', 6, '2019-08-10 12:21:24', '2019-08-20 03:10:09');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(10) UNSIGNED NOT NULL,
  `booking_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_refunded` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2018_03_02_101041_add_photo_id_to_users', 1),
(4, '2018_03_03_053232_create_categories_table', 1),
(5, '2018_03_03_064614_create_packages_table', 1),
(6, '2018_03_03_091312_create_addons_table', 1),
(7, '2018_03_05_104849_create_session_addons_table', 1),
(8, '2018_03_16_151644_create_roles_table', 1),
(9, '2018_03_16_151757_create_photos_table', 1),
(10, '2018_03_18_191305_create_settings_table', 1),
(11, '2018_03_23_173222_create_bookings_table', 1),
(12, '2018_03_23_182902_create_invoices_table', 1),
(13, '2018_03_23_212048_create_addon_booking_table', 1),
(14, '2018_05_13_064116_create_cancel_requests_table', 1),
(15, '2018_06_02_114624_add_new_features_to_settings', 1),
(16, '2018_06_02_114907_make_booking_address_nullable', 1),
(17, '2018_06_04_082918_add_is_paid_to_invoices', 1),
(18, '2018_06_10_043750_drop_timing_columns_from_settings', 1),
(19, '2018_06_10_044212_create_booking_times_table', 1),
(20, '2018_06_11_060756_add_currency_options_in_settings', 1),
(21, '2018_06_11_095204_add_clock_options_to_settings', 1),
(22, '2018_06_11_101248_add_package_slot_timing_to_settings', 1);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` double(8,2) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `photo_id` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `title`, `description`, `price`, `category_id`, `photo_id`, `duration`, `created_at`, `updated_at`) VALUES
(1, 'Visa', '<span style=\"color: rgb(51, 51, 51); font-family: Lato, Helvetica, sans-serif; font-size: 12px;\">Tourist Visa - $80.USD</span><br style=\"color: rgb(51, 51, 51); font-family: Lato, Helvetica, sans-serif; font-size: 12px;\"><span style=\"color: rgb(51, 51, 51); font-family: Lato, Helvetica, sans-serif; font-size: 12px;\">Entry Visa - $100.USD</span><br style=\"color: rgb(51, 51, 51); font-family: Lato, Helvetica, sans-serif; font-size: 12px;\"><span style=\"color: rgb(51, 51, 51); font-family: Lato, Helvetica, sans-serif; font-size: 12px;\">Transit Visa - $80.USD</span><br style=\"color: rgb(51, 51, 51); font-family: Lato, Helvetica, sans-serif; font-size: 12px;\"><span style=\"color: rgb(51, 51, 51); font-family: Lato, Helvetica, sans-serif; font-size: 12px;\">Double Transit Visa - $150.USD</span><br>', 0.00, 1, 10, 30, '2019-08-10 12:24:22', '2019-08-20 03:11:20'),
(2, 'Passport - پاسپورت', '<span style=\"color: rgb(51, 51, 51); font-family: Lato, Helvetica, sans-serif; font-size: 12px;\">Issuance of Machine Readable Passport</span>', 120.00, 1, 9, 75, '2019-08-10 12:25:29', '2019-08-20 03:11:11'),
(3, 'Miscellaneous Consular Services - صدور اسناد متفرقه', NULL, 10.00, 1, 8, 30, '2019-08-10 12:28:36', '2019-08-20 03:11:00');

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
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(10) UNSIGNED NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `file`, `created_at`, `updated_at`) VALUES
(6, '1566286809signing-contract-yukon-legal-1024x683.jpg', '2019-08-20 03:10:09', '2019-08-20 03:10:09'),
(7, '1566286822signing-contract-yukon-legal-1024x683.jpg', '2019-08-20 03:10:22', '2019-08-20 03:10:22'),
(8, '1566286860visa580-330.jpg', '2019-08-20 03:11:00', '2019-08-20 03:11:00'),
(9, '1566286871visa580-330.jpg', '2019-08-20 03:11:11', '2019-08-20 03:11:11'),
(10, '1566286880visa580-330.jpg', '2019-08-20 03:11:20', '2019-08-20 03:11:20');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', '2019-08-10 12:16:42', '2019-08-10 12:16:42'),
(2, 'Customer', '2019-08-10 12:16:42', '2019-08-10 12:16:42');

-- --------------------------------------------------------

--
-- Table structure for table `session_addons`
--

CREATE TABLE `session_addons` (
  `id` int(10) UNSIGNED NOT NULL,
  `session_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addon_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `google_maps_api_key` text COLLATE utf8mb4_unicode_ci,
  `google_calendar_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sync_events_to_calendar` tinyint(1) NOT NULL DEFAULT '0',
  `stripe_test_key_pk` text COLLATE utf8mb4_unicode_ci,
  `stripe_test_key_sk` text COLLATE utf8mb4_unicode_ci,
  `stripe_live_key_pk` text COLLATE utf8mb4_unicode_ci,
  `stripe_live_key_sk` text COLLATE utf8mb4_unicode_ci,
  `stripe_enabled` tinyint(1) NOT NULL DEFAULT '0',
  `stripe_sandbox_enabled` tinyint(1) NOT NULL DEFAULT '1',
  `paypal_client_id` text COLLATE utf8mb4_unicode_ci,
  `paypal_client_secret` text COLLATE utf8mb4_unicode_ci,
  `paypal_enabled` tinyint(1) NOT NULL DEFAULT '0',
  `paypal_sandbox_enabled` tinyint(1) NOT NULL DEFAULT '1',
  `days_limit_to_cancel` int(11) DEFAULT NULL,
  `allow_to_cancel` tinyint(1) NOT NULL DEFAULT '0',
  `days_limit_to_update` int(11) DEFAULT NULL,
  `allow_to_update` tinyint(1) NOT NULL DEFAULT '0',
  `slots_method` int(11) NOT NULL DEFAULT '1',
  `enable_gst` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `gst_percentage` double(8,2) NOT NULL DEFAULT '0.00',
  `business_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'bookify',
  `primary_color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secondary_color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USD',
  `contact_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_plus_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pinterest_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `freshchat_widget` text COLLATE utf8mb4_unicode_ci,
  `lang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slot_duration` int(11) NOT NULL DEFAULT '15',
  `offline_payments` tinyint(1) NOT NULL DEFAULT '0',
  `currency_symbol_position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'left',
  `thousand_separator` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ',',
  `decimal_separator` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '.',
  `decimal_points` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2',
  `clock_format` int(11) NOT NULL DEFAULT '12',
  `slots_with_package_duration` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `google_maps_api_key`, `google_calendar_id`, `sync_events_to_calendar`, `stripe_test_key_pk`, `stripe_test_key_sk`, `stripe_live_key_pk`, `stripe_live_key_sk`, `stripe_enabled`, `stripe_sandbox_enabled`, `paypal_client_id`, `paypal_client_secret`, `paypal_enabled`, `paypal_sandbox_enabled`, `days_limit_to_cancel`, `allow_to_cancel`, `days_limit_to_update`, `allow_to_update`, `slots_method`, `enable_gst`, `gst_percentage`, `business_name`, `primary_color`, `secondary_color`, `default_currency`, `contact_email`, `contact_number`, `facebook_link`, `twitter_link`, `google_plus_link`, `instagram_link`, `pinterest_link`, `freshchat_widget`, `lang`, `created_at`, `updated_at`, `slot_duration`, `offline_payments`, `currency_symbol_position`, `thousand_separator`, `decimal_separator`, `decimal_points`, `clock_format`, `slots_with_package_duration`) VALUES
(1, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, 0, 1, 2, 0, 2, 0, 1, '0', 0.00, 'Bun Appointment System', '#d99e09', '#4e5e6a', 'USD', 'ahmadfaisal47@gmail.com', '0774141663', NULL, NULL, NULL, NULL, NULL, NULL, 'en', '2019-08-10 12:16:42', '2019-08-20 02:32:06', 15, 0, 'left', ',', '.', '2', 12, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '2',
  `is_active` int(11) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `phone_number`, `email`, `password`, `role_id`, `is_active`, `remember_token`, `created_at`, `updated_at`, `photo_id`) VALUES
(1564, 'Faisal', 'Abubaker', NULL, 'ahmadfaisal47@gmail.com', '$2y$10$EEjdtBsxizw7af2abgc3GuDmEcRqtdmX.CgVHIiu892clTi6b3ETG', 1, 1, 'IkfelfGSi4jsrEYQZdFsUzOfTIB2PWmUhdYylJXIspI3XOBgQhSv6fM3G2lF', '2019-08-10 12:16:42', '2019-08-10 12:16:42', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addons`
--
ALTER TABLE `addons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addons_category_id_index` (`category_id`);

--
-- Indexes for table `addon_booking`
--
ALTER TABLE `addon_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_user_id_index` (`user_id`),
  ADD KEY `bookings_package_id_index` (`package_id`);

--
-- Indexes for table `booking_times`
--
ALTER TABLE `booking_times`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cancel_requests`
--
ALTER TABLE `cancel_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cancel_requests_booking_id_index` (`booking_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invoices_transaction_id_unique` (`transaction_id`),
  ADD KEY `invoices_booking_id_index` (`booking_id`),
  ADD KEY `invoices_user_id_index` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `packages_category_id_index` (`category_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session_addons`
--
ALTER TABLE `session_addons`
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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addons`
--
ALTER TABLE `addons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `addon_booking`
--
ALTER TABLE `addon_booking`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking_times`
--
ALTER TABLE `booking_times`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cancel_requests`
--
ALTER TABLE `cancel_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `session_addons`
--
ALTER TABLE `session_addons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1565;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addons`
--
ALTER TABLE `addons`
  ADD CONSTRAINT `addons_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cancel_requests`
--
ALTER TABLE `cancel_requests`
  ADD CONSTRAINT `cancel_requests_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `invoices_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `packages`
--
ALTER TABLE `packages`
  ADD CONSTRAINT `packages_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
