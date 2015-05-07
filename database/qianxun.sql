-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2015 �?01 �?24 �?14:47
-- 服务器版本: 5.6.11
-- PHP 版本: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `qianxun`
--

-- --------------------------------------------------------

--
-- 表的结构 `t_comment`
--

CREATE TABLE IF NOT EXISTS `t_comment` (
  `cid` int(11) NOT NULL AUTO_INCREMENT COMMENT '评论编号',
  `pid` int(11) NOT NULL COMMENT '发布信息的编号',
  `uid` int(11) NOT NULL COMMENT '评论者编号',
  `ctime` datetime NOT NULL COMMENT '评论时间',
  `cdetails` text NOT NULL COMMENT '评论内容',
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='用户评论表' AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `t_comment`
--

INSERT INTO `t_comment` (`cid`, `pid`, `uid`, `ctime`, `cdetails`) VALUES
(1, 8, 2, '2015-01-22 10:44:38', 'hello grace ……hello grace ……hello grace ……hello grace ……hello grace ……hello grace ……'),
(2, 8, 2, '2015-01-22 10:49:43', 'hello grace ……hello grace ……hello grace ……hello grace ……hello grace ……hello grace ……hello grace ……hello grace ……hello grace ……hello grace ……hello grace ……hello grace ……'),
(3, 10, 2, '2015-01-22 15:24:40', '找到了啊啊啊找到了啊啊啊找到了啊啊啊找到了啊啊啊找到了啊啊啊找到了啊啊啊'),
(4, 19, 5, '2015-01-24 13:23:06', '希望大家帮我找找……');

-- --------------------------------------------------------

--
-- 表的结构 `t_publish`
--

CREATE TABLE IF NOT EXISTS `t_publish` (
  `pid` int(11) NOT NULL AUTO_INCREMENT COMMENT '信息编号',
  `uid` int(11) NOT NULL COMMENT '用户编号',
  `pitem` varchar(12) NOT NULL COMMENT '物品类型',
  `pname` varchar(20) NOT NULL COMMENT '物品名称',
  `plocation` varchar(50) NOT NULL COMMENT '物品捡到&丢失地点',
  `ptime` datetime NOT NULL COMMENT '物品捡到&丢失时间',
  `pimage` varchar(20) NOT NULL COMMENT '物品图片',
  `pdetails` text NOT NULL COMMENT '详情描述',
  `ptype` int(1) NOT NULL COMMENT '发布信息类别',
  `pdate` varchar(30) NOT NULL COMMENT '捡到&丢失时间*',
  `psucceed` int(11) NOT NULL DEFAULT '0' COMMENT '是否成功找回',
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='发布信息表' AUTO_INCREMENT=21 ;

--
-- 转存表中的数据 `t_publish`
--

INSERT INTO `t_publish` (`pid`, `uid`, `pitem`, `pname`, `plocation`, `ptime`, `pimage`, `pdetails`, `ptype`, `pdate`, `psucceed`) VALUES
(1, 1, '电子数码', '小米55', '图书馆', '2015-01-23 18:57:47', '1.jpg', '小米55555555555555555555小米55555555555555555555小米55555555555555555555小米55555555555555555555小米55555555555555555555小米55555555555555555555', 1, '2015 一月 21 - 05:25 下午', 0),
(2, 1, '电子数码', '小米5', '图书馆', '2015-01-21 10:26:25', '2.jpg', '小米55555555555555555555小米55555555555555555555小米55555555555555555555小米55555555555555555555小米55555555555555555555小米55555555555555555555', 1, '2015 一月 21 - 05:25 下午', 0),
(3, 1, '电子数码', '小米5', '图书馆', '2015-01-21 10:26:33', '3.jpg', '小米55555555555555555555小米55555555555555555555小米55555555555555555555小米55555555555555555555小米55555555555555555555小米55555555555555555555', 1, '2015 一月 21 - 05:25 下午', 0),
(4, 1, '电子数码', '小米5', '图书馆', '2015-01-21 10:26:35', '4.jpg', '小米55555555555555555555小米55555555555555555555小米55555555555555555555小米55555555555555555555小米55555555555555555555小米55555555555555555555', 1, '2015 一月 21 - 05:25 下午', 0),
(5, 1, '电子数码', '小米5', '图书馆', '2015-01-21 10:26:37', '5.jpg', '小米55555555555555555555小米55555555555555555555小米55555555555555555555小米55555555555555555555小米55555555555555555555小米55555555555555555555', 1, '2015 一月 21 - 05:25 下午', 0),
(6, 1, '电子数码', '小米5', '图书馆', '2015-01-21 10:26:38', '6.jpg', '小米55555555555555555555小米55555555555555555555小米55555555555555555555小米55555555555555555555小米55555555555555555555小米55555555555555555555', 1, '2015 一月 21 - 05:25 下午', 0),
(7, 1, '电子数码', '小米5', '图书馆', '2015-01-21 10:30:17', '7.jpg', '傻傻地撒', 0, '2015 一月 21 - 05:29 下午', 0),
(8, 1, '电子数码', '小米5', '图书馆', '2015-01-21 10:31:58', '8.jpg', '小米55小米55小米55小米55小米55小米55小米55小米55小米55小米55小米55小米55小米55小米55小米55小米55小米55小米55小米55小米55小米55小米55小米55小米55小米55', 1, '2015 一月 21 - 05:31 下午', 0),
(9, 2, '电子数码', '小米5', '图书馆', '2015-01-22 07:26:45', '9.jpg', '小米5小米5小米5小米5小米5小米5小米5小米5小米5小米5', 1, '2014 一月 01 - 12:00 上午', 0),
(10, 2, '电子数码', '小米5', '图书馆', '2015-01-22 14:31:10', '10.jpg', '小米55小米55小米55小米55小米55', 1, '2015 一月 22 - 02:29 下午', 1),
(11, 2, '电子数码', '小米5', '图书馆', '2015-01-22 14:49:01', '11.jpg', '小米5小米5小米5小米5小米5小米5小米5', 0, '2015 一月 22 - 02:48 下午', 0),
(12, 3, '随身物品', '阿狸', '人生', '2015-01-23 09:35:02', '12.jpg', '我的阿狸我的阿狸我的阿狸我的阿狸我的阿狸我的阿狸我的阿狸我的阿狸', 1, '2015 一月 23 - 09:34 上午', 1),
(13, 3, '随身物品', '阿狸', '图书馆', '2015-01-23 15:53:37', '13.jpg', '我的阿狸丢了', 0, '2015 一月 23 - 03:53 下午', 0),
(14, 4, '随身物品', '阿狸的尾巴', '图书馆', '2015-01-24 12:21:46', '14.jpg', '阿狸的尾巴阿狸的尾巴阿狸的尾巴阿狸的尾巴阿狸的尾巴', 0, '2015 一月 24 - 12:21 下午', 0),
(15, 4, '随身物品', '阿狸的尾巴', '图书馆', '2015-01-24 12:22:48', '15.jpg', '阿狸的尾巴阿狸的尾巴阿狸的尾巴阿狸的尾巴阿狸的尾巴阿狸的尾巴', 1, '2015 一月 24 - 12:22 下午', 0),
(16, 4, '随身物品', '阿狸', '图书馆', '2015-01-24 12:30:16', '16.jpg', '我的阿狸我的阿狸我的阿狸我的阿狸我的阿狸我的阿狸我的阿狸我的阿狸我的阿狸我的阿狸我的阿狸我的阿狸我的阿狸我的阿狸我的阿狸我的阿狸我的阿狸我的阿狸我的阿狸', 0, '2015 一月 24 - 12:29 下午', 0),
(17, 5, '随身物品', '阿狸', '图书馆', '2015-01-24 13:15:59', '17.jpg', '我的阿狸丢了', 0, '2015 一月 24 - 01:15 下午', 0),
(18, 5, '电子数码', 'MX4 Pro', '图书馆', '2015-01-24 13:17:34', '18.jpg', 'MX4 ProMX4 ProMX4 ProMX4 Pro', 0, '2015 一月 24 - 01:16 下午', 1),
(19, 5, '电子数码', '小米5', '图书馆', '2015-01-24 13:18:44', '19.jpg', '我的小米5丢了', 0, '2015 一月 24 - 01:18 下午', 0),
(20, 5, '书籍文具', '平凡的世界', '图书馆', '2015-01-24 13:27:48', '20.jpg', '路遥的平凡的世界', 1, '2015 一月 24 - 01:27 下午', 0);

-- --------------------------------------------------------

--
-- 表的结构 `t_user`
--

CREATE TABLE IF NOT EXISTS `t_user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户编号',
  `uname` varchar(12) NOT NULL COMMENT '昵称',
  `uemail` varchar(30) NOT NULL COMMENT '邮箱',
  `upwd` varchar(12) NOT NULL COMMENT '密码',
  `utel` char(11) NOT NULL COMMENT '手机',
  `uqq` varchar(13) NOT NULL COMMENT 'QQ',
  `upower` int(1) NOT NULL COMMENT '权限',
  `uheader` varchar(20) NOT NULL DEFAULT 'head_photo.png' COMMENT '头像路径',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='用户表' AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `t_user`
--

INSERT INTO `t_user` (`uid`, `uname`, `uemail`, `upwd`, `utel`, `uqq`, `upower`, `uheader`) VALUES
(1, 'admin', '786607676@qq.com', '123456', '18158879602', '786607676', 9, 'head_photo.png'),
(2, 'admining', '1556382455@qq.com', '123456', '15395183048', '1556382455', 1, '2.jpg'),
(3, 'testing', 'test@qq.com', '123456', '18158879602', '1556382455', 1, '3.jpg'),
(4, '阿狸的尾巴', '786607676@qq.com', 'wsq123456', '18158879602', '786607676', 1, 'head_photo.png'),
(5, '流光易抛', 'testing@qq.com', 'wsqwsq', '18158879602', '1556382455', 1, 'head_photo.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
