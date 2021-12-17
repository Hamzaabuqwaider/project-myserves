-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2021 at 09:03 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `khidma`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chat_id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `opened` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chat_id`, `from_id`, `to_id`, `message`, `opened`, `created_at`) VALUES
(23, 1, 6, 'مرحبا انا خالد', 1, '12:23:50'),
(24, 6, 1, 'انا عثمان', 1, '12:26:24'),
(25, 1, 6, 'اوك', 1, '12:34:50'),
(26, 1, 6, 'نننن', 1, '12:36:48'),
(27, 1, 6, 'ythjgfftg', 1, '12:39:02'),
(28, 6, 1, 'بحبك', 1, '12:40:53'),
(29, 6, 1, 'مجمد', 1, '12:44:09'),
(30, 1, 6, '555555555555555555', 1, '12:46:13'),
(31, 1, 6, 'jhjhghjgjh', 1, '13:11:01'),
(32, 6, 1, 'jjjjjj', 1, '13:11:41'),
(33, 1, 6, 'مرحبا أنا خالد', 1, '13:14:57'),
(34, 6, 1, 'انا عثمان', 1, '13:15:34'),
(35, 1, 6, 'انا خالد', 1, '13:22:23'),
(36, 1, 6, '555555', 1, '13:35:29'),
(37, 1, 6, '55555', 1, '13:36:00'),
(38, 6, 1, 'ممممممممممم', 1, '13:36:12'),
(39, 1, 6, '555555555', 1, '14:13:16'),
(40, 1, 6, 'انا خالد', 1, '00:21:21'),
(41, 6, 1, 'انا عثمان', 1, '00:22:49'),
(42, 1, 6, 'hellow\n', 1, '00:30:13'),
(43, 6, 1, 'محمد', 1, '00:30:35'),
(44, 1, 6, 'hiك', 1, '00:30:55'),
(45, 1, 6, 'lpl]\n', 1, '00:34:56'),
(46, 1, 6, 'khaled', 1, '00:36:06'),
(47, 6, 1, 'othman', 1, '00:36:53'),
(48, 1, 6, 'hi', 1, '00:37:02'),
(49, 1, 6, 'hi', 1, '00:38:47'),
(50, 6, 1, 'ayham', 1, '00:39:17'),
(51, 6, 1, 'othman name', 1, '00:42:33'),
(52, 1, 6, 'khaaled name', 1, '00:43:01'),
(53, 1, 6, 'khaled', 1, '00:46:56'),
(54, 6, 1, 'othman', 1, '00:47:09'),
(55, 6, 1, 'my name is othman ', 1, '00:47:33'),
(56, 1, 6, 'my name is khaled', 1, '00:47:49'),
(57, 1, 6, 'abu ghazal', 1, '00:49:14'),
(58, 6, 1, 'ayham', 1, '00:49:22'),
(59, 1, 6, 'هههههههههههههههههههههههههههههههههههههههههههههههههههههه', 1, '00:51:15'),
(60, 6, 1, 'اووووووووووووووووووووك', 1, '00:51:30'),
(61, 6, 1, 'انا عثمان', 1, '20:57:56'),
(62, 1, 6, 'انا خالد', 1, '20:58:10'),
(63, 1, 6, 'l;;l;l', 1, '22:01:46');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `comment_user` int(11) NOT NULL,
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL,
  `post_id` int(11) NOT NULL,
  `commented_on` date NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `comment_user`, `comment`, `post_id`, `commented_on`, `created_at`) VALUES
(28, 6, 'غزال بدو يتجوز', 41, '2021-11-06', '2021-11-06 18:37:48'),
(29, 6, 'محمد', 41, '2021-11-13', '2021-11-13 19:12:15');

-- --------------------------------------------------------

--
-- Table structure for table `comment_replies`
--

CREATE TABLE `comment_replies` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comt_id` int(11) NOT NULL,
  `reply_msg` varchar(255) NOT NULL,
  `commented_on` date NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment_replies`
--

INSERT INTO `comment_replies` (`id`, `user_id`, `comt_id`, `reply_msg`, `commented_on`, `created_at`) VALUES
(1, 6, 11, 'n,.', '2021-11-06', '2021-11-06 16:42:16'),
(2, 6, 11, 'hj,j,hj,j', '2021-11-06', '2021-11-06 16:42:41'),
(3, 6, 11, '@hamza bjumhmhjm', '2021-11-06', '2021-11-06 16:42:57'),
(4, 6, 28, 'حا عن رئي', '2021-11-06', '2021-11-06 18:38:05'),
(5, 6, 29, 'بدو', '2021-11-13', '2021-11-13 19:12:23'),
(6, 6, 29, '@hamza يخطب', '2021-11-13', '2021-11-13 19:12:38');

-- --------------------------------------------------------

--
-- Table structure for table `conversation`
--

CREATE TABLE `conversation` (
  `conversation_id` int(11) NOT NULL,
  `user_1` int(11) NOT NULL,
  `user_2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `conversation`
