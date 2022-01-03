-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2022 at 11:45 PM
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
  `img` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT 'img.png',
  `date_add` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `email`, `Password`, `img`, `date_add`) VALUES
(1, 'حمزة بلال قويدر', 'mohmmad@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '41216_pexels-stefan-stefancik-91227.jpg', '2021-12-31'),
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
(1, 27, 16, 'hi', 1, '2022-01-03'),
(2, 16, 27, 'hihihih', 1, '2022-01-03');

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
(127, 27, 'خدمة مميزة', 76, '2022-01-03', '2022-01-03 22:38:04');

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
(8, 22, 126, 'jjjjjj', '2021-12-31', '2021-12-30 22:47:00'),
(9, 27, 127, 'شكرا لك', '2022-01-03', '2022-01-03 22:38:17');

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
(5, 24, 24),
(6, 27, 16);

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
(45, 'برمجة وتطوير', 'F', '2022-01-03', 1, '100_pexels-marc-mueller-325111.jpg'),
(46, 'تسويق الكتروني', 'F', '2022-01-03', 1, 'pexels-shvets-production-7195232.jpg'),
(47, 'تدريب عن بعد', 'F', '2022-01-03', 1, 'pexels-pixabay-267507.jpg'),
(48, 'تصميم فيديو', 'F', '2022-01-03', 0, '32744_pexels-cottonbro-6804595.jpg'),
(49, 'كتابة وترجمة', 'F', '2022-01-03', 0, 'pexels-gunnar-ridderström-4318441 (1).jpg'),
(50, 'أعمال', 'F', '2022-01-03', 1, 'pexels-rodnae-productions-5915230.jpg'),
(51, 'كهرباء', 'S', '2022-01-03', 1, 'pexels-alexander-dummer-132700.jpg'),
(52, 'صيانة سيارات', 'S', '2022-01-03', 1, 'pexels-malte-luk-2244746.jpg'),
(53, 'صيانة امدادات المياه', 'S', '2022-01-03', 0, 'pexels-los-muertos-crew-8853499.jpg'),
(54, 'ادوات اعمار', 'S', '2022-01-03', 1, 'pexels-photomix-company-224924.jpg'),
(55, 'اثاث', 'S', '2022-01-03', 0, 'pexels-max-vakhtbovych-6480211.jpg'),
(56, 'خدمات اخرى', 'S', '2022-01-03', 1, 'pexels-aleksey-3680959.jpg');

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
(193, 16, 'برمجة وتطوير مواقع ', 76, 27, 238);

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
(76, 'برمجة وتطوير مواقع ', 'أقدم خدمة برمجة مواقع الويب والبرامج المكتبية\r\nولدي خبرة بفضل الله سبع سنوات في هذا المجال:\r\n* البرمجة للبرامج باستخدام أكسس إضافة إلى برامج بلغة وفيجوال بيسك وسي شارب.\r\n* برمجة مواقع بال. NET MVC\r\n* خبرة في التعامل مع قواعد بيانات SQL Server\r\n\r\nاقوم ببرمجة وتصميم الجزء أو العملية في الصفحة الواحدة مقابل ٥ دولار مثل تصميم شريط الجزء العلوي أو ربط عناوين الصفحات بالصفحات او تصميم رفع ملف او برمجة عملية الرفع ... إلخ', 77, 16, 'برمجة وتطوير', '88559_57685_100_pexels-marc-mueller-325111.jpg', '', '2022-01-03', 1),
(77, 'موقع متجاوب عربي انجليزي', 'تحويل ملف psd /xd لموقع متجاوب عربي انجليزي باستخدام احدث اساليب البرمجة وتطوير المواقع مثل :\r\nHTML\r\nCSS\r\nSASS\r\nBOOTSTRAP4\r\nJQUERY\r\nJAVASCRIPT\r\nالرفع على GitHub و GITPAGES لضمان حصول العميل على التطورات الحادثة في الموقع', 77, 16, 'برمجة وتطوير', '9185_72230_pexels-luis-gomes-546819.jpg', '', '2022-01-03', 1),
(78, 'برمجة و تصميم مواقع ويب', 'السلام عليكم ورحمة الله وبركاته\r\n\r\n* حجم العمل\r\n\r\nسوف يتم تقديم صفحه واحده بتصميم عادي ( HTML / CSS / JS ) مقابل الطلب الأساسي.\r\nلمعرفة المزيد حول حجم العمل و الأسعار أرجو إلقاء نظرة على التطويرات، في حالة المطلوب غير مدرج في التطويرات أرجو الإستفسار عبر الرسائل.', 77, 16, 'برمجة وتطوير', '9815_56290_pexels-olia-danilevich-4974912.jpg', '', '2022-01-03', 1),
(79, 'تصميم موقع احترافى كامل', 'هل لديك فكرة أو مشروع وتريد تصميم موقع إحترافي وبمواصفات عالية، ؟ هل تريد الدخول فى عالم السوشيال ميديا والظهور من بين المنافسين بصوره قويه ؟ هنا الحل بإذن الله،\r\n\r\nسوف ننشئ لك الموقع الالكتروني الذي تريده على حسب ذوقك واختيارك ليتناسب مع فكرتك وبتصميم إحترافي وجودة عالية،\r\nكما سيتم انشائه responsive اى سيكون يعمل على كل الشاشات المختلفه باحجامها كالاندرويد والايباد والكمبيوتر ..الخ\r\nأيضا نقدم لك كتابه محتوى موقعك بشكل احترافى', 77, 16, 'برمجة وتطوير', '49051_pexels-cottonbro-6804595.jpg', '', '2022-01-03', 1),
(80, 'تصميم موقع مميز وجذاب', 'هل تبحث عن مبرمج ومصمم ومطور مواقع محترف؟ هل تبحث عن شريك ل تصميم موقع مميز وجذاب ومتجاوب مع جميع الشاشات؟ سريع ومستجيب؟\r\nوصلت إلى الشخص المطلوب!\r\n\r\nماجد مبرمج ومصمم مواقع محترف خبرة منذ2017 عملت على برمجة وتصميم الكثير من المواقع\r\nهدفي من الخدمة هو تصميم موقع مميز وجذاب ومتجاوب مع جميع الشاشات ذات معنى\r\nيلبي رغباتك ويجذب عملائك , من خلال مهاراتي في برمجة تصميم وتطوير مواقع الإنترنت وتجربة المستخدم .\r\nفأهلا بك ويسعدني أن أكون شريكاً في نجاحك !', 77, 16, 'برمجة وتطوير', '90874_pexels-lukas-574071.jpg', '', '2022-01-03', 1),
(81, 'اعداد و تنسيق صفحات متجرك', 'مرحبا بك\r\n\r\nلديك متجر علي منصة سلة و تريد تعديل بعض الاشياء فيه و اضافة لمستك الخاصة و اضافة custom css .. يمكنني توظيف خبرة الطويلة في مجال الويب لمساعدتك في ذلك خلق لمستك الخاصة علي متجرك', 77, 16, 'برمجة وتطوير', '99046_pexels-pixabay-265087.jpg', '', '2022-01-03', 1),
(82, 'تصميم موقع من صفحة واحدة', 'يمكنني تصميم موقع لشركتك أو موقع تعريفي شخصي لخدماتك مكون من صفحة واحدة متجاوب مع جميع أحجام الشاشات على ذوقك ومن اختيارك أو بأن ترسل لي ملف فوتوشوب به التصميم المطلوب أو صورة للموقع أو رابط موقع الذي تريد موقعك أن يشبهه\r\nسيتم التصميم باستخدام التقنيات الآتية : HTML5 & CSS3 & Bootstrap & JQuery\r\nسعر الخدمة 5 دولار مقابل تصميم صفحة واحدة بسيطة متجاوبة . . بمشيئة الله ستستلم الخدمة وأنت راض تماما', 77, 16, 'برمجة وتطوير', '69809_100_pexels-marc-mueller-325111.jpg', '', '2022-01-03', 1),
(83, 'برمجة وتعديل قوالب HTML', 'سأقوم ببرمجة قالب موقعك أو مدونتك بتقنية HTML 5 وتنسيقها ب CSS 3 . تكويد وتعديل واجهات المواقع , قوالب بلوجر , تصاميم خاصة, اضافة اشرطة وقوائم للملاحة أو التنقل داخل الموقع ,\r\nسأقوم باعادة تنسيق القالب بالكامل حسب طلبك أو انشاء قالب جديد متجاوب مع جميع الشاشات ومحدث بأكواد الميتا تاج كاملة ليتوافق مع معايير ال SEO\r\nبالنسبةلعدد صفحات اي موقع عادي هم 7 صفحات الرئيسية ، لوحة التحكم، سياسة الخصوصية، شروط الاستخدام، صفحة الموضوعات او المقالات وهي تتكرر وصفحة اتصل بنا .\r\nخصائص التصميم .', 77, 16, 'برمجة وتطوير', '23061_27618_pexels-cottonbro-3584973.jpg', '', '2022-01-03', 1),
(84, 'تصميم وتعديل المواقع', 'تصميم صفحات هبوط وصفحات مستقلة\r\n\r\nبرمجة مواقع كاملة\r\n\r\nبرمجة المتاجر الالكترونية\r\n\r\nبرمجة تطبيقات الاندرويد\r\n\r\nبرمجة انظمة تحكم و ادارة\r\n\r\nتصميم مداخل\r\n\r\nتصميم استايلات لقوالب وردبريس او بلوجر\r\n\r\nتصميم استايلات احلي منتدى و Phbb2\r\n\r\nتكويد استايلات أو مداخل', 77, 16, 'برمجة وتطوير', '56131_56290_pexels-olia-danilevich-4974912.jpg', '', '2022-01-03', 1),
(85, 'تصميم مواقع html5 ,css3', 'تصميم مواقع بشكل احترافي\r\nتحويل من PSD او صورة الى نموذج\r\nhtml5 , css3, jquery\r\nتعريب قوالب اجنبية والتعديل على قوالب جاهزة\r\nوسوف اسلمك الموقع خلال فترة صغيرة\r\n\r\nكل ذلك ب 5$ فقط للصفحة الواحدة (ويكون الموقع غير متجاوب)\r\nصفحة الهبوط لها اسعار مختلفه ارجو قراءة تطويرات الخدمة', 77, 16, 'برمجة وتطوير', '92516_99046_pexels-pixabay-265087.jpg', '', '2022-01-03', 1),
(86, 'تطوير واجهات أمامية', 'السلام عليكم.\r\nاقدم اليكم خدمة برمجة وتطوير الواجهات الأمامية لمواقع ويب بإحترافية و إبداع\r\nتطوير المواقع يكون بجميع انواعها ( مدونة , متاجر الكترونية , مواقع الطبخ, مواقع الشخصية ... وغيرها ).\r\nالعمل يكون باستخدام لغات البرمجة :\r\nJAVASCRIPT JQUERY\r\nوايضا باستخدام:\r\nHTML CSS BOOTSTRAP WEBBACK SASS\r\nالعمل سيكون احترافي و ابداعي و غير مكرر.', 77, 16, 'برمجة وتطوير', '61019_90874_pexels-lukas-574071.jpg', '', '2022-01-03', 1);

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
(12, 76, 27, 5);

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
(70, 'ادخال بيانات', 50, '2022-01-03'),
(71, 'استشارات أعمال', 50, '2022-01-03'),
(72, 'تجارة الكترونية', 50, '2022-01-03'),
(73, 'خدمات قانونية', 50, '2022-01-03'),
(74, 'خدمات مالية', 50, '2022-01-03'),
(75, 'أنظمة ادارة المحتوى', 45, '2022-01-03'),
(76, 'اختبارات تجريبية', 45, '2022-01-03'),
(77, 'برمجة CSS و HTML', 45, '2022-01-03'),
(78, 'برمجة Java و .NET', 45, '2022-01-03'),
(79, 'برمجة PHP', 45, '2022-01-03'),
(80, 'إعلانات المواقع', 46, '2022-01-03'),
(81, 'استشارات تسويقية', 46, '2022-01-03'),
(82, 'الإعلانات والتسويق على الجوال', 46, '2022-01-03'),
(83, 'التسويق بالمحتوى', 46, '2022-01-03'),
(84, 'التسويق عبر انستقرام', 46, '2022-01-03'),
(85, 'استشارات شخصية', 47, '2022-01-03'),
(86, 'الصحة واللياقة البدنية', 47, '2022-01-03'),
(87, 'تعلم البرمجة', 47, '2022-01-03'),
(88, 'تعلم التسويق الالكتروني', 47, '2022-01-03'),
(89, 'تعلم اللغات', 47, '2022-01-03'),
(90, 'تصميم صور متحركة', 48, '2022-01-03'),
(91, 'تصميم مقدمات فيديو', 48, '2022-01-03'),
(92, 'موشن جرافيك', 48, '2022-01-03'),
(93, 'مونتاج فيديو', 48, '2022-01-03'),
(94, 'وايت بورد', 48, '2022-01-03'),
(95, 'اخرى', 48, '2022-01-03'),
(96, 'اخرى', 45, '2022-01-03'),
(97, 'اخرى', 46, '2022-01-03'),
(98, 'اخرى', 47, '2022-01-03'),
(99, 'اخرى', 50, '2022-01-03'),
(100, 'الكتابة الإبداعية', 49, '2022-01-03'),
(101, 'تفريغ نصوص', 49, '2022-01-03'),
(102, 'خدمات تدقيق لغوي', 49, '2022-01-03'),
(103, 'خدمات ترجمة', 49, '2022-01-03'),
(104, 'خدمات تلخيص', 49, '2022-01-03'),
(105, 'اخرى', 49, '2022-01-03'),
(106, 'كهربائي منازل', 51, '2022-01-03'),
(107, 'كهربائي مشاريع', 51, '2022-01-03'),
(108, 'مهندس كهرباء', 51, '2022-01-03'),
(109, 'توليد طاقة شمسية', 51, '2022-01-03'),
(110, 'اخرى', 51, '2022-01-03'),
(111, 'ميكانيكي عام', 52, '2022-01-03'),
(113, 'كهربائي سيارت', 52, '2022-01-03'),
(114, 'دهان سيارات', 52, '2022-01-03'),
(115, 'صيانة سيارات الهايبرد', 52, '2022-01-03'),
(116, 'اخرى', 52, '2022-01-03'),
(117, 'صيانة امدادات', 53, '2022-01-03'),
(118, 'تمديدات صرف صحي', 53, '2022-01-03'),
(119, 'قطع صرف صحي', 53, '2022-01-03'),
(120, 'اخرى', 53, '2022-01-03'),
(121, 'مهندس مدني', 54, '2022-01-03'),
(122, 'مدير مشاريع', 54, '2022-01-03'),
(123, 'عمال مياومة', 54, '2022-01-03'),
(124, 'قطع وادوات اعمار', 54, '2022-01-03'),
(125, 'اخرى', 54, '2022-01-03'),
(126, 'غرف نوم ', 55, '2022-01-03'),
(127, 'ابواب خشب', 55, '2022-01-03'),
(128, 'ثلاجات', 55, '2022-01-03'),
(129, 'خزائن خشب', 55, '2022-01-03'),
(130, 'اخرى', 55, '2022-01-03'),
(131, 'نجار', 56, '2022-01-03'),
(132, 'حداد', 56, '2022-01-03'),
(133, 'مطابخ المنيوم', 56, '2022-01-03'),
(134, 'تنجيد', 56, '2022-01-03'),
(135, 'اخرى', 56, '2022-01-03');

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
(16, 1, '81dc9bdb52d04dc20036dbd8313ed055', 'ayham@gmail.com', NULL, 'أيهم', 'الخلايلة', '1999-07-22', '69852_41216_pexels-stefan-stefancik-91227.jpg', '15:14:06', '2021-11-24', NULL, 1),
(17, 1, '827ccb0eea8a706c4c34a16891f84e7b', 'hamza@gmail.com', NULL, 'حمزة', 'أو قويدر', '1999-08-28', 'hamzahQQQ.jpg', '15:22:55', '2021-11-24', NULL, 1),
(21, 2, '81dc9bdb52d04dc20036dbd8313ed055', 'hussainabuqattam@gmail.co', NULL, 'hussain ', ' abuqattam', NULL, 'download.png', '12:16:33', '2021-12-29', NULL, 1),
(22, 2, 'ec6a6536ca304edf844d1d248a4f08dc', 'hussain@gmail.com', NULL, 'ibrahinm', 'hussain', '2021-12-03', '61da7186-0154-4f59-a2b9-6b4cefd58f48.jpg', '11:00:24', '2021-12-30', NULL, 1),
(27, 2, '827ccb0eea8a706c4c34a16891f84e7b', 'maher@gmail.com', NULL, 'maher', 'abuqattam', NULL, 'download.png', '10:45:24', '2022-01-03', NULL, 1);

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
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `comment_replies`
--
ALTER TABLE `comment_replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `conversation`
--
ALTER TABLE `conversation`
  MODIFY `conversation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `main_categories`
--
ALTER TABLE `main_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `sub_category_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `main_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
