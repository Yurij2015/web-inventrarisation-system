-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Jan 02, 2020 at 07:29 AM
-- Server version: 5.7.28
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventarisation`
--

-- --------------------------------------------------------

--
-- Table structure for table `acceptmaterial`
--

CREATE TABLE `acceptmaterial`
(
    `idaccept`    int(11) NOT NULL,
    `date`        date        DEFAULT NULL,
    `employee`    int(11) NOT NULL,
    `material`    int(11) NOT NULL,
    `vendor`      int(11) NOT NULL,
    `transporter` int(11) NOT NULL,
    `cost`        float       DEFAULT NULL,
    `count`       float       DEFAULT NULL,
    `units`       varchar(15) DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Dumping data for table `acceptmaterial`
--

INSERT INTO `acceptmaterial` (`idaccept`, `date`, `employee`, `material`, `vendor`, `transporter`, `cost`, `count`,
                              `units`)
VALUES (1, '2020-01-01', 1, 1, 1, 1, 444, 5, 'Тонны');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee`
(
    `idemployee` int(11) NOT NULL,
    `name`       varchar(150) DEFAULT NULL,
    `phone`      varchar(15)  DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`idemployee`, `name`, `phone`)
VALUES (1, 'Петров Олег', '+7897008881'),
       (2, 'Иванов Иван', '+7881898988');

-- --------------------------------------------------------

--
-- Table structure for table `inventarisation`
--

