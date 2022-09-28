-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 17, 2019 at 03:30 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `caqualityprintin_live_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `sb_addons`
--

CREATE TABLE `sb_addons` (
  `addons_id` int(11) NOT NULL,
  `addons_name` varchar(255) NOT NULL,
  `addons_status` tinyint(4) NOT NULL DEFAULT '1',
  `addons_createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `addons_order` int(10) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sb_addons`
--

INSERT INTO `sb_addons` (`addons_id`, `addons_name`, `addons_status`, `addons_createdate`, `addons_order`) VALUES
(1, '6 - QuitTech Cessation AudioBooks', 1, '2018-03-25 21:00:44', 0),
(2, '4 - QuitTech Expert Coaching Videos', 1, '2018-03-25 21:00:54', 0),
(3, '1 - QuitTech \'Quitting Mindset\' E-Book', 1, '2018-03-25 21:01:03', 0),
(4, '4- Private Coaching Skype Sessions with QuitTech Certified Tobacco Treatment Specialist', 1, '2018-03-25 21:01:55', 0),
(5, '4- Private Hypnosis Skype Sessions with QuitTech Board Certified Hypnotherapist', 1, '2018-03-25 21:05:46', 0),
(6, '5- Private Hypnosis Skype Sessions with QuitTech Board Certified Hypnotherapist', 1, '2018-03-25 21:06:03', 0),
(7, '5- Private Coaching Skype Sessions with QuitTech Certified Tobacco Treatment Specialist', 1, '2018-03-25 21:06:10', 0),
(8, '1- Smoking Evaluation Session', 1, '2018-04-10 05:37:30', 0),
(9, '1 - QuitTech Coaching Session', 1, '2018-03-25 21:06:29', 0),
(10, '1 - Free E-Book', 1, '2018-03-25 21:06:33', 0),
(11, '1 - Hypnosis Evaluation', 1, '2018-03-25 21:06:37', 0),
(12, '1 - Custom Suggestion Hypnosis Session', 1, '2018-03-25 21:06:41', 0),
(13, '6 - QuitTech, Smoking Cessation Hypnosis AudioBooks', 1, '2018-03-25 21:09:00', 0),
(14, '4 - QuitTech Method Expert Coaching Videos', 1, '2018-03-25 21:09:04', 0),
(15, '1 - Quitting Mindset E-Book', 1, '2018-03-25 21:09:09', 0),
(16, '6 - Private One-on-One Skype Sessions with a QuitTech Master Certified Tobacco Treatment Specialist', 1, '2018-03-25 21:09:14', 0),
(17, '6 Private One-on-One Skype Sessions with a QuitTech, Board Certified Hypnotherapist', 1, '2018-03-25 21:09:40', 0),
(18, '4 - QuitTech Method Expert Coaching Videos1 - Quitting Mindset E-Book', 1, '2018-03-25 21:09:56', 0),
(19, '6 - Private One-on-One Skype Sessions with a QuitTech, Board Certified Hypnotherapist', 1, '2018-03-25 21:10:07', 0),
(20, '4 - QuitTech Method Expert Coaching Videos1 - Smoking Evaluation', 1, '2018-03-25 21:10:27', 0),
(21, '1 - Evaluation', 1, '2018-03-25 21:10:39', 0),
(22, '1- Private One-on-One Skype Hypnosis Session with Board Certified Hypnotherapist', 1, '2018-03-25 21:10:47', 0),
(23, '1 - Master Certified Tobacco Treatment Session', 1, '2018-04-10 05:34:54', 0),
(24, '5 - Private Hypnosis Sessions', 1, '2018-04-10 05:42:27', 0),
(25, '1 Custom Suggestion Ebook', 1, '2018-04-10 05:43:19', 0),
(26, '6 Smoking Cessation Audiobooks', 1, '2018-04-10 05:45:51', 0),
(27, '24/7 Access to Text, Call, and Skype Support', 1, '2018-04-10 05:47:02', 0),
(28, '1 - Private Coaching Session', 1, '2018-04-17 08:52:11', 0),
(29, '6 - Smoking Session Audio Books', 1, '2018-04-17 08:56:19', 0),
(30, '5 - Private Coaching Sessions', 1, '2018-04-17 08:58:28', 0),
(31, '1 - Free Smoking Evaluation', 1, '2018-04-17 09:04:37', 0),
(32, '1 - Free Audio Book', 1, '2018-04-17 09:05:33', 0),
(33, '1 - Private Hypnosis Session', 1, '2018-04-17 09:07:42', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sb_banner`
--

