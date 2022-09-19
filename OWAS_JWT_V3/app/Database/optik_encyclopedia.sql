-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 19, 2022 at 10:22 AM
-- Server version: 8.0.23
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drug_encyclopedia`
--
CREATE DATABASE IF NOT EXISTS `drug_encyclopedia` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `drug_encyclopedia`;

-- --------------------------------------------------------

--
-- Table structure for table `drug`
--

CREATE TABLE `drug` (
  `drug_id` int NOT NULL,
  `drug_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `drug_side_effects` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `isActive` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag_name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `actionBy` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `actionTime` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdAt` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drug`
--

INSERT INTO `drug` (`drug_id`, `drug_name`, `drug_side_effects`, `isActive`, `tag_id`, `tag_name`, `action`, `actionBy`, `actionTime`, `createdAt`) VALUES
(52, 'Limcee Vitamin Cba', 'hscbfhdskafbdffvcx', 'N', '30', 'amoxilin', 'D', 'darshana', '09/14/2022 08:49:30 am', ''),
(53, 'wikoril 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum#s#Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'Y', '30,29,28', 'amoxilin,dolo,croncin', 'Re-active', 'darshana', '09/07/2022 06:49:28 am', ''),
(54, 'amoxilin 500mg', 'ASDFGHJQASDFGHJK#s#Lorem ipsum dolor sit amet, con...', 'Y', '30', 'amoxilin', '', '', '', ''),
(55, 'Omi D 10mg/20mg Tablet', 'Most side effects do not require any medical attention and disappear as your body adjusts to the medicine. Consult your doctor if they persist or if you’re worried about them#s#Diarrhea#s#Dryness in mouth , Headache, Flatulence#s#Stomach pain', 'Y', '28', 'croncin', '', '', '', ''),
(65, 'Becosules Capsule 20\'s', 'If you are taking any other medicines or diet supplements, it is advised to inform your doctor to prevent drug interaction.#s#It is generally safe and doesn’t cause any side effects if used as prescribed. However, if you experience any side effects, please consult a doctor', 'Y', '43', 'Vitamin', '', '', '', ''),
(66, 'Maxtra', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum#s#Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'Y', '28,27', 'croncin,Paracitemol 1', '', '', '', ''),
(67, 'Cetrizine', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'Y', '27', 'Paracitemol 1', 'Re-active', 'darshana', '08/12/2022 01:05:02 am', ''),
(69, 'Demerol', '&lt;p&gt;&lt;a class=&quot;crossLinked&quot; href=&quot;https://www.webmd.com/digestive-disorders/digestive-diseases-nausea-vomiting&quot;&gt;&lt;strong&gt;Nausea&lt;/strong&gt;&lt;/a&gt;&lt;strong&gt;,&amp;nbsp;&lt;a class=&quot;crossLinked&quot; href=&quot;https://www.webmd.com/digestive-disorders/digestive-diseases-nausea-vomiting&quot;&gt;vomiting&lt;/a&gt;,&amp;nbsp;&lt;a class=&quot;crossLinked&quot; href=&quot;https://www.webmd.com/digestive-disorders/digestive-diseases-constipation&quot;&gt;constipation&lt;/a&gt;,&amp;nbsp;&lt;a class=&quot;crossLinked&quot; href=&quot;https://www.webmd.com/skin-problems-and-treatments/hyperhidrosis2&quot;&gt;sweating&lt;/a&gt;,&amp;nbsp;&lt;a class=&quot;crossLinked&quot; href=&quot;https://www.webmd.com/brain/tc/dizziness-lightheadedness-and-vertigo-topic-overview&quot;&gt;lightheadedness&lt;/a&gt;,&amp;nbsp;&lt;a class=&quot;crossLinked&quot; href=&quot;https://www.webmd.com/first-aid/understanding-dizziness-basics&quot;&gt;dizziness&lt;/a&gt;&lt;/strong&gt;, drowsiness, or pain/redness at the injection site may occur. If any of these effects persist or worsen, tell your doctor or&amp;nbsp;&lt;strong&gt;&lt;a class=&quot;crossLinked&quot; href=&quot;https://www.webmd.com/a-to-z-guides/features/pharmacists-they-do-more-than-fill-prescriptions&quot;&gt;pharmacist&lt;/a&gt;&amp;nbsp;&lt;/strong&gt;promptly.&lt;/p&gt;\r\n&lt;p&gt;To&amp;nbsp;&lt;a class=&quot;crossLinked&quot; href=&quot;https://www.webmd.com/digestive-disorders/eat-healthy-exercise&quot;&gt;prevent constipation&lt;/a&gt;, eat&amp;nbsp;&lt;a class=&quot;crossLinked&quot; href=&quot;https://www.webmd.com/vitamins-and-supplements/supplement-guide-fiber&quot;&gt;dietary fiber&lt;/a&gt;, drink enough water, and&amp;nbsp;&lt;a class=&quot;crossLinked&quot; href=&quot;https://www.webmd.com/fitness-exercise/ss/slideshow-7-most-effective-exercises&quot;&gt;exercise&lt;/a&gt;. You may also need to take a&amp;nbsp;&lt;a class=&quot;crossLinked&quot; href=&quot;https://www.webmd.com/digestive-disorders/chronic-constipation-7/laxative-safety&quot;&gt;laxative&lt;/a&gt;. Ask your pharmacist which type of&amp;nbsp;&lt;a class=&quot;crossLinked&quot; href=&quot;https://www.webmd.com/digestive-disorders/laxatives-for-constipation-using-them-safely&quot;&gt;laxative&lt;/a&gt;&amp;nbsp;is right for you.&lt;/p&gt;\r\n&lt;p&gt;To reduce the risk of dizziness and&amp;nbsp;&lt;a class=&quot;crossLinked&quot; href=&quot;https://www.webmd.com/first-aid/understanding-dizziness-basics&quot;&gt;lightheadedness&lt;/a&gt;, get up slowly when rising from a sitting or lying position.&lt;/p&gt;\r\n&lt;p class=&quot;udpated-para-lazy&quot;&gt;Remember that this&amp;nbsp;&lt;a class=&quot;crossLinked&quot; href=&quot;https://www.webmd.com/drugs/index-drugs.aspx&quot;&gt;medication&lt;/a&gt; has been prescribed because your doctor has judged that the benefit to you is greater than the risk of side effects. Many people using this medication do not have serious side effects.&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;lightheadedness&lt;/li&gt;\r\n&lt;li&gt;headache&lt;/li&gt;\r\n&lt;li&gt;agitation&lt;/li&gt;\r\n&lt;li&gt;constipation&lt;/li&gt;\r\n&lt;li&gt;uncontrollable shaking of a part of your body&lt;/li&gt;\r\n&lt;li&gt;blurred vision&lt;/li&gt;\r\n&lt;li&gt;dry mouth&lt;/li&gt;\r\n&lt;li&gt;&amp;nbsp;&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;', 'Y', '5204,5202', 'croncin,dolo', 'E', 'darshana', '08/01/2022 09:18:32 am', ''),
(70, 'PAN 40 Tablet', '&lt;p&gt;&amp;lt;ul&amp;gt;&lt;/p&gt;\r\n&lt;p&gt;&amp;lt;li&amp;gt;headache&amp;lt;/li&amp;gt;&lt;/p&gt;\r\n&lt;p&gt;&amp;lt;li&amp;gt;nausea&amp;lt;/li&amp;gt;&lt;/p&gt;\r\n&lt;p&gt;&amp;lt;li&amp;gt;vomating&amp;lt;/li&amp;gt;&lt;/p&gt;\r\n&lt;p&gt;&amp;lt;/ul&amp;gt;&lt;/p&gt;', 'Y', 'NA', 'amoxilin, PAN', '', '', '', ''),
(82, 'Limcee Vitamin Cba', '', 'Y', '5198,5172', 'tag, paracetemol', 'C', 'darshana', '07/27/2022 03:36:51 am', '07/27/2022 03:36:51 am'),
(83, 'croncin', '', 'Y', '5161,5172', 'paracetemol, crocin', 'C', 'darshana', '07/27/2022 03:37:44 am', '07/27/2022 03:37:44 am'),
(86, 'amoxilin 100mg', '&lt;p&gt;Along with its needed effects, a medicine may cause some unwanted effects. Although not all of these side effects may occur, if they do occur they may need medical attention.&lt;/p&gt;\r\n&lt;p&gt;Check with your doctor immediately if any of the following side effects occur:&lt;/p&gt;\r\n&lt;div id=&quot;ad-mobile-top-container&quot;&gt;&lt;/div&gt;\r\n&lt;h4&gt;Incidence not known&lt;/h4&gt;\r\n&lt;ol class=&quot;bullet&quot;&gt;\r\n&lt;li&gt;Abdominal or stomach cramps or tenderness&lt;/li&gt;\r\n&lt;li&gt;back, leg, or stomach pains&lt;/li&gt;\r\n&lt;li&gt;black, tarry stools&lt;/li&gt;\r\n&lt;li&gt;bleeding gums&lt;/li&gt;\r\n&lt;li&gt;blistering, peeling, or loosening of the skin&lt;/li&gt;\r\n&lt;li&gt;bloating&lt;/li&gt;\r\n&lt;li&gt;blood in the urine&lt;/li&gt;\r\n&lt;li&gt;bloody nose&lt;/li&gt;\r\n&lt;li&gt;chest pain&lt;/li&gt;\r\n&lt;li&gt;chills&lt;/li&gt;\r\n&lt;li&gt;clay-colored stools&lt;/li&gt;\r\n&lt;li&gt;cough&lt;/li&gt;\r\n&lt;li&gt;dark urine&lt;/li&gt;\r\n&lt;li&gt;diarrhea&lt;/li&gt;\r\n&lt;/ol&gt;', 'Y', '5205,5206', 'amoxilin, paracetemol', 'C', 'darshana', '08/02/2022 08:22:40 am', '08/02/2022 08:22:40 am'),
(87, 'dolo', '&lt;p&gt;lomcjhdbfnjkaasdfg&lt;/p&gt;', 'Y', '5205,5161,5198', 'amoxilin, paracetemol, tag', 'C', 'darshana', '08/03/2022 07:20:25 am', '08/03/2022 07:20:25 am'),
(88, 'vitamin c', '&lt;p&gt;When taken at appropriate doses, oral vitamin C supplements are generally considered safe. Taking too much vitamin C can cause side effects, including:&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Nausea, vomiting and diarrhea&lt;/li&gt;\r\n	&lt;li&gt;Heartburn&lt;/li&gt;\r\n	&lt;li&gt;Stomach cramps or bloating&lt;/li&gt;\r\n	&lt;li&gt;Fatigue and sleepiness, or sometimes insomnia&lt;/li&gt;\r\n	&lt;li&gt;Headache&lt;/li&gt;\r\n	&lt;li&gt;Skin flushing&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;In some people, oral vitamin C supplements can cause kidney stones, especially when taken in high doses. Long-term use of oral vitamin C supplements over 2,000 milligrams a day increases the risk of significant side effects.&lt;/p&gt;\r\n\r\n&lt;p&gt;Tell your doctor that you&amp;#39;re taking vitamin C supplements before having any medical tests. High levels of vitamin C might interfere with the results of certain tests, such as stool tests for occult blood or glucose screening tests.&lt;/p&gt;\r\n', 'Y', '5207', 'vitamin', 'E', 'darshana', '08/12/2022 12:21:11 am', '08/03/2022 07:23:14 am'),
(89, 'vitamin d', '&lt;p&gt;&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;&lt;/p&gt;', 'Y', '5207,5205,5208', 'vitamin, amoxilin, dvitamin', 'E', 'darshana', '08/03/2022 11:43:51 pm', '08/03/2022 07:25:04 am'),
(90, 'stamlo', '&lt;p&gt;&amp;quot;&lt;strong&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna&lt;/strong&gt; aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&amp;quot;&lt;/p&gt;\r\n\r\n&lt;p&gt;sunt in culpa qui officia deserunt mollit anim id est laborum&lt;/p&gt;\r\n\r\n&lt;p&gt;sunt in culpa qui officia deserunt mollit anim id est laborum&lt;/p&gt;\r\n\r\n&lt;p&gt;sunt in culpa qui officia deserunt mollit anim id est laborum&lt;/p&gt;\r\n', 'Y', '5205,5209,5210', 'amoxilin, stbp, tabst', 'E', 'darshana', '09/06/2022 03:39:50 am', '08/04/2022 05:29:20 am'),
(101, 'test_abc2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Y', '5213', 'Amlodipine', 'Re-active', 'darshana', '09/06/2022 04:06:50 am', '09/05/2022 08:47:25 am'),
(102, 'test1', '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&lt;/p&gt;\r\n', 'Y', '5213', 'Amlodipine', 'Re-active', 'darshana', '09/12/2022 04:04:16 am', '09/07/2022 12:30:24 am'),
(103, 'candid', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Y', '5213', 'Amlodipine', 'Re-active', 'darshana', '09/07/2022 01:44:00 am', '09/07/2022 01:37:10 am'),
(104, 'candid tv', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Y', '5213', 'Amlodipine', 'Re-active', 'darshana', '09/08/2022 12:55:05 am', '09/08/2022 12:04:28 am'),
(107, 'britesite', '&lt;p&gt;&amp;quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&amp;quot;&lt;/p&gt;\r\n', 'Y', '5213,5215', 'Amlodipine, ww', 'E', 'darshana', '09/09/2022 02:13:17 am', '09/09/2022 02:13:17 am'),
(108, 'candid lotion', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Y', '5217', 'candid', 'E', 'darshana', '09/09/2022 03:32:36 am', '09/09/2022 02:15:11 am'),
(109, 'test', 'am', 'N', '5213', 'Amlodipine', 'D', 'darshana', '09/14/2022 07:51:27 am', '09/13/2022 11:40:33 pm'),
(110, ' Fentanyl ', '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&lt;/p&gt;\r\n', 'N', '5213,5218', 'Amlodipine, test', 'D', 'darshana', '09/14/2022 08:48:43 am', '09/14/2022 08:46:24 am');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` char(1) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2022-07-12-050200', 'App\\Database\\Migrations\\User', 'default', 'App', 1657602387, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `tag_id` int NOT NULL,
  `tag` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `isActive` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdAt` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`tag_id`, `tag`, `isActive`, `createdAt`) VALUES
(5161, 'paracetemol', 'Y', '26-07-22 04:52:16'),
(5162, 'dolo', 'Y', '26-07-22 04:56:54'),
(5164, 'tag1', 'Y', '26-07-22 05:00:40'),
(5172, 'A', 'Y', '26-07-22 06:55:03'),
(5198, 'tag', 'Y', '27-07-22 03:29:10'),
(5201, 'crocin', 'Y', '27-07-22 03:39:11'),
(5202, 'r', 'Y', '27-07-22 04:33:43'),
(5203, 'tag3', 'Y', '27-07-22 04:38:43'),
(5204, 'croncin', 'Y', '01-08-22 09:18:32'),
(5205, 'amoxilin', 'Y', '02-08-22 08:20:57'),
(5206, 'm', 'Y', '02-08-22 08:20:57'),
(5207, 'vitamin', 'Y', '03-08-22 07:23:14'),
(5208, 'dvitamin', 'Y', '03-08-22 07:25:04'),
(5209, 'stbp', 'Y', '04-08-22 05:29:20'),
(5210, 'tabst', 'Y', '04-08-22 05:30:34'),
(5211, 'tga', 'Y', '12-08-22 12:23:55'),
(5212, 'hello', 'Y', '16-08-22 02:45:33'),
(5213, 'Amlodipine', 'Y', '01-09-22 02:18:37'),
(5214, '', 'Y', '09-09-22 01:58:57'),
(5215, 'ww', 'Y', '09-09-22 02:13:17'),
(5216, 'amm', 'Y', '09-09-22 02:15:11'),
(5217, 'candid', 'Y', '09-09-22 02:30:43'),
(5218, 'test', 'Y', '14-09-22 08:47:27');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` varchar(250) DEFAULT NULL,
  `isActive` char(1) DEFAULT NULL,
  `isDeleted` char(1) DEFAULT NULL,
  `user_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `created_at`, `updated_at`, `isActive`, `isDeleted`, `user_name`) VALUES
(1, 'darshana9496@gmail.com', 'bd724b0f00ea453fcfb4be6599e98484', NULL, '09/13/2022 11:58:45 pm', '1', NULL, 'darshana');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `drug`
--
ALTER TABLE `drug`
  ADD PRIMARY KEY (`drug_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `drug`
--
ALTER TABLE `drug`
  MODIFY `drug_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `tag_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5219;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
