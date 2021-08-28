-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 28 2021 г., 17:43
-- Версия сервера: 8.0.19
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `univer`
--

-- --------------------------------------------------------

--
-- Структура таблицы `group`
--

CREATE TABLE `group` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_ru` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `group`
--

INSERT INTO `group` (`id`, `name`, `name_ru`, `name_en`, `status`, `created_date`) VALUES
(2, '712-17 AX/O\'', '712-17 AX/O\'', '712-17 AX/O\'', 1, '2021-08-27 10:53:18'),
(3, '710-17 AX/O\'', '710-17 AX/O\'', '710-17 AX/O\'', 1, '2021-08-27 10:53:31'),
(4, '714-17 AX/O\'', '714-17 AX/O\'', '714-17 AX/O\'', 1, '2021-08-27 10:53:45');

-- --------------------------------------------------------

--
-- Структура таблицы `group_pair`
--

CREATE TABLE `group_pair` (
  `id` int NOT NULL,
  `group_id` int NOT NULL,
  `pair_id` int NOT NULL,
  `day` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `group_pair`
--

INSERT INTO `group_pair` (`id`, `group_id`, `pair_id`, `day`) VALUES
(3, 2, 1, '2021-08-12'),
(4, 2, 2, '2021-08-12');

-- --------------------------------------------------------

--
-- Структура таблицы `lesson`
--

CREATE TABLE `lesson` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_ru` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `lesson`
--

INSERT INTO `lesson` (`id`, `name`, `name_ru`, `name_en`, `status`, `created_date`) VALUES
(1, 'Informatika asoslari', 'Informatika asoslari', 'Informatika asoslari', 1, '2021-08-27 10:51:55'),
(2, 'Tizimli va amaliy dasturlashtirish', 'Tizimli va amaliy dasturlashtirish', 'Tizimli va amaliy dasturlashtirish', 1, '2021-08-27 10:52:06'),
(3, 'Diskret matematika', 'Diskret matematika', 'Diskret matematika', 1, '2021-08-27 10:52:27');

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `apply_time` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1630047558),
('m130524_201442_init', 1630047562),
('m190124_110200_add_verification_token_column_to_user_table', 1630047563),
('m210827_083740_create_room_table', 1630057413),
('m210827_083803_create_teacher_table', 1630057414),
('m210827_083812_create_group_table', 1630057415),
('m210827_083835_create_lesson_table', 1630057416),
('m210827_083900_create_pair_table', 1630057417);

-- --------------------------------------------------------

--
-- Структура таблицы `pair`
--

