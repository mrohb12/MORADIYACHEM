/*
File name: C:/Users/ROHIT/Desktop/1.sql
Creation date: 08/05/2017
Created by MySQL to MS SQL 7.1 [Demo]
--------------------------------------------------
More conversion tools at http://www.convert-in.com
*/
USE master;
GO

if exists(select * from master.sys.databases where name='1') DROP DATABASE [1];
CREATE DATABASE [1];
GO
USE [1];
GO
SET QUOTED_IDENTIFIER ON;
GO

/*
Table structure for table '[dbo].[dealer]'
*/

IF OBJECT_ID ('[dbo].[dealer]', 'U') IS NOT NULL
DROP TABLE [dbo].[dealer];
GO
CREATE TABLE [dbo].[dealer] (
	[id] INT IDENTITY NOT NULL,
	[name] NVARCHAR(255)  NOT NULL,
	[email] NVARCHAR(255)  NOT NULL,
	[username] NVARCHAR(50)  NOT NULL,
	[password] NVARCHAR(255)  NOT NULL,
	[mobileno] NVARCHAR(255)  NOT NULL,
	[address] NVARCHAR(MAX) NOT NULL,
	[city] NVARCHAR(255) ,
	[pincode] NVARCHAR(255)  NOT NULL,
	[commission] INT NOT NULL DEFAULT 0,
	[status] INT NOT NULL DEFAULT 0,
	[user_type] NVARCHAR(30)  NOT NULL,
	[datetimex] DATETIME,
	[updated_at] DATETIME,
	[endeffdate] DATE
)
GO
CREATE CLUSTERED INDEX [id_clust_idx] ON [dbo].[dealer]([id])
GO

/*
Dumping data for table '[dbo].[dealer]'
*/

SET IDENTITY_INSERT [dbo].[dealer] ON;
GO
INSERT INTO [dbo].[dealer] ([id], [name], [email], [username], [password], [mobileno], [address], [city], [pincode], [commission], [status], [user_type], [datetimex], [updated_at], [endeffdate]) VALUES (1, N'Sarman Ranavayaw', N'sgranavaya@rediffmail.com', '', '', N'9727477438', N'9727477438', N'Junagadh', N'362001', 15, 1, '', '2017-07-10 09:42:24', '2017-07-10 11:32:28', '00:00:00');
GO

INSERT INTO [dbo].[dealer] ([id], [name], [email], [username], [password], [mobileno], [address], [city], [pincode], [commission], [status], [user_type], [datetimex], [updated_at], [endeffdate]) VALUES (2, N'Viraj Parmar', N'viraj@gmail.com', N'admin', N'21232f297a57a5a743894a0e4a801fc3', N'134567989', N'134567989', N'Junagadh', N'362001', 18, 1, N'Admin', '2017-07-10 11:48:48', '2017-07-11 09:12:00', '00:00:00');
GO

INSERT INTO [dbo].[dealer] ([id], [name], [email], [username], [password], [mobileno], [address], [city], [pincode], [commission], [status], [user_type], [datetimex], [updated_at], [endeffdate]) VALUES (3, N'sarman', N'sarman@gmail.com', N'sarman', N'e00cf25ad42683b3df678c61f42c6bda', N'9898742506', N'9898742506', N'Junagadh', N'362001', 10, 1, '', '2017-07-11 08:40:22', '2017-07-11 09:11:48', '00:00:00');
GO

SET IDENTITY_INSERT [dbo].[dealer] OFF;
GO

/*
Table structure for table '[dbo].[package_modules]'
*/

IF OBJECT_ID ('[dbo].[package_modules]', 'U') IS NOT NULL
DROP TABLE [dbo].[package_modules];
GO
CREATE TABLE [dbo].[package_modules] (
	[id] BIGINT IDENTITY NOT NULL,
	[package_id] BIGINT NOT NULL,
	[user_id] BIGINT NOT NULL,
	[modules] NVARCHAR(MAX) NOT NULL,
	[datetimex] DATETIME,
	[endeffdate] DATE
)
GO
CREATE CLUSTERED INDEX [id_clust_idx] ON [dbo].[package_modules]([id])
GO

/*
Dumping data for table '[dbo].[package_modules]'
*/

SET IDENTITY_INSERT [dbo].[package_modules] ON;
GO
INSERT INTO [dbo].[package_modules] ([id], [package_id], [user_id], [modules], [datetimex], [endeffdate]) VALUES (1, 3, 18, N'{"1":"14,15,16,17","2":"6,7","4":"1,2,30,31,35"}', '2017-07-11 12:55:56', '00:00:00');
GO

SET IDENTITY_INSERT [dbo].[package_modules] OFF;
GO

/*
Table structure for table '[dbo].[packages]'
*/

IF OBJECT_ID ('[dbo].[packages]', 'U') IS NOT NULL
DROP TABLE [dbo].[packages];
GO
CREATE TABLE [dbo].[packages] (
	[id] INT IDENTITY NOT NULL,
	[name] NVARCHAR(255)  NOT NULL,
	[price] NVARCHAR(255)  NOT NULL,
	[validity] NVARCHAR(50)  NOT NULL,
	[full_right_user] NVARCHAR(9)  NOT NULL,
	[view_only_user] NVARCHAR(9)  NOT NULL,
	[application] NVARCHAR(255)  NOT NULL,
	[status] INT NOT NULL DEFAULT 1,
	[created_at] DATETIME NOT NULL DEFAULT 'CURRENT_TIMESTAMP',
	[updated_at] DATETIME
)
GO
CREATE CLUSTERED INDEX [id_clust_idx] ON [dbo].[packages]([id])
GO