CREATE TABLE `sb_banner` (
  `banner_id` int(11) NOT NULL,
  `banner_title` varchar(255) NOT NULL,
  `banner_detail` text,
  `banner_title2` varchar(255) DEFAULT NULL,
  `banner_image` varchar(255) NOT NULL,
  `banner_image2` varchar(255) NOT NULL,
  `banner_image_path` tinytext NOT NULL,
  `banner_status` int(1) NOT NULL,
  `banner_createdon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sb_banner`
--

INSERT INTO `sb_banner` (`banner_id`, `banner_title`, `banner_detail`, `banner_title2`, `banner_image`, `banner_image2`, `banner_image_path`, `banner_status`, `banner_createdon`) VALUES
(1, 'We bring design together with technology', NULL, 'QUALITY PRINTING SERVICE', 'img6153780160649.png', 'img12153778689026.jpg', 'assets/uploads/banner/', 1, '2018-09-07 10:51:12'),
(2, 'We bring design together with technology', NULL, 'QUALITY PRINTING SERVICE', 'img1153778771336.png', 'bg-img153629949836.jpg', 'assets/uploads/banner/', 1, '2018-09-07 10:51:38'),
(3, 'We bring design together with technology', NULL, 'QUALITY PRINTING SERVICE', 'img1153778772025.png', 'bg-img153629951121.jpg', 'assets/uploads/banner/', 1, '2018-09-07 10:51:51'),
(4, 'We bring design together with technology', NULL, 'QUALITY PRINTING SERVICE', 'img10153778650147.png', '', 'assets/uploads/banner/', 1, '2018-09-24 15:55:01');

-- --------------------------------------------------------

--
-- Table structure for table `sb_brochure`
--

CREATE TABLE `sb_brochure` (
  `brochure_id` int(10) UNSIGNED NOT NULL,
  `brochure_category_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `brochure_name` varchar(255) DEFAULT NULL,
  `brochure_slug` varchar(255) DEFAULT NULL,
  `brochure_price` float UNSIGNED DEFAULT '0',
  `brochure_discount` float UNSIGNED DEFAULT '0',
  `brochure_sku` varchar(255) DEFAULT '0',
  `brochure_detail` text,
  `brochure_type` varchar(255) DEFAULT NULL,
  `brochure_short_desc` text,
  `brochure_long_desc` text,
  `brochure_additional_info` text,
  `brochure_image` varchar(150) DEFAULT NULL,
  `brochure_cover_image` varchar(150) DEFAULT NULL,
  `brochure_image_path` varchar(150) DEFAULT NULL,
  `brochure_qty` int(10) UNSIGNED DEFAULT '0',
  `brochure_status` tinyint(1) DEFAULT '1',
  `brochure_issale` tinyint(1) DEFAULT '1',
  `brochure_createdon` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sb_brochure`
--

INSERT INTO `sb_brochure` (`brochure_id`, `brochure_category_id`, `brochure_name`, `brochure_slug`, `brochure_price`, `brochure_discount`, `brochure_sku`, `brochure_detail`, `brochure_type`, `brochure_short_desc`, `brochure_long_desc`, `brochure_additional_info`, `brochure_image`, `brochure_cover_image`, `brochure_image_path`, `brochure_qty`, `brochure_status`, `brochure_issale`, `brochure_createdon`) VALUES
(10, 1, 'brochure name', 'brochure-name', 25, 0, '2123465', NULL, NULL, NULL, NULL, NULL, 'img6153630294767.png', NULL, 'assets/uploads/brochure/', 0, 1, 1, '2018-09-06 12:49:07'),
(11, 1, 'brochure name 2', 'brochure-name-2', 25, 0, '3579641', NULL, NULL, NULL, NULL, NULL, 'img8153630297416.png', NULL, 'assets/uploads/brochure/', 0, 1, 1, '2018-09-06 12:49:34'),
(12, 1, 'brochure name 3', 'brochure-name-3', 25, 0, '365789', NULL, NULL, NULL, NULL, NULL, 'img9153630299679.png', NULL, 'assets/uploads/brochure/', 0, 1, 1, '2018-09-06 12:49:56'),
(13, 1, 'test', 'test', 120, 0, '111', NULL, 'featured', NULL, NULL, NULL, 'images1153716990163.png', NULL, 'assets/uploads/brochure/', 0, 2, 1, '2018-09-16 13:38:21');

-- --------------------------------------------------------

--
-- Table structure for table `sb_category`
--

CREATE TABLE `sb_category` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_parent_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `category_status` tinyint(1) DEFAULT '1',
  `category_name` varchar(100) DEFAULT NULL,
  `category_slug` varchar(100) DEFAULT NULL,
  `category_desc` text,
  `category_image` varchar(60) DEFAULT NULL,
  `category_image_thumb` varchar(60) DEFAULT NULL,
  `category_image_path` varchar(150) DEFAULT NULL,
  `category_is_featured` tinyint(1) DEFAULT '0',
  `category_createdon` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sb_category`
--

INSERT INTO `sb_category` (`category_id`, `category_parent_id`, `category_status`, `category_name`, `category_slug`, `category_desc`, `category_image`, `category_image_thumb`, `category_image_path`, `category_is_featured`, `category_createdon`) VALUES
(1, 0, 1, 'Business Card', 'Business-Card', NULL, NULL, NULL, NULL, 0, '2018-09-06 12:23:28'),
(2, 0, 1, 'Appointment Card', 'Appointment-Card', NULL, NULL, NULL, NULL, 0, '2018-09-06 12:23:55'),
(3, 0, 1, 'Greeting Card', 'Greeting-Card', NULL, NULL, NULL, NULL, 0, '2018-09-06 12:24:03'),
(4, 0, 2, 'Holiday Card', 'Holiday-Card', NULL, NULL, NULL, NULL, 0, '2018-09-06 12:24:15'),
(5, 0, 1, 'Post Card', 'Post-Card', NULL, NULL, NULL, NULL, 0, '2018-09-06 12:24:20'),
(6, 0, 2, 'Post Card + mailing service', 'Post-Card-mailing-service', NULL, NULL, NULL, NULL, 0, '2018-09-06 12:24:25'),
(7, 0, 1, 'Banners', 'Banners', NULL, NULL, NULL, NULL, 0, '2018-09-06 12:24:30'),
(8, 0, 1, 'Booklets', 'Booklets', NULL, NULL, NULL, NULL, 0, '2018-09-06 12:24:34'),
(9, 0, 1, 'Brochures', 'Brochures', NULL, NULL, NULL, NULL, 0, '2018-09-06 12:24:38'),
(10, 0, 2, 'Brochures + mailing service', 'Brochures-mailing-service', NULL, NULL, NULL, NULL, 0, '2018-09-06 12:24:43'),
(11, 0, 1, 'Calendars', 'Calendars', NULL, NULL, NULL, NULL, 0, '2018-09-06 12:24:49'),
(12, 0, 1, 'Magnet signs', 'Magnet-signs', NULL, NULL, NULL, NULL, 0, '2018-09-06 12:24:54'),
(13, 0, 1, 'Envelopes', 'Envelopes', NULL, NULL, NULL, NULL, 0, '2018-09-06 12:25:01'),
(14, 0, 1, 'Flyers', 'Flyers', NULL, NULL, NULL, NULL, 0, '2018-09-06 12:25:05'),
(15, 0, 1, 'Hang Tag', 'Hang-Tag', NULL, NULL, NULL, NULL, 0, '2018-09-06 12:25:09'),
(16, 0, 1, 'Invitation', 'Invitation', NULL, NULL, NULL, NULL, 0, '2018-09-06 12:25:14'),
(17, 0, 1, 'Label', 'Label', NULL, NULL, NULL, NULL, 0, '2018-09-06 12:25:20'),
(18, 0, 1, 'Letterhead', 'Letterhead', NULL, NULL, NULL, NULL, 0, '2018-09-06 12:25:24'),
(19, 0, 1, 'Menus', 'Menus', NULL, NULL, NULL, NULL, 0, '2018-09-06 12:25:28'),
(20, 0, 1, 'Newsletter', 'Newsletter', NULL, NULL, NULL, NULL, 0, '2018-09-06 12:25:32'),
(21, 0, 2, 'Newsletter + mailing service', 'Newsletter-mailing-service', NULL, NULL, NULL, NULL, 0, '2018-09-06 12:25:37'),
(22, 0, 1, 'Note Pad', 'Note-Pad', NULL, NULL, NULL, NULL, 0, '2018-09-06 12:25:42'),
(23, 0, 1, 'NCR Forms', 'NCR-Forms', NULL, NULL, NULL, NULL, 0, '2018-09-06 12:25:47'),
(24, 0, 1, 'Presentation Folders', 'Presentation-Folders', NULL, NULL, NULL, NULL, 0, '2018-09-06 12:25:51'),
(25, 0, 1, 'Poster', 'Poster', NULL, NULL, NULL, NULL, 0, '2018-09-06 12:25:54'),
(26, 0, 2, 'Sticker', 'Sticker', NULL, NULL, NULL, NULL, 0, '2018-09-06 12:25:59'),
(27, 0, 1, 'Yearbooks', 'Yearbooks', NULL, NULL, NULL, NULL, 0, '2018-09-06 12:26:03'),
(28, 0, 2, 'test_cat', 'test_cat', NULL, NULL, NULL, NULL, 0, '2018-09-16 13:04:23'),
(29, 0, 2, 'test category', 'test-category-', NULL, NULL, NULL, NULL, 0, '2018-09-24 06:25:56'),
(30, 0, 2, 'Magnet signs', 'Magnet-signs', NULL, NULL, NULL, NULL, 0, '2018-11-08 18:47:52');

-- --------------------------------------------------------

--
-- Table structure for table `sb_ci_sessions`
--

CREATE TABLE `sb_ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(140) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sb_cms_page`
--

CREATE TABLE `sb_cms_page` (
  `cms_page_id` int(10) UNSIGNED NOT NULL,
  `cms_page_page` varchar(256) NOT NULL DEFAULT '0',
  `cms_page_name` varchar(256) NOT NULL DEFAULT '0',
  `cms_page_title` varchar(256) NOT NULL DEFAULT '0',
  `cms_page_title2` varchar(256) NOT NULL DEFAULT '0',
  `cms_page_content` text CHARACTER SET utf8 NOT NULL,
  `cms_page_other_content` text NOT NULL,
  `cms_page_image` varchar(255) NOT NULL,
  `cms_page_image_path` varchar(255) NOT NULL,
  `cms_page_status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='CMS Elements' ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `sb_cms_page`
--

INSERT INTO `sb_cms_page` (`cms_page_id`, `cms_page_page`, `cms_page_name`, `cms_page_title`, `cms_page_title2`, `cms_page_content`, `cms_page_other_content`, `cms_page_image`, `cms_page_image_path`, `cms_page_status`) VALUES
(1, '0', 'home', 'Welcome to', 'California Quality Printing', '&lt;p&gt;&lt;strong&gt;California Quality Printing&lt;/strong&gt; has established itself as a prime resource in the Bay Area for quality graphic design and printing, in addition to direct mail and variable data printing services.&amp;nbsp; For 32 years we have been committed to helping our clients achieve results through out-of-the-box solutions.&amp;nbsp; While offering our customers the latest in technology, we still believe that nothing replaces a great customer experience.&amp;nbsp; That is why our commitment remains the same--to deliver quality printed products while providing exceptional customer service&lt;/p&gt;', '&lt;p&gt;&lt;a href=&quot;http://localhost/california_printing_dev/#&quot;&gt;QUALITY PRINTING&lt;/a&gt;&lt;a href=&quot;http://localhost/california_printing_dev/#&quot;&gt;TIMELY DELIVERY&lt;/a&gt;&lt;a href=&quot;http://localhost/california_printing_dev/#&quot;&gt;ECO-MINDED&lt;/a&gt;&lt;a href=&quot;http://localhost/california_printing_dev/#&quot;&gt;MONEY BACK GUARANTEED&lt;/a&gt;&lt;/p&gt;', 'img2153630068985.png', 'assets/uploads/cms/', 1),
(2, '0', 'home', '0', '0', '', '', 'img3153630073678.png', 'assets/uploads/cms/', 0),
(3, '0', 'home', ' 1. Select Product', '0', '&lt;p&gt;&amp;nbsp;&amp;nbsp;&lt;/p&gt;\r\n', '', 'img14153630084068.png', 'assets/uploads/cms/', 1),
(4, '0', 'home', '2. UPLOAD YOUR DESIGN', '0', '&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/p&gt;\r\n', '', 'img15153630086321.png', 'assets/uploads/cms/', 1),
(5, '0', 'home', '4. Place Order', '0', '&lt;p&gt;&amp;nbsp;&amp;nbsp;&lt;/p&gt;\r\n', '', 'img16153630088735.png', 'assets/uploads/cms/', 1),
(6, '0', 'home', 'SHOP PRINT COLLECTION', '0', '', '', 'perceart-154871305176.jpg', 'assets/uploads/cms/', 1),
(7, '0', 'about_us', 'Welcome to', 'Who We Are', '&lt;p&gt;Founded in 1986 in Walnut Creek, &lt;big&gt;&lt;strong&gt;&lt;em&gt;California Quality Printing&lt;/em&gt;&lt;/strong&gt;&lt;/big&gt; is a full-service print production facility. Our focus is on quality printed material and customized solutions for our customers. In our nearly three decades of operation, California Quality Printing has grown immensely, integrating four other printing operations in Contra Costa County. Most of our clients are located in the San Francisco Bay Area, but our operation extends to Texas, Florida, and even New York. We offer a wide range of services, including multi- and process-color printing, digital printing, post printing bindery and finishing, direct mail services, variable data printing, and more.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;big&gt;&lt;strong&gt;&lt;em&gt;California Quality Printing&lt;/em&gt;&lt;/strong&gt;&lt;/big&gt; is proud to be a Veteran owned business and a Certified Minority Business Enterprise. We continue to support many community programs in the bay area.&lt;/p&gt;', '', 'img2153630113965.png', 'assets/uploads/cms/', 1),
(8, '0', 'about_us', 'WHAT WE DO', 'WHAT WE DO', '&lt;p&gt;- Offset Printing&lt;/p&gt;\r\n\r\n&lt;p&gt;- Digital Printing&lt;/p&gt;\r\n\r\n&lt;p&gt;- Variable Data Printing&lt;/p&gt;\r\n\r\n&lt;p&gt;- Copying&lt;/p&gt;\r\n\r\n&lt;p&gt;- Mail Lists&lt;/p&gt;\r\n\r\n&lt;p&gt;- All Bindery&lt;/p&gt;\r\n\r\n&lt;p&gt;- Foil Stamping&lt;/p&gt;', '&lt;p&gt;- Foil Embossing&lt;/p&gt;\r\n\r\n&lt;p&gt;- Blind Embossing&lt;/p&gt;\r\n\r\n&lt;p&gt;- Laminating&lt;/p&gt;\r\n\r\n&lt;p&gt;- Die-Cutting&lt;/p&gt;\r\n\r\n&lt;p&gt;- Numbering&lt;/p&gt;\r\n\r\n&lt;p&gt;- Graphic Design&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;', '', '', 1),
(9, '0', 'contact_us', 'CONTACT INFO', '0', '&lt;p&gt;Choose one of the alternative methods of communication. We&amp;rsquo;re available from Monday to Friday, 09:00-5:00 PT to take your call.&lt;/p&gt;', '', '', '', 1),
(10, '0', 'home', '0', '0', '', '', 'img13153780220563.png', 'assets/uploads/cms/', 1),
(11, '0', 'footer', '0', '0', '&lt;p&gt;We appreciate your prompt payment.&amp;nbsp; All invoices are due in &lt;strong&gt;&lt;em&gt;15 days&lt;/em&gt;&lt;/strong&gt; from the invoice date.&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;We accept cash, check, or credit card. Thank you so much for your business!&lt;/p&gt;', '', '', '', 1),
(12, '0', 'footer', 'GET IN TOUCH', '0', '', '', '', '', 1),
(13, '0', 'home', '3. Get a Quote.', '0', '&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/p&gt;\r\n', '', 'keyboard-right-arrow-button154283432449.png', 'assets/uploads/cms/', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sb_config`
--

CREATE TABLE `sb_config` (
  `config_id` int(10) UNSIGNED NOT NULL,
  `config_variable` varchar(100) DEFAULT NULL,
  `config_value` longtext,
  `config_type` enum('admin','system') DEFAULT 'system' COMMENT '1-Admin; 2-System',
  `config_status` int(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sb_config`
--

INSERT INTO `sb_config` (`config_id`, `config_variable`, `config_value`, `config_type`, `config_status`) VALUES
(1, 'facebook', 'https://www.facebook.com/california-printing', 'admin', 1),
(2, 'twitter', 'https://www.twitter.com/california-printing', 'admin', 1),
(3, 'pinterest', 'https://www.pinterest.com/california-printing', 'admin', 1),
(4, 'linkedin', 'https://www.linkedin.com/', 'admin', 1),
(5, 'instagram', 'https://www.instagram.com/california-printing', 'admin', 1),
(6, 'youtube', 'https://www.youtube.com/california-printing', 'admin', 1),
(7, 'email_contact_us', 'johnsu6361@gmail.com\r\n', 'admin', 2),
(8, 'company_phone', '(925) 688-1480', 'admin', 1),
(9, 'map', '', 'admin', 2),
(10, 'paypal_email', 'leonkennedy1990@digitonic.com', 'admin', 1),
(11, 'paypal', 'https://www.sandbox.paypal.com/cgi-bin/webscr', 'admin', 1),
(12, 'company_address_1', '5063 Commercial Circle, Suite D, Concord, CA 94520', 'admin', 1),
(13, 'company_phone_2', '(925) 688-1480', 'admin', 1),
(14, 'email_contact_us', 'calprint@pacbell.net', 'admin', 1),
(15, 'website', 'www.caqualityprinting.com', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sb_country`
--

CREATE TABLE `sb_country` (
  `country` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `id` bigint(20) NOT NULL,
  `sb_countrycode` int(11) NOT NULL DEFAULT '0',
  `sb_faxprice` double NOT NULL DEFAULT '0',
  `sb_country_alias` char(2) CHARACTER SET latin1 DEFAULT NULL,
  `sb_in_countrysearch` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `sb_synonyms` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `country_ar` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `country_cn` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `country_es` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `country_jp` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `country_fr` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `sb_continent` varchar(30) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Country''s Continent name',
  `sb_iso_code` char(2) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Country''s ISO Code',
  `sb_country_name_native_lang` varchar(255) NOT NULL DEFAULT '' COMMENT 'Country name in it''s native language'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `sb_country`
--

INSERT INTO `sb_country` (`country`, `id`, `sb_countrycode`, `sb_faxprice`, `sb_country_alias`, `sb_in_countrysearch`, `sb_synonyms`, `country_ar`, `country_cn`, `country_es`, `country_jp`, `country_fr`, `sb_continent`, `sb_iso_code`, `sb_country_name_native_lang`) VALUES
('Afghanistan', 1, 93, 1, 'af', 0, 'sele', 'Afghanistan', 'Afghanistan', 'Afghanistan', 'Afghanistan', 'Afghanistan', 'Asia', 'AF', ''),
('Albania', 2, 355, 1, 'al', 0, 'Albanian', 'Albania', 'Albania', 'Albania', 'Albania', 'Albania', 'Europe', 'AL', ''),
('Algeria', 3, 213, 1, 'dz', 0, 'Algerian', 'Algeria', 'Algeria', 'Algeria', 'Algeria', 'Algeria', 'Africa', 'DZ', ''),
('Andorra', 4, 376, 1, 'ad', 0, 'Andorran', 'Andorra', 'Andorra', 'Andorra', 'Andorra', 'Andorra', 'Europe', 'AD', ''),
('Angola', 5, 244, 1, 'ao', 0, 'Angola', 'Angola', 'Angola', 'Angola', 'Angola', 'Angola', 'Africa', 'AO', ''),
('Anguilla', 6, 264, 1, 'ai', 0, 'Anguillan', 'Anguilla', 'Anguilla', 'Anguilla', 'Anguilla', 'Anguilla', 'Asia', 'AI', ''),
('Antigua and Barbuda', 7, 268, 1, 'ag', 0, 'Antiguans, Barbudans', 'Antigua & Barbuda', 'Antigua & Barbuda', 'Antigua & Barbuda', 'Antigua & Barbuda', 'Antigua and Barbuda', 'North America', 'AG', ''),
('Argentina', 8, 54, 1, 'ar', 0, 'Argentine', 'Argentina', 'Argentina', 'Argentina', 'Argentina', 'Argentina', 'South America', 'AR', ''),
('Armenia', 9, 374, 1, 'am', 0, 'Armenian', 'Armenia', 'Armenia', 'Armenia', 'Armenia', 'Armenia', 'Europe', 'AM', ''),
('Austria', 10, 43, 1, 'at', 0, 'Austrians', 'Austria', 'Austria', 'Austria', 'Austria', 'Austria', 'Europe', 'AT', ''),
('Azerbaijan', 11, 994, 1, 'az', 0, 'Azeris', 'Azerbaijan', 'Azerbaijan', 'Azerbaijan', 'Azerbaijan', 'Azerbaijan', 'Europe', 'AZ', ''),
('Bahamas', 12, 242, 1, 'bs', 0, 'Bahamas', 'Bahamas', 'Bahamas', 'Bahamas', 'Bahamas', 'Bahamas', 'North America', 'BS', ''),
('Bahrain', 13, 973, 1, 'bh', 0, 'Bahraini', 'Bahrain', 'Bahrain', 'Bahrain', 'Bahrain', 'Bahrain', 'Asia', 'BH', ''),
('Bangladesh', 14, 880, 2, 'bd', 0, 'Bangladeshi', 'Bangladesh', 'Bangladesh', 'Bangladesh', 'Bangladesh', 'Bangladesh', 'Asia', 'BD', ''),
('Barbados', 15, 246, 2, 'bb', 0, 'Barbadian', 'Barbados', 'Barbados', 'Barbados', 'Barbados', 'Barbados', 'North America', 'BB', ''),
('Belarus', 16, 375, 2, 'by', 0, 'Belarus', 'Belarus', 'Belarus', 'Belarus', 'Belarus', 'Belarus', 'Europe', 'BY', ''),
('Belgium', 17, 32, 2, 'be', 0, 'Belgian', 'Belgium', 'Belgium', 'Belgium', 'Belgium', 'Belgium', 'Europe', 'BE', ''),
('Belize', 19, 501, 2, 'bz', 0, 'Belizean', 'Belize', 'Belize', 'Belize', 'Belize', 'Belize', 'North America', 'BZ', ''),
('Bermuda', 20, 440, 2, 'bm', 0, 'Bermudian', 'Bermuda', 'Bermuda', 'Bermuda', 'Bermuda', 'Bermuda', 'Asia', 'BM', ''),
('Bhutan', 21, 975, 2, 'bt', 0, 'Bhutanese', 'Bhutan', 'Bhutan', 'Bhutan', 'Bhutan', 'Bhutan', 'Asia', 'BT', ''),
('Bolivia', 22, 591, 2, 'bo', 0, 'Bolivian', 'Bolivia', 'Bolivia', 'Bolivia', 'Bolivia', 'Bolivia', 'South America', 'BO', ''),
('Bosnia Herzegovina', 23, 387, 2, 'ba', 0, 'Bosnian', 'Bosnia-Herzegovina', 'Bosnia-Herzegovina', 'Bosnia-Herzegovina', 'Bosnia-Herzegovina', 'Bosnia Herzegovina', 'Europe', 'BA', ''),
('Botswana', 24, 267, 2, 'bw', 0, 'Botswana', 'Botswana', 'Botswana', 'Botswana', 'Botswana', 'Botswana', 'Africa', 'BW', ''),
('Brazil', 25, 55, 2, 'br', 0, 'Brazilian', 'Brazil', 'Brazil', 'Brazil', 'Brazil', 'Brazil', 'South America', 'BR', ''),
('Brunei', 26, 673, 2, 'bn', 0, 'Brunei', 'Brunei', 'Brunei', 'Brunei', 'Brunei', 'Brunei', 'Asia', 'BN', ''),
('Bulgaria', 27, 359, 2, 'bg', 0, 'Bulgarian', 'Bulgaria', 'Bulgaria', 'Bulgaria', 'Bulgaria', 'Bulgaria', 'Europe', 'BG', ''),
('Burkina Faso', 28, 226, 2, 'bf', 0, 'Burkinabe', 'Burkina Faso', 'Burkina Faso', 'Burkina Faso', 'Burkina Faso', 'Burkina Faso', 'Africa', 'BF', ''),
('Burundi', 29, 257, 2, 'bi', 0, ' Burundian', 'Burundi', 'Burundi', 'Burundi', 'Burundi', 'Burundi', 'Africa', 'BI', ''),
('Cambodia', 30, 855, 2, 'kh', 0, 'Cambodian', 'Cambodia', 'Cambodia', 'Cambodia', 'Cambodia', 'Cambodia', 'Asia', 'KH', ''),
('Cameroon', 31, 237, 2, 'cm', 0, 'Cameroonian', 'Cameroon', 'Cameroon', 'Cameroon', 'Cameroon', 'Cameroon', 'Africa', 'CM', ''),
('Canada', 32, 1, 2, 'ca', 0, 'Canadian', 'Canada', 'Canada', 'Canada', 'Canada', 'Canada', 'North America', 'CA', ''),
('Cape Verde', 33, 238, 2, 'cv', 0, 'Cape Verdean', 'Cape Verde', 'Cape Verde', 'Cape Verde', 'Cape Verde', 'Cape Verde', 'Africa', 'CV', ''),
('Cayman Islands', 34, 344, 2, 'ky', 0, 'Caymanian', 'Cayman Islands', 'Cayman Islands', 'Cayman Islands', 'Cayman Islands', 'Cayman Islands', 'Asia', 'KY', ''),
('Central African Republic', 35, 236, 2, 'cf', 0, 'African', 'Central African Republic', 'Central African Republic', 'Central African Republic', 'Central African Republic', 'Central African Republic', 'Africa', 'CF', ''),
('Chad', 36, 235, 2, 'td', 0, 'Chadian', 'Chad', 'Chad', 'Chad', 'Chad', 'Chad', 'Africa', 'TD', ''),
('Chile', 37, 56, 2, 'cl', 0, 'Chilean', 'Chile', 'Chile', 'Chile', 'Chile', 'Chile', 'South America', 'CL', ''),
('China', 38, 86, 2, 'cn', 1, 'Chinese', 'China', 'China', 'China', 'China', 'China', 'Asia', 'CN', ''),
('Colombia', 39, 57, 2, 'co', 0, 'Colombian', 'Colombia', 'Colombia', 'Colombia', 'Colombia', 'Colombia', 'South America', 'CO', ''),
('Comoros', 40, 269, 2, 'km', 0, 'Comoran', 'Comoros', 'Comoros', 'Comoros', 'Comoros', 'Comoros', 'Asia', 'KM', ''),
('Congo', 41, 242, 2, 'cg', 0, 'Kongo', 'Congo', 'Congo', 'Congo', 'Congo', 'Congo', 'Africa', 'CG', ''),
('Congo (DRC)', 42, 243, 2, 'cd', 0, 'Congolese', 'Congo (DRC)', 'Congo (DRC)', 'Congo (DRC)', 'Congo (DRC)', 'Congo (DRC)', 'Asia', 'CD', ''),
('Cook Islands', 43, 682, 2, 'ck', 0, 'Cook Islander', 'Cook Islands', 'Cook Islands', 'Cook Islands', 'Cook Islands', 'Cook Islands', 'Australia and Oceania', 'CK', ''),
('Costa Rica', 44, 506, 2, 'cr', 0, 'Costa Rican', 'Costa Rica', 'Costa Rica', 'Costa Rica', 'Costa Rica', 'Costa Rica', 'North America', 'CR', ''),
('Cote d\'Ivoire', 45, 225, 2, 'ci', 0, 'Ivorian', 'Cote d\'Ivoire', 'Cote d\'Ivoire', 'Cote d\'Ivoire', 'Cote d\'Ivoire', 'Cote d\'Ivoire', 'Asia', 'CI', ''),
('Croatia', 46, 385, 2, 'hr', 0, 'Croatian', 'Croatia', 'Croatia', 'Croatia', 'Croatia', 'Croatia', 'Europe', 'HR', ''),
('Cuba', 47, 53, 2, 'cu', 0, 'Cuban', 'Cuba', 'Cuba', 'Cuba', 'Cuba', 'Cuba', 'North America', 'CU', ''),
('Cyprus', 48, 357, 2, 'cy', 0, 'Cypriot', 'Cyprus', 'Cyprus', 'Cyprus', 'Cyprus', 'Cyprus', 'Europe', 'CY', ''),
('Czech Republic', 49, 420, 2, 'cz', 0, 'Czech', 'Czech Republic', 'Czech Republic', 'Czech Republic', 'Czech Republic', 'Czech Republic', 'Europe', 'CZ', ''),
('Denmark', 50, 45, 2, 'dk', 0, 'Danish', 'Denmark', 'Denmark', 'Denmark', 'Denmark', 'Denmark', 'Europe', 'DK', ''),
('Djibouti', 51, 253, 2, 'dj', 0, 'Djibouti', 'Djibouti', 'Djibouti', 'Djibouti', 'Djibouti', 'Djibouti', 'Africa', 'DJ', ''),
('Dominica', 52, 766, 2, 'dm', 0, 'Dominican', 'Dominica', 'Dominica', 'Dominica', 'Dominica', 'Dominica', 'North America', 'DM', ''),
('Dominican Republic', 53, 809, 2, 'do', 0, 'Dominican', 'Dominican Republic', 'Dominican Republic', 'Dominican Republic', 'Dominican Republic', 'Dominican Republic', 'North America', 'DO', ''),
('East Timor', 54, 670, 2, 'tp', 0, 'East Timorese', 'East Timor', 'East Timor', 'East Timor', 'East Timor', 'East Timor', 'Asia', 'TL', ''),
('Ecuador', 55, 593, 2, 'ec', 0, 'Ecuadorean', 'Ecuador', 'Ecuador', 'Ecuador', 'Ecuador', 'Ecuador', 'South America', 'EC', ''),
('Egypt', 56, 20, 2, 'eg', 0, 'Egyptian', 'Egypt', 'Egypt', 'Egypt', 'Egypt', 'Egypt', 'Africa', 'EG', ''),
('El Salvador', 57, 503, 2, 'sv', 0, 'Salvadoran', 'El Salvador', 'El Salvador', 'El Salvador', 'El Salvador', 'El Salvador', 'North America', 'SV', ''),
('Equatorial Guinea', 58, 240, 2, 'gq', 0, 'Equatoguinean', 'Equatorial Guinea', 'Equatorial Guinea', 'Equatorial Guinea', 'Equatorial Guinea', 'Equatorial Guinea', 'Africa', 'GQ', ''),
('Eritrea', 59, 291, 2, 'er', 0, 'Eritrean', 'Eritrea', 'Eritrea', 'Eritrea', 'Eritrea', 'Eritrea', 'Africa', 'ER', ''),
('Estonia', 60, 372, 2, 'ee', 0, 'Estonian', 'Estonia', 'Estonia', 'Estonia', 'Estonia', 'Estonia', 'Europe', 'EE', ''),
('Ethiopia', 61, 251, 2, 'et', 0, 'Ethiopian', 'Ethiopia', 'Ethiopia', 'Ethiopia', 'Ethiopia', 'Ethiopia', 'Africa', 'ET', ''),
('Falkland Islands', 62, 500, 2, 'fk', 0, 'Falkland Islander', 'Falkland Islands', 'Falkland Islands', 'Falkland Islands', 'Falkland Islands', 'Falkland Islands', 'South America', 'FK', ''),
('Faroe Islands', 63, 298, 3, 'fo', 0, 'Faroese', 'Faroe Islands', 'Faroe Islands', 'Faroe Islands', 'Faroe Islands', 'Faroe Islands', 'Asia', 'FO', ''),
('Fiji', 64, 679, 3, 'fj', 0, 'Fijian', 'Fiji', 'Fiji', 'Fiji', 'Fiji', 'Fiji', 'Australia and Oceania', 'FJ', ''),
('Finland', 65, 358, 3, 'fi', 0, 'Finnish', 'Finland', 'Finland', 'Finland', 'Finland', 'Finland', 'Europe', 'FI', ''),
('France', 66, 33, 3, 'fr', 0, 'French', 'France', 'France', 'France', 'France', 'France', 'Europe', 'FR', ''),
('French Guiana', 67, 594, 3, 'gf', 0, 'French Guianese', 'French Guiana', 'French Guiana', 'French Guiana', 'French Guiana', 'French Guiana', 'Asia', 'GF', ''),
('French Polynesia', 68, 689, 3, 'pf', 0, 'French Polynesian', 'French Polynesia', 'French Polynesia', 'French Polynesia', 'French Polynesia', 'French Polynesia', 'Australia and Oceania', 'PF', ''),
('Gabon', 69, 241, 3, 'ga', 0, 'Gabonese', 'Gabon', 'Gabon', 'Gabon', 'Gabon', 'Gabon', 'Africa', 'GA', ''),
('Gambia', 70, 220, 3, 'gm', 0, 'Gambian', 'Gambia', 'Gambia', 'Gambia', 'Gambia', 'Gambia', 'Africa', 'GM', ''),
('Georgia', 71, 995, 3, 'ge', 0, 'Georgian', 'Georgia', 'Georgia', 'Georgia', 'Georgia', 'Georgia', 'Europe', 'GE', ''),
('Germany', 72, 49, 3, 'de', 1, 'German', 'Germany', 'Germany', 'Germany', 'Germany', 'Germany', 'Europe', 'DE', ''),
('Ghana', 73, 233, 3, 'gh', 0, 'Ghanaian', 'Ghana', 'Ghana', 'Ghana', 'Ghana', 'Ghana', 'Africa', 'GH', ''),
('Gibraltar', 74, 350, 3, 'gi', 0, 'Gibraltarian', 'Gibraltar', 'Gibraltar', 'Gibraltar', 'Gibraltar', 'Gibraltar', 'Asia', 'GI', ''),
('Greece', 75, 30, 3, 'gr', 0, 'Greek', 'Greece', 'Greece', 'Greece', 'Greece', 'Greece', 'Europe', 'GR', ''),
('Greenland', 76, 299, 3, 'gl', 0, 'Greenlandic', 'Greenland', 'Greenland', 'Greenland', 'Greenland', 'Greenland', 'Asia', 'GL', ''),
('Grenada', 77, 472, 3, 'gd', 0, 'Grenadian', 'Grenada', 'Grenada', 'Grenada', 'Grenada', 'Grenada', 'North America', 'GD', ''),
('Guadeloupe', 78, 590, 3, 'gp', 0, 'Guadeloupean', 'Guadeloupe', 'Guadeloupe', 'Guadeloupe', 'Guadeloupe', 'Guadeloupe', 'Asia', 'GP', ''),
('Guam', 79, 671, 3, 'gu', 0, 'Guamanian', 'Guam', 'Guam', 'Guam', 'Guam', 'Guam', 'Australia and Oceania', 'GU', ''),
('Guatemala', 80, 502, 3, 'gt', 0, 'Guatemalan', 'Guatemala', 'Guatemala', 'Guatemala', 'Guatemala', 'Guatemala', 'North America', 'GT', ''),
('Guinea', 81, 224, 3, 'gn', 0, 'Guinean', 'Guinea', 'Guinea', 'Guinea', 'Guinea', 'Guinea', 'Africa', 'GN', ''),
('Guinea-Bissau', 82, 245, 3, 'gw', 0, 'Bissauan', 'Guinea-Bissau', 'Guinea-Bissau', 'Guinea-Bissau', 'Guinea-Bissau', 'Guinea-Bissau', 'Asia', 'GW', ''),
('Guyana', 83, 592, 3, 'gy', 0, 'Guyanese', 'Guyana', 'Guyana', 'Guyana', 'Guyana', 'Guyana', 'South America', 'GY', ''),
('Haiti', 84, 509, 3, 'ht', 0, 'Haitian', 'Haiti', 'Haiti', 'Haiti', 'Haiti', 'Haiti', 'North America', 'HT', ''),
('Honduras', 85, 504, 3, 'hn', 0, 'Honduran', 'Honduras', 'Honduras', 'Honduras', 'Honduras', 'Honduras', 'North America', 'HN', ''),
('Hong Kong', 86, 852, 3, 'hk', 1, 'Hongkonger', 'Hong Kong SAR', 'Hong Kong SAR', 'Hong Kong SAR', 'Hong Kong SAR', 'Hong Kong', 'Asia', 'HK', ''),
('Hungary', 87, 36, 3, 'hu', 0, 'Hungarian', 'Hungary', 'Hungary', 'Hungary', 'Hungary', 'Hungary', 'Europe', 'HU', ''),
('Iceland', 88, 354, 3, 'is', 0, 'Icelander', 'Iceland', 'Iceland', 'Iceland', 'Iceland', 'Iceland', 'Europe', 'IS', ''),
('India', 89, 91, 3, 'in', 1, 'Indian', 'India', 'India', 'India', 'India', 'India', 'Asia', 'IN', ''),
('Indonesia', 90, 62, 3, 'id', 1, 'Indonesian', 'Indonesia', 'Indonesia', 'Indonesia', 'Indonesia', 'Indonesia', 'Asia', 'ID', ''),
('Iran', 91, 98, 3, 'ir', 0, 'Iranian', 'Iran', 'Iran', 'Iran', 'Iran', 'Iran', 'Asia', 'IR', ''),
('Iraq', 92, 964, 3, 'iq', 0, 'Iraqi', 'Iraq', 'Iraq', 'Iraq', 'Iraq', 'Iraq', 'Asia', 'IQ', ''),
('Ireland', 93, 353, 3, 'ie', 0, 'Irish', 'Ireland', 'Ireland', 'Ireland', 'Ireland', 'Ireland', 'Europe', 'IE', ''),
('Israel', 94, 972, 3, 'il', 0, 'Israeli', 'Israel', 'Israel', 'Israel', 'Israel', 'Israel', 'Asia', 'IL', ''),
('Italy', 95, 39, 3, 'it', 1, 'Italian', 'Italy', 'Italy', 'Italy', 'Italy', 'Italy', 'Europe', 'IT', ''),
('Jamaica', 96, 875, 3, 'jm', 0, 'Jamaican', 'Jamaica', 'Jamaica', 'Jamaica', 'Jamaica', 'Jamaica', 'North America', 'JM', ''),
('Japan', 97, 81, 3, 'jp', 0, 'Japanese', 'Japan', 'Japan', 'Japan', 'Japan', 'Japan', 'Asia', 'JP', ''),
('Jordan', 98, 962, 3, 'jo', 0, 'Jordanian', 'Jordan', 'Jordan', 'Jordan', 'Jordan', 'Jordan', 'Asia', 'JO', ''),
('Kazakhstan', 99, 7, 3, 'kz', 0, 'Kazakhstani', 'Kazakhstan', 'Kazakhstan', 'Kazakhstan', 'Kazakhstan', 'Kazakhstan', 'Asia', 'KZ', ''),
('Kenya', 100, 254, 3, 'ke', 0, 'Kenyan', 'Kenya', 'Kenya', 'Kenya', 'Kenya', 'Kenya', 'Africa', 'KE', ''),
('Kiribati', 101, 686, 3, 'ki', 0, 'Kiribatian', 'Kiribati', 'Kiribati', 'Kiribati', 'Kiribati', 'Kiribati', 'Australia and Oceania', 'KI', ''),
('South Korea', 102, 82, 3, 'kr', 1, 'Korean', 'Korea', 'Korea', 'Korea', 'Korea', 'South Korea', 'Asia', 'KR', ''),
('Kuwait', 103, 965, 3, 'kw', 0, 'Kuwait', 'Kuwait', 'Kuwait', 'Kuwait', 'Kuwait', 'Kuwait', 'Asia', 'KW', ''),
('Kyrgyzstan', 104, 996, 3, 'kg', 0, 'Kyrgyz', 'Kyrgyzstan', 'Kyrgyzstan', 'Kyrgyzstan', 'Kyrgyzstan', 'Kyrgyzstan', 'Asia', 'KG', ''),
('Laos', 105, 856, 3, 'la', 0, 'Laotian', 'Laos', 'Laos', 'Laos', 'Laos', 'Laos', 'Asia', 'LA', ''),
('Latvia', 106, 371, 3, 'lv', 0, 'Latvian', 'Latvia', 'Latvia', 'Latvia', 'Latvia', 'Latvia', 'Europe', 'LV', ''),
('Lebanon', 107, 961, 3, 'lb', 0, 'Lebanese', 'Lebanon', 'Lebanon', 'Lebanon', 'Lebanon', 'Lebanon', 'Asia', 'LB', ''),
('Lesotho', 108, 266, 3, 'ls', 0, 'Basotho', 'Lesotho', 'Lesotho', 'Lesotho', 'Lesotho', 'Lesotho', 'Africa', 'LS', ''),
('Liberia', 109, 231, 3, 'lr', 0, 'Liberian', 'Liberia', 'Liberia', 'Liberia', 'Liberia', 'Liberia', 'Africa', 'LR', ''),
('Libya', 110, 218, 3, 'ly', 0, 'Libyan', 'Libya', 'Libya', 'Libya', 'Libya', 'Libya', 'Africa', 'LY', ''),
('Liechtenstein', 111, 423, 3, 'li', 0, 'Liechtensteiner', 'Liechtenstein', 'Liechtenstein', 'Liechtenstein', 'Liechtenstein', 'Liechtenstein', 'Europe', 'LI', ''),
('Lithuania', 112, 370, 3, 'lt', 0, 'Lithuanian', 'Lithuania', 'Lithuania', 'Lithuania', 'Lithuania', 'Lithuania', 'Europe', 'LT', ''),
('Luxembourg', 113, 352, 4, 'lu', 0, 'Luxembourger', 'Luxembourg', 'Luxembourg', 'Luxembourg', 'Luxembourg', 'Luxembourg', 'Europe', 'LU', ''),
('Macao SAR', 114, 853, 4, 'mo', 0, 'Macanese', 'Macao SAR', 'Macao SAR', 'Macao SAR', 'Macao SAR', 'Macao SAR', 'Asia', 'MO', ''),
('Macedonia', 115, 389, 4, 'mk', 0, 'Macedonian', 'Macedonia', 'Macedonia', 'Macedonia', 'Macedonia', 'Macedonia', 'Europe', 'MK', ''),
('Madagascar', 116, 261, 4, 'mg', 0, 'Malagasy', 'Madagascar', 'Madagascar', 'Madagascar', 'Madagascar', 'Madagascar', 'Africa', 'MG', ''),
('Malawi', 117, 265, 4, 'mw', 0, 'Malawian', 'Malawi', 'Malawi', 'Malawi', 'Malawi', 'Malawi', 'Africa', 'MW', ''),
('Malaysia', 118, 60, 4, 'my', 1, 'Malaysian', 'Malaysia', 'Malaysia', 'Malaysia', 'Malaysia', 'Malaysia', 'Asia', 'MY', ''),
('Maldives', 119, 960, 4, 'mv', 0, 'Maldivian', 'Maldives', 'Maldives', 'Maldives', 'Maldives', 'Maldives', 'Asia', 'MV', ''),
('Mali', 120, 223, 4, 'ml', 0, 'Malian', 'Mali', 'Mali', 'Mali', 'Mali', 'Mali', 'Africa', 'ML', ''),
('Malta', 121, 356, 4, 'mt', 0, 'Maltese', 'Malta', 'Malta', 'Malta', 'Malta', 'Malta', 'Europe', 'MT', ''),
('Martinique', 122, 596, 4, 'mq', 0, 'French', 'Martinique', 'Martinique', 'Martinique', 'Martinique', 'Martinique', 'Asia', 'MQ', ''),
('Mauritania', 123, 222, 4, 'mr', 0, 'Mauritanian', 'Mauritania', 'Mauritania', 'Mauritania', 'Mauritania', 'Mauritania', 'Africa', 'MR', ''),
('Mauritius', 124, 230, 4, 'mu', 0, 'Mauritian', 'Mauritius', 'Mauritius', 'Mauritius', 'Mauritius', 'Mauritius', 'Africa', 'MU', ''),
('Mayotte', 125, 262, 4, 'yt', 0, 'Mahoran', 'Mayotte', 'Mayotte', 'Mayotte', 'Mayotte', 'Mayotte', 'Asia', 'YT', ''),
('Mexico', 126, 52, 4, 'mx', 0, 'Mexican', 'Mexico', 'Mexico', 'Mexico', 'Mexico', 'Mexico', 'North America', 'MX', ''),
('Micronesia', 127, 691, 4, '', 0, 'Micronesian', 'Micronesia', 'Micronesia', 'Micronesia', 'Micronesia', 'Micronesia', 'Australia and Oceania', 'FM', ''),
('Moldova', 128, 373, 4, 'md', 0, 'Moldovan', 'Moldova', 'Moldova', 'Moldova', 'Moldova', 'Moldova', 'Europe', 'MD', ''),
('Monaco', 129, 377, 4, 'mc', 0, 'Monacan', 'Monaco', 'Monaco', 'Monaco', 'Monaco', 'Monaco', 'Europe', 'MC', ''),
('Mongolia', 130, 976, 4, 'mn', 0, 'Mongolian', 'Mongolia', 'Mongolia', 'Mongolia', 'Mongolia', 'Mongolia', 'Asia', 'MN', ''),
('Montserrat', 131, 663, 4, 'ms', 0, 'Montserratian', 'Montserrat', 'Montserrat', 'Montserrat', 'Montserrat', 'Montserrat', 'Asia', 'MS', ''),
('Morocco', 132, 212, 4, 'ma', 0, 'Moroccan', 'Morocco', 'Morocco', 'Morocco', 'Morocco', 'Morocco', 'Africa', 'MA', ''),
('Mozambique', 133, 258, 4, 'mz', 0, 'Mozambican', 'Mozambique', 'Mozambique', 'Mozambique', 'Mozambique', 'Mozambique', 'Africa', 'MZ', ''),
('Myanmar', 134, 95, 4, 'mm', 0, 'Burmese', 'Myanmar', 'Myanmar', 'Myanmar', 'Myanmar', 'Myanmar', 'Asia', 'MM', ''),
('Namibia', 135, 264, 4, 'na', 0, 'Namibian', 'Namibia', 'Namibia', 'Namibia', 'Namibia', 'Namibia', 'Africa', 'NA', ''),
('Nauru', 136, 674, 4, 'nr', 0, 'Nauruan', 'Nauru', 'Nauru', 'Nauru', 'Nauru', 'Nauru', 'Australia and Oceania', 'NR', ''),
('Nepal', 137, 977, 4, 'np', 0, 'Nepali', 'Nepal', 'Nepal', 'Nepal', 'Nepal', 'Nepal', 'Asia', 'NP', ''),
('Netherlands', 138, 31, 4, 'nl', 0, 'Dutch', 'Netherlands', 'Netherlands', 'Netherlands', 'Netherlands', 'Netherlands', 'Europe', 'NL', ''),
('Netherlands Antilles', 139, 599, 4, 'an', 0, 'Dutch Antillean', 'Netherlands Antilles', 'Netherlands Antilles', 'Netherlands Antilles', 'Netherlands Antilles', 'Netherlands Antilles', 'Asia', 'AN', ''),
('New Caledonia', 140, 687, 4, 'nc', 0, 'New Caledonian', 'New Caledonia', 'New Caledonia', 'New Caledonia', 'New Caledonia', 'New Caledonia', 'Australia and Oceania', 'NC', ''),
('New Zealand', 141, 64, 4, 'nz', 0, 'Kiwi', 'New Zealand', 'New Zealand', 'New Zealand', 'New Zealand', 'New Zealand', 'Australia and Oceania', 'NZ', ''),
('Nicaragua', 142, 505, 4, 'ni', 0, 'Nicaraguan', 'Nicaragua', 'Nicaragua', 'Nicaragua', 'Nicaragua', 'Nicaragua', 'North America', 'NI', ''),
('Niger', 143, 227, 4, 'ne', 0, 'Nigerien', 'Niger', 'Niger', 'Niger', 'Niger', 'Niger', 'Africa', 'NE', ''),
('Nigeria', 144, 234, 4, 'ng', 0, 'Nigerian', 'Nigeria', 'Nigeria', 'Nigeria', 'Nigeria', 'Nigeria', 'Africa', 'NG', ''),
('Niue', 145, 683, 4, 'nu', 0, 'Niuean', 'Niue', 'Niue', 'Niue', 'Niue', 'Niue', 'Australia and Oceania', 'NU', ''),
('Norfolk Island', 146, 672, 4, 'nf', 0, 'Norfolk Islander', 'Norfolk Island', 'Norfolk Island', 'Norfolk Island', 'Norfolk Island', 'Norfolk Island', 'Australia and Oceania', 'NF', ''),
('North Korea', 147, 850, 4, 'kp', 0, 'North Korean', 'North Korea', 'North Korea', 'North Korea', 'North Korea', 'North Korea', 'Asia', 'KP', ''),
('Norway', 148, 47, 4, 'no', 0, 'Norwegian', 'Norway', 'Norway', 'Norway', 'Norway', 'Norway', 'Europe', 'NO', ''),
('Oman', 149, 968, 4, 'om', 0, 'Omani', 'Oman', 'Oman', 'Oman', 'Oman', 'Oman', 'Asia', 'OM', ''),
('Pakistan', 150, 92, 4, 'pk', 1, 'Pakistani', 'Pakistan', 'Pakistan', 'Pakistan', 'Pakistan', 'Pakistan', 'Asia', 'PK', ''),
('Panama', 151, 507, 4, 'pa', 0, 'Panamanian', 'Panama', 'Panama', 'Panama', 'Panama', 'Panama', 'North America', 'PA', ''),
('Papua New Guinea', 152, 675, 4, 'pg', 0, 'Papua New Guinean', 'Papua New Guinea', 'Papua New Guinea', 'Papua New Guinea', 'Papua New Guinea', 'Papua New Guinea', 'Australia and Oceania', 'PG', ''),
('Paraguay', 153, 595, 4, 'py', 0, 'Paraguayan', 'Paraguay', 'Paraguay', 'Paraguay', 'Paraguay', 'Paraguay', 'South America', 'PY', ''),
('Peru', 154, 51, 4, 'pe', 0, 'Peruvian', 'Peru', 'Peru', 'Peru', 'Peru', 'Peru', 'South America', 'PE', ''),
('Philippines', 155, 63, 4, 'ph', 0, 'Filipino', 'Philippines', 'Philippines', 'Philippines', 'Philippines', 'Philippines', 'Asia', 'PH', ''),
('Pitcairn Islands', 156, 872, 4, '', 0, 'Pitcairn Islanders', 'Pitcairn Islands', 'Pitcairn Islands', 'Pitcairn Islands', 'Pitcairn Islands', 'Pitcairn Islands', 'Asia', 'PN', ''),
('Poland', 157, 48, 4, 'pl', 0, 'Polish', 'Poland', 'Poland', 'Poland', 'Poland', 'Poland', 'Europe', 'PL', ''),
('Portugal', 158, 351, 4, 'pt', 0, 'Portuguese', 'Portugal', 'Portugal', 'Portugal', 'Portugal', 'Portugal', 'Europe', 'PT', ''),
('Puerto Rico', 159, 787, 4, 'pr', 0, 'Puerto Ricans', 'Puerto Rico', 'Puerto Rico', 'Puerto Rico', 'Puerto Rico', 'Puerto Rico', 'Asia', 'PR', ''),
('Qatar', 160, 974, 4, 'qa', 0, 'Qatari', 'Qatar', 'Qatar', 'Qatar', 'Qatar', 'Qatar', 'Asia', 'QA', ''),
('Reunion', 161, 262, 4, 're', 0, 'Reunionese', 'Reunion', 'Reunion', 'Reunion', 'Reunion', 'Reunion', 'Africa', 'RE', ''),
('Romania', 162, 40, 4, 'ro', 0, 'Romanian', 'Romania', 'Romania', 'Romania', 'Romania', 'Romania', 'Europe', 'RO', ''),
('Russia', 163, 7, 5, 'ru', 0, 'Russian', 'Russia', 'Russia', 'Russia', 'Russia', 'Russia', 'Asia', 'RU', ''),
('Rwanda', 164, 250, 5, 'rw', 0, 'Rwandan', 'Rwanda', 'Rwanda', 'Rwanda', 'Rwanda', 'Rwanda', 'Africa', 'RW', ''),
('Samoa', 165, 685, 5, 'ws', 0, 'Samoan', 'Samoa', 'Samoa', 'Samoa', 'Samoa', 'Samoa', 'Australia and Oceania', 'WS', ''),
('San Marino', 166, 378, 5, 'sm', 0, 'Sammarinese', 'San Marino', 'San Marino', 'San Marino', 'San Marino', 'San Marino', 'Europe', 'SM', ''),
('Sao Tome and Principe', 167, 239, 5, 'st', 0, 'Sao Tomean', 'Sao Tome and Principe', 'Sao Tome and Principe', 'Sao Tome and Principe', 'Sao Tome and Principe', 'Sao Tome and Principe', 'Asia', 'ST', ''),
('Saudi Arabia', 168, 966, 5, 'sa', 1, 'Saudi Arabian', 'Saudi Arabia', 'Saudi Arabia', 'Saudi Arabia', 'Saudi Arabia', 'Saudi Arabia', 'Asia', 'SA', ''),
('Senegal', 169, 221, 5, 'sn', 0, 'Senegal', 'Senegal', 'Senegal', 'Senegal', 'Senegal', 'Senegal', 'Africa', 'SN', ''),
('Serbia', 170, 381, 5, 'cs', 0, 'Serbian', 'Serbia', 'Serbia', 'Serbia', 'Serbia', 'Serbia', 'Europe', 'CS', ''),
('Seychelles', 171, 248, 5, 'sc', 0, 'Seychellois', 'Seychelles', 'Seychelles', 'Seychelles', 'Seychelles', 'Seychelles', 'Africa', 'SC', ''),
('Sierra Leone', 172, 232, 5, 'sl', 0, 'Sierra Leonean', 'Sierra Leone', 'Sierra Leone', 'Sierra Leone', 'Sierra Leone', 'Sierra Leone', 'Africa', 'SL', ''),
('Singapore', 173, 65, 5, 'sg', 1, 'Singapore', 'Singapore', 'Singapore', 'Singapore', 'Singapore', 'Singapore', 'Asia', 'SG', ''),
('Slovakia', 174, 421, 5, 'sk', 0, 'Slovakian', 'Slovakia', 'Slovakia', 'Slovakia', 'Slovakia', 'Slovakia', 'Europe', 'SK', ''),
('Slovenia', 175, 386, 5, 'si', 0, 'Slovenian', 'Slovenia', 'Slovenia', 'Slovenia', 'Slovenia', 'Slovenia', 'Europe', 'SI', ''),
('Solomon Islands', 176, 677, 5, 'sb', 0, 'Solomon Islander', 'Solomon Islands', 'Solomon Islands', 'Solomon Islands', 'Solomon Islands', 'Solomon Islands', 'Australia and Oceania', 'SB', ''),
('Somalia', 177, 252, 5, 'so', 0, 'Somali', 'Somalia', 'Somalia', 'Somalia', 'Somalia', 'Somalia', 'Africa', 'SO', ''),
('South Africa', 178, 27, 6, 'za', 0, 'South African', 'South Africa', 'South Africa', 'South Africa', 'South Africa', 'South Africa', 'Africa', 'ZA', ''),
('Spain', 179, 34, 6, 'es', 0, 'Spanish', 'Spain', 'Spain', 'Spain', 'Spain', 'Spain', 'Europe', 'ES', ''),
('Sri Lanka', 180, 94, 6, 'lk', 0, 'Sri Lankan', 'Sri Lanka', 'Sri Lanka', 'Sri Lanka', 'Sri Lanka', 'Sri Lanka', 'Asia', 'LK', ''),
('St. Helena', 181, 290, 6, '', 0, 'St. Helenians', 'St. Helena', 'St. Helena', 'St. Helena', 'St. Helena', 'St. Helena', 'Asia', 'SH', ''),
('St. Kitts and Nevis', 182, 868, 6, 'kn', 0, 'Kittian and Nevisian', 'St. Kitts and Nevis', 'St. Kitts and Nevis', 'St. Kitts and Nevis', 'St. Kitts and Nevis', 'St. Kitts and Nevis', 'North America', 'KN', ''),
('St. Lucia', 183, 757, 6, 'lc', 0, 'Saint Lucian', 'St. Lucia', 'St. Lucia', 'St. Lucia', 'St. Lucia', 'St. Lucia', 'North America', 'LC', ''),
('St. Pierre and Miquelon', 184, 508, 6, '', 0, '', 'St. Pierre and Miquelon', 'St. Pierre and Miquelon', 'St. Pierre and Miquelon', 'St. Pierre and Miquelon', 'St. Pierre and Miquelon', 'Asia', 'PM', ''),
('St. Vincent', 185, 783, 6, 'vc', 0, 'Vincentian', 'St. Vincent', 'St. Vincent', 'St. Vincent', 'St. Vincent', 'St. Vincent', 'Asia', 'VC', ''),
('Sudan', 186, 249, 6, 'sd', 0, 'Sudanese', 'Sudan', 'Sudan', 'Sudan', 'Sudan', 'Sudan', 'Africa', 'SD', ''),
('Suriname', 187, 597, 6, 'sr', 0, 'Surinamer', 'Suriname', 'Suriname', 'Suriname', 'Suriname', 'Suriname', 'South America', 'SR', ''),
('Swaziland', 188, 268, 6, 'sz', 0, 'Swazi', 'Swaziland', 'Swaziland', 'Swaziland', 'Swaziland', 'Swaziland', 'Africa', 'SZ', ''),
('Sweden', 189, 46, 6, 'se', 0, 'Swedish', 'Sweden', 'Sweden', 'Sweden', 'Sweden', 'Sweden', 'Europe', 'SE', ''),
('Switzerland', 190, 41, 6, 'ch', 0, 'Swiss', 'Switzerland', 'Switzerland', 'Switzerland', 'Switzerland', 'Switzerland', 'Europe', 'CH', ''),
('Syria', 191, 963, 6, 'sy', 0, 'Syrian', 'Syria', 'Syria', 'Syria', 'Syria', 'Syria', 'Asia', 'SY', ''),
('Taiwan', 192, 886, 6, 'tw', 1, 'Taiwanese', 'Taiwan', 'Taiwan', 'Taiwan', 'Taiwan', 'Taiwan', 'Asia', 'TW', ''),
('Tajikistan', 193, 992, 6, 'tj', 0, 'Tajik', 'Tajikistan', 'Tajikistan', 'Tajikistan', 'Tajikistan', 'Tajikistan', 'Asia', 'TJ', ''),
('Tanzania', 194, 255, 6, 'tz', 0, 'Tanzanian', 'Tanzania', 'Tanzania', 'Tanzania', 'Tanzania', 'Tanzania', 'Africa', 'TZ', ''),
('Thailand', 195, 66, 6, 'th', 1, 'Thai', 'Thailand', 'Thailand', 'Thailand', 'Thailand', 'Thailand', 'Asia', 'TH', ''),
('Togo', 196, 228, 6, 'tg', 0, 'Togolese', 'Togo', 'Togo', 'Togo', 'Togo', 'Togo', 'Africa', 'TG', ''),
('Tokelau', 197, 690, 6, 'tk', 0, 'Tokelauan', 'Tokelau', 'Tokelau', 'Tokelau', 'Tokelau', 'Tokelau', 'Australia and Oceania', 'TK', ''),
('Tonga', 198, 676, 6, 'to', 0, 'Tongan', 'Tonga', 'Tonga', 'Tonga', 'Tonga', 'Tonga', 'Australia and Oceania', 'TO', ''),
('Trinidad and Tobago', 199, 867, 6, 'tt', 0, 'Trinidadian, Tobagonian', 'Trinidad and Tobago', 'Trinidad and Tobago', 'Trinidad and Tobago', 'Trinidad and Tobago', 'Trinidad and Tobago', 'North America', 'TT', ''),
('Tunisia', 200, 216, 6, 'tn', 0, 'Tunisian', 'Tunisia', 'Tunisia', 'Tunisia', 'Tunisia', 'Tunisia', 'Africa', 'TN', ''),
('Turkey', 201, 90, 6, 'tr', 1, 'Turkish', 'Turkey', 'Turkey', 'Turkey', 'Turkey', 'Turkey', 'Europe', 'TR', ''),
('Turkmenistan', 202, 993, 6, 'tm', 0, 'Turkmen', 'Turkmenistan', 'Turkmenistan', 'Turkmenistan', 'Turkmenistan', 'Turkmenistan', 'Asia', 'TM', ''),
('Turks and Caicos Islands', 203, 648, 6, 'tc', 0, '', 'Turks and Caicos Islands', 'Turks and Caicos Islands', 'Turks and Caicos Islands', 'Turks and Caicos Islands', 'Turks and Caicos Islands', 'Asia', 'TC', ''),
('Tuvalu', 204, 688, 6, 'tv', 0, 'Tuvaluan', 'Tuvalu', 'Tuvalu', 'Tuvalu', 'Tuvalu', 'Tuvalu', 'Australia and Oceania', 'TV', ''),
('Uganda', 205, 256, 6, 'ug', 0, 'Ugandan', 'Uganda', 'Uganda', 'Uganda', 'Uganda', 'Uganda', 'Africa', 'UG', ''),
('Ukraine', 206, 380, 6, 'ua', 0, 'Ukrainian', 'Ukraine', 'Ukraine', 'Ukraine', 'Ukraine', 'Ukraine', 'Europe', 'UA', ''),
('UAE', 207, 971, 6, 'ae', 0, 'United Arab Emirates', 'UAE', 'UAE', 'UAE', 'UAE', 'UAE', 'Asia', 'AE', ''),
('UK', 208, 44, 6, 'uk', 1, 'United Kingdom', 'UK', 'UK', 'UK', 'UK', 'UK', 'Europe', 'GB', ''),
('Uruguay', 209, 598, 6, 'uy', 0, 'Uruguayan', 'Uruguay', 'Uruguay', 'Uruguay', 'Uruguay', 'Uruguay', 'South America', 'UY', ''),
('Uzbekistan', 211, 998, 6, 'uz', 0, 'Uzbekistani', 'Uzbekistan', 'Uzbekistan', 'Uzbekistan', 'Uzbekistan', 'Uzbekistan', 'Asia', 'UZ', ''),
('Vanuatu', 212, 678, 6, 'vu', 0, 'Vanuatu', 'Vanuatu', 'Vanuatu', 'Vanuatu', 'Vanuatu', 'Vanuatu', 'Asia', 'VU', ''),
('Venezuela', 213, 58, 6, 've', 0, 'Venezuelan', 'Venezuela', 'Venezuela', 'Venezuela', 'Venezuela', 'Venezuela', 'South America', 'VE', ''),
('Vietnam', 214, 84, 6, 'vn', 0, 'Vietnamese', 'Vietnam', 'Vietnam', 'Vietnam', 'Vietnam', 'Vietnam', 'Asia', 'VN', ''),
('US Virgin Islands', 215, 339, 6, 'vi', 0, 'Virgin Islanders', 'Virgin Islands', 'Virgin Islands', 'Virgin Islands', 'Virgin Islands', 'US Virgin Islands', 'Asia', 'VI', ''),
('British Virgin Islands', 216, 283, 6, 'vg', 0, 'Virgin Islanders', 'Virgin Islands (British)', 'Virgin Islands (British)', 'Virgin Islands (British)', 'Virgin Islands (British)', 'British Virgin Islands', 'Asia', 'VG', ''),
('Wallis and Futuna', 217, 681, 6, 'wf', 0, 'Wallisian, Futunan', 'Wallis and Futuna', 'Wallis and Futuna', 'Wallis and Futuna', 'Wallis and Futuna', 'Wallis and Futuna', 'Australia and Oceania', 'WF', ''),
('Yemen', 218, 967, 6, 'ye', 0, 'Yemeni', 'Yemen', 'Yemen', 'Yemen', 'Yemen', 'Yemen', 'Asia', 'YE', ''),
('Yugoslavia', 219, 381, 6, 'yu', 0, 'Yugoslavs', 'Yugoslavia', 'Yugoslavia', 'Yugoslavia', 'Yugoslavia', 'Yugoslavia', 'Asia', 'YU', ''),
('Zambia', 220, 260, 6, 'zm', 0, 'Zambian', 'Zambia', 'Zambia', 'Zambia', 'Zambia', 'Zambia', 'Africa', 'ZM', ''),
('Zimbabwe', 221, 263, 6, 'zw', 0, 'Zimbabwean', 'Zimbabwe', 'Zimbabwe', 'Zimbabwe', 'Zimbabwe', 'Zimbabwe', 'Africa', 'ZW', ''),
('Australia', 222, 61, 6, 'au', 0, 'Australian', 'Australia', 'Australia', 'Australia', 'Australia', 'Australia', 'Australia and Oceania', 'AU', ''),
('USA', 223, 1, 6, 'us', 1, 'USA', 'USA', 'USA', 'USA', 'USA', 'USA', 'North America', 'US', ''),
('Palestine', 225, 970, 6, 'ps', 0, 'Palestinians', 'palestine', 'palestine', 'palestine', 'palestine', 'Palestine', 'Asia', 'PS', ''),
('Benin', 226, 229, 6, 'bj', 0, 'Beninese', 'Benin', 'Benin', 'Benin', 'Benin', 'Benin', 'Africa', 'BJ', ''),
('Saint Barthelemy', 227, 0, 6, 'bi', 0, 'Saint Barthelemy', 'Saint Barthelemy', 'Saint Barthelemy', 'Saint Barthelemy', 'Saint Barthelemy', 'Saint Barthelemy', 'North America', 'BL', ''),
('Aland Islands', 228, 0, 6, 'ax', 0, 'Aland Islands', 'Aland Islands', 'Aland Islands', 'Aland Islands', 'Aland Islands', 'Aland Islands', 'Europe', 'AX', ''),
('American Samoa', 229, 0, 6, 'as', 0, 'American Samoa', 'American Samoa', 'American Samoa', 'American Samoa', 'American Samoa', 'American Samoa', 'Australia and Oceania', 'AS', ''),
('Aruba', 230, 0, 6, 'aw', 0, 'Aruba', 'Aruba', 'Aruba', 'Aruba', 'Aruba', 'Aruba', 'North America', 'AW', ''),
('Guernsey', 231, 0, 6, 'gg', 0, 'Guernsey', 'Guernsey', 'Guernsey', 'Guernsey', 'Guernsey', 'Guernsey', 'Europe', 'GG', ''),
('Isle of Man', 232, 0, 6, 'im', 0, 'Isle of Man', 'Isle of Man', 'Isle of Man', 'Isle of Man', 'Isle of Man', 'Isle of Man', 'Europe', 'IM', ''),
('Jersey', 233, 0, 6, 'je', 0, 'Jersey', 'Jersey', 'Jersey', 'Jersey', 'Jersey', 'Jersey', 'Europe', 'JE', ''),
('Marshall Islands', 234, 0, 6, 'mh', 0, 'Marshall Islands', 'Marshall Islands', 'Marshall Islands', 'Marshall Islands', 'Marshall Islands', 'Marshall Islands', 'Australia and Oceania', 'MH', ''),
('Montenegro', 235, 0, 6, 'me', 0, 'Montenegro', 'Montenegro', 'Montenegro', 'Montenegro', 'Montenegro', 'Montenegro', 'Europe', 'ME', ''),
('Northern Mariana Islands', 236, 0, 6, 'mp', 0, 'Northern Mariana Islands', 'Northern Mariana Islands', 'Northern Mariana Islands', 'Northern Mariana Islands', 'Northern Mariana Islands', 'Northern Mariana Islands', 'Australia and Oceania', 'MP', ''),
('Palau', 237, 0, 6, 'pw', 0, 'Palau', 'Palau', 'Palau', 'Palau', 'Palau', 'Palau', 'Australia and Oceania', 'PW', ''),
('Western Sahara', 238, 0, 6, 'eh', 0, 'Western Sahara', 'Western Sahara', 'Western Sahara', 'Western Sahara', 'Western Sahara', 'Western Sahara', 'Africa', 'EH', ''),
('Saint Martin', 239, 0, 6, 'mf', 0, 'Saint Martin', 'Saint Martin', 'Saint Martin', 'Saint Martin', 'Saint Martin', 'Saint Martin', 'North America', 'MF', '');

-- --------------------------------------------------------

--
-- Table structure for table `sb_coupon`
--

CREATE TABLE `sb_coupon` (
  `coupon_id` int(11) NOT NULL,
  `coupon_code` varchar(255) NOT NULL DEFAULT '0',
  `coupon_discount` varchar(255) NOT NULL DEFAULT '0',
  `coupon_status` tinyint(4) NOT NULL DEFAULT '0',
  `coupon_created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sb_coupon`
--

INSERT INTO `sb_coupon` (`coupon_id`, `coupon_code`, `coupon_discount`, `coupon_status`, `coupon_created_on`) VALUES
(1, '5JHer', '40', 1, '2018-05-30 10:37:03'),
(2, '7JDer', '30', 1, '2018-08-30 18:15:54');

-- --------------------------------------------------------

--
-- Table structure for table `sb_inner_banner`
--

CREATE TABLE `sb_inner_banner` (
  `inner_banner_id` int(11) NOT NULL,
  `inner_banner_title` varchar(255) NOT NULL,
  `inner_banner_image` varchar(255) NOT NULL,
  `inner_banner_image2` varchar(255) NOT NULL,
  `inner_banner_image_path` text,
  `inner_banner_status` int(1) NOT NULL,
  `inner_banner_createdon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sb_inner_banner`
--

INSERT INTO `sb_inner_banner` (`inner_banner_id`, `inner_banner_title`, `inner_banner_image`, `inner_banner_image2`, `inner_banner_image_path`, `inner_banner_status`, `inner_banner_createdon`) VALUES
(1, 'ABOUT US', 'bg-img153778846434.jpg', 'img13153780180371.png', 'assets/uploads/inner_banner/', 1, '2018-09-07 11:02:36'),
(2, 'PRODUCT', 'bg-img153630019571.jpg', 'img13153778824529.png', 'assets/uploads/inner_banner/', 1, '2018-09-07 11:03:15'),
(3, 'CONTACT US', 'bg-img153630021048.jpg', 'img23153630021054.png', 'assets/uploads/inner_banner/', 1, '2018-09-07 11:03:30'),
(4, 'PRODUCTS', 'bg-img153788004670.jpg', 'img13153788001080.png', 'assets/uploads/inner_banner/', 1, '2018-09-07 11:04:01'),
(5, 'Cart', 'bg-img153630025595.jpg', 'img23153630025581.png', 'assets/uploads/inner_banner/', 1, '2018-09-07 11:04:15'),
(6, 'Checkout', 'bg-img153630026852.jpg', 'img23153630026839.png', 'assets/uploads/inner_banner/', 1, '2018-09-07 11:04:28'),
(7, 'Payment', 'bg-img153630028140.jpg', 'img23153630028140.png', 'assets/uploads/inner_banner/', 1, '2018-09-07 11:04:41');

-- --------------------------------------------------------

--
-- Table structure for table `sb_inquiry`
--

CREATE TABLE `sb_inquiry` (
  `inquiry_id` int(11) NOT NULL,
  `inquiry_name` varchar(255) NOT NULL,
  `inquiry_email` varchar(255) NOT NULL,
  `inquiry_phone` varchar(255) NOT NULL,
  `inquiry_subject` varchar(255) NOT NULL,
  `inquiry_website` varchar(255) NOT NULL,
  `inquiry_detail` longtext NOT NULL,
  `inquiry_image` varchar(20) NOT NULL,
  `inquiry_image_path` varchar(30) NOT NULL,
  `inquiry_status` int(10) NOT NULL DEFAULT '1',
  `inquiry_createdon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sb_inquiry`
--

INSERT INTO `sb_inquiry` (`inquiry_id`, `inquiry_name`, `inquiry_email`, `inquiry_phone`, `inquiry_subject`, `inquiry_website`, `inquiry_detail`, `inquiry_image`, `inquiry_image_path`, `inquiry_status`, `inquiry_createdon`) VALUES
(1, 'john', 'john@gmail.com', '', '', 'www.printing.com', 'message goes here !!!!!!!', '', '', 0, '2018-09-07 12:08:04'),
(2, 'steve', 'steve@gmail.com', '', 'subject goes here ....', '', 'message goes here !!!!!!!', '', '', 0, '2018-09-07 12:12:33'),
(3, 'john', 'john@gmail.com', '', 'subject', '', 'ssfsfsfsfs', '', '', 0, '2018-09-07 12:29:19'),
(4, 'john', 'john@gmail.com', '', 'subject', '', 'ssfsfsfsfs', '', '', 0, '2018-09-07 12:30:03'),
(5, 'john doe', 'john@gmail.com', '', 'subject ', '', 'testing ...!!!!!!!', '', '', 0, '2018-09-11 17:10:42'),
(6, 'john doe', 'john@gmail.com', '', 'subject ', '', 'testing ...!!!!!!!', '', '', 0, '2018-09-11 17:44:38'),
(7, 'dfgdfg', 'a@gmail.com', '', 'sdfnsdfsdf', '', 'hfghfghfg', '', '', 0, '2018-09-12 16:37:45'),
(8, 'test user', 'testuser0924@gmail.com', '', 'test', '', 'test', '', '', 0, '2018-09-17 12:31:36'),
(9, 'test user', 'testuser0924@gmail.com', '', '', 'test', 'ewr', '', '', 0, '2018-09-25 10:51:36'),
(10, 'Frank Demasi', 'fd_jenmira@yahoo.com', '', 'TESTING THE NEW WEB PAGE', '', 'I need Potato Chips and I need them NOW!! Can you help me??', '', '', 0, '2019-01-30 01:53:42'),
(11, 'pl', 'calprint@pacbell.net', '', 'test', '', 'test', '', '', 0, '2019-02-13 23:42:28'),
(12, 'Frank Demasi', 'fd_jenmira@yahoo.com', '', 'Testing Web Page \"Leave your message\"', '', 'XXX', '', '', 0, '2019-02-13 23:48:03'),
(13, 'john', 'john@gmail.com', '', 'subject ', '', 'message goes here ....', '', '', 1, '2019-02-22 03:41:39'),
(14, 'jonysd', 'john@gmail.com', '', 'subject', '', 'sdfsdfsdf', '', '', 1, '2019-02-22 03:44:03'),
(15, 'jonysd', 'john@gmail.com', '', 'subject', '', 'sdfsdfsdf', '', '', 1, '2019-02-22 03:46:36'),
(16, 'jonysd', 'john@gmail.com', '', 'subject', '', 'sdfsdfsdf', '', '', 1, '2019-02-22 03:47:19'),
(17, 'jonysd', 'john@gmail.com', '', 'subject', '', 'sdfsdfsdf', '', '', 1, '2019-02-22 03:48:12'),
(18, 'jonysd', 'john@gmail.com', '', 'subject', '', 'sdfsdfsdf', '', '', 1, '2019-02-22 03:48:42'),
(19, 'jonysd', 'john@gmail.com', '', 'subject', '', 'sdfsdfsdf', '', '', 1, '2019-02-22 03:48:55'),
(20, 'jonysd sdfsdf', 'johnsu6361@gmail.com', '', 'subject', '', 'fsfsdfsdf', '', '', 1, '2019-02-22 03:49:22'),
(21, 'jonysd', 'john@gmail.com', '', 'fghfgh', '', 'sdfsdfsdfsdf', '', '', 1, '2019-02-22 03:52:36'),
(22, 'jonysd sdfsdf', 'john@gmail.com', '', 'dfgdfgdf', '', 'dfgdfgdfgdfg', '', '', 1, '2019-02-22 03:53:32'),
(23, 'jonysd sdfsdf', 'john@gmail.com', '', 'dfgdfgdf', '', 'dfgdfgdfgdfg', '', '', 1, '2019-02-22 03:55:48'),
(24, 'jonysd sdfsdf', 'johnsu6361@gmail.com', '', 'subject', '', 'gdgdfgdf', '', '', 1, '2019-02-22 04:07:42'),
(25, 'jonysd sdfsdf', 'johnsu6361@gmail.com', '', 'subject', '', 'dasdasdasd', '', '', 1, '2019-02-22 04:42:08'),
(26, 'mojo', 'joo@email.com', '', 'hello there', '', 'testing 123', '', '', 1, '2019-02-27 12:19:13'),
(27, 'tech', 'tech.digi.2018@gmail.com', '', 'hey ', '', 'there', '', '', 1, '2019-02-27 12:20:15'),
(28, 'asd', 'asd@email.com', '', 'asdasdas', '', 'dasdasdasdasd', '', '', 1, '2019-02-27 12:28:39'),
(29, 'aasd', 'ad@email.com', '', 'test', '', 'test', '', '', 1, '2019-02-27 13:06:39'),
(30, 'asd', 'joe@email.com', '', 'test', '', 'message', '', '', 1, '2019-02-27 13:07:21'),
(31, 'mojo', 'asd@email.com', '', 'subject here', '', 'test', '', '', 1, '2019-03-04 21:09:55'),
(32, 'Julie Yeager', 'callcentersnow.jyeager@gmail.com', '', 'Have you considered a call center for your business?', '', 'Hello,\r\n\r\nHow many phone calls does your business receive a day? \r\n\r\nDo you take calls for appointment scheduling? What about customer service? How about reservations, sales, etc?\r\n\r\nHaving a professional team of phone-based professionals in place, specifically trained to handle your business\'s calls, can improve your efficiency and increase profits. It’s worth looking into! \r\n\r\nI work for Call Centers Now, a U.S. based call center business that can handle all of your calls, including receptionist duties, sales, and highly advanced technical support. Our team are some of the best in the business and we are 100% based in the U.S. \r\n\r\nWould you like more info on our available services?\r\n\r\nOr, simply fill out form to request a quote.\r\nhttp://callcentersnow.com/ijy/ - Call Center Service quote\r\nhttp://callcentersnow.com/ojy/ - Telemarketing Service quote\r\n\r\nBest regards,\r\nJulie Yeager', '', '', 1, '2019-03-21 20:09:26'),
(33, 'Frank Demasi', 'snacksaplenty@yahoo.com', '', 'TEST MESSAGE', '', 'TEST MESSAGE', '', '', 0, '2019-03-22 02:00:35');

-- --------------------------------------------------------

--
-- Table structure for table `sb_logo`
--

CREATE TABLE `sb_logo` (
  `logo_id` int(10) NOT NULL,
  `logo_name` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `logo_favicon` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `logo_image` varchar(255) COLLATE utf8_bin NOT NULL,
  `logo_footer_image` varchar(255) COLLATE utf8_bin NOT NULL,
  `logo_image_path` varchar(255) COLLATE utf8_bin NOT NULL,
  `logo_image_thumb` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `logo_status` tinyint(4) NOT NULL DEFAULT '1',
  `ondate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `sb_logo`
--

INSERT INTO `sb_logo` (`logo_id`, `logo_name`, `logo_favicon`, `logo_image`, `logo_footer_image`, `logo_image_path`, `logo_image_thumb`, `logo_status`, `ondate`) VALUES
(1, 'Logo', 'logo153629918750.png', 'logo153780139513.png', '', 'assets/uploads/logo/', 'logo153780139513.png', 1, '2018-09-24 06:03:15');

-- --------------------------------------------------------

--
-- Table structure for table `sb_newsletter`
--

CREATE TABLE `sb_newsletter` (
  `newsletter_id` int(11) NOT NULL,
  `newsletter_email` varchar(100) NOT NULL,
  `newsletter_status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0 = Inactive, 1 = Active',
  `newsletter_createdon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Newsletter';

--
-- Dumping data for table `sb_newsletter`
--

INSERT INTO `sb_newsletter` (`newsletter_id`, `newsletter_email`, `newsletter_status`, `newsletter_createdon`) VALUES
(1, 'john@gmail.com', 1, '2018-09-06 13:24:06'),
(2, 'testemail@gmail.com', 1, '2018-09-24 06:50:23'),
(3, 'abc@gmail.com', 1, '2018-09-25 04:06:08'),
(4, 'persedia2022@gmail.com', 1, '2019-03-27 21:38:35'),
(5, 'persedia2024@gmail.com', 1, '2019-04-11 11:22:30');

-- --------------------------------------------------------

--
-- Table structure for table `sb_order`
--

CREATE TABLE `sb_order` (
  `order_id` int(10) NOT NULL,
  `order_user_id` int(10) NOT NULL DEFAULT '0',
  `order_firstname` varchar(50) DEFAULT NULL,
  `order_lastname` varchar(50) DEFAULT NULL,
  `order_phone` varchar(50) DEFAULT NULL,
  `order_email` varchar(50) DEFAULT NULL,
  `order_country` int(10) DEFAULT NULL,
  `order_city` varchar(50) DEFAULT NULL,
  `order_zip` int(10) DEFAULT NULL,
  `order_discounted_price` varchar(50) DEFAULT NULL,
  `order_state` varchar(100) DEFAULT NULL,
  `order_address1` varchar(100) DEFAULT NULL,
  `order_fax` varchar(50) DEFAULT NULL,
  `order_mobile` varchar(50) DEFAULT NULL,
  `order_address2` varchar(100) DEFAULT NULL,
  `order_company` varchar(100) DEFAULT NULL,
  `order_status` int(10) NOT NULL DEFAULT '0' COMMENT '0=default,1=approve,2=declined,3=error',
  `order_status_message` varchar(50) NOT NULL DEFAULT '0',
  `order_transaction_id` bigint(50) NOT NULL DEFAULT '0',
  `order_transaction_message` varchar(50) NOT NULL DEFAULT '0',
  `order_createdon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_type` int(11) NOT NULL DEFAULT '0' COMMENT '1=fund,2=mini',
  `order_fundraising_id` int(11) NOT NULL DEFAULT '0',
  `order_ministore_id` int(11) NOT NULL DEFAULT '0',
  `order_slug` varchar(50) NOT NULL DEFAULT '0',
  `order_order_remarks` varchar(50) DEFAULT NULL,
  `order_payment_status` varchar(50) NOT NULL DEFAULT '0',
  `order_authorize_responcs_code` varchar(50) DEFAULT NULL,
  `order_authorize_responcs_reason_code` varchar(50) DEFAULT NULL,
  `order_authorize_responcs_reason_text` varchar(50) DEFAULT NULL,
  `order_authorize_avs_code` varchar(50) DEFAULT NULL,
  `order_authorize_auth_code` varchar(50) DEFAULT NULL,
  `order_authorize_trans_id` varchar(50) DEFAULT NULL,
  `order_authorize_card_type` varchar(50) DEFAULT NULL,
  `order_authorize_account_number` varchar(50) DEFAULT NULL,
  `order_authorize_cvv2_resp_code` varchar(50) DEFAULT NULL,
  `order_authorize_cavv_response` varchar(50) DEFAULT NULL,
  `order_authorize_test_request` varchar(50) DEFAULT NULL,
  `order_authorize_ship_to_phone` varchar(50) DEFAULT NULL,
  `order_shipment_price` varchar(50) DEFAULT NULL,
  `order_payment_post` text,
  `order_response` text,
  `order_is_member` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sb_order_item`
--

CREATE TABLE `sb_order_item` (
  `order_item_id` int(10) NOT NULL,
  `order_item_order_id` int(10) NOT NULL,
  `order_item_product_id` bigint(20) NOT NULL,
  `order_item_price` varchar(50) NOT NULL,
  `order_item_discount_price` varchar(50) NOT NULL,
  `order_item_subtotal` varchar(50) NOT NULL,
  `order_item_qty` int(10) NOT NULL,
  `order_item_size` varchar(10) DEFAULT NULL,
  `order_item_option` text,
  `order_item_type` int(11) DEFAULT '0' COMMENT '1=script,2=normal',
  `order_item_createdon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_item_status` int(10) NOT NULL DEFAULT '1',
  `order_final_grand_total` varchar(50) DEFAULT NULL,
  `order_currency_type` int(10) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sb_payment`
--

CREATE TABLE `sb_payment` (
  `payment_id` int(11) NOT NULL,
  `payment_email` varchar(100) NOT NULL DEFAULT '0',
  `payment_price` float NOT NULL DEFAULT '0',
  `payment_link` varchar(255) NOT NULL DEFAULT '0',
  `payment_paid_status` varchar(100) NOT NULL DEFAULT '0',
  `payment_status` tinyint(4) NOT NULL DEFAULT '0',
  `payment_created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sb_payment`
--

INSERT INTO `sb_payment` (`payment_id`, `payment_email`, `payment_price`, `payment_link`, `payment_paid_status`, `payment_status`, `payment_created_on`) VALUES
(16, 'john@gmail.com', 25, 'http://demo-designproficient.com/california_printing_dev/payment/16', 'Pending', 1, '2019-01-11 21:12:48'),
(17, 'johnsu6361@gmail.com', 50, 'http://demo-designproficient.com/california_printing_dev/payment/17', 'Pending', 1, '2019-01-11 21:32:32'),
(18, 'vicky', 45, 'http://demo-designproficient.com/california_printing_dev/payment/18', 'Pending', 1, '2019-01-11 21:35:14'),
(19, 'john@gmail.com', 87, 'http://demo-designproficient.com/california_printing_dev/payment/19', 'Pending', 1, '2019-01-11 21:39:15'),
(20, 'john123@gmail.com', 60, 'http://demo-designproficient.com/california_printing_dev/payment/20', 'Pending', 1, '2019-01-11 22:57:14'),
(21, 'alliewill19@gmail.com', 20, 'http://demo-designproficient.com/california_printing_dev/payment/21', 'Pending', 1, '2019-01-14 06:56:09'),
(22, 'mike.murphy@octalogo.com', 120, 'http://demo-designproficient.com/california_printing_dev/payment/22', 'No Payment', 1, '2019-01-14 07:48:54'),
(23, 'testuser0924@gmail.com', 120, 'http://demo-designproficient.com/california_printing_dev/payment/23', 'No Payment', 1, '2019-01-14 08:36:17'),
(24, 'testuser0924@gmail.com', 120, 'http://demo-designproficient.com/california_printing_dev/payment/24', 'Pending', 1, '2019-01-14 08:36:17'),
(25, 'john@gmail.com', 80, 'http://demo-designproficient.com/california_printing_dev/payment/25', 'Pending', 1, '2019-01-14 16:25:38'),
(26, 'alieewill@gmail.com', 20, 'http://demo-designproficient.com/california_printing_dev/payment/26', 'No Payment', 1, '2019-01-15 07:27:18'),
(27, 'john@gmail.com', 25, 'http://demo-designproficient.com/california_printing_dev/payment/27', 'No Payment', 1, '2019-01-22 17:40:02'),
(28, 'johnallen0106@gmail.com', 123, 'http://demo-designproficient.com/california_printing_dev/payment/28', 'Pending', 1, '2019-01-23 07:40:45');

-- --------------------------------------------------------

--
-- Table structure for table `sb_product`
--

CREATE TABLE `sb_product` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_category_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `product_name` varchar(255) DEFAULT NULL,
  `product_slug` varchar(255) DEFAULT NULL,
  `product_price` float UNSIGNED DEFAULT '0',
  `product_discount` float UNSIGNED DEFAULT '0',
  `product_sku` varchar(255) DEFAULT '0',
  `product_detail` text,
  `product_type` varchar(255) DEFAULT NULL,
  `product_short_desc` text,
  `product_long_desc` text,
  `product_additional_info` text,
  `product_image` varchar(150) DEFAULT NULL,
  `product_cover_image` varchar(150) DEFAULT NULL,
  `product_image_path` varchar(150) DEFAULT NULL,
  `product_qty` int(10) UNSIGNED DEFAULT '0',
  `product_status` tinyint(1) DEFAULT '1',
  `product_issale` tinyint(1) DEFAULT '1',
  `product_createdon` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sb_product`
--

INSERT INTO `sb_product` (`product_id`, `product_category_id`, `product_name`, `product_slug`, `product_price`, `product_discount`, `product_sku`, `product_detail`, `product_type`, `product_short_desc`, `product_long_desc`, `product_additional_info`, `product_image`, `product_cover_image`, `product_image_path`, `product_qty`, `product_status`, `product_issale`, `product_createdon`) VALUES
(1, 1, 'Business Cards', 'Business-Cards', 28, 0, '8124-ESO', NULL, NULL, NULL, NULL, NULL, 'aa153786324880.png', NULL, 'assets/uploads/product/', 0, 1, 1, '2018-09-06 12:36:26'),
(2, 2, 'Appointment cards', 'Appointment-cards', 28, 0, '8124-ESO', NULL, 'featured', NULL, NULL, NULL, 'riopptard-1154776571035.jpg', NULL, 'assets/uploads/product/', 0, 1, 1, '2018-09-06 12:37:58'),
(3, 3, 'Greeting cards', 'Greeting-cards', 28, 0, '8124-ESO', NULL, NULL, NULL, NULL, NULL, 'olidaycard1154819685548.jpg', NULL, 'assets/uploads/product/', 0, 1, 1, '2018-09-06 12:38:30'),
(4, 4, 'Holiday cards', 'Holiday-cards', 28, 0, '8124-ESO', NULL, NULL, NULL, NULL, NULL, 'img6153630235611.png', NULL, 'assets/uploads/product/', 0, 2, 1, '2018-09-06 12:39:16'),
(5, 5, 'Post cards', 'Post-cards', 28, 0, '8124-ESO', NULL, 'featured', NULL, NULL, NULL, '-ealstatearketinglyer1-up154785097025.jpg', NULL, 'assets/uploads/product/', 0, 1, 1, '2018-09-06 12:39:35'),
(6, 5, 'Post card + Mailing service', 'Post-card-Mailing-service', 28, 0, '8124-ESO', NULL, 'featured', NULL, NULL, NULL, 'img9153630240452.png', NULL, 'assets/uploads/product/', 0, 2, 1, '2018-09-06 12:40:04'),
(7, 7, 'Banners', 'Banners', 28, 0, '8124-ESO', NULL, 'featured', NULL, NULL, NULL, 'banner3154872162858.jpg', NULL, 'assets/uploads/product/', 0, 1, 1, '2018-09-06 12:40:26'),
(8, 8, 'Booklets', 'Booklets', 28, 0, '8124-ESO', NULL, 'featured', NULL, NULL, NULL, 'ooklet1154777099281.png', NULL, 'assets/uploads/product/', 0, 1, 1, '2018-09-06 12:40:45'),
(9, 9, 'Brochures', 'Brochures', 28, 0, '8124-ESO', NULL, NULL, NULL, NULL, NULL, 'rochure1154784654963.png', NULL, 'assets/uploads/product/', 0, 1, 1, '2018-09-06 12:41:10'),
(10, 10, 'Brochures + Mailing service', 'Brochures-Mailing-service', 28, 0, '8124-ESO', NULL, 'featured', NULL, NULL, NULL, 'img8153673840750.png', NULL, 'assets/uploads/product/', 0, 2, 1, '2018-09-11 13:46:47'),
(11, 11, 'Calendars', 'Calendars', 29, 0, '8124-ESO', NULL, 'featured', NULL, NULL, NULL, 'alendar154784650929.jpg', NULL, 'assets/uploads/product/', 0, 1, 1, '2018-09-11 16:51:13'),
(12, 12, 'Magnet Signs', 'Magnet-Signs', 25, 0, '8124-ESO', NULL, 'featured', NULL, NULL, NULL, '30x18indowign154785082296.jpg', NULL, 'assets/uploads/product/', 0, 1, 1, '2018-09-11 16:51:38'),
(13, 13, 'Envelopes', 'Envelopes', 23, 0, '8124-ESO', NULL, 'featured', NULL, NULL, NULL, 'envelopeimage154785049785.jpg', NULL, 'assets/uploads/product/', 0, 1, 1, '2018-09-11 16:52:21'),
(14, 14, 'Flyers', 'Flyers', 22, 0, '8124-ESO', NULL, 'featured', NULL, NULL, NULL, 'ewsletter1154785112849.png', NULL, 'assets/uploads/product/', 0, 1, 1, '2018-09-11 16:52:42'),
(15, 15, 'Hang Tag', 'Hang-Tag', 26, 0, '8124-ESO', NULL, 'featured', NULL, NULL, NULL, 'angag1mod154776924059.jpg', NULL, 'assets/uploads/product/', 0, 1, 1, '2018-09-11 16:53:28'),
(16, 28, 'test pro', 'test-pro', 120, 0, '11', NULL, 'featured', NULL, NULL, NULL, 'images1153716791079.png', NULL, 'assets/uploads/product/', 0, 2, 1, '2018-09-16 13:05:10'),
(17, 16, 'Invitation', 'Invitation', 28, 0, '8124-ESO', NULL, 'featured', NULL, NULL, NULL, 'nvitationcard154811569427.jpg', NULL, 'assets/uploads/product/', 0, 1, 1, '2018-09-18 09:03:30'),
(18, 17, 'Labels', 'Labels', 28, 0, '8124-ESO', NULL, 'featured', NULL, NULL, NULL, 'abel154784673529.jpg', NULL, 'assets/uploads/product/', 0, 1, 1, '2018-09-18 09:04:29'),
(19, 18, 'Letterhead', 'Letterhead', 28, 0, '8124-ESO', NULL, NULL, NULL, NULL, NULL, 'etterheadforebage-1154776577255.jpg', NULL, 'assets/uploads/product/', 0, 1, 1, '2018-09-18 09:05:25'),
(20, 19, 'Menus', 'Menus', 28, 0, '8124-ESO', NULL, NULL, NULL, NULL, NULL, 'enuexamplereplace154872082855.jpg', NULL, 'assets/uploads/product/', 0, 1, 1, '2018-09-18 09:07:40'),
(21, 20, 'Newsletters', 'Newsletters', 28, 0, '8124-ESO', NULL, NULL, NULL, NULL, NULL, 'newsletter154528461228.jpg', NULL, 'assets/uploads/product/', 0, 1, 1, '2018-09-18 09:08:19'),
(22, 21, 'Newsletter + Mailing service', 'Newsletter-Mailing-service', 28, 0, '8124-ESO', NULL, NULL, NULL, NULL, NULL, 'img9153729428081.png', NULL, 'assets/uploads/product/', 0, 1, 1, '2018-09-18 09:11:20'),
(23, 22, 'Note Pad', 'Note-Pad', 28, 0, '8124-ESO', NULL, NULL, NULL, NULL, NULL, 'notepad154528475640.jpg', NULL, 'assets/uploads/product/', 0, 1, 1, '2018-09-18 09:12:30'),
(24, 23, 'NCR Forms', 'NCR-Forms', 28, 0, '8124-ESO', NULL, NULL, NULL, NULL, NULL, 'orm154784679396.jpg', NULL, 'assets/uploads/product/', 0, 1, 1, '2018-09-18 09:13:22'),
(25, 24, 'Presentation Folders', 'Presentation-Folders', 28, 0, '8124-ESO', NULL, NULL, NULL, NULL, NULL, 'older1154818936623.jpg', NULL, 'assets/uploads/product/', 0, 1, 1, '2018-09-18 09:14:02'),
(26, 25, 'Poster', 'Poster', 28, 0, '8124-ESO', NULL, NULL, NULL, NULL, NULL, 'posterexamplereplace2154872079658.jpg', NULL, 'assets/uploads/product/', 0, 1, 1, '2018-09-18 09:14:24'),
(27, 26, 'Sticker', 'Sticker', 28, 0, '8124-ESO', NULL, NULL, NULL, NULL, NULL, 'img8153729449547.png', NULL, 'assets/uploads/product/', 0, 1, 1, '2018-09-18 09:14:55'),
(28, 27, 'Yearbooks', 'Yearbooks', 28, 0, '8124-ESO', NULL, NULL, NULL, NULL, NULL, 'yearbook154528453812.jpg', NULL, 'assets/uploads/product/', 0, 1, 1, '2018-09-18 09:15:26'),
(29, 18, 'Product name 28', 'Product-name-28', 28, 0, '8124-ESO', NULL, 'featured', NULL, NULL, NULL, 'img10153729456188.png', NULL, 'assets/uploads/product/', 0, 2, 1, '2018-09-18 09:16:01'),
(30, 19, 'Product name 29', 'Product-name-29', 28, 0, '8124-ESO', NULL, NULL, NULL, NULL, NULL, 'img9153729458991.png', NULL, 'assets/uploads/product/', 0, 2, 1, '2018-09-18 09:16:29'),
(31, 20, 'Product name 30', 'Product-name-30', 28, 0, '8124-ESO', NULL, NULL, NULL, NULL, NULL, 'img8153729461979.png', NULL, 'assets/uploads/product/', 0, 2, 1, '2018-09-18 09:16:59'),
(32, 22, 'Product name 31', 'Product-name-31', 28, 0, '8124-ESO', NULL, NULL, NULL, NULL, NULL, 'img6153729465557.png', NULL, 'assets/uploads/product/', 0, 2, 1, '2018-09-18 09:17:35'),
(33, 23, 'Product name 32', 'Product-name-32', 28, 0, '8124-ESO', NULL, NULL, NULL, NULL, NULL, 'img8153729469268.png', NULL, 'assets/uploads/product/', 0, 2, 1, '2018-09-18 09:18:12'),
(34, 24, 'Product name 33', 'Product-name-33', 28, 0, '8124-ESO', NULL, NULL, NULL, NULL, NULL, 'img8153729471840.png', NULL, 'assets/uploads/product/', 0, 2, 1, '2018-09-18 09:18:38'),
(35, 25, 'Product name 34', 'Product-name-34', 28, 0, '8124-ESO', NULL, NULL, NULL, NULL, NULL, 'img9153729475458.png', NULL, 'assets/uploads/product/', 0, 2, 1, '2018-09-18 09:19:14'),
(36, 29, 'test product', 'test-product-', 0, 0, '0', NULL, 'featured', NULL, NULL, NULL, 'img8153780325558.png', NULL, 'assets/uploads/product/', 0, 2, 1, '2018-09-24 06:34:15'),
(37, 1, 'test pro', 'test-pro', 0, 0, '0', NULL, 'featured', NULL, NULL, NULL, 'images1153785298883.png', NULL, 'assets/uploads/product/', 0, 2, 1, '2018-09-24 20:23:08');

-- --------------------------------------------------------

--
-- Table structure for table `sb_product_binding`
--

CREATE TABLE `sb_product_binding` (
  `product_binding_id` int(11) NOT NULL,
  `product_binding_cat_id` int(11) NOT NULL DEFAULT '0',
  `product_binding_product_id` int(11) NOT NULL DEFAULT '0',
  `product_binding_name` varchar(100) NOT NULL DEFAULT '0',
  `product_binding_status` tinyint(4) NOT NULL DEFAULT '0',
  `product_binding_created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sb_product_binding`
--

INSERT INTO `sb_product_binding` (`product_binding_id`, `product_binding_cat_id`, `product_binding_product_id`, `product_binding_name`, `product_binding_status`, `product_binding_created_on`) VALUES
(1, 8, 0, 'Coil Binding', 1, '2018-11-08 18:45:30'),
(2, 8, 0, 'Wire Binding', 1, '2018-11-08 18:45:46'),
(3, 8, 0, 'Saddle Stitching', 1, '2018-11-08 18:46:27'),
(4, 27, 0, 'Coil Binding', 1, '2018-11-08 21:19:28'),
(5, 27, 0, 'Wire Binding', 1, '2018-11-08 21:19:48');

-- --------------------------------------------------------

--
-- Table structure for table `sb_product_color`
--

CREATE TABLE `sb_product_color` (
  `product_color_id` int(11) NOT NULL,
  `product_color_category_id` int(11) NOT NULL DEFAULT '0',
  `product_color_product_id` int(11) NOT NULL DEFAULT '0',
  `product_color_name` varchar(255) NOT NULL DEFAULT '0',
  `product_color_status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sb_product_color`
--

INSERT INTO `sb_product_color` (`product_color_id`, `product_color_category_id`, `product_color_product_id`, `product_color_name`, `product_color_status`) VALUES
(1, 1, 1, 'Black ink', 1),
(4, 2, 0, 'Black ink', 1),
(5, 3, 0, '4-color', 2),
(6, 13, 0, 'Black ink', 1),
(7, 26, 0, 'Black ink', 1),
(8, 18, 0, 'Black ink', 1),
(9, 19, 0, 'Black ink', 1),
(10, 20, 0, '4-color', 1),
(13, 2, 0, 'Color', 2),
(14, 2, 0, 'Color', 2),
(15, 3, 0, 'Color', 2),
(16, 4, 0, 'Color', 1),
(17, 5, 0, '4-color', 1),
(18, 7, 0, '4-color', 1),
(19, 9, 0, '4-color', 1),
(20, 11, 0, '4-color', 1),
(21, 12, 0, '4-color', 1),
(22, 13, 0, '1 PMS', 1),
(23, 14, 0, '4-color', 1),
(24, 15, 0, '4-color', 1),
(26, 16, 0, '4-color', 1),
(27, 18, 0, '1 PMS', 1),
(28, 19, 0, '4-color', 1),
(29, 20, 0, 'Color', 2),
(30, 22, 0, '4-color', 1),
(31, 23, 0, 'Black ink', 1),
(32, 24, 0, '4-color', 1),
(33, 25, 0, '4-color', 1),
(34, 26, 0, 'Color', 1),
(35, 27, 0, '4-color', 1),
(36, 1, 0, '1 PMS', 1),
(37, 1, 0, '1 PMS + Black', 1),
(38, 1, 0, '2 PMS', 1),
(39, 1, 0, '2 PMS + Black', 1),
(40, 1, 0, '4-color', 1),
(41, 2, 0, '4-color', 1),
(42, 3, 0, '4-color', 1),
(43, 8, 0, '4-color', 1),
(44, 13, 0, '1 PMS + Black', 1),
(45, 13, 0, '2 PMS', 1),
(46, 13, 0, '2 PMS + Black', 1),
(47, 13, 0, '4-color', 1),
(48, 17, 0, 'Black ink', 1),
(49, 17, 0, '1 PMS', 1),
(50, 17, 0, '1 PMS + Black', 1),
(51, 17, 0, '2 PMS', 1),
(52, 17, 0, '2 PMS + Black', 1),
(53, 17, 0, '4-color', 1),
(54, 18, 0, '1 PMS + Black', 1),
(55, 18, 0, '2 PMS', 1),
(56, 18, 0, '2 PMS + Black', 1),
(57, 18, 0, '4-color', 1),
(58, 23, 0, '4-color', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sb_product_cover_stock`
--

CREATE TABLE `sb_product_cover_stock` (
  `product_cover_stock_id` int(11) NOT NULL,
  `product_cover_stock_category_id` int(11) NOT NULL DEFAULT '0',
  `product_cover_stock_product_id` int(11) NOT NULL DEFAULT '0',
  `product_cover_stock_name` varchar(255) NOT NULL DEFAULT '0',
  `product_cover_stock_status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sb_product_cover_stock`
--

INSERT INTO `sb_product_cover_stock` (`product_cover_stock_id`, `product_cover_stock_category_id`, `product_cover_stock_product_id`, `product_cover_stock_name`, `product_cover_stock_status`) VALUES
(1, 1, 1, '100# uncoated cover', 1),
(2, 1, 1, '100# gloss cover', 1),
(3, 2, 0, '80# uncoated cover', 1),
(4, 2, 0, '100# uncoated cover', 1),
(5, 3, 0, '100# uncoated cover', 1),
(6, 3, 0, '100# gloss cover', 1),
(7, 4, 0, 'Gloss Cover stock', 1),
(8, 4, 0, 'Uncoated Cover stock', 1),
(9, 5, 0, '16 pt C2S', 1),
(10, 5, 0, '14 pt C2S', 1),
(11, 5, 0, '100# gloss', 1),
(12, 8, 0, '60/70# offset', 1),
(13, 8, 0, '100# gloss text', 1),
(14, 8, 0, 'Saddle Stitch Staples', 1),
(15, 8, 0, '80# cover', 1),
(16, 8, 0, '100# gloss cover', 1),
(17, 9, 0, '70# offset', 1),
(18, 9, 0, '100# gloss text', 1),
(19, 9, 0, '100# gloss cover', 1),
(21, 11, 0, '100# gloss text', 1),
(23, 14, 0, '70# offset', 1),
(24, 14, 0, '100# gloss text', 1),
(25, 15, 0, '100# gloss cover', 1),
(27, 16, 0, '100# gloss text', 1),
(28, 16, 0, '100# gloss cover', 1),
(29, 26, 0, 'Glossy Label stock', 1),
(30, 26, 0, 'Uncoated Label Stock', 1),
(33, 20, 0, '70# Offset', 1),
(34, 22, 0, '20# bond', 1),
(35, 25, 0, 'Glossy Cover Stock', 1),
(37, 2, 0, '110# index', 1),
(38, 2, 0, 'Other', 1),
(39, 3, 0, 'Other', 1),
(40, 14, 0, '100# gloss cover', 1),
(41, 8, 0, '100# gloss cover with UV coating', 1),
(42, 8, 0, 'Self', 1),
(44, 13, 0, '24# white', 1),
(45, 17, 0, 'vinyl', 1),
(46, 17, 0, 'Weatherproof', 1),
(47, 18, 0, '60/70# Offset', 1),
(48, 19, 0, '70# Offset', 1),
(49, 19, 0, '100# gloss text', 1),
(50, 19, 0, '100# gloss cover', 1),
(51, 19, 0, 'Other', 1),
(52, 20, 0, '100# gloss text', 1),
(53, 22, 0, '60/70# Offset', 1),
(54, 23, 0, '2-part', 1),
(55, 23, 0, '3-part', 1),
(56, 24, 0, '14 pt C2S', 1),
(57, 24, 0, '16 pt C2S', 1),
(58, 25, 0, 'Photo paper', 1),
(59, 27, 0, '100# gloss text', 1),
(60, 27, 0, '100# gloss cover', 1),
(61, 27, 0, '100# gloss cover with UV coating', 1),
(62, 12, 0, 'Magnetic Paper', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sb_product_drilling`
--

CREATE TABLE `sb_product_drilling` (
  `product_drilling_id` int(11) NOT NULL,
  `product_drilling_cat_id` int(11) NOT NULL DEFAULT '0',
  `product_drilling_product_id` int(11) NOT NULL DEFAULT '0',
  `product_drilling_name` varchar(100) NOT NULL DEFAULT '0',
  `product_drilling_status` tinyint(4) NOT NULL DEFAULT '0',
  `product_drilling_created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sb_product_drilling`
--

INSERT INTO `sb_product_drilling` (`product_drilling_id`, `product_drilling_cat_id`, `product_drilling_product_id`, `product_drilling_name`, `product_drilling_status`, `product_drilling_created_on`) VALUES
(1, 11, 0, 'None', 1, '2018-11-08 19:03:29'),
(2, 11, 0, 'Single Hole', 1, '2018-11-08 19:03:50');

-- --------------------------------------------------------

--
-- Table structure for table `sb_product_folding`
--

CREATE TABLE `sb_product_folding` (
  `product_folding_id` int(11) NOT NULL,
  `product_folding_cat_id` int(11) NOT NULL DEFAULT '0',
  `product_folding_product_id` int(11) NOT NULL DEFAULT '0',
  `product_folding_name` varchar(255) NOT NULL DEFAULT '0',
  `product_folding_status` tinyint(4) NOT NULL DEFAULT '0',
  `product_folding_created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sb_product_folding`
--

INSERT INTO `sb_product_folding` (`product_folding_id`, `product_folding_cat_id`, `product_folding_product_id`, `product_folding_name`, `product_folding_status`, `product_folding_created_on`) VALUES
(1, 9, 0, 'Half Fold', 1, '2018-11-08 17:05:59'),
(2, 9, 0, 'Trifold', 1, '2018-11-08 17:06:13'),
(3, 9, 0, 'Z Fold', 1, '2018-11-08 17:06:37'),
(4, 9, 0, 'Double Parellel Fold', 1, '2018-11-08 17:07:06'),
(5, 19, 0, 'None', 1, '2018-11-08 19:53:05'),
(6, 19, 0, 'Half Fold', 1, '2018-11-08 19:53:26'),
(7, 19, 0, 'Trifold', 1, '2018-11-08 19:53:36'),
(8, 19, 0, 'Z Fold', 1, '2018-11-08 19:53:48'),
(9, 19, 0, 'Z Fold', 1, '2018-11-08 19:54:05'),
(10, 19, 0, 'Double Parellel Fold', 1, '2018-11-08 19:54:20'),
(11, 20, 0, 'Half Fold', 1, '2018-11-08 20:04:31'),
(12, 20, 0, 'Trifold', 1, '2018-11-08 20:04:39'),
(13, 20, 0, 'Z Fold', 1, '2018-11-08 20:04:53'),
(14, 20, 0, 'Double Parellel Fold', 1, '2018-11-08 20:05:10');

-- --------------------------------------------------------

--
-- Table structure for table `sb_product_hole_position`
--

CREATE TABLE `sb_product_hole_position` (
  `product_hole_position_id` int(11) NOT NULL,
  `product_hole_position_cat_id` int(11) NOT NULL DEFAULT '0',
  `product_hole_position_product_id` int(11) NOT NULL DEFAULT '0',
  `product_hole_position_name` varchar(50) NOT NULL DEFAULT '0',
  `product_hole_position_status` tinyint(4) NOT NULL DEFAULT '0',
  `product_hole_position_created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sb_product_hole_position`
--

INSERT INTO `sb_product_hole_position` (`product_hole_position_id`, `product_hole_position_cat_id`, `product_hole_position_product_id`, `product_hole_position_name`, `product_hole_position_status`, `product_hole_position_created_on`) VALUES
(1, 15, 0, 'Top Left', 1, '2018-11-08 19:28:54'),
(2, 15, 0, 'Top Center', 1, '2018-11-08 19:29:09'),
(3, 15, 0, 'Top Right', 1, '2018-11-08 19:29:24');

-- --------------------------------------------------------

--
-- Table structure for table `sb_product_image`
--

CREATE TABLE `sb_product_image` (
  `pi_id` int(10) NOT NULL,
  `pi_product_id` int(10) NOT NULL,
  `pi_image` varchar(50) NOT NULL,
  `pi_image_thumb` varchar(50) NOT NULL,
  `pi_image_path` tinytext NOT NULL,
  `pi_createdon` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `pi_is_featured` tinyint(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sb_product_inquiry`
--

CREATE TABLE `sb_product_inquiry` (
  `product_inquiry_id` int(11) NOT NULL,
  `product_inquiry_productid` int(11) NOT NULL DEFAULT '0',
  `product_inquiry_name` varchar(255) DEFAULT NULL,
  `product_inquiry_email` varchar(255) DEFAULT NULL,
  `product_inquiry_phone` varchar(255) DEFAULT NULL,
  `product_inquiry_msg` text NOT NULL,
  `product_inquiry_size` varchar(255) DEFAULT NULL,
  `product_inquiry_color` varchar(255) DEFAULT NULL,
  `product_inquiry_sided` varchar(255) DEFAULT NULL,
  `product_inquiry_coverstock` varchar(255) DEFAULT NULL,
  `product_inquiry_paperstock` varchar(255) DEFAULT NULL,
  `product_inquiry_folding` varchar(255) NOT NULL,
  `product_inquiry_material` varchar(255) NOT NULL,
  `product_inquiry_binding` varchar(255) NOT NULL,
  `product_inquiry_drilling` varchar(255) NOT NULL,
  `product_inquiry_hole` varchar(255) NOT NULL,
  `product_inquiry_sheets_pad` varchar(255) NOT NULL,
  `product_inquiry_cutomsize` varchar(255) DEFAULT NULL,
  `product_inquiry_totalpages` varchar(255) DEFAULT NULL,
  `product_inquiry_email_reminder` varchar(255) DEFAULT NULL,
  `product_inquiry_instructions` text NOT NULL,
  `product_inquiry_quantity` varchar(255) DEFAULT NULL,
  `product_inquiry_mailing` varchar(255) DEFAULT NULL,
  `product_inquiry_image_path` varchar(255) DEFAULT NULL,
  `product_inquiry_image` varchar(255) DEFAULT NULL,
  `product_inquiry_status` tinyint(4) NOT NULL DEFAULT '0',
  `product_inquiry_created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sb_product_inquiry`
--

INSERT INTO `sb_product_inquiry` (`product_inquiry_id`, `product_inquiry_productid`, `product_inquiry_name`, `product_inquiry_email`, `product_inquiry_phone`, `product_inquiry_msg`, `product_inquiry_size`, `product_inquiry_color`, `product_inquiry_sided`, `product_inquiry_coverstock`, `product_inquiry_paperstock`, `product_inquiry_folding`, `product_inquiry_material`, `product_inquiry_binding`, `product_inquiry_drilling`, `product_inquiry_hole`, `product_inquiry_sheets_pad`, `product_inquiry_cutomsize`, `product_inquiry_totalpages`, `product_inquiry_email_reminder`, `product_inquiry_instructions`, `product_inquiry_quantity`, `product_inquiry_mailing`, `product_inquiry_image_path`, `product_inquiry_image`, `product_inquiry_status`, `product_inquiry_created_on`) VALUES
(1, 1, 'john', 'A@GMAIL.COM', '123456789', 'MESSAGE', '3.5 x 2 Horizontal', 'Black ink', '2-sided', 'Gloss Cover stock', '0', '', '', '', '', '', '', 'custom size', '0', 'Every 3 Months', 'instructions', '4', '0', 'assets/uploads/product_inquiry_image/', '696964737_pro-img1.jpg', 1, '2018-09-23 23:50:24'),
(2, 36, 'john', 'johndoe@gmail.com', '123456789', 'message goes here !!!', '3.5 x 2 Horizontal', 'Please select', 'Please select', 'Please select', '0', '', '', '', '', '', '', '', '0', '0', '', '6', '0', 'assets/uploads/product_inquiry_image/', '170590468_img9.png', 1, '2018-09-24 06:47:17'),
(3, 16, 'test user', 'testuser0924@gmail.com', '+2544242414', 'test', 'Please select', 'Please select', 'Please select', 'Please select', '0', '', '', '', '', '', '', '', '0', '0', '', '1', '0', 'assets/uploads/product_inquiry_image/', '1885322488_download (4).jpg', 1, '2018-09-24 20:23:43'),
(4, 1, 'test user', 'testuser0924@gmail.com', '+2544242414', 'test', '3.5 x 2 Horizontal', 'Black ink', 'Front Only', 'Uncoated Cover stock', '0', '', '', '', '', '', '', 'test', '0', '0', 'test instruction', '1', '0', 'assets/uploads/product_inquiry_image/', '1353276665_', 1, '2018-09-24 20:30:59'),
(5, 4, 'test user', 'test@test.com', '+2544242414', 'test', '2 x 3.5 Vertical', 'Black ink', '2-sided', 'Gloss Cover stock', '0', '', '', '', '', '', '', 'custom', '0', '0', '', '2', '0', 'assets/uploads/product_inquiry_image/', '2141472125_download.png', 1, '2018-09-24 20:52:31'),
(6, 1, 'john', 'doe', '123456789', 'some message .....', '3.5 x 2 Horizontal', 'Black ink', 'Front Only', 'Uncoated Cover stock', '0', '', '', '', '', '', '', '', '0', '0', '', '5', '0', 'assets/uploads/product_inquiry_image/', '1396257753_img9.png', 1, '2018-09-25 04:03:49'),
(7, 1, 'CQP', 'calprint@pacbell.net', '9256881480', 'Test', '3.5 x 2 Horizontal', 'Please select', 'Front Only', 'Gloss Cover stock', '0', '', '', '', '', '', '', '', '0', '0', '', '250', '0', 'assets/uploads/product_inquiry_image/', '13166555_Cerus BC Proof 3 6-24 for Adonis.pdf', 1, '2018-10-04 08:27:58'),
(8, 2, 'test', 'test@gmail.com', '2343444556', 'test test test test', '3.5 in x 2 in', 'Black ink', '1 sided', '80# uncoated cover', '0', '', '', '', '', '', '', '', '0', '0', '', '1', '0', 'assets/uploads/product_inquiry_image/', '1706753653_iphone-x.png', 1, '2018-12-13 06:36:59'),
(9, 1, 'asd', 'asd@email.com', '123123', 'adasdasdasdasd', '3.5 in x 2 in', '1 PMS', '1 sided', '100# uncoated cover', '0', '', '', '', '', '', '', '', '0', '0', 'adadad', '1', '0', 'assets/uploads/product_inquiry_image/', '1357161494_1.jpg', 1, '2019-01-02 08:18:05'),
(10, 13, 'peter', 'calprint@pacbell.net', '925-6881480', 'quotation', '#9 regular', 'Black ink', '1 sided', '24# white', '0', '', '', '', '', '', '', '', '0', '0', '', '1', '0', 'assets/uploads/product_inquiry_image/', '1497334679_17xxxx BSI #9 return.pdf', 1, '2019-01-09 06:01:13'),
(11, 1, 'mike', 'mike.murphy@octalogo.com', '1245798797', 'test', '3.5 in x 2 in', 'Black ink', '2-sided', '100# uncoated cover', '0', '', '', '', '', '', '', '123', '0', '0', 'test', '1', '0', 'assets/uploads/product_inquiry_image/', '687634347_Chrysanthemum.jpg', 1, '2019-01-10 11:27:03'),
(12, 1, 'mike', 'mike.murphy@octalogo.com', '1245798797', 'test', '3.5 in x 2 in', 'Black ink', '2-sided', '100# uncoated cover', '0', '', '', '', '', '', '', '123', '0', '0', 'test', '1', '0', 'assets/uploads/product_inquiry_image/', '201246158_Chrysanthemum.jpg', 1, '2019-01-10 11:27:10'),
(13, 3, 'Dumy', 'test@gmail.com', '1234567999', '4545454', '7 in x 9 in', '4-color', '1 sided', '100# uncoated cover', '0', '', '', '', '', '', '', 'sdafsadf', '0', '0', '', '1', '0', 'assets/uploads/product_inquiry_image/', '1552950491_tick.png', 1, '2019-01-22 15:03:21'),
(14, 1, 'mojo jojo', 'samad@email.com', '03433051354', 'asdsadsad', '3.5 in x 2 in', '1 PMS', '1 sided', '100# uncoated cover', '0', '', '', '', '', '', '', '', '0', '0', 'asdasd', '1', '0', 'assets/uploads/product_inquiry_image/', '1749538855_1.jpg', 1, '2019-01-22 15:05:51'),
(15, 1, 'test', 'testuser0924@gmail.com', '433545', 'test', '3.5 in x 2 in', 'Black ink', '1 sided', '100# uncoated cover', '0', '', '', '', '', '', '', '1', '0', '0', '', '1', '0', 'assets/uploads/product_inquiry_image/', '1875342088_image1.png', 1, '2019-01-28 11:17:39'),
(16, 8, 'sad', 'asd', 'asd', 'asd', '5.5 in x 8.5 in', '4-color', 'Please select', '60/70# offset', '0', '', '', 'Coil Binding', '', '', '', '', '0', '0', '', '1', '0', 'assets/uploads/product_inquiry_image/', '489539402_Desert.jpg', 1, '2019-02-01 08:16:42'),
(17, 1, 'jonysd sdfsdf', 'john@gmail.com', '5345345345', 'TYUTYUTYU', '4 in x 3.5 in Foldover', '1 PMS', '2-sided', '100# uncoated cover', '0', '', '', '', '', '', '', '', '0', '0', '', '1', '0', 'assets/uploads/product_inquiry_image/', '1085462223_img8.png', 1, '2019-02-05 21:23:28'),
(18, 1, 'jonysd sdfsdf', 'john@gmail.com', '5345345345', 'TYUTYUTYU', '4 in x 3.5 in Foldover', '1 PMS', '2-sided', '100# uncoated cover', '0', '', '', '', '', '', '', '', '0', '0', '', '1', '0', 'assets/uploads/product_inquiry_image/', '555384965_img8.png', 1, '2019-02-05 21:23:40'),
(19, 1, 'jonysd sdfsdf', 'john@gmail.com', '5345345345', 'tyutyuty', '3.5 in x 2 in', '1 PMS + Black', '2-sided', '100# gloss cover', NULL, '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '944777401_sample.pdf', 1, '2019-02-05 21:29:17'),
(20, 1, 'jonysd sdfsdf', 'john@gmail.com', '5345345345', 'gjghjghj', '4 in x 3.5 in Foldover', '1 PMS', '2-sided', '100# gloss cover', NULL, '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '85051094_recover-deleted-ai.png', 1, '2019-02-05 21:31:06'),
(21, 1, 'jonysd sdfsdf', 'john@gmail.com', '5345345345', 'rtyrtyrt', '4 in x 3.5 in Foldover', '1 PMS + Black', '2-sided', '100# gloss cover', NULL, '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '1304176143_recover-deleted-ai.png', 1, '2019-02-05 21:31:40'),
(22, 1, 'jonysd sdfsdf', 'john@gmail.com', '5345345345', 'jkljkljkl', '4 in x 3.5 in Foldover', '1 PMS + Black', '1 sided', '100# gloss cover', NULL, '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '1770348583_recover-deleted-ai.png', 1, '2019-02-05 21:33:14'),
(23, 1, 'jonysd sdfsdf', 'john@gmail.com', '5345345345', 'jkljkljkl', '4 in x 3.5 in Foldover', '1 PMS + Black', '1 sided', '100# gloss cover', NULL, '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '1112616264_recover-deleted-ai.png', 1, '2019-02-05 21:35:08'),
(24, 1, 'jonysd sdfsdf', 'john@gmail.com', '5345345345', 'jkljkljkl', '4 in x 3.5 in Foldover', '1 PMS + Black', '1 sided', '100# gloss cover', NULL, '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '309947264_recover-deleted-ai.png', 1, '2019-02-05 21:35:28'),
(25, 8, 'jonysd sdfsdf', 'johnsu6361@gmail.com', '5345345345', 'message goes here .....', '8.5 in x11 in', '4-color', 'Please select', '80# cover', 'Please select', '', '', 'Wire Binding', '', '', '', '', '', NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '1183809188_recover-deleted-ai.png', 1, '2019-02-05 22:42:58'),
(26, 8, 'jonysd sdfsdf', 'johnsu6361@gmail.com', '5345345345', 'message', '5.5 in x 8.5 in', '4-color', 'Please select', '80# cover', 'Please select', '', '', 'Saddle Stitching', '', '', '', '', '', NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '827867768_recover-deleted-ai.png', 1, '2019-02-05 22:47:24'),
(27, 8, 'jonysd sdfsdf', 'johnsu6361@gmail.com', '5345345345', 'message ', '8.5 in x11 in', '4-color', 'Please select', 'Saddle Stitch Staples', 'Please select', '', '', 'Wire Binding', '', '', '', '', '', NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '2141098097_recover-deleted-ai.png', 1, '2019-02-05 22:58:11'),
(28, 8, 'jonysd sdfsdf', 'john@gmail.com', '5345345345', 'asdadasd', '8.5 in x11 in', '4-color', 'Please select', '60/70# offset', 'Please select', '', '', 'Coil Binding', '', '', '', '', '', NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '135847745_recover-deleted-ai.png', 1, '2019-02-05 22:59:26'),
(29, 8, 'jonysd sdfsdf', 'john@gmail.com', '5345345345', 'asdadasd', '8.5 in x11 in', '4-color', 'Please select', '60/70# offset', 'Please select', '', '', 'Coil Binding', '', '', '', '', '', NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '852109348_recover-deleted-ai.png', 1, '2019-02-05 23:00:32'),
(30, 8, 'jonysd sdfsdf', 'john@gmail.com', '5345345345', 'asdadasd', '8.5 in x11 in', '4-color', 'Please select', '60/70# offset', 'Please select', '', '', 'Coil Binding', '', '', '', '', '', NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '1121810290_recover-deleted-ai.png', 1, '2019-02-05 23:01:30'),
(31, 8, 'jonysd sdfsdf', 'john@gmail.com', '5345345345', 'asdadasd', '8.5 in x11 in', '4-color', 'Please select', '60/70# offset', 'Please select', '', '', 'Coil Binding', '', '', '', '', '', NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '1618917651_recover-deleted-ai.png', 1, '2019-02-05 23:06:08'),
(32, 8, 'jonysd sdfsdf', 'john@gmail.com', '5345345345', 'asdadasd', '8.5 in x11 in', '4-color', 'Please select', '60/70# offset', 'Please select', '', '', 'Coil Binding', '', '', '', '', '', NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '565378736_recover-deleted-ai.png', 1, '2019-02-05 23:08:51'),
(33, 8, 'jonysd sdfsdf', 'john@gmail.com', '5345345345', 'sdsdsd', '5.5 in x 8.5 in', '4-color', 'Please select', 'Saddle Stitch Staples', 'Please select', '', '', 'Wire Binding', '', '', '', '', '', NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '1712536842_recover-deleted-ai.png', 1, '2019-02-05 23:10:36'),
(34, 8, 'jonysd sdfsdf', 'john@gmail.com', '5345345345', 'sdsdsd', '5.5 in x 8.5 in', '4-color', 'Please select', 'Saddle Stitch Staples', 'Please select', '', '', 'Wire Binding', '', '', '', '', '', NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '1523676099_recover-deleted-ai.png', 1, '2019-02-05 23:11:27'),
(35, 8, 'jonysd sdfsdf', 'john@gmail.com', '5345345345', 'sdsdsd', '5.5 in x 8.5 in', '4-color', 'Please select', 'Saddle Stitch Staples', 'Please select', '', '', 'Wire Binding', '', '', '', '', '', NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '481177387_recover-deleted-ai.png', 1, '2019-02-05 23:12:20'),
(36, 8, 'test', 'testuser0924@gmail.com', '674556', 'test', '5.5 in x 8.5 in', '4-color', 'Please select', '60/70# offset', 'Please select', '', '', 'Wire Binding', '', '', '', '12', '2', NULL, 'testtt', '1', NULL, 'assets/uploads/product_inquiry_image/', '1633686756_image1.png', 1, '2019-02-06 06:49:20'),
(37, 28, 'test', 'test@gmail.com', '43', 'test', '8.5 in x 11 in', '4-color', 'Please select', '100# gloss text', 'Please select', '', '', 'Wire Binding', '', '', '', '33', '22', NULL, 're', '1', NULL, 'assets/uploads/product_inquiry_image/', '833501769_Paint 02.ai', 1, '2019-02-06 06:57:05'),
(38, 8, 'jonysd sdfsdf', 'john@gmail.com', '5345345345', 'dfgdfgdf', '5.5 in x 8.5 in', '4-color', 'Please select', 'Saddle Stitch Staples', 'Please select', '', '', 'Wire Binding', '', '', '', '', '10', NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '1163333187_download123.png', 1, '2019-02-06 19:23:30'),
(39, 8, 'jonysd sdfsdf', 'john@gmail.com', '5345345345', 'dfgdfgdfg', '5.5 in x 8.5 in', '4-color', 'Please select', 'Saddle Stitch Staples', 'Please select', '', '', 'Saddle Stitching', '', '', '', '', '', NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '1051252423_images123.indd', 1, '2019-02-06 19:26:36'),
(40, 1, 'Peter Lin', 'calprint@pacbell.net', '9256881480', 'test', '3.5 in x 2 in', '4-color', '1 sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '100# cover', '1', NULL, 'assets/uploads/product_inquiry_image/', '2122255780_Banner1.pdf', 1, '2019-02-06 19:42:41'),
(41, 28, 'test', 'test@test22.com', '3224', 'test', '8.5 in x 11 in', '4-color', 'Please select', '100# gloss text', 'Please select', '', '', 'Coil Binding', '', '', '', '23', '33', NULL, 'fd', '1', NULL, 'assets/uploads/product_inquiry_image/', '240423281_Portfolio.indd', 1, '2019-02-07 06:42:31'),
(42, 28, 'tt', 'tt@gmail.com', '87876', 'nm,', '8.5 in x 11 in', 'Please select', 'Please select', '100# gloss text', 'Please select', '', '', 'Coil Binding', '', '', '', '4', '56', NULL, 'tghf', '1', NULL, 'assets/uploads/product_inquiry_image/', '1628110161_Portfolio.indd', 1, '2019-02-07 06:44:18'),
(43, 28, 'mojo', 'jojo@email.com', '12312312', 'hello', '8.5 in x 11 in', '4-color', 'Please select', '100# gloss text', 'Please select', '', '', 'Coil Binding', '', '', '', '', '', NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '895252574_Portfolio.indd', 1, '2019-02-07 06:45:13'),
(44, 28, 'alice', 'alice@gmail.com', '5435435', 'test', '8.5 in x 11 in', '4-color', 'Please select', 'Please select', 'Please select', '', '', 'Please select', '', '', '', '2', '23', NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '975866041_sample_test.pdf', 1, '2019-02-07 06:46:34'),
(45, 1, 'asd', 'asd@email.com', '21312', 'sadasd', '3.5 in x 2 in', 'Black ink', '1 sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '183172261_Jellyfish.jpg', 1, '2019-02-12 06:52:28'),
(46, 1, 'mojo', 'mojo@email.com', '123123', 'test', '3.5 in x 2 in', 'Black ink', '1 sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '1520956403_Lighthouse.jpg', 1, '2019-02-12 06:57:17'),
(47, 1, 'mojo', 'mojo@email.com', '213123', 'asdasd', '3.5 in x 2 in', 'Black ink', '1 sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '1554671031_Jellyfish.jpg', 1, '2019-02-12 07:00:20'),
(48, 1, 'mojo', 'mojo@email.com', '213123', 'asdasd', '3.5 in x 2 in', 'Black ink', '1 sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '719631406_Koala.jpg', 1, '2019-02-12 07:02:13'),
(49, 1, 'mojo', 'mojo@email.com', '213123', 'asdasd', '3.5 in x 2 in', 'Black ink', '1 sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '195583841_Hydrangeas.jpg', 1, '2019-02-12 07:04:03'),
(50, 1, 'mojo', 'mojo@email.com', '213123', 'asdasd', '3.5 in x 2 in', 'Black ink', '1 sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '296006600_Koala.jpg', 1, '2019-02-12 07:04:52'),
(51, 1, 'mojo', 'mojo@email.com', '213123', 'asdasd', '3.5 in x 2 in', 'Black ink', '1 sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '261665080_Hydrangeas.jpg', 1, '2019-02-12 07:08:26'),
(52, 1, 'mojo', 'mojo@email.com', '213123', 'asdasd', '3.5 in x 2 in', 'Black ink', '1 sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '342049254_Hydrangeas.jpg', 1, '2019-02-12 07:09:56'),
(53, 1, 'mojo', 'mojo@email.com', '213123', 'asdasd', '3.5 in x 2 in', 'Black ink', '1 sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '515084579_Hydrangeas.jpg', 1, '2019-02-12 07:12:14'),
(54, 1, 'mojo', 'mojo@email.com', '213123', 'asdasd', '3.5 in x 2 in', 'Black ink', '1 sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '1852846766_Hydrangeas.jpg', 1, '2019-02-12 07:16:24'),
(55, 1, 'mojo', 'mojo@email.com', '213123', 'asdasd', '3.5 in x 2 in', 'Black ink', '1 sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '1941587324_Hydrangeas.jpg', 1, '2019-02-12 07:18:45'),
(56, 1, 'mojo', 'mojo@email.com', '213123', 'asdasd', '3.5 in x 2 in', 'Black ink', '1 sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '81583627_Hydrangeas.jpg', 1, '2019-02-12 07:19:54'),
(57, 1, 'mojo', 'mojo@email.com', '123123', 'test', 'Please select', 'Please select', 'Please select', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '1736691804_Jellyfish.jpg', 1, '2019-02-12 07:23:06'),
(58, 1, 'mojo', 'mojo@email.com', '123123', 'test', 'Please select', 'Please select', 'Please select', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '1169349145_Jellyfish.jpg', 1, '2019-02-12 07:25:45'),
(59, 1, 'mojo', 'mojo@email.com', '213123', 'sadasdasdas', 'Please select', 'Please select', 'Please select', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '1815564424_Lighthouse.jpg', 1, '2019-02-12 07:28:41'),
(60, 1, 'mojo', 'mojo@email.com', '213123', 'sadasdasdas', 'Please select', 'Please select', 'Please select', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '1428743092_Lighthouse.jpg', 1, '2019-02-12 07:31:59'),
(61, 1, 'mojo', 'mojo@email.com', '213123111111', 'new test', 'Please select', 'Please select', 'Please select', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '713575998_Lighthouse.jpg', 1, '2019-02-12 07:35:55'),
(62, 1, 'mojo', 'mojo@email.com', '213213', 'testtttt', '3.5 in x 2 in', 'Please select', 'Please select', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '618201883_Hydrangeas.jpg', 1, '2019-02-12 07:45:08'),
(63, 1, 'mojo3', 'mojo3@email.com', '2389090', 'helloooo', '3.5 in x 2 in', '1 PMS', '2-sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '58625764_Koala.jpg', 1, '2019-02-12 07:52:14'),
(64, 1, 'mojo3', 'mojo3@email.com', '2389090', 'helloooo', '3.5 in x 2 in', '1 PMS', '2-sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '890459980_Koala.jpg', 1, '2019-02-12 07:56:34'),
(65, 1, 'mojo3', 'mojo3@email.com', '2389090', 'helloooo', '3.5 in x 2 in', '1 PMS', '2-sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '1876379064_Koala.jpg', 1, '2019-02-12 07:57:45'),
(66, 1, 'mojo3', 'mojo3@email.com', '2389090', 'helloooo', '3.5 in x 2 in', '1 PMS', '2-sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '1405565128_Koala.jpg', 1, '2019-02-12 07:58:59'),
(67, 1, 'mojo3', 'mojo3@email.com', '2389090', 'helloooo', '3.5 in x 2 in', '1 PMS', '2-sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '515284819_Koala.jpg', 1, '2019-02-12 08:00:17'),
(68, 1, 'mojo3', 'mojo3@email.com', '2389090', 'helloooo', '3.5 in x 2 in', '1 PMS', '2-sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '1211650973_Koala.jpg', 1, '2019-02-12 08:30:45'),
(69, 1, 'mojo3', 'mojo3@email.com', '2389090', 'helloooo', '3.5 in x 2 in', '1 PMS', '2-sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '1388395815_Koala.jpg', 1, '2019-02-12 08:31:45'),
(70, 1, 'mojo3', 'mojo3@email.com', '2389090', 'helloooo', '3.5 in x 2 in', '1 PMS', '2-sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '248947833_Koala.jpg', 1, '2019-02-12 08:32:35'),
(71, 1, 'mojo3', 'mojo3@email.com', '2389090', 'helloooo', '3.5 in x 2 in', '1 PMS', '2-sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '894511135_Koala.jpg', 1, '2019-02-12 08:37:54'),
(72, 1, 'mojo3', 'mojo3@email.com', '2389090', 'helloooo', '3.5 in x 2 in', '1 PMS', '2-sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '1580654822_Koala.jpg', 1, '2019-02-12 08:39:47'),
(73, 1, 'mojo3', 'mojo3@email.com', '2389090', 'helloooo', '3.5 in x 2 in', '1 PMS', '2-sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '428824652_Koala.jpg', 1, '2019-02-12 08:43:11'),
(74, 1, 'mojo3', 'mojo3@email.com', '2389090', 'helloooo', '3.5 in x 2 in', '1 PMS', '2-sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '732494512_Koala.jpg', 1, '2019-02-12 08:45:00'),
(75, 1, 'mojo3', 'mojo3@email.com', '2389090', 'helloooo', '3.5 in x 2 in', '1 PMS', '2-sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '1460076296_Koala.jpg', 1, '2019-02-12 08:45:47'),
(76, 1, 'mojo3', 'mojo3@email.com', '2389090', 'helloooo', '3.5 in x 2 in', '1 PMS', '2-sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '194120182_Koala.jpg', 1, '2019-02-12 08:49:07'),
(77, 1, 'mojo3', 'mojo3@email.com', '2389090', 'helloooo', '3.5 in x 2 in', '1 PMS', '2-sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '470275397_Koala.jpg', 1, '2019-02-12 08:52:45'),
(78, 1, 'mojo3', 'mojo3@email.com', '2389090', 'helloooo', '3.5 in x 2 in', '1 PMS', '2-sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '2042024296_Koala.jpg', 1, '2019-02-12 08:54:01'),
(79, 1, 'mojo3', 'mojo3@email.com', '2389090', 'helloooo', '3.5 in x 2 in', '1 PMS', '2-sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '1342475948_Koala.jpg', 1, '2019-02-12 08:55:21'),
(80, 1, 'mojo3', 'mojo3@email.com', '2389090', 'helloooo', '3.5 in x 2 in', '1 PMS', '2-sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '1327260122_Koala.jpg', 1, '2019-02-12 08:55:50'),
(81, 1, 'mojo3', 'mojo3@email.com', '2389090', 'helloooo', '3.5 in x 2 in', '1 PMS', '2-sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '1329803568_Koala.jpg', 1, '2019-02-12 08:57:15'),
(82, 1, 'mojo3', 'mojo3@email.com', '2389090238', 'helloooo123', '3.5 in x 2 in', '1 PMS', '2-sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '105996267_Koala.jpg', 1, '2019-02-12 08:58:29'),
(83, 1, 'mojo3', 'mojo3@email.com', '2389090238', 'helloooo123', '3.5 in x 2 in', '1 PMS', '2-sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '991586264_Koala.jpg', 1, '2019-02-12 08:59:18'),
(84, 1, 'mojo3', 'mojo3@email.com', '2389090238', 'helloooo123', '3.5 in x 2 in', '1 PMS', '2-sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '1928500604_Koala.jpg', 1, '2019-02-12 09:00:42'),
(85, 1, 'mojo3', 'mojo3@email.com', '2389090238', 'helloooo1234', '3.5 in x 2 in', '1 PMS', '2-sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '805864421_Koala.jpg', 1, '2019-02-12 09:02:18'),
(86, 1, 'mojo3', 'mojo3@email.com', '2389090238', 'helloooo1234', '3.5 in x 2 in', '1 PMS', '2-sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '836493559_Koala.jpg', 1, '2019-02-12 09:04:40'),
(87, 1, 'mojo3', 'mojo3@email.com', '2389090238', 'helloooo12341', '3.5 in x 2 in', '1 PMS', '2-sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '393380222_Koala.jpg', 1, '2019-02-12 09:07:49'),
(88, 1, 'mojo3', 'mojo3@email.com', '2389090238', 'helloooo12341', '3.5 in x 2 in', '1 PMS', '2-sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '1339691471_Koala.jpg', 1, '2019-02-12 09:10:14'),
(89, 1, 'mojo3', 'mojo3@email.com', '2389090238', 'helloooo12341', '3.5 in x 2 in', '1 PMS', '2-sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '180580248_Koala.jpg', 1, '2019-02-12 09:11:19'),
(90, 1, 'Peter Lin', 'calprint@pacbell.net', '9256881480', 'test', '3.5 in x 2 in', '4-color', '1 sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '1088789337_BC 1.png', 1, '2019-02-12 19:30:24'),
(91, 1, 'Peter Lin', 'calprint@pacbell.net', '9256881480', 'test', '3.5 in x 2 in', '4-color', '1 sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '707550412_BC 1.png', 1, '2019-02-12 19:30:32'),
(92, 1, 'Peter Lin', 'calprint@pacbell.net', '9256881480', 'test', '3.5 in x 2 in', '4-color', '1 sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '1104104627_BC 1.png', 1, '2019-02-12 19:30:43'),
(93, 1, 'Peter Lin', 'calprint@pacbell.net', '9256881480', 'test', '3.5 in x 2 in', '4-color', '1 sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '1851661734_BC 1.png', 1, '2019-02-12 19:30:44'),
(94, 1, 'Peter Lin', 'calprint@pacbell.net', '9256881480', 'test', '3.5 in x 2 in', '4-color', '1 sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '1965913116_BC 1.png', 1, '2019-02-12 19:30:55'),
(95, 1, 'Peter Lin', 'calprint@pacbell.net', '9256881480', 'test', '3.5 in x 2 in', '4-color', '1 sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '1440007387_BC 1.png', 1, '2019-02-12 19:30:55'),
(96, 1, 'Peter Lin', 'calprint@pacbell.net', '9256881480', 'test', '3.5 in x 2 in', '4-color', '1 sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '192427135_BC 1.png', 1, '2019-02-12 19:30:55'),
(97, 2, 'Frank Demasi', 'fd_jenmira@yahoo.com', '(707) 864-5860', 'Testing CQP web page', '3.5 in x 2 in', 'Black ink', '1 sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '753648429_CQ web page test.pdf', 1, '2019-02-13 19:34:15'),
(98, 2, 'Frank Demasi', 'fd_jenmira@yahoo.com', '(707) 864-5860', 'Testing CQP web page', '3.5 in x 2 in', 'Black ink', '1 sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '1878826873_CQ web page test.pdf', 1, '2019-02-13 19:34:22'),
(99, 2, 'Frank Demasi', 'fd_jenmira@yahoo.com', '(707) 864-5860', 'Testing CQP web page', '3.5 in x 2 in', 'Black ink', '1 sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, 'No instructions', '1', NULL, 'assets/uploads/product_inquiry_image/', '1883079297_CQ web page test.pdf', 1, '2019-02-13 19:35:28'),
(100, 2, 'Frank Demasi', 'fd_jenmira@yahoo.com', '(707) 864-5860', 'Testing CQP web page', '3.5 in x 2 in', 'Black ink', '1 sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, 'No instructions', '1', NULL, 'assets/uploads/product_inquiry_image/', '420750338_CQ web page test.pdf', 1, '2019-02-13 19:35:33'),
(101, 2, 'Frank Demasi', 'fd_jenmira@yahoo.com', '(707) 864-5860', 'Testing CQP web page', '3.5 in x 2 in', 'Black ink', '1 sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, 'No instructions', '1', NULL, 'assets/uploads/product_inquiry_image/', '1052405874_CQ web page test.pdf', 1, '2019-02-13 19:35:34'),
(102, 1, 'Frank Demasi', 'fd_jenmira@yahoo.com', '707-864-5860', 'No Message', '3.5 in x 2 in', 'Black ink', '1 sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '528534568_CQ web page test.pdf', 1, '2019-02-13 19:37:39'),
(103, 1, 'Frank Demasi', 'fd_jenmira@yahoo.com', '707-864-5860', 'No Message', '3.5 in x 2 in', 'Black ink', '1 sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '2053106749_CQ web page test.pdf', 1, '2019-02-13 19:38:12'),
(104, 1, 'Peter Lin', 'calprint@pacbell.net', '9256881480', 'test', '3.5 in x 2 in', '4-color', '1 sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '574132519_BC 1.png', 1, '2019-02-13 19:38:23'),
(105, 1, 'Peter Lin', 'calprint@pacbell.net', '9256881480', 'test', '3.5 in x 2 in', '4-color', '1 sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '393217150_BC 1.png', 1, '2019-02-13 19:38:30'),
(106, 1, 'Peter Lin', 'calprint@pacbell.net', '9256881480', 'test', '3.5 in x 2 in', '4-color', '1 sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '1268708688_BC 1.png', 1, '2019-02-13 19:38:40'),
(107, 1, 'Peter Lin', 'calprint@pacbell.net', '9256881480', 'test', '3.5 in x 2 in', '4-color', '1 sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '1662438245_BC 1.png', 1, '2019-02-13 19:38:40'),
(108, 1, 'Peter Lin', 'calprint@pacbell.net', '9256881480', 'test', '3.5 in x 2 in', '4-color', '1 sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '783293225_BC 1.png', 1, '2019-02-13 19:38:41'),
(109, 2, 'Frank Demasi', 'fd_jenmira@yahoo.com', '707-864-5860', 'No message', '3.5 in x 2 in', 'Black ink', '1 sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '1905782152_CQ web page test.pdf', 1, '2019-02-13 19:43:53'),
(110, 1, 'mojo', 'mojo@email.com', '23123213', 'test', '3.5 in x 2 in', 'Black ink', '1 sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, 'test', '1', NULL, 'assets/uploads/product_inquiry_image/', '1698045788_Jellyfish.jpg', 1, '2019-02-15 07:38:31'),
(111, 1, 'mojo', 'mojo@email.com', '122121', 'hola', '3.5 in x 2 in', '1 PMS', '1 sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, 'test', '1', NULL, 'assets/uploads/product_inquiry_image/', '2012317534_Lighthouse.jpg', 1, '2019-02-15 07:42:16'),
(112, 1, 'mojo', 'mojo@email.com', '122121', 'hola', '3.5 in x 2 in', '1 PMS', '1 sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, 'test', '1', NULL, 'assets/uploads/product_inquiry_image/', '1587944332_Lighthouse.jpg', 2, '2019-02-15 07:47:15'),
(113, 1, 'Peter Lin', 'calprint@pacbell.net', '925-687-1480', 'test', '3.5 in x 2 in', '4-color', '1 sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '1539821932_Ted.pdf', 1, '2019-02-22 07:10:13'),
(114, 1, 'Frank Demasi', 'fd_jenmira@yahoo.com', '707-864-5860', 'TEST ONLY', '3.5 in x 2 in', '4-color', '1 sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, 'TEST ONLY', '1', NULL, 'assets/uploads/product_inquiry_image/', '1054836290_Cerus BC PROOF 3 ks,th Feb 2019.pdf', 1, '2019-02-26 23:27:39'),
(115, 17, 'Frank', 'fd_jenmira@yahoo.com', '707-864-5860', 'Test #2', '4 in x 6 in', '4-color', '1 sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, 'TEST #2', '1', NULL, 'assets/uploads/product_inquiry_image/', '1067395865_Enemark Bday Card PROOF Feb 2019.pdf', 1, '2019-02-26 23:36:29'),
(116, 1, 'mojo', 'mojo@email.com', '12121212121', 'testing 123', '3.5 in x 2 in', '1 PMS', '1 sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, 'test', '1', NULL, 'assets/uploads/product_inquiry_image/', '373013946_perceart-154871305176.jpg', 1, '2019-02-27 08:16:33'),
(117, 1, 'tech', 'tech.digi.2018@gmail.com', '213213213213', 'asdasdasdasdsadasdasd', '3.5 in x 2 in', '1 PMS', '1 sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, 'test', '1', NULL, 'assets/uploads/product_inquiry_image/', '2122006585_perceart-154871305176.jpg', 1, '2019-02-27 08:22:30'),
(118, 1, 'mojo', 'jojo@email.com', '23123123', 'asdasdasdasdasd', '3.5 in x 2 in', '1 PMS', '1 sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, 'asdasdadas', '1', NULL, 'assets/uploads/product_inquiry_image/', '1408955413_perceart-154871305176.jpg', 1, '2019-02-27 08:27:11'),
(119, 2, 'Frank Demasi', 'snacksaplenty@yahoo.com', '707-864-5860', 'TEST ONLY', '3.5 in x 2 in', '4-color', '1 sided', NULL, 'Please select', '', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '1095700817_TEST File only.pdf', 1, '2019-03-21 21:52:35'),
(120, 7, 'Frank Demasi', 'snacksaplenty@yahoo.com', '707-864-5860', 'TEST ONLY', 'Please select', '4-color', 'Please select', NULL, 'Please select', '', 'Please select', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '1696065865_TEST File only.pdf', 1, '2019-03-21 21:54:09'),
(121, 8, 'Frank Demasi', 'snacksaplenty@yahoo.com', '707-864-5860', 'TEST ONLY', '8.5 in x11 in', '4-color', 'Please select', '100# gloss text', 'Please select', '', '', 'Coil Binding', '', '', '', '', '', NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '380962775_TEST File only.pdf', 1, '2019-03-21 21:55:29'),
(122, 9, 'Frank Demasi', 'snacksaplenty@yahoo.com', '707-864-5860', 'TEST ONLY', '11 in x 17 in', '4-color', '2-sided', NULL, 'Please select', 'Half Fold', '', '', '', '', '', '', NULL, NULL, '', '1', NULL, 'assets/uploads/product_inquiry_image/', '1281160827_TEST File only.pdf', 1, '2019-03-21 21:56:43'),
(123, 1, 'Frank Demasi', 'snacksaplenty@yahoo.com', '707-864-5860', 'Testing the web page again...', '3.5 in x 2 in', '4-color', '1 sided', NULL, '100# uncoated cover', '', '', '', '', '', '', '', NULL, NULL, '', '500', NULL, 'assets/uploads/product_inquiry_image/', '849797387_Cheryl Thayer BC PROOF 4 Mar 2019.pdf', 1, '2019-04-03 22:48:34');

-- --------------------------------------------------------

--
-- Table structure for table `sb_product_material`
--

CREATE TABLE `sb_product_material` (
  `product_material_id` int(11) NOT NULL,
  `product_material_cat_id` int(11) NOT NULL DEFAULT '0',
  `product_material_product_id` int(11) NOT NULL DEFAULT '0',
  `product_material_name` varchar(50) NOT NULL DEFAULT '0',
  `product_material_status` tinyint(4) NOT NULL DEFAULT '0',
  `product_material_created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sb_product_material`
--

INSERT INTO `sb_product_material` (`product_material_id`, `product_material_cat_id`, `product_material_product_id`, `product_material_name`, `product_material_status`, `product_material_created_on`) VALUES
(1, 7, 0, 'Vinyl', 1, '2018-11-08 16:57:54'),
(2, 7, 0, 'Weatherproof', 1, '2018-11-08 16:58:12'),
(3, 12, 0, 'Magnetic paper', 1, '2018-11-08 18:52:01');

-- --------------------------------------------------------

--
-- Table structure for table `sb_product_paper_stock`
--

CREATE TABLE `sb_product_paper_stock` (
  `product_paper_stock_id` int(11) NOT NULL,
  `product_paper_stock_category_id` int(11) NOT NULL DEFAULT '0',
  `product_paper_stock_product_id` int(11) NOT NULL DEFAULT '0',
  `product_paper_stock_name` varchar(255) NOT NULL DEFAULT '0',
  `product_paper_stock_status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sb_product_paper_stock`
--

INSERT INTO `sb_product_paper_stock` (`product_paper_stock_id`, `product_paper_stock_category_id`, `product_paper_stock_product_id`, `product_paper_stock_name`, `product_paper_stock_status`) VALUES
(1, 1, 1, '100# uncoated cover', 1),
(2, 1, 1, '100# gloss cover', 1),
(3, 2, 0, '80# uncoated cover', 1),
(4, 2, 0, '100# uncoated cover', 1),
(5, 3, 0, '100# uncoated cover', 1),
(6, 3, 0, '100# gloss cover', 1),
(7, 4, 0, 'Gloss Cover stock', 1),
(8, 4, 0, 'Uncoated Cover stock', 1),
(9, 5, 0, '16 pt C2S', 1),
(10, 5, 0, '14 pt C2S', 1),
(11, 5, 0, '100# gloss', 1),
(12, 8, 0, '60/70# offset', 1),
(13, 8, 0, '100# gloss text', 1),
(14, 8, 0, 'Saddle Stitch Staples', 1),
(15, 8, 0, '80# cover', 1),
(16, 8, 0, '100# gloss cover', 1),
(17, 9, 0, '70# offset', 1),
(18, 9, 0, '100# gloss text', 1),
(19, 9, 0, '100# gloss cover', 1),
(20, 11, 0, '100# gloss text', 1),
(21, 14, 0, '70# offset', 1),
(22, 14, 0, '100# gloss text', 1),
(23, 15, 0, '100# gloss cover', 1),
(24, 16, 0, '100# gloss text', 1),
(25, 16, 0, '100# gloss cover', 1),
(26, 26, 0, 'Glossy Label stock', 1),
(27, 26, 0, 'Uncoated Label Stock', 1),
(28, 20, 0, '70# Offset', 1),
(29, 22, 0, '20# bond', 1),
(30, 25, 0, 'Glossy Cover Stock', 1),
(31, 2, 0, '110# index', 1),
(32, 2, 0, 'Other', 1),
(33, 3, 0, 'Other', 1),
(34, 14, 0, '100# gloss cover', 1),
(35, 8, 0, '100# gloss cover with UV coating', 1),
(36, 8, 0, 'Self', 1),
(37, 13, 0, '24# white', 1),
(38, 17, 0, 'vinyl', 1),
(39, 17, 0, 'Weatherproof', 1),
(40, 18, 0, '60/70# Offset', 1),
(41, 19, 0, '70# Offset', 1),
(42, 19, 0, '100# gloss text', 1),
(43, 19, 0, '100# gloss cover', 1),
(44, 19, 0, 'Other', 1),
(45, 20, 0, '100# gloss text', 1),
(46, 22, 0, '60/70# Offset', 1),
(47, 23, 0, '2-part', 1),
(48, 23, 0, '3-part', 1),
(49, 24, 0, '14 pt C2S', 1),
(50, 24, 0, '16 pt C2S', 1),
(51, 25, 0, 'Photo paper', 1),
(52, 27, 0, '100# gloss text', 1),
(53, 27, 0, '100# gloss cover', 1),
(54, 27, 0, '100# gloss cover with UV coating', 1),
(55, 12, 0, 'Magnetic Paper', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sb_product_sheets_pad`
--

CREATE TABLE `sb_product_sheets_pad` (
  `product_sheets_pad_id` int(11) NOT NULL,
  `product_sheets_pad_cat_id` int(11) NOT NULL DEFAULT '0',
  `product_sheets_pad_product_id` int(11) NOT NULL DEFAULT '0',
  `product_sheets_pad_name` varchar(50) NOT NULL DEFAULT '0',
  `product_sheets_pad_status` tinyint(4) NOT NULL DEFAULT '0',
  `product_sheets_pad_created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sb_product_sheets_pad`
--

INSERT INTO `sb_product_sheets_pad` (`product_sheets_pad_id`, `product_sheets_pad_cat_id`, `product_sheets_pad_product_id`, `product_sheets_pad_name`, `product_sheets_pad_status`, `product_sheets_pad_created_on`) VALUES
(1, 22, 0, '25', 1, '2018-11-08 20:52:36'),
(2, 22, 0, '50', 1, '2018-11-08 20:52:46'),
(3, 22, 0, '100', 1, '2018-11-08 20:52:55');

-- --------------------------------------------------------

--
-- Table structure for table `sb_product_sided`
--

CREATE TABLE `sb_product_sided` (
  `product_sided_id` int(11) NOT NULL,
  `product_sided_category_id` int(11) NOT NULL DEFAULT '0',
  `product_sided_product_id` int(11) NOT NULL DEFAULT '0',
  `product_sided_name` varchar(255) NOT NULL DEFAULT '0',
  `product_sided_status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sb_product_sided`
--

INSERT INTO `sb_product_sided` (`product_sided_id`, `product_sided_category_id`, `product_sided_product_id`, `product_sided_name`, `product_sided_status`) VALUES
(1, 1, 1, '1 sided', 1),
(2, 1, 1, '2-sided', 1),
(3, 2, 0, '1 sided', 1),
(4, 2, 0, '2-sided', 1),
(5, 3, 0, '1 sided', 1),
(6, 3, 0, '2-sided', 1),
(7, 4, 0, 'Front Only', 1),
(8, 4, 0, '2-sided', 1),
(9, 5, 0, '1 sided', 1),
(10, 5, 0, '2-sided', 1),
(11, 14, 0, '1 sided', 1),
(12, 14, 0, '2-sided', 1),
(13, 23, 0, '1 sided', 1),
(14, 23, 0, '2-sided', 1),
(15, 24, 0, '1 sided', 1),
(17, 9, 0, '1 sided', 1),
(18, 9, 0, '2-sided', 1),
(19, 11, 0, '1 sided', 1),
(20, 11, 0, '2-sided', 1),
(21, 13, 0, '1 sided', 1),
(22, 13, 0, '2-sided', 1),
(23, 15, 0, '1 sided', 1),
(24, 15, 0, '2-sided', 1),
(25, 16, 0, '1 sided', 1),
(26, 16, 0, '2-sided', 1),
(27, 17, 0, '1 sided', 1),
(28, 18, 0, '1 sided', 1),
(29, 18, 0, '2-sided', 1),
(30, 19, 0, '1 sided', 1),
(31, 19, 0, '2-sided', 1),
(32, 20, 0, '1 sided', 1),
(33, 20, 0, '2-sided', 1),
(34, 22, 0, '1 sided', 1),
(35, 22, 0, '2-sided', 1),
(36, 24, 0, '2-sided', 1),
(37, 25, 0, '1 sided', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sb_product_size`
--

CREATE TABLE `sb_product_size` (
  `product_size_id` int(11) NOT NULL,
  `product_size_category_id` int(11) NOT NULL DEFAULT '0',
  `product_size_product_id` int(11) DEFAULT NULL,
  `product_size_title` varchar(255) DEFAULT NULL,
  `product_size_status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sb_product_size`
--

INSERT INTO `sb_product_size` (`product_size_id`, `product_size_category_id`, `product_size_product_id`, `product_size_title`, `product_size_status`) VALUES
(1, 1, 1, '3.5 in x 2 in', 1),
(2, 1, 1, '4 in x 3.5 in Foldover', 1),
(5, 2, 1, '3.5 in x 2 in', 1),
(6, 2, NULL, '2 x 3.5 Vertical', 2),
(7, 3, NULL, '5.5 in x 8.5 in', 1),
(8, 3, NULL, '5 in x 7 in', 1),
(9, 3, NULL, '7 x 10 Vertical Folded', 2),
(10, 3, NULL, '10 x 7 Horizontal Folded', 2),
(11, 4, NULL, '5.5 x 8.5 Vertical Folded', 1),
(12, 4, NULL, '8.5 x 5.5 Horizontal Folded', 1),
(13, 4, NULL, '7 x 10 Vertical Folded', 1),
(14, 4, NULL, '10 x 7 Horizontal Folded', 1),
(15, 5, NULL, '4 in x 6 in', 1),
(16, 5, NULL, '5 in x 7 in', 1),
(17, 5, NULL, '5.5 in x 8.5 in', 1),
(18, 8, NULL, '5.5 in x 8.5 in', 1),
(19, 8, NULL, '8.5 in x11 in', 1),
(20, 9, NULL, '8.5 in x 11 in', 1),
(21, 9, NULL, '8.5 in x 14 in', 1),
(22, 11, NULL, '8.5 in x 11 in', 1),
(23, 13, NULL, '#9 regular', 1),
(24, 13, NULL, '#9 window', 1),
(25, 13, NULL, '#10 regular', 1),
(26, 13, NULL, '#10 window', 1),
(27, 14, NULL, '5.5 in x 8.5 in', 1),
(28, 14, NULL, '8.5 in x 11 in', 1),
(30, 14, NULL, '11 in x 17 in ', 1),
(32, 18, NULL, '8.5 in x 11 in', 1),
(33, 20, NULL, '8.5 in x 11 in', 1),
(34, 20, NULL, '8.5 in x 14 in', 1),
(35, 20, NULL, '11 in x 17 in', 1),
(36, 22, NULL, '4.25 in x 5.5 in', 1),
(37, 22, NULL, '5.5 in x 8.5 in', 1),
(38, 23, NULL, '5.5 in x 8.5 in', 1),
(39, 23, NULL, '8.5 in x 11 in', 1),
(40, 29, NULL, '3.5 x 2 Horizontal', 2),
(43, 5, NULL, '6 in x 9 in', 1),
(44, 5, NULL, '8.5 in x 11 in', 1),
(45, 9, NULL, '11 in x 17 in', 1),
(46, 11, NULL, '12 in x 12 in', 1),
(47, 13, NULL, '9x12 Catalog', 1),
(48, 13, NULL, '9x12 Booklet', 1),
(49, 13, NULL, '6.75 Offering', 1),
(50, 16, NULL, '4 in x 6 in', 1),
(51, 16, NULL, '5 in x 7 in', 1),
(52, 19, NULL, '8.5 in x 6 in', 1),
(53, 19, NULL, '8.5 in x 14 in', 1),
(54, 19, NULL, '11 in x 17 in', 1),
(55, 22, NULL, '8.5 in x 11 in', 1),
(57, 24, NULL, '9 in x 12 in', 1),
(58, 27, NULL, '8.5 in x 11 in', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sb_review`
--

CREATE TABLE `sb_review` (
  `review_id` int(11) NOT NULL,
  `review_product_id` int(11) NOT NULL DEFAULT '0',
  `review_user_id` int(11) NOT NULL DEFAULT '0',
  `review_product_name` varchar(100) NOT NULL DEFAULT '0',
  `review_name` varchar(255) NOT NULL DEFAULT '0',
  `review_subject` varchar(255) NOT NULL DEFAULT '0',
  `review_description` text NOT NULL,
  `review_rating` varchar(50) NOT NULL,
  `review_status` tinyint(4) NOT NULL DEFAULT '0',
  `review_created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sb_review`
--

INSERT INTO `sb_review` (`review_id`, `review_product_id`, `review_user_id`, `review_product_name`, `review_name`, `review_subject`, `review_description`, `review_rating`, `review_status`, `review_created_on`) VALUES
(1, 1, 0, 'Business Cards', 'john doe', 'Reviews', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '5', 1, '2019-01-02 21:54:55'),
(2, 1, 0, 'Business Cards', 'david', 'Reviews', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '4', 1, '2019-01-02 21:55:51'),
(3, 1, 0, 'Business Cards', 'smith', 'Reviews', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '4', 1, '2019-01-02 22:00:23'),
(4, 1, 0, 'Business Cards', 'joseph', 'Review', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '4', 1, '2019-01-02 22:01:59'),
(5, 1, 0, 'Business Cards', 'test', 'test', 'testing', '4', 1, '2019-01-28 11:18:06'),
(6, 1, 0, 'Business Cards', 'mojo', 'subject here', 'some review', '4', 1, '2019-02-15 11:33:23'),
(7, 1, 0, 'Business Cards', 'qweqwe', 'subject here', 'hererer', '', 1, '2019-02-15 12:02:53'),
(8, 1, 0, 'Business Cards', 'mojo', 'review subject', 'heloooooohelooooooheloooooohelooooooheloooooohelooooooheloooooohelooooooheloooooohelooooooheloooooohelooooooheloooooohelooooooheloooooohelooooooheloooooohelooooooheloooooohelooooooheloooooo', '', 1, '2019-02-15 12:05:38'),
(9, 1, 0, 'Business Cards', 'mojo', 'subject', 'content herererer', '', 1, '2019-02-15 12:11:58'),
(10, 1, 0, 'Business Cards', 'qwert', 'subjjjt', 'asdsadasdasda', '4', 1, '2019-02-15 16:30:57'),
(11, 1, 0, 'Business Cards', 'asdasdas', 'asdasdas', '34213123123123', '', 1, '2019-02-15 16:32:16');

-- --------------------------------------------------------

--
-- Table structure for table `sb_signup`
--

CREATE TABLE `sb_signup` (
  `signup_id` int(11) NOT NULL,
  `signup_fname` varchar(255) NOT NULL,
  `signup_lname` varchar(255) NOT NULL,
  `signup_phone` varchar(255) NOT NULL,
  `signup_email` varchar(255) NOT NULL,
  `signup_password` varchar(255) NOT NULL,
  `signup_company` varchar(255) NOT NULL,
  `signup_profile_image` tinytext NOT NULL,
  `signup_image_path` varchar(255) NOT NULL,
  `signup_country` varchar(255) NOT NULL,
  `signup_status` int(10) NOT NULL DEFAULT '1',
  `signup_createdon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sb_testimonial`
--

CREATE TABLE `sb_testimonial` (
  `testimonial_id` int(10) NOT NULL,
  `testimonial_name` varchar(255) NOT NULL,
  `testimonial_designation` varchar(255) NOT NULL,
  `testimonial_detail` text NOT NULL,
  `testimonial_status` int(10) NOT NULL DEFAULT '0',
  `testimonial_createdon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='to store all testimonial';

-- --------------------------------------------------------

--
-- Table structure for table `sb_user`
--

CREATE TABLE `sb_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_createdon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_status` tinyint(3) UNSIGNED DEFAULT '1',
  `user_email` varchar(256) DEFAULT NULL,
  `user_username` varchar(256) DEFAULT NULL,
  `user_password` varchar(64) DEFAULT NULL,
  `user_profile_image_path` varchar(256) DEFAULT NULL,
  `user_profile_image` varchar(128) DEFAULT NULL,
  `user_title` varchar(128) DEFAULT 'Connoisseur',
  `user_dob` date DEFAULT NULL,
  `user_nameprefix` varchar(4) DEFAULT NULL,
  `user_gender` enum('M','F') DEFAULT NULL,
  `user_newsletter_subscribed` enum('M','F','A') DEFAULT NULL,
  `user_firstname` varchar(256) DEFAULT NULL,
  `user_lastname` varchar(256) DEFAULT NULL,
  `user_message` varchar(256) DEFAULT NULL,
  `user_bussiness_name` varchar(256) DEFAULT NULL,
  `user_bussiness_type` varchar(256) DEFAULT NULL,
  `user_mobile` varchar(32) DEFAULT NULL,
  `user_telephone` varchar(32) DEFAULT NULL,
  `user_telephone2` varchar(32) DEFAULT NULL,
  `user_fax` varchar(32) DEFAULT NULL,
  `user_address1` varchar(256) DEFAULT NULL,
  `user_address2` varchar(256) DEFAULT NULL,
  `user_city` varchar(64) DEFAULT NULL,
  `user_website` varchar(64) DEFAULT NULL,
  `user_company` varchar(64) DEFAULT NULL,
  `user_state` varchar(64) DEFAULT NULL,
  `user_port` varchar(64) DEFAULT NULL,
  `user_url` varchar(256) DEFAULT NULL,
  `user_country` int(10) UNSIGNED DEFAULT NULL,
  `user_xp_gained` int(10) UNSIGNED DEFAULT '0',
  `user_credits_total` int(10) UNSIGNED DEFAULT '0',
  `user_credits_consumed` int(10) UNSIGNED DEFAULT '0',
  `user_subscription` tinyint(4) DEFAULT '0',
  `user_provider_username` varchar(256) DEFAULT '0',
  `user_provider_uid` bigint(20) DEFAULT '0',
  `user_provider_id` tinyint(4) DEFAULT '0' COMMENT '1=FB ; 2+TW',
  `user_is_admin` tinyint(4) DEFAULT '0',
  `user_type` tinyint(4) DEFAULT '0' COMMENT '1=vendor,2=customer,3=member,4=workperk'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Registration USER DATA';

--
-- Dumping data for table `sb_user`
--

INSERT INTO `sb_user` (`user_id`, `user_createdon`, `user_status`, `user_email`, `user_username`, `user_password`, `user_profile_image_path`, `user_profile_image`, `user_title`, `user_dob`, `user_nameprefix`, `user_gender`, `user_newsletter_subscribed`, `user_firstname`, `user_lastname`, `user_message`, `user_bussiness_name`, `user_bussiness_type`, `user_mobile`, `user_telephone`, `user_telephone2`, `user_fax`, `user_address1`, `user_address2`, `user_city`, `user_website`, `user_company`, `user_state`, `user_port`, `user_url`, `user_country`, `user_xp_gained`, `user_credits_total`, `user_credits_consumed`, `user_subscription`, `user_provider_username`, `user_provider_uid`, `user_provider_id`, `user_is_admin`, `user_type`) VALUES
(1, '2015-05-27 11:33:41', 1, 'admin@caqualityprinting.com', 'admin', '84a03aa7d191f6986bed6f5e9af6f260', NULL, NULL, 'Connoisseur', NULL, NULL, NULL, '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', NULL, 0, 0, 0, 0, 0, '0', 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sb_wishlist`
--

CREATE TABLE `sb_wishlist` (
  `wishlist_id` int(10) NOT NULL,
  `banner` varchar(100) DEFAULT NULL,
  `wishlist_product_id` int(10) NOT NULL DEFAULT '0',
  `wishlist_user_id` int(10) NOT NULL DEFAULT '0',
  `wishlist_status` int(10) NOT NULL DEFAULT '1',
  `wishlist_createdon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sb_wishlist`
--

INSERT INTO `sb_wishlist` (`wishlist_id`, `banner`, `wishlist_product_id`, `wishlist_user_id`, `wishlist_status`, `wishlist_createdon`) VALUES
(1, NULL, 17, 2, 1, '2018-06-05 03:07:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sb_addons`
--
ALTER TABLE `sb_addons`
  ADD PRIMARY KEY (`addons_id`),
  ADD KEY `addons_status` (`addons_status`);

--
-- Indexes for table `sb_banner`
--
ALTER TABLE `sb_banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `sb_brochure`
--
ALTER TABLE `sb_brochure`
  ADD PRIMARY KEY (`brochure_id`),
  ADD KEY `brand_status` (`brochure_status`),
  ADD KEY `brand_name` (`brochure_name`),
  ADD KEY `brochure_catalog_id` (`brochure_category_id`),
  ADD KEY `brochure_slug` (`brochure_slug`),
  ADD KEY `brochure_price` (`brochure_price`),
  ADD KEY `brochure_qty_brochure_qty_sold` (`brochure_qty`),
  ADD KEY `brochure_qty` (`brochure_qty`),
  ADD KEY `brochure_qty_brochure_qty_sold_brochure_status` (`brochure_qty`,`brochure_status`);

--
-- Indexes for table `sb_category`
--
ALTER TABLE `sb_category`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `brand_status` (`category_status`),
  ADD KEY `brand_name` (`category_name`),
  ADD KEY `category_slug` (`category_slug`),
  ADD KEY `category_createdon` (`category_createdon`),
  ADD KEY `category_parent_id` (`category_parent_id`),
  ADD KEY `category_id_category_parent_id` (`category_id`,`category_parent_id`);

--
-- Indexes for table `sb_ci_sessions`
--
ALTER TABLE `sb_ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity` (`last_activity`);

--
-- Indexes for table `sb_cms_page`
--
ALTER TABLE `sb_cms_page`
  ADD PRIMARY KEY (`cms_page_id`),
  ADD KEY `cms_page_page` (`cms_page_page`),
  ADD KEY `cms_page_status` (`cms_page_status`);

--
-- Indexes for table `sb_config`
--
ALTER TABLE `sb_config`
  ADD PRIMARY KEY (`config_id`),
  ADD KEY `config_type` (`config_type`);

--
-- Indexes for table `sb_country`
--
ALTER TABLE `sb_country`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `country` (`country`);

--
-- Indexes for table `sb_coupon`
--
ALTER TABLE `sb_coupon`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `sb_inner_banner`
--
ALTER TABLE `sb_inner_banner`
  ADD PRIMARY KEY (`inner_banner_id`);

--
-- Indexes for table `sb_inquiry`
--
ALTER TABLE `sb_inquiry`
  ADD PRIMARY KEY (`inquiry_id`);

--
-- Indexes for table `sb_logo`
--
ALTER TABLE `sb_logo`
  ADD PRIMARY KEY (`logo_id`);

--
-- Indexes for table `sb_newsletter`
--
ALTER TABLE `sb_newsletter`
  ADD PRIMARY KEY (`newsletter_id`),
  ADD KEY `newsletter_status` (`newsletter_status`);

--
-- Indexes for table `sb_order`
--
ALTER TABLE `sb_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `order_status` (`order_status`),
  ADD KEY `order_payment_status` (`order_payment_status`);

--
-- Indexes for table `sb_order_item`
--
ALTER TABLE `sb_order_item`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_item_order_id` (`order_item_order_id`),
  ADD KEY `order_item_product_id` (`order_item_product_id`);

--
-- Indexes for table `sb_payment`
--
ALTER TABLE `sb_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `sb_product`
--
ALTER TABLE `sb_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `brand_status` (`product_status`),
  ADD KEY `brand_name` (`product_name`),
  ADD KEY `product_catalog_id` (`product_category_id`),
  ADD KEY `product_slug` (`product_slug`),
  ADD KEY `product_price` (`product_price`),
  ADD KEY `product_qty_product_qty_sold` (`product_qty`),
  ADD KEY `product_qty` (`product_qty`),
  ADD KEY `product_qty_product_qty_sold_product_status` (`product_qty`,`product_status`);

--
-- Indexes for table `sb_product_binding`
--
ALTER TABLE `sb_product_binding`
  ADD PRIMARY KEY (`product_binding_id`);

--
-- Indexes for table `sb_product_color`
--
ALTER TABLE `sb_product_color`
  ADD PRIMARY KEY (`product_color_id`);

--
-- Indexes for table `sb_product_cover_stock`
--
ALTER TABLE `sb_product_cover_stock`
  ADD PRIMARY KEY (`product_cover_stock_id`);

--
-- Indexes for table `sb_product_drilling`
--
ALTER TABLE `sb_product_drilling`
  ADD PRIMARY KEY (`product_drilling_id`);

--
-- Indexes for table `sb_product_folding`
--
ALTER TABLE `sb_product_folding`
  ADD PRIMARY KEY (`product_folding_id`);

--
-- Indexes for table `sb_product_hole_position`
--
ALTER TABLE `sb_product_hole_position`
  ADD PRIMARY KEY (`product_hole_position_id`);

--
-- Indexes for table `sb_product_image`
--
ALTER TABLE `sb_product_image`
  ADD PRIMARY KEY (`pi_id`),
  ADD KEY `pi_createdon` (`pi_createdon`),
  ADD KEY `pi_product_id` (`pi_product_id`),
  ADD KEY `pi_gm_featured` (`pi_is_featured`);

--
-- Indexes for table `sb_product_inquiry`
--
ALTER TABLE `sb_product_inquiry`
  ADD PRIMARY KEY (`product_inquiry_id`);

--
-- Indexes for table `sb_product_material`
--
ALTER TABLE `sb_product_material`
  ADD PRIMARY KEY (`product_material_id`);

--
-- Indexes for table `sb_product_paper_stock`
--
ALTER TABLE `sb_product_paper_stock`
  ADD PRIMARY KEY (`product_paper_stock_id`);

--
-- Indexes for table `sb_product_sheets_pad`
--
ALTER TABLE `sb_product_sheets_pad`
  ADD PRIMARY KEY (`product_sheets_pad_id`);

--
-- Indexes for table `sb_product_sided`
--
ALTER TABLE `sb_product_sided`
  ADD PRIMARY KEY (`product_sided_id`);

--
-- Indexes for table `sb_product_size`
--
ALTER TABLE `sb_product_size`
  ADD PRIMARY KEY (`product_size_id`);

--
-- Indexes for table `sb_review`
--
ALTER TABLE `sb_review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `sb_signup`
--
ALTER TABLE `sb_signup`
  ADD PRIMARY KEY (`signup_id`);

--
-- Indexes for table `sb_testimonial`
--
ALTER TABLE `sb_testimonial`
  ADD PRIMARY KEY (`testimonial_id`);

--
-- Indexes for table `sb_user`
--
ALTER TABLE `sb_user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_email` (`user_email`),
  ADD KEY `user_username` (`user_username`),
  ADD KEY `user_email_user_password` (`user_email`,`user_password`),
  ADD KEY `user_status_user_email_user_password` (`user_status`,`user_email`,`user_password`);

--
-- Indexes for table `sb_wishlist`
--
ALTER TABLE `sb_wishlist`
  ADD PRIMARY KEY (`wishlist_id`),
  ADD KEY `wishlist_status` (`wishlist_status`),
  ADD KEY `wishlist_user_id` (`wishlist_user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sb_addons`
--
ALTER TABLE `sb_addons`
  MODIFY `addons_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `sb_banner`
--
ALTER TABLE `sb_banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sb_brochure`
--
ALTER TABLE `sb_brochure`
  MODIFY `brochure_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sb_category`
--
ALTER TABLE `sb_category`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `sb_cms_page`
--
ALTER TABLE `sb_cms_page`
  MODIFY `cms_page_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sb_config`
--
ALTER TABLE `sb_config`
  MODIFY `config_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sb_country`
--
ALTER TABLE `sb_country`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `sb_coupon`
--
ALTER TABLE `sb_coupon`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sb_inner_banner`
--
ALTER TABLE `sb_inner_banner`
  MODIFY `inner_banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sb_inquiry`
--
ALTER TABLE `sb_inquiry`
  MODIFY `inquiry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `sb_logo`
--
ALTER TABLE `sb_logo`
  MODIFY `logo_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sb_newsletter`
--
ALTER TABLE `sb_newsletter`
  MODIFY `newsletter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sb_order`
--
ALTER TABLE `sb_order`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sb_order_item`
--
ALTER TABLE `sb_order_item`
  MODIFY `order_item_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sb_payment`
--
ALTER TABLE `sb_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `sb_product`
--
ALTER TABLE `sb_product`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `sb_product_binding`
--
ALTER TABLE `sb_product_binding`
  MODIFY `product_binding_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sb_product_color`
--
ALTER TABLE `sb_product_color`
  MODIFY `product_color_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `sb_product_cover_stock`
--
ALTER TABLE `sb_product_cover_stock`
  MODIFY `product_cover_stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `sb_product_drilling`
--
ALTER TABLE `sb_product_drilling`
  MODIFY `product_drilling_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sb_product_folding`
--
ALTER TABLE `sb_product_folding`
  MODIFY `product_folding_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sb_product_hole_position`
--
ALTER TABLE `sb_product_hole_position`
  MODIFY `product_hole_position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sb_product_image`
--
ALTER TABLE `sb_product_image`
  MODIFY `pi_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sb_product_inquiry`
--
ALTER TABLE `sb_product_inquiry`
  MODIFY `product_inquiry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `sb_product_material`
--
ALTER TABLE `sb_product_material`
  MODIFY `product_material_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sb_product_paper_stock`
--
ALTER TABLE `sb_product_paper_stock`
  MODIFY `product_paper_stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `sb_product_sheets_pad`
--
ALTER TABLE `sb_product_sheets_pad`
  MODIFY `product_sheets_pad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sb_product_sided`
--
ALTER TABLE `sb_product_sided`
  MODIFY `product_sided_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `sb_product_size`
--
ALTER TABLE `sb_product_size`
  MODIFY `product_size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `sb_review`
--
ALTER TABLE `sb_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sb_signup`
--
ALTER TABLE `sb_signup`
  MODIFY `signup_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sb_testimonial`
--
ALTER TABLE `sb_testimonial`
  MODIFY `testimonial_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sb_user`
--
ALTER TABLE `sb_user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sb_wishlist`
--
ALTER TABLE `sb_wishlist`
  MODIFY `wishlist_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
