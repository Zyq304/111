-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 27, 2024 at 10:53 PM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pet`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `create_time`, `update_time`) VALUES
(1, 'admin', 'admin', 1704951177, 1704951177);

-- --------------------------------------------------------

--
-- Table structure for table `block`
--

CREATE TABLE `block` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `content` text COMMENT '内容',
  `create_time` int(11) DEFAULT NULL COMMENT '添加时间',
  `update_time` int(11) DEFAULT NULL COMMENT '修改时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `block`
--

INSERT INTO `block` (`id`, `title`, `content`, `create_time`, `update_time`) VALUES
(1, 'Welcome to', '\r\n                    <h2>Welcome to The Pet Care </h2>\r\n                    <p>Lorem ipsum dolor sit amet,consectetur adipiscing elit do eiusmod tempor incididunt ut labore et.Lorem ipsumsit amet, consectetur adipiscing elit, sed do eiusmod teincididunt ut laamet,consectetur adipiscing elibore et.</p>\r\n                    <div class=\"row mt-lg-5\">\r\n                        <div class=\"col-md-6\">\r\n                            <div class=\"pet-grooming\">\r\n                            <i><img src=\"assets/img/welcome-to-1.png\" alt=\"icon\"></i>\r\n                            <svg width=\"138\" height=\"138\" viewBox=\"0 0 673 673\" xmlns=\"http://www.w3.org/2000/svg\">\r\n                                <path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M9.82698 416.603C-19.0352 298.701 18.5108 173.372 107.497 90.7633L110.607 96.5197C24.3117 177.199 -12.311 298.935 15.0502 413.781L9.82698 416.603ZM89.893 565.433C172.674 654.828 298.511 692.463 416.766 663.224L414.077 658.245C298.613 686.363 175.954 649.666 94.9055 562.725L89.893 565.433ZM656.842 259.141C685.039 374.21 648.825 496.492 562.625 577.656L565.413 582.817C654.501 499.935 691.9 374.187 662.536 256.065L656.842 259.141ZM581.945 107.518C499.236 18.8371 373.997 -18.4724 256.228 10.5134L259.436 16.4515C373.888 -10.991 495.248 25.1518 576.04 110.708L581.945 107.518Z\" fill=\"#940c69\"/>\r\n                            </svg>\r\n                            <a href=\"#\"><h4>Pet Grooming</h4></a>\r\n                            <p>Lorem ipsum dolor sit amet ur adipiscing elit, sed do eiu incididunt ut labore et.</p>\r\n                            </div>\r\n                        </div>\r\n                        <div class=\"col-md-6\">\r\n                            <div class=\"pet-grooming mb-0\">\r\n                            <i><img src=\"assets/img/welcome-to-2.png\" alt=\"icon\"></i>\r\n                            <svg width=\"138\" height=\"138\" viewBox=\"0 0 673 673\" xmlns=\"http://www.w3.org/2000/svg\">\r\n                                <path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M9.82698 416.603C-19.0352 298.701 18.5108 173.372 107.497 90.7633L110.607 96.5197C24.3117 177.199 -12.311 298.935 15.0502 413.781L9.82698 416.603ZM89.893 565.433C172.674 654.828 298.511 692.463 416.766 663.224L414.077 658.245C298.613 686.363 175.954 649.666 94.9055 562.725L89.893 565.433ZM656.842 259.141C685.039 374.21 648.825 496.492 562.625 577.656L565.413 582.817C654.501 499.935 691.9 374.187 662.536 256.065L656.842 259.141ZM581.945 107.518C499.236 18.8371 373.997 -18.4724 256.228 10.5134L259.436 16.4515C373.888 -10.991 495.248 25.1518 576.04 110.708L581.945 107.518Z\" fill=\"#940c69\"/>\r\n                            </svg>\r\n                            <a href=\"#\"><h4>Dog Walking</h4></a>\r\n                            <p>Lorem ipsum dolor sit amet ur adipiscing elit, sed do eiu incididunt ut labore et.</p>\r\n                            </div>\r\n                        </div>\r\n                    </div>\r\n                ', 1704952674, 1704952674),
(2, 'About Us', ' <div class=\"heading two\">\r\n                    <h2>Welcome to The Pet Care</h2>\r\n                </div>\r\n                <div class=\"love-your-pets\">\r\n                    <p>Lorem ipsum dolor sit amet,consectetur adipiscing elit do ei usmod tempor incididunt ut labore et.Lorem ipsumsit amet,  consectetur adipiscing elit, sed do eiusmod teincididunt ut la amet,consectetur.</p>\r\n                    <ul class=\"list\">\r\n                        <li><img src=\"assets/img/list.png\" alt=\"list\">Graceful goldfish, to small, cute kittens</li>\r\n                        <li><img src=\"assets/img/list.png\" alt=\"list\">Feeders are either veterinary qualified staf</li>\r\n                        <li><img src=\"assets/img/list.png\" alt=\"list\">Experienced pet owners and animal lovers</li>\r\n                        <li><img src=\"assets/img/list.png\" alt=\"list\">Hungry horses: whatever the size of your pe</li>\r\n                    </ul>\r\n                    <div class=\"company-oner position-relative\">\r\n                        <img src=\"assets/img/girl.jpg\" alt=\"girl\">\r\n                        <svg width=\"116\" height=\"116\" viewBox=\"0 0 673 673\" xmlns=\"http://www.w3.org/2000/svg\">\r\n                            <path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M9.82698 416.603C-19.0352 298.701 18.5108 173.372 107.497 90.7633L110.607 96.5197C24.3117 177.199 -12.311 298.935 15.0502 413.781L9.82698 416.603ZM89.893 565.433C172.674 654.828 298.511 692.463 416.766 663.224L414.077 658.245C298.613 686.363 175.954 649.666 94.9055 562.725L89.893 565.433ZM656.842 259.141C685.039 374.21 648.825 496.492 562.625 577.656L565.413 582.817C654.501 499.935 691.9 374.187 662.536 256.065L656.842 259.141ZM581.945 107.518C499.236 18.8371 373.997 -18.4724 256.228 10.5134L259.436 16.4515C373.888 -10.991 495.248 25.1518 576.04 110.708L581.945 107.518Z\" fill=\"#000\"></path>\r\n                        </svg>\r\n                        <div>\r\n                            <h3>Jessica Catty</h3>\r\n                            <p>Owner Pet Care Company</p>\r\n                        </div>\r\n                    </div>\r\n                </div>', 1704952704, 1704952704);

-- --------------------------------------------------------

--
-- Table structure for table `board`
--

CREATE TABLE `board` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `title` varchar(255) NOT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `board`
--

INSERT INTO `board` (`id`, `title`, `create_time`, `update_time`) VALUES
(1, 'Dog', 1704952674, 1708935821),
(2, 'Cat', 1704952704, 1708935828),
(3, 'Animal Feed', 1704952704, 1708935843),
(6, 'Horse', 1704952704, 1708935843);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `title` varchar(255) NOT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `create_time`, `update_time`) VALUES
(1, 'Dog', 1708867935, 1708935701),
(2, 'Cat', 1704952704, 1708935707),
(3, 'House', 1704952704, 1708935707);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `post_id` int(11) DEFAULT NULL,
  `content` text,
  `user_id` int(11) DEFAULT NULL,
  `create_time` varchar(255) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `post_id`, `content`, `user_id`, `create_time`, `update_time`, `status`, `parent_id`) VALUES
(1, 1, 'hhhh', 1, '1709045099', 1709045099, 1, 0),
(2, 1, 'asdasd', 1, '1709045599', 1709045599, 1, 1),
(3, 1, 'asdasdd', 1, '1709045604', 1709045604, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pet`
--

