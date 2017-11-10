-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 09, 2017 at 02:43 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.0.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `courseReg`
--
CREATE DATABASE IF NOT EXISTS `courseReg` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `courseReg`;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `classno` varchar(4) NOT NULL,
  `code` varchar(7) DEFAULT NULL,
  `Tslot` varchar(10) DEFAULT NULL,
  `Lslot` varchar(12) DEFAULT NULL,
  `Nos` int(11) DEFAULT '0',
  `faculty` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`classno`, `code`, `Tslot`, `Lslot`, `Nos`, `faculty`) VALUES
('1001', 'CSE1001', 'NULL', 'L43+L49+L55', 1, 'Rajeshwari'),
('1002', 'CSE1001', 'NULL', 'L3+L9+L21', 1, 'Umitty'),
('1003', 'CSE1001', 'NULL', 'L1+L7+L27', 0, 'Bhargavi'),
('1004', 'CSE1001', 'NULL', 'L3+L9+L21', 0, 'Jegannathan'),
('1005', 'CSE1001', 'NULL', 'L43+L49+L55', 0, 'Kavya K'),
('1006', 'CSE1002', 'NULL', 'L31+L37+L43', 0, 'BharathiRaja'),
('1007', 'CSE1002', 'NULL', 'L49+L33+L39', 0, 'Janaki Meena'),
('1008', 'CSE1002', 'NULL', 'L49+L33+L39', 0, 'Nithyanandanam'),
('1009', 'CSE1002', 'NULL', 'L13+L19+L27', 0, 'Rajarajeshwari'),
('1010', 'CSE1002', 'NULL', 'L13+L19+L27', 0, 'Rajesh M'),
('1011', 'CSE1003', 'F1', 'L49', 0, 'Nithyadarshini PS'),
('1012', 'CSE1003', 'F1', 'L37', 0, 'Shola Usha Rani'),
('1013', 'CSE1003', 'F1', 'L31', 0, 'Maheshwari R'),
('1014', 'CSE1003', 'F2', 'L1', 0, 'Vergin'),
('1015', 'CSE1003', 'F2', 'L27', 0, 'Geetha M'),
('1016', 'CSE1003', 'F2', 'L7', 1, 'Nisha VM'),
('1017', 'CSE2001', 'F1', 'NULL', 2, 'Harini S'),
('1018', 'CSE2001', 'F1', 'NULL', 0, 'Vaidehi'),
('1019', 'CSE2001', 'F1', 'NULL', 0, 'Nivedita'),
('1020', 'CSE2001', 'F2', 'NULL', 0, 'Abdul'),
('1021', 'CSE2001', 'F2', 'NULL', 0, 'Bhargavi'),
('1022', 'CSE2001', 'F2', 'NULL', 0, 'Vergin B'),
('1023', 'CSE3001', 'A1', 'L37', 1, 'Sathis Kumar'),
('1024', 'CSE3001', 'A1', 'L34', 0, 'Ganapathy'),
('1025', 'CSE3001', 'A2', 'L7', 0, 'Alok'),
('1026', 'CSE3001', 'A2', 'L21', 0, 'Nachiyappan'),
('1027', 'CSE3001', 'A1', 'L43', 0, 'Jasmine'),
('1028', 'CSE3001', 'A2', 'L13', 0, 'Justus'),
('1029', 'CSE3002', 'E1', 'L37', 1, 'Sivagami'),
('1030', 'CSE3002', 'E2', 'L7', 0, 'Kavya'),
('1031', 'CSE3002', 'E2', 'L21', 0, 'Sandhya'),
('1032', 'CSE3002', 'E1', 'L55', 1, 'Premalatha'),
('1033', 'CSE3002', 'E1', 'L57', 0, 'Malathi'),
('1034', 'CSE3002', 'E2', 'L3', 0, 'Jenila'),
('1035', 'CSE2003', 'G2', 'L25', 0, 'Nagraj SV'),
('1037', 'CSE2003', 'G1', 'L55', 0, 'Kavya'),
('1038', 'CSE2003', 'G1', 'L45', 0, 'Poongodi'),
('1039', 'CSE2003', 'G2', 'L13', 0, 'Umitty'),
('1040', 'CSE2003', 'G1', 'L49', 1, 'Jayaram B'),
('1041', 'CSE2004', 'D1', 'L37', 0, 'Saleena'),
('1042', 'CSE2004', 'D2', 'L27', 0, 'Premalatha'),
('1043', 'CSE2004', 'D1', 'L33', 0, 'Sajida'),
('1044', 'CSE2004', 'D2', 'L19', 0, 'Renuka'),
('1045', 'CSE2004', 'D1', 'L57', 0, 'Geetha S'),
('1046', 'CSE2004', 'D2', 'L7', 0, 'Vishnupriya'),
('1047', 'PHY1001', 'C1', 'L31', 1, 'Bornali Sarma'),
('1048', 'PHY1001', 'C1', 'L33', 0, 'Arun Sarma'),
('1049', 'PHY1001', 'C1', 'L37', 0, 'Kennedy'),
('1050', 'PHY1001', 'C2', 'L3', 0, 'Manikandan'),
('1051', 'PHY1001', 'C2', 'L29', 0, 'Caroline'),
('1052', 'PHY1001', 'C2', 'L23', 0, 'Sanjit Das'),
('1053', 'CHY1001', 'D1', 'L1', 1, 'Balamurali'),
('1054', 'CHY1001', 'D1', 'L33', 1, 'Rupam Singh'),
('1055', 'CHY1001', 'D1', 'L55', 0, 'Fateh Vir'),
('1056', 'CHY1001', 'D2', 'L19', 0, 'Jayanta'),
('1057', 'CHY1001', 'D2', 'L27', 0, 'Arokyaswami'),
('1058', 'CHY1001', 'D2', 'L13', 0, 'RK');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `code` varchar(7) NOT NULL,
  `course_name` varchar(40) DEFAULT NULL,
  `credits` int(11) DEFAULT NULL,
  `school` varchar(6) DEFAULT NULL,
  `prereq` varchar(10) DEFAULT NULL,
  `type` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`code`, `course_name`, `credits`, `school`, `prereq`, `type`) VALUES
