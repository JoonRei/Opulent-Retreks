-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2023 at 09:45 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opulent`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mypassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `mypassword`) VALUES
(14, 'Rizty D. Ingua', 'rizty.ingua@gmail.com', '$2y$10$CGNHn5i7KONKHEOkwc4VN.PsUjCS/1FAyMVmbKYns63hl8CchW7fu'),
(15, 'Aineros', 'aineros@gmail.com', '$2y$10$YE5zWUNFaymzFIUDSHEnCOz05rIRSZKzCx.GvwejsDw9pbliz8iu.'),
(16, 'Junrey', 'junrey.manriquez@gmail.com', '$2y$10$tLHAdXpOkHKzy1do0IfxI.OyZabdmilnq2qhRes/xpqOzsIocZKua'),
(17, 'james', 'james@gmail.com', '$2y$10$miv.cy0AVEZHlYZ3qTI.me3ie/ajNfPMheSwd6gWMHic7TvkYwb7u'),
(18, 'Rizty', 'rizty.ingua@gmail.com', '$2y$10$KiSEAbZoOzhrEKac.qA5n.wcqgrP3RpJTa4bnXRTGFVnuRSFwJjZq'),
(19, 'Maria', 'maria@gmail.com', '$2y$10$bC5aPVwKrHb.m5GPL9KqEOQVEc8PkNcxX7KCSVjC39dk0Tt58xlGW'),
(20, 'Rainy', 'rainy@gmail.com', '$2y$10$TXkhIVcItm9qOLUHVS2hDu.8BXQoxbVi.5QW6opft/M27PLQ6LTuG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
