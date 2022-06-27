-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 26 2022 г., 18:01
-- Версия сервера: 10.4.24-MariaDB
-- Версия PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `fdsdb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `fds_ctlog`
--

CREATE TABLE `fds_ctlog` (
  `ctlog_id` int(11) NOT NULL,
  `ctlog_usrdt_id` int(11) DEFAULT NULL,
  `ctlog_nme` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ctlog_prc` double DEFAULT NULL,
  `ctlog_desc` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ctlog_shp` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ctlog_img` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ctlog_log` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `fds_ctlog`
--

INSERT INTO `fds_ctlog` (`ctlog_id`, `ctlog_usrdt_id`, `ctlog_nme`, `ctlog_prc`, `ctlog_desc`, `ctlog_shp`, `ctlog_img`, `ctlog_log`) VALUES
(9, 21, 'Червона капуста', 20, 'Фарби для борща', 'Копійочка', 'borsch.jpg', '2022/06/24 18:40pm'),
(10, 21, 'Burger', 50, 'Бургер з котлетою та сиром', 'Копійочка', 'menu-burger.jpg', '2022/06/26 18:22pm');

-- --------------------------------------------------------

--
-- Структура таблицы `fds_inv`
--

CREATE TABLE `fds_inv` (
  `inv_id` int(11) NOT NULL,
  `inv_ordr_id` int(11) DEFAULT NULL,
  `inv_pay_stat` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `inv_amt` double DEFAULT NULL,
  `inv_type` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `inv_dte` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `fds_inv`
--

INSERT INTO `fds_inv` (`inv_id`, `inv_ordr_id`, `inv_pay_stat`, `inv_amt`, `inv_type`, `inv_dte`) VALUES
(17, 13, 'none', 20, 'cash', '2022/06/25 00:29am'),
(18, 14, 'none', 150, 'cash', '2022/06/26 18:23pm'),
(19, 15, 'none', 40, 'cash', '2022/06/26 19:36pm');

-- --------------------------------------------------------

--
-- Структура таблицы `fds_ordr`
--

CREATE TABLE `fds_ordr` (
  `ordr_id` int(11) NOT NULL,
  `ordr_usrdt_id` int(11) DEFAULT NULL,
  `ordr_ctlog_id` int(11) DEFAULT NULL,
  `ordr_qty` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ordr_dte` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ordr_stat` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `fds_ordr`
--

INSERT INTO `fds_ordr` (`ordr_id`, `ordr_usrdt_id`, `ordr_ctlog_id`, `ordr_qty`, `ordr_dte`, `ordr_stat`) VALUES
(13, 22, 9, '1', '2022/06/25 00:29am', 'Completed'),
(14, 22, 10, '3', '2022/06/26 18:23pm', 'Completed'),
(15, 23, 9, '2', '2022/06/26 19:36pm', 'Preparing');

-- --------------------------------------------------------

--
-- Структура таблицы `fds_usrdt`
--

CREATE TABLE `fds_usrdt` (
  `usrdt_id` int(11) NOT NULL,
  `usrdt_nme` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usrdt_usr` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usrdt_pwd` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usrdt_adrs` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usrdt_stat` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usrdt_log` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `fds_usrdt`
--

INSERT INTO `fds_usrdt` (`usrdt_id`, `usrdt_nme`, `usrdt_usr`, `usrdt_pwd`, `usrdt_adrs`, `usrdt_stat`, `usrdt_log`) VALUES
(15, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin', '2020/12/26 22:33pm'),
(21, 'Копійочка', 'kopiyka228', '197c6eb876ba99a40f0630240c54b88f', 'KK3 CAFE', 'shop', '2022/06/24 18:23pm'),
(22, ' Гандабура Михайло', 'handabura', 'a3852fc07e57ba88b54e1e3a329b6793', 'Бажанського, 93', 'user', '2022/06/24 18:50pm'),
(23, 'васян', 'vasyan', '3c50b565cba709f8f4be693d7a3872b0', 'vasyan 6', 'user', '2022/06/26 19:30pm');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `fds_ctlog`
--
ALTER TABLE `fds_ctlog`
  ADD PRIMARY KEY (`ctlog_id`),
  ADD KEY `ctlog_usrdt_id` (`ctlog_usrdt_id`);

--
-- Индексы таблицы `fds_inv`
--
ALTER TABLE `fds_inv`
  ADD PRIMARY KEY (`inv_id`),
  ADD KEY `inv_ordr_id` (`inv_ordr_id`);

--
-- Индексы таблицы `fds_ordr`
--
ALTER TABLE `fds_ordr`
  ADD PRIMARY KEY (`ordr_id`),
  ADD KEY `ordr_usrdt_id` (`ordr_usrdt_id`),
  ADD KEY `ordr_ctlog_id` (`ordr_ctlog_id`);

--
-- Индексы таблицы `fds_usrdt`
--
ALTER TABLE `fds_usrdt`
  ADD PRIMARY KEY (`usrdt_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `fds_ctlog`
--
ALTER TABLE `fds_ctlog`
  MODIFY `ctlog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `fds_inv`
--
ALTER TABLE `fds_inv`
  MODIFY `inv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `fds_ordr`
--
ALTER TABLE `fds_ordr`
  MODIFY `ordr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `fds_usrdt`
--
ALTER TABLE `fds_usrdt`
  MODIFY `usrdt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `fds_ctlog`
--
ALTER TABLE `fds_ctlog`
  ADD CONSTRAINT `fds_ctlog_ibfk_1` FOREIGN KEY (`ctlog_usrdt_id`) REFERENCES `fds_usrdt` (`usrdt_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `fds_inv`
--
ALTER TABLE `fds_inv`
  ADD CONSTRAINT `fds_inv_ibfk_1` FOREIGN KEY (`inv_ordr_id`) REFERENCES `fds_ordr` (`ordr_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `fds_ordr`
--
ALTER TABLE `fds_ordr`
  ADD CONSTRAINT `fds_ordr_ibfk_1` FOREIGN KEY (`ordr_ctlog_id`) REFERENCES `fds_ctlog` (`ctlog_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fds_ordr_ibfk_2` FOREIGN KEY (`ordr_usrdt_id`) REFERENCES `fds_usrdt` (`usrdt_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