CREATE TABLE `inventarisation`
(
    `idinventarisation` int(11) NOT NULL,
    `date`              date        DEFAULT NULL,
    `material`          int(11) NOT NULL,
    `count`             float       DEFAULT NULL,
    `units`             varchar(15) DEFAULT NULL,
    `employee`          int(11) NOT NULL,
    `actnumber`         varchar(20) DEFAULT NULL,
    `protocolnumber`    varchar(20) DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Dumping data for table `inventarisation`
--

INSERT INTO `inventarisation` (`idinventarisation`, `date`, `material`, `count`, `units`, `employee`, `actnumber`,
                               `protocolnumber`)
VALUES (1, '2020-01-03', 1, 7, 'Литры', 2, '2', '2');

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material`
(
    `idmaterial`       int(11) NOT NULL,
    `invnumber`        varchar(20)  DEFAULT NULL,
    `name`             varchar(85)  DEFAULT NULL,
    `description`      varchar(255) DEFAULT NULL,
    `materialcategory` int(11) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`idmaterial`, `invnumber`, `name`, `description`, `materialcategory`)
VALUES (1, '898989', 'Цемент', 'Цемент 200', 1);

-- --------------------------------------------------------

--
-- Table structure for table `materialcategory`
--

CREATE TABLE `materialcategory`
(
    `idmaterialcategory` int(11) NOT NULL,
    `categoryname`       varchar(45)  DEFAULT NULL,
    `description`        varchar(145) DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Dumping data for table `materialcategory`
--

INSERT INTO `materialcategory` (`idmaterialcategory`, `categoryname`, `description`)
VALUES (1, 'Категория 1', 'Категория 1');

-- --------------------------------------------------------

--
-- Table structure for table `materialstorage`
--

CREATE TABLE `materialstorage`
(
    `idfoodstorage` int(11) NOT NULL,
    `racknumber`    int(11) DEFAULT NULL,
    `storehouse`    int(11) NOT NULL,
    `material`      int(11) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Dumping data for table `materialstorage`
--

INSERT INTO `materialstorage` (`idfoodstorage`, `racknumber`, `storehouse`, `material`)
VALUES (1, 444, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration`
(
    `version`    varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
    `apply_time` int(11) DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`)
VALUES ('m000000_000000_base', 1577923377),
       ('m200101_234826_create_user_table', 1577923383);

-- --------------------------------------------------------

--
-- Table structure for table `storehouse`
--

CREATE TABLE `storehouse`
(
    `idstorehouse`        int(11) NOT NULL,
    `name`                varchar(45)  DEFAULT NULL,
    `adress`              varchar(150) DEFAULT NULL,
    `employee_idemployee` int(11) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Dumping data for table `storehouse`
--

INSERT INTO `storehouse` (`idstorehouse`, `name`, `adress`, `employee_idemployee`)
VALUES (1, 'storehouse1', 'Ленина, 22', 1),
       (2, 'storehouse2', 'Пушкина, 16', 2);

-- --------------------------------------------------------

--
-- Table structure for table `transporter`
--

CREATE TABLE `transporter`
(
    `idtransporter` int(11)     NOT NULL,
    `name`          varchar(45) NOT NULL,
    `adress`        varchar(150) DEFAULT NULL,
    `phone`         varchar(15) NOT NULL,
    `info`          varchar(250) DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Dumping data for table `transporter`
--

INSERT INTO `transporter` (`idtransporter`, `name`, `adress`, `phone`, `info`)
VALUES (1, 'ООО \"ТранспортСервис\"', 'г. Москва, ул. Матросова, 22', '+78758778877', 'Перевозка грузов');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user`
(
    `id`                   int(11)                                 NOT NULL,
    `username`             varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `auth_key`             varchar(32) COLLATE utf8mb4_unicode_ci  NOT NULL,
    `password_hash`        varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `password_reset_token` varchar(255) COLLATE utf8mb4_unicode_ci          DEFAULT NULL,
    `email`                varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `status`               smallint(6)                             NOT NULL DEFAULT '10',
    `created_at`           int(11)                                 NOT NULL,
    `updated_at`           int(11)                                 NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`,
                    `created_at`, `updated_at`)
VALUES (1, 'admin', 'sSylzFbLU5Nj9Rn-SlYwA38W8ZCQ_qoR', '$2y$13$tHMCnKqqddl3THkrvELNEeiBxw5DvZkQgawtI/vGsdunGYS9nYB9u',
        NULL, 'admin@wis.loc', 10, 1577925150, 1577925150);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor`
(
    `idvendor` int(11)     NOT NULL,
    `name`     varchar(45) NOT NULL,
    `adress`   varchar(100) DEFAULT NULL,
    `phone`    varchar(15)  DEFAULT NULL,
    `info`     varchar(250) DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`idvendor`, `name`, `adress`, `phone`, `info`)
VALUES (1, 'ООО \"ЕУСтройМат\"', 'г. Москва, ул. Строителей, 223', '+7876775677',
        'Производство строительных материалов');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acceptmaterial`
--
ALTER TABLE `acceptmaterial`
    ADD PRIMARY KEY (`idaccept`),
    ADD KEY `fk_acceptanceofgoods_employee1_idx` (`employee`),
    ADD KEY `fk_acceptmaterial_material1_idx` (`material`),
    ADD KEY `fk_acceptmaterial_vendor1_idx` (`vendor`),
    ADD KEY `fk_acceptmaterial_transporter1_idx` (`transporter`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
    ADD PRIMARY KEY (`idemployee`);

--
-- Indexes for table `inventarisation`
--
ALTER TABLE `inventarisation`
    ADD PRIMARY KEY (`idinventarisation`),
    ADD KEY `fk_inventarisation_material1_idx` (`material`),
    ADD KEY `fk_inventarisation_employee1_idx` (`employee`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
    ADD PRIMARY KEY (`idmaterial`),
    ADD KEY `fk_material_materialcategory1_idx` (`materialcategory`);

--
-- Indexes for table `materialcategory`
--
ALTER TABLE `materialcategory`
    ADD PRIMARY KEY (`idmaterialcategory`);

--
-- Indexes for table `materialstorage`
--
ALTER TABLE `materialstorage`
    ADD PRIMARY KEY (`idfoodstorage`),
    ADD KEY `fk_materialstorage_storehouse_idx` (`storehouse`),
    ADD KEY `fk_materialstorage_material_idx` (`material`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
    ADD PRIMARY KEY (`version`);

--
-- Indexes for table `storehouse`
--
ALTER TABLE `storehouse`
    ADD PRIMARY KEY (`idstorehouse`),
    ADD KEY `fk_storehouse_employee1_idx` (`employee_idemployee`);

--
-- Indexes for table `transporter`
--
ALTER TABLE `transporter`
    ADD PRIMARY KEY (`idtransporter`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
    ADD PRIMARY KEY (`id`),
    ADD UNIQUE KEY `username` (`username`),
    ADD UNIQUE KEY `email` (`email`),
    ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
    ADD PRIMARY KEY (`idvendor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acceptmaterial`
--
ALTER TABLE `acceptmaterial`
    MODIFY `idaccept` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 2;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
    MODIFY `idemployee` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 3;

--
-- AUTO_INCREMENT for table `inventarisation`
--
ALTER TABLE `inventarisation`
    MODIFY `idinventarisation` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 2;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
    MODIFY `idmaterial` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 2;

--
-- AUTO_INCREMENT for table `materialcategory`
--
ALTER TABLE `materialcategory`
    MODIFY `idmaterialcategory` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 2;

--
-- AUTO_INCREMENT for table `materialstorage`
--
ALTER TABLE `materialstorage`
    MODIFY `idfoodstorage` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 2;

--
-- AUTO_INCREMENT for table `storehouse`
--
ALTER TABLE `storehouse`
    MODIFY `idstorehouse` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 3;

--
-- AUTO_INCREMENT for table `transporter`
--
ALTER TABLE `transporter`
    MODIFY `idtransporter` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 2;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
    MODIFY `idvendor` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `acceptmaterial`
--
ALTER TABLE `acceptmaterial`
    ADD CONSTRAINT `fk_acceptanceofgoods_employee1` FOREIGN KEY (`employee`) REFERENCES `employee` (`idemployee`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    ADD CONSTRAINT `fk_acceptmaterial_material1` FOREIGN KEY (`material`) REFERENCES `material` (`idmaterial`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    ADD CONSTRAINT `fk_acceptmaterial_transporter1` FOREIGN KEY (`transporter`) REFERENCES `transporter` (`idtransporter`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    ADD CONSTRAINT `fk_acceptmaterial_vendor1` FOREIGN KEY (`vendor`) REFERENCES `vendor` (`idvendor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `inventarisation`
--
ALTER TABLE `inventarisation`
    ADD CONSTRAINT `fk_inventarisation_employee1` FOREIGN KEY (`employee`) REFERENCES `employee` (`idemployee`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    ADD CONSTRAINT `fk_inventarisation_material1` FOREIGN KEY (`material`) REFERENCES `material` (`idmaterial`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `material`
--
ALTER TABLE `material`
    ADD CONSTRAINT `fk_material_materialcategory1` FOREIGN KEY (`materialcategory`) REFERENCES `materialcategory` (`idmaterialcategory`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `materialstorage`
--
ALTER TABLE `materialstorage`
    ADD CONSTRAINT `fk_materialstorage_material` FOREIGN KEY (`material`) REFERENCES `material` (`idmaterial`),
    ADD CONSTRAINT `fk_materialstorage_storehouse` FOREIGN KEY (`storehouse`) REFERENCES `storehouse` (`idstorehouse`);

--
-- Constraints for table `storehouse`
--
ALTER TABLE `storehouse`
    ADD CONSTRAINT `fk_storehouse_employee1` FOREIGN KEY (`employee_idemployee`) REFERENCES `employee` (`idemployee`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
