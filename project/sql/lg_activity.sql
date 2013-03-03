-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 03, 2013 at 10:14 AM
-- Server version: 5.5.28
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `herald_league`
--

-- --------------------------------------------------------

--
-- Table structure for table `lg_activity`
--

CREATE TABLE IF NOT EXISTS `lg_activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `league_id` int(11) NOT NULL,
  `activity_name` varchar(255) NOT NULL,
  `start_time` date NOT NULL,
  `end_time` date NOT NULL,
  `activity_introduce` varchar(255) NOT NULL,
  `activity_post_add` varchar(255) NOT NULL,
  `contact_info` varchar(255) NOT NULL COMMENT '联系方式',
  `activity_org_name` varchar(255) NOT NULL,
  `activity_release_time` date NOT NULL,
  `activity_count` int(11) NOT NULL COMMENT '点击量',
  `is_vote` int(2) NOT NULL DEFAULT '0',
  `activity_place` varchar(255) NOT NULL,
  `specific_time` varchar(255) DEFAULT NULL COMMENT '活动具体时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=115 ;

--
-- Dumping data for table `lg_activity`
--

INSERT INTO `lg_activity` (`id`, `league_id`, `activity_name`, `start_time`, `end_time`, `activity_introduce`, `activity_post_add`, `contact_info`, `activity_org_name`, `activity_release_time`, `activity_count`, `is_vote`, `activity_place`, `specific_time`) VALUES
(106, 1, 'up', '2013-04-01', '2013-05-01', 'qqq', '1/2013-02-16/511f4253c275a.jpg', '1111', '东南大学先声网', '2013-02-16', 2, 1, '111', ''),
(107, 1, 'up', '2013-04-01', '2013-05-01', 'qqq', '1/2013-02-16/511f435462f79.jpg', '1111', '东南大学先声网', '2013-02-16', 0, 1, '111', ''),
(108, 1, 'up', '2013-04-01', '2013-05-01', 'qqq', '1/2013-02-16/511f4bc6274bf.jpg', '1111', '东南大学先声网', '2013-02-16', 39, 1, '1111111111111111111111111111111111111111111111111111111222222222222222222222222333333333333333333333', ''),
(109, 1, 'up', '2013-04-10', '2013-06-12', '森达啊啊防撒旦岁刚出去as开啊啊啊啊', '1/2013-02-22/5127195302d38.jpg', '1111', '先声网', '2013-02-22', 1, 0, '111', ''),
(110, 1, 'up', '2013-03-28', '2013-04-24', '梗梗梗', '1/2013-02-22/51271fa7dea17.jpg', '1111', '先声网', '2013-02-22', 20, 0, '111', ''),
(111, 1, 'upp', '2013-02-23', '2013-02-25', 'ffffffffffff', '1/2013-02-22/51273f5088a6a.jpg', '1111', '先声网', '2013-02-22', 1, 0, '111', ''),
(112, 1, '&lt;', '2013-03-20', '2013-02-27', 'afafaaaaaaaaaaaaaaa', '1/2013-02-26/512c0872a8fe6.jpg', '1', '先声网', '2013-02-26', 1, 0, '1&#39;)#', ''),
(113, 1, 'upp', '2013-03-05', '2013-03-18', '哈aa', '1/2013-03-03/5132afdb90e1c.jpg', '1111', '先声网', '2013-03-03', 0, 0, '111', NULL),
(114, 1, 'up', '2013-03-04', '2013-03-25', '的', '1/2013-03-03/5132b0785a8ab.jpg', '1111', '先声网', '2013-03-03', 0, 0, '111', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
