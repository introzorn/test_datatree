-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3308
-- Время создания: Апр 21 2021 г., 17:04
-- Версия сервера: 5.7.24
-- Версия PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `datatree`
--

-- --------------------------------------------------------

--
-- Структура таблицы `d_tree_data`
--

DROP TABLE IF EXISTS `d_tree_data`;
CREATE TABLE IF NOT EXISTS `d_tree_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) NOT NULL DEFAULT '0',
  `name` varchar(16) NOT NULL,
  `content` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `d_tree_data`
--

INSERT INTO `d_tree_data` (`id`, `parent`, `name`, `content`) VALUES
(1, 0, 'ГЛАВНЫЙ', 'тут текст главного элемента'),
(2, 1, 'Потомок1', 'тут текст потомка'),
(3, 1, 'Потомок2', 'тут текст потомка'),
(4, 1, 'Потомок3', 'тут текст потомка'),
(5, 2, 'Потомок21', 'тут текст потомка'),
(6, 1, 'БЕЗЫМЯННЫЙ', '-----'),
(15, 4, 'БЕЗЫМЯННЫЙ', '-----'),
(9, 8, 'bncv', 'vcbncvbn'),
(10, 9, 'БЕЗЫМЯННЫЙ', '-----'),
(11, 10, 'БЕЗЫМЯННЫЙ', '-----'),
(12, 11, 'БЕЗЫМЯННЫЙ', '-----'),
(14, 13, 'БЕЗЫМЯННЫЙ', '-----'),
(16, 15, 'БЕЗЫМЯННЫЙ', '-----'),
(17, 15, 'БЕЗЫМЯННЫЙ', '-----'),
(22, 5, 'ddddd', 'dsdfasdf'),
(19, 18, 'БЕЗЫМЯННЫЙ', '-----'),
(20, 19, 'БЕЗЫМЯННЫЙ', '-----'),
(21, 20, 'БЕЗЫМЯННЫЙ', '-----');

-- --------------------------------------------------------

--
-- Структура таблицы `d_tree_users`
--

DROP TABLE IF EXISTS `d_tree_users`;
CREATE TABLE IF NOT EXISTS `d_tree_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `password` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `d_tree_users`
--

INSERT INTO `d_tree_users` (`id`, `user`, `password`) VALUES
(1, ':user', ':password'),
(3, ':user', ':password'),
(4, 'introzorn', '2bd12a930c3012f9bb4e0ea9bec9a3fc');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
