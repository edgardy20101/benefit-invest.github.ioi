-- phpMyAdmin SQL Dump
-- version 4.2.12
-- http://www.phpmyadmin.net
--
-- Хост: vali.local
-- Время создания: Июл 27 2015 г., 21:51
-- Версия сервера: 5.6.19-67.0
-- Версия PHP: 5.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `a0015547_8t5a9h6m`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tb_adm`
--

CREATE TABLE IF NOT EXISTS `tb_adm` (
`id` int(11) NOT NULL,
  `login` varchar(55) NOT NULL,
  `pass` varchar(55) NOT NULL,
  `key` varchar(55) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tb_adm`
--

INSERT INTO `tb_adm` (`id`, `login`, `pass`, `key`) VALUES
(1, 'admin', 'e354912372f93a05c66e2e265c', '98HGKG&*(^^%&*uytkg');

-- --------------------------------------------------------

--
-- Структура таблицы `tb_depo`
--

CREATE TABLE IF NOT EXISTS `tb_depo` (
`id` int(11) NOT NULL,
  `insid` int(55) NOT NULL,
  `userid` int(55) NOT NULL,
  `login` varchar(55) NOT NULL,
  `summa` float NOT NULL,
  `sumpm` float NOT NULL,
  `time` int(55) NOT NULL,
  `last_time` int(55) NOT NULL,
  `percent` float NOT NULL,
  `count` int(11) NOT NULL,
  `count_full` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tb_depo`
--

INSERT INTO `tb_depo` (`id`, `insid`, `userid`, `login`, `summa`, `sumpm`, `time`, `last_time`, `percent`, `count`, `count_full`, `status`) VALUES
(15, 15, 3, 'graff', 20, 0, 1438002523, 1438088923, 30, 0, 5, 0),
(16, 16, 1, 'admin', 10, 0, 1438019786, 1438106186, 30, 0, 5, 0),
(17, 17, 1, 'admin', 15, 0, 1438019925, 1438106325, 30, 0, 5, 0),
(18, 18, 4, 'romcka87', 10, 0, 1438020279, 1438106679, 30, 0, 5, 0),
(19, 19, 1, 'admin', 15, 0, 1438020768, 1438107168, 30, 0, 5, 0),
(20, 20, 1, 'admin', 58, 1, 1438020897, 1438107297, 30, 0, 5, 3),
(21, 21, 1, 'admin', 46, 0.79, 1438021012, 1438107412, 30, 0, 5, 3),
(22, 22, 1, 'admin', 11, 0.19, 1438021142, 1438107542, 30, 0, 5, 3),
(23, 23, 1, 'admin', 11, 0.19, 1438021218, 1438107618, 30, 0, 5, 3),
(24, 24, 1, 'admin', 15, 0.26, 1438021315, 1438107715, 30, 0, 5, 3),
(25, 25, 1, 'admin', 22, 0.38, 1438021523, 1438107923, 30, 0, 5, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `tb_inserts`
--

CREATE TABLE IF NOT EXISTS `tb_inserts` (
`id` int(11) NOT NULL,
  `userid` int(55) NOT NULL,
  `login` varchar(55) NOT NULL,
  `summa` float NOT NULL,
  `time` int(11) NOT NULL,
  `codeqiwi` varchar(55) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tb_inserts`
--

INSERT INTO `tb_inserts` (`id`, `userid`, `login`, `summa`, `time`, `codeqiwi`, `status`) VALUES
(1, 1, 'admin', 100, 1437934466, '', 1),
(2, 1, 'admin', 111, 1437957197, '', 2),
(3, 1, 'admin', 110, 1437957636, '', 2),
(4, 1, 'admin', 2222, 1437958007, '', 2),
(5, 1, 'admin', 111, 1437958382, '', 2),
(6, 1, 'admin', 10, 1437958417, '', 2),
(7, 2, 'romcka8', 10, 1437958451, '', 2),
(8, 1, 'admin', 111, 1437958591, '', 2),
(9, 2, 'romcka8', 10, 1437958617, '', 2),
(10, 1, 'admin', 111, 1437958662, '', 2),
(11, 1, 'admin', 111, 1437958843, '', 2),
(12, 2, 'romcka8', 10, 1437958932, '', 2),
(13, 2, 'romcka8', 10, 1437958966, '', 2),
(14, 2, 'romcka8', 10, 1437959091, '', 2),
(15, 3, 'graff', 20, 1438002523, '999999900604079543', 1),
(16, 1, 'admin', 10, 1438019786, '', 1),
(17, 1, 'admin', 15, 1438019925, '', 1),
(18, 4, 'romcka87', 10, 1438020279, '', 1),
(19, 1, 'admin', 15, 1438020768, '', 1),
(20, 1, 'admin', 58, 1438020897, '', 2),
(21, 1, 'admin', 46, 1438021012, '', 2),
(22, 1, 'admin', 11, 1438021142, '', 2),
(23, 1, 'admin', 11, 1438021218, '', 2),
(24, 1, 'admin', 15, 1438021315, '', 2),
(25, 1, 'admin', 22, 1438021523, '', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `tb_news`
--

CREATE TABLE IF NOT EXISTS `tb_news` (
`id` int(11) NOT NULL,
  `title` varchar(55) NOT NULL,
  `text` text NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tb_news`
--

INSERT INTO `tb_news` (`id`, `title`, `text`, `date`) VALUES
(1, 'wvvv6+Dy+w==', 'PHA+MTM0NDMxPC9wPg==', '');

-- --------------------------------------------------------

--
-- Структура таблицы `tb_online`
--

CREATE TABLE IF NOT EXISTS `tb_online` (
`id` int(11) NOT NULL,
  `ip` varchar(55) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tb_online`
--

INSERT INTO `tb_online` (`id`, `ip`, `date`) VALUES
(13, '37.113.134.52', 1438022860),
(17, '188.234.183.148', 1438022520);

-- --------------------------------------------------------

--
-- Структура таблицы `tb_otziv`
--

CREATE TABLE IF NOT EXISTS `tb_otziv` (
`id` int(11) NOT NULL,
  `login` varchar(55) NOT NULL,
  `text` text NOT NULL,
  `date` text NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `tb_page`
--

CREATE TABLE IF NOT EXISTS `tb_page` (
`id` int(11) NOT NULL,
  `title` varchar(55) CHARACTER SET cp1251 NOT NULL,
  `text` text CHARACTER SET cp1251 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tb_page`
--

INSERT INTO `tb_page` (`id`, `title`, `text`) VALUES
(2, 'rules', '<p>asdfasdfasdfasdfasdfasdfasdfasdfasdfasdf</p>'),
(4, 'support', '<p>dsaf???????????????????</p>');

-- --------------------------------------------------------

--
-- Структура таблицы `tb_pays`
--

CREATE TABLE IF NOT EXISTS `tb_pays` (
`id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `login` varchar(55) NOT NULL,
  `summa` float NOT NULL,
  `time` int(11) NOT NULL,
  `purse` varchar(55) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `tb_sitecfg`
--

CREATE TABLE IF NOT EXISTS `tb_sitecfg` (
`id` int(11) NOT NULL,
  `site` varchar(55) NOT NULL,
  `dir` varchar(55) NOT NULL,
  `refperc` int(11) NOT NULL,
  `qiwiacc` varchar(20) NOT NULL,
  `qiwipass` text NOT NULL,
  `cfgPerfect` varchar(15) NOT NULL,
  `cfgPerfectkey` varchar(55) NOT NULL,
  `payeerid` int(20) NOT NULL,
  `payeerkey` varchar(55) NOT NULL,
  `paeracc` varchar(20) NOT NULL,
  `paerid` int(20) NOT NULL,
  `perapi` varchar(55) NOT NULL,
  `fgPMID` int(20) NOT NULL,
  `cfgPMpass` varchar(55) NOT NULL,
  `autoins` int(11) NOT NULL,
  `autopay` int(1) NOT NULL,
  `minpay` float NOT NULL,
  `maxpay` float NOT NULL,
  `minins` float NOT NULL,
  `maxins` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tb_sitecfg`
--

INSERT INTO `tb_sitecfg` (`id`, `site`, `dir`, `refperc`, `qiwiacc`, `qiwipass`, `cfgPerfect`, `cfgPerfectkey`, `payeerid`, `payeerkey`, `paeracc`, `paerid`, `perapi`, `fgPMID`, `cfgPMpass`, `autoins`, `autopay`, `minpay`, `maxpay`, `minins`, `maxins`) VALUES
(1, 'wealth-money.ru', 'hxFnAcqU', 10, '79087083101', '511604Sanias', 'U7764808', '15WoHreA9bxE84QpLUCmRPKii', 75381508, 'spartaque511604', 'P9560656', 75538130, 'hyoFOT9RI28tUNs4', 3283967, '511604Sanias', 1, 1, 10, 30000, 10, 15000);

-- --------------------------------------------------------

--
-- Структура таблицы `tb_stats`
--

CREATE TABLE IF NOT EXISTS `tb_stats` (
`id` int(11) NOT NULL,
  `invest` float NOT NULL,
  `pay` float NOT NULL,
  `users` int(11) NOT NULL,
  `finvest` float NOT NULL,
  `fpay` float NOT NULL,
  `fusers` int(11) NOT NULL,
  `online` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tb_stats`
--

INSERT INTO `tb_stats` (`id`, `invest`, `pay`, `users`, `finvest`, `fpay`, `fusers`, `online`) VALUES
(1, 170, 0, 4, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `tb_tickets`
--

CREATE TABLE IF NOT EXISTS `tb_tickets` (
`id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `login` varchar(55) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `date` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `tb_tickets_txt`
--

CREATE TABLE IF NOT EXISTS `tb_tickets_txt` (
`id` int(11) NOT NULL,
  `id_tick` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `login` varchar(55) NOT NULL,
  `text` text NOT NULL,
  `date` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `tb_users`
--

CREATE TABLE IF NOT EXISTS `tb_users` (
`id` int(10) NOT NULL,
  `login` varchar(55) CHARACTER SET cp1251 NOT NULL,
  `pass` varchar(55) CHARACTER SET cp1251 NOT NULL,
  `mail` varchar(55) NOT NULL,
  `date_reg` int(11) NOT NULL,
  `ip` varchar(55) NOT NULL,
  `money` double NOT NULL,
  `refid` int(11) NOT NULL,
  `refname` varchar(55) NOT NULL,
  `numrefs` int(55) NOT NULL,
  `inserts` float NOT NULL,
  `payouds` float NOT NULL,
  `qiwi` varchar(20) NOT NULL,
  `payeer` varchar(20) NOT NULL,
  `pm` varchar(20) NOT NULL,
  `huck` int(1) NOT NULL,
  `ban` int(1) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `tb_users`
--

INSERT INTO `tb_users` (`id`, `login`, `pass`, `mail`, `date_reg`, `ip`, `money`, `refid`, `refname`, `numrefs`, `inserts`, `payouds`, `qiwi`, `payeer`, `pm`, `huck`, `ban`) VALUES
(1, 'admin', '4776a369fccf0ce95adead1ff791d206', 'dedushkad@bk.ru', 1437929741, '37.113.164.141', 0, 0, '', 0, 140, 0, '79511157614', '', 'U7764808', 0, 0),
(2, 'romcka8', '43ef82572d68ff03bcc2b14c1b9bdfed', 'romcka8@rambler.ru', 1437958408, '188.232.66.232', 0, 0, '', 0, 0, 0, '79045268879', 'P2553874', 'U4793198', 0, 0),
(3, 'graff', '3d109c9f18e20b3f295cc5f236a5ed74', 'kostroma8314@mail.ru', 1438002476, '95.181.72.15', 0, 0, '', 0, 20, 0, '79515843290', '', '', 0, 0),
(4, 'romcka87', 'a4ae8cfe7009bf39b86e4494f02e55be', 'romcka1987@gmail.com', 1438020258, '188.234.183.148', 0, 0, '', 0, 10, 0, '0', '', '', 0, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `tb_adm`
--
ALTER TABLE `tb_adm`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tb_depo`
--
ALTER TABLE `tb_depo`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tb_inserts`
--
ALTER TABLE `tb_inserts`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tb_news`
--
ALTER TABLE `tb_news`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tb_online`
--
ALTER TABLE `tb_online`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tb_otziv`
--
ALTER TABLE `tb_otziv`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tb_page`
--
ALTER TABLE `tb_page`
 ADD UNIQUE KEY `id_2` (`id`), ADD KEY `id` (`id`);

--
-- Индексы таблицы `tb_pays`
--
ALTER TABLE `tb_pays`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tb_sitecfg`
--
ALTER TABLE `tb_sitecfg`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tb_stats`
--
ALTER TABLE `tb_stats`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tb_tickets`
--
ALTER TABLE `tb_tickets`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tb_tickets_txt`
--
ALTER TABLE `tb_tickets_txt`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tb_users`
--
ALTER TABLE `tb_users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `tb_adm`
--
ALTER TABLE `tb_adm`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `tb_depo`
--
ALTER TABLE `tb_depo`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT для таблицы `tb_inserts`
--
ALTER TABLE `tb_inserts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT для таблицы `tb_news`
--
ALTER TABLE `tb_news`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `tb_online`
--
ALTER TABLE `tb_online`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT для таблицы `tb_otziv`
--
ALTER TABLE `tb_otziv`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `tb_page`
--
ALTER TABLE `tb_page`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `tb_pays`
--
ALTER TABLE `tb_pays`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `tb_sitecfg`
--
ALTER TABLE `tb_sitecfg`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `tb_stats`
--
ALTER TABLE `tb_stats`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `tb_tickets`
--
ALTER TABLE `tb_tickets`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `tb_tickets_txt`
--
ALTER TABLE `tb_tickets_txt`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `tb_users`
--
ALTER TABLE `tb_users`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
