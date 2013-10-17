-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 06 月 17 日 10:00
-- 服务器版本: 5.5.20
-- PHP 版本: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `yii_admin`
--

-- --------------------------------------------------------

--
-- 表的结构 `tb_backend_user`
--

CREATE TABLE IF NOT EXISTS `tb_backend_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL COMMENT '用户名',
  `password` char(32) DEFAULT NULL COMMENT '密码',
  `salt` char(6) DEFAULT NULL COMMENT '密码干扰串',
  `email` varchar(250) DEFAULT NULL COMMENT '邮箱',
  `true_name` varchar(10) DEFAULT NULL COMMENT '真实姓名',
  `created` int(11) DEFAULT NULL COMMENT '创建时间',
  `updated` int(11) DEFAULT NULL COMMENT '更新时间',
  `last_login_time` int(11) DEFAULT '0' COMMENT '上次登录时间',
  `last_login_ip` int(10) unsigned DEFAULT '0' COMMENT '上次登录ip',
  `login_times` int(10) unsigned DEFAULT '0' COMMENT '登录次数',
  `login_time` int(11) DEFAULT '0' COMMENT '登录时间',
  `login_ip` int(10) unsigned DEFAULT '0' COMMENT '登录ip',
  PRIMARY KEY (`id`),
  KEY `INDEX_USERNAME` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='后台管理员' AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `tb_backend_user`
--

INSERT INTO `tb_backend_user` (`id`, `username`, `password`, `salt`, `email`, `true_name`, `created`, `updated`, `last_login_time`, `last_login_ip`, `login_times`, `login_time`, `login_ip`) VALUES
(1, 'admin', '2266e7d1c295c258f707cf8243191626', '45aa1a', 'admin@qq.com', 'hehefg', 1370570998, 1371453783, 0, 0, 0, 1371453783, 2130706433),
(3, 'xuzhenjun', 'bc0b06b7b5947d0bdbe18a7fe68f8a4c', '6a4a68', 'hello@qq.com', 'fdsddds', 1370588383, 1371453366, 0, 0, 0, 1371453366, 2130706433);

-- --------------------------------------------------------

--
-- 表的结构 `tb_members`
--

CREATE TABLE IF NOT EXISTS `tb_members` (
  `uid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(15) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` char(32) NOT NULL DEFAULT '' COMMENT '密码',
  `email` char(32) NOT NULL DEFAULT '' COMMENT '邮箱',
  `myid` char(30) NOT NULL DEFAULT '',
  `myidkey` char(16) NOT NULL DEFAULT '',
  `regip` char(15) NOT NULL DEFAULT '' COMMENT '注册ip',
  `regdate` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '注册时间',
  `lastloginip` int(10) NOT NULL DEFAULT '0' COMMENT '上次登录ip',
  `lastlogintime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上次登录时间',
  `salt` char(6) NOT NULL,
  `secques` char(8) NOT NULL DEFAULT '',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`),
  KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

--
-- 转存表中的数据 `tb_members`
--

INSERT INTO `tb_members` (`uid`, `username`, `password`, `email`, `myid`, `myidkey`, `regip`, `regdate`, `lastloginip`, `lastlogintime`, `salt`, `secques`) VALUES
(1, 'admin', 'e7dd9e44cf58f12f2d2d5a1395be74fa', 'admin@admin.com', '', '', 'hidden', 1362366180, 0, 0, '43901c', ''),
(3, 'xuzhenjun', '79b0b5462a655d4611457d554c4b05c1', 'xu@qq.com', '', '', '127.0.0.1', 1362994801, 0, 0, '1be8e5', ''),
(32, 'cccccc', 'f9ede4e1752b879fd00ee56788181cd4', 'cccccc@qq.com', '', '', '127.0.0.1', 1363067862, 0, 0, '6745fa', ''),
(38, 'test1', '1eaaadcf54e3de4529f4ce54b2343158', 'test1@qq.com', '', '', '127.0.0.1', 1366012180, 0, 0, '434429', ''),
(39, 'test2', '2abab9a6dc2d707f50b8cb334c7eb978', 'test2@qq.com', '', '', '127.0.0.1', 1366012537, 0, 0, '9c72e2', ''),
(40, 'test3', '4a760a66394273ecc359b198d5691a33', 'test3@qq.com', '', '', '127.0.0.1', 1366013901, 0, 0, 'd203c6', ''),
(41, 'test4', '63e28ac38ebc6b53235c9ed66b3d3f67', 'test4@qq.com', '', '', '127.0.0.1', 1366014321, 0, 0, '145ee9', ''),
(42, 'test5', '4de24b2687fd18e6b48c0096b73e109e', 'test5@qq.com', '', '', '127.0.0.1', 1366015087, 0, 0, 'fc99be', ''),
(43, 'test6', 'b84245a36b9dbe56bcc3b662af6c7ac1', 'test6@qq.com', '', '', '127.0.0.1', 1366015359, 0, 0, 'f2ed84', ''),
(44, 'ttt5', '226a1f6d2769e0ee65cdde47d4c456c3', 'ttt5@qq.com', '', '', '127.0.0.1', 1366018931, 0, 0, '30ad99', 'fsdfsdf');

-- --------------------------------------------------------

--
-- 表的结构 `tb_menu`
--

CREATE TABLE IF NOT EXISTS `tb_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT '父类id',
  `name` varchar(50) NOT NULL COMMENT '名称',
  `link` varchar(200) NOT NULL COMMENT '链接',
  `alt` varchar(100) DEFAULT NULL COMMENT '提示',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='后台菜单' AUTO_INCREMENT=20 ;