/*
Dumping data for table '[dbo].[packages]'
*/

SET IDENTITY_INSERT [dbo].[packages] ON;
GO
INSERT INTO [dbo].[packages] ([id], [name], [price], [validity], [full_right_user], [view_only_user], [application], [status], [created_at], [updated_at]) VALUES (2, N'Testing Package 2', N'4000', N'1m', N'1', N'99', N'["Softwares","Website"]', 1, '2017-01-10 13:24:53', '00:00:00');
GO

INSERT INTO [dbo].[packages] ([id], [name], [price], [validity], [full_right_user], [view_only_user], [application], [status], [created_at], [updated_at]) VALUES (3, N'Full Package', N'1000', N'1m', N'1', N'99', N'["Softwares","Website","Applications"]', 1, '2017-02-09 14:05:37', '00:00:00');
GO

INSERT INTO [dbo].[packages] ([id], [name], [price], [validity], [full_right_user], [view_only_user], [application], [status], [created_at], [updated_at]) VALUES (10, N'Temporary Package', N'100', N'1y', N'1', N'99', N'["Applications"]', 1, '2017-05-19 09:54:01', '00:00:00');
GO

INSERT INTO [dbo].[packages] ([id], [name], [price], [validity], [full_right_user], [view_only_user], [application], [status], [created_at], [updated_at]) VALUES (11, N'Testing Package', N'100', N'1m', N'99', N'1', '', 1, '2017-07-11 07:30:19', '00:00:00');
GO

INSERT INTO [dbo].[packages] ([id], [name], [price], [validity], [full_right_user], [view_only_user], [application], [status], [created_at], [updated_at]) VALUES (12, N'Testing package 1', N'200', N'1y', N'1', N'99', '', 1, '2017-07-11 08:53:39', '00:00:00');
GO

SET IDENTITY_INSERT [dbo].[packages] OFF;
GO

/*
Table structure for table '[dbo].[page_categories]'
*/

IF OBJECT_ID ('[dbo].[page_categories]', 'U') IS NOT NULL
DROP TABLE [dbo].[page_categories];
GO
CREATE TABLE [dbo].[page_categories] (
	[id] BIGINT IDENTITY NOT NULL,
	[cat_level] INT NOT NULL,
	[sub_cat_id] INT NOT NULL,
	[category_name] NVARCHAR(50)  NOT NULL,
	[icon] NVARCHAR(MAX) NOT NULL,
	[sortorder] NVARCHAR(15)  NOT NULL,
	[status] INT NOT NULL,
	[datetimex] DATETIME,
	[endeffdate] DATE
)
GO
CREATE CLUSTERED INDEX [id_clust_idx] ON [dbo].[page_categories]([id])
GO

/*
Dumping data for table '[dbo].[page_categories]'
*/

SET IDENTITY_INSERT [dbo].[page_categories] ON;
GO
INSERT INTO [dbo].[page_categories] ([id], [cat_level], [sub_cat_id], [category_name], [icon], [sortorder], [status], [datetimex], [endeffdate]) VALUES (1, 0, 0, N'Front Desk', N'mdi mdi-human-greeting', '', 1, '2017-04-10 07:42:54', '00:00:00');
GO

INSERT INTO [dbo].[page_categories] ([id], [cat_level], [sub_cat_id], [category_name], [icon], [sortorder], [status], [datetimex], [endeffdate]) VALUES (2, 0, 0, N'Student Admission', N'fa fa-male', N'1', 1, '2017-04-10 08:00:31', '00:00:00');
GO

INSERT INTO [dbo].[page_categories] ([id], [cat_level], [sub_cat_id], [category_name], [icon], [sortorder], [status], [datetimex], [endeffdate]) VALUES (4, 0, 0, N'User Management', N'fa fa-user', N'5', 1, '2017-04-10 08:07:04', '00:00:00');
GO

INSERT INTO [dbo].[page_categories] ([id], [cat_level], [sub_cat_id], [category_name], [icon], [sortorder], [status], [datetimex], [endeffdate]) VALUES (5, 0, 0, N'Document Management', N'mdi mdi-file-document-box', '', 1, '2017-04-10 12:05:48', '00:00:00');
GO

INSERT INTO [dbo].[page_categories] ([id], [cat_level], [sub_cat_id], [category_name], [icon], [sortorder], [status], [datetimex], [endeffdate]) VALUES (6, 0, 0, N'Event', N'fa  fa-futbol-o', '', 1, '2017-04-10 12:09:28', '00:00:00');
GO

INSERT INTO [dbo].[page_categories] ([id], [cat_level], [sub_cat_id], [category_name], [icon], [sortorder], [status], [datetimex], [endeffdate]) VALUES (8, 0, 0, N'Certificate Management', N'mdi mdi-account-card-details', '', 1, '2017-04-13 15:18:53', '00:00:00');
GO

INSERT INTO [dbo].[page_categories] ([id], [cat_level], [sub_cat_id], [category_name], [icon], [sortorder], [status], [datetimex], [endeffdate]) VALUES (9, 0, 0, N'Transport', N'fa fa-truck', '', 1, '2017-04-14 06:46:50', '00:00:00');
GO

INSERT INTO [dbo].[page_categories] ([id], [cat_level], [sub_cat_id], [category_name], [icon], [sortorder], [status], [datetimex], [endeffdate]) VALUES (10, 0, 0, N'General Setting', N'fa fa-cog', '', 1, '2017-04-15 07:45:00', '00:00:00');
GO

