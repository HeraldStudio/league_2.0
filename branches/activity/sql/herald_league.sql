-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 17, 2012 at 11:48 PM
-- Server version: 5.5.28
-- PHP Version: 5.4.4

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
  `content_id` int(11) NOT NULL,
  `is_vote` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lg_activity_class`
--

CREATE TABLE IF NOT EXISTS `lg_activity_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lg_answer`
--

CREATE TABLE IF NOT EXISTS `lg_answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_id` int(11) NOT NULL,
  `floor_id` int(11) NOT NULL COMMENT '楼层数',
  `is_new` int(4) NOT NULL DEFAULT '1' COMMENT '默认为1  被评论用户点击之后置为0',
  `content` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lg_attention`
--

CREATE TABLE IF NOT EXISTS `lg_attention` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `attended_id` int(11) NOT NULL COMMENT '被关注者id',
  `isleague` int(4) NOT NULL COMMENT '0表示活动 1表示社团',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lg_comment`
--

CREATE TABLE IF NOT EXISTS `lg_comment` (
  `id` int(11) NOT NULL,
  `comming_id` int(11) NOT NULL COMMENT '评论者id',
  `comming_type` int(4) NOT NULL COMMENT '评论者类型',
  `commed_id` int(11) NOT NULL COMMENT '被评论者id',
  `commed_type` int(4) NOT NULL COMMENT '被评论者类型',
  `is_new` int(4) NOT NULL DEFAULT '1',
  `content` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lg_league`
--

CREATE TABLE IF NOT EXISTS `lg_league` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `league_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lg_league_album`
--

CREATE TABLE IF NOT EXISTS `lg_league_album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `league_id` int(11) NOT NULL,
  `album_name` varchar(255) NOT NULL,
  `album_info` varchar(255) NOT NULL,
  `album_cover_add` varchar(255) NOT NULL,
  `album_comment_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `lg_league_album`
--

INSERT INTO `lg_league_album` (`id`, `league_id`, `album_name`, `album_info`, `album_cover_add`, `album_comment_id`) VALUES
(1, 1, '测试相册', '测试相册 测试相册 测试信息测试信息', 'LeagueAlbum/Small/small_1a6f5959c871b56b21e9e3b2ab9ce33f.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lg_league_class`
--

CREATE TABLE IF NOT EXISTS `lg_league_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `lg_league_class`
--

INSERT INTO `lg_league_class` (`id`, `class_name`) VALUES
(1, '科学技术类'),
(2, '体育健身类'),
(3, '文化艺术类'),
(4, '文学传媒类'),
(5, '志愿服务类'),
(6, '学生会'),
(7, '其他');

-- --------------------------------------------------------

--
-- Table structure for table `lg_league_info`
--

CREATE TABLE IF NOT EXISTS `lg_league_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'importent',
  `league_name` varchar(255) NOT NULL,
  `league_introduce` varchar(255) NOT NULL DEFAULT '管理员还没添加简介哦~' COMMENT '社团简介',
  `register_time` date NOT NULL,
  `last_login_time` date NOT NULL,
  `avater_address` varchar(255) NOT NULL,
  `league_class` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `league_member` varchar(255) NOT NULL,
  `street_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `lg_league_info`
--

INSERT INTO `lg_league_info` (`id`, `league_name`, `league_introduce`, `register_time`, `last_login_time`, `avater_address`, `league_class`, `content_id`, `league_member`, `street_id`) VALUES
(1, '东南大学先声网', '我们是伟大的先声网', '2012-12-17', '2012-12-17', './123.jpg', 1, 1, '兵哥 亮哥等', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lg_league_picture`
--

CREATE TABLE IF NOT EXISTS `lg_league_picture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `league_id` int(11) NOT NULL,
  `picture_name` varchar(255) NOT NULL,
  `picture_info` varchar(255) NOT NULL,
  `small_picture_add` varchar(255) NOT NULL,
  `large_picture_add` varchar(255) NOT NULL,
  `album_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `is_cover` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `lg_league_picture`
--

INSERT INTO `lg_league_picture` (`id`, `league_id`, `picture_name`, `picture_info`, `small_picture_add`, `large_picture_add`, `album_id`, `comment_id`, `is_cover`) VALUES
(1, 1, '测试名称', '测试信息', 'LeagueAlbum/Small/small_1a6f5959c871b56b21e9e3b2ab9ce33f.jpg', 'LeagueAlbum/Large/large_1a6f5959c871b56b21e9e3b2ab9ce33f.jpg', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lg_street`
--

CREATE TABLE IF NOT EXISTS `lg_street` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `street_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `lg_street`
--

INSERT INTO `lg_street` (`id`, `street_name`) VALUES
(1, '梅园路'),
(2, '橘园路'),
(3, '桃园路'),
(4, '行政楼路'),
(5, '田家炳路');

-- --------------------------------------------------------

--
-- Table structure for table `lg_systerm_admin`
--

CREATE TABLE IF NOT EXISTS `lg_systerm_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `possword` varchar(255) NOT NULL,
  `truename` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lg_user`
--

CREATE TABLE IF NOT EXISTS `lg_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `card_num` varchar(50) NOT NULL,
  `true_name` varchar(255) NOT NULL,
  `nick_name` varchar(255) NOT NULL,
  `user_avatar_add` varchar(255) NOT NULL COMMENT '头像地址',
  `user_qq` varchar(255) NOT NULL DEFAULT '保密',
  `user_mail` varchar(255) NOT NULL DEFAULT '保密',
  `user_phone` varchar(255) NOT NULL DEFAULT '保密',
  `user_grade` int(11) NOT NULL,
  `user_college` varchar(255) NOT NULL DEFAULT '保密',
  `last_login_time` date NOT NULL,
  `times` int(11) NOT NULL DEFAULT '0' COMMENT '登陆次数 ',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `lg_user`
--

INSERT INTO `lg_user` (`id`, `card_num`, `true_name`, `nick_name`, `user_avatar_add`, `user_qq`, `user_mail`, `user_phone`, `user_grade`, `user_college`, `last_login_time`, `times`) VALUES
(1, '213111517', '郭耿瑞', 'Tairy', '/UserAvatar/psu.jpg', '1210137461', 'tairyguo@gmail.com', '15850692128', 2, '物理系', '2012-12-17', 0),
(2, '213111516', '张三', 'zhangsan', '/UserAvatar/psu.jpg', '000000000', '00@00.com', '111111', 1, '数学系', '2012-12-25', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lg_vote`
--

CREATE TABLE IF NOT EXISTS `lg_vote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `league_id` int(11) NOT NULL,
  `vote_name` varchar(255) NOT NULL,
  `available_num` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lg_vote_item`
--

CREATE TABLE IF NOT EXISTS `lg_vote_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vote_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_content` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lg_vote_result`
--

CREATE TABLE IF NOT EXISTS `lg_vote_result` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lg_wanto`
--

CREATE TABLE IF NOT EXISTS `lg_wanto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