--
-- 转存表中的数据 `tb_menu`
--

INSERT INTO `tb_menu` (`id`, `parent_id`, `name`, `link`, `alt`, `sort`) VALUES
(1, 0, '用户', '#', '', 0),
(2, 8, '管理用户', 'backendUser/admin', '', 0),
(3, 9, '管理会员', 'members/admin', '', 0),
(4, 0, '系统', '#', '', 9),
(5, 6, '公共配置', 'setting/main', '', 0),
(6, 4, '系统设置', '#', '', 0),
(7, 6, '后台菜单', 'menu/admin', '', 0),
(8, 1, '用户管理', '#', '', 0),
(9, 1, '会员管理', '#', '', 0),
(13, 8, '权限管理', 'srbac/authitem/manage', '', 0),
(14, 0, '测试菜单', '#', '', 0),
(18, 14, 'test1', 'setting/main', '', 0),
(19, 14, 'tes2', 'members/admin', '', 0);

-- --------------------------------------------------------

--
-- 表的结构 `tb_rbac_assignments`
--

CREATE TABLE IF NOT EXISTS `tb_rbac_assignments` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tb_rbac_assignments`
--

INSERT INTO `tb_rbac_assignments` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('Authority', '1', '', 's:0:"";'),
('普通管理员', '3', '', 's:0:"";'),
('超级管理员', '1', '', 's:0:"";');

-- --------------------------------------------------------

--
-- 表的结构 `tb_rbac_itemchildren`
--

CREATE TABLE IF NOT EXISTS `tb_rbac_itemchildren` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tb_rbac_itemchildren`
--

