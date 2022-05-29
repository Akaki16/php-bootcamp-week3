-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 29, 2022 at 07:27 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `countries-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `population` bigint(20) NOT NULL,
  `capital` varchar(50) NOT NULL,
  `region` varchar(50) NOT NULL,
  `subregion` varchar(50) NOT NULL,
  `flag` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `population`, `capital`, `region`, `subregion`, `flag`) VALUES
(162, 'ukraine', 44134693, 'Kyiv', 'Europe', 'Eastern Europe', 'images/ua'),
(163, 'cuba', 11326616, 'Havana', 'Americas', 'Caribbean', 'images/cu'),
(164, 'germany', 83240525, 'Berlin', 'Europe', 'Western Europe', 'images/de'),
(166, 'poland', 37950802, 'Warsaw', 'Europe', 'Central Europe', 'images/pl'),
(167, 'austria', 8917205, 'Vienna', 'Europe', 'Central Europe', 'images/at'),
(168, 'romania', 19286123, 'Bucharest', 'Europe', 'Southeast Europe', 'images/ro'),
(169, 'hong kong', 7500700, 'City of Victoria', 'Asia', 'Eastern Asia', 'images/hk'),
(170, 'taiwan', 23503349, 'Taipei', 'Asia', 'Eastern Asia', 'images/tw'),
(171, 'turkey', 84339067, 'Ankara', 'Asia', 'Western Asia', 'images/tr'),
(172, 'greece', 10715549, 'Athens', 'Europe', 'Southern Europe', 'images/gr'),
(173, 'denmark', 5831404, 'Copenhagen', 'Europe', 'Northern Europe', 'images/dk'),
(174, 'estonia', 1331057, 'Tallinn', 'Europe', 'Northern Europe', 'images/ee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
