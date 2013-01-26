-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 22, 2013 at 08:26 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

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
  `comment_id` int(11) NOT NULL,
  `is_vote` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `lg_activity`
--

INSERT INTO `lg_activity` (`id`, `league_id`, `activity_name`, `start_time`, `end_time`, `activity_introduce`, `activity_post_add`, `contact_info`, `activity_org_name`, `activity_release_time`, `activity_count`, `comment_id`, `is_vote`) VALUES
(1, 1, '测试活动', '2012-12-21', '2012-12-21', '这是一个测试活动', '1.jpg', '15850888888', '东南大学先声网', '2012-12-21', 19, 1, 0),
(2, 1, '测试投票', '2013-01-02', '2013-01-10', '测试投票介绍', '测试投票', '131-1111111', '测试投票组织<div><a><img><frame>', '2013-01-01', 18, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lg_activity_class`
--

CREATE TABLE IF NOT EXISTS `lg_activity_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `lg_activity_class`
--

INSERT INTO `lg_activity_class` (`id`, `class_name`) VALUES
(1, '招新');

-- --------------------------------------------------------

--
-- Table structure for table `lg_answer`
--

CREATE TABLE IF NOT EXISTS `lg_answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_id` int(11) NOT NULL,
  `answering_id` int(11) NOT NULL,
  `answering_type` int(11) NOT NULL,
  `floor_id` int(11) NOT NULL COMMENT '楼层数',
  `is_new` int(4) NOT NULL DEFAULT '1' COMMENT '默认为1  被评论用户点击之后置为0',
  `content` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `lg_answer`
--

INSERT INTO `lg_answer` (`id`, `comment_id`, `answering_id`, `answering_type`, `floor_id`, `is_new`, `content`) VALUES
(1, 1, 2, 1, 1, 1, '测试回复给相册的'),
(2, 2, 1, 1, 2, 1, '还是测试回复'),
(3, 3, 2, 1, 3, 1, '测试回复给社团的'),
(4, 4, 1, 2, 4, 1, '这是给社团的测试回复'),
(5, 1, 2, 1, 2, 1, '这也是给相册的测试回复'),
(6, 5, 1, 1, 1, 1, '这是给照片的测试回复1'),
(7, 6, 1, 1, 1, 1, '这是给照片的测试回复2'),
(8, 1, 1, 1, 1, 1, '测试回复'),
(17, 1, 1, 1, 1, 1, 'test'),
(18, 12, 1, 1, 1, 1, '留个言试一下'),
(19, 1, 1, 1, 1, 1, '回复一下试一下'),
(20, 0, 1, 1, 1, 1, '回复一下试一下'),
(21, 2, 1, 1, 1, 1, '回复一下试一下'),
(22, 11, 1, 1, 1, 1, '测试一下回复'),
(23, 12, 1, 1, 1, 1, '再试一下'),
(24, 2, 1, 1, 1, 1, 'tste'),
(25, 9, 1, 1, 1, 1, 'huifu');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `lg_attention`
--

INSERT INTO `lg_attention` (`id`, `user_id`, `attended_id`, `isleague`) VALUES
(2, 2, 1, 0),
(3, 1, 1, 1),
(4, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lg_class_activity`
--

CREATE TABLE IF NOT EXISTS `lg_class_activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activity_id` int(11) NOT NULL COMMENT '活动的id',
  `class_id` int(11) NOT NULL COMMENT '标签的id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='活动的标签' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `lg_class_activity`
--

INSERT INTO `lg_class_activity` (`id`, `activity_id`, `class_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lg_comment`
--

CREATE TABLE IF NOT EXISTS `lg_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comming_id` int(11) NOT NULL COMMENT '评论者id',
  `comming_type` int(4) NOT NULL COMMENT '评论者类型',
  `commed_id` int(11) NOT NULL COMMENT '被评论者id',
  `commed_type` int(4) NOT NULL COMMENT '被评论者类型',
  `is_new` int(4) NOT NULL DEFAULT '1',
  `content` varchar(255) NOT NULL,
  `comment_date` date NOT NULL,
  `comment_time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `lg_comment`
--

INSERT INTO `lg_comment` (`id`, `comming_id`, `comming_type`, `commed_id`, `commed_type`, `is_new`, `content`, `comment_date`, `comment_time`) VALUES
(1, 1, 1, 1, 1, 1, '这还是一个测试评论', '0000-00-00', '00:00:00'),
(2, 1, 1, 1, 2, 1, '这还是一个测试评论', '0000-00-00', '00:00:00'),
(9, 1, 1, 1, 2, 1, '这时给相册的一个测试评论', '0000-00-00', '00:00:00'),
(10, 1, 1, 2, 2, 1, '这是给第二个相册的评论', '0000-00-00', '00:00:00'),
(11, 1, 1, 1, 3, 1, '这是给照片的评论', '0000-00-00', '00:00:00'),
(12, 1, 1, 1, 1, 1, '我在留一个言', '0000-00-00', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `lg_commented_type`
--

CREATE TABLE IF NOT EXISTS `lg_commented_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='这个表主要是为了记录被评论对象的类型的id 于实际代码没有多大用处' AUTO_INCREMENT=7 ;

--
-- Dumping data for table `lg_commented_type`
--

INSERT INTO `lg_commented_type` (`id`, `type`) VALUES
(1, 'league'),
(2, 'album'),
(3, 'picture'),
(4, 'activity'),
(5, 'video'),
(6, 'audio');

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
  `comment_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `lg_league_album`
--

INSERT INTO `lg_league_album` (`id`, `league_id`, `album_name`, `album_info`, `album_cover_add`, `comment_id`) VALUES
(1, 1, '测试相册', '测试相册 测试相册 测试信息测试信息', 'LeagueAlbum/Small/small_1a6f5959c871b56b21e9e3b2ab9ce33f.jpg', 1),
(2, 1, '测试', '测试', 'LeagueAlbum/Small/small_1a6f5959c871b56b21e9e3b2ab9ce33f.jpg', 2);

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
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `league_name` varchar(255) NOT NULL,
  `league_introduce` varchar(255) NOT NULL DEFAULT '管理员还没添加简介哦~' COMMENT '社团简介',
  `register_time` date NOT NULL,
  `last_login_time` date NOT NULL,
  `avater_address` varchar(255) NOT NULL DEFAULT '',
  `league_class` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `league_member` varchar(255) NOT NULL DEFAULT '还没添加成员哦~',
  `street_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `lg_league_info`
--

INSERT INTO `lg_league_info` (`id`, `username`, `password`, `league_name`, `league_introduce`, `register_time`, `last_login_time`, `avater_address`, `league_class`, `content_id`, `league_member`, `street_id`) VALUES
(1, '', '', '东南大学先声网', '我们是伟大的先声网', '2012-12-17', '2012-12-17', './123.jpg', 1, 1, '兵哥 亮哥等', 1),
(2, '', '', '测试社团', '管理员还没添加简介哦~', '2012-12-20', '2012-12-20', './123.jpg', 1, 1, '测试人员', 1);

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
(1, 1, '测试照片', '这是一个测试照片', 'LeagueAlbum/Small/small_1a6f5959c871b56b21e9e3b2ab9ce33f.jpg', 'LeagueAlbum/Large/large_1a6f5959c871b56b21e9e3b2ab9ce33f.jpg', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lg_street`
--

CREATE TABLE IF NOT EXISTS `lg_street` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `street_name` varchar(255) NOT NULL,
  `league_class` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `lg_street`
--

INSERT INTO `lg_street` (`id`, `street_name`, `league_class`) VALUES
(1, '梅园路', 1),
(2, '橘园路', 1),
(3, '桃园路', 2),
(4, '行政楼路', 2),
(5, '田家炳路', 3);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `lg_vote`
--

INSERT INTO `lg_vote` (`id`, `league_id`, `vote_name`, `available_num`) VALUES
(2, 1, '测试投票名称', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `lg_vote_item`
--

INSERT INTO `lg_vote_item` (`id`, `vote_id`, `item_name`, `item_content`) VALUES
(1, 2, '选项1', '选项1'),
(2, 2, '选项2', '选项2');

-- --------------------------------------------------------

--
-- Table structure for table `lg_vote_result`
--

CREATE TABLE IF NOT EXISTS `lg_vote_result` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `lg_vote_result`
--

INSERT INTO `lg_vote_result` (`id`, `item_id`, `user_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 1, 3),
(4, 1, 5);

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
