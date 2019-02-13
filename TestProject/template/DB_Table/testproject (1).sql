-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Фев 04 2019 г., 15:26
-- Версия сервера: 10.1.35-MariaDB
-- Версия PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `testproject`
--

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE `role` (
  `id_role` int(11) UNSIGNED NOT NULL,
  `name_role` varchar(30) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`id_role`, `name_role`) VALUES
(1, 'Администратор'),
(11, 'Пользователь');

-- --------------------------------------------------------

--
-- Структура таблицы `sms_general`
--

CREATE TABLE `sms_general` (
  `id_sms` int(11) UNSIGNED NOT NULL,
  `login` varchar(30) CHARACTER SET utf8 NOT NULL,
  `sms` varchar(255) CHARACTER SET utf8 NOT NULL,
  `data_send` varchar(30) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `sms_private`
--

CREATE TABLE `sms_private` (
  `id_sms` int(11) NOT NULL,
  `login_sender` varchar(30) CHARACTER SET utf8 NOT NULL,
  `login_recipient` varchar(30) CHARACTER SET utf8 NOT NULL,
  `sms` text CHARACTER SET utf8 NOT NULL,
  `data_sender` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `sms_private`
--

INSERT INTO `sms_private` (`id_sms`, `login_sender`, `login_recipient`, `sms`, `data_sender`) VALUES
(26, 'Nastya', 'Andrey98', 'Hi', '18-16-11'),
(27, 'Nastya', 'Andrey98', 'f', '27-20-11'),
(28, 'Nastya', 'Andrey98', 'D', '21-23-11'),
(29, 'Andrey98', 'Nastya', 'asd', '31-23-11'),
(30, 'Andrey1', 'Nastya', 'i love you', '34-04-13'),
(31, 'Nastya', 'Andrey1', 'i love you', '46-04-13'),
(32, 'Admin', 'Nastya', 'Hello', '00-37-16'),
(33, 'Nastya', 'Admin', 'hello', '24-37-16'),
(34, 'Admin', 'Nastya', 'Where are you&', '44-37-16'),
(35, 'Andrey98', 'Andrey1', 'ÐšÐ°Ðº Ð´ÐµÐ»Ð°?', '34-59-14'),
(36, 'Nastya', 'Andrey98', 'ÐºÐ°Ðº Ð´ÐµÐ»Ð°?', '19-15-15');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int(11) UNSIGNED NOT NULL,
  `login` varchar(30) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `password` varchar(200) CHARACTER SET utf8 NOT NULL,
  `id_role` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `login`, `email`, `password`, `id_role`) VALUES
(12, 'Andrey98', 'sportik-70@yandex.ru', '1234', 11),
(17, 'Andrey1', 'spork-70@yandex.ru', '1234', 11),
(21, 'Andrey981234', 'sptr@ta.ru', '1234', 11),
(22, 'Nastya', 'sportik-70@yandex.ru1', '1234', 11),
(23, 'Admin', 'Admin@admim.ru', '1234', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Индексы таблицы `sms_general`
--
ALTER TABLE `sms_general`
  ADD PRIMARY KEY (`id_sms`),
  ADD KEY `INDEX_LOGIN` (`login`);

--
-- Индексы таблицы `sms_private`
--
ALTER TABLE `sms_private`
  ADD PRIMARY KEY (`id_sms`),
  ADD KEY `login_sender` (`login_sender`),
  ADD KEY `login_recipient` (`login_recipient`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `sms_general`
--
ALTER TABLE `sms_general`
  MODIFY `id_sms` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT для таблицы `sms_private`
--
ALTER TABLE `sms_private`
  MODIFY `id_sms` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `sms_general`
--
ALTER TABLE `sms_general`
  ADD CONSTRAINT `sms_general_ibfk_1` FOREIGN KEY (`login`) REFERENCES `users` (`login`);

--
-- Ограничения внешнего ключа таблицы `sms_private`
--
ALTER TABLE `sms_private`
  ADD CONSTRAINT `sms_private_ibfk_1` FOREIGN KEY (`login_sender`) REFERENCES `users` (`login`),
  ADD CONSTRAINT `sms_private_ibfk_2` FOREIGN KEY (`login_recipient`) REFERENCES `users` (`login`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_4` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
