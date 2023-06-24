-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2022 at 11:16 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_governce_activities`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `company_name` varchar(127) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `country` varchar(127) DEFAULT NULL,
  `city` varchar(64) DEFAULT NULL,
  `state` varchar(64) DEFAULT NULL,
  `zip` varchar(64) DEFAULT NULL,
  `file_company_logo` varchar(256) DEFAULT NULL,
  `file_report_logo` varchar(256) DEFAULT NULL,
  `file_report_background` varchar(256) DEFAULT NULL,
  `report_footer` varchar(256) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `company_name`, `address`, `country`, `city`, `state`, `zip`, `file_company_logo`, `file_report_logo`, `file_report_background`, `report_footer`) VALUES
(1, 'Pata Corporation', 'C-20,JAkir Hossain Road,Block-E, Md-pur', 'US', 'PArk', 'NY', '1212', 'uploads/images/company/1664374820IMG_3268.JPG', 'uploads/images/company/1664374820IMG_3269.JPG', 'uploads/images/company/1664374820IMG_3268.JPG', 'footer content XXXXXXXXX XXXXXXX');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `country` varchar(200) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `country`) VALUES
(1, 'Afghanistan'),
(2, 'Åland Islands'),
(3, 'Albania'),
(4, 'Algeria'),
(5, 'American Samoa'),
(6, 'Andorra'),
(7, 'Angola'),
(8, 'Anguilla'),
(9, 'Antarctica'),
(10, 'Antigua and Barbuda'),
(11, 'Argentina'),
(12, 'Armenia'),
(13, 'Aruba'),
(14, 'Australia'),
(15, 'Austria'),
(16, 'Azerbaijan'),
(17, 'Bahamas'),
(18, 'Bahrain'),
(19, 'Bangladesh'),
(20, 'Barbados'),
(21, 'Belarus'),
(22, 'Belgium'),
(23, 'Belize'),
(24, 'Benin'),
(25, 'Bermuda'),
(26, 'Bhutan'),
(27, 'Bolivia'),
(28, 'Bosnia and Herzegovina'),
(29, 'Botswana'),
(30, 'Bouvet Island'),
(31, 'Brazil'),
(32, 'British Indian Ocean Territory'),
(33, 'Brunei Darussalam'),
(34, 'Bulgaria'),
(35, 'Burkina Faso'),
(36, 'Burundi'),
(37, 'Cambodia'),
(38, 'Cameroon'),
(39, 'Canada'),
(40, 'Cape Verde'),
(41, 'Cayman Islands'),
(42, 'Central African Republic'),
(43, 'Chad'),
(44, 'Chile'),
(45, 'China'),
(46, 'Christmas Island'),
(47, 'Cocos (Keeling) Islands'),
(48, 'Colombia'),
(49, 'Comoros'),
(50, 'Congo'),
(51, 'Congo, The Democratic Republic of the'),
(52, 'Cook Islands'),
(53, 'Costa Rica'),
(54, 'Côte D\'Ivoire'),
(55, 'Croatia'),
(56, 'Cuba'),
(57, 'Cyprus'),
(58, 'Czech Republic'),
(59, 'Denmark'),
(60, 'Djibouti'),
(61, 'Dominica'),
(62, 'Dominican Republic'),
(63, 'Ecuador'),
(64, 'Egypt'),
(65, 'El Salvador'),
(66, 'Equatorial Guinea'),
(67, 'Eritrea'),
(68, 'Estonia'),
(69, 'Ethiopia'),
(70, 'Falkland Islands (Malvinas)'),
(71, 'Faroe Islands'),
(72, 'Fiji'),
(73, 'Finland'),
(74, 'France'),
(75, 'French Guiana'),
(76, 'French Polynesia'),
(77, 'French Southern Territories'),
(78, 'Gabon'),
(79, 'Gambia'),
(80, 'Georgia'),
(81, 'Germany'),
(82, 'Ghana'),
(83, 'Gibraltar'),
(84, 'Greece'),
(85, 'Greenland'),
(86, 'Grenada'),
(87, 'Guadeloupe'),
(88, 'Guam'),
(89, 'Guatemala'),
(90, 'Guernsey'),
(91, 'Guinea'),
(92, 'Guinea-Bissau'),
(93, 'Guyana'),
(94, 'Haiti'),
(95, 'Heard Island and McDonald Islands'),
(96, 'Holy See (Vatican City State)'),
(97, 'Honduras'),
(98, 'Hong Kong'),
(99, 'Hungary'),
(100, 'Iceland'),
(101, 'India'),
(102, 'Indonesia'),
(103, 'Iran, Islamic Republic of'),
(104, 'Iraq'),
(105, 'Ireland'),
(106, 'Isle of Man'),
(107, 'Israel'),
(108, 'Italy'),
(109, 'Jamaica'),
(110, 'Japan'),
(111, 'Jersey'),
(112, 'Jordan'),
(113, 'Kazakhstan'),
(114, 'Kenya'),
(115, 'Kiribati'),
(116, 'Korea, Democratic People\'s Republic of'),
(117, 'Korea, Republic of'),
(118, 'Kuwait'),
(119, 'Kyrgyzstan'),
(120, 'Lao People\'s Democratic Republic'),
(121, 'Latvia'),
(122, 'Lebanon'),
(123, 'Lesotho'),
(124, 'Liberia'),
(125, 'Libyan Arab Jamahiriya'),
(126, 'Liechtenstein'),
(127, 'Lithuania'),
(128, 'Luxembourg'),
(129, 'Macao'),
(130, 'Macedonia, The Former Yugoslav Republic of'),
(131, 'Madagascar'),
(132, 'Malawi'),
(133, 'Malaysia'),
(134, 'Maldives'),
(135, 'Mali'),
(136, 'Malta'),
(137, 'Marshall Islands'),
(138, 'Martinique'),
(139, 'Mauritania'),
(140, 'Mauritius'),
(141, 'Mayotte'),
(142, 'Mexico'),
(143, 'Micronesia, Federated States of'),
(144, 'Moldova, Republic of'),
(145, 'Monaco'),
(146, 'Mongolia'),
(147, 'Montenegro'),
(148, 'Montserrat'),
(149, 'Morocco'),
(150, 'Mozambique'),
(151, 'Myanmar'),
(152, 'Namibia'),
(153, 'Nauru'),
(154, 'Nepal'),
(155, 'Netherlands'),
(156, 'Netherlands Antilles'),
(157, 'New Caledonia'),
(158, 'New Zealand'),
(159, 'Nicaragua'),
(160, 'Niger'),
(161, 'Nigeria'),
(162, 'Niue'),
(163, 'Norfolk Island'),
(164, 'Northern Mariana Islands'),
(165, 'Norway'),
(166, 'Oman'),
(167, 'Pakistan'),
(168, 'Palau'),
(169, 'Palestinian Territory, Occupied'),
(170, 'Panama'),
(171, 'Papua New Guinea'),
(172, 'Paraguay'),
(173, 'Peru'),
(174, 'Philippines'),
(175, 'Pitcairn'),
(176, 'Poland'),
(177, 'Portugal'),
(178, 'Puerto Rico'),
(179, 'Qatar'),
(180, 'Reunion'),
(181, 'Romania'),
(182, 'Russian Federation'),
(183, 'Rwanda'),
(184, 'Saint Barthélemy'),
(185, 'Saint Helena'),
(186, 'Saint Kitts and Nevis'),
(187, 'Saint Lucia'),
(188, 'Saint Martin'),
(189, 'Saint Pierre and Miquelon'),
(190, 'Saint Vincent and the Grenadines'),
(191, 'Samoa'),
(192, 'San Marino'),
(193, 'Sao Tome and Principe'),
(194, 'Saudi Arabia'),
(195, 'Senegal'),
(196, 'Serbia'),
(197, 'Seychelles'),
(198, 'Sierra Leone'),
(199, 'Singapore'),
(200, 'Slovakia'),
(201, 'Slovenia'),
(202, 'Solomon Islands'),
(203, 'Somalia'),
(204, 'South Africa'),
(205, 'South Georgia and the South Sandwich Islands'),
(206, 'Spain'),
(207, 'Sri Lanka'),
(208, 'Sudan'),
(209, 'Suriname'),
(210, 'Svalbard and Jan Mayen'),
(211, 'Swaziland'),
(212, 'Sweden'),
(213, 'Switzerland'),
(214, 'Syrian Arab Republic'),
(215, 'Taiwan, Province Of China'),
(216, 'Tajikistan'),
(217, 'Tanzania, United Republic of'),
(218, 'Thailand'),
(219, 'Timor-Leste'),
(220, 'Togo'),
(221, 'Tokelau'),
(222, 'Tonga'),
(223, 'Trinidad and Tobago'),
(224, 'Tunisia'),
(225, 'Turkey'),
(226, 'Turkmenistan'),
(227, 'Turks and Caicos Islands'),
(228, 'Tuvalu'),
(229, 'Uganda'),
(230, 'Ukraine'),
(231, 'United Arab Emirates'),
(232, 'United Kingdom'),
(233, 'United States'),
(234, 'United States Minor Outlying Islands'),
(235, 'Uruguay'),
(236, 'Uzbekistan'),
(237, 'Vanuatu'),
(238, 'Venezuela'),
(239, 'Viet Nam'),
(240, 'Virgin Islands, British'),
(241, 'Virgin Islands, U.S.'),
(242, 'Wallis And Futuna'),
(243, 'Western Sahara'),
(244, 'Yemen'),
(245, 'Zambia'),
(246, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(10) NOT NULL,
  `department` varchar(127) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department`, `description`) VALUES
