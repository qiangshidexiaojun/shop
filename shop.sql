-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2017-06-21 07:34:24
-- 服务器版本： 5.7.11-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

create databases shop;
use shop;
-- --------------------------------------------------------

--
-- 表的结构 `advert`
--


CREATE TABLE `advert` (
  `id` int(10) UNSIGNED NOT NULL,
  `img` varchar(100) NOT NULL,
  `pos` tinyint(4) NOT NULL,
  `url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `advert`
--

INSERT INTO `advert` (`id`, `img`, `pos`, `url`) VALUES
(12, '14971068711690904876.jpg', 0, 'baidu.com'),
(13, '1497106889601988819.jpg', 1, 'gdcp.cn');

-- --------------------------------------------------------

--
-- 表的结构 `brand`
--

CREATE TABLE `brand` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `brand`
--

INSERT INTO `brand` (`id`, `name`, `class_id`) VALUES
(1, '三星', 1),
(2, '苹果', 1),
(3, '联想', 6),
(4, '华硕', 6),
(5, '罗技', 7);

-- --------------------------------------------------------

--
-- 表的结构 `class`
--

CREATE TABLE `class` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `class`
--

INSERT INTO `class` (`id`, `name`) VALUES
(1, '手机'),
(6, '电脑'),
(7, '键盘');

-- --------------------------------------------------------

--
-- 表的结构 `comment`
--

CREATE TABLE `comment` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text,
  `shop_id` int(11) NOT NULL,
  `time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `comment`
--

INSERT INTO `comment` (`id`, `user_id`, `content`, `shop_id`, `time`) VALUES
(1, 37, '这手机真好！', 1, 1496824205),
(2, 38, '黑色超好看！', 10, 1496824205),
(4, 44, '红色超好看', 51, 1496826807),
(8, 37, '红色超好看', 51, 1496826807),
(9, 38, '好喜欢啊，爱死了！！！！！', 1, 1497103258),
(10, 44, '三星的质量没话说，杠杠的\r\n', 1, 1497103270),
(12, 37, 'coanima\r\n', 53, 1497681113),
(13, 37, '我很喜欢这手机！！！！', 1, 1497834465),
(14, 37, '女孩子的最爱', 53, 1497834503);

-- --------------------------------------------------------

--
-- 表的结构 `indent`
--

CREATE TABLE `indent` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL DEFAULT '1',
  `touch_id` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `shop_id` int(10) UNSIGNED NOT NULL,
  `price` float UNSIGNED NOT NULL,
  `num` int(10) UNSIGNED NOT NULL,
  `confirm` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `indent`
--

INSERT INTO `indent` (`id`, `code`, `user_id`, `status_id`, `touch_id`, `time`, `shop_id`, `price`, `num`, `confirm`) VALUES
(18, '1497618700232073504', 37, 4, 1, 1497618700, 1, 3000, 5, 1),
(19, '1497618700232073504', 37, 4, 1, 1497618700, 53, 3000, 5, 1),
(20, '1497618700232073504', 37, 4, 1, 1497618700, 52, 5000, 5, 1),
(21, '1497618718310458272', 37, 1, 6, 1497618718, 1, 3000, 10, 1),
(22, '1497618718310458272', 37, 1, 6, 1497618718, 53, 3000, 5, 1),
(23, '1497618718310458272', 37, 1, 6, 1497618718, 52, 5000, 5, 1),
(24, '1497621600430381963', 37, 1, 2, 1497621600, 1, 3000, 10, 1),
(25, '1497621600430381963', 37, 1, 2, 1497621600, 53, 3000, 5, 1),
(26, '1497621600430381963', 37, 1, 2, 1497621600, 52, 5000, 5, 1),
(27, '14976217921472279188', 37, 1, 1, 1497621792, 1, 3000, 5, 1),
(28, '14976217921472279188', 37, 1, 1, 1497621792, 52, 5000, 5, 1),
(29, '14976217921472279188', 37, 1, 1, 1497621792, 10, 4000, 5, 1),
(30, '14976218271496244263', 37, 1, 6, 1497621827, 1, 3000, 5, 1),
(31, '14976222282029176712', 37, 1, 1, 1497622228, 1, 3000, 10, 1),
(32, '14976665201644025543', 37, 1, 1, 1497666520, 51, 5000, 1, 0),
(33, '14976665201644025543', 37, 1, 1, 1497666520, 55, 2000, 1, 0),
(34, '14976672381009819884', 37, 1, 6, 1497667238, 54, 1500, 1, 0),
(35, '14976672381009819884', 37, 1, 6, 1497667238, 50, 3000, 1, 0),
(36, '1497667247257832879', 37, 1, 1, 1497667247, 51, 5000, 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `shop`
--

CREATE TABLE `shop` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `img` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `stock` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `shelf` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `shop`
--

INSERT INTO `shop` (`id`, `name`, `img`, `price`, `stock`, `brand_id`, `shelf`) VALUES
(1, 'SAMSUNG GALAXY S6edge+', '1497082764447471293.jpg', 3000, 0, 1, 0),
(10, 'SAMSUNG GALAXY S7edge', '1497082773756719437.jpg', 4000, 10, 1, 1),
(48, 'SAMSUNG GALAXY S7', '14969312741701412107.jpg', 4000, 100, 1, 1),
(49, 'SAMSUNG GALAXY S8', '1496931301649174351.jpg', 5000, 1000, 1, 1),
(50, 'SAMSUNG GALAXY C7', '1496931345225546037.jpg', 3000, 122, 1, 1),
(51, 'iphone 7Plus(中国红)', '1497082783364922040.jpg', 5000, 998, 2, 1),
(52, 'iphone 7Plus(磨砂黑)', '14969314411029501787.jpg', 5000, 95, 2, 1),
(53, 'iphone 6s(粉色)', '1496931480663313991.jpg', 3000, 100, 2, 1),
(54, 'iphone 5s(土豪金)', '14969315201996001111.jpg', 1500, 99, 2, 1),
(55, 'iphone SE(土豪金)', '1496931613109219930.jpg', 2000, 109, 2, 1),
(56, '华硕（ASUS）顽石FL5900 15.6英寸笔记本电脑', '14969316731269506451.jpg', 5000, 1000, 4, 1),
(57, '华硕(ASUS)顽石畅玩版F540UP15.6英寸笔记本', '1496931726306074110.jpg', 111, 111, 4, 1),
(58, '华硕（ASUS）坦克世界 FX51 15.6英寸游戏本', '14969317491564973762.jpg', 4500, 123, 4, 1),
(59, '华硕(ASUS)A555YI7410 15.6商务办公学习游戏笔记本电脑', '1496931779237914281.jpg', 2000, 123, 4, 1),
(60, '华硕(ASUS) 灵耀U4000 14英寸超轻薄笔记本电脑', '14969318181740275472.jpg', 3500, 123, 4, 1),
(61, '联想（Lenovo）720S 14英寸笔记本电脑', '14969318691597805837.jpg', 6000, 123, 3, 1),
(62, '联想（Lenovo）720S 14英寸笔记本电脑', '1496931900907411392.jpg', 7000, 132, 3, 1),
(63, '联想小新潮7000 14英寸轻薄窄边框笔记本电脑', '1496931924883336536.jpg', 5300, 123, 3, 1),
(64, '联想(Lenovo)小新锐7000 15.6英寸游戏笔记本', '14969319611136984857.jpg', 6300, 123, 3, 1),
(65, '联想（Lenovo) 拯救者Y520 15.6英寸游戏笔记本', '14969319911009986586.jpg', 6000, 123, 3, 1),
(66, '罗技（Logitech）K120有线键盘防泼溅设计 标准键盘布局 静音设计 USB接口', '1497084152442609306.jpg', 300, 123, 5, 1),
(67, '罗技（Logitech）G710+Blue有线背光机械竞技游戏逆战/英雄联盟LOL/CF樱桃', '149708417585708586.jpg', 144, 12412, 5, 1),
(68, '罗技（Logitech）MK345无线键鼠套装全尺寸键盘 宽大掌托 人体工学鼠标 长效', '14970841941799135768.jpg', 455, 1233, 5, 1),
(69, '罗技（Logitech）G413机械游戏键盘（银）全尺寸背光机械键盘 金（银）（黑）三色可选', '14970842271953471874.jpg', 567, 123, 5, 1),
(70, '罗技（Logitech）K380蓝牙键盘 灰色蓝牙3.0技术 多平台连接 3设备切换      ', '14970842481246995210.jpg', 899, 444, 5, 1);

-- --------------------------------------------------------

--
-- 表的结构 `status`
--

CREATE TABLE `status` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, '未发货'),
(2, '已发货'),
(3, '未付款'),
(4, '已付款');

-- --------------------------------------------------------

--
-- 表的结构 `touch`
--

CREATE TABLE `touch` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `addr` varchar(100) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `touch`
--

INSERT INTO `touch` (`id`, `name`, `addr`, `tel`, `email`, `user_id`) VALUES
(1, '一条狗', '广州天河', '13250465197', '13250465197@qq.com', 37),
(2, '另一条狗', '广州天河', '13570396546', '13570396546@qq.com', 37),
(6, 'xiaojun', '123', '123', '123', 37);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `img` varchar(100) NOT NULL DEFAULT '1.jpg',
  `isadmin` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `img`, `isadmin`) VALUES
(37, 'xaoyan', '202cb962ac59075b964b07152d234b70', '14971110441628725495.png', 0),
(38, 'xiaohuang', '202cb962ac59075b964b07152d234b70', '14971108572062455168.png', 0),
(43, 'admin', '202cb962ac59075b964b07152d234b70', '', 1),
(44, 'xiaojun', '202cb962ac59075b964b07152d234b70', '1497110864628733835.png', 0),
(45, 'user1', '4297f44b13955235245b2497399d7a93', '1.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advert`
--
ALTER TABLE `advert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indent`
--
ALTER TABLE `indent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `touch`
--
ALTER TABLE `touch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `advert`
--
ALTER TABLE `advert`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- 使用表AUTO_INCREMENT `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 使用表AUTO_INCREMENT `class`
--
ALTER TABLE `class`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- 使用表AUTO_INCREMENT `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- 使用表AUTO_INCREMENT `indent`
--
ALTER TABLE `indent`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- 使用表AUTO_INCREMENT `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- 使用表AUTO_INCREMENT `status`
--
ALTER TABLE `status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `touch`
--
ALTER TABLE `touch`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