CREATE TABLE `pair` (
  `id` int NOT NULL,
  `pair_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pair_name_ru` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pair_name_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `begin_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `end_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `pair`
--

INSERT INTO `pair` (`id`, `pair_name`, `pair_name_ru`, `pair_name_en`, `begin_date`, `end_date`) VALUES
(1, '1-para', '1-para', '1-para', '08:30:00', '09:50:00'),
(2, '2-para', '2-para', '2-para', '10:00:00', '11:20:00'),
(3, '3-para', '3-para', '3-para', '11:30:00', '12:50:00');

-- --------------------------------------------------------

--
-- Структура таблицы `room`
--

CREATE TABLE `room` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_ru` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `room`
--

INSERT INTO `room` (`id`, `name`, `name_ru`, `name_en`, `status`, `created_date`) VALUES
(2, 'D-blok 206-xona', 'D-blok 206-xona', 'D-blok 206-xona', 1, '2021-08-27 10:40:27'),
(3, 'D-blok 208-xona', 'D-blok 208-xona', 'D-blok 208-xona', 1, '2021-08-27 10:40:40'),
(4, 'A-blok 115-xona', 'A-blok 115-xona', 'A-blok 115-xona', 1, '2021-08-27 10:40:59');

-- --------------------------------------------------------

--
-- Структура таблицы `room_pair`
--

CREATE TABLE `room_pair` (
  `id` int NOT NULL,
  `room_id` int NOT NULL,
  `pair_id` int NOT NULL,
  `day` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `room_pair`
--

INSERT INTO `room_pair` (`id`, `room_id`, `pair_id`, `day`) VALUES
(2, 2, 1, '2021-08-12'),
(3, 2, 2, '2021-08-12');

-- --------------------------------------------------------

--
-- Структура таблицы `shedule`
--

CREATE TABLE `shedule` (
  `id` int NOT NULL,
  `group_id` int NOT NULL,
  `teacher_id` int NOT NULL,
  `lesson_id` int NOT NULL,
  `room_id` int NOT NULL,
  `pair_id` int NOT NULL,
  `day` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `shedule`
--

INSERT INTO `shedule` (`id`, `group_id`, `teacher_id`, `lesson_id`, `room_id`, `pair_id`, `day`) VALUES
(4, 2, 2, 1, 2, 1, '2021-08-12'),
(5, 2, 2, 1, 2, 2, '2021-08-12');

-- --------------------------------------------------------

--
-- Структура таблицы `teacher`
--

CREATE TABLE `teacher` (
  `id` int NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `skill` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `teacher`
--

INSERT INTO `teacher` (`id`, `first_name`, `last_name`, `skill`, `status`, `created_date`) VALUES
(2, 'Mirzayan Mirzaaxmedovich Kamilov', 'Mirzayan Mirzaaxmedovich Kamilov', 'Mirzayan Mirzaaxmedovich Kamilov', 1, '2021-08-27 10:50:05'),
(3, 'Isaev Rixsixoʼja Isaxodjaevich', 'Isaev Rixsixoʼja Isaxodjaevich', 'Isaev Rixsixoʼja Isaxodjaevich', 1, '2021-08-27 10:50:17'),
(4, 'Qaxxor Pattaxovich Abduraxmanov', 'Qaxxor Pattaxovich Abduraxmanov', 'Qaxxor Pattaxovich Abduraxmanov', 1, '2021-08-27 10:50:28');

-- --------------------------------------------------------

--
-- Структура таблицы `teacher_lesson`
--

CREATE TABLE `teacher_lesson` (
  `id` int NOT NULL,
  `day` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `teacher_id` int NOT NULL,
  `pair_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `teacher_lesson`
--

INSERT INTO `teacher_lesson` (`id`, `day`, `teacher_id`, `pair_id`) VALUES
(1, '2021-08-12', 2, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint NOT NULL DEFAULT '10',
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'admin', 'BGh0eCH9N2iJnEXHH7acBLxJan_kbfzo', '$2y$13$os7STs1LQUlT0pttKXF8puDSFcX/Z.3zXHxkwszynT/REjvh/t59K', NULL, 'umid2068066@gmail.com', 10, 1630047567, 1630047567, 'ENtai1cOCxnVxDVpLc0WhYQmFu4BzSY0_1630047567');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `group_pair`
--
ALTER TABLE `group_pair`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_group_pair` (`group_id`),
  ADD KEY `pair_group_pair` (`pair_id`);

--
-- Индексы таблицы `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `pair`
--
ALTER TABLE `pair`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `room_pair`
--
ALTER TABLE `room_pair`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_room_pair` (`room_id`),
  ADD KEY `pair_room_pair` (`pair_id`);

--
-- Индексы таблицы `shedule`
--
ALTER TABLE `shedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shedule_group` (`group_id`),
  ADD KEY `shedule_teacher` (`teacher_id`),
  ADD KEY `shedule_lesson` (`lesson_id`),
  ADD KEY `shedule_room` (`room_id`),
  ADD KEY `shedule_pair` (`pair_id`);

--
-- Индексы таблицы `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `teacher_lesson`
--
ALTER TABLE `teacher_lesson`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `group`
--
ALTER TABLE `group`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `group_pair`
--
ALTER TABLE `group_pair`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `lesson`
--
ALTER TABLE `lesson`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `pair`
--
ALTER TABLE `pair`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `room`
--
ALTER TABLE `room`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `room_pair`
--
ALTER TABLE `room_pair`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `shedule`
--
ALTER TABLE `shedule`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `teacher_lesson`
--
ALTER TABLE `teacher_lesson`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `group_pair`
--
ALTER TABLE `group_pair`
  ADD CONSTRAINT `group_group_pair` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pair_group_pair` FOREIGN KEY (`pair_id`) REFERENCES `pair` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `room_pair`
--
ALTER TABLE `room_pair`
  ADD CONSTRAINT `pair_room_pair` FOREIGN KEY (`pair_id`) REFERENCES `pair` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `room_room_pair` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `shedule`
--
ALTER TABLE `shedule`
  ADD CONSTRAINT `shedule_group` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shedule_lesson` FOREIGN KEY (`lesson_id`) REFERENCES `lesson` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shedule_pair` FOREIGN KEY (`pair_id`) REFERENCES `pair` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shedule_room` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shedule_teacher` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
