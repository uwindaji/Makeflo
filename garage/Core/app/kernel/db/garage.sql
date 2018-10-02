-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Lun 01 Octobre 2018 à 10:56
-- Version du serveur :  5.7.23-0ubuntu0.18.04.1
-- Version de PHP :  7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `garage`
--

-- --------------------------------------------------------

--
-- Structure de la table `Admin`
--

CREATE TABLE `Admin` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `date_hiring` date NOT NULL,
  `date_exit` date DEFAULT NULL,
  `password` varchar(40) NOT NULL,
  `id_workplace` int(11) NOT NULL,
  `id_period` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ADMIN_CHANGE`
--

CREATE TABLE `ADMIN_CHANGE` (
  `id_password` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `APPOINTMENT`
--

CREATE TABLE `APPOINTMENT` (
  `id_appointement` int(11) NOT NULL,
  `app` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `CARS`
--

CREATE TABLE `CARS` (
  `id_car` int(11) NOT NULL,
  `model` varchar(30) NOT NULL,
  `registration_number` varchar(10) NOT NULL,
  `kilometers` varchar(6) NOT NULL,
  `id_month` int(11) NOT NULL,
  `id_year` int(11) NOT NULL,
  `id_mark` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `CUSTOMER`
--

CREATE TABLE `CUSTOMER` (
  `id_customer` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `mail` varchar(50) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `address` varchar(250) NOT NULL,
  `zip` varchar(5) NOT NULL,
  `city` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `CUST_CHANGE`
--

CREATE TABLE `CUST_CHANGE` (
  `id_customer` int(11) NOT NULL,
  `id_password` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `EXT`
--

CREATE TABLE `EXT` (
  `id_car` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `GOT`
--

CREATE TABLE `GOT` (
  `id_car` int(11) NOT NULL,
  `id_pieces` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `HAVE`
--

CREATE TABLE `HAVE` (
  `id_car` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `MARK`
--

CREATE TABLE `MARK` (
  `id_mark` int(11) NOT NULL,
  `mark` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `MEND`
--

CREATE TABLE `MEND` (
  `id_mend` int(11) NOT NULL,
  `mend` varchar(255) NOT NULL,
  `price` decimal(15,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `MENDED`
--

CREATE TABLE `MENDED` (
  `id_mend` int(11) NOT NULL,
  `id_car` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `MENDES`
--

CREATE TABLE `MENDES` (
  `id_mend` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `MONTH`
--

CREATE TABLE `MONTH` (
  `id_month` int(11) NOT NULL,
  `month` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `PASSWORD`
--

CREATE TABLE `PASSWORD` (
  `id_password` int(11) NOT NULL,
  `token` varchar(40) NOT NULL,
  `date` int(20) NOT NULL,
  `mail` varchar(70) NOT NULL,
  `state` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `PERIOD`
--

CREATE TABLE `PERIOD` (
  `id_period` int(11) NOT NULL,
  `name_period` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `PIECES`
--

CREATE TABLE `PIECES` (
  `id_pieces` int(11) NOT NULL,
  `bar_code` decimal(10,0) NOT NULL,
  `num` int(11) NOT NULL,
  `name_pieces` varchar(40) NOT NULL,
  `for_model` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `price_ht` decimal(15,3) NOT NULL,
  `date` int(20) NOT NULL,
  `id_provider` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `PROVIDER`
--

CREATE TABLE `PROVIDER` (
  `id_provider` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `tel` int(11) NOT NULL,
  `address` varchar(250) NOT NULL,
  `zip` varchar(5) NOT NULL,
  `city` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `PUTED`
--

CREATE TABLE `PUTED` (
  `id_ray` int(11) NOT NULL,
  `id_pieces` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `RAY`
--

CREATE TABLE `RAY` (
  `id_ray` int(11) NOT NULL,
  `ray` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `RECEIVE`
--

CREATE TABLE `RECEIVE` (
  `id_pieces` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `RECEPT`
--

CREATE TABLE `RECEPT` (
  `id_car` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ext` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `TAKE`
--

