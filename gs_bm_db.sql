-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2023-12-16 06:38:14
-- サーバのバージョン： 10.4.32-MariaDB
-- PHP のバージョン: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_bm_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_bm_books`
--

CREATE TABLE `gs_bm_books` (
  `id` int(12) NOT NULL,
  `name` varchar(64) NOT NULL,
  `url` text NOT NULL,
  `content` text NOT NULL,
  `created_date` datetime NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `gs_bm_books`
--

INSERT INTO `gs_bm_books` (`id`, `name`, `url`, `content`, `created_date`, `update_date`) VALUES
(10, '何の本？', 'https://www.google.co.jp/', '出来たんじゃないですか？', '2023-12-16 14:31:26', '2023-12-16 14:35:51'),
(11, 'オライリー本のPHP', 'https://www.google.co.jp/', 'こっちもいい感じですね！', '2023-12-16 14:34:37', '2023-12-16 14:37:01'),
(12, 'オライリー本の初心者向けPHP', 'https://www.google.co.jp/', 'どうでしょう？', '2023-12-16 14:35:28', '2023-12-16 14:37:25');

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_bm_dog_ear`
--

CREATE TABLE `gs_bm_dog_ear` (
  `id` int(12) NOT NULL,
  `book_id` int(12) NOT NULL,
  `page_number` int(11) NOT NULL,
  `line_number` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_date` datetime NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `gs_bm_dog_ear`
--

INSERT INTO `gs_bm_dog_ear` (`id`, `book_id`, `page_number`, `line_number`, `content`, `created_date`, `update_date`) VALUES
(8, 10, 0, 0, '', '2023-12-16 14:35:39', '2023-12-16 14:35:39'),
(9, 10, 0, 0, '', '2023-12-16 14:36:15', '2023-12-16 14:36:15'),
(10, 10, 0, 0, '', '2023-12-16 14:36:16', '2023-12-16 14:36:16'),
(11, 10, 0, 0, '', '2023-12-16 14:36:16', '2023-12-16 14:36:16'),
(12, 11, 0, 0, '', '2023-12-16 14:37:04', '2023-12-16 14:37:04'),
(13, 11, 0, 0, '', '2023-12-16 14:37:04', '2023-12-16 14:37:04'),
(14, 11, 0, 0, '', '2023-12-16 14:37:05', '2023-12-16 14:37:05'),
(15, 11, 0, 0, '', '2023-12-16 14:37:05', '2023-12-16 14:37:05'),
(16, 12, 0, 0, '', '2023-12-16 14:37:27', '2023-12-16 14:37:27'),
(17, 12, 0, 0, '', '2023-12-16 14:37:27', '2023-12-16 14:37:27'),
(18, 12, 0, 0, '', '2023-12-16 14:37:27', '2023-12-16 14:37:27'),
(19, 12, 0, 0, '', '2023-12-16 14:37:28', '2023-12-16 14:37:28'),
(20, 12, 0, 0, '', '2023-12-16 14:37:28', '2023-12-16 14:37:28'),
(21, 12, 0, 0, '', '2023-12-16 14:37:28', '2023-12-16 14:37:28');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_bm_books`
--
ALTER TABLE `gs_bm_books`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `gs_bm_dog_ear`
--
ALTER TABLE `gs_bm_dog_ear`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `gs_bm_books`
--
ALTER TABLE `gs_bm_books`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- テーブルの AUTO_INCREMENT `gs_bm_dog_ear`
--
ALTER TABLE `gs_bm_dog_ear`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
