-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 2022 年 6 月 05 日 10:58
-- サーバのバージョン： 5.7.34
-- PHP のバージョン: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_file_table`
--

CREATE TABLE `gs_file_table` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(140) COLLATE utf8_unicode_ci DEFAULT NULL,
  `insert_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_file_table`
--

INSERT INTO `gs_file_table` (`id`, `file_name`, `file_path`, `description`, `insert_time`, `update_time`) VALUES
(5, 'clover4.png', 'images/20220605060702clover4.png', 'てすと', '2022-06-05 15:07:02', '2022-06-05 15:07:02'),
(6, 'spade1.png', 'images/20220605102829spade1.png', 'テスト2&#13;&#10;', '2022-06-05 19:28:29', '2022-06-05 19:28:29'),
(7, '6280835_key@2x.png', 'images/202206051040316280835_key@2x.png', 'テスト3&#13;&#10;', '2022-06-05 19:40:31', '2022-06-05 19:40:31'),
(8, '6280814@2x.png', 'images/202206051042046280814@2x.png', 'テスト4', '2022-06-05 19:42:04', '2022-06-05 19:42:04'),
(9, '6280837_key@2x.png', 'images/202206051043316280837_key@2x.png', 'テスト5', '2022-06-05 19:43:31', '2022-06-05 19:43:31');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_file_table`
--
ALTER TABLE `gs_file_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `gs_file_table`
--
ALTER TABLE `gs_file_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
