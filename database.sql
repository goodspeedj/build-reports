-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 05, 2013 at 03:36 AM
-- Server version: 5.5.29
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `odspeedc_p4_go_odpeed_com`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `builds`
--

INSERT INTO `builds` (`build_id`, `component_id`, `build_num`, `created`, `status`, `duration`, `job_name`) VALUES
(1, 1, '1', 0, 'Unstable', 45.4, 'PMESalesClient_January');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `components`
--

INSERT INTO `components` (`component_id`, `product_id`, `name`, `desc`) VALUES
(1, 1, 'Client', 'eSales Client'),
(2, 1, 'Mobile', 'eSales Mobile'),
(3, 1, 'Analytics', 'eSales Analytics'),
(4, 2, 'Services', 'eService Services'),
(5, 3, 'Services', 'NextGen Services');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `desc`) VALUES
(1, 'eSales', 'NextGen eSales'),
(2, 'eService', 'eService'),
(3, 'Services', 'NextGen Services');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  `token` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` int(11) NOT NULL,
  `timezone` varchar(45) DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_id_UNIQUE` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `components`
--
ALTER TABLE `components`
  ADD CONSTRAINT `product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;
