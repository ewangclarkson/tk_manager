-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 15, 2021 at 06:56 PM
-- Server version: 8.0.27-0ubuntu0.20.04.1
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tk_management`
--
CREATE DATABASE IF NOT EXISTS `tk_management` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `tk_management`;

-- --------------------------------------------------------

--
-- Table structure for table `priorities`
--

CREATE TABLE `priorities` (
  `id` int NOT NULL,
  `name` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `priorities`
--

INSERT INTO `priorities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '#1', '2021-12-15 02:06:48', '2021-12-15 02:06:48'),
(2, '#2', '2021-12-15 02:06:54', '2021-12-15 02:06:54');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` int NOT NULL,
  `project_name` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `project_des` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `project_leader` int DEFAULT '0',
  `start_date` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `end_date` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  `employees_employee_id` int NOT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `project_name`, `project_des`, `project_leader`, `start_date`, `end_date`, `status`, `employees_employee_id`, `created_at`, `updated_at`) VALUES
(3, 'Go-Student', 'School Management System', 1, '11/09/2022', '17/09/2022', 0, 1, '2021-12-01 00:06:22.000000', '2021-12-01 00:06:22.000000'),
(5, 'GOwaka', 'computing', 1, '2021-12-01', '2021-12-07', 0, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `task_id` int NOT NULL,
  `task_name` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `start_date` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `end_date` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `projects_project_id` int NOT NULL,
  `priority_id` int NOT NULL,
  `employees_employee_id` int NOT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_id`, `task_name`, `start_date`, `end_date`, `status`, `projects_project_id`, `priority_id`, `employees_employee_id`, `created_at`, `updated_at`) VALUES
(2, 'kljnl', '2012-09-01', '2012-09-01', 0, 3, 1, 1, '2021-12-01 02:37:10.000000', '2021-12-01 02:37:10.000000'),
(4, 'aosirgt', '2021-12-02', '2021-11-30', NULL, 3, 2, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `employee_id` int UNSIGNED NOT NULL,
  `employee_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `date_of_birth` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `remember_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `employee_profile` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '/avatars/employee.png',
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`employee_id`, `employee_name`, `email`, `password`, `date_of_birth`, `remember_token`, `status`, `employee_profile`, `created_at`, `updated_at`) VALUES
(1, 'ewang clarks', 'ewangclarks@gmail.com', '$2y$10$TEGDdz7Ft6BBxiFXOTgAaOjKmaxUyIEEN.EYudZjU86VUzJ8Q33JK', '22 November, 2017', 'ieBz6z7kIrjCeLCEg7mOe03Jf1ZbVtdIbNKP02bm85EcEH0kBo2JdMU7fk02', 1, '/avatars/employee.png', '2017-11-22 10:15:40.000000', '2017-11-22 11:38:16.000000'),
(2, 'eta Dalton', 'etasick@gmail.com', '$2y$10$wN7UctcQPrx4JaQ1fPzKKe6w/WP2eOdUyr.3hGa54FlqOHB0Dt9.O', '17 November, 2017', NULL, 1, '/avatars/employee.png', '2017-11-22 10:46:06.000000', '2017-11-22 11:47:10.000000'),
(3, 'jones', 'jones@gmail.com', '$2y$10$J/aCuvVg1x5b/HPwgsM2zed9n2UD6Nuuh93O55qN625.GFd8.SmFG', NULL, 'lryZnp1HsreuTnyJ20SdA7zsdpH6RuZO49peJVrRuGYqOcQsrMfQYl7DFuQ0', NULL, '/avatars/employee.png', '2021-12-15 08:02:50.000000', '2021-12-15 08:02:50.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `priorities`
--
ALTER TABLE `priorities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`,`projects_project_id`),
  ADD KEY `fk_tasks_projects1_idx` (`projects_project_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`employee_id`),
  ADD UNIQUE KEY `employee_id_UNIQUE` (`employee_id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `password_UNIQUE` (`password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `priorities`
--
ALTER TABLE `priorities`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `employee_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `fk_tasks_projects1` FOREIGN KEY (`projects_project_id`) REFERENCES `projects` (`project_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
