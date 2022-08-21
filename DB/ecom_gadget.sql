-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2022 at 06:56 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom_gadget`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(255) NOT NULL,
  `f_name` varchar(255) DEFAULT NULL,
  `l_name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `bill_country` varchar(255) DEFAULT NULL,
  `bill_city` varchar(255) DEFAULT NULL,
  `bill_town` varchar(255) DEFAULT NULL,
  `bill_address` varchar(255) DEFAULT NULL,
  `ship_country` varchar(255) DEFAULT NULL,
  `ship_city` varchar(255) DEFAULT NULL,
  `ship_town` varchar(255) DEFAULT NULL,
  `ship_address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `f_name`, `l_name`, `mobile`, `email`, `password`, `bill_country`, `bill_city`, `bill_town`, `bill_address`, `ship_country`, `ship_city`, `ship_town`, `ship_address`, `created_at`, `updated_at`) VALUES
(1, 'Rakibul', 'Hassan', '01732691729', 'rakibulhassan602@gmail.com', '1234', 'Anguilla (AI)', 'Sherpur', 'Sreebardi', 'Munsipara', 'Bangladesh (BD)', 'Sherpur', 'Sreebardi', 'Munsipara', '2022-06-15 20:01:37', '2022-06-15 20:01:37'),
(2, 'Rakibul', 'Hassan', '01732691729', 'rakibulhassan@gmail.com', '1234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-15 20:16:48', '2022-06-15 20:16:48'),
(3, 'Sakibul', 'Hassan', '01830978707', 'sakib@gmail.com', '1234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-20 21:53:53', '2022-06-20 21:53:53');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(255) NOT NULL,
  `brand_name` varchar(500) NOT NULL,
  `brand_image` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand_name`, `brand_image`) VALUES
(1, 'Asus', 'https://www.asus.com/WebsitesBanner/BD/banners/cnhrn0ovrce0gi3z/cnhrn0ovrce0gi3z-0_0_desktop_1X.jpg?webp'),
(2, 'Acer', 'https://www.asus.com/WebsitesBanner/BD/banners/cnhrn0ovrce0gi3z/cnhrn0ovrce0gi3z-0_0_desktop_1X.jpg?webp'),
(3, 'HP', 'https://www.asus.com/WebsitesBanner/BD/banners/cnhrn0ovrce0gi3z/cnhrn0ovrce0gi3z-0_0_desktop_1X.jpg?webp'),
(4, 'lenevo', 'https://www.asus.com/WebsitesBanner/BD/banners/cnhrn0ovrce0gi3z/cnhrn0ovrce0gi3z-0_0_desktop_1X.jpg?webp'),
(5, 'Dell', 'https://www.asus.com/WebsitesBanner/BD/banners/cnhrn0ovrce0gi3z/cnhrn0ovrce0gi3z-0_0_desktop_1X.jpg?webp'),
(6, 'oppo', 'https://www.asus.com/WebsitesBanner/BD/banners/cnhrn0ovrce0gi3z/cnhrn0ovrce0gi3z-0_0_desktop_1X.jpg?webp'),
(7, 'Walton', 'https://www.asus.com/WebsitesBanner/BD/banners/cnhrn0ovrce0gi3z/cnhrn0ovrce0gi3z-0_0_desktop_1X.jpg?webp'),
(8, 'Vivo', 'https://www.asus.com/WebsitesBanner/BD/banners/cnhrn0ovrce0gi3z/cnhrn0ovrce0gi3z-0_0_desktop_1X.jpg?webp');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(255) NOT NULL,
  `category_name` varchar(500) NOT NULL,
  `category_image` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `category_image`) VALUES
