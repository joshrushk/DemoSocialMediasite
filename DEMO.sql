-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Авг 21 2014 г., 15:26
-- Версия сервера: 5.5.35-0ubuntu0.13.10.2
-- Версия PHP: 5.5.3-1ubuntu2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `nisge_music`
--

-- --------------------------------------------------------

--
-- Структура таблицы `bookmarks`
--

CREATE TABLE IF NOT EXISTS `bookmarks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `video_id` varchar(500) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `playlists`
--

CREATE TABLE IF NOT EXISTS `playlists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `playlist_name` varchar(500) NOT NULL,
  `playlist_author` int(11) NOT NULL,
  `playlist_views` int(11) NOT NULL DEFAULT '0',
  `playlist_status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `playlists`
--

INSERT INTO `playlists` (`id`, `playlist_name`, `playlist_author`, `playlist_views`, `playlist_status`) VALUES
(1, 'Popular on YouTube', 1, 10, 1),
(2, 'FIFATV', 1, 9, 1),
(3, 'World Cup 2014', 1, 4, 1),
(4, 'World Hits 2014', 1, 15, 1),
(5, 'HOT 5', 1, 8, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `playlists_songs`
--

CREATE TABLE IF NOT EXISTS `playlists_songs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `song_id` varchar(500) NOT NULL,
  `playlist_id` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Дамп данных таблицы `playlists_songs`
--

INSERT INTO `playlists_songs` (`id`, `song_id`, `playlist_id`, `status`) VALUES
(1, '-rZGn8VfsUo', 1, 1),
(2, '9bZkp7q19f0', 1, 1),
(3, 'm1kbFT8emxs', 1, 1),
(4, 'qCvdhI9lmYI', 1, 1),
(7, 'ZnPUfYw2s9s', 2, 1),
(8, 'ffbkSadgciM', 2, 1),
(9, 'fDI4gC-Nric', 2, 1),
(10, 'j23Pcy9QJ80', 3, 1),
(11, 'E_yVnNtQsk0', 3, 1),
(12, 'r-7fnTK7QYw', 3, 1),
(13, '9xBOA9gTpvw', 5, 1),
(14, 'FQpsY3BWgq4', 5, 1),
(15, 'pB-5XG-DbAA', 5, 1),
(16, 'Q6x53dtH928', 5, 1),
(17, 'O-zpOMYRi0w', 5, 1),
(18, 'BULp85we8qQ', 5, 1),
(19, 'Q_xq8R3UPMc', 4, 1),
(20, 'y21y5ACqQN0', 4, 1),
(21, 'C7dPqrmDWxs', 4, 1),
(22, '9eIuSxU-FcU', 4, 1),
(23, 'ChepkfH0xqE', 4, 1),
(24, '6uc4BQsqs4E', 4, 1),
(25, '7RLs2KB4Gco', 4, 1),
(26, 'kHue-HaXXzg', 4, 1),
(27, 'P_I_QwekH60', 4, 1),
(28, 'EX3uZwoTbUo', 4, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `title` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `keywords` text NOT NULL,
  `adverts_code_1` text NOT NULL,
  `adverts_code_2` text NOT NULL,
  `lang` varchar(100) NOT NULL DEFAULT 'en'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`title`, `description`, `keywords`, `adverts_code_1`, `adverts_code_2`, `lang`) VALUES
('New STAR | Listen music', 'New STAR | Listen music from all over the world', 'New STAR, Listen music, World Music, Funny Videos, World Story', '', '', 'en');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `admin` int(1) NOT NULL DEFAULT '0',
  `active` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `admin`, `active`) VALUES
(1, 'admin', 'info@nisgeo.com', '21232f297a57a5a743894a0e4a801fc3', 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
