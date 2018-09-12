-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2018 年 9 月 12 日 09:56
-- サーバのバージョン： 5.5.60
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `CCChumans`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'フード'),
(2, 'レジャー'),
(3, '0円');

-- --------------------------------------------------------

--
-- テーブルの構造 `coupon`
--

CREATE TABLE `coupon` (
  `coupon_id` int(11) NOT NULL,
  `discount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `coupon`
--

INSERT INTO `coupon` (`coupon_id`, `discount`) VALUES
(1, '100%OFF!!'),
(2, '今なら半額'),
(3, 'アイスおまけ'),
(4, 'ジュース一杯無料'),
(5, '店員との記念撮影');

-- --------------------------------------------------------

--
-- テーブルの構造 `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `img_url` varchar(255) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `coupon_id` int(11) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` varchar(255) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `go_sum` int(11) NOT NULL DEFAULT '0',
  `geometry` geometry NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `post`
--

INSERT INTO `post` (`post_id`, `user_id`, `title`, `img_url`, `price`, `coupon_id`, `time`, `description`, `category_id`, `latitude`, `longitude`, `go_sum`, `geometry`) VALUES
(1, 1, '二子玉川ライズ・ ショッピングセンター', '/instaglam/img/P027762313_480.jpg', 5000, 1, '2018-09-11 10:44:09', '品揃えが良く、上の階にペットOKのカフェがあります。', 2, 35.612274, 139.628379, 3562, '\0\0\0\0\0\0\0��F�ta@v��^�A@'),
(2, 1, '二子玉川公園', '/instaglam/img/P027762313_480.jpg', 0, 2, '2018-09-03 02:49:58', '日本庭園は自然の地形では無いですが滝と池を上手いこと表現しています。公園内にスターバックスと、トイレは数ヶ所有ります。', 2, 35.608916, 139.632906, 692, '\0\0\0\0\0\0\0&n�@ta@m����A@'),
(3, 1, 'マクドナルド 環八等々力店', '/instaglam/img/P027762313_480.jpg', 700, 3, '2018-09-07 05:43:59', 'ドライブスルーあり、席は1階数席、2階十数席あり。', 1, 35.604208, 139.649713, 92, '\0\0\0\0\0\0\0\'��r�ta@���V�A@');

-- --------------------------------------------------------

--
-- テーブルの構造 `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `gender` int(11) NOT NULL,
  `email_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `user`
--

INSERT INTO `user` (`user_id`, `name`, `password`, `icon`, `gender`, `email_address`) VALUES
(1, 'test', 'password', '/img/icon.png', 0, 'test@test.jp'),
(2, 'takai', 'pass', '/img/icon_takai.png', 0, 'k.takai@chiba-u.jp'),
(3, 'rakuten-card-man', '1234', '/img/icon-rakuten.png', 2, 'rakuten@rakuten.jp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
