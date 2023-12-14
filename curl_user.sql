-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2023 at 01:48 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `curl_user`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`) VALUES
(1, 'Hasan', 'h1@g.com', '01682', '$2y$10$9jE0GGExHQ3JkyiAMB1faOtPCtoIhn/BFGMo.p7e8kl7LYXutqjgC'),
(2, 'Hossain', 'h2@g.com', '01682', '$2y$10$Fh7faqRl09Yqe83l4G2c2ewZRgmMLYLGbzNknKJ0Div0ipUDzdDuK'),
(3, 'Aftab', 'h3@g.com', '01682', '$2y$10$OH2QUMWBhL1Cq8orByMF4uHqWi9iTysWMKzwMnAAhqSb4LIazWCGq'),
(4, 'Raki', 'h4@g.com', '01682', '$2y$10$3tmZea99dV70405bsVRXFe0rMdcJt/NOniI2CDJ3avLZw1ye4fpcO'),
(5, 'Tanvir', 'h5@g.com', '01682', '$2y$10$pM0IeLYMMJCnfRokY8.Jz.9cz7LxpH9v8nvg1XOJsTeYi84KWpTf.'),
(6, 'Mahbub', 'h6@g.com', '01682', '$2y$10$wIybtWbkkSQ/u3EzZ3eUuOgpfYdG6DAi645e9qZwBxepZycynZNae'),
(7, 'Al Amin', 'h7@g.com', '01682', '$2y$10$.yS1ClcNh0QvzZfP0G1m1uBLgydy6EznoULueaKbRV2jsv60uVJJq'),
(8, 'Eshan', 'h8@g.com', '01682', '$2y$10$eC9cqFTjpX8M9IEFRsQdNO37C/gBpFlYGcBAh5rWYLrAAV8revyg2'),
(9, 'Mehedi', 'h9@.com', '01682', '$2y$10$Aa.BN1OZHWE18hER9xKv9ubv29Ou0kWkqH2csrcCvt7b.1xzSp0cK');

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
