-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2021 at 02:42 AM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `img` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT 'img.png',
  `date_add` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `email`, `Password`, `img`, `date_add`) VALUES
(1, 'حمزة بلال قويدر', 'mohmmad@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '19430_2879_فلاتر.jpg', '2021-12-31'),
(2, 'محمد', 'Yazen@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '83826_', '2021-12-31');

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
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chat_id`, `from_id`, `to_id`, `message`, `opened`, `created_at`) VALUES
(8, 16, 16, 'اهلين', 1, '2021-12-17'),
(9, 16, 16, 'منيح', 1, '2021-12-17'),
(10, 16, 16, 'مرحب', 1, '2021-12-17'),
(13, 24, 24, 'k;kl', 1, '2021-12-31'),
(14, 24, 24, 'مرحبا', 1, '2021-12-31');

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
(124, 22, 'مرحبا', 70, '2021-12-30', '2021-12-30 19:35:05'),
(125, 22, 'ممتاز و ملتزم بالوقت', 72, '2021-12-30', '2021-12-30 20:52:12');

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
(6, 6, 29, '@hamza يخطب', '2021-11-13', '2021-11-13 19:12:38'),
(7, 16, 122, 'Ø£Ù‡Ù„ÙŠÙ†', '2021-12-17', '2021-12-17 17:23:04'),
(8, 22, 126, 'jjjjjj', '2021-12-31', '2021-12-30 22:47:00');

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
(1, 6, 1),
(2, 16, 16),
(3, 20, 16),
(4, 19, 19),
(5, 24, 24);

-- --------------------------------------------------------

--
-- Table structure for table `main_categories`
--

CREATE TABLE `main_categories` (
  `id` int(11) NOT NULL,
  `title_cat` varchar(255) NOT NULL,
  `type` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT 'F',
  `Date_create` date NOT NULL DEFAULT current_timestamp(),
  `RegStatus` int(11) NOT NULL DEFAULT 0,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `main_categories`
--

INSERT INTO `main_categories` (`id`, `title_cat`, `type`, `Date_create`, `RegStatus`, `img`) VALUES
(25, 'أعمال', 'F', '2021-12-18', 1, '0'),
(26, 'برمجة وتطوير', 'F', '2021-12-18', 1, '0'),
(27, 'تسويق الكتروني', 'F', '2021-12-18', 1, 'pexels-kaboompics-com-6224.jpg'),
(28, 'تدريب عن بعد', 'F', '2021-12-18', 1, '0'),
(29, 'تصميم فيديو', 'F', '2021-12-18', 1, 'pexels-kaboompics-com-6224.jpg'),
(30, 'تصميم', 'F', '2021-12-18', 0, 'pexels-kaboompics-com-6224.jpg'),
(31, 'كهرباء', 'S', '2021-12-18', 0, 'pexels-kaboompics-com-6224.jpg'),
(32, 'صيانة سيارات', 'S', '2021-12-18', 0, 'pexels-kaboompics-com-6224.jpg'),
(33, 'ادوات اعمار', 'S', '2021-12-18', 0, '0'),
(34, 'خدمات اخرى', 'S', '2021-12-18', 1, 'pexels-kaboompics-com-6224.jpg'),
(35, 'تصليح أجهزة ', 'F', '2021-12-31', 1, 'pexels-kaboompics-com-6224.jpg'),
(36, 'تصميم أجهزة html', 'S', '2021-12-31', 0, 'pexels-kaboompics-com-6224.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Message` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp(),
  `note_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `Email`, `Message`, `Date`, `note_user`) VALUES
(1, 'mohmmad@gmail.com', 'مرحبا', '2021-12-14', 16);

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
(181, 16, 'برمجة html', 70, 22, 527),
(182, 16, 'تنسيق متجرك ', 72, 24, 11),
(183, 16, 'تنسيق متجرك ', 72, 24, 11),
(184, 16, 'تنسيق متجرك ', 72, 24, 12),
(186, 26, 'استخراج البيانات 2', 74, 21, 60281),
(188, 16, 'برمجة htmld', 71, 26, 527),
(189, 16, 'برمجة htmld', 71, 26, 527),
(190, 16, 'برمجة htmld', 71, 26, 950);

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
  `main_title` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `Keyword` varchar(25) CHARACTER SET utf8 NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `RegStatus` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `body`, `category_id`, `user_id`, `main_title`, `img`, `Keyword`, `date`, `RegStatus`) VALUES
(70, 'برمجة html', 'برمجة مواقع الانترنت ', 43, 16, 'تصميم فيديو', '46647_21929_pexels-luis-gomes-546819.jpg', '', '2021-12-27', 1),
(71, 'برمجة htmld', 'مبرمج مواقع الانترنت', 43, 16, 'تصميم فيديو', '53742_21929_pexels-luis-gomes-546819.jpg', '', '2021-12-29', 1),
(72, 'تنسيق متجرك ', 'السلام عليكم\r\nلدي العديد من الاعمال على منصة سلة باستخدام css\r\n\r\nسوف اقوم بمقابل 5 دولار بتنسيق الهيدر والفوتر وسوف اعمل على تسليم الكود لكم\r\nميزات التصميم\r\nملائم للزوار بهوية مخصصة و بنرات وسلايدات تجذب بها اهتمام العملاء\r\nباستخدام css متخصصة وسوف أقوم بأرسال لك الكود مع شرح كامل للكود مع دعم فنى مميز لكم بعد انتهاء الخدمة\r\nايرجى عدم طلب الخدمة الا اذا كانت عندكم شروط سلة ( الباقة برو + دومين .com )', 43, 16, 'تصميم فيديو', '72146_27618_pexels-cottonbro-3584973.jpg', '', '2021-12-30', 1),
(73, 'استخراج البيانات ', 'adsgasgas', 43, 24, 'برمجة وتطوير', '57685_100_pexels-marc-mueller-325111.jpg', '', '2021-12-31', 1),
(74, 'استخراج البيانات 2', 'cxhshdshs', 43, 26, 'برمجة وتطوير', '10967_100_pexels-marc-mueller-325111.jpg', '', '2021-12-31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `number_rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `post_id`, `user_id`, `number_rating`) VALUES
(1, 70, 21, 2),
(2, 71, 21, 5),
(3, 70, 22, 1),
(5, 72, 22, 4),
(6, 71, 22, 2),
(7, 70, 25, 5),
(8, 72, 25, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `Name`, `parent_id`, `created_at`) VALUES
(37, 'ادخال بيانات', 25, '2021-12-18'),
(38, 'استشارات أعمال', 25, '2021-12-18'),
(39, 'تجارة الكترونية', 25, '2021-12-18'),
(40, 'خدمات قانونية', 25, '2021-12-18'),
(41, 'أنظمة ادارة المحتوى', 26, '2021-12-18'),
(42, 'اختبارات تجريبية', 26, '2021-12-18'),
(43, 'برمجة CSS و HTML', 26, '2021-12-18'),
(44, 'إعلانات المواقع', 27, '2021-12-18'),
(45, 'استشارات تسويقية', 27, '2021-12-18'),
(46, 'الإعلانات والتسويق على الجوال', 27, '2021-12-18'),
(47, 'استشارات شخصية', 28, '2021-12-18'),
(48, 'الصحة واللياقة البدنية', 28, '2021-12-18'),
(49, 'تعلم البرمجة', 28, '2021-12-18'),
(50, 'تصميم صور متحركة', 29, '2021-12-18'),
(51, 'تصميم مقدمات فيديو', 29, '2021-12-18'),
(52, 'موشن جرافيك', 29, '2021-12-18'),
(53, 'أغلفة كتب ومجلات', 30, '2021-12-18'),
(54, 'تصميم بانرات إعلانية', 30, '2021-12-18'),
(55, 'تصميم بطاقات أعمال', 30, '2021-12-18'),
(56, 'صيانة محركات كهربائية', 31, '2021-12-18'),
(57, 'كهربائي منازل', 31, '2021-12-18'),
(58, 'كهربائي مشاريع', 31, '2021-12-18'),
(59, 'ميكانيكي عام', 32, '2021-12-18'),
(60, 'كهرباء سيارات', 32, '2021-12-18'),
(61, 'دهان سيارات', 32, '2021-12-18'),
(62, 'مهندس مدني', 33, '2021-12-18'),
(63, 'مدير مشاريع', 33, '2021-12-18'),
(64, 'عمال مياومة', 33, '2021-12-18'),
(65, 'نجار', 34, '2021-12-18'),
(66, 'حداد', 34, '2021-12-18'),
(67, 'مطابخ المنيوم', 34, '2021-12-18'),
(68, 'تنجيد', 34, '2021-12-18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `type` int(2) NOT NULL DEFAULT 1,
  `password` varchar(255) NOT NULL,
  `Email` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `Response` datetime DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `date_birth` date DEFAULT NULL,
  `imgg` varchar(255) NOT NULL DEFAULT 'download.png',
  `Response_speed` time NOT NULL DEFAULT current_timestamp(),
  `date` date DEFAULT NULL,
  `last_seen` datetime DEFAULT NULL,
  `RegStatus` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `password`, `Email`, `Response`, `first_name`, `last_name`, `date_birth`, `imgg`, `Response_speed`, `date`, `last_seen`, `RegStatus`) VALUES
(16, 1, '81dc9bdb52d04dc20036dbd8313ed055', 'ayham@gmail.com', NULL, 'أيهم', 'الخلايلة', '1999-07-22', 'img.png', '15:14:06', '2021-11-24', NULL, 1),
(17, 1, '827ccb0eea8a706c4c34a16891f84e7b', 'hamza@gmail.com', NULL, 'حمزة', 'أو قويدر', '1999-08-28', 'hamzahQQQ.jpg', '15:22:55', '2021-11-24', NULL, 1),
(21, 2, '81dc9bdb52d04dc20036dbd8313ed055', 'hussainabuqattam@gmail.co', NULL, 'hussain ', ' abuqattam', NULL, 'download.png', '12:16:33', '2021-12-29', NULL, 1),
(22, 2, 'ec6a6536ca304edf844d1d248a4f08dc', 'hussain@gmail.com', NULL, 'ibrahinm', 'hussain', '2021-12-03', '61da7186-0154-4f59-a2b9-6b4cefd58f48.jpg', '11:00:24', '2021-12-30', NULL, 1),
(24, 1, '827ccb0eea8a706c4c34a16891f84e7b', 'khaled@mail.com', NULL, 'khaled', 'ahmad', NULL, 'download.png', '01:25:40', '2021-12-31', NULL, 0),
(25, 2, '81dc9bdb52d04dc20036dbd8313ed055', 'raed@mail.com', NULL, 'رائد', 'عبد العال', '2021-12-02', '648_pexels-timea-kadar-2659515.jpg', '01:55:20', '2021-12-31', NULL, 0),
(26, 1, '827ccb0eea8a706c4c34a16891f84e7b', 'ghazal@yahoo.com', NULL, 'omar', 'ghazal', NULL, 'download.png', '02:23:59', '2021-12-31', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`conversation_id`);

--
-- Indexes for table `main_categories`
--
ALTER TABLE `main_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `note_user` (`note_user`);

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
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_ibfk_3` (`main_title`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `comment_replies`
--
ALTER TABLE `comment_replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `conversation`
--
ALTER TABLE `conversation`
  MODIFY `conversation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `main_categories`
--
ALTER TABLE `main_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`to_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chat_ibfk_2` FOREIGN KEY (`from_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`comment_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`note_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`to_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`from_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `sub_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`),
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `sub_category_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `main_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
