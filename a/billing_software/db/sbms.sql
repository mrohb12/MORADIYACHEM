-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2017 at 03:43 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sbms`
--

-- --------------------------------------------------------

--
-- Table structure for table `dealer`
--

CREATE TABLE `dealer` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobileno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pincode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `commission` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `user_type` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `datetimex` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `endeffdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dealer`
--

INSERT INTO `dealer` (`id`, `name`, `email`, `username`, `password`, `mobileno`, `address`, `city`, `pincode`, `commission`, `status`, `user_type`, `datetimex`, `updated_at`, `endeffdate`) VALUES
(1, 'Sarman Ranavayaw', 'sgranavaya@rediffmail.com', '', '', '9727477438', '9727477438', 'Junagadh', '362001', 15, 1, '', '2017-07-10 09:42:24', '2017-07-10 06:02:28', '0000-00-00'),
(2, 'Viraj Parmar', 'viraj@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', '134567989', '134567989', 'Junagadh', '362001', 18, 1, 'Admin', '2017-07-10 11:48:48', '2017-07-11 03:42:00', '0000-00-00'),
(3, 'sarman', 'sarman@gmail.com', 'sarman', 'e00cf25ad42683b3df678c61f42c6bda', '9898742506', '9898742506', 'Junagadh', '362001', 10, 1, '', '2017-07-11 08:40:22', '2017-07-11 03:41:48', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `validity` varchar(50) NOT NULL,
  `full_right_user` char(3) NOT NULL,
  `view_only_user` char(3) NOT NULL,
  `application` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `price`, `validity`, `full_right_user`, `view_only_user`, `application`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Testing Package 2', '4000', '1m', '1', '99', '[\"Softwares\",\"Website\"]', 1, '2017-01-10 13:24:53', '0000-00-00 00:00:00'),
(3, 'Full Package', '1000', '1m', '1', '99', '[\"Softwares\",\"Website\",\"Applications\"]', 1, '2017-02-09 14:05:37', '0000-00-00 00:00:00'),
(10, 'Temporary Package', '100', '1y', '1', '99', '[\"Applications\"]', 1, '2017-05-19 09:54:01', '0000-00-00 00:00:00'),
(11, 'Testing Package', '100', '1m', '99', '1', '', 1, '2017-07-11 07:30:19', '0000-00-00 00:00:00'),
(12, 'Testing package 1', '200', '1y', '1', '99', '', 1, '2017-07-11 08:53:39', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `package_modules`
--

CREATE TABLE `package_modules` (
  `id` bigint(11) NOT NULL,
  `package_id` bigint(11) NOT NULL,
  `user_id` bigint(11) NOT NULL,
  `modules` text NOT NULL,
  `datetimex` datetime NOT NULL,
  `endeffdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package_modules`
--

INSERT INTO `package_modules` (`id`, `package_id`, `user_id`, `modules`, `datetimex`, `endeffdate`) VALUES
(1, 3, 18, '{\"1\":\"14,15,16,17\",\"2\":\"6,7\",\"4\":\"1,2,30,31,35\"}', '2017-07-11 12:55:56', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `category_id` bigint(11) NOT NULL,
  `pagename` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `sortorder` varchar(5) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `datetimex` datetime NOT NULL,
  `endeffdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `category_id`, `pagename`, `file`, `sortorder`, `status`, `datetimex`, `endeffdate`) VALUES
