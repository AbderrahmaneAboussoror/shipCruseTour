-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 19 déc. 2022 à 22:27
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cruiseship`
--

-- --------------------------------------------------------

--
-- Structure de la table `chambre`
--

CREATE TABLE `chambre` (
  `numChambre` int(11) NOT NULL,
  `id_navire` int(11) DEFAULT NULL,
  `id_type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `client_croisiere`
--

CREATE TABLE `client_croisiere` (
  `id_croisiere` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `croisiere`
--

CREATE TABLE `croisiere` (
  `id_croisiere` int(11) NOT NULL,
  `id_navire` int(11) DEFAULT NULL,
  `prix` float DEFAULT NULL,
  `image` varchar(20) DEFAULT NULL,
  `nbrNuits` varchar(20) DEFAULT NULL,
  `portDepart` varchar(20) DEFAULT NULL,
  `itenairaire` varchar(20) DEFAULT NULL,
  `dateDepart` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `croisiere_port`
--

CREATE TABLE `croisiere_port` (
  `id_navire` int(11) NOT NULL,
  `id_port` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `navire`
--

CREATE TABLE `navire` (
  `id_navire` int(11) NOT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `nbrChambre` int(11) DEFAULT NULL,
  `nbrPlace` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `port`
--

CREATE TABLE `port` (
  `id_port` int(11) NOT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `pays` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id_reservation` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_croisiere` int(11) DEFAULT NULL,
  `dateReserv` date DEFAULT NULL,
  `prix` float DEFAULT NULL,
  `numChambre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `typechambre`
--

CREATE TABLE `typechambre` (
  `id_type` int(11) NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  `prix` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_user` int(11) NOT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `prenom` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `pw` varchar(50) DEFAULT NULL,
  `role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `chambre`
--
ALTER TABLE `chambre`
  ADD PRIMARY KEY (`numChambre`),
  ADD KEY `id_navire` (`id_navire`),
  ADD KEY `id_type` (`id_type`);

--
-- Index pour la table `client_croisiere`
--
ALTER TABLE `client_croisiere`
  ADD PRIMARY KEY (`id_croisiere`,`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `croisiere`
--
ALTER TABLE `croisiere`
  ADD PRIMARY KEY (`id_croisiere`),
  ADD KEY `id_navire` (`id_navire`);

--
-- Index pour la table `croisiere_port`
--
ALTER TABLE `croisiere_port`
  ADD PRIMARY KEY (`id_navire`,`id_port`),
  ADD KEY `id_port` (`id_port`);

--
-- Index pour la table `navire`
--
ALTER TABLE `navire`
  ADD PRIMARY KEY (`id_navire`);

--
-- Index pour la table `port`
--
ALTER TABLE `port`
  ADD PRIMARY KEY (`id_port`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_reservation`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_croisiere` (`id_croisiere`),
  ADD KEY `numChambre` (`numChambre`);

--
-- Index pour la table `typechambre`
--
ALTER TABLE `typechambre`
  ADD PRIMARY KEY (`id_type`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `croisiere`
--
ALTER TABLE `croisiere`
  MODIFY `id_croisiere` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `navire`
--
ALTER TABLE `navire`
  MODIFY `id_navire` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `port`
--
ALTER TABLE `port`
  MODIFY `id_port` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `typechambre`
--
ALTER TABLE `typechambre`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `chambre`
--
ALTER TABLE `chambre`
  ADD CONSTRAINT `chambre_ibfk_1` FOREIGN KEY (`id_navire`) REFERENCES `navire` (`id_navire`),
  ADD CONSTRAINT `chambre_ibfk_2` FOREIGN KEY (`id_type`) REFERENCES `typechambre` (`id_type`);

--
-- Contraintes pour la table `client_croisiere`
--
ALTER TABLE `client_croisiere`
  ADD CONSTRAINT `client_croisiere_ibfk_1` FOREIGN KEY (`id_croisiere`) REFERENCES `croisiere` (`id_croisiere`),
  ADD CONSTRAINT `client_croisiere_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `utilisateur` (`id_user`);

--
-- Contraintes pour la table `croisiere`
--
ALTER TABLE `croisiere`
  ADD CONSTRAINT `croisiere_ibfk_1` FOREIGN KEY (`id_navire`) REFERENCES `navire` (`id_navire`);

--
-- Contraintes pour la table `croisiere_port`
--
ALTER TABLE `croisiere_port`
  ADD CONSTRAINT `croisiere_port_ibfk_1` FOREIGN KEY (`id_navire`) REFERENCES `navire` (`id_navire`),
  ADD CONSTRAINT `croisiere_port_ibfk_2` FOREIGN KEY (`id_port`) REFERENCES `port` (`id_port`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `utilisateur` (`id_user`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`id_croisiere`) REFERENCES `croisiere` (`id_croisiere`),
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`numChambre`) REFERENCES `chambre` (`numChambre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