--

INSERT INTO `conversation` (`conversation_id`, `user_1`, `user_2`) VALUES
(1, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `main_categories`
--

CREATE TABLE `main_categories` (
  `id` int(11) NOT NULL,
  `title_cat` varchar(255) NOT NULL,
  `type` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT 'F'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `main_categories`
--

INSERT INTO `main_categories` (`id`, `title_cat`, `type`) VALUES
(2, 'صيانة مركبات ', 'S'),
(6, 'صرف صحي', 'S'),
(7, 'كهرباء', 'S'),
(8, 'فلاتر مياه ', 'S'),
(9, 'أثاث', 'S'),
(10, 'الأعمال', 'F'),
(11, 'برمجة و تطوير ', 'F'),
(12, 'دورات عن بعد ', 'F'),
(13, 'تصميم ', 'F');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `post_name` varchar(100) NOT NULL,
  `post_id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `to_id`, `post_name`, `post_id`, `from_id`, `price`) VALUES
(46, 6, 'خرا', 41, 9, 0),
(197, 6, 'كهرباء طاقة شمسية', 42, 1, 0),
(198, 6, 'كهرباء طاقة شمسية', 42, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `Keyword` varchar(25) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `body`, `category_id`, `user_id`, `img`, `Keyword`) VALUES
(2, 'roll games', 'learning the game', 4, 2, '', ''),
(25, 'استخراج البيانات 11111', 'edfefdwef', 23, 1, '89857_23437_61da7186-0154-4f59-a2b9-6b4cefd58f48.jpg', ''),
(32, 'java programming ', 'deffgrferge', 11, 1, '78732_48344_hamzahQQQ.jpg', 'fgsdg'),
(34, 'electronic', 'elecronic city', 7, 1, '13753_deal-master-fundamentals-android-programming.jpg', 'Elc'),
(39, 'كهربائيات', 'بسشبشسب', 22, 6, '71981_pexels-timea-kadar-2659515.jpg', 'سبشسل'),
(40, 'سبش', 'تمديد كهرباء', 8, 6, '39993_0eb94d1a-104f-4457-b702-c9d13f0c3609.jpg', 'سبشبشسب'),
(41, 'خرا', 'بيبيسبيس', 7, 6, '30042_4cfabeee-41b0-4c43-ad32-d44e1c65f5b8.jpg', 'يؤيسؤ'),
(42, 'كهرباء طاقة شمسية', 'ببببببببببببببببب', 8, 6, '79506_71981_pexels-timea-kadar-2659515.jpg', 'قبرثقثقب');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `Name`, `parent_id`) VALUES
(3, 'ميكانيكي عام ', 2),
(4, 'كهربائي مركبات ', 2),
(6, 'قطع صرف صحي', 6),
(7, 'تركيب مضخات مياه ', 6),
(8, 'كهربائي مشاريع ', 7),
(9, 'تركيب تمديدات طاقه شمسيه ', 6),
(10, 'تركيب فلاترمياه ', 8),
(11, 'صيانة فلاتر ', 8),
(16, 'تركيب محطاة فلاتر', 8),
(17, 'غرف نوم', 9),
(18, 'ابواب خشب', 9),
(19, 'ثلاجات ', 9),
(20, 'فرن منزلي', 9),
(21, 'مهندس كهرباء', 7),
(22, 'اختصاصي كهربائي منازل', 7),
(23, 'ادخال بيانات ', 10),
(24, 'تجاره الكترونيه ', 10),
(25, 'خدمات ماليه ', 10),
(27, 'السيرفرات', 11),
(28, 'برمجة واجهات اماميه Front-End', 11),
(29, 'برمجة Java \r\n', 11),
(30, 'برمجة Php ', 11),
(31, 'تعلم البرمجه ', 12),
(32, 'تعلم الستويق الإلكتروني', 12),
(33, 'تلعم اللغات ', 12),
(34, 'تصميم واجهات اعلاميه ', 13),
(35, 'تصميم معماري', 13);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `type` int(2) NOT NULL DEFAULT 1,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Email` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `Response` datetime DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `date_birth` date DEFAULT NULL,
  `imgg` varchar(255) NOT NULL DEFAULT 'img.png',
  `Response_speed` time NOT NULL DEFAULT current_timestamp(),
  `date` date DEFAULT NULL,
  `last_seen` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `name`, `password`, `Email`, `Response`, `first_name`, `last_name`, `gender`, `date_birth`, `imgg`, `Response_speed`, `date`, `last_seen`) VALUES
(1, 1, 'khaled', '202cb962ac59075b964b07152d234b70', 'khaled99@mail.com', '2021-08-04 04:20:03', 'خالد', 'التعمري', 'ذكر', '2000-10-07', '61da7186-0154-4f59-a2b9-6b4cefd58f48.jpg', '18:29:03', NULL, '2021-11-13 19:10:18'),
(2, 1, 'ayham', '81dc9bdb52d04dc20036dbd8313ed055', 'ayham@mail.com', '2021-08-19 00:00:00', 'أيهم', 'الخلايلة', '', NULL, '', '18:29:03', NULL, NULL),
(6, 1, 'Othman', '827ccb0eea8a706c4c34a16891f84e7b', 'Othman@mail.com', '2021-08-19 00:00:00', 'عثمان', 'ابو قويدر ', 'ذكر', '1999-08-21', '48344_hamzahQQQ.jpg', '18:29:03', NULL, '2021-11-12 22:31:00'),
(8, 1, 'loai', '25f9e794323b453885f5181f1b624d0b', 'loai@gmail.com', NULL, '', '', '', NULL, '', '22:49:41', '2021-10-13', NULL),
(9, 2, 'moath', '827ccb0eea8a706c4c34a16891f84e7b', 'moath@mail.com', NULL, '', '', '', NULL, '', '22:55:50', '2021-10-13', NULL),
(10, 2, 'osama', 'c853f22f272423b6696cac4d46e20335', 'osama@mail.com', NULL, '', '', '', NULL, '', '17:05:08', '2021-10-14', NULL),
(11, 2, 'alii', '81dc9bdb52d04dc20036dbd8313ed055', 'ali@gmail.com', NULL, 'alii', 'ahamd', 'ذكر', '2021-12-02', '71981_pexels-timea-kadar-2659515.jpg', '20:49:32', '2021-11-12', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chat_id`),
  ADD KEY `to_id` (`to_id`),
  ADD KEY `from_id` (`from_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comment_ibfk_1` (`comment_user`),
  ADD KEY `comment_ibfk_2` (`post_id`);

--
-- Indexes for table `comment_replies`
--
ALTER TABLE `comment_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `comt_id` (`comt_id`);

--
-- Indexes for table `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`conversation_id`),
  ADD KEY `user_1` (`user_1`),
  ADD KEY `user_2` (`user_2`);

--
-- Indexes for table `main_categories`
--
ALTER TABLE `main_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_ibfk_1` (`to_id`),
  ADD KEY `from_id` (`from_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `comment_replies`
--
ALTER TABLE `comment_replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `conversation`
--
ALTER TABLE `conversation`
  MODIFY `conversation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `main_categories`
--
ALTER TABLE `main_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`to_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `chat_ibfk_2` FOREIGN KEY (`from_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`comment_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`to_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`from_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `sub_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `sub_category_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `main_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
