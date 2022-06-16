-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-06-16 05:57:58
-- 伺服器版本： 10.4.24-MariaDB
-- PHP 版本： 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `class`
--

-- --------------------------------------------------------

--
-- 資料表結構 `dietlist`
--

CREATE TABLE `dietlist` (
  `dtype` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dname` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dunit` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dcal` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `dietlist`
--

INSERT INTO `dietlist` (`dtype`, `dname`, `dunit`, `dcal`) VALUES
('麥當勞', '滿福堡', '一個', 290),
('麥當勞', '火腿蛋堡', '一個', 302),
('麥當勞', '豬肉滿福堡', '一個', 316),
('麥當勞', '鬆餅', '一份', 200),
('麥當勞', '豬肉滿福堡加蛋', '一個', 400),
('麥當勞', '麥克雞塊', '一個', 56),
('麥當勞', '雙層牛肉吉事堡', '一個', 450),
('麥當勞', '勁辣雞腿堡', '一個', 560),
('麥當勞', '大麥克', '一個', 530),
('麥當勞', '麥香雞', '一個', 380),
('麥當勞', '麥香魚', '一個', 320),
('麥當勞', '吉士堡', '一個', 310),
('麥當勞', '板烤雞腿堡', '一個', 300),
('麥當勞', 'BLT嫩煎雞腿堡', '一個', 435),
('麥當勞', 'BLT辣脆雞腿堡', '一個', 533),
('麥當勞', '法式芥末香雞堡', '一個', 379),
('麥當勞', '麥脆雞(雞翅)', '一個', 318),
('麥當勞', '麥脆雞(雞腿)', '一個', 180),
('麥當勞', '麥脆雞(雞胸)', '一個', 444),
('麥當勞', '安格斯勒牛堡', '一個', 416),
('主食(澱粉)類', '燕麥', '100克', 389),
('主食(澱粉)類', '飯', '50克', 70),
('主食(澱粉)類', '粥', '125克', 70),
('主食(澱粉)類', '饅頭', '30克', 70),
('主食(澱粉)類', '吐司', '25克', 70),
('主食(澱粉)類', '奶油小餐包', '25克', 70),
('主食(澱粉)類', '菠蘿麵包', '1/3個', 70),
('主食(澱粉)類', '燒餅', '1/2個', 70),
('主食(澱粉)類', '蘿蔔糕', '一塊', 70),
('主食(澱粉)類', '馬鈴薯', '200克', 70),
('主食(澱粉)類', '地瓜', '150克', 70),
('主食(澱粉)類', '原味蛋餅', '一份', 255),
('主食(澱粉)類', '山藥', '150克', 70),
('主食(澱粉)類', '炒烏龍麵', '250克', 400),
('主食(澱粉)類', '咖哩飯', '一份', 585),
('豆魚肉蛋類', '豬大里肌', '35克', 55),
('豆魚肉蛋類', '草蝦', '30克', 55),
('豆魚肉蛋類', '花枝', '40克', 55),
('豆魚肉蛋類', '蛋', '一顆', 75),
('豆魚肉蛋類', '牛腱', '25克', 55),
('豆魚肉蛋類', '雞胸肉', '30克', 55),
('豆魚肉蛋類', '秋刀魚', '35克', 120),
('豆魚肉蛋類', '火腿', '45克', 55),
('豆魚肉蛋類', '虱目魚', '30克', 75),
('豆魚肉蛋類', '烤雞排', '一份', 300),
('豆魚肉蛋類', '雞腿', '35克', 55),
('豆魚肉蛋類', '雞里肌', '30克', 55),
('豆魚肉蛋類', '香腸', '40克', 120),
('豆魚肉蛋類', '熱狗', '50克', 120),
('豆魚肉蛋類', '豆漿', '240毫升', 55),
('豆魚肉蛋類', '豆腐', '110克', 75),
('豆魚肉蛋類', '油豆腐', '35克', 75),
('豆魚肉蛋類', '素雞', '50克', 75),
('豆魚肉蛋類', '百頁豆腐', '25克', 75),
('蔬菜類', '菠菜', '30克', 7),
('蔬菜類', '蘑菇', '70克', 15),
('蔬菜類', '蘆筍', '134克', 27),
('蔬菜類', '四季豆', '110克', 34),
('蔬菜類', '甘藍', '88克', 38),
('蔬菜類', '花椰菜', '100克', 25),
('蔬菜類', '牛蒡', '100克', 98),
('蔬菜類', '胡蘿蔔', '100克', 38),
('蔬菜類', '綠豆芽', '100克', 33),
('蔬菜類', '薑', '100克', 20),
('蔬菜類', '韭菜', '100克', 27),
('蔬菜類', '高麗菜', '100克', 23),
('蔬菜類', '清江菜', '100克', 16),
('蔬菜類', '小白菜', '100克', 13),
('蔬菜類', '油菜', '100克', 14),
('水果類', '蘋果', '一顆', 100),
('水果類', '柳丁', '一顆', 50),
('水果類', '香蕉', '一顆', 120),
('水果類', '雪梨', '一顆', 58),
('水果類', '楊桃', '一顆', 55),
('水果類', '番石榴', '1/2顆', 180),
('水果類', '葡萄', '8粒', 70),
('水果類', '芒果', '一顆', 128),
('水果類', '西瓜', '一片', 60),
('水果類', '檸檬', '一顆', 20),
('水果類', '木瓜', '1/4顆', 50),
('水果類', '拉蜜瓜', '一片', 60),
('水果類', '奇異果', '一顆', 60),
('水果類', '水蜜桃', '一顆', 70);

-- --------------------------------------------------------

--
-- 資料表結構 `diettype`
--

CREATE TABLE `diettype` (
  `dtype` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `diettype`
--

INSERT INTO `diettype` (`dtype`) VALUES
('主食(澱粉)類'),
('五穀類'),
('水果類'),
('蔬菜類'),
('豆魚肉蛋類'),
('麥當勞');

-- --------------------------------------------------------

--
-- 資料表結構 `message`
--

CREATE TABLE `message` (
  `no` int(11) NOT NULL,
  `mail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `personal`
--

CREATE TABLE `personal` (
  `uno` int(10) NOT NULL,
  `uname` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` int(1) NOT NULL DEFAULT 0,
  `height` int(3) DEFAULT 0,
  `weight` int(3) DEFAULT 0,
  `birthday` date DEFAULT NULL,
  `activity` float NOT NULL DEFAULT 0,
  `age` int(3) NOT NULL DEFAULT 0,
  `g_weight` int(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `personal`
--

INSERT INTO `personal` (`uno`, `uname`, `sex`, `height`, `weight`, `birthday`, `activity`, `age`, `g_weight`) VALUES
(19, 'Eva', 0, 0, 0, NULL, 0, 0, 0),
(21, 'jay', 1, 180, 75, '1990-01-01', 1.55, 32, 72),
(22, 'student', 1, 180, 76, '2012-01-01', 1.55, 10, 80);

-- --------------------------------------------------------

--
-- 資料表結構 `replymsg`
--

CREATE TABLE `replymsg` (
  `rno` int(11) NOT NULL,
  `rmail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rtext` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `reply` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `replymsg`
--

INSERT INTO `replymsg` (`rno`, `rmail`, `rtext`, `reply`) VALUES
(1, 'a1074146@mail.nuk.edu.tw', '希望可以多增加運動項目!!', '您好，我們會持續更新運動清單，若有任何偏好的運動類別，可以提供給我們ㄛ!!');

-- --------------------------------------------------------

--
-- 資料表結構 `sportlist`
--

CREATE TABLE `sportlist` (
  `stype` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sname` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sunitc` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `sportlist`
--

INSERT INTO `sportlist` (`stype`, `sname`, `sunitc`) VALUES
('爬樓梯', '上樓梯', 8.4),
('爬樓梯', '下樓梯', 3.2),
('球類', '保齡球', 3.6),
('其他運動', '太極拳', 4.2),
('走路', '快走(6公里/小時)', 5.5),
('跑步', '快跑(12公里/小時)', 12.7),
('跑步', '快跑(16公里/小時)', 16.8),
('走路', '慢走(4公里/小時)', 3.5),
('跑步', '慢跑(8公里/小時)', 8.2),
('球類', '排球', 3.6),
('其他運動', '有氧舞蹈', 6.8),
('球類', '桌球', 4.2),
('球類', '棒壘球', 4.7),
('其他運動', '游泳(快)', 10),
('其他運動', '游泳(慢)', 6.3),
('其他運動', '瑜珈', 3),
('其他運動', '直排輪', 5.1),
('球類', '籃球(全場)', 8.3),
('球類', '籃球(半場)', 6.3),
('球類', '網球', 6.6),
('球類', '羽毛球', 5.1),
('球類', '足球', 7.7),
('其他運動', '跳繩(快)', 12.6),
('其他運動', '跳繩(慢)', 8.4),
('其他運動', '跳舞(快):國際標準舞', 5.3),
('其他運動', '跳舞(慢):元極舞', 3.1),
('其他運動', '飛盤', 3.2),
('騎腳踏車', '騎腳踏車(10公里/小時)', 4),
('騎腳踏車', '騎腳踏車(20公里/小時)', 8.4),
('騎腳踏車', '騎腳踏車(30公里/小時)', 12.6),
('球類', '高爾夫', 5);

-- --------------------------------------------------------

--
-- 資料表結構 `sporttype`
--

CREATE TABLE `sporttype` (
  `stype` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `sporttype`
--

INSERT INTO `sporttype` (`stype`) VALUES
('其他運動'),
('爬樓梯'),
('球類'),
('走路'),
('跑步'),
('騎腳踏車');

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `uno` int(10) NOT NULL,
  `uname` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uaccount` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upassword` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urole` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`uno`, `uname`, `uaccount`, `upassword`, `urole`) VALUES
(19, 'Eva1', 'evavivicm0929@gmail.com', 'eva123', 'admin'),
(21, 'jay', 'jay@gmail.com', 'jay123', 'admin'),
(22, 'student', 'a1074146@mail.nuk.edu.tw', 'student123', 'user');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `diettype`
--
ALTER TABLE `diettype`
  ADD UNIQUE KEY `type` (`dtype`);

--
-- 資料表索引 `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`no`);

--
-- 資料表索引 `personal`
--
ALTER TABLE `personal`
  ADD UNIQUE KEY `uname` (`uname`),
  ADD KEY `uno` (`uno`);

--
-- 資料表索引 `sportlist`
--
ALTER TABLE `sportlist`
  ADD UNIQUE KEY `sname` (`sname`);

--
-- 資料表索引 `sporttype`
--
ALTER TABLE `sporttype`
  ADD UNIQUE KEY `stype` (`stype`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uno`) USING BTREE,
  ADD UNIQUE KEY `uname` (`uname`,`uaccount`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `message`
--
ALTER TABLE `message`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `uno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `personal`
--
ALTER TABLE `personal`
  ADD CONSTRAINT `connect` FOREIGN KEY (`uno`) REFERENCES `user` (`uno`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
