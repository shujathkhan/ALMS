-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2017 at 06:45 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `it`
--

-- --------------------------------------------------------

--
-- Table structure for table `coordinator_0_3026`
--

CREATE TABLE `coordinator_0_3026` (
  `staffid` varchar(10) NOT NULL,
  `courseid` varchar(10) DEFAULT NULL,
  `coursename` varchar(50) DEFAULT NULL,
  `u1` int(3) DEFAULT NULL,
  `u2` int(3) DEFAULT NULL,
  `u3` int(3) DEFAULT NULL,
  `u4` int(3) DEFAULT NULL,
  `u5` int(3) DEFAULT NULL,
  `roleid` varchar(20) DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coordinator_0_3026`
--

INSERT INTO `coordinator_0_3026` (`staffid`, `courseid`, `coursename`, `u1`, `u2`, `u3`, `u4`, `u5`, `roleid`, `status`) VALUES
('3026', 'it1001', 'cpp', NULL, NULL, NULL, NULL, NULL, '0', 1),
('45671', 'it1001', 'cpp', NULL, NULL, NULL, NULL, NULL, NULL, 1),
('9991', 'it1001', 'cpp', NULL, NULL, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `coordinator_0_45671`
--

CREATE TABLE `coordinator_0_45671` (
  `staffid` varchar(10) NOT NULL,
  `courseid` varchar(10) DEFAULT NULL,
  `coursename` varchar(50) DEFAULT NULL,
  `u1` int(3) DEFAULT NULL,
  `u2` int(3) DEFAULT NULL,
  `u3` int(3) DEFAULT NULL,
  `u4` int(3) DEFAULT NULL,
  `u5` int(3) DEFAULT NULL,
  `roleid` varchar(20) DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coordinator_0_45671`
--

INSERT INTO `coordinator_0_45671` (`staffid`, `courseid`, `coursename`, `u1`, `u2`, `u3`, `u4`, `u5`, `roleid`, `status`) VALUES
('45671', 'it1006', 'bigdata', NULL, NULL, NULL, NULL, NULL, '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `courseid` varchar(30) DEFAULT NULL,
  `courserefid` int(30) NOT NULL,
  `coursename` varchar(50) DEFAULT NULL,
  `coursetype` int(2) DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL,
  `rationale` varchar(200) DEFAULT NULL,
  `outcome` varchar(200) DEFAULT NULL,
  `syllabusupload` varchar(200) DEFAULT NULL,
  `u1` int(2) DEFAULT NULL,
  `u2` int(2) DEFAULT NULL,
  `u3` int(2) DEFAULT NULL,
  `u4` int(2) DEFAULT NULL,
  `u5` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseid`, `courserefid`, `coursename`, `coursetype`, `department`, `rationale`, `outcome`, `syllabusupload`, `u1`, `u2`, `u3`, `u4`, `u5`) VALUES
('it1001', 100, 'cpp', 0, 'it', 'Course Rationale', 'Course Outcome', NULL, 5, 4, 3, 2, 5),
('it1006', 101, 'bigdata', 0, 'it', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `faculty_3026`
--

CREATE TABLE `faculty_3026` (
  `studentid` varchar(15) NOT NULL,
  `studentname` varchar(30) DEFAULT NULL,
  `courseid` varchar(15) NOT NULL,
  `coursename` varchar(50) DEFAULT NULL,
  `u1` varchar(15) DEFAULT NULL,
  `u2` varchar(15) DEFAULT NULL,
  `u3` varchar(15) DEFAULT NULL,
  `u4` varchar(15) DEFAULT NULL,
  `u5` varchar(15) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faculty_9991`
--

CREATE TABLE `faculty_9991` (
  `studentid` varchar(15) NOT NULL,
  `studentname` varchar(30) DEFAULT NULL,
  `courseid` varchar(15) NOT NULL,
  `coursename` varchar(50) DEFAULT NULL,
  `u1` varchar(15) DEFAULT NULL,
  `u2` varchar(15) DEFAULT NULL,
  `u3` varchar(15) DEFAULT NULL,
  `u4` varchar(15) DEFAULT NULL,
  `u5` varchar(15) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_9991`
--

INSERT INTO `faculty_9991` (`studentid`, `studentname`, `courseid`, `coursename`, `u1`, `u2`, `u3`, `u4`, `u5`, `status`) VALUES
('2113', 'keshav', 'it1001', 'cpp', '0', '0', '0', '0', '0', '0'),
('2131', 'raghv', 'it1001', 'cpp', '0', '0', '0', '0', '0', '0'),
('221', 'sujhat', 'it1001', 'cpp', '0', '0', '0', '0', '0', '0'),
('7766', 'helo', 'it1001', 'cpp', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_45671`
--

CREATE TABLE `faculty_45671` (
  `studentid` varchar(15) NOT NULL,
  `studentname` varchar(30) DEFAULT NULL,
  `courseid` varchar(15) NOT NULL,
  `coursename` varchar(50) DEFAULT NULL,
  `u1` varchar(15) DEFAULT NULL,
  `u2` varchar(15) DEFAULT NULL,
  `u3` varchar(15) DEFAULT NULL,
  `u4` varchar(15) DEFAULT NULL,
  `u5` varchar(15) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faculty_it1001_3026`
--

CREATE TABLE `faculty_it1001_3026` (
  `staffid` varchar(10) NOT NULL,
  `courseid` varchar(10) DEFAULT NULL,
  `coursename` varchar(50) DEFAULT NULL,
  `sid` varchar(10) DEFAULT NULL,
  `status` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faculty_it1001_9991`
--

CREATE TABLE `faculty_it1001_9991` (
  `staffid` varchar(10) DEFAULT NULL,
  `courseid` varchar(10) DEFAULT NULL,
  `coursename` varchar(50) DEFAULT NULL,
  `sid` varchar(10) NOT NULL,
  `status` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_it1001_9991`
--

INSERT INTO `faculty_it1001_9991` (`staffid`, `courseid`, `coursename`, `sid`, `status`) VALUES
('9991', 'it1001', 'cpp', '100U1S1', 0),
('9991', 'it1001', 'cpp', '100U1S2', 0),
('9991', 'it1001', 'cpp', '100U1S3', 0),
('9991', 'it1001', 'cpp', '100U1S4', 0);

-- --------------------------------------------------------

--
-- Table structure for table `faculty_it1001_45671`
--

CREATE TABLE `faculty_it1001_45671` (
  `staffid` varchar(10) DEFAULT NULL,
  `courseid` varchar(10) DEFAULT NULL,
  `coursename` varchar(50) DEFAULT NULL,
  `sid` varchar(10) NOT NULL,
  `status` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faculty_it1006_45671`
--

CREATE TABLE `faculty_it1006_45671` (
  `staffid` varchar(10) NOT NULL,
  `courseid` varchar(10) DEFAULT NULL,
  `coursename` varchar(50) DEFAULT NULL,
  `sid` varchar(10) DEFAULT NULL,
  `status` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_course_it1001`
--

CREATE TABLE `master_course_it1001` (
  `staffid` varchar(20) DEFAULT '3026',
  `session_rationale` varchar(100) DEFAULT NULL,
  `sid` varchar(20) NOT NULL,
  `learningplan` varchar(300) DEFAULT NULL,
  `learningoutcome` varchar(300) DEFAULT NULL,
  `learningplanstatus` int(5) DEFAULT NULL,
  `learningverification` int(5) DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  `quizstatus` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_course_it1001`
--

INSERT INTO `master_course_it1001` (`staffid`, `session_rationale`, `sid`, `learningplan`, `learningoutcome`, `learningplanstatus`, `learningverification`, `status`, `quizstatus`) VALUES
('3026', 'rationale', '100U1S1', '5 min|localhost:8080|topic1|Level 2~`', 'Analyze|Discriminate|outcome~`', NULL, NULL, 1, NULL),
('3026', NULL, '100U1S2', NULL, NULL, NULL, NULL, 0, NULL),
('3026', NULL, '100U1S3', NULL, NULL, NULL, NULL, 0, NULL),
('3026', NULL, '100U1S4', NULL, NULL, NULL, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `master_course_it1006`
--

CREATE TABLE `master_course_it1006` (
  `staffid` varchar(20) DEFAULT '45671',
  `session_rationale` varchar(100) DEFAULT NULL,
  `sid` varchar(20) NOT NULL,
  `learningplan` varchar(300) DEFAULT NULL,
  `learningoutcome` varchar(300) DEFAULT NULL,
  `learningplanstatus` int(5) DEFAULT NULL,
  `learningverification` int(5) DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  `quizstatus` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `overallfaculty`
--

CREATE TABLE `overallfaculty` (
  `firstname` varchar(15) NOT NULL,
  `lastname` varchar(15) NOT NULL,
  `staffid` varchar(15) NOT NULL,
  `emailid` varchar(30) NOT NULL,
  `contactno` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role` varchar(30) NOT NULL,
  `groupname` varchar(10) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `overallfaculty`
--

INSERT INTO `overallfaculty` (`firstname`, `lastname`, `staffid`, `emailid`, `contactno`, `username`, `password`, `role`, `groupname`, `status`) VALUES
('admin', 'admin', '784512', 'admin@gmail.com', 841284, 'admin', 'admin', 'admin', 'default', 0),
('deptadmin', 'deptadmin', '100002', 'deptadmin@gmail.com', 0, 'dadmin', 'dadmin', 'Department Admin', 'default', 0),
('fac', 'fac', '45671', 'fac@gmail.com', 0, 'fac', 'fac', 'coordinator', 'default', 0),
('john', 'Singhi', '9991', 'vatsalya.singhi@gmail.com', 0, 'john', 'john', 'faculty', 'default', 0),
('Vatsalya', 'Singhi', '3026', 'vatsalya.singhi@gmail.com', 0, 'vats', 'vats', 'coordinator', 'default', 0);

-- --------------------------------------------------------

--
-- Table structure for table `overallstudent`
--

CREATE TABLE `overallstudent` (
  `firstname` varchar(15) NOT NULL,
  `lastname` varchar(15) NOT NULL,
  `studentid` varchar(30) NOT NULL,
  `emailid` varchar(30) NOT NULL,
  `contactno` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role` varchar(30) NOT NULL DEFAULT 'student',
  `groupname` varchar(10) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `overallstudent`
--

INSERT INTO `overallstudent` (`firstname`, `lastname`, `studentid`, `emailid`, `contactno`, `username`, `password`, `role`, `groupname`, `status`) VALUES
('keshav', 'adi', '2113', 'kgbgb@gmail.com', 0, 'keshav', 'keshav', 'student', 'default', 0),
('raghv', 'raghav', '2131', 'raghav@gmail.com', 0, 'raghav', 'raghav', 'student', 'default', 0),
('sujhat', 'sujhat', '221', 'suj@gmail.com', 0, 'sujhat', 'sujhat', 'student', 'demostud', 0),
('richa', 'richa', '342', 'richa@gmail.com', 0, 'richa', 'richa', 'student', 'demostud', 0),
('helo', 'jhe', '7766', 'fdo@gmail.com', 0, 'user1', 'user1', 'student', 'default', 0);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_table_it1001`
--

CREATE TABLE `quiz_table_it1001` (
  `quizrefid` varchar(15) DEFAULT NULL,
  `questionrefid` varchar(10) NOT NULL,
  `quiztypeid` varchar(20) DEFAULT NULL,
  `question` varchar(200) DEFAULT NULL,
  `option` varchar(200) DEFAULT NULL,
  `answer` varchar(30) DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_table_it1006`
--

CREATE TABLE `quiz_table_it1006` (
  `quizrefid` varchar(25) DEFAULT NULL,
  `questionrefid` varchar(20) NOT NULL,
  `quiztype` varchar(20) DEFAULT NULL,
  `question` varchar(200) DEFAULT NULL,
  `option` varchar(200) DEFAULT NULL,
  `answer` varchar(30) DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_221`
--

CREATE TABLE `student_221` (
  `staffid` varchar(15) DEFAULT NULL,
  `courseid` varchar(15) NOT NULL,
  `coursename` varchar(50) DEFAULT NULL,
  `u1` varchar(15) DEFAULT NULL,
  `u2` varchar(15) DEFAULT NULL,
  `u3` varchar(15) DEFAULT NULL,
  `u4` varchar(15) DEFAULT NULL,
  `u5` varchar(15) DEFAULT NULL,
  `roleid` varchar(10) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_221`
--

INSERT INTO `student_221` (`staffid`, `courseid`, `coursename`, `u1`, `u2`, `u3`, `u4`, `u5`, `roleid`, `status`) VALUES
('9991', 'it1001', 'cpp', '0', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `student_342`
--

CREATE TABLE `student_342` (
  `staffid` varchar(15) DEFAULT NULL,
  `courseid` varchar(15) NOT NULL,
  `coursename` varchar(50) DEFAULT NULL,
  `u1` varchar(15) DEFAULT NULL,
  `u2` varchar(15) DEFAULT NULL,
  `u3` varchar(15) DEFAULT NULL,
  `u4` varchar(15) DEFAULT NULL,
  `u5` varchar(15) DEFAULT NULL,
  `roleid` varchar(10) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_2113`
--

CREATE TABLE `student_2113` (
  `staffid` varchar(15) NOT NULL,
  `courseid` varchar(15) NOT NULL,
  `coursename` varchar(50) DEFAULT NULL,
  `u1` varchar(15) DEFAULT NULL,
  `u2` varchar(15) DEFAULT NULL,
  `u3` varchar(15) DEFAULT NULL,
  `u4` varchar(15) DEFAULT NULL,
  `u5` varchar(15) DEFAULT NULL,
  `roleid` varchar(10) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_2113`
--

INSERT INTO `student_2113` (`staffid`, `courseid`, `coursename`, `u1`, `u2`, `u3`, `u4`, `u5`, `roleid`, `status`) VALUES
('9991', 'it1001', 'cpp', '0', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `student_2131`
--

CREATE TABLE `student_2131` (
  `staffid` varchar(15) NOT NULL,
  `courseid` varchar(15) NOT NULL,
  `coursename` varchar(50) DEFAULT NULL,
  `u1` varchar(15) DEFAULT NULL,
  `u2` varchar(15) DEFAULT NULL,
  `u3` varchar(15) DEFAULT NULL,
  `u4` varchar(15) DEFAULT NULL,
  `u5` varchar(15) DEFAULT NULL,
  `roleid` varchar(10) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_2131`
--

INSERT INTO `student_2131` (`staffid`, `courseid`, `coursename`, `u1`, `u2`, `u3`, `u4`, `u5`, `roleid`, `status`) VALUES
('9991', 'it1001', 'cpp', '0', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `student_7766`
--

CREATE TABLE `student_7766` (
  `staffid` varchar(15) NOT NULL,
  `courseid` varchar(15) NOT NULL,
  `coursename` varchar(50) DEFAULT NULL,
  `u1` varchar(15) DEFAULT NULL,
  `u2` varchar(15) DEFAULT NULL,
  `u3` varchar(15) DEFAULT NULL,
  `u4` varchar(15) DEFAULT NULL,
  `u5` varchar(15) DEFAULT NULL,
  `roleid` varchar(10) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_7766`
--

INSERT INTO `student_7766` (`staffid`, `courseid`, `coursename`, `u1`, `u2`, `u3`, `u4`, `u5`, `roleid`, `status`) VALUES
('9991', 'it1001', 'cpp', '0', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `student_it1001_221`
--

CREATE TABLE `student_it1001_221` (
  `staffid` varchar(30) DEFAULT NULL,
  `session_rationale` varchar(100) DEFAULT NULL,
  `sid` varchar(15) NOT NULL,
  `learningplan` varchar(500) DEFAULT NULL,
  `learningoutcome` varchar(500) DEFAULT NULL,
  `learningplanstatus` varchar(5) DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  `learningverification` varchar(100) DEFAULT NULL,
  `quizstatus` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_it1001_221`
--

INSERT INTO `student_it1001_221` (`staffid`, `session_rationale`, `sid`, `learningplan`, `learningoutcome`, `learningplanstatus`, `status`, `learningverification`, `quizstatus`) VALUES
(NULL, NULL, '100U1S1', NULL, NULL, NULL, 0, NULL, NULL),
('9991', NULL, '100U1S2', NULL, NULL, '0', 0, NULL, 0),
('9991', NULL, '100U1S3', NULL, NULL, '0', 0, NULL, 0),
('9991', NULL, '100U1S4', NULL, NULL, '0', 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_it1001_2113`
--

CREATE TABLE `student_it1001_2113` (
  `staffid` varchar(30) DEFAULT NULL,
  `session_rationale` varchar(100) DEFAULT NULL,
  `sid` varchar(15) NOT NULL,
  `learningplan` varchar(500) DEFAULT NULL,
  `learningoutcome` varchar(500) DEFAULT NULL,
  `learningplanstatus` varchar(5) DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  `learningverification` varchar(100) DEFAULT NULL,
  `quizstatus` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_it1001_2113`
--

INSERT INTO `student_it1001_2113` (`staffid`, `session_rationale`, `sid`, `learningplan`, `learningoutcome`, `learningplanstatus`, `status`, `learningverification`, `quizstatus`) VALUES
('9991', 'rationale', '100U1S1', NULL, NULL, NULL, 1, NULL, NULL),
('9991', NULL, '100U1S2', NULL, NULL, '0', 0, NULL, 0),
('9991', NULL, '100U1S3', NULL, NULL, '0', 0, NULL, 0),
('9991', NULL, '100U1S4', NULL, NULL, '0', 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_it1001_2131`
--

CREATE TABLE `student_it1001_2131` (
  `staffid` varchar(30) DEFAULT NULL,
  `session_rationale` varchar(100) DEFAULT NULL,
  `sid` varchar(15) NOT NULL,
  `learningplan` varchar(500) DEFAULT NULL,
  `learningoutcome` varchar(500) DEFAULT NULL,
  `learningplanstatus` varchar(5) DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  `learningverification` varchar(100) DEFAULT NULL,
  `quizstatus` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_it1001_2131`
--

INSERT INTO `student_it1001_2131` (`staffid`, `session_rationale`, `sid`, `learningplan`, `learningoutcome`, `learningplanstatus`, `status`, `learningverification`, `quizstatus`) VALUES
(NULL, NULL, '100U1S1', NULL, NULL, NULL, 1, NULL, NULL),
('9991', NULL, '100U1S2', NULL, NULL, '0', 0, NULL, 0),
('9991', NULL, '100U1S3', NULL, NULL, '0', 0, NULL, 0),
('9991', NULL, '100U1S4', NULL, NULL, '0', 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_it1001_7766`
--

CREATE TABLE `student_it1001_7766` (
  `staffid` varchar(30) DEFAULT NULL,
  `session_rationale` varchar(100) DEFAULT NULL,
  `sid` varchar(15) NOT NULL,
  `learningplan` varchar(500) DEFAULT NULL,
  `learningoutcome` varchar(500) DEFAULT NULL,
  `learningplanstatus` varchar(5) DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  `learningverification` varchar(100) DEFAULT NULL,
  `quizstatus` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_it1001_7766`
--

INSERT INTO `student_it1001_7766` (`staffid`, `session_rationale`, `sid`, `learningplan`, `learningoutcome`, `learningplanstatus`, `status`, `learningverification`, `quizstatus`) VALUES
('9991', 'rationale', '100U1S1', '5 min|localhost:8080|topic1|Level 2~`', 'Analyze|Discriminate|outcome~`', '0', 1, NULL, 0),
('9991', NULL, '100U1S2', NULL, NULL, '0', 0, NULL, 0),
('9991', NULL, '100U1S3', NULL, NULL, '0', 0, NULL, 0),
('9991', NULL, '100U1S4', NULL, NULL, '0', 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `courseid` varchar(30) DEFAULT NULL,
  `unitid` varchar(20) NOT NULL,
  `unitname` varchar(20) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `reference` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`courseid`, `unitid`, `unitname`, `description`, `reference`) VALUES
('it1001', '100U1', 'demounitname', 'demounitdescription', 'demounitreference');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coordinator_0_3026`
--
ALTER TABLE `coordinator_0_3026`
  ADD PRIMARY KEY (`staffid`);

--
-- Indexes for table `coordinator_0_45671`
--
ALTER TABLE `coordinator_0_45671`
  ADD PRIMARY KEY (`staffid`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courserefid`);

--
-- Indexes for table `faculty_3026`
--
ALTER TABLE `faculty_3026`
  ADD PRIMARY KEY (`studentid`,`courseid`);

--
-- Indexes for table `faculty_9991`
--
ALTER TABLE `faculty_9991`
  ADD PRIMARY KEY (`studentid`,`courseid`);

--
-- Indexes for table `faculty_45671`
--
ALTER TABLE `faculty_45671`
  ADD PRIMARY KEY (`studentid`,`courseid`);

--
-- Indexes for table `faculty_it1001_3026`
--
ALTER TABLE `faculty_it1001_3026`
  ADD PRIMARY KEY (`staffid`);

--
-- Indexes for table `faculty_it1001_9991`
--
ALTER TABLE `faculty_it1001_9991`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `faculty_it1001_45671`
--
ALTER TABLE `faculty_it1001_45671`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `faculty_it1006_45671`
--
ALTER TABLE `faculty_it1006_45671`
  ADD PRIMARY KEY (`staffid`);

--
-- Indexes for table `master_course_it1001`
--
ALTER TABLE `master_course_it1001`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `master_course_it1006`
--
ALTER TABLE `master_course_it1006`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `overallfaculty`
--
ALTER TABLE `overallfaculty`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `overallstudent`
--
ALTER TABLE `overallstudent`
  ADD UNIQUE KEY `studentid` (`studentid`);

--
-- Indexes for table `quiz_table_it1001`
--
ALTER TABLE `quiz_table_it1001`
  ADD PRIMARY KEY (`questionrefid`);

--
-- Indexes for table `quiz_table_it1006`
--
ALTER TABLE `quiz_table_it1006`
  ADD PRIMARY KEY (`questionrefid`);

--
-- Indexes for table `student_221`
--
ALTER TABLE `student_221`
  ADD PRIMARY KEY (`courseid`);

--
-- Indexes for table `student_342`
--
ALTER TABLE `student_342`
  ADD PRIMARY KEY (`courseid`);

--
-- Indexes for table `student_2113`
--
ALTER TABLE `student_2113`
  ADD PRIMARY KEY (`courseid`,`staffid`);

--
-- Indexes for table `student_2131`
--
ALTER TABLE `student_2131`
  ADD PRIMARY KEY (`courseid`,`staffid`);

--
-- Indexes for table `student_7766`
--
ALTER TABLE `student_7766`
  ADD PRIMARY KEY (`courseid`,`staffid`);

--
-- Indexes for table `student_it1001_221`
--
ALTER TABLE `student_it1001_221`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `student_it1001_2113`
--
ALTER TABLE `student_it1001_2113`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `student_it1001_2131`
--
ALTER TABLE `student_it1001_2131`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `student_it1001_7766`
--
ALTER TABLE `student_it1001_7766`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unitid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `courserefid` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
