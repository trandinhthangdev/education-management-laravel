-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2019 at 03:27 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `management_education_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(10) UNSIGNED NOT NULL,
  `module_id` int(10) UNSIGNED NOT NULL,
  `class_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_id` int(10) UNSIGNED NOT NULL,
  `teacher_module_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `module_id`, `class_code`, `teacher_id`, `teacher_module_id`, `created_at`, `updated_at`) VALUES
(9, 5, 'C4801', 1, 11, '2019-09-16 02:15:03', '2019-09-16 02:15:03'),
(10, 5, 'C2026', 2, 12, '2019-09-16 02:15:09', '2019-09-16 02:15:09'),
(12, 6, 'C6132', 1, 8, '2019-09-16 02:15:19', '2019-09-16 02:15:19'),
(14, 5, 'C7063', 3, 16, '2019-09-16 02:15:28', '2019-09-16 02:15:28'),
(15, 7, 'C5426', 1, 9, '2019-09-16 02:15:36', '2019-09-16 02:15:36'),
(17, 7, 'C9217', 2, 14, '2019-09-16 02:16:01', '2019-09-16 02:16:01'),
(19, 7, 'C7585', 3, 18, '2019-09-16 02:16:21', '2019-09-16 02:16:21'),
(20, 8, 'C2750', 3, 19, '2019-09-16 02:16:32', '2019-09-16 02:16:32'),
(21, 8, 'C0434', 2, 15, '2019-09-16 02:16:38', '2019-09-16 02:16:38'),
(22, 8, 'C5755', 1, 10, '2019-09-16 02:36:37', '2019-09-16 02:36:37'),
(24, 6, 'C2852', 2, 13, '2019-09-16 02:37:11', '2019-09-16 02:37:11'),
(26, 6, 'C1597', 3, 17, '2019-09-16 02:38:06', '2019-09-16 02:38:06');

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
(3, '2019_09_12_173910_create_students_table', 1),
(4, '2019_09_13_021750_create_teachers_table', 1),
(5, '2019_09_14_071440_create_modules_table', 1),
(6, '2019_09_14_071501_create_classes_table', 1),
(7, '2019_09_14_155031_create_teacher_modules_table', 1),
(8, '2019_09_15_032710_create_student_modules_table', 1),
(9, '2019_09_15_032833_create_student_classes_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `module_code`, `created_at`, `updated_at`) VALUES
(5, 'Module 1', 'M0758', '2019-09-16 01:53:31', '2019-09-16 01:53:31'),
(6, 'Module 2', 'M4136', '2019-09-16 01:53:41', '2019-09-16 01:53:41'),
(7, 'Module 3', 'M0709', '2019-09-16 01:53:51', '2019-09-16 01:53:51'),
(8, 'Module 4', 'M2716', '2019-09-16 01:54:00', '2019-09-16 01:54:11');

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
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `student_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sex` tinyint(1) DEFAULT NULL,
  `district` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'student-default.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `name`, `birthday`, `student_code`, `sex`, `district`, `province`, `country`, `image`, `created_at`, `updated_at`) VALUES
(1, 2, 'Student 1', '1999-02-11', 'S9317', 1, 'District 1', 'Province 1', 'Country 1', 'S9317.png', '2019-09-15 04:45:15', '2019-09-15 05:00:24'),
(2, 3, 'Student 2', '1999-08-02', 'S0652', 1, 'District 2', 'Province 2', 'Country 2', 'S0652.jpg', '2019-09-15 04:50:16', '2019-09-15 05:02:55'),
(3, 4, 'Student 3', '1999-02-03', 'S9768', 1, 'District 3', 'Province 3', 'Country 3', 'S9768.jpg', '2019-09-15 05:03:47', '2019-09-15 05:05:16'),
(4, 5, 'Student 4', NULL, 'S8655', 0, 'District 4', 'Province 4', 'Country 4', 'S8655.png', '2019-09-15 05:06:52', '2019-09-15 05:07:24'),
(5, 6, 'Student 5', NULL, 'S2926', 1, 'District 5', 'Province 5', 'Country 5', 'S2926.png', '2019-09-15 07:27:06', '2019-09-15 08:13:46'),
(6, 7, 'Student 6', '2019-08-29', 'S9337', 0, 'District 6', 'Province 6', 'Country 6', 'S9337.jpg', '2019-09-15 07:27:34', '2019-09-15 08:45:28'),
(7, 8, 'Student 7', '2019-08-29', 'S0937', 1, 'District 7', 'Province 7', 'Country 7', 'S0937.jpg', '2019-09-15 09:51:55', '2019-09-15 17:35:30'),
(8, 9, 'Student 8', '2019-09-13', 'S8375', 1, 'District 8', 'Province 8', 'Country 8', 'S8375.png', '2019-09-15 09:52:20', '2019-09-15 17:37:30'),
(9, 10, 'Student 9', '2019-08-29', 'S1942', 0, 'District 9', 'Province 9', 'Country 9', 'S1942.png', '2019-09-15 09:53:08', '2019-09-15 17:39:48'),
(10, 11, 'Student 10', '2019-09-06', 'S7799', 1, 'District 10', 'Province 10', 'Country 10', 'S7799.jpg', '2019-09-15 09:53:31', '2019-09-15 17:41:39'),
(11, 12, 'Student 11', '1999-02-12', 'S0051', 1, 'District 11', 'Province 11', 'Country 11', 'S0051.jpg', '2019-09-15 09:54:16', '2019-09-15 19:34:25'),
(12, 13, 'Student 12', '2016-03-11', 'S1038', 0, 'District 12', 'Province 12', 'Country 12', 'S1038.jpg', '2019-09-15 09:54:37', '2019-09-15 19:37:33'),
(13, 14, 'Student 13', '2014-02-06', 'S7211', 1, 'District 13', 'Province 13', 'Country 13', 'S7211.jpg', '2019-09-15 09:55:07', '2019-09-15 19:41:28'),
(14, 15, 'Student 14', '1998-03-06', 'S0191', 0, 'District 14', 'Province 14', 'Country 14', 'S0191.jpg', '2019-09-15 09:55:31', '2019-09-15 19:44:16'),
(15, 16, 'Student 15', '2003-02-06', 'S8400', 1, 'District 15', 'Province 15', 'Country 15', 'S8400.jpg', '2019-09-15 09:55:49', '2019-09-15 19:47:26'),
(16, 17, 'Student 16', '2001-03-08', 'S5558', 0, 'District 16', 'Province 16', 'Country 16', 'S5558.jpg', '2019-09-15 09:56:36', '2019-09-16 00:19:49'),
(17, 18, 'Student 17', '1999-06-09', 'S5281', 1, 'District 17', 'Province 17', 'Country 17', 'S5281.jpg', '2019-09-15 09:57:01', '2019-09-16 00:23:06'),
(18, 19, 'Student 18', '2003-07-17', 'S6313', 1, 'District 18', 'Province 18', 'Country 18', 'S6313.jpg', '2019-09-15 09:57:42', '2019-09-16 00:25:04'),
(19, 20, 'Student 19', '1997-07-17', 'S6487', 0, 'District 19', 'Province 19', 'Country 19', 'S6487.png', '2019-09-15 09:58:04', '2019-09-16 00:29:52'),
(20, 21, 'Student 20', '2003-04-12', 'S5068', 0, 'District 20', 'Province 20', 'Country 20', 'S5068.png', '2019-09-15 09:58:23', '2019-09-16 00:31:44'),
(21, 22, 'Student 21', '2019-09-06', 'S6548', 0, 'District 21', 'Province 21', 'Country 21', 'student-default.png', '2019-09-15 09:58:52', '2019-09-16 00:34:05'),
(22, 23, 'Student 22', '2014-06-04', 'S5469', 1, 'District 22', 'Province 22', 'Country 22', 'student-default.png', '2019-09-15 09:59:26', '2019-09-16 00:35:25'),
(23, 24, 'Student 23', '2019-09-20', 'S5643', 1, 'District 23', 'Province 23', 'Country 23', 'student-default.png', '2019-09-15 09:59:54', '2019-09-16 04:51:32'),
(24, 25, 'Student 24', '2019-08-31', 'S9050', 0, 'District 24', 'Province 24', 'Country 24', 'student-default.png', '2019-09-15 10:00:15', '2019-09-16 00:39:03'),
(25, 26, 'Student 25', '2019-09-05', 'S3185', 1, 'District 25', 'Province 25', 'Country 25', 'S3185.jpg', '2019-09-15 10:00:35', '2019-09-16 01:27:45'),
(26, 27, 'Student 26', '2019-09-05', 'S0747', 1, 'District 26', 'Province 26', 'Country 26', 'S0747.png', '2019-09-15 10:01:33', '2019-09-16 04:47:16'),
(27, 28, 'Student 27', '2019-08-30', 'S3576', 0, 'District 27', 'Province 27', 'Country 27', 'student-default.png', '2019-09-15 10:01:58', '2019-09-16 04:45:12'),
(28, 29, 'Student 28', '2019-08-30', 'S8883', 0, 'District 28', 'Province 28', 'Country 28', 'S8883.jpeg', '2019-09-15 10:02:25', '2019-09-16 04:43:35'),
(29, 30, 'Student 29', '2019-09-05', 'S6709', 0, 'District 29', 'Province 29', 'Country 29', 'S6709.jpg', '2019-09-15 10:02:59', '2019-09-16 03:51:01'),
(30, 31, 'Student 30', '2019-09-06', 'S1320', 1, 'District 30', 'Province 30', 'Country 30', 'S1320.jpeg', '2019-09-15 10:03:17', '2019-09-16 03:49:14');

-- --------------------------------------------------------

--
-- Table structure for table `student_classes`
--

CREATE TABLE `student_classes` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_module_id` int(11) UNSIGNED NOT NULL,
  `class_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_classes`
--

INSERT INTO `student_classes` (`id`, `student_module_id`, `class_id`, `student_id`, `created_at`, `updated_at`) VALUES
(93, 98, 20, 1, '2019-09-16 02:18:04', '2019-09-16 02:18:04'),
(94, 99, 15, 1, '2019-09-16 02:18:10', '2019-09-16 02:18:10'),
(95, 100, 12, 1, '2019-09-16 02:18:13', '2019-09-16 02:18:13'),
(96, 101, 9, 1, '2019-09-16 02:18:16', '2019-09-16 02:18:16'),
(102, 103, 15, 2, '2019-09-16 02:33:21', '2019-09-16 02:33:21'),
(103, 105, 9, 2, '2019-09-16 02:33:24', '2019-09-16 02:33:24'),
(104, 131, 12, 2, '2019-09-16 02:33:26', '2019-09-16 02:33:26'),
(105, 132, 20, 2, '2019-09-16 02:33:29', '2019-09-16 02:33:29'),
(106, 133, 21, 3, '2019-09-16 02:34:22', '2019-09-16 02:34:22'),
(107, 134, 12, 3, '2019-09-16 02:34:27', '2019-09-16 02:34:27'),
(108, 136, 10, 3, '2019-09-16 02:34:34', '2019-09-16 02:34:34'),
(109, 135, 17, 3, '2019-09-16 02:34:38', '2019-09-16 02:34:38'),
(110, 137, 20, 6, '2019-09-16 02:39:05', '2019-09-16 02:39:05'),
(111, 138, 15, 6, '2019-09-16 02:39:10', '2019-09-16 02:39:10'),
(112, 139, 10, 6, '2019-09-16 02:39:15', '2019-09-16 02:39:15'),
(113, 140, 24, 6, '2019-09-16 02:39:19', '2019-09-16 02:39:19'),
(115, 143, 12, 5, '2019-09-16 02:40:13', '2019-09-16 02:40:13'),
(116, 144, 15, 5, '2019-09-16 02:40:16', '2019-09-16 02:40:16'),
(117, 145, 9, 5, '2019-09-16 02:40:18', '2019-09-16 02:40:18'),
(118, 146, 20, 5, '2019-09-16 02:40:21', '2019-09-16 02:40:21'),
(119, 147, 20, 7, '2019-09-16 02:40:48', '2019-09-16 02:40:48'),
(120, 148, 24, 7, '2019-09-16 02:40:52', '2019-09-16 02:40:52'),
(121, 150, 17, 7, '2019-09-16 02:40:58', '2019-09-16 02:40:58'),
(122, 149, 10, 7, '2019-09-16 02:41:03', '2019-09-16 02:41:03'),
(123, 151, 22, 8, '2019-09-16 02:41:35', '2019-09-16 02:41:35'),
(124, 152, 24, 8, '2019-09-16 02:41:40', '2019-09-16 02:41:40'),
(125, 153, 10, 8, '2019-09-16 02:41:44', '2019-09-16 02:41:44'),
(126, 154, 17, 8, '2019-09-16 02:41:48', '2019-09-16 02:41:48'),
(127, 155, 20, 10, '2019-09-16 03:27:13', '2019-09-16 03:27:13'),
(128, 156, 15, 10, '2019-09-16 03:27:24', '2019-09-16 03:27:24'),
(129, 157, 24, 10, '2019-09-16 03:27:30', '2019-09-16 03:27:30'),
(131, 161, 14, 10, '2019-09-16 03:27:56', '2019-09-16 03:27:56'),
(140, 183, 15, 11, '2019-09-16 03:44:43', '2019-09-16 03:44:43'),
(141, 184, 12, 11, '2019-09-16 03:44:48', '2019-09-16 03:44:48'),
(142, 185, 9, 11, '2019-09-16 03:44:51', '2019-09-16 03:44:51'),
(143, 186, 20, 11, '2019-09-16 03:44:55', '2019-09-16 03:44:55'),
(144, 187, 20, 12, '2019-09-16 03:45:53', '2019-09-16 03:45:53'),
(145, 188, 24, 12, '2019-09-16 03:45:57', '2019-09-16 03:45:57'),
(146, 190, 19, 12, '2019-09-16 03:46:01', '2019-09-16 03:46:01'),
(147, 191, 10, 12, '2019-09-16 03:46:06', '2019-09-16 03:46:06'),
(148, 192, 20, 13, '2019-09-16 03:46:39', '2019-09-16 03:46:39'),
(149, 193, 17, 13, '2019-09-16 03:46:44', '2019-09-16 03:46:44'),
(150, 194, 10, 13, '2019-09-16 03:46:48', '2019-09-16 03:46:48'),
(151, 195, 24, 13, '2019-09-16 03:46:52', '2019-09-16 03:46:52'),
(152, 196, 21, 14, '2019-09-16 03:47:26', '2019-09-16 03:47:26'),
(153, 197, 19, 14, '2019-09-16 03:47:30', '2019-09-16 03:47:30'),
(154, 198, 24, 14, '2019-09-16 03:47:34', '2019-09-16 03:47:34'),
(155, 199, 10, 14, '2019-09-16 03:47:39', '2019-09-16 03:47:39'),
(156, 200, 22, 30, '2019-09-16 03:49:33', '2019-09-16 03:49:33'),
(157, 201, 17, 30, '2019-09-16 03:49:37', '2019-09-16 03:49:37'),
(158, 202, 24, 30, '2019-09-16 03:49:43', '2019-09-16 03:49:43'),
(159, 203, 14, 30, '2019-09-16 03:49:48', '2019-09-16 03:49:48'),
(160, 204, 21, 29, '2019-09-16 03:51:43', '2019-09-16 03:51:43'),
(161, 207, 9, 29, '2019-09-16 03:51:47', '2019-09-16 03:51:47'),
(162, 205, 19, 29, '2019-09-16 03:51:52', '2019-09-16 03:51:52'),
(163, 206, 24, 29, '2019-09-16 03:52:04', '2019-09-16 03:52:04'),
(164, 209, 19, 28, '2019-09-16 04:43:59', '2019-09-16 04:43:59'),
(165, 210, 12, 28, '2019-09-16 04:44:04', '2019-09-16 04:44:04'),
(166, 208, 21, 28, '2019-09-16 04:44:09', '2019-09-16 04:44:09'),
(167, 211, 14, 28, '2019-09-16 04:44:14', '2019-09-16 04:44:14'),
(168, 212, 20, 27, '2019-09-16 04:45:29', '2019-09-16 04:45:29'),
(169, 213, 19, 27, '2019-09-16 04:45:36', '2019-09-16 04:45:36'),
(170, 214, 24, 27, '2019-09-16 04:45:40', '2019-09-16 04:45:40'),
(171, 215, 14, 27, '2019-09-16 04:45:44', '2019-09-16 04:45:44'),
(172, 216, 20, 26, '2019-09-16 04:47:32', '2019-09-16 04:47:32'),
(173, 217, 24, 26, '2019-09-16 04:47:39', '2019-09-16 04:47:39'),
(174, 218, 10, 26, '2019-09-16 04:47:43', '2019-09-16 04:47:43'),
(175, 219, 19, 26, '2019-09-16 04:47:49', '2019-09-16 04:47:49'),
(176, 220, 20, 25, '2019-09-16 04:49:11', '2019-09-16 04:49:11'),
(177, 221, 17, 25, '2019-09-16 04:49:14', '2019-09-16 04:49:14'),
(178, 222, 26, 25, '2019-09-16 04:49:18', '2019-09-16 04:49:18'),
(179, 223, 9, 25, '2019-09-16 04:49:21', '2019-09-16 04:49:21'),
(180, 225, 15, 24, '2019-09-16 04:50:06', '2019-09-16 04:50:06'),
(181, 224, 21, 24, '2019-09-16 04:50:13', '2019-09-16 04:50:13'),
(182, 226, 24, 24, '2019-09-16 04:50:17', '2019-09-16 04:50:17'),
(183, 227, 10, 24, '2019-09-16 04:50:21', '2019-09-16 04:50:21'),
(184, 228, 20, 23, '2019-09-16 04:50:53', '2019-09-16 04:50:53'),
(185, 229, 26, 23, '2019-09-16 04:50:59', '2019-09-16 04:50:59'),
(186, 230, 17, 23, '2019-09-16 04:51:03', '2019-09-16 04:51:03'),
(187, 231, 14, 23, '2019-09-16 04:51:07', '2019-09-16 04:51:07'),
(188, 232, 20, 22, '2019-09-16 04:52:00', '2019-09-16 04:52:00'),
(189, 233, 24, 22, '2019-09-16 04:52:06', '2019-09-16 04:52:06'),
(190, 234, 10, 22, '2019-09-16 04:52:10', '2019-09-16 04:52:10'),
(191, 235, 17, 22, '2019-09-16 04:52:13', '2019-09-16 04:52:13'),
(192, 236, 21, 21, '2019-09-16 04:52:45', '2019-09-16 04:52:45'),
(193, 237, 19, 21, '2019-09-16 04:52:49', '2019-09-16 04:52:49'),
(194, 238, 24, 21, '2019-09-16 04:52:55', '2019-09-16 04:52:55'),
(195, 239, 14, 21, '2019-09-16 04:52:58', '2019-09-16 04:52:58'),
(196, 240, 20, 20, '2019-09-16 04:53:28', '2019-09-16 04:53:28'),
(197, 241, 24, 20, '2019-09-16 04:53:33', '2019-09-16 04:53:33'),
(198, 242, 14, 20, '2019-09-16 04:53:36', '2019-09-16 04:53:36'),
(199, 243, 17, 20, '2019-09-16 04:53:41', '2019-09-16 04:53:41'),
(200, 244, 20, 19, '2019-09-16 04:54:31', '2019-09-16 04:54:31'),
(201, 246, 24, 19, '2019-09-16 04:54:35', '2019-09-16 04:54:35'),
(202, 247, 10, 19, '2019-09-16 04:54:39', '2019-09-16 04:54:39'),
(203, 249, 20, 18, '2019-09-16 04:55:16', '2019-09-16 04:55:16'),
(204, 250, 19, 18, '2019-09-16 04:55:20', '2019-09-16 04:55:20'),
(205, 251, 24, 18, '2019-09-16 04:55:24', '2019-09-16 04:55:24'),
(206, 252, 10, 18, '2019-09-16 04:55:30', '2019-09-16 04:55:30'),
(207, 253, 20, 17, '2019-09-16 04:56:02', '2019-09-16 04:56:02'),
(208, 255, 17, 17, '2019-09-16 04:56:06', '2019-09-16 04:56:06'),
(209, 256, 24, 17, '2019-09-16 04:56:10', '2019-09-16 04:56:10'),
(210, 257, 10, 17, '2019-09-16 04:56:15', '2019-09-16 04:56:15'),
(211, 258, 20, 16, '2019-09-16 04:56:54', '2019-09-16 04:56:54'),
(212, 260, 12, 16, '2019-09-16 04:56:59', '2019-09-16 04:56:59'),
(213, 259, 17, 16, '2019-09-16 04:57:05', '2019-09-16 04:57:05'),
(214, 261, 10, 16, '2019-09-16 04:57:10', '2019-09-16 04:57:10'),
(215, 262, 20, 15, '2019-09-16 04:57:40', '2019-09-16 04:57:40'),
(216, 263, 17, 15, '2019-09-16 04:57:46', '2019-09-16 04:57:46'),
(217, 264, 24, 15, '2019-09-16 04:57:50', '2019-09-16 04:57:50'),
(218, 265, 9, 15, '2019-09-16 04:57:55', '2019-09-16 04:57:55');

-- --------------------------------------------------------

--
-- Table structure for table `student_modules`
--

CREATE TABLE `student_modules` (
  `id` int(10) UNSIGNED NOT NULL,
  `module_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_modules`
--

INSERT INTO `student_modules` (`id`, `module_id`, `student_id`, `created_at`, `updated_at`) VALUES
(98, 8, 1, '2019-09-16 02:17:52', '2019-09-16 02:17:52'),
(99, 7, 1, '2019-09-16 02:17:53', '2019-09-16 02:17:53'),
(100, 6, 1, '2019-09-16 02:17:56', '2019-09-16 02:17:56'),
(101, 5, 1, '2019-09-16 02:17:59', '2019-09-16 02:17:59'),
(103, 7, 2, '2019-09-16 02:18:44', '2019-09-16 02:18:44'),
(105, 5, 2, '2019-09-16 02:18:47', '2019-09-16 02:18:47'),
(131, 6, 2, '2019-09-16 02:32:59', '2019-09-16 02:32:59'),
(132, 8, 2, '2019-09-16 02:33:17', '2019-09-16 02:33:17'),
(133, 8, 3, '2019-09-16 02:34:06', '2019-09-16 02:34:06'),
(134, 6, 3, '2019-09-16 02:34:08', '2019-09-16 02:34:08'),
(135, 7, 3, '2019-09-16 02:34:11', '2019-09-16 02:34:11'),
(136, 5, 3, '2019-09-16 02:34:13', '2019-09-16 02:34:13'),
(137, 8, 6, '2019-09-16 02:38:47', '2019-09-16 02:38:47'),
(138, 7, 6, '2019-09-16 02:38:48', '2019-09-16 02:38:48'),
(139, 5, 6, '2019-09-16 02:38:51', '2019-09-16 02:38:51'),
(140, 6, 6, '2019-09-16 02:38:53', '2019-09-16 02:38:53'),
(143, 6, 5, '2019-09-16 02:39:46', '2019-09-16 02:39:46'),
(144, 7, 5, '2019-09-16 02:39:48', '2019-09-16 02:39:48'),
(145, 5, 5, '2019-09-16 02:39:50', '2019-09-16 02:39:50'),
(146, 8, 5, '2019-09-16 02:40:01', '2019-09-16 02:40:01'),
(147, 8, 7, '2019-09-16 02:40:38', '2019-09-16 02:40:38'),
(148, 6, 7, '2019-09-16 02:40:41', '2019-09-16 02:40:41'),
(149, 5, 7, '2019-09-16 02:40:42', '2019-09-16 02:40:42'),
(150, 7, 7, '2019-09-16 02:40:43', '2019-09-16 02:40:43'),
(151, 8, 8, '2019-09-16 02:41:24', '2019-09-16 02:41:24'),
(152, 6, 8, '2019-09-16 02:41:26', '2019-09-16 02:41:26'),
(153, 5, 8, '2019-09-16 02:41:27', '2019-09-16 02:41:27'),
(154, 7, 8, '2019-09-16 02:41:29', '2019-09-16 02:41:29'),
(155, 8, 10, '2019-09-16 03:25:41', '2019-09-16 03:25:41'),
(156, 7, 10, '2019-09-16 03:25:43', '2019-09-16 03:25:43'),
(157, 6, 10, '2019-09-16 03:25:44', '2019-09-16 03:25:44'),
(161, 5, 10, '2019-09-16 03:27:47', '2019-09-16 03:27:47'),
(183, 7, 11, '2019-09-16 03:43:56', '2019-09-16 03:43:56'),
(184, 6, 11, '2019-09-16 03:43:58', '2019-09-16 03:43:58'),
(185, 5, 11, '2019-09-16 03:43:59', '2019-09-16 03:43:59'),
(186, 8, 11, '2019-09-16 03:44:09', '2019-09-16 03:44:09'),
(187, 8, 12, '2019-09-16 03:45:36', '2019-09-16 03:45:36'),
(188, 6, 12, '2019-09-16 03:45:37', '2019-09-16 03:45:37'),
(190, 7, 12, '2019-09-16 03:45:40', '2019-09-16 03:45:40'),
(191, 5, 12, '2019-09-16 03:45:43', '2019-09-16 03:45:43'),
(192, 8, 13, '2019-09-16 03:46:29', '2019-09-16 03:46:29'),
(193, 7, 13, '2019-09-16 03:46:31', '2019-09-16 03:46:31'),
(194, 5, 13, '2019-09-16 03:46:33', '2019-09-16 03:46:33'),
(195, 6, 13, '2019-09-16 03:46:35', '2019-09-16 03:46:35'),
(196, 8, 14, '2019-09-16 03:47:16', '2019-09-16 03:47:16'),
(197, 7, 14, '2019-09-16 03:47:17', '2019-09-16 03:47:17'),
(198, 6, 14, '2019-09-16 03:47:18', '2019-09-16 03:47:18'),
(199, 5, 14, '2019-09-16 03:47:20', '2019-09-16 03:47:20'),
(200, 8, 30, '2019-09-16 03:49:19', '2019-09-16 03:49:19'),
(201, 7, 30, '2019-09-16 03:49:19', '2019-09-16 03:49:19'),
(202, 6, 30, '2019-09-16 03:49:20', '2019-09-16 03:49:20'),
(203, 5, 30, '2019-09-16 03:49:21', '2019-09-16 03:49:21'),
(204, 8, 29, '2019-09-16 03:51:13', '2019-09-16 03:51:13'),
(205, 7, 29, '2019-09-16 03:51:14', '2019-09-16 03:51:14'),
(206, 6, 29, '2019-09-16 03:51:15', '2019-09-16 03:51:15'),
(207, 5, 29, '2019-09-16 03:51:16', '2019-09-16 03:51:16'),
(208, 8, 28, '2019-09-16 04:43:41', '2019-09-16 04:43:41'),
(209, 7, 28, '2019-09-16 04:43:42', '2019-09-16 04:43:42'),
(210, 6, 28, '2019-09-16 04:43:43', '2019-09-16 04:43:43'),
(211, 5, 28, '2019-09-16 04:43:45', '2019-09-16 04:43:45'),
(212, 8, 27, '2019-09-16 04:45:20', '2019-09-16 04:45:20'),
(213, 7, 27, '2019-09-16 04:45:21', '2019-09-16 04:45:21'),
(214, 6, 27, '2019-09-16 04:45:22', '2019-09-16 04:45:22'),
(215, 5, 27, '2019-09-16 04:45:24', '2019-09-16 04:45:24'),
(216, 8, 26, '2019-09-16 04:47:21', '2019-09-16 04:47:21'),
(217, 6, 26, '2019-09-16 04:47:23', '2019-09-16 04:47:23'),
(218, 5, 26, '2019-09-16 04:47:25', '2019-09-16 04:47:25'),
(219, 7, 26, '2019-09-16 04:47:27', '2019-09-16 04:47:27'),
(220, 8, 25, '2019-09-16 04:49:01', '2019-09-16 04:49:01'),
(221, 7, 25, '2019-09-16 04:49:02', '2019-09-16 04:49:02'),
(222, 6, 25, '2019-09-16 04:49:03', '2019-09-16 04:49:03'),
(223, 5, 25, '2019-09-16 04:49:06', '2019-09-16 04:49:06'),
(224, 8, 24, '2019-09-16 04:49:40', '2019-09-16 04:49:40'),
(225, 7, 24, '2019-09-16 04:49:41', '2019-09-16 04:49:41'),
(226, 6, 24, '2019-09-16 04:49:42', '2019-09-16 04:49:42'),
(227, 5, 24, '2019-09-16 04:49:44', '2019-09-16 04:49:44'),
(228, 8, 23, '2019-09-16 04:50:41', '2019-09-16 04:50:41'),
(229, 6, 23, '2019-09-16 04:50:43', '2019-09-16 04:50:43'),
(230, 7, 23, '2019-09-16 04:50:45', '2019-09-16 04:50:45'),
(231, 5, 23, '2019-09-16 04:50:47', '2019-09-16 04:50:47'),
(232, 8, 22, '2019-09-16 04:51:52', '2019-09-16 04:51:52'),
(233, 6, 22, '2019-09-16 04:51:54', '2019-09-16 04:51:54'),
(234, 5, 22, '2019-09-16 04:51:55', '2019-09-16 04:51:55'),
(235, 7, 22, '2019-09-16 04:51:57', '2019-09-16 04:51:57'),
(236, 8, 21, '2019-09-16 04:52:32', '2019-09-16 04:52:32'),
(237, 7, 21, '2019-09-16 04:52:34', '2019-09-16 04:52:34'),
(238, 6, 21, '2019-09-16 04:52:36', '2019-09-16 04:52:36'),
(239, 5, 21, '2019-09-16 04:52:37', '2019-09-16 04:52:37'),
(240, 8, 20, '2019-09-16 04:53:18', '2019-09-16 04:53:18'),
(241, 6, 20, '2019-09-16 04:53:20', '2019-09-16 04:53:20'),
(242, 5, 20, '2019-09-16 04:53:22', '2019-09-16 04:53:22'),
(243, 7, 20, '2019-09-16 04:53:23', '2019-09-16 04:53:23'),
(244, 8, 19, '2019-09-16 04:54:03', '2019-09-16 04:54:03'),
(246, 6, 19, '2019-09-16 04:54:06', '2019-09-16 04:54:06'),
(247, 5, 19, '2019-09-16 04:54:08', '2019-09-16 04:54:08'),
(248, 7, 19, '2019-09-16 04:54:09', '2019-09-16 04:54:09'),
(249, 8, 18, '2019-09-16 04:55:04', '2019-09-16 04:55:04'),
(250, 7, 18, '2019-09-16 04:55:06', '2019-09-16 04:55:06'),
(251, 6, 18, '2019-09-16 04:55:08', '2019-09-16 04:55:08'),
(252, 5, 18, '2019-09-16 04:55:10', '2019-09-16 04:55:10'),
(253, 8, 17, '2019-09-16 04:55:49', '2019-09-16 04:55:49'),
(255, 7, 17, '2019-09-16 04:55:54', '2019-09-16 04:55:54'),
(256, 6, 17, '2019-09-16 04:55:56', '2019-09-16 04:55:56'),
(257, 5, 17, '2019-09-16 04:55:57', '2019-09-16 04:55:57'),
(258, 8, 16, '2019-09-16 04:56:34', '2019-09-16 04:56:34'),
(259, 7, 16, '2019-09-16 04:56:34', '2019-09-16 04:56:34'),
(260, 6, 16, '2019-09-16 04:56:35', '2019-09-16 04:56:35'),
(261, 5, 16, '2019-09-16 04:56:36', '2019-09-16 04:56:36'),
(262, 8, 15, '2019-09-16 04:57:31', '2019-09-16 04:57:31'),
(263, 7, 15, '2019-09-16 04:57:32', '2019-09-16 04:57:32'),
(264, 6, 15, '2019-09-16 04:57:33', '2019-09-16 04:57:33'),
(265, 5, 15, '2019-09-16 04:57:34', '2019-09-16 04:57:34');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `teacher_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sex` tinyint(1) DEFAULT NULL,
  `district` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'teacher-default.png',
  `cv` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `user_id`, `name`, `birthday`, `teacher_code`, `sex`, `district`, `province`, `country`, `image`, `cv`, `status`, `created_at`, `updated_at`) VALUES
(1, 32, 'Tony Tran 99 Cod', '2019-09-15', 'T0523', 1, 'District 1', 'Province 1', 'Country 1', 'T0523.jpg', 'T0523.txt', 1, '2019-09-15 10:07:17', '2019-09-16 01:40:39'),
(2, 33, 'Teacher 1', NULL, 'T8534', 1, 'District 1', 'Province 1', 'Country 1', 'T8534.jpg', 'T8534.txt', 1, '2019-09-15 10:17:50', '2019-09-16 02:12:10'),
(3, 34, 'Teacher 2', '2019-08-31', 'T8028', 1, 'District 2', 'Province 2', 'Country 2', 'T8028.jpg', 'T8028.txt', 1, '2019-09-15 10:23:21', '2019-09-16 02:13:24');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_modules`
--

CREATE TABLE `teacher_modules` (
  `id` int(10) UNSIGNED NOT NULL,
  `teacher_id` int(10) UNSIGNED NOT NULL,
  `module_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teacher_modules`
--

INSERT INTO `teacher_modules` (`id`, `teacher_id`, `module_id`, `created_at`, `updated_at`) VALUES
(8, 1, 6, '2019-09-16 01:55:48', '2019-09-16 01:55:48'),
(9, 1, 7, '2019-09-16 01:55:51', '2019-09-16 01:55:51'),
(10, 1, 8, '2019-09-16 01:55:54', '2019-09-16 01:55:54'),
(11, 1, 5, '2019-09-16 02:06:07', '2019-09-16 02:06:07'),
(12, 2, 5, '2019-09-16 02:12:18', '2019-09-16 02:12:18'),
(13, 2, 6, '2019-09-16 02:12:21', '2019-09-16 02:12:21'),
(14, 2, 7, '2019-09-16 02:12:24', '2019-09-16 02:12:24'),
(15, 2, 8, '2019-09-16 02:12:27', '2019-09-16 02:12:27'),
(16, 3, 5, '2019-09-16 02:13:42', '2019-09-16 02:13:42'),
(17, 3, 6, '2019-09-16 02:13:45', '2019-09-16 02:13:45'),
(18, 3, 7, '2019-09-16 02:13:48', '2019-09-16 02:13:48'),
(19, 3, 8, '2019-09-16 02:13:50', '2019-09-16 02:13:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` int(11) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'admintonytran@gmail.com', NULL, '$2y$10$5fRO1ny09bxsVHf1kZy6zO8Cn4AxQZDlo6dwnHO201i5nG5nLaerG', 'i9aH6Fhainm11BV0Qv9pEyOIiKDJSOoqUDqn81PaPuOmuL8pGlYEgN5BwX3g', '2019-09-15 04:32:33', '2019-09-15 04:32:33'),
(2, 3, 'student1@gmail.com', NULL, '$2y$10$/krrvQSPS6ThtEaJ59vm0OGx0JOliNUk9RVik8L2fimDpi9Be80h.', 'dvGyWdwY2UIeia6twXexSh3h5T7hEcmxvCA5d7ynAKPY2fxBv6Z4qqSZ9LRB', '2019-09-15 04:45:15', '2019-09-15 04:45:15'),
(3, 3, 'student2@gmail.com', NULL, '$2y$10$G3jQjFSQItw2eJ/IIrxmrumpZ1UdMAxcqmQbAETScBel2TOiwOgoy', 'I53fhnV4epbEwg6yMntuuClcEjy9CBYsAWwESzV1Hr1m0g0PqjiiHSXlYTQd', '2019-09-15 04:50:15', '2019-09-15 04:50:15'),
(4, 3, 'student3@gmail.com', NULL, '$2y$10$YssZQGs.5cOzKsC6Ty.PpOkNEm9PC7hiLzUm57TgLsKuhg6eeSS/6', 'YtagjObv63baDZWNUgFN4Z1HapUQPz8uuatG7K1mpH8zOrcJ0TUyKrsZIkxB', '2019-09-15 05:03:47', '2019-09-15 05:03:47'),
(5, 3, 'student4@gmail.com', NULL, '$2y$10$td0Zqj9Zeh3Cf5Wkgehdd.bVN5bS1jaJ09aOQn/6wujN6q1k.b./.', '7tt1ii7WfDuyQMLKwCYhONqjNZe7RDaVwLUOSjSWbe8fAy1IlSQ8lrzwZzAK', '2019-09-15 05:06:52', '2019-09-15 05:06:52'),
(6, 3, 'student5@gmail.com', NULL, '$2y$10$E4NNbZYIr1FhwH8/cIkNQ.mA20WLRIB/q6p.88fEfV9nRRQlrlasW', 'NSK9M2lhavdrwfviF4rTbwtYd2hry3Nf7gz4xBZhrNQz3BvpoEtorA3sjqor', '2019-09-15 07:27:06', '2019-09-15 07:27:06'),
(7, 3, 'student6@gmail.com', NULL, '$2y$10$JLQNn0djCgyWluv8ZZSXNepQHyICMeRp8a/xSLEVQobn0ciNQ0iVy', '9S7ktvu5HV0lEEO20SzMmFROjvSXj5Gm1zFzi1vJJ09hDaK2FbwKpiug4vtX', '2019-09-15 07:27:34', '2019-09-15 07:27:34'),
(8, 3, 'student7@gmail.com', NULL, '$2y$10$J76Ji0wKDDp27wFbnQ6G1uSMJdc4bcBYIgAw3u5EHDVADl.x95bZy', 'I7DebXHBu88LAy3nHrgEgPudsATXgwDjZ30cxvlMJEh3eGeZDjZey2EJOWUd', '2019-09-15 09:51:55', '2019-09-15 09:51:55'),
(9, 3, 'student8@gmail.com', NULL, '$2y$10$JI4YznEnHdh5l3D653AaceaSLK4.SiLstvsLtOStCalFBtgZ5vaBW', 'l2thKMHKVu8Z3MgMsTZewSBUYItbsNmHySIhIBmEu7m0cpJRGXzprklYHPrc', '2019-09-15 09:52:20', '2019-09-15 09:52:20'),
(10, 3, 'student9@gmail.com', NULL, '$2y$10$VsT1giDc7lvklBrHhBNzOuznSBJVd/iZGzI5WOnx6XWYYO39ksQ3S', 'zX4uWX2vXuvkUwtkcT4ommk5NdSKV4TQoe76YncHc7YTOIZk8aT6eWShwtYa', '2019-09-15 09:53:08', '2019-09-15 09:53:08'),
(11, 3, 'student10@gmail.com', NULL, '$2y$10$nrDGssl/7w2tuNNJSSJiq.qYEGlTr09ncfFSu3Qu2Om.Ln6XTiFUa', '8cOJyUokmv8Kb4xmX6YUSiibEQA419DmHHaw7KyxQhpYAkiV7mSBndWAXGkm', '2019-09-15 09:53:31', '2019-09-15 09:53:31'),
(12, 3, 'student11@gmail.com', NULL, '$2y$10$MD07k30YrPRvjkHo.87speTalsGqDgcVVyS98eF84QhglgK2j/ube', 'I0Lr1KYUyBeiyKhrak4FOK9elRlSvYL93Je3CFVS6PFYRkL61ydGWdO0SWdd', '2019-09-15 09:54:16', '2019-09-15 09:54:16'),
(13, 3, 'student12@gmail.com', NULL, '$2y$10$IL1Hn.NUoOs/o1fBqxEszOBRfmeZjlozkvBUCR9A1jINOBK3BfeA6', 'DCouZDWk1isHICcra9ESqFhu1g8nQYz1SON5cBB52tZByRjZq2B4cMFtNBFn', '2019-09-15 09:54:37', '2019-09-15 09:54:37'),
(14, 3, 'student13@gmail.com', NULL, '$2y$10$.ZHx.OQdlnydFfZ6xU6qcOaXKjiDznwb8e8oevNoEKqGLNkKoX1U2', 'FgUPu5SJSDXJqqWCJfP7vwJs0IUCdojREtPk6usiHhQcGCnIrIr6NYiaM7v1', '2019-09-15 09:55:07', '2019-09-15 09:55:07'),
(15, 3, 'student14@gmail.com', NULL, '$2y$10$pzq8alXxuTjOEZ79q7ES1uQILg6o5HL2k7BQuDJZBB6jBJH5aEgxe', 'zYOcC5a9y5BapPYDO6vDtZVrmByAzG04lN3QSUpLWFK4gxEhGWlbo5gKV3N0', '2019-09-15 09:55:31', '2019-09-15 09:55:31'),
(16, 3, 'student15@gmail.com', NULL, '$2y$10$PALPLxszRcUHZv3JCaUSjOidBCLz4IcbqBM3Lfxib3FSBdB5dDFz.', 'JgDolvgGXWHt6mIfvcL4re1pOasa1r4etv8YwBJdo0Z5VAjKBFTtxcmRqq5K', '2019-09-15 09:55:49', '2019-09-15 09:55:49'),
(17, 3, 'student16@gmail.com', NULL, '$2y$10$y9a/pd.mjRAC1KEDkyPW9OG9Iq1vcdmSj.gxU4DNIYye1YAt9rs9i', 'jP5RMUrLgFPrbqdfHnx5ZPPuU4jNJoGxgM5xl81EIm4SlVUpxO7elt7VG2Cz', '2019-09-15 09:56:36', '2019-09-15 09:56:36'),
(18, 3, 'student17@gmail.com', NULL, '$2y$10$sPXJ2nesyeM5jWc9JFOaIOaJpcq3VIdMxemAxsuEmwK9SYfte6xme', 'l5fjCksbHgaYIajgBRHw8jPTeUMOYtyFPZSsBLwEPAFX7LqHyzHZrtWCaNbR', '2019-09-15 09:57:01', '2019-09-15 09:57:01'),
(19, 3, 'student18@gmail.com', NULL, '$2y$10$8XmAfl4Vs2exphCBJcB3GuVKWC4RSx9xgKi6fepPeb5NoUIylsQ5S', '5G7vD6nB86hPWepb9hCYJXXZbekHz8iUPuhmbkz1rHePfjGayo7NawBoPIK9', '2019-09-15 09:57:42', '2019-09-15 09:57:42'),
(20, 3, 'student19@gmail.com', NULL, '$2y$10$q/nn3CuE0Dw5uNfYFPM2Ie5wmnrl9p77mhjWdBmeEkbZDhP5JPKr6', 'mclPWzt81eHuhlw3sgCVdLyzsVARwBZYTqBbd8DdYMCSYLHzBwcipImoau4C', '2019-09-15 09:58:04', '2019-09-15 09:58:04'),
(21, 3, 'student20@gmail.com', NULL, '$2y$10$H9qNs3AU/MZ.CJ67TX.l5OMnQKtAO9nZjEjJDqLr0WHKcbnFlmK0C', 'CgQT8Gt17vu3NT3UVkLVO57XAQhIKjgvEttAXpSTb1NSjRDVJb38nEafhMN4', '2019-09-15 09:58:23', '2019-09-15 09:58:23'),
(22, 3, 'student21@gmail.com', NULL, '$2y$10$ynoIvpOAj7memWe0A5IESe1giKodCMHg8O06XRjJKeUUi99wGkjQS', 'vIO7esw29JC5IqM1lbynMoIaOMDYUGLz36Jtr2P102axVGUP5KyAL4GUAwY7', '2019-09-15 09:58:51', '2019-09-15 09:58:51'),
(23, 3, 'student22@gmail.com', NULL, '$2y$10$LygmkYAD7yPqIbyBysxSkOBkSQZj.K5rjsJxyT1eYoJEQIE/y3dWC', 'qqZ5SzCno51q4psVejH9yKQKjLGe4amlKV4MoiHOWOLt4dvIKGtqnknQRNnq', '2019-09-15 09:59:26', '2019-09-15 09:59:26'),
(24, 3, 'student23@gmail.com', NULL, '$2y$10$eOAjpjALUEVBPgxo4chzBepW7Fj5IMEVo8hGSiW/Op1L4N4F102Nq', 'VXdD7OZ2D14UlBx59gP47z8m7wr34O2W8CScQa9E4HtTvRzIoidTuItG9Lp9', '2019-09-15 09:59:54', '2019-09-15 09:59:54'),
(25, 3, 'student24@gmail.com', NULL, '$2y$10$APdE9dFezv0JuPvMmfJmWeJW4NsWmPQo1FZa491zCMcvFZGJ.08Tq', 'EZpiYGyxbGS6X147e4akqVh7XXgtMMjoLTH3APLjIGo5PNi3ofm4h392vkf1', '2019-09-15 10:00:15', '2019-09-15 10:00:15'),
(26, 3, 'student25@gmail.com', NULL, '$2y$10$QXvjox047SJMqfutqg0f2OttHBqorT18l5jasUwQAJQEvQWfjfkbO', '20IRDao0SUycIjT91gBYHKhC37LcE5JXoCi242SC7oKHeNcxtmaF3GvoaoTh', '2019-09-15 10:00:35', '2019-09-15 10:00:35'),
(27, 3, 'student26@gmail.com', NULL, '$2y$10$fBe6RHyzm1qMGom90458LuGThfdmWjxVtD7Nd94d4p4uglxS13Zv.', 'kLQQTOuzcC0kx0JV4QVOs0GiQYzdDPIkaaet3ZaHrnXkTfOnWbFUvyX02iQT', '2019-09-15 10:01:33', '2019-09-15 10:01:33'),
(28, 3, 'student27@gmail.com', NULL, '$2y$10$xHmgADOdm.WUYRS26icpaOmxMkE1iS5PBqjs1hLDLSI9LhLjvxekK', 'tgr6EWyCfpvCDkMfwupn02iv7gKwAQTd2FawZKmoovaRuABjUVS0XhKakjqV', '2019-09-15 10:01:58', '2019-09-15 10:01:58'),
(29, 3, 'student28@gmail.com', NULL, '$2y$10$prIRBBV6GF2XgJU099/1LOh5E7yTZm8cd7arJ9arl5.pHJdgPWgMe', 'X604vOnrvAWP9yH1kBt28mDPgAdwuuMmB2phaitWeBe1kTNHK6SAyaNBgjA2', '2019-09-15 10:02:25', '2019-09-15 10:02:25'),
(30, 3, 'student29@gmail.com', NULL, '$2y$10$cfbWRES9hGFzjcW.hVSlTOMZ4DA4AhyRN7LdeV717X.fEX3gu65li', 'se1zXKOp9dKNp07Hsclrl6WFSHEseaH2bBHqv6fOnspxcIY7ZdBjcDeS9iSy', '2019-09-15 10:02:59', '2019-09-15 10:02:59'),
(31, 3, 'student30@gmail.com', NULL, '$2y$10$rGRUrDG1typXdrn13Rv3UulMGcA7plkpMbmzxTUDp4Udv4BLIm6lG', 'o81mbkmpEeN0oUMuUT8y7QC1zgKuLlaHFwmKJYDhBzj2GadQKCpFYsz4kWLQ', '2019-09-15 10:03:17', '2019-09-15 10:03:17'),
(32, 2, 'tonytran99.cod@gmail.com', NULL, '$2y$10$ggvH68e04FXC4gf83nuo.eb/jXMYpK0b1vqHpW6i8QC8ZGrJYYHCK', '1sEY3QmHC6aDVS9F2rKUNkpHHcDG6CcG4y8z1HIgQs14Tq7FJoGndyAxSBhM', '2019-09-15 10:07:17', '2019-09-15 10:07:17'),
(33, 2, 'teacher1@gmail.com', NULL, '$2y$10$7HS/uXlRAOC4nQrfK56CCO.yMaZAq0QXzJprsjQJEmQUia1MYzKP6', 'B42OqVzBZv9D444UfZEWrtAAm29IFo7rZN6Q0kdBQzpr4IS1ionRet8jMtFt', '2019-09-15 10:17:50', '2019-09-15 10:17:50'),
(34, 2, 'teacher2@gmail.com', NULL, '$2y$10$oc5GD5VhJUVVaNa2crh0Rub2T71AeOqa.xRuK3g6R7VmxCrHqB1/m', '2NErl57ssYQFuBLLNzf0ldQoU80zgwoK3YnUHHMpVOXRjYPkYk23GaUPpqCK', '2019-09-15 10:23:21', '2019-09-15 10:23:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classes_module_id_foreign` (`module_id`),
  ADD KEY `classes_teacher_id_foreign` (`teacher_id`),
  ADD KEY `teacher_module_id` (`teacher_module_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_user_id_foreign` (`user_id`);

--
-- Indexes for table `student_classes`
--
ALTER TABLE `student_classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_classes_class_id_foreign` (`class_id`),
  ADD KEY `student_classes_student_id_foreign` (`student_id`),
  ADD KEY `student_module_id` (`student_module_id`);

--
-- Indexes for table `student_modules`
--
ALTER TABLE `student_modules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_modules_module_id_foreign` (`module_id`),
  ADD KEY `student_modules_student_id_foreign` (`student_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teachers_user_id_foreign` (`user_id`);

--
-- Indexes for table `teacher_modules`
--
ALTER TABLE `teacher_modules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_modules_teacher_id_foreign` (`teacher_id`),
  ADD KEY `teacher_modules_module_id_foreign` (`module_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `student_classes`
--
ALTER TABLE `student_classes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=219;

--
-- AUTO_INCREMENT for table `student_modules`
--
ALTER TABLE `student_modules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=266;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teacher_modules`
--
ALTER TABLE `teacher_modules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `classes_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `classes_teacher_module_id_foreign` FOREIGN KEY (`teacher_module_id`) REFERENCES `teacher_modules` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_classes`
--
ALTER TABLE `student_classes`
  ADD CONSTRAINT `student_classes_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_classes_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_classes_student_module_id_foreign` FOREIGN KEY (`student_module_id`) REFERENCES `student_modules` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_modules`
--
ALTER TABLE `student_modules`
  ADD CONSTRAINT `student_modules_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_modules_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `teacher_modules`
--
ALTER TABLE `teacher_modules`
  ADD CONSTRAINT `teacher_modules_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teacher_modules_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
