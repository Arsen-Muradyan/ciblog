-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2021 at 07:52 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ciblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `image`, `user_id`, `created_at`) VALUES
(22, 'Qt ', '&lt;table border=&quot;1&quot; cellpadding=&quot;1&quot; cellspacing=&quot;1&quot; xss=removed&gt;\r\n &lt;tbody&gt;\r\n  &lt;tr&gt;\r\n   &lt;td&gt;xasxa&lt;/td&gt;\r\n   &lt;td&gt;xasxaxas&lt;/td&gt;\r\n  &lt;/tr&gt;\r\n  &lt;tr&gt;\r\n   &lt;td&gt; &lt;/td&gt;\r\n   &lt;td&gt; &lt;/td&gt;\r\n  &lt;/tr&gt;\r\n  &lt;tr&gt;\r\n   &lt;td&gt; &lt;/td&gt;\r\n   &lt;td&gt; &lt;/td&gt;\r\n  &lt;/tr&gt;\r\n  &lt;tr&gt;\r\n   &lt;td&gt; &lt;/td&gt;\r\n   &lt;td&gt; &lt;/td&gt;\r\n  &lt;/tr&gt;\r\n  &lt;tr&gt;\r\n   &lt;td&gt; &lt;/td&gt;\r\n   &lt;td&gt; &lt;/td&gt;\r\n  &lt;/tr&gt;\r\n  &lt;tr&gt;\r\n   &lt;td&gt; &lt;/td&gt;\r\n   &lt;td&gt; &lt;/td&gt;\r\n  &lt;/tr&gt;\r\n  &lt;tr&gt;\r\n   &lt;td&gt; &lt;/td&gt;\r\n   &lt;td&gt; &lt;/td&gt;\r\n  &lt;/tr&gt;\r\n &lt;/tbody&gt;\r\n&lt;/table&gt;\r\n\r\n&lt;p&gt; &lt;/p&gt;\r\n', 'QtInstaller-256_550x825.png', 1, '2021-03-21 19:11:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'Arsen', 'arsenmuradyan604@gmail.com', '77bd74e8f1db91641369f6743fdfb174'),
(2, 'John', 'john@mail.com', '6e0b7076126a29d5dfcbd54835387b7b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
