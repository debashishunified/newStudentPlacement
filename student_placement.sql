-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2020 at 09:01 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_placement`
--

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE `colleges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`id`, `name`, `location`, `created_at`, `updated_at`) VALUES
(1, 'IEM', 'Kolkata', '2020-04-28 01:13:41', '2020-04-28 01:13:41'),
(2, 'UEM', 'Kolkata', '2020-04-28 01:13:52', '2020-04-28 01:13:52'),
(3, 'Techno India', 'Kolkata', '2020-04-28 01:14:05', '2020-04-28 01:14:05'),
(4, 'B.P Poddar', 'Kolkara', '2020-04-28 01:14:27', '2020-04-28 01:14:27');

-- --------------------------------------------------------

--
-- Table structure for table `college_placements`
--

CREATE TABLE `college_placements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `placement_date` date NOT NULL,
  `company_id` int(11) NOT NULL COMMENT 'Reference to company table id',
  `place` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `college_placements`
--

INSERT INTO `college_placements` (`id`, `placement_date`, `company_id`, `place`, `created_at`, `updated_at`) VALUES
(1, '2020-05-01', 1, 'GP park', '2020-04-28 01:21:13', '2020-04-28 01:21:13'),
(2, '2020-04-02', 2, 'DLF 1', '2020-04-28 01:21:35', '2020-04-28 01:21:35'),
(3, '2020-04-05', 3, 'Park Street', '2020-04-28 01:22:50', '2020-04-28 01:22:50'),
(4, '2020-04-10', 4, 'Sector V', '2020-04-28 01:23:03', '2020-04-28 01:23:03');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'TCS', '2020-04-28 01:12:17', '2020-04-28 01:12:17'),
(2, 'IBM', '2020-04-28 01:12:23', '2020-04-28 01:12:23'),
(3, 'Infosys', '2020-04-28 01:12:32', '2020-04-28 01:12:32'),
(4, 'Cognizant', '2020-04-28 01:12:41', '2020-04-28 01:12:41'),
(5, 'Wipro', '2020-04-28 01:12:49', '2020-04-28 01:12:49');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abbr` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `abbr`, `created_at`, `updated_at`) VALUES
(1, 'Computer Science', 'JHGJG76HGHJ', '2020-04-28 01:15:04', '2020-04-28 01:15:04'),
(2, 'Electronics', 'HGFH765HG', '2020-04-28 01:15:14', '2020-04-28 01:15:14'),
(3, 'Mechanical', 'JHGJG76HGHJ', '2020-04-28 01:15:30', '2020-04-28 01:15:30'),
(4, 'Physics', 'UYTU767RTY', '2020-04-28 01:16:02', '2020-04-28 01:16:02'),
(5, 'Chemistry', 'RTRT65TR', '2020-04-28 01:16:18', '2020-04-28 01:16:18'),
(6, 'Mathematics', 'UYT675ER', '2020-04-28 01:16:31', '2020-04-28 01:16:31');

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
(3, '2020_04_27_024825_create_students_table', 1),
(4, '2020_04_27_024847_create_colleges_table', 1),
(5, '2020_04_27_024917_create_departments_table', 1),
(6, '2020_04_27_024938_create_companies_table', 1),
(7, '2020_04_27_025006_create_college_placements_table', 1),
(8, '2020_04_27_025031_create_student_placements_table', 1);

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roll` int(11) NOT NULL,
  `department_id` int(11) NOT NULL COMMENT 'Reference to department table id',
  `college_id` int(11) NOT NULL COMMENT 'Reference to college table id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `roll`, `department_id`, `college_id`, `created_at`, `updated_at`) VALUES
(1, 'Souvik Bannerjee', 10, 1, 1, '2020-04-28 01:17:05', '2020-04-28 01:17:05'),
(2, 'Rajesh Bajaj', 12, 2, 2, '2020-04-28 01:17:23', '2020-04-28 01:17:23'),
(3, 'Rabi Chatterjee', 14, 4, 3, '2020-04-28 01:17:37', '2020-04-28 01:17:37'),
(4, 'Shaker Chatterjee', 16, 4, 4, '2020-04-28 01:18:02', '2020-04-28 01:18:02'),
(5, 'Debashish Gope', 20, 2, 3, '2020-04-28 01:18:16', '2020-04-28 01:18:16'),
(6, 'Paras Vora', 22, 3, 1, '2020-04-28 01:18:36', '2020-04-28 01:18:36'),
(7, 'Biswanath Dutta', 25, 5, 2, '2020-04-28 01:19:00', '2020-04-28 01:19:00');

-- --------------------------------------------------------

--
-- Table structure for table `student_placements`
--

CREATE TABLE `student_placements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `college_placement_id` int(11) NOT NULL COMMENT 'Reference to student placement table id',
  `student_id` int(11) NOT NULL COMMENT 'Reference to student table id',
  `is_selected` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '0->Not selected, 1->selected',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_placements`
--

INSERT INTO `student_placements` (`id`, `college_placement_id`, `student_id`, `is_selected`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '1', '2020-04-28 01:25:32', '2020-04-28 01:25:32'),
(2, 1, 2, '0', '2020-04-28 01:25:48', '2020-04-28 01:25:48'),
(3, 3, 4, '1', '2020-04-28 01:26:03', '2020-04-28 01:26:03'),
(4, 4, 5, '0', '2020-04-28 01:26:18', '2020-04-28 01:26:18'),
(5, 2, 5, '1', '2020-04-28 01:26:32', '2020-04-28 01:26:32'),
(6, 1, 6, '1', '2020-04-28 01:26:52', '2020-04-28 01:26:52'),
(7, 2, 7, '1', '2020-04-28 01:27:10', '2020-04-28 01:27:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `colleges`
--
ALTER TABLE `colleges`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `colleges_name_unique` (`name`);

--
-- Indexes for table `college_placements`
--
ALTER TABLE `college_placements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
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
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_placements`
--
ALTER TABLE `student_placements`
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
-- AUTO_INCREMENT for table `colleges`
--
ALTER TABLE `colleges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `college_placements`
--
ALTER TABLE `college_placements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student_placements`
--
ALTER TABLE `student_placements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
