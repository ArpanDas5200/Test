-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 29, 2024 at 01:53 PM
-- Server version: 8.0.27
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(225) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `created_at`, `updated_at`) VALUES
(8, 'Admin', 'admin@gmail.com', '$2y$12$yXXhe95qix5AX2l1.OfjuuyUQ0SOiD1VgoyNaMCWkltIFv6YETlzi', '2024-04-29 09:59:51', '2024-04-29 09:59:51');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
CREATE TABLE IF NOT EXISTS `city` (
  `id` int NOT NULL AUTO_INCREMENT,
  `state_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `state_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Surat', '2024-04-29 12:51:39', '2024-04-29 12:51:39'),
(2, 1, 'Ahmedabad', '2024-04-29 12:51:39', '2024-04-29 12:51:39'),
(3, 2, 'Mumbai', '2024-04-29 12:51:56', '2024-04-29 12:51:56'),
(4, 2, 'Pune', '2024-04-29 12:51:56', '2024-04-29 12:51:56');

-- --------------------------------------------------------

--
-- Table structure for table `states_master`
--

DROP TABLE IF EXISTS `states_master`;
CREATE TABLE IF NOT EXISTS `states_master` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `states_master`
--

INSERT INTO `states_master` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Gujarat', '2024-04-29 12:50:18', '2024-04-29 12:50:18'),
(2, 'Maharashtra', '2024-04-29 12:50:18', '2024-04-29 12:50:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(225) NOT NULL,
  `images` varchar(255) DEFAULT NULL,
  `state` int NOT NULL,
  `city` int NOT NULL,
  `hobbies` varchar(255) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `images`, `state`, `city`, `hobbies`, `updated_at`, `created_at`) VALUES
(11, 'Ritika', 'arpandas-photo.jpeg', 2, 3, 'cricket', '2024-04-29 13:51:30', '2024-04-29 13:09:28'),
(12, 'Wire Less Drill', 'arpandas-photo.jpeg', 2, 4, 'cricket, games', '2024-04-29 13:52:22', '2024-04-29 13:52:22');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