(1, 'Product', 'https://www.globalbrandsmagazine.com/wp-content/uploads/2020/08/Top-10-Mobile-Brands-in-World-1-1.jpg'),
(2, 'Blog', 'https://www.globalbrandsmagazine.com/wp-content/uploads/2020/08/Top-10-Mobile-Brands-in-World-1-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `client_says`
--

CREATE TABLE `client_says` (
  `id` int(255) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `photo` varchar(2000) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client_says`
--

INSERT INTO `client_says` (`id`, `name`, `designation`, `photo`, `comment`) VALUES
(1, 'Monirul', 'Developer', 'https://monirulakand.com/images/mobile-app.svg', 'I am a highly talented, experienced, professional and cooperative software developer, I am working in programming and web world for more than 1 year .I assure you a wide range of quality IT services.'),
(2, 'Rabbil', 'Software', 'https://monirulakand.com/images/mobile-app.svg', 'I am a highly talented, experienced, professional and cooperative software developer, I am working in programming and web world for more than 1 year .I assure you a wide range of quality IT services.'),
(3, 'Zihad', 'Designer', 'https://monirulakand.com/images/mobile-app.svg', 'I am a highly talented, experienced, professional and cooperative software developer, I am working in programming and web world for more than 1 year .I assure you a wide range of quality IT services.'),
(4, 'Rain', 'Pharmasist', 'https://monirulakand.com/images/mobile-app.svg', 'I am a highly talented, experienced, professional and cooperative software developer, I am working in programming and web world for more than 1 year .I assure you a wide range of quality IT services.');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(255) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `subject` varchar(1000) NOT NULL,
  `message` text NOT NULL,
  `contact_time` varchar(100) NOT NULL,
  `contact_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `code`) VALUES
(1, 'Afghanistan', 'AF'),
(2, 'Åland Islands', 'AX'),
(3, 'Albania', 'AL'),
(4, 'Algeria', 'DZ'),
(5, 'American Samoa', 'AS'),
(6, 'AndorrA', 'AD'),
(7, 'Angola', 'AO'),
(8, 'Anguilla', 'AI'),
(9, 'Antarctica', 'AQ'),
(10, 'Antigua and Barbuda', 'AG'),
(11, 'Argentina', 'AR'),
(12, 'Armenia', 'AM'),
(13, 'Aruba', 'AW'),
(14, 'Australia', 'AU'),
(15, 'Austria', 'AT'),
(16, 'Azerbaijan', 'AZ'),
(17, 'Bahamas', 'BS'),
(18, 'Bahrain', 'BH'),
(19, 'Bangladesh', 'BD'),
(20, 'Barbados', 'BB'),
(21, 'Belarus', 'BY'),
(22, 'Belgium', 'BE'),
(23, 'Belize', 'BZ'),
(24, 'Benin', 'BJ'),
(25, 'Bermuda', 'BM'),
(26, 'Bhutan', 'BT'),
(27, 'Bolivia', 'BO'),
(28, 'Bosnia and Herzegovina', 'BA'),
(29, 'Botswana', 'BW'),
(30, 'Bouvet Island', 'BV'),
(31, 'Brazil', 'BR'),
(32, 'British Indian Ocean Territory', 'IO'),
(33, 'Brunei Darussalam', 'BN'),
(34, 'Bulgaria', 'BG'),
(35, 'Burkina Faso', 'BF'),
(36, 'Burundi', 'BI'),
(37, 'Cambodia', 'KH'),
(38, 'Cameroon', 'CM'),
(39, 'Canada', 'CA'),
(40, 'Cape Verde', 'CV'),
(41, 'Cayman Islands', 'KY'),
(42, 'Central African Republic', 'CF'),
(43, 'Chad', 'TD'),
(44, 'Chile', 'CL'),
(45, 'China', 'CN'),
(46, 'Christmas Island', 'CX'),
(47, 'Cocos (Keeling) Islands', 'CC'),
(48, 'Colombia', 'CO'),
(49, 'Comoros', 'KM'),
(50, 'Congo', 'CG'),
(51, 'Congo, The Democratic Republic of the', 'CD'),
(52, 'Cook Islands', 'CK'),
(53, 'Costa Rica', 'CR'),
(54, 'Cote D\'Ivoire', 'CI'),
(55, 'Croatia', 'HR'),
(56, 'Cuba', 'CU'),
(57, 'Cyprus', 'CY'),
(58, 'Czech Republic', 'CZ'),
(59, 'Denmark', 'DK'),
(60, 'Djibouti', 'DJ'),
(61, 'Dominica', 'DM'),
(62, 'Dominican Republic', 'DO'),
(63, 'Ecuador', 'EC'),
(64, 'Egypt', 'EG'),
(65, 'El Salvador', 'SV'),
(66, 'Equatorial Guinea', 'GQ'),
(67, 'Eritrea', 'ER'),
(68, 'Estonia', 'EE'),
(69, 'Ethiopia', 'ET'),
(70, 'Falkland Islands (Malvinas)', 'FK'),
(71, 'Faroe Islands', 'FO'),
(72, 'Fiji', 'FJ'),
(73, 'Finland', 'FI'),
(74, 'France', 'FR'),
(75, 'French Guiana', 'GF'),
(76, 'French Polynesia', 'PF'),
(77, 'French Southern Territories', 'TF'),
(78, 'Gabon', 'GA'),
(79, 'Gambia', 'GM'),
(80, 'Georgia', 'GE'),
(81, 'Germany', 'DE'),
(82, 'Ghana', 'GH'),
(83, 'Gibraltar', 'GI'),
(84, 'Greece', 'GR'),
(85, 'Greenland', 'GL'),
(86, 'Grenada', 'GD'),
(87, 'Guadeloupe', 'GP'),
(88, 'Guam', 'GU'),
(89, 'Guatemala', 'GT'),
(90, 'Guernsey', 'GG'),
(91, 'Guinea', 'GN'),
(92, 'Guinea-Bissau', 'GW'),
(93, 'Guyana', 'GY'),
(94, 'Haiti', 'HT'),
(95, 'Heard Island and Mcdonald Islands', 'HM'),
(96, 'Holy See (Vatican City State)', 'VA'),
(97, 'Honduras', 'HN'),
(98, 'Hong Kong', 'HK'),
(99, 'Hungary', 'HU'),
(100, 'Iceland', 'IS'),
(101, 'India', 'IN'),
(102, 'Indonesia', 'ID'),
(103, 'Iran, Islamic Republic Of', 'IR'),
(104, 'Iraq', 'IQ'),
(105, 'Ireland', 'IE'),
(106, 'Isle of Man', 'IM'),
(107, 'Israel', 'IL'),
(108, 'Italy', 'IT'),
(109, 'Jamaica', 'JM'),
(110, 'Japan', 'JP'),
(111, 'Jersey', 'JE'),
(112, 'Jordan', 'JO'),
(113, 'Kazakhstan', 'KZ'),
(114, 'Kenya', 'KE'),
(115, 'Kiribati', 'KI'),
(116, 'Korea, Democratic People\'S Republic of', 'KP'),
(117, 'Korea, Republic of', 'KR'),
(118, 'Kuwait', 'KW'),
(119, 'Kyrgyzstan', 'KG'),
(120, 'Lao People\'S Democratic Republic', 'LA'),
(121, 'Latvia', 'LV'),
(122, 'Lebanon', 'LB'),
(123, 'Lesotho', 'LS'),
(124, 'Liberia', 'LR'),
(125, 'Libyan Arab Jamahiriya', 'LY'),
(126, 'Liechtenstein', 'LI'),
(127, 'Lithuania', 'LT'),
(128, 'Luxembourg', 'LU'),
(129, 'Macao', 'MO'),
(130, 'Macedonia, The Former Yugoslav Republic of', 'MK'),
(131, 'Madagascar', 'MG'),
(132, 'Malawi', 'MW'),
(133, 'Malaysia', 'MY'),
(134, 'Maldives', 'MV'),
(135, 'Mali', 'ML'),
(136, 'Malta', 'MT'),
(137, 'Marshall Islands', 'MH'),
(138, 'Martinique', 'MQ'),
(139, 'Mauritania', 'MR'),
(140, 'Mauritius', 'MU'),
(141, 'Mayotte', 'YT'),
(142, 'Mexico', 'MX'),
(143, 'Micronesia, Federated States of', 'FM'),
(144, 'Moldova, Republic of', 'MD'),
(145, 'Monaco', 'MC'),
(146, 'Mongolia', 'MN'),
(147, 'Montserrat', 'MS'),
(148, 'Morocco', 'MA'),
(149, 'Mozambique', 'MZ'),
(150, 'Myanmar', 'MM'),
(151, 'Namibia', 'NA'),
(152, 'Nauru', 'NR'),
(153, 'Nepal', 'NP'),
(154, 'Netherlands', 'NL'),
(155, 'Netherlands Antilles', 'AN'),
(156, 'New Caledonia', 'NC'),
(157, 'New Zealand', 'NZ'),
(158, 'Nicaragua', 'NI'),
(159, 'Niger', 'NE'),
(160, 'Nigeria', 'NG'),
(161, 'Niue', 'NU'),
(162, 'Norfolk Island', 'NF'),
(163, 'Northern Mariana Islands', 'MP'),
(164, 'Norway', 'NO'),
(165, 'Oman', 'OM'),
(166, 'Pakistan', 'PK'),
(167, 'Palau', 'PW'),
(168, 'Palestinian Territory, Occupied', 'PS'),
(169, 'Panama', 'PA'),
(170, 'Papua New Guinea', 'PG'),
(171, 'Paraguay', 'PY'),
(172, 'Peru', 'PE'),
(173, 'Philippines', 'PH'),
(174, 'Pitcairn', 'PN'),
(175, 'Poland', 'PL'),
(176, 'Portugal', 'PT'),
(177, 'Puerto Rico', 'PR'),
(178, 'Qatar', 'QA'),
(179, 'Reunion', 'RE'),
(180, 'Romania', 'RO'),
(181, 'Russian Federation', 'RU'),
(182, 'RWANDA', 'RW'),
(183, 'Saint Helena', 'SH'),
(184, 'Saint Kitts and Nevis', 'KN'),
(185, 'Saint Lucia', 'LC'),
(186, 'Saint Pierre and Miquelon', 'PM'),
(187, 'Saint Vincent and the Grenadines', 'VC'),
(188, 'Samoa', 'WS'),
(189, 'San Marino', 'SM'),
(190, 'Sao Tome and Principe', 'ST'),
(191, 'Saudi Arabia', 'SA'),
(192, 'Senegal', 'SN'),
(193, 'Serbia and Montenegro', 'CS'),
(194, 'Seychelles', 'SC'),
(195, 'Sierra Leone', 'SL'),
(196, 'Singapore', 'SG'),
(197, 'Slovakia', 'SK'),
(198, 'Slovenia', 'SI'),
(199, 'Solomon Islands', 'SB'),
(200, 'Somalia', 'SO'),
(201, 'South Africa', 'ZA'),
(202, 'South Georgia and the South Sandwich Islands', 'GS'),
(203, 'Spain', 'ES'),
(204, 'Sri Lanka', 'LK'),
(205, 'Sudan', 'SD'),
(206, 'Suriname', 'SR'),
(207, 'Svalbard and Jan Mayen', 'SJ'),
(208, 'Swaziland', 'SZ'),
(209, 'Sweden', 'SE'),
(210, 'Switzerland', 'CH'),
(211, 'Syrian Arab Republic', 'SY'),
(212, 'Taiwan, Province of China', 'TW'),
(213, 'Tajikistan', 'TJ'),
(214, 'Tanzania, United Republic of', 'TZ'),
(215, 'Thailand', 'TH'),
(216, 'Timor-Leste', 'TL'),
(217, 'Togo', 'TG'),
(218, 'Tokelau', 'TK'),
(219, 'Tonga', 'TO'),
(220, 'Trinidad and Tobago', 'TT'),
(221, 'Tunisia', 'TN'),
(222, 'Turkey', 'TR'),
(223, 'Turkmenistan', 'TM'),
(224, 'Turks and Caicos Islands', 'TC'),
(225, 'Tuvalu', 'TV'),
(226, 'Uganda', 'UG'),
(227, 'Ukraine', 'UA'),
(228, 'United Arab Emirates', 'AE'),
(229, 'United Kingdom', 'GB'),
(230, 'United States', 'US'),
(231, 'United States Minor Outlying Islands', 'UM'),
(232, 'Uruguay', 'UY'),
(233, 'Uzbekistan', 'UZ'),
(234, 'Vanuatu', 'VU'),
(235, 'Venezuela', 'VE'),
(236, 'Viet Nam', 'VN'),
(237, 'Virgin Islands, British', 'VG'),
(238, 'Virgin Islands, U.S.', 'VI'),
(239, 'Wallis and Futuna', 'WF'),
(240, 'Western Sahara', 'EH'),
(241, 'Yemen', 'YE'),
(242, 'Zambia', 'ZM'),
(243, 'Zimbabwe', 'ZW');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `id` int(11) NOT NULL,
  `condition` double NOT NULL,
  `type` varchar(255) NOT NULL,
  `discount` float NOT NULL,
  `discount_type` varchar(255) NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`id`, `condition`, `type`, `discount`, `discount_type`, `coupon_code`, `created_at`) VALUES
