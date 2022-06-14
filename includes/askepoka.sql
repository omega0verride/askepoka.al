-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 13, 2022 at 07:53 PM
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
-- Database: `askepoka`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postId` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` mediumtext NOT NULL,
  `username` varchar(20) NOT NULL,
  `timestampPosted` timestamp NOT NULL DEFAULT '1970-12-31 22:00:01',
  `timestampUpdated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postId`, `title`, `content`, `username`, `timestampPosted`, `timestampUpdated`) VALUES
(1, 'What is Lorem Ipsum?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'admin', '2022-06-13 17:49:17', '2022-06-13 17:49:17'),
(2, 'Why do we use it?', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'test', '2022-06-13 17:49:17', '2022-06-13 17:49:17'),
(3, 'Where does it come from?', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\n\n    The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 'test', '2022-06-13 17:49:17', '2022-06-13 17:49:17'),
(4, 'test', 'asd', 'admin', '2022-06-09 19:46:14', '2022-06-09 19:46:14'),
(5, 'test', 'asd', 'admin', '2022-06-09 19:46:40', '2022-06-09 19:46:40'),
(6, 'What is a technology stack?', 'The technology stack is a set of frameworks and tools used to develop a software product. This set of frameworks and tools are very specifically chosen to work together in creating a well-functioning software.\r\n\r\nHere are some examples of widely used web development technology stacks in use today:\r\n\r\nMERN (MongoDB, ExpressJS, ReactJS, NodeJS)\r\nLAMP (Linux, Apache, MySQL, PHP)\r\nMEAN (MongoDB, ExpressJS, AngularJS, NodeJS)', 'admin', '2022-06-09 19:49:27', '2022-06-09 19:49:27'),
(7, '9th Career Fair', 'Dear all,\r\n\r\nHope you are doing well!\r\n\r\nEPOKA University is proud to announce the organization of the \"9th Career Fair\" on May 18, 2022. In the activity will be participating prestigious companies and the aim will be to offer internship opportunities to second-year students and employment opportunities for the last-year students, master students and to our graduates.\r\n\r\nDate: Wednesday, May 18, 2022.\r\nTime: 10:00.\r\nVenue: EPOKA University Campus, A-Building, Ground Floor.', 'admin', '2022-06-09 19:50:11', '2022-06-09 19:50:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `role` int(11) NOT NULL,
  `email` varchar(32) NOT NULL,
  `birthday` date NOT NULL,
  `password` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `name`, `surname`, `role`, `email`, `birthday`, `password`) VALUES
('admin', 'admin', 'admin', 0, 'indritbreti@gmail.com', '2000-01-01', '0192023a7bbd73250516f069df18b500'),
('admin1', 'admin', 'admin', 1, 'indritbreti@gmail.com', '2002-02-22', '0192023a7bbd73250516f069df18b500'),
('admin2', 'admin', 'admin', 1, 'indritbreti@gmail.com', '2002-02-22', '0192023a7bbd73250516f069df18b500'),
('indritbreti', 'Indrit', 'Breti', 1, 'indritbreti@gmail.com', '2002-05-08', '268b114460ce1f360d57d8dc03ec8d56'),
('test', 'admin', 'admin', 1, 'indritbreti@gmail.com', '2222-02-22', '16d7a4fca7442dda3ad93c9a726597e4');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `voteId` int(11) NOT NULL,
  `postId` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `value` tinyint(1) NOT NULL,
  `timestampSubmitted` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`voteId`, `postId`, `username`, `value`, `timestampSubmitted`) VALUES
(1, 1, 'admin', 1, '2022-06-13 17:49:17'),
(2, 3, 'admin', -1, '2022-06-13 17:49:17'),
(3, 1, 'admin2', 1, '2022-06-13 17:49:17'),
(4, 3, 'admin2', 1, '2022-06-13 17:49:17'),
(5, 3, 'admin1', 1, '2022-06-13 17:49:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postId`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`voteId`),
  ADD KEY `username` (`username`),
  ADD KEY `postId` (`postId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `voteId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE;

--
-- Constraints for table `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `votes_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE,
  ADD CONSTRAINT `votes_ibfk_2` FOREIGN KEY (`postId`) REFERENCES `posts` (`postId`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;