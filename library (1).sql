-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 24, 2021 at 07:07 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `aid` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `email`, `password`) VALUES
(1, 'gowthamraghunathan@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `bookacc`
--

DROP TABLE IF EXISTS `bookacc`;
CREATE TABLE IF NOT EXISTS `bookacc` (
  `bcid` int(11) NOT NULL AUTO_INCREMENT,
  `accno` varchar(10) DEFAULT NULL,
  `bfid` int(11) DEFAULT NULL,
  `isissued` varchar(3) DEFAULT 'no',
  `volume` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`bcid`),
  UNIQUE KEY `accno` (`accno`),
  KEY `bfid` (`bfid`)
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookacc`
--

INSERT INTO `bookacc` (`bcid`, `accno`, `bfid`, `isissued`, `volume`) VALUES
(1, 'SFA-1', 1, 'no', '8th'),
(2, 'SFA-4', 2, 'yes', ''),
(3, 'SFA-6', 3, 'no', '15th'),
(4, 'SFA-7', 4, 'no', '1st & 2nd'),
(5, 'SFA-8', 5, 'no', '13th'),
(6, 'SFA-15', 6, 'no', '16th'),
(7, 'SFA-17', 7, 'no', '5th'),
(8, 'SFA-18', 8, 'no', '1st /6th'),
(9, 'SFA-407', 9, 'no', '5th'),
(10, 'SFA-447', 10, 'no', '1st'),
(11, 'SFA 582', 11, 'no', '11-01-1900'),
(12, 'SFA 583', 11, 'no', '11-01-1900'),
(13, 'SFA 584', 12, 'no', '25-01-1900'),
(14, 'SFA 585', 12, 'no', '25-01-1900'),
(15, 'SFA 586', 12, 'no', '25-01-1900'),
(16, 'SFA 587', 12, 'no', '25-01-1900'),
(17, 'SFA 588', 12, 'no', '25-01-1900'),
(18, 'SFA 589', 13, 'no', '03-01-1900'),
(19, 'SFA 590', 14, 'no', '-'),
(20, 'SFA 591', 14, 'no', '-'),
(21, 'SFA 592', 14, 'no', '-'),
(22, 'SFA 593', 15, 'no', '06-01-1900'),
(23, 'SFA 594', 15, 'no', '06-01-1900'),
(24, 'SFA 595', 16, 'no', '06-01-1900'),
(25, 'SFA 596', 16, 'no', '06-01-1900'),
(26, 'SFA-659', 17, 'no', ''),
(27, 'SFA-660', 17, 'no', ''),
(28, 'SFA-661', 18, 'no', ''),
(29, 'SFA-662', 18, 'no', ''),
(30, 'SFA-663', 18, 'no', ''),
(31, 'SFA-667', 19, 'no', ''),
(32, 'SFA-668', 19, 'no', ''),
(33, 'SFA-669', 19, 'no', ''),
(34, 'SFA-670', 20, 'no', 'Vol. 1'),
(35, 'SFA-671', 20, 'no', 'Vol. 1'),
(36, 'SFA-672', 20, 'no', 'Vol. 1'),
(37, 'SFA - 673', 21, 'no', '4th Edition'),
(38, 'SFA - 674', 21, 'no', '4th Edition'),
(39, 'SFA - 675', 21, 'no', '4th Edition'),
(40, 'SFA - 676', 21, 'no', '4th Edition'),
(41, 'SFA -677', 22, 'no', ''),
(42, 'SFA -678', 22, 'no', ''),
(43, 'SFA -679', 22, 'no', ''),
(44, 'SFA -680', 23, 'no', ''),
(45, 'SFA - 681', 23, 'no', ''),
(46, 'SFA - 682', 24, 'no', 'Vol. 2'),
(47, 'SFA-683', 25, 'no', ''),
(48, 'SFA-684', 25, 'no', ''),
(49, 'SFA-685', 26, 'no', ''),
(50, 'SFA- 690', 27, 'no', '6th Edition'),
(51, 'SFA - 691', 27, 'no', '6th Edition'),
(52, 'SFA- 692', 27, 'no', '6th Edition'),
(53, 'SFA-693', 28, 'no', 'Vol. 2'),
(54, 'SFA-694', 28, 'no', 'Vol. 2'),
(55, 'SFA- 695', 28, 'no', 'Vol. 2'),
(56, 'SFA-698', 29, 'no', '5th'),
(57, 'SFA-699', 30, 'no', '6th'),
(58, 'SFA-2', 31, 'no', '2nd'),
(59, 'SFA-3', 32, 'no', '13th '),
(60, 'SFA-5', 33, 'no', '3rd'),
(61, 'SFA-9', 34, 'no', '8th '),
(62, 'SFA-10', 34, 'no', '8th '),
(63, 'SFA-11', 35, 'no', '3rd'),
(64, 'SFA-12', 35, 'no', '3rd'),
(65, 'SFA-13', 35, 'no', '3rd'),
(66, 'SFA-14', 35, 'no', '3rd'),
(67, 'SFA-16', 36, 'no', '3rd'),
(68, 'SFA-416', 37, 'no', ''),
(69, 'SFA-417', 38, 'no', ''),
(70, 'SFA-418', 38, 'no', ''),
(71, 'SFA-429', 39, 'no', ''),
(72, 'SFA-479', 40, 'no', '25'),
(73, 'SFA-480', 40, 'no', '25'),
(74, 'SFA -481', 40, 'no', '25'),
(75, 'SFA- 482', 40, 'no', '25'),
(76, 'SFA- 483', 40, 'no', '25'),
(77, 'SFA-488', 41, 'no', '19th'),
(78, 'SFA-489', 41, 'no', '19th'),
(79, 'SFA-490', 41, 'no', '19th'),
(80, 'SFA-491', 41, 'no', '19th'),
(81, 'SFA-492', 42, 'no', '11th'),
(82, 'SFA-493', 42, 'no', '11th'),
(83, 'SFA-494', 42, 'no', '11th'),
(84, 'SFA-495', 42, 'no', '11th'),
(85, 'SFA-496', 42, 'no', '11th'),
(86, 'SFA-504', 43, 'no', ''),
(87, 'SFA -505', 43, 'no', ''),
(88, 'SFA -506', 43, 'no', ''),
(89, 'SFA -507', 43, 'no', ''),
(90, 'SFA -508', 43, 'no', ''),
(91, 'SFA- 525', 44, 'no', '12th'),
(92, 'SFA- 526', 44, 'no', '12th'),
(93, 'SFA- 527', 44, 'no', '12th'),
(94, 'SFA- 528', 44, 'no', '12th'),
(95, 'SFA -529', 45, 'no', '10th '),
(96, 'SFA -530', 45, 'no', '10th '),
(97, 'SFA -531', 45, 'no', '10th '),
(98, 'SFA- 532', 45, 'no', '10th '),
(99, 'SFA - 533', 46, 'no', ''),
(100, 'SFA - 534', 46, 'no', ''),
(101, 'SFA-535', 47, 'no', '6th'),
(102, 'SFA-536', 47, 'no', '6th'),
(103, 'SFA-537', 47, 'no', '6th'),
(104, 'SFA-538', 47, 'no', '6th'),
(105, 'SFA-539', 47, 'no', '6th'),
(106, 'SFA 597', 48, 'no', '5'),
(107, 'SFA 598', 48, 'no', '5'),
(108, 'SFA 599', 48, 'no', '5'),
(109, 'SFA 600', 48, 'no', '5'),
(110, 'SFA 601', 49, 'no', '4'),
(111, 'SFA 602', 49, 'no', '4'),
(112, 'SFA 603', 49, 'no', '4'),
(113, 'SFA 604', 49, 'no', '4'),
(114, 'SFA -636', 50, 'no', '46th E'),
(115, 'SFA-710', 51, 'no', '1st E'),
(116, 'SFA-711 ', 52, 'no', '6th E'),
(117, 'sfa-999', 1, 'yes', '6');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `subid` int(11) DEFAULT NULL,
  `dateofacc` varchar(100) DEFAULT NULL,
  `author` varchar(300) DEFAULT NULL,
  `title` varchar(300) NOT NULL,
  `publisher` varchar(100) DEFAULT NULL,
  `year` varchar(20) DEFAULT NULL,
  `nopages` varchar(30) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `shelfno` int(11) DEFAULT NULL,
  PRIMARY KEY (`bid`),
  KEY `subid` (`subid`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bid`, `subid`, `dateofacc`, `author`, `title`, `publisher`, `year`, `nopages`, `price`, `shelfno`) VALUES
