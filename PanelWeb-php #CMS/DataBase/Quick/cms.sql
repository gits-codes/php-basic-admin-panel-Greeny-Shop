-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 14, 2025 at 11:14 AM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

DROP TABLE IF EXISTS `admin_tbl`;
CREATE TABLE IF NOT EXISTS `admin_tbl` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `lastname` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`id`, `username`, `password`, `name`, `lastname`) VALUES
(1, 'reza', '1', 'رضا', ''),
(2, 'admin', '2', 'ادمین', ''),
(3, 'pc', '3', 'system', '');

-- --------------------------------------------------------

--
-- Table structure for table `contact_tbl`
--

DROP TABLE IF EXISTS `contact_tbl`;
CREATE TABLE IF NOT EXISTS `contact_tbl` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `subject` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `contact_tbl`
--

INSERT INTO `contact_tbl` (`id`, `name`, `email`, `subject`, `text`) VALUES
(4, 'رضا رستمی ارشاد', 'Reza.rostmiErshad003@gmail.com', 'ارسال میوه به شما با نصفه قیمت', 'فروشنده هستم لطفا تماس بگیرید'),
(5, 'mohsen', 'mohsen@gmail.com', 'خریدار عمده', 'پیام بدهید لطفا');

-- --------------------------------------------------------

--
-- Table structure for table `menu_tbl`
--

DROP TABLE IF EXISTS `menu_tbl`;
CREATE TABLE IF NOT EXISTS `menu_tbl` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `url` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `sort` int NOT NULL,
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `chid` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `menu_tbl`
--

