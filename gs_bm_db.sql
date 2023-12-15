-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2023-12-15 03:58:21
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
  `url` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `cover_img_name` text DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `gs_bm_books`
--

INSERT INTO `gs_bm_books` (`id`, `name`, `url`, `content`, `cover_img_name`, `created_date`, `update_date`) VALUES
(1, 'テスト１', 'リンク１', 'ブックコメント１', NULL, '2023-12-15 09:45:55', '2023-12-15 09:45:55'),
(2, 'テスト２', 'https://www.google.co.jp/', '', NULL, '2023-12-15 09:49:10', '2023-12-15 09:49:10');

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
(2, 1, 10, 22, 'p.10のメモ', '2023-12-15 11:57:23', '2023-12-15 11:57:23');

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
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- テーブルの AUTO_INCREMENT `gs_bm_dog_ear`
--
ALTER TABLE `gs_bm_dog_ear`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
