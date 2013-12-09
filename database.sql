-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 09, 2013 at 02:29 AM
-- Server version: 5.5.29
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `odspeedc_p4_go_odspeed_com`
--

-- --------------------------------------------------------

--
-- Table structure for table `builds`
--

CREATE TABLE `builds` (
  `build_id` int(11) NOT NULL AUTO_INCREMENT,
  `component_id` int(11) NOT NULL,
  `build_num` varchar(255) NOT NULL,
  `created` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `duration` double NOT NULL,
  `job_name` varchar(255) NOT NULL,
  PRIMARY KEY (`build_id`),
  UNIQUE KEY `version_id_UNIQUE` (`build_id`),
  KEY `component_id_idx` (`component_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `builds`
--

INSERT INTO `builds` (`build_id`, `component_id`, `build_num`, `created`, `status`, `duration`, `job_name`) VALUES
(1, 1, '1', 1386279476, 'Unstable', 45.4, 'PMESalesClient_January'),
(2, 1, '2', 1386279555, 'Stable', 50, 'PMESalesClient_December'),
(3, 7, '12', 1386279383, 'Stable', 32.4, 'PMESalesDesktopAutoClient_January'),
(4, 10, '12', 1386279431, 'Failed', 56.3, 'PmEServiceBilling January'),
(5, 5, '34', 0, 'Stable', 60.2, 'Services_February'),
(6, 5, '56', 0, 'Unstable', 34.5, 'Services_December'),
(7, 2, '109', 0, 'Stable', 12.5, 'PMESalesMobileClient_February'),
(8, 3, '201', 0, 'Stable', 45, 'PMInternetAnalytics_December'),
(9, 3, '304', 0, 'Failed', 45.6, 'PMInternetAnalytics_January'),
(10, 7, '12', 0, 'Stable', 78, 'PMESalesDesktopAutoClient_December'),
(11, 1, '14', 0, 'Stable', 67, 'PMESalesClient_November'),
(12, 0, '78', 1386382729, 'Stable', 63.2, 'PMESalesMobile_October'),
(13, 2, '78', 1386383196, 'Stable', 63.2, 'PMESalesMobile_October'),
(14, 3, '50', 1386383252, 'Unstable', 67, 'PMInternetAnalytics October');

-- --------------------------------------------------------

--
-- Table structure for table `components`
--

CREATE TABLE `components` (
  `component_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  PRIMARY KEY (`component_id`),
  UNIQUE KEY `component_id_UNIQUE` (`component_id`),
  KEY `product_id_idx` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `components`
--

INSERT INTO `components` (`component_id`, `product_id`, `name`, `desc`) VALUES
(1, 1, 'Client', 'eSales Client'),
(2, 1, 'Mobile', 'eSales Mobile'),
(3, 1, 'Analytics', 'eSales Analytics'),
(4, 2, 'Services', 'eService Services'),
(5, 3, 'Services', 'NextGen Services'),
(6, 1, 'Common Client', ''),
(7, 1, 'Desktop Auto Client', ''),
(8, 1, 'Desktop Common Client', ''),
(9, 1, 'Desktop Property Client', ''),
(10, 2, 'Billing', ''),
(11, 2, 'Claims', ''),
(12, 2, 'Policy', ''),
(13, 2, 'Web Account Apps', ''),
(14, 2, 'Web Application Libraries', ''),
(15, 2, 'Web Billing Apps', ''),
(16, 2, 'Web Libraries', ''),
(17, 2, 'Web Policy Apps', ''),
(18, 4, 'Common Client', '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  PRIMARY KEY (`product_id`),
  UNIQUE KEY `product_id_UNIQUE` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `desc`) VALUES
(1, 'eSales', 'NextGen eSales'),
(2, 'eService', 'eService'),
(3, 'Services', 'NextGen Services'),
(4, 'Internet', '');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`role_id`),
  UNIQUE KEY `role_id_UNIQUE` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `type`) VALUES
(1, 'User'),
(2, 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` int(11) NOT NULL,
  `timezone` varchar(45) DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_id_UNIQUE` (`user_id`),
  KEY `role_id_idx` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `role_id`, `created`, `modified`, `token`, `password`, `last_login`, `timezone`, `first_name`, `last_name`, `email`) VALUES
(3, 1, 1386386583, 0, 'db1c2f777166cb56b19406514331a6eb5c673f4e', 'fe403bb05822366109f5616344fe357c0eb20135', 0, NULL, 'John', 'Harvard', 'john@fas.harvard.edu'),
(4, 2, 1386386657, 0, '7f3334f0773e7f4d2a40f2e44448b0f259eb5170', '8690255d680e0148a01a27b5a73e2646a78df223', 0, NULL, 'Jim', 'Goodspeed', 'jgoodsp@fas.harvard.edu');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `components`
--
ALTER TABLE `components`
  ADD CONSTRAINT `product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;