(1, 4, 'Add User', 'add-user.php', '', 1, '2017-03-01 08:08:35', '0000-00-00'),
(2, 4, 'View Users', 'users.php', '', 1, '2017-03-01 08:08:44', '0000-00-00'),
(3, 4, 'View Pages', 'pages.php', '', 1, '2017-03-01 13:42:29', '2017-04-15'),
(4, 4, 'Add Page', 'add-page.php', '', 1, '2017-03-02 06:48:15', '2017-03-02'),
(6, 2, 'Student Registration', 'student-admission.php', '1', 1, '2017-04-10 08:30:52', '0000-00-00'),
(7, 2, 'View Students', 'students.php', '2', 1, '2017-04-10 08:51:26', '0000-00-00'),
(8, 5, 'Category', 'document-category.php', '', 1, '2017-04-10 12:06:48', '0000-00-00'),
(9, 5, 'Sub Category', 'document-sub-category.php', '', 1, '2017-04-10 12:07:15', '0000-00-00'),
(10, 5, 'Upload Document', 'document-upload.php', '', 1, '2017-04-10 12:07:36', '0000-00-00'),
(11, 6, 'Event Type', 'add-event-type.php', '', 1, '2017-04-10 12:09:59', '2017-07-05'),
(12, 6, 'Add Event', 'add-event.php', '', 1, '2017-04-10 12:10:17', '2017-07-05'),
(13, 6, 'View Events', 'events.php', '', 1, '2017-04-10 12:10:33', '0000-00-00'),
(14, 1, 'Student Information', 'student-hirarcy.php', '', 1, '2017-04-11 10:58:41', '0000-00-00'),
(15, 1, 'Guardianâ€™s Info', 'guardians.php', '', 1, '2017-04-11 10:59:14', '0000-00-00'),
(16, 1, 'Student Roll Number', 'student-rollnumber.php', '', 1, '2017-04-11 11:24:52', '0000-00-00'),
(17, 1, 'Print Studentâ€™s List ', 'student-report.php', '', 1, '2017-04-11 11:32:54', '0000-00-00'),
(18, 1, 'asdada', 'a.php', '', 1, '2017-04-11 13:35:38', '2017-04-11'),
(19, 8, 'Certificate Type', 'certificate-type.php', '', 1, '2017-04-13 15:19:21', '2017-07-05'),
(20, 8, 'Custom Certificate', 'custom-certificate.php', '', 1, '2017-04-13 15:19:37', '2017-07-05'),
(21, 8, 'Generate Certificate', 'generate-certificate.php', '', 1, '2017-04-13 15:19:52', '2017-07-05'),
(22, 8, 'Issued Certificate List', 'issued-certificate-list.php', '', 1, '2017-04-13 15:20:07', '2017-07-05'),
(23, 9, 'Add Vehicle', 'javascript:;', '', 1, '2017-04-14 06:47:04', '0000-00-00'),
(24, 9, 'Add Driver', 'javascript:;', '', 1, '2017-04-14 06:47:23', '0000-00-00'),
(25, 9, 'Add Route', 'javascript:;', '', 1, '2017-04-14 06:47:36', '0000-00-00'),
(26, 9, 'Add Destination', 'javascript:;', '', 1, '2017-04-14 06:47:47', '0000-00-00'),
(27, 9, 'Fee Collection', 'javascript:;', '', 1, '2017-04-14 06:47:59', '0000-00-00'),
(28, 9, 'SMS Alert', 'javascript:;', '', 1, '2017-04-14 06:48:14', '0000-00-00'),
(29, 4, 'Visitor Statistics', 'visitor-statistics.php', '', 1, '2017-04-15 07:42:14', '2017-07-05'),
(30, 4, 'Visitors List', 'javascript:;', '', 1, '2017-04-15 07:42:34', '0000-00-00'),
(31, 4, 'Assign Courses', 'javascript:;', '', 1, '2017-04-15 07:42:50', '0000-00-00'),
(32, 0, 'Institution Details', 'institute-profile.php', '', 1, '2017-04-15 07:45:23', '2017-04-15'),
(33, 10, 'General Setting', 'general-setting.php', '', 1, '2017-04-15 07:45:42', '2017-07-05'),
(34, 10, 'Institution Details', 'institute-profile.php', '', 1, '2017-04-15 07:46:28', '0000-00-00'),
(35, 4, 'Assign Roles', 'assign-roles.php', '', 1, '2017-04-15 08:32:20', '0000-00-00'),
(36, 11, 'abcd', 'abcd.php', '', 1, '2017-04-24 06:48:25', '2017-04-24'),
(37, 12, 'ID Card Type', 'id-card-type.php', '', 1, '2017-04-24 11:04:08', '2017-07-05'),
(38, 12, 'Generate ID Card', 'generate-id-card.php', '', 1, '2017-04-24 11:04:28', '2017-07-05'),
(39, 13, 'Calendar', 'calendar.php', '', 1, '2017-04-24 11:05:16', '0000-00-00'),
(40, 13, 'Set Time Table', 'set-timetable.php', '', 1, '2017-04-24 11:05:32', '0000-00-00'),
(41, 13, 'View Time Table', 'view-timetable.php', '', 1, '2017-04-24 11:05:47', '0000-00-00'),
(42, 13, 'View Batch Time Table', 'view-batch-timetable.php', '', 1, '2017-04-24 11:06:03', '0000-00-00'),
(43, 13, 'View Teachers Time Table', 'view-teachers-timetable.php', '', 1, '2017-04-24 11:06:32', '0000-00-00'),
(44, 13, 'Teacher Working Hours', 'view-teachers-working-hours.php', '', 1, '2017-04-24 11:06:51', '0000-00-00'),
(45, 14, 'Set Exam Term', 'set-exam-term.php', '', 1, '2017-04-24 11:07:30', '0000-00-00'),
(46, 14, 'Set Exam', 'set-exam.php', '', 1, '2017-04-24 11:07:49', '0000-00-00'),
(47, 14, 'Exam List', 'exam-list.php', '', 1, '2017-04-24 11:08:04', '0000-00-00'),
(48, 0, '', '', '', 1, '2017-04-24 11:08:08', '2017-04-24'),
(49, 14, 'Exam Report', 'exam-report.php', '', 1, '2017-04-24 11:08:24', '0000-00-00'),
(50, 14, 'Broad Sheet', 'broad-sheet.php', '', 1, '2017-04-24 11:08:41', '0000-00-00'),
(51, 15, 'Mailbox', 'mailbox.php', '', 1, '2017-04-24 11:09:49', '0000-00-00'),
(52, 15, 'SMS', 'sms.php', '', 1, '2017-04-24 11:10:04', '0000-00-00'),
(53, 15, 'Bulk SMS', 'bulk-sms.php', '', 1, '2017-04-24 11:10:19', '0000-00-00'),
(54, 15, 'Email Accounts', 'email-settings.php', '', 1, '2017-04-24 11:10:35', '0000-00-00'),
(55, 15, 'Create Template', 'template-master.php', '', 1, '2017-04-24 11:10:50', '0000-00-00'),
(56, 15, 'Send Mail', 'send-email.php', '', 1, '2017-04-24 11:11:04', '0000-00-00'),
(57, 16, 'Assign Task', 'add-task.php', '', 1, '2017-04-24 11:13:51', '0000-00-00'),
(58, 16, 'Task Details', 'tasklist.php', '', 1, '2017-04-24 11:14:05', '0000-00-00'),
(59, 17, 'Category', 'book-category-list.php', '', 1, '2017-04-24 11:14:54', '0000-00-00'),
(60, 17, 'Books', 'books.php', '', 1, '2017-04-24 11:15:07', '0000-00-00'),
(61, 17, 'Issue Book', 'issued-books.php', '', 1, '2017-04-24 11:15:21', '0000-00-00'),
(62, 17, 'Book Return/ Renewal', 'return-renewal-books.php', '', 1, '2017-04-24 11:15:39', '0000-00-00'),
(63, 17, 'Reports', 'reports-book.php', '', 1, '2017-04-24 11:15:53', '0000-00-00'),
(64, 18, 'Vendor Add', 'add-vender.php', '', 1, '2017-04-24 11:17:07', '0000-00-00'),
(65, 18, 'Vendor Display', 'venders.php', '', 1, '2017-04-24 11:19:51', '0000-00-00'),
(66, 18, 'Inventory Category', 'add-inventory-category.php', '', 1, '2017-04-24 11:20:07', '0000-00-00'),
(67, 18, 'Inventory Item', 'javascript:;', '', 1, '2017-04-24 11:20:22', '0000-00-00'),
(68, 18, 'Stock Register', 'javascript:;', '', 1, '2017-04-24 11:20:33', '0000-00-00'),
(69, 19, 'Student report', 'javascript:;', '', 1, '2017-04-24 11:22:55', '0000-00-00'),
(70, 19, 'Student Details', 'javascript:;', '', 1, '2017-04-24 11:23:06', '0000-00-00'),
(71, 19, 'Elective Subject Report', 'javascript:;', '', 1, '2017-04-24 11:23:18', '0000-00-00'),
(72, 19, 'Fee Due Report', 'javascript:;', '', 1, '2017-04-24 11:23:30', '0000-00-00'),
(73, 19, 'Fee Paid Report', 'javascript:;', '', 1, '2017-04-24 11:23:42', '0000-00-00'),
(74, 19, 'Class Report', 'javascript:;', '', 1, '2017-04-24 11:23:53', '0000-00-00'),
(75, 20, 'Fees Category', 'fees-category.php', '', 1, '2017-04-25 08:46:32', '0000-00-00'),
(76, 20, 'Fees Sub Category', 'fees-sub-category.php', '', 1, '2017-04-25 08:46:51', '0000-00-00'),
(77, 20, 'Fees Allocation', 'fees-allocation.php', '', 1, '2017-04-25 08:47:07', '0000-00-00'),
(78, 20, 'Fees Collection', 'fee-collection.php', '', 1, '2017-04-25 08:47:35', '0000-00-00'),
(79, 20, 'Quick Payment', 'quick-payment.php', '', 1, '2017-04-25 08:47:52', '0000-00-00'),
(82, 22, 'Hostel Types', 'javascript:;', '', 1, '2017-04-27 07:46:54', '0000-00-00'),
(83, 22, 'Hostel Details', 'javascript:;', '', 1, '2017-04-27 07:47:08', '0000-00-00'),
(84, 22, 'Hostel Room', 'javascript:;', '', 1, '2017-04-27 07:47:19', '0000-00-00'),
(85, 23, 'State', 'javascript:;', '', 1, '2017-05-26 15:13:47', '2017-05-27'),
(86, 23, 'District', 'districts.php', '', 1, '2017-05-26 15:14:00', '0000-00-00'),
(87, 23, 'Taluka', 'javascript:;', '', 1, '2017-05-26 15:14:10', '2017-05-27'),
(88, 23, 'Add District', 'add-district.php', '', 1, '2017-05-27 12:41:28', '0000-00-00'),
(89, 23, 'Language', 'languages.php', '', 1, '2017-05-30 12:14:45', '0000-00-00'),
(90, 23, 'Courses', 'courses.php', '', 1, '2017-06-10 13:01:42', '0000-00-00'),
(91, 23, 'Batches', 'batches.php', '', 1, '2017-06-10 13:02:08', '0000-00-00'),
(92, 23, 'Cast', 'cast.php', '', 1, '2017-06-10 13:09:17', '0000-00-00'),
(93, 23, 'Taluka', 'taluka.php', '', 1, '2017-06-10 13:11:15', '0000-00-00'),
(94, 23, 'States', 'states.php', '', 1, '2017-06-12 08:26:32', '0000-00-00'),
(95, 23, 'Add State', 'add-state.php', '', 1, '2017-06-12 08:26:56', '0000-00-00'),
(96, 23, 'Schools', 'schools.php', '', 1, '2017-06-12 13:45:52', '0000-00-00'),
(97, 31, 'Add Employee', 'add-employee.php', '', 1, '2017-06-20 09:17:53', '2017-06-30'),
(98, 31, 'Employee List', 'employee-list.php', '2', 1, '2017-06-20 09:18:10', '0000-00-00'),
(99, 31, 'Add Bank Detail', 'add-bank.php', '', 1, '2017-06-20 09:18:34', '0000-00-00'),
(100, 31, 'Employee Bank Details ', 'employee-bank-detail.php', '3', 1, '2017-06-20 09:18:54', '0000-00-00'),
(101, 31, 'Search Bank Details ', 'search-employee-bank-detail.php', '', 1, '2017-06-20 09:19:12', '2017-06-30'),
(102, 31, 'Search Department Wise Bank Details', 'search-employee-bank-detail-departmentwise.php', '', 1, '2017-06-20 09:19:30', '2017-07-01'),
(103, 32, 'Add Leave Category', 'add-leave-category.php', '', 1, '2017-06-20 09:21:01', '0000-00-00'),
(104, 32, 'Add Leave Detail', 'add-leave-details.php', '', 1, '2017-06-20 09:21:21', '0000-00-00'),
(105, 32, 'Leave Application', 'leave-application.php', '', 1, '2017-06-20 09:21:39', '0000-00-00'),
(106, 32, 'View Leaves', 'leave-leaves.php', '', 1, '2017-06-20 09:21:54', '0000-00-00'),
(107, 23, 'Department', 'department.php', '', 1, '2017-06-24 13:14:51', '0000-00-00'),
(108, 23, 'Designation', 'designation.php', '', 1, '2017-06-24 13:15:11', '0000-00-00'),
(109, 23, 'Document Type', 'document-type.php', '', 1, '2017-06-28 07:49:13', '0000-00-00'),
(110, 31, 'Add Employee', 'add-employee.php', '', 1, '2017-06-30 09:22:41', '2017-06-30'),
(111, 31, 'Add Employee', 'add-employee.php', '1', 1, '2017-07-05 08:09:04', '0000-00-00'),
(112, 0, '', '', '', 1, '2017-07-11 08:25:00', '2017-07-11');