(1, 1, '', 'S.N Maheshwari  & S.K Maheshwari', 'Advanced Acountancy', 'Vikas Publishing House Ltd Delhi', '2000', '3.215', '250', 0),
(2, 1, '2021/11/07', 'Nirmal Gupta & Chhavi Sharma', 'Corporate Accounting', 'Ann Books India , New Delhi', '2008', '701', '270', NULL),
(3, 1, '2021/11/07', 'M C Shukla, S.C Guptha &Grewal', 'Advanced Accounts', 'Chand Publications, New Delhi', '2002', '328', '525', NULL),
(4, 1, '2021/11/07', 'Mukherjee &M. Hanif', 'Modern Accountancy', 'Tata Mcgrow Hill Publishing Company Ltd, New Delhi', '2001', '37.74', '500', NULL),
(5, 1, '2021/11/07', 'R.L Gupta & M Radhaswamy', 'Advanced Accounting', 'Sulthan, Chand &Co, New Delhi', '2015', '', '595', NULL),
(6, 1, '2021/11/07', 'D.S Rawath', 'Students Guide To Accounting Standard', 'Taxmann , New Delhi', '2010', '681', '415', NULL),
(7, 1, '2021/11/07', 'S.N Maheshwari &Suneel Maheshwari', 'Financial Accounting', 'Vikas Publications House Ltd Delhi', '2014', '498', '595', NULL),
(8, 1, '2021/11/07', 'S.N Maheshwari &Suneel Maheshwari', 'Problems And Solutions In Advanced Accountancy', 'Vikas Publishing House Ltd Delhi', '2014', '3.294', '470', NULL),
(9, 1, '2021/11/07', 'K K Tomy', 'Computerized Accounting Tally', 'Prakash Publications', '2016', '215', '130', NULL),
(10, 1, '2021/11/07', '', 'Fundamentals Of Financial Accounting', 'Vijayalakshmi Printing Works Pvt Ltd', '2013', '400', '', NULL),
(11, 1, '2021/11/07', 'MC Shukla, TS Grewal, SC Gupta', 'Advanced Accounting', 'S. Chand', '07-10-1905', '', '11/29/1901', NULL),
(12, 1, '2021/11/07', 'S.P Jain and K.L Narang', 'Advanced Accounting', 'Kalyani Publicatios', '07-09-1905', '', '10-11-1901', NULL),
(13, 1, '2021/11/07', 'Dr. D.S Rawat', 'Students Guide to Accounting Standard', 'Taxmann', '07-11-1905', '2/21/1901', '04-09-1901', NULL),
(14, 1, '2021/11/07', 'T.S. Reddy and Dr. A Murthy', 'Financial Accounting', 'Margham', '07-10-1905', '', '12-05-1900', NULL),
(15, 1, '', 'T.S. Reddy and Dr. A Murthy', 'Corporate Accounting Volume Two', 'Margham', '07-11-1905', '', '09-06-1900', 3),
(16, 1, '2021/11/07', 'T.S. Reddy and Dr. A Murthy', 'Corporate Accounting Volume One', 'Margham', '07-11-1905', '', '8/17/1900', NULL),
(17, 1, '2021/11/07', 'S.P. Jain (Author), K.L. Narang', 'Advanced Financial Accounting for M.Com 2nd Semester of M.G. University', 'KALYANI PUBLISHER', '01-Jan-20', '', '299', NULL),
(18, 1, '2021/11/07', 'Dr. S. K. Singh, Dr. Banarasi Mishra', 'Practical Problems in Financial Accounting', 'SBPD Publications', '01-Jan-20', '407', '445', NULL),
(19, 1, '2021/11/07', 'Dr.Kishor A Wangal', 'Practical Problem Solution in Financial Accounting(B.Com-2nd year, 3rd Sem) in English', 'Sai Jyoythi Publication', '11-Jul-05', '', '290', NULL),
(20, 1, '2021/11/07', 'R.L. Gupta. & M Radhaswamy', 'Advanced Accountancy: Theory, Method and Application - Vol. 1', 'Sultan Chand & Sons', '01-Jan-13', '1828', '685', NULL),
(21, 1, '2021/11/07', 'Goyal V.K & Ruchi Goyal', 'Financial Accounting', 'Prentice Hall India Learning Private Limited', '01-Jan-12', '668', '317', NULL),
(22, 1, '2021/11/07', 'Dr. S.M. Shukla', 'Advanced Financial Accounting ) B.Com 2nd Semester', 'Sahitya Bhawan Publications', '01-Jan-18', '', '300', NULL),
(23, 1, '2021/11/07', 'R.L.Gupta, V.K.Gupta', 'Financial Accounting (Reprint 2016)', 'Sultan Chand & Sons', '01-Jan-16', '', '395', NULL),
(24, 1, '2021/11/07', 'M C Shukla, T.S Grewal & S.C Gupta', 'Advanced Accounts - Volume II', 'S Chand Publishing', '01-Jan-16', '1304', '699', NULL),
(25, 1, '2021/11/07', 'S.P. Jain,  K.L. Narang,  Simmi Agrawal & Monika Sehgal', 'Financial Accounting [including Goods and Service Tax(GST)] For B.Com., B.Com.(AF), B.Com.(BM), B.Com.(CS), BBA, B.Sc.(ISM), B.Sc. Maths Allied and BCA of University of Madras', 'KALYANI PUBLISHER', '01-Jan-20', '', '395', NULL),
(26, 1, '2021/11/07', 'Dr. Amit Kumar, Dr. B. Jagdish Rao', 'Marketing Management For B.Com. M.Com. B.B.A. & M.B.A. Classes of Various Universities Paperback â€“ 1 January 2019', 'Sahitya Bhawan Publications', '01-Jan-19', '352', '200', NULL),
(27, 1, '2021/11/07', 'S. N. Maheshwari, Suneel K Maheshwari, Sharad K Maheshwari', 'Financial Accounting Paperback', 'Vikas Publishing House', '01-Jan-18', '1024', '675', NULL),
(28, 1, '2021/11/07', 'R.L. Gupta. & M Radhaswamy', 'Advanced Accountancy - Vol. 2', 'Sultan Chand & Sons', '01-Jan-14', '', '685', NULL),
(29, 1, '2021/11/07', 'B.D.Chatterjee', 'Illustrated Guide to Indian Accounting Standards', 'Taxmann Publications (P.) Ltd', '10-Jul-05', '1208', '2675', NULL),
(30, 1, '2021/11/07', 'BPP Learning media', 'Diploma in International Financial Reporting', 'BPP Learning media', '12-Jul-05', '539', '3900', NULL),
(31, 2, '2021/11/07', 'Mohammed Arif Pasha', 'Accounting For Managers', 'Vrindha Publishing Ltd Delhi', '2009', '864', '325', NULL),
(32, 2, '2021/11/07', 'S.N Maheshwari  ', 'Management Accounting And Financial Conrol', 'Sulthan, Chand &Co, New Delhi', '2002', 'G 30', '300', NULL),
(33, 2, '2021/11/07', 'Richard Lynsh  &Robert Williamson', 'Accounting For Management', 'Tata Mcgrow Hill Publishing Company Ltd, New Delhi', '2000', '542', '685', NULL),
(34, 2, '2021/11/07', 'Jain & Narang, Simmi Agarwal & Monica Sehgal', 'Cost &Management Accounting', 'Kalyani Publishers, New Delhi', '2001', '139', '295', NULL),
(35, 2, '2021/11/07', 'M Y Khan & P.K Jain', 'Management Accounting ', 'Tata Mcgrow Hill Publishing Company Ltd, New Delhi', '2000', '22.5', '602', NULL),
(36, 2, '2021/11/07', 'Richard Lynsh  &Robert Williamson', 'Accounting For Management', 'Tata Mcgrow Hill Publishing Company Ltd, New Delhi', '2000', '542', '685', NULL),
(37, 2, '2021/11/07', '', 'Accounting For Management', '', '', '91', '', NULL),
(38, 2, '2021/11/07', 'S.N Maheshwari,Suweel Maheswari & Sharad Maheswari', 'Managemnet Accounting & Control System', 'Vikas Publishing House Ltd Delhi', '2013', '239', '', NULL),
(39, 2, '2021/11/07', 'Mahatma Gandhi University', 'Accounting For Management', '', '2002', '148', '', NULL),
(40, 2, '2021/11/07', 'S.P. Jain /K.L.Narang & Simi Agarwal', 'Cost Accounting Principle& Practice', 'Kalyani Publications', '2016', 'VII/10-16', '650', NULL),
(41, 2, '2021/11/07', 'M.C.Shukla ,T.S.Grewal ,S.C.Gupta', 'Advanced Accounts. Volume.II.', 'S.Chand ,New Delhi', '2018', '', '699', NULL),
(42, 2, '2021/11/07', 'S.N Maheswari & S.K.Maheswari', 'Advanced Accountancy  Volume.II', 'Vikas Publications', '2018', '', '750', NULL),
(43, 2, '2021/11/07', 'S P Jain, K L Narang, S Agarwal', 'Advanced Cost Accounting(Cost Management)', 'Kalyani Publications', '2017', 'VI/7-16', '650', NULL),
(44, 2, '2021/11/07', 'M.N Arora', 'Cost Accounting Principle& Practice', 'Vikas Publishing', '2018', '', '550', NULL),
(45, 2, '2021/11/07', 'M.N Arora', 'Cost and Management Accounting', 'Vikas Publishing', '2017', '', '650', NULL),
(46, 2, '2021/11/07', 'M.C Shukla, T.S Grewal & Dr. M P Gupta', 'Cost Accounting Text& Problems', 'S.Chand ,New Delhi', '2018', '', '595', NULL),
(47, 2, '2021/11/07', 'S.N Maheswari & S.K.Maheswari', 'Advanced Accounting', 'Vikas Publishing', '2014', '', '725', NULL),
(48, 2, '2021/11/07', 'T.S. Reddy and Dr. Y Hariprasad Reddy', 'Management Accounting', 'Margham', '2017', '', '270', NULL),
(49, 2, '2021/11/07', 'T.S. Reddy and Dr. Y Hariprasad Reddy', 'Cost Accounting', 'Margham', '2014', '', '270', NULL),
(50, 2, '2021/11/07', 'Pro. M L Agarwal & Dr. K L Gupta', 'Advanced Cost Accounting', 'Sahithya Bhavan Publishers', '2020', '958', '700', NULL),
(51, 2, '2021/11/07', 'N.K. SharmaÂ ', 'Advanced Cost Accounting', 'ABD Publishers', '2001', '1250', '', NULL),
(52, 2, '2021/11/07', 'Jawahar LalÂ ,Â Seema SrivastavÂ ,Â Manisha SinghÂ ', 'Cost Accounting : Text, Problems and Cases', 'McGraw-Hill', '2019', 'Â 1068Â ', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

DROP TABLE IF EXISTS `faculty`;
CREATE TABLE IF NOT EXISTS `faculty` (
  `fid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phoneno` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`fid`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`fid`, `username`, `email`, `phoneno`, `password`) VALUES
(1, 'gowtham', 'gowthamraghunathan@gmail.com', '8089964829', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `fac_book_issue`
--

DROP TABLE IF EXISTS `fac_book_issue`;
CREATE TABLE IF NOT EXISTS `fac_book_issue` (
  `fbid` int(11) NOT NULL AUTO_INCREMENT,
  `book_acc` varchar(50) NOT NULL,
  `facname` varchar(50) DEFAULT NULL,
  `issue_date` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `actual` date NOT NULL,
  `book_title` varchar(50) NOT NULL,
  `return_date` date DEFAULT NULL,
  `ret_stat` int(11) DEFAULT '0',
  `maildiff` int(11) DEFAULT NULL,
  `mailsent` int(11) DEFAULT '0',
  `fid` int(11) DEFAULT NULL,
  PRIMARY KEY (`fbid`),
  KEY `fid` (`fid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fac_book_issue`
--

INSERT INTO `fac_book_issue` (`fbid`, `book_acc`, `facname`, `issue_date`, `email`, `actual`, `book_title`, `return_date`, `ret_stat`, `maildiff`, `mailsent`, `fid`) VALUES
(1, 'SFA-2', 'gowtham', '2021-10-31', 'gowthamraghunathan@gmail.com', '2022-05-02', 'ACCOUNTING FOR MANAGERS', '2021-11-01', 1, 183, 0, 1),
(2, 'sfa-10', 'gowtham', '2021-11-01', 'gowthamraghunathan@gmail.com', '2022-05-03', 'financing', '2021-11-07', 1, 183, 0, 1),
(3, 'sfa-10', 'gowtham', '2021-11-10', 'gowthamraghunathan@gmail.com', '2022-05-12', 'Cost &Management Accounting', '2021-11-10', 1, 183, 0, 1),
(4, 'sfa-4', 'gowtham', '2021-11-11', 'gowthamraghunathan@gmail.com', '2022-05-13', 'Corporate Accounting', '2021-11-11', 1, 183, 0, 1),
(5, 'sfa-4', 'gowtham', '2021-11-24', 'gowthamraghunathan@gmail.com', '2022-05-26', 'Corporate Accounting', NULL, 0, 183, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `uprn` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phoneno` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(3) NOT NULL,
  `tot` int(11) DEFAULT '0',
  `crtdate` date DEFAULT NULL,
  `exprydate` date DEFAULT NULL,
  `isexp` varchar(10) DEFAULT 'active',
  PRIMARY KEY (`sid`),
  UNIQUE KEY `uprn` (`uprn`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sid`, `username`, `uprn`, `email`, `phoneno`, `password`, `role`, `tot`, `crtdate`, `exprydate`, `isexp`) VALUES
(1, 'thyag', '192113110', 'thyag@gmail.com', '234567898', '4321', 'ug', 1, '2021-11-08', '2024-11-07', 'active'),
(2, 'rohith', '192113111', 'rohith@gmail.com', '234565432', 'rohith192113', 'pg', 0, '2021-11-08', '2023-11-08', 'active'),
(3, 'gowtham', '192113118', 'gowthamraghunathan@gmail.com', '2345678987', '1234', 'ug', 0, '2021-11-08', '2024-11-07', 'active'),
(4, 'Ashish', '192113112', 'asishkumarvv011@gmail.com', '87653356', '1234', 'ug', 0, NULL, NULL, 'expired');

-- --------------------------------------------------------

--
-- Table structure for table `stud_book_issue`
--

DROP TABLE IF EXISTS `stud_book_issue`;
CREATE TABLE IF NOT EXISTS `stud_book_issue` (
  `sbid` int(11) NOT NULL AUTO_INCREMENT,
  `sid` int(11) DEFAULT NULL,
  `uprn` varchar(10) NOT NULL,
  `stname` varchar(30) NOT NULL,
  `book_title` varchar(100) DEFAULT NULL,
  `issue_date` date NOT NULL,
  `actual` date NOT NULL,
  `returned` date DEFAULT NULL,
  `ret_stat` int(11) DEFAULT '0',
  `fine_status` int(11) DEFAULT '0',
  `book_acc` varchar(10) NOT NULL,
  `paid` varchar(5) DEFAULT NULL,
  `maildiff` int(11) DEFAULT NULL,
  `mailsent` int(11) DEFAULT '0',
  PRIMARY KEY (`sbid`),
  KEY `sid` (`sid`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stud_book_issue`
--

INSERT INTO `stud_book_issue` (`sbid`, `sid`, `uprn`, `stname`, `book_title`, `issue_date`, `actual`, `returned`, `ret_stat`, `fine_status`, `book_acc`, `paid`, `maildiff`, `mailsent`) VALUES
(1, 3, '192113118', 'gowtham', 'Advanced Acountancy', '2021-11-08', '2021-11-22', '2021-11-08', 1, 0, 'SFA-1', 'yes', 14, 0),
(2, 3, '192113118', 'gowtham', 'Accounting For Managers', '2021-11-08', '2021-11-22', '2021-11-08', 1, 0, 'sfa-2', 'yes', 14, 0),
(3, 3, '192113118', 'gowtham', 'Advanced Acountancy', '2021-11-10', '2021-11-24', '2021-11-10', 1, 0, 'sfa-1', 'yes', 14, 0),
(4, 3, '192113118', 'gowtham', 'Advanced Acountancy', '2021-11-10', '2021-11-24', '2021-11-10', 1, 0, 'sfa-1', 'yes', 14, 0),
(5, 3, '192113118', 'gowtham', 'Advanced Acountancy', '2021-11-10', '2021-11-24', '2021-11-11', 1, 0, 'sfa-1', 'yes', 14, 0),
(6, 3, '192113118', 'gowtham', 'Advanced Acountancy', '2021-11-11', '2021-11-25', '2021-11-11', 1, 0, 'sfa-1', 'yes', 14, 0),
(7, 3, '192113118', 'gowtham', 'Advanced Acountancy', '2021-11-11', '2021-11-25', '2021-11-11', 1, 0, 'sfa-1', 'yes', 14, 0),
(8, 3, '192113118', 'gowtham', 'Advanced Acountancy', '2021-11-13', '2021-11-27', '2021-11-13', 1, 0, 'sfa-1', 'yes', 14, 0),
(9, 3, '192113118', 'gowtham', 'Advanced Acountancy', '2021-11-15', '2021-11-29', '2021-11-23', 1, 0, 'SFA-1', 'yes', 14, 0),
(10, 3, '192113118', 'gowtham', 'Advanced Acountancy', '2021-11-23', '2021-12-07', '2021-11-23', 1, 0, 'sfa-1', 'yes', 14, 0),
(11, 3, '192113118', 'gowtham', 'Advanced Acountancy', '2021-11-23', '2021-12-07', '2021-11-23', 1, 0, 'sfa-999', 'yes', 14, 0),
(12, 3, '192113118', 'gowtham', 'Advanced Acountancy', '2021-11-24', '2021-12-08', '2021-11-24', 1, 0, 'sfa-1', 'yes', 14, 0),
(13, 1, '192113110', 'thyag', 'Advanced Acountancy', '2021-11-24', '2021-12-08', '2021-11-24', 1, 0, 'sfa-999', 'yes', 14, 0),
(14, 1, '192113110', 'thyag', 'Advanced Acountancy', '2021-11-24', '2021-12-08', NULL, 0, 0, 'sfa-999', NULL, 14, 0),
(15, 1, '192113110', 'thyag', 'Advanced Acountancy', '2021-11-24', '2021-12-08', '2021-11-24', 1, 0, 'sfa-1', 'yes', 14, 0),
(16, 3, '192113118', 'gowtham', 'Cost &Management Accounting', '2021-11-24', '2021-12-08', '2021-11-24', 1, 0, 'sfa-10', 'yes', 14, 0);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
CREATE TABLE IF NOT EXISTS `subject` (
  `subid` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(100) NOT NULL,
  PRIMARY KEY (`subid`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subid`, `subject`) VALUES
(1, 'Accounting'),
(2, 'Cost and Management Accounting'),
(3, 'Quantitative Techniques'),
(4, 'Operational Research'),
(5, 'Information Technology'),
(6, 'Advertisement & Sales Promotion'),
(7, 'Goods & Services Tax'),
(8, 'Business Law'),
(9, 'Business Mathematics'),
(10, 'Business Communication'),
(11, 'Business Environment'),
(12, 'Economics'),
(13, 'Organisational Behaviour'),
(14, 'International Finance'),
(15, 'International Business'),
(16, 'Management Information System'),
(17, 'Management'),
(18, 'Business Management'),
(19, 'Production & Operations Management'),
(20, 'Human Resource Management'),
(21, 'Marketing Management'),
(22, 'Strategic Management'),
(23, 'Entrepreneurship Development & Project Management'),
(24, 'Financial Management'),
(25, 'Security Analysis & Portfolio Management'),
(26, 'Financial Derivatives'),
(27, 'Financial Services'),
(28, 'Financial Markets & Operations'),
(29, 'Research Methodology'),
(30, 'Auditing'),
(31, 'Banking'),
(32, 'Insurance'),
(33, 'Econometrics'),
(34, 'Reference Texts'),
(35, 'Miscellaneous'),
(36, 'Accounting'),
(37, 'Cost and Management Accounting'),
(38, 'Quantitative Techniques'),
(39, 'Operational Research'),
(40, 'Information Technology'),
(41, 'Advertisement & Sales Promotion'),
(42, 'Goods & Services Tax'),
(43, 'Business Law'),
(44, 'Business Mathematics'),
(45, 'Business Communication'),
(46, 'Business Environment'),
(47, 'Economics'),
(48, 'Organisational Behaviour'),
(49, 'International Finance'),
(50, 'International Business'),
(51, 'Management Information System'),
(52, 'Management'),
(53, 'Business Management'),
(54, 'Production & Operations Management'),
(55, 'Human Resource Management'),
(56, 'Marketing Management'),
(57, 'Strategic Management'),
(58, 'Entrepreneurship Development & Project Management'),
(59, 'Financial Management'),
(60, 'Security Analysis & Portfolio Management'),
(61, 'Financial Derivatives'),
(62, 'Financial Services'),
(63, 'Financial Markets & Operations'),
(64, 'Research Methodology'),
(65, 'Auditing'),
(66, 'Banking'),
(67, 'Insurance'),
(68, 'Econometrics'),
(69, 'Reference Texts'),
(70, 'Miscellaneous'),
(71, 'subject'),
(72, 'subject');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookacc`
--
ALTER TABLE `bookacc`
  ADD CONSTRAINT `bookacc_ibfk_1` FOREIGN KEY (`bfid`) REFERENCES `books` (`bid`) ON DELETE CASCADE;

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`subid`) REFERENCES `subject` (`subid`);

--
-- Constraints for table `fac_book_issue`
--
ALTER TABLE `fac_book_issue`
  ADD CONSTRAINT `fac_book_issue_ibfk_1` FOREIGN KEY (`fid`) REFERENCES `faculty` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stud_book_issue`
--
ALTER TABLE `stud_book_issue`
  ADD CONSTRAINT `stud_book_issue_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `student` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