INSERT INTO `menu_tbl` (`id`, `title`, `url`, `sort`, `status`, `chid`) VALUES
(1, 'خانه', 'index.php', 1, '1', 0),
(2, 'اخبار', 'news.php', 2, '1', 0),
(3, 'دانلودها', 'downloads.php', 3, '1', 0),
(4, 'محصولات', 'products.php', 4, '1', 0),
(6, 'درباره ما', 'blank_page.php?id=5', 6, '1', 0),
(7, 'پشتیبانی', 'support.php', 7, '1', 0),
(8, 'ویژگی‌ها', '#', 1, '1', 1),
(9, 'تازه‌ها', '#', 2, '1', 1),
(10, 'مقالات', '#', 1, '1', 2),
(11, 'رویدادها', '#', 2, '1', 2),
(12, 'بروزرسانی‌ها', '#', 1, '1', 3),
(13, 'راهنماها', '#', 2, '1', 3),
(25, 'پرفروش3', '#', 2, '1', 4),
(15, 'پرفروش‌ها', '#', 2, '1', 4),
(18, 'تیم ما', '#', 1, '1', 6),
(19, 'تاریخچه', '#', 2, '1', 6),
(20, 'سؤالات متداول', '#', 1, '1', 7),
(21, 'ارسال تیکت', '#', 2, '1', 7),
(24, 'منو اولیش محصولات', '#', 1, '1', 4),
(23, 'زیرمجموعه خانه', '@', 3, '1', 1),
(36, 'A', 'B', 33, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `news_cat`
--

DROP TABLE IF EXISTS `news_cat`;
CREATE TABLE IF NOT EXISTS `news_cat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `news_cat`
--

INSERT INTO `news_cat` (`id`, `title`) VALUES
(1, 'میوه‌های فصل'),
(2, 'خواص میوه‌ها'),
(3, 'آموزش مصرف و نگهداری میوه'),
(4, 'طرز تهیه نوشیدنی‌ها و اسموتی‌ها'),
(5, 'دسرهای میوه‌ای'),
(6, 'میوه‌های خارجی و خاص'),
(7, 'تغذیه سالم و رژیمی'),
(8, 'مقالات علمی و تحقیقات'),
(9, 'باغداری و کشاورزی'),
(10, 'فروش و بازار میوه'),
(11, 'میوه و کودک'),
(12, 'میوه و پوست و زیبایی'),
(13, 'آموزش برش و تزئین میوه'),
(14, 'میوه و فرهنگ'),
(15, 'اخبار و ترندهاc'),
(16, 'w');

-- --------------------------------------------------------

--
-- Table structure for table `news_tbl`
--

DROP TABLE IF EXISTS `news_tbl`;
CREATE TABLE IF NOT EXISTS `news_tbl` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `news_cat` int NOT NULL,
  `date` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `news_tbl`
--

INSERT INTO `news_tbl` (`id`, `title`, `text`, `img`, `news_cat`, `date`) VALUES
(2, 'خواص تازه‌ترین میوه‌های فصل', 'خواص هر میوه برای سلامتی بسیار مهم است.\nبا مطالعه این مطلب، انتخاب بهتری خواهید داشت.', '../Site+1/images/uploader_from_news/all pic for test/8.jpg', 3, '1407-02-14'),
(3, 'ترفندهای نگهداری میوه در خانه', 'با این ترفندها می‌توانید میوه‌ها را تا هفته‌ها تازه نگه دارید.\nنیاز به ابزار خاصی ندارید.', '../Site+1/images/uploader_from_news/all pic for test/6.jpg', 8, '1404-08-19'),
(4, 'طرز تهیه نوشیدنی‌های طبیعی با میوه', 'طرز تهیه نوشیدنی‌های سالم و طبیعی با میوه‌های فصل.\nیک انتخاب مناسب برای روزهای گرم.', '../Site+1/images/uploader_from_news/all pic for test/5.jpg', 10, '1408-05-03'),
(5, 'دسرهای خوشمزه با میوه‌های تازه', 'دسرهای متنوع و خوشمزه با میوه‌های تازه و سالم.\nایده‌های آسان برای خانه و مهمانی.', '../Site+1/images/uploader_from_news/all pic for test/1.jpg', 8, '1405-10-18'),
(6, 'میوه‌های خارجی و خاص این ماه', 'میوه‌های خارجی و خاص این ماه را بشناسید.\nاز خواص و طعم متفاوت آنها لذت ببرید.', '../Site+1/images/uploader_from_news/all pic for test/5.jpg', 9, '1406-05-06'),
(7, 'تغذیه سالم با میوه و سبزیجات', 'تغذیه سالم با میوه و سبزیجات؛ راهنمای روزانه برای بدن قوی و سالم.\nنکات ساده اما کاربردی.', '../Site+1/images/uploader_from_news/all pic for test/3.jpg', 14, '1406-09-08'),
(8, 'جدیدترین تحقیقات درباره میوه‌ها', 'جدیدترین تحقیقات علمی درباره تاثیر میوه‌ها بر سلامتی.\nمطالب علمی و مستند.', '../Site+1/images/uploader_from_news/all pic for test/6.jpg', 7, '1405-01-18'),
(9, 'روش‌های باغداری بهینه', 'روش‌های بهینه باغداری و پرورش میوه با کیفیت بالا.\nمناسب برای کشاورزان و علاقه‌مندان.', '../Site+1/images/uploader_from_news/all pic for test/8.jpg', 10, '1407-01-07'),
(10, 'بازار میوه و قیمت‌های روز', 'بازار میوه و قیمت‌های روزانه.\nنکات خرید هوشمندانه برای مصرف‌کننده.', '../Site+1/images/uploader_from_news/all pic for test/2.jpg', 11, '1407-08-23');

-- --------------------------------------------------------

--
-- Table structure for table `page_tbl`
--

DROP TABLE IF EXISTS `page_tbl`;
CREATE TABLE IF NOT EXISTS `page_tbl` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `keyword` text CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_cat`
--

DROP TABLE IF EXISTS `product_cat`;
CREATE TABLE IF NOT EXISTS `product_cat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `sort` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `product_cat`
--

INSERT INTO `product_cat` (`id`, `title`, `status`, `sort`) VALUES
(1, 'میوه‌های تازه', '1', 1),
(2, 'سبزیجات', '1', 2),
(3, 'خشکبار', '1', 3),
(4, 'آجیل و مغزها', '1', 4),
(5, 'میوه خشک', '1', 5),
(6, 'آبمیوه طبیعی', '1', 6),
(7, 'سبد میوه هدیه', '1', 7),
(8, 'محصولات ارگانیک', '1', 8),
(9, 'عسل و فرآورده‌های زنبور', '1', 9),
(10, 'ترشی و مربا خانگی', '1', 10),
(11, 'd', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_tbl`
--

DROP TABLE IF EXISTS `product_tbl`;
CREATE TABLE IF NOT EXISTS `product_tbl` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `procat` int NOT NULL,
  `img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `product_tbl`
--

INSERT INTO `product_tbl` (`id`, `title`, `text`, `procat`, `img`) VALUES
(1, 'سیب قرمز تازه', 'با بافت ترد و طعم شیرین-ملسی. مناسب برای میان‌وعده‌های سالم و خوشمزه. مصرف روزانه آن باعث افزایش انرژی و نشاط می‌شود. با رنگ و عطر طبیعی و تازه عرضه می‌شود.', 7, '../Site+1/images/uploader_from_product/product_simple/7.jpg'),
(2, 'موز رسیده درجه یک', 'موز زرد رسیده با عطر دلپذیر و بافت نرم و لطیف. این موزها انتخاب عالی برای اسموتی و دسرهای خانگی هستند. شیرینی طبیعی آنها بدون افزودنی، تجربه‌ای سالم و خوشمزه فراهم می‌کند.', 8, '../Site+1/images/uploader_from_product/product_simple/17.jpg'),
(3, 'گوجه‌فرنگی گلخانه‌ای', 'گوجه‌فرنگی گوشتی و آبدار، مناسب برای سالاد و تهیه سس خانگی. با طعم شیرین و طبیعی و عطر دلنشین. کیفیت بالا و تازه بودن آن تضمین شده است.', 2, '../Site+1/images/uploader_from_product/product_simple/16.jpg'),
(4, 'خیار گلخانه‌ای تازه', 'خیار ترد و خنک، تازه برداشت شده و بدون مواد نگهدارنده. مصرف روزانه آن باعث حفظ رطوبت بدن و شادابی پوست می‌شود. ایده‌آل برای سالاد و نوشیدنی‌های خنک.', 1, '../Site+1/images/uploader_from_product/product_simple/8.jpg'),
(5, 'هندوانه آبدار تابستانی', 'هندوانه شیرین با بافت آبدار و رنگ قرمز جذاب. مناسب برای روزهای گرم تابستان، میان‌وعده‌ای سالم و انرژی‌بخش. تازه و خوش‌طعم برای خانواده و مهمانی‌ها.', 7, '../Site+1/images/uploader_from_product/product_simple/18.jpg'),
(6, 'سیب‌زمینی خورشتی ممتاز', 'سیب‌زمینی چندمنظوره، مناسب برای خورشت، سرخ‌کردنی و پوره. تازه و با کیفیت، بدون مواد افزودنی. طعم عالی و بافت نرم بعد از پخت دارد.', 5, '../Site+1/images/uploader_from_product/product_simple/4.jpg'),
(7, 'هویج محلی تازه', 'هویج نارنجی، شیرین و ترد، سرشار از ویتامین و مواد معدنی. مناسب برای میان‌وعده، سالاد یا پخت غذاهای متنوع. تازه و عاری از مواد نگهدارنده.', 4, '../Site+1/images/uploader_from_product/product_simple/16.jpg'),
(8, 'فلفل دلمه‌ای سبز', 'فلفل دلمه‌ای ترد و خوش‌رنگ، مناسب برای سالاد، خوراک و تزئین غذا. با رنگ طبیعی و عطر ملایم. تازه و بدون افزودنی، گزینه‌ای سالم و خوشمزه.', 1, '../Site+1/images/uploader_from_product/product_simple/20.jpg'),
(9, 'سبزی خوردن تازه (بسته‌ای)', 'مخلوطی از سبزیجات تازه شامل کاهو، گوجه، خیار و فلفل دلمه‌ای. تازه، تمیز و آماده مصرف. مناسب برای سالاد و وعده‌های سالم روزانه.', 6, '../Site+1/images/uploader_from_product/product_simple/13.jpg'),
(10, 'ترشی مخلوط خانگی', 'ترشی مخلوط شامل خیارشور، گل‌کلم و هویج، با طعم ملایم و سنتی. تازه و بدون مواد نگهدارنده مصنوعی. تجربه‌ای خوشمزه برای همراه با غذاهای خانگی.', 6, '../Site+1/images/uploader_from_product/product_simple/7.jpg'),
(11, 'خیارشور خانگی شیشه‌ای', 'خیارشور خانگی با رایحه‌ی سبزیجات و طعم خاص. تازه و خوشمزه، بدون مواد نگهدارنده. مناسب برای مصرف روزانه و سرو همراه وعده‌های مختلف.', 2, '../Site+1/images/uploader_from_product/product_simple/19.jpg'),
(12, 'پرتقال والنسیا', 'پرتقال آبدار و شیرین، مناسب برای آبمیوه طبیعی و میان‌وعده. تازه برداشت شده و سرشار از ویتامین C. طعم طبیعی و عطر دلنشین دارد.', 1, '../Site+1/images/uploader_from_product/product_simple/5.jpg'),
(13, 'لیموترش تازه', 'لیموترش خوش‌آب و معطر، مناسب برای چاشنی، نوشیدنی و دسر. تازه و سالم، با عطر طبیعی و بدون مواد افزودنی. برای استفاده روزانه ایده‌آل است.', 10, '../Site+1/images/uploader_from_product/product_simple/4.jpg'),
(14, 'سیر محلی ممتاز', 'سیر با طعم قوی و عطری، تازه و خوش‌طعم. مناسب برای تهیه انواع خوراک‌ها و غذاهای سنتی. بدون مواد نگهدارنده، انتخابی سالم و طبیعی.', 4, '../Site+1/images/uploader_from_product/product_simple/5.jpg'),
(15, 'پیاز زرد خورشتی', 'پیاز زرد با طعم شیرین‌شده پس از پخت، تازه و با کیفیت بالا. مناسب برای انواع خوراک‌ها و پخت و پز روزانه. بدون افزودنی و عاری از مواد نگهدارنده.', 1, '../Site+1/images/uploader_from_product/product_simple/13.jpg'),
(16, 'کلم قرمز تازه', 'کلم قرمز ترد و رنگی، تازه برداشت شده و سرشار از ویتامین و آنتی‌اکسیدان. مناسب برای سالاد، خوراک و تزئین غذاهای متنوع.', 4, '../Site+1/images/uploader_from_product/product_simple/14.jpg'),
(17, 'مربای بالنگ خانگی', 'مربای بالنگ با بافت شفاف و طعم متعادل، خانگی و تازه. بدون مواد افزودنی، تجربه‌ای خوشمزه و سنتی برای صبحانه و میان‌وعده.', 1, '../Site+1/images/uploader_from_product/product_simple/17.jpg'),
(18, 'زیتون پرورده محلی', 'زیتون پرورده با چاشنی محلی، تازه و خوش‌طعم. مناسب برای سرو با غذا و صبحانه. بدون مواد نگهدارنده مصنوعی، سالم و طبیعی.', 4, '../Site+1/images/uploader_from_product/product_simple/8.jpg'),
(19, 'ریحان معطر بسته‌ای', 'ریحان تازه و معطر، مناسب برای سالاد، تزئین غذا و طعم‌دهی طبیعی. تازه برداشت شده و عطر طبیعی دارد.', 2, '../Site+1/images/uploader_from_product/product_simple/18.jpg'),
(20, 'ترشی لیمو و انجیر', 'ترشی خاص با طعم لیمو و انجیر خشک، تازه و خوشمزه. مناسب برای سرو همراه غذا و میان‌وعده‌های سنتی. بدون مواد نگهدارنده.', 6, '../Site+1/images/uploader_from_product/product_simple/6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `logo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `title` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `copyright` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `instagram` text CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `facebook` text CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `linkedin` text CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `twitter` text CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `phone` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `location_map` text CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `logo`, `title`, `description`, `copyright`, `instagram`, `facebook`, `linkedin`, `twitter`, `phone`, `email`, `address`, `location_map`) VALUES
(7, 'logo ➤ 830388267/logo-2013570156.png', 'در حال به‌روزرسانی', 'در حال به‌روزرسانی', 'در حال به‌روزرسانی', 'در حال به‌روزرسانی', 'در حال به‌روزرسانی', 'در حال به‌روزرسانی', 'در حال به‌روزرسانی', 'در حال به‌روزرسانی', '', 'در حال به‌روزرسانی', 'در حال به‌روزرسانی');

