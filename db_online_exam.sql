-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2017 at 05:38 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

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
-- Stand-in structure for view `result_view`
-- (See below for the actual view)
--
CREATE TABLE `result_view` (
`id` int(9)
,`set_id` int(11)
,`student_id` int(11)
,`ache_marks` double
,`time` timestamp
,`exam_id` varchar(50)
,`set_name` varchar(255)
,`full_marks` double
,`mark_minus` double
,`subject_name` varchar(255)
,`exam_name` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_help`
--

CREATE TABLE `tbl_help` (
  `help_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message_details` varchar(2000) NOT NULL,
  `help_status` tinyint(1) NOT NULL DEFAULT '1',
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notice_data`
--

CREATE TABLE `tbl_notice_data` (
  `notice_id` int(9) NOT NULL,
  `notice_detials` varchar(255) NOT NULL,
  `notice_type` int(2) NOT NULL,
  `upload_file` varchar(2000) NOT NULL,
  `status` int(1) DEFAULT '0',
  `upload_by` int(9) NOT NULL,
  `upload_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_notice_data`
--

INSERT INTO `tbl_notice_data` (`notice_id`, `notice_detials`, `notice_type`, `upload_file`, `status`, `upload_by`, `upload_date`) VALUES
(1, 'dslkjflkdsjlk', 1, '404', 0, 1, '2017-10-20 22:26:44'),
(2, 'clck;dskfsd;', 1, '404.jpg', 0, 1, '2017-10-20 22:27:14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_question`
--

CREATE TABLE `tbl_question` (
  `question_id` int(11) NOT NULL,
  `question_details` varchar(255) NOT NULL,
  `mark` double NOT NULL,
  `answer` varchar(255) NOT NULL,
  `set_id` int(9) NOT NULL,
  `created_by` int(9) NOT NULL,
  `created_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_question`
--

INSERT INTO `tbl_question` (`question_id`, `question_details`, `mark`, `answer`, `set_id`, `created_by`, `created_time`) VALUES
(22, 'আমাদের দেশের নাম কী?', 1, 'বাংলাদেশ', 10, 1, '2017-10-21 00:19:03'),
(23, 'ঢাকা কোন নদীর তীরে অবস্থিত?', 1, 'বুড়িগঙ্গা', 10, 1, '2017-10-21 00:19:23'),
(24, 'বাংলাদেশে ----- টি জেলা আছে। (অংকে লিখ)', 1, '৬৪', 10, 1, '2017-10-21 00:19:36'),
(25, 'বুড়িগঙ্গা কিসের নাম?', 1, 'নদীর', 10, 1, '2017-10-21 00:19:49'),
(26, 'বাংলাদেশের রাজধানীর নাম কী?', 1, 'ঢাকা', 10, 1, '2017-10-21 00:20:03'),
(27, 'বাংলাদেশে প্রথম আদমশুমারী অনুষ্ঠিত হয় কত সালে?', 1, '১৯৭৪', 11, 1, '2017-10-21 17:25:19'),
(28, 'ভারতের------টি ছিটমহল বাংলাদেশের ভৌগলিক সীমার মধ্যে অন্তর্ভুক্ত।', 1, '১১১', 11, 1, '2017-10-21 17:26:16'),
(29, 'অগ্নিস্বর কোন ফসলের উন্নত জাত?', 1, 'কলা', 11, 1, '2017-10-21 17:27:15'),
(30, 'বাংলাদেশের ------- টি বৃহত্তর জেলা আছে?', 1, '১৯', 11, 1, '2017-10-21 17:28:12'),
(31, 'নাল ও ভয়েড এর পরিভাষা-', 1, 'বাতিল', 11, 1, '2017-10-21 17:29:05'),
(32, 'বাংলা বর্ণমালায় অর্ধমাত্রা বর্ণ ------- টি।', 1, '৮', 11, 1, '2017-10-21 17:29:50'),
(33, 'কোন রাষ্ট্র সর্বাধিক রাষ্ট্রের সাথে সীমান্তযুক্ত?', 1, 'চীন', 11, 1, '2017-10-21 17:30:47'),
(34, 'আলেপ্পো শহর কোন দেশে অবস্থিত?', 1, 'সিরিয়া', 11, 1, '2017-10-21 17:31:18'),
(35, 'সার্ক ------- সালে প্রতিষ্ঠত হয়?', 1, '১৯৮৫', 11, 1, '2017-10-21 17:31:55'),
(36, 'সমাধান কর: ২ + ৩ - ৪ * ৬ /২', 1, '৩', 11, 1, '2017-10-21 17:33:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_question_set`
--

CREATE TABLE `tbl_question_set` (
  `set_id` int(9) NOT NULL,
  `exam_name` varchar(255) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `set_name` varchar(255) NOT NULL,
  `time` int(3) NOT NULL,
  `total_question` int(3) NOT NULL,
  `full_marks` double NOT NULL,
  `mark_minus` double DEFAULT NULL,
  `created_by` int(9) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_question_set`
--

INSERT INTO `tbl_question_set` (`set_id`, `exam_name`, `subject_name`, `set_name`, `time`, `total_question`, `full_marks`, `mark_minus`, `created_by`, `create_time`) VALUES
(10, 'সাধারণ জ্ঞান', 'বাংলাদেশ', 'লতা', 5, 5, 5, 0.5, 1, '2017-10-20 18:18:44'),
(11, 'শিক্ষক নিবন্ধন', 'কম্পিউটার', 'বিলগেটস্', 10, 10, 10, 0.25, 1, '2017-10-21 11:18:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_result`
--

CREATE TABLE `tbl_result` (
  `id` int(9) NOT NULL,
  `set_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `ache_marks` double NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `exam_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_result`
--

INSERT INTO `tbl_result` (`id`, `set_id`, `student_id`, `ache_marks`, `time`, `exam_id`) VALUES
(1, 10, 1, 2.5, '2017-10-22 17:03:41', 'exm_59eccf6d0ab89'),
(2, 10, 1, 5, '2017-10-22 17:08:05', 'exm_59ecd07530dee'),
(3, 10, 1, 0, '2017-10-22 17:47:35', 'exm_59ecd9b78a293'),
(4, 10, 1, 1, '2017-10-22 18:11:01', 'exm_59ecdf350937d'),
(5, 10, 1, 5, '2017-10-22 18:14:48', 'exm_59ece01826b59'),
(6, 10, 1, 5, '2017-10-22 18:18:39', 'exm_59ece0ff9e0bd'),
(7, 10, 1, 1, '2017-10-22 18:20:43', 'exm_59ece17b291b4'),
(8, 10, 1, 1, '2017-10-22 18:21:50', 'exm_59ece1bed133a'),
(9, 10, 1, 3, '2017-10-22 18:29:42', 'exm_59ece396c8779'),
(10, 10, 1, 5, '2017-10-22 18:48:52', 'exm_59ece81412955'),
(11, 10, 1, 2, '2017-10-22 18:54:49', 'exm_59ece979120d4'),
(12, 10, 1, 1, '2017-10-22 19:01:24', 'exm_59eceb0445d4d'),
(13, 10, 1, 1, '2017-10-22 19:02:11', 'exm_59eceb333b1bf'),
(14, 10, 1, 1, '2017-10-22 19:03:23', 'exm_59eceb7b3d7bc'),
(15, 10, 1, 2, '2017-10-22 19:05:58', 'exm_59ecec1621605'),
(16, 10, 1, 0, '2017-10-22 19:07:42', 'exm_59ecec7ea42eb'),
(17, 10, 1, 5, '2017-10-22 19:08:28', 'exm_59ececacace4b'),
(18, 10, 1, 2, '2017-10-22 19:20:26', 'exm_59ecef7a036c6'),
(19, 10, 1, 5, '2017-10-23 16:31:51', 'exm_59ee1977e9d7d'),
(20, 10, 1, 5, '2017-10-23 16:33:28', 'exm_59ee19d8d33a6'),
(21, 10, 1, -1, '2017-10-23 16:37:28', 'exm_59ee1ac87d328'),
(22, 10, 1, 0, '2017-10-23 16:42:52', 'exm_59ee1c0cc0174'),
(23, 10, 1, 0, '2017-11-17 03:40:38', 'exm_5a0e5a36d2333'),
(24, 10, 1, 0, '2017-11-17 03:44:26', 'exm_5a0e5b1a57720'),
(25, 10, 1, 0, '2017-11-17 03:44:38', 'exm_5a0e5b26c8d46'),
(26, 10, 1, 5, '2017-11-17 04:09:04', 'exm_5a0e60e0937fa');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `student_id` int(9) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `m_name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(6) NOT NULL,
  `pre_add` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `religion` varchar(10) NOT NULL,
  `per_add` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `reg_no` int(9) NOT NULL,
  `password` varchar(32) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `ac_create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`student_id`, `student_name`, `f_name`, `m_name`, `dob`, `gender`, `pre_add`, `photo`, `religion`, `per_add`, `email`, `reg_no`, `password`, `mobile`, `ac_create_date`) VALUES
(1, 'মো: রাশেদুল হক', 'মো: জহুরুল হক', 'মোছা: মোসলেমা খাতুন', '1995-10-30', 'Male', '২৬/৮, শের শাহ্ শুরী রোড, মোহা্ম্মদপুর, ঢাকা-১২০৭।', 'User_20171.jpg', 'Islam', 'গ্রাম- জোত সাতনালা (ফকিরপাড়া), ডাকঘর- ঘন্টাঘর হাট-৫২৪০, উপজেলা- চিরিরবন্দর, জেলা- দিনাজপুর।', 'databasetomail@gmail.com', 20171, 'a8b41b3de3ab801799cd83e2e2e4e3a6', '01738236086', '2017-10-20 02:10:22'),
(2, 'Rashed', '', '', '0000-00-00', 'Male', '', 'No_Photo', '----- সিলে', '', 'HJK@GMAIL.COM', 20172, '1b529385e54f6a9305cea3da59ac37f8', '0190000000', '2017-10-20 10:50:54'),
(3, 'মো: রাশেদুল হক', '', '', '0000-00-00', 'Male', '', 'No_Photo', '----- সিলে', '', 'prodipnabab@gmail.com', 20173, 'a8b41b3de3ab801799cd83e2e2e4e3a6', '01700000000', '2017-10-21 17:38:29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacher`
--

CREATE TABLE `tbl_teacher` (
  `teacher_id` int(9) NOT NULL,
  `examiner_id` int(9) NOT NULL,
  `examiner_name` varchar(255) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `m_name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(6) NOT NULL,
  `pre_add` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `religion` varchar(10) NOT NULL,
  `per_add` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `password` varchar(32) NOT NULL,
  `ac_create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_teacher`
--

INSERT INTO `tbl_teacher` (`teacher_id`, `examiner_id`, `examiner_name`, `f_name`, `m_name`, `dob`, `gender`, `pre_add`, `photo`, `religion`, `per_add`, `email`, `mobile`, `password`, `ac_create_date`) VALUES
(1, 20201, 'মো: রাশেদুল হক', 'মো: জহুরুল হক', 'মোছা: মোসলেমা খাতুন', '1995-10-30', 'Male', '২৬/৮, শের শাহ্ শুরী রোড, মোহাম্মদপুর, ঢাকা-১২০৭।', 'Teacher_20201.jpg', 'Islam', 'গ্রাম- জোত সাতনালা (ফকিরপাড়া), ডাকঘর- ঘন্টারঘর হাট-৫২৪১, উপজেলা- চিরিরবন্দর, জেলা- দিনাজপুর।', 'databasetomail@gmail.com', '01738236086', 'a8b41b3de3ab801799cd83e2e2e4e3a6', '2017-10-20 02:16:27'),
(2, 20202, 'iljui', '', '', '0000-00-00', 'Male', '', 'No_Photo', '----- সিলে', '', 'jlj@gjk.com', '0190000000', 'b47080ddaa0f15ddd6f8ca54e8739991', '2017-10-20 10:54:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_answer`
--

CREATE TABLE `tbl_user_answer` (
  `id` int(11) NOT NULL,
  `set_id` int(9) NOT NULL,
  `question_id` int(11) NOT NULL,
  `exam_id` varchar(50) NOT NULL,
  `user_answer` varchar(255) NOT NULL,
  `single_question_marks` double NOT NULL,
  `student_id` int(9) NOT NULL,
  `date_tme` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user_answer`
--

INSERT INTO `tbl_user_answer` (`id`, `set_id`, `question_id`, `exam_id`, `user_answer`, `single_question_marks`, `student_id`, `date_tme`) VALUES
(1, 10, 22, 'exm_59eccf6d0ab89', 'বাংলাদেশ', 1, 1, '2017-10-22 23:03:41'),
(2, 10, 23, 'exm_59eccf6d0ab89', 'বুড়িগঙ্গা', 1, 1, '2017-10-22 23:03:41'),
(3, 10, 24, 'exm_59eccf6d0ab89', 'বুড়িগঙ্গা', -0.5, 1, '2017-10-22 23:03:41'),
(4, 10, 25, 'exm_59eccf6d0ab89', 'নদীর', 1, 1, '2017-10-22 23:03:41'),
(5, 10, 26, 'exm_59eccf6d0ab89', '', 0, 1, '2017-10-22 23:03:41'),
(6, 10, 22, 'exm_59ecd07530dee', 'বাংলাদেশ', 1, 1, '2017-10-22 23:08:05'),
(7, 10, 23, 'exm_59ecd07530dee', 'বুড়িগঙ্গা', 1, 1, '2017-10-22 23:08:05'),
(8, 10, 24, 'exm_59ecd07530dee', '৬৪', 1, 1, '2017-10-22 23:08:05'),
(9, 10, 25, 'exm_59ecd07530dee', 'নদীর', 1, 1, '2017-10-22 23:08:05'),
(10, 10, 26, 'exm_59ecd07530dee', 'ঢাকা', 1, 1, '2017-10-22 23:08:05'),
(11, 10, 22, 'exm_59ecd9b78a293', '', 0, 1, '2017-10-22 23:47:35'),
(12, 10, 23, 'exm_59ecd9b78a293', '', 0, 1, '2017-10-22 23:47:35'),
(13, 10, 24, 'exm_59ecd9b78a293', '', 0, 1, '2017-10-22 23:47:35'),
(14, 10, 25, 'exm_59ecd9b78a293', '', 0, 1, '2017-10-22 23:47:35'),
(15, 10, 26, 'exm_59ecd9b78a293', '', 0, 1, '2017-10-22 23:47:35'),
(16, 10, 22, 'exm_59ecdf350937d', 'বাংলাদেশ', 1, 1, '2017-10-23 00:11:01'),
(17, 10, 23, 'exm_59ecdf350937d', '', 0, 1, '2017-10-23 00:11:01'),
(18, 10, 24, 'exm_59ecdf350937d', '', 0, 1, '2017-10-23 00:11:01'),
(19, 10, 25, 'exm_59ecdf350937d', '', 0, 1, '2017-10-23 00:11:01'),
(20, 10, 26, 'exm_59ecdf350937d', '', 0, 1, '2017-10-23 00:11:01'),
(21, 10, 22, 'exm_59ece01826b59', 'বাংলাদেশ', 1, 1, '2017-10-23 00:14:48'),
(22, 10, 23, 'exm_59ece01826b59', 'বুড়িগঙ্গা', 1, 1, '2017-10-23 00:14:48'),
(23, 10, 24, 'exm_59ece01826b59', '৬৪', 1, 1, '2017-10-23 00:14:48'),
(24, 10, 25, 'exm_59ece01826b59', 'নদীর', 1, 1, '2017-10-23 00:14:48'),
(25, 10, 26, 'exm_59ece01826b59', 'ঢাকা', 1, 1, '2017-10-23 00:14:48'),
(26, 10, 22, 'exm_59ece0ff9e0bd', 'বাংলাদেশ', 1, 1, '2017-10-23 00:18:39'),
(27, 10, 23, 'exm_59ece0ff9e0bd', 'বুড়িগঙ্গা', 1, 1, '2017-10-23 00:18:39'),
(28, 10, 24, 'exm_59ece0ff9e0bd', '৬৪', 1, 1, '2017-10-23 00:18:39'),
(29, 10, 25, 'exm_59ece0ff9e0bd', 'নদীর', 1, 1, '2017-10-23 00:18:39'),
(30, 10, 26, 'exm_59ece0ff9e0bd', 'ঢাকা', 1, 1, '2017-10-23 00:18:39'),
(31, 10, 22, 'exm_59ece17b291b4', 'বাংলাদেশ', 1, 1, '2017-10-23 00:20:43'),
(32, 10, 23, 'exm_59ece17b291b4', '', 0, 1, '2017-10-23 00:20:43'),
(33, 10, 24, 'exm_59ece17b291b4', '', 0, 1, '2017-10-23 00:20:43'),
(34, 10, 25, 'exm_59ece17b291b4', '', 0, 1, '2017-10-23 00:20:43'),
(35, 10, 26, 'exm_59ece17b291b4', '', 0, 1, '2017-10-23 00:20:43'),
(36, 10, 22, 'exm_59ece1bed133a', 'বাংলাদেশ', 1, 1, '2017-10-23 00:21:50'),
(37, 10, 23, 'exm_59ece1bed133a', '', 0, 1, '2017-10-23 00:21:50'),
(38, 10, 24, 'exm_59ece1bed133a', '', 0, 1, '2017-10-23 00:21:50'),
(39, 10, 25, 'exm_59ece1bed133a', '', 0, 1, '2017-10-23 00:21:50'),
(40, 10, 26, 'exm_59ece1bed133a', '', 0, 1, '2017-10-23 00:21:50'),
(41, 10, 22, 'exm_59ece396c8779', 'বাংলাদেশ', 1, 1, '2017-10-23 00:29:42'),
(42, 10, 23, 'exm_59ece396c8779', 'বুড়িগঙ্গা', 1, 1, '2017-10-23 00:29:42'),
(43, 10, 24, 'exm_59ece396c8779', '৬৪', 1, 1, '2017-10-23 00:29:42'),
(44, 10, 25, 'exm_59ece396c8779', '', 0, 1, '2017-10-23 00:29:42'),
(45, 10, 26, 'exm_59ece396c8779', '', 0, 1, '2017-10-23 00:29:42'),
(46, 10, 22, 'exm_59ece81412955', 'বাংলাদেশ', 1, 1, '2017-10-23 00:48:52'),
(47, 10, 23, 'exm_59ece81412955', 'বুড়িগঙ্গা', 1, 1, '2017-10-23 00:48:52'),
(48, 10, 24, 'exm_59ece81412955', '৬৪', 1, 1, '2017-10-23 00:48:52'),
(49, 10, 25, 'exm_59ece81412955', 'নদীর', 1, 1, '2017-10-23 00:48:52'),
(50, 10, 26, 'exm_59ece81412955', 'ঢাকা', 1, 1, '2017-10-23 00:48:52'),
(51, 10, 22, 'exm_59ece979120d4', 'বাংলাদেশ', 1, 1, '2017-10-23 00:54:49'),
(52, 10, 23, 'exm_59ece979120d4', 'বুড়িগঙ্গা', 1, 1, '2017-10-23 00:54:49'),
(53, 10, 24, 'exm_59ece979120d4', '', 0, 1, '2017-10-23 00:54:49'),
(54, 10, 25, 'exm_59ece979120d4', '', 0, 1, '2017-10-23 00:54:49'),
(55, 10, 26, 'exm_59ece979120d4', '', 0, 1, '2017-10-23 00:54:49'),
(56, 10, 22, 'exm_59eceb0445d4d', 'বাংলাদেশ', 1, 1, '2017-10-23 01:01:24'),
(57, 10, 23, 'exm_59eceb0445d4d', '', 0, 1, '2017-10-23 01:01:24'),
(58, 10, 24, 'exm_59eceb0445d4d', '', 0, 1, '2017-10-23 01:01:24'),
(59, 10, 25, 'exm_59eceb0445d4d', '', 0, 1, '2017-10-23 01:01:24'),
(60, 10, 26, 'exm_59eceb0445d4d', '', 0, 1, '2017-10-23 01:01:24'),
(61, 10, 22, 'exm_59eceb333b1bf', 'বাংলাদেশ', 1, 1, '2017-10-23 01:02:11'),
(62, 10, 23, 'exm_59eceb333b1bf', '', 0, 1, '2017-10-23 01:02:11'),
(63, 10, 24, 'exm_59eceb333b1bf', '', 0, 1, '2017-10-23 01:02:11'),
(64, 10, 25, 'exm_59eceb333b1bf', '', 0, 1, '2017-10-23 01:02:11'),
(65, 10, 26, 'exm_59eceb333b1bf', '', 0, 1, '2017-10-23 01:02:11'),
(66, 10, 22, 'exm_59eceb7b3d7bc', 'বাংলাদেশ', 1, 1, '2017-10-23 01:03:23'),
(67, 10, 23, 'exm_59eceb7b3d7bc', '', 0, 1, '2017-10-23 01:03:23'),
(68, 10, 24, 'exm_59eceb7b3d7bc', '', 0, 1, '2017-10-23 01:03:23'),
(69, 10, 25, 'exm_59eceb7b3d7bc', '', 0, 1, '2017-10-23 01:03:23'),
(70, 10, 26, 'exm_59eceb7b3d7bc', '', 0, 1, '2017-10-23 01:03:23'),
(71, 10, 22, 'exm_59ecec1621605', 'বাংলাদেশ', 1, 1, '2017-10-23 01:05:58'),
(72, 10, 23, 'exm_59ecec1621605', 'বুড়িগঙ্গা', 1, 1, '2017-10-23 01:05:58'),
(73, 10, 24, 'exm_59ecec1621605', '', 0, 1, '2017-10-23 01:05:58'),
(74, 10, 25, 'exm_59ecec1621605', '', 0, 1, '2017-10-23 01:05:58'),
(75, 10, 26, 'exm_59ecec1621605', '', 0, 1, '2017-10-23 01:05:58'),
(76, 10, 22, 'exm_59ecec7ea42eb', '', 0, 1, '2017-10-23 01:07:42'),
(77, 10, 23, 'exm_59ecec7ea42eb', '', 0, 1, '2017-10-23 01:07:42'),
(78, 10, 24, 'exm_59ecec7ea42eb', '', 0, 1, '2017-10-23 01:07:42'),
(79, 10, 25, 'exm_59ecec7ea42eb', '', 0, 1, '2017-10-23 01:07:42'),
(80, 10, 26, 'exm_59ecec7ea42eb', '', 0, 1, '2017-10-23 01:07:42'),
(81, 10, 22, 'exm_59ececacace4b', 'বাংলাদেশ', 1, 1, '2017-10-23 01:08:28'),
(82, 10, 23, 'exm_59ececacace4b', 'বুড়িগঙ্গা', 1, 1, '2017-10-23 01:08:28'),
(83, 10, 24, 'exm_59ececacace4b', '৬৪', 1, 1, '2017-10-23 01:08:28'),
(84, 10, 25, 'exm_59ececacace4b', 'নদীর', 1, 1, '2017-10-23 01:08:28'),
(85, 10, 26, 'exm_59ececacace4b', 'ঢাকা', 1, 1, '2017-10-23 01:08:28'),
(86, 10, 22, 'exm_59ecef7a036c6', 'বাংলাদেশ', 1, 1, '2017-10-23 01:20:26'),
(87, 10, 23, 'exm_59ecef7a036c6', 'বুড়িগঙ্গা', 1, 1, '2017-10-23 01:20:26'),
(88, 10, 24, 'exm_59ecef7a036c6', '', 0, 1, '2017-10-23 01:20:26'),
(89, 10, 25, 'exm_59ecef7a036c6', '', 0, 1, '2017-10-23 01:20:26'),
(90, 10, 26, 'exm_59ecef7a036c6', '', 0, 1, '2017-10-23 01:20:26'),
(91, 10, 22, 'exm_59ee1977e9d7d', 'বাংলাদেশ', 1, 1, '2017-10-23 22:31:52'),
(92, 10, 23, 'exm_59ee1977e9d7d', 'বুড়িগঙ্গা', 1, 1, '2017-10-23 22:31:52'),
(93, 10, 24, 'exm_59ee1977e9d7d', '৬৪', 1, 1, '2017-10-23 22:31:52'),
(94, 10, 25, 'exm_59ee1977e9d7d', 'নদীর', 1, 1, '2017-10-23 22:31:52'),
(95, 10, 26, 'exm_59ee1977e9d7d', 'ঢাকা', 1, 1, '2017-10-23 22:31:52'),
(96, 10, 22, 'exm_59ee19d8d33a6', 'বাংলাদেশ', 1, 1, '2017-10-23 22:33:28'),
(97, 10, 23, 'exm_59ee19d8d33a6', 'বুড়িগঙ্গা', 1, 1, '2017-10-23 22:33:28'),
(98, 10, 24, 'exm_59ee19d8d33a6', '৬৪', 1, 1, '2017-10-23 22:33:28'),
(99, 10, 25, 'exm_59ee19d8d33a6', 'নদীর', 1, 1, '2017-10-23 22:33:28'),
(100, 10, 26, 'exm_59ee19d8d33a6', 'ঢাকা', 1, 1, '2017-10-23 22:33:28'),
(101, 10, 22, 'exm_59ee1ac87d328', '৬৪', -0.5, 1, '2017-10-23 22:37:28'),
(102, 10, 23, 'exm_59ee1ac87d328', 'বুড়িগঙ্গা', 1, 1, '2017-10-23 22:37:28'),
(103, 10, 24, 'exm_59ee1ac87d328', 'বুড়িগঙ্গা', -0.5, 1, '2017-10-23 22:37:28'),
(104, 10, 25, 'exm_59ee1ac87d328', 'ঢাকা', -0.5, 1, '2017-10-23 22:37:28'),
(105, 10, 26, 'exm_59ee1ac87d328', 'নদীর', -0.5, 1, '2017-10-23 22:37:28'),
(106, 10, 22, 'exm_59ee1c0cc0174', '', 0, 1, '2017-10-23 22:42:52'),
(107, 10, 23, 'exm_59ee1c0cc0174', '', 0, 1, '2017-10-23 22:42:52'),
(108, 10, 24, 'exm_59ee1c0cc0174', '', 0, 1, '2017-10-23 22:42:52'),
(109, 10, 25, 'exm_59ee1c0cc0174', '', 0, 1, '2017-10-23 22:42:52'),
(110, 10, 26, 'exm_59ee1c0cc0174', '', 0, 1, '2017-10-23 22:42:52'),
(111, 10, 22, 'exm_5a0e5a36d2333', '', 0, 1, '2017-11-17 09:40:38'),
(112, 10, 23, 'exm_5a0e5a36d2333', '', 0, 1, '2017-11-17 09:40:38'),
(113, 10, 24, 'exm_5a0e5a36d2333', '', 0, 1, '2017-11-17 09:40:38'),
(114, 10, 25, 'exm_5a0e5a36d2333', '', 0, 1, '2017-11-17 09:40:38'),
(115, 10, 26, 'exm_5a0e5a36d2333', '', 0, 1, '2017-11-17 09:40:38'),
(116, 10, 22, 'exm_5a0e5b1a57720', '', 0, 1, '2017-11-17 09:44:26'),
(117, 10, 23, 'exm_5a0e5b1a57720', '', 0, 1, '2017-11-17 09:44:26'),
(118, 10, 24, 'exm_5a0e5b1a57720', '', 0, 1, '2017-11-17 09:44:26'),
(119, 10, 25, 'exm_5a0e5b1a57720', '', 0, 1, '2017-11-17 09:44:26'),
(120, 10, 26, 'exm_5a0e5b1a57720', '', 0, 1, '2017-11-17 09:44:26'),
(121, 10, 22, 'exm_5a0e5b26c8d46', '', 0, 1, '2017-11-17 09:44:38'),
(122, 10, 23, 'exm_5a0e5b26c8d46', '', 0, 1, '2017-11-17 09:44:38'),
(123, 10, 24, 'exm_5a0e5b26c8d46', '', 0, 1, '2017-11-17 09:44:38'),
(124, 10, 25, 'exm_5a0e5b26c8d46', '', 0, 1, '2017-11-17 09:44:38'),
(125, 10, 26, 'exm_5a0e5b26c8d46', '', 0, 1, '2017-11-17 09:44:38'),
(126, 10, 22, 'exm_5a0e60e0937fa', 'বাংলাদেশ', 1, 1, '2017-11-17 10:09:04'),
(127, 10, 23, 'exm_5a0e60e0937fa', 'বুড়িগঙ্গা', 1, 1, '2017-11-17 10:09:04'),
(128, 10, 24, 'exm_5a0e60e0937fa', '৬৪', 1, 1, '2017-11-17 10:09:04'),
(129, 10, 25, 'exm_5a0e60e0937fa', 'নদীর', 1, 1, '2017-11-17 10:09:04'),
(130, 10, 26, 'exm_5a0e60e0937fa', 'ঢাকা', 1, 1, '2017-11-17 10:09:04');

-- --------------------------------------------------------

--
-- Structure for view `result_view`
--
DROP TABLE IF EXISTS `result_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `result_view`  AS  select `tbl_result`.`id` AS `id`,`tbl_result`.`set_id` AS `set_id`,`tbl_result`.`student_id` AS `student_id`,`tbl_result`.`ache_marks` AS `ache_marks`,`tbl_result`.`time` AS `time`,`tbl_result`.`exam_id` AS `exam_id`,`tbl_question_set`.`set_name` AS `set_name`,`tbl_question_set`.`full_marks` AS `full_marks`,`tbl_question_set`.`mark_minus` AS `mark_minus`,`tbl_question_set`.`subject_name` AS `subject_name`,`tbl_question_set`.`exam_name` AS `exam_name` from (`tbl_result` left join `tbl_question_set` on((`tbl_result`.`set_id` = `tbl_question_set`.`set_id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_help`
--
ALTER TABLE `tbl_help`
  ADD PRIMARY KEY (`help_id`);

--
-- Indexes for table `tbl_notice_data`
--
ALTER TABLE `tbl_notice_data`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `tbl_question`
--
ALTER TABLE `tbl_question`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `tbl_question_set`
--
ALTER TABLE `tbl_question_set`
  ADD PRIMARY KEY (`set_id`);

--
-- Indexes for table `tbl_result`
--
ALTER TABLE `tbl_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `reg_no` (`reg_no`),
  ADD UNIQUE KEY `mobile` (`mobile`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  ADD PRIMARY KEY (`teacher_id`),
  ADD UNIQUE KEY `examiner_id` (`examiner_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- Indexes for table `tbl_user_answer`
--
ALTER TABLE `tbl_user_answer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_help`
--
ALTER TABLE `tbl_help`
  MODIFY `help_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_notice_data`
--
ALTER TABLE `tbl_notice_data`
  MODIFY `notice_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_question`
--
ALTER TABLE `tbl_question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `tbl_question_set`
--
ALTER TABLE `tbl_question_set`
  MODIFY `set_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_result`
--
ALTER TABLE `tbl_result`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `student_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  MODIFY `teacher_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_user_answer`
--
ALTER TABLE `tbl_user_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
