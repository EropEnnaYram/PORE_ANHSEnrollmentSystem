-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 20, 2013 at 09:34 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ANHS_EnrollmentSystemDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `date`
--

CREATE TABLE IF NOT EXISTS `date` (
  `date_id` int(17) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  PRIMARY KEY (`date_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `date`
--

INSERT INTO `date` (`date_id`, `date`) VALUES
(1, '0000-00-00'),
(2, '2013-05-09');

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE IF NOT EXISTS `days` (
  `days_id` int(13) NOT NULL AUTO_INCREMENT,
  `days` varchar(10) NOT NULL,
  PRIMARY KEY (`days_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`days_id`, `days`) VALUES
(1, 'Monday');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE IF NOT EXISTS `schedules` (
  `schedules_id` int(11) NOT NULL AUTO_INCREMENT,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`schedules_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`schedules_id`, `time_start`, `time_end`, `date`) VALUES
(2, '08:30:00', '09:30:00', '0000-00-00'),
(3, '08:30:00', '09:30:00', '0000-00-00'),
(4, '00:00:01', '00:00:02', '0000-00-00'),
(5, '00:00:00', '00:00:00', '0000-00-00'),
(6, '00:00:00', '00:00:00', '2013-05-08'),
(7, '00:00:00', '00:00:00', '0000-00-00'),
(8, '00:00:00', '00:00:00', '0000-00-00'),
(9, '07:30:00', '08:30:00', '2013-05-08'),
(10, '01:00:00', '02:00:00', '2013-05-16'),
(11, '00:00:00', '00:00:00', '2013-01-02'),
(12, '02:00:00', '03:00:00', '2013-05-23'),
(13, '05:00:00', '06:00:00', '2013-05-28');

-- --------------------------------------------------------

--
-- Table structure for table `schedules_connect_table`
--

CREATE TABLE IF NOT EXISTS `schedules_connect_table` (
  `schedules_connect_id` int(14) NOT NULL AUTO_INCREMENT,
  `schedules_id` int(11) NOT NULL,
  `subjects_id` int(11) NOT NULL,
  `teachers_id` int(11) NOT NULL,
  `days_id` int(11) NOT NULL,
  `sections_id` int(11) NOT NULL,
  `students_id` int(11) NOT NULL,
  PRIMARY KEY (`schedules_connect_id`),
  KEY `link_to_schedules` (`schedules_id`),
  KEY `link_to_subjects` (`subjects_id`),
  KEY `link_to_teachers` (`teachers_id`),
  KEY `link_to_days` (`days_id`),
  KEY `link_to_sections` (`sections_id`),
  KEY `link_to_students` (`students_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `schedules_connect_table`
--


-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE IF NOT EXISTS `sections` (
  `sections_id` int(16) NOT NULL AUTO_INCREMENT,
  `grade` int(2) NOT NULL,
  `sections_name` varchar(15) NOT NULL,
  PRIMARY KEY (`sections_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`sections_id`, `grade`, `sections_name`) VALUES
(19, 8, 'sunflower');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `students_id` int(12) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(90) NOT NULL,
  `middleInitial` varchar(90) NOT NULL,
  `lastname` varchar(90) NOT NULL,
  `year` int(2) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `confirm_password` varchar(60) NOT NULL,
  PRIMARY KEY (`students_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`students_id`, `firstname`, `middleInitial`, `lastname`, `year`, `phone`, `email`, `username`, `password`, `confirm_password`) VALUES
(4, '', 'J', '', 0, '09076018548', 'mary_annepore@yahoo.com', 'anne', 'anne', 'anne'),
(5, '', 'B', '', 0, '09484673503', 'rubelyn@yahoo.com', 'rubelyn', 'rubelyn', 'rubelyn'),
(6, '', 'B', '', 0, '709', 'ivyrebuyas@ymail.com', 'ivy', 'ivy', 'ivy'),
(7, '', 'J', '', 0, '8907509826', 'anne@yahoo.com', 'anne', '12', '12'),
(8, '', 'wsd', '', 0, '357', 'fgh', 'fgh', '123', '123'),
(9, 'Love', 'H', 'Me', 0, '092360978', 'niel_love_jessa@yahoo.com', 'love', 'love', 'love'),
(10, 'Mark', 'J', 'Pore', 7, '098385797284', 'mark@yahoo.com', 'mark', 'mark', 'mark'),
(11, 'sadf', 'gsa', 'wer', 5, '45748', 'dfhge', 'er', 'er', 'er'),
(12, 'htyg', 'lo', 'abala', 6, '7654', 'fdj', 'gh', 'gh', 'gh'),
(13, 'asfd', 'gfk', 'bello', 6, '456', 'ghg', 'df', 'df', 'df'),
(14, 'james', 'v', 'asd', 8, 'w2523', 'angelieruthmaraya@yahoo.com', 'james', 'james', 'james');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `subjects_id` int(8) NOT NULL AUTO_INCREMENT,
  `subjects_name` varchar(15) NOT NULL,
  `units` float NOT NULL,
  PRIMARY KEY (`subjects_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subjects_id`, `subjects_name`, `units`) VALUES
(8, 'Filipino', 1.8),
(10, 'Math', 1.5),
(16, '', 0),
(17, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE IF NOT EXISTS `teachers` (
  `teachers_id` int(15) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(15) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `type` varchar(15) NOT NULL,
  `grade` int(2) NOT NULL,
  PRIMARY KEY (`teachers_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teachers_id`, `firstname`, `lastname`, `type`, `grade`) VALUES
(3, 'Analie', 'Antoni', 'floating', 8),
(5, 'John', 'Evangelista', 'advisory', 10);

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE IF NOT EXISTS `time` (
  `time_id` int(15) NOT NULL AUTO_INCREMENT,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  PRIMARY KEY (`time_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `time`
--

INSERT INTO `time` (`time_id`, `time_start`, `time_end`) VALUES
(1, '07:30:00', '08:30:00');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `schedules_connect_table`
--
ALTER TABLE `schedules_connect_table`
  ADD CONSTRAINT `link_to_days` FOREIGN KEY (`days_id`) REFERENCES `days` (`days_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `link_to_schedules` FOREIGN KEY (`schedules_id`) REFERENCES `schedules` (`schedules_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `link_to_sections` FOREIGN KEY (`sections_id`) REFERENCES `sections` (`sections_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `link_to_students` FOREIGN KEY (`students_id`) REFERENCES `students` (`students_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `link_to_subjects` FOREIGN KEY (`subjects_id`) REFERENCES `subjects` (`subjects_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `link_to_teachers` FOREIGN KEY (`teachers_id`) REFERENCES `teachers` (`teachers_id`) ON DELETE CASCADE ON UPDATE CASCADE;
