-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2026 at 09:05 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saudi_discovery`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'admin', '123456AA');

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `landmarks` text DEFAULT NULL,
  `info` text DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`id`, `name`, `category`, `description`, `image`, `landmarks`, `info`, `image2`, `image3`) VALUES
(1, 'الرياض', 'city', 'عاصمة المملكة ومركزها الاقتصادي والثقافي.', 'riyadh.jpg', 'برج المملكة، المتحف الوطني، الدرعية', 'المنطقة: الوسطى | المناخ: صحراوي حار | تشتهر بـ: الأبراج والأسواق الحديثة', 'riyadh2.jpg', 'riyadh3.jpg'),
(2, 'مكة المكرمة', 'religious', 'وجهة دينية بارزة وتضم المسجد الحرام.', 'mecca.jpg', 'لكعبة المشرفة، المسجد الحرام، جبل عرفات', 'المنطقة: الغربية | المناخ: حار | تشتهر بـ: الحج والعمرة', 'mecca2.jpg', 'mecca3.jpg'),
(3, 'الخبر', 'city', 'واجهة بحرية حديثة ومكان مميز للزيارة.', 'khobar.jpg', 'كورنيش الخبر، شاطئ نصف القمر، الواجهة البحرية', 'المنطقة: الشرقية | المناخ: معتدل نسبيًا | تشتهر بـ: الواجهة البحرية', 'khobar2.jpg', 'khobar3.jpg'),
(4, 'أبها', 'nature', 'طبيعة جميلة وأجواء باردة.', 'abha.jpg', 'السودة، رجال ألمع، منتزه عسير', 'المنطقة: عسير | المناخ: معتدل وبارد | تشتهر بـ: الطبيعة والجبال', 'abha2.jpg', 'abha3.jpg'),
(5, 'العلا', 'heritage', 'آثار قديمة ومعالم طبيعية فريدة', 'alula.jpg', 'مدائن صالح، جبل الفيل، البلدة القديمة', 'المنطقة: المدينة المنورة | المناخ: صحراوي | تشتهر بـ: مدائن صالح', 'alula2.jpg', 'alula3.jpg'),
(6, 'تبوك', 'nature', 'مواقع تاريخية وطبيعة متنوعة.', 'tabuk.jpg', 'وادي الديسة، قلعة تبوك، جبال اللوز', 'المنطقة: الشمالية | المناخ: معتدل | تشتهر بـ: الجبال والوديان', 'tabuk2.jpg', 'tabuk3.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
