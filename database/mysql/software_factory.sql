-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 20 2021 г., 21:45
-- Версия сервера: 10.1.38-MariaDB
-- Версия PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `software_factory`
--

-- --------------------------------------------------------

--
-- Структура таблицы `administrator`
--

CREATE TABLE `administrator` (
  `admin_id` int(11) NOT NULL,
  `fname` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`category_id`, `title`) VALUES
(0, '-'),
(1, 'Line Follower'),
(2, 'Sumo');

-- --------------------------------------------------------

--
-- Структура таблицы `judge`
--

CREATE TABLE `judge` (
  `judge_id` int(11) NOT NULL,
  `fname` varchar(40) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `description` text NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `judge_category`
--

CREATE TABLE `judge_category` (
  `id` int(11) NOT NULL,
  `judge_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `linefollower`
--

CREATE TABLE `linefollower` (
  `id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `round` int(11) NOT NULL,
  `time` time NOT NULL,
  `task1` int(11) NOT NULL,
  `task2` int(11) NOT NULL,
  `task3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`status_id`, `status`) VALUES
(1, 'active'),
(2, 'disqualified'),
(3, 'in process...');

-- --------------------------------------------------------

--
-- Структура таблицы `sumo`
--

CREATE TABLE `sumo` (
  `id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `round` int(11) NOT NULL,
  `time` time NOT NULL,
  `task1` int(11) NOT NULL,
  `task2` int(11) NOT NULL,
  `task3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `team`
--

CREATE TABLE `team` (
  `team_id` int(11) NOT NULL,
  `teamname` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `p1_fname` varchar(40) NOT NULL,
  `p1_lname` varchar(40) NOT NULL,
  `p2_fname` varchar(40) NOT NULL,
  `p2_lname` varchar(40) NOT NULL,
  `organisation` varchar(40) NOT NULL,
  `locality` varchar(120) NOT NULL,
  `category_id` int(11) NOT NULL,
  `phonenumber` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `team_status`
--

CREATE TABLE `team_status` (
  `team_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`admin_id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Индексы таблицы `judge`
--
ALTER TABLE `judge`
  ADD PRIMARY KEY (`judge_id`);

--
-- Индексы таблицы `judge_category`
--
ALTER TABLE `judge_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `judge_id_fk` (`judge_id`),
  ADD KEY `category_id_fk` (`category_id`);

--
-- Индексы таблицы `linefollower`
--
ALTER TABLE `linefollower`
  ADD PRIMARY KEY (`id`),
  ADD KEY `team_id_line_fk` (`team_id`) USING BTREE;

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Индексы таблицы `sumo`
--
ALTER TABLE `sumo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `team_id_sumo_fk` (`team_id`);

--
-- Индексы таблицы `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`team_id`),
  ADD KEY `category_id_team_fk` (`category_id`);

--
-- Индексы таблицы `team_status`
--
ALTER TABLE `team_status`
  ADD PRIMARY KEY (`team_id`),
  ADD KEY `team_id_status_fk` (`team_id`),
  ADD KEY `status_id_fk` (`status_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `administrator`
--
ALTER TABLE `administrator`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `judge`
--
ALTER TABLE `judge`
  MODIFY `judge_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `judge_category`
--
ALTER TABLE `judge_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `linefollower`
--
ALTER TABLE `linefollower`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `sumo`
--
ALTER TABLE `sumo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `team`
--
ALTER TABLE `team`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `team_status`
--
ALTER TABLE `team_status`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `judge_category`
--
ALTER TABLE `judge_category`
  ADD CONSTRAINT `judge_category_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `judge_category_ibfk_2` FOREIGN KEY (`judge_id`) REFERENCES `judge` (`judge_id`);

--
-- Ограничения внешнего ключа таблицы `linefollower`
--
ALTER TABLE `linefollower`
  ADD CONSTRAINT `linefollower_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `team` (`team_id`);

--
-- Ограничения внешнего ключа таблицы `sumo`
--
ALTER TABLE `sumo`
  ADD CONSTRAINT `sumo_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `team` (`team_id`);

--
-- Ограничения внешнего ключа таблицы `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `team_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Ограничения внешнего ключа таблицы `team_status`
--
ALTER TABLE `team_status`
  ADD CONSTRAINT `team_status_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`),
  ADD CONSTRAINT `team_status_ibfk_2` FOREIGN KEY (`team_id`) REFERENCES `team` (`team_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
