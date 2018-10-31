-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mer 31 Octobre 2018 à 09:51
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

--
-- Contenu de la table `Abonnement`
--

INSERT INTO `Abonnement` (`id_abonnement`, `nom`, `description`, `prix`, `img`) VALUES
(1, 'lakhdar', 'retro castre model', '234.000', 1);

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
-- Structure de la table `Messages`
--

CREATE TABLE `Messages` (
  `id_message` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date_message` datetime NOT NULL,
  `nature` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Messages`
--

INSERT INTO `Messages` (`id_message`, `message`, `date_message`, `nature`, `id_user`) VALUES
(1, 'bonjour je souhaite avoir des information merci', '2018-10-30 11:48:05', 'send', 2),
(2, 'bonjour je suis user2 je vous contact pour un test', '2018-10-30 13:47:39', 'send', 3),
(5, 'kagsliujfgvlqiusdlfiuv bqlsiduhfbv', '2018-10-30 14:37:55', 'response', 3),
(6, 'bonjour', '2018-10-30 14:43:16', 'send', 3),
(7, '&ccedil;a va', '2018-10-30 14:43:36', 'send', 3),
(8, 'ok', '2018-10-30 14:44:14', 'response', 3),
(9, 'Salut loulou', '2018-10-30 17:16:27', 'send', 3);

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
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Project`
--

INSERT INTO `Project` (`id_project`, `nom`, `description`, `deadline`, `folder`, `id_user`) VALUES
(3, 'pojet name', 'retro castre model', '2018-10-31', 'FP1540812919U2', 2),
(4, 'project 2', 'second project', '2018-11-24', 'FP1540784404U2', 2);

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
  `folder` varchar(40) DEFAULT NULL,
  `type` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `User`
--

INSERT INTO `User` (`id_user`, `nom`, `prenom`, `tel`, `mail`, `password`, `folder`, `type`) VALUES
(1, 'rouibah', 'lakhdar', '0651294448', 'lakhdar-rouibah@live.fr', '5dd6fb7ff4994682742fc1f861f4fa56e43938fe', NULL, 'super admin'),
(2, 'user', 'mister', '0651294448', 'contact@user.fr', '5dd6fb7ff4994682742fc1f861f4fa56e43938fe', 'FP1540812919U2', 'user'),
(3, 'user2', 'mister', '0651294448', 'contact@user2.fr', '5dd6fb7ff4994682742fc1f861f4fa56e43938fe', NULL, 'user');

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
-- Index pour la table `Messages`
--
ALTER TABLE `Messages`
  ADD PRIMARY KEY (`id_message`),
  ADD KEY `Messages_User0_FK` (`id_user`) USING BTREE;

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
  ADD KEY `Project_User0_FK` (`id_user`);

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
  MODIFY `id_abonnement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `Contrat`
--
ALTER TABLE `Contrat`
  MODIFY `id_contrat` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Messages`
--
ALTER TABLE `Messages`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `Paiement`
--
ALTER TABLE `Paiement`
  MODIFY `id_paiement` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Project`
--
ALTER TABLE `Project`
  MODIFY `id_project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `Token`
--
ALTER TABLE `Token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `User`
--
ALTER TABLE `User`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
