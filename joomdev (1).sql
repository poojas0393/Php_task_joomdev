-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2024 at 09:29 AM
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
-- Database: `joomdev`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `avatar` varchar(191) DEFAULT 'users/default.png',
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `settings` text DEFAULT NULL,
  `active` int(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `role_id`, `name`, `email`, `avatar`, `password`, `remember_token`, `settings`, `active`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'admin@admin.com', 'users/default.png', '64e1b8d34f425d19e1ee2ea7236d3028', 'M5s06eNdz0WsHkJXY9RrCVv7XggVYQAfTvvwosfbqIVigTXXBFYwpGYUoRUO', NULL, 1, '2018-07-03 23:36:32', '2018-07-03 23:36:32'),
(2, 2, 'Anurag Nayak', 'admin@medcureindia.com', 'users/default.png', 'e6e061838856bf47e1de730719fb2609', 'kbzKG0bVrlvazeLZbr1XXx3ZzbMOygajwdqCWiadNkNDFZ0HYCqA7tyNsXte', '{\"locale\":\"en\"}', 1, '2018-09-12 04:11:42', '2018-09-12 04:11:42');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(255) NOT NULL,
  `emp_fname` varchar(255) NOT NULL,
  `emp_lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `active` int(10) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `change_password` int(1) NOT NULL,
  `last_password_change` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `emp_fname`, `emp_lname`, `email`, `created_at`, `updated_at`, `active`, `contact_number`, `password`, `change_password`, `last_password_change`, `last_login`) VALUES
(1, 'Dr. Shailesh Nisal', 'shailesh-nisal', 'Dr. Shailesh Nisal', '2018-11-22 16:09:00', '2018-11-24 04:27:07', 0, '7066132333', '', 0, NULL, NULL),
(2, 'William Osler', 'william_osler', 'William Osler', '2018-11-23 10:48:51', '0000-00-00 00:00:00', 0, '07128563210', '', 0, NULL, NULL),
(3, 'Dr. MANOJ WAGHMARE', 'dermacity-manoj', 'Dr. MANOJ WAGHMARE', '2018-11-23 02:30:09', '2018-11-23 02:32:04', 0, '7709270086', '', 0, NULL, NULL),
(4, 'Dr. Amol Dhopte', 'dr-amol-dhopte-nagpur', 'Dr. Amol Dhopte ', '2018-11-24 04:19:23', '2018-11-24 04:28:06', 1, '+91-7066132333', '', 0, NULL, NULL),
(5, 'Dr. Shailesh Nisal', 'dr-shailesh-nisal-nagpur', 'Dr. Shailesh Nisal', '2018-11-24 04:26:24', '0000-00-00 00:00:00', 1, '7066132333', '', 0, NULL, NULL),
(6, '', '', '', '2024-03-03 10:57:05', '0000-00-00 00:00:00', 1, '1212102909', '', 0, NULL, NULL),
(7, 'de', 'de', 'pooja.sangitrao@gmail.com', '2024-03-03 11:08:15', '0000-00-00 00:00:00', 1, '8329652493', '916e296d201a91330d18', 0, NULL, NULL),
(8, 'ruby', 'rty', 'ruby@yopmail.com', '2024-03-03 01:28:19', '0000-00-00 00:00:00', 1, '12341234', '7fc531427b6c67d8f68f', 0, NULL, NULL),
(9, 'sample', 'demo', 'sample@yopmail.com', '2024-03-03 03:14:11', '0000-00-00 00:00:00', 1, '7867676879898', '4297f44b13955235245b2497399d7a93', 1, '2024-03-01 13:24:09', '2024-03-04 01:45:34'),
(10, 'Ruby', 'Raina', 'rr@yopmail.com', '2024-03-04 01:48:17', '0000-00-00 00:00:00', 1, '8765432199', '7574d3bfd8f853c218b2c83176a808ff', 0, NULL, NULL),
(11, 'abc', 'DEF', 'abc@yopmail.com', '2024-03-04 01:52:09', '0000-00-00 00:00:00', 1, '987654321', '4297f44b13955235245b2497399d7a93', 1, '2024-03-04 01:56:22', '2024-03-04 01:52:40');

-- --------------------------------------------------------

--
-- Table structure for table `emp_task`
--

CREATE TABLE `emp_task` (
  `id` int(10) NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `stop_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `notes` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `emp_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emp_task`
--

INSERT INTO `emp_task` (`id`, `start_time`, `stop_time`, `notes`, `description`, `created_at`, `emp_id`) VALUES
(1, '2024-03-03 06:55:43', '2024-03-03 06:55:43', 'Please save and validate password using password_hash function but also keep the ability to reset password directly in the DataBase using MD5.\r\n\r\n', 'Please save and validate password using password_hash function but also keep the ability to reset password directly in the DataBase using MD5.\r\n\r\n', '2024-03-03 07:54:49', 7),
(2, '2024-03-09 12:14:00', '2024-03-03 13:15:00', 'demo', 'test', '0000-00-00 00:00:00', 0),
(3, '2024-03-10 12:17:00', '2024-03-17 12:19:00', '', '', '2024-03-03 03:47:47', 0),
(4, '2024-03-23 14:22:00', '2024-03-23 14:22:00', '', '', '2024-03-03 03:48:45', 0),
(5, '2024-03-16 13:19:00', '2024-03-16 14:23:00', '', '', '2024-03-03 03:49:44', 9);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `display_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2018-07-03 23:36:25', '2018-07-03 23:36:25'),
(2, 'user', 'Normal User', '2018-07-03 23:36:26', '2018-07-03 23:36:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_task`
--
ALTER TABLE `emp_task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `emp_task`
--
ALTER TABLE `emp_task`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
