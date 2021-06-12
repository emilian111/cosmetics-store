-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2021 at 11:08 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'emilian@gmail.com', 'dyqan123');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'Make Up', '2021-06-07 13:34:15', '2021-06-07 13:34:15'),
(4, 'Skin Care', '2021-06-07 13:34:22', '2021-06-07 13:34:22');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `datetime` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `author`, `datetime`) VALUES
(3, 'Skincare', 'emilian@gmail.com', ' 10:04:31, 08/06/2021'),
(4, 'MakeUP', 'emilian@gmail.com', ' 10:04:40, 08/06/2021');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `approvedby` varchar(50) NOT NULL,
  `status` varchar(3) NOT NULL,
  `post_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(9, 'test@test.com', '123', '2021-06-06 22:25:21', '2021-06-06 22:25:21'),
(11, 'tst@tst.com', '$2y$10$AmTlZmGTQaIA6rlK7X8quO5utdhujWA8oLWAJJXedT0MQh.OInofu', '2021-06-07 17:40:33', '2021-06-07 17:40:33'),
(12, 'asnahsbhajs', '$2y$10$uCUa30GCsMRwwb1mAy6VUehkk25fwGW/vSAi1Hd8go2aTG2j5XCI.', '2021-06-07 21:40:15', '2021-06-07 21:40:15'),
(13, 'eugenprendi@yahoo.com', '$2y$10$1D/0UBy73nLun4yTcaywEuUM7v8J9ckWBOx8Z4yXeLcBwtaqA/suO', '2021-06-07 22:02:14', '2021-06-07 22:02:14');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `address` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `total` int(11) NOT NULL,
  `pay_method` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `address`, `phone`, `total`, `pay_method`, `created_at`, `updated_at`) VALUES
(3, 1, 'flat 13-b, gulshan terrace, Mu', '03332975389', 15002, '', '2020-11-14 22:50:18', '2020-11-14 22:50:18'),
(4, 1, 'Sanarota', '03332975389', 15002, '', '2020-11-14 22:57:55', '2020-11-14 22:57:55'),
(22, 9, 'asdf', '421412', 15002, 'cash', '2021-06-06 23:10:09', '2021-06-06 23:10:09'),
(24, 9, 'wzzwz', '3222', 45000, 'cash', '2021-06-06 23:22:55', '2021-06-06 23:22:55'),
(25, 9, 'asag', '42121', 45000, 'paypal', '2021-06-06 23:42:33', '2021-06-06 23:42:33'),
(26, 9, 'asf', '41221', 15002, 'paypal', '2021-06-07 08:43:39', '2021-06-07 08:43:39'),
(28, 9, 'tirana', '06989', 12500, 'cash', '2021-06-07 09:09:12', '2021-06-07 09:09:12'),
(29, 9, 'Durres', '999', 180400, 'cash', '2021-06-07 09:18:58', '2021-06-07 09:18:58'),
(30, 9, 'Fresk', '12345678', 61, 'cash', '2021-06-07 17:27:24', '2021-06-07 17:27:24'),
(31, 9, 'n nm  m', '4545454', 202, 'cash', '2021-06-07 17:28:48', '2021-06-07 17:28:48');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 5, 9, 1, '2020-11-14 23:03:39', '2020-11-14 23:03:39'),
(2, 6, 9, 1, '2020-11-14 23:11:07', '2020-11-14 23:11:07'),
(3, 8, 9, 1, '2020-11-19 07:10:05', '2020-11-19 07:10:05'),
(4, 9, 9, 1, '2020-11-19 07:10:14', '2020-11-19 07:10:14'),
(5, 10, 9, 1, '2020-11-19 07:12:15', '2020-11-19 07:12:15'),
(6, 11, 9, 1, '2020-11-19 07:12:51', '2020-11-19 07:12:51'),
(7, 12, 9, 1, '2020-11-19 07:13:15', '2020-11-19 07:13:15'),
(8, 13, 9, 1, '2020-11-19 07:17:39', '2020-11-19 07:17:39'),
(9, 14, 9, 1, '2020-11-19 07:17:51', '2020-11-19 07:17:51'),
(10, 15, 9, 1, '2020-11-19 07:19:04', '2020-11-19 07:19:04'),
(11, 16, 9, 1, '2020-11-19 07:19:10', '2020-11-19 07:19:10'),
(12, 17, 9, 1, '2020-11-19 07:19:25', '2020-11-19 07:19:25'),
(13, 18, 9, 1, '2020-11-19 07:19:36', '2020-11-19 07:19:36'),
(14, 19, 9, 1, '2020-11-19 07:21:22', '2020-11-19 07:21:22'),
(15, 20, 9, 1, '2020-11-19 07:21:32', '2020-11-19 07:21:32'),
(16, 4, 13, 1, '2020-11-19 08:12:43', '2020-11-19 08:12:43'),
(17, 4, 13, 1, '2020-11-19 08:12:50', '2020-11-19 08:12:50'),
(18, 4, 13, 1, '2020-11-19 08:13:09', '2020-11-19 08:13:09'),
(19, 4, 13, 1, '2020-11-19 08:13:38', '2020-11-19 08:13:38'),
(20, 21, 13, 1, '2020-11-19 08:15:32', '2020-11-19 08:15:32'),
(21, 22, 9, 1, '2021-06-06 23:10:09', '2021-06-06 23:10:09'),
(22, 23, 9, 1, '2021-06-06 23:16:08', '2021-06-06 23:16:08'),
(23, 24, 13, 1, '2021-06-06 23:22:55', '2021-06-06 23:22:55'),
(24, 25, 13, 1, '2021-06-06 23:42:33', '2021-06-06 23:42:33'),
(25, 26, 9, 1, '2021-06-07 08:43:39', '2021-06-07 08:43:39'),
(26, 27, 9, 3, '2021-06-07 08:48:19', '2021-06-07 08:48:19'),
(27, 28, 16, 7, '2021-06-07 09:09:12', '2021-06-07 09:09:12'),
(28, 28, 6, 6, '2021-06-07 09:09:12', '2021-06-07 09:09:12'),
(29, 29, 13, 4, '2021-06-07 09:18:58', '2021-06-07 09:18:58'),
(30, 29, 15, 2, '2021-06-07 09:18:58', '2021-06-07 09:18:58'),
(31, 30, 34, 1, '2021-06-07 17:27:24', '2021-06-07 17:27:24'),
(32, 30, 32, 1, '2021-06-07 17:27:24', '2021-06-07 17:27:24'),
(33, 31, 30, 4, '2021-06-07 17:28:48', '2021-06-07 17:28:48'),
(34, 31, 36, 6, '2021-06-07 17:28:48', '2021-06-07 17:28:48');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) NOT NULL,
  `datetime` varchar(15) NOT NULL,
  `title` varchar(300) NOT NULL,
  `category` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `post` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `datetime`, `title`, `category`, `author`, `image`, `post`) VALUES
(6, ' 10:05:51, 08/0', 'Daisy', 'Skincare', 'emilian@gmail.com', 'postidy.png', 'Ky është hapi më i vështirë. Ka disa mënyra mbi gjetjen e tonit tuaj të lëkurës \r\ntë cilat duhet t’i eksploroni vetë dhe të vendosni cila është e përshtatshme\r\npër ju. Një nga mënyrat më të zakonshme është ngjyra e venave në kyçin\r\ne dorës.Nese keni kerkuar shume dhe akoma nuk keni gjetur ngjyrën tuaj perfekte të foundation , mos u shqetesoni ! Mund të miksoni dy foundations të ngjashëm me lëkuren tuaj dhe ja tek e keni , ngjyren tuaj perfekte !'),
(7, ' 10:06:22, 08/0', 'Daisy2', 'MakeUP', 'emilian@gmail.com', 'postinje.png', 'Përbërësit na ndihmojnë të kuptojmë funksionet reale dhe qëllimin e \r\nprodukteve të kujdesit për lëkurën. Ato zbulojnë se si një produkt mund të \r\nndihmojë lëkurën tonë, bazuar në shkencën e përbërësve dhe se si ato \r\nndërveprojnë me lëkurën tonë.');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(11) NOT NULL,
  `picture` varchar(30) NOT NULL,
  `description` mediumtext NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `picture`, `description`, `category_id`, `created_at`, `updated_at`) VALUES
(29, 'Blush 01 CLINIQUE', 18, 'uploads/blushclinique.jpg', 'Per nje pamje te lemuar dhe me shkelqim.', 3, '2021-06-07 14:10:49', '2021-06-07 14:10:49'),
(30, 'Hidratues Clinique', 25, 'uploads/clinquehidratante.jpg', 'Per nje lekure te shendetshme dhe te hidratuar.', 4, '2021-06-07 14:12:11', '2021-06-07 14:12:11'),
(31, 'Krem mbulues 03 CLIQUE', 23, 'uploads/faundation.jpg', 'Me nje mbulim te plote.', 3, '2021-06-07 14:15:28', '2021-06-07 14:15:28'),
(32, 'Moister Surge Eye ', 42, 'uploads/hidratues.jpg', 'Per nje lekure te definuar nen zonen e syve.', 4, '2021-06-07 14:19:47', '2021-06-07 14:19:47'),
(33, 'Hidratues per djem CLINIQUE', 26, 'uploads/manclinique.jpg', 'Per nje lekure te hidratuar dhe elastike.', 4, '2021-06-07 14:22:20', '2021-06-07 14:22:20'),
(34, 'Krem mbules  02 LA ROCHE POSAY', 19, 'uploads/produkt1.png', 'Me nje mbulim mesatar.', 3, '2021-06-07 14:24:26', '2021-06-07 14:24:26'),
(35, 'Krem mbulues 02 VICHY', 24, 'uploads/produkt3.jpg', 'Me nje mbulim te lehte dhe hidratues.', 3, '2021-06-07 14:25:32', '2021-06-07 14:25:32'),
(36, 'Kremi kunder rrudhjes per djem', 17, 'uploads/produkt4.jpeg', 'Per nje lekure te hidratuar.', 4, '2021-06-07 14:27:40', '2021-06-07 14:27:40'),
(37, 'Serum per fytyren ORDINARY', 13, 'uploads/redordinary.jpg', 'E pershtatshme per cdo lloj lekure.', 4, '2021-06-07 14:29:50', '2021-06-07 14:29:50'),
(38, 'Krem dielli LA ROCHE POSAY', 23, 'uploads/suncream.jpg', 'Krem kundra diellit me mbrojtje maksimale. ', 4, '2021-06-07 14:30:57', '2021-06-07 14:30:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `commentsPosts` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
