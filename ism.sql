-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2021 at 10:13 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ism`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `sno` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `school` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `guide` varchar(255) NOT NULL,
  `paper1t` varchar(255) NOT NULL,
  `paper1l` varchar(255) NOT NULL,
  `paper2t` varchar(255) NOT NULL,
  `paper2l` varchar(255) NOT NULL,
  `paper3t` varchar(255) NOT NULL,
  `paper3l` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `filename` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`sno`, `name`, `username`, `school`, `area`, `guide`, `paper1t`, `paper1l`, `paper2t`, `paper2l`, `paper3t`, `paper3l`, `date`, `filename`) VALUES
(1, 'Milan Kumar', '19MCMC64', 'SCIS/MCA', 'Full Stack', 'Dr Nagmani', 'Pointer in C', 'https://www.esc.edu/online-writing-center/resources/research/research-paper/', 'Java', 'https://www.esc.edu/online-writing-center/resources/research/research-paper/', 'Machine Learning', 'https://www.esc.edu/online-writing-center/resources/research/research-paper/', '2021-12-13 02:19:19', 'Milan.jpg'),
(2, 'Aftab Hussain', '19mcmc48@uohyd', 'SCIS/MCA', 'Networks', 'Dr. Atul Negi', 'Efficient Routing algo', 'https://www.esc.edu/online-writing-center/resources/research/research-paper/ ', 'Application layer protocols ', 'https://www.esc.edu/online-writing-center/resources/research/research-paper/ ', 'Network security', 'https://www.esc.edu/online-writing-center/resources/research/research-paper/', '2021-12-13 02:36:55', 'aftab.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `reg_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `password`, `mobile_no`, `reg_time`) VALUES
(1, '19MCMC64', 'Milan Kumar', '$2y$10$aiv0hrZuWL68kuh8rChn8.6RSTrRWMb2HPH0MStrC.FpJVQx7LpIe', '9709253600', '2021-12-13 02:12:21'),
(2, '19mcmc48@uohyd', 'Aftab hussain', '$2y$10$.2hZZsRaQFKuudgwYhd7Zeeas/tTLMvDChUk/pOnN5zkmG0TYfSOG', '9999999999', '2021-12-13 02:32:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
