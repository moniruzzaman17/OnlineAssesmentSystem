-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- হোষ্ট: 127.0.0.1
-- তৈরী করতে ব্যবহৃত সময়: ডিসে 04, 2018 at 05:30 ???????
-- সার্ভার সংস্করন: 10.1.13-MariaDB
-- পিএইছপির সংস্করন: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- ডাটাবেইজ: `registration_db`
--

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `chapter`
--

CREATE TABLE `chapter` (
  `chapter_id` int(255) NOT NULL,
  `class_name` varchar(50) NOT NULL,
  `sub_code` varchar(255) CHARACTER SET latin1 NOT NULL,
  `chapter_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `chapter`
--

INSERT INTO `chapter` (`chapter_id`, `class_name`, `sub_code`, `chapter_name`) VALUES
(3, 'SSC', '102', 'বাংলা ভাষার উৎপত্তি'),
(4, 'JSC', '101', 'অতিথির স্মৃতি'),
(5, 'JSC', '101', 'ভাব ও কাজ'),
(6, 'JSC', '101', 'বাঙ্গালির বাংলা'),
(10, 'JSC', '101', 'পড়ে পাওয়া'),
(11, 'JSC', '101', 'তৈলচিত্তের ভুত'),
(12, 'JSC', '101', 'এবারের সংগ্রাম সাধিনতার সংগ্রাম'),
(13, 'JSC', '101', 'আমাদের লোকশিল্প'),
(14, 'JSC', '101', 'সুখি মানুষ'),
(16, 'JSC', '101', 'শিল্প কলার নানা দিক'),
(18, 'JSC', '101', 'মংডুর পথে'),
(19, 'JSC', '101', 'বাংলা নববর্ষ'),
(20, 'JSC', '101', 'বাংলা ভাষার জন্মকথা'),
(34, 'JSC', '109', 'প্রথম অধ্যায়ঃ প্যাটার্ন  '),
(35, 'JSC', '109', 'দ্বিতীয় অধ্যায়ঃ মুনাফা'),
(36, 'JSC', '109', 'algebra');

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `class`
--

CREATE TABLE `class` (
  `class_id` int(50) NOT NULL,
  `class_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `class`
--

INSERT INTO `class` (`class_id`, `class_name`) VALUES
(3, 'JSC'),
(4, 'PSC'),
(5, 'SSC');

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `exam_tb`
--

CREATE TABLE `exam_tb` (
  `id` int(11) NOT NULL,
  `exam_id` varchar(11) NOT NULL,
  `user_id` varchar(255) CHARACTER SET latin1 NOT NULL,
  `qid` int(20) NOT NULL,
  `correct_ans` varchar(255) NOT NULL,
  `given_ans` varchar(255) NOT NULL,
  `marks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `exam_tb`
--

INSERT INTO `exam_tb` (`id`, `exam_id`, `user_id`, `qid`, `correct_ans`, `given_ans`, `marks`) VALUES
(1, 'test2319', 'ata123', 3, 'ইলিশ', 'টাকি', 0),
(2, 'test2319', 'ata123', 6, 'কাঁঠাল', 'কাঁঠাল', 1),
(3, 'test2319', 'ata123', 4, 'পান নি', 'পান নি', 1),
(4, 'test2319', 'ata123', 2, 'শাপলা ', 'জবা', 0),
(5, 'test2319', 'ata123', 1, '১৯৯২', '১৯৯২', 1),
(6, 'test2319', 'ata123', 5, '২৬শে মার্চ', '২৬শে মার্চ', 1),
(7, 'test569', 'moon123', 6, 'কাঁঠাল', 'কাঁঠাল', 1),
(8, 'test569', 'moon123', 3, 'ইলিশ', 'ইলিশ', 1),
(9, 'test569', 'moon123', 4, 'পান নি', 'পান নি', 1),
(10, 'test569', 'moon123', 2, 'শাপলা ', 'জবা', 0),
(11, 'test569', 'moon123', 5, '২৬শে মার্চ', '২৬শে মার্চ', 1),
(12, 'test569', 'moon123', 1, '১৯৯২', '১৯৯২', 1),
(13, 'test569', 'moon123', 7, 'ভাবা', 'ভাবা', 1),
(14, 'test1333', 'moon123', 5, '২৬শে মার্চ', '২৬শে মার্চ', 1),
(15, 'test1333', 'moon123', 1, '১৯৯২', '১৯৯২', 1),
(16, 'test1333', 'moon123', 6, 'কাঁঠাল', 'লিচু', 0),
(17, 'test1333', 'moon123', 4, 'পান নি', '১৯৭১', 0),
(18, 'test1333', 'moon123', 3, 'ইলিশ', 'ইলিশ', 1),
(19, 'test1333', 'moon123', 2, 'শাপলা ', 'গোলাপ', 0);

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `student_info`
--

CREATE TABLE `student_info` (
  `student_name` varchar(20) CHARACTER SET latin1 NOT NULL,
  `user_id` varchar(20) CHARACTER SET latin1 NOT NULL,
  `password` varchar(20) CHARACTER SET latin1 NOT NULL,
  `email` varchar(30) CHARACTER SET latin1 NOT NULL,
  `phone` varchar(15) CHARACTER SET latin1 NOT NULL,
  `ins_name` varchar(255) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `status` int(100) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `student_info`
--

INSERT INTO `student_info` (`student_name`, `user_id`, `password`, `email`, `phone`, `ins_name`, `class_name`, `status`) VALUES
('ATAURE RAHAMAN', 'ata123', 'ata123', 'ataur.214@gmail.com', '01799797447', 'iubat University', 'Ten', 1),
('123', 'ata1234', '12345', 'ataur.214@gmail.com', 'gfjejysr', '', '', 1),
('Aakjdf', 'ataur123', '827ccb0eea8a706c4c34', 'ataur.214@gmail.com', '01642994407', '', '', 1),
('hh', 'hhhh', 'hhhh', 'hhh', 'hhh', '', '', 1),
('Md Josim Uddin', 'josim12', 'josim123', 'mdjosimuddin712@gmail.com', '01758903419', 'IUBAT', 'Cse', 0),
('Moniruzzaman', 'moon123', 'moon123', 'monn@gmail.com', '017858958', '', '', 1),
('MD Moniruzzaman', 'moon12345', 'moon123', 'monn@gmail.com', '01642994407', 'IUBAT', 'nine', 1),
('Ata', 'sdff5', '1234', 'ataur.214@gmail.com', '01642994407', '', '', 1),
('josimtakla', 'takla123', 'takla123', 'josim@pagla.com', '01799797447', '', '', 1);

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `subject`
--

CREATE TABLE `subject` (
  `id` int(255) NOT NULL,
  `class_name` varchar(50) NOT NULL,
  `sub_code` varchar(50) CHARACTER SET latin1 NOT NULL,
  `sub_name` varchar(100) NOT NULL,
  `sub_image` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `subject`
--

INSERT INTO `subject` (`id`, `class_name`, `sub_code`, `sub_name`, `sub_image`) VALUES
(1, 'SSC', '101', 'বাংলা প্রথম পত্র', ''),
(2, 'SSC', '102', 'বাংলা দ্বিতীয় পত্র', ''),
(3, 'SSC', '103', 'math', ''),
(4, 'SSC', '104', 'physics', ''),
(5, 'PSC', '105', 'ENGLISG', ''),
(10, 'JSC', '101', 'বাংলা প্রথম পত্র', ''),
(11, 'JSC', '102', 'বাংলা দ্বিতীয় পত্র', ''),
(14, 'JSC', '109', '		গণিত', ''),
(15, 'JSC', '127', 'বিজ্ঞান', ''),
(16, 'JSC', '154', 'তথ্য ও যোগাযোগ প্রযুক্তি', ''),
(17, 'JSC', '150', 'বাংলাদেশ ও বিশ্বপরিচয়', ''),
(18, 'JSC', '111', 'ইসলাম ও নৈতিক শিক্ষা', '');

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `tb_question`
--

CREATE TABLE `tb_question` (
  `qid` int(11) NOT NULL,
  `class_id` varchar(50) NOT NULL,
  `subject_code` varchar(50) NOT NULL,
  `chap_id` varchar(50) NOT NULL,
  `qname` varchar(200) NOT NULL,
  `qans` varchar(200) NOT NULL,
  `opone` varchar(200) NOT NULL,
  `optwo` varchar(200) NOT NULL,
  `opthree` varchar(200) NOT NULL,
  `opfour` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `tb_question`
--

INSERT INTO `tb_question` (`qid`, `class_id`, `subject_code`, `chap_id`, `qname`, `qans`, `opone`, `optwo`, `opthree`, `opfour`) VALUES
(1, '0', '0', '4', 'জসিম\nউদ্দিন এর জন্ম সাল কত', '১৯৯২', '১৯৯২', '১৯৯৯', '১৯৯৮', '১৯৯৩'),
(2, '0', '0', '4', 'বাংলাদেশের জাতীয় ফুলের নাম কি?', 'শাপলা ', 'গোলাপ', 'জবা', 'সরিষা', 'গোলাপ'),
(3, '0', '0', '4', 'বাংলাদেশের জাতীয় মাছ নাম কি?', 'ইলিশ', 'টাকি', 'পুটি', 'ইলিশ', 'তিমি'),
(4, '0', '0', '4', 'জাতীয় কবি কাজী নজরুল ইসলাম কত সালে নোবেল পেয়েছিলেন', 'পান নি', '১৯৮৫', '১৯৭১', '১৯৭২', 'পান নি'),
(5, '0', '0', '4', 'স্বাধীনতা দিবস কবে?', '২৬শে মার্চ', '১৬ ডিসেম্বর', '২১শে ফেব্রুয়ারি', '২৬শে মার্চ', '৭ ই মার্চ'),
(6, '0', '0', '4', 'বাংলাদেশের জাতীয় ফলের নাম কি?', 'কাঁঠাল', 'জাম', 'লিচু', 'কাঁঠাল', 'আম'),
(7, '0', '0', '5', 'ভাব ও কাজ কি?', 'ভাবা', 'কাজা', 'ভাবা ও কাজা', 'ভাবা', 'কিছুই না'),
(8, '3', '101', '6', 'বাংলা ভাষার উৎপত্তি কোন ভাষা থেকে?', 'অপভ্রংশ', 'চর্জাপদ', 'অপভ্রংশ', 'সংস্কৃতি', 'ফার্সি'),
(9, '3', '109', '34', 'সুচক কাকে বলে', '২', '১', '২', '৩', '৪'),
(10, '3', '109', '34', 'গুন মানে কি ', 'বার বার জগ', 'বার বার জগ', 'বার বার ভাগ', 'বার বার জ্ঞুন', 'বার বার বিয়গ'),
(11, '3', '109', '34', '৩+৫', '৮', '৮', '২', '৭', '৬');

--
-- স্তুপকৃত টেবলের ইনডেক্স
--

--
-- টেবিলের ইনডেক্সসমুহ `chapter`
--
ALTER TABLE `chapter`
  ADD PRIMARY KEY (`chapter_id`);

--
-- টেবিলের ইনডেক্সসমুহ `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- টেবিলের ইনডেক্সসমুহ `exam_tb`
--
ALTER TABLE `exam_tb`
  ADD PRIMARY KEY (`id`);

--
-- টেবিলের ইনডেক্সসমুহ `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`user_id`);

--
-- টেবিলের ইনডেক্সসমুহ `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- টেবিলের ইনডেক্সসমুহ `tb_question`
--
ALTER TABLE `tb_question`
  ADD PRIMARY KEY (`qid`);

--
-- স্তুপকৃত টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT)
--

--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `chapter`
--
ALTER TABLE `chapter`
  MODIFY `chapter_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `exam_tb`
--
ALTER TABLE `exam_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `tb_question`
--
ALTER TABLE `tb_question`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
