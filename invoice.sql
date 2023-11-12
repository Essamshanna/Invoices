-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 29 أكتوبر 2023 الساعة 01:18
-- إصدار الخادم: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `invoice`
--

-- --------------------------------------------------------

--
-- بنية الجدول `acc_reports`
--

CREATE TABLE `acc_reports` (
  `id` int(10) UNSIGNED NOT NULL,
  `acc_rep_aname` varchar(255) NOT NULL,
  `acc_rep_ename` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `acc_reports`
--

INSERT INTO `acc_reports` (`id`, `acc_rep_aname`, `acc_rep_ename`, `created_at`, `updated_at`) VALUES
(1, 'الميزانية العمومية', 'Balance Sheet', '2023-10-25 20:17:24', '2023-10-25 20:17:24'),
(2, 'الارباح والخسائر', 'profits and losses', '2023-10-25 20:17:55', '2023-10-25 20:17:55');

-- --------------------------------------------------------

--
-- بنية الجدول `acc_typees`
--

CREATE TABLE `acc_typees` (
  `id` int(10) UNSIGNED NOT NULL,
  `acc_type_aname` varchar(255) NOT NULL,
  `acc_type_ename` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `acc_typees`
--

INSERT INTO `acc_typees` (`id`, `acc_type_aname`, `acc_type_ename`, `created_at`, `updated_at`) VALUES
(1, 'رئيسي', 'Main', '2023-10-25 15:42:44', '2023-10-25 15:43:30'),
(2, 'فرعي', 'Sub', '2023-10-25 15:44:08', '2023-10-25 15:44:08');

-- --------------------------------------------------------

--
-- بنية الجدول `card_typees`
--

CREATE TABLE `card_typees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `card_name` varchar(255) NOT NULL,
  `card_price` double(8,2) NOT NULL,
  `description` text DEFAULT NULL,
  `Created_by` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `failed_jobs`
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
-- بنية الجدول `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_number` varchar(50) NOT NULL,
  `invoice_Date` date DEFAULT NULL,
  `Due_date` date DEFAULT NULL,
  `product` varchar(50) NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `Amount_collection` decimal(8,2) DEFAULT NULL,
  `Amount_Commission` decimal(8,2) NOT NULL,
  `Discount` decimal(8,2) NOT NULL,
  `Value_VAT` decimal(8,2) NOT NULL,
  `Rate_VAT` varchar(999) NOT NULL,
  `Total` decimal(8,2) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `Value_Status` int(11) NOT NULL,
  `note` text DEFAULT NULL,
  `Payment_Date` date DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_22_123334_create_invoices_table', 2),
(10, '2023_10_22_185925_create_status_table', 3),
(12, '2023_10_25_172552_create_acc_typees_table', 4),
(13, '2023_10_25_175603_create_nature_accounts_table', 5),
(14, '2023_10_25_191921_create_acc_reports_table', 6),
(17, '2023_10_27_154707_create_card_typees_table', 7),
(20, '2014_10_12_000000_create_users_table', 10),
(21, '2023_10_28_182424_create_tree_accounts_table', 11);

-- --------------------------------------------------------

--
-- بنية الجدول `nature_accounts`
--

CREATE TABLE `nature_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `nature_type_aname` varchar(255) NOT NULL,
  `nature_type_ename` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `nature_accounts`
--

INSERT INTO `nature_accounts` (`id`, `nature_type_aname`, `nature_type_ename`, `created_at`, `updated_at`) VALUES
(1, 'دائن', 'Credit', '2023-10-25 16:35:33', '2023-10-25 16:35:33'),
(2, 'مدين', 'debit', '2023-10-25 16:36:15', '2023-10-25 16:36:15');

-- --------------------------------------------------------

--
-- بنية الجدول `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `personal_access_tokens`
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
-- بنية الجدول `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `Created_by` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `statuses`
--

INSERT INTO `statuses` (`id`, `status_name`, `description`, `Created_by`, `created_at`, `updated_at`) VALUES
(1, 'لم يتم الدفع بعد', 'هدا الخيار يوضح ان الفاتورة غير خالصة', 'essam', '2023-10-25 14:08:14', '2023-10-25 14:08:14'),
(2, 'خالص كاش', 'هدا الخيار يوضح ان الفاتورة خالصه كاش في الصندوق', 'essam', '2023-10-25 14:10:41', '2023-10-25 14:10:41'),
(3, 'حافظة ايدع صكوك', 'هدا الخيار يوضح ان الفاتورة خالصة عن طريق ايداع صك المصرف', 'essam', '2023-10-25 14:11:56', '2023-10-25 14:11:56'),
(4, 'قسيمة إيدع نقدي', 'هدا الخيار يوضح ان الفاتورة خالصة ايداع كاش في المصرف', 'essam', '2023-10-25 14:12:35', '2023-10-25 14:12:35'),
(5, 'حوالة مصرافية عن طريق مصرافي باي', 'هدا الخيار يوضح ان الفاتورة تم تحصيلة عن طريق حولة بواسطة مصرافي باي', 'essam', '2023-10-25 14:13:50', '2023-10-25 14:13:50'),
(6, 'ايداع في حساب الماكينة', 'هدا الخيار يوضح ان الفاتورة تم تحصيلة عن طريق البطاقة المصرفية في حساب مكينة الدف بواسطة البطاقة', 'essam', '2023-10-25 14:15:27', '2023-10-25 14:15:27');

-- --------------------------------------------------------

--
-- بنية الجدول `tree_accounts`
--

CREATE TABLE `tree_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `acc_id` int(11) NOT NULL,
  `acc_parent_no` int(11) NOT NULL,
  `acc_aname` varchar(255) NOT NULL,
  `acc_ename` varchar(255) NOT NULL,
  `acc_type_id` bigint(20) UNSIGNED NOT NULL,
  `acc_nature_id` bigint(20) UNSIGNED NOT NULL,
  `acc_report_id` bigint(20) UNSIGNED NOT NULL,
  `acc_level` int(11) NOT NULL,
  `acc_debit` decimal(9,3) NOT NULL,
  `acc_credit` decimal(9,3) NOT NULL,
  `acc_balance` decimal(9,3) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'essam', 'essam@mttnet.ly', NULL, '$2y$10$MRJBnBLZzLYehBVTNimeBeFUt1SZ4.0yjTFuQqL7nb8s9OkhXuOi.', NULL, '2023-10-28 16:47:01', '2023-10-28 16:47:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acc_reports`
--
ALTER TABLE `acc_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `acc_typees`
--
ALTER TABLE `acc_typees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `card_typees`
--
ALTER TABLE `card_typees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nature_accounts`
--
ALTER TABLE `nature_accounts`
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
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tree_accounts`
--
ALTER TABLE `tree_accounts`
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
-- AUTO_INCREMENT for table `acc_reports`
--
ALTER TABLE `acc_reports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `acc_typees`
--
ALTER TABLE `acc_typees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `card_typees`
--
ALTER TABLE `card_typees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `nature_accounts`
--
ALTER TABLE `nature_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tree_accounts`
--
ALTER TABLE `tree_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
