-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 18, 2013 at 10:46 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `octo_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `accomplished_assign`
--

CREATE TABLE IF NOT EXISTS `accomplished_assign` (
  `accomplished_assign_id` int(11) NOT NULL AUTO_INCREMENT,
  `assignment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `date_passed` datetime NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`accomplished_assign_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `accomplished_assign`
--


-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE IF NOT EXISTS `announcement` (
  `announcement_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`announcement_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `announcement`
--


-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE IF NOT EXISTS `assignment` (
  `assignment_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `due_dated` datetime NOT NULL,
  `date_activation` datetime NOT NULL,
  PRIMARY KEY (`assignment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `assignment`
--


-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `course` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`course_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `course`
--


-- --------------------------------------------------------

--
-- Table structure for table `gradebook_assignments`
--

CREATE TABLE IF NOT EXISTS `gradebook_assignments` (
  `gradebook_assignments_id` int(11) NOT NULL AUTO_INCREMENT,
  `assignment_id` int(11) NOT NULL,
  `ispassed` varchar(255) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`gradebook_assignments_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `gradebook_assignments`
--


-- --------------------------------------------------------

--
-- Table structure for table `gradebook_test`
--

CREATE TABLE IF NOT EXISTS `gradebook_test` (
  `Gradebook_id` int(11) NOT NULL AUTO_INCREMENT,
  `remarks` varchar(255) NOT NULL,
  `tests_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `percentage` varchar(255) NOT NULL,
  `date_passed` datetime NOT NULL,
  PRIMARY KEY (`Gradebook_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `gradebook_test`
--


-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE IF NOT EXISTS `section` (
  `section_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `section` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`section_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `section`
--


-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_number` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `section_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_registered` datetime NOT NULL,
  PRIMARY KEY (`student_id`),
  KEY `section_id` (`section_id`,`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `student`
--


-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE IF NOT EXISTS `tests` (
  `tests_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `date_activation` datetime NOT NULL,
  `due_date` datetime NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  `items` varchar(255) NOT NULL,
  PRIMARY KEY (`tests_id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tests`
--


-- --------------------------------------------------------

--
-- Table structure for table `tests_question`
--

CREATE TABLE IF NOT EXISTS `tests_question` (
  `tests_Qid` int(11) NOT NULL AUTO_INCREMENT,
  `tests_id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `wrong_answer` varchar(255) NOT NULL,
  `type_Question_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`tests_Qid`),
  KEY `tests_id` (`tests_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tests_question`
--


-- --------------------------------------------------------

--
-- Table structure for table `_module`
--

CREATE TABLE IF NOT EXISTS `_module` (
  `module_id` int(11) NOT NULL AUTO_INCREMENT,
  `reference_id` int(11) NOT NULL,
  `module` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `back_end` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `_create` tinyint(1) NOT NULL,
  `_read` tinyint(1) NOT NULL,
  `_update` tinyint(1) NOT NULL,
  `_delete` tinyint(1) NOT NULL,
  `_export` tinyint(1) NOT NULL,
  `_print` tinyint(1) NOT NULL,
  `_sort` int(11) NOT NULL,
  PRIMARY KEY (`module_id`),
  UNIQUE KEY `module` (`module`),
  KEY `reference_id` (`reference_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `_module`
--

INSERT INTO `_module` (`module_id`, `reference_id`, `module`, `url`, `back_end`, `status`, `_create`, `_read`, `_update`, `_delete`, `_export`, `_print`, `_sort`) VALUES
(1, 5, 'Modules', 'module', 1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 5, 'Labels', 'labels', 1, 1, 1, 1, 1, 1, 0, 0, 0),
(15, 5, 'Role', 'role', 1, 1, 1, 0, 1, 1, 0, 0, 0),
(16, 2, 'Suppliers', 'suppliers', 1, 1, 1, 1, 1, 1, 1, 1, 0),
(17, 2, 'Clients', 'clients', 1, 1, 1, 1, 1, 1, 1, 1, 0),
(18, 2, 'Products', 'products', 1, 1, 1, 1, 1, 1, 1, 1, 0),
(19, 5, 'Users', 'users', 1, 1, 1, 0, 0, 0, 0, 0, 0),
(20, 2, 'test', 'test', 1, 0, 0, 1, 0, 0, 0, 0, 0),
(22, 2, 'dev', 'dev', 1, 0, 0, 1, 0, 0, 0, 0, 0),
(23, 4, 'cms', 'cms', 1, 0, 0, 1, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `_module_label`
--

CREATE TABLE IF NOT EXISTS `_module_label` (
  `label_id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) NOT NULL,
  `_sort` int(11) NOT NULL,
  PRIMARY KEY (`label_id`),
  UNIQUE KEY `label` (`label`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `_module_label`
--

INSERT INTO `_module_label` (`label_id`, `label`, `_sort`) VALUES
(1, 'Home', 1),
(2, 'Manipulation', 5),
(3, 'Reports', 3),
(4, 'Print Request', 2),
(5, 'System Management', 4);

-- --------------------------------------------------------

--
-- Table structure for table `_permission`
--

CREATE TABLE IF NOT EXISTS `_permission` (
  `permission_id` int(11) NOT NULL AUTO_INCREMENT,
  `module_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `_create` tinyint(1) NOT NULL DEFAULT '0',
  `_update` tinyint(1) NOT NULL DEFAULT '0',
  `_delete` tinyint(1) NOT NULL DEFAULT '0',
  `_read` tinyint(1) NOT NULL DEFAULT '0',
  `_export` tinyint(1) NOT NULL DEFAULT '0',
  `_print` tinyint(1) NOT NULL,
  PRIMARY KEY (`permission_id`),
  KEY `module_id` (`module_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `_permission`
--

INSERT INTO `_permission` (`permission_id`, `module_id`, `role_id`, `_create`, `_update`, `_delete`, `_read`, `_export`, `_print`) VALUES
(8, 1, 1, 0, 1, 1, 1, 1, 1),
(9, 2, 1, 0, 1, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `_role`
--

CREATE TABLE IF NOT EXISTS `_role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `_role`
--

INSERT INTO `_role` (`role_id`, `role`, `status`) VALUES
(1, 'Boss', 1),
(2, 'test', 0),
(5, 'adasd', 0);

-- --------------------------------------------------------

--
-- Table structure for table `_student`
--

CREATE TABLE IF NOT EXISTS `_student` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_number` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  PRIMARY KEY (`student_id`),
  KEY `student_number` (`student_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `_student`
--


-- --------------------------------------------------------

--
-- Table structure for table `_users`
--

CREATE TABLE IF NOT EXISTS `_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `gender` varchar(25) NOT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `date_registered` datetime DEFAULT NULL,
  `varKey` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email_address` (`email_address`),
  KEY `user_role_id` (`role_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `_users`
--

INSERT INTO `_users` (`user_id`, `role_id`, `password`, `email_address`, `firstname`, `lastname`, `company_name`, `address`, `gender`, `contact_number`, `mobile_number`, `status`, `date_updated`, `date_registered`, `varKey`) VALUES
(1, 1, 'lOxrwqtWYUJ9kkDWFP4O1dx2IDF5jr0=', 'mangtomas.code@gmail.com', 'Red', 'Mariano', 'Crackerjack', '#09 Don Rocess, Pasong Tamo, Makati City', 'Male', '0987653', '0987654321', 1, '2013-06-09 19:56:41', '2013-04-12 22:38:51', 'Yc0t00QnGu0h'),
(3, 0, 'lOxrwqtWYUJ9kkDWFP4O1dx2IDF5jr0=', 'octo.git.js@gmail.com', 'Red', 'Mariano', 'Crackerjack', '#09 Don Rocess, Pasong Tamo, Makati City', 'Male', '0987653', '0987654321', 1, '2013-06-09 19:56:41', '2013-04-12 22:38:51', 'Yc0t00QnGu0h');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `_module`
--
ALTER TABLE `_module`
  ADD CONSTRAINT `_module_ibfk_1` FOREIGN KEY (`reference_id`) REFERENCES `_module_label` (`label_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `_permission`
--
ALTER TABLE `_permission`
  ADD CONSTRAINT `_permission_ibfk_1` FOREIGN KEY (`module_id`) REFERENCES `_module` (`module_id`) ON DELETE CASCADE ON UPDATE CASCADE;