(1, 1000, 'price', 150, 'flat', 'c-0001', '2022-06-23 19:54:18'),
(2, 1000, 'price', 10, 'percent', 'c-0002', '2022-06-23 19:54:18'),
(3, 3, 'product', 10, 'percent', 'c-0003', '2022-06-23 19:54:18');

-- --------------------------------------------------------

--
-- Table structure for table `flaticons`
--

CREATE TABLE `flaticons` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon_css` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(255) NOT NULL,
  `inv_no` varchar(255) NOT NULL,
  `shipping_charge` decimal(10,0) NOT NULL DEFAULT 0,
  `sub_total` decimal(10,0) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `total_discount` decimal(10,2) NOT NULL,
  `coupon_discount` decimal(10,2) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `order_status` varchar(100) NOT NULL DEFAULT 'processing',
  `email` varchar(255) NOT NULL,
  `bill_name` varchar(255) DEFAULT NULL,
  `bill_country` varchar(255) NOT NULL,
  `bill_mobile` varchar(255) NOT NULL,
  `bill_city` varchar(255) NOT NULL,
  `bill_town` varchar(255) NOT NULL,
  `bill_address` varchar(255) NOT NULL,
  `bill_email` varchar(255) DEFAULT NULL,
  `ship_name` varchar(255) DEFAULT NULL,
  `ship_mobile` varchar(255) DEFAULT NULL,
  `ship_address` varchar(255) DEFAULT NULL,
  `ship_country` varchar(255) DEFAULT NULL,
  `ship_city` varchar(255) DEFAULT NULL,
  `ship_town` varchar(255) DEFAULT NULL,
  `additional_info` varchar(1000) DEFAULT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `inv_no`, `shipping_charge`, `sub_total`, `total`, `total_discount`, `coupon_discount`, `payment_type`, `payment_status`, `order_status`, `email`, `bill_name`, `bill_country`, `bill_mobile`, `bill_city`, `bill_town`, `bill_address`, `bill_email`, `ship_name`, `ship_mobile`, `ship_address`, `ship_country`, `ship_city`, `ship_town`, `additional_info`, `created_time`, `updated_time`) VALUES
(1, '1660038709', '60', '29', '86', '3.00', '0.00', 'cash', 'pending', 'processing', 'rakibulhassan602@gmail.com', 'Rakibul', 'Anguilla (AI)', '01732691729', '01732691729', 'Sreebardi', 'Munsipara', 'rakibulhassan602@gmail.com', NULL, NULL, 'Munsipara', 'Bangladesh (BD)', 'Sherpur', 'Sreebardi', 'rakibulhassan602@gmail.com', '2022-08-09 09:51:49', NULL),
(2, '1660038786', '60', '0', '60', '0.00', '0.00', 'cash', 'pending', 'processing', 'rakibulhassan602@gmail.com', 'Rakibul', 'Anguilla (AI)', '01732691729', '01732691729', 'Sreebardi', 'Munsipara', 'rakibulhassan602@gmail.com', NULL, NULL, 'Munsipara', 'Bangladesh (BD)', 'Sherpur', 'Sreebardi', 'rakibulhassan602@gmail.com', '2022-08-09 09:53:06', NULL),
(3, '1660067926', '60', '26', '84', '2.00', '0.00', 'cash', 'pending', 'processing', 'rakibulhassan602@gmail.com', 'Rakibul', 'Anguilla (AI)', '01732691729', '01732691729', 'Sreebardi', 'Munsipara', 'rakibulhassan602@gmail.com', NULL, NULL, 'Munsipara', 'Bangladesh (BD)', 'Sherpur', 'Sreebardi', 'rakibulhassan602@gmail.com', '2022-08-09 17:58:46', NULL),
(4, '1660146298', '60', '29', '86', '3.00', '0.00', 'cash', 'pending', 'processing', 'rakibulhassan602@gmail.com', 'Rakibul', 'Anguilla (AI)', '01732691729', '01732691729', 'Sreebardi', 'Munsipara', 'rakibulhassan602@gmail.com', NULL, NULL, 'Munsipara', 'Bangladesh (BD)', 'Sherpur', 'Sreebardi', 'rakibulhassan602@gmail.com', '2022-08-10 15:44:58', NULL),
(5, '1660150756', '60', '4242', '3920', '202.00', '0.00', 'cash', 'pending', 'processing', 'rakibulhassan602@gmail.com', 'Rakibul', 'Anguilla (AI)', '01732691729', '01732691729', 'Sreebardi', 'Munsipara', 'rakibulhassan602@gmail.com', NULL, NULL, 'Munsipara', 'Bangladesh (BD)', 'Sherpur', 'Sreebardi', 'rakibulhassan602@gmail.com', '2022-08-10 16:59:16', NULL),
(6, '1660151514', '60', '13', '72', '1.00', '0.00', 'cash', 'pending', 'processing', 'rakibulhassan602@gmail.com', 'Rakibul', 'Anguilla (AI)', '01732691729', '01732691729', 'Sreebardi', 'Munsipara', 'rakibulhassan602@gmail.com', NULL, NULL, 'Munsipara', 'Bangladesh (BD)', 'Sherpur', 'Sreebardi', 'rakibulhassan602@gmail.com', '2022-08-10 17:11:54', NULL),
(7, '1660230768', '60', '79', '134', '5.00', '0.00', 'cash', 'pending', 'processing', 'rakibulhassan602@gmail.com', 'Rakibul', 'Anguilla (AI)', '01732691729', '01732691729', 'Sreebardi', 'Munsipara', 'rakibulhassan602@gmail.com', NULL, NULL, 'Munsipara', 'Bangladesh (BD)', 'Sherpur', 'Sreebardi', 'rakibulhassan602@gmail.com', '2022-08-11 15:12:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_product`
--

