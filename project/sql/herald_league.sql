/*
Navicat MySQL Data Transfer

Source Server         : local_copy
Source Server Version : 50528
Source Host           : localhost:3306
Source Database       : herald_league

Target Server Type    : MYSQL
Target Server Version : 50528
File Encoding         : 65001

Date: 2013-01-31 10:03:50
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `lg_activity`
-- ----------------------------
DROP TABLE IF EXISTS `lg_activity`;
CREATE TABLE `lg_activity` (
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
  `activity_place` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lg_activity
-- ----------------------------
INSERT INTO `lg_activity` VALUES ('1', '1', '测试活动', '2013-01-31', '2013-03-20', '这是一个测试活动', '1.jpg', '15850888888', '东南大学先声网', '2012-12-21', '51', '1', '0', '');
INSERT INTO `lg_activity` VALUES ('2', '1', '测试投票', '2013-01-02', '2013-01-31', '测试投票介绍', '2.jpg', '131-1111111', '测试投票组织', '2013-01-01', '112', '2', '1', '');

-- ----------------------------
-- Table structure for `lg_activity_class`
-- ----------------------------
DROP TABLE IF EXISTS `lg_activity_class`;
CREATE TABLE `lg_activity_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(255) NOT NULL,
  `heat` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lg_activity_class
-- ----------------------------
INSERT INTO `lg_activity_class` VALUES ('1', '社团招新', '1');
INSERT INTO `lg_activity_class` VALUES ('2', '音乐', '1');
INSERT INTO `lg_activity_class` VALUES ('3', '体育 ', '1');
INSERT INTO `lg_activity_class` VALUES ('4', '讲座', '1');
INSERT INTO `lg_activity_class` VALUES ('5', '宣讲', '1');

-- ----------------------------
-- Table structure for `lg_answer`
-- ----------------------------
DROP TABLE IF EXISTS `lg_answer`;
CREATE TABLE `lg_answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_id` int(11) NOT NULL,
  `answering_id` int(11) NOT NULL,
  `answering_type` int(11) NOT NULL,
  `floor_id` int(11) NOT NULL COMMENT '楼层数',
  `is_new` int(4) NOT NULL DEFAULT '1' COMMENT '默认为1  被评论用户点击之后置为0',
  `content` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lg_answer
-- ----------------------------
INSERT INTO `lg_answer` VALUES ('1', '1', '2', '1', '1', '1', '测试回复给相册的');
INSERT INTO `lg_answer` VALUES ('2', '2', '1', '1', '2', '1', '还是测试回复');
INSERT INTO `lg_answer` VALUES ('3', '3', '2', '1', '3', '1', '测试回复给社团的');
INSERT INTO `lg_answer` VALUES ('4', '4', '1', '2', '4', '1', '这是给社团的测试回复');
INSERT INTO `lg_answer` VALUES ('5', '1', '2', '1', '2', '1', '这也是给相册的测试回复');
INSERT INTO `lg_answer` VALUES ('6', '5', '1', '1', '1', '1', '这是给照片的测试回复1');
INSERT INTO `lg_answer` VALUES ('7', '6', '1', '1', '1', '1', '这是给照片的测试回复2');
INSERT INTO `lg_answer` VALUES ('8', '1', '1', '1', '1', '1', '测试回复');
INSERT INTO `lg_answer` VALUES ('17', '1', '1', '1', '1', '1', 'test');
INSERT INTO `lg_answer` VALUES ('18', '12', '1', '1', '1', '1', '留个言试一下');
INSERT INTO `lg_answer` VALUES ('19', '1', '1', '1', '1', '1', '回复一下试一下');
INSERT INTO `lg_answer` VALUES ('20', '0', '1', '1', '1', '1', '回复一下试一下');
INSERT INTO `lg_answer` VALUES ('21', '2', '1', '1', '1', '1', '回复一下试一下');
INSERT INTO `lg_answer` VALUES ('22', '11', '1', '1', '1', '1', '测试一下回复');
INSERT INTO `lg_answer` VALUES ('23', '12', '1', '1', '1', '1', '再试一下');
INSERT INTO `lg_answer` VALUES ('24', '2', '1', '1', '1', '1', 'tste');
INSERT INTO `lg_answer` VALUES ('25', '9', '1', '1', '1', '1', 'huifu');

-- ----------------------------
-- Table structure for `lg_attention`
-- ----------------------------
DROP TABLE IF EXISTS `lg_attention`;
CREATE TABLE `lg_attention` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `attended_id` int(11) NOT NULL COMMENT '被关注者id',
  `isleague` int(4) NOT NULL COMMENT '0表示活动 1表示社团',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lg_attention
-- ----------------------------
INSERT INTO `lg_attention` VALUES ('64', '3', '1', '0');

-- ----------------------------
-- Table structure for `lg_class_activity`
-- ----------------------------
DROP TABLE IF EXISTS `lg_class_activity`;
CREATE TABLE `lg_class_activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activity_id` int(11) NOT NULL COMMENT '活动的id',
  `class_id` int(11) NOT NULL COMMENT '标签的id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='活动的标签';

-- ----------------------------
-- Records of lg_class_activity
-- ----------------------------
INSERT INTO `lg_class_activity` VALUES ('1', '1', '1');

-- ----------------------------
-- Table structure for `lg_comment`
-- ----------------------------
DROP TABLE IF EXISTS `lg_comment`;
CREATE TABLE `lg_comment` (
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lg_comment
-- ----------------------------
INSERT INTO `lg_comment` VALUES ('1', '1', '1', '1', '1', '1', '这还是一个测试评论', '0000-00-00', '00:00:00');
INSERT INTO `lg_comment` VALUES ('2', '1', '1', '1', '2', '1', '这还是一个测试评论', '0000-00-00', '00:00:00');
INSERT INTO `lg_comment` VALUES ('9', '1', '1', '1', '2', '1', '这时给相册的一个测试评论', '0000-00-00', '00:00:00');
INSERT INTO `lg_comment` VALUES ('10', '1', '1', '2', '2', '1', '这是给第二个相册的评论', '0000-00-00', '00:00:00');
INSERT INTO `lg_comment` VALUES ('11', '1', '1', '1', '3', '1', '这是给照片的评论', '0000-00-00', '00:00:00');
INSERT INTO `lg_comment` VALUES ('12', '1', '1', '1', '1', '1', '我在留一个言', '0000-00-00', '00:00:00');

-- ----------------------------
-- Table structure for `lg_commented_type`
-- ----------------------------
DROP TABLE IF EXISTS `lg_commented_type`;
CREATE TABLE `lg_commented_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='这个表主要是为了记录被评论对象的类型的id 于实际代码没有多大用处';

-- ----------------------------
-- Records of lg_commented_type
-- ----------------------------
INSERT INTO `lg_commented_type` VALUES ('1', 'league');
INSERT INTO `lg_commented_type` VALUES ('2', 'album');
INSERT INTO `lg_commented_type` VALUES ('3', 'picture');
INSERT INTO `lg_commented_type` VALUES ('4', 'activity');
INSERT INTO `lg_commented_type` VALUES ('5', 'video');
INSERT INTO `lg_commented_type` VALUES ('6', 'audio');

-- ----------------------------
-- Table structure for `lg_league_album`
-- ----------------------------
DROP TABLE IF EXISTS `lg_league_album`;
CREATE TABLE `lg_league_album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `league_id` int(11) NOT NULL,
  `album_name` varchar(255) NOT NULL,
  `album_info` varchar(255) NOT NULL,
  `album_cover_add` varchar(255) NOT NULL,
  `comment_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lg_league_album
-- ----------------------------
INSERT INTO `lg_league_album` VALUES ('1', '1', '测试相册', '测试相册 测试相册 测试信息测试信息', 'LeagueAlbum/Small/small_1a6f5959c871b56b21e9e3b2ab9ce33f.jpg', '1');
INSERT INTO `lg_league_album` VALUES ('2', '1', '测试', '测试', 'LeagueAlbum/Small/small_1a6f5959c871b56b21e9e3b2ab9ce33f.jpg', '2');

-- ----------------------------
-- Table structure for `lg_league_class`
-- ----------------------------
DROP TABLE IF EXISTS `lg_league_class`;
CREATE TABLE `lg_league_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lg_league_class
-- ----------------------------
INSERT INTO `lg_league_class` VALUES ('1', '科学技术类');
INSERT INTO `lg_league_class` VALUES ('2', '体育健身类');
INSERT INTO `lg_league_class` VALUES ('3', '文化艺术类');
INSERT INTO `lg_league_class` VALUES ('4', '文学传媒类');
INSERT INTO `lg_league_class` VALUES ('5', '志愿服务类');
INSERT INTO `lg_league_class` VALUES ('6', '学生会');
INSERT INTO `lg_league_class` VALUES ('7', '其他');

-- ----------------------------
-- Table structure for `lg_league_info`
-- ----------------------------
DROP TABLE IF EXISTS `lg_league_info`;
CREATE TABLE `lg_league_info` (
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
  `heat` int(11) NOT NULL COMMENT '社团的热度',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lg_league_info
-- ----------------------------
INSERT INTO `lg_league_info` VALUES ('1', '', '', '东南大学先声网', '我们是伟大的先声网', '2012-12-17', '2012-12-17', './123.jpg', '1', '1', '兵哥 亮哥等', '1', '0');
INSERT INTO `lg_league_info` VALUES ('2', '', '', '测试社团', '管理员还没添加简介哦~', '2012-12-20', '2012-12-20', './123.jpg', '1', '1', '测试人员', '1', '0');

-- ----------------------------
-- Table structure for `lg_league_picture`
-- ----------------------------
DROP TABLE IF EXISTS `lg_league_picture`;
CREATE TABLE `lg_league_picture` (
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lg_league_picture
-- ----------------------------
INSERT INTO `lg_league_picture` VALUES ('1', '1', '测试照片', '这是一个测试照片', 'LeagueAlbum/Small/small_1a6f5959c871b56b21e9e3b2ab9ce33f.jpg', 'LeagueAlbum/Large/large_1a6f5959c871b56b21e9e3b2ab9ce33f.jpg', '1', '1', '0');

-- ----------------------------
-- Table structure for `lg_street`
-- ----------------------------
DROP TABLE IF EXISTS `lg_street`;
CREATE TABLE `lg_street` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `street_name` varchar(255) NOT NULL,
  `league_class` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lg_street
-- ----------------------------
INSERT INTO `lg_street` VALUES ('1', '梅园路', '1');
INSERT INTO `lg_street` VALUES ('2', '橘园路', '1');
INSERT INTO `lg_street` VALUES ('3', '桃园路', '2');
INSERT INTO `lg_street` VALUES ('4', '行政楼路', '2');
INSERT INTO `lg_street` VALUES ('5', '田家炳路', '3');

-- ----------------------------
-- Table structure for `lg_systerm_admin`
-- ----------------------------
DROP TABLE IF EXISTS `lg_systerm_admin`;
CREATE TABLE `lg_systerm_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `possword` varchar(255) NOT NULL,
  `truename` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lg_systerm_admin
-- ----------------------------

-- ----------------------------
-- Table structure for `lg_user`
-- ----------------------------
DROP TABLE IF EXISTS `lg_user`;
CREATE TABLE `lg_user` (
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lg_user
-- ----------------------------
INSERT INTO `lg_user` VALUES ('1', '213111517', '郭耿瑞', 'Tairy', '/UserAvatar/psu.jpg', '1210137461', 'tairyguo@gmail.com', '15850692128', '2', '物理系', '2012-12-17', '0');
INSERT INTO `lg_user` VALUES ('2', '213111516', '张三', 'zhangsan', '/UserAvatar/psu.jpg', '000000000', '00@00.com', '111111', '1', '数学系', '2012-12-25', '0');
INSERT INTO `lg_user` VALUES ('3', '888888', 'a', 'b', 'c', '保密', '保密', '保密', '1', '保密', '2012-04-01', '0');

-- ----------------------------
-- Table structure for `lg_vote`
-- ----------------------------
DROP TABLE IF EXISTS `lg_vote`;
CREATE TABLE `lg_vote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `league_id` int(11) NOT NULL,
  `vote_name` varchar(255) NOT NULL,
  `available_num` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lg_vote
-- ----------------------------
INSERT INTO `lg_vote` VALUES ('2', '1', '测试投票名称', '10');

-- ----------------------------
-- Table structure for `lg_vote_item`
-- ----------------------------
DROP TABLE IF EXISTS `lg_vote_item`;
CREATE TABLE `lg_vote_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vote_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_content` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lg_vote_item
-- ----------------------------
INSERT INTO `lg_vote_item` VALUES ('1', '2', '111', '选项1');
INSERT INTO `lg_vote_item` VALUES ('2', '2', '选项2', '选项2');

-- ----------------------------
-- Table structure for `lg_vote_result`
-- ----------------------------
DROP TABLE IF EXISTS `lg_vote_result`;
CREATE TABLE `lg_vote_result` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lg_vote_result
-- ----------------------------
INSERT INTO `lg_vote_result` VALUES ('5', '1', '3');

-- ----------------------------
-- Table structure for `lg_wanto`
-- ----------------------------
DROP TABLE IF EXISTS `lg_wanto`;
CREATE TABLE `lg_wanto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lg_wanto
-- ----------------------------