-- --------------------------------------------------------

--
-- Table structure for table `page_categories`
--

CREATE TABLE `page_categories` (
  `id` bigint(11) NOT NULL,
  `cat_level` int(3) NOT NULL,
  `sub_cat_id` int(3) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `icon` text NOT NULL,
  `sortorder` char(5) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `datetimex` datetime NOT NULL,
  `endeffdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_categories`
--

INSERT INTO `page_categories` (`id`, `cat_level`, `sub_cat_id`, `category_name`, `icon`, `sortorder`, `status`, `datetimex`, `endeffdate`) VALUES
(1, 0, 0, 'Front Desk', 'mdi mdi-human-greeting', '', 1, '2017-04-10 07:42:54', '0000-00-00'),
(2, 0, 0, 'Student Admission', 'fa fa-male', '1', 1, '2017-04-10 08:00:31', '0000-00-00'),
(4, 0, 0, 'User Management', 'fa fa-user', '5', 1, '2017-04-10 08:07:04', '0000-00-00'),
(5, 0, 0, 'Document Management', 'mdi mdi-file-document-box', '', 1, '2017-04-10 12:05:48', '0000-00-00'),
(6, 0, 0, 'Event', 'fa  fa-futbol-o', '', 1, '2017-04-10 12:09:28', '0000-00-00'),
(8, 0, 0, 'Certificate Management', 'mdi mdi-account-card-details', '', 1, '2017-04-13 15:18:53', '0000-00-00'),
(9, 0, 0, 'Transport', 'fa fa-truck', '', 1, '2017-04-14 06:46:50', '0000-00-00'),
(10, 0, 0, 'General Setting', 'fa fa-cog', '', 1, '2017-04-15 07:45:00', '0000-00-00'),
(12, 0, 0, 'ID card Generator', 'mdi mdi-animation', '', 1, '2017-04-24 11:03:43', '0000-00-00'),
(13, 0, 0, 'Time Table', 'mdi mdi-calendar', '', 1, '2017-04-24 11:04:56', '0000-00-00'),
(14, 0, 0, 'Exam Management', 'mdi mdi-barcode', '', 1, '2017-04-24 11:07:13', '0000-00-00'),
(15, 0, 0, 'Sms & Email Alerts', 'mdi mdi-contact-mail', '', 1, '2017-04-24 11:09:27', '0000-00-00'),
(16, 0, 0, 'Task Manager', 'fa fa-tasks', '', 1, '2017-04-24 11:13:30', '0000-00-00'),
(17, 0, 0, 'Library', 'mdi mdi-library', '', 1, '2017-04-24 11:14:33', '0000-00-00'),
(18, 0, 0, 'Store & Enventory', 'mdi mdi-store', '', 1, '2017-04-24 11:16:47', '0000-00-00'),
(19, 0, 0, 'Reports', 'mdi mdi-monitor', '', 1, '2017-04-24 11:22:41', '0000-00-00'),
(20, 0, 0, 'Fee Management', 'mdi mdi-currency-inr', '4', 1, '2017-04-25 08:46:12', '0000-00-00'),
(22, 0, 0, 'Hostel', 'mdi mdi-hotel', '', 1, '2017-04-27 07:44:50', '0000-00-00'),
(23, 0, 0, 'Configuration', 'mdi mdi-settings', '6', 1, '2017-05-26 15:12:21', '0000-00-00'),
(31, 0, 0, 'HR  Management', 'fa  fa-graduation-cap', '2', 1, '2017-06-20 09:17:17', '0000-00-00'),
(32, 0, 0, 'Leave Management', 'fa  fa-male', '3', 1, '2017-06-20 09:20:44', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `dealer_id` int(11) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `mode` varchar(255) NOT NULL,
  `remark` text NOT NULL,
  `datetimex` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL,
  `endeffdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `dealer_id`, `amount`, `date`, `mode`, `remark`, `datetimex`, `updated_at`, `endeffdate`) VALUES
(6, 1, '1000', '2017-07-10', 'Cash', 'This is remarks\r\n', '2017-07-10 13:36:09', '2017-07-10 15:04:07', '0000-00-00'),
(7, 3, '90', '2017-07-11', 'Cash', '', '2017-07-11 15:11:17', '0000-00-00 00:00:00', '0000-00-00'),
(8, 2, '3000', '2017-07-11', 'Cash', '', '2017-07-11 15:23:28', '0000-00-00 00:00:00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `throttle`
--

CREATE TABLE `throttle` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attempts` int(11) NOT NULL DEFAULT '0',
  `suspended` tinyint(1) NOT NULL DEFAULT '0',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `last_attempt_at` timestamp NULL DEFAULT NULL,
  `suspended_at` timestamp NULL DEFAULT NULL,
  `banned_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `throttle`
--

INSERT INTO `throttle` (`id`, `user_id`, `ip_address`, `attempts`, `suspended`, `banned`, `last_attempt_at`, `suspended_at`, `banned_at`) VALUES
(29, 14, '::1', 0, 0, 0, NULL, NULL, NULL),
(30, 12, '::1', 0, 0, 0, NULL, NULL, NULL),
(31, 15, NULL, 0, 0, 0, NULL, NULL, NULL),
(32, 18, '::1', 0, 0, 0, NULL, NULL, NULL),
(33, 21, '::1', 0, 0, 0, NULL, NULL, NULL),
(34, 24, '::1', 3, 0, 0, '2017-02-22 23:38:45', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` bigint(20) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `browser` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `login_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `logout` varchar(255) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 for Success - 0 Fail'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `user_id`, `browser`, `ip_address`, `country`, `login_time`, `logout`, `status`) VALUES
(1, 'aa', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', '192.168.0.100', 'Unknown', '2017-07-10 12:03:13', '', 0),
(2, 'aa', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', '192.168.0.100', 'Unknown', '2017-07-10 12:13:07', '', 0),
(3, '18', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', '192.168.0.100', 'Unknown', '2017-07-10 12:13:52', '10-07-2017 05:44:48 PM', 1),
(4, '18', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', '192.168.0.100', 'Unknown', '2017-07-10 12:15:36', '2017-07-10 05:46:45 PM', 1),
(5, '18', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', '192.168.0.100', 'Unknown', '2017-07-10 12:41:47', '2017-07-10 06:11:52 PM', 1),
(6, '18', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', '192.168.0.100', 'Unknown', '2017-07-10 13:15:25', '', 1),
(7, '18', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', '192.168.0.150', 'Unknown', '2017-07-11 06:14:15', '', 1),
(8, '18', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', '192.168.0.100', 'Unknown', '2017-07-11 07:29:48', '2017-07-11 01:29:16 PM', 1),
(9, '18', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', '192.168.0.100', 'Unknown', '2017-07-11 07:59:25', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pincode` varchar(6) NOT NULL,
  `mobile_no` varchar(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` char(2) NOT NULL DEFAULT '1' COMMENT 'M- Master , A - Administrator , T - Teacher , S - Student',
  `package_id` bigint(11) NOT NULL,
  `modules` text NOT NULL,
  `hash` varchar(50) NOT NULL,
  `dealer_id` bigint(11) NOT NULL,
  `package_price` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0-deactive, 1-active',
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `datetimex` datetime NOT NULL,
  `endeffdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `address`, `city`, `pincode`, `mobile_no`, `username`, `email`, `password`, `user_type`, `package_id`, `modules`, `hash`, `dealer_id`, `package_price`, `status`, `startdate`, `enddate`, `datetimex`, `endeffdate`) VALUES
(30, 'sarman', 'Ranavaya', 'Timbavadibyepass', 'junagadh', '362001', '9727477438', 'sarman', 'sarman.ranavaya@gmail.com', '9214abb4630503af75ad424fe3e2915c', '1', 2, '', '9ca64bb3b145ccfb1d99086b210a372f', 1, '4000', 1, '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', '2017-07-11'),
(31, 'sarman', 'Ranavaya', 'Timbavadibyepass', 'junagadh', '362001', '9727477438', 'sarman', 'sarman.ranavaya@gmail.com', '9214abb4630503af75ad424fe3e2915c', '', 3, '', '9539e366bcb78324106c921f421280cb', 3, '1000', 1, '2017-07-11', '2017-08-11', '0000-00-00 00:00:00', '0000-00-00'),
(33, 'rinkal', 'satasiya', 'dhoraji', 'dhoraji', '362001', '9898742506', 'rinkal', 'rinkal@gmail.com', '189e06816fb8ce8355961d3ef16024c2', '', 10, '', '190e3b951783ec84bf7d3fb5c8bbeaad', 3, '100', 1, '2017-07-11', '2017-08-11', '0000-00-00 00:00:00', '0000-00-00'),
(34, 'Customer1', 'Customer1', 'aaa', 'Junagadh', '362001', '9898742506', 'customer', 'customer@gmail.com', '91ec1f9324753048c0096d036a694f86', '', 2, '', '4020bf17581e1c6c19387adb3977c2e6', 2, '4000', 1, '2017-07-11', '2017-08-11', '0000-00-00 00:00:00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `userstatistics`
--

CREATE TABLE `userstatistics` (
  `id` bigint(11) NOT NULL,
  `school_id` bigint(11) NOT NULL,
  `userid` bigint(11) NOT NULL,
  `ipaddress` varchar(15) NOT NULL,
  `page` varchar(255) NOT NULL,
  `pagepath` varchar(255) NOT NULL,
  `referrer` varchar(255) NOT NULL,
  `useragent` text NOT NULL,
  `remotehost` varchar(50) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `platform` varchar(50) NOT NULL,
  `datetime` datetime NOT NULL,
  `endeffdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dealer`
--
ALTER TABLE `dealer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_modules`
--
ALTER TABLE `package_modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_categories`
--
ALTER TABLE `page_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `throttle`
--
ALTER TABLE `throttle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `throttle_user_id_index` (`user_id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userstatistics`
--
ALTER TABLE `userstatistics`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dealer`
--
ALTER TABLE `dealer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `package_modules`
--
ALTER TABLE `package_modules`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;
--
-- AUTO_INCREMENT for table `page_categories`
--
ALTER TABLE `page_categories`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `throttle`
--
ALTER TABLE `throttle`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `userstatistics`
--
ALTER TABLE `userstatistics`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