CREATE TABLE `invoice_product` (
  `id` int(255) NOT NULL,
  `inv_id` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` decimal(10,0) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `discount_amount` decimal(10,2) NOT NULL,
  `discount_percent` decimal(10,2) NOT NULL,
  `final_price` decimal(10,2) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice_product`
--

INSERT INTO `invoice_product` (`id`, `inv_id`, `product_name`, `product_image`, `product_code`, `price`, `qty`, `total_price`, `discount_amount`, `discount_percent`, `final_price`, `create_at`, `updated_at`) VALUES
(2, '1660038373', 'Vivo Y12a ', 'http://rakibmia.com/540x600.png', 'pm4', '13.00', '4', '52.00', '4.00', '40.00', '48.00', '2022-08-09 09:46:13', '2022-08-09 09:46:13'),
(3, '1660038373', 'oppo Reno3 pro', 'http://rakibmia.com/540x600.png', 'pm1', '16.00', '3', '48.00', '6.00', '15.00', '42.00', '2022-08-09 09:46:13', '2022-08-09 09:46:13'),
(4, '1660038373', 'Vivo Y12s ', 'http://rakibmia.com/540x600.png', 'pm2', '12.00', '1', '12.00', '1.00', '0.00', '11.00', '2022-08-09 09:46:13', '2022-08-09 09:46:13'),
(5, '1660038373', 'oppo Reno3 pro', 'http://rakibmia.com/540x600.png', 'pm1', '16.00', '1', '16.00', '2.00', '15.00', '14.00', '2022-08-09 09:46:13', '2022-08-09 09:46:13'),
(6, '1660038709', 'Vivo Y12a ', 'http://rakibmia.com/540x600.png', 'pm4', '13.00', '1', '13.00', '1.00', '40.00', '12.00', '2022-08-09 09:51:49', '2022-08-09 09:51:49'),
(7, '1660038709', 'oppo Reno3 pro', 'http://rakibmia.com/540x600.png', 'pm1', '16.00', '1', '16.00', '2.00', '15.00', '14.00', '2022-08-09 09:51:49', '2022-08-09 09:51:49'),
(8, '1660067926', 'Vivo Y12a ', 'http://rakibmia.com/540x600.png', 'pm4', '13.00', '1', '13.00', '1.00', '40.00', '12.00', '2022-08-09 17:58:46', '2022-08-09 17:58:46'),
(9, '1660067926', 'Vivo Y12a ', 'http://rakibmia.com/540x600.png', 'pm4', '13.00', '1', '13.00', '1.00', '40.00', '12.00', '2022-08-09 17:58:46', '2022-08-09 17:58:46'),
(10, '1660146298', 'Vivo Y12a ', 'http://rakibmia.com/540x600.png', 'pm4', '13.00', '1', '13.00', '1.00', '40.00', '12.00', '2022-08-10 15:44:58', '2022-08-10 15:44:58'),
(11, '1660146298', 'oppo Reno3 pro', 'http://rakibmia.com/540x600.png', 'pm1', '16.00', '1', '16.00', '2.00', '15.00', '14.00', '2022-08-10 15:44:58', '2022-08-10 15:44:58'),
(12, '1660150756', 'oppo Reno2 pro', 'http://rakibmia.com/540x600.png', 'p3', '42.00', '100', '4200.00', '200.00', '100.00', '4000.00', '2022-08-10 16:59:16', '2022-08-10 16:59:16'),
(13, '1660150756', 'oppo Reno2 pro', 'http://rakibmia.com/540x600.png', 'p3', '42.00', '1', '42.00', '2.00', '100.00', '40.00', '2022-08-10 16:59:16', '2022-08-10 16:59:16'),
(14, '1660151514', 'Vivo Y12a ', 'http://rakibmia.com/540x600.png', 'pm4', '13.00', '1', '13.00', '1.00', '40.00', '12.00', '2022-08-10 17:11:54', '2022-08-10 17:11:54'),
(15, '1660230768', 'Vivo Y12s ', 'http://rakibmia.com/540x600.png', 'pm2', '12.00', '1', '12.00', '1.00', '0.00', '11.00', '2022-08-11 15:12:48', '2022-08-11 15:12:48'),
(16, '1660230768', 'Vivo Y12s ', 'http://rakibmia.com/540x600.png', 'pm2', '12.00', '1', '12.00', '1.00', '0.00', '11.00', '2022-08-11 15:12:48', '2022-08-11 15:12:48'),
(17, '1660230768', 'oppo Reno2 pro', 'http://rakibmia.com/540x600.png', 'pm3', '42.00', '1', '42.00', '2.00', '100.00', '40.00', '2022-08-11 15:12:48', '2022-08-11 15:12:48'),
(18, '1660230768', 'Vivo Y12a ', 'http://rakibmia.com/540x600.png', 'pm4', '13.00', '1', '13.00', '1.00', '40.00', '12.00', '2022-08-11 15:12:48', '2022-08-11 15:12:48');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(255) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `image` varchar(2000) NOT NULL,
  `date` date NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `image`, `date`, `description`) VALUES
(1, 'But I must explain to you how all this mistaken idea', 'https://d2td6mzj4f4e1e.cloudfront.net/wp-content/uploads/sites/9/2022/03/Clipper-no-foil-300x200.png', '2022-03-01', 'But I must explain to you how all this mistaken idea But I must explain to you how all this mistaken '),
(2, 'But I must explain to you how all this mistaken idea', 'https://d2td6mzj4f4e1e.cloudfront.net/wp-content/uploads/sites/9/2022/03/Clipper-no-foil-300x200.png', '2022-03-01', 'But I must explain to you how all this mistaken idea But I must explain to you how all this mistaken '),
(3, 'But I must explain to you how all this mistaken idea', 'https://d2td6mzj4f4e1e.cloudfront.net/wp-content/uploads/sites/9/2022/03/Clipper-no-foil-300x200.png', '2022-03-01', 'But I must explain to you how all this mistaken idea But I must explain to you how all this mistaken '),
(4, 'But I must explain to you how all this mistaken idea', 'https://d2td6mzj4f4e1e.cloudfront.net/wp-content/uploads/sites/9/2022/03/Clipper-no-foil-300x200.png', '2022-03-01', 'But I must explain to you how all this mistaken idea But I must explain to you how all this mistaken ');

-- --------------------------------------------------------

--
-- Table structure for table `news_letter`
--

