-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 20 2019 г., 20:09
-- Версия сервера: 5.6.37
-- Версия PHP: 7.0.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `php_yii`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `parent` int(11) NOT NULL,
  `sort` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `parent`, `sort`) VALUES
(6, 'Пицца', 0, 0),
(7, 'Напитки', 0, 4),
(8, 'Закуски', 0, 2),
(9, 'Соусы', 0, 3),
(10, 'Десерты', 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `dough`
--

CREATE TABLE `dough` (
  `dough` varchar(50) NOT NULL,
  `k` varchar(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `dough`
--

INSERT INTO `dough` (`dough`, `k`) VALUES
('Тонкое', '1'),
('Традиционное', '1.3');

-- --------------------------------------------------------

--
-- Структура таблицы `doughlink`
--

CREATE TABLE `doughlink` (
  `id` int(11) NOT NULL,
  `pizza_id` int(11) NOT NULL,
  `dough` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `doughlink`
--

INSERT INTO `doughlink` (`id`, `pizza_id`, `dough`) VALUES
(4, 4, 'Тонкое'),
(5, 5, 'Тонкое'),
(7, 7, 'Тонкое'),
(8, 8, 'Тонкое'),
(9, 9, 'Тонкое'),
(34, 1, 'Тонкое'),
(35, 1, 'Традиционное'),
(39, 6, 'Тонкое'),
(40, 2, 'Тонкое'),
(41, 3, 'Тонкое');

-- --------------------------------------------------------

--
-- Структура таблицы `ingredient`
--

CREATE TABLE `ingredient` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `weight` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ingredient`
--

INSERT INTO `ingredient` (`id`, `name`, `weight`, `price`) VALUES
(1, 'Грудинка', 50, NULL),
(2, 'Сыр', 50, NULL),
(3, 'Помидор', 50, NULL),
(4, 'Говядина', 50, NULL),
(5, 'Шампиньоны', 50, NULL),
(6, 'Опята', 50, NULL),
(7, 'Маслины', 50, NULL),
(8, 'Базилик', 50, NULL),
(9, 'Перец', 50, NULL),
(10, 'Огурец', 50, NULL),
(11, 'Лук', 50, NULL),
(12, 'Баклажан', 50, NULL),
(13, 'Ананас', 50, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `checked` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `message`, `checked`) VALUES
(1, 16, 'Статус заказа #28 изменился на \'Не готов 3\'', 0),
(2, 13, 'Статус заказа #24 изменился на \'Готов\'', 1),
(3, 13, 'Статус заказа #17 изменился на \'Уже остыл\'', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `head` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `head`, `content`, `date`) VALUES
(1, 'Скидки 25%', 'Скидки 25% если вы уточка', '2019-05-08'),
(2, 'Пицца в подарок', '2 пицца в подарок, при заказе от 50руб.', '2019-05-14');

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `price` float DEFAULT NULL,
  `time` datetime NOT NULL,
  `phone` text NOT NULL,
  `adr` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`id`, `user_id`, `price`, `time`, `phone`, `adr`, `status`) VALUES
(17, 13, 55, '2019-05-12 14:55:02', '+375-25 753-51-51', 'сюда', 'Уже остыл'),
(18, 13, 115, '2019-05-13 00:11:45', '+375-25 753-51-51', '3', 'Не готов'),
(19, 16, 190, '2019-05-13 08:09:59', '3', '3', 'Не готов'),
(20, 35, 15, '2019-05-13 08:10:33', '1', '1', 'Не готов'),
(21, 13, 11.1, '2019-05-13 15:44:59', '+375-25 753-51-51', '6', 'Не готов'),
(22, 13, 15, '2019-05-13 15:50:48', '+375-25 753-51-51', '99', 'Не готов'),
(24, 13, 168.75, '2019-05-13 15:55:36', '+375-25 753-51-51', 'df', 'Готов'),
(25, 16, 15, '2019-05-13 16:59:06', 'asd', 'asd', 'Не готов'),
(26, 16, 15, '2019-05-13 17:00:36', 'asd', 'asd', 'Не готов'),
(27, 16, 15, '2019-05-13 17:02:06', 'fsd', 'sdf', 'Не готов'),
(28, 16, 107.25, '2019-05-14 10:54:33', '111', '4', 'Не готов 3'),
(29, 13, 25, '2019-05-19 15:27:56', '+375-25 753-51-51', '3', 'Не готов'),
(30, 13, 39, '2019-05-19 18:05:04', '+375-25 753-51-51', '3', 'Не готов'),
(31, 13, 280, '2019-05-20 08:24:46', '+375-25 753-51-51', 'Адрес дома моего', 'Не готов'),
(32, 16, 16.5, '2019-05-20 08:28:26', '253', '53', 'Не готов'),
(33, 36, 15, '2019-05-20 08:31:20', 'saasd', 'asd', 'Не готов'),
(34, 16, 15, '2019-05-20 08:31:35', '123', '123', 'Не готов'),
(35, 37, 15, '2019-05-20 08:33:24', 'wd', 'asd', 'Не готов'),
(36, 16, 15, '2019-05-20 08:34:06', ',./', ',./', 'Не готов');

-- --------------------------------------------------------

--
-- Структура таблицы `orderitems`
--

CREATE TABLE `orderitems` (
  `id` int(11) NOT NULL,
  `pizza_id` int(11) NOT NULL,
  `dough` varchar(50) DEFAULT NULL,
  `size` varchar(50) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orderitems`
--

INSERT INTO `orderitems` (`id`, `pizza_id`, `dough`, `size`, `quantity`, `order_id`) VALUES
(15, 9, 'Тонкое', '25', 1, 17),
(16, 1, 'Тонкое', '35', 1, 17),
(17, 15, NULL, NULL, 1, 17),
(18, 17, NULL, NULL, 1, 18),
(19, 2, 'Тонкое', '25', 4, 18),
(21, 1, NULL, NULL, 2, 19),
(22, 6, NULL, NULL, 4, 19),
(23, 11, NULL, NULL, 4, 19),
(24, 3, NULL, NULL, 1, 20),
(25, 2, 'Тонкое', '25', 5, 21),
(26, 1, 'Традиционное', '35', 2, 21),
(27, 1, 'Традиционное', '25', 2, 21),
(28, 1, 'Тонкое', '25', 1, 22),
(29, 1, 'Тонкое', '35', 1, 24),
(30, 1, 'Традиционное', '35', 5, 24),
(31, 2, 'Тонкое', '25', 3, 24),
(32, 2, 'Тонкое', '25', 1, 25),
(33, 2, 'Тонкое', '25', 1, 26),
(34, 3, 'Тонкое', '25', 1, 27),
(35, 1, 'Традиционное', '35', 5, 28),
(36, 13, NULL, NULL, 1, 29),
(37, 1, 'Традиционное', '60', 1, 30),
(38, 12, NULL, NULL, 3, 31),
(39, 1, 'Традиционное', '60', 5, 31),
(40, 18, NULL, NULL, 1, 31),
(41, 1, 'Тонкое', '35', 1, 32),
(42, 3, 'Тонкое', '25', 1, 33),
(43, 3, 'Тонкое', '25', 1, 34),
(44, 2, 'Тонкое', '25', 1, 35),
(45, 4, 'Тонкое', '25', 1, 36);

-- --------------------------------------------------------

--
-- Структура таблицы `pizza`
--

CREATE TABLE `pizza` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `image` text NOT NULL,
  `composition` enum('0','1') DEFAULT '0',
  `additional` enum('0','1') DEFAULT '0',
  `new` enum('0','1') DEFAULT '0',
  `sale` enum('0','1') DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pizza`
--

INSERT INTO `pizza` (`id`, `name`, `type_id`, `category_id`, `weight`, `price`, `image`, `composition`, `additional`, `new`, `sale`) VALUES
(1, 'Цыпленок песто ', 2, 6, 500, 15, 'Upload_5ce1708ebe9965.68060995.png', '1', '1', '0', '0'),
(2, 'Опята и курица', 3, 6, 500, 15, 'Upload_5ce1a650d871f1.93447976.png', '1', '1', '0', '0'),
(3, 'Цыпленок песто ', 3, 6, 500, 15, 'Upload_5ce1a654aeea09.16629276.png', '1', '1', '0', '0'),
(4, 'Грибная', 5, 6, 500, 15, 'ovownaya.png', '1', '1', '1', '0'),
(5, 'Гавайская ', 2, 6, 500, 15, 'ovownaya.png', '1', '1', '0', '0'),
(6, 'Цыпленок песто ', 4, 6, 500, 15, 'Upload_5ce1a644b356c0.29864462.png', '1', '1', '0', '0'),
(7, 'Ранч пицца', 2, 6, 500, 15, 'ovownaya.png', '1', '1', '0', '0'),
(8, 'Цыпленок песто ', 5, 6, 500, 15, 'ovownaya.png', '1', '1', '1', '0'),
(9, 'Цыпленок барбекю ', 2, 6, 500, 15, 'ovownaya.png', '1', '1', '0', '0'),
(10, 'Рулетики с брусникой', 1, 10, 300, 25, 'des1.jpg', '0', '0', '0', '0'),
(11, 'Шоколадный маффин', 1, 10, 300, 25, 'des2.jpg', '0', '0', '0', '0'),
(12, 'Чизкейк Нью-Йорк', 1, 10, 300, 25, 'des3.jpg', '0', '0', '0', '0'),
(13, 'Фонданы', 1, 10, 300, 25, 'des4.jpg', '0', '0', '0', '0'),
(14, 'Картошка', 1, 8, 250, 25, 'potato.png', '0', '0', '0', '0'),
(15, 'Картошка', 1, 8, 250, 25, 'potato.png', '0', '0', '0', '0'),
(16, 'Картошка', 1, 8, 205, 25, 'potato.png', '0', '0', '0', '0'),
(17, 'Картошка', 1, 8, 250, 25, 'potato.png', '0', '0', '0', '0'),
(18, 'Соус сырный', 1, 9, 50, 10, 'souce.png', '0', '0', '0', '0'),
(19, 'Соус сырный', 1, 9, 50, 10, 'souce.png', '0', '0', '0', '0'),
(20, 'Соус сырный', 1, 9, 50, 10, 'souce.png', '0', '0', '0', '0'),
(21, 'Соус сырный', 1, 9, 50, 10, 'souce.png', '0', '0', '0', '0'),
(22, 'Coca-Cola', 1, 7, 750, 5, 'cola.png', '0', '0', '0', '0'),
(23, 'Coca-Cola', 1, 7, 750, 5, 'cola.png', '0', '0', '0', '0'),
(24, 'Coca-Cola', 1, 7, 750, 5, 'cola.png', '0', '0', '0', '0'),
(25, 'Coca-Cola', 1, 7, 750, 5, 'cola.png', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Структура таблицы `pizzalink`
--

CREATE TABLE `pizzalink` (
  `id` int(11) NOT NULL,
  `pizza_id` int(11) NOT NULL,
  `ingredient_id` int(11) NOT NULL,
  `change` enum('true','false') NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pizzalink`
--

INSERT INTO `pizzalink` (`id`, `pizza_id`, `ingredient_id`, `change`) VALUES
(16, 4, 8, 'false'),
(17, 4, 9, 'false'),
(18, 4, 1, 'false'),
(19, 5, 1, 'false'),
(20, 4, 13, 'false'),
(21, 5, 12, 'false'),
(22, 5, 8, 'false'),
(23, 5, 9, 'false'),
(25, 7, 13, 'false'),
(26, 7, 1, 'false'),
(27, 7, 12, 'false'),
(28, 7, 8, 'false'),
(29, 7, 9, 'false'),
(30, 8, 1, 'false'),
(31, 8, 7, 'false'),
(32, 8, 13, 'false'),
(33, 9, 1, 'false'),
(34, 9, 12, 'false'),
(35, 9, 8, 'false'),
(83, 1, 1, 'false'),
(84, 1, 2, 'false'),
(85, 1, 8, 'false'),
(86, 1, 12, 'false'),
(87, 1, 13, 'false'),
(98, 6, 7, 'false'),
(99, 2, 1, 'false'),
(100, 2, 8, 'false'),
(101, 2, 12, 'false'),
(102, 2, 13, 'false'),
(103, 3, 1, 'false'),
(104, 3, 7, 'false'),
(105, 3, 9, 'false'),
(106, 3, 12, 'false'),
(107, 3, 13, 'false');

-- --------------------------------------------------------

--
-- Структура таблицы `size`
--

CREATE TABLE `size` (
  `size` int(11) NOT NULL,
  `k` varchar(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `size`
--

INSERT INTO `size` (`size`, `k`) VALUES
(25, '1'),
(35, '1.1'),
(60, '2');

-- --------------------------------------------------------

--
-- Структура таблицы `sizelink`
--

CREATE TABLE `sizelink` (
  `id` int(11) NOT NULL,
  `pizza_id` int(11) NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sizelink`
--

INSERT INTO `sizelink` (`id`, `pizza_id`, `size`) VALUES
(5, 4, 25),
(6, 5, 25),
(8, 7, 25),
(9, 8, 25),
(10, 9, 25),
(38, 1, 25),
(39, 1, 35),
(40, 1, 60),
(44, 6, 25),
(45, 2, 25),
(46, 3, 25);

-- --------------------------------------------------------

--
-- Структура таблицы `tops`
--

CREATE TABLE `tops` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `pizza_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tops`
--

INSERT INTO `tops` (`id`, `image`, `pizza_id`) VALUES
(1, 'Upload_5cd884c51ce9e4.78821099.png', 1),
(10, 'Upload_5ce1b6a03138f0.06443356.png', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `type`
--

INSERT INTO `type` (`id`, `name`) VALUES
(1, '-'),
(2, 'Мясная'),
(3, 'Вегетарианская'),
(4, 'С овощами'),
(5, 'Новинка');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `auth_key` text,
  `email` varchar(50) NOT NULL,
  `role` enum('user','admin','moderator','guest') NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `adr` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `auth_key`, `email`, `role`, `name`, `phone`, `adr`) VALUES
(13, 'admin', '$2y$13$eBtazoWelMwyLAWVFcFx2uM5A6oyVufZ7tD14JcAGm7gqZOpzntwm', 'mxHaOTKGW6MIxi8eaE4y50IDXnvGaRER', 'admin@mail.ru', 'admin', 'Admin', '+375-25 753-51-51', 'Адрес дома моего'),
(16, 'anonim', '-', NULL, '-', 'guest', 'anonim', '-', NULL),
(17, 'user', '$2y$13$.rcQgdjDZ/LXxsTkPDPZoutlbY5EEJheS9hgzFqfvPY9YVszEFyGG', 'rGPxMdOmKfZsclCIBt1QPMnx8RUiGOAc', 'user@@user.ru', 'user', 'user', '', NULL),
(18, 'user2', '$2y$13$SnbnJs985TBIb8P/h6ZQw.QicSfktjVL3IBU.Km3T1uiZVcG6EPCi', NULL, '123', 'user', '', '123', NULL),
(19, 'user22', '$2y$13$mdosjy4Pxt2muYjN6dI0KOPuzbAWt22hbeJQqGkYn0iKiq37PLX26', 'D7vXE9LSZGvVM_0aclFMzu8CC3-X0BHY', '123@123.ru', 'user', '', '123', NULL),
(21, 'user1', '$2y$13$pkY3oIHr1iu70ybTDvmKfOZdbtwGO.giS15zigfy8v1SUSQPAxunu', '0DAulmvS1yZ7aGKBNvOGUoYH0y8HJaA-', 'asd@email.ru', 'user', '', 'телефон', NULL),
(33, 'user7', '$2y$13$wmRBH7WEGe7YZQJ.0vJrouZPtNmNvhK9KwyaMFGtjkrbWz83tn1B.', NULL, 'asd2@email.ru', 'user', '', 'saasd', 'asdasdasd'),
(34, '333', '$2y$13$CHjr1P4eVHnugyzWFbLJzuy25na9rMq/L2dOHadeFuvmAQuZdLoD.', 'YPnPAOO752H3JLxdMV7C24sNvsYdaZYV', 'email@aef.sdf', 'user', 'asd', 'asd', 'asd'),
(35, '3334', '$2y$13$YVIN12ME04/f39lEqzacD.9kjItWSH1UoF3VhBEnxFvS0v1p.kEn.', 'AayCAWW1rkTu6EAFUDzSTr0BMEQcgIDo', 'as12d@email.ru', 'user', '', '1', '1'),
(36, 'asd', '$2y$13$glFmAoVrX3Iw8NZaC/r6ke5Z744nBMBcxJcd9kzRmkl1Upr9Na4C6', 'RTNdrJb7D4R7onpfXmXoAwYHYYyxBaEA', 'as1d@email.ru', 'user', '', 'saasd', 'asd'),
(37, 'qwe', '$2y$13$n2U1xn3hbZvNQAtYj2ole.d/3kBE6n/XLNAfvPrLLTNMOq5I61TZu', 'CA0Ic28ZseP_v8zzLMb64rY61WlLkYMS', 'asdd@email.ru', 'user', '', 'wd', 'asd');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `dough`
--
ALTER TABLE `dough`
  ADD PRIMARY KEY (`dough`);

--
-- Индексы таблицы `doughlink`
--
ALTER TABLE `doughlink`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pizza_id` (`pizza_id`),
  ADD KEY `dough` (`dough`);

--
-- Индексы таблицы `ingredient`
--
ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pizza_id` (`pizza_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Индексы таблицы `pizza`
--
ALTER TABLE `pizza`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Индексы таблицы `pizzalink`
--
ALTER TABLE `pizzalink`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pizza_id` (`pizza_id`),
  ADD KEY `ingredient_id` (`ingredient_id`);

--
-- Индексы таблицы `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`size`);

--
-- Индексы таблицы `sizelink`
--
ALTER TABLE `sizelink`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pizza_id` (`pizza_id`),
  ADD KEY `size` (`size`);

--
-- Индексы таблицы `tops`
--
ALTER TABLE `tops`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pizza_id` (`pizza_id`);

--
-- Индексы таблицы `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `doughlink`
--
ALTER TABLE `doughlink`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT для таблицы `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT для таблицы `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT для таблицы `pizza`
--
ALTER TABLE `pizza`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT для таблицы `pizzalink`
--
ALTER TABLE `pizzalink`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT для таблицы `sizelink`
--
ALTER TABLE `sizelink`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT для таблицы `tops`
--
ALTER TABLE `tops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `doughlink`
--
ALTER TABLE `doughlink`
  ADD CONSTRAINT `doughlink_ibfk_1` FOREIGN KEY (`pizza_id`) REFERENCES `pizza` (`id`),
  ADD CONSTRAINT `doughlink_ibfk_2` FOREIGN KEY (`dough`) REFERENCES `dough` (`dough`);

--
-- Ограничения внешнего ключа таблицы `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `orderitems`
--
ALTER TABLE `orderitems`
  ADD CONSTRAINT `orderitems_ibfk_1` FOREIGN KEY (`pizza_id`) REFERENCES `pizza` (`id`),
  ADD CONSTRAINT `orderitems_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`);

--
-- Ограничения внешнего ключа таблицы `pizza`
--
ALTER TABLE `pizza`
  ADD CONSTRAINT `pizza_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`),
  ADD CONSTRAINT `pizza_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Ограничения внешнего ключа таблицы `pizzalink`
--
ALTER TABLE `pizzalink`
  ADD CONSTRAINT `pizzalink_ibfk_1` FOREIGN KEY (`pizza_id`) REFERENCES `pizza` (`id`),
  ADD CONSTRAINT `pizzalink_ibfk_2` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredient` (`id`);

--
-- Ограничения внешнего ключа таблицы `sizelink`
--
ALTER TABLE `sizelink`
  ADD CONSTRAINT `sizelink_ibfk_1` FOREIGN KEY (`pizza_id`) REFERENCES `pizza` (`id`),
  ADD CONSTRAINT `sizelink_ibfk_2` FOREIGN KEY (`size`) REFERENCES `size` (`size`);

--
-- Ограничения внешнего ключа таблицы `tops`
--
ALTER TABLE `tops`
  ADD CONSTRAINT `tops_ibfk_1` FOREIGN KEY (`pizza_id`) REFERENCES `pizza` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
