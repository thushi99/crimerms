-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 30, 2023 at 11:05 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crimedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `evidence`
--

CREATE TABLE `evidence` (
  `evidenceNumber` int(11) NOT NULL,
  `caseID` varchar(20) NOT NULL,
  `evidenceName` varchar(100) NOT NULL,
  `fingerPrint` varchar(255) NOT NULL,
  `recoveredFrom` varchar(250) NOT NULL,
  `assignedOfficer` varchar(50) NOT NULL,
  `imagePath` varchar(1000) NOT NULL,
  `fileHash` varchar(500) NOT NULL,
  `uploadedBy` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `evidence`
--

INSERT INTO `evidence` (`evidenceNumber`, `caseID`, `evidenceName`, `fingerPrint`, `recoveredFrom`, `assignedOfficer`, `imagePath`, `fileHash`, `uploadedBy`) VALUES
(48, 'Architecto ', 'Ann ', 'Dolore', 'Ipsum ', 'Explicabo ', 'uploads/sample.jpg', '', ''),
(49, 'Quis tenetur eiusmod', 'Blaine Estes', 'Asperiores magnam co', 'Non quia mollitia no', 'Deserunt in enim rem', 'uploads/sample.jpg', '', ''),
(50, 'Quis tenetur eiusmod', 'Blaine Estes', 'Asperiores magnam co', 'Non quia mollitia no', 'Deserunt in enim rem', 'uploads/sample.jpg', '', ''),
(51, 'Quis tenetur eiusmod', 'Blaine Estes', 'Asperiores magnam co', 'Non quia mollitia no', 'Deserunt in enim rem', 'uploads/sample.jpg', '', ''),
(52, 'Voluptates beatae mi', 'Skyler Solomon', 'Eum autem velit et ', 'Duis aspernatur illu', 'In dolor et tempora ', 'uploads/sample.jpg', '305769af1257ffa3a41521f4de743c66', ''),
(53, 'Sunt sint deserunt ', 'Libby Battle', 'Assumenda duis dolor', 'Dolorem libero conse', 'Dolorum necessitatib', 'uploads/sample.jpg', '305769af1257ffa3a41521f4de743c66', '1'),
(54, 'Est minima incidunt', 'Guinevere Guy', 'Qui error qui aut ma', 'Temporibus hic in er', 'Aliquid in deserunt ', 'uploads/sample.jpg', '305769af1257ffa3a41521f4de743c66', '3'),
(55, 'Deleniti mollitia ve', 'Keefe Stark', 'Aut elit in quia su', 'Animi ea mollit ani', 'Excepturi vel nemo c', 'uploads/sample.jpg', '305769af1257ffa3a41521f4de743c66', 'thushi'),
(56, 'Deleniti mollitia ve', 'Keefe Stark', 'Aut elit in quia su', 'Animi ea mollit ani', 'Excepturi vel nemo c', 'uploads/sample.jpg', '305769af1257ffa3a41521f4de743c66', 'thushi'),
(57, 'In rerum quia repreh', 'Idona Stevens', 'Illo rem voluptatum ', 'Qui nostrud esse omn', 'Minima fugiat dolor', 'uploads/sample.jpg', '305769af1257ffa3a41521f4de743c66', 'perera'),
(58, 'Inventore ut ut magn', 'Wynter Kaufman', 'Aspernatur eum commo', 'Enim aliquid consequ', 'Ut obcaecati sunt fa', 'uploads/sample.jpg', '305769af1257ffa3a41521f4de743c66', 'perera'),
(59, 'Quo sunt vel consequ', 'Melissa Beach', 'Eaque eu nulla magna', 'Ea minima et molesti', 'Omnis necessitatibus', 'uploads/sample.jpg', '305769af1257ffa3a41521f4de743c66', 'perera'),
(60, 'Laborum odit exceptu', 'James Keller', 'Anim sequi consectet', 'Est ut aut corrupti', 'Nemo a mollitia sed ', 'uploads/sample.jpg', '305769af1257ffa3a41521f4de743c66', 'perera'),
(61, 'Voluptatem tenetur e', 'Jocelyn Decker', 'Ut labore pariatur ', 'Laborum Suscipit ei', 'Harum sit rerum dict', 'uploads/sample.jpg', '305769af1257ffa3a41521f4de743c66', 'perera'),
(62, '1776', 'Swords', 'yes', 'Near the Theatre', 'Kasun de Silva', 'uploads/sample.jpg', '305769af1257ffa3a41521f4de743c66', 'perera'),
(63, '1999', 'photo of the criminal', 'No', 'Facebook', 'Samantha De Silva', 'uploads/SLIIT.png', '1adfe2009a78b61ba9bc5ad51202a581', 'perera'),
(64, 'Ea nihil blanditiis ', 'Whoopi Frederick', 'Laudantium minim su', 'Quis quia dolore ali', 'Qui illo a in esse i', 'uploads/sample evidence.jpg', '305769af1257ffa3a41521f4de743c66', 'perera');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `action_made` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `action_made`, `date_created`) VALUES
(1, 1, 'Logged out.', '2021-10-07 10:43:44'),
(2, 1, 'Logged in the system.', '2021-10-07 10:44:33'),
(4, 1, 'Logged in the system.', '2021-10-07 10:50:07'),
(5, 1, ' added [id=0] Claire Blake into the member list.', '2021-10-07 11:51:27'),
(6, 1, ' added [id=2] John Smith into the member list.', '2021-10-07 11:55:00'),
(7, 1, ' updated the details of [id=1] member.', '2021-10-07 12:50:55'),
(8, 1, ' added [id=3] test test into the member list.', '2021-10-07 12:51:25'),
(9, 1, ' added [id=4] test test into the member list.', '2021-10-07 12:55:57'),
(10, 1, ' deleted [id=4] test test from member list.', '2021-10-07 12:56:04'),
(11, 1, ' viewed the data of [id=1]Clairy Blake', '2021-10-07 13:13:09'),
(12, 1, ' viewed the data of [id=2]John Smith', '2021-10-07 13:13:32'),
(13, 1, ' viewed the data of [id=1]Clairy Blake', '2021-10-07 13:16:02'),
(14, 1, 'Logged out.', '2021-10-07 13:16:11'),
(15, 2, 'Logged in the system.', '2021-10-07 13:16:15'),
(16, 2, ' added [id=5] Mike Williams into the member list.', '2021-10-07 13:17:46'),
(17, 2, ' viewed the data of [id=5]Mike Williams', '2021-10-07 13:17:58'),
(18, 2, ' updated the details of [id=5] member.', '2021-10-07 13:18:15'),
(19, 3, 'Logged in the system.', '2023-07-16 00:16:14'),
(20, 3, ' added [id=6] Thushi Sutha into the member list.', '2023-07-16 09:12:05'),
(21, 3, ' viewed the data of [id=] ', '2023-07-16 09:16:38'),
(22, 3, ' viewed the data of [id=] ', '2023-07-16 09:16:40'),
(23, 3, ' updated the details of [id=6] member.', '2023-07-16 09:48:18'),
(24, 3, 'Logged out.', '2023-07-16 09:51:53'),
(25, 3, 'Logged in the system.', '2023-07-16 09:51:59'),
(26, 3, 'Logged out.', '2023-07-16 10:13:02'),
(27, 2, 'Logged in the system.', '2023-07-16 10:13:07'),
(28, 2, 'Logged out.', '2023-07-16 10:14:40'),
(29, 1, 'Logged in the system.', '2023-07-16 10:14:45'),
(30, 1, ' viewed the data of [id=1]Clairy Blake', '2023-07-16 10:50:27'),
(31, 1, ' viewed the data of [id=6]Thushi Sutha', '2023-07-16 10:50:33'),
(32, 1, ' updated the details of [id=2] member.', '2023-07-17 00:26:49'),
(33, 3, 'Logged in the system.', '2023-08-19 10:25:54'),
(34, 3, 'Logged out.', '2023-08-25 15:08:50'),
(35, 3, 'Logged in the system.', '2023-08-25 15:09:20'),
(36, 3, 'Logged in the system.', '2023-09-01 11:00:25'),
(37, 3, 'Logged out.', '2023-09-01 11:00:45'),
(38, 2, 'Logged in the system.', '2023-09-01 11:00:51'),
(39, 2, ' added [id=7] Vinoshan T into the member list.', '2023-09-02 14:48:11'),
(40, 2, ' viewed the data of [id=1]Clairy Blake', '2023-09-03 11:18:16'),
(41, 2, ' deleted [id=7] Vinoshan T from member list.', '2023-09-03 11:20:02'),
(42, 2, ' added [id=8] Abithasan Manoranjan into the member list.', '2023-09-03 13:09:37'),
(43, 3, 'Logged in the system.', '2023-09-06 09:57:13'),
(44, 3, 'Logged out.', '2023-09-06 10:03:44'),
(45, 1, 'Logged in the system.', '2023-09-06 10:04:23'),
(46, 1, ' added [id=9] Abi Lash into the member list.', '2023-09-06 13:25:03'),
(47, 1, 'Logged out.', '2023-09-06 22:02:52'),
(48, 3, 'Logged in the system.', '2023-09-06 22:02:58'),
(49, 3, 'Logged out.', '2023-09-06 22:38:46'),
(50, 1, 'Logged in the system.', '2023-09-06 22:38:52'),
(51, 1, 'Logged out.', '2023-09-06 22:48:54'),
(52, 4, 'Logged in the system.', '2023-09-06 22:48:59'),
(53, 4, ' added [id=10] Sadun Perera into the member list.', '2023-09-06 22:58:51'),
(54, 4, 'perera uploaded \'Melissa Beach\' for case \'Quo sunt vel consequ\'', '2023-09-06 23:12:45'),
(55, 4, 'Uploaded \'James Keller\' for case \'Laborum odit exceptu\'', '2023-09-06 23:15:54'),
(56, 4, 'Uploaded \'uploads/sample.jpg\' for case \'Voluptatem tenetur e\'', '2023-09-06 23:18:44'),
(57, 4, 'Uploaded \'uploads/sample.jpg\' for case \'1776\'', '2023-09-06 23:19:52'),
(58, 4, 'Uploaded \'uploads/SLIIT.png\' for case \'1999\'', '2023-09-07 00:20:29'),
(59, 4, 'Uploaded \'uploads/sample evidence.jpg\' for case \'Ea nihil blanditiis \'', '2023-09-07 10:58:40'),
(60, 3, 'Logged in the system.', '2023-10-05 23:59:44'),
(61, 3, ' viewed the data of [id=9]Abi Lash', '2023-10-11 00:23:07'),
(62, 3, 'Logged out.', '2023-10-16 08:27:37'),
(63, 3, 'Logged in the system.', '2023-10-22 07:37:48'),
(64, 3, 'Logged in the system.', '2023-10-23 10:25:57');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(30) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `firstname`, `lastname`, `contact`, `address`, `date_created`) VALUES
(1, 'Clairy', 'Blake', '09123456789', 'Sample Address', '2021-10-07 11:51:27'),
(2, 'John', 'Cena', '09123456789', 'Sample Address', '2021-10-07 11:55:00'),
(5, 'Mikee', 'Williams', '09112655889', '23rd St. Here City', '2021-10-07 13:17:46'),
(6, 'Thushi', 'Sutha', '779301132', '5C, 1/1, Pereira Lane, Colombo 06.', '2023-07-16 09:12:05'),
(8, 'Abithasan', 'Manoranjan', '0778954223', 'Nawala', '2023-09-03 13:09:37'),
(9, 'Abi', 'Lash', '0773425554', 'Nugegoda', '2023-09-06 13:25:03'),
(10, 'Sadun', 'Perera', '0771216655', 'Colombo 12', '2023-09-06 22:58:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(200) DEFAULT NULL,
  `UserName` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`) VALUES
(2, 'Senesh Wijayarathne', 'seneshw', 777207753, 'seneshw@gmail.com', 'f925916e2754e5e03f75dd58a5733251'),
(10, 'Senesh W', 'senesh_wijayarathne', 777207753, 'it20171438@my.sliit.lk', 'f925916e2754e5e03f75dd58a5733251'),
(11, 'Thushitharan M', 'thushit', 94779301132, 'thushitharansutha@gmail.com', 'f925916e2754e5e03f75dd58a5733251'),
(12, 'Pranavan', 'pranavan', 94773108209, 'pranavan613@gmail.com', 'f925916e2754e5e03f75dd58a5733251'),
(13, 'Haseef', 'haseef', 94759421810, 'mnhaseef007@gmail.com', 'f925916e2754e5e03f75dd58a5733251');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `ID` int(10) NOT NULL,
  `CategoryName` varchar(200) DEFAULT NULL,
  `CatDes` mediumtext DEFAULT NULL,
  `AddDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`ID`, `CategoryName`, `CatDes`, `AddDate`) VALUES