INSERT INTO [dbo].[page_categories] ([id], [cat_level], [sub_cat_id], [category_name], [icon], [sortorder], [status], [datetimex], [endeffdate]) VALUES (12, 0, 0, N'ID card Generator', N'mdi mdi-animation', '', 1, '2017-04-24 11:03:43', '00:00:00');
GO

INSERT INTO [dbo].[page_categories] ([id], [cat_level], [sub_cat_id], [category_name], [icon], [sortorder], [status], [datetimex], [endeffdate]) VALUES (13, 0, 0, N'Time Table', N'mdi mdi-calendar', '', 1, '2017-04-24 11:04:56', '00:00:00');
GO

INSERT INTO [dbo].[page_categories] ([id], [cat_level], [sub_cat_id], [category_name], [icon], [sortorder], [status], [datetimex], [endeffdate]) VALUES (14, 0, 0, N'Exam Management', N'mdi mdi-barcode', '', 1, '2017-04-24 11:07:13', '00:00:00');
GO

INSERT INTO [dbo].[page_categories] ([id], [cat_level], [sub_cat_id], [category_name], [icon], [sortorder], [status], [datetimex], [endeffdate]) VALUES (15, 0, 0, N'Sms & Email Alerts', N'mdi mdi-contact-mail', '', 1, '2017-04-24 11:09:27', '00:00:00');
GO

INSERT INTO [dbo].[page_categories] ([id], [cat_level], [sub_cat_id], [category_name], [icon], [sortorder], [status], [datetimex], [endeffdate]) VALUES (16, 0, 0, N'Task Manager', N'fa fa-tasks', '', 1, '2017-04-24 11:13:30', '00:00:00');
GO

INSERT INTO [dbo].[page_categories] ([id], [cat_level], [sub_cat_id], [category_name], [icon], [sortorder], [status], [datetimex], [endeffdate]) VALUES (17, 0, 0, N'Library', N'mdi mdi-library', '', 1, '2017-04-24 11:14:33', '00:00:00');
GO

INSERT INTO [dbo].[page_categories] ([id], [cat_level], [sub_cat_id], [category_name], [icon], [sortorder], [status], [datetimex], [endeffdate]) VALUES (18, 0, 0, N'Store & Enventory', N'mdi mdi-store', '', 1, '2017-04-24 11:16:47', '00:00:00');
GO

INSERT INTO [dbo].[page_categories] ([id], [cat_level], [sub_cat_id], [category_name], [icon], [sortorder], [status], [datetimex], [endeffdate]) VALUES (19, 0, 0, N'Reports', N'mdi mdi-monitor', '', 1, '2017-04-24 11:22:41', '00:00:00');
GO

INSERT INTO [dbo].[page_categories] ([id], [cat_level], [sub_cat_id], [category_name], [icon], [sortorder], [status], [datetimex], [endeffdate]) VALUES (20, 0, 0, N'Fee Management', N'mdi mdi-currency-inr', N'4', 1, '2017-04-25 08:46:12', '00:00:00');
GO

INSERT INTO [dbo].[page_categories] ([id], [cat_level], [sub_cat_id], [category_name], [icon], [sortorder], [status], [datetimex], [endeffdate]) VALUES (22, 0, 0, N'Hostel', N'mdi mdi-hotel', '', 1, '2017-04-27 07:44:50', '00:00:00');
GO

INSERT INTO [dbo].[page_categories] ([id], [cat_level], [sub_cat_id], [category_name], [icon], [sortorder], [status], [datetimex], [endeffdate]) VALUES (23, 0, 0, N'Configuration', N'mdi mdi-settings', N'6', 1, '2017-05-26 15:12:21', '00:00:00');
GO

INSERT INTO [dbo].[page_categories] ([id], [cat_level], [sub_cat_id], [category_name], [icon], [sortorder], [status], [datetimex], [endeffdate]) VALUES (31, 0, 0, N'HR  Management', N'fa  fa-graduation-cap', N'2', 1, '2017-06-20 09:17:17', '00:00:00');
GO

INSERT INTO [dbo].[page_categories] ([id], [cat_level], [sub_cat_id], [category_name], [icon], [sortorder], [status], [datetimex], [endeffdate]) VALUES (32, 0, 0, N'Leave Management', N'fa  fa-male', N'3', 1, '2017-06-20 09:20:44', '00:00:00');
GO

SET IDENTITY_INSERT [dbo].[page_categories] OFF;
GO

/*
Table structure for table '[dbo].[pages]'
*/

IF OBJECT_ID ('[dbo].[pages]', 'U') IS NOT NULL
DROP TABLE [dbo].[pages];
GO
CREATE TABLE [dbo].[pages] (
	[id] INT IDENTITY NOT NULL,
	[category_id] BIGINT NOT NULL,
	[pagename] NVARCHAR(255)  NOT NULL,
	[file] NVARCHAR(255)  NOT NULL,
	[sortorder] NVARCHAR(5)  NOT NULL,
	[status] INT NOT NULL DEFAULT 1,
	[datetimex] DATETIME,
	[endeffdate] DATE
)
GO
CREATE CLUSTERED INDEX [id_clust_idx] ON [dbo].[pages]([id])
GO

/*
Dumping data for table '[dbo].[pages]'
*/

SET IDENTITY_INSERT [dbo].[pages] ON;
GO
INSERT INTO [dbo].[pages] ([id], [category_id], [pagename], [file], [sortorder], [status], [datetimex], [endeffdate]) VALUES (1, 4, N'Add User', N'add-user.php', '', 1, '2017-03-01 08:08:35', '00:00:00');
GO

INSERT INTO [dbo].[pages] ([id], [category_id], [pagename], [file], [sortorder], [status], [datetimex], [endeffdate]) VALUES (2, 4, N'View Users', N'users.php', '', 1, '2017-03-01 08:08:44', '00:00:00');
GO

