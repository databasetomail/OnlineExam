-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2017 at 11:04 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_online_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_question`
--

CREATE TABLE `tbl_question` (
  `question_id` int(5) NOT NULL,
  `question_no` int(2) NOT NULL,
  `question_details` varchar(255) NOT NULL,
  `mark` int(2) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `set_id` int(3) NOT NULL,
  `created_by` int(6) NOT NULL,
  `created_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_question`
--

INSERT INTO `tbl_question` (`question_id`, `question_no`, `question_details`, `mark`, `answer`, `set_id`, `created_by`, `created_time`) VALUES
(3, 1, 'আমাদের দেশের নাম কি?', 0, 'বাংলাদেশ', 5, 9, '2017-04-08 09:34:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_question_set`
--

CREATE TABLE `tbl_question_set` (
  `set_id` int(3) NOT NULL,
  `exam_name` varchar(10) NOT NULL,
  `subject_name` varchar(50) NOT NULL,
  `set_name` varchar(20) NOT NULL,
  `time` int(3) NOT NULL,
  `full_marks` int(3) NOT NULL,
  `created_by` int(6) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_question_set`
--

INSERT INTO `tbl_question_set` (`set_id`, `exam_name`, `subject_name`, `set_name`, `time`, `full_marks`, `created_by`, `create_time`) VALUES
(5, 'বার্ষিক', 'বাংলা ১ম পত্র', 'জবা', 0, 0, 9, '2017-04-08 03:26:29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `student_id` int(3) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `m_name` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(6) NOT NULL,
  `pre_add` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `religion` varchar(10) NOT NULL,
  `per_add` varchar(255) NOT NULL,
  `ins_name` varchar(50) NOT NULL,
  `class` varchar(20) NOT NULL,
  `group_name` varchar(10) NOT NULL,
  `batch` varchar(5) NOT NULL,
  `roll_no` int(6) NOT NULL,
  `session` varchar(9) NOT NULL,
  `email` varchar(50) NOT NULL,
  `version` varchar(8) NOT NULL,
  `reg_no` int(8) NOT NULL,
  `password` varchar(32) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `last_login_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`student_id`, `student_name`, `f_name`, `m_name`, `dob`, `gender`, `pre_add`, `photo`, `religion`, `per_add`, `ins_name`, `class`, `group_name`, `batch`, `roll_no`, `session`, `email`, `version`, `reg_no`, `password`, `mobile`, `last_login_time`) VALUES
(12, '', '', '', '0000-00-00', 'male', '', '', '----- সিলে', '', '', '----- সিলেক্ট করুন -', 'science', '-----', 13, '----- সিল', 'prodipnabab@gmail.com', 'bangla', 0, '25d55ad283aa400af464c76d713c07ad', '01943730421', '2017-04-08 09:17:40'),
(13, 'prodip nabab', 'Bisho Nabab', 'Molina Nabab', '1995-11-01', 'male', 'Mogbazer', '', 'খ্রিষ্টান', 'Mujibnagar', 'Dhaka International University', '----- সিলেক্ট করুন -', 'science', '৩১', 13, '২০১৩-১৪', 'prodipnabab@gmail.com', 'english', 275073, '25d55ad283aa400af464c76d713c07ad', '01943730421', '2017-04-08 09:19:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacher`
--

CREATE TABLE `tbl_teacher` (
  `teacher_id` int(3) NOT NULL,
  `examiner_id` int(4) NOT NULL,
  `examiner_name` varchar(50) NOT NULL,
  `examiner_mobile` varchar(11) NOT NULL,
  `password` varchar(32) NOT NULL,
  `last_login_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_teacher`
--

INSERT INTO `tbl_teacher` (`teacher_id`, `examiner_id`, `examiner_name`, `examiner_mobile`, `password`, `last_login_time`) VALUES
(9, 13, 'Prodip', '01943730421', '25d55ad283aa400af464c76d713c07ad', '2017-04-08 09:21:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_question`
--
ALTER TABLE `tbl_question`
  ADD PRIMARY KEY (`question_id`),
  ADD UNIQUE KEY `question_no` (`question_no`);

--
-- Indexes for table `tbl_question_set`
--
ALTER TABLE `tbl_question_set`
  ADD PRIMARY KEY (`set_id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `reg_no` (`reg_no`,`roll_no`);

--
-- Indexes for table `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  ADD PRIMARY KEY (`teacher_id`),
  ADD UNIQUE KEY `examiner_id` (`examiner_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_question`
--
ALTER TABLE `tbl_question`
  MODIFY `question_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_question_set`
--
ALTER TABLE `tbl_question_set`
  MODIFY `set_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `student_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  MODIFY `teacher_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
