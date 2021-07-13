-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 10.0.0.57
-- Время создания: Дек 08 2019 г., 18:58
-- Версия сервера: 5.7.26-29
-- Версия PHP: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `f0361966_moon`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(130) NOT NULL,
  `password` varchar(130) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'MrLaco', '123456');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Кейс');

-- --------------------------------------------------------

--
-- Структура таблицы `last_buys`
--

CREATE TABLE `last_buys` (
  `id` int(11) NOT NULL,
  `name` varchar(130) NOT NULL,
  `tovarname` varchar(200) NOT NULL,
  `tovar` varchar(130) NOT NULL,
  `price` int(11) NOT NULL,
  `server` varchar(130) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category` varchar(200) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `last_buys`
--

INSERT INTO `last_buys` (`id`, `name`, `tovarname`, `tovar`, `price`, `server`, `date`, `category`, `status`) VALUES
(1, 'MadaraOnTinder', 'Premium', 'premium', 100, 'first', '2019-09-20 15:53:24', 'Кейс', 0),
(2, 'GrieferGhost', 'Premium', 'premium', 100, 'first', '2019-09-20 15:53:37', 'Кейс', 1),
(3, '_SpiderMan', 'Premium', 'premium', 100, 'first', '2019-09-20 15:53:24', 'Кейс', 0),
(4, 'Ivs', 'Premium', 'premium', 100, 'first', '2019-09-20 15:53:37', 'Кейс', 1),
(5, 'Proba', 'Premium', 'premium', 100, 'first', '2019-09-20 15:53:37', 'Кейс', 1),
(6, 'MrLaco_', 'Premium', 'premium', 100, 'first', '2019-09-20 15:53:37', 'Кейс', 1),
(7, 'FonadarLegend', 'Premium', 'premium', 100, 'first', '2019-09-20 15:53:37', 'Кейс', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `otziv`
--

CREATE TABLE `otziv` (
  `id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stars` int(11) NOT NULL,
  `text` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `otziv`
--

INSERT INTO `otziv` (`id`, `name`, `stars`, `text`) VALUES
(2, 'Mike_Turner', 5, 'Это я Майк )'),
(3, 'SmallChicken', 3, 'Люблю этот сервер! Админушка - добрейший человек, подарил мне клёвый шмот и 10 стаков алмазов. Теперь я счастливый!'),
(4, 'MrLaco_', 5, 'Замечательный сервер! На днях приобрёл админку, по уши доволен! Теперь могу банить кого угодно :DDDDDDDDDD');

-- --------------------------------------------------------

--
-- Структура таблицы `promo`
--

CREATE TABLE `promo` (
  `id` int(11) NOT NULL,
  `name` varchar(130) NOT NULL,
  `percent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `promo`
--

INSERT INTO `promo` (`id`, `name`, `percent`) VALUES
(2, 'Mike', 10);

-- --------------------------------------------------------

--
-- Структура таблицы `servers`
--

CREATE TABLE `servers` (
  `id` int(11) NOT NULL,
  `name` varchar(130) NOT NULL,
  `code` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `servers`
--

INSERT INTO `servers` (`id`, `name`, `code`) VALUES
(1, 'Survival', 'surv'),
(2, 'MiniGames', 'mg'),
(3, 'Hardcore', 'hardcore');

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `ServerName` varchar(130) NOT NULL,
  `Notify` varchar(300) NOT NULL,
  `Discount` int(11) NOT NULL,
  `VkGroup` varchar(200) NOT NULL,
  `Youtube` varchar(300) NOT NULL,
  `MerchantID` varchar(200) NOT NULL,
  `SecretWord` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`id`, `ServerName`, `Notify`, `Discount`, `VkGroup`, `Youtube`, `MerchantID`, `SecretWord`) VALUES
(1, 'MoncyCraft', 'Внимание! Сейчас действуют скидки 50% на весь донат!', 50, 'https://vk.com/moonstudio_mc', 'https://www.youtube.com/', '33333', 'moonmoonmoon');

-- --------------------------------------------------------

--
-- Структура таблицы `tovari`
--

CREATE TABLE `tovari` (
  `id` int(11) NOT NULL,
  `name` varchar(130) NOT NULL,
  `price` int(11) NOT NULL,
  `category` varchar(200) NOT NULL,
  `code` varchar(200) NOT NULL,
  `server` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tovari`
--

INSERT INTO `tovari` (`id`, `name`, `price`, `category`, `code`, `server`) VALUES
(1, 'Cars', 100, 'Кейс', 'cars', 'Survival'),
(2, 'SuperCars', 1000, 'Кейс', 'supercars', 'MiniGames'),
(3, 'Machines', 1000, 'Кейс', 'machines', 'HardCore');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `last_buys`
--
ALTER TABLE `last_buys`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `otziv`
--
ALTER TABLE `otziv`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `servers`
--
ALTER TABLE `servers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tovari`
--
ALTER TABLE `tovari`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `last_buys`
--
ALTER TABLE `last_buys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `otziv`
--
ALTER TABLE `otziv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `promo`
--
ALTER TABLE `promo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `servers`
--
ALTER TABLE `servers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `tovari`
--
ALTER TABLE `tovari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
