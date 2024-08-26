-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2024 at 04:55 PM
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
-- Database: `todo8`
--

-- --------------------------------------------------------

--
-- Table structure for table `folders`
--

CREATE TABLE `folders` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `folders`
--

INSERT INTO `folders` (`id`, `name`, `user_id`, `created_at`) VALUES
(120, 'hadi', 13, '2024-08-25 18:19:42'),
(121, 'hadilwox', 13, '2024-08-25 18:19:47'),
(122, 'hadiiiii', 14, '2024-08-25 18:20:26'),
(123, 'vduhus', 14, '2024-08-25 18:20:30'),
(124, 'izhdivuv', 14, '2024-08-25 18:20:33'),
(125, 'fzdvfdzd', 16, '2024-08-25 18:21:20');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `folder_id` int(11) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `user_id`, `folder_id`, `status`, `created_at`) VALUES
(64, 'hadjdsos', 13, 120, 0, '2024-08-25 18:19:52'),
(65, 'iushviuszvs', 13, 120, 1, '2024-08-25 18:19:55'),
(66, 'kzsijuvhdsvs', 13, 120, 0, '2024-08-25 18:19:57'),
(67, 'szvszvs', 14, 122, 0, '2024-08-25 18:20:40'),
(68, 'zvzdfvd', 14, 122, 1, '2024-08-25 18:20:41'),
(69, 'dfvzfvdfvds', 14, 122, 1, '2024-08-25 18:20:44'),
(70, 'zvfbdfb', 16, 125, 0, '2024-08-25 18:21:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(13, 'hadilwox', 'hadilwox@gmail.com', '09106668040h', '2024-08-25 12:05:04'),
(14, 'hadi', 'hadi@gmail.com', 'hadi', '2024-08-25 12:31:02'),
(15, 'ali', 'ali@gmail.com', 'ali', '2024-08-25 12:39:03'),
(16, 'negar', 'negar9@gmail.com', 'negar', '2024-08-25 12:47:41'),
(17, 'dfvd', 'sdvs@gmail.com', 'scfsc', '2024-08-25 12:49:31'),
(18, 'hadikddf', 'dsvfss@gmail.com', 'sdcfss', '2024-08-25 12:51:01'),
(19, 'dvxvxvfgfd', 'dfvzddf@gmail.com', 'fergthth', '2024-08-25 12:52:15'),
(20, 'hakdopdw', 'dsiuchdiuc@gLail.vom', 'sdcfwfw', '2024-08-25 17:51:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `folders`
--
ALTER TABLE `folders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userFolders` (`user_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasksUser` (`user_id`),
  ADD KEY `taskFolder` (`folder_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `folders`
--
ALTER TABLE `folders`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `folders`
--
ALTER TABLE `folders`
  ADD CONSTRAINT `userFolders` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasksUser` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
