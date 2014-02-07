-- phpMyAdmin SQL Dump
-- version 3.1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 04, 2014 at 11:40 AM
-- Server version: 5.1.30
-- PHP Version: 5.2.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sample_data_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `sample_data_tb_incident`
--

CREATE TABLE IF NOT EXISTS `sample_data_tb_incident` (
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `side_code` varchar(10) NOT NULL,
  `incident_no` varchar(10) NOT NULL,
  `incident_date` datetime NOT NULL,
  `incident_time` varchar(10) DEFAULT NULL,
  `flash_distribution` varchar(3) NOT NULL,
  `source_of_first_indication` varchar(50) NOT NULL,
  `root_cause_category` varchar(50) NOT NULL,
  `root_cause_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sample_data_tb_incident`
--

