-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2019 at 01:20 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jomuni`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicant`
--

CREATE TABLE `applicant` (
  `applicantID` int(5) NOT NULL,
  `IDNumber` bigint(20) NOT NULL,
  `IDType` varchar(8) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `mobileNo` bigint(10) NOT NULL,
  `userID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicant`
--

INSERT INTO `applicant` (`applicantID`, `IDNumber`, `IDType`, `dateOfBirth`, `mobileNo`, `userID`) VALUES
(40035, 950101223333, 'ic', '1990-11-22', 123456789, 30043),
(40036, 970101232233, 'ic', '1997-02-11', 123456789, 30044),
(40039, 904500234569, 'ic', '2000-10-31', 123456789, 30048),
(40042, 976456700988, 'ic', '1990-11-22', 123456789, 30052),
(40043, 9762300383030, 'ic', '1998-02-13', 123456789, 30057);

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `applicationID` int(5) NOT NULL,
  `applicationDate` date NOT NULL,
  `status` varchar(10) NOT NULL,
  `applicantID` int(5) NOT NULL,
  `programmeCode` char(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`applicationID`, `applicationDate`, `status`, `applicantID`, `programmeCode`) VALUES
(1, '2019-04-11', 'Declined', 40035, 'BOB'),
(2, '2019-04-13', 'Offered', 40036, 'BIT'),
(3, '2019-04-10', 'Offered', 40042, 'BIT'),
(4, '2019-04-10', 'Pending', 40042, 'BOP');

-- --------------------------------------------------------

--
-- Table structure for table `programme`
--

CREATE TABLE `programme` (
  `programmeCode` char(3) NOT NULL,
  `programmeName` varchar(60) NOT NULL,
  `description` varchar(150) NOT NULL,
  `closingDate` date NOT NULL,
  `academicQualification` varchar(150) NOT NULL,
  `universityID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `programme`
--

INSERT INTO `programme` (`programmeCode`, `programmeName`, `description`, `closingDate`, `academicQualification`, `universityID`) VALUES
('BIT', 'Bachelor of Information Technology', 'About information technology', '2019-11-22', 'Credit in Mathematics', 20001),
('BMC', 'Bachelor of Mobile Computing', 'About mobile computing ', '2019-10-30', 'Credit in English,Credit in Mathematics', 20001),
('BOB', 'Bachelor of Business', 'About business things.', '2019-10-20', 'Credit in Mathematics.', 20001),
('BOP', 'Bachelor of Psychology', 'About psychology', '2019-09-20', 'Credit in English', 20004);

-- --------------------------------------------------------

--
-- Table structure for table `qualification`
--

CREATE TABLE `qualification` (
  `qualificationID` int(5) NOT NULL,
  `qualificationName` varchar(50) NOT NULL,
  `minimumScore` int(3) NOT NULL,
  `maximumScore` int(3) NOT NULL,
  `resultCalcDescription` varchar(100) NOT NULL,
  `gradeList` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qualification`
--

INSERT INTO `qualification` (`qualificationID`, `qualificationName`, `minimumScore`, `maximumScore`, `resultCalcDescription`, `gradeList`) VALUES
(10063, 'Unified Examination Certificate(UEC)', 1, 5, 'Total of best 5 subjects.', 'A1 - 1 point,A2 - 2 points,B3 - 3 points,B4 - 4 points,B5 - 5 points,B6 - 6 points'),
(10064, 'STPM', 1, 4, 'Average of best 3 subjects.', 'A   (4.00),A-  (3.67),B+  (3.33),B   (3.00),B-  (2.67),C+  (2.33),C   (2.00),B+  (1.67),D+  (1.33),D   (1.00),F   (0.00),'),
(10065, 'Australian Matriculation', 0, 100, 'Average of best 4 subjects.', '0 - 100%'),
(10089, 'Canadian Pre University', 0, 100, 'Average of 6 subjects.', '0 - 100%'),
(10091, 'International Baccalaureate', 0, 42, 'Total of 6 subjects.', '0 â€“ 7 points per subject'),
(10092, 'A-Levels', 0, 5, 'Average of best 3 subjects', 'A-5,B-4,C-3,D-4,E-5');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `ID` int(11) NOT NULL,
  `applicant` int(5) NOT NULL,
  `subjectName` varchar(20) NOT NULL,
  `grade` char(2) DEFAULT NULL,
  `score` double DEFAULT '0',
  `qualificationID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`ID`, `applicant`, `subjectName`, `grade`, `score`, `qualificationID`) VALUES
(1, 40036, 'Bahasa Malaysia', 'A', 0, 10064),
(2, 40036, 'English', 'B', 0, 10064),
(3, 40036, 'Bahasa Melayu', 'A', 0, 10064),
(4, 40036, 'Mathematics', 'A', 0, 10064);

-- --------------------------------------------------------

--
-- Table structure for table `university`
--

CREATE TABLE `university` (
  `universityID` int(5) NOT NULL,
  `universityName` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `university`
--

INSERT INTO `university` (`universityID`, `universityName`) VALUES
(20001, 'Help University'),
(20004, 'Taylors University'),
(20005, 'Sunway University'),
(20006, 'Monash University');

-- --------------------------------------------------------

--
-- Table structure for table `universityadmin`
--

CREATE TABLE `universityadmin` (
  `adminID` int(5) NOT NULL,
  `universityID` int(5) NOT NULL,
  `userID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `universityadmin`
--

INSERT INTO `universityadmin` (`adminID`, `universityID`, `userID`) VALUES
(60001, 20001, 30047),
(60004, 20004, 30055),
(60005, 20005, 30056),
(60006, 20006, 30058);

-- --------------------------------------------------------

--
-- Stand-in structure for view `userlogin`
-- (See below for the actual view)
--
CREATE TABLE `userlogin` (
`userID` int(5)
,`username` varchar(10)
,`password` varchar(20)
,`type` varchar(15)
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(5) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `fullname`, `email`) VALUES
(30043, 'john', '123', 'john', 'john@gmail.com'),
(30044, 'jackson', '123', 'Jackson Wang', 'jackson@gmail.com'),
(30047, 'Jennie', '1234', 'Jennie Kim', 'jennie@gmail.com'),
(30048, 'rose', '123', 'rose wong', 'rose@gmail.com'),
(30050, 'Yimin', '1234', 'Yimin', 'yimin@gmail.com'),
(30052, 'tamie', '123', 'tamie', 'tam@gmail.com'),
(30055, 'Taylors', '1234', '', 'taylorsuni@gmail.com'),
(30056, 'Sunway', '1234', '', 'sunwayuni@gmail.com'),
(30057, 'miki', '1234', 'miki', 'miki@gmail.com'),
(30058, 'monash', '1234', '', 'info.monash@gmail.co');

-- --------------------------------------------------------

--
-- Structure for view `userlogin`
--
DROP TABLE IF EXISTS `userlogin`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `userlogin`  AS  select `u`.`userID` AS `userID`,`u`.`username` AS `username`,`u`.`password` AS `password`,(case when (`a`.`applicantID` is not null) then 'Applicant' when (`ua`.`universityID` is not null) then 'UniversityAdmin' else 'SystemAdmin' end) AS `type` from ((`users` `u` left join `applicant` `a` on((`a`.`userID` = `u`.`userID`))) left join `universityadmin` `ua` on((`ua`.`userID` = `u`.`userID`))) order by `u`.`userID` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicant`
--
ALTER TABLE `applicant`
  ADD PRIMARY KEY (`applicantID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`applicationID`),
  ADD KEY `applicantID` (`applicantID`),
  ADD KEY `programmeCode` (`programmeCode`);

--
-- Indexes for table `programme`
--
ALTER TABLE `programme`
  ADD PRIMARY KEY (`programmeCode`),
  ADD KEY `universityID` (`universityID`);

--
-- Indexes for table `qualification`
--
ALTER TABLE `qualification`
  ADD PRIMARY KEY (`qualificationID`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `applicant` (`applicant`),
  ADD KEY `qualificationID` (`qualificationID`);

--
-- Indexes for table `university`
--
ALTER TABLE `university`
  ADD PRIMARY KEY (`universityID`);

--
-- Indexes for table `universityadmin`
--
ALTER TABLE `universityadmin`
  ADD PRIMARY KEY (`adminID`),
  ADD KEY `universityID` (`universityID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicant`
--
ALTER TABLE `applicant`
  MODIFY `applicantID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40044;

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `applicationID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `qualification`
--
ALTER TABLE `qualification`
  MODIFY `qualificationID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10093;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `university`
--
ALTER TABLE `university`
  MODIFY `universityID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20007;

--
-- AUTO_INCREMENT for table `universityadmin`
--
ALTER TABLE `universityadmin`
  MODIFY `adminID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60007;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30059;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applicant`
--
ALTER TABLE `applicant`
  ADD CONSTRAINT `applicant_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `application_ibfk_1` FOREIGN KEY (`applicantID`) REFERENCES `applicant` (`applicantID`),
  ADD CONSTRAINT `application_ibfk_2` FOREIGN KEY (`programmeCode`) REFERENCES `programme` (`programmeCode`);

--
-- Constraints for table `programme`
--
ALTER TABLE `programme`
  ADD CONSTRAINT `programme_ibfk_1` FOREIGN KEY (`universityID`) REFERENCES `university` (`universityID`);

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`applicant`) REFERENCES `applicant` (`applicantID`),
  ADD CONSTRAINT `results_ibfk_2` FOREIGN KEY (`qualificationID`) REFERENCES `qualification` (`qualificationID`);

--
-- Constraints for table `universityadmin`
--
ALTER TABLE `universityadmin`
  ADD CONSTRAINT `universityadmin_ibfk_1` FOREIGN KEY (`universityID`) REFERENCES `university` (`universityID`),
  ADD CONSTRAINT `universityadmin_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
