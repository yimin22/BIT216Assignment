-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2019 at 05:43 PM
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
(40042, 976456700988, 'ic', '1990-11-22', 123456789, 30052);

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `applicationID` int(5) NOT NULL,
  `applicationDate` date NOT NULL,
  `status` varchar(10) NOT NULL,
  `applicantID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `programme`
--

CREATE TABLE `programme` (
  `programmeCode` int(3) NOT NULL,
  `programmeName` varchar(60) NOT NULL,
  `description` varchar(150) NOT NULL,
  `closingDate` date NOT NULL,
  `academicQualification` varchar(150) NOT NULL,
  `numOfApplication` int(3) NOT NULL,
  `universityID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(10062, 'A-Levels', 1, 5, 'Average of best 3 subjects.', 'Aâ€“5 points,Bâ€“4 points,Câ€“3 points,D-2 points,Eâ€“1 point'),
(10063, 'Unified Examination Certificate(UEC)', 5, 30, 'Total of best 5 subjects.', 'A1 - 1 point,A2 - 2 points,B3 - 3 points,B4 - 4 points,B5 - 5 points,B6 - 6 points'),
(10064, 'STPM', 0, 4, 'Average of best 3 subjects.', 'A   (4.00),A-  (3.67),B+  (3.33),B   (3.00),B-  (2.67),C+  (2.33),C   (2.00),B+  (1.67),D+  (1.33),D   (1.00),F   (0.00),'),
(10065, 'Australian Matriculation', 0, 100, 'Average of best 4 subjects.', '0 - 100%'),
(10066, 'Canadian Pre University', 0, 100, 'Average of 6 subjects.', '0 -100%');

-- --------------------------------------------------------

--
-- Table structure for table `qualificationobtained`
--

CREATE TABLE `qualificationobtained` (
  `overallScore` double NOT NULL,
  `applicantID` int(5) NOT NULL,
  `qualificationID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `subjectName` varchar(60) NOT NULL,
  `grade` char(2) NOT NULL,
  `score` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(20001, 'Help University');

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
(60001, 20001, 30047);

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
(30044, 'jackson', '123', 'jackson', 'jackson@gmail.com'),
(30047, 'Jennie', '1234', 'Jennie Kim', 'jennie@gmail.com'),
(30048, 'rose', '123', 'rose wong', 'rose@gmail.com'),
(30050, 'Yimin', '1234', 'Yimin', 'yimin@gmail.com'),
(30052, 'tamie', '123', 'tamie', 'tam@gmail.com');

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
  ADD KEY `applicantID` (`applicantID`);

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
-- Indexes for table `qualificationobtained`
--
ALTER TABLE `qualificationobtained`
  ADD KEY `applicantID` (`applicantID`),
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
  MODIFY `applicantID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40043;

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `applicationID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qualification`
--
ALTER TABLE `qualification`
  MODIFY `qualificationID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10089;

--
-- AUTO_INCREMENT for table `university`
--
ALTER TABLE `university`
  MODIFY `universityID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20002;

--
-- AUTO_INCREMENT for table `universityadmin`
--
ALTER TABLE `universityadmin`
  MODIFY `adminID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60002;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30053;

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
  ADD CONSTRAINT `application_ibfk_1` FOREIGN KEY (`applicantID`) REFERENCES `applicant` (`applicantID`);

--
-- Constraints for table `programme`
--
ALTER TABLE `programme`
  ADD CONSTRAINT `programme_ibfk_1` FOREIGN KEY (`universityID`) REFERENCES `university` (`universityID`);

--
-- Constraints for table `qualificationobtained`
--
ALTER TABLE `qualificationobtained`
  ADD CONSTRAINT `qualificationobtained_ibfk_1` FOREIGN KEY (`applicantID`) REFERENCES `applicant` (`applicantID`),
  ADD CONSTRAINT `qualificationobtained_ibfk_2` FOREIGN KEY (`qualificationID`) REFERENCES `qualification` (`qualificationID`);

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