CREATE TABLE `pet` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `age` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `photo1` varchar(255) DEFAULT NULL,
  `photo2` varchar(255) DEFAULT NULL,
  `photo3` varchar(255) DEFAULT NULL,
  `content` text,
  `status` tinyint(1) DEFAULT '1',
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT '0',
  `hits` int(11) DEFAULT '0',
  `address` varchar(255) DEFAULT NULL,
  `jd` varchar(255) DEFAULT NULL,
  `wd` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `pet`
--

INSERT INTO `pet` (`id`, `category_id`, `title`, `age`, `color`, `weight`, `photo`, `photo1`, `photo2`, `photo3`, `content`, `status`, `create_time`, `update_time`, `user_id`, `hits`, `address`, `jd`, `wd`) VALUES
(1, 1, 'Rou Wan', '2', 'White', '5kg', 'upload/pet/240227103102_2078795447_217x255.jpg', 'upload/pet/240227103108_1547183136.jpg', 'upload/pet/240227103114_511971660.jpg', 'upload/pet/240227103120_63439923.jpg', '<span style=\"color:#444444;font-family:Anybody;font-size:18px;background-color:#FFFFFF;\">Lorem ipsum dolor sit amet,consectetur adipiscing elit do ei usmod tempor incididunt ut labore et.Lorem ipsusit amet, consectetur adliem ipiscing elit, sed do eiusmod teincididunt ut la amet,consectetur. Lorem ipsum dolor sit sit amet, consectetur adipiscing elit, sed do eius lie mod teincididunt ut la amet,consectetur. Lorem ipsum dolor sit amet,consectetur adipiscing elit do ei usmod tempor incididunt ut labore ui et.Lorem ipsusit amet, consectetur adipiscing elit, sed do eiusmod teincididunt ut la amet,consectetur. Lorem ipsum dolor sit sit amet, an consectetur adipiscing elit, sed do eiusmod teincididunt ut la amet,consectetur.ddd</span>', 1, 1709044502, 1709044541, 1, 1, '12-12A Kennedy Street, Wanchai, Hong Kong', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `board_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `content` text,
  `status` tinyint(1) DEFAULT '1',
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT '0',
  `hits` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `board_id`, `title`, `content`, `status`, `create_time`, `update_time`, `user_id`, `hits`) VALUES
(1, 1, 'hi welcome', 'hi welcomehi welcomehi welcomehi welcomehi welcomesdasd', 1, 1709044710, 1709044730, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `photo`, `create_time`, `update_time`) VALUES
(1, 'test', 'test@123.com', '123123', 'upload/user/240227101819_1387696891_200x200.jpg', 1709043268, 1709043501);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `block`
--
ALTER TABLE `block`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `block`
--
ALTER TABLE `block`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `board`
--
ALTER TABLE `board`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pet`
--
ALTER TABLE `pet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