(1, 'ICT', 'ICT'),
(2, 'Fish', ''),
(3, 'AG', ''),
(4, 'Cabinet', ''),
(5, 'Ministry', '');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(10) NOT NULL,
  `innovation_plan_id` int(10) DEFAULT NULL,
  `document_file_type` enum('picture','video','docx','pdf') DEFAULT NULL,
  `file_picture` varchar(256) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `innovation_plan_id`, `document_file_type`, `file_picture`, `description`, `created_at`, `updated_at`) VALUES
(46, 29, 'picture', 'uploads/images/documents/1664554562IMG_3268.JPG', '', '2022-09-30 18:16:02', NULL),
(47, 29, 'video', 'uploads/images/documents/1664554562IMG_3270.JPG', '', '2022-09-30 18:16:02', NULL),
(48, 29, 'docx', 'uploads/images/documents/1664554562IMG_3269.JPG', '', '2022-09-30 18:16:02', NULL),
(49, 29, 'pdf', 'uploads/images/documents/1664554562IMG_3274.JPG', '', '2022-09-30 18:16:02', NULL),
(50, 31, 'picture', 'uploads/images/documents/1664610129IMG_3251.JPG', '', '2022-09-30 18:53:55', '2022-10-01 09:42:09'),
(51, 32, 'picture', 'uploads/images/documents/1664557495IMG_3269.JPG', '', '2022-09-30 19:04:55', NULL),
(52, 32, 'video', 'uploads/images/documents/1664557495IMG_3271.JPG', '', '2022-09-30 19:04:55', NULL),
(53, 32, 'docx', 'uploads/images/documents/1664557495IMG_3269.JPG', '', '2022-09-30 19:04:55', NULL),
(54, 31, 'video', 'uploads/images/documents/1664610129IMG_3271.JPG', '', '2022-10-01 09:42:09', NULL),
(55, 31, 'docx', 'uploads/images/documents/1664610129IMG_3274.JPG', '', '2022-10-01 09:42:09', NULL),
(56, 31, 'pdf', 'uploads/images/documents/1664610129IMG_3277.JPG', '', '2022-10-01 09:42:09', NULL),
(57, 36, 'picture', 'uploads/images/documents/1664624386IMG_3268.JPG', '', '2022-10-01 13:39:46', NULL),
(58, 36, 'video', 'uploads/images/documents/1664624386IMG_3273.JPG', '', '2022-10-01 13:39:46', NULL),
(59, 36, 'docx', 'uploads/images/documents/1664624386IMG_3274.JPG', '', '2022-10-01 13:39:46', NULL),
(60, 36, 'pdf', 'uploads/images/documents/1664624386IMG_3277.JPG', '', '2022-10-01 13:39:46', NULL),
(61, 39, 'picture', 'uploads/images/documents/1664629752IMG_3269.JPG', '', '2022-10-01 15:09:11', NULL),
(62, 39, 'video', 'uploads/images/documents/1664629752IMG_3270.JPG', '', '2022-10-01 15:09:11', NULL),
(63, 39, 'docx', 'uploads/images/documents/1664629752IMG_3270.JPG', '', '2022-10-01 15:09:11', NULL),
(64, 39, 'pdf', 'uploads/images/documents/1664629752IMG_3267.JPG', '', '2022-10-01 15:09:11', NULL),
(65, 40, 'picture', 'uploads/images/documents/1664635067IMG_3269.JPG', '', '2022-10-01 16:37:47', NULL),
(66, 43, 'picture', 'uploads/images/documents/1664645209IMG_3268.JPG', '', '2022-10-01 19:26:49', NULL),
(67, 18, 'picture', 'uploads/images/documents/1664645236IMG_3270.JPG', '', '2022-10-01 19:27:15', NULL),
(68, 59, 'picture', 'uploads/images/documents/1664716771IMG_3269.JPG', '', '2022-10-02 15:19:30', NULL),
(69, 60, 'picture', 'uploads/images/documents/1664717402IMG_3270.JPG', '', '2022-10-02 15:30:02', NULL),
(70, 60, 'video', 'uploads/images/documents/1664717403IMG_3273.JPG', '', '2022-10-02 15:30:02', NULL),
(71, 79, 'pdf', 'uploads/images/documents/1664794324LIST_OF_SCHOOL_AND_COLLEGE.pdf', '', '2022-10-03 12:52:04', NULL),
(72, 79, 'docx', 'uploads/images/documents/1664794381appery.docx', '', '2022-10-03 12:53:01', NULL),
(73, 35, 'picture', 'uploads/images/documents/1664803466person_4.jpg', '', '2022-10-03 15:24:26', NULL),
(74, 35, 'video', 'uploads/images/documents/1664803467loc.png', '', '2022-10-03 15:24:26', NULL),
(75, 35, 'docx', 'uploads/images/documents/1664803467person_4.jpg', '', '2022-10-03 15:24:26', NULL),
(76, 35, 'pdf', 'uploads/images/documents/1664803467car-11.jpg', '', '2022-10-03 15:24:26', NULL),
(77, 87, 'picture', 'uploads/images/documents/166482061756565.pdf', '', '2022-10-03 20:10:17', NULL),
(78, 86, 'picture', 'uploads/images/documents/1665399499Capture_(1).PNG', '', '2022-10-10 12:58:19', NULL),
(79, 86, 'video', 'uploads/images/documents/1665399499E-Governance_2022-2023.pdf', '', '2022-10-10 12:58:19', NULL),
(80, 45, 'picture', 'uploads/images/documents/1665438366Innovaton_WP_2021-2022.pdf', '', '2022-10-10 23:46:05', NULL),
(81, 46, 'picture', 'uploads/images/documents/1665488632Innovaton_WP_2021-2022.pdf', '', '2022-10-11 13:43:51', NULL),
(82, 100, 'picture', 'uploads/images/documents/1666860217E-Governance_2022-2023.pdf', '', '2022-10-27 10:43:37', NULL),
(83, 100, 'video', 'uploads/images/documents/1666860218Top_Sheet.docx', '', '2022-10-27 10:43:37', NULL),
(84, 100, 'docx', 'uploads/images/documents/1666860218E-Governance_2022-2023.pdf', '', '2022-10-27 10:43:37', NULL),
(85, 100, 'pdf', 'uploads/images/documents/1666860218Top_Sheet.docx', '', '2022-10-27 10:43:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `financial_year`
--

CREATE TABLE `financial_year` (
  `id` int(10) NOT NULL,
  `financial_year_name` varchar(64) DEFAULT NULL,
  `status` enum('selected','active','inactive') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `financial_year`
--

INSERT INTO `financial_year` (`id`, `financial_year_name`, `status`, `created_at`, `updated_at`) VALUES
(1, '2023', 'inactive', '2022-09-19 23:01:28', NULL),
(2, '2022', NULL, '2022-09-21 10:35:31', NULL),
(3, '2021', NULL, '2022-09-21 10:35:38', NULL),
(4, '2024', 'selected', '2022-09-24 12:04:35', '2022-10-03 10:06:36'),
(5, '2025', NULL, '2022-09-27 17:26:06', NULL),
(6, '2020-2021', NULL, '2022-09-27 17:28:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `innovation_plan`
--

CREATE TABLE `innovation_plan` (
  `id` int(11) NOT NULL,
  `users_id` int(10) DEFAULT NULL,
  `department_id` int(10) DEFAULT NULL,
  `predefined_objectives_id` int(11) DEFAULT NULL,
  `predefined_activities_id` int(11) DEFAULT NULL,
  `predefined_innovation_plan_id` int(10) DEFAULT NULL,
  `performance_indicators` varchar(64) DEFAULT NULL,
  `weight_of_plan` varchar(64) DEFAULT NULL,
  `half_yearly_evaluation` decimal(10,2) DEFAULT NULL,
  `half_yearly_evaluation_date` datetime DEFAULT NULL,
  `half_yearly_evaluation_comments` text DEFAULT NULL,
  `yearly_evaluation` decimal(10,2) DEFAULT NULL,
  `yearly_evaluation_date` datetime DEFAULT NULL,
  `yearly_evaluation_comments` text DEFAULT NULL,
  `final_evaluation` decimal(10,2) DEFAULT NULL,
  `final_evaluation_date` datetime DEFAULT NULL,
  `final_evaluation_comments` text DEFAULT NULL,
  `final_evaluator_users_id` int(10) DEFAULT NULL,
  `submission` enum('pending','half year submitted','full year submitted','completed') DEFAULT NULL,
  `submitted_date` datetime DEFAULT NULL,
  `completed_date` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `innovation_plan`
--

INSERT INTO `innovation_plan` (`id`, `users_id`, `department_id`, `predefined_objectives_id`, `predefined_activities_id`, `predefined_innovation_plan_id`, `performance_indicators`, `weight_of_plan`, `half_yearly_evaluation`, `half_yearly_evaluation_date`, `half_yearly_evaluation_comments`, `yearly_evaluation`, `yearly_evaluation_date`, `yearly_evaluation_comments`, `final_evaluation`, `final_evaluation_date`, `final_evaluation_comments`, `final_evaluator_users_id`, `submission`, `submitted_date`, `completed_date`, `created_at`, `updated_at`) VALUES
(13, 9, 3, 38, 50, 46, 'সংখ্যা', '66', '33.00', NULL, '', NULL, NULL, NULL, '66.00', '2022-10-02 13:20:22', '', 11, 'pending', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 10, 3, 46, 49, 40, '', '554', '249.30', NULL, 'gfgfg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', NULL, NULL, '0000-00-00 00:00:00', NULL),
(18, 10, 3, 47, 52, 50, '', '55', '55.00', '2022-10-03 13:48:22', '', '27.50', '2022-10-10 12:08:58', '', NULL, NULL, NULL, NULL, 'full year submitted', '2022-10-10 12:08:58', NULL, '0000-00-00 00:00:00', '2022-10-10 12:08:58'),
(19, 9, 3, 48, 53, 51, 'তারিখ', '66', '19.80', NULL, 'gggggggg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', NULL, NULL, '0000-00-00 00:00:00', NULL),
(27, 10, 3, 50, 56, 53, 'তারিখ', '44', '24.20', NULL, '66', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', NULL, NULL, '0000-00-00 00:00:00', NULL),
(30, 10, 3, 46, 49, 41, '', '55', NULL, NULL, NULL, '24.75', NULL, '55 55', NULL, NULL, NULL, NULL, 'pending', NULL, NULL, '0000-00-00 00:00:00', NULL),
(31, 10, 3, 50, 56, 54, 'তারিখ', '44', '24.20', NULL, '', '1.32', '2022-10-03 15:24:41', '', NULL, NULL, NULL, NULL, 'full year submitted', '2022-10-03 15:24:41', NULL, '0000-00-00 00:00:00', '2022-10-03 15:24:41'),
(35, 10, 3, 51, 57, 55, '%', '5', '2.75', '2022-10-03 15:24:26', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'half year submitted', '2022-10-03 15:24:26', NULL, '0000-00-00 00:00:00', '2022-10-03 15:24:26'),
(37, 10, 3, 29, 33, 37, '', '1', NULL, NULL, NULL, '0.80', NULL, '', NULL, NULL, NULL, NULL, 'pending', NULL, NULL, '0000-00-00 00:00:00', NULL),
(38, 10, 3, 29, 33, 33, '', '77', NULL, NULL, NULL, '61.60', NULL, '', NULL, NULL, NULL, NULL, 'pending', NULL, NULL, '0000-00-00 00:00:00', NULL),
(45, 11, 2, 48, 53, 51, 'তারিখ', '66', '19.80', '2022-10-10 23:46:05', '', '3.30', '2022-10-10 22:51:18', '', '66.00', '2022-10-02 09:46:28', 'test', NULL, 'half year submitted', '2022-10-10 23:46:05', NULL, '0000-00-00 00:00:00', '2022-10-10 23:46:05'),
(46, 11, 2, 48, 54, 56, 'তারিখ', '55', '44.00', '2022-10-11 13:43:51', '', NULL, NULL, NULL, '55.00', '2022-10-02 09:53:07', 'test', NULL, 'half year submitted', '2022-10-11 13:43:51', NULL, '0000-00-00 00:00:00', '2022-10-11 13:43:51'),
(49, 11, 2, 49, 59, 58, '%', '66', NULL, NULL, NULL, NULL, NULL, NULL, '66.00', '2022-10-02 11:31:53', '11', NULL, 'pending', NULL, NULL, '0000-00-00 00:00:00', NULL),
(50, 11, 2, 49, 59, 58, '%', '66', '52.80', '2022-10-10 23:40:31', '', '6.60', '2022-10-10 23:40:35', '', '66.00', '2022-10-02 11:33:04', '55', NULL, 'full year submitted', '2022-10-10 23:40:35', NULL, '0000-00-00 00:00:00', '2022-10-10 23:40:35'),
(52, 9, 3, 48, 58, 57, 'তারিখ', '0', NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '2022-10-02 11:42:38', '', NULL, 'pending', NULL, NULL, '0000-00-00 00:00:00', NULL),
(54, 9, 3, 48, 55, 52, 'তারিখ', '44', '44.00', '2022-10-02 13:21:39', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', NULL, NULL, '0000-00-00 00:00:00', NULL),
(55, 13, 4, 48, 58, 57, 'তারিখ', '6', '0.00', '2022-10-02 14:23:12', '11', NULL, NULL, NULL, '6.00', '2022-10-03 13:46:09', 'test', 11, 'completed', NULL, '2022-10-03 13:46:09', '0000-00-00 00:00:00', '2022-10-03 13:46:09'),
(56, 13, 4, 48, 55, 52, 'তারিখ', '44', NULL, NULL, NULL, '13.20', '2022-10-02 14:23:35', '', '44.00', '2022-10-10 23:18:18', '', 11, 'completed', NULL, '2022-10-10 23:18:18', '0000-00-00 00:00:00', '2022-10-10 23:18:18'),
(61, 13, 4, 48, 54, 56, 'তারিখ', '55', NULL, NULL, NULL, NULL, NULL, NULL, '44.00', '2022-10-03 14:46:53', '', 11, 'completed', NULL, '2022-10-03 14:46:53', '0000-00-00 00:00:00', '2022-10-03 14:46:53'),
(76, 11, 2, 29, 33, 34, '', '6', '6.00', '2022-10-03 13:39:12', '', '4.80', '2022-10-03 13:39:24', '', NULL, NULL, NULL, NULL, 'full year submitted', '2022-10-03 13:39:24', NULL, '2022-10-03 12:45:19', '2022-10-03 13:39:24'),
(81, 10, 3, 48, 53, 51, 'তারিখ', '66', NULL, NULL, NULL, NULL, NULL, NULL, '66.00', '2022-10-03 13:43:46', '', 11, 'completed', NULL, '2022-10-03 13:43:46', '2022-10-03 13:43:46', NULL),
(82, 10, 3, 48, 58, 57, 'তারিখ', '6', '6.00', '2022-10-03 14:20:16', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'half year submitted', '2022-10-03 14:20:16', NULL, '2022-10-03 14:20:16', NULL),
(83, 10, 3, 49, 59, 58, '%', '66', NULL, NULL, NULL, '52.80', '2022-10-03 14:20:34', '', NULL, NULL, NULL, NULL, 'full year submitted', '2022-10-03 14:20:34', NULL, '2022-10-03 14:20:34', NULL),
(84, 13, 4, 48, 53, 51, 'তারিখ', '66', NULL, NULL, NULL, NULL, NULL, NULL, '66.00', '2022-10-03 14:46:20', '', 11, 'completed', NULL, '2022-10-03 14:46:20', '2022-10-03 14:46:20', NULL),
(85, 13, 4, 49, 59, 60, 'তারিখ', '66', NULL, NULL, NULL, NULL, NULL, NULL, '66.00', '2022-10-03 14:47:17', '', 11, 'completed', NULL, '2022-10-03 14:47:17', '2022-10-03 14:47:17', NULL),
(86, 10, 3, 48, 58, 61, 'সংখ্যা', '100', '100.00', '2022-10-10 12:58:19', '', '100.00', '2022-10-10 12:58:53', '', '100.00', '2022-10-27 10:35:40', '', 11, 'completed', '2022-10-10 12:58:53', '2022-10-27 10:35:40', '2022-10-03 15:21:36', '2022-10-27 10:35:40'),
(87, 11, 2, 47, 52, 50, '', '55', '55.00', '2022-10-03 20:09:19', '', '27.50', '2022-10-03 20:10:17', '', NULL, NULL, NULL, NULL, 'full year submitted', '2022-10-03 20:10:17', NULL, '2022-10-03 20:09:19', '2022-10-03 20:10:17'),
(88, 12, 5, 48, 60, 68, 'তারিখ', '11', NULL, NULL, NULL, NULL, NULL, NULL, '11.00', '2022-10-04 20:29:50', '', 11, 'completed', NULL, '2022-10-04 20:29:50', '2022-10-04 20:29:50', NULL),
(89, 12, 5, 49, 61, 67, 'তারিখ', '1', NULL, NULL, NULL, NULL, NULL, NULL, '0.05', '2022-10-04 20:30:05', '', 11, 'completed', NULL, '2022-10-04 20:30:05', '2022-10-04 20:30:05', NULL),
(90, 11, 2, 43, 62, 64, '%', '44', '22.00', '2022-10-05 07:39:26', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'half year submitted', '2022-10-05 07:39:26', NULL, '2022-10-05 07:39:26', NULL),
(91, 10, 3, 43, 62, 64, '%', '44', '22.00', '2022-10-27 10:18:29', '', NULL, NULL, NULL, '44.00', '2022-10-11 12:14:47', '', 11, 'half year submitted', '2022-10-27 10:18:29', '2022-10-11 12:14:47', '2022-10-10 12:19:35', '2022-10-27 10:18:29'),
(92, 11, 2, 29, 33, 37, '', '1', '1.00', '2022-10-10 23:43:47', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'half year submitted', '2022-10-10 23:43:47', NULL, '2022-10-10 23:43:47', NULL),
(93, 11, 2, 49, 61, 67, 'তারিখ', '1', '1.00', '2022-10-11 11:36:23', '', '0.30', '2022-10-11 13:35:45', '', NULL, NULL, NULL, NULL, 'full year submitted', '2022-10-11 13:35:45', NULL, '2022-10-11 11:36:23', '2022-10-11 13:35:45'),
(94, 11, 2, 48, 58, 61, 'সংখ্যা', '100', '100.00', '2022-10-11 11:36:42', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'half year submitted', '2022-10-11 11:36:42', NULL, '2022-10-11 11:36:42', NULL),
(95, 11, 2, 48, 58, 57, 'তারিখ', '6', '1.80', '2022-10-11 12:12:50', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'half year submitted', '2022-10-11 12:12:50', NULL, '2022-10-11 11:37:40', '2022-10-11 12:12:50'),
(96, 12, 5, 43, 65, 73, 'তারিখ', '77', NULL, NULL, NULL, NULL, NULL, NULL, '77.00', '2022-10-11 12:16:56', '', 11, 'completed', NULL, '2022-10-11 12:16:56', '2022-10-11 12:16:56', NULL),
(97, 12, 5, 43, 62, 64, '%', '44', NULL, NULL, NULL, NULL, NULL, NULL, '22.00', '2022-10-11 12:17:27', '', 11, 'completed', NULL, '2022-10-11 12:17:27', '2022-10-11 12:17:27', NULL),
(98, 11, 2, 51, 57, 55, '%', '5', '2.75', '2022-10-11 13:51:20', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'half year submitted', '2022-10-11 13:51:20', NULL, '2022-10-11 13:51:20', NULL),
(99, 10, 3, 48, 60, 63, '%', '44', '44.00', '2022-10-27 10:27:20', '666', NULL, NULL, NULL, '13.20', '2022-10-27 10:41:41', 'rrr', 11, 'completed', '2022-10-27 10:27:20', '2022-10-27 10:41:41', '2022-10-27 10:27:20', '2022-10-27 10:41:41'),
(100, 10, 3, 43, 65, 73, 'তারিখ', '77', '77.00', '2022-10-27 10:43:37', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'half year submitted', '2022-10-27 10:43:37', NULL, '2022-10-27 10:43:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `innovation_plan_history`
--

CREATE TABLE `innovation_plan_history` (
  `id` int(10) NOT NULL,
  `innovation_plan_id` int(10) DEFAULT NULL,
  `action_users_id` int(10) DEFAULT NULL,
  `subject` varchar(64) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `innovation_team`
--

CREATE TABLE `innovation_team` (
  `id` bigint(20) NOT NULL,
  `owner_users_id` int(10) DEFAULT NULL,
  `department_id` int(10) DEFAULT NULL,
  `email` varchar(127) NOT NULL,
  `password` varchar(127) NOT NULL,
  `first_name` varchar(127) NOT NULL,
  `last_name` varchar(127) NOT NULL,
  `file_picture` varchar(256) DEFAULT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `company` varchar(127) DEFAULT NULL,
  `address` varchar(127) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_type` enum('super','admin','organization') NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `innovation_team`
--

INSERT INTO `innovation_team` (`id`, `owner_users_id`, `department_id`, `email`, `password`, `first_name`, `last_name`, `file_picture`, `phone_no`, `company`, `address`, `created_at`, `updated_at`, `user_type`, `status`) VALUES
(9, NULL, 3, 'xx@xx.com', 'xx', 'John', 'Smith', 'uploads/images/users/1664374371IMG_3269.JPG', '', '', '', '2011-10-19 00:00:00', '2022-09-28 16:12:51', 'super', 'active'),
(10, 11, 3, 'aa@aa.com', 'aa', 'aa', 'aa', 'uploads/images/users/1664374335IMG_3251.JPG', '98989898', '', '', '2022-09-28 13:05:44', '2022-10-02 13:29:07', 'organization', 'active'),
(11, 12, 2, 'bb@bb.com', 'bb', 'bb', 'bb', 'uploads/images/users/1664795542about.jpg', '', '', '', NULL, '2022-10-03 13:12:22', 'admin', 'active'),
(12, 11, 5, 'cc@cc.com', 'cc', 'cc', 'cc', 'uploads/images/users/1664711534IMG_3251.JPG', '', '', '', '2022-10-02 13:52:14', NULL, 'organization', 'active'),
(13, 11, 4, 'dd@dd.com', 'dd', 'dd', 'dd', 'uploads/images/users/1664712623IMG_3269.JPG', '', '', '', '2022-10-02 14:09:54', '2022-10-02 14:10:23', 'organization', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `predefined_activities`
--

CREATE TABLE `predefined_activities` (
  `id` int(10) NOT NULL,
  `predefined_objectives_id` int(10) DEFAULT NULL,
  `activities_name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `sl_no` varchar(64) DEFAULT NULL,
  `order_no` int(10) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `predefined_activities`
--

INSERT INTO `predefined_activities` (`id`, `predefined_objectives_id`, `activities_name`, `description`, `sl_no`, `order_no`, `created_at`, `updated_at`) VALUES
(26, 26, '11', '11', '11', 11, '2022-09-23 18:53:49', NULL),
(27, 26, '22', '22', '22', 22, '2022-09-23 18:54:01', NULL),
(28, 27, '33', '33', '33', 33, '2022-09-23 18:54:22', NULL),
(29, 26, '66', '66', '66', 66, '2022-09-23 18:55:35', NULL),
(30, 27, '55', '55', '55', 55, '2022-09-23 18:55:55', NULL),
(31, 28, '8', '7', 'dd', 555, '2022-09-23 22:03:37', NULL),
(32, 26, '88', '88', '88', 88, '2022-09-23 22:04:12', NULL),
(33, 29, 'gfgfgf', 'gfgfg', 'gfgf', 0, '2022-09-23 22:05:39', NULL),
(36, 31, 'Good', '', '1.1', 1, '2022-09-24 12:05:27', NULL),
(37, 31, 'Bad', '', '1,2', 2, '2022-09-24 12:05:43', NULL),
(38, 32, '555', '55', '55', 55, '2022-09-24 13:50:23', NULL),
(39, 37, 'yty', 'tytyty', '44', 44, '2022-09-24 14:23:52', NULL),
(40, 38, '65656', '565656', '666', 6565, '2022-09-24 14:24:00', NULL),
(42, 39, 'tttt 111', 'tttttttttttttt', '1', 1, '2022-09-24 15:30:54', '2022-09-24 15:32:45'),
(48, 46, '111', '11', '11', 11, '2022-09-27 12:55:14', NULL),
(49, 46, '5454', '54545', '55', 55, '2022-09-27 12:55:43', NULL),
(50, 38, '43434', '44', '44', 44, '2022-09-27 13:38:08', NULL),
(52, 47, '44', '44', '444', 44, '2022-09-27 13:38:54', NULL),
(53, 48, 'কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম\n', 'কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম\n', '1', 1, '2022-09-27 17:29:28', '2022-10-03 20:24:01'),
(54, 48, '222', '222', '222', 222, '2022-09-27 17:29:36', '2022-09-27 18:17:45'),
(55, 48, 'কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম\n', 'কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম\n', '44', 44, '2022-09-27 18:21:13', '2022-10-03 20:23:47'),
(56, 50, '4444', '4444444', '44', 44, '2022-09-27 18:47:33', NULL),
(57, 51, '1', '11', '11', 11, '2022-09-27 18:51:08', NULL),
(58, 48, 'কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম ', 'dd', '11', 11, '2022-09-28 10:32:28', '2022-10-03 20:15:20'),
(59, 49, '66', 'কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম\n', '66', 66, '2022-09-28 16:16:35', '2022-10-03 20:22:31'),
(60, 48, '4343', 'কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম\n', '1', 1, '2022-10-03 20:22:58', NULL),
(61, 49, 'কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম\n', 'কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম\n', '44', 5, '2022-10-03 20:24:10', NULL),
(62, 43, 'কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম\n', 'কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম\n', '44', 55, '2022-10-03 20:27:02', NULL),
(63, 49, '6565656', '56565', '66', 66, '2022-10-10 14:03:50', NULL),
(64, 52, '56565', '656', '66', 66, '2022-10-10 14:13:36', NULL),
(65, 43, '67676', '767676', '7676', 76767, '2022-10-10 14:16:50', NULL),
(66, 52, 'gfg', 'fgfg', '11', 11, '2022-10-11 11:28:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `predefined_innovation_plan`
--

CREATE TABLE `predefined_innovation_plan` (
  `id` int(11) NOT NULL,
  `predefined_activities_id` int(11) DEFAULT NULL,
  `plan` text DEFAULT NULL,
  `performance_indicators` enum('তারিখ','%','সংখ্যা') DEFAULT NULL,
  `weight_of_plan` int(11) DEFAULT NULL,
  `sl_no` varchar(64) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `predefined_innovation_plan`
--

INSERT INTO `predefined_innovation_plan` (`id`, `predefined_activities_id`, `plan`, `performance_indicators`, `weight_of_plan`, `sl_no`, `created_at`, `updated_at`) VALUES
(1, 32, 'fff  ', 'তারিখ', 8, '1.1.1', 2021, 2022),
(2, 29, 'sssssssss sss  rer rerewrew ererew erewrerewr er', '', 5656, '1.1.1', 2022, 2022),
(3, 29, 'dff fff', '', 66, '1.1.1', 2022, 2022),
(4, 32, 'hhhhh', '', 555, '1.1.1', 2022, NULL),
(5, 32, 'trrt', '', 0, '1.1.1', 2022, NULL),
(6, 29, 'fgff', '', 54545, '1.1.1', 2022, NULL),
(7, 29, 'fgff', '', 54545, '1.1.1', 2022, NULL),
(8, 29, 'fgff', '', 54545, '1.1.1', 2022, NULL),
(9, 29, 'fgff', '', 54545, '1.1.1', 2022, NULL),
(10, 29, 'fgff', '', 54545, '1.1.1', 2022, NULL),
(11, 29, 'fgff', '', 54545, '1.1.1', 2022, NULL),
(12, 29, 'fgff', '', 54545, '1.1.1', 2022, NULL),
(13, 29, 'fgff', '', 54545, '1.1.1', 2022, NULL),
(14, 32, 'fdfdf', '', 0, '1.1.1', 2022, NULL),
(15, 32, 'fdfdf', '', 0, '1.1.1', 2022, NULL),
(16, 32, 'fdfdf', '', 0, '1.1.1', 2022, NULL),
(17, 32, 'fdfdf', '', 0, '1.1.1', 2022, NULL),
(18, 32, 'fdfdf', '', 0, '1.1.1', 2022, NULL),
(19, 32, 'fdfdf', '', 0, '1.1.1', 2022, NULL),
(20, 32, 'fdfdf', '', 0, '1.1.1', 2022, NULL),
(21, 32, 'fdfdf', '', 0, '1.1.1', 2022, NULL),
(22, 32, 'fdfdf', '', 0, '1.1.1', 2022, NULL),
(23, 30, 'vcvcv', '', 4545, '1.1.1', 2022, NULL),
(24, 30, 'gfgfg', '', 55, '1.1.1', 2022, NULL),
(25, 31, '5656', '', 656, '1.1.1', 2022, NULL),
(26, 35, 'tytyty', '', 0, '1.1.1', 2022, NULL),
(27, 30, '88', '', 88, '1.1.1', 2022, NULL),
(28, 37, 'Not bad', '', 11, '1.1.1', 2022, NULL),
(29, 37, 'hellow', '', 11, '1.1.1', 2022, NULL),
(30, 37, '11', '', 11, '1.1.1', 2022, NULL),
(33, 33, '6767', '', 77, '1.1.1', 2022, NULL),
(34, 33, '6565', '', 6, '1.1.1', 2022, NULL),
(37, 33, '33', '', 1, '1.1.1', 2022, NULL),
(38, 48, '111', '', 11, '1.1.1', 2022, 2022),
(39, 48, '2', '', 11, '1.1.1', 2022, 2022),
(40, 49, '5454', '', 554, '1.1.1', 2022, 2022),
(41, 49, '55', '', 55, '1.1.1', 2022, NULL),
(46, 50, '666', 'সংখ্যা', 66, '1.1.1', 2022, 2022),
(50, 52, '55', '', 55, '1.1.1', 2022, NULL),
(51, 53, '5656', 'তারিখ', 66, '1.1.1', 2022, 2022),
(52, 55, '444', 'তারিখ', 44, '1.1.1', 2022, NULL),
(53, 56, '44', 'তারিখ', 44, '1.1.1', 2022, 2022),
(54, 56, '444', 'তারিখ', 44, '1.1.1', 2022, 2022),
(55, 57, '5', '%', 5, '1.1.1', 2022, 2022),
(56, 54, '55', 'তারিখ', 55, '1.1.1', 2022, 2022),
(57, 58, 'কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম', 'তারিখ', 6, '1.1.1', 2022, 2022),
(58, 59, '66', '%', 66, '1.1.1', 2022, NULL),
(59, 59, '66', 'সংখ্যা', 66, '1.1.1', 2022, NULL),
(60, 59, '66', 'তারিখ', 66, '1.1.1', 2022, NULL),
(61, 58, 'কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম', 'সংখ্যা', 100, '1.1.1', 2022, 2022),
(62, 61, 'কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম\n', '%', 44, '1.1.1', 2022, NULL),
(63, 60, 'কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম\n', '%', 44, '1.1.1', 2022, 2022),
(64, 62, 'কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম\n', '%', 44, '1.1.1', 2022, NULL),
(65, 55, 'কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম', 'তারিখ', 1, '1111', 2022, 2022),
(66, 53, '54545', 'তারিখ', 11, '11', 2022, NULL),
(67, 61, '11', 'তারিখ', 1, '111', 2022, NULL),
(68, 60, 'vxvxvxv', 'তারিখ', 11, '112', 2022, NULL),
(69, 63, '66666', '%', 66, '6', 2022, NULL),
(70, 64, '6565', 'সংখ্যা', 66, '66', 2022, NULL),
(71, 64, '65656', '%', 66, '66', 2022, NULL),
(72, 40, '54545', 'তারিখ', 66, '66', 2022, NULL),
(73, 65, '7676', 'তারিখ', 77, '77', 2022, NULL),
(74, 66, '11', 'তারিখ', 11, '11', 2022, NULL),
(75, 66, '22', 'তারিখ', 32, '3', 2022, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `predefined_innovation_plan_column_data`
--

CREATE TABLE `predefined_innovation_plan_column_data` (
  `id` int(10) NOT NULL,
  `predefined_objectives_column_id` int(10) DEFAULT NULL,
  `predefined_innovation_plan_id` int(10) DEFAULT NULL,
  `column_data` varchar(64) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `predefined_innovation_plan_column_data`
--

INSERT INTO `predefined_innovation_plan_column_data` (`id`, `predefined_objectives_column_id`, `predefined_innovation_plan_id`, `column_data`, `created_at`, `updated_at`) VALUES
(1, 5, 21, 'dfdf', '2022-09-24 11:35:06', '0000-00-00 00:00:00'),
(2, 4, 21, 'dfdfd', '2022-09-24 11:35:06', '0000-00-00 00:00:00'),
(3, 3, 21, 'fdfd', '2022-09-24 11:35:06', '0000-00-00 00:00:00'),
(4, 6, 21, 'fdf', '2022-09-24 11:35:06', '0000-00-00 00:00:00'),
(5, 5, 22, 'dfdf', '2022-09-24 11:35:07', '0000-00-00 00:00:00'),
(6, 4, 22, 'dfdfd', '2022-09-24 11:35:07', '0000-00-00 00:00:00'),
(7, 3, 22, 'fdfd', '2022-09-24 11:35:07', '0000-00-00 00:00:00'),
(8, 6, 22, 'fdf', '2022-09-24 11:35:07', '0000-00-00 00:00:00'),
(9, 5, 23, '55', '2022-09-24 11:55:25', '0000-00-00 00:00:00'),
(10, 4, 23, '55', '2022-09-24 11:55:25', '0000-00-00 00:00:00'),
(11, 3, 23, '55', '2022-09-24 11:55:26', '0000-00-00 00:00:00'),
(12, 6, 23, '55', '2022-09-24 11:55:26', '0000-00-00 00:00:00'),
(13, 5, 24, '55', '2022-09-24 11:55:51', '0000-00-00 00:00:00'),
(14, 4, 24, '555', '2022-09-24 11:55:51', '0000-00-00 00:00:00'),
(15, 3, 24, '555', '2022-09-24 11:55:51', '0000-00-00 00:00:00'),
(16, 6, 24, '555', '2022-09-24 11:55:51', '0000-00-00 00:00:00'),
(17, 8, 25, '66', '2022-09-24 11:56:18', '0000-00-00 00:00:00'),
(18, 9, 25, '66', '2022-09-24 11:56:18', '0000-00-00 00:00:00'),
(19, 8, 26, 'ytytyt', '2022-09-24 11:56:59', '0000-00-00 00:00:00'),
(20, 9, 26, 'yty', '2022-09-24 11:57:00', '0000-00-00 00:00:00'),
(21, 5, 27, '55', '2022-09-24 12:01:35', '0000-00-00 00:00:00'),
(22, 4, 27, '55', '2022-09-24 12:01:35', '0000-00-00 00:00:00'),
(23, 3, 27, '55', '2022-09-24 12:01:36', '0000-00-00 00:00:00'),
(24, 6, 27, '55', '2022-09-24 12:01:36', '2022-09-24 12:02:46'),
(25, 10, 29, '111', '2022-09-24 12:07:12', '0000-00-00 00:00:00'),
(26, 11, 29, '111', '2022-09-24 12:07:12', '0000-00-00 00:00:00'),
(27, 10, 30, '11', '2022-09-24 12:07:25', '0000-00-00 00:00:00'),
(28, 11, 30, '111', '2022-09-24 12:07:25', '0000-00-00 00:00:00'),
(33, 5, 33, '767', '2022-09-24 16:11:28', '0000-00-00 00:00:00'),
(34, 4, 33, '767', '2022-09-24 16:11:28', '0000-00-00 00:00:00'),
(35, 3, 33, '767', '2022-09-24 16:11:28', '0000-00-00 00:00:00'),
(36, 6, 33, '77', '2022-09-24 16:11:28', '0000-00-00 00:00:00'),
(37, 5, 34, '6', '2022-09-24 16:12:45', '0000-00-00 00:00:00'),
(38, 4, 34, '6', '2022-09-24 16:12:45', '0000-00-00 00:00:00'),
(39, 3, 34, '6', '2022-09-24 16:12:45', '0000-00-00 00:00:00'),
(40, 6, 34, '6', '2022-09-24 16:12:45', '0000-00-00 00:00:00'),
(43, 10, 36, '111', '2022-09-27 11:00:59', '2022-09-27 11:00:59'),
(44, 11, 36, '1', '2022-09-27 11:00:59', '2022-09-27 11:00:59'),
(45, 5, 37, '2', '2022-09-27 11:51:52', '2022-09-27 11:51:52'),
(46, 4, 37, '2', '2022-09-27 11:51:52', '2022-09-27 11:51:52'),
(47, 3, 37, '2', '2022-09-27 11:51:52', '2022-09-27 11:51:52'),
(48, 6, 37, '2', '2022-09-27 11:51:53', '2022-09-27 11:51:53'),
(49, 1, 38, '11', '2022-09-27 12:56:46', '2022-09-27 12:56:46'),
(50, 1, 39, '11', '2022-09-27 12:56:50', '2022-09-27 12:56:50'),
(51, 1, 40, '55', '2022-09-27 12:56:41', '2022-09-27 12:56:41'),
(52, 1, 41, '55', '2022-09-27 12:56:32', '2022-09-27 12:56:32'),
(53, 12, 41, '55', '2022-09-27 12:56:32', '2022-09-27 12:56:32'),
(54, 12, 40, '55', '2022-09-27 12:56:41', '2022-09-27 12:56:41'),
(55, 12, 38, '5', '2022-09-27 12:56:46', '2022-09-27 12:56:46'),
(56, 12, 39, '6', '2022-09-27 12:56:50', '2022-09-27 12:56:50'),
(57, 10, 42, '44', '2022-09-27 13:30:11', '2022-09-27 13:30:11'),
(58, 11, 42, '44', '2022-09-27 13:30:11', '2022-09-27 13:30:11'),
(59, 10, 43, '55', '2022-09-27 13:30:25', '2022-09-27 13:30:25'),
(60, 11, 43, '55', '2022-09-27 13:30:26', '2022-09-27 13:30:26'),
(61, 10, 44, '55', '2022-09-27 13:30:34', '2022-09-27 13:30:34'),
(62, 11, 44, '55', '2022-09-27 13:30:34', '2022-09-27 13:30:34'),
(65, 10, 46, '66', '2022-09-28 22:51:17', '2022-09-28 22:51:17'),
(66, 11, 46, '66', '2022-09-28 22:51:18', '2022-09-28 22:51:18'),
(69, 10, 48, '44', '2022-09-27 13:38:42', '2022-09-27 13:38:42'),
(70, 11, 48, '44', '2022-09-27 13:38:42', '2022-09-27 13:38:42'),
(71, 10, 49, '44', '2022-09-27 13:39:08', '2022-09-27 13:39:08'),
(72, 11, 49, '44', '2022-09-27 13:39:08', '2022-09-27 13:39:08'),
(73, 10, 50, '55', '2022-09-27 13:39:01', '2022-09-27 13:39:01'),
(74, 11, 50, '55', '2022-09-27 13:39:01', '2022-09-27 13:39:01'),
(75, 13, 51, '2022-11-02', '2022-09-28 09:25:07', '2022-09-28 09:25:07'),
(76, 14, 51, '2022-11-02', '2022-09-28 09:25:07', '2022-09-28 09:25:07'),
(77, 15, 51, '2022-11-02', '2022-09-28 09:25:07', '2022-09-28 09:25:07'),
(78, 13, 48, '77', '2022-09-28 09:25:50', '2022-09-28 09:25:50'),
(79, 14, 48, '77', '2022-09-28 09:25:50', '2022-09-28 09:25:50'),
(80, 15, 48, '77', '2022-09-28 09:25:50', '2022-09-28 09:25:50'),
(81, 13, 49, '77', '2022-09-27 17:31:24', '2022-09-27 17:31:24'),
(82, 14, 49, '77', '2022-09-27 17:31:24', '2022-09-27 17:31:24'),
(83, 15, 49, '77', '2022-09-27 17:31:24', '2022-09-27 17:31:24'),
(84, 16, 51, '2022-11-02', '2022-09-28 09:25:07', '2022-09-28 09:25:07'),
(85, 17, 51, '2022-11-02', '2022-09-28 09:25:08', '2022-09-28 09:25:08'),
(86, 13, 52, '44', '2022-09-27 18:21:33', '2022-09-27 18:21:33'),
(87, 14, 52, '44', '2022-09-27 18:21:33', '2022-09-27 18:21:33'),
(88, 15, 52, '44', '2022-09-27 18:21:33', '2022-09-27 18:21:33'),
(89, 16, 52, '44', '2022-09-27 18:21:33', '2022-09-27 18:21:33'),
(90, 17, 52, '44', '2022-09-27 18:21:33', '2022-09-27 18:21:33'),
(91, 18, 55, '5', '2022-09-28 22:52:05', '2022-09-28 22:52:05'),
(92, 13, 56, '5', '2022-09-28 09:25:22', '2022-09-28 09:25:22'),
(93, 14, 56, '5', '2022-09-28 09:25:22', '2022-09-28 09:25:22'),
(94, 15, 56, '55', '2022-09-28 09:25:22', '2022-09-28 09:25:22'),
(95, 16, 56, '5', '2022-09-28 09:25:22', '2022-09-28 09:25:22'),
(96, 17, 56, '55', '2022-09-28 09:25:22', '2022-09-28 09:25:22'),
(97, 16, 48, '33', '2022-09-28 09:25:51', '2022-09-28 09:25:51'),
(98, 17, 48, '44', '2022-09-28 09:25:51', '2022-09-28 09:25:51'),
(99, 13, 57, '2', '2022-10-03 20:16:06', '2022-10-03 20:16:06'),
(100, 14, 57, '3', '2022-10-03 20:16:06', '2022-10-03 20:16:06'),
(101, 15, 57, ' 4', '2022-10-03 20:16:07', '2022-10-03 20:16:07'),
(102, 16, 57, ' 5', '2022-10-03 20:16:07', '2022-10-03 20:16:07'),
(103, 17, 57, '6', '2022-10-03 20:16:07', '2022-10-03 20:16:07'),
(104, 13, 58, '66', '2022-09-28 16:16:48', '2022-09-28 16:16:48'),
(105, 14, 58, '66', '2022-09-28 16:16:48', '2022-09-28 16:16:48'),
(106, 15, 58, '66', '2022-09-28 16:16:48', '2022-09-28 16:16:48'),
(107, 16, 58, '66', '2022-09-28 16:16:48', '2022-09-28 16:16:48'),
(108, 17, 58, '66', '2022-09-28 16:16:48', '2022-09-28 16:16:48'),
(109, 18, 53, '11', '2022-10-02 19:33:29', '2022-10-02 19:33:29'),
(110, 18, 54, '5', '2022-09-28 22:51:42', '2022-09-28 22:51:42'),
(111, 13, 59, '66', '2022-10-02 19:02:45', '2022-10-02 19:02:45'),
(112, 14, 59, '66', '2022-10-02 19:02:45', '2022-10-02 19:02:45'),
(113, 15, 59, '77', '2022-10-02 19:02:45', '2022-10-02 19:02:45'),
(114, 16, 59, '88', '2022-10-02 19:02:45', '2022-10-02 19:02:45'),
(115, 17, 59, '88', '2022-10-02 19:02:45', '2022-10-02 19:02:45'),
(116, 13, 60, '66', '2022-10-02 20:08:58', '2022-10-02 20:08:58'),
(117, 14, 60, '66', '2022-10-02 20:08:58', '2022-10-02 20:08:58'),
(118, 15, 60, '66', '2022-10-02 20:08:59', '2022-10-02 20:08:59'),
(119, 16, 60, '66', '2022-10-02 20:08:59', '2022-10-02 20:08:59'),
(120, 17, 60, '66', '2022-10-02 20:08:59', '2022-10-02 20:08:59'),
(121, 13, 61, '1', '2022-10-03 20:16:20', '2022-10-03 20:16:20'),
(122, 14, 61, '2', '2022-10-03 20:16:20', '2022-10-03 20:16:20'),
(123, 15, 61, '3', '2022-10-03 20:16:20', '2022-10-03 20:16:20'),
(124, 16, 61, '4', '2022-10-03 20:16:20', '2022-10-03 20:16:20'),
(125, 17, 61, '5', '2022-10-03 20:16:20', '2022-10-03 20:16:20'),
(126, 13, 62, '55', '2022-10-03 20:24:34', '2022-10-03 20:24:34'),
(127, 14, 62, '45454', '2022-10-03 20:24:35', '2022-10-03 20:24:35'),
(128, 15, 62, '55', '2022-10-03 20:24:35', '2022-10-03 20:24:35'),
(129, 16, 62, '5', '2022-10-03 20:24:35', '2022-10-03 20:24:35'),
(130, 17, 62, '44', '2022-10-03 20:24:35', '2022-10-03 20:24:35'),
(131, 13, 63, '55', '2022-10-04 19:02:53', '2022-10-04 19:02:53'),
(132, 14, 63, '55', '2022-10-04 19:02:53', '2022-10-04 19:02:53'),
(133, 15, 63, '55', '2022-10-04 19:02:53', '2022-10-04 19:02:53'),
(134, 16, 63, '5', '2022-10-04 19:02:53', '2022-10-04 19:02:53'),
(135, 17, 63, '11', '2022-10-04 19:02:53', '2022-10-04 19:02:53'),
(136, 10, 64, '5', '2022-10-03 20:27:18', '2022-10-03 20:27:18'),
(137, 11, 64, '44', '2022-10-03 20:27:18', '2022-10-03 20:27:18'),
(138, 13, 65, '11', '2022-10-04 19:34:14', '2022-10-04 19:34:14'),
(139, 14, 65, '1', '2022-10-04 19:34:14', '2022-10-04 19:34:14'),
(140, 15, 65, '1', '2022-10-04 19:34:14', '2022-10-04 19:34:14'),
(141, 16, 65, '1', '2022-10-04 19:34:14', '2022-10-04 19:34:14'),
(142, 17, 65, '1', '2022-10-04 19:34:14', '2022-10-04 19:34:14'),
(143, 13, 66, '1', '2022-10-04 19:38:10', '2022-10-04 19:38:10'),
(144, 14, 66, '11', '2022-10-04 19:38:11', '2022-10-04 19:38:11'),
(145, 15, 66, '1', '2022-10-04 19:38:11', '2022-10-04 19:38:11'),
(146, 16, 66, '1', '2022-10-04 19:38:11', '2022-10-04 19:38:11'),
(147, 17, 66, '1', '2022-10-04 19:38:11', '2022-10-04 19:38:11'),
(148, 13, 67, '1', '2022-10-04 19:38:34', '2022-10-04 19:38:34'),
(149, 14, 67, '1', '2022-10-04 19:38:34', '2022-10-04 19:38:34'),
(150, 15, 67, '1', '2022-10-04 19:38:34', '2022-10-04 19:38:34'),
(151, 16, 67, '1', '2022-10-04 19:38:34', '2022-10-04 19:38:34'),
(152, 17, 67, '1', '2022-10-04 19:38:34', '2022-10-04 19:38:34'),
(153, 13, 68, '1', '2022-10-04 19:59:22', '2022-10-04 19:59:22'),
(154, 14, 68, '1', '2022-10-04 19:59:22', '2022-10-04 19:59:22'),
(155, 15, 68, '1', '2022-10-04 19:59:22', '2022-10-04 19:59:22'),
(156, 16, 68, '1', '2022-10-04 19:59:22', '2022-10-04 19:59:22'),
(157, 17, 68, '1', '2022-10-04 19:59:22', '2022-10-04 19:59:22'),
(158, 13, 69, '66', '2022-10-10 14:04:14', '2022-10-10 14:04:14'),
(159, 14, 69, '66', '2022-10-10 14:04:14', '2022-10-10 14:04:14'),
(160, 15, 69, '66', '2022-10-10 14:04:14', '2022-10-10 14:04:14'),
(161, 16, 69, '66', '2022-10-10 14:04:14', '2022-10-10 14:04:14'),
(162, 17, 69, '66', '2022-10-10 14:04:15', '2022-10-10 14:04:15'),
(163, 13, 70, '66', '2022-10-10 14:13:47', '2022-10-10 14:13:47'),
(164, 14, 70, '66', '2022-10-10 14:13:48', '2022-10-10 14:13:48'),
(165, 15, 70, '6', '2022-10-10 14:13:48', '2022-10-10 14:13:48'),
(166, 16, 70, '66', '2022-10-10 14:13:48', '2022-10-10 14:13:48'),
(167, 17, 70, '6', '2022-10-10 14:13:48', '2022-10-10 14:13:48'),
(168, 13, 71, '66', '2022-10-10 14:13:59', '2022-10-10 14:13:59'),
(169, 14, 71, '66', '2022-10-10 14:13:59', '2022-10-10 14:13:59'),
(170, 15, 71, '66', '2022-10-10 14:13:59', '2022-10-10 14:13:59'),
(171, 16, 71, '66', '2022-10-10 14:13:59', '2022-10-10 14:13:59'),
(172, 17, 71, '66', '2022-10-10 14:13:59', '2022-10-10 14:13:59'),
(173, 10, 72, '66', '2022-10-10 14:16:40', '2022-10-10 14:16:40'),
(174, 11, 72, '66', '2022-10-10 14:16:40', '2022-10-10 14:16:40'),
(175, 10, 73, '77', '2022-10-10 14:16:59', '2022-10-10 14:16:59'),
(176, 11, 73, '77', '2022-10-10 14:16:59', '2022-10-10 14:16:59'),
(177, 13, 74, '11', '2022-10-11 11:28:53', '2022-10-11 11:28:53'),
(178, 14, 74, '11', '2022-10-11 11:28:53', '2022-10-11 11:28:53'),
(179, 15, 74, '11', '2022-10-11 11:28:53', '2022-10-11 11:28:53'),
(180, 16, 74, '11', '2022-10-11 11:28:53', '2022-10-11 11:28:53'),
(181, 17, 74, '11', '2022-10-11 11:28:53', '2022-10-11 11:28:53'),
(182, 13, 75, '333', '2022-10-11 11:29:08', '2022-10-11 11:29:08'),
(183, 14, 75, '2323', '2022-10-11 11:29:08', '2022-10-11 11:29:08'),
(184, 15, 75, '232', '2022-10-11 11:29:09', '2022-10-11 11:29:09'),
(185, 16, 75, '323', '2022-10-11 11:29:09', '2022-10-11 11:29:09'),
(186, 17, 75, '323', '2022-10-11 11:29:09', '2022-10-11 11:29:09');

-- --------------------------------------------------------

--
-- Table structure for table `predefined_objectives`
--

CREATE TABLE `predefined_objectives` (
  `id` int(10) NOT NULL,
  `financial_year_id` int(10) DEFAULT NULL,
  `sl_no` int(10) DEFAULT NULL,
  `objectives_name` varchar(64) DEFAULT NULL,
  `weight_of_objectives` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `predefined_objectives`
--

INSERT INTO `predefined_objectives` (`id`, `financial_year_id`, `sl_no`, `objectives_name`, `weight_of_objectives`) VALUES
(29, 1, 43434, '343434', '3434.00'),
(38, 4, 2, 'কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্', '434.00'),
(43, 4, 1, 'কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্', '4545.00'),
(46, 3, 1, '2221', '3313.00'),
(47, 4, 434343, 'কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্', '3434.00'),
(48, 5, 1, 'কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্যক্রম কার্', '111.00'),
(49, 5, 2, '344', '555.00'),
(50, 6, 33, '333', '333.00'),
(51, 6, 34, 'gggggg', '0.00'),
(52, 5, 565656, '56565', '656.00');

-- --------------------------------------------------------

--
-- Table structure for table `predefined_objectives_column`
--

CREATE TABLE `predefined_objectives_column` (
  `id` int(10) NOT NULL,
  `financial_year_id` int(10) DEFAULT NULL,
  `column_name` varchar(127) DEFAULT NULL,
  `in_percent` varchar(64) DEFAULT NULL,
  `order_no` int(10) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `predefined_objectives_column`
--

INSERT INTO `predefined_objectives_column` (`id`, `financial_year_id`, `column_name`, `in_percent`, `order_no`, `created_at`, `updated_at`) VALUES
(1, 3, 'abc', '4', 1, '2022-09-21 21:30:09', NULL),
(3, 1, 'উত্তম ', '60', 3, '2022-09-21 21:31:00', '2022-09-22 10:10:53'),
(4, 1, 'অতি  উত্তম ', '80', 2, '2022-09-21 21:31:13', '2022-09-22 10:40:03'),
(5, 1, 'অসাধারণ', '100', 1, '2022-09-21 21:31:27', '2022-09-22 10:09:46'),
(6, 1, 'পুওর', '40', 4, '2022-09-22 17:57:15', '2022-09-22 17:57:27'),
(8, 2, 'abc', '40', 1, '2022-09-23 22:21:50', NULL),
(9, 2, 'abc1', '60', 3, '2022-09-23 22:22:04', NULL),
(10, 4, 'abc', '100', 1, '2022-09-24 12:06:30', NULL),
(11, 4, 'def', '50', 2, '2022-09-24 12:06:44', NULL),
(12, 3, '545', '45', 55, '2022-09-27 12:56:15', NULL),
(13, 5, 'অতি  উত্তম ', '100', 1, '2022-09-27 17:26:53', NULL),
(14, 5, 'অসাধারণ', '80', 2, '2022-09-27 17:27:14', NULL),
(15, 5, 'পুওর', '30', 3, '2022-09-27 17:27:32', '2022-09-27 17:31:44'),
(16, 5, '4545', '10', 5, '2022-09-27 17:32:02', NULL),
(17, 5, '555', '5', 6, '2022-09-27 17:32:42', '2022-10-01 01:03:18'),
(18, 6, 'অসাধারণ', '55', 1, '2022-09-27 18:50:22', '2022-10-02 19:38:45'),
(19, 6, 'পুওর', '3', 2, '2022-10-02 19:37:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `translation`
--

CREATE TABLE `translation` (
  `id` int(10) NOT NULL,
  `en` varchar(256) DEFAULT NULL,
  `bn` varchar(256) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `translation`
--

INSERT INTO `translation` (`id`, `en`, `bn`, `created_at`, `updated_at`) VALUES
(1, 'Activities', 'কার্যক্রম', '2022-10-04 21:46:31', NULL),
(2, 'Predefined Innovation Plan', 'কর্ম সম্পাদন সূচক', '2022-10-04 21:59:12', NULL),
(3, 'Performance Indicators', 'মান', '2022-10-04 22:00:00', NULL),
(4, 'Weight Of Plan', 'কার্য সম্পাদনের সূচকের মান', '2022-10-04 22:00:55', NULL),
(5, 'Attached', 'সংযুক্ত', '2022-10-04 22:03:10', NULL),
(6, 'Submission', 'জমা', '2022-10-04 22:03:39', NULL),
(7, 'Half Yearly Evaluation', 'অর্ধবার্ষিক মূল্যায়ন', '2022-10-04 22:04:11', NULL),
(8, 'Yearly Evaluation', 'বার্ষিক মূল্যায়ন', '2022-10-04 22:04:39', NULL),
(9, 'Final Evaluation', 'চূড়ান্ত মূল্যায়ন', '2022-10-04 22:05:02', NULL),
(10, 'Actions', 'কাজ', '2022-10-04 22:05:51', '2022-10-04 22:06:04'),
(11, 'Predefined Template', 'পূর্বনির্ধারিত টেমপ্লেট', '2022-10-04 22:09:03', NULL),
(12, 'Toggle Fullscreen', 'টগল পর্দা জুড়ে প্রদর্শন', '2022-10-04 22:12:46', NULL),
(13, 'Financial year', 'আর্থিক বছর', '2022-10-04 22:15:16', NULL),
(14, 'Member', 'সদস্য', '2022-10-04 22:17:27', NULL),
(15, 'Department', 'বিভাগ', '2022-10-04 22:18:02', NULL),
(16, 'Switch to', 'সুইচ', '2022-10-04 22:20:43', NULL),
(17, 'Innovation plan', 'কর্ম সম্পাদন সূচক', '2022-10-09 16:08:45', NULL),
(18, 'Users', 'ব্যবহারকারী', '2022-10-09 16:10:30', NULL),
(19, 'Dashboard', 'ড্যাশবোর্ড', '2022-10-09 16:12:31', NULL),
(20, 'Settings', 'সেটিংস', '2022-10-09 16:14:14', NULL),
(21, 'Profile', 'প্রোফাইল', '2022-10-09 16:15:10', NULL),
(22, 'Predefined objectives column', 'কর্ম সম্পাদন ক্ষেত্র কলাম', '2022-10-09 16:30:17', NULL),
(23, 'Translation', 'অনুবাদ', '2022-10-09 16:31:56', NULL),
(24, 'Innovation team', 'উদ্ভাবনী দল', '2022-10-09 16:32:37', NULL),
(25, 'Predined Settings', 'পূর্বনির্ধারিত সেটিংস', '2022-10-09 16:34:09', NULL),
(26, 'Evaluation', 'মূল্যায়ন', '2022-10-10 23:03:15', NULL),
(27, 'Documents', 'নথি', '2022-10-11 13:17:54', NULL),
(28, 'Plan', 'পরিকল্পনা', '2022-10-11 13:18:34', NULL),
(29, 'Year', 'বছর', '2022-10-11 13:19:09', NULL),
(30, 'Half Year', 'অর্ধবার্ষিক', '2022-10-11 13:19:41', NULL),
(31, 'Full Year', 'বার্ষিক', '2022-10-11 13:20:15', NULL),
(32, 'Comments', 'মন্তব্য', '2022-10-11 13:20:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `owner_users_id` int(10) DEFAULT NULL,
  `department_id` int(10) DEFAULT NULL,
  `email` varchar(127) NOT NULL,
  `password` varchar(127) NOT NULL,
  `title` varchar(127) NOT NULL,
  `first_name` varchar(127) NOT NULL,
  `last_name` varchar(127) NOT NULL,
  `file_picture` varchar(256) DEFAULT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `company` varchar(127) DEFAULT NULL,
  `address` varchar(127) DEFAULT NULL,
  `city` varchar(127) DEFAULT NULL,
  `state` varchar(127) DEFAULT NULL,
  `zip` varchar(127) DEFAULT NULL,
  `country_id` varchar(127) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_type` enum('super','admin','organization') NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `owner_users_id`, `department_id`, `email`, `password`, `title`, `first_name`, `last_name`, `file_picture`, `phone_no`, `dob`, `company`, `address`, `city`, `state`, `zip`, `country_id`, `created_at`, `updated_at`, `user_type`, `status`) VALUES
(9, NULL, 3, 'xx@xx.com', 'xx', 'Mr.', 'John', 'Smith', 'uploads/images/users/1664374371IMG_3269.JPG', '', '0000-00-00', '', '', '', '', '', '231', '2011-10-19 00:00:00', '2022-09-28 16:12:51', 'super', 'active'),
(10, 11, 3, 'aa@aa.com', 'aa', 'aa', 'aa', 'aa', 'uploads/images/users/1664374335IMG_3251.JPG', '98989898', '2022-09-28', '', '', '', '', '', '234', '2022-09-28 13:05:44', '2022-10-02 13:29:07', 'organization', 'active'),
(11, 12, 2, 'bb@bb.com', 'bb', 'bb', 'bb', 'bb', 'uploads/images/users/1664795542about.jpg', '', '2022-10-02', '', '', '', '', '', '232', NULL, '2022-10-03 13:12:22', 'admin', 'active'),
(12, 11, 5, 'cc@cc.com', 'cc', '', 'cc', 'cc', 'uploads/images/users/1664711534IMG_3251.JPG', '', '0000-00-00', '', '', '', '', '', '', '2022-10-02 13:52:14', NULL, 'organization', 'active'),
(13, 11, 4, 'dd@dd.com', 'dd', '', 'dd', 'dd', 'uploads/images/users/1664712623IMG_3269.JPG', '', '0000-00-00', '', '', '', '', '', '', '2022-10-02 14:09:54', '2022-10-02 14:10:23', 'organization', 'active'),
(14, 11, 4, 'ssd@gfg.com', '123', '', '111', '111', NULL, '', '0000-00-00', '', '', '', '', '', '231', '2022-10-11 12:30:28', NULL, 'organization', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `financial_year`
--
ALTER TABLE `financial_year`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `innovation_plan`
--
ALTER TABLE `innovation_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `innovation_plan_history`
--
ALTER TABLE `innovation_plan_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `innovation_team`
--
ALTER TABLE `innovation_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `predefined_activities`
--
ALTER TABLE `predefined_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `predefined_innovation_plan`
--
ALTER TABLE `predefined_innovation_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `predefined_innovation_plan_column_data`
--
ALTER TABLE `predefined_innovation_plan_column_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `predefined_objectives`
--
ALTER TABLE `predefined_objectives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `predefined_objectives_column`
--
ALTER TABLE `predefined_objectives_column`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `translation`
--
ALTER TABLE `translation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `financial_year`
--
ALTER TABLE `financial_year`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `innovation_plan`
--
ALTER TABLE `innovation_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `innovation_plan_history`
--
ALTER TABLE `innovation_plan_history`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `innovation_team`
--
ALTER TABLE `innovation_team`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `predefined_activities`
--
ALTER TABLE `predefined_activities`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `predefined_innovation_plan`
--
ALTER TABLE `predefined_innovation_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `predefined_innovation_plan_column_data`
--
ALTER TABLE `predefined_innovation_plan_column_data`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT for table `predefined_objectives`
--
ALTER TABLE `predefined_objectives`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `predefined_objectives_column`
--
ALTER TABLE `predefined_objectives_column`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `translation`
--
ALTER TABLE `translation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