INSERT INTO [dbo].[pages] ([id], [category_id], [pagename], [file], [sortorder], [status], [datetimex], [endeffdate]) VALUES (3, 4, N'View Pages', N'pages.php', '', 1, '2017-03-01 13:42:29', '2017-04-15');
GO

INSERT INTO [dbo].[pages] ([id], [category_id], [pagename], [file], [sortorder], [status], [datetimex], [endeffdate]) VALUES (4, 4, N'Add Page', N'add-page.php', '', 1, '2017-03-02 06:48:15', '2017-03-02');
GO

INSERT INTO [dbo].[pages] ([id], [category_id], [pagename], [file], [sortorder], [status], [datetimex], [endeffdate]) VALUES (6, 2, N'Student Registration', N'student-admission.php', N'1', 1, '2017-04-10 08:30:52', '00:00:00');
GO

INSERT INTO [dbo].[pages] ([id], [category_id], [pagename], [file], [sortorder], [status], [datetimex], [endeffdate]) VALUES (7, 2, N'View Students', N'students.php', N'2', 1, '2017-04-10 08:51:26', '00:00:00');
GO

INSERT INTO [dbo].[pages] ([id], [category_id], [pagename], [file], [sortorder], [status], [datetimex], [endeffdate]) VALUES (8, 5, N'Category', N'document-category.php', '', 1, '2017-04-10 12:06:48', '00:00:00');
GO

INSERT INTO [dbo].[pages] ([id], [category_id], [pagename], [file], [sortorder], [status], [datetimex], [endeffdate]) VALUES (9, 5, N'Sub Category', N'document-sub-category.php', '', 1, '2017-04-10 12:07:15', '00:00:00');
GO

INSERT INTO [dbo].[pages] ([id], [category_id], [pagename], [file], [sortorder], [status], [datetimex], [endeffdate]) VALUES (10, 5, N'Upload Document', N'document-upload.php', '', 1, '2017-04-10 12:07:36', '00:00:00');
GO

INSERT INTO [dbo].[pages] ([id], [category_id], [pagename], [file], [sortorder], [status], [datetimex], [endeffdate]) VALUES (11, 6, N'Event Type', N'add-event-type.php', '', 1, '2017-04-10 12:09:59', '2017-07-05');
GO

INSERT INTO [dbo].[pages] ([id], [category_id], [pagename], [file], [sortorder], [status], [datetimex], [endeffdate]) VALUES (12, 6, N'Add Event', N'add-event.php', '', 1, '2017-04-10 12:10:17', '2017-07-05');
GO

INSERT INTO [dbo].[pages] ([id], [category_id], [pagename], [file], [sortorder], [status], [datetimex], [endeffdate]) VALUES (13, 6, N'View Events', N'events.php', '', 1, '2017-04-10 12:10:33', '00:00:00');
GO

INSERT INTO [dbo].[pages] ([id], [category_id], [pagename], [file], [sortorder], [status], [datetimex], [endeffdate]) VALUES (14, 1, N'Student Information', N'student-hirarcy.php', '', 1, '2017-04-11 10:58:41', '00:00:00');
GO

INSERT INTO [dbo].[pages] ([id], [category_id], [pagename], [file], [sortorder], [status], [datetimex], [endeffdate]) VALUES (15, 1, N'Guardian’s Info', N'guardians.php', '', 1, '2017-04-11 10:59:14', '00:00:00');
GO

INSERT INTO [dbo].[pages] ([id], [category_id], [pagename], [file], [sortorder], [status], [datetimex], [endeffdate]) VALUES (16, 1, N'Student Roll Number', N'student-rollnumber.php', '', 1, '2017-04-11 11:24:52', '00:00:00');
GO

INSERT INTO [dbo].[pages] ([id], [category_id], [pagename], [file], [sortorder], [status], [datetimex], [endeffdate]) VALUES (17, 1, N'Print Student’s List ', N'student-report.php', '', 1, '2017-04-11 11:32:54', '00:00:00');
GO

INSERT INTO [dbo].[pages] ([id], [category_id], [pagename], [file], [sortorder], [status], [datetimex], [endeffdate]) VALUES (18, 1, N'asdada', N'a.php', '', 1, '2017-04-11 13:35:38', '2017-04-11');
GO

INSERT INTO [dbo].[pages] ([id], [category_id], [pagename], [file], [sortorder], [status], [datetimex], [endeffdate]) VALUES (19, 8, N'Certificate Type', N'certificate-type.php', '', 1, '2017-04-13 15:19:21', '2017-07-05');
GO

INSERT INTO [dbo].[pages] ([id], [category_id], [pagename], [file], [sortorder], [status], [datetimex], [endeffdate]) VALUES (20, 8, N'Custom Certificate', N'custom-certificate.php', '', 1, '2017-04-13 15:19:37', '2017-07-05');
GO

INSERT INTO [dbo].[pages] ([id], [category_id], [pagename], [file], [sortorder], [status], [datetimex], [endeffdate]) VALUES (21, 8, N'Generate Certificate', N'generate-certificate.php', '', 1, '2017-04-13 15:19:52', '2017-07-05');
GO

INSERT INTO [dbo].[pages] ([id], [category_id], [pagename], [file], [sortorder], [status], [datetimex], [endeffdate]) VALUES (22, 8, N'Issued Certificate List', N'issued-certificate-list.php', '', 1, '2017-04-13 15:20:07', '2017-07-05');
GO