INSERT INTO `tb_rbac_itemchildren` (`parent`, `child`) VALUES
('后台用户', 'BackendUserAdmin'),
('后台用户', 'BackendUserCreate'),
('后台用户', 'BackendUserDelete'),
('后台用户', 'BackendUserIndex'),
('前台会员', 'MembersAdmin'),
('前台会员', 'MembersCreate'),
('前台会员', 'MembersDelete'),
('前台会员', 'MembersIndex'),
('前台会员', 'MembersUpdate'),
('前台会员', 'MembersView'),
('后台菜单', 'MenuAdmin'),
('后台菜单', 'MenuAjaxFillTree'),
('后台菜单', 'MenuCreate'),
('后台菜单', 'MenuDelete'),
('后台菜单', 'MenuIndex'),
('后台菜单', 'MenuUpdate'),
('后台菜单', 'MenuView'),
('公共设置', 'SettingCreate'),
('公共设置', 'SettingDelete'),
('公共设置', 'SettingMain'),
('公共设置', 'SettingUpdate'),
('公共设置', 'SettingView'),
('Authority', 'srbac@AuthitemAdministrating'),
('srbac@AuthitemAdministrating', 'srbac@AuthitemAssign'),
('srbac@AuthitemAdministrating', 'srbac@AuthitemAssignments'),
('srbac@AuthitemAdministrating', 'srbac@AuthitemAuto'),
('srbac@AuthitemAdministrating', 'srbac@AuthitemAutocomplete'),
('srbac@AuthitemAdministrating', 'srbac@AuthitemAutoCreateItems'),
('srbac@AuthitemAdministrating', 'srbac@AuthitemAutoDeleteItems'),
('srbac@AuthitemAdministrating', 'srbac@AuthitemClearObsolete'),
('srbac@AuthitemAdministrating', 'srbac@AuthitemConfirm'),
('srbac@AuthitemAdministrating', 'srbac@AuthitemCreate'),
('srbac@AuthitemAdministrating', 'srbac@AuthitemDelete'),
('srbac@AuthitemAdministrating', 'srbac@AuthitemDeleteObsolete'),
('srbac@AuthitemAdministrating', 'srbac@AuthitemEditAllowed'),
('srbac@AuthitemAdministrating', 'srbac@AuthitemFrontPage'),
('srbac@AuthitemAdministrating', 'srbac@AuthitemGetCleverOpers'),
('srbac@AuthitemAdministrating', 'srbac@AuthitemGetOpers'),
('srbac@AuthitemAdministrating', 'srbac@AuthitemGetRoles'),
('srbac@AuthitemAdministrating', 'srbac@AuthitemGetTasks'),
('srbac@AuthitemAdministrating', 'srbac@AuthitemGetUsers'),
('srbac@AuthitemAdministrating', 'srbac@AuthitemInstall'),
('srbac@AuthitemAdministrating', 'srbac@AuthitemList'),
('srbac@AuthitemViewing', 'srbac@AuthitemList'),
('srbac@AuthitemAdministrating', 'srbac@AuthitemManage'),
('srbac@AuthitemAdministrating', 'srbac@AuthitemSaveAllowed'),
('srbac@AuthitemAdministrating', 'srbac@AuthitemScan'),
('srbac@AuthitemAdministrating', 'srbac@AuthitemShow'),
('srbac@AuthitemViewing', 'srbac@AuthitemShow'),
('srbac@AuthitemAdministrating', 'srbac@AuthitemShowAssignments'),
('srbac@AuthitemViewing', 'srbac@AuthitemShowAssignments'),
('srbac@AuthitemAdministrating', 'srbac@AuthitemUpdate'),
('超级管理员', '公共设置'),
('普通管理员', '前台会员'),
('超级管理员', '前台会员'),
('超级管理员', '后台用户'),
('超级管理员', '后台菜单');

-- --------------------------------------------------------

--
-- 表的结构 `tb_rbac_items`
--

