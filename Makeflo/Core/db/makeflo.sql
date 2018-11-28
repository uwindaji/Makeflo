-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mer 28 Novembre 2018 à 14:52
-- Version du serveur :  5.7.24-0ubuntu0.18.04.1
-- Version de PHP :  7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mak`
--

-- --------------------------------------------------------

--
-- Structure de la table `Abonnement`
--

CREATE TABLE `Abonnement` (
  `id_abonnement` int(11) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `description` varchar(255) NOT NULL,
  `prix` decimal(15,3) NOT NULL,
  `type` tinyint(1) DEFAULT NULL,
  `img` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Appointment`
--

CREATE TABLE `Appointment` (
  `id_appointment` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_appoint` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Contrat`
--

CREATE TABLE `Contrat` (
  `id_contrat` int(11) NOT NULL,
  `date_contrat` date NOT NULL,
  `lien` varchar(40) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Factures`
--

CREATE TABLE `Factures` (
  `id_facture` int(11) NOT NULL,
  `date_facture` date NOT NULL,
  `lien` varchar(40) NOT NULL,
  `etat` tinyint(1) DEFAULT NULL,
  `msg` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Messages`
--

CREATE TABLE `Messages` (
  `id_message` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date_message` datetime NOT NULL,
  `nature` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Pass`
--

CREATE TABLE `Pass` (
  `id_token` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Project`
--

CREATE TABLE `Project` (
  `id_project` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `deadline` date NOT NULL,
  `folder` varchar(40) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Souscrire`
--

CREATE TABLE `Souscrire` (
  `id_abonnement` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_achat` date NOT NULL,
  `date_exp` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Token`
--

CREATE TABLE `Token` (
  `id_token` int(11) NOT NULL,
  `token` varchar(40) NOT NULL,
  `date_token` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `User`
--

CREATE TABLE `User` (
  `id_user` int(11) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `tel` varchar(40) NOT NULL,
  `mail` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `folder` varchar(40) DEFAULT NULL,
  `type` varchar(40) NOT NULL,
  `etat` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Abonnement`
--
ALTER TABLE `Abonnement`
  ADD PRIMARY KEY (`id_abonnement`);

--
-- Index pour la table `Appointment`
--
ALTER TABLE `Appointment`
  ADD PRIMARY KEY (`id_appointment`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `Contrat`
--
ALTER TABLE `Contrat`
  ADD PRIMARY KEY (`id_contrat`),
  ADD KEY `Contrat_User0_FK` (`id_user`) USING BTREE;

--
-- Index pour la table `Factures`
--
ALTER TABLE `Factures`
  ADD PRIMARY KEY (`id_facture`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `Messages`
--
ALTER TABLE `Messages`
  ADD PRIMARY KEY (`id_message`),
  ADD KEY `Messages_User0_FK` (`id_user`) USING BTREE;

--
-- Index pour la table `Pass`
--
ALTER TABLE `Pass`
  ADD PRIMARY KEY (`id_token`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `Project`
--
ALTER TABLE `Project`
  ADD PRIMARY KEY (`id_project`),
  ADD KEY `Project_User0_FK` (`id_user`);

--
-- Index pour la table `Souscrire`
--
ALTER TABLE `Souscrire`
  ADD KEY `Souscrire_User1_FK` (`id_user`),
  ADD KEY `id_abonnement` (`id_abonnement`,`id_user`) USING BTREE;

--
-- Index pour la table `Token`
--
ALTER TABLE `Token`
  ADD PRIMARY KEY (`id_token`);

--
-- Index pour la table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Abonnement`
--
ALTER TABLE `Abonnement`
  MODIFY `id_abonnement` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Appointment`
--
ALTER TABLE `Appointment`
  MODIFY `id_appointment` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Contrat`
--
ALTER TABLE `Contrat`
  MODIFY `id_contrat` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Factures`
--
ALTER TABLE `Factures`
  MODIFY `id_facture` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Messages`
--
ALTER TABLE `Messages`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Project`
--
ALTER TABLE `Project`
  MODIFY `id_project` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Token`
--
ALTER TABLE `Token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `User`
--
ALTER TABLE `User`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Appointment`
--
ALTER TABLE `Appointment`
  ADD CONSTRAINT `Appointment_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `User` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `Contrat`
--
ALTER TABLE `Contrat`
  ADD CONSTRAINT `Contrat_User0_FK` FOREIGN KEY (`id_user`) REFERENCES `User` (`id_user`);

--
-- Contraintes pour la table `Factures`
--
ALTER TABLE `Factures`
  ADD CONSTRAINT `Factures_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `User` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `Messages`
--
ALTER TABLE `Messages`
  ADD CONSTRAINT `Messages_User0_FK` FOREIGN KEY (`id_user`) REFERENCES `User` (`id_user`);

--
-- Contraintes pour la table `Pass`
--
ALTER TABLE `Pass`
  ADD CONSTRAINT `Pass_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `User` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Pass_ibfk_2` FOREIGN KEY (`id_token`) REFERENCES `Token` (`id_token`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `Project`
--
ALTER TABLE `Project`
  ADD CONSTRAINT `Project_User0_FK` FOREIGN KEY (`id_user`) REFERENCES `User` (`id_user`);

--
-- Contraintes pour la table `Souscrire`
--
ALTER TABLE `Souscrire`
  ADD CONSTRAINT `Souscrire_Abonnement0_FK` FOREIGN KEY (`id_abonnement`) REFERENCES `Abonnement` (`id_abonnement`),
  ADD CONSTRAINT `Souscrire_User1_FK` FOREIGN KEY (`id_user`) REFERENCES `User` (`id_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
