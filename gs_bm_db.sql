-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2023-12-16 05:38:59
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
(1, 'テスト１', 'リンク１', 'ブックコメント１', '2023-12-15 09:45:55', '2023-12-15 09:45:55'),
(2, 'テスト２', 'https://www.google.co.jp/', '', '2023-12-15 09:49:10', '2023-12-15 09:49:10'),
(3, 'テスト3', 'リンク3', '', '2023-12-15 13:49:42', '2023-12-15 13:49:42'),
(4, '', '', '', '2023-12-15 16:16:28', '2023-12-15 16:16:28'),
(5, '', '', '', '2023-12-15 16:16:29', '2023-12-15 16:16:29'),
(6, 'テスト５', '', '', '2023-12-16 13:03:12', '2023-12-16 13:03:12'),
(7, 'テスト6', '', '', '2023-12-16 13:09:30', '2023-12-16 13:09:30'),
(8, 'テスト７', '', '', '2023-12-16 13:14:47', '2023-12-16 13:14:47'),
(9, 'なんかの本', '', '', '2023-12-16 13:27:49', '2023-12-16 13:27:49');

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
(2, 1, 10, 22, 'p.10のメモ', '2023-12-15 11:57:23', '2023-12-15 11:57:23'),
(4, 1, 50, 10, 'p.50 のメモ', '2023-12-15 14:00:59', '2023-12-15 14:00:59'),
(5, 1, 0, 0, '', '2023-12-16 08:05:11', '2023-12-16 08:05:11'),
(6, 1, 0, 0, '', '2023-12-16 13:28:08', '2023-12-16 13:28:08'),
(7, 9, 0, 0, '', '2023-12-16 13:34:48', '2023-12-16 13:34:48');

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
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- テーブルの AUTO_INCREMENT `gs_bm_dog_ear`
--
ALTER TABLE `gs_bm_dog_ear`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
