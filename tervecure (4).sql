-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2017 at 10:00 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.5.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `billclient` varchar(20) NOT NULL,
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
(19, 3, 'LASACO', '2017-11-21 10:05:36');

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
(37, '', ' () ', 0, 'family registration', '', 0, '4', '', '0', 0, '2017-12-07 15:18:36');

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
(19, 'asd', 8, '2017-11-20 15:46:53');

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
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkinlog`
--

INSERT INTO `checkinlog` (`checkinid`, `hospitalid`, `visitid`, `checkintime`, `checkindate`, `checkouttime`, `checkoutdate`, `dateadded`) VALUES
(562, '03434/D', '241017$03434/D', '10:24:27', '2017-10-24', '00:00:00', '0000-00-00', '2017-10-24 08:27:59'),
(563, '035/01', '251017$035/01', '08:25:59', '2017-10-25', '00:00:00', '0000-00-00', '2017-10-25 06:59:34'),
(566, '035/01', '311017$035/01', '12:31:43', '2017-10-31', '00:00:00', '0000-00-00', '2017-10-31 11:43:05'),
(567, '035/01', '61117$035/01', '13:06:58', '2017-11-06', '00:00:00', '0000-00-00', '2017-11-06 12:58:54'),
(569, '03434/D', '71117$03434/D', '12:07:13', '2017-11-07', '00:00:00', '0000-00-00', '2017-11-07 11:13:20'),
(570, '035/01', '71117$035/01', '14:07:10', '2017-11-07', '00:00:00', '0000-00-00', '2017-11-07 13:10:32'),
(576, '03434/D', '81117$03434/D', '09:08:41', '2017-11-08', '00:00:00', '0000-00-00', '2017-11-08 08:41:53'),
(577, '03434/D', '151117$03434/D', '13:15:27', '2017-11-15', '00:00:00', '0000-00-00', '2017-11-15 12:27:01'),
(578, '1423/ad/3', '231117$1423/ad/3', '10:23:32', '2017-11-23', '00:00:00', '0000-00-00', '2017-11-23 09:32:34'),
(580, 'MSH123GH', '241117$MSH123GH', '11:24:13', '2017-11-24', '14:45:14', '2017-11-24', '2017-11-24 10:13:41'),
(584, '1423/ad/3', '241117$1423/ad/3', '14:57:41', '2017-11-24', '00:00:00', '0000-00-00', '2017-11-24 14:57:41'),
(587, '035/01', '241117$035/01', '15:06:44', '2017-11-24', '00:00:00', '0000-00-00', '2017-11-24 15:06:44'),
(588, '03434/D', '271117$03434/D', '17:48:06', '2017-11-27', '00:00:00', '0000-00-00', '2017-11-27 17:48:06'),
(589, '23485/D', '291117$23485/D', '09:55:39', '2017-11-29', '00:00:00', '0000-00-00', '2017-11-29 09:55:39'),
(590, '23485/D', '11217$23485/D', '12:00:52', '2017-12-01', '00:00:00', '0000-00-00', '2017-12-01 12:00:52'),
(591, '23485/D', '51217$23485/D', '14:57:23', '2017-12-05', '00:00:00', '0000-00-00', '2017-12-05 14:57:23'),
(592, '03434/D', '61217$03434/D', '12:25:28', '2017-12-06', '00:00:00', '0000-00-00', '2017-12-06 12:25:28');

-- --------------------------------------------------------

--
-- Table structure for table `consultation_complaints`
--

CREATE TABLE `consultation_complaints` (
  `consultation_complaintsid` int(11) NOT NULL,
  `visitid` varchar(20) NOT NULL,
  `complaint` varchar(30) NOT NULL,
  `duration` varchar(10) NOT NULL,
  `history` text NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consultation_complaints`
--

INSERT INTO `consultation_complaints` (`consultation_complaintsid`, `visitid`, `complaint`, `duration`, `history`, `dateadded`) VALUES
(17, '61117$035/01', 'Headaches', '4hours', 'Began two nights ago after herbal consumption', '2017-11-07 07:53:51'),
(20, '61117$035/01', 'Stomach upset', '4hours', 'Began two nights ago after herbal consumption', '2017-11-07 07:54:35'),
(21, '251017$035/01', 'Headaches', '1-2 days', 'Started last night', '2017-11-08 09:56:31'),
(29, '251017$035/01', 'Knee pains', '1-2 days', 'Began when it began', '2017-11-09 12:07:13'),
(30, '71117$035/01', 'Belly rumblings', '1-2 days', '', '2017-11-16 09:57:03'),
(31, '71117$035/01', 'Incoherent speech', '3-5 days', '', '2017-11-16 09:57:11'),
(32, '231117$1423/ad/3', 'Headaches', '1-2 days', 'Fist fought an area boy', '2017-11-23 10:10:56'),
(33, '251017$035/01', 'Tummy upset', '1-2 days', '', '2017-11-24 10:23:13'),
(53, '11217$23485/D', 'Severe Migraines', '1-2 days', 'Commenced after having several shots of whiskey', '2017-12-01 12:25:29');