-- --------------------------------------------------------

--
-- Table structure for table `uploader_tbl`
--

DROP TABLE IF EXISTS `uploader_tbl`;
CREATE TABLE IF NOT EXISTS `uploader_tbl` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `size` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `v_cart_tbl`
--

DROP TABLE IF EXISTS `v_cart_tbl`;
CREATE TABLE IF NOT EXISTS `v_cart_tbl` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `v_orders`
--

DROP TABLE IF EXISTS `v_orders`;
CREATE TABLE IF NOT EXISTS `v_orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `status` enum('pending','approved','rejected') CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `address_id` int NOT NULL,
  `card_id` int NOT NULL,
  `contact_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `v_orders`
--

INSERT INTO `v_orders` (`id`, `user_id`, `status`, `address_id`, `card_id`, `contact_id`) VALUES
(1, 551, 'pending', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `v_order_items`
--

DROP TABLE IF EXISTS `v_order_items`;
CREATE TABLE IF NOT EXISTS `v_order_items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `v_order_items`
--

INSERT INTO `v_order_items` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(1, 1, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `v_users_tbl`
--

DROP TABLE IF EXISTS `v_users_tbl`;
CREATE TABLE IF NOT EXISTS `v_users_tbl` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=558 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `v_users_tbl`
--

INSERT INTO `v_users_tbl` (`id`, `username`, `email`, `password`) VALUES
(551, 'REZA', 'REZA@a.com', '1'),
(552, 'mamad', 'mamad@b.com', '2'),
(553, 'nader', 'nader@c.com', '3'),
(554, 'farshad', 'farshad@d.com', '4'),
(555, 'kamran', 'kamran@e.com', '5'),
(556, 'حسن', 'ABC@Email.com', '1'),
(557, 'vahid', 'vahid@Email.com', '2');

-- --------------------------------------------------------

--
-- Table structure for table `v_user_addresses`
--

DROP TABLE IF EXISTS `v_user_addresses`;
CREATE TABLE IF NOT EXISTS `v_user_addresses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `address` text COLLATE utf8mb4_persian_ci NOT NULL,
  `label_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `v_user_addresses`
--

INSERT INTO `v_user_addresses` (`id`, `user_id`, `address`, `label_address`) VALUES
(1, 551, 'همدان میدان خیابان شریعتی خیابان باباطاهر خیابان شهدا خیابان اکباتان خیابان تختی خیابان بوعلی', 'خانه');

-- --------------------------------------------------------

--
-- Table structure for table `v_user_buycards`
--

DROP TABLE IF EXISTS `v_user_buycards`;
CREATE TABLE IF NOT EXISTS `v_user_buycards` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `card_number` text COLLATE utf8mb4_persian_ci NOT NULL,
  `owner` text COLLATE utf8mb4_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `v_user_buycards`
--

INSERT INTO `v_user_buycards` (`id`, `user_id`, `card_number`, `owner`) VALUES
(1, 551, '2626-9099-0098-6789', 'ویزا کارت');

-- --------------------------------------------------------

--
-- Table structure for table `v_user_contacts`
--

DROP TABLE IF EXISTS `v_user_contacts`;
CREATE TABLE IF NOT EXISTS `v_user_contacts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `phone` text COLLATE utf8mb4_persian_ci NOT NULL,
  `label_phone` text CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `v_user_contacts`
--

INSERT INTO `v_user_contacts` (`id`, `user_id`, `phone`, `label_phone`) VALUES
(1, 551, '09330688344', 'رضا');

-- --------------------------------------------------------

--
-- Table structure for table `widget_tbl`
--

DROP TABLE IF EXISTS `widget_tbl`;
CREATE TABLE IF NOT EXISTS `widget_tbl` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `widget_tbl`
--

INSERT INTO `widget_tbl` (`id`, `title`, `img`, `text`) VALUES
(1, 'افزایش کیفیت میوه‌های تابستانی', '../Site+1/images/uploader_from_widget/pic_widget_test/4.jpg', 'میوه‌های تابستانی با کیفیت و تازه عرضه می‌شوند.'),
(2, 'خواص تازه‌ترین میوه‌های فصل', '../Site+1/images/uploader_from_widget/pic_widget_test/1.jpg', 'خواص هر میوه تازه برای سلامتی مفید است.'),
(3, 'ترفندهای نگهداری میوه در خانه', '../Site+1/images/uploader_from_widget/pic_widget_test/3.jpg', 'نگهداری میوه‌ها تا هفته‌ها با روش ساده.'),
(4, 'طرز تهیه نوشیدنی‌های طبیعی با میوه', '../Site+1/images/uploader_from_widget/pic_widget_test/5.jpg', 'طرز تهیه نوشیدنی سالم و طبیعی با میوه.'),
(5, 'دسرهای خوشمزه با میوه‌های تازه', '../Site+1/images/uploader_from_widget/pic_widget_test/6.jpg', 'دسرهای خوشمزه و آسان با میوه‌های تازه.'),
(6, 'میوه‌های خارجی و خاص این ماه', '../Site+1/images/uploader_from_widget/pic_widget_test/7.jpg', 'میوه‌های خارجی و خاص این ماه را بشناسید.'),
(7, 'تغذیه سالم با میوه و سبزیجات', '../Site+1/images/uploader_from_widget/pic_widget_test/2.jpg', 'تغذیه سالم با میوه و سبزیجات روزانه.'),
(8, 'جدیدترین تحقیقات درباره میوه‌ها', '../Site+1/images/uploader_from_widget/pic_widget_test/8.jpg', 'جدیدترین تحقیقات علمی درباره تاثیر میوه‌ها.'),
(9, 'بازار میوه و قیمت‌های روز', '../Site+1/images/uploader_from_widget/pic_widget_test/9.jpg', 'نکات خرید هوشمندانه در بازار میوه.');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