INSERT INTO [dbo].[pages] ([id], [category_id], [pagename], [file], [sortorder], [status], [datetimex], [endeffdate]) VALUES (23, 9, N'Add Vehicle', N'javascript:;', '', 1, '2017-04-14 06:47:04', '00:00:00');
GO

INSERT INTO [dbo].[pages] ([id], [category_id], [pagename], [file], [sortorder], [status], [datetimex], [endeffdate]) VALUES (24, 9, N'Add Driver', N'javascript:;', '', 1, '2017-04-14 06:47:23', '00:00:00');
GO

INSERT INTO [dbo].[pages] ([id], [category_id], [pagename], [file], [sortorder], [status], [datetimex], [endeffdate]) VALUES (25, 9, N'Add Route', N'javascript:;', '', 1, '2017-04-14 06:47:36', '00:00:00');
GO

INSERT INTO [dbo].[pages] ([id], [category_id], [pagename], [file], [sortorder], [status], [datetimex], [endeffdate]) VALUES (26, 9, N'Add Destination', N'javascript:;', '', 1, '2017-04-14 06:47:47', '00:00:00');
GO

INSERT INTO [dbo].[pages] ([id], [category_id], [pagename], [file], [sortorder], [status], [datetimex], [endeffdate]) VALUES (27, 9, N'Fee Collection', N'javascript:;', '', 1, '2017-04-14 06:47:59', '00:00:00');
GO

INSERT INTO [dbo].[pages] ([id], [category_id], [pagename], [file], [sortorder], [status], [datetimex], [endeffdate]) VALUES (28, 9, N'SMS Alert', N'javascript:;', '', 1, '2017-04-14 06:48:14', '00:00:00');
GO

INSERT INTO [dbo].[pages] ([id], [category_id], [pagename], [file], [sortorder], [status], [datetimex], [endeffdate]) VALUES (29, 4, N'Visitor Statistics', N'visitor-statistics.php', '', 1, '2017-04-15 07:42:14', '2017-07-05');
GO

INSERT INTO [dbo].[pages] ([id], [category_id], [pagename], [file], [sortorder], [status], [datetimex], [endeffdate]) VALUES (30, 4, N'Visitors List', N'javascript:;', '', 1, '2017-04-15 07:42:34', '00:00:00');
GO

INSERT INTO [dbo].[pages] ([id], [category_id], [pagename], [file], [sortorder], [status], [datetimex], [endeffdate]) VALUES (31, 4, N'Assign Courses', N'javascript:;', '', 1, '2017-04-15 07:42:50', '00:00:00');
GO

INSERT INTO [dbo].[pages] ([id], [category_id], [pagename], [file], [sortorder], [status], [datetimex], [endeffdate]) VALUES (32, 0, N'Institution Details', N'institute-profile.php', '', 1, '2017-04-15 07:45:23', '2017-04-15');
GO

INSERT INTO [dbo].[pages] ([id], [category_id], [pagename], [file], [sortorder], [status], [datetimex], [endeffdate]) VALUES (33, 10, N'General Setting', N'general-setting.php', '', 1, '2017-04-15 07:45:42', '2017-07-05');
GO

INSERT INTO [dbo].[pages] ([id], [category_id], [pagename], [file], [sortorder], [status], [datetimex], [endeffdate]) VALUES (34, 10, N'Institution Details', N'institute-profile.php', '', 1, '2017-04-15 07:46:28', '00:00:00');
GO

INSERT INTO [dbo].[pages] ([id], [category_id], [pagename], [file], [sortorder], [status], [datetimex], [endeffdate]) VALUES (35, 4, N'Assign Roles', N'assign-roles.php', '', 1, '2017-04-15 08:32:20', '00:00:00');
GO

INSERT INTO [dbo].[pages] ([id], [category_id], [pagename], [file], [sortorder], [status], [datetimex], [endeffdate]) VALUES (36, 11, N'abcd', N'abcd.php', '', 1, '2017-04-24 06:48:25', '2017-04-24');
GO

INSERT INTO [dbo].[pages] ([id], [category_id], [pagename], [file], [sortorder], [status], [datetimex], [endeffdate]) VALUES (37, 12, N'ID Card Type', N'id-card-type.php', '', 1, '2017-04-24 11:04:08', '2017-07-05');
GO

INSERT INTO [dbo].[pages] ([id], [category_id], [pagename], [file], [sortorder], [status], [datetimex], [endeffdate]) VALUES (38, 12, N'Generate ID Card', N'generate-id-card.php', '', 1, '2017-04-24 11:04:28', '2017-07-05');
GO

INSERT INTO [dbo].[pages] ([id], [category_id], [pagename], [file], [sortorder], [status], [datetimex], [endeffdate]) VALUES (39, 13, N'Calendar', N'calendar.php', '', 1, '2017-04-24 11:05:16', '00:00:00');
GO

INSERT INTO [dbo].[pages] ([id], [category_id], [pagename], [file], [sortorder], [status], [datetimex], [endeffdate]) VALUES (40, 13, N'Set Time Table', N'set-timetable.php', '', 1, '2017-04-24 11:05:32', '00:00:00');
GO

INSERT INTO [dbo].[pages] ([id], [category_id], [pagename], [file], [sortorder], [status], [datetimex], [endeffdate]) VALUES (41, 13, N'View Time Table', N'view-timetable.php', '', 1, '2017-04-24 11:05:47', '00:00:00');
GO

INSERT INTO [dbo].[pages] ([id], [category_id], [pagename], [file], [sortorder], [status], [datetimex], [endeffdate]) VALUES (42, 13, N'View Batch Time Table', N'view-batch-timetable.php', '', 1, '2017-04-24 11:06:03', '00:00:00');
GO