CREATE TABLE `TAKE` (
  `id_car` int(11) NOT NULL,
  `id_appointement` int(11) NOT NULL,
  `date` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `WORKPLACE`
--

CREATE TABLE `WORKPLACE` (
  `id_workplace` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `YEAR`
--

CREATE TABLE `YEAR` (
  `id_year` int(11) NOT NULL,
  `year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Admin_WORKPLACE_FK` (`id_workplace`),
  ADD KEY `Admin_PERIOD0_FK` (`id_period`);

--
-- Index pour la table `ADMIN_CHANGE`
--
ALTER TABLE `ADMIN_CHANGE`
  ADD KEY `ADMIN_CHANGE_Admin0_FK` (`id`),
  ADD KEY `id_password` (`id_password`,`id`) USING BTREE;

--
-- Index pour la table `APPOINTMENT`
--
ALTER TABLE `APPOINTMENT`
  ADD PRIMARY KEY (`id_appointement`);

--
-- Index pour la table `CARS`
--
ALTER TABLE `CARS`
  ADD PRIMARY KEY (`id_car`),
  ADD KEY `CARS_MONTH_FK` (`id_month`),
  ADD KEY `CARS_YEAR0_FK` (`id_year`),
  ADD KEY `CARS_MARK1_FK` (`id_mark`);

--
-- Index pour la table `CUSTOMER`
--
ALTER TABLE `CUSTOMER`
  ADD PRIMARY KEY (`id_customer`);

--
-- Index pour la table `CUST_CHANGE`
--
ALTER TABLE `CUST_CHANGE`
  ADD KEY `CUST_CHANGE_PASSWORD0_FK` (`id_password`),
  ADD KEY `id_customer` (`id_customer`,`id_password`) USING BTREE;

--
-- Index pour la table `EXT`
--
ALTER TABLE `EXT`
  ADD KEY `EXT_Admin0_FK` (`id`),
  ADD KEY `id_car` (`id_car`,`id`) USING BTREE;

--
-- Index pour la table `GOT`
--
ALTER TABLE `GOT`
  ADD KEY `GOT_PIECES0_FK` (`id_pieces`),
  ADD KEY `id_car` (`id_car`,`id_pieces`) USING BTREE;

--
-- Index pour la table `HAVE`
--
ALTER TABLE `HAVE`
  ADD KEY `HAVE_CUSTOMER0_FK` (`id_customer`),
  ADD KEY `id_car` (`id_car`,`id_customer`) USING BTREE;

--
-- Index pour la table `MARK`
--
ALTER TABLE `MARK`
  ADD PRIMARY KEY (`id_mark`);

--
-- Index pour la table `MEND`
--
ALTER TABLE `MEND`
  ADD PRIMARY KEY (`id_mend`);

--
-- Index pour la table `MENDED`
--
ALTER TABLE `MENDED`
  ADD KEY `MENDED_CARS0_FK` (`id_car`),
  ADD KEY `id_mend` (`id_mend`,`id_car`) USING BTREE;

--
-- Index pour la table `MENDES`
--
ALTER TABLE `MENDES`
  ADD KEY `MENDES_Admin0_FK` (`id`),
  ADD KEY `id_mend` (`id_mend`,`id`) USING BTREE;

--
-- Index pour la table `MONTH`
--
ALTER TABLE `MONTH`
  ADD PRIMARY KEY (`id_month`);

--
-- Index pour la table `PASSWORD`
--
ALTER TABLE `PASSWORD`
  ADD PRIMARY KEY (`id_password`);

--
-- Index pour la table `PERIOD`
--
ALTER TABLE `PERIOD`
  ADD PRIMARY KEY (`id_period`);

--
-- Index pour la table `PIECES`
--
ALTER TABLE `PIECES`
  ADD PRIMARY KEY (`id_pieces`),
  ADD KEY `PIECES_PROVIDER_FK` (`id_provider`);

--
-- Index pour la table `PROVIDER`
--
ALTER TABLE `PROVIDER`
  ADD PRIMARY KEY (`id_provider`);

--
-- Index pour la table `PUTED`
--
ALTER TABLE `PUTED`
  ADD KEY `PUTED_PIECES0_FK` (`id_pieces`),
  ADD KEY `id_ray` (`id_ray`,`id_pieces`) USING BTREE;

--
-- Index pour la table `RAY`
--
ALTER TABLE `RAY`
  ADD PRIMARY KEY (`id_ray`);

--
-- Index pour la table `RECEIVE`
--
ALTER TABLE `RECEIVE`
  ADD KEY `RECEIVE_Admin0_FK` (`id`),
  ADD KEY `id_pieces` (`id_pieces`,`id`) USING BTREE;

--
-- Index pour la table `RECEPT`
--
ALTER TABLE `RECEPT`
  ADD KEY `RECEPT_Admin0_FK` (`id`),
  ADD KEY `id_car` (`id_car`,`id`) USING BTREE;

--
-- Index pour la table `TAKE`
--
ALTER TABLE `TAKE`
  ADD KEY `TAKE_APPOINTMENT0_FK` (`id_appointement`),
  ADD KEY `id_car` (`id_car`,`id_appointement`) USING BTREE;

--
-- Index pour la table `WORKPLACE`
--
ALTER TABLE `WORKPLACE`
  ADD PRIMARY KEY (`id_workplace`);

--
-- Index pour la table `YEAR`
--
ALTER TABLE `YEAR`
  ADD PRIMARY KEY (`id_year`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Admin`
--
ALTER TABLE `Admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `APPOINTMENT`
--
ALTER TABLE `APPOINTMENT`
  MODIFY `id_appointement` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `CARS`
--
ALTER TABLE `CARS`
  MODIFY `id_car` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `CUSTOMER`
--
ALTER TABLE `CUSTOMER`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `MARK`
--
ALTER TABLE `MARK`
  MODIFY `id_mark` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `MEND`
--
ALTER TABLE `MEND`
  MODIFY `id_mend` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `MONTH`
--
ALTER TABLE `MONTH`
  MODIFY `id_month` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `PASSWORD`
--
ALTER TABLE `PASSWORD`
  MODIFY `id_password` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `PERIOD`
--
ALTER TABLE `PERIOD`
  MODIFY `id_period` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `PIECES`
--
ALTER TABLE `PIECES`
  MODIFY `id_pieces` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `PROVIDER`
--
ALTER TABLE `PROVIDER`
  MODIFY `id_provider` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `RAY`
--
ALTER TABLE `RAY`
  MODIFY `id_ray` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `WORKPLACE`
--
ALTER TABLE `WORKPLACE`
  MODIFY `id_workplace` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `YEAR`
--
ALTER TABLE `YEAR`
  MODIFY `id_year` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Admin`
--
ALTER TABLE `Admin`
  ADD CONSTRAINT `Admin_PERIOD0_FK` FOREIGN KEY (`id_period`) REFERENCES `PERIOD` (`id_period`),
  ADD CONSTRAINT `Admin_WORKPLACE_FK` FOREIGN KEY (`id_workplace`) REFERENCES `WORKPLACE` (`id_workplace`);

--
-- Contraintes pour la table `ADMIN_CHANGE`
--
ALTER TABLE `ADMIN_CHANGE`
  ADD CONSTRAINT `ADMIN_CHANGE_Admin0_FK` FOREIGN KEY (`id`) REFERENCES `Admin` (`id`),
  ADD CONSTRAINT `ADMIN_CHANGE_PASSWORD_FK` FOREIGN KEY (`id_password`) REFERENCES `PASSWORD` (`id_password`);

--
-- Contraintes pour la table `CARS`
--
ALTER TABLE `CARS`
  ADD CONSTRAINT `CARS_MARK1_FK` FOREIGN KEY (`id_mark`) REFERENCES `MARK` (`id_mark`),
  ADD CONSTRAINT `CARS_MONTH_FK` FOREIGN KEY (`id_month`) REFERENCES `MONTH` (`id_month`),
  ADD CONSTRAINT `CARS_YEAR0_FK` FOREIGN KEY (`id_year`) REFERENCES `YEAR` (`id_year`);

--
-- Contraintes pour la table `CUST_CHANGE`
--
ALTER TABLE `CUST_CHANGE`
  ADD CONSTRAINT `CUST_CHANGE_CUSTOMER_FK` FOREIGN KEY (`id_customer`) REFERENCES `CUSTOMER` (`id_customer`),
  ADD CONSTRAINT `CUST_CHANGE_PASSWORD0_FK` FOREIGN KEY (`id_password`) REFERENCES `PASSWORD` (`id_password`);

--
-- Contraintes pour la table `EXT`
--
ALTER TABLE `EXT`
  ADD CONSTRAINT `EXT_Admin0_FK` FOREIGN KEY (`id`) REFERENCES `Admin` (`id`),
  ADD CONSTRAINT `EXT_CARS_FK` FOREIGN KEY (`id_car`) REFERENCES `CARS` (`id_car`);

--
-- Contraintes pour la table `GOT`
--
ALTER TABLE `GOT`
  ADD CONSTRAINT `GOT_CARS_FK` FOREIGN KEY (`id_car`) REFERENCES `CARS` (`id_car`),
  ADD CONSTRAINT `GOT_PIECES0_FK` FOREIGN KEY (`id_pieces`) REFERENCES `PIECES` (`id_pieces`);

--
-- Contraintes pour la table `HAVE`
--
ALTER TABLE `HAVE`
  ADD CONSTRAINT `HAVE_CARS_FK` FOREIGN KEY (`id_car`) REFERENCES `CARS` (`id_car`),
  ADD CONSTRAINT `HAVE_CUSTOMER0_FK` FOREIGN KEY (`id_customer`) REFERENCES `CUSTOMER` (`id_customer`);

--
-- Contraintes pour la table `MENDED`
--
ALTER TABLE `MENDED`
  ADD CONSTRAINT `MENDED_CARS0_FK` FOREIGN KEY (`id_car`) REFERENCES `CARS` (`id_car`),
  ADD CONSTRAINT `MENDED_MEND_FK` FOREIGN KEY (`id_mend`) REFERENCES `MEND` (`id_mend`);

--
-- Contraintes pour la table `MENDES`
--
ALTER TABLE `MENDES`
  ADD CONSTRAINT `MENDES_Admin0_FK` FOREIGN KEY (`id`) REFERENCES `Admin` (`id`),
  ADD CONSTRAINT `MENDES_MEND_FK` FOREIGN KEY (`id_mend`) REFERENCES `MEND` (`id_mend`);

--
-- Contraintes pour la table `PIECES`
--
ALTER TABLE `PIECES`
  ADD CONSTRAINT `PIECES_PROVIDER_FK` FOREIGN KEY (`id_provider`) REFERENCES `PROVIDER` (`id_provider`);

--
-- Contraintes pour la table `PUTED`
--
ALTER TABLE `PUTED`
  ADD CONSTRAINT `PUTED_PIECES0_FK` FOREIGN KEY (`id_pieces`) REFERENCES `PIECES` (`id_pieces`),
  ADD CONSTRAINT `PUTED_RAY_FK` FOREIGN KEY (`id_ray`) REFERENCES `RAY` (`id_ray`);

--
-- Contraintes pour la table `RECEIVE`
--
ALTER TABLE `RECEIVE`
  ADD CONSTRAINT `RECEIVE_Admin0_FK` FOREIGN KEY (`id`) REFERENCES `Admin` (`id`),
  ADD CONSTRAINT `RECEIVE_PIECES_FK` FOREIGN KEY (`id_pieces`) REFERENCES `PIECES` (`id_pieces`);

--
-- Contraintes pour la table `RECEPT`
--
ALTER TABLE `RECEPT`
  ADD CONSTRAINT `RECEPT_Admin0_FK` FOREIGN KEY (`id`) REFERENCES `Admin` (`id`),
  ADD CONSTRAINT `RECEPT_CARS_FK` FOREIGN KEY (`id_car`) REFERENCES `CARS` (`id_car`);

--
-- Contraintes pour la table `TAKE`
--
ALTER TABLE `TAKE`
  ADD CONSTRAINT `TAKE_APPOINTMENT0_FK` FOREIGN KEY (`id_appointement`) REFERENCES `APPOINTMENT` (`id_appointement`),
  ADD CONSTRAINT `TAKE_CARS_FK` FOREIGN KEY (`id_car`) REFERENCES `CARS` (`id_car`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