-- --------------------------------------------------------

--
-- Table structure for table `consultation_diagnosis`
--

CREATE TABLE `consultation_diagnosis` (
  `consultation_diagnosisid` int(11) NOT NULL,
  `visitid` varchar(20) NOT NULL,
  `diagnosisid` varchar(10) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consultation_diagnosis`
--

INSERT INTO `consultation_diagnosis` (`consultation_diagnosisid`, `visitid`, `diagnosisid`, `comment`, `dateadded`) VALUES
(4, '251017$035/01', '69', 'tummy tuck', '2017-11-16 13:53:53'),
(5, '251017$035/01', '13', 'What is happening here', '2017-11-16 13:54:40'),
(10, '71117$03434/D', '69', '', '2017-11-16 15:05:44'),
(16, '71117$03434/D', '13', 'Commenced ANC two weeks ago', '2017-11-16 15:15:46'),
(17, '231117$1423/ad/3', '38', 'Started long time ago', '2017-11-23 11:54:00'),
(18, '251017$035/01', '27', 'Red eyed', '2017-11-24 10:28:00'),
(19, '61117$035/01', '38', '', '2017-11-30 15:52:44'),
(20, '61117$035/01', '71', 'weird things', '2017-11-30 15:52:48'),
(21, '61117$035/01', '8', 'weird things happen', '2017-11-30 15:52:54'),
(24, '11217$23485/D', '37', '', '2017-12-01 17:14:25'),
(25, '11217$23485/D', '27', 'Bloody eyes', '2017-12-01 17:14:40'),
(26, '61117$035/01', '69', '', '2017-12-05 10:52:52');

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
(1, '251017$035/01', '<b>Febrile</b> - Yes, <b>Cyanosed</b> - No, <b>Jaundiced</b> - No, <b>Hydrated</b> - No, <b>Oedema</b> - Yes', '2017-11-08 10:58:02'),
(13, '71117$03434/D', '<b>Febrile</b> - Yes, <b>Cyanosed</b> - Yes, <b>Jaundiced</b> - Yes, <b>Hydrated</b> - Yes, <b>Oedema</b> - Yes', '2017-11-10 08:44:05'),
(15, '71117$035/01', '<b>Febrile</b> - Yes, <b>Cyanosed</b> - Yes, <b>Jaundiced</b> - No, <b>Hydrated</b> - Yes, <b>Oedema</b> - Yes', '2017-11-16 09:57:16'),
(16, '231117$1423/ad/3', '<b>Febrile</b> - Yes, <b>Cyanosed</b> - Yes, <b>Jaundiced</b> - Yes, <b>Hydrated</b> - No, <b>Oedema</b> - Yes', '2017-11-23 10:11:08'),
(17, '61117$035/01', '<b>Febrile</b> - Yes, <b>Cyanosed</b> - Yes, <b>Jaundiced</b> - No, <b>Hydrated</b> - Yes, <b>Oedema</b> - Yes', '2017-11-29 10:45:49'),
(19, '11217$23485/D', '<b>Febrile</b> - Yes, <b>Cyanosed</b> - Yes, <b>Jaundiced</b> - Yes, <b>Hydrated</b> - Yes, <b>Oedema</b> - Yes', '2017-12-01 12:25:39'),
(20, '291117$23485/D', '<b>Febrile</b> - Yes, <b>Cyanosed</b> - Yes, <b>Jaundiced</b> - Yes, <b>Hydrated</b> - Yes, <b>Oedema</b> - Yes', '2017-12-05 15:28:59');

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
(9, '251017$035/01', 1, '0', '4 x 2 x 3', 24, '', 1386, 0, '2017-11-08 17:28:28'),
(10, '251017$035/01', 6, '0', '5 x 3 x 6', 90, '', 1320, 0, '2017-11-08 17:28:46'),
(23, '251017$035/01', 8, '0', '3 x 1 x 2', 6, '', 74, 0, '2017-11-09 11:33:19'),
(29, '251017$035/01', 13, '1', '4 x 1 x 2', 8, '', 142, 0, '2017-11-09 12:51:25'),
(36, '71117$03434/D', 1, '8', '4 x 1 x 2', 8, '', 1378, 0, '2017-11-10 08:55:33'),
(37, '231117$1423/ad/3', 1, '12', '2 x 2 x 3', 12, '', 1366, 0, '2017-11-23 11:54:18'),
(38, '231117$1423/ad/3', 3, '50', '5 x 2 x 5', 50, '', 1350, 0, '2017-11-23 17:01:01'),
(60, '61117$035/01', 1, '16', '4 x 1 x 4', 0, '', 0, 0, '2017-12-05 12:39:19'),
(74, '11217$23485/D', 12, '15', '3 x 1 x 5', 0, '', 0, 0, '2017-12-05 13:27:25');

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
(4, '61117$035/01', '17:15:23', '2017-11-06', '00:00:00', '0000-00-00', 0, '2017-11-06 17:15:23'),
(5, '71117$03434/D', '11:41:08', '2017-11-07', '00:00:00', '0000-00-00', 0, '2017-11-07 11:41:08'),
(6, '71117$035/01', '14:52:32', '2017-11-07', '00:00:00', '0000-00-00', 0, '2017-11-07 14:52:32'),
(7, '231117$1423/ad/3', '09:35:32', '2017-11-23', '09:45:06', '2017-11-24', 0, '2017-11-23 09:35:32'),
(16, '251017$035/01', '04:02:57', '2017-11-25', '04:03:41', '2017-11-25', 0, '2017-11-25 04:02:57'),
(17, '311017$035/01', '11:38:12', '2017-12-01', '00:00:00', '0000-00-00', 0, '2017-12-01 11:38:12'),
(19, '11217$23485/D', '12:02:29', '2017-12-01', '00:00:00', '0000-00-00', 0, '2017-12-01 12:02:29'),
(20, '291117$23485/D', '14:59:54', '2017-12-05', '00:00:00', '0000-00-00', 0, '2017-12-05 14:59:54'),
(21, '61217$03434/D', '12:44:54', '2017-12-06', '00:00:00', '0000-00-00', 0, '2017-12-06 12:44:54');

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
(75, '71117$035/01', 4, 'asdvsd wsd sdsdf gf', '2017-11-16 12:46:46'),
(77, '71117$035/01', 8, 'Wolfy Kit', '2017-11-16 12:47:02'),
(79, '71117$035/01', 3, 'Abdomen looks gooder', '2017-11-16 12:47:32'),
(82, '251017$035/01', 5, 'Observed loads of pain when moved', '2017-11-16 15:23:29'),
(83, '231117$1423/ad/3', 7, 'Chest ache', '2017-11-23 10:11:26'),
(84, '251017$035/01', 2, 'Not sure', '2017-11-24 10:24:20'),
(85, '61117$035/01', 6, 'Systems clear', '2017-11-29 10:46:02'),
(86, '61117$035/01', 7, 'Systems not clear', '2017-11-30 15:51:40'),
(88, '11217$23485/D', 3, 'Tender belly button', '2017-12-01 12:25:50'),
(89, '291117$23485/D', 4, 'Nothing to note', '2017-12-05 15:29:16');

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
  `result` varchar(50) NOT NULL,
  `resulttime` time NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `investigation_order`
--

INSERT INTO `investigation_order` (`investigation_orderid`, `investigationid`, `ordertime`, `visitid`, `result`, `resulttime`, `dateadded`) VALUES
(3, 1, '12:08:31', '251017$035/01', '0.3', '00:00:00', '2017-10-30 12:08:31'),
(6, 2, '12:50:37', '251017$035/01', '4.2', '00:00:00', '2017-10-30 12:50:37'),
(7, 4, '11:47:24', '251017$035/01', '0.2', '00:00:00', '2017-10-31 11:47:24'),
(8, 13, '11:09:55', '251017$035/01', '3.6', '00:00:00', '2017-11-01 11:09:55'),
(9, 9, '11:36:18', '251017$035/01', '2.5', '00:00:00', '2017-11-01 11:36:18'),
(10, 26, '16:25:54', '251017$035/01', '++', '00:00:00', '2017-11-03 16:25:54'),
(11, 21, '17:08:24', '251017$035/01', 'Packed', '00:00:00', '2017-11-06 17:08:24'),
(12, 13, '11:49:30', '71117$03434/D', '2.3', '00:00:00', '2017-11-07 11:49:30'),
(13, 26, '11:49:40', '71117$03434/D', '+++', '00:00:00', '2017-11-07 11:49:40'),
(14, 25, '08:53:39', '251017$035/01', '', '00:00:00', '2017-11-08 08:53:39'),
(15, 1, '15:54:33', '61117$035/01', '0.25', '00:00:00', '2017-11-15 15:54:33'),
(16, 26, '13:38:32', '71117$035/01', '', '00:00:00', '2017-11-16 13:38:32'),
(29, 17, '15:29:11', '251017$035/01', '', '00:00:00', '2017-11-16 15:29:11'),
(30, 15, '10:11:33', '231117$1423/ad/3', '', '00:00:00', '2017-11-23 10:11:33'),
(31, 21, '10:11:49', '231117$1423/ad/3', 'Low sperm count', '00:00:00', '2017-11-23 10:11:49'),
(32, 7, '10:24:47', '251017$035/01', '2.3', '00:00:00', '2017-11-24 10:24:47'),
(33, 25, '12:58:16', '11217$23485/D', '', '00:00:00', '2017-12-01 12:58:16'),
(34, 2, '12:58:24', '11217$23485/D', '', '00:00:00', '2017-12-01 12:58:24'),
(35, 4, '16:28:37', '11217$23485/D', '', '00:00:00', '2017-12-01 16:28:37'),
(36, 10, '17:06:31', '11217$23485/D', '', '00:00:00', '2017-12-01 17:06:31'),
(37, 17, '17:07:50', '11217$23485/D', '', '00:00:00', '2017-12-01 17:07:50'),
(38, 1, '17:08:30', '11217$23485/D', '', '00:00:00', '2017-12-01 17:08:30'),
(39, 21, '17:08:48', '11217$23485/D', '', '00:00:00', '2017-12-01 17:08:48'),
(40, 18, '17:12:30', '11217$23485/D', '', '00:00:00', '2017-12-01 17:12:30');

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
(1, '251017$035/01', '12:12:55', '2017-11-01', 1, '00:00:00', '0000-00-00', '2017-11-01 12:12:55'),
(2, '71117$03434/D', '11:49:44', '2017-11-07', 3, '00:00:00', '0000-00-00', '2017-11-07 11:49:44'),
(3, '61117$035/01', '15:55:05', '2017-11-15', 3, '00:00:00', '0000-00-00', '2017-11-15 15:55:05'),
(4, '231117$1423/ad/3', '10:12:10', '2017-11-23', 3, '12:42:37', '2017-11-23', '2017-11-23 10:12:10'),
(5, '11217$23485/D', '12:59:15', '2017-12-06', 4, '00:00:00', '0000-00-00', '2017-12-06 12:59:15');

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
(9, '035/01', 'Paracetamol Extra', '', 4, '2017-10-28 15:37:46'),
(10, '035/01', 'Panadol Extreme', '', 4, '2017-10-28 15:38:27'),
(11, '035/01', 'Panadol Extremities', '', 4, '2017-10-28 15:38:33'),
(12, '035/01', 'Chloramphenicol', '', 4, '2017-10-28 15:39:20'),
(14, '035/01', 'Chloramphenicol 50mg', '', 4, '2017-10-28 15:39:28'),
(15, '035/01', 'Chloramphenicol 500mg', '', 4, '2017-10-28 15:39:40'),
(16, '035/01', 'Chloramphenicol Injection', '', 4, '2017-10-28 15:40:40'),
(17, '035/01', 'Chloramphe', '', 4, '2017-10-28 15:40:50'),
(18, '035/01', 'Citipiredine tab', '', 4, '2017-10-28 15:41:04'),
(19, '035/01', 'Citipired', '', 4, '2017-10-28 15:41:15'),
(20, '035/01', 'Panadol tab', '', 4, '2017-10-28 15:41:44'),
(21, '035/01', 'Pana', '', 4, '2017-10-28 15:41:49'),
(22, '035/01', 'ASQSD ', '', 4, '2017-10-28 15:42:09'),
(23, '035/01', 'sfadsdfsde ', '', 4, '2017-10-28 15:42:14'),
(24, '035/01', 'abbberf', '', 4, '2017-10-28 15:42:18'),
(25, '035/01', 'd', '', 4, '2017-10-28 15:57:46'),
(26, '035/01', 'Diclofenac', '', 4, '2017-11-01 11:35:02'),
(27, '035/01', 'Bottled water', '', 4, '2017-11-06 17:06:27'),
(28, '035/01', 'ads', '', 4, '2017-11-09 12:10:21'),
(29, '1423/ad/3', 'Chloroquine', '', 4, '2017-11-23 10:10:31'),
(30, '23485/D', 'Paracetamol', '', 4, '2017-12-01 12:03:29');

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
  `nokrelationship` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_register`
--

INSERT INTO `patient_register` (`patientid`, `hospitalid`, `firstname`, `othername`, `lastname`, `gender`, `maritalstatus`, `address`, `phonenumber`, `emailaddress`, `dateofbirth`, `occupation`, `patienttype`, `paymentplan`, `dateadded`, `nokname`, `nokaddress`, `nokphonenumber`, `nokrelationship`) VALUES
(2, '03434/D', 'Kayode', '', 'Agbede', 'Male', 'Divorced', '64/65 Ahmadu Bello Way, Bacita', '07055518205', 'jkagbede@gmail.com', '2017-10-05', 'Student', 4, 0, '2017-10-20 13:25:39', 'Ibrahim Daunte', '64/65 Ahmadu Bello Way, Bacita, Kwara State', '070555182034', 'Brother'),
(3, '035/01', 'Kayode', '', 'Owolabi', 'Male', 'Married', '', '07055518205', 'jkagbede@gmail.com', '2012-03-08', 'Farming', 4, 5, '2017-10-20 16:18:45', 'Agbede James', '64/65 Ahmadu Bello, Bacita', '08034526452', 'Brother'),
(4, '1423/ad/3', 'Ibrahim', '', 'Oluyobo', 'Male', 'Single', '', '08023427465', 'jkagbede@gmail.com', '2017-11-02', 'Student', 4, 0, '2017-11-23 09:31:43', 'James Randi', '64/65 Ahmadu', '080234716263', 'Brother'),
(5, 'MSH123GH', 'Ibrahim', '', 'James', 'Female', 'Married', '', '07055518205', 'jkagbede@gmail.com', '2017-04-06', 'Student', 4, 0, '2017-11-24 10:12:54', 'Toyin', 'james', '08034203576', 'Sister'),
(6, '8743/4D', 'Braimoh', '', 'Wande', 'Male', 'Single', '', '07034203564', 'Mushin Olosha', '2008-02-01', 'Student', 1, 0, '2017-11-27 13:55:15', 'Bolanle Aderibigbe', 'Mushin', '08053627384', 'Sister'),
(7, '7346/G', 'Ibrahim', '', 'Wande', 'Male', 'Single', '', '080472639874', 'jkagbede@gmail.com', '2003-06-11', 'Student', 1, 0, '2017-11-27 13:57:28', 'James Randi', 'Ibrahim Taiwo rd', '08042536772', 'Brother'),
(62, '834GT', 'Ibrahim', '', 'Taiwo', 'Male', 'Single', '', '080425364723', 'jasdk', '2017-10-04', 'kaljhsdas', 3, 0, '2017-11-28 13:17:49', 'Ibhasd', 'ouhasdjh', '923498270', 'Brother'),
(70, '8347372/GT', 'Durotimi', '', 'Olaitan', 'Male', 'Single', '', '07035255361', 'jkasdk@gmail.com', '2014-03-06', 'Workaholic', 1, 0, '2017-11-28 14:16:01', 'Ibrahim Taiwo', 'James Brown street', '070434582377', 'Brother'),
(74, '9241/G', 'Ibrahim', '', 'Olowoporoku', 'Male', 'Single', '', '070523772388', '', '2012-02-08', 'Student', 1, 0, '2017-11-28 14:21:40', 'Jijokjl', 'iugshkhbm', '9879876', 'Brother'),
(81, '83497924', 'Ibra', '', 'Himdu', 'Male', 'Single', '', '8234976928374', 'Behind Methodist Church, Ilorin', '1998-06-17', 'Student', 1, 0, '2017-11-28 15:09:20', 'Ibro', 'Hamsu BUK Kano', '070555374829', 'Brother'),
(90, '23485/D', 'Toun', '', 'Adesola', 'Male', 'Single', '', '08034773477828', 'Oluwaseun street Off Oba Akran', '2017-04-06', 'Student', 1, 0, '2017-11-29 09:33:21', 'Ismail', 'Jamiu Bran road', '0704577389843', 'Brother');

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
(1, '11217$23485/D', '4950.5', '2000', '2950.5', '2017-12-04 17:00:34'),
(2, '11217$23485/D', '2950.5', '1950.5', '1000', '2017-12-04 17:00:51'),
(3, '11217$23485/D', '1000', '1000', '0', '2017-12-04 17:01:04');

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
(20, 'Opthalmological', '2017-11-06 15:44:23');

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
(1, 'Emzor', 'Paracetamol', 10, 1366, 1600, '2.5', '3', '2017-11-07 07:44:55'),
(3, 'jiasd', 'sdfas', 14, 1350, 1000, '12', '14', '2017-11-07 08:21:23'),
(6, 'Diazepam', 'Diazelene', 11, 1320, 800, '200', '150', '2017-11-07 08:23:01'),
(7, 'jiasd', 'jjasd', 9, 540, 350, '200', '250', '2017-11-07 08:24:25'),
(8, 'Ciprofloxacin', 'Ciprotab', 7, 74, 50, '130', '100', '2017-11-07 08:26:41'),
(11, 'Ampicillin', 'Ampiclox', 7, 150, 110, '240', '250', '2017-11-07 08:27:22'),
(12, 'Lidocaine', 'Lidomine', 15, 150, 130, '100', '120', '2017-11-07 08:31:15'),
(13, 'Amlodipine', 'Lidomine', 3, 142, 130, '100', '120', '2017-11-07 08:33:12');

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
(1, '251017$035/01', '17:15:19', '2017-11-16', '16:17:39', '0000-00-00', '2017-11-09 17:15:19'),
(5, '71117$03434/D', '08:57:29', '2017-11-16', '13:36:41', '0000-00-00', '2017-11-10 08:57:29'),
(6, '231117$1423/ad/3', '13:02:11', '2017-11-24', '10:34:03', '0000-00-00', '2017-11-23 13:02:11');

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
(1, '23485/D', '2017-12-05', '2017-12-05', 1, '2017-12-05 17:20:32'),
(3, '23485/D', '2017-12-05', '2017-12-06', 1, '2017-12-06 09:26:35'),
(9, '23485/D', '2017-12-05', '2017-12-07', 1, '2017-12-07 10:35:00'),
(11, '035/01', '2017-11-24', '2017-12-07', 2, '2017-12-07 10:35:44');

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
(3, 'Dolapo', 'Isaiah', '1988-07-12', 'Single', 'Male', 'Dolapo', 'Isaiah', 4, '07055518203', '2017-10-31 14:44:49');

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
(1, 'Nurse', 'Takes vital sign reading, attend to emergency etc', 'http://localhost/terveCure/vitals.php', '2017-10-31 11:39:20'),
(2, 'Medical Doctor', '', 'http://localhost/terveCure/consultation.php', '2017-10-31 11:39:20'),
(3, 'Pharmacy', 'Dispenses drugs, accounts for drug in store', 'http://localhost/terveCure/pharmacy.php', '2017-10-31 11:41:11'),
(4, 'Front desk', 'Checks patients in, Registers new patients', 'http://localhost/terveCure/frontdesk.php', '2017-10-31 11:41:11'),
(5, 'Laboratory', 'Takes and records laboratory investigations', 'http://localhost/terveCure/laboratory.php', '2017-10-31 12:50:15');

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
  `checkoutdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `triage_queue`
--

INSERT INTO `triage_queue` (`triage_queue`, `visitid`, `checkintime`, `checkindate`, `checkouttime`, `checkoutdate`) VALUES
(2, '251017$035/01', '08:25:59', '2017-10-25', '00:00:00', '0000-00-00'),
(3, '281017$035/01', '08:28:16', '2017-10-26', '00:00:00', '0000-00-00'),
(4, '311017$035/01', '12:31:43', '2017-10-31', '00:00:00', '0000-00-00'),
(5, '61117$035/01', '13:06:58', '2017-11-06', '00:00:00', '0000-00-00'),
(6, '71117$03434/D', '12:07:13', '2017-11-07', '00:00:00', '0000-00-00'),
(7, '71117$035/01', '14:07:10', '2017-11-07', '15:00:00', '2017-11-07'),
(11, '81117$03434/D', '09:08:41', '2017-11-08', '00:00:00', '0000-00-00'),
(12, '151117$03434/D', '13:15:27', '2017-11-15', '00:00:00', '0000-00-00'),
(13, '231117$1423/ad/3', '10:23:32', '2017-11-23', '00:00:00', '0000-00-00'),
(14, '241117$MSH123GH', '11:24:13', '2017-11-24', '00:00:00', '0000-00-00'),
(15, '241117$1423/ad/3', '15:24:53', '2017-11-24', '00:00:00', '0000-00-00'),
(16, '241117$035/01', '15:24:56', '2017-11-24', '00:00:00', '0000-00-00'),
(17, '271117$03434/D', '17:48:06', '2017-11-27', '00:00:00', '0000-00-00'),
(18, '291117$23485/D', '09:55:39', '2017-11-29', '00:00:00', '0000-00-00'),
(19, '11217$23485/D', '12:00:52', '2017-12-01', '00:00:00', '0000-00-00'),
(20, '51217$23485/D', '14:57:23', '2017-12-05', '00:00:00', '0000-00-00'),
(21, '61217$03434/D', '12:25:28', '2017-12-06', '00:00:00', '0000-00-00');

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
(1, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'Yes', 'No', 'No', 'No', 'No', 'No', 'Yes', '2017-10-26 11:29:20'),
(17, '281017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-10-28 06:51:34'),
(18, '281017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-10-28 06:58:00'),
(19, '281017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-10-28 07:56:04'),
(20, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-10-28 09:54:08'),
(21, '61117$035/', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-11-06 17:15:23'),
(22, '71117$0343', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'Yes', 'Yes', 'No', 'Yes', 'No', 'Yes', '', '2017-11-07 11:41:08'),
(23, '71117$035/', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'Yes', 'Yes', 'No', 'Yes', 'No', 'Yes', '', '2017-11-07 14:52:32'),
(24, '71117$035/', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'Yes', 'Yes', 'No', 'Yes', 'No', 'Yes', '', '2017-11-07 14:52:35'),
(25, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-11-08 08:51:19'),
(26, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-11-16 14:15:20'),
(27, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-11-16 14:15:22'),
(28, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-11-16 17:03:21'),
(29, '231117$142', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-11-23 09:35:32'),
(30, '241117$MSH', 'Yes', 'No', 'No', 'No', 'No', 'No', 'No', 'Yes', 'No', 'No', 'Yes', 'No', 'No', '', '2017-11-24 10:16:03'),
(31, '241117$MSH', 'Yes', 'No', 'No', 'No', 'No', 'No', 'No', 'Yes', 'No', 'No', 'Yes', 'No', 'No', '', '2017-11-24 10:16:29'),
(32, '241117$MSH', 'Yes', 'No', 'No', 'No', 'No', 'No', 'No', 'Yes', 'No', 'No', 'Yes', 'No', 'No', '', '2017-11-24 10:16:41'),
(33, '231117$142', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'Yes', 'No', 'No', 'Yes', 'No', 'No', '', '2017-11-24 12:08:16'),
(34, '231117$142', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'Yes', 'No', 'No', 'Yes', 'No', 'No', '', '2017-11-24 12:08:22'),
(35, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-11-25 03:37:33'),
(36, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-11-25 03:53:57'),
(37, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-11-25 03:54:00'),
(38, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-11-25 03:54:00'),
(39, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-11-25 03:54:00'),
(40, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-11-25 03:54:00'),
(41, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-11-25 03:54:00'),
(42, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-11-25 03:54:08'),
(43, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-11-25 03:54:11'),
(44, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-11-25 04:02:57'),
(45, '61117$035/', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-11-27 01:02:03'),
(46, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-11-27 01:04:16'),
(47, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-11-27 01:04:17'),
(48, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-11-27 01:07:44'),
(49, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-11-27 01:07:58'),
(50, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-11-27 01:08:51'),
(51, '', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-11-27 01:11:44'),
(52, '', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-11-27 01:11:59'),
(53, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-11-27 01:12:20'),
(54, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-11-27 01:16:28'),
(55, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'Yes', 'No', '', '2017-11-27 01:17:59'),
(56, '251017$035', 'No', 'No', 'No', 'No', 'No', 'Yes', 'No', 'No', 'No', 'No', 'No', 'Yes', 'No', '', '2017-11-27 01:18:26'),
(57, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'Yes', 'No', '', '2017-11-27 01:19:02'),
(58, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-11-27 01:36:25'),
(59, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-11-27 12:38:07'),
(60, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-11-30 14:53:35'),
(61, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-11-30 14:53:58'),
(62, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-11-30 14:54:21'),
(63, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-11-30 14:54:53'),
(64, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-11-30 15:31:47'),
(65, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-11-30 15:34:18'),
(66, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-11-30 15:34:34'),
(67, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-11-30 15:34:50'),
(68, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-11-30 15:35:50'),
(69, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-11-30 15:36:43'),
(70, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-11-30 15:37:11'),
(71, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-11-30 15:37:33'),
(72, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-11-30 15:37:50'),
(73, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-11-30 15:38:34'),
(74, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-11-30 15:40:26'),
(75, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-11-30 15:54:09'),
(76, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-11-30 15:56:11'),
(77, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-11-30 15:56:53'),
(78, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-11-30 15:57:20'),
(79, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-11-30 15:58:53'),
(80, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-11-30 15:59:07'),
(81, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-11-30 16:04:18'),
(82, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-11-30 16:04:48'),
(83, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-11-30 16:07:36'),
(84, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-11-30 16:08:45'),
(85, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-11-30 16:09:04'),
(86, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-11-30 16:10:04'),
(87, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-01 11:14:24'),
(88, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-01 11:18:52'),
(89, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-01 11:19:27'),
(90, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-01 11:19:54'),
(91, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-01 11:20:14'),
(92, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-01 11:20:50'),
(93, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-01 11:22:02'),
(94, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-01 11:22:13'),
(95, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-01 11:22:28'),
(96, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-01 11:22:56'),
(97, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-01 11:23:08'),
(98, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-01 11:24:11'),
(99, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-01 11:25:46'),
(100, '251017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-01 11:29:57'),
(101, '311017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-01 11:30:57'),
(102, '311017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-01 11:38:12'),
(103, '311017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-01 11:40:28'),
(104, '311017$035', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-01 11:40:32'),
(105, '11217$2348', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-01 12:02:29'),
(106, '291117$234', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-05 14:59:47'),
(107, '291117$234', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-05 14:59:54'),
(108, '61217$0343', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-06 12:44:54'),
(109, '291117$234', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '2017-12-07 15:22:38');

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
(1, '231117$1423/ad/3', 145, 60, '1.9', '67', '45', 12, 80, 35, 4, '2017-11-23 09:35:12'),
(2, '241117$MSH123GH', 140, 90, '1.9', '80', '64', 55, 80, 45, 4, '2017-11-24 10:15:35'),
(3, '251017$035/01', 240, 99, '1.5', '95', '46', 35, 32, 42, 4, '2017-10-28 09:53:57'),
(4, '311017$035/01', 123, 45, '24', '4', '43', 41, 23, 53, 4, '2017-11-16 16:32:52'),
(5, '61117$035/01', 120, 80, '1.8', '75', '45', 65, 34, 68, 4, '2017-11-06 17:15:15'),
(6, '71117$03434/D', 123, 45, '24', '4', '43', 41, 23, 53, 4, '2017-11-16 16:34:13'),
(7, '291117$23485/D', 140, 80, '1.8', '98', '67', 12, 10, 23, 4, '2017-11-29 10:18:32'),
(11, '11217$23485/D', 120, 80, '2.3', '98', '56', 23, 40, 10, 4, '2017-12-01 12:02:24'),
(12, '61217$03434/D', 125, 90, '1.8', '98', '23', 35, 25, 25, 4, '2017-12-06 12:44:42');

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
  ADD PRIMARY KEY (`patientid`);

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
  MODIFY `billingclientid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `billinggroups`
--
ALTER TABLE `billinggroups`
  MODIFY `billingclientid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `billinglog`
--
ALTER TABLE `billinglog`
  MODIFY `billinglogid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `billingplan`
--
ALTER TABLE `billingplan`
  MODIFY `planid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `billingservice`
--
ALTER TABLE `billingservice`
  MODIFY `billingservice` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `checkinlog`
--
ALTER TABLE `checkinlog`
  MODIFY `checkinid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=593;
--
-- AUTO_INCREMENT for table `consultation_complaints`
--
ALTER TABLE `consultation_complaints`
  MODIFY `consultation_complaintsid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `consultation_diagnosis`
--
ALTER TABLE `consultation_diagnosis`
  MODIFY `consultation_diagnosisid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `consultation_gexamination`
--
ALTER TABLE `consultation_gexamination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `consultation_pexaminationlist`
--
ALTER TABLE `consultation_pexaminationlist`
  MODIFY `pexamination_listid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `consultation_prescription`
--
ALTER TABLE `consultation_prescription`
  MODIFY `consult_prescribeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `consultation_queue`
--
ALTER TABLE `consultation_queue`
  MODIFY `consultation_queueid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `consultation_sexamination`
--
ALTER TABLE `consultation_sexamination`
  MODIFY `consultation_pexaminationid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
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
  MODIFY `investigation_orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `investigation_queue`
--
ALTER TABLE `investigation_queue`
  MODIFY `investigation_queue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `mshdiagnosis`
--
ALTER TABLE `mshdiagnosis`
  MODIFY `diagnosisid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `patient_allergy`
--
ALTER TABLE `patient_allergy`
  MODIFY `patient_allergy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `patient_register`
--
ALTER TABLE `patient_register`
  MODIFY `patientid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT for table `paymenttimeline`
--
ALTER TABLE `paymenttimeline`
  MODIFY `paymenttimelineid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pharmacy_drugcategory`
--
ALTER TABLE `pharmacy_drugcategory`
  MODIFY `pharmacy_drugcategoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `pharmacy_drugs`
--
ALTER TABLE `pharmacy_drugs`
  MODIFY `pharma_drugsid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `pharmacy_drugtype`
--
ALTER TABLE `pharmacy_drugtype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pharmacy_queue`
--
ALTER TABLE `pharmacy_queue`
  MODIFY `pharmacy_queueid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `returnrate`
--
ALTER TABLE `returnrate`
  MODIFY `returnrateid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staffid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  MODIFY `triage_queue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `triage_report`
--
ALTER TABLE `triage_report`
  MODIFY `triage_reportidd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
--
-- AUTO_INCREMENT for table `triage_vitals`
--
ALTER TABLE `triage_vitals`
  MODIFY `vsid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
