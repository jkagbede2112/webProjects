-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2017 at 03:36 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tervecure`
--

-- --------------------------------------------------------

--
-- Table structure for table `billingcategory`
--

CREATE TABLE `billingcategory` (
  `categoryid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `hexcolorcode` varchar(8) NOT NULL,
  `hexbgcolor` varchar(8) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billingcategory`
--

INSERT INTO `billingcategory` (`categoryid`, `name`, `description`, `hexcolorcode`, `hexbgcolor`, `dateadded`) VALUES
(1, 'Private', '', '#ffffff', '#006699', '2017-10-20 10:33:39'),
(2, 'NHIS', 'National Health Insurance Scheme', '#ffffff', '#FF6699', '2017-10-20 10:34:40'),
(3, 'Company', '', '#ffffff', '#008800', '2017-10-20 10:46:36'),
(4, 'HMO', '', '#ffffff', '#CC6600', '2017-10-20 10:47:33');

-- --------------------------------------------------------

--
-- Table structure for table `billingclient`
--

CREATE TABLE `billingclient` (
  `billingclientid` int(11) NOT NULL,
  `billgroupid` int(2) NOT NULL,
  `billclient` varchar(40) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billingclient`
--

INSERT INTO `billingclient` (`billingclientid`, `billgroupid`, `billclient`, `dateadded`) VALUES
(5, 4, 'Hygeia', '2017-11-17 16:44:20'),
(8, 4, 'Non Such', '2017-11-17 16:45:41'),
(9, 4, 'AXA Mansard', '2017-11-17 16:45:49'),
(10, 1, 'Private', '2017-11-17 17:09:26'),
(11, 3, 'SCIB', '2017-11-21 10:04:34'),
(12, 3, 'Pan Ocean', '2017-11-21 10:04:50'),
(13, 3, 'Diamond Bank', '2017-11-21 10:04:57'),
(14, 3, 'First Bank', '2017-11-21 10:05:04'),
(15, 3, 'Grocery', '2017-11-21 10:05:11'),
(16, 3, 'Ikoyi Club', '2017-11-21 10:05:18'),
(17, 3, 'Kewalram', '2017-11-21 10:05:26'),
(18, 3, 'YMCA', '2017-11-21 10:05:30'),
(19, 3, 'LASACO', '2017-11-21 10:05:36'),
(20, 4, 'Medexia scheme', '2017-12-18 11:03:07'),
(21, 4, 'Swift HMO', '2017-12-18 11:08:41'),
(22, 4, 'Clearline', '2017-12-18 11:09:33'),
(23, 4, 'Anchor', '2017-12-18 11:10:17'),
(24, 4, 'Oceanic', '2017-12-18 11:10:55'),
(25, 4, 'Wellness HMO', '2017-12-18 13:54:14'),
(26, 4, 'Metro', '2017-12-18 16:37:15'),
(27, 4, 'Greenbay', '2017-12-18 16:39:42'),
(28, 4, 'GNI', '2017-12-18 16:40:14'),
(29, 4, 'United Health', '2017-12-18 16:41:23'),
(30, 4, 'Precious HealthCare', '2017-12-18 16:43:50'),
(31, 4, 'Zenith', '2017-12-18 16:46:00'),
(32, 4, 'Sterling Health MCS', '2017-12-18 16:48:29'),
(33, 4, 'HealthCare Internati', '2017-12-18 16:51:41'),
(34, 4, 'Century', '2017-12-18 16:54:59'),
(35, 3, 'Marina', '2017-12-18 16:56:57'),
(36, 4, 'Marina', '2017-12-18 16:57:02'),
(37, 4, 'Life Care Partners', '2017-12-18 17:02:19'),
(38, 4, 'DHL', '2017-12-18 17:04:16'),
(39, 4, 'Lifeworth', '2017-12-18 17:05:14'),
(40, 4, 'Mediplan Healthcare ', '2017-12-18 17:06:35'),
(42, 4, 'Princeton', '2017-12-19 09:38:53'),
(43, 4, 'MH healthcare', '2017-12-19 09:39:59'),
(44, 4, 'Redcare', '2017-12-19 09:40:43'),
(45, 4, 'Royal Exchange', '2017-12-19 09:41:34'),
(46, 4, 'Managed Health Services', '2017-12-19 09:42:38'),
(47, 4, 'Premier Medicaid', '2017-12-19 09:48:58'),
(48, 4, 'Riding Health', '2017-12-19 09:49:38'),
(49, 4, 'Roding Health', '2017-12-19 09:49:46'),
(50, 4, 'Ultimate Health', '2017-12-19 09:50:39'),
(52, 4, 'Health Partner', '2017-12-19 09:51:37'),
(53, 4, 'KBL', '2017-12-19 09:52:23'),
(54, 4, 'Century Medicaid', '2017-12-19 09:53:08'),
(56, 4, 'Novo Health', '2017-12-19 09:54:00'),
(58, 4, 'Sterling', '2017-12-19 09:54:47'),
(59, 4, 'Medexia', '2017-12-19 09:55:23'),
(60, 4, 'IHMS', '2017-12-19 09:56:02');

-- --------------------------------------------------------

--
-- Table structure for table `billinggroups`
--

