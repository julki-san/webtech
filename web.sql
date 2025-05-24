-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2025 at 06:58 PM
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
-- Database: `web`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `departure_date` date NOT NULL,
  `return_time` time NOT NULL,
  `service_type` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `first_name`, `last_name`, `email`, `phone`, `departure_date`, `return_time`, `service_type`, `created_at`) VALUES
(1, 'Angel', 'Eusebio', 'eusebioangel437@gmail.com', '09913839986', '2025-05-23', '15:28:00', 'Grooming', '2025-05-20 16:25:42'),
(2, 'Angel', 'Eusebio', 'eusebioangel437@gmail.com', '09913839986', '2025-05-23', '15:28:00', 'Grooming', '2025-05-20 16:27:45'),
(3, 'Angel', 'Eusebio', 'eusebioangel437@gmail.com', '09913839986', '2025-05-23', '15:28:00', 'Grooming', '2025-05-20 16:28:19'),
(4, 'Angel', 'Eusebio', 'eusebioangel437@gmail.com', '+639913839986', '2025-05-24', '17:56:00', 'Heart Check', '2025-05-20 17:52:50'),
(5, 'Angel', 'Eusebio', 'eusebioangel437@gmail.com', '09913839986', '2025-05-24', '18:35:00', 'Nail Trimming', '2025-05-22 17:35:28'),
(6, 'Angel', 'Eusebio', 'eusebioangel437@gmail.com', '09913839986', '2025-05-24', '11:11:00', 'Tumor Removal', '2025-05-23 15:06:45'),
(7, 'Angel', 'Eusebio', 'eusebioangel437@gmail.com', '09913839986', '2025-05-30', '15:00:00', 'Cleaning', '2025-05-24 16:41:50');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `message`, `submitted_at`) VALUES
(12, 'Dabois', 'Anghelpogi@gmail.com', 'askda;sdj', '2025-05-01 18:41:02'),
(13, 'Angel', 'eusebioangel437@gmail.com', 'tnigna', '2025-05-20 16:28:34'),
(14, 'Angel', 'eusebioangel437@gmail.com', 'HAHAHAHAHHAHA', '2025-05-22 17:35:03'),
(15, 'Anghel', 'eusebioangel437@gmail.com', 'Try po ', '2025-05-24 16:40:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'John Doe', 'johndoe@example.com', '$2y$10$QH6o7fvT2ZYnmI1R6/nVhe2v9t.FXnGbHLuKgjhO6FrM4hrW9Vjqi', '2025-05-02 23:53:35'),
(2, 'Dabois Research', 'senku123@gmail.com', '$2y$10$X.4nE1gaa41OaMn2cHW3juEmCcdLnE5xOCiI/TxcvGIai0Dtt9GJK', '2025-05-02 23:56:38'),
(3, 'Senn', 'senkuuu1234@gmail.com', '$2y$10$muxHvQe7WR7FBnUBj8WvmOTMjClhQfQUoFm9zb4fQS0pY5hjee7i6', '2025-05-02 23:59:17'),
(4, 'hadje', 'Hadje@gmail.com', '$2y$10$MRF8/Sq3y.vR385H0gBDEO5AO73jgn08rDDYaSqM4zNrM0wrXF5Qa', '2025-05-20 13:39:54'),
(5, 'raf', 'raf@gmail.com', '$2y$10$wl9iiYxL3Uxfs1RZXjGDBuQnosye/bDcdnWRql9THCFGfKiF5A1mi', '2025-05-20 13:59:34'),
(6, 'jhon', 'jhon@gmail.com', '$2y$10$G/6eofeJzgfgkLrv0l0cY.gR.teHizHT50R3pTD27K2CFM5tvsife', '2025-05-20 14:33:50'),
(8, 'angel', 'eusebioangel437@gmail.com', '$2y$10$eTUbyF991vv8fEF9NXNMHOL6rycTRG0x45BSXzEZPJbMfq1EtW8sG', '2025-05-20 14:34:25'),
(9, 'ace', 'ace@gmail.com', '$2y$10$Et4rMQWX8dMBpi05VBv8gOMfT0z73/bC70fAkGIGaIRl7ZZvcHFVy', '2025-05-22 17:52:42'),
(11, 'ace11', 'ace11@gmail.com', '$2y$10$5G9.TyVAnAJTZMCA.vuq7Ocvgn1r4HW9c6PpuCH8AurKhkIPuU/0C', '2025-05-22 18:03:36'),
(13, 'ace111', 'ace111@gmail.com', '$2y$10$P8JdTp/J6jETeozmZmaT1.txoV/h4e//5AL4XgRydhnJRNmdUZ7NO', '2025-05-22 18:05:26'),
(14, 'ace22', 'ace22@gmail.com', '$2y$10$5pKhyXJz.nvs36CGIHuCB.X9yqK9ZQKyvAjEExBZNaRvonuHXKoou', '2025-05-22 18:06:16'),
(15, 'ace23', 'ace23@gmail.com', '$2y$10$Xav1QzxJ80BsOiksSBYUS.qWrXR9TxxJsdFCDL2EnL61ASoumUf5G', '2025-05-22 18:06:43'),
(16, 'nash', 'nash@gmail.com', '$2y$10$bOcuDYr.lBFEH0pgENOShuHM8XpDt6u3MhQF/zPCr9Gay8G4ZsVKa', '2025-05-24 16:42:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
