-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Ven 26 Octobre 2018 à 17:06
-- Version du serveur :  5.7.24-0ubuntu0.18.04.1
-- Version de PHP :  7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `makeflo`
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
  `img` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Change`
--

CREATE TABLE `Change` (
  `id_token` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Contrat`
--

CREATE TABLE `Contrat` (
  `id_contrat` int(11) NOT NULL,
  `date` date NOT NULL,
  `lien` varchar(40) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `File`
--

CREATE TABLE `File` (
  `id_file` int(11) NOT NULL,
  `url` varchar(20) NOT NULL,
  `id_project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Messages`
--

CREATE TABLE `Messages` (
  `id_message` int(11) NOT NULL,
  `sujet` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date_message` datetime NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Paie`
--

CREATE TABLE `Paie` (
  `id_user` int(11) NOT NULL,
  `id_paiement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Paiement`
--

CREATE TABLE `Paiement` (
  `id_paiement` int(11) NOT NULL,
  `date_paiement` date NOT NULL,
  `next` date NOT NULL,
  `id_abbonnement` int(11) NOT NULL
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
  `id_user` int(11) NOT NULL,
  `id_file` int(11) NOT NULL
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
  `date_token` date NOT NULL,
  `state` tinyint(1) DEFAULT NULL
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
  `type` varchar(40) NOT NULL
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
-- Index pour la table `Change`
--
ALTER TABLE `Change`
  ADD PRIMARY KEY (`id_token`,`id_user`),
  ADD KEY `Change_User1_FK` (`id_user`);

--
-- Index pour la table `Contrat`
--
ALTER TABLE `Contrat`
  ADD PRIMARY KEY (`id_contrat`),
  ADD KEY `Contrat_User0_FK` (`id_user`);

--
-- Index pour la table `File`
--
ALTER TABLE `File`
  ADD PRIMARY KEY (`id_file`),
  ADD KEY `File_Project0_AK` (`id_project`) USING BTREE;

--
-- Index pour la table `Messages`
--
ALTER TABLE `Messages`
  ADD PRIMARY KEY (`id_message`),
  ADD KEY `Messages_User0_FK` (`id_user`);

--
-- Index pour la table `Paie`
--
ALTER TABLE `Paie`
  ADD PRIMARY KEY (`id_user`,`id_paiement`),
  ADD KEY `Paie_Paiement1_FK` (`id_paiement`);

--
-- Index pour la table `Paiement`
--
ALTER TABLE `Paiement`
  ADD PRIMARY KEY (`id_paiement`),
  ADD KEY `Paiement_Abonnement0_FK` (`id_abbonnement`);

--
-- Index pour la table `Project`
--
ALTER TABLE `Project`
  ADD PRIMARY KEY (`id_project`),
  ADD KEY `Project_User0_FK` (`id_user`),
  ADD KEY `id_file` (`id_file`) USING BTREE;

--
-- Index pour la table `Souscrire`
--
ALTER TABLE `Souscrire`
  ADD PRIMARY KEY (`id_abonnement`,`id_user`),
  ADD KEY `Souscrire_User1_FK` (`id_user`);

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
-- AUTO_INCREMENT pour la table `Contrat`
--
ALTER TABLE `Contrat`
  MODIFY `id_contrat` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `File`
--
ALTER TABLE `File`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Messages`
--
ALTER TABLE `Messages`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Paiement`
--
ALTER TABLE `Paiement`
  MODIFY `id_paiement` int(11) NOT NULL AUTO_INCREMENT;
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
-- Contraintes pour la table `Change`
--
ALTER TABLE `Change`
  ADD CONSTRAINT `Change_Token0_FK` FOREIGN KEY (`id_token`) REFERENCES `Token` (`id_token`),
  ADD CONSTRAINT `Change_User1_FK` FOREIGN KEY (`id_user`) REFERENCES `User` (`id_user`);

--
-- Contraintes pour la table `Contrat`
--
ALTER TABLE `Contrat`
  ADD CONSTRAINT `Contrat_User0_FK` FOREIGN KEY (`id_user`) REFERENCES `User` (`id_user`);

--
-- Contraintes pour la table `File`
--
ALTER TABLE `File`
  ADD CONSTRAINT `File_Project0_FK` FOREIGN KEY (`id_project`) REFERENCES `Project` (`id_project`);

--
-- Contraintes pour la table `Messages`
--
ALTER TABLE `Messages`
  ADD CONSTRAINT `Messages_User0_FK` FOREIGN KEY (`id_user`) REFERENCES `User` (`id_user`);

--
-- Contraintes pour la table `Paie`
--
ALTER TABLE `Paie`
  ADD CONSTRAINT `Paie_Paiement1_FK` FOREIGN KEY (`id_paiement`) REFERENCES `Paiement` (`id_paiement`),
  ADD CONSTRAINT `Paie_User0_FK` FOREIGN KEY (`id_user`) REFERENCES `User` (`id_user`);

--
-- Contraintes pour la table `Paiement`
--
ALTER TABLE `Paiement`
  ADD CONSTRAINT `Paiement_Abonnement0_FK` FOREIGN KEY (`id_abbonnement`) REFERENCES `Abonnement` (`id_abonnement`);

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