('CHY1001', 'Engineering Chemistry', 5, 'SAS', 'NULL', 'LTP'),
('CHY1002', 'Environmental Sciences', 3, 'SAS', 'NULL', 'TP'),
('CSE1001', 'Problem solving and Programming', 3, 'SCSE', 'NULL', 'LO'),
('CSE1002', 'Problem Solving with OOP', 3, 'SCSE', 'NULL', 'LO'),
('CSE1003', 'Digital Logic and Design', 4, 'SCSE', 'NULL', 'TLP'),
('CSE1004', 'Network and Communication', 4, 'SCSE', 'NULL', 'TLP'),
('CSE2001', 'Computer Organization and Architecture', 3, 'SCSE', 'NULL', 'TO'),
('CSE2002', 'Theory of Computation and Compiler Desig', 4, 'SCSE', 'NULL', 'TP'),
('CSE2003', 'Data Structures and Algorithms', 4, 'SCSE', 'NULL', 'LTP'),
('CSE2004', 'Database Management System', 4, 'SCSE', 'NULL', 'LTP'),
('CSE2005', 'Operating Systems', 4, 'SCSE', 'NULL', 'LTP'),
('CSE2006', 'Microprocessors and Interfacing', 4, 'SCSE', 'NULL', 'LTP'),
('CSE3001', 'Software Engineering', 4, 'SCSE', 'NULL', 'LTP'),
('CSE3002', 'Internet and Web Programming', 4, 'SCSE', 'NULL', 'LTP'),
('CSE3013', 'Artificial Intelligence', 4, 'SCSE', 'NULL', 'LTP'),
('CSE3024', 'Web Mining', 4, 'SCSE', 'NULL', 'LTP'),
('CSE4001', 'Parallel and Distributed Computing', 4, 'SCSE', 'NULL', 'LTP'),
('CSE4015', 'Human Computer Interaction', 4, 'SCSE', 'NULL', 'LTP'),
('CSE4019', 'Image Processing', 4, 'SCSE', 'NULL', 'LTP'),
('EEE1001', 'Basic Electrical and Electronics Enginee', 3, 'SELECT', 'NULL', 'LT'),
('ENG1002', 'Effective English', 2, 'SSL', 'NULL', 'LT'),
('ENG1011', 'English for Engineers', 2, 'SSL', 'NULL', 'LTP'),
('ESP1001', 'Espanol Fundamental', 2, 'SSL', 'NULL', 'TO'),
('FRE1001', 'Francais Quotidien', 2, 'SSL', 'NULL', 'TO'),
('GER1001', 'Grundstufe Deutsch', 2, 'SSL', 'NULL', 'TO'),
('HUM1021', 'Ethics and Values', 2, 'SSL', 'NULL', 'TP'),
('MAT1011', 'Calculus for Engineers', 4, 'SAS', 'NULL', 'LT'),
('MAT1014', 'Discrete Mathematics and Graph Theory', 4, 'SAS', 'NULL', 'TO'),
('MAT2001', 'Statistics for Engineers', 4, 'SAS', 'NULL', 'LT'),
('MAT2002', 'Application of Differentail and Differen', 4, 'SAS', 'MAT1011', 'LT'),
('MAT3004', 'Applied Linear Algebra', 4, 'SAS', 'NULL', 'TO'),
('MGT1012', 'Project Management', 3, 'VITBS', 'NULL', 'TP'),
('MGT1022', 'Lean Start-Up Management', 2, 'VITBS', 'NULL', 'TP'),
('MGT1024', 'Organizational Behaviouor', 4, 'VITBS', 'NULL', 'TP'),
('MGT1032', 'Operations Management', 3, 'VITBS', 'NULL', 'TO'),
('PHY1001', 'Engineering Physics', 5, 'SAS', 'NULL', 'LTP'),
('PHY1999', 'Introduction to Innovative Projects', 2, 'SAS', 'NULL', 'TP');

