-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2014 at 03:12 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `drivingschool`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE IF NOT EXISTS `branches` (
  `b_id` int(11) NOT NULL AUTO_INCREMENT,
  `branch` text NOT NULL,
  PRIMARY KEY (`b_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=70 ;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`b_id`, `branch`) VALUES
(12, 'Quezon City - SM City North Edsa, The Block'),
(15, 'Quezon City - SM City Sta. Mesa, Lower Ground Floor'),
(16, 'Quezon City - SM Cubao, Lower Ground Floor, Times Square St.'),
(17, 'Quezon City - SM City Sta. Mesa, Lower Ground Floor'),
(18, 'Quezon City - Robinsons Magnolia (SOON TO OPEN)'),
(19, 'Quezon City - Trinoma, Ground Floor, Service Lane'),
(20, 'Quezon City - Ever Commonwealth, Ground Floor'),
(21, 'Quezon City - Cyber Mall, Ground Floor, Eastwood City'),
(22, 'Quezon City - Broadway Centrum, Aurora Blvd. cor. Doña Juana Rodriguez Ave.'),
(23, 'Quezon City - Fairview Center Mall, Lower Ground Floor, Don Mariano Ave.'),
(24, 'Quezon City - 164 Rosal St., Pingkian Village, Sauyo, Novaliches'),
(25, 'Manila - SM City Manila, Upper Ground Floor'),
(26, 'Manila - SM City San Lazaro, Lower Ground Floor'),
(27, 'Manila - Robinson’s Place Manila, Level 1'),
(28, 'Mnaila - Harrison Plaza, Ground Floor'),
(29, 'Mandaluyong - SM Megamall, Lower Ground Floor, Bldg. A'),
(30, 'Mandaluyong - Rustan’s Shangri-la Plaza Mall, EDSA corner Shaw Blvd.'),
(31, 'Mandaluyong - Beacon Plaza, Shaw Blvd. corner Ideal St.'),
(32, 'Mandaluyong - Unit G, 641 Boni Ave., Brgy. Plainview'),
(33, 'Makati - Greeenbelt 1, Ground Floor'),
(34, 'Makati - Rustan’s Makati Supermarket, Ayala Ave.'),
(35, 'Makati - Rustan’s Supermarket, Powerplant Mall'),
(36, 'Las Piñas - SM Southmall, Lower Ground Floor'),
(37, 'Las Piñas - SM Center Las Piñas, Service Lane'),
(38, 'Las Piñas - 4965 Naga Road, Pulang Lupa'),
(39, 'Pasay - SM Mall of Asia, Ground Floor, South Wing'),
(40, 'San Juan - Shoppesville Arcade, Ground Flr., Greenhills Shopping Center'),
(41, 'Taguig - Market! Market! Services Row, Fiesta Market Extension'),
(42, 'Marikina - SM City Marikina, Ground Floor, Upper Parking Level'),
(43, 'Caloocan - Victory Mall, Ground Floor'),
(44, 'Muntinlupa - Alabang Town Center, Lower Ground Floor'),
(45, 'Valenzuela - SM Supercenter Valenzuela, Ground Floor, Service Lane'),
(46, 'Parañaque- Alabang Town Center, Lower Ground Floor'),
(47, 'Parañaque - SM Supercenter Sucat, 3rd Floor'),
(48, 'Rizal - SM City Taytay, Basement 2'),
(49, 'Rizal - Sta. Lucia East Grand Mall, Ground Floor, Cainta'),
(50, 'Rizal - SM City Taytay, Basement 2'),
(51, 'Rizal - Shopwise Antipolo, Ground Floor'),
(52, 'Laguna - SM City Sta. Rosa, Ground Floor'),
(53, 'Laguna - SM City Calamba, 3rd Floor'),
(54, 'Laguna - Paseo De Sta.Rosa, Unit A23, SRCM Phase 2'),
(55, 'Laguna - Stall no. 2 Madison Square, Landayan, San Pedro'),
(56, 'Cavite - SM City Bacoor, Lower Ground Floor'),
(57, 'Cavite - SM City Dasmariñas, Upper Ground Floor'),
(58, 'Cavite - SM Supercenter Molino, Ground Floor, Service Lane'),
(59, 'Cavite - Waltermart Dasmariñas, Ground Floor'),
(60, 'Batangas - SM City Lipa, Ground Floor'),
(61, 'Batangas - SM City Dasmariñas, Upper Ground Floor'),
(62, 'Batangas - SM Supercenter Molino, Ground Floor, Service Lane'),
(63, 'Batangas - Waltermart Dasmariñas, Ground Floor'),
(64, 'Bulacan - SM City Marilao, Ground Floor'),
(65, 'Baguio - SM City Baguio, Upper Basement'),
(66, 'Cebu - SM City Cebu, Lower Ground Floor'),
(67, 'Cebu - Ayala Center Cebu, 4th Floor'),
(68, 'Cebu - Elizabeth Mall (Emall), Ground Floor'),
(69, 'Davao - SM City Davao, Ground Floor, Level 2 entrance');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('c2b0d39254b38c11c41ced16c65ad20e', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1985.125 Safari/537.36', 1408496438, '');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `courses` text NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`c_id`, `courses`) VALUES
(9, 'Premium'),
(10, 'Executive');

-- --------------------------------------------------------

--
-- Table structure for table `course_fee`
--

CREATE TABLE IF NOT EXISTS `course_fee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `course_type_id` int(11) NOT NULL,
  `course_fee` text NOT NULL,
  `course_hours` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=90 ;

--
-- Dumping data for table `course_fee`
--

INSERT INTO `course_fee` (`id`, `course_id`, `course_type_id`, `course_fee`, `course_hours`) VALUES
(8, 9, 24, 'Php 3400', '5 Hours'),
(9, 9, 24, 'Php 4700', '7 Hours'),
(10, 9, 24, 'Php 6600', '10 Hours'),
(11, 9, 24, 'Php 9800', '15 Hours'),
(12, 9, 24, 'Php 12800', '20 Hours'),
(13, 9, 24, 'Php 18700', '30 Hours'),
(14, 9, 25, 'Php 4200', '5 Hours'),
(15, 9, 25, 'Php 5900', '7 Hours'),
(16, 9, 25, 'Php 8300', '10 Hours'),
(17, 9, 25, 'Php 12200', '15 Hours'),
(18, 9, 25, 'Php 16000', '20 Hours'),
(19, 9, 25, 'Php 23300', '30 Hours'),
(20, 9, 27, 'Php 5800', '5 Hours'),
(21, 9, 27, 'Php 7800', '7 Hours'),
(22, 9, 27, 'Php 11000', '10 Hours'),
(23, 9, 27, 'Php 16400', '15 Hours'),
(24, 9, 27, 'Php 21700', '20 Hours'),
(25, 9, 27, 'Php 31000', '30 Hours'),
(26, 9, 32, 'Php 7200', '5 Hours'),
(27, 9, 32, 'Php 9900', '7 Hours'),
(28, 9, 32, 'Php 13700', '10 Hours'),
(29, 9, 32, 'Php 20400', '15 Hours'),
(30, 9, 32, 'Php 26500', '20 Hours'),
(31, 9, 32, 'Php 38800', '30 Hours'),
(36, 9, 29, 'Php 6100', '5 Hours'),
(37, 9, 29, 'Php 8500', '7 Hours'),
(38, 9, 29, 'Php 12000', '10 Hours'),
(39, 9, 29, 'Php 17700', '15 Hours'),
(40, 9, 29, 'Php 23300', '20 Hours'),
(41, 9, 29, 'Php 33800', '30 Hours'),
(42, 9, 30, 'Php 8000', '5 Hours'),
(43, 9, 30, 'Php 10800', '7 Hours'),
(44, 9, 30, 'Php 15200', '10 Hours'),
(45, 9, 30, 'Php 22500', '15 Hours'),
(46, 9, 30, 'Php 29200', '20 Hours'),
(47, 9, 30, 'Php 42800', '30 Hours'),
(48, 9, 31, 'Php 8200', '5 Hours'),
(49, 9, 31, 'Php 11200', '7 Hours'),
(50, 9, 31, 'Php 15600', '10 Hours'),
(51, 9, 31, 'Php 23200', '15 Hours'),
(52, 9, 31, 'Php 30200', '20 Hours'),
(53, 9, 31, 'Php 44300', '30 Hours'),
(54, 10, 33, 'Php 7100', '5 Hours'),
(55, 10, 33, 'Php 10700', '7 Hours'),
(56, 10, 33, 'Php 14100', '10 Hours'),
(57, 10, 33, 'Php 21000', '15 Hours'),
(58, 10, 33, 'Php 27500', '20 Hours'),
(59, 10, 33, 'Php 41000', '30 Hours'),
(60, 10, 34, 'Php 8800', '5 Hours'),
(61, 10, 34, 'Php 12100', '7 Hours'),
(62, 10, 34, 'Php 17100', '10 Hours'),
(63, 10, 34, 'Php 25500', '15 Hours'),
(64, 10, 34, 'Php 33700', '20 Hours'),
(65, 10, 34, 'Php 49000', '30 Hours'),
(66, 10, 35, 'Php 9400', '5 Hours'),
(67, 10, 35, 'Php 13000', '7 Hours'),
(68, 10, 35, 'Php 18300', '10 Hours'),
(69, 10, 35, 'Php 27300', '15 Hours'),
(70, 10, 35, 'Php 36100', '20 Hours'),
(71, 10, 35, 'Php 51500', '30 Hours'),
(72, 10, 36, 'Php 9800', '5 Hours'),
(73, 10, 36, 'Php 13300', '7 Hours'),
(74, 10, 36, 'Php 18700', '10 Hours'),
(75, 10, 36, 'Php 28000', '15 Hours'),
(76, 10, 36, 'Php 36600', '20 Hours'),
(77, 10, 36, 'Php 53800', '30 Hours'),
(78, 10, 37, 'Php 10900', '5 Hours'),
(79, 10, 37, 'Php 15000', '7 Hours'),
(80, 10, 37, 'Php 21000', '10 Hours'),
(81, 10, 37, 'Php 30700', '15 Hours'),
(82, 10, 37, 'Php 40600', '20 Hours'),
(83, 10, 37, 'Php 60300', '30 Hours'),
(84, 10, 38, 'Php 11600', '5 Hours'),
(85, 10, 38, 'Php 16000', '7 Hours'),
(86, 10, 38, 'Php 22300', '10 Hours'),
(87, 10, 38, 'Php 33100', '15 Hours'),
(88, 10, 38, 'Php 43500', '20 Hours'),
(89, 10, 38, 'Php 64000', '30 Hours');

-- --------------------------------------------------------

--
-- Table structure for table `course_type`
--

CREATE TABLE IF NOT EXISTS `course_type` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `course_type_title` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `course_type`
--

INSERT INTO `course_type` (`id`, `course_id`, `course_type_title`) VALUES
(24, 9, 'SEDAN MANUAL'),
(25, 9, 'A-1 COURSE'),
(27, 9, 'AUV, MVP & PICK UP MANUAL'),
(29, 9, 'SEDAN AUTOMATIC'),
(30, 9, 'COMPACT SUV AUTOMATIC'),
(31, 9, 'MIDSIZE SUV AUTOMATIC'),
(32, 9, 'MPV AUTOMATIC'),
(33, 10, 'SEDAN MANUAL'),
(34, 10, 'AUV, MPV AND PICK UP MANUAL'),
(35, 10, 'SEDAN AUTOMATIC'),
(36, 10, 'MPV AUTOMATIC'),
(37, 10, 'COMPACT SUV'),
(38, 10, 'MIDSIZE SUV AUTOMATIC');

-- --------------------------------------------------------

--
-- Table structure for table `new_users`
--

CREATE TABLE IF NOT EXISTS `new_users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `verification` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `welcome` varchar(255) NOT NULL,
  `completed` varchar(255) NOT NULL,
  `started` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `new_users`
--

INSERT INTO `new_users` (`id`, `fname`, `lname`, `email`, `password`, `verification`, `status`, `role`, `age`, `gender`, `address`, `mobile`, `phone`, `welcome`, `completed`, `started`) VALUES
(20, 'Head', 'Admin', 'admin@gmail.com', '8151325dcdbae9e0ff95f9f9658432dbedfdb209', '', 'verified', '22', 21, 'male', 'psssssssssssssssssssssssssssssssssssss', '1234567890', '0987654321', 'done', 'done', '2014-08-18 08:18:30'),
(28, 'Sample', 'Admin3', 'admin3@gmail.com', '8151325dcdbae9e0ff95f9f9658432dbedfdb209', '', 'verified', '22', 21, 'male', 'muzon, sjdm city bulacan\r\nmuzon, sjdm city bulacan', '0089089', '98789879', 'done', 'done', '2014-08-18 08:18:15'),
(31, 'Ryan', 'Dingle', 'ryandingle09@gmail.com', '55b95b7b45f7d14ebd81c108414896a1a25a7591', 'b7e804ecae4db96642d8c9993e0044fdf5aa189b', 'unverified', '11', 21, 'male', 'muzon, sjdm city bulacan\r\nmuzon, sjdm city bulacan', '90808009', '09090-9090', 'done', 'done', '2014-08-19 19:25:10'),
(32, 'Sample', 'User', 'sampleuser@gmail.com', '8151325dcdbae9e0ff95f9f9658432dbedfdb209', 'd094efc27233e97ca16860b60f873f161ea261ef', 'verified', '11', 16, 'male', 'muzon, sjdm city bulacan\r\nmuzon, sjdm city bulacan', '9888-9789', '09151434993', 'done', 'done', '2014-08-19 19:31:25'),
(33, 'Sample', 'User3', 'sampleuser2@gmail.com', '8151325dcdbae9e0ff95f9f9658432dbedfdb209', '4e8f35249f4882bccd2a92ca2c3ab1138d78aa8c', 'verified', '11', 16, 'male', 'muzon, sjdm city bulacan\r\nmuzon, sjdm city bulacan', '09', '090909', 'done', 'done', '2014-08-19 19:33:54'),
(34, 'Sample', 'User4', 'sampleuser4@gmail.com', '8151325dcdbae9e0ff95f9f9658432dbedfdb209', 'af2c83d314cabbf8429b42c20a163d17d457aacf', 'verified', '11', 17, 'Female', 'sajldaldhlhdl', '9089089080909', '908080', 'done', 'done', '2014-08-19 19:47:14'),
(35, 'Sample', 'User3', 'sampleuser3@gmail.com', '8151325dcdbae9e0ff95f9f9658432dbedfdb209', '302a2ea5eb9ed0dc4d3cb3cc294c1c8415d21224', 'verified', '11', 18, 'male', 'jlkjkljkljlkjlkjkljl', '98', '98989898', 'done', 'done', '2014-08-19 20:27:27'),
(36, 'Sample', 'User5', 'sampleuser5@gmail.com', '8151325dcdbae9e0ff95f9f9658432dbedfdb209', '170cbc928cf75966f1214a235c78348d0e53a598', 'unverified', '11', 20, 'Female', 'jan jan jan jan lang', '0980707797987987987987987987987', '9877987987987987987987979787897', 'done', 'done', '2014-08-19 20:38:23'),
(37, 'Sample', 'User6', 'sampleuser6@gmail.com', '8151325dcdbae9e0ff95f9f9658432dbedfdb209', 'bcdc8f0dcf568e6994379ba5d258fa4225aa381e', 'verified', '11', 19, 'Female', 'jehjkfhfwehfwehfjewf', '777987897897', '8977897', 'done', 'done', '2014-08-19 21:32:49');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE IF NOT EXISTS `reservations` (
  `r_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `r_user_id` bigint(20) NOT NULL,
  `r_fname` varchar(255) NOT NULL,
  `r_lname` varchar(255) NOT NULL,
  `r_email` varchar(255) NOT NULL,
  `r_gender` varchar(255) NOT NULL,
  `r_age` int(11) NOT NULL,
  `r_course` text NOT NULL,
  `r_course_type` text NOT NULL,
  `r_branch` text NOT NULL,
  `r_mobile` varchar(255) NOT NULL,
  `r_phone` varchar(255) NOT NULL,
  `r_address` text NOT NULL,
  `course_fee` text NOT NULL,
  `r_date` date NOT NULL,
  `role` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`r_id`, `r_user_id`, `r_fname`, `r_lname`, `r_email`, `r_gender`, `r_age`, `r_course`, `r_course_type`, `r_branch`, `r_mobile`, `r_phone`, `r_address`, `course_fee`, `r_date`, `role`, `status`) VALUES
(21, 31, 'Ryan', 'Dingle', 'ryandingle09@gmail.com', 'male', 21, 'Sedan Automatic', 'Premium', 'wjdhwdkwkkwehwkhfwfkefhkehwfewf', '90808009', '09090-9090', 'muzon, sjdm city bulacan\r\nmuzon, sjdm city bulacan', '2 HoursPhp 7000', '2014-08-19', '11', ''),
(23, 34, 'Sample', 'User4', 'sampleuser4@gmail.com', 'Female', 17, 'Sedan Manual', 'Premium', 'wjdhwdkwkkwehwkhfwfkefhkehwfewf', '9089089080909', '908080', 'sajldaldhlhdl', '7 HoursPhp 10700', '2014-08-30', '11', ''),
(24, 33, 'Sample', 'User3', 'sampleuser2@gmail.com', 'male', 16, 'ulul', 'Executive', 'jan lang sa tabe', '09', '090909', 'muzon, sjdm city bulacan\r\nmuzon, sjdm city bulacan', '10 HoursPhp 9000', '2014-08-29', '11', ''),
(25, 35, 'Sample', 'User3', 'sampleuser3@gmail.com', 'male', 18, 'ulul', 'Executive', 'fjkfwjjfkwhehwjfwf', '98', '98989898', 'jlkjkljkljlkjlkjkljl', '10 HoursPhp 9000', '2014-08-21', '11', 'approve'),
(30, 37, 'Sample', 'User6', 'sampleuser6@gmail.com', 'Female', 19, 'ulul', 'Executive', 'Batangas - SM Supercenter Molino, Ground Floor, Service Lane', '777987897897', '8977897', 'jehjkfhfwehfwehfjewf', '10 HoursPhp 9000', '2014-08-27', '11', ''),
(31, 32, 'Sample', 'User', 'sampleuser@gmail.com', 'male', 16, 'MIDSIZE SUV AUTOMATIC', 'Premium', 'Laguna - SM City Sta. Rosa, Ground Floor', '9888-9789', '09151434993', 'muzon, sjdm city bulacan\r\nmuzon, sjdm city bulacan', '30 HoursPhp 44300', '2014-09-17', '11', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
