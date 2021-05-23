-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 23 2021 г., 21:46
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

--
-- Дамп данных таблицы `administrator`
--

INSERT INTO `administrator` (`admin_id`, `fname`, `email`, `password`) VALUES
(1, 'Olzhas', 'ol.ilyassov@gmail.com', 'cdb88e64771f7914113d85078def265f');

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
-- Структура таблицы `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Структура таблицы `kegelring`
--

CREATE TABLE `kegelring` (
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

--
-- Дамп данных таблицы `linefollower`
--

INSERT INTO `linefollower` (`id`, `team_id`, `round`, `time`, `task1`, `task2`, `task3`) VALUES
(1, 1, 1, '00:01:14', 5, 5, 5),
(2, 1, 1, '00:01:05', 5, 5, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `parameter` varchar(100) NOT NULL,
  `value` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`id`, `parameter`, `value`) VALUES
(1, 'registerAccess', 'Closed');

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
  `phonenumber` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `team`
--

INSERT INTO `team` (`team_id`, `teamname`, `email`, `password`, `p1_fname`, `p1_lname`, `p2_fname`, `p2_lname`, `organisation`, `locality`, `category_id`, `phonenumber`) VALUES
(1, 'BostonJuniors', 'bostonDgroup@gmail.com', 'cdb88e64771f7914113d85078def265f', 'Temirlan', 'Seitkali', 'Abylay', 'Seilbek', 'BostonDynamics', 'Nur-Sultan', 1, '7751756513');

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
-- Индексы таблицы `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

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
-- Индексы таблицы `kegelring`
--
ALTER TABLE `kegelring`
  ADD PRIMARY KEY (`id`),
  ADD KEY `team_id_sumo_fk` (`team_id`);

--
-- Индексы таблицы `linefollower`
--
ALTER TABLE `linefollower`
  ADD PRIMARY KEY (`id`),
  ADD KEY `team_id_line_fk` (`team_id`) USING BTREE;

--
-- Индексы таблицы `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

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
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT для таблицы `kegelring`
--
ALTER TABLE `kegelring`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `linefollower`
--
ALTER TABLE `linefollower`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `team`
--
ALTER TABLE `team`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- Ограничения внешнего ключа таблицы `kegelring`
--
ALTER TABLE `kegelring`
  ADD CONSTRAINT `kegelring_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `team` (`team_id`);

--
-- Ограничения внешнего ключа таблицы `linefollower`
--
ALTER TABLE `linefollower`
  ADD CONSTRAINT `linefollower_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `team` (`team_id`);

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
