-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2019 at 12:58 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csepc_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `alumnus`
--

CREATE TABLE `alumnus` (
  `alm_id` varchar(15) NOT NULL,
  `alm_name` varchar(50) NOT NULL,
  `alm_department` varchar(50) NOT NULL,
  `alm_email` varchar(50) NOT NULL,
  `alm_contact_no` varchar(15) NOT NULL,
  `alm_batch_no` int(5) NOT NULL,
  `alm_password` varchar(10) NOT NULL,
  `alm_p_email` varchar(50) NOT NULL,
  `alm_curr_country` varchar(50) NOT NULL,
  `alm_curr_job_pos` varchar(50) NOT NULL,
  `alm_curr_job_organization` varchar(100) NOT NULL,
  `alm_curr_study` varchar(50) NOT NULL,
  `alm_photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alumnus`
--

INSERT INTO `alumnus` (`alm_id`, `alm_name`, `alm_department`, `alm_email`, `alm_contact_no`, `alm_batch_no`, `alm_password`, `alm_p_email`, `alm_curr_country`, `alm_curr_job_pos`, `alm_curr_job_organization`, `alm_curr_study`, `alm_photo`) VALUES
('151-15-226', 'Mehedi Hasan Abid', 'CSE', 'mehedi15-226@diu.edu.bd', '01986534726', 40, 'diu226', 'abid@gmail.com', 'Bangladesh', 'Lecturer', 'Daffodil International University', 'None..', 'profilepictures/Mehedi Hasan Abid.jpg'),
('161-15-836', 'Md Jannatus Saiyem', 'CSE', 'jannatus15-836@diu.edu.bd', '01686670711', 43, 'diu123', 'jsbejoy96@gmail.com', 'Bangladesh', 'Intern', 'ABC Group', 'None', 'profilepictures/Md Jannatus Saiyem.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact_message`
--

CREATE TABLE `contact_message` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_message`
--

INSERT INTO `contact_message` (`id`, `name`, `email`, `subject`, `message`) VALUES
(3, 'Md Jannatus Saiyem', 'jannatus15-836@diu.edu.bd', 'Developers Feedback', 'Initially this website was created for Web Engineering Lab Project. But afterwords this was developed for publishing as a Alumni site for Daffodil International University Permanent Campus. I single handily developed it.  '),
(4, 'Rafat Karim', 'rafat15-867@diu.edu.bd', 'Test', 'This is for testing the insertion at db.');

-- --------------------------------------------------------

--
-- Table structure for table `education_info`
--

CREATE TABLE `education_info` (
  `alm_id` varchar(15) NOT NULL,
  `degree` varchar(50) NOT NULL,
  `degree_name` varchar(100) NOT NULL,
  `institute` varchar(100) NOT NULL,
  `board` varchar(15) NOT NULL,
  `passing_year` int(5) NOT NULL,
  `grade` varchar(10) NOT NULL,
  `cgpa` varchar(5) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `education_info`
--

INSERT INTO `education_info` (`alm_id`, `degree`, `degree_name`, `institute`, `board`, `passing_year`, `grade`, `cgpa`, `remarks`, `id`) VALUES
('151-15-226', 'BSc', 'Computer Science and Engineering', 'Daffodil International University', 'N/A', 2018, 'A', '3.8', '', 2),
('161-15-836', 'SSC', 'Science', 'Safiuddin Sarker Academy & College', 'Dhaka', 2013, 'A', '4.81', '', 3),
('161-15-836', 'HSC', 'Science', 'Safiuddin Sarker Academy & College', 'Dhaka', 2015, 'A', '4.42', '', 4),
('161-15-836', 'BSc', 'Computer Science and Engineering', 'Daffodil International University', 'N/A', 2019, 'A', '3.78', '', 8);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `event_title` varchar(50) NOT NULL,
  `event_date` varchar(20) NOT NULL,
  `event_time` varchar(20) NOT NULL,
  `event_details` varchar(1000) NOT NULL,
  `event_photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_title`, `event_date`, `event_time`, `event_details`, `event_photo`) VALUES
(2, 'Random', '07.05.2019', '10:30 am', '                 There should be proper details of an event.                 ', 'events/Googling Contest.png'),
(3, 'Tech Fashion Show', '2nd April', '11:30 am', 'Venue for this event was Shadhinota Auditorium, Permanent Campus. This was a wonderful event organized by the department of CSE in association with CPC-PC.', 'events/Tech Fashion Show.png');

-- --------------------------------------------------------

--
-- Table structure for table `notice_board`
--

CREATE TABLE `notice_board` (
  `id` int(11) NOT NULL,
  `notice_title` varchar(500) NOT NULL,
  `publish_date` varchar(50) NOT NULL,
  `notice_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice_board`
--

INSERT INTO `notice_board` (`id`, `notice_title`, `publish_date`, `notice_file`) VALUES
(1, 'CPC Committee list with Lead executive 2019', '06/05/2019', 'noticeboard/CPC Committee 2019 with executive lead.pdf'),
(5, 'Take off committee presence', '06/05/2019', 'noticeboard/Take off presence-converted.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `s_id` varchar(15) NOT NULL,
  `s_name` varchar(50) NOT NULL,
  `s_department` varchar(10) NOT NULL,
  `s_email` varchar(50) NOT NULL,
  `s_contact_no` varchar(15) NOT NULL,
  `s_batch_no` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`s_id`, `s_name`, `s_department`, `s_email`, `s_contact_no`, `s_batch_no`) VALUES
('161-15-836', 'Md Jannatus Saiyem', 'CSE', 'jannatus15-836@diu.edu.bd', '01686670711', 43),
('161-15-840', 'Subrota Bashak', 'CSE', 'subrota15-840@diu.edu.bd', '0196454554', 43),
('161-15-854', 'Maksuda', 'CSE', 'maksuda15-854@diu.edu.bd', '0192356843', 43),
('161-15-867', 'Rafat Karim', 'CSE', 'rafat15-867@diu.edu.bd', '0196548277', 43),
('161-15-909', 'Mirza Jalal', 'CSE', 'jalal15-909@diu.edu.bd', '017773745987', 43),
('171-15-1154', 'Abu Tanzin Khan', 'CSE', 'abu15-1154@diu.edu.bd', '0156845674', 46),
('181-15-1832', 'Nabid Hasan', 'CSE', 'nabid15-1832@diu.edu.bd', '0177775646', 49);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alumnus`
--
ALTER TABLE `alumnus`
  ADD PRIMARY KEY (`alm_id`);

--
-- Indexes for table `contact_message`
--
ALTER TABLE `contact_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education_info`
--
ALTER TABLE `education_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice_board`
--
ALTER TABLE `notice_board`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`s_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_message`
--
ALTER TABLE `contact_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `education_info`
--
ALTER TABLE `education_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notice_board`
--
ALTER TABLE `notice_board`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