INSERT INTO [dbo].[pages] ([id], [category_id], [pagename], [file], [sortorder], [status], [datetimex], [endeffdate]) VALUES (43, 13, N'View Teachers Time Table', N'view-teachers-timetable.php', '', 1, '2017-04-24 11:06:32', '00:00:00');
GO

INSERT INTO [dbo].[pages] ([id], [category_id], [pagename], [file], [sortorder], [status], [datetimex], [endeffdate]) VALUES (44, 13, N'Teacher Working Hours', N'view-teachers-working-hours.php', '', 1, '2017-04-24 11:06:51', '00:00:00');
GO

INSERT INTO [dbo].[pages] ([id], [category_id], [pagename], [file], [sortorder], [status], [datetimex], [endeffdate]) VALUES (45, 14, N'Set Exam Term', N'set-exam-term.php', '', 1, '2017-04-24 11:07:30', '00:00:00');
GO

INSERT INTO [dbo].[pages] ([id], [category_id], [pagename], [file], [sortorder], [status], [datetimex], [endeffdate]) VALUES (46, 14, N'Set Exam', N'set-exam.php', '', 1, '2017-04-24 11:07:49', '00:00:00');
GO

INSERT INTO [dbo].[pages] ([id], [category_id], [pagename], [file], [sortorder], [status], [datetimex], [endeffdate]) VALUES (47, 14, N'Exam List', N'exam-list.php', '', 1, '2017-04-24 11:08:04', '00:00:00');
GO

INSERT INTO [dbo].[pages] ([id], [category_id], [pagename], [file], [sortorder], [status], [datetimex], [endeffdate]) VALUES (48, 0, '', '', '', 1, '2017-04-24 11:08:08', '2017-04-24');
GO

INSERT INTO [dbo].[pages] ([id], [category_id], [pagename], [file], [sortorder], [status], [datetimex], [endeffdate]) VALUES (49, 14, N'Exam Report', N'exam-report.php', '', 1, '2017-04-24 11:08:24', '00:00:00');
GO

INSERT INTO [dbo].[pages] ([id], [category_id], [pagename], [file], [sortorder], [status], [datetimex], [endeffdate]) VALUES (50, 14, N'Broad Sheet', N'broad-sheet.php', '', 1, '2017-04-24 11:08:41', '00:00:00');
GO

INSERT INTO [dbo].[pages] ([id], [category_id], [pagename], [file], [sortorder], [status], [datetimex], [endeffdate]) VALUES (51, 15, N'Mailbox', N'mailbox.php', '', 1, '2017-04-24 11:09:49', '00:00:00');
GO

SET IDENTITY_INSERT [dbo].[pages] OFF;
GO

/*
Table structure for table '[dbo].[payment]'
*/

IF OBJECT_ID ('[dbo].[payment]', 'U') IS NOT NULL
DROP TABLE [dbo].[payment];
GO
CREATE TABLE [dbo].[payment] (
	[id] INT IDENTITY NOT NULL,
	[dealer_id] INT NOT NULL,
	[amount] NVARCHAR(255)  NOT NULL,
	[date] DATE,
	[mode] NVARCHAR(255)  NOT NULL,
	[remark] NVARCHAR(MAX) NOT NULL,
	[datetimex] DATETIME NOT NULL DEFAULT 'CURRENT_TIMESTAMP',
	[updated_at] DATETIME,
	[endeffdate] DATE
)
GO
CREATE CLUSTERED INDEX [id_clust_idx] ON [dbo].[payment]([id])
GO

/*
Dumping data for table '[dbo].[payment]'
*/

