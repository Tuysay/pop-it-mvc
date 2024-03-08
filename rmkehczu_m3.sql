-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 08 2024 г., 10:43
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `rmkehczu_m3`
--

-- --------------------------------------------------------

--
-- Структура таблицы `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `departments`
--

INSERT INTO `departments` (`id`, `name`) VALUES
(12, 'Спорта'),
(13, 'Природа и ее важность');

-- --------------------------------------------------------

--
-- Структура таблицы `disciplines`
--

CREATE TABLE `disciplines` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `disciplines`
--

INSERT INTO `disciplines` (`id`, `name`) VALUES
(18, 'Физ-ра'),
(19, 'Химия'),
(20, 'Vdfsaf'),
(21, 'Семен Сергеевич Буртовой'),
(22, 'Природа и ее важность'),
(23, 'Михаил');

-- --------------------------------------------------------

--
-- Структура таблицы `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `firt_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `patronymic` varchar(255) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `address` varchar(255) NOT NULL,
  `post_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `birthday` date NOT NULL,
  `img_photo` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `employees`
--

INSERT INTO `employees` (`id`, `firt_name`, `last_name`, `patronymic`, `gender`, `address`, `post_id`, `department_id`, `birthday`, `img_photo`) VALUES
(21, 'Макс', 'Ёлахов', 'Сергеевич', 1, 'Сибирская 102', 2, 12, '2002-04-22', ''),
(22, 'Семен', 'Буртовой', 'Сергеевич', 1, 'Сибирская 102', 2, 12, '2993-03-11', ''),
(30, '123', '123', '123', 0, 'Сибирская 102', 2, 12, '2024-01-01', ''),
(31, 'Крендель', 'Гапеев', 'Сергеевич', 1, 'Сибирская 102', 3, 13, '2005-03-12', 'photo/172646-krasno_sinyaya_anime_devushka-anime-sinie_volosy-anime_art-devushka_koshka-1920x1080.png'),
(32, 'Михаил', 'Гапеев', 'Сергеевич', 1, 'Сибирская 102', 2, 12, '2024-03-10', 'photo/175983-anime-hacune_miku-rot-ulybka-multfilm-1920x1080.jpg'),
(33, 'Михаил', 'Сабибуров', 'Сергеевич', 1, 'Сибирская 10', 4, 13, '2024-03-13', 'photo/172646-krasno_sinyaya_anime_devushka-anime-sinie_volosy-anime_art-devushka_koshka-1920x1080.png'),
(34, 'Лиля', 'Крылова', 'Сергеевна', 1, 'Сибирская 10', 5, 13, '2024-03-05', 'photo/pngwing.com.png'),
(35, 'Лиля', 'Крылова', 'Сергеевна', 0, 'Сибирская 10', 4, 12, '2024-03-26', 'photo/pngwing.com.png');

-- --------------------------------------------------------

--
-- Структура таблицы `emp_disciplines`
--

CREATE TABLE `emp_disciplines` (
  `id` int(11) NOT NULL,
  `id_employees` int(11) NOT NULL,
  `disciplines_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `emp_disciplines`
--

INSERT INTO `emp_disciplines` (`id`, `id_employees`, `disciplines_id`) VALUES
(1, 21, 20),
(2, 22, 19),
(3, 30, 20),
(4, 31, 22),
(5, 32, 18),
(6, 33, 20),
(7, 34, 20),
(8, 35, 20);

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `name`) VALUES
(2, 'Физрук'),
(3, 'Крутойчел'),
(4, 'ыфЫВФ'),
(5, 'уборщик');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `login`, `password`, `role_id`) VALUES
(9, 'Да', 'eggi', '202cb962ac59075b964b07152d234b70', 2),
(10, 'Семен Сергеевич Буртовой', 'poh', '202cb962ac59075b964b07152d234b70', 1),
(11, 'ssss aaaa dddd', '123', '202cb962ac59075b964b07152d234b70', 2),
(12, '23', '231', '9bd5ee6fe55aaeb673025dbcb8f939c1', 1),
(13, 'Клара', 'falis', '202cb962ac59075b964b07152d234b70', 1),
(14, 'Крендель', 'as', '202cb962ac59075b964b07152d234b70', 2),
(15, 'лапа', 'mda', '202cb962ac59075b964b07152d234b70', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `disciplines`
--
ALTER TABLE `disciplines`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Индексы таблицы `emp_disciplines`
--
ALTER TABLE `emp_disciplines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_employees` (`id_employees`),
  ADD KEY `disciplines_id` (`disciplines_id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `disciplines`
--
ALTER TABLE `disciplines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT для таблицы `emp_disciplines`
--
ALTER TABLE `emp_disciplines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_5` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employees_ibfk_6` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `emp_disciplines`
--
ALTER TABLE `emp_disciplines`
  ADD CONSTRAINT `emp_disciplines_ibfk_1` FOREIGN KEY (`id_employees`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `emp_disciplines_ibfk_2` FOREIGN KEY (`disciplines_id`) REFERENCES `disciplines` (`id`);

--
-- Ограничения внешнего ключа таблицы `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
