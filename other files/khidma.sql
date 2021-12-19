-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2021 at 12:35 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

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
  `img` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT 'img.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `email`, `Password`, `img`) VALUES
(1, 'حمزة بلال قويدر', 'mohmmad@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'hamzahQQQ.jpg');

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
(11, 20, 16, 'hi', 0, '2021-12-17'),
(12, 19, 19, 'jhiunjl', 1, '2021-12-18');

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
(7, 16, 122, 'Ø£Ù‡Ù„ÙŠÙ†', '2021-12-17', '2021-12-17 17:23:04');

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
(4, 19, 19);

-- --------------------------------------------------------

--
-- Table structure for table `main_categories`
--

CREATE TABLE `main_categories` (
  `id` int(11) NOT NULL,
  `title_cat` varchar(255) NOT NULL,
  `type` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT 'F',
  `Date_create` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `main_categories`
--

INSERT INTO `main_categories` (`id`, `title_cat`, `type`, `Date_create`) VALUES
(25, 'أعمال', 'F', '2021-12-18'),
(26, 'برمجة وتطوير', 'F', '2021-12-18'),
(27, 'تسويق الكتروني', 'F', '2021-12-18'),
(28, 'تدريب عن بعد', 'F', '2021-12-18'),
(29, 'تصميم فيديو', 'F', '2021-12-18'),
(30, 'تصميم', 'F', '2021-12-18'),
(31, 'كهرباء', 'S', '2021-12-18'),
(32, 'صيانة سيارات', 'S', '2021-12-18'),
(33, 'ادوات اعمار', 'S', '2021-12-18'),
(34, 'خدمات اخرى', 'S', '2021-12-18');

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
  `main_id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `Keyword` varchar(25) CHARACTER SET utf8 NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `RegStatus` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `body`, `category_id`, `user_id`, `main_id`, `img`, `Keyword`, `date`, `RegStatus`) VALUES
(67, 'تصميم موقع احترافى ', 'هل لديك فكرة أو مشروع وتريد تصميم موقع إحترافي وبمواصفات عالية، ؟ هل تريد الدخول فى عالم السوشيال ميديا والظهور من بين المنافسين بصوره قويه ؟ هنا الحل بإذن الله،\r\n\r\nسوف ننشئ لك الموقع الالكتروني الذي تريده على حسب ذوقك واختيارك ليتناسب مع فكرتك وبتصميم إحترافي وجودة عالية،\r\nكما سيتم انشائه responsive اى سيكون يعمل على كل الشاشات المختلفه باحجامها كالاندرويد والايباد والكمبيوتر ..الخ\r\nأيضا نقدم لك كتابه محتوى موقعك بشكل احترافى', 43, 19, 0, '100_pexels-marc-mueller-325111.jpg', '', '2021-12-18', 1),
(68, 'تصميم وبرمجة مواقع', 'حاصل علي بكالريوس الحسابات والمعلومات وحاصل علي منحة ITI Full stack with MERN\r\n\r\nاقدم لكم اليوم خدمة تصميم وعمل المواقع من خلال احدث واسرع التقنيات الموجودة في الوقت الحالي\r\nوهي الجافا سكربيت ( node JS ) حيث ما تمتاز به هذه الطريقة البرمجية :\r\n\r\n1- 35% اسرع من اي موقع باي لغه برمجية اخري .\r\n2- ضعف عدد الطلبات / الثانية ( يضمن استقرار الموقع مهما كان عدد الزوار ) .\r\n3- 40% حجم اقل بالنسبة لنفس المشروع باي لغه برمجية اخري .\r\n\r\nوهذا ما جعل كبري الشركات تقوم بتحويل خدماتها الي node JS مثل ( PayPal - Uber - Netflix) .', 43, 19, 0, '56290_pexels-olia-danilevich-4974912.jpg', '', '2021-12-18', 1),
(69, 'تصميم Landing Page', 'اقوم بتصميم وبرمجة المواقع بالطرق الحديثة لجعل اعمالك احترافية بأستخدام تقنيات حديثة مثل HTML5, CSS3, Bootstrap 5, JavaScript, ES6 اذا تريد موقع احترافى لعملك لتزيد من أحترافك فى العمل مقابل 5$ يمكنك التواصل معى.\r\nصفحة الهبوط تتكون من عدة اقسام احصل على تصميم مميز وابداعي للقسم الأول من صفحة الهبوط التي تريدها مقابل 5$.\r\nو أن شاء الله سوف تحصل على خدمه مرضيه لك وبجودة عالية.', 43, 19, 0, '32744_pexels-cottonbro-6804595.jpg', '', '2021-12-18', 1);

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
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Email` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `Num_Phone` int(11) DEFAULT NULL,
  `Response` datetime DEFAULT NULL,
  `Location` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
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

INSERT INTO `users` (`id`, `type`, `name`, `password`, `Email`, `Num_Phone`, `Response`, `Location`, `first_name`, `last_name`, `gender`, `date_birth`, `imgg`, `Response_speed`, `date`, `last_seen`, `RegStatus`) VALUES
(16, 1, 'ayham', '827ccb0eea8a706c4c34a16891f84e7b', 'ayham@gmail.com', 79, NULL, 'الاردن', 'أيهم', 'الخلايلة', 'ذكر', '1999-07-22', 'img.png', '15:14:06', '2021-11-24', NULL, 1),
(17, 1, 'hamza', '827ccb0eea8a706c4c34a16891f84e7b', 'hamza@gmail.com', 772076544, NULL, 'الاردن', 'حمزة', 'أو قويدر', 'ذكر', '1999-08-28', 'hamzahQQQ.jpg', '15:22:55', '2021-11-24', NULL, 1),
(19, 1, '', '827ccb0eea8a706c4c34a16891f84e7b', 'hamza@mail.com', NULL, NULL, NULL, 'hamza', 'abu qwaider', '', NULL, 'download.png', '20:28:04', '2021-12-17', NULL, 0),
(20, 1, '', '827ccb0eea8a706c4c34a16891f84e7b', 'ayman@mail.com', NULL, NULL, NULL, 'ايمن', 'حسين', '', NULL, 'download.png', '20:32:05', '2021-12-17', NULL, 0);

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
  ADD KEY `post_ibfk_3` (`main_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `comment_replies`
--
ALTER TABLE `comment_replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `conversation`
--
ALTER TABLE `conversation`
  MODIFY `conversation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `main_categories`
--
ALTER TABLE `main_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
-- Constraints for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `sub_category_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `main_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