CREATE TABLE IF NOT EXISTS `tb_rbac_items` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tb_rbac_items`
--

INSERT INTO `tb_rbac_items` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('Authority', 2, NULL, NULL, NULL),
('BackendUserAdmin', 0, NULL, NULL, 'N;'),
('BackendUserCreate', 0, NULL, NULL, 'N;'),
('BackendUserDelete', 0, NULL, NULL, 'N;'),
('BackendUserIndex', 0, NULL, NULL, 'N;'),
('MembersAdmin', 0, NULL, NULL, 'N;'),
('MembersCreate', 0, NULL, NULL, 'N;'),
('MembersDelete', 0, NULL, NULL, 'N;'),
('MembersIndex', 0, NULL, NULL, 'N;'),
('MembersUpdate', 0, NULL, NULL, 'N;'),
('MembersView', 0, NULL, NULL, 'N;'),
('MenuAdmin', 0, NULL, NULL, 'N;'),
('MenuAjaxFillTree', 0, NULL, NULL, 'N;'),
('MenuCreate', 0, NULL, NULL, 'N;'),
('MenuDelete', 0, NULL, NULL, 'N;'),
('MenuIndex', 0, NULL, NULL, 'N;'),
('MenuUpdate', 0, NULL, NULL, 'N;'),
('MenuView', 0, NULL, NULL, 'N;'),
('SettingCreate', 0, NULL, NULL, 'N;'),
('SettingDelete', 0, NULL, NULL, 'N;'),
('SettingMain', 0, NULL, NULL, 'N;'),
('SettingUpdate', 0, NULL, NULL, 'N;'),
('SettingView', 0, NULL, NULL, 'N;'),
('srbac@AuthitemAdministrating', 1, NULL, NULL, 'N;'),
('srbac@AuthitemAssign', 0, NULL, NULL, 'N;'),
('srbac@AuthitemAssignments', 0, NULL, NULL, 'N;'),
('srbac@AuthitemAuto', 0, NULL, NULL, 'N;'),
('srbac@AuthitemAutocomplete', 0, NULL, NULL, 'N;'),
('srbac@AuthitemAutoCreateItems', 0, NULL, NULL, 'N;'),
('srbac@AuthitemAutoDeleteItems', 0, NULL, NULL, 'N;'),
('srbac@AuthitemClearObsolete', 0, NULL, NULL, 'N;'),
('srbac@AuthitemConfirm', 0, NULL, NULL, 'N;'),
('srbac@AuthitemCreate', 0, NULL, NULL, 'N;'),
('srbac@AuthitemDelete', 0, NULL, NULL, 'N;'),
('srbac@AuthitemDeleteObsolete', 0, NULL, NULL, 'N;'),
('srbac@AuthitemEditAllowed', 0, NULL, NULL, 'N;'),
('srbac@AuthitemFrontPage', 0, NULL, NULL, 'N;'),
('srbac@AuthitemGetCleverOpers', 0, NULL, NULL, 'N;'),
('srbac@AuthitemGetOpers', 0, NULL, NULL, 'N;'),
('srbac@AuthitemGetRoles', 0, NULL, NULL, 'N;'),
('srbac@AuthitemGetTasks', 0, NULL, NULL, 'N;'),
('srbac@AuthitemGetUsers', 0, NULL, NULL, 'N;'),
('srbac@AuthitemInstall', 0, NULL, NULL, 'N;'),
('srbac@AuthitemList', 0, NULL, NULL, 'N;'),
('srbac@AuthitemManage', 0, NULL, NULL, 'N;'),
('srbac@AuthitemSaveAllowed', 0, NULL, NULL, 'N;'),
('srbac@AuthitemScan', 0, NULL, NULL, 'N;'),
('srbac@AuthitemShow', 0, NULL, NULL, 'N;'),
('srbac@AuthitemShowAssignments', 0, NULL, NULL, 'N;'),
('srbac@AuthitemUpdate', 0, NULL, NULL, 'N;'),
('srbac@AuthitemViewing', 1, NULL, NULL, 'N;'),
('公共设置', 1, '', '', 's:0:"";'),
('前台会员', 1, '', '', 's:0:"";'),
('后台用户', 1, '', '', 's:0:"";'),
('后台菜单', 1, '', '', 's:0:"";'),
('普通管理员', 2, '', '', 's:0:"";'),
('超级管理员', 2, '', '', 's:0:"";');

--
-- 限制导出的表
--

--
-- 限制表 `tb_rbac_assignments`
--
ALTER TABLE `tb_rbac_assignments`
  ADD CONSTRAINT `tb_rbac_assignments_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `tb_rbac_items` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `tb_rbac_itemchildren`
--
ALTER TABLE `tb_rbac_itemchildren`
  ADD CONSTRAINT `tb_rbac_itemchildren_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `tb_rbac_items` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_rbac_itemchildren_ibfk_2` FOREIGN KEY (`child`) REFERENCES `tb_rbac_items` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