SET IDENTITY_INSERT [dbo].[payment] ON;
GO
INSERT INTO [dbo].[payment] ([id], [dealer_id], [amount], [date], [mode], [remark], [datetimex], [updated_at], [endeffdate]) VALUES (6, 1, N'1000', '2017-07-10', N'Cash', N'This is remarks
', '2017-07-10 13:36:09', '2017-07-10 15:04:07', '00:00:00');
GO

INSERT INTO [dbo].[payment] ([id], [dealer_id], [amount], [date], [mode], [remark], [datetimex], [updated_at], [endeffdate]) VALUES (7, 3, N'90', '2017-07-11', N'Cash', '', '2017-07-11 15:11:17', '00:00:00', '00:00:00');
GO

INSERT INTO [dbo].[payment] ([id], [dealer_id], [amount], [date], [mode], [remark], [datetimex], [updated_at], [endeffdate]) VALUES (8, 2, N'3000', '2017-07-11', N'Cash', '', '2017-07-11 15:23:28', '00:00:00', '00:00:00');
GO

SET IDENTITY_INSERT [dbo].[payment] OFF;
GO

/*
Table structure for table '[dbo].[throttle]'
*/

IF OBJECT_ID ('[dbo].[throttle]', 'U') IS NOT NULL
DROP TABLE [dbo].[throttle];
GO
CREATE TABLE [dbo].[throttle] (
	[id] INT IDENTITY NOT NULL,
	[user_id] INT,
	[ip_address] NVARCHAR(255) ,
	[attempts] INT NOT NULL DEFAULT 0,
	[suspended] INT NOT NULL DEFAULT 0,
	[banned] INT NOT NULL DEFAULT 0,
	[last_attempt_at] DATETIME,
	[suspended_at] DATETIME,
	[banned_at] DATETIME
)
GO
CREATE CLUSTERED INDEX [id_clust_idx] ON [dbo].[throttle]([id])
GO

/*
Dumping data for table '[dbo].[throttle]'
*/

SET IDENTITY_INSERT [dbo].[throttle] ON;
GO
INSERT INTO [dbo].[throttle] ([id], [user_id], [ip_address], [attempts], [suspended], [banned], [last_attempt_at], [suspended_at], [banned_at]) VALUES (29, 14, N'::1', 0, 0, 0, NULL, NULL, NULL);
GO

INSERT INTO [dbo].[throttle] ([id], [user_id], [ip_address], [attempts], [suspended], [banned], [last_attempt_at], [suspended_at], [banned_at]) VALUES (30, 12, N'::1', 0, 0, 0, NULL, NULL, NULL);
GO

INSERT INTO [dbo].[throttle] ([id], [user_id], [ip_address], [attempts], [suspended], [banned], [last_attempt_at], [suspended_at], [banned_at]) VALUES (31, 15, NULL, 0, 0, 0, NULL, NULL, NULL);
GO

INSERT INTO [dbo].[throttle] ([id], [user_id], [ip_address], [attempts], [suspended], [banned], [last_attempt_at], [suspended_at], [banned_at]) VALUES (32, 18, N'::1', 0, 0, 0, NULL, NULL, NULL);
GO

INSERT INTO [dbo].[throttle] ([id], [user_id], [ip_address], [attempts], [suspended], [banned], [last_attempt_at], [suspended_at], [banned_at]) VALUES (33, 21, N'::1', 0, 0, 0, NULL, NULL, NULL);
GO

INSERT INTO [dbo].[throttle] ([id], [user_id], [ip_address], [attempts], [suspended], [banned], [last_attempt_at], [suspended_at], [banned_at]) VALUES (34, 24, N'::1', 3, 0, 0, '2017-02-23 05:08:45', NULL, NULL);
GO

CREATE INDEX [throttle_user_id_index] ON [dbo].[throttle]([user_id])
GO
SET IDENTITY_INSERT [dbo].[throttle] OFF;
GO

/*
Table structure for table '[dbo].[userlog]'
*/

IF OBJECT_ID ('[dbo].[userlog]', 'U') IS NOT NULL
DROP TABLE [dbo].[userlog];
GO
CREATE TABLE [dbo].[userlog] (
	[id] BIGINT IDENTITY NOT NULL,
	[user_id] NVARCHAR(255)  NOT NULL,
	[browser] NVARCHAR(255)  NOT NULL,
	[ip_address] NVARCHAR(255)  NOT NULL,
	[country] NVARCHAR(255)  NOT NULL,
	[login_time] DATETIME NOT NULL DEFAULT 'CURRENT_TIMESTAMP',
	[logout] NVARCHAR(255)  NOT NULL,
	[status] INT NOT NULL
)
GO
CREATE CLUSTERED INDEX [id_clust_idx] ON [dbo].[userlog]([id])
GO

/*
Dumping data for table '[dbo].[userlog]'
*/

SET IDENTITY_INSERT [dbo].[userlog] ON;
GO
INSERT INTO [dbo].[userlog] ([id], [user_id], [browser], [ip_address], [country], [login_time], [logout], [status]) VALUES (1, N'aa', N'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', N'192.168.0.100', N'Unknown', '2017-07-10 17:33:13', '', 0);
GO

INSERT INTO [dbo].[userlog] ([id], [user_id], [browser], [ip_address], [country], [login_time], [logout], [status]) VALUES (2, N'aa', N'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', N'192.168.0.100', N'Unknown', '2017-07-10 17:43:07', '', 0);
GO

INSERT INTO [dbo].[userlog] ([id], [user_id], [browser], [ip_address], [country], [login_time], [logout], [status]) VALUES (3, N'18', N'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', N'192.168.0.100', N'Unknown', '2017-07-10 17:43:52', N'10-07-2017 05:44:48 PM', 1);
GO

INSERT INTO [dbo].[userlog] ([id], [user_id], [browser], [ip_address], [country], [login_time], [logout], [status]) VALUES (4, N'18', N'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', N'192.168.0.100', N'Unknown', '2017-07-10 17:45:36', N'2017-07-10 05:46:45 PM', 1);
GO

INSERT INTO [dbo].[userlog] ([id], [user_id], [browser], [ip_address], [country], [login_time], [logout], [status]) VALUES (5, N'18', N'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', N'192.168.0.100', N'Unknown', '2017-07-10 18:11:47', N'2017-07-10 06:11:52 PM', 1);
GO

INSERT INTO [dbo].[userlog] ([id], [user_id], [browser], [ip_address], [country], [login_time], [logout], [status]) VALUES (6, N'18', N'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', N'192.168.0.100', N'Unknown', '2017-07-10 18:45:25', '', 1);
GO

INSERT INTO [dbo].[userlog] ([id], [user_id], [browser], [ip_address], [country], [login_time], [logout], [status]) VALUES (7, N'18', N'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', N'192.168.0.150', N'Unknown', '2017-07-11 11:44:15', '', 1);
GO

INSERT INTO [dbo].[userlog] ([id], [user_id], [browser], [ip_address], [country], [login_time], [logout], [status]) VALUES (8, N'18', N'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', N'192.168.0.100', N'Unknown', '2017-07-11 12:59:48', N'2017-07-11 01:29:16 PM', 1);
GO

INSERT INTO [dbo].[userlog] ([id], [user_id], [browser], [ip_address], [country], [login_time], [logout], [status]) VALUES (9, N'18', N'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', N'192.168.0.100', N'Unknown', '2017-07-11 13:29:25', '', 1);
GO

SET IDENTITY_INSERT [dbo].[userlog] OFF;
GO

/*
Table structure for table '[dbo].[users]'
*/

IF OBJECT_ID ('[dbo].[users]', 'U') IS NOT NULL
DROP TABLE [dbo].[users];
GO
CREATE TABLE [dbo].[users] (
	[id] INT IDENTITY NOT NULL,
	[fname] NVARCHAR(255)  NOT NULL,
	[lname] NVARCHAR(255)  NOT NULL,
	[address] NVARCHAR(255)  NOT NULL,
	[city] NVARCHAR(50)  NOT NULL,
	[pincode] NVARCHAR(6)  NOT NULL,
	[mobile_no] NVARCHAR(50)  NOT NULL,
	[username] NVARCHAR(255)  NOT NULL,
	[email] NVARCHAR(255)  NOT NULL,
	[password] NVARCHAR(255)  NOT NULL,
	[user_type] NVARCHAR(6)  NOT NULL DEFAULT '1',
	[package_id] BIGINT NOT NULL,
	[modules] NVARCHAR(MAX) NOT NULL,
	[hash] NVARCHAR(50)  NOT NULL,
	[dealer_id] BIGINT NOT NULL,
	[package_price] NVARCHAR(10)  NOT NULL,
	[status] INT NOT NULL DEFAULT 1,
	[startdate] DATE,
	[enddate] DATE,
	[datetimex] DATETIME,
	[endeffdate] DATE
)
GO
CREATE CLUSTERED INDEX [id_clust_idx] ON [dbo].[users]([id])
GO

/*
Dumping data for table '[dbo].[users]'
*/

SET IDENTITY_INSERT [dbo].[users] ON;
GO
INSERT INTO [dbo].[users] ([id], [fname], [lname], [address], [city], [pincode], [mobile_no], [username], [email], [password], [user_type], [package_id], [modules], [hash], [dealer_id], [package_price], [status], [startdate], [enddate], [datetimex], [endeffdate]) VALUES (30, N'sarman', N'Ranavaya', N'Timbavadibyepass', N'junagadh', N'362001', N'9727477438', N'sarman', N'sarman.ranavaya@gmail.com', N'9214abb4630503af75ad424fe3e2915c', N'1', 2, '', N'9ca64bb3b145ccfb1d99086b210a372f', 1, N'4000', 1, '00:00:00', '00:00:00', '00:00:00', '2017-07-11');
GO

INSERT INTO [dbo].[users] ([id], [fname], [lname], [address], [city], [pincode], [mobile_no], [username], [email], [password], [user_type], [package_id], [modules], [hash], [dealer_id], [package_price], [status], [startdate], [enddate], [datetimex], [endeffdate]) VALUES (31, N'sarman', N'Ranavaya', N'Timbavadibyepass', N'junagadh', N'362001', N'9727477438', N'sarman', N'sarman.ranavaya@gmail.com', N'9214abb4630503af75ad424fe3e2915c', '', 3, '', N'9539e366bcb78324106c921f421280cb', 3, N'1000', 1, '2017-07-11', '2017-08-11', '00:00:00', '00:00:00');
GO

INSERT INTO [dbo].[users] ([id], [fname], [lname], [address], [city], [pincode], [mobile_no], [username], [email], [password], [user_type], [package_id], [modules], [hash], [dealer_id], [package_price], [status], [startdate], [enddate], [datetimex], [endeffdate]) VALUES (33, N'rinkal', N'satasiya', N'dhoraji', N'dhoraji', N'362001', N'9898742506', N'rinkal', N'rinkal@gmail.com', N'189e06816fb8ce8355961d3ef16024c2', '', 10, '', N'190e3b951783ec84bf7d3fb5c8bbeaad', 3, N'100', 1, '2017-07-11', '2017-08-11', '00:00:00', '00:00:00');
GO

INSERT INTO [dbo].[users] ([id], [fname], [lname], [address], [city], [pincode], [mobile_no], [username], [email], [password], [user_type], [package_id], [modules], [hash], [dealer_id], [package_price], [status], [startdate], [enddate], [datetimex], [endeffdate]) VALUES (34, N'Customer1', N'Customer1', N'aaa', N'Junagadh', N'362001', N'9898742506', N'customer', N'customer@gmail.com', N'91ec1f9324753048c0096d036a694f86', '', 2, '', N'4020bf17581e1c6c19387adb3977c2e6', 2, N'4000', 1, '2017-07-11', '2017-08-11', '00:00:00', '00:00:00');
GO

SET IDENTITY_INSERT [dbo].[users] OFF;
GO

/*
Table structure for table '[dbo].[userstatistics]'
*/

IF OBJECT_ID ('[dbo].[userstatistics]', 'U') IS NOT NULL
DROP TABLE [dbo].[userstatistics];
GO
CREATE TABLE [dbo].[userstatistics] (
	[id] BIGINT IDENTITY NOT NULL,
	[school_id] BIGINT NOT NULL,
	[userid] BIGINT NOT NULL,
	[ipaddress] NVARCHAR(15)  NOT NULL,
	[page] NVARCHAR(255)  NOT NULL,
	[pagepath] NVARCHAR(255)  NOT NULL,
	[referrer] NVARCHAR(255)  NOT NULL,
	[useragent] NVARCHAR(MAX) NOT NULL,
	[remotehost] NVARCHAR(50)  NOT NULL,
	[browser] NVARCHAR(100)  NOT NULL,
	[platform] NVARCHAR(50)  NOT NULL,
	[datetime] DATETIME,
	[endeffdate] DATE
)
GO
CREATE CLUSTERED INDEX [id_clust_idx] ON [dbo].[userstatistics]([id])
GO

/*
Dumping data for table '[dbo].[userstatistics]'
*/

