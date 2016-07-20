-- phpMyAdmin SQL Dump
-- version 4.6.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 20, 2016 at 09:52 AM
-- Server version: 5.5.49-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `socialtrade`
--

-- --------------------------------------------------------

--
-- Table structure for table `sct_address`
--

CREATE TABLE `sct_address` (
  `address_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(225) NOT NULL,
  `city` varchar(250) NOT NULL,
  `state` varchar(250) NOT NULL,
  `country` varchar(250) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sct_admin`
--

CREATE TABLE `sct_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(250) CHARACTER SET latin1 NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `address` varchar(250) CHARACTER SET latin1 NOT NULL,
  `profile_pic` longtext CHARACTER SET latin1 NOT NULL,
  `username` varchar(250) CHARACTER SET latin1 NOT NULL,
  `email` varchar(250) CHARACTER SET latin1 NOT NULL,
  `password` varchar(250) CHARACTER SET latin1 NOT NULL,
  `type` int(2) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_at` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sct_admin`
--

INSERT INTO `sct_admin` (`id`, `name`, `mobile`, `address`, `profile_pic`, `username`, `email`, `password`, `type`, `created_at`, `created_by`, `modified_at`, `modified_by`, `is_active`, `is_deleted`) VALUES
(1, 'Admin', '2147483647', 'laxminagar', '', 'admin', 'admin@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 0, '0000-00-00 00:00:00', 0, '2016-04-18 08:42:31', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sct_area`
--

CREATE TABLE `sct_area` (
  `id` int(100) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_id` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_at` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sct_area`
--

INSERT INTO `sct_area` (`id`, `state_id`, `city_id`, `area`, `zipcode`, `created_at`, `created_by`, `modified_at`, `modified_by`, `is_active`, `is_deleted`) VALUES
(1, 27, '1', 'muradnagar', '201206', '2016-04-21 07:55:37', 1, '0000-00-00 00:00:00', 0, 1, 0),
(2, 1, '3', 'Telangana', '500072', '2016-04-21 07:58:40', 1, '0000-00-00 00:00:00', 0, 1, 0),
(3, 4, '9', 'Gaya', '823001', '2016-04-21 07:59:50', 1, '0000-00-00 00:00:00', 0, 1, 0),
(4, 3, '10', 'kamrup', ' 781001', '2016-04-21 08:18:20', 1, '0000-00-00 00:00:00', 0, 1, 0),
(5, 27, '2', 'Mamura', '201201', '2016-04-21 11:40:37', 1, '0000-00-00 00:00:00', 0, 1, 0),
(6, 3, '10', 'assam tea', '122122', '2016-04-21 12:17:11', 1, '2016-04-21 13:16:05', 1, 1, 0),
(7, 27, '2', 'sec65', '012012', '2016-04-21 12:23:01', 1, '0000-00-00 00:00:00', 0, 1, 0),
(8, 27, '1', 'sec1', '123', '2016-04-21 12:32:04', 1, '2016-05-30 11:16:03', 1, 1, 0),
(9, 2, '5', 'dsfdsf', 'sdsfds', '2016-04-22 09:32:24', 1, '2016-04-22 09:32:36', 1, 0, 1),
(10, 1, '12', 'hh', NULL, '2016-05-30 11:17:21', 1, '0000-00-00 00:00:00', 0, 1, 1),
(11, 1, '3', 'hyderabad main road', NULL, '2016-06-17 06:09:31', 1, '2016-06-17 06:09:44', 1, 1, 0),
(12, 35, '14', 'Khan Market', NULL, '2016-07-06 09:18:52', 1, '0000-00-00 00:00:00', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sct_bank`
--

CREATE TABLE `sct_bank` (
  `bank_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bank_name` varchar(225) NOT NULL,
  `branch_name` varchar(250) NOT NULL,
  `account_number` varchar(250) NOT NULL,
  `ifsc` varchar(250) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  `status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sct_banner`
--

CREATE TABLE `sct_banner` (
  `id` int(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(1000) CHARACTER SET latin1 NOT NULL,
  `desc` mediumtext NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_at` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sct_banner`
--

INSERT INTO `sct_banner` (`id`, `title`, `image`, `desc`, `created_at`, `created_by`, `modified_at`, `modified_by`, `is_active`, `is_deleted`) VALUES
(1, 'Second Banner', 'slider11.jpg', 'test<br>', '2015-12-18 15:49:07', 1, '2016-01-19 12:32:59', 1, 1, 0),
(2, 'First Banner', 'slider1.jpg', 'testing', '2015-12-21 18:12:35', 1, '2016-01-19 12:33:06', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sct_campaing`
--

CREATE TABLE `sct_campaing` (
  `campaing_id` int(11) NOT NULL,
  `compain_type` varchar(225) NOT NULL,
  `user_id` int(11) NOT NULL,
  `compain_title` varchar(500) NOT NULL,
  `compaing_link` varchar(500) NOT NULL,
  `created_date` datetime NOT NULL,
  `update_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sct_cities`
--

CREATE TABLE `sct_cities` (
  `id` int(100) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_at` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sct_cities`
--

INSERT INTO `sct_cities` (`id`, `state_id`, `city`, `created_at`, `created_by`, `modified_at`, `modified_by`, `is_active`, `is_deleted`) VALUES
(1, 27, 'Ghaziabad', '2016-04-20 12:44:47', 1, '2016-04-20 12:45:28', 1, 1, 0),
(2, 27, 'Noida', '2016-04-20 12:46:03', 1, '0000-00-00 00:00:00', 0, 1, 0),
(3, 1, 'Hyderabad', '2016-04-20 12:48:04', 1, '0000-00-00 00:00:00', 0, 1, 0),
(4, 1, 'Visakhapatnam', '2016-04-20 12:48:37', 1, '0000-00-00 00:00:00', 0, 1, 0),
(5, 2, 'Bombdila', '2016-04-20 12:49:35', 1, '0000-00-00 00:00:00', 0, 1, 0),
(6, 2, 'Ziro', '2016-04-20 12:49:48', 1, '0000-00-00 00:00:00', 0, 1, 0),
(7, 3, 'Silchar', '2016-04-20 12:50:34', 1, '0000-00-00 00:00:00', 0, 1, 0),
(8, 3, 'Tezpur', '2016-04-20 12:50:56', 1, '0000-00-00 00:00:00', 0, 1, 0),
(9, 4, 'Patna', '2016-04-20 12:51:05', 1, '0000-00-00 00:00:00', 0, 1, 0),
(10, 3, 'Guwahati', '2016-04-20 12:53:43', 1, '0000-00-00 00:00:00', 0, 1, 0),
(11, 9, 'Vanaras', '2016-04-21 07:46:27', 1, '2016-04-21 07:46:39', 1, 0, 1),
(12, 1, 'New Delhi', '2016-04-22 09:33:56', 1, '2016-04-22 09:34:03', 1, 0, 1),
(13, 31, 'chandigarh', '2016-05-30 11:01:21', 1, '0000-00-00 00:00:00', 0, 1, 0),
(14, 35, 'Rohini', '2016-07-06 08:48:06', 1, '0000-00-00 00:00:00', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sct_daily_task`
--

CREATE TABLE `sct_daily_task` (
  `daily_task_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  `status` enum('cliked','uncliked','pending') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sct_faq`
--

CREATE TABLE `sct_faq` (
  `id` int(100) NOT NULL,
  `msg_id` int(11) NOT NULL,
  `is_read` tinyint(1) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_at` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `is_deleted_by_vendor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sct_faq`
--

INSERT INTO `sct_faq` (`id`, `msg_id`, `is_read`, `title`, `message`, `created_at`, `created_by`, `modified_at`, `modified_by`, `is_deleted`, `is_deleted_by_vendor`) VALUES
(3, 2, 0, 'passages of Lorem Ipsum', '<p>There are many variations of passages of Lorem Ipsum available, but \r\nthe majority have suffered alteration in some form, by injected humour, \r\nor randomised words which don\'t look even slightly believable. If you \r\nare going to use a passage of Lorem Ipsum, you need to be sure there \r\nisn\'t anything embarrassing hidden in the middle of text. All the Lorem \r\nIpsum generators on the Internet tend to repeat predefined chunks as \r\nnecessary, making this the first true generator on the Internet. It uses\r\n a dictionary of over 200 Latin words, combined with a handful of model \r\nsentence structures, to generate Lorem Ipsum which looks reasonable. The\r\n generated Lorem Ipsum is therefore always free from repetition, \r\ninjected humour, or non-characteristic words etc.</p>', '2015-12-31 16:34:24', 1, '2016-01-22 20:07:28', 1, 0, 0),
(6, 2, 0, 'long established fact', '<p>It is a long established fact that a reader will be distracted by the\r\n readable content of a page when looking at its layout. The point of \r\nusing Lorem Ipsum is that it has a more-or-less normal distribution of \r\nletters, as opposed to using \'Content here, content here\', making it \r\nlook like readable English. Many desktop publishing packages and web \r\npage editors now use Lorem Ipsum as their default model text, and a \r\nsearch for \'lorem ipsum\' will uncover many web sites still in their \r\ninfancy. Various versions have evolved over the years, sometimes by \r\naccident, sometimes on purpose (injected humour and the like).</p>', '2015-12-31 17:11:00', 1, '2016-01-22 20:07:14', 1, 0, 0),
(7, 2, 0, 'xczfsdzrtfs', 'xcgtdftyry', '2015-12-31 17:29:04', 1, '0000-00-00 00:00:00', 0, 1, 0),
(9, 1, 0, 'Lorem Ipsum', '<p>There are many variations of passages of Lorem Ipsum available, but \r\nthe majority have suffered alteration in some form, by injected humour, \r\nor randomised words which don\'t look even slightly believable. If you \r\nare going to use a passage of Lorem Ipsum, you need to be sure there \r\nisn\'t anything embarrassing hidden in the middle of text. All the Lorem \r\nIpsum generators on the Internet tend to repeat predefined chunks as \r\nnecessary, making this the first true generator on the Internet. It uses\r\n a dictionary of over 200 Latin words, combined with a handful of model \r\nsentence structures, to generate Lorem Ipsum which looks reasonable. The\r\n generated Lorem Ipsum is therefore always free from repetition, \r\ninjected humour, or non-characteristic words etc.</p>', '2016-01-20 15:46:50', 1, '2016-01-22 20:07:00', 1, 0, 0),
(10, 1, 0, 'Contrary to popular belief, Lorem Ipsum', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It\r\n has roots in a piece of classical Latin literature from 45 BC, making \r\nit over 2000 years old. Richard McClintock, a Latin professor at \r\nHampden-Sydney College in Virginia, looked up one of the more obscure \r\nLatin words, consectetur, from a Lorem Ipsum passage, and going through \r\nthe cites of the word in classical liter</p><p><br></p><p>It is a long established fact that a reader will be distracted by the\r\n readable content of a page when looking at its layout. The point of \r\nusing Lorem Ipsum is that it has a more-or-less normal distribution of \r\nletters, as opposed to using \'Content here, content here\', making it \r\nlook like readable English. Many desktop publishing packages and web \r\npage editors now use Lorem Ipsum as their default model text, and a \r\nsearch for \'lorem ipsum\' will uncover many web sites still in their \r\ninfancy. Various versions have evolved over the years, sometimes by \r\naccident, sometimes on purpose (injected humour and the like).</p>', '2016-01-20 15:47:09', 1, '2016-01-22 20:06:45', 1, 0, 0),
(11, 1, 0, 'Terms and Conditions', '<p>There are many variations of passages of Lorem Ipsum available, but \r\nthe majority have suffered alteration in some form, by injected humour, \r\nor randomised words which don\'t look even slightly believable. If you \r\nare going to use a passage of Lorem Ipsum, you need to be sure there \r\nisn\'t anything embarrassing hidden in the middle of text. All the Lorem \r\nIpsum generators on the Internet tend to repeat predefined chunks as \r\nnecessary, making this the first true generator on the Internet. It uses\r\n a dictionary of over 200 Latin words, combined with a handful of model \r\nsentence structures, to generate Lorem Ipsum which looks reasonable. The\r\n generated Lorem Ipsum is therefore always free from repetition, \r\ninjected humour, or non-characteristic words etc.</p>', '2016-01-20 19:54:48', 1, '2016-02-02 17:13:37', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sct_gallery_image`
--

CREATE TABLE `sct_gallery_image` (
  `id` int(11) NOT NULL,
  `Res_id` int(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sct_gallery_image`
--

INSERT INTO `sct_gallery_image` (`id`, `Res_id`, `image`) VALUES
(115, 133, 'sketch_gallery.jpg'),
(116, 136, '2.png'),
(117, 135, '21.png'),
(118, 135, '3.png'),
(119, 135, '5.png'),
(120, 135, 'sketch_gallery1.jpg'),
(121, 137, ''),
(122, 137, '');

-- --------------------------------------------------------

--
-- Table structure for table `sct_invoice`
--

CREATE TABLE `sct_invoice` (
  `invoice_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` float(5,2) NOT NULL,
  `acknowledment` varchar(250) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  `transaction_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sct_kyc`
--

CREATE TABLE `sct_kyc` (
  `kyc_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `document_name` varchar(225) NOT NULL,
  `document_type` varchar(250) NOT NULL,
  `pic` varchar(500) NOT NULL,
  `created_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sct_mail_template`
--

CREATE TABLE `sct_mail_template` (
  `id` int(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `from_email` varchar(255) NOT NULL,
  `reply_email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `modified_at` datetime NOT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sct_mail_template`
--

INSERT INTO `sct_mail_template` (`id`, `title`, `from_email`, `reply_email`, `subject`, `message`, `modified_at`, `is_deleted`) VALUES
(1, 'Front end Forgot passsword send mail to vendor (done)', 'DonotReply@rentyourhall.com', 'DonotReply@rentyourhall.com', 'Forgot passsword', 'Hello [user],<br><br>&nbsp;Please&nbsp; [click_here]&nbsp;&nbsp; to reset your password<br><br><br>Thanks,<br>Admin<br><br>', '2016-02-16 13:46:37', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sct_newsletter`
--

CREATE TABLE `sct_newsletter` (
  `id` int(11) NOT NULL,
  `name` varchar(250) CHARACTER SET latin1 NOT NULL,
  `email` varchar(250) CHARACTER SET latin1 NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_at` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sct_newsletter`
--

INSERT INTO `sct_newsletter` (`id`, `name`, `email`, `created_at`, `created_by`, `modified_at`, `modified_by`, `is_deleted`) VALUES
(7, 'demo', 'admin@gmail.com', '2016-05-26 10:08:50', 0, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sct_pages`
--

CREATE TABLE `sct_pages` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `title` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_title` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_keyword` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `display_on_menu` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `date` datetime DEFAULT NULL,
  `date_publish` datetime DEFAULT NULL,
  `template` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `repository_id` int(11) DEFAULT NULL,
  `is_visible` tinyint(1) DEFAULT '1',
  `is_private` tinyint(1) DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `modified_at` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sct_pages`
--

INSERT INTO `sct_pages` (`id`, `parent_id`, `order`, `title`, `description`, `meta_title`, `meta_description`, `meta_keyword`, `created_at`, `created_by`, `display_on_menu`, `type`, `date`, `date_publish`, `template`, `slug`, `repository_id`, `is_visible`, `is_private`, `is_deleted`, `is_active`, `modified_at`, `modified_by`) VALUES
(1, NULL, NULL, 'Homw', '<p>Comming Soon...</p>', 'home', '	sdfdsf', 'dfdsfds', '2016-07-19 17:27:34', 1, NULL, '', NULL, NULL, NULL, 'home', NULL, 1, 0, 0, 1, '2016-07-19 17:40:22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sct_plan`
--

CREATE TABLE `sct_plan` (
  `plan_id` int(11) NOT NULL,
  `plan_name` varchar(225) NOT NULL,
  `price` float(10,2) NOT NULL,
  `epoint` varchar(250) NOT NULL,
  `account_validity` datetime NOT NULL,
  `deciption` text NOT NULL,
  `packege_b` varchar(250) NOT NULL,
  `work` varchar(250) NOT NULL,
  `click_per_day` int(6) NOT NULL,
  `earning_per_day` int(6) NOT NULL,
  `capping` varchar(220) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  `status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sct_promotional`
--

CREATE TABLE `sct_promotional` (
  `pro_id` int(11) NOT NULL,
  `session` varchar(225) NOT NULL,
  `close_date` datetime NOT NULL,
  `left_bv` float(7,2) NOT NULL,
  `right_bv` float(7,2) NOT NULL,
  `user_id` int(11) NOT NULL,
  `crBV` float(7,2) NOT NULL,
  `balanceing` float(7,2) NOT NULL,
  `income` float(7,2) NOT NULL,
  `tds` int(11) NOT NULL,
  `admin_charge` float(7,2) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sct_reward`
--

CREATE TABLE `sct_reward` (
  `reward_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reward_name` varchar(255) NOT NULL,
  `pic` varchar(225) NOT NULL,
  `achivment` varchar(500) NOT NULL,
  `created_date` datetime NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sct_send_mail_log`
--

CREATE TABLE `sct_send_mail_log` (
  `id` int(11) NOT NULL,
  `send_type` varchar(255) NOT NULL,
  `send_date` datetime NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sct_send_mail_log`
--

INSERT INTO `sct_send_mail_log` (`id`, `send_type`, `send_date`, `subject`, `message`, `email`) VALUES
(1, 'send mail to subscibed user', '2016-02-10 13:01:19', 'Order status changed', 'he above code sets the following rules:\r\n\r\n<ol><li>The username field be no shorter than 5 characters and no longer than 12.</li><li>The password field must match the password confirmation field.</li><li>The email field must contain a valid email address.</li></ol>\r\n\r\n<p>Give it a try! Submit your form without the proper data and you\'ll see new error messages that correspond to your new rules.\r\nThere are numerous rules available which you can read about in the validation reference.</p>', 'asas@gmsds.com, dsdds@sdfd.com, test@gmail.com'),
(2, 'send mail to  vendor', '2016-02-10 13:13:51', 'Order status changed', 'he above code sets the following rules:\r\n\r\n<ol><li>The username field be no shorter than 5 characters and no longer than 12.</li><li>The password field must match the password confirmation field.</li><li>The email field must contain a valid email address.</li></ol>\r\n\r\n<p>Give it a try! Submit your form without the proper data and you\'ll see new error messages that correspond to your new rules.\r\nThere are numerous rules available which you can read about in the validation reference.</p>', 'manjeet@gmail.com'),
(3, 'send mail to  user', '2016-02-10 13:19:31', 'dfdsfds', 'he above code sets the following rules:\r\n\r\n<ol><li>The username field be no shorter than 5 characters and no longer than 12.</li><li>The password field must match the password confirmation field.</li><li>The email field must contain a valid email address.</li></ol>\r\n\r\n<p>Give it a try! Submit your form without the proper data and you\'ll see new error messages that correspond to your new rules.\r\nThere are numerous rules available which you can read about in the validation reference.</p>', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `sct_setting`
--

CREATE TABLE `sct_setting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `autoload` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sct_setting`
--

INSERT INTO `sct_setting` (`id`, `name`, `value`, `autoload`) VALUES
(1, 'SITE_TITLE', 'onlineworkpro', 'yes'),
(2, 'SITE_ADDRESS', 'Vasundhra', 'yes'),
(3, 'SITE_MOBILE', '01204277070', 'yes'),
(4, 'SITE_EMAIL', 'admin@gmail.com', 'yes'),
(5, 'SITE_LOGO', '', 'yes'),
(6, 'HOME_SEARCH', 'Discover fantastic venues by searching through a large database of event venues. After making a venue selection, fill out a short booking form and submit.', 'yes'),
(7, 'HOME_FEEDBACK', 'You will receive prompt feedback within the hour to let you know if the hall vendor has accepted or declined your booking request based on availability of the venue or other factors.', 'yes'),
(8, 'HOME_PAYMENT', 'Once booked, you can make payment directly to the venue management or online. Once payment has been made, the venue is booked exclusively for your event!', 'yes'),
(9, 'COPYRIGHT', 'Copyright onlineworkproÂ© 2015', 'yes'),
(10, 'IP_DENY', '', 'yes'),
(11, 'NUMBER_OF_CONFIRM_BOOKING', '5', 'yes'),
(12, 'SUBSCRIPTION_EMAIL', 'subscriptions@rentyourhall.com', 'yes'),
(13, 'SUPPORT_EMAIL', 'admin@gmail.com', 'yes'),
(14, 'CROWED_EMAIL', 'info@rentyourhall.com', 'yes'),
(15, 'Currency', 'INR', 'yes'),
(16, 'Currency_Symbol', 'Rs.', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `sct_social_media`
--

CREATE TABLE `sct_social_media` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `image` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `is_home` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_at` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sct_social_media`
--

INSERT INTO `sct_social_media` (`id`, `title`, `description`, `image`, `url`, `is_home`, `created_at`, `created_by`, `modified_at`, `modified_by`, `is_active`, `is_deleted`) VALUES
(1, 'Facebook', NULL, 'fb.png', 'https://www.facebook.com/', 0, '2016-01-15 10:27:34', 1, '0000-00-00 00:00:00', 0, 1, 0),
(2, 'Twitter', NULL, 'twitter.png', 'https://twitter.com/login', 0, '2015-12-22 09:32:53', 1, '2016-01-15 10:23:22', 1, 1, 0),
(3, 'Instagram', NULL, 'instgram.png', 'https://www.instagram.com/?hl=en', 1, '2016-01-15 10:32:21', 1, '2016-01-20 10:16:27', 1, 1, 0),
(4, 'Google', NULL, 'google.png', 'https://plus.google.com/', 1, '2015-12-22 09:34:30', 1, '2016-01-15 10:23:15', 1, 1, 0),
(5, 'Linkedin', NULL, 'linkedin.png', 'https://in.linkedin.com/', 1, '2015-12-22 09:34:56', 1, '2016-01-15 10:23:11', 1, 1, 0),
(6, 'aa', NULL, '', 'http://localhost/realstate/admin/social/add', 0, '2016-04-11 10:03:32', 1, '0000-00-00 00:00:00', 0, 1, 1),
(7, 'f', NULL, '', 'http://localhost/realstate/admin/social/add', 0, '2016-04-11 10:11:49', 1, '2016-04-11 10:24:54', 1, 1, 1),
(8, 'face', NULL, '', 'http://localhost/realstate/admin/social/add', 0, '2016-04-11 11:54:04', 1, '0000-00-00 00:00:00', 0, 1, 1),
(9, 'sss', NULL, '', 'http://localhost/realstate/admin/social/add', 0, '2016-04-11 13:19:45', 1, '0000-00-00 00:00:00', 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sct_states`
--

CREATE TABLE `sct_states` (
  `id` int(100) NOT NULL,
  `state` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_at` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sct_states`
--

INSERT INTO `sct_states` (`id`, `state`, `created_at`, `created_by`, `modified_at`, `modified_by`, `is_active`, `is_deleted`) VALUES
(1, 'Andhra Pradesh', '2016-04-22 06:57:47', 1, '2016-04-22 08:57:47', 1, 1, 0),
(2, 'Arunachal Pradesh', '2016-04-20 10:34:11', 1, '0000-00-00 00:00:00', 0, 1, 0),
(3, 'Assam', '2016-04-20 10:34:11', 1, '0000-00-00 00:00:00', 0, 1, 0),
(4, 'Bihar', '2016-04-20 10:34:11', 1, '0000-00-00 00:00:00', 0, 1, 0),
(5, 'Chhattisgarh', '2016-04-20 10:34:11', 1, '0000-00-00 00:00:00', 0, 1, 0),
(6, 'Goa', '2016-04-20 10:34:11', 1, '0000-00-00 00:00:00', 0, 1, 0),
(7, 'Gujarat', '2016-04-20 10:34:11', 1, '0000-00-00 00:00:00', 0, 1, 0),
(8, 'Haryana', '2016-04-20 10:34:11', 1, '0000-00-00 00:00:00', 0, 1, 0),
(9, 'Himachal Pradesh', '2016-04-20 10:34:11', 1, '0000-00-00 00:00:00', 0, 1, 0),
(10, 'Jammu & Kashmir', '2016-04-20 10:34:11', 1, '0000-00-00 00:00:00', 0, 1, 0),
(11, 'Jharkhand', '2016-04-20 10:34:11', 1, '0000-00-00 00:00:00', 0, 1, 0),
(12, 'Karnataka', '2016-04-20 10:34:11', 1, '0000-00-00 00:00:00', 0, 1, 0),
(13, 'Kerala', '2016-04-20 10:34:11', 1, '0000-00-00 00:00:00', 0, 1, 0),
(14, 'Madhya Pradesh', '2016-04-20 10:34:11', 1, '0000-00-00 00:00:00', 0, 1, 0),
(15, 'Maharashtra', '2016-04-20 10:34:11', 1, '0000-00-00 00:00:00', 0, 1, 0),
(16, 'Manipur', '2016-04-20 10:34:11', 1, '0000-00-00 00:00:00', 0, 1, 0),
(17, 'Meghalaya', '2016-04-20 10:34:11', 1, '0000-00-00 00:00:00', 0, 1, 0),
(18, 'Mizoram', '2016-04-20 10:34:11', 1, '0000-00-00 00:00:00', 0, 1, 0),
(19, 'Nagaland', '2016-04-20 10:34:11', 1, '0000-00-00 00:00:00', 0, 1, 0),
(20, 'Odisha (Orissa)', '2016-04-20 10:34:11', 1, '0000-00-00 00:00:00', 0, 1, 0),
(21, 'Punjab', '2016-04-20 10:34:11', 1, '0000-00-00 00:00:00', 0, 1, 0),
(22, 'Rajasthan', '2016-04-20 10:34:11', 1, '0000-00-00 00:00:00', 0, 1, 0),
(23, 'Sikkim', '2016-04-20 10:34:11', 1, '0000-00-00 00:00:00', 0, 1, 0),
(24, 'Tamil Nadu', '2016-04-20 10:34:11', 1, '0000-00-00 00:00:00', 0, 1, 0),
(25, 'Telangana', '2016-04-20 10:34:11', 1, '0000-00-00 00:00:00', 0, 1, 0),
(26, 'Tripura', '2016-04-20 10:34:11', 1, '0000-00-00 00:00:00', 0, 1, 0),
(27, 'Uttar Pradesh', '2016-04-20 10:34:11', 1, '0000-00-00 00:00:00', 0, 1, 0),
(28, 'Uttarakhand', '2016-04-20 10:34:11', 1, '0000-00-00 00:00:00', 0, 1, 0),
(29, 'West Bengal', '2016-04-20 10:34:11', 1, '0000-00-00 00:00:00', 0, 1, 0),
(30, 'Andaman and Nicobar Islands', '2016-04-20 10:34:11', 1, '0000-00-00 00:00:00', 0, 1, 0),
(31, 'Chandigarh', '2016-04-20 10:34:11', 1, '0000-00-00 00:00:00', 0, 1, 0),
(32, 'Dadra and Nagar Haveli', '2016-04-20 10:34:11', 1, '0000-00-00 00:00:00', 0, 1, 0),
(33, 'Daman and Diu', '2016-04-20 10:34:11', 1, '0000-00-00 00:00:00', 0, 1, 0),
(34, 'Lakshadweep', '2016-04-20 10:34:11', 1, '0000-00-00 00:00:00', 0, 1, 0),
(35, 'Delhi – NCR', '2016-04-20 10:34:11', 1, '0000-00-00 00:00:00', 0, 1, 0),
(36, 'Puducherry (Pondicherry)', '2016-04-20 10:34:11', 1, '0000-00-00 00:00:00', 0, 1, 0),
(37, 'ABC', '2016-04-22 06:57:31', 1, '0000-00-00 00:00:00', 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sct_task`
--

CREATE TABLE `sct_task` (
  `task_id` int(11) NOT NULL,
  `page_title` varchar(225) NOT NULL,
  `page_link` varchar(225) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sct_transaction`
--

CREATE TABLE `sct_transaction` (
  `transaction_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `transaction_date` datetime NOT NULL,
  `neft_nubber` varchar(250) NOT NULL,
  `amount` float(5,2) NOT NULL,
  `tds` float(5,2) NOT NULL,
  `admin_charge` float(5,2) NOT NULL,
  `net_amount` float(5,2) NOT NULL,
  `update_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sct_user`
--

CREATE TABLE `sct_user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(250) NOT NULL,
  `mobile` varchar(250) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `pancard_no` varchar(11) NOT NULL,
  `pencard_appaly` tinyint(1) NOT NULL DEFAULT '0',
  `nominee` varchar(225) NOT NULL,
  `sponsor_id` int(11) NOT NULL,
  `sponsor_name` varchar(250) NOT NULL,
  `position` enum('Left','Right') NOT NULL,
  `left_user_id` int(11) NOT NULL,
  `right_user_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `profetion` varchar(330) NOT NULL,
  `industry` varchar(225) NOT NULL,
  `qualification` varchar(225) NOT NULL,
  `company_name` varchar(225) NOT NULL,
  `work_field` varchar(225) NOT NULL,
  `profile_pic` varchar(225) NOT NULL,
  `dob` date NOT NULL,
  `booster_status` tinyint(1) NOT NULL,
  `login_ip` varchar(225) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `created_by` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sct_user`
--

INSERT INTO `sct_user` (`user_id`, `name`, `email`, `password`, `mobile`, `gender`, `pancard_no`, `pencard_appaly`, `nominee`, `sponsor_id`, `sponsor_name`, `position`, `left_user_id`, `right_user_id`, `plan_id`, `profetion`, `industry`, `qualification`, `company_name`, `work_field`, `profile_pic`, `dob`, `booster_status`, `login_ip`, `status`, `created_date`, `updated_date`, `is_deleted`, `created_by`) VALUES
(1, 'jitendra singh', 'jitendrak2050@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '9911316902', 'Male', '', 0, '', 0, '', 'Left', 0, 0, 0, '', '', '', '', '', '', '0000-00-00', 0, '', 'Active', '2016-07-19 11:50:13', '0000-00-00 00:00:00', 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `sct_user_plan_details`
--

CREATE TABLE `sct_user_plan_details` (
  `plan_details_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `join _date` datetime NOT NULL,
  `expire_date` datetime NOT NULL,
  `created_date` datetime NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sct_address`
--
ALTER TABLE `sct_address`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sct_admin`
--
ALTER TABLE `sct_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sct_area`
--
ALTER TABLE `sct_area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sct_bank`
--
ALTER TABLE `sct_bank`
  ADD PRIMARY KEY (`bank_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sct_banner`
--
ALTER TABLE `sct_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sct_campaing`
--
ALTER TABLE `sct_campaing`
  ADD PRIMARY KEY (`campaing_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sct_cities`
--
ALTER TABLE `sct_cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sct_daily_task`
--
ALTER TABLE `sct_daily_task`
  ADD PRIMARY KEY (`daily_task_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `plan_id` (`plan_id`),
  ADD KEY `task_id` (`task_id`);

--
-- Indexes for table `sct_faq`
--
ALTER TABLE `sct_faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sct_gallery_image`
--
ALTER TABLE `sct_gallery_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sct_invoice`
--
ALTER TABLE `sct_invoice`
  ADD PRIMARY KEY (`invoice_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sct_kyc`
--
ALTER TABLE `sct_kyc`
  ADD PRIMARY KEY (`kyc_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sct_mail_template`
--
ALTER TABLE `sct_mail_template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sct_newsletter`
--
ALTER TABLE `sct_newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sct_pages`
--
ALTER TABLE `sct_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sct_plan`
--
ALTER TABLE `sct_plan`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `sct_promotional`
--
ALTER TABLE `sct_promotional`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sct_reward`
--
ALTER TABLE `sct_reward`
  ADD PRIMARY KEY (`reward_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sct_send_mail_log`
--
ALTER TABLE `sct_send_mail_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sct_setting`
--
ALTER TABLE `sct_setting`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `option_name` (`name`);

--
-- Indexes for table `sct_social_media`
--
ALTER TABLE `sct_social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sct_states`
--
ALTER TABLE `sct_states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sct_task`
--
ALTER TABLE `sct_task`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `sct_transaction`
--
ALTER TABLE `sct_transaction`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `invoice_id` (`invoice_id`);

--
-- Indexes for table `sct_user`
--
ALTER TABLE `sct_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `sct_user_plan_details`
--
ALTER TABLE `sct_user_plan_details`
  ADD PRIMARY KEY (`plan_details_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `plan_id` (`plan_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sct_address`
--
ALTER TABLE `sct_address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sct_admin`
--
ALTER TABLE `sct_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sct_area`
--
ALTER TABLE `sct_area`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `sct_bank`
--
ALTER TABLE `sct_bank`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sct_banner`
--
ALTER TABLE `sct_banner`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sct_campaing`
--
ALTER TABLE `sct_campaing`
  MODIFY `campaing_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sct_cities`
--
ALTER TABLE `sct_cities`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `sct_faq`
--
ALTER TABLE `sct_faq`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `sct_gallery_image`
--
ALTER TABLE `sct_gallery_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
--
-- AUTO_INCREMENT for table `sct_invoice`
--
ALTER TABLE `sct_invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sct_kyc`
--
ALTER TABLE `sct_kyc`
  MODIFY `kyc_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sct_mail_template`
--
ALTER TABLE `sct_mail_template`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sct_newsletter`
--
ALTER TABLE `sct_newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `sct_pages`
--
ALTER TABLE `sct_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sct_plan`
--
ALTER TABLE `sct_plan`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sct_promotional`
--
ALTER TABLE `sct_promotional`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sct_reward`
--
ALTER TABLE `sct_reward`
  MODIFY `reward_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sct_send_mail_log`
--
ALTER TABLE `sct_send_mail_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sct_setting`
--
ALTER TABLE `sct_setting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `sct_social_media`
--
ALTER TABLE `sct_social_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `sct_states`
--
ALTER TABLE `sct_states`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `sct_task`
--
ALTER TABLE `sct_task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sct_transaction`
--
ALTER TABLE `sct_transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sct_user`
--
ALTER TABLE `sct_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `sct_address`
--
ALTER TABLE `sct_address`
  ADD CONSTRAINT `sct_addres_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `sct_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sct_bank`
--
ALTER TABLE `sct_bank`
  ADD CONSTRAINT `sct_bank_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `sct_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sct_campaing`
--
ALTER TABLE `sct_campaing`
  ADD CONSTRAINT `sct_campaing_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `sct_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sct_daily_task`
--
ALTER TABLE `sct_daily_task`
  ADD CONSTRAINT `sct_daily_task_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `sct_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sct_daily_task_ibfk_2` FOREIGN KEY (`plan_id`) REFERENCES `sct_plan` (`plan_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sct_daily_task_ibfk_3` FOREIGN KEY (`task_id`) REFERENCES `sct_task` (`task_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sct_invoice`
--
ALTER TABLE `sct_invoice`
  ADD CONSTRAINT `sct_invoice_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `sct_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sct_kyc`
--
ALTER TABLE `sct_kyc`
  ADD CONSTRAINT `sct_kyc_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `sct_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sct_promotional`
--
ALTER TABLE `sct_promotional`
  ADD CONSTRAINT `sct_promotional_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `sct_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sct_reward`
--
ALTER TABLE `sct_reward`
  ADD CONSTRAINT `sct_reward_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `sct_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
