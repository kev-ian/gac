-- phpMyAdmin SQL Dump
-- version 4.3.8deb0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 03, 2018 at 04:07 PM
-- Server version: 5.5.55-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gac`
--

-- --------------------------------------------------------

--
-- Table structure for table `call_ticket`
--

CREATE TABLE IF NOT EXISTS `call_ticket` (
  `id` int(11) NOT NULL,
  `billedAccount` int(11) NOT NULL,
  `InvoiceNumber` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `subscriberNumber` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `durationReal` decimal(10,0) DEFAULT NULL,
  `durationInvoiced` decimal(10,0) DEFAULT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `call_ticket`
--
ALTER TABLE `call_ticket`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `call_ticket`
--
ALTER TABLE `call_ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
