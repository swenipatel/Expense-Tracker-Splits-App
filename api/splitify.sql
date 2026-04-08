-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2026 at 11:36 AM
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
-- Database: `splitify`
--

-- --------------------------------------------------------

--
-- Table structure for table `s_expenses`
--

CREATE TABLE `s_expenses` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `paid_by` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `s_groupmembers`
--

CREATE TABLE `s_groupmembers` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `s_groups`
--

CREATE TABLE `s_groups` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `s_splits`
--

CREATE TABLE `s_splits` (
  `id` int(11) NOT NULL,
  `expense_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `s_users`
--

CREATE TABLE `s_users` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `s_users`
--

INSERT INTO `s_users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(2, 'sweni', '', '', '2026-04-06 12:55:42'),
(3, 'sweni', 'sweni@gmail.com', '123456', '2026-04-06 18:10:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `s_expenses`
--
ALTER TABLE `s_expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `paid_by` (`paid_by`);

--
-- Indexes for table `s_groupmembers`
--
ALTER TABLE `s_groupmembers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `s_groups`
--
ALTER TABLE `s_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `s_splits`
--
ALTER TABLE `s_splits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expense_id` (`expense_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `s_users`
--
ALTER TABLE `s_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `s_expenses`
--
ALTER TABLE `s_expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `s_groupmembers`
--
ALTER TABLE `s_groupmembers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `s_groups`
--
ALTER TABLE `s_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `s_splits`
--
ALTER TABLE `s_splits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `s_users`
--
ALTER TABLE `s_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `s_expenses`
--
ALTER TABLE `s_expenses`
  ADD CONSTRAINT `s_expenses_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `s_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `s_expenses_ibfk_2` FOREIGN KEY (`paid_by`) REFERENCES `s_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `s_groupmembers`
--
ALTER TABLE `s_groupmembers`
  ADD CONSTRAINT `s_groupmembers_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `s_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `s_groupmembers_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `s_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `s_groups`
--
ALTER TABLE `s_groups`
  ADD CONSTRAINT `s_groups_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `s_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `s_splits`
--
ALTER TABLE `s_splits`
  ADD CONSTRAINT `s_splits_ibfk_1` FOREIGN KEY (`expense_id`) REFERENCES `s_expenses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `s_splits_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `s_users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