(1, 'Personal Crimes', 'Personal Crimes – “Offenses against the Person”: These are crimes that result in physical or mental harm to another person. Personal crimes include:\r\nAssault \r\nBattery\r\nFalse Imprisonment\r\nKidnapping\r\nHomicide – crimes such as first and second degree murder, involuntary manslaughter, and vehicular homicide\r\nRape, statutory rape, sexual assault, and other offenses of a sexual nature', '2023-02-26 06:34:00'),
(2, 'Property Crimes', 'Property Crimes – “Offenses against Property”: These are crimes that do not necessarily involve harm to another person. Instead, they involve an interference with another person’s right to use or enjoy their property. Property crimes include:\r\nLarceny (theft)\r\nRobbery (theft by force) – Note: this is also considered a personal crime since it results in physical and mental harm.\r\nBurglary (penalties for burglary)\r\nArson\r\nEmbezzlement\r\nForgery\r\nFalse pretenses\r\nReceipt of stolen goods.', '2023-02-25 18:30:00'),
(3, 'Inchoate Crimes ', 'Inchoate Crimes – “Inchoate” translates into “incomplete”, meaning crimes that were begun, but not completed. This requires that a person take a substantial step to complete a crime, as opposed to just “intend” to commit a crime. Inchoate crimes include:\r\nAttempt – any crime that is attempted like “attempted robbery”\r\nSolicitation\r\nConspiracy', '2023-03-01 06:35:08'),
(4, 'Statutory Crimes ', 'Statutory Crimes – A violation of a specific state or federal statute and can involve either property offenses or personal offense. Statutory crimes include:\r\nAlcohol-related crimes such as drunk driving (DUI)\r\nSelling alcohol to a minor.', '2023-03-01 18:30:00'),
(5, 'Sexual Assault', 'illegal sexual contact that usually involves force upon a person without consent or is inflicted upon a person who is incapable of giving consent (as because of age or physical or mental incapacity) or who places the assailant (such as a doctor) in a position of trust or authority', '2023-03-04 06:47:42');