CREATE TABLE `news_letter` (
  `id` int(255) NOT NULL,
  `email` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news_letter`
--

INSERT INTO `news_letter` (`id`, `email`) VALUES
(1, 'soft.monirul@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `page_seo`
--

CREATE TABLE `page_seo` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `share_title` varchar(255) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `keywords` varchar(2000) NOT NULL,
  `page_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `page_seo`
--

INSERT INTO `page_seo` (`id`, `name`, `title`, `share_title`, `description`, `keywords`, `page_img`) VALUES
(1, 'home', 'Tech Com Bangladesh Ltd', 'Tech Com Bangladesh Ltd', 'Tech Com Bangladesh Ltd', 'Tech Com Bangladesh Ltd', 'Tech Com Bangladesh Ltd');

-- --------------------------------------------------------

--
-- Table structure for table `product_additonal_info`
--

CREATE TABLE `product_additonal_info` (
  `id` int(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_additonal_info`
--

INSERT INTO `product_additonal_info` (`id`, `product_code`, `title`, `description`) VALUES
(1, 'p-1001', 'Capacity', '5 Kg'),
(2, 'p-1001', 'Color', 'Black, Brown, Red'),
(3, 'p-1001', 'Water Resistant', 'Yes'),
(4, 'p-1001', 'Material', 'Artificial Leather'),
(5, 'p-1002', 'Capacity', '5 Kg'),
(6, 'p-1002', 'Color', 'Black, Brown, Red'),
(7, 'p-1003', 'Water Resistant', 'Yes'),
(8, 'p-1003', 'Material', 'Artificial Leather');

-- --------------------------------------------------------

--
-- Table structure for table `product_cart`
--

CREATE TABLE `product_cart` (
  `id` int(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `size` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_cart`
--

INSERT INTO `product_cart` (`id`, `product_code`, `qty`, `size`, `color`, `email`, `created_at`) VALUES
(5, 'pm4', 1, 'null', 'null', 'rakibulhassan@gmail.com', '2022-06-20 21:13:52'),
(6, 'pm1', 1, 'null', 'null', 'rakibulhassan@gmail.com', '2022-06-20 21:14:00'),
(7, 'p4', 1, 'null', 'null', 'rakibulhassan@gmail.com', '2022-06-20 21:14:13'),
(8, 'pm1', 1, 'null', 'null', 'rakibulhassan@gmail.com', '2022-06-20 21:50:18'),
(9, 'pm1', 1, 'null', 'null', 'sakib@gmail.com', '2022-06-20 21:54:57'),
(40, 'pm1', 1, 'null', 'null', 'rakibulhassan602@gmail.com', '2022-08-11 17:59:49'),
(41, 'pm4', 1, 'null', 'null', 'rakibulhassan602@gmail.com', '2022-08-11 18:12:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `id` int(11) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `warranty` varchar(500) DEFAULT NULL,
  `returns` varchar(500) DEFAULT NULL,
  `cash_on_delivery` varchar(500) DEFAULT NULL,
  `product_size` varchar(255) DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `img_1` varchar(1000) DEFAULT NULL,
  `img_2` varchar(1000) DEFAULT NULL,
  `img_3` varchar(1000) DEFAULT NULL,
  `img_4` varchar(1000) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_date` timestamp NULL DEFAULT current_timestamp(),
  `long_desc` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`id`, `product_code`, `warranty`, `returns`, `cash_on_delivery`, `product_size`, `tags`, `img_1`, `img_2`, `img_3`, `img_4`, `created_date`, `update_date`, `long_desc`) VALUES
(1, 'p-1001', '1 Year AL Jazeera Brand Warranty', '30 Day Return Policy', 'Cash on Delivery available', 'XS,S,M,L,XL', 'Computer, Laptop', 'http://rakibmia.com/ecomGadge/150x160.jpg', 'http://rakibmia.com/ecomGadge/150x160.jpg', 'http://rakibmia.com/ecomGadge/150x160.jpg', 'http://rakibmia.com/ecomGadge/150x160.jpg', '2022-06-09 15:40:45', '2022-06-09 15:40:45', '\r\n\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Vivamus bibendum magna Lorem ipsum dolor sit amet, consectetur adipiscing elit.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.\r\n<br>\r\nAt vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.\r\n'),
(2, 'p-1002', '1 Year AL Jazeera Brand Warranty', '30 Day Return Policy', 'Cash on Delivery available', 'XS,S,M,L,XL', 'Computer, Laptop', 'http://rakibmia.com/ecomGadge/150x160.jpg', 'http://rakibmia.com/ecomGadge/150x160.jpg', 'http://rakibmia.com/ecomGadge/150x160.jpg', 'http://rakibmia.com/ecomGadge/150x160.jpg', '2022-06-09 15:40:45', '2022-06-09 15:40:45', '\r\n\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Vivamus bibendum magna Lorem ipsum dolor sit amet, consectetur adipiscing elit.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.\r\n<br>\r\nAt vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.\r\n'),
(3, 'p-1003', '1 Year AL Jazeera Brand Warranty', '30 Day Return Policy', 'Cash on Delivery available', 'XS,S,M,L,XL', 'Computer, Laptop', 'http://rakibmia.com/ecomGadge/150x160.jpg', 'http://rakibmia.com/ecomGadge/150x160.jpg', 'http://rakibmia.com/ecomGadge/150x160.jpg', 'http://rakibmia.com/ecomGadge/150x160.jpg', '2022-06-09 15:40:45', '2022-06-09 15:40:45', '\r\n\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Vivamus bibendum magna Lorem ipsum dolor sit amet, consectetur adipiscing elit.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.\r\n<br>\r\nAt vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.\r\n'),
(4, 'p-1004', '1 Year AL Jazeera Brand Warranty', '30 Day Return Policy', 'Cash on Delivery available', 'XS,S,M,L,XL', 'Computer, Laptop', 'http://rakibmia.com/ecomGadge/150x160.jpg', 'http://rakibmia.com/ecomGadge/150x160.jpg', 'http://rakibmia.com/ecomGadge/150x160.jpg', 'http://rakibmia.com/ecomGadge/150x160.jpg', '2022-06-09 15:40:45', '2022-06-09 15:40:45', '\r\n\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Vivamus bibendum magna Lorem ipsum dolor sit amet, consectetur adipiscing elit.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.\r\n<br>\r\nAt vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.\r\n'),
(5, 'pm1', '1 Year AL Jazeera Brand Warranty', '30 Day Return Policy', 'Cash on Delivery available', 'XS,S,M,L,XL', 'Computer, Laptop', 'http://rakibmia.com/ecomGadge/150x160.jpg', 'http://rakibmia.com/ecomGadge/150x160.jpg', 'http://rakibmia.com/ecomGadge/150x160.jpg', 'http://rakibmia.com/ecomGadge/150x160.jpg', '2022-06-09 15:40:45', '2022-06-09 15:40:45', '\r\n\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Vivamus bibendum magna Lorem ipsum dolor sit amet, consectetur adipiscing elit.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.\r\n<br>\r\nAt vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.\r\n'),
(6, 'pm2', '1 Year AL Jazeera Brand Warranty', '30 Day Return Policy', 'Cash on Delivery available', 'XS,S,M,L,XL', 'Computer, Laptop', 'http://rakibmia.com/ecomGadge/150x160.jpg', 'http://rakibmia.com/ecomGadge/150x160.jpg', 'http://rakibmia.com/ecomGadge/150x160.jpg', 'http://rakibmia.com/ecomGadge/150x160.jpg', '2022-06-09 15:40:45', '2022-06-09 15:40:45', '\r\n\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Vivamus bibendum magna Lorem ipsum dolor sit amet, consectetur adipiscing elit.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.\r\n<br>\r\nAt vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.\r\n'),
(7, 'pm3', '1 Year AL Jazeera Brand Warranty', '30 Day Return Policy', 'Cash on Delivery available', 'XS,S,M,L,XL', 'Computer, Laptop', 'http://rakibmia.com/ecomGadge/150x160.jpg', 'http://rakibmia.com/ecomGadge/150x160.jpg', 'http://rakibmia.com/ecomGadge/150x160.jpg', 'http://rakibmia.com/ecomGadge/150x160.jpg', '2022-06-09 15:40:45', '2022-06-09 15:40:45', '\r\n\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Vivamus bibendum magna Lorem ipsum dolor sit amet, consectetur adipiscing elit.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.\r\n<br>\r\nAt vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.\r\n'),
(8, 'pm4', '1 Year AL Jazeera Brand Warranty', '30 Day Return Policy', 'Cash on Delivery available', 'XS,S,M,L,XL', 'Computer, Laptop', 'http://rakibmia.com/ecomGadge/150x160.jpg', 'http://rakibmia.com/ecomGadge/150x160.jpg', 'http://rakibmia.com/ecomGadge/150x160.jpg', 'http://rakibmia.com/ecomGadge/150x160.jpg', '2022-06-09 15:40:45', '2022-06-09 15:40:45', '\r\n\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Vivamus bibendum magna Lorem ipsum dolor sit amet, consectetur adipiscing elit.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.\r\n<br>\r\nAt vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `product_list`
--

CREATE TABLE `product_list` (
  `id` int(255) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `discount_price` decimal(10,2) NOT NULL,
  `discount_percent` double NOT NULL,
  `product_image` varchar(1000) NOT NULL,
  `product_hover_image` varchar(1000) DEFAULT NULL,
  `category` varchar(100) NOT NULL,
  `sub_category` varchar(500) NOT NULL,
  `remark` varchar(50) NOT NULL,
  `ratting` varchar(50) NOT NULL,
  `ratting_no` float NOT NULL,
  `brand` varchar(100) NOT NULL,
  `product_code` varchar(500) NOT NULL,
  `stock` varchar(500) NOT NULL,
  `home_order` int(11) NOT NULL DEFAULT 0,
  `sale_type` varchar(10) DEFAULT NULL,
  `flash_sale_image` varchar(10000) DEFAULT NULL,
  `default_size` varchar(255) DEFAULT NULL,
  `default_color` varchar(255) DEFAULT NULL,
  `short_desc` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_list`
--

INSERT INTO `product_list` (`id`, `title`, `price`, `discount_price`, `discount_percent`, `product_image`, `product_hover_image`, `category`, `sub_category`, `remark`, `ratting`, `ratting_no`, `brand`, `product_code`, `stock`, `home_order`, `sale_type`, `flash_sale_image`, `default_size`, `default_color`, `short_desc`) VALUES
(1, 'oppo Reno3 pro', '16.00', '14.00', 15, 'http://rakibmia.com/540x600.png', 'http://rakibmia.com/540x600.png', 'Music', 'Oppo', 'New Arrival', '50', 50, 'Oppo', 'pm1', 'yes', 0, NULL, NULL, NULL, NULL, NULL),
(2, 'Vivo Y12s ', '12.00', '11.00', 0, 'http://rakibmia.com/540x600.png', NULL, 'Music', 'Vivo', 'New Arrival', '5', 70, 'Vivo', 'pm2', 'yes', 0, NULL, NULL, NULL, NULL, NULL),
(3, 'oppo Reno2 pro', '42.00', '40.00', 100, 'http://rakibmia.com/540x600.png', NULL, 'Music', 'Oppo', 'New Arrival', '5', 0, 'Oppo', 'pm3', 'yes', 0, NULL, NULL, NULL, NULL, NULL),
(4, 'Vivo Y12a ', '13.00', '12.00', 40, 'http://rakibmia.com/540x600.png', NULL, 'Music', 'Vivo', 'New Arrival', '45', 100, 'Vivo', 'pm4', 'yes', 4, 'HOT', NULL, NULL, NULL, NULL),
(5, 'Vivo Y12s ', '12.00', '11.00', 0, 'http://rakibmia.com/540x600.png', NULL, 'Camera', 'Vivo', 'New Arrival', '5', 0, 'Vivo', 'pm1', 'yes', 5, NULL, NULL, NULL, NULL, NULL),
(6, 'oppo Reno2 pro', '42.00', '40.00', 0, 'http://rakibmia.com/540x600.png', NULL, 'Camera', 'Oppo', 'New Arrival', '5', 0, 'Oppo', 'pm2', 'yes', 6, 'SALE', NULL, NULL, NULL, NULL),
(7, 'oppo Reno2 pro', '42.00', '40.00', 0, 'http://rakibmia.com/540x600.png', NULL, 'Camera', 'Oppo', 'New Arrival', '5', 0, 'Oppo', 'pm3', 'yes', 7, NULL, NULL, NULL, NULL, NULL),
(8, 'Vivo Y12a ', '13.00', '12.00', 0, 'http://rakibmia.com/540x600.png', NULL, 'Camera', 'Vivo', 'New Arrival', '5', 0, 'Vivo', 'pm4', 'yes', 8, NULL, NULL, NULL, NULL, NULL),
(9, 'Vivo Y12s ', '12.00', '11.00', 0, 'http://rakibmia.com/540x600.png', NULL, 'Watch', 'Vivo', 'New Arrival', '5', 0, 'Vivo', 'pm4', 'yes', 0, NULL, NULL, NULL, NULL, NULL),
(10, 'Vivo Y12s ', '12.00', '11.00', 0, 'http://rakibmia.com/540x600.png', NULL, 'Watch', 'Vivo', 'New Arrival', '5', 0, 'Vivo', 'pm4', 'yes', 0, NULL, NULL, NULL, NULL, NULL),
(11, 'Realme 12 Pro', '16.00', '14.00', 15, 'http://rakibmia.com/540x600.png', 'http://rakibmia.com/540x600.png', 'Watch', 'Realme', 'Best Seller', '50', 50, 'Oppo', 'pm4', 'yes', 0, NULL, NULL, NULL, NULL, NULL),
(12, 'Vivo Y12s ', '12.00', '11.00', 0, 'http://rakibmia.com/540x600.png', NULL, 'Watch', 'Vivo', 'Best Seller', '5', 70, 'Vivo', 'pm4', 'yes', 0, NULL, NULL, NULL, NULL, NULL),
(13, 'oppo Reno2 pro', '42.00', '40.00', 100, 'http://rakibmia.com/540x600.png', NULL, 'Mobile', 'Oppo', 'Best Seller', '5', 0, 'Oppo', 'p3', 'yes', 0, NULL, NULL, NULL, NULL, NULL),
(14, 'Vivo Y12a ', '13.00', '12.00', 40, 'http://rakibmia.com/540x600.png', NULL, 'Mobile', 'Vivo', 'Best Seller', '5', 0, 'Vivo', 'p4', 'yes', 4, NULL, NULL, NULL, NULL, NULL),
(15, 'Vivo Y12s ', '12.00', '11.00', 0, 'http://rakibmia.com/540x600.png', NULL, 'Mobile', 'Vivo', 'Best Seller', '5', 0, 'Vivo', 'p2', 'yes', 5, NULL, NULL, NULL, NULL, NULL),
(16, 'oppo Reno2 pro', '42.00', '40.00', 0, 'http://rakibmia.com/540x600.png', NULL, 'Mobile', 'Oppo', 'Best Seller', '5', 0, 'Oppo', 'p3', 'yes', 6, NULL, NULL, NULL, NULL, NULL),
(17, 'oppo Reno2 pro', '42.00', '40.00', 0, 'http://rakibmia.com/540x600.png', NULL, 'Mobile', 'Oppo', 'Best Seller', '5', 0, 'Oppo', 'p3', 'yes', 7, NULL, NULL, NULL, NULL, NULL),
(18, 'Vivo Y12a ', '13.00', '12.00', 0, 'http://rakibmia.com/540x600.png', NULL, 'Mobile', 'Vivo', 'Best Seller', '5', 0, 'Vivo', 'p4', 'yes', 8, NULL, NULL, NULL, NULL, NULL),
(19, 'Vivo Y12s ', '12.00', '11.00', 0, 'http://rakibmia.com/540x600.png', NULL, 'Mobile', 'Vivo', 'Best Seller', '5', 0, 'Vivo', 'p2', 'yes', 0, NULL, NULL, NULL, NULL, NULL),
(20, 'Vivo Y12s ', '12.00', '11.00', 0, 'http://rakibmia.com/540x600.png', NULL, 'Mobile', 'Vivo', 'Best Seller', '5', 0, 'Vivo', 'p2', 'yes', 0, NULL, NULL, NULL, NULL, NULL),
(21, 'Vivo Y12a ', '13.00', '12.00', 40, 'http://rakibmia.com/540x600.png', NULL, 'Mobile', 'Vivo', 'Feature', '5', 0, 'Vivo', 'p4', 'yes', 1, NULL, NULL, NULL, NULL, NULL),
(22, 'Vivo Y12s ', '12.00', '11.00', 0, 'http://rakibmia.com/540x600.png', NULL, 'Mobile', 'Vivo', 'Feature', '5', 0, 'Vivo', 'p2', 'yes', 5, 'SALE', NULL, NULL, NULL, NULL),
(23, 'oppo Reno2 pro', '42.00', '40.00', 0, 'http://rakibmia.com/540x600.png', NULL, 'Mobile', 'Oppo', 'Feature', '5', 0, 'Oppo', 'p3', 'yes', 6, 'HOT', NULL, NULL, NULL, NULL),
(24, 'oppo Reno2 pro', '42.00', '40.00', 0, 'http://rakibmia.com/540x600.png', NULL, 'Mobile', 'Oppo', 'Feature', '5', 0, 'Oppo', 'p3', 'yes', 7, 'HOT', NULL, NULL, NULL, NULL),
(25, 'Vivo Y12a ', '13.00', '12.00', 0, 'http://rakibmia.com/540x600.png', NULL, 'Mobile', 'Vivo', 'Feature', '5', 0, 'Vivo', 'p4', 'yes', 8, NULL, NULL, NULL, NULL, NULL),
(26, 'Vivo Y12s ', '12.00', '11.00', 0, 'http://rakibmia.com/540x600.png', NULL, 'Mobile', 'Vivo', 'Feature', '5', 0, 'Vivo', 'p2', 'yes', 0, NULL, NULL, NULL, NULL, NULL),
(27, 'Vivo Y12s ', '12.00', '11.00', 0, 'http://rakibmia.com/540x600.png', NULL, 'Mobile', 'Vivo', 'Feature', '5', 0, 'Vivo', 'p2', 'yes', 0, NULL, NULL, NULL, NULL, NULL),
(28, 'Vivo Y12a ', '13.00', '12.00', 40, 'http://rakibmia.com/540x600.png', NULL, 'Mobile', 'Vivo', 'Special Offer', '5', 0, 'Vivo', 'p4', 'yes', 1, NULL, NULL, NULL, NULL, NULL),
(29, 'Vivo Y12s ', '12.00', '11.00', 0, 'http://rakibmia.com/540x600.png', NULL, 'Mobile', 'Vivo', 'Special Offer', '5', 0, 'Vivo', 'p2', 'yes', 5, 'SALE', NULL, NULL, NULL, NULL),
(30, 'oppo Reno2 pro', '42.00', '40.00', 0, 'http://rakibmia.com/540x600.png', NULL, 'Mobile', 'Oppo', 'Special Offer', '5', 0, 'Oppo', 'p3', 'yes', 6, 'HOT', NULL, NULL, NULL, NULL),
(31, 'oppo Reno2 pro', '42.00', '40.00', 0, 'http://rakibmia.com/540x600.png', NULL, 'Mobile', 'Oppo', 'Special Offer', '5', 0, 'Oppo', 'p3', 'yes', 7, 'HOT', NULL, NULL, NULL, NULL),
(32, 'Vivo Y12a ', '13.00', '12.00', 0, 'http://rakibmia.com/540x600.png', NULL, 'Mobile', 'Vivo', 'Special Offer', '5', 0, 'Vivo', 'p4', 'yes', 8, NULL, NULL, NULL, NULL, NULL),
(33, 'Vivo Y12a ', '13.00', '12.00', 40, 'http://rakibmia.com/540x600.png', NULL, 'Mobile', 'Vivo', 'Trending', '5', 0, 'Vivo', 'p4', 'yes', 1, NULL, NULL, NULL, NULL, NULL),
(34, 'Vivo Y12s ', '12.00', '11.00', 0, 'http://rakibmia.com/540x600.png', NULL, 'Mobile', 'Vivo', 'Trending', '5', 0, 'Vivo', 'p2', 'yes', 5, 'SALE', NULL, NULL, NULL, NULL),
(35, 'oppo Reno2 pro', '42.00', '40.00', 0, 'http://rakibmia.com/540x600.png', NULL, 'Mobile', 'Oppo', 'Trending', '5', 0, 'Oppo', 'p3', 'yes', 6, 'HOT', NULL, NULL, NULL, NULL),
(36, 'oppo Reno2 pro', '42.00', '40.00', 0, 'http://rakibmia.com/540x600.png', NULL, 'Mobile', 'Oppo', 'Trending', '5', 0, 'Oppo', 'p3', 'yes', 7, 'HOT', NULL, NULL, NULL, NULL),
(37, 'Vivo Y12a ', '13.00', '12.00', 0, 'http://rakibmia.com/540x600.png', NULL, 'Mobile', 'Vivo', 'Trending', '5', 0, 'Vivo', 'p4', 'yes', 8, NULL, NULL, NULL, NULL, NULL),
(38, 'Vivo Y12a ', '13.00', '12.00', 0, 'http://rakibmia.com/540x600.png', NULL, 'Mobile', 'Vivo', 'Flash Sale', '5', 0, 'Vivo', 'p4', 'yes', 1, NULL, 'http://rakibmia.com/ecomGadge/flash_sale.png', NULL, NULL, NULL),
(39, 'Dell Latitude E6410', '13500.00', '12990.00', 0, 'http://rakibmia.com/540x600.png', NULL, 'Computer', 'Laptop', 'New Arrival', '50', 15, 'Dell', 'p-1001', 'yes', 0, 'New', NULL, NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.'),
(40, 'HP Evolation', '13500.00', '12990.00', 0, 'http://rakibmia.com/540x600.png', NULL, 'Computer', 'Laptop', 'New Arrival', '50', 15, 'Dell', 'p-1002', 'yes', 0, 'New', NULL, NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.'),
(41, 'Lanevo Next Gen', '13.00', '12.00', 0, 'http://rakibmia.com/540x600.png', NULL, 'Computer', 'Laptop', 'New Arrival', '50', 15, 'Dell', 'p-1003', 'yes', 0, 'New', NULL, NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.'),
(42, 'Asus Going Forward', '13.00', '12.00', 0, 'http://rakibmia.com/540x600.png', NULL, 'Computer', 'Laptop', 'New Arrival', '50', 15, 'Dell', 'p-1004', 'yes', 0, 'New', NULL, NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.');

-- --------------------------------------------------------

--
-- Table structure for table `product_review`
--

CREATE TABLE `product_review` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `rating` varchar(50) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_review`
--

INSERT INTO `product_review` (`id`, `name`, `image`, `description`, `rating`, `product_code`, `created_at`, `updated_at`) VALUES
(1, 'MD Rakib Mia', 'http://rakibmia.com/ecomGadge/100x100.jpg', 'Lorem Ipsumin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate', '50', 'p-1001', '2022-06-09 19:06:42', '2022-06-09 19:06:42'),
(2, 'Rabbil Hasan Rupam', 'http://rakibmia.com/ecomGadge/100x100.jpg', 'Lorem Ipsumin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate', '50', 'p-1001', '2022-06-09 19:06:42', '2022-06-09 19:06:42');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(255) NOT NULL,
  `title` varchar(2000) NOT NULL,
  `sub_title` varchar(2000) NOT NULL,
  `image` varchar(2000) NOT NULL,
  `product_code` varchar(500) NOT NULL,
  `text_color` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `title`, `sub_title`, `image`, `product_code`, `text_color`) VALUES
(1, 'Beautiful Smart Phones', '50% off in all products', 'http://127.0.0.1:8000/assets/images/banner17.jpg', 'p1', '#000000');

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` int(255) NOT NULL,
  `app_link` varchar(1000) NOT NULL,
  `ios_link` varchar(1000) NOT NULL,
  `facebook_link` varchar(1000) NOT NULL,
  `instagram_link` varchar(1000) NOT NULL,
  `twitter_link` varchar(1000) NOT NULL,
  `youtube_link` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `app_link`, `ios_link`, `facebook_link`, `instagram_link`, `twitter_link`, `youtube_link`) VALUES
(1, 'www.app.com', 'www.ios.com', 'www.facebook.com', 'www.instagram.com', 'www.twitter.com', 'www.youtube.com');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_image` varchar(1000) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `cat_group` varchar(255) DEFAULT NULL,
  `cat_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `cat_id`, `cat_name`, `cat_image`, `icon`, `cat_group`, `cat_type`) VALUES
(21, 1, 'Music', 'http://rakibmia.com/ecomGadge/category_music.jpg', 'flaticon-music-system', '', 'Trending Category'),
(22, 1, 'Camera', 'http://rakibmia.com/ecomGadge/category_camera.jpg', 'flaticon-camera', '', 'Trending Category'),
(23, 1, 'Watch', 'http://rakibmia.com/ecomGadge/category_watch.jpg', 'flaticon-watch', '', 'Trending Category'),
(24, 1, 'Audio', 'http://rakibmia.com/ecomGadge/audio.png', 'flaticon-headphones', '', 'Top Category'),
(25, 1, 'Camera', 'http://rakibmia.com/ecomGadge/camara.png', 'flaticon-camera', '', 'Top Category'),
(26, 1, 'Game', 'http://rakibmia.com/ecomGadge/game.png', 'flaticon-ball', '', 'Top Category'),
(27, 1, 'Watch', 'http://rakibmia.com/ecomGadge/watch.png', 'flaticon-watch', '', 'Top Category'),
(28, 1, 'Mobile', 'http://rakibmia.com/ecomGadge/mobile.png', 'flaticon-responsive', '', 'Top Category'),
(29, 1, 'Television', 'http://rakibmia.com/ecomGadge/tv.png', 'flaticon-tv', '', 'Top Category'),
(30, 1, 'Headphone', 'http://rakibmia.com/ecomGadge/headphone.png', 'flaticon-headphones', '', 'Top Category'),
(31, 1, 'Computer', 'http://rakibmia.com/ecomGadge/headphone.png', 'flaticon-monitor', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category_label2`
--

CREATE TABLE `sub_category_label2` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sub_cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) DEFAULT NULL,
  `cat_image` varchar(1000) DEFAULT NULL,
  `cat_group` varchar(255) DEFAULT NULL,
  `cat_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_category_label2`
--

INSERT INTO `sub_category_label2` (`id`, `cat_id`, `sub_cat_id`, `cat_name`, `cat_image`, `cat_group`, `cat_type`) VALUES
(1, 1, 31, 'Vestibulumn Sed', NULL, 'Featured Item', NULL),
(2, 1, 31, 'Donec Porttitor', NULL, 'Featured Item', NULL),
(3, 1, 31, 'Donec Vitae Facilisis', NULL, 'Featured Item', NULL),
(4, 1, 31, 'Curabitur Tempus', NULL, 'Featured Item', NULL),
(5, 1, 31, 'Vivamas in tor tor', NULL, 'Featured Item', NULL),
(6, 1, 31, 'Donec Vitae Ante Ante', NULL, 'Featured Item', NULL),
(7, 1, 31, 'Etiam Ac Return ', NULL, 'Featured Item', NULL),
(8, 1, 31, 'Quisque Condementum', NULL, 'Featured Item', NULL),
(9, 1, 31, 'Vestibulumn Sed', NULL, 'Popular Item', NULL),
(10, 1, 31, 'Donec Porttitor', NULL, 'Popular Item', NULL),
(11, 1, 31, 'Donec Vitae Facilisis', NULL, 'Popular Item', NULL),
(12, 1, 31, 'Curabitur Tempus', NULL, 'Popular Item', NULL),
(13, 1, 31, 'Vivamas in tor tor', NULL, 'Popular Item', NULL),
(14, 1, 31, 'Donec Vitae Ante Ante', NULL, 'Popular Item', NULL),
(15, 1, 31, 'Etiam Ac Return ', NULL, 'Popular Item', NULL),
(16, 1, 31, 'Quisque Condementum', NULL, 'Popular Item', NULL),
(18, 1, 31, 'Laptop', 'http://rakibmia.com/ecomGadge/laptop.jpg', '', 'Trending'),
(20, 1, 31, 'Desktop', 'http://rakibmia.com/ecomGadge/desktop.jpg', '', 'Trending'),
(21, 1, 22, 'Vestibulumn Sed', NULL, 'Featured Item', NULL),
(22, 1, 22, 'Donec Porttitor', NULL, 'Featured Item', NULL),
(23, 1, 22, 'Donec Vitae Facilisis', NULL, 'Featured Item', NULL),
(24, 1, 22, 'Curabitur Tempus', NULL, 'Featured Item', NULL),
(25, 1, 22, 'Vivamas in tor tor', NULL, 'Featured Item', NULL),
(26, 1, 22, 'Donec Vitae Ante Ante', NULL, 'Featured Item', NULL),
(27, 1, 22, 'Etiam Ac Return ', NULL, 'Featured Item', NULL),
(28, 1, 22, 'Quisque Condementum', NULL, 'Featured Item', NULL),
(29, 1, 22, 'Vestibulumn Sed', NULL, 'Popular Item', NULL),
(30, 1, 22, 'Donec Porttitor', NULL, 'Popular Item', NULL),
(31, 1, 22, 'Donec Vitae Facilisis', NULL, 'Popular Item', NULL),
(32, 1, 22, 'Curabitur Tempus', NULL, 'Popular Item', NULL),
(33, 1, 22, 'Vivamas in tor tor', NULL, 'Popular Item', NULL),
(34, 1, 22, 'Donec Vitae Ante Ante', NULL, 'Popular Item', NULL),
(35, 1, 22, 'Etiam Ac Return ', NULL, 'Popular Item', NULL),
(36, 1, 22, 'Quisque Condementum', NULL, 'Popular Item', NULL),
(37, 1, 22, 'CC Camara', 'http://rakibmia.com/ecomGadge/sub_cat_trend_single.jpg', '', 'Trending');

-- --------------------------------------------------------

--
-- Table structure for table `userwise_coupon_discount`
--

CREATE TABLE `userwise_coupon_discount` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `discount_amount` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `wist_list`
--

CREATE TABLE `wist_list` (
  `id` int(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wist_list`
--

INSERT INTO `wist_list` (`id`, `product_code`, `email`, `created_at`) VALUES
(15, 'pm4', 'sakib@gmail.com', '2022-06-20 21:54:51'),
(16, 'pm1', 'sakib@gmail.com', '2022-06-20 21:54:56'),
(23, 'pm1', 'rakibulhassan602@gmail.com', '2022-08-11 18:10:30'),
(24, 'pm4', 'rakibulhassan602@gmail.com', '2022-08-11 18:10:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_says`
--
ALTER TABLE `client_says`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupon_code` (`coupon_code`);

--
-- Indexes for table `flaticons`
--
ALTER TABLE `flaticons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_product`
--
ALTER TABLE `invoice_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_letter`
--
ALTER TABLE `news_letter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_seo`
--
ALTER TABLE `page_seo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_additonal_info`
--
ALTER TABLE `product_additonal_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_cart`
--
ALTER TABLE `product_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_list`
--
ALTER TABLE `product_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_review`
--
ALTER TABLE `product_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category_label2`
--
ALTER TABLE `sub_category_label2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userwise_coupon_discount`
--
ALTER TABLE `userwise_coupon_discount`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `wist_list`
--
ALTER TABLE `wist_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `client_says`
--
ALTER TABLE `client_says`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `flaticons`
--
ALTER TABLE `flaticons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `invoice_product`
--
ALTER TABLE `invoice_product`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `news_letter`
--
ALTER TABLE `news_letter`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_seo`
--
ALTER TABLE `page_seo`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product_additonal_info`
--
ALTER TABLE `product_additonal_info`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_cart`
--
ALTER TABLE `product_cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_list`
--
ALTER TABLE `product_list`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `product_review`
--
ALTER TABLE `product_review`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `sub_category_label2`
--
ALTER TABLE `sub_category_label2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `userwise_coupon_discount`
--
ALTER TABLE `userwise_coupon_discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `wist_list`
--
ALTER TABLE `wist_list`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
