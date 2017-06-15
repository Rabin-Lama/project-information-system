-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2017 at 04:17 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_information_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `department` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department`) VALUES
(3, 'Software'),
(4, 'Account'),
(5, 'Marketing'),
(6, 'Sales'),
(7, 'Customer Relation'),
(8, 'Quality Assurance');

-- --------------------------------------------------------

--
-- Table structure for table `departments_in_projects`
--

CREATE TABLE `departments_in_projects` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `job_title_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `full_name` varchar(99) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `marital_status` varchar(10) NOT NULL,
  `current_city` varchar(99) NOT NULL,
  `phone` bigint(11) NOT NULL,
  `email` varchar(99) NOT NULL,
  `joined_date` date NOT NULL,
  `employment_status` varchar(99) NOT NULL,
  `salary` int(11) NOT NULL,
  `username` varchar(99) NOT NULL,
  `password` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `job_title_id`, `department_id`, `full_name`, `dob`, `gender`, `marital_status`, `current_city`, `phone`, `email`, `joined_date`, `employment_status`, `salary`, `username`, `password`) VALUES
(2, 10, 3, 'Rabin Lama', '1993-10-10', 'male', 'single', 'kathmandu', 9840012223, 'rrabin.llama@gmail.com', '2017-06-01', 'full time permanent', 90000, 'rabin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

CREATE TABLE `issues` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `created_by` varchar(99) NOT NULL,
  `assignee` varchar(99) NOT NULL,
  `subject` text NOT NULL,
  `description` text NOT NULL,
  `status` varchar(15) NOT NULL,
  `priority` varchar(15) NOT NULL,
  `start_date` date NOT NULL,
  `due_date` date NOT NULL,
  `estimated_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issues`
--

INSERT INTO `issues` (`id`, `project_id`, `created_by`, `assignee`, `subject`, `description`, `status`, `priority`, `start_date`, `due_date`, `estimated_time`) VALUES
(5, 11, 'Rabin Lama', 'new', 'dasd', '<p>dasd</p>\r\n', 'waiting', 'low', '2017-06-25', '2017-06-29', 0),
(6, 11, 'Rabin Lama', 'new', 'dfsdf', '<p>sfasdf</p>\r\n', 'in progress', 'normal', '2017-06-05', '2017-06-07', 0);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `item_name` varchar(999) NOT NULL,
  `income` int(11) NOT NULL,
  `expense` int(11) NOT NULL,
  `date` date NOT NULL,
  `gain` int(11) NOT NULL,
  `loss` int(11) NOT NULL,
  `is_active` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `job_titles`
--

CREATE TABLE `job_titles` (
  `id` int(11) NOT NULL,
  `dep_id` int(11) NOT NULL,
  `job_title` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_titles`
--

INSERT INTO `job_titles` (`id`, `dep_id`, `job_title`) VALUES
(10, 3, 'Senior Programmer'),
(11, 3, 'Junior Programmer'),
(12, 3, 'Designer'),
(13, 8, 'tester'),
(14, 4, 'senior accountant'),
(17, 7, 'Customer Representative'),
(18, 7, 'Relation Expert');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `project_name` varchar(999) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `project_budget` float NOT NULL,
  `job_title` varchar(99) NOT NULL,
  `department` varchar(99) NOT NULL,
  `assigned_employees` mediumtext NOT NULL,
  `project_description` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_name`, `start_date`, `end_date`, `project_budget`, `job_title`, `department`, `assigned_employees`, `project_description`) VALUES
(11, 'Awesome Project', '2016-01-00', '2017-06-00', 2000000, ' Senior programmer, Junior programmer, Project manager', ' Software, Finance', '', ''),
(12, 'Final Project', '2017-01-00', '2017-04-00', 50000, 'Manager,Director', 'Account,Marketing', '', ''),
(13, 'Rabin\'s project', '2017-01-00', '2017-12-00', 20000000, 'ad', 'asd', '', 'asdfasdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments_in_projects`
--
ALTER TABLE `departments_in_projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_title_id` (`job_title_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `issues`
--
ALTER TABLE `issues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `job_titles`
--
ALTER TABLE `job_titles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dep_id` (`dep_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `departments_in_projects`
--
ALTER TABLE `departments_in_projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `issues`
--
ALTER TABLE `issues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `job_titles`
--
ALTER TABLE `job_titles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `departments_in_projects`
--
ALTER TABLE `departments_in_projects`
  ADD CONSTRAINT `departments_in_projects_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `departments_in_projects_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`job_title_id`) REFERENCES `job_titles` (`id`),
  ADD CONSTRAINT `employees_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`);

--
-- Constraints for table `issues`
--
ALTER TABLE `issues`
  ADD CONSTRAINT `issues_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);

--
-- Constraints for table `job_titles`
--
ALTER TABLE `job_titles`
  ADD CONSTRAINT `job_titles_ibfk_1` FOREIGN KEY (`dep_id`) REFERENCES `departments` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