-- --------------------------------------------------------

--
-- Table structure for table `tblcriminal`
--

CREATE TABLE `tblcriminal` (
  `ID` int(10) NOT NULL,
  `CriminalID` varchar(50) DEFAULT NULL,
  `PoliceID` int(10) DEFAULT NULL,
  `PoliceStationId` int(11) DEFAULT NULL,
  `PoliceStation` varchar(200) DEFAULT NULL,
  `CatName` varchar(100) DEFAULT NULL,
  `CrimeDate` varchar(200) DEFAULT NULL,
  `CrimeTime` varchar(200) DEFAULT NULL,
  `Prison` varchar(200) DEFAULT NULL,
  `Court` varchar(200) DEFAULT NULL,
  `Name` varchar(200) DEFAULT NULL,
  `ContactNumber` bigint(10) DEFAULT NULL,
  `Height` varchar(50) DEFAULT NULL,
  `Weight` varchar(50) DEFAULT NULL,
  `DateofBirth` varchar(200) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Address` mediumtext DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `State` varchar(200) DEFAULT NULL,
  `Country` varchar(200) DEFAULT NULL,
  `Zipcode` int(10) DEFAULT NULL,
  `Photo` varchar(200) DEFAULT NULL,
  `RecordDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcriminal`
--

INSERT INTO `tblcriminal` (`ID`, `CriminalID`, `PoliceID`, `PoliceStationId`, `PoliceStation`, `CatName`, `CrimeDate`, `CrimeTime`, `Prison`, `Court`, `Name`, `ContactNumber`, `Height`, `Weight`, `DateofBirth`, `Email`, `Address`, `City`, `State`, `Country`, `Zipcode`, `Photo`, `RecordDate`) VALUES
(1, '442128753', 3, 4, 'Athurugiriya Police Station', 'Personal Crimes', '2023-05-02', '15:18', 'Central Jail', 'Supreme Court', 'Dushan Fernando', 4563178952, '168cm', '80Kg', '1997-09-17', '', 'NA', 'Rajagiriya', 'up', 'Sri Lanka', 201017, '659baba4dd9c875610423e1339f1e6491678607126.png', '2023-05-02 07:45:26');

-- --------------------------------------------------------

--
-- Table structure for table `tblfir`
--

CREATE TABLE `tblfir` (
  `ID` int(10) NOT NULL,
  `FIRNo` varchar(120) DEFAULT NULL,
  `UserID` int(50) DEFAULT NULL,
  `PoliceStationId` int(11) DEFAULT NULL,
  `PoliceStation` varchar(200) DEFAULT NULL,
  `CrimeType` varchar(200) DEFAULT NULL,
  `NameAccused` varchar(200) DEFAULT NULL,
  `NameApplicants` varchar(200) DEFAULT NULL,
  `ParentageApplicant` varchar(200) DEFAULT NULL,
  `ContactNumber` bigint(10) DEFAULT NULL,
  `Address` mediumtext DEFAULT NULL,
  `RelationAccused` varchar(200) DEFAULT NULL,
  `PurposeofFIR` varchar(200) DEFAULT NULL,
  `DateofFIR` timestamp NULL DEFAULT current_timestamp(),
  `Remark` varchar(200) DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `RemarkDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `SectionofLaw` varchar(200) NOT NULL,
  `InvestigationOfficer` varchar(200) NOT NULL,
  `InvestigationDetail` mediumtext NOT NULL,
  `ChargesheetDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblfir`
--

INSERT INTO `tblfir` (`ID`, `FIRNo`, `UserID`, `PoliceStationId`, `PoliceStation`, `CrimeType`, `NameAccused`, `NameApplicants`, `ParentageApplicant`, `ContactNumber`, `Address`, `RelationAccused`, `PurposeofFIR`, `DateofFIR`, `Remark`, `Status`, `RemarkDate`, `SectionofLaw`, `InvestigationOfficer`, `InvestigationDetail`, `ChargesheetDate`) VALUES
(1, '482448703', 1, 1, 'Central Delhi Police Stations', 'Property Crimes', 'Rahul Kumar', 'Amit Kumar', 'NA', 1425365821, 'A 123 Block C Central Delhi India', 'No Relation', 'Fir Against Property Crime', '2023-03-10 14:32:54', NULL, NULL, '2023-03-12 03:19:28', '', '', '', '2023-03-12 03:19:28'),
(10, '828531740', 2, 4, 'Rajnagar Extension GZBUP', 'Property Crimes', 'Amit Singh', 'Atul Kumar Singh', 'NA', 4563214102, 'A 123 XYZ Society Rajnagar Extension GZB', 'Brother', 'Property  case', '2023-03-12 07:31:31', 'NA', 'Charge Sheet Completed', '2023-03-12 07:43:43', 'SECTION', 'Amit Singh', 'Investigation Detail,  Investigation DetailInvestigation DetailInvestigation DetailInvestigation DetailInvestigation DetailInvestigation DetailInvestigation DetailInvestigation DetailInvestigation DetailInvestigation DetailInvestigation DetailInvestigation DetailInvestigation DetailInvestigation DetailInvestigation DetailInvestigation DetailInvestigation DetailInvestigation DetailInvestigation Detail', '2023-03-12 07:43:43'),
(11, '594903510', 2, 4, 'Rajnagar Extension GZBUP', 'Personal Crimes', 'John Doe', 'Atul Kumar', 'NA', 452631452, 'A 1234 XYZ Society Rajnnagar Ext. GZB', 'No Relation', 'Personal Crime', '2023-03-12 11:41:58', 'Fir is approved', 'Approved', '2023-03-12 11:42:54', '', '', '', '2023-03-12 11:42:54');

-- --------------------------------------------------------

--
-- Table structure for table `tblpolice`
--

CREATE TABLE `tblpolice` (
  `ID` int(10) NOT NULL,
  `PoliceStationId` int(11) DEFAULT NULL,
  `PoliceStationName` varchar(200) DEFAULT NULL,
  `PID` varchar(20) DEFAULT NULL,
  `Name` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Address` mediumtext DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `JoiningDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblpolice`
--

INSERT INTO `tblpolice` (`ID`, `PoliceStationId`, `PoliceStationName`, `PID`, `Name`, `MobileNumber`, `Email`, `Address`, `Password`, `JoiningDate`) VALUES
(8, 2, 'Malabe Police Station', '1001', 'Thushitharan M', 9477930113, 'thushitharansutha@gmail.com', 'Test Address', 'f9fb581cd2b2725cd213bbb996110930', '2023-10-29 05:04:51'),
(9, 2, 'Malabe Police Station', '1002', 'Pranavan', 9477310820, 'pranavan613@gmail.com', 'Test Address', 'dc1c84dd029a9ec4e17388b99b9dfe1d', '2023-10-29 05:05:51'),
(10, 2, 'Malabe Police Station', '1003', 'Haseef', 9475942181, 'mnhaseef007@gmail.com', 'Test Address', 'a02737dc949e0fbbfbd449818e7eb14a', '2023-10-29 05:06:33'),
(11, 1, 'Athurugiriya Police Station', '1000', 'Senesh', 777207753, 'seneshw@gmail.com', 'Test Address', '8b3418deecb396198ce41cc7ed25822e', '2023-10-29 05:13:14'),
(12, 1, 'Athurugiriya Police Station', 'G1004', 'Senesh Wijayarathne', 777207753, 'seneshw@gmail.com', 'Test Address', 'f925916e2754e5e03f75dd58a5733251', '2023-10-29 05:18:06');

-- --------------------------------------------------------

--
-- Table structure for table `tblpolicestation`
--

CREATE TABLE `tblpolicestation` (
  `id` int(11) NOT NULL,
  `PoliceStationName` varchar(255) DEFAULT NULL,
  `PoliceStationCode` varchar(200) DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpolicestation`
--

INSERT INTO `tblpolicestation` (`id`, `PoliceStationName`, `PoliceStationCode`, `PostingDate`) VALUES
(1, 'Athurugiriya Police Station', 'PSC001', '2023-02-28 17:58:02'),
(2, 'Malabe Police Station', 'PSC002', '2023-02-28 17:58:57'),
(3, 'Rajagiriya Police Station', 'PSC003', '2023-02-28 18:00:01');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `ID` int(10) NOT NULL,
  `FullName` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`ID`, `FullName`, `MobileNumber`, `Email`, `Password`, `RegDate`) VALUES
(10, 'Senesh Wijayarathne', 777207753, 'seneshw@gmail.com', '11d367cccb8051eda73a52c94b589c12', '2023-09-05 17:46:18'),
(11, 'Senesh Wijayarathne', 777207753, 'it20171438@my.sliit.lk', '8b3418deecb396198ce41cc7ed25822e', '2023-10-29 05:19:24'),
(12, 'Pranavan', 94773108209, 'pranavan613@gmail.com', 'dc1c84dd029a9ec4e17388b99b9dfe1d', '2023-10-29 05:31:41'),
(13, 'Thushi Tharansutha', 94779301132, 'thushitharansutha@gmail.com', 'f9fb581cd2b2725cd213bbb996110930', '2023-10-29 05:32:59'),
(14, 'Haseef', 94759421810, 'mnhaseef007@gmail.com', 'a02737dc949e0fbbfbd449818e7eb14a', '2023-10-29 05:33:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `date_created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `date_created`) VALUES
(1, 'Administrator', 'admin', '0192023a7bbd73250516f069df18b500', '2021-10-07 03:59:25'),
(2, 'John Smitn', 'jsmith', '1254737c076cf867dc53d60a0364f38e', '2021-10-07 03:59:25'),
(3, 'Thushitharan', 'thushi', '711f300369d1ff02852bf4b04830c08a', '2023-07-16 00:15:20'),
(4, 'Perera', 'perera', '4c59faf5cfb834d9e3281577bed6d39e', '2023-09-06 22:41:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `evidence`
--
ALTER TABLE `evidence`
  ADD PRIMARY KEY (`evidenceNumber`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcriminal`
--
ALTER TABLE `tblcriminal`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblfir`
--
ALTER TABLE `tblfir`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpolice`
--
ALTER TABLE `tblpolice`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpolicestation`
--
ALTER TABLE `tblpolicestation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `evidence`
--
ALTER TABLE `evidence`
  MODIFY `evidenceNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblcriminal`
--
ALTER TABLE `tblcriminal`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblfir`
--
ALTER TABLE `tblfir`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblpolice`
--
ALTER TABLE `tblpolice`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblpolicestation`
--
ALTER TABLE `tblpolicestation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