CREATE TABLE `billinggroups` (
  `billingclientid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `nested` int(11) NOT NULL,
  `map` varchar(50) NOT NULL,
  `private` varchar(10) NOT NULL,
  `corporate` varchar(10) NOT NULL,
  `hmo` varchar(5) NOT NULL,
  `description` text NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billinggroups`
--

INSERT INTO `billinggroups` (`billingclientid`, `name`, `nested`, `map`, `private`, `corporate`, `hmo`, `description`, `dateadded`) VALUES
(1, 'individual registration', 0, '', '2500', '3500', '0', '', '2017-11-17 14:30:22'),
(2, 'nurses consultation', 0, '', '1000', '1400', '0', '', '2017-11-17 14:30:22'),
(3, 'nursesinvestigation', 0, '', '1500', '2000', '0', '', '2017-11-17 14:30:42'),
(4, 'consultationfee', 0, '', '2500', '3000', '0', '', '2017-11-17 14:30:42'),
(5, 'lab investigation', 1, '', '0', '0', '0', '', '2017-11-17 14:31:02'),
(6, 'pharmacyprescription', 1, '', '0', '0', '0', '', '2017-11-17 14:31:02'),
(7, 'accomodation', 1, '', '0', '0', '0', '', '2017-11-17 14:31:15'),
(8, 'nursescare', 0, '', '5000', '6000', '0', '', '2017-11-17 14:31:15'),
(9, 'surgery', 0, '', '0', '0', '0', '', '2017-11-17 14:31:24'),
(10, 'family registration', 0, '', '4000', '4500', '0', '', '2017-11-21 07:43:20'),
(11, 'Follow-up consultation', 0, '', '3500', '4000', '0', '', '2017-11-21 09:41:34'),
(12, 'legacy individual registration', 0, '', '0', '0', '0', '', '2017-11-27 13:05:18'),
(13, 'legacy family registration', 0, '', '0', '0', '0', '', '2017-11-27 13:05:18');

-- --------------------------------------------------------

--
-- Table structure for table `billinglog`
--

CREATE TABLE `billinglog` (
  `billinglogid` int(11) NOT NULL,
  `visitid` varchar(20) NOT NULL,
  `clienttype` varchar(50) NOT NULL,
  `clientplan` int(3) NOT NULL,
  `item` varchar(30) NOT NULL,
  `subitem` varchar(80) NOT NULL,
  `quantity` int(3) NOT NULL,
  `staffid` varchar(4) NOT NULL,
  `unitamount` varchar(10) NOT NULL,
  `totalamount` varchar(15) NOT NULL,
  `paymentstatus` int(1) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billinglog`
--

INSERT INTO `billinglog` (`billinglogid`, `visitid`, `clienttype`, `clientplan`, `item`, `subitem`, `quantity`, `staffid`, `unitamount`, `totalamount`, `paymentstatus`, `dateadded`) VALUES
(1, '23485/D', 'Private (Private) ', 0, 'individual registration', '', 1, '4', '2500', '2500', 0, '2017-11-29 09:33:21'),
(21, '251017$035/01', 'HMO (Hygeia)', 0, 'consultationfee', '', 1, '4', '0', '0', 0, '2017-12-01 11:29:57'),
(22, '311017$035/01', 'HMO (Hygeia)', 0, 'consultationfee', '', 1, '4', '0', '0', 0, '2017-12-01 11:30:57'),
(26, '11217$23485/D', 'Private ()', 0, 'consultationfee', '', 1, '4', '2500', '2500', 0, '2017-12-01 12:02:29'),
(27, '11217$23485/D', 'Private(  )', 0, 'lab investigation', 'PCV', 1, '4', '250.5', '250.5', 0, '2017-12-01 17:08:30'),
(28, '11217$23485/D', 'Private(  )', 0, 'lab investigation', 'Semen Analysis', 1, '4', '1200', '1200', 0, '2017-12-01 17:08:48'),
(29, '11217$23485/D', 'Private(  )', 0, 'labs (Urine M/C/S)', 'Urine M/C/S', 1, '4', '1000', '1000', 0, '2017-12-01 17:12:30'),
(32, '11217$23485/D', 'Private(  )', 0, 'Pharmacy (Lidocaine Lidomine)', 'Lidocaine Lidomine', 6, '4', '100', '600', 0, '2017-12-05 13:27:25'),
(34, '291117$23485/D', 'Private ()', 0, 'consultationfee', '', 1, '4', '2500', '2500', 0, '2017-12-05 14:59:47'),
(36, '61217$03434/D', 'HMO ()', 0, 'consultationfee', '', 1, '4', '0', '0', 0, '2017-12-06 12:44:54'),
(37, '', ' () ', 0, 'family registration', '', 0, '4', '', '0', 0, '2017-12-07 15:18:36'),
(38, 'KN/08b1353', 'Private (Private) ', 0, 'individual registration', '', 0, '4', '2500', '2500', 0, '2017-12-15 13:09:35'),
(39, '151217$KN/08b1353', 'Private ()', 0, 'consultationfee', '', 1, '4', '2500', '2500', 0, '2017-12-15 13:17:34'),
(40, '151217$KN/08b1353', 'Private(  )', 0, 'labs (Bleeding Time)', 'Bleeding Time', 1, '4', '340', '340', 0, '2017-12-15 13:23:25'),
(41, '151217$KN/08b1353', 'Private(  )', 0, 'labs (Malaria Parasite (MP))', 'Malaria Parasite (MP)', 1, '4', '450', '450', 0, '2017-12-15 13:38:55'),
(42, '151217$KN/08b1353', 'Private(  )', 0, 'Pharmacy (Brustan/Beeflam/Afra', 'Brustan/Beeflam/Afrab Ibuprofen syrup', 60, '4', '375', '22500', 0, '2017-12-15 13:44:16'),
(44, '151217$KN/08b1353', 'Private(  )', 0, 'labs (PCV)', 'PCV', 1, '4', '250.5', '250.5', 0, '2017-12-15 15:52:46'),
(45, '151217$KN/08b1353', 'Private(  )', 0, 'Pharmacy (Emzor/Panadol/Dana P', 'Emzor/Panadol/Dana Paracetamol 500mg', 3, '4', '2.4', '7.2', 0, '2017-12-15 15:55:23'),
(46, '181217$KN/08b1353', 'Private ()', 0, 'consultationfee', '', 1, '4', '2500', '2500', 0, '2017-12-18 10:36:26'),
(47, '003/02', 'HMO (Medexia scheme) ', 0, 'individual registration', '', 0, '4', '0', '0', 0, '2017-12-18 11:04:02'),
(48, '181217$003/02', 'HMO ()', 0, 'consultationfee', '', 1, '4', '0', '0', 0, '2017-12-18 13:09:01'),
(49, '004/685', 'Company (Kewalram) ', 0, 'individual registration', '', 0, '4', '3500', '3500', 0, '2017-12-18 13:38:33'),
(51, '077/4879', 'Private (Private) ', 0, 'legacy individual registration', '', 0, '4', '0', '0', 0, '2017-12-18 13:49:07'),
(52, '111/02/D', 'HMO (Wellness HMO) ', 0, 'legacy family registration', '', 0, '4', '0', '0', 0, '2017-12-18 13:55:14'),
(53, '181217$004/685', 'Company ()', 0, 'consultationfee', '', 1, '4', '3000', '3000', 0, '2017-12-18 13:58:23'),
(54, '181217$003/02/D', 'HMO ()', 0, 'consultationfee', '', 1, '4', '0', '0', 0, '2017-12-18 14:03:05'),
(55, '181217$111/02/D', 'HMO ()', 0, 'consultationfee', '', 1, '4', '0', '0', 0, '2017-12-18 14:15:44'),
(56, '181217$004/685', 'Company(  )', 0, 'labs (Malaria Parasite (MP))', 'Malaria Parasite (MP)', 1, '4', '550', '550', 0, '2017-12-18 14:21:07'),
(57, '181217$077/4879', 'Private ()', 0, 'consultationfee', '', 1, '4', '2500', '2500', 0, '2017-12-18 14:21:54'),
(58, '181217$004/685', 'Company(  )', 0, 'Pharmacy (Amatem Forte/IPCA by', 'Amatem Forte/IPCA by SFH/ Combisunate Artemether/Lumefantrine Adult Tablet', 6, '4', '720', '4320', 0, '2017-12-18 14:23:34'),
(59, '181217$004/685', 'Company(  )', 0, 'Pharmacy (Emzor/Panadol/Dana P', 'Emzor/Panadol/Dana Paracetamol 500mg', 18, '4', '2.4', '43.2', 0, '2017-12-18 14:24:20'),
(60, '181217$004/685', 'Company(  )', 0, 'Pharmacy (Dana/Emzor Folic Aci', 'Dana/Emzor Folic Acid tablets', 15, '4', '2.25', '33.75', 0, '2017-12-18 14:25:46'),
(61, '181217$004/685', 'Company(  )', 0, 'Pharmacy (Keptal Diazepam 5mg ', 'Keptal Diazepam 5mg Tab', 10, '4', '27', '270', 0, '2017-12-18 14:27:12'),
(62, '181217$111/02/D', 'HMO(  )', 0, 'labs ()', '', 1, '4', '0', '0', 0, '2017-12-18 14:35:20'),
(65, '181217$111/02/D', 'HMO(  )', 0, 'Pharmacy ( )', ' ', 75, '4', '0', '0', 0, '2017-12-18 14:41:28'),
(68, '181217$003/02/D', 'HMO(  )', 0, 'labs ()', '', 1, '4', '0', '0', 0, '2017-12-18 14:52:09'),
(69, '181217$003/02/D', 'HMO(  )', 0, 'Pharmacy ( )', ' ', 9, '4', '0', '0', 0, '2017-12-18 14:53:54'),
(72, '181217$KN/08b1353', 'Private(  )', 0, 'Pharmacy (Emzor/Panadol/Dana P', 'Emzor/Panadol/Dana Paracetamol 500mg', 18, '4', '2.4', '43.2', 0, '2017-12-18 15:42:58'),
(73, '004/155/A', 'Company (Kewalram) ', 0, 'legacy individual registration', '', 0, '4', '0', '0', 0, '2017-12-18 16:10:08'),
(75, '100/07/B', 'HMO (Metro) ', 0, 'legacy family registration', '', 0, '4', '0', '0', 0, '2017-12-18 16:39:05'),
(76, '181217$004/155/A', 'Company ()', 0, 'consultationfee', '', 1, '4', '3000', '3000', 0, '2017-12-18 16:41:23'),
(77, '181217$100/07/B', 'HMO ()', 0, 'consultationfee', '', 1, '4', '0', '0', 0, '2017-12-18 16:46:02'),
(78, '004/682/B', 'Company (Kewalram) ', 0, 'legacy individual registration', '', 0, '4', '0', '0', 0, '2017-12-18 17:10:58'),
(79, '181217$004/682/B', 'Company ()', 0, 'consultationfee', '', 1, '4', '3000', '3000', 0, '2017-12-18 17:17:42'),
(80, '181217$004/682/B', 'Company(  )', 0, 'Pharmacy (Evans Nifedipine (Or', 'Evans Nifedipine (Oral) Tablet', 30, '4', '6.75', '202.5', 0, '2017-12-18 17:29:49'),
(81, '181217$004/682/B', 'Company(  )', 0, 'Pharmacy (Juhel Vasoprin Table', 'Juhel Vasoprin Tablet', 30, '4', '3.75', '112.5', 0, '2017-12-18 17:30:26'),
(82, '181217$004/682/B', 'Company(  )', 0, 'Pharmacy (Michelle Amoxicillin', 'Michelle Amoxicillin 500mg Capsule', 15, '4', '18.75', '281.25', 0, '2017-12-18 17:31:50'),
(83, '072/86/B', 'NHIS () ', 0, 'legacy family registration', '', 0, '4', '', '0', 0, '2017-12-18 18:30:28'),
(84, '181217$072/86/B', 'NHIS ()', 0, 'consultationfee', '', 1, '4', '', '0', 0, '2017-12-18 19:05:50'),
(86, '035/12', 'HMO () ', 0, 'legacy individual registration', '', 0, '4', '0', '0', 0, '2017-12-18 19:25:20'),
(87, '181217$035/12', 'HMO ()', 0, 'consultationfee', '', 1, '4', '0', '0', 0, '2017-12-18 19:33:06'),
(88, '202/05/B', 'HMO () ', 0, 'legacy family registration', '', 0, '4', '0', '0', 0, '2017-12-19 07:58:09'),
(90, '202/05/c', 'HMO () ', 0, 'legacy family registration', '', 0, '4', '0', '0', 0, '2017-12-19 08:04:33'),
(91, '191217$202/05/B', 'HMO ()', 0, 'consultationfee', '', 1, '4', '0', '0', 0, '2017-12-19 08:17:27'),
(92, '191217$202/05/c', 'HMO ()', 0, 'consultationfee', '', 1, '4', '0', '0', 0, '2017-12-19 08:20:12'),
(94, '202/05', 'HMO () ', 0, 'legacy family registration', '', 0, '4', '0', '0', 0, '2017-12-19 08:43:10'),
(95, '191217$202/05', 'HMO ()', 0, 'consultationfee', '', 1, '4', '0', '0', 0, '2017-12-19 09:20:19'),
(97, '004/666', 'Company (Kewalram) ', 0, 'legacy individual registration', '', 0, '4', '0', '0', 0, '2017-12-19 09:22:58'),
(99, '035/40', 'HMO () ', 0, 'legacy individual registration', '', 0, '4', '0', '0', 0, '2017-12-19 09:36:24'),
(100, '077/4896', 'Private (Private) ', 0, 'individual registration', '', 0, '4', '2500', '2500', 0, '2017-12-19 09:43:04'),
(102, '191217$004/666', 'Company ()', 0, 'consultationfee', '', 1, '4', '3000', '3000', 0, '2017-12-19 10:07:39'),
(103, '191217$035/40', 'HMO ()', 0, 'consultationfee', '', 1, '4', '0', '0', 0, '2017-12-19 10:15:44'),
(104, '191217$077/4896', 'Private ()', 0, 'consultationfee', '', 1, '4', '2500', '2500', 0, '2017-12-19 10:20:00'),
(105, '004/727/B', 'Company (Kewalram) ', 0, 'legacy family registration', '', 0, '4', '0', '0', 0, '2017-12-19 11:05:58'),
(106, '004/727/E', 'Company (Kewalram) ', 0, 'legacy family registration', '', 0, '4', '0', '0', 0, '2017-12-19 11:10:38'),
(107, '004/727/ C', 'Company (Kewalram) ', 0, 'legacy family registration', '', 0, '4', '0', '0', 0, '2017-12-19 11:14:58'),
(108, '072/59/B', 'NHIS () ', 0, 'legacy family registration', '', 0, '4', '', '0', 0, '2017-12-19 11:18:11'),
(109, '191217$004/727/B', 'Company ()', 0, 'consultationfee', '', 1, '4', '3000', '3000', 0, '2017-12-19 11:23:20'),
(110, '191217$004/727/E', 'Company ()', 0, 'consultationfee', '', 1, '4', '3000', '3000', 0, '2017-12-19 11:26:03'),
(111, '191217$004/727/ C', 'Company ()', 0, 'consultationfee', '', 1, '4', '3000', '3000', 0, '2017-12-19 11:30:55'),
(112, '191217$072/59/B', 'NHIS ()', 0, 'consultationfee', '', 1, '4', '', '0', 0, '2017-12-19 11:36:28'),
(113, '004/298', 'Company (Kewalram) ', 0, 'legacy individual registration', '', 0, '4', '0', '0', 0, '2017-12-19 12:38:56'),
(114, '004/874', 'Company (Kewalram) ', 0, 'legacy individual registration', '', 0, '4', '0', '0', 0, '2017-12-19 12:45:02'),
(115, '004/874', 'Company (Kewalram) ', 0, 'individual registration', '', 0, '4', '3500', '3500', 0, '2017-12-19 12:45:18'),
(116, '004/223', 'Company (Kewalram) ', 0, 'legacy individual registration', '', 0, '4', '0', '0', 0, '2017-12-19 12:49:23'),
(117, '191217$004/298', 'Company ()', 0, 'consultationfee', '', 1, '4', '3000', '3000', 0, '2017-12-19 13:08:53'),
(118, '191217$004/874', 'Company ()', 0, 'consultationfee', '', 1, '4', '3000', '3000', 0, '2017-12-19 13:12:46'),
(119, '191217$004/223', 'Company ()', 0, 'consultationfee', '', 1, '4', '3000', '3000', 0, '2017-12-19 13:15:30'),
(120, '004/650', 'Company (Kewalram) ', 0, 'legacy individual registration', '', 0, '4', '0', '0', 0, '2017-12-19 15:40:16'),
(121, '004/642', 'Company (Kewalram) ', 0, 'legacy individual registration', '', 0, '4', '0', '0', 0, '2017-12-19 15:44:10'),
(122, '191217$004/650', 'Company ()', 0, 'consultationfee', '', 1, '4', '3000', '3000', 0, '2017-12-19 16:03:50'),
(123, '191217$004/642', 'Company ()', 0, 'consultationfee', '', 1, '4', '3000', '3000', 0, '2017-12-19 16:09:17'),
(124, '191217$004/642', 'Company(  )', 0, 'Pharmacy (Mopson Erythromycin ', 'Mopson Erythromycin 500mg Tablet', 10, '4', '375', '3750', 0, '2017-12-19 16:42:57'),
(125, '191217$004/642', 'Company(  )', 0, 'Pharmacy (Diphine/Geneith Dicl', 'Diphine/Geneith Diclofenac Potassium 50MG tab', 8, '4', '8.25', '66', 0, '2017-12-19 16:44:27'),
(126, '191217$004/642', 'Company(  )', 0, 'Pharmacy (Dana/Mecure Cough Sy', 'Dana/Mecure Cough Syrup Adult', 0, '4', '180', '0', 0, '2017-12-19 16:45:43'),
(128, '191217$004/642', 'Company(  )', 0, 'Pharmacy (Emzor/Panadol/Dana P', 'Emzor/Panadol/Dana Paracetamol 500mg', 9, '4', '2.4', '21.6', 0, '2017-12-19 16:46:43'),
(130, '0672', 'Private (Private) ', 0, 'individual registration', '', 0, '4', '2500', '2500', 0, '2017-12-19 17:15:03'),
(131, '191217$0672', 'Private ()', 0, 'consultationfee', '', 1, '4', '2500', '2500', 0, '2017-12-19 17:57:57'),
(132, '151217$KN/08b1353', 'Private(  )', 0, 'labs (Full Blood Count)', 'Full Blood Count', 1, '4', '200', '200', 0, '2017-12-20 10:17:24'),
(133, '004/487', 'Company (Kewalram) ', 0, 'individual registration', '', 0, '4', '3500', '3500', 0, '2017-12-20 11:09:23'),
(134, '201217$004/487', 'Company ()', 0, 'consultationfee', '', 1, '4', '3000', '3000', 0, '2017-12-20 11:34:10'),
(137, '076/10', 'HMO (Redcare) ', 0, 'individual registration', '', 0, '4', '0', '0', 0, '2017-12-20 11:45:58'),
(138, '076/10', 'HMO (HealthCare Internati) ', 0, 'legacy individual registration', '', 0, '4', '0', '0', 0, '2017-12-20 11:50:31'),
(140, '076/10', 'HMO (Lifeworth) ', 0, 'individual registration', '', 0, '4', '0', '0', 0, '2017-12-20 11:54:09'),
(142, '044/20', 'HMO (HealthCare Internati) ', 0, 'legacy individual registration', '', 0, '4', '0', '0', 0, '2017-12-20 11:59:16'),
(143, '201217$044/20', 'HMO ()', 0, 'consultationfee', '', 1, '4', '0', '0', 0, '2017-12-20 12:12:18'),
(144, '201217$076/10', 'HMO ()', 0, 'consultationfee', '', 1, '4', '0', '0', 0, '2017-12-20 12:14:57'),
(145, '201217$004/874', 'Company ()', 0, 'consultationfee', '', 1, '4', '3000', '3000', 0, '2017-12-20 12:21:20'),
(152, '004/298', 'Company (Kewalram) ', 0, 'individual registration', '', 0, '4', '3500', '3500', 0, '2017-12-20 13:37:09'),
(153, '077/4897', 'Private (Private) ', 0, 'individual registration', '', 0, '4', '2500', '2500', 0, '2017-12-20 13:43:05'),
(156, '012/16', 'HMO (Lifeworth) ', 0, 'individual registration', '', 0, '4', '0', '0', 0, '2017-12-20 14:09:25'),
(157, '004/755', 'Company (Kewalram) ', 0, 'legacy individual registration', '', 0, '4', '0', '0', 0, '2017-12-20 14:23:50');

-- --------------------------------------------------------

--
-- Table structure for table `billingplan`
--

CREATE TABLE `billingplan` (
  `planid` int(11) NOT NULL,
  `clientplan` varchar(40) NOT NULL,
  `clientnameid` int(2) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billingplan`
--

INSERT INTO `billingplan` (`planid`, `clientplan`, `clientnameid`, `dateadded`) VALUES
(2, 'Gold', 5, '2017-11-20 11:23:55'),
(4, 'Silver', 5, '2017-11-20 11:24:03'),
(5, 'Private', 10, '2017-11-20 11:24:34'),
(19, 'asd', 8, '2017-11-20 15:46:53'),
(20, 'Medexia', 20, '2017-12-18 11:03:29'),
(21, 'Swift', 21, '2017-12-18 11:08:58'),
(22, 'Clearline', 22, '2017-12-18 11:09:54'),
(23, 'Anchor', 23, '2017-12-18 11:10:39'),
(24, 'Oceanic', 24, '2017-12-18 11:11:22'),
(25, 'Wellness', 25, '2017-12-18 13:54:52'),
(26, 'Kewalram', 17, '2017-12-18 16:09:51'),
(27, 'Metro', 26, '2017-12-18 16:37:33'),
(28, 'Greenbay', 27, '2017-12-18 16:40:04'),
(30, 'United Health', 27, '2017-12-18 16:43:28'),
(31, 'Precious family', 30, '2017-12-18 16:44:09'),
(32, 'Precious individual', 30, '2017-12-18 16:44:18'),
(33, 'Diamond Family', 30, '2017-12-18 16:44:42'),
(34, 'Mini', 26, '2017-12-18 16:45:19'),
(35, 'Super Health', 31, '2017-12-18 16:46:39'),
(36, 'Smart health single', 31, '2017-12-18 16:47:01'),
(37, 'Classic health', 31, '2017-12-18 16:47:39'),
(38, 'Zenith Medicare Plan', 31, '2017-12-18 16:47:55'),
(39, 'Silver', 32, '2017-12-18 16:48:50'),
(40, 'Bronze', 32, '2017-12-18 16:49:03'),
(41, 'Standard', 24, '2017-12-18 16:49:53'),
(42, 'Gold Plus', 24, '2017-12-18 16:50:06'),
(43, 'Standard Plus', 24, '2017-12-18 16:50:25'),
(44, 'Tit-Compact (Titanium)', 33, '2017-12-18 16:52:37'),
(45, 'TItanium Compact', 33, '2017-12-18 16:52:52'),
(46, 'TItanium Compact (Bet9ja)', 33, '2017-12-18 16:53:03'),
(47, 'TItanium Compact Family', 33, '2017-12-18 16:53:25'),
(48, 'Tit Klassic', 33, '2017-12-18 16:53:38'),
(49, 'Tit-Ultra (Silver)', 33, '2017-12-18 16:53:51'),
(50, 'Tit-Klassic (Tit. Private)', 33, '2017-12-18 16:54:16'),
(51, 'Gold/family', 34, '2017-12-18 16:55:25'),
(52, 'Bronze/family', 34, '2017-12-18 16:55:40'),
(53, 'Burgundy/family', 34, '2017-12-18 16:55:52'),
(54, 'Burgundy/Single', 34, '2017-12-18 16:56:00'),
(55, 'Basic Plus Family', 36, '2017-12-18 16:58:25'),
(56, 'Ultimate(CITIBANK)', 36, '2017-12-18 16:58:50'),
(57, 'Basic Individual', 36, '2017-12-18 16:59:10'),
(58, 'ULTIMATE(FCMB)', 36, '2017-12-18 16:59:33'),
(59, 'ULTIMATE (FCMBCSL)', 36, '2017-12-18 16:59:45'),
(60, 'FCMB DSA BASIC', 36, '2017-12-18 17:00:21'),
(61, 'Basic (LCCI)', 36, '2017-12-18 17:00:49'),
(62, 'Basic with full immunization', 36, '2017-12-18 17:01:07'),
(63, 'Basic', 36, '2017-12-18 17:01:30'),
(64, 'Standard Individual', 37, '2017-12-18 17:02:42'),
(65, 'Basic corporate', 37, '2017-12-18 17:02:58'),
(66, 'Comprehensive Individual', 37, '2017-12-18 17:03:26'),
(68, 'Upper Class', 38, '2017-12-18 17:04:36'),
(69, 'Basic Class', 38, '2017-12-18 17:04:47'),
(70, 'ICSL Customized plan', 39, '2017-12-18 17:05:42'),
(71, 'Life Blue', 39, '2017-12-18 17:05:53'),
(72, 'Life Blue Family', 39, '2017-12-18 17:06:06'),
(73, 'EHP', 40, '2017-12-18 17:07:20'),
(74, 'PHP', 40, '2017-12-18 17:07:26'),
(75, 'PAX', 40, '2017-12-18 17:07:32'),
(76, 'APHP', 40, '2017-12-18 17:07:41'),
(79, 'APHP-Customised', 40, '2017-12-18 17:08:06'),
(80, 'Swift HMO', 21, '2017-12-18 17:09:20'),
(81, 'Pinceton', 42, '2017-12-19 09:39:42'),
(82, 'MH healthcare', 43, '2017-12-19 09:40:31'),
(83, 'Redcare', 44, '2017-12-19 09:41:03'),
(84, 'Royal Exchange', 45, '2017-12-19 09:41:59'),
(85, 'MHS', 46, '2017-12-19 09:48:16'),
(86, 'Premier Medic Aid', 47, '2017-12-19 09:49:23'),
(87, 'RodingHealth', 49, '2017-12-19 09:50:08'),
(89, 'UltimateHealth', 50, '2017-12-19 09:51:04'),
(90, 'Health Partner', 52, '2017-12-19 09:52:10'),
(91, 'KBL', 53, '2017-12-19 09:52:42'),
(92, 'Century MedicAid', 54, '2017-12-19 09:53:33'),
(93, 'Novo Health', 56, '2017-12-19 09:54:22'),
(94, 'Sterling', 58, '2017-12-19 09:55:13'),
(95, 'Medexia', 59, '2017-12-19 09:55:41'),
(96, 'IHMS', 60, '2017-12-19 09:56:26');

-- --------------------------------------------------------

--
-- Table structure for table `billingservice`
--

CREATE TABLE `billingservice` (
  `billingservice` int(11) NOT NULL,
  `billclient` varchar(40) NOT NULL,
  `billplan` int(3) NOT NULL,
  `itemcategory` int(2) NOT NULL,
  `item` int(3) NOT NULL,
  `staffid` int(2) NOT NULL,
  `paymentstatus` int(1) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `checkinlog`
--

CREATE TABLE `checkinlog` (
  `checkinid` int(11) NOT NULL,
  `hospitalid` varchar(10) NOT NULL,
  `visitid` varchar(20) NOT NULL,
  `checkintime` time NOT NULL,
  `checkindate` date NOT NULL,
  `checkouttime` time NOT NULL,
  `checkoutdate` date NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `staffid` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkinlog`
--

INSERT INTO `checkinlog` (`checkinid`, `hospitalid`, `visitid`, `checkintime`, `checkindate`, `checkouttime`, `checkoutdate`, `dateadded`, `staffid`) VALUES
(1, 'KN/08b1353', '151217$KN/08b1353', '14:10:08', '2017-12-15', '00:00:00', '0000-00-00', '2017-12-15 13:10:08', 3),
(2, 'KN/08b1353', '181217$KN/08b1353', '11:29:42', '2017-12-18', '16:54:07', '2017-12-18', '2017-12-18 10:29:42', 3),
(3, '003/02/C', '181217$003/02/C', '12:04:36', '2017-12-18', '16:57:25', '2017-12-18', '2017-12-18 11:04:36', 3),
(5, '004/685', '181217$004/685', '14:39:08', '2017-12-18', '16:58:11', '2017-12-18', '2017-12-18 13:39:08', 3),
(6, '003/02/D', '181217$003/02/D', '14:44:39', '2017-12-18', '16:58:11', '2017-12-18', '2017-12-18 13:44:39', 3),
(7, '111/02/D', '181217$111/02/D', '14:55:39', '2017-12-18', '16:58:11', '2017-12-18', '2017-12-18 13:55:39', 3),
(8, '077/4879', '181217$077/4879', '14:56:20', '2017-12-18', '16:58:14', '2017-12-18', '2017-12-18 13:56:20', 3),
(9, '004/155/A', '181217$004/155/A', '17:10:23', '2017-12-18', '19:30:57', '2017-12-18', '2017-12-18 16:10:23', 3),
(10, '100/07/B', '181217$100/07/B', '17:39:36', '2017-12-18', '19:30:54', '2017-12-18', '2017-12-18 16:39:36', 3),
(11, '004/682/B', '181217$004/682/B', '18:11:08', '2017-12-18', '19:30:52', '2017-12-18', '2017-12-18 17:11:08', 3),
(12, '072/86/B', '181217$072/86/B', '19:30:47', '2017-12-18', '00:00:00', '0000-00-00', '2017-12-18 18:30:47', 3),
(13, '035/12', '181217$035/12', '20:25:48', '2017-12-18', '00:00:00', '0000-00-00', '2017-12-18 19:25:48', 3),
(14, '202/05/B', '191217$202/05/B', '08:58:49', '2017-12-19', '09:05:07', '2017-12-19', '2017-12-19 07:58:49', 3),
(16, '202/05/c', '191217$202/05/c', '09:04:48', '2017-12-19', '10:45:05', '2017-12-19', '2017-12-19 08:04:48', 3),
(20, '202/05', '191217$202/05', '09:43:31', '2017-12-19', '10:45:06', '2017-12-19', '2017-12-19 08:43:31', 3),
(21, '004/666', '191217$004/666', '10:23:48', '2017-12-19', '10:45:09', '2017-12-19', '2017-12-19 09:23:48', 3),
(22, '035/40', '191217$035/40', '10:36:45', '2017-12-19', '10:45:12', '2017-12-19', '2017-12-19 09:36:45', 3),
(23, '077/4896', '191217$077/4896', '10:47:44', '2017-12-19', '12:20:48', '2017-12-19', '2017-12-19 09:47:44', 3),
(24, '004/727/B', '191217$004/727/B', '12:06:14', '2017-12-19', '12:20:49', '2017-12-19', '2017-12-19 11:06:14', 3),
(25, '004/727/E', '191217$004/727/E', '12:11:15', '2017-12-19', '12:20:50', '2017-12-19', '2017-12-19 11:11:15', 3),
(26, '004/727/ C', '191217$004/727/ C', '12:15:16', '2017-12-19', '16:41:11', '2017-12-19', '2017-12-19 11:15:16', 3),
(27, '072/59/B', '191217$072/59/B', '12:18:26', '2017-12-19', '16:41:12', '2017-12-19', '2017-12-19 11:18:26', 3),
(28, '004/298', '191217$004/298', '13:39:09', '2017-12-19', '16:41:13', '2017-12-19', '2017-12-19 12:39:09', 3),
(29, '004/874', '191217$004/874', '13:45:44', '2017-12-19', '16:41:14', '2017-12-19', '2017-12-19 12:45:44', 3),
(30, '004/223', '191217$004/223', '13:49:39', '2017-12-19', '16:41:17', '2017-12-19', '2017-12-19 12:49:39', 3),
(31, '004/650', '191217$004/650', '16:41:00', '2017-12-19', '17:21:35', '2017-12-19', '2017-12-19 15:41:00', 3),
(32, '004/642', '191217$004/642', '16:44:24', '2017-12-19', '17:21:37', '2017-12-19', '2017-12-19 15:44:24', 3),
(33, '0672', '191217$0672', '18:15:19', '2017-12-19', '18:53:33', '2017-12-19', '2017-12-19 17:15:19', 3),
(34, '004/487', '201217$004/487', '12:19:14', '2017-12-20', '13:03:46', '2017-12-20', '2017-12-20 11:19:14', 17),
(35, '044/20', '201217$044/20', '13:00:28', '2017-12-20', '13:03:52', '2017-12-20', '2017-12-20 12:00:28', 17),
(36, '076/10', '201217$076/10', '13:00:59', '2017-12-20', '13:03:54', '2017-12-20', '2017-12-20 12:00:59', 17),
(37, '004/874', '201217$004/874', '13:01:35', '2017-12-20', '13:03:58', '2017-12-20', '2017-12-20 12:01:35', 17),
(38, '004/298', '201217$004/298', '14:38:41', '2017-12-20', '15:14:20', '2017-12-20', '2017-12-20 13:38:41', 17),
(39, '077/4897', '201217$077/4897', '15:05:02', '2017-12-20', '15:14:22', '2017-12-20', '2017-12-20 14:05:02', 17),
(40, '012/16', '201217$012/16', '15:11:04', '2017-12-20', '15:14:25', '2017-12-20', '2017-12-20 14:11:04', 17),
(41, '004/755', '201217$004/755', '15:24:50', '2017-12-20', '00:00:00', '0000-00-00', '2017-12-20 14:24:50', 17);

-- --------------------------------------------------------

--
-- Table structure for table `consultation_complaints`
--

CREATE TABLE `consultation_complaints` (
  `consultation_complaintsid` int(11) NOT NULL,
  `visitid` varchar(20) NOT NULL,
  `complaint` varchar(200) NOT NULL,
  `duration` varchar(10) NOT NULL,
  `history` text NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consultation_complaints`
--

INSERT INTO `consultation_complaints` (`consultation_complaintsid`, `visitid`, `complaint`, `duration`, `history`, `dateadded`) VALUES
(1, '151217$KN/08b1353', 'back pain', '3-5 days', '', '2017-12-15 13:32:37'),
(2, '151217$KN/08b1353', 'headache', '1-2 days', '', '2017-12-15 13:33:49'),
(3, '181217$004/685', 'headache,body pain,chills,loss', '> 5 days', 'fever ass with cills and rigor,mild to moderate ass loss of appetite,generalised headache no vomiting', '2017-12-18 14:18:13'),
(5, '181217$111/02/D', 'fever,loss of appetite,cattarh', '3-5 days', 'fever mild to moderate ass loss of appetite no vomiting no passage of watery  stool', '2017-12-18 14:32:29'),
(6, '181217$077/4879', 'breast milk discharge in the b', '> 5 days', 'milk discharge after pressing', '2017-12-18 14:45:40'),
(7, '181217$003/02/D', 'cough ,abdominal pain', '3-5 days', 'cough not productive more in the night ,no chest pain ,no difficulty in breathing', '2017-12-18 14:49:49'),
(8, '181217$KN/08b1353', 'antihypertensive refill', '> 5 days', 'minor waist pain', '2017-12-18 16:17:24'),
(10, '181217$004/682/B', 'antihypertensive refill,...', '> 5 days', '', '2017-12-18 17:22:13'),
(11, '191217$004/642', 'abdominal pain', '3-5 days', 'non radiating, waxes and wanes, hooking in nature', '2017-12-19 16:37:16'),
(12, '191217$004/642', 'cough and catarrh', '3-5 days', '', '2017-12-19 16:37:41');

-- --------------------------------------------------------

--
-- Table structure for table `consultation_diagnosis`
--

CREATE TABLE `consultation_diagnosis` (
  `consultation_diagnosisid` int(11) NOT NULL,
  `visitid` varchar(20) NOT NULL,
  `diagnosisid` varchar(10) NOT NULL,
  `staffid` int(2) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consultation_diagnosis`
--

INSERT INTO `consultation_diagnosis` (`consultation_diagnosisid`, `visitid`, `diagnosisid`, `staffid`, `comment`, `dateadded`) VALUES
(1, '151217$KN/08b1353', '3', 0, '', '2017-12-15 13:42:55'),
(2, '181217$004/685', '1', 0, '', '2017-12-18 14:22:16'),
(3, '181217$111/02/D', '1', 0, '', '2017-12-18 14:37:04'),
(4, '181217$003/02/D', '23', 0, '', '2017-12-18 14:53:09'),
(5, '181217$003/02/D', '50', 0, '', '2017-12-18 14:55:36'),
(6, '181217$KN/08b1353', '29', 0, 'good bp control', '2017-12-18 16:24:10'),
(7, '181217$004/682/B', '29', 0, 'good bp control', '2017-12-18 17:27:02'),
(8, '181217$004/682/B', '79', 0, 'right lymphadenopathy?cause', '2017-12-18 17:28:41'),
(9, '191217$004/642', '69', 0, 'acute abdomen ?cause', '2017-12-19 16:41:23'),
(10, '191217$004/642', '40', 0, '', '2017-12-19 16:42:11');

-- --------------------------------------------------------

--
-- Table structure for table `consultation_gexamination`
--

CREATE TABLE `consultation_gexamination` (
  `id` int(11) NOT NULL,
  `visitid` varchar(20) NOT NULL,
  `examinationresult` text NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consultation_gexamination`
--

INSERT INTO `consultation_gexamination` (`id`, `visitid`, `examinationresult`, `dateadded`) VALUES
(1, '151217$KN/08b1353', '<b>Febrile</b> - Yes, <b>Cyanosed</b> - No, <b>Jaundiced</b> - No, <b>Hydrated</b> - No, <b>Oedema</b> - No', '2017-12-15 13:35:09'),
(2, '181217$004/685', '<b>Febrile</b> - No, <b>Cyanosed</b> - No, <b>Jaundiced</b> - No, <b>Hydrated</b> - Yes, <b>Oedema</b> - No', '2017-12-18 14:19:45'),
(3, '181217$111/02/D', '<b>Febrile</b> - Yes, <b>Cyanosed</b> - No, <b>Jaundiced</b> - No, <b>Hydrated</b> - Yes, <b>Oedema</b> - No', '2017-12-18 14:33:29'),
(4, '181217$077/4879', '<b>Febrile</b> - No, <b>Cyanosed</b> - No, <b>Jaundiced</b> - No, <b>Hydrated</b> - Yes, <b>Oedema</b> - No', '2017-12-18 14:47:12'),
(5, '181217$003/02/D', '<b>Febrile</b> - No, <b>Cyanosed</b> - No, <b>Jaundiced</b> - No, <b>Hydrated</b> - Yes, <b>Oedema</b> - No', '2017-12-18 14:50:10'),
(6, '181217$KN/08b1353', '<b>Febrile</b> - No, <b>Cyanosed</b> - No, <b>Jaundiced</b> - No, <b>Hydrated</b> - Yes, <b>Oedema</b> - No', '2017-12-18 16:18:08'),
(8, '181217$004/682/B', '<b>Febrile</b> - No, <b>Cyanosed</b> - No, <b>Jaundiced</b> - No, <b>Hydrated</b> - Yes, <b>Oedema</b> - No', '2017-12-18 17:22:58'),
(9, '191217$004/642', '<b>Febrile</b> - No, <b>Cyanosed</b> - No, <b>Jaundiced</b> - No, <b>Hydrated</b> - Yes, <b>Oedema</b> - No', '2017-12-19 16:40:31');

-- --------------------------------------------------------

--
-- Table structure for table `consultation_pexaminationlist`
--

CREATE TABLE `consultation_pexaminationlist` (
  `pexamination_listid` int(11) NOT NULL,
  `examcategory` varchar(40) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consultation_pexaminationlist`
--

INSERT INTO `consultation_pexaminationlist` (`pexamination_listid`, `examcategory`, `dateadded`) VALUES
(1, 'Systemic', '2017-10-29 03:38:11'),
(2, 'Respiratory', '2017-10-29 03:38:11'),
(3, 'Abdominal', '2017-11-08 09:06:29'),
(4, 'Central Nervous System', '2017-11-08 09:06:29'),
(5, 'Musculo-Skeletal System', '2017-11-08 09:07:13'),
(6, 'Genitaurinary', '2017-11-08 09:07:13'),
(7, 'Cardiovascular', '2017-11-08 09:07:32'),
(8, 'EENT', '2017-11-08 09:07:32');

-- --------------------------------------------------------

--
-- Table structure for table `consultation_prescription`
--

CREATE TABLE `consultation_prescription` (
  `consult_prescribeid` int(11) NOT NULL,
  `visitid` varchar(20) NOT NULL,
  `drugid` int(3) NOT NULL,
  `qtyrequested` varchar(5) NOT NULL,
  `dosage` varchar(10) NOT NULL,
  `qtydispensed` int(5) NOT NULL,
  `reason` varchar(400) NOT NULL,
  `qtyleft` int(5) NOT NULL,
  `reqdocid` int(3) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consultation_prescription`
--

INSERT INTO `consultation_prescription` (`consult_prescribeid`, `visitid`, `drugid`, `qtyrequested`, `dosage`, `qtydispensed`, `reason`, `qtyleft`, `reqdocid`, `dateadded`) VALUES
(1, '151217$KN/08b1353', 10, '60', '5 x 2 x 6', 60, '', 140, 0, '2017-12-15 13:44:16'),
(2, '151217$KN/08b1353', 18, '3', '1 x 1 x 3', 0, '', 0, 0, '2017-12-15 15:55:23'),
(3, '181217$004/685', 182, '6', '1 x 2 x 3', 6, '', 994, 0, '2017-12-18 14:23:34'),
(4, '181217$004/685', 18, '18', '2 x 3 x 3', 18, '', 582, 0, '2017-12-18 14:24:20'),
(5, '181217$004/685', 160, '15', '1 x 3 x 5', 15, '', 985, 0, '2017-12-18 14:25:46'),
(6, '181217$004/685', 39, '10', '2 x 1 x 5', 10, '', 590, 0, '2017-12-18 14:27:12'),
(7, '181217$111/02/D', 185, '6', '1 x 2 x 3', 6, '', 994, 0, '2017-12-18 14:41:28'),
(8, '181217$111/02/D', 16, '45', '5 x 3 x 3', 45, '', 355, 0, '2017-12-18 14:42:42'),
(9, '181217$111/02/D', 170, '75', '5 x 3 x 5', 75, '', 925, 0, '2017-12-18 14:43:37'),
(10, '181217$003/02/D', 46, '2', '2 x 1 x 1', 2, '', 598, 0, '2017-12-18 14:53:54'),
(11, '181217$003/02/D', 49, '10', '1 x 2 x 5', 10, '', 590, 0, '2017-12-18 14:56:30'),
(12, '181217$003/02/D', 18, '9', '1 x 3 x 3', 9, '', 573, 0, '2017-12-18 14:57:42'),
(13, '181217$KN/08b1353', 18, '18', '2 x 3 x 3', 0, '', 0, 0, '2017-12-18 15:42:58'),
(15, '181217$004/682/B', 149, '30', '1 x 1 x 30', 30, '', 970, 0, '2017-12-18 17:29:49'),
(16, '181217$004/682/B', 153, '30', '1 x 1 x 30', 30, '', 970, 0, '2017-12-18 17:30:26'),
(17, '181217$004/682/B', 50, '15', '1 x 3 x 5', 15, '', 585, 0, '2017-12-18 17:31:50'),
(18, '191217$004/642', 212, '10', '1 x 2 x 5', 0, '', 0, 0, '2017-12-19 16:42:57'),
(19, '191217$004/642', 4, '8', '1 x 2 x 4', 0, '', 0, 0, '2017-12-19 16:44:27'),
(20, '191217$004/642', 115, '0', 'x 2 x 5', 0, '', 0, 0, '2017-12-19 16:45:43'),
(22, '191217$004/642', 18, '9', '1 x 3 x 3', 0, '', 0, 0, '2017-12-19 16:46:43');

-- --------------------------------------------------------

--
-- Table structure for table `consultation_queue`
--

CREATE TABLE `consultation_queue` (
  `consultation_queueid` int(11) NOT NULL,
  `visitid` varchar(20) NOT NULL,
  `checkintime` time NOT NULL,
  `checkindate` date NOT NULL,
  `checkouttime` time NOT NULL,
  `checkoutdate` date NOT NULL,
  `senderid` int(3) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consultation_queue`
--

INSERT INTO `consultation_queue` (`consultation_queueid`, `visitid`, `checkintime`, `checkindate`, `checkouttime`, `checkoutdate`, `senderid`, `dateadded`) VALUES
(1, '151217$KN/08b1353', '14:17:34', '2017-12-15', '00:00:00', '0000-00-00', 0, '2017-12-15 13:17:34'),
(2, '181217$KN/08b1353', '11:36:26', '2017-12-18', '00:00:00', '0000-00-00', 0, '2017-12-18 10:36:26'),
(3, '181217$003/02', '14:09:01', '2017-12-18', '00:00:00', '0000-00-00', 0, '2017-12-18 13:09:01'),
(4, '181217$004/685', '14:58:23', '2017-12-18', '15:28:18', '2017-12-18', 0, '2017-12-18 13:58:23'),
(5, '181217$003/02/D', '15:03:05', '2017-12-18', '15:58:07', '2017-12-18', 0, '2017-12-18 14:03:05'),
(6, '181217$111/02/D', '15:15:44', '2017-12-18', '15:44:15', '2017-12-18', 0, '2017-12-18 14:15:44'),
(7, '181217$077/4879', '15:21:54', '2017-12-18', '15:48:09', '2017-12-18', 0, '2017-12-18 14:21:54'),
(8, '181217$004/682/B', '18:17:42', '2017-12-18', '18:32:04', '2017-12-18', 0, '2017-12-18 17:17:42'),
(9, '181217$072/86/B', '20:05:50', '2017-12-18', '00:00:00', '0000-00-00', 0, '2017-12-18 19:05:50'),
(11, '181217$035/12', '20:33:06', '2017-12-18', '00:00:00', '0000-00-00', 0, '2017-12-18 19:33:06'),
(12, '191217$202/05', '10:20:34', '2017-12-19', '00:00:00', '0000-00-00', 0, '2017-12-19 09:20:34'),
(13, '191217$004/666', '11:07:39', '2017-12-19', '00:00:00', '0000-00-00', 0, '2017-12-19 10:07:39'),
(14, '191217$035/40', '11:15:44', '2017-12-19', '00:00:00', '0000-00-00', 0, '2017-12-19 10:15:44'),
(15, '191217$077/4896', '11:20:00', '2017-12-19', '00:00:00', '0000-00-00', 0, '2017-12-19 10:20:00'),
(16, '191217$004/727/B', '12:23:20', '2017-12-19', '00:00:00', '0000-00-00', 0, '2017-12-19 11:23:20'),
(17, '191217$004/727/E', '12:26:03', '2017-12-19', '00:00:00', '0000-00-00', 0, '2017-12-19 11:26:03'),
(18, '191217$004/727/ C', '12:30:55', '2017-12-19', '00:00:00', '0000-00-00', 0, '2017-12-19 11:30:55'),
(19, '191217$072/59/B', '12:36:28', '2017-12-19', '00:00:00', '0000-00-00', 0, '2017-12-19 11:36:28'),
(20, '191217$004/298', '14:08:53', '2017-12-19', '00:00:00', '0000-00-00', 0, '2017-12-19 13:08:53'),
(21, '191217$004/874', '14:12:46', '2017-12-19', '00:00:00', '0000-00-00', 0, '2017-12-19 13:12:46'),
(22, '191217$004/223', '14:15:30', '2017-12-19', '00:00:00', '0000-00-00', 0, '2017-12-19 13:15:30'),
(23, '191217$004/650', '17:03:50', '2017-12-19', '00:00:00', '0000-00-00', 0, '2017-12-19 16:03:50'),
(24, '191217$004/642', '17:09:17', '2017-12-19', '17:46:57', '2017-12-19', 0, '2017-12-19 16:09:17'),
(26, '191217$0672', '18:57:57', '2017-12-19', '00:00:00', '0000-00-00', 0, '2017-12-19 17:57:57'),
(27, '201217$004/487', '12:36:36', '2017-12-20', '00:00:00', '0000-00-00', 0, '2017-12-20 11:36:36'),
(28, '201217$044/20', '13:12:18', '2017-12-20', '00:00:00', '0000-00-00', 0, '2017-12-20 12:12:18'),
(29, '201217$076/10', '13:14:57', '2017-12-20', '00:00:00', '0000-00-00', 0, '2017-12-20 12:14:57'),
(30, '201217$004/874', '13:21:20', '2017-12-20', '00:00:00', '0000-00-00', 0, '2017-12-20 12:21:20');

-- --------------------------------------------------------

--
-- Table structure for table `consultation_sexamination`
--

CREATE TABLE `consultation_sexamination` (
  `consultation_pexaminationid` int(11) NOT NULL,
  `visitid` varchar(20) NOT NULL,
  `examinationcategory` int(2) NOT NULL,
  `observation` text NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consultation_sexamination`
--

INSERT INTO `consultation_sexamination` (`consultation_pexaminationid`, `visitid`, `examinationcategory`, `observation`, `dateadded`) VALUES
(1, '151217$KN/08b1353', 4, 'concious and alert.', '2017-12-15 13:37:43'),
(3, '151217$KN/08b1353', 5, 'nill obvious swelling,no muscle wasting,no diff warmth', '2017-12-15 14:31:31'),
(4, '181217$004/685', 7, 'system nill of note', '2017-12-18 14:20:39'),
(5, '181217$111/02/D', 3, 'full ,mwr.nill tendernss  liver spleen and kidney not palpable', '2017-12-18 14:34:19'),
(7, '181217$077/4879', 5, 'no obvious abrormality seen on breast examination', '2017-12-18 14:46:46'),
(8, '181217$003/02/D', 3, 'full ,move with respiration ,no area of tenderness,liver spleen and kidney not palpable', '2017-12-18 14:51:51'),
(9, '181217$003/02/D', 2, 'crepitations', '2017-12-18 14:54:44'),
(10, '181217$KN/08b1353', 3, 'slightly raised isolated hyperpigmented mass', '2017-12-18 16:22:22'),
(11, '181217$004/682/B', 1, 'NAD', '2017-12-18 17:23:50'),
(12, '181217$004/682/B', 3, 'NAD', '2017-12-18 17:24:03'),
(13, '181217$004/682/B', 7, 'NAD', '2017-12-18 17:24:10'),
(14, '181217$004/682/B', 4, 'NAD', '2017-12-18 17:24:21'),
(15, '181217$004/682/B', 2, 'NAD', '2017-12-18 17:24:36'),
(16, '181217$004/682/B', 5, 'right isolated mass\n2 by 2cm,\nnil differential warmth\nnon cystic', '2017-12-18 17:26:22'),
(17, '191217$004/642', 3, 'NAD (same as others)', '2017-12-19 16:40:14');

-- --------------------------------------------------------

--
-- Table structure for table `consultation_symptoms`
--

CREATE TABLE `consultation_symptoms` (
  `consultation_symptomsid` int(11) NOT NULL,
  `visitid` varchar(10) NOT NULL,
  `symptomid` int(3) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis_supercode`
--

CREATE TABLE `diagnosis_supercode` (
  `id` int(11) NOT NULL,
  `diagnosis_l3id` varchar(10) NOT NULL,
  `diagnosis_l2` varchar(100) NOT NULL,
  `diagnosis_l2range` varchar(15) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diagnosis_supercode`
--

INSERT INTO `diagnosis_supercode` (`id`, `diagnosis_l3id`, `diagnosis_l2`, `diagnosis_l2range`, `dateadded`) VALUES
(1, 'A00-B99', 'Intestinal infectious diseases', 'A00-A09', '2017-11-07 09:19:20'),
(2, 'A00-B99', 'Tuberculosis', 'A15-A19', '2017-11-07 09:19:20'),
(3, 'A00-B99', 'Certain zoonotic bacterial diseases', 'A20-A28', '2017-11-07 09:19:57'),
(4, 'A00-B99', 'Other bacterial diseases', 'A30-A49', '2017-11-07 09:19:57'),
(5, 'A00-B99', 'Infections with a predominantly sexual mode of transmission', 'A50-A64', '2017-11-07 09:20:30'),
(6, 'A00-B99', 'Other spirochetal diseases', 'A65-A69', '2017-11-07 09:20:30'),
(7, 'A00-B99', 'Other diseases caused by chlamydiae', 'A70-A74', '2017-11-07 09:21:06'),
(8, 'A00-B99', 'Rickettsioses', 'A75-A79', '2017-11-07 09:21:06'),
(9, 'A00-B99', 'Viral and prion infections of the central nervous system', 'A80-A89', '2017-11-07 09:21:36'),
(10, 'A00-B99', 'Arthropod-borne viral fevers and viral hemorrhagic fevers', 'A90-A99', '2017-11-07 09:21:36'),
(11, 'A00-B99', 'Viral infections characterized by skin and mucous membrane lesions', 'B00-B09', '2017-11-07 09:22:12'),
(12, 'A00-B99', 'Other human herpesviruses', 'B10-B10', '2017-11-07 09:22:12'),
(13, 'A00-B99', 'Viral hepatitis', 'B15-B19', '2017-11-07 09:22:46'),
(14, 'A00-B99', 'Human immunodeficiency virus [HIV] disease', 'B20-B20', '2017-11-07 09:22:46'),
(15, 'A00-B99', 'Other viral diseases', 'B25-B34', '2017-11-07 09:23:16'),
(16, 'A00-B99', 'Mycoses', 'B35-B49', '2017-11-07 09:23:16'),
(17, 'A00-B99', 'Protozoal diseases', 'B50-B64', '2017-11-07 09:23:46'),
(18, 'A00-B99', 'Helminthiases', 'B65-B83', '2017-11-07 09:23:46'),
(19, 'A00-B99', 'Pediculosis, acariasis and other infestations', 'B85-B89', '2017-11-07 09:24:19'),
(20, 'A00-B99', 'Sequelae of infectious and parasitic diseases', 'B90-B94', '2017-11-07 09:24:19'),
(21, 'A00-B99', 'Bacterial and viral infectious agents', 'B95-B97', '2017-11-07 09:24:51'),
(22, 'A00-B99', 'Other infectious diseases', 'B99-B99', '2017-11-07 09:24:51'),
(23, 'C00-D49', 'Malignant neoplasms of lip, oral cavity and pharynx', 'C00-C14 ', '2017-11-07 09:28:20'),
(24, 'C00-D49', 'Malignant neoplasms of digestive organs', 'C15-C26', '2017-11-07 09:28:20'),
(25, 'C00-D49', 'Malignant neoplasms of respiratory and intrathoracic organs', 'C30-C39', '2017-11-07 09:29:30'),
(26, 'C00-D49', 'Malignant neoplasms of bone and articular cartilage', 'C40-C41', '2017-11-07 09:29:30'),
(27, 'C00-D49', 'Melanoma and other malignant neoplasms of skin', 'C43-C44', '2017-11-07 09:30:09'),
(28, 'C00-D49', 'Malignant neoplasms of mesothelial and soft tissue', 'C45-C49', '2017-11-07 09:30:09'),
(29, 'C00-D49', 'Malignant neoplasms of breast', 'C50-C50', '2017-11-07 09:30:39'),
(30, 'C00-D49', 'Malignant neoplasms of female genital organs', 'C51-C58', '2017-11-07 09:30:39'),
(31, 'C00-D49', 'Malignant neoplasms of male genital organs', 'C60-C63', '2017-11-07 09:35:30'),
(32, 'C00-D49', 'Malignant neoplasms of urinary tract', 'C64-C68', '2017-11-07 09:35:30'),
(33, 'C00-D49', 'Malignant neoplasms of eye, brain and other parts of central nervous system', 'C69-C72', '2017-11-07 09:36:00'),
(34, 'C00-D49', 'Malignant neoplasms of thyroid and other endocrine glands', 'C73-C75', '2017-11-07 09:36:00'),
(35, 'C00-D49', 'Malignant neoplasms of ill-defined, other secondary and unspecified sites', 'C76-C80', '2017-11-07 09:36:35'),
(36, 'C00-D49', 'Malignant neuroendocrine tumors', 'C7A-C7A', '2017-11-07 09:36:35'),
(37, 'C00-D49', 'Secondary neuroendocrine tumors', 'C7B-C7B', '2017-11-07 09:37:07'),
(38, 'C00-D49', 'Malignant neoplasms of lymphoid, hematopoietic and related tissue', 'C81-C96', '2017-11-07 09:37:07'),
(39, 'C00-D49', 'In situ neoplasms', 'D00-D09', '2017-11-07 09:37:36'),
(40, 'C00-D49', 'Benign neoplasms, except benign neuroendocrine tumors', 'D10-D36', '2017-11-07 09:37:36'),
(41, 'C00-D49', 'Neoplasms of uncertain behavior, polycythemia vera and myelodysplastic syndromes', 'D37-D48', '2017-11-07 09:38:13'),
(42, 'C00-D49', 'Benign neuroendocrine tumors', 'D3A-D3A', '2017-11-07 09:38:13'),
(43, 'C00-D49', 'Neoplasms of unspecified behavior', 'D49-D49', '2017-11-07 09:38:33'),
(44, 'D50-D89', 'Nutritional anemias', 'D50-D53', '2017-11-07 09:47:00'),
(45, 'D50-D89', 'Hemolytic anemias', 'D55-D59', '2017-11-07 09:47:00'),
(46, 'D50-D89', 'Aplastic and other anemias and other bone marrow failure syndromes', 'D60-D64', '2017-11-07 09:48:10'),
(47, 'D50-D89', 'Coagulation defects, purpura and other hemorrhagic conditions', 'D65-D69', '2017-11-07 09:48:10'),
(48, 'D50-D89', 'Other disorders of blood and blood-forming organs', 'D70-D77', '2017-11-07 09:49:09'),
(49, 'D50-D89', 'Intraoperative and postprocedural complications of the spleen', 'D78-D78', '2017-11-07 09:49:09'),
(50, 'D50-D89', 'Certain disorders involving the immune mechanism', 'D80-D89', '2017-11-07 09:49:28'),
(51, 'E00-E89', 'Disorders of thyroid gland', 'E00-E07', '2017-11-07 09:51:04'),
(52, 'E00-E89', 'Diabetes mellitus', 'E08-E13', '2017-11-07 09:51:04'),
(53, 'E15-E16', 'Other disorders of glucose regulation and pancreatic internal secretion', 'E00-E89', '2017-11-07 09:52:16'),
(54, 'E20-E35', 'Disorders of other endocrine glands', 'E00-E89', '2017-11-07 09:52:16'),
(55, 'E36-E36', 'Intraoperative complications of endocrine system', 'E00-E89', '2017-11-07 09:52:59'),
(56, 'E40-E46', 'Malnutrition', 'E00-E89', '2017-11-07 09:52:59'),
(57, 'E50-E64', 'Other nutritional deficiencies', 'E00-E89', '2017-11-07 09:53:49'),
(58, 'E65-E68', 'Overweight, obesity and other hyperalimentation', 'E00-E89', '2017-11-07 09:53:49'),
(59, 'E70-E88', 'Metabolic disorders', 'E00-E89', '2017-11-07 09:54:33'),
(60, 'E89-E89', 'Postprocedural endocrine and metabolic complications and disorders, not elsewhere classified', 'E00-E89', '2017-11-07 09:54:33');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis_supercode2`
--

CREATE TABLE `diagnosis_supercode2` (
  `supercodeid` int(11) NOT NULL,
  `diagnosis_l3` varchar(100) NOT NULL,
  `diagnosis_l3range` varchar(11) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diagnosis_supercode2`
--

INSERT INTO `diagnosis_supercode2` (`supercodeid`, `diagnosis_l3`, `diagnosis_l3range`, `dateadded`) VALUES
(1, 'Certain infectious and parasitic diseases', 'A00-B99', '2017-11-07 08:58:17'),
(2, 'Neoplasms', 'C00-D49', '2017-11-07 08:58:17'),
(3, 'Diseases of the blood and blood-forming organs', 'D50-D89', '2017-11-07 08:59:05'),
(4, 'Endocrine, nutritional and metabolic diseases', 'E00-E89', '2017-11-07 08:59:05'),
(5, 'Mental, Behavioral and Neurodevelopmental disorder', 'F01-F99', '2017-11-07 09:00:07'),
(6, 'Diseases of the nervous system', 'G00-G99', '2017-11-07 09:00:07'),
(7, 'Diseases of the eye and adnexa', 'H00-H59', '2017-11-07 09:00:40'),
(8, 'Diseases of the ear and mastoid process', 'H60-H95', '2017-11-07 09:00:40'),
(9, 'Diseases of the circulatory system', 'I00-I99', '2017-11-07 09:01:26'),
(10, 'Diseases of the respiratory system', 'J00-J99', '2017-11-07 09:01:26'),
(11, 'Diseases of the digestive system', 'K00-K95', '2017-11-07 09:01:52'),
(12, 'Diseases of the skin and subcutaneous tissue', 'L00-L99', '2017-11-07 09:01:52'),
(13, 'Diseases of the musculoskeletal system and connective tissue', 'M00-M99', '2017-11-07 09:02:54'),
(14, 'Diseases of the genitourinary system', 'N00-N99', '2017-11-07 09:02:54'),
(15, 'Pregnancy, childbirth and the puerperium', 'O00-O9A', '2017-11-07 09:03:24'),
(16, 'Certain conditions originating in the perinatal period', 'P00-P96', '2017-11-07 09:03:24'),
(17, 'Congenital malformations, deformations and chromosomal abnormalities', 'Q00-Q99', '2017-11-07 09:04:00'),
(18, 'Symptoms, signs and abnormal clinical and laboratory findings, not elsewhere classified', 'R00-R99', '2017-11-07 09:04:00'),
(19, 'Injury, poisoning and certain other consequences of external causes', 'S00-T88', '2017-11-07 09:04:38'),
(20, 'External causes of morbidity', 'V00-Y99', '2017-11-07 09:04:38'),
(21, 'Factors influencing health status and contact with health services', 'Z00-Z99', '2017-11-07 09:04:49');

-- --------------------------------------------------------

--
-- Table structure for table `investigation_bi`
--

CREATE TABLE `investigation_bi` (
  `investigation_BI` int(11) NOT NULL,
  `investigationbi_id` int(3) NOT NULL,
  `investigationsai_id` int(3) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `investigation_bi`
--

INSERT INTO `investigation_bi` (`investigation_BI`, `investigationbi_id`, `investigationsai_id`, `dateadded`) VALUES
(1, 21, 10, '2017-11-03 13:34:54'),
(3, 21, 13, '2017-11-03 14:17:10');

-- --------------------------------------------------------

--
-- Table structure for table `investigation_dd`
--

CREATE TABLE `investigation_dd` (
  `investigation_DD` int(11) NOT NULL,
  `investigationid` int(3) NOT NULL,
  `ddvalue` varchar(20) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `investigation_dd`
--

INSERT INTO `investigation_dd` (`investigation_DD`, `investigationid`, `ddvalue`, `dateadded`) VALUES
(1, 26, '+', '2017-11-03 15:39:16'),
(3, 26, '++', '2017-11-03 16:21:27'),
(4, 26, '+++', '2017-11-03 16:21:32'),
(5, 26, 'Scanty', '2017-11-03 16:22:01');

-- --------------------------------------------------------

--
-- Table structure for table `investigation_name`
--

CREATE TABLE `investigation_name` (
  `investigation_nameid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `investigation_cat` varchar(4) NOT NULL,
  `private` float NOT NULL,
  `corporate` float NOT NULL,
  `rsltlowerb` varchar(5) NOT NULL,
  `rsltupperb` varchar(5) NOT NULL,
  `additionalinfo` varchar(300) NOT NULL,
  `rslttype` varchar(10) NOT NULL,
  `unit` varchar(10) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `investigation_name`
--

INSERT INTO `investigation_name` (`investigation_nameid`, `name`, `investigation_cat`, `private`, `corporate`, `rsltlowerb`, `rsltupperb`, `additionalinfo`, `rslttype`, `unit`, `dateadded`) VALUES
(1, 'PCV', 'SAI', 250.5, 300, '', '', '', '', '', '2017-10-30 10:39:17'),
(2, 'Widal', 'SAI', 300, 310, '', '', '', '', '', '2017-10-30 10:39:17'),
(4, 'Full Blood Count', 'SAI', 200, 145, '', '', '', '', '', '2017-10-31 10:33:45'),
(7, 'VDRL', 'SAI', 350, 380, '', '', '', '', '', '2017-10-31 10:41:51'),
(8, 'Sickling', 'SAI', 240, 210, '', '', '', '', '', '2017-10-31 10:42:45'),
(9, 'Microfilaria', 'SAI', 140, 200, '', '', '', '', '', '2017-10-31 10:43:28'),
(10, 'Genotype', 'SAI', 125, 140, '', '', '', '', '', '2017-10-31 11:12:47'),
(13, 'Bleeding Time', 'SAI', 340, 250, '', '', '', '', 'mmol/l', '2017-10-31 11:14:37'),
(14, 'Prothroombine time', 'SAI', 250, 260, '', '', '', '', '', '2017-10-31 11:15:07'),
(15, 'Blood pregnancy test', 'SAI', 600, 720, '', '', '', '', '', '2017-10-31 11:16:24'),
(17, 'HbsAg', 'SAI', 600, 720, '', '', '', '', '', '2017-10-31 11:16:45'),
(18, 'Urine M/C/S', 'SAI', 1000, 1200, '', '', '', '', '', '2017-11-03 09:06:02'),
(21, 'Semen Analysis', 'BI', 1200, 1500, '', '', '', '', '', '2017-11-03 09:17:14'),
(22, 'Urine MCS', 'SAI', 134, 125, '', '', '', 'Free text', 'mmol/l', '2017-11-03 12:19:11'),
(23, 'Urine MCSE', 'SAI', 134, 125, '0.4', '1.5', '', 'Free text', 'mmol/l', '2017-11-03 12:20:05'),
(25, 'Urinalysis', 'SAI', 0, 0, '', '', '', 'Free text', '', '2017-11-03 14:36:05'),
(26, 'Malaria Parasite (MP)', 'SAI', 450, 550, '', '', '', 'Optioned', '', '2017-11-03 15:04:45');

-- --------------------------------------------------------

--
-- Table structure for table `investigation_order`
--

CREATE TABLE `investigation_order` (
  `investigation_orderid` int(11) NOT NULL,
  `investigationid` int(3) NOT NULL,
  `ordertime` time NOT NULL,
  `visitid` varchar(20) NOT NULL,
  `result` varchar(100) NOT NULL,
  `resulttime` time NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `investigation_order`
--

INSERT INTO `investigation_order` (`investigation_orderid`, `investigationid`, `ordertime`, `visitid`, `result`, `resulttime`, `dateadded`) VALUES
(1, 13, '14:23:25', '151217$KN/08b1353', '', '00:00:00', '2017-12-15 13:23:25'),
(2, 26, '14:38:55', '151217$KN/08b1353', '', '00:00:00', '2017-12-15 13:38:55'),
(4, 1, '16:52:46', '151217$KN/08b1353', '', '00:00:00', '2017-12-15 15:52:46'),
(5, 26, '15:21:07', '181217$004/685', '', '00:00:00', '2017-12-18 14:21:07'),
(6, 4, '15:35:20', '181217$111/02/D', 'wbc 9000mm/3, neutrophil: 68%, monocyte: 1%, lymph', '00:00:00', '2017-12-18 14:35:20'),
(7, 26, '15:35:29', '181217$111/02/D', '+', '00:00:00', '2017-12-18 14:35:29'),
(8, 1, '15:35:38', '181217$111/02/D', '26%', '00:00:00', '2017-12-18 14:35:38'),
(9, 26, '15:52:09', '181217$003/02/D', 'Scanty', '00:00:00', '2017-12-18 14:52:09'),
(10, 4, '11:17:24', '151217$KN/08b1353', '', '00:00:00', '2017-12-20 10:17:24');

-- --------------------------------------------------------

--
-- Table structure for table `investigation_queue`
--

CREATE TABLE `investigation_queue` (
  `investigation_queue` int(11) NOT NULL,
  `visitid` varchar(20) NOT NULL,
  `checkintime` time NOT NULL,
  `checkindate` date NOT NULL,
  `reqStaffID` int(3) NOT NULL,
  `checkouttime` time NOT NULL,
  `checkoutdate` date NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `investigation_queue`
--

INSERT INTO `investigation_queue` (`investigation_queue`, `visitid`, `checkintime`, `checkindate`, `reqStaffID`, `checkouttime`, `checkoutdate`, `dateadded`) VALUES
(1, '151217$KN/08b1353', '14:39:23', '2017-12-15', 4, '00:00:00', '0000-00-00', '2017-12-15 13:39:23'),
(2, '181217$111/02/D', '15:35:48', '2017-12-18', 4, '15:54:18', '2017-12-18', '2017-12-18 14:35:48'),
(3, '181217$003/02/D', '15:52:13', '2017-12-18', 4, '15:57:47', '2017-12-18', '2017-12-18 14:52:13');

-- --------------------------------------------------------

--
-- Table structure for table `mshdiagnosis`
--

CREATE TABLE `mshdiagnosis` (
  `diagnosisid` int(11) NOT NULL,
  `diagnosis` varchar(100) NOT NULL,
  `icdcode` varchar(20) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mshdiagnosis`
--

INSERT INTO `mshdiagnosis` (`diagnosisid`, `diagnosis`, `icdcode`, `dateadded`) VALUES
(1, 'Uncomplicated Malaria', 'B4.5', '2017-11-14 12:33:16'),
(2, 'Severe Malaria', '', '2017-11-14 12:33:16'),
(3, 'Resistant Malaria', '', '2017-11-14 12:33:32'),
(4, 'Malaria in pregnancy', '', '2017-11-14 12:33:32'),
(5, 'Typhoid fever', '', '2017-11-14 12:34:02'),
(6, 'Infectious diarrhea (Gastro enteritis)', '', '2017-11-14 12:34:02'),
(7, 'Non-infective gastroenteritis', '', '2017-11-14 12:34:28'),
(8, 'Constipation', '', '2017-11-14 12:34:28'),
(9, 'Peptic-Ulcer', '', '2017-11-14 12:34:54'),
(10, 'Gastro-esophageal reflux disease', '', '2017-11-14 12:34:54'),
(11, 'Cholera', '', '2017-11-14 12:38:26'),
(12, 'Candidiasis of mouth', '', '2017-11-14 12:38:26'),
(13, 'Antenatal care', '', '2017-11-14 12:38:50'),
(14, 'Antenatal screening', '', '2017-11-14 12:38:50'),
(15, 'Meningococcal infection', '', '2017-11-14 12:39:12'),
(17, 'Measles without complication', '', '2017-11-14 12:39:41'),
(18, 'Measles with complication', '', '2017-11-14 12:39:41'),
(19, 'Vitamin A deficiency', '', '2017-11-14 12:40:00'),
(20, 'Kwashiokhor', '', '2017-11-14 12:40:00'),
(21, 'Marasmic Kwashiokhor', '', '2017-11-14 12:40:38'),
(22, 'Nutritional marasmus', '', '2017-11-14 12:40:38'),
(23, 'Threadworm infection', '', '2017-11-14 12:40:58'),
(24, 'Sickle cell disease without crisis', '', '2017-11-14 12:40:58'),
(25, 'Sickle cell disease with crisis', '', '2017-11-14 12:41:40'),
(26, 'Encounter for immunization', '', '2017-11-14 12:41:40'),
(27, 'Conjuctivitis', '', '2017-11-14 12:42:00'),
(28, 'Essential (Primary) hypertension', '', '2017-11-14 12:42:00'),
(29, 'Secondary hypertension', '', '2017-11-14 12:42:22'),
(30, 'Type 1 Diabetes Mellitus', '', '2017-11-14 12:42:22'),
(31, 'Type 2 Diabetes Mellitus', '', '2017-11-14 12:42:48'),
(32, 'Hypoglycemia', '', '2017-11-14 12:42:48'),
(33, 'Osteoarthritis (Specify location)', '', '2017-11-14 12:43:27'),
(34, 'Urinary tract infection (adult)', '', '2017-11-14 12:43:27'),
(35, 'Urinary tract infection (child)', '', '2017-11-14 12:43:55'),
(36, 'Urinary tract infection (pregnancy)', '', '2017-11-14 12:43:55'),
(37, 'Acute pyelonephritis', '', '2017-11-14 12:45:21'),
(38, 'Acute prostatitis', '', '2017-11-14 12:45:21'),
(39, 'URTI - Influenza', '', '2017-11-14 12:46:25'),
(40, 'URTI - Acute nasopharyngitis (Common cold)', '', '2017-11-14 12:46:25'),
(41, 'URTI - Acute pharyngitis', '', '2017-11-14 12:46:49'),
(42, 'URTI - Acute tonsillitis', '', '2017-11-14 12:46:49'),
(43, 'URTI - Acute Otitis Media', '', '2017-11-14 12:47:18'),
(44, 'URTI - Acute Otitis Externa', '', '2017-11-14 12:47:18'),
(45, 'URTI - Allergic Rhinitis', '', '2017-11-14 14:03:26'),
(46, 'URTI - Acute Rhinitis', '', '2017-11-14 14:03:26'),
(47, 'URTI - Acute Sinusitis', '', '2017-11-14 14:03:52'),
(49, 'LRTI - Acute Cough Bronchitis', '', '2017-11-14 14:04:52'),
(50, 'LRTI - Acute Bronchiolitis', '', '2017-11-14 14:04:52'),
(51, 'LRTI - Acute exacerbation of COPD', '', '2017-11-14 14:06:30'),
(52, 'LRTI - Community Acquired Pneumonia', '', '2017-11-14 14:06:30'),
(53, 'Sexually Transmitted Disease (Specify)', '', '2017-11-14 14:07:37'),
(54, 'Genital Tract Infection - STD screening', '', '2017-11-14 14:07:37'),
(55, 'Genital Tract Infection - Chlamydia trachomatis/Urethritis', '', '2017-11-14 14:09:45'),
(56, 'Genital Tract Infection - Candidiasis of vagina/vagina thrush', '', '2017-11-14 14:09:45'),
(57, 'Genital Tract Infection - Bacterial vaginosis', '', '2017-11-14 14:10:43'),
(58, 'Genital Tract Infection - Trichomoniasis', '', '2017-11-14 14:10:43'),
(59, 'Genital Tract Infection - Pelvic Inflammatory Disease', '', '2017-11-14 14:11:10'),
(60, 'Genital Tract Infection - Impetigo', '', '2017-11-14 14:11:10'),
(61, 'Genital Tract Infection - Eczema', '', '2017-11-14 14:11:30'),
(62, 'Genital Tract Infection - Cellulitis', '', '2017-11-14 14:11:30'),
(63, 'Skin Infections - Leg ulcer', '', '2017-11-14 14:13:26'),
(64, 'Skin infections - Human bite', '', '2017-11-14 14:13:26'),
(65, 'Skin Infections - Animal bite (Specify animal type)', '', '2017-11-14 14:13:57'),
(66, 'Skin Infections - Scabies', '', '2017-11-14 14:13:57'),
(67, 'Skin Infections - Varicella/Chicken pox', '', '2017-11-14 14:14:36'),
(68, 'Skin Infections - Herpes zoster/Shingles', '', '2017-11-14 14:14:36'),
(69, 'Acute Abdomen', '', '2017-11-14 14:15:27'),
(70, 'Injury (Specify type and location i.e laceration/fracture/dislocations)', '', '2017-11-14 14:15:27'),
(71, 'Burns', '', '2017-11-14 14:15:41'),
(72, 'Traffic Accident', '', '2017-11-14 14:15:41'),
(73, 'Migraine', '', '2017-11-14 14:15:48'),
(74, 'Recurrent Urinary Tract Infection in non-pregnant women (? 3 UTIs/year)', '', '2017-11-14 14:17:22'),
(75, 'headaches', 'B4.2', '2017-11-23 10:50:33'),
(77, 'Adeusd', 'A4.5', '2017-11-23 11:08:11'),
(78, 'hasdf', 'G54', '2017-11-23 11:17:15'),
(79, 'Others', '', '2017-12-04 17:11:54');

-- --------------------------------------------------------

--
-- Table structure for table `patient_allergy`
--

CREATE TABLE `patient_allergy` (
  `patient_allergy` int(11) NOT NULL,
  `patientid` varchar(20) NOT NULL,
  `allergy` varchar(100) NOT NULL,
  `additionalinfo` varchar(200) NOT NULL,
  `registrarid` int(3) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_allergy`
--

INSERT INTO `patient_allergy` (`patient_allergy`, `patientid`, `allergy`, `additionalinfo`, `registrarid`, `dateadded`) VALUES
(1, 'KN/08b1353', 'chloroqine', '', 4, '2017-12-15 13:31:21');

-- --------------------------------------------------------

--
-- Table structure for table `patient_register`
--

CREATE TABLE `patient_register` (
  `patientid` int(11) NOT NULL,
  `hospitalid` varchar(10) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `othername` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `maritalstatus` varchar(10) NOT NULL,
  `address` text NOT NULL,
  `phonenumber` varchar(15) NOT NULL,
  `emailaddress` varchar(50) NOT NULL,
  `dateofbirth` date NOT NULL,
  `occupation` varchar(40) NOT NULL,
  `patienttype` int(2) NOT NULL,
  `paymentplan` int(3) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nokname` varchar(50) NOT NULL,
  `nokaddress` text NOT NULL,
  `nokphonenumber` varchar(15) NOT NULL,
  `nokrelationship` varchar(15) NOT NULL,
  `staffid` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_register`
--

INSERT INTO `patient_register` (`patientid`, `hospitalid`, `firstname`, `othername`, `lastname`, `gender`, `maritalstatus`, `address`, `phonenumber`, `emailaddress`, `dateofbirth`, `occupation`, `patienttype`, `paymentplan`, `dateadded`, `nokname`, `nokaddress`, `nokphonenumber`, `nokrelationship`, `staffid`) VALUES
(1, 'KN/08b1353', 'Joseph', '', 'Agbede', 'Male', 'Single', '', '07055518205', '64/65 Ahmadu Bello, Kwara', '2006-02-01', 'Student', 1, 0, '2017-12-15 13:09:35', 'James Ibrahim Bello', 'Surulere, Lagos', '080347752834', 'Brother', 0),
(2, '003/02/C', 'Precious', '', 'Aliu', 'Male', 'Single', '', '08023641012', '', '2003-12-13', 'Student', 4, 0, '2017-12-18 11:04:02', 'Mrs  Aliu Oseame', '18, Bello street Mushin', '08023641012', 'Mother', 0),
(3, '004/685', 'Stephen', '', 'Ivienagbor', 'Male', 'Married', '', '08093232615', '', '1978-04-01', 'Factory worker', 3, 0, '2017-12-18 13:38:33', 'Mrs Ebere Ivienagbor', '3, Jimoh Jinad street, Ilasamaja', '07069243232', 'Mother', 0),
(4, '003/02/D', 'Faith', '', 'Aliu', 'Female', 'Single', '', '08023641012', '', '2006-02-23', 'Student', 4, 0, '2017-12-18 13:41:52', 'Mrs Oseame Aliu', '18, Bello street Mushin', '08023641012', 'Mother', 0),
(5, '077/4879', 'Cherish', '', 'Ebeh', 'Female', 'Single', '', '08109679845', '', '1992-09-06', 'Student', 1, 0, '2017-12-18 13:49:07', 'Emelia Ebeh', '105,Mushin road Isolo', '08103307907', 'Sister', 0),
(6, '111/02/D', 'Isabella', '', 'Ogunbiyi', 'Female', 'Single', '', '07084828885', '', '2016-06-27', 'Child', 4, 0, '2017-12-18 13:55:14', 'Mrs Justina Ogunbiyi', '7, Mustapha Kosoko street Mushin', '07015780242', 'Mother', 0),
(7, '004/155/A', 'Kalu', '', 'Ndubuisi', 'Male', 'Married', '', '08054034058', '', '1972-05-11', 'Panel Beater', 3, 0, '2017-12-18 16:10:08', 'Mrs Juliana Ndubuisi', '10, Shofieye street Ilasamaja', '08051960676', 'Spouse', 0),
(8, '100/07/B', 'Victoria', '', 'Ashadele', 'Female', 'Married', '', '08058316937', '', '2017-02-17', 'trader', 4, 0, '2017-12-18 16:39:05', 'Gbadegeshin Ashadele', '35, Sebanjo street Mushin', '08058316937', 'Spouse', 0),
(9, '004/682/B', 'Omowunmi', '', 'Jimoh', 'Female', 'Married', '', '08055535431', '', '1972-12-12', 'civil servant', 3, 0, '2017-12-18 17:10:58', 'Mr Jimoh Fatai', '14, Igbo- ow u street Mushin', '07019980241', 'Spouse', 0),
(10, '072/86/B', 'Oluwayemisi', '', 'Mould', 'Female', 'Married', '', '07038749259', '', '1964-11-27', 'trader', 2, 0, '2017-12-18 18:30:28', 'Ademola Mould', '29, Yusuf street Mushin', '08023282873', 'Spouse', 0),
(11, '035/12', 'Osizoso', '', 'Onwumah', 'Male', 'Single', '', '08066083156', '', '1984-06-29', 'Call center Agent', 4, 0, '2017-12-18 19:25:20', 'Austin Onwumah', '42, Oduduwa street Mushin', '07085278954', 'Brother', 0),
(12, '202/05/B', 'Toluwani', '', 'Oyedokun', 'Male', 'Single', '', '08035343607', '', '2004-05-16', 'student', 4, 0, '2017-12-19 07:58:09', 'Mrs Ibukunoluwa Oyedokun', '15, Ogungbaye st. Mushin', '08035343607', 'Mother', 0),
(13, '202/05/C', 'Openifoluwa', '', 'Oyedokun', 'Male', 'Single', '', '08035343607', '', '2007-10-29', 'Student', 4, 0, '2017-12-19 08:03:22', 'Mrs Ibukunoluwa Oyedokun', '15, Ogungbaye st. Mushin', '08035343607', 'Mother', 0),
(15, '202/05', 'Ibukunoluwa', '', 'Oyedokun', 'Female', 'Married', '', '08038019033', '', '2017-03-20', 'Tax Officer', 4, 0, '2017-12-19 08:43:10', 'Rotimi Falade', '15, Ogungbaye st. Mushin', '08034601475', 'Brother', 0),
(17, '004/666', 'Eric', '', 'Okereke', 'Male', 'Married', '', '08038019033', '', '1972-06-18', 'driver', 3, 0, '2017-12-19 09:23:03', 'Francis Okereke', '3, Shoyola street, Ikotun', '08063097911', 'Brother', 0),
(18, '035/40', 'Taofeeq', '', 'Oladipupo', 'Male', 'Single', '', '08185587793', '', '1991-05-08', 'Driver', 4, 0, '2017-12-19 09:36:24', 'Yetunde Oladipupo', '3, Ayandeji street , Mushin', '08185587793', 'Sister', 0),
(19, '077/4896', 'Jovita', '', 'Uzoma', 'Female', 'Single', '', '08038747399', '', '1984-11-23', 'Actress', 1, 0, '2017-12-19 09:43:04', 'Chigozie Obi', '27, Segun Ogunye st Orisunmbare', '08033353272', 'Brother', 0),
(21, '004/727/B', 'ThankGod', '', 'Anozie', 'Male', 'Married', '', '08052075392', '', '1961-12-28', 'Civil servant', 3, 0, '2017-12-19 11:05:58', 'Charity Anozie', '15, Adekunle st. Isolo', '08033727358', 'Spouse', 0),
(22, '004/727/E', 'Doris', '', 'Anozie', 'Female', 'Single', '', '08033727358', '', '2009-10-12', 'student', 3, 0, '2017-12-19 11:10:38', 'Charity Anozie', '15, Adekunle st. Isolo', '08033727358', 'Mother', 0),
(23, '004/727/ C', 'Collins', '', 'Anozie', 'Male', 'Single', '', '08033727358', '', '2000-08-08', 'Student', 3, 0, '2017-12-19 11:14:58', 'Mr ThankGod Anozie', '15, Adekunle st Isolo', '08052075392', 'Father', 0),
(24, '072/59/B', 'Gbemisola', '', 'Akitoye', 'Female', 'Married', '', '08054394992', '', '1967-04-06', 'Trader', 2, 0, '2017-12-19 11:18:11', 'A design Akitoye', '32, Olusoga st. Mushin', '08035371832', 'Spouse', 0),
(25, '004/298', 'Adekunle', '', 'Aderibigbe', 'Male', 'Married', '', '08023569579', '', '1964-02-28', 'Engineer', 3, 0, '2017-12-19 12:38:56', 'Mojisola Aderibigbe', '7, Disu st Alakuko', '08137105666', 'Spouse', 0),
(26, '004/874', 'Tijani', '', 'Shuaibu', 'Male', 'Single', '', '07038617572', '', '1987-03-01', 'mechanic', 3, 0, '2017-12-19 12:45:02', 'Olajumoke Rasaki', '17, Akinbode street Mushin', '07060552748', 'Sister', 0),
(28, '004/223', 'Isiaka', '', 'Olajide', 'Male', 'Married', '', '08087854428', '', '1963-06-22', 'Electrician', 3, 0, '2017-12-19 12:49:23', 'Sodiq Olajide', '43, Church street, Oshodi', '', 'Brother', 0),
(29, '004/650', 'Jamiu', '', 'Akindele', 'Male', 'Married', '', '08034619420', '', '1967-06-09', 'Machine operator', 3, 0, '2017-12-19 15:40:16', 'Tawa Akindele', '37, Isolo road Mushin', '07033976955', 'Spouse', 0),
(30, '004/642', 'Kazeem', '', 'Olaiya', 'Male', 'Married', '', '08060207124', '', '1982-02-02', 'Electrician', 3, 0, '2017-12-19 15:44:10', 'Rashidat Olaiya', '53, Safejo road Ajegunle', '08056456187', 'Spouse', 0),
(31, '0672', 'Victor', '', 'Ugwu', 'Male', 'Single', '', '08134346890', '', '1980-11-19', 'trader', 1, 0, '2017-12-19 17:15:03', 'Abraham Ugwu', '1, Rotimi lane Mushin', '08100076489', 'Brother', 0),
(32, '004/487', 'Musa', '', 'Suleiman', 'Male', 'Single', '', '07034955458', '', '1987-06-05', 'technician', 3, 0, '2017-12-20 11:09:23', 'Jamiu musa', 'Ilasa', '08058093439', 'Brother', 0),
(34, '076/10', 'Matthew', '', 'Moses', 'Male', 'Single', '', '07038617572', '', '1989-05-10', 'packing Attendant', 4, 0, '2017-12-20 11:45:58', 'Matthew patrick', 'Ilasa', '08169026580', 'Brother', 0),
(39, '044/20', 'Olakunle', '', 'Ojobowale', 'Male', 'Single', '', '0816723606', 'suratojobowale@gmail.com', '1989-12-12', 'cashier', 4, 0, '2017-12-20 11:59:16', 'Mrs. Ojobowale', 'Isolo', '08022282456', 'Mother', 0),
(47, '077/4897', 'Emeka', '', 'Eze', 'Male', 'Single', '', '08035611024', '', '1982-12-10', 'civil servant', 1, 0, '2017-12-20 13:43:05', 'Eze emeka', 'Ilasa', '08066128527', 'Brother', 0),
(50, '012/16', 'Olanrewaju', '', 'Hammed', 'Male', 'Single', '', '08106425299', '', '1993-04-24', 'Banker', 4, 0, '2017-12-20 14:09:25', 'OlanrewJu idiat', 'Iganmu', '07037918206', 'Mother', 0),
(51, '004/755', 'Sunday', '', 'Olutayo', 'Male', 'Married', '', '08026501271', '', '1960-09-04', 'driver', 3, 0, '2017-12-20 14:23:50', 'Olumide olutayo', '8 adebowale str ogun state', '09080448656', 'Brother', 0);

-- --------------------------------------------------------

--
-- Table structure for table `paymenttimeline`
--

CREATE TABLE `paymenttimeline` (
  `paymenttimelineid` int(11) NOT NULL,
  `visitid` varchar(20) NOT NULL,
  `payable` varchar(10) NOT NULL,
  `paymentmade` varchar(10) NOT NULL,
  `amountleft` varchar(10) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paymenttimeline`
--

INSERT INTO `paymenttimeline` (`paymenttimelineid`, `visitid`, `payable`, `paymentmade`, `amountleft`, `dateadded`) VALUES
(1, '151217$KN/08b1353', '25790', '25790', '0', '2017-12-15 14:02:05');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_drugcategory`
--

CREATE TABLE `pharmacy_drugcategory` (
  `pharmacy_drugcategoryid` int(11) NOT NULL,
  `drugcategory` varchar(30) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharmacy_drugcategory`
--

INSERT INTO `pharmacy_drugcategory` (`pharmacy_drugcategoryid`, `drugcategory`, `dateadded`) VALUES
(1, 'Anti-Malarials', '2017-11-06 15:20:12'),
(3, 'Anti-Hypertensives', '2017-11-06 15:20:39'),
(5, 'Anti-tuberculosis', '2017-11-06 15:20:59'),
(6, 'Anti-diabetic', '2017-11-06 15:38:49'),
(7, 'Anti-Infective/Anti-biotics', '2017-11-06 15:39:12'),
(8, 'Anti-Allergy', '2017-11-06 15:39:18'),
(9, 'Cough Medication', '2017-11-06 15:39:27'),
(10, 'Analgesic', '2017-11-06 15:39:41'),
(11, 'Anti-anxiety/anti-convulsants', '2017-11-06 15:39:59'),
(12, 'Anti-helminthics', '2017-11-06 15:42:35'),
(13, 'Anti-haemorrhoidal', '2017-11-06 15:42:47'),
(14, 'Blood forming agents/Multivita', '2017-11-06 15:43:10'),
(15, 'Contraceptives', '2017-11-06 15:43:24'),
(16, 'Corticosteroids', '2017-11-06 15:43:36'),
(17, 'Dermatological creams/Ointment', '2017-11-06 15:43:53'),
(18, 'ENT drugs', '2017-11-06 15:44:01'),
(19, 'GIT agents', '2017-11-06 15:44:09'),
(20, 'Opthalmological', '2017-11-06 15:44:23'),
(21, 'Cardiovascular', '2017-12-18 12:04:17');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_drugs`
--

CREATE TABLE `pharmacy_drugs` (
  `pharma_drugsid` int(11) NOT NULL,
  `brandname` varchar(50) NOT NULL,
  `genericname` varchar(50) NOT NULL,
  `drugcategoryid` int(2) NOT NULL,
  `stockcount` int(5) NOT NULL,
  `reorderlevel` int(5) NOT NULL,
  `private` varchar(5) NOT NULL,
  `corporate` varchar(5) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharmacy_drugs`
--

INSERT INTO `pharmacy_drugs` (`pharma_drugsid`, `brandname`, `genericname`, `drugcategoryid`, `stockcount`, `reorderlevel`, `private`, `corporate`, `dateadded`) VALUES
(1, 'Cafergot/ASSOS', 'Caffeine/Ergortamine', 10, 20, 10, '135', '135', '2017-12-13 11:33:33'),
(2, 'AGP', 'Chymotrypsin 75mg', 10, 100, 20, '26.25', '26.25', '2017-12-13 11:34:24'),
(3, 'Diphine/Geneith', 'Diclofenac 75mg', 10, 200, 50, '37.5', '37.5', '2017-12-13 11:35:06'),
(4, 'Diphine/Geneith', 'Diclofenac Potassium 50MG tab', 10, 100, 50, '8.25', '8.25', '2017-12-13 11:36:13'),
(5, 'Diphine/Geneith', 'Diclofenac Sodium 100mg', 10, 200, 50, '18', '18', '2017-12-13 11:39:04'),
(6, 'Diphine/Geneith', 'Diclofenac Sodium 50mg', 10, 200, 50, '18', '18', '2017-12-13 11:39:50'),
(7, 'Diphine/Geneith', 'Diclofenac 100mg SR tab', 10, 200, 50, '18', '18', '2017-12-13 12:03:06'),
(8, 'DGO', 'Diclofenac Gel Ointment', 10, 200, 50, '375', '375', '2017-12-13 12:04:06'),
(9, 'Robb', 'Hot Robb', 10, 200, 50, '300', '300', '2017-12-13 12:04:24'),
(10, 'Brustan/Beeflam/Afrab', 'Ibuprofen syrup', 10, 140, 50, '375', '375', '2017-12-13 12:05:03'),
(11, 'Ibuprofen', 'Ibuprofen 200MG', 10, 200, 50, '3.6', '3.6', '2017-12-13 12:06:10'),
(12, 'Ibuprofen', 'Ibuprofen 400MG Tab', 10, 200, 50, '13.5', '13.5', '2017-12-13 12:06:49'),
(13, 'Indocid', 'Indomethacin', 10, 300, 100, '8.25', '8.25', '2017-12-13 12:07:22'),
(14, 'Vixa', 'Naproxen Tab', 10, 300, 100, '80.4', '80.4', '2017-12-13 12:07:58'),
(15, 'Egyptian int Pharmaceuticals', 'Norgesic', 10, 300, 100, '63.75', '63.75', '2017-12-13 12:09:11'),
(16, 'Paracetamol', 'Paracetamol Drop', 10, 355, 100, '300', '300', '2017-12-13 12:09:49'),
(17, 'Global organics', 'Paracetamol 100ml/1G IV infusion', 10, 400, 100, '375', '375', '2017-12-13 12:11:00'),
(18, 'Emzor/Panadol/Dana', 'Paracetamol 500mg', 10, 573, 100, '2.4', '2.4', '2017-12-13 12:12:05'),
(19, 'Fortwin', 'Pantazocine Injection', 10, 600, 100, '112.5', '112.5', '2017-12-13 12:13:10'),
(20, 'Excel biolife pvt ltd', 'Piroxicam', 10, 600, 100, '8.25', '8.25', '2017-12-13 12:13:43'),
(22, 'Tramed', 'Tramadol Capsule', 10, 600, 100, '5.25', '5.25', '2017-12-13 12:46:41'),
(23, 'Tramed', 'Tramadol Injection', 10, 600, 100, '150', '150', '2017-12-13 12:46:54'),
(24, 'Standard', 'Adrenaline/Epinephrine Injection', 8, 600, 100, '150', '150', '2017-12-13 12:48:18'),
(25, 'Chupet', 'Aminophylline Injection', 8, 600, 100, '75', '75', '2017-12-13 12:48:41'),
(26, 'Dana', 'Chlorpheniramine (Priton) Syrup', 8, 600, 100, '180', '180', '2017-12-13 12:49:05'),
(27, 'Emzor/ Evans', 'Chlorpheniramine 4mg (Piriton) Tab', 8, 600, 100, '1.5', '1.5', '2017-12-13 12:49:35'),
(28, 'Rophegan', 'Promethazine Syrup', 8, 600, 100, '150', '150', '2017-12-13 12:50:31'),
(29, 'Pemason', 'Promethazine Injection', 8, 600, 100, '60', '60', '2017-12-13 12:50:58'),
(30, 'Avomac', 'Promethazine (Avomine) Tablets', 8, 600, 100, '5.25', '5.25', '2017-12-13 12:51:26'),
(31, 'Actifed/SKG', 'Pseudoephedrine/Triprolidine (Actifed)', 8, 600, 100, '900', '900', '2017-12-13 12:52:02'),
(33, 'Ventolin/Salbutamol', 'Salbutamol', 8, 600, 100, '1800', '1800', '2017-12-13 12:52:49'),
(34, 'Ventolin', 'Salbutamol Syrup', 8, 600, 100, '525', '525', '2017-12-13 12:56:02'),
(36, 'Ventolin', 'Salbutamol Tab', 8, 600, 100, '1.5', '1.5', '2017-12-13 12:56:25'),
(37, 'Syncom', 'Hydrocortisone Injection', 8, 600, 100, '300', '300', '2017-12-13 12:57:00'),
(38, 'Keptal', 'Diazepam Injection', 11, 600, 100, '150', '150', '2017-12-13 12:57:30'),
(39, 'Keptal', 'Diazepam 5mg Tab', 11, 590, 100, '27', '27', '2017-12-13 12:57:57'),
(40, 'Swipha/Juhel', 'Bromazepam 1.5mg', 11, 600, 100, '45', '45', '2017-12-13 12:58:22'),
(41, 'Swipha/Juhel', 'Bromazepam 3mg tab', 11, 600, 100, '45', '45', '2017-12-13 12:58:44'),
(42, 'Emzor', 'Albendazole', 12, 600, 100, '255', '255', '2017-12-13 12:59:44'),
(43, 'Emzor', 'Albendazole Suspension', 12, 600, 100, '255', '255', '2017-12-13 12:59:57'),
(44, 'Emzor', 'Albendazole Tab', 12, 600, 100, '127.5', '127.5', '2017-12-13 13:00:11'),
(45, 'Ketrax', 'Levamisole Tab', 12, 600, 100, '1.5', '1.5', '2017-12-13 13:00:37'),
(46, 'Combrantrin', 'Pyrantel Pamoate', 12, 598, 100, '525', '525', '2017-12-13 13:00:58'),
(47, 'Mecure', 'Amoxicillin', 7, 600, 100, '300', '300', '2017-12-13 13:01:58'),
(48, 'Michelle', 'Amoxicillin 250mg', 7, 600, 100, '14.25', '14.25', '2017-12-13 13:02:16'),
(49, 'Michelle', 'Amoxicillin 250mg Capsule', 7, 590, 100, '14.25', '14.25', '2017-12-13 13:02:42'),
(50, 'Michelle', 'Amoxicillin 500mg Capsule', 7, 585, 100, '18.75', '18.75', '2017-12-13 13:03:00'),
(51, 'Lek', 'Amoxicillin 500mg/Clauvlanic Acid 125mg', 7, 600, 100, '128.5', '128.5', '2017-12-13 13:03:29'),
(52, 'Lek / Global organics', 'Amoxicillin/ Clauvlanic Acid 125mg Capsule', 7, 600, 100, '18.55', '18.55', '2017-12-13 13:04:12'),
(54, 'Michelle/Jawa', 'Amoxyl', 7, 600, 100, '360', '360', '2017-12-13 13:05:29'),
(55, 'Michelle/Jawa', 'Amoxyl Injection', 7, 600, 100, '360', '360', '2017-12-13 13:05:40'),
(56, 'Micheller', 'Ampicillin/Cloxacillin Syrup', 7, 600, 100, '300', '300', '2017-12-13 13:06:08'),
(57, 'Michelle', 'Ampicillin/Cloxacillin 500mg Syrup', 7, 600, 100, '18.25', '18.25', '2017-12-13 13:06:34'),
(58, 'Jawa', 'Ampiclox', 7, 600, 100, '270', '270', '2017-12-13 13:07:08'),
(59, 'Biocef', 'Ceftrixone 1G', 7, 600, 100, '450', '450', '2017-12-13 13:07:49'),
(60, 'Cefunat', 'Cefuroxime Syrup', 7, 600, 100, '1800', '1800', '2017-12-13 13:08:18'),
(62, 'M.C.A/Swiss', 'Chloramphenical (Injection)', 7, 600, 100, '300', '300', '2017-12-13 13:09:54'),
(63, 'M.C.A/Any other brand', 'Chloramphenical (Capsule)', 7, 600, 100, '16.5', '16.5', '2017-12-13 13:10:25'),
(64, 'M.C.A/Any other brand', 'Chloramphenical (Suspension)', 7, 600, 100, '375', '375', '2017-12-13 13:10:55'),
(65, 'M.C.A/Any other brand', 'Chloramphenical (Eye/Ear Drop)', 7, 600, 100, '150', '150', '2017-12-13 13:11:46'),
(66, 'Dana/Any other brand', 'Ciprofloxacin Infusion', 7, 600, 100, '255', '255', '2017-12-13 13:12:42'),
(67, 'Chloramphenicol', 'GIT', 19, 500, 100, '120', '140', '2017-12-18 10:55:35'),
(68, 'Chloramphenicol', 'Chloramphenicol Eye Ointment', 20, 500, 100, '150', '150', '2017-12-18 11:21:46'),
(69, 'Gentici', 'Gentamycin Eye drop', 20, 500, 100, '150', '150', '2017-12-18 11:22:25'),
(70, 'Penicillin', 'Penicillin Eye Ointment', 20, 500, 100, '225', '225', '2017-12-18 11:23:15'),
(71, 'Beta N.', 'Betamethazone Neomycin/ Ear/Eye drop', 20, 500, 100, '400', '400', '2017-12-18 11:24:56'),
(72, 'Dana', 'MMT Suspension', 19, 500, 100, '231', '231', '2017-12-18 11:28:01'),
(73, 'Dana', 'Antacids Tablets', 19, 1000, 200, '2.25', '2.25', '2017-12-18 11:28:38'),
(74, 'Medibios', 'Bisacodyl Tablets', 19, 500, 100, '6.75', '6.75', '2017-12-18 11:29:11'),
(75, 'Castor Oil', 'Castor Oil Suspension', 19, 500, 100, '525', '525', '2017-12-18 11:30:32'),
(76, 'Chinec Pharma', 'Cimetidine Tablets', 19, 500, 100, '13.5', '13.5', '2017-12-18 11:31:16'),
(77, 'Diastop or Imodium', 'Loperimide Hydrochloride Syrup', 19, 500, 100, '525', '525', '2017-12-18 11:31:45'),
(78, 'Cimetidine', 'Cimetidine Injection', 19, 500, 100, '8.25', '8.25', '2017-12-18 11:31:46'),
(79, 'Imodium', 'Loperimide Hydrochloride Capsule', 19, 500, 100, '12.75', '12.75', '2017-12-18 11:31:47'),
(81, 'Ossy company drugs', 'Hyoscine N Butylbromide Injection', 19, 500, 100, '105', '105', '2017-12-18 11:32:38'),
(82, 'Hyoscine', 'Hyoscine N Butylbromide Syrup', 19, 500, 100, '525', '525', '2017-12-18 11:33:01'),
(84, 'Merck ltd', 'Hyoscine N Butylbromide Tablet', 19, 500, 100, '36', '36', '2017-12-18 11:33:41'),
(85, 'Kaolin', 'Light Kaolin Suspension', 19, 500, 100, '450', '450', '2017-12-18 11:34:35'),
(86, 'Moko', 'Liquid Paraffin Syrup', 19, 500, 100, '375', '375', '2017-12-18 11:35:09'),
(87, 'Moko', 'Mist Kaolin Suspension', 19, 500, 100, '450', '450', '2017-12-18 11:35:36'),
(89, 'Prime Pharmaceuticals', 'Omeprazole Capsule', 19, 500, 100, '52.5', '52.5', '2017-12-18 11:36:16'),
(90, 'Medrugs', 'ORS Powder', 19, 500, 100, '75', '75', '2017-12-18 11:36:40'),
(91, 'Zinc Tab', 'Zinc Tablet (Adult) tablet', 19, 500, 100, '22.5', '22.5', '2017-12-18 11:37:18'),
(92, 'Zinc Tab', 'Zinc Tablet (Children) tablet', 19, 500, 100, '22.5', '22.5', '2017-12-18 11:37:31'),
(93, 'M.C.A', 'Chloramphenicol', 18, 500, 100, '150', '150', '2017-12-18 11:38:15'),
(94, 'M.C.A', 'Gentamicin Ear Drops', 18, 500, 100, '150', '150', '2017-12-18 11:38:39'),
(95, 'M.C.A', 'Cerumol Ear Drops', 18, 500, 100, '1650', '1650', '2017-12-18 11:38:56'),
(96, 'Pharmaceuticals', 'Calamine Lotion', 10, 500, 100, '177', '177', '2017-12-18 11:40:15'),
(97, 'Fidson', 'Clotrimazole Cream', 10, 500, 100, '414', '414', '2017-12-18 11:40:48'),
(98, 'Pharmaceuticals', 'Ketoconazole Pessaries', 10, 500, 100, '52.5', '52.5', '2017-12-18 11:41:31'),
(99, 'Pharmaceuticals', 'Canestein Pessaries', 10, 500, 100, '375', '375', '2017-12-18 11:41:56'),
(100, 'Bliss gus', 'Clotrimazole Pessaries', 10, 500, 100, '375', '375', '2017-12-18 11:42:32'),
(102, 'Yash Medicare', 'Clotrimazole/Dexamethasone Cream', 17, 500, 100, '0', '0', '2017-12-18 11:47:43'),
(103, 'Diphenhydramine', 'Diphenhydramine Hydrochloride Cream', 17, 500, 100, '0', '0', '2017-12-18 11:48:32'),
(104, 'DGF', 'Gentamicin Ointments', 17, 500, 100, '450', '450', '2017-12-18 11:48:52'),
(105, 'Chemicals', 'Genticen Violet Lotion', 17, 500, 100, '150', '150', '2017-12-18 11:49:11'),
(106, 'DGF', 'Hydrocortisone Cream', 17, 500, 100, '450', '450', '2017-12-18 11:49:36'),
(107, 'Magnesium', 'Magnesium Sulphate Paste', 17, 500, 100, '0', '0', '2017-12-18 11:50:39'),
(108, 'Mepisan', 'Mepisan Cream', 17, 500, 100, '0', '0', '2017-12-18 11:51:11'),
(109, 'Esteo/Goldmoore', 'Methysalicylate Ointment', 17, 500, 100, '375', '375', '2017-12-18 11:51:48'),
(110, 'Stallion', 'Neoskin cream', 17, 500, 100, '450', '450', '2017-12-18 11:52:09'),
(111, 'Nystatin', 'Nystatin Ointment', 17, 500, 100, '0', '0', '2017-12-18 11:52:21'),
(112, 'Lek', 'Sulfadiazine (Dermazin) Cream', 17, 500, 100, '1800', '1800', '2017-12-18 11:53:18'),
(113, 'Johnson & Johnson', 'KY Jelly', 17, 500, 100, '1800', '1800', '2017-12-18 11:53:41'),
(114, 'Lifecare Medicals', 'Sufratule Gauze', 17, 500, 100, '1350', '1350', '2017-12-18 11:54:06'),
(115, 'Dana/Mecure', 'Cough Syrup Adult', 9, 500, 100, '180', '180', '2017-12-18 11:54:36'),
(116, 'Dana/Mecure', 'Cough Syrup Children', 9, 500, 100, '172.5', '172.5', '2017-12-18 11:54:51'),
(117, 'Meyers', 'Dequadine Lozenges', 9, 500, 100, '27', '27', '2017-12-18 11:55:09'),
(118, 'Meyers', 'Neofylin Syrup', 9, 500, 100, '450', '450', '2017-12-18 11:55:24'),
(119, 'Chrisnet B', 'Dexamethasone Injection', 16, 500, 100, '37.5', '37.5', '2017-12-18 11:55:52'),
(120, 'Pharmaceuticals', 'Hydrocortisone Injection', 16, 500, 100, '300', '300', '2017-12-18 11:56:10'),
(121, 'Geneith', 'Prednisolone Tablet', 16, 500, 100, '2.85', '2.85', '2017-12-18 11:56:31'),
(122, 'Depot', 'Depot Medroxyprogesterone Acetate (DMPA)', 15, 500, 100, '0', '0', '2017-12-18 11:56:59'),
(123, 'Duofem', 'Duofem Tablet', 15, 1500, 100, '0', '0', '2017-12-18 11:57:16'),
(124, 'Shreealoe Pharma', 'Erogometrine 0.5mg/ml Injection', 15, 1000, 100, '150', '150', '2017-12-18 11:59:51'),
(125, 'Shreealoe Pharma', 'Hydroxyprogesterone Injection', 15, 1000, 100, '0', '0', '2017-12-18 12:00:10'),
(126, 'Shreealoe Pharma', 'Hydroxyprogesterone Tablet', 15, 1000, 100, '0', '0', '2017-12-18 12:00:23'),
(127, 'Miso-Fem DKT/ Pfizer', 'Misoprostol 200 Microgram Tablet', 15, 1000, 100, '375', '375', '2017-12-18 12:00:53'),
(128, 'Embassy', 'Oxytocin 10Iu/Ml Injection', 15, 1000, 100, '150', '150', '2017-12-18 12:01:20'),
(129, 'Post Pill DKT', 'Levonorgestrel 1.5mg Tablet', 15, 1000, 100, '0', '0', '2017-12-18 12:01:51'),
(130, 'Sayana Press DKT', 'Acetate Tablet', 15, 1000, 100, '0', '0', '2017-12-18 12:02:09'),
(131, 'Jadelle DKT', 'IUCD', 15, 1000, 100, '0', '0', '2017-12-18 12:02:24'),
(132, 'Lydia DKT', 'Copper T Cu 380A', 15, 1000, 100, '0', '0', '2017-12-18 12:02:43'),
(133, 'Lydia DKT', 'Tcu 380A Safe Load', 15, 1000, 100, '0', '0', '2017-12-18 12:03:01'),
(134, 'Lydia DKT', 'Cu 375 Sleek IUCD', 15, 1000, 100, '0', '0', '2017-12-18 12:03:17'),
(136, 'Fiesta DKT', 'Male Condoms Latex', 15, 1000, 100, '0', '0', '2017-12-18 12:03:46'),
(137, 'Bond', 'Amiloride/Hct (Moduretic) Tablet', 21, 1000, 100, '12', '12', '2017-12-18 12:05:23'),
(138, 'Neimeth', 'Amlodipine 10mg Tablet', 21, 1000, 100, '25.65', '25.65', '2017-12-18 12:05:46'),
(139, 'Neimeth', 'Amlodipine 5mg Tablet', 21, 1000, 100, '24.15', '24.15', '2017-12-18 12:06:10'),
(140, 'Teva', 'Atenolol 100mg Tablet', 21, 1000, 100, '25.65', '25.65', '2017-12-18 12:06:41'),
(141, 'Teva', 'Atenolol 50mg Tablet', 21, 1000, 100, '24.15', '24.15', '2017-12-18 12:06:57'),
(142, 'Pharmaceuticals', 'Atropine Injection', 21, 1000, 100, '75', '75', '2017-12-18 12:07:20'),
(143, 'Pemason/Hanbet', 'Frusemide 40mg Tablet', 21, 1000, 100, '75', '75', '2017-12-18 12:07:45'),
(144, 'Renix', 'Frusemide Injection', 21, 1000, 100, '75', '75', '2017-12-18 12:08:28'),
(145, 'Embassy', 'Hydralazine Injection', 21, 1000, 100, '112.5', '112.5', '2017-12-18 12:08:52'),
(146, 'Teva', 'Lisinopril 10mg', 21, 1000, 100, '25.65', '25.65', '2017-12-18 12:09:17'),
(147, 'Teva', 'Lisinopril 5mg Tablet', 21, 1000, 100, '24.15', '24.15', '2017-12-18 12:09:34'),
(148, 'Bond/Ketha', 'Methyldopa 250mg Tablet', 21, 1000, 100, '21', '21', '2017-12-18 12:10:03'),
(149, 'Evans', 'Nifedipine (Oral) Tablet', 21, 970, 100, '6.75', '6.75', '2017-12-18 12:10:29'),
(150, 'Evans', 'Nifedipine (Sublingual) Tablet', 21, 1000, 100, '0', '0', '2017-12-18 12:10:59'),
(151, 'Juhel', 'Propanolol Tablet', 21, 1000, 100, '27', '27', '2017-12-18 12:11:13'),
(152, 'Seagreen', 'Simvastatine Tablet', 21, 1000, 100, '45', '45', '2017-12-18 12:11:40'),
(153, 'Juhel', 'Vasoprin Tablet', 21, 970, 100, '3.75', '3.75', '2017-12-18 12:12:10'),
(154, 'Abidec/Afrab', 'Vitamin C drops (Syrup)', 14, 1000, 100, '300', '300', '2017-12-18 12:12:49'),
(155, 'Fidson', 'Arthocare Tablet', 14, 1000, 100, '126', '126', '2017-12-18 12:13:12'),
(156, 'Meyer', 'Blood tonic Syrup', 14, 1000, 100, '525', '525', '2017-12-18 12:13:38'),
(157, 'Meyer', 'Calcium Lactate Tablet', 14, 1000, 100, '1.8', '1.8', '2017-12-18 12:13:54'),
(158, 'Elder Pharmaceuticals', 'Daravit Capsule', 14, 1000, 100, '42.6', '42.6', '2017-12-18 12:14:50'),
(159, 'Fesulf', 'Fergon tablet', 14, 1000, 100, '1.5', '1.5', '2017-12-18 12:15:09'),
(160, 'Dana/Emzor', 'Folic Acid tablets', 14, 985, 100, '2.25', '2.25', '2017-12-18 12:15:30'),
(161, 'Meyer', 'MIM Capsule', 14, 1000, 100, '8.55', '8.55', '2017-12-18 12:15:47'),
(162, 'Emzor', 'Multivite Tablet', 14, 1000, 100, '1.5', '1.5', '2017-12-18 12:16:10'),
(163, 'Emzor', 'Multivite Syrup', 14, 1000, 100, '150', '150', '2017-12-18 12:16:30'),
(164, 'Dolometa B', 'Vitamin B1', 14, 1000, 100, '12.75', '12.75', '2017-12-18 12:17:14'),
(165, 'Dolometa B', 'Vitamin B6', 14, 1000, 100, '12.75', '12.75', '2017-12-18 12:17:25'),
(166, 'Dolometa B', 'Vitamin B12', 14, 1000, 100, '12.75', '12.75', '2017-12-18 12:17:30'),
(167, 'Dolometa B', 'Diclofenac 50mg tablet', 14, 1000, 100, '12.75', '12.75', '2017-12-18 12:17:44'),
(168, 'Dolometa B', 'Diclofenac 100mg tablet', 14, 1000, 100, '12.75', '12.75', '2017-12-18 12:18:09'),
(170, 'Emzor/Mopson/Bond', 'Vitamin B Complex Syrup', 14, 925, 100, '180', '180', '2017-12-18 12:18:37'),
(171, 'Emzor/Mopson/Bond', 'Vitamin B Complex Tablet', 14, 1000, 100, '1.5', '1.5', '2017-12-18 12:18:52'),
(172, 'Afrab/Emzor', 'Vitamin C Syrup', 14, 1000, 100, '180', '180', '2017-12-18 12:19:20'),
(173, 'Afrab/Emzor', 'Vitamin C Tablet', 14, 1000, 100, '1.5', '1.5', '2017-12-18 12:19:53'),
(174, 'Kunimes', 'Yeast Tablet', 14, 1000, 100, '1.5', '1.5', '2017-12-18 12:20:09'),
(175, 'Ethambutol', 'Ethambutol Tablet', 5, 1000, 100, '0', '0', '2017-12-18 12:20:41'),
(176, 'Isoniazid', 'Isoniazid Tablet', 5, 1000, 100, '0', '0', '2017-12-18 12:20:58'),
(177, 'Isoniazid', 'Pyrazinamide Tablet', 5, 1000, 100, '0', '0', '2017-12-18 12:21:08'),
(178, 'Isoniazid', 'Rifampicin Capsule', 5, 1000, 100, '0', '0', '2017-12-18 12:21:24'),
(179, 'Maydon', 'Artemether Injection', 1, 1000, 100, '73.5', '73.5', '2017-12-18 12:22:11'),
(180, 'Amatem Forte/IPCA by SFH/ Combisunate', 'Artemether/Lumefantrine 1-3 Tablet', 1, 1000, 100, '450', '450', '2017-12-18 12:22:44'),
(181, 'Amatem Forte/IPCA by SFH/ Combisunate', 'Artemether/Lumefantrine 4-8 Tablet', 1, 1000, 100, '450', '450', '2017-12-18 12:23:01'),
(182, 'Amatem Forte/IPCA by SFH/ Combisunate', 'Artemether/Lumefantrine Adult Tablet', 1, 994, 100, '720', '720', '2017-12-18 12:23:27'),
(183, 'Amatem Forte/IPCA by SFH/ Combisunate', 'Artemether/Lumefantrine (below 1yr)Tablet', 1, 1000, 100, '450', '450', '2017-12-18 12:24:03'),
(184, 'Mekophar/Neros', 'Artesunate 50mg', 1, 1000, 100, '750', '750', '2017-12-18 12:24:29'),
(185, 'Camosunate Geneith', 'Artesunate/Amodiaquine 1-5', 1, 994, 100, '720', '720', '2017-12-18 12:25:02'),
(186, 'Camosunate Geneith', 'Artesunate/Amodiaquine 6-13 tablet', 1, 1000, 100, '720', '720', '2017-12-18 12:25:58'),
(187, 'Camosunate Geneith', 'Artesunate/Amodiaquine adult tablet', 1, 1000, 100, '720', '720', '2017-12-18 12:26:07'),
(188, 'Healthcare Ltd', 'Chloroquine Injection', 1, 1000, 100, '270', '270', '2017-12-18 12:26:34'),
(189, 'Alaxin', 'Dihydroartemisinin 40mg Tablet', 1, 1000, 100, '0', '0', '2017-12-18 12:26:53'),
(190, 'P-Alaxin/Artequick/Duo-cortesain', 'Dihydroartemisinin/Piperaquine Tablet', 1, 1000, 100, '1275', '1275', '2017-12-18 12:27:32'),
(191, 'Halfan', 'Halofantrine tablet', 1, 1000, 100, '0', '0', '2017-12-18 12:27:58'),
(192, 'Emzor/SFH', 'Sulfadoxine 500mg/Pyrimethamine 25mg (Fansidar) Ta', 1, 1000, 100, '12.75', '12.75', '2017-12-18 12:28:31'),
(193, 'Emzor', 'Sulfadocine/Pyrimethamine Syrup', 1, 1000, 100, '420', '420', '2017-12-18 12:28:55'),
(194, 'Avomac', 'Maxolon Tablet', 13, 1000, 100, '8.25', '8.25', '2017-12-18 12:29:23'),
(195, 'Pacmai', 'Promethazine (Avomine) Syrup', 13, 1000, 100, '150', '150', '2017-12-18 12:29:47'),
(196, 'Chupet', 'Promethazine (Avomine) Injection', 13, 1000, 100, '60', '60', '2017-12-18 12:30:10'),
(197, 'Pacmai', 'Promethazine (Avomine) Tablets', 13, 1000, 100, '5.25', '5.25', '2017-12-18 12:30:27'),
(198, 'Annusol', 'Zinc Oxide Suppositories', 13, 1000, 100, '570', '570', '2017-12-18 12:31:02'),
(199, 'Daflon 500mg', 'Diosmin 450mg plus hesperidin 50mg Tablets', 13, 1000, 100, '190.0', '190.0', '2017-12-18 12:31:33'),
(200, 'Klusyl', 'Daonil Tablet', 6, 1000, 100, '15', '15', '2017-12-18 12:32:03'),
(201, 'Hovid', 'Glucophage 500mg', 6, 1000, 100, '13.5', '13.5', '2017-12-18 12:32:38'),
(202, 'Embassy', 'Tetracycline Capsule', 7, 1000, 100, '16.5', '16.5', '2017-12-18 12:34:12'),
(203, 'Penicillin', 'Penicillin Injection', 7, 1000, 100, '22.5', '22.5', '2017-12-18 12:34:42'),
(204, 'Penicillin', 'Penicillin Ointment', 7, 1000, 100, '225', '225', '2017-12-18 12:34:59'),
(205, 'Moko', 'Mist Potassium Citrate Solution', 7, 1000, 100, '525', '525', '2017-12-18 12:35:21'),
(206, 'Dana', 'Metronidazole 200mg Tablet', 7, 1000, 100, '2.7', '2.7', '2017-12-18 12:35:52'),
(207, 'Dana', 'Metronidazole Suspension', 7, 1000, 100, '180', '180', '2017-12-18 12:36:17'),
(208, 'Dana', 'Metronidazole 400mg Tablet', 7, 1000, 100, '13.5', '13.5', '2017-12-18 12:37:02'),
(209, 'Dana', 'Metronidazole Infusion', 7, 1000, 100, '225', '225', '2017-12-18 12:37:29'),
(210, 'G-trypsin', 'Griseofulvin 500mg', 7, 1000, 100, '48.75', '48.75', '2017-12-18 12:38:04'),
(211, 'Bond Chemical', 'Fluconazole Capsule', 7, 1000, 100, '58.5', '58.5', '2017-12-18 12:38:29'),
(212, 'Mopson', 'Erythromycin 500mg Tablet', 7, 1000, 100, '375', '375', '2017-12-18 12:39:03'),
(213, 'Mopson', 'Erythromycin Syrup', 7, 1000, 100, '525', '525', '2017-12-18 12:39:21'),
(214, 'Geneith', 'Doxycycline Capsule', 7, 1000, 100, '16.5', '16.5', '2017-12-18 12:40:19'),
(215, 'Diflucan', 'Diflucan Tablet', 7, 1000, 100, '675', '675', '2017-12-18 12:40:44'),
(216, 'Dana', 'Cotrimoxazole 480mg Tablet', 7, 1000, 100, '67.5', '67.5', '2017-12-18 12:41:15'),
(217, 'Dana', 'Cotrimoxazole 240mg/ 5ml Suspension', 7, 1000, 100, '180', '180', '2017-12-18 12:41:35'),
(218, 'Alfa/Cipromol/Bond', 'Ciprofloxacin 500mg tablet', 7, 1000, 100, '300', '300', '2017-12-18 12:42:43'),
(220, 'MCA/Any other brand', 'Chloramphenicol Eye/Ear drop', 7, 1000, 100, '150', '150', '2017-12-18 12:43:47'),
(221, 'MCA/Any other brand', 'Chloramphenicol Suspension', 7, 1000, 100, '375', '375', '2017-12-18 12:44:02'),
(222, 'MCA/Any other brand', 'Chloramphenicol Capsule', 7, 1000, 100, '16.5', '16.5', '2017-12-18 12:44:15'),
(223, 'MCA/Any other brand', 'Chloramphenicol Injection', 7, 1000, 100, '300', '300', '2017-12-18 12:44:38'),
(224, 'Zicef/Axacef/Zinnat', 'Cefuroxime 500mg Tablet', 7, 1000, 100, '18.75', '18.75', '2017-12-18 12:45:27');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_drugtype`
--

CREATE TABLE `pharmacy_drugtype` (
  `id` int(11) NOT NULL,
  `drugtype` varchar(20) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharmacy_drugtype`
--

INSERT INTO `pharmacy_drugtype` (`id`, `drugtype`, `dateadded`) VALUES
(1, 'Syrup', '2017-11-06 17:21:48'),
(2, 'Tablet', '2017-11-06 17:21:48'),
(3, 'Pesseries', '2017-11-06 17:22:13'),
(4, 'Lotion', '2017-11-06 17:22:13'),
(5, 'Capsule', '2017-11-06 17:22:21');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_queue`
--

CREATE TABLE `pharmacy_queue` (
  `pharmacy_queueid` int(11) NOT NULL,
  `visitid` varchar(20) NOT NULL,
  `checkintime` time NOT NULL,
  `checkindate` date NOT NULL,
  `checkouttime` time NOT NULL,
  `checkoutdate` date NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharmacy_queue`
--

INSERT INTO `pharmacy_queue` (`pharmacy_queueid`, `visitid`, `checkintime`, `checkindate`, `checkouttime`, `checkoutdate`, `dateadded`) VALUES
(1, '151217$KN/08b1353', '14:44:29', '2017-12-15', '15:41:22', '0000-00-00', '2017-12-15 13:44:29'),
(2, '181217$004/685', '15:27:29', '2017-12-18', '15:34:33', '0000-00-00', '2017-12-18 14:27:29'),
(3, '181217$111/02/D', '15:43:58', '2017-12-18', '16:49:34', '0000-00-00', '2017-12-18 14:43:58'),
(5, '181217$003/02/D', '15:57:55', '2017-12-18', '16:58:12', '0000-00-00', '2017-12-18 14:57:55'),
(6, '181217$004/682/B', '18:31:59', '2017-12-19', '15:00:00', '0000-00-00', '2017-12-18 17:31:59'),
(7, '191217$004/642', '17:46:53', '2017-12-19', '00:00:00', '0000-00-00', '2017-12-19 16:46:53');

-- --------------------------------------------------------

--
-- Table structure for table `returnrate`
--

CREATE TABLE `returnrate` (
  `returnrateid` int(11) NOT NULL,
  `hospid` varchar(15) NOT NULL,
  `earlyvisitdate` date NOT NULL,
  `visitdate` date NOT NULL,
  `weeksapart` int(1) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `returnrate`
--

INSERT INTO `returnrate` (`returnrateid`, `hospid`, `earlyvisitdate`, `visitdate`, `weeksapart`, `dateadded`) VALUES
(1, 'KN/08b1353', '2017-12-15', '2017-12-15', 1, '2017-12-15 13:21:19'),
(2, 'KN/08b1353', '2017-12-18', '2017-12-18', 1, '2017-12-18 10:38:29'),
(4, '004/685', '2017-12-18', '2017-12-18', 1, '2017-12-18 14:12:15'),
(8, '003/02/D', '2017-12-18', '2017-12-18', 1, '2017-12-18 14:28:38'),
(9, '111/02/D', '2017-12-18', '2017-12-18', 1, '2017-12-18 14:28:58'),
(13, '077/4879', '2017-12-18', '2017-12-18', 1, '2017-12-18 14:44:30'),
(28, '004/682/B', '2017-12-18', '2017-12-18', 1, '2017-12-18 17:21:00'),
(30, '004/682/B', '2017-12-18', '2017-12-19', 1, '2017-12-19 12:10:21'),
(37, '202/05', '2017-12-19', '2017-12-19', 1, '2017-12-19 15:42:09'),
(39, '072/86/B', '2017-12-18', '2017-12-19', 1, '2017-12-19 16:34:00'),
(40, '004/642', '2017-12-19', '2017-12-19', 1, '2017-12-19 16:34:25'),
(42, 'KN/08b1353', '2017-12-18', '2017-12-20', 1, '2017-12-20 10:05:55'),
(44, '004/487', '2017-12-20', '2017-12-20', 1, '2017-12-20 12:25:02'),
(46, '044/20', '2017-12-20', '2017-12-20', 1, '2017-12-20 12:25:50'),
(47, '076/10', '2017-12-20', '2017-12-20', 1, '2017-12-20 12:26:06'),
(48, '004/874', '2017-12-20', '2017-12-20', 1, '2017-12-20 12:26:22');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffid` int(11) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `dateofbirth` date NOT NULL,
  `maritalstatus` varchar(15) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `role` int(3) NOT NULL,
  `phonenumber` varchar(15) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffid`, `firstname`, `lastname`, `dateofbirth`, `maritalstatus`, `gender`, `username`, `password`, `role`, `phonenumber`, `dateadded`) VALUES
(1, 'Kayode', 'Agbede', '2017-10-04', 'Single', 'Male', '667', 'Gbegi_123', 2, '07055518205', '2017-10-31 13:14:07'),
(3, 'Dolapo', 'Isaiah', '1988-07-12', 'Single', 'Male', 'Dolapo', 'Isaiah', 4, '07055518203', '2017-10-31 14:44:49'),
(4, 'Abiodun', 'Ajoku', '1977-10-12', 'Married', 'Female', 'Ajoku', 'ABBEYmt$123', 1, '08028107456', '2017-12-15 15:13:58'),
(6, 'Oluwakemi', 'Owasoyen', '2005-02-03', 'Married', 'Female', 'Oluwakemi', 'Owasoyen_123', 1, '08063313362', '2017-12-15 15:20:39'),
(7, 'Oluwaseun', 'Odubanjo', '1990-07-11', 'Married', 'Female', 'Oluwaseun', 'Bukola_123', 3, '08151568464', '2017-12-15 15:26:25'),
(8, 'kelechhi', 'chiagorom', '1989-03-28', 'Single', 'Male', 'cedrix', 'emeka123', 2, '8037020308', '2017-12-15 15:47:59'),
(9, 'Adedoyin', 'Lawal', '2006-01-13', 'Married', 'Female', 'Adedoyin', 'Doyin381$', 1, '08028179204', '2017-12-18 10:23:56'),
(10, 'Adekunbi.M', 'Olukoya', '2000-02-28', 'Single', 'Female', 'Adekunby', 'Adekunby_123', 5, '07030846288', '2017-12-18 13:41:06'),
(12, 'Ayilegbe', 'Titilayo', '2017-08-28', 'Single', 'Female', 'Ayilegbe', 'omotola', 1, '08029406382', '2017-12-18 17:16:05'),
(13, 'Dr. (Mrs)', 'Olubowale', '1968-07-18', 'Married', 'Female', 'DrOlubowale', 'drolubowale', 2, '08034203578', '2017-12-19 11:47:58'),
(14, 'Atitebi', 'Falilat', '2017-02-25', 'Married', 'Female', 'Atitebi', 'falilat', 1, '08037246583', '2017-12-19 16:30:59'),
(15, 'Tubonim', 'Kingmate', '1957-05-22', 'Married', 'Male', 'JTK', '5287ja', 2, '08023156097', '2017-12-20 10:01:54'),
(17, 'Nelly', 'Onwu', '2017-02-13', 'Married', 'Female', 'Chinelly77$', 'Nelly', 4, '07033822855', '2017-12-20 10:55:06');

-- --------------------------------------------------------

--
-- Table structure for table `staff_category`
--

CREATE TABLE `staff_category` (
  `staff_categoryid` int(11) NOT NULL,
  `categoryname` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `urlaccess` varchar(50) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_category`
--

INSERT INTO `staff_category` (`staff_categoryid`, `categoryname`, `description`, `urlaccess`, `dateadded`) VALUES
(1, 'Nurse', 'Takes vital sign reading, attend to emergency etc', 'http://192.168.8.3/terveCure/vitals.php', '2017-10-31 11:39:20'),
(2, 'Medical Doctor', '', 'http://192.168.8.3/terveCure/consultation.php', '2017-10-31 11:39:20'),
(3, 'Pharmacy', 'Dispenses drugs, accounts for drug in store', 'http://192.168.8.3/terveCure/pharmacy.php', '2017-10-31 11:41:11'),
(4, 'Front desk', 'Checks patients in, Registers new patients', 'http://192.168.8.3/terveCure/frontdesk.php', '2017-10-31 11:41:11'),
(5, 'Laboratory', 'Takes and records laboratory investigations', 'http://192.168.8.3/terveCure/laboratory.php', '2017-10-31 12:50:15');

-- --------------------------------------------------------

--
-- Table structure for table `triage_consultqueue`
--

CREATE TABLE `triage_consultqueue` (
  `triage_consultqueueid` int(11) NOT NULL,
  `visitid` varchar(20) NOT NULL,
  `checkindate` date NOT NULL,
  `checkintime` time NOT NULL,
  `checkoutdate` date NOT NULL,
  `checkouttime` time NOT NULL,
  `staffid` int(3) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `triage_miniconsult`
--

CREATE TABLE `triage_miniconsult` (
  `triage_miniconsultid` int(11) NOT NULL,
  `visitid` varchar(10) NOT NULL,
  `widalresult` varchar(10) NOT NULL,
  `rdtresult` varchar(10) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `triage_miniconsultprescription`
--

CREATE TABLE `triage_miniconsultprescription` (
  `triage_miniconsultprescription` int(11) NOT NULL,
  `visitid` varchar(10) NOT NULL,
  `miniprescriptionid` int(1) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `triage_prescription`
--

CREATE TABLE `triage_prescription` (
  `pharmacy_prescriptionid` int(11) NOT NULL,
  `visitid` varchar(20) NOT NULL,
  `hospitalid` varchar(20) NOT NULL,
  `drugid` varchar(3) NOT NULL,
  `dosage` varchar(15) NOT NULL,
  `quantity` int(4) NOT NULL,
  `prescriberid` int(4) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `triage_queue`
--

CREATE TABLE `triage_queue` (
  `triage_queue` int(11) NOT NULL,
  `visitid` varchar(20) NOT NULL,
  `checkintime` time NOT NULL,
  `checkindate` date NOT NULL,
  `checkouttime` time NOT NULL,
  `checkoutdate` date NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `triage_queue`
--

INSERT INTO `triage_queue` (`triage_queue`, `visitid`, `checkintime`, `checkindate`, `checkouttime`, `checkoutdate`, `dateadded`) VALUES
(22, '151217$KN/08b1353', '14:10:08', '2017-12-15', '00:00:00', '0000-00-00', '2017-12-18 14:09:04'),
(23, '181217$KN/08b1353', '11:29:42', '2017-12-18', '13:22:00', '2017-12-18', '2017-12-18 14:09:04'),
(24, '181217$003/02', '12:04:36', '2017-12-18', '14:00:00', '2017-12-18', '2017-12-18 14:09:04'),
(25, '181217$004/685', '14:39:08', '2017-12-18', '11:00:00', '2017-12-18', '2017-12-18 14:09:04'),
(26, '181217$003/02/D', '14:44:39', '2017-12-18', '16:00:00', '2017-12-18', '2017-12-18 14:09:04'),
(27, '181217$111/02/D', '14:55:39', '2017-12-18', '15:00:00', '2017-12-18', '2017-12-18 14:09:04'),
(28, '181217$077/4879', '14:56:20', '2017-12-18', '16:00:00', '2017-12-18', '2017-12-18 14:09:04'),
(29, '181217$004/155/A', '17:10:23', '2017-12-18', '00:00:00', '0000-00-00', '2017-12-18 16:10:23'),
(30, '181217$100/07/B', '17:39:36', '2017-12-18', '00:00:00', '0000-00-00', '2017-12-18 16:39:36'),
(31, '181217$004/682/B', '18:11:08', '2017-12-18', '00:00:00', '0000-00-00', '2017-12-18 17:11:08'),
(32, '181217$072/86/B', '19:30:47', '2017-12-18', '00:00:00', '0000-00-00', '2017-12-18 18:30:48'),
(33, '181217$035/12', '20:25:48', '2017-12-18', '00:00:00', '0000-00-00', '2017-12-18 19:25:48'),
(34, '191217$202/05/B', '08:58:49', '2017-12-19', '09:14:00', '2017-12-19', '2017-12-19 07:58:49'),
(35, '191217$202/05/c', '09:04:48', '2017-12-19', '09:20:00', '2017-12-19', '2017-12-19 08:04:48'),
(36, '191217$202/05', '09:43:31', '2017-12-19', '10:00:00', '2017-12-19', '2017-12-19 08:43:31'),
(37, '191217$004/666', '10:23:48', '2017-12-19', '10:23:00', '2017-12-19', '2017-12-19 09:23:48'),
(38, '191217$035/40', '10:36:45', '2017-12-19', '11:15:44', '2017-12-19', '2017-12-19 09:36:45'),
(39, '191217$077/4896', '10:47:44', '2017-12-19', '11:20:00', '2017-12-19', '2017-12-19 09:47:44'),
(40, '191217$004/727/B', '12:06:14', '2017-12-19', '12:23:20', '2017-12-19', '2017-12-19 11:06:14'),
(41, '191217$004/727/E', '12:11:15', '2017-12-19', '12:26:03', '2017-12-19', '2017-12-19 11:11:15'),
(42, '191217$004/727/ C', '12:15:16', '2017-12-19', '12:30:55', '2017-12-19', '2017-12-19 11:15:16'),
(43, '191217$072/59/B', '12:18:26', '2017-12-19', '12:36:28', '2017-12-19', '2017-12-19 11:18:26'),
(44, '191217$004/298', '13:39:09', '2017-12-19', '14:08:53', '2017-12-19', '2017-12-19 12:39:09'),
(45, '191217$004/874', '13:45:44', '2017-12-19', '14:12:46', '2017-12-19', '2017-12-19 12:45:44'),
(46, '191217$004/223', '13:49:39', '2017-12-19', '14:15:30', '2017-12-19', '2017-12-19 12:49:39'),
(47, '191217$004/650', '16:41:00', '2017-12-19', '17:03:50', '2017-12-19', '2017-12-19 15:41:00'),
(48, '191217$004/642', '16:44:24', '2017-12-19', '17:09:17', '2017-12-19', '2017-12-19 15:44:24'),
(49, '191217$0672', '18:15:19', '2017-12-19', '18:57:57', '2017-12-19', '2017-12-19 17:15:19'),
(50, '201217$004/487', '12:19:14', '2017-12-20', '12:36:36', '2017-12-20', '2017-12-20 11:19:14'),
(51, '201217$044/20', '13:00:28', '2017-12-20', '13:12:18', '2017-12-20', '2017-12-20 12:00:28'),
(52, '201217$076/10', '13:00:59', '2017-12-20', '13:14:57', '2017-12-20', '2017-12-20 12:00:59'),
(53, '201217$004/874', '13:01:35', '2017-12-20', '13:21:20', '2017-12-20', '2017-12-20 12:01:36'),
(54, '201217$004/298', '14:38:41', '2017-12-20', '00:00:00', '0000-00-00', '2017-12-20 13:38:41'),
(55, '201217$077/4897', '15:05:02', '2017-12-20', '00:00:00', '0000-00-00', '2017-12-20 14:05:02'),
(56, '201217$012/16', '15:11:04', '2017-12-20', '00:00:00', '0000-00-00', '2017-12-20 14:11:04'),
(57, '201217$004/755', '15:24:50', '2017-12-20', '00:00:00', '0000-00-00', '2017-12-20 14:24:50');

-- --------------------------------------------------------

--
-- Table structure for table `triage_report`
--

CREATE TABLE `triage_report` (
  `triage_reportidd` int(11) NOT NULL,
  `visitid` varchar(10) NOT NULL,
  `sorethroat` varchar(4) NOT NULL,
  `eardischarge` varchar(4) NOT NULL,
  `stiffneck` varchar(4) NOT NULL,
  `bloodydiarrhea` varchar(4) NOT NULL,
  `hematuria` varchar(4) NOT NULL,
  `skinrash` varchar(4) NOT NULL,
  `jaundice` varchar(4) NOT NULL,
  `highfever` varchar(4) NOT NULL,
  `headache` varchar(4) NOT NULL,
  `nauseavomiting` varchar(4) NOT NULL,
  `abdominalpain` varchar(4) NOT NULL,
  `diarrhea` varchar(4) NOT NULL,
  `lossofappetite` varchar(4) NOT NULL,
  `seedoctor` varchar(4) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `triage_report`
--

INSERT INTO `triage_report` (`triage_reportidd`, `visitid`, `sorethroat`, `eardischarge`, `stiffneck`, `bloodydiarrhea`, `hematuria`, `skinrash`, `jaundice`, `highfever`, `headache`, `nauseavomiting`, `abdominalpain`, `diarrhea`, `lossofappetite`, `seedoctor`, `dateadded`) VALUES
(1, '151217$KN/', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-15 13:17:34'),
(2, '181217$KN/', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-18 10:36:26'),
(3, '181217$003', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-18 13:09:01'),
(4, '181217$004', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-18 13:58:23'),
(5, '181217$003', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-18 14:03:05'),
(6, '181217$111', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-18 14:15:44'),
(7, '181217$077', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-18 14:21:54'),
(8, '181217$004', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-18 16:41:23'),
(9, '181217$100', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-18 16:46:02'),
(10, '181217$004', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-18 17:17:42'),
(11, '181217$072', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-18 19:05:50'),
(12, '181217$072', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-18 19:06:40'),
(13, '181217$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-18 19:33:06'),
(14, '191217$202', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-19 08:17:27'),
(15, '191217$202', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-19 08:20:12'),
(16, '191217$202', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-19 08:23:06'),
(17, '191217$202', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-19 09:20:19'),
(18, '191217$202', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-19 09:20:34'),
(19, '191217$004', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-19 10:07:39'),
(20, '191217$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-19 10:15:44'),
(21, '191217$077', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-19 10:20:00'),
(22, '191217$004', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-19 11:23:20'),
(23, '191217$004', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-19 11:26:03'),
(24, '191217$004', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-19 11:30:55'),
(25, '191217$072', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-19 11:36:28'),
(26, '191217$004', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-19 13:08:53'),
(27, '191217$004', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-19 13:12:46'),
(28, '191217$004', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-19 13:15:30'),
(29, '191217$004', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-19 16:03:50'),
(30, '191217$004', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-19 16:09:17'),
(31, '151217$KN/', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-19 17:01:38'),
(32, '191217$067', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-19 17:57:57'),
(33, '201217$004', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-20 11:34:10'),
(34, '201217$004', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'Yes', '', '2017-12-20 11:36:36'),
(35, '201217$044', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-20 12:12:18'),
(36, '201217$076', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-20 12:14:57'),
(37, '201217$004', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-20 12:21:20');

-- --------------------------------------------------------

--
-- Table structure for table `triage_vitals`
--

CREATE TABLE `triage_vitals` (
  `vsid` int(11) NOT NULL,
  `visitid` varchar(20) NOT NULL,
  `systolic` int(3) NOT NULL,
  `diastolic` int(3) NOT NULL,
  `height` varchar(4) NOT NULL,
  `weight` varchar(4) NOT NULL,
  `temperature` varchar(4) NOT NULL,
  `heartrate` int(3) NOT NULL,
  `oxygensaturation` int(3) NOT NULL,
  `respirationrate` int(11) NOT NULL,
  `staffid` int(3) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `triage_vitals`
--

INSERT INTO `triage_vitals` (`vsid`, `visitid`, `systolic`, `diastolic`, `height`, `weight`, `temperature`, `heartrate`, `oxygensaturation`, `respirationrate`, `staffid`, `dateadded`) VALUES
(1, '151217$KN/08b1353', 125, 80, '1.9', '80', '24', 15, 20, 20, 4, '2017-12-15 13:17:14'),
(2, '181217$KN/08b1353', 120, 80, '1.72', '96', '36.2', 10, 10, 90, 4, '2017-12-18 10:34:02'),
(3, '181217$003/02', 0, 0, '', '34', '35.7', 96, 98, 24, 4, '2017-12-18 13:08:06'),
(4, '181217$004/685', 126, 75, '1.76', '60', '36', 76, 97, 18, 4, '2017-12-18 13:55:43'),
(14, '181217$003/02/D', 0, 0, '', '24', '361', 101, 98, 28, 4, '2017-12-18 14:02:38'),
(15, '181217$111/02/D', 0, 0, '', '8', '37.7', 128, 91, 30, 4, '2017-12-18 14:15:02'),
(16, '181217$077/4879', 104, 66, '163', '57', '36.7', 88, 97, 22, 4, '2017-12-18 14:21:39'),
(17, '181217$004/155/A', 126, 77, '173', '63', '36.2', 77, 96, 18, 4, '2017-12-18 16:41:06'),
(18, '181217$100/07/B', 132, 73, '162', '80', '36.1', 84, 97, 20, 4, '2017-12-18 16:45:47'),
(19, '181217$004/682/B', 112, 73, '167', '69', '36', 18, 98, 81, 4, '2017-12-18 17:17:03'),
(20, '181217$072/86/B', 115, 80, '167', '96', '36', 91, 95, 91, 4, '2017-12-18 19:03:20'),
(21, '181217$035/12', 135, 82, '177', '68', '35.8', 74, 98, 18, 4, '2017-12-18 19:31:44'),
(25, '191217$202/05/B', 0, 0, '', '42', '35.5', 78, 99, 18, 4, '2017-12-19 08:17:04'),
(27, '191217$202/05/c', 0, 0, '', '34', '35.7', 88, 98, 22, 4, '2017-12-19 08:19:43'),
(31, '191217$202/05', 134, 84, '1.69', '76', '35.7', 93, 98, 24, 4, '2017-12-19 09:19:58'),
(33, '191217$004/666', 125, 85, '175', '59', '36.5', 76, 97, 18, 4, '2017-12-19 10:04:37'),
(35, '191217$035/40', 106, 76, '172', '55', '36.6', 76, 83, 18, 4, '2017-12-19 10:15:29'),
(38, '191217$077/4896', 119, 90, '176', '67', '37.1', 78, 97, 20, 4, '2017-12-19 10:19:42'),
(39, '191217$004/727/B', 154, 101, '176', '70', '36.4', 92, 98, 24, 4, '2017-12-19 11:23:02'),
(41, '191217$004/727/E', 0, 0, '', '26', '35.5', 112, 98, 28, 4, '2017-12-19 11:25:42'),
(44, '191217$004/727/ C', 114, 57, '186', '64', '36.7', 74, 97, 18, 4, '2017-12-19 11:30:32'),
(46, '191217$072/59/B', 109, 89, '177', '89', '36.4', 103, 98, 28, 4, '2017-12-19 11:36:07'),
(47, '191217$004/298', 121, 70, '168', '55', '36.9', 90, 92, 24, 4, '2017-12-19 13:08:40'),
(48, '191217$004/874', 117, 79, '184', '69', '35.9', 80, 98, 20, 4, '2017-12-19 13:12:08'),
(49, '191217$004/223', 114, 93, '188', '60', '36.6', 109, 91, 28, 4, '2017-12-19 13:14:55'),
(51, '191217$004/650', 126, 87, '188', '79', '36.1', 77, 97, 18, 9, '2017-12-19 16:03:28'),
(52, '191217$004/642', 117, 70, '170', '62', '36.7', 83, 93, 20, 9, '2017-12-19 16:08:54'),
(56, '151217$KN/08b1353', 120, 80, '1.80', '60', '36.5', 80, 92, 24, 14, '2017-12-19 16:59:38'),
(57, '191217$0672', 129, 67, '1.33', '73', '35.5', 69, 97, 18, 14, '2017-12-19 17:56:24'),
(58, '201217$004/487', 132, 72, '174', '64', '36.1', 90, 96, 24, 9, '2017-12-20 11:33:57'),
(59, '201217$044/20', 106, 74, '173', '53', '36.4', 72, 98, 18, 9, '2017-12-20 12:11:54'),
(61, '201217$076/10', 107, 75, '177', '58', '35.1', 70, 96, 18, 9, '2017-12-20 12:14:46'),
(62, '201217$004/874', 117, 79, '184', '69', '35.9', 80, 98, 20, 9, '2017-12-20 12:20:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billingcategory`
--
ALTER TABLE `billingcategory`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `billingclient`
--
ALTER TABLE `billingclient`
  ADD PRIMARY KEY (`billingclientid`),
  ADD UNIQUE KEY `billgroupid` (`billgroupid`,`billclient`);

--
-- Indexes for table `billinggroups`
--
ALTER TABLE `billinggroups`
  ADD PRIMARY KEY (`billingclientid`);

--
-- Indexes for table `billinglog`
--
ALTER TABLE `billinglog`
  ADD PRIMARY KEY (`billinglogid`),
  ADD UNIQUE KEY `visitid` (`visitid`,`clienttype`,`item`,`subitem`);

--
-- Indexes for table `billingplan`
--
ALTER TABLE `billingplan`
  ADD PRIMARY KEY (`planid`),
  ADD UNIQUE KEY `clientplan` (`clientplan`,`clientnameid`);

--
-- Indexes for table `billingservice`
--
ALTER TABLE `billingservice`
  ADD PRIMARY KEY (`billingservice`);

--
-- Indexes for table `checkinlog`
--
ALTER TABLE `checkinlog`
  ADD PRIMARY KEY (`checkinid`),
  ADD UNIQUE KEY `visitid` (`visitid`);

--
-- Indexes for table `consultation_complaints`
--
ALTER TABLE `consultation_complaints`
  ADD PRIMARY KEY (`consultation_complaintsid`),
  ADD UNIQUE KEY `visitid` (`visitid`,`complaint`);

--
-- Indexes for table `consultation_diagnosis`
--
ALTER TABLE `consultation_diagnosis`
  ADD PRIMARY KEY (`consultation_diagnosisid`),
  ADD UNIQUE KEY `visitid` (`visitid`,`diagnosisid`);

--
-- Indexes for table `consultation_gexamination`
--
ALTER TABLE `consultation_gexamination`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `visitid` (`visitid`);

--
-- Indexes for table `consultation_pexaminationlist`
--
ALTER TABLE `consultation_pexaminationlist`
  ADD PRIMARY KEY (`pexamination_listid`);

--
-- Indexes for table `consultation_prescription`
--
ALTER TABLE `consultation_prescription`
  ADD PRIMARY KEY (`consult_prescribeid`),
  ADD UNIQUE KEY `visitid` (`visitid`,`drugid`,`qtyrequested`),
  ADD UNIQUE KEY `visitid_2` (`visitid`,`drugid`);

--
-- Indexes for table `consultation_queue`
--
ALTER TABLE `consultation_queue`
  ADD PRIMARY KEY (`consultation_queueid`),
  ADD UNIQUE KEY `visitid` (`visitid`);

--
-- Indexes for table `consultation_sexamination`
--
ALTER TABLE `consultation_sexamination`
  ADD PRIMARY KEY (`consultation_pexaminationid`),
  ADD UNIQUE KEY `visitid` (`visitid`,`examinationcategory`);

--
-- Indexes for table `consultation_symptoms`
--
ALTER TABLE `consultation_symptoms`
  ADD PRIMARY KEY (`consultation_symptomsid`);

--
-- Indexes for table `diagnosis_supercode`
--
ALTER TABLE `diagnosis_supercode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnosis_supercode2`
--
ALTER TABLE `diagnosis_supercode2`
  ADD PRIMARY KEY (`supercodeid`);

--
-- Indexes for table `investigation_bi`
--
ALTER TABLE `investigation_bi`
  ADD PRIMARY KEY (`investigation_BI`),
  ADD UNIQUE KEY `investigationbi_id` (`investigationbi_id`,`investigationsai_id`);

--
-- Indexes for table `investigation_dd`
--
ALTER TABLE `investigation_dd`
  ADD PRIMARY KEY (`investigation_DD`),
  ADD UNIQUE KEY `investigationid` (`investigationid`,`ddvalue`);

--
-- Indexes for table `investigation_name`
--
ALTER TABLE `investigation_name`
  ADD PRIMARY KEY (`investigation_nameid`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `investigation_order`
--
ALTER TABLE `investigation_order`
  ADD PRIMARY KEY (`investigation_orderid`),
  ADD UNIQUE KEY `investigationid` (`investigationid`,`visitid`);

--
-- Indexes for table `investigation_queue`
--
ALTER TABLE `investigation_queue`
  ADD PRIMARY KEY (`investigation_queue`),
  ADD UNIQUE KEY `visitid` (`visitid`);

--
-- Indexes for table `mshdiagnosis`
--
ALTER TABLE `mshdiagnosis`
  ADD PRIMARY KEY (`diagnosisid`),
  ADD UNIQUE KEY `diagnosis` (`diagnosis`,`icdcode`);

--
-- Indexes for table `patient_allergy`
--
ALTER TABLE `patient_allergy`
  ADD PRIMARY KEY (`patient_allergy`),
  ADD UNIQUE KEY `patientid` (`patientid`,`allergy`);

--
-- Indexes for table `patient_register`
--
ALTER TABLE `patient_register`
  ADD PRIMARY KEY (`patientid`),
  ADD UNIQUE KEY `hospitalid` (`hospitalid`);

--
-- Indexes for table `paymenttimeline`
--
ALTER TABLE `paymenttimeline`
  ADD PRIMARY KEY (`paymenttimelineid`),
  ADD UNIQUE KEY `visitid` (`visitid`,`payable`,`paymentmade`);

--
-- Indexes for table `pharmacy_drugcategory`
--
ALTER TABLE `pharmacy_drugcategory`
  ADD PRIMARY KEY (`pharmacy_drugcategoryid`),
  ADD UNIQUE KEY `drugcategory` (`drugcategory`);

--
-- Indexes for table `pharmacy_drugs`
--
ALTER TABLE `pharmacy_drugs`
  ADD PRIMARY KEY (`pharma_drugsid`),
  ADD UNIQUE KEY `brandname` (`brandname`,`genericname`);

--
-- Indexes for table `pharmacy_drugtype`
--
ALTER TABLE `pharmacy_drugtype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharmacy_queue`
--
ALTER TABLE `pharmacy_queue`
  ADD PRIMARY KEY (`pharmacy_queueid`),
  ADD UNIQUE KEY `visitid` (`visitid`);

--
-- Indexes for table `returnrate`
--
ALTER TABLE `returnrate`
  ADD PRIMARY KEY (`returnrateid`),
  ADD UNIQUE KEY `hospid` (`hospid`,`earlyvisitdate`,`visitdate`,`weeksapart`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffid`),
  ADD UNIQUE KEY `firstname` (`firstname`,`lastname`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `staff_category`
--
ALTER TABLE `staff_category`
  ADD PRIMARY KEY (`staff_categoryid`);

--
-- Indexes for table `triage_consultqueue`
--
ALTER TABLE `triage_consultqueue`
  ADD PRIMARY KEY (`triage_consultqueueid`);

--
-- Indexes for table `triage_miniconsult`
--
ALTER TABLE `triage_miniconsult`
  ADD PRIMARY KEY (`triage_miniconsultid`);

--
-- Indexes for table `triage_miniconsultprescription`
--
ALTER TABLE `triage_miniconsultprescription`
  ADD PRIMARY KEY (`triage_miniconsultprescription`);

--
-- Indexes for table `triage_prescription`
--
ALTER TABLE `triage_prescription`
  ADD PRIMARY KEY (`pharmacy_prescriptionid`);

--
-- Indexes for table `triage_queue`
--
ALTER TABLE `triage_queue`
  ADD PRIMARY KEY (`triage_queue`),
  ADD UNIQUE KEY `visitid` (`visitid`);

--
-- Indexes for table `triage_report`
--
ALTER TABLE `triage_report`
  ADD PRIMARY KEY (`triage_reportidd`);

--
-- Indexes for table `triage_vitals`
--
ALTER TABLE `triage_vitals`
  ADD PRIMARY KEY (`vsid`),
  ADD UNIQUE KEY `visitid` (`visitid`,`staffid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billingcategory`
--
ALTER TABLE `billingcategory`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `billingclient`
--
ALTER TABLE `billingclient`
  MODIFY `billingclientid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `billinggroups`
--
ALTER TABLE `billinggroups`
  MODIFY `billingclientid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `billinglog`
--
ALTER TABLE `billinglog`
  MODIFY `billinglogid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `billingplan`
--
ALTER TABLE `billingplan`
  MODIFY `planid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `billingservice`
--
ALTER TABLE `billingservice`
  MODIFY `billingservice` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `checkinlog`
--
ALTER TABLE `checkinlog`
  MODIFY `checkinid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `consultation_complaints`
--
ALTER TABLE `consultation_complaints`
  MODIFY `consultation_complaintsid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `consultation_diagnosis`
--
ALTER TABLE `consultation_diagnosis`
  MODIFY `consultation_diagnosisid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `consultation_gexamination`
--
ALTER TABLE `consultation_gexamination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `consultation_pexaminationlist`
--
ALTER TABLE `consultation_pexaminationlist`
  MODIFY `pexamination_listid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `consultation_prescription`
--
ALTER TABLE `consultation_prescription`
  MODIFY `consult_prescribeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `consultation_queue`
--
ALTER TABLE `consultation_queue`
  MODIFY `consultation_queueid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `consultation_sexamination`
--
ALTER TABLE `consultation_sexamination`
  MODIFY `consultation_pexaminationid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `consultation_symptoms`
--
ALTER TABLE `consultation_symptoms`
  MODIFY `consultation_symptomsid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `diagnosis_supercode`
--
ALTER TABLE `diagnosis_supercode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `diagnosis_supercode2`
--
ALTER TABLE `diagnosis_supercode2`
  MODIFY `supercodeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `investigation_bi`
--
ALTER TABLE `investigation_bi`
  MODIFY `investigation_BI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `investigation_dd`
--
ALTER TABLE `investigation_dd`
  MODIFY `investigation_DD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `investigation_name`
--
ALTER TABLE `investigation_name`
  MODIFY `investigation_nameid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `investigation_order`
--
ALTER TABLE `investigation_order`
  MODIFY `investigation_orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `investigation_queue`
--
ALTER TABLE `investigation_queue`
  MODIFY `investigation_queue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mshdiagnosis`
--
ALTER TABLE `mshdiagnosis`
  MODIFY `diagnosisid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `patient_allergy`
--
ALTER TABLE `patient_allergy`
  MODIFY `patient_allergy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patient_register`
--
ALTER TABLE `patient_register`
  MODIFY `patientid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `paymenttimeline`
--
ALTER TABLE `paymenttimeline`
  MODIFY `paymenttimelineid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pharmacy_drugcategory`
--
ALTER TABLE `pharmacy_drugcategory`
  MODIFY `pharmacy_drugcategoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pharmacy_drugs`
--
ALTER TABLE `pharmacy_drugs`
  MODIFY `pharma_drugsid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

--
-- AUTO_INCREMENT for table `pharmacy_drugtype`
--
ALTER TABLE `pharmacy_drugtype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pharmacy_queue`
--
ALTER TABLE `pharmacy_queue`
  MODIFY `pharmacy_queueid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `returnrate`
--
ALTER TABLE `returnrate`
  MODIFY `returnrateid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staffid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `staff_category`
--
ALTER TABLE `staff_category`
  MODIFY `staff_categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `triage_consultqueue`
--
ALTER TABLE `triage_consultqueue`
  MODIFY `triage_consultqueueid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `triage_miniconsult`
--
ALTER TABLE `triage_miniconsult`
  MODIFY `triage_miniconsultid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `triage_miniconsultprescription`
--
ALTER TABLE `triage_miniconsultprescription`
  MODIFY `triage_miniconsultprescription` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `triage_prescription`
--
ALTER TABLE `triage_prescription`
  MODIFY `pharmacy_prescriptionid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `triage_queue`
--
ALTER TABLE `triage_queue`
  MODIFY `triage_queue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `triage_report`
--
ALTER TABLE `triage_report`
  MODIFY `triage_reportidd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `triage_vitals`
--
ALTER TABLE `triage_vitals`
  MODIFY `vsid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
