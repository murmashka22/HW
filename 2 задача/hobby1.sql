-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 24 2021 г., 15:53
-- Версия сервера: 5.6.47
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `hobby1`
--

-- --------------------------------------------------------

--
-- Структура таблицы `hobbies`
--

CREATE TABLE `hobbies` (
  `ID_hobbies` int(60) NOT NULL,
  `Name` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Description` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `hobbies`
--

INSERT INTO `hobbies` (`ID_hobbies`, `Name`, `Description`) VALUES
(1, 'Вышивание', 'крестиком'),
(2, 'Рисование', 'пастель, гуашь, акрил'),
(3, 'Каллиграфия', 'искусство красивого письма'),
(4, 'Марблинг', 'рисование на воде');

-- --------------------------------------------------------

--
-- Структура таблицы `people`
--

CREATE TABLE `people` (
  `ID_person` int(60) NOT NULL,
  `Name` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Surname` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Age` int(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `people`
--

INSERT INTO `people` (`ID_person`, `Name`, `Surname`, `Age`) VALUES
(1, 'Мария', 'Иванова', 62),
(2, 'Василий', 'Иванов', 12),
(3, 'Ира', 'Петрова', 31),
(4, 'Ира', 'Петрова', 31),
(5, 'Ира', 'Петрова', 31),
(6, 'Ира', 'Петрова', 31),
(7, 'Ира', 'Петрова', 31),
(8, 'Ира', 'Петрова', 31),
(9, 'Ира', 'Петрова', 31),
(10, 'Ира', 'Петрова', 31),
(11, 'Tom', 'Smith', 12),
(12, 'Tom', 'Smith', 12),
(13, 'Tom', 'Smith', 12),
(14, 'Tom', 'Smith', 12),
(15, 'Tom', 'Smith', 12),
(16, 'Tom', 'Smith', 12),
(17, 'Tom', 'Smith', 12),
(18, 'Sam', 'Smith', 12),
(19, 'Sam', 'Smith', 12),
(20, 'Sam', 'Smith', 12),
(21, 'Sam', 'Smith', 12),
(22, 'Sam', 'Smith', 12),
(23, 'Sam', 'Smith', 12),
(24, 'Sam', 'Smith', 12),
(25, 'Sam', 'Smith', 12),
(26, 'Sam', 'Smith', 12),
(27, 'Sam', 'Smith', 12),
(28, 'Sam', 'Smith', 12),
(29, 'Sam', 'Smith', 12),
(30, 'Sam', 'Smith', 12),
(31, 'Sam', 'Smith', 12),
(32, 'Sam', 'Smith', 12),
(33, 'Sam', 'Smith', 12),
(34, 'Sam', 'Smith', 12),
(35, 'Sam', 'Smith', 12),
(36, 'Аня', 'Пчелкина', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `people_hobbies`
--

CREATE TABLE `people_hobbies` (
  `ID_record` int(60) NOT NULL,
  `ID_people` int(60) DEFAULT NULL,
  `ID_hobbies` int(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `people_hobbies`
--

INSERT INTO `people_hobbies` (`ID_record`, `ID_people`, `ID_hobbies`) VALUES
(1, 36, 3);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `hobbies`
--
ALTER TABLE `hobbies`
  ADD PRIMARY KEY (`ID_hobbies`),
  ADD UNIQUE KEY `ID_hobbies` (`ID_hobbies`);

--
-- Индексы таблицы `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`ID_person`),
  ADD UNIQUE KEY `ID_person` (`ID_person`);

--
-- Индексы таблицы `people_hobbies`
--
ALTER TABLE `people_hobbies`
  ADD PRIMARY KEY (`ID_record`),
  ADD UNIQUE KEY `ID_record` (`ID_record`),
  ADD KEY `ID_people` (`ID_people`),
  ADD KEY `ID_hobbies` (`ID_hobbies`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `hobbies`
--
ALTER TABLE `hobbies`
  MODIFY `ID_hobbies` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `people`
--
ALTER TABLE `people`
  MODIFY `ID_person` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT для таблицы `people_hobbies`
--
ALTER TABLE `people_hobbies`
  MODIFY `ID_record` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `people_hobbies`
--
ALTER TABLE `people_hobbies`
  ADD CONSTRAINT `people_hobbies_ibfk_1` FOREIGN KEY (`ID_people`) REFERENCES `people` (`ID_person`) ON DELETE CASCADE,
  ADD CONSTRAINT `people_hobbies_ibfk_2` FOREIGN KEY (`ID_hobbies`) REFERENCES `hobbies` (`ID_hobbies`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
