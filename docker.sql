-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Хост: database:3306
-- Время создания: Дек 15 2025 г., 02:55
-- Версия сервера: 8.4.6
-- Версия PHP: 8.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `docker`
--

-- --------------------------------------------------------

--
-- Структура таблицы `apartments`
--

CREATE TABLE `apartments` (
  `id` int NOT NULL,
  `rooms` int NOT NULL,
  `floor` int NOT NULL,
  `price` int NOT NULL,
  `build_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `apartments`
--

INSERT INTO `apartments` (`id`, `rooms`, `floor`, `price`, `build_id`) VALUES
(2, 5, 5, 200, 1),
(3, 2, 3, 500, 1),
(4, 5, 3, 200, 1),
(5, 5, 3, 200, 1),
(6, 3, 4, 5566, 1),
(7, 3, 4, 5566, 1),
(20, 1, 3, 30000, 49),
(21, 2, 5, 45000, 40),
(22, 3, 7, 60000, 41),
(23, 2, 4, 47000, 42),
(24, 1, 2, 29000, 43),
(25, 3, 8, 62000, 43),
(26, 2, 6, 48000, 45),
(27, 1, 1, 31000, 47),
(28, 3, 9, 65000, 46),
(29, 2, 10, 49000, 48),
(30, 1, 2, 33000, 48),
(31, 2, 3, 47000, 1),
(32, 2, 3, 554, 1),
(33, 2, 4, 55, 1),
(34, 2, 4, 55, 1),
(35, 2, 4, 55, 1),
(36, 2, 4, 55, 1),
(37, 2, 4, 55, 1),
(38, 2, 4, 55, 1),
(39, 2, 4, 55, 1),
(40, 2, 34, 545, 1),
(41, 2, 34, 545, 1),
(42, 2, 34, 545, 1),
(43, 2, 34, 545, 1),
(44, 2, 34, 545, 1),
(45, 2, 34, 545, 1),
(46, 2, 34, 545, 1),
(47, 2, 34, 545, 1),
(48, 2, 34, 545, 1),
(49, 2, 34, 545, 1),
(50, 2, 34, 545, 1),
(51, 2, 34, 545, 1),
(52, 2, 34, 545, 1),
(53, 5, 10, 500, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `apartment_images`
--

CREATE TABLE `apartment_images` (
  `id` int NOT NULL,
  `apartment_id` int NOT NULL,
  `image_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `apartment_images`
--

INSERT INTO `apartment_images` (`id`, `apartment_id`, `image_id`) VALUES
(4, 7, 3),
(29, 52, 28),
(30, 52, 29),
(31, 53, 30);

-- --------------------------------------------------------

--
-- Структура таблицы `apartment_layouts`
--

CREATE TABLE `apartment_layouts` (
  `id` int NOT NULL,
  `apartment_id` int NOT NULL,
  `layout_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `apartment_layouts`
--

INSERT INTO `apartment_layouts` (`id`, `apartment_id`, `layout_id`) VALUES
(1, 2, 1),
(2, 3, 1),
(3, 5, 1),
(4, 6, 1),
(5, 7, 1),
(6, 32, 1),
(7, 33, 1),
(8, 34, 1),
(9, 35, 1),
(10, 36, 1),
(11, 37, 1),
(12, 38, 1),
(13, 39, 1),
(14, 40, 1),
(15, 41, 1),
(16, 42, 1),
(17, 43, 1),
(18, 44, 1),
(19, 45, 1),
(20, 46, 1),
(21, 47, 1),
(22, 48, 1),
(23, 49, 1),
(24, 50, 1),
(25, 51, 1),
(26, 52, 1),
(27, 53, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `builds`
--

CREATE TABLE `builds` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `planning_date` date NOT NULL,
  `floors` int NOT NULL,
  `resident_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `builds`
--

INSERT INTO `builds` (`id`, `name`, `planning_date`, `floors`, `resident_id`) VALUES
(1, 'Зеленый домик', '2025-12-22', 5, 3),
(38, '栋1', '2022-03-15', 10, 9),
(39, 'Башня А', '2023-01-10', 15, 2),
(40, 'Объект B', '2021-07-20', 8, 3),
(41, 'Корпус 3', '2022-11-05', 12, 9),
(42, 'Здание D', '2020-05-25', 16, 2),
(43, 'Дом 5', '2023-06-18', 9, 10),
(44, 'Объект 6', '2019-09-30', 14, 8),
(45, 'Навес 7', '2022-02-14', 11, 8),
(46, 'Строение H', '2021-12-01', 13, 9),
(47, 'Корпус I', '2020-08-23', 17, 10),
(48, 'Жилой блок J', '2023-04-05', 7, 11),
(49, 'Многоэтажка K', '2022-10-12', 20, 12);

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int NOT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `path`) VALUES
(3, 'img/layout2.jpeg'),
(28, 'img/MyISAM процедура.png'),
(29, 'img/Процедура InnoDB.png'),
(30, 'img/MyISAM процедура.png');

-- --------------------------------------------------------

--
-- Структура таблицы `layouts`
--

CREATE TABLE `layouts` (
  `id` int NOT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `layouts`
--

INSERT INTO `layouts` (`id`, `path`) VALUES
(1, 'img/layout1.png'),
(4, 'img/layout2.jpeg');

-- --------------------------------------------------------

--
-- Структура таблицы `residents`
--

CREATE TABLE `residents` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `residents`
--

INSERT INTO `residents` (`id`, `name`, `address`, `latitude`, `longitude`, `slug`) VALUES
(2, 'Зеленые домики', 'Тихий океан', '12.123', '123.12312', 'zelenye-domiki'),
(3, 'У черта на куличиках', 'примерно там же', '12.123', '123.12312', 'u-cherta-na-kulichikah'),
(8, 'ЖК Солнечный', 'ул. Цветочная, д. 1', '55.7558', '37.6173', 'zkh-solnechny'),
(9, 'ЖК Летняя Долина', 'пр. Зеленый, д. 15', '55.7540', '37.6220', 'zkh-letnyaya-dolina'),
(10, 'ЖК Вдохновение', 'ул. Мира, д. 10', '55.7565', '37.6185', 'zkh-vdochnovenie'),
(11, 'ЖК Вершина', 'ул. Горная, д. 5', '55.7530', '37.6130', 'zkh-vershina'),
(12, 'ЖК Южный Берег', 'ул. Южная, д. 20', '55.7570', '37.6100', 'zkh-yuzhnyy-bereg'),
(13, 'ЖК Лазурный', 'пр. Морской, д. 8', '55.7550', '37.6150', 'zkh-lazurnyy'),
(14, 'ЖК Уютный', 'ул. Тихая, д. 12', '55.7545', '37.6200', 'zkh-uyutnyy'),
(15, 'ЖК Заречный', 'ул. Заоблачная, д. 3', '55.7560', '37.6160', 'zkh-zarechny'),
(16, 'ЖК Престиж', 'пр. Элитный, д. 25', '55.7580', '37.6120', 'zkh-prestizh'),
(17, 'ЖК Городок', 'ул. Центральная, д. 7', '55.7535', '37.6175', 'zkh-gorodok'),
(18, 'ЖК Счастье', 'ул. Радости, д. 4', '55.7540', '37.6135', 'zkh-schaste'),
(19, 'ЖК Рассвет', 'пр. Утренний, д. 18', '55.7575', '37.6110', 'zkh-rassvet');

-- --------------------------------------------------------

--
-- Структура таблицы `resident_layouts`
--

CREATE TABLE `resident_layouts` (
  `id` int NOT NULL,
  `resident_id` int NOT NULL,
  `layout_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `resident_layouts`
--

INSERT INTO `resident_layouts` (`id`, `resident_id`, `layout_id`) VALUES
(1, 2, 1),
(2, 2, 1),
(4, 2, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `is_admin`) VALUES
(1, '1', '1', 0),
(2, 'admin', 'admin', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `apartments`
--
ALTER TABLE `apartments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `build_id` (`build_id`);

--
-- Индексы таблицы `apartment_images`
--
ALTER TABLE `apartment_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `apartment_id` (`apartment_id`),
  ADD KEY `apartment_images_ibfk_2` (`image_id`);

--
-- Индексы таблицы `apartment_layouts`
--
ALTER TABLE `apartment_layouts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `apartment_id` (`apartment_id`),
  ADD KEY `layout_id` (`layout_id`);

--
-- Индексы таблицы `builds`
--
ALTER TABLE `builds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resident_id` (`resident_id`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `layouts`
--
ALTER TABLE `layouts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `residents`
--
ALTER TABLE `residents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Индексы таблицы `resident_layouts`
--
ALTER TABLE `resident_layouts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `layout_id` (`layout_id`),
  ADD KEY `resident_id` (`resident_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `apartments`
--
ALTER TABLE `apartments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT для таблицы `apartment_images`
--
ALTER TABLE `apartment_images`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT для таблицы `apartment_layouts`
--
ALTER TABLE `apartment_layouts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `builds`
--
ALTER TABLE `builds`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблицы `layouts`
--
ALTER TABLE `layouts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `residents`
--
ALTER TABLE `residents`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `resident_layouts`
--
ALTER TABLE `resident_layouts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `apartments`
--
ALTER TABLE `apartments`
  ADD CONSTRAINT `apartments_ibfk_1` FOREIGN KEY (`build_id`) REFERENCES `builds` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `apartment_images`
--
ALTER TABLE `apartment_images`
  ADD CONSTRAINT `apartment_images_ibfk_1` FOREIGN KEY (`apartment_id`) REFERENCES `apartments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `apartment_images_ibfk_2` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `apartment_layouts`
--
ALTER TABLE `apartment_layouts`
  ADD CONSTRAINT `apartment_layouts_ibfk_1` FOREIGN KEY (`apartment_id`) REFERENCES `apartments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `apartment_layouts_ibfk_2` FOREIGN KEY (`layout_id`) REFERENCES `layouts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `builds`
--
ALTER TABLE `builds`
  ADD CONSTRAINT `builds_ibfk_1` FOREIGN KEY (`resident_id`) REFERENCES `residents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `resident_layouts`
--
ALTER TABLE `resident_layouts`
  ADD CONSTRAINT `resident_layouts_ibfk_1` FOREIGN KEY (`layout_id`) REFERENCES `layouts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `resident_layouts_ibfk_2` FOREIGN KEY (`resident_id`) REFERENCES `residents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
