-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 31 2019 г., 19:41
-- Версия сервера: 5.5.62
-- Версия PHP: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `inventarisation`
--

-- --------------------------------------------------------

--
-- Структура таблицы `acceptmaterial`
--

CREATE TABLE `acceptmaterial` (
  `idaccept` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `employee` int(11) NOT NULL,
  `material` int(11) NOT NULL,
  `vendor` int(11) NOT NULL,
  `transporter` int(11) NOT NULL,
  `cost` float DEFAULT NULL,
  `count` float DEFAULT NULL,
  `units` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `employee`
--

CREATE TABLE `employee` (
  `idemployee` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `inventarisation`
--

CREATE TABLE `inventarisation` (
  `idinventarisation` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `material` int(11) NOT NULL,
  `count` float DEFAULT NULL,
  `units` varchar(15) DEFAULT NULL,
  `employee` int(11) NOT NULL,
  `actnumber` varchar(20) DEFAULT NULL,
  `protocolnumber` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `material`
--

CREATE TABLE `material` (
  `idmaterial` int(11) NOT NULL,
  `invnumber` varchar(20) DEFAULT NULL,
  `name` varchar(85) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `materialcategory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `materialcategory`
--

CREATE TABLE `materialcategory` (
  `idmaterialcategory` int(11) NOT NULL,
  `categoryname` varchar(45) DEFAULT NULL,
  `description` varchar(145) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `materialstorage`
--

CREATE TABLE `materialstorage` (
  `idfoodstorage` int(11) NOT NULL,
  `racknumber` int(11) DEFAULT NULL,
  `storehouse` int(11) NOT NULL,
  `material` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `storehouse`
--

CREATE TABLE `storehouse` (
  `idstorehouse` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `adress` varchar(150) DEFAULT NULL,
  `employee_idemployee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `transporter`
--

CREATE TABLE `transporter` (
  `idtransporter` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `adress` varchar(150) DEFAULT NULL,
  `phone` varchar(15) NOT NULL,
  `info` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `vendor`
--

CREATE TABLE `vendor` (
  `idvendor` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `adress` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `info` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `acceptmaterial`
--
ALTER TABLE `acceptmaterial`
  ADD PRIMARY KEY (`idaccept`),
  ADD KEY `fk_acceptanceofgoods_employee1_idx` (`employee`),
  ADD KEY `fk_acceptmaterial_material1_idx` (`material`),
  ADD KEY `fk_acceptmaterial_vendor1_idx` (`vendor`),
  ADD KEY `fk_acceptmaterial_transporter1_idx` (`transporter`);

--
-- Индексы таблицы `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`idemployee`);

--
-- Индексы таблицы `inventarisation`
--
ALTER TABLE `inventarisation`
  ADD PRIMARY KEY (`idinventarisation`),
  ADD KEY `fk_inventarisation_material1_idx` (`material`),
  ADD KEY `fk_inventarisation_employee1_idx` (`employee`);

--
-- Индексы таблицы `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`idmaterial`),
  ADD KEY `fk_material_materialcategory1_idx` (`materialcategory`);

--
-- Индексы таблицы `materialcategory`
--
ALTER TABLE `materialcategory`
  ADD PRIMARY KEY (`idmaterialcategory`);

--
-- Индексы таблицы `materialstorage`
--
ALTER TABLE `materialstorage`
  ADD PRIMARY KEY (`idfoodstorage`),
  ADD KEY `fk_foodstorage_storehouse1_idx` (`storehouse`),
  ADD KEY `fk_materialstorage_material1_idx` (`material`);

--
-- Индексы таблицы `storehouse`
--
ALTER TABLE `storehouse`
  ADD PRIMARY KEY (`idstorehouse`),
  ADD KEY `fk_storehouse_employee1_idx` (`employee_idemployee`);

--
-- Индексы таблицы `transporter`
--
ALTER TABLE `transporter`
  ADD PRIMARY KEY (`idtransporter`);

--
-- Индексы таблицы `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`idvendor`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `acceptmaterial`
--
ALTER TABLE `acceptmaterial`
  MODIFY `idaccept` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `employee`
--
ALTER TABLE `employee`
  MODIFY `idemployee` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `inventarisation`
--
ALTER TABLE `inventarisation`
  MODIFY `idinventarisation` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `material`
--
ALTER TABLE `material`
  MODIFY `idmaterial` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `materialcategory`
--
ALTER TABLE `materialcategory`
  MODIFY `idmaterialcategory` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `materialstorage`
--
ALTER TABLE `materialstorage`
  MODIFY `idfoodstorage` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `storehouse`
--
ALTER TABLE `storehouse`
  MODIFY `idstorehouse` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `transporter`
--
ALTER TABLE `transporter`
  MODIFY `idtransporter` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `vendor`
--
ALTER TABLE `vendor`
  MODIFY `idvendor` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `acceptmaterial`
--
ALTER TABLE `acceptmaterial`
  ADD CONSTRAINT `fk_acceptanceofgoods_employee1` FOREIGN KEY (`employee`) REFERENCES `employee` (`idemployee`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_acceptmaterial_material1` FOREIGN KEY (`material`) REFERENCES `material` (`idmaterial`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_acceptmaterial_vendor1` FOREIGN KEY (`vendor`) REFERENCES `vendor` (`idvendor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_acceptmaterial_transporter1` FOREIGN KEY (`transporter`) REFERENCES `transporter` (`idtransporter`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `inventarisation`
--
ALTER TABLE `inventarisation`
  ADD CONSTRAINT `fk_inventarisation_material1` FOREIGN KEY (`material`) REFERENCES `material` (`idmaterial`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_inventarisation_employee1` FOREIGN KEY (`employee`) REFERENCES `employee` (`idemployee`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `material`
--
ALTER TABLE `material`
  ADD CONSTRAINT `fk_material_materialcategory1` FOREIGN KEY (`materialcategory`) REFERENCES `materialcategory` (`idmaterialcategory`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `materialstorage`
--
ALTER TABLE `materialstorage`
  ADD CONSTRAINT `fk_foodstorage_storehouse1` FOREIGN KEY (`storehouse`) REFERENCES `storehouse` (`idstorehouse`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_materialstorage_material1` FOREIGN KEY (`material`) REFERENCES `material` (`idmaterial`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `storehouse`
--
ALTER TABLE `storehouse`
  ADD CONSTRAINT `fk_storehouse_employee1` FOREIGN KEY (`employee_idemployee`) REFERENCES `employee` (`idemployee`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