-- --------------------------------------------------------

--
-- Table structure for table `slots`
--

CREATE TABLE `slots` (
  `theory` varchar(2) NOT NULL,
  `lab` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slots`
--

INSERT INTO `slots` (`theory`, `lab`) VALUES
('A1', 'L1+L13'),
('B1', 'L7+L19'),
('C1', 'L13+L25'),
('D1', 'L19+L13'),
('E1', 'L25+L19'),
('F1', 'L1+L15'),
('G1', 'L7+L21'),
('A2', 'L31+43'),
('B2', 'L37+L49'),
('C2', 'L43+L55'),
('D2', 'L49+LL33'),
('E2', 'L55+L39'),
('F2', 'L31+L45'),
('G2', 'L37+L51');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `name` varchar(30) DEFAULT NULL,
  `regno` varchar(9) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `pass` varchar(15) DEFAULT NULL,
  `credits` int(11) NOT NULL DEFAULT '0',
  `class` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`name`, `regno`, `email`, `pass`, `credits`, `class`) VALUES
('test', '16bce1001', 'test@gmail.com', 'testtest', 0, ''),
('Saurab Priyadarshi', '16bce1042', 'saurab123@gmail.com', 'saurabpri', 0, ''),
('Udai', '16bce1079', 'udaiag@gmail.com', 'udai.agarwal', 20, '1054+1047+1001+1017+1029+'),
('Tanay', '16bce1324', 'tanay1up@gmail.com', 'tanay123', 27, '1017+1040+1032+1023+1002+1053+1016+'),
('Rahul kelkar', '16bce1380', 'rahulakchill@gmail.com', 'rahulak', 0, '');

--
-- Triggers `student`
--
DELIMITER $$
CREATE TRIGGER `max_credits` BEFORE UPDATE ON `student` FOR EACH ROW if new.credits>27 THEN
 SIGNAL SQLSTATE '02000' set MESSAGE_TEXT='Warning: credits cannot exceed 27';
end if
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`classno`),
  ADD UNIQUE KEY `classno` (`classno`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`code`),
  ADD UNIQUE KEY `code` (`code`),
  ADD UNIQUE KEY `code_2` (`code`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`regno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
