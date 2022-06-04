-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 04, 2022 at 05:59 PM
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
-- Database: `webtech`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `title` varchar(10) NOT NULL,
  `email` varchar(32) NOT NULL,
  `birthday` date NOT NULL,
  `password` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `name`, `surname`, `title`, `email`, `birthday`, `password`) VALUES
('admin', 'admin', 'admin', 'Title 1', 'indritbreti@gmail.com', '2000-01-01', '0192023a7bbd73250516f069df18b500'),
('admin1', 'admin', 'admin', 'Title 1', 'indritbreti@gmail.com', '2002-02-22', '0192023a7bbd73250516f069df18b500'),
('admin2', 'admin', 'admin', 'Title 1', 'indritbreti@gmail.com', '2002-02-22', '0192023a7bbd73250516f069df18b500'),
('indritbreti', 'Indrit', 'Breti', 'Title 1', 'indritbreti@gmail.com', '2002-05-08', '268b114460ce1f360d57d8dc03ec8d56'),
('test', 'admin', 'admin', 'Title 3', 'indritbreti@gmail.com', '2222-02-22', '16d7a4fca7442dda3ad93c9a726597e4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;