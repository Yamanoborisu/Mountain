-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 01 2020 г., 07:50
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mountain`
--

-- --------------------------------------------------------

--
-- Структура таблицы `markers`
--
-- Создание: Май 28 2020 г., 06:29
--

CREATE TABLE `markers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='visited_mountains_data';

--
-- Дамп данных таблицы `markers`
--

INSERT INTO `markers` (`id`, `name`, `lat`, `lng`, `year`) VALUES
(1, 'Norikura', 36.106525, 137.553619, 2019),
(2, 'Hachijou-jima', 33.140198, 139.767151, 2019),
(3, 'Ubako', 35.678909, 138.896469, 2019),
(4, 'Zao', 38.170666, 140.416473, 2020),
(5, 'Io', 35.999195, 138.370071, 2020),
(6, 'Hinode', 35.781200, 139.167664, 2020);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `markers`
--
ALTER TABLE `markers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `markers`
--
ALTER TABLE `markers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
