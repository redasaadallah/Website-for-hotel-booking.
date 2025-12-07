-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 29 déc. 2024 à 13:03
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestionhotels`
--

-- --------------------------------------------------------

--
-- Structure de la table `hotel`
--

CREATE TABLE `hotel` (
  `IdHotel` int(11) NOT NULL,
  `NomHotel` varchar(100) NOT NULL,
  `Ville` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `hotel`
--

INSERT INTO `hotel` (`IdHotel`, `NomHotel`, `Ville`) VALUES
(1, 'Hotel Majestic', 'Casablanca'),
(2, 'Washington Hotel', 'Casablanca'),
(3, 'ONOMO Airport Casablanca', 'Casablanca'),
(4, 'Relax Hotel Casa Voyageurs', 'Casablanca'),
(5, 'Ibis Casablanca City Center', 'Casablanca'),
(6, 'CRISTAL House ', 'Agadir'),
(7, 'Dunes dOr Ocean Club', 'Agadir'),
(8, 'Hotel Club Almoggar Garden Beach ', 'Agadir'),
(9, 'Ocean Atlantic View (Ex Bo Hotel) ', 'Agadir'),
(11, 'Ambre Epices Medina Riad ', 'Marrackech'),
(12, 'Riad Palais Calipau ', ' Marrackech '),
(13, ' Les Jardins De La Koutoubia ', ' Marrackech '),
(14, ' Riad Anya & SPA ', ' Marrackech '),
(15, ' Riad Wazani Square & SPA ', ' Marrackech '),
(21, 'Residence Hoteliere Fleurie', 'Agadir'),
(22, 'Dar Moulin Fez', 'Fes'),
(23, 'Dar Al Madina Al Kadima', 'Fes'),
(24, 'Dar Fes Flower', 'Fes'),
(25, 'Hotel Volubilis', 'Fes'),
(26, 'Prestige Luxe Appartement', 'Fès'),
(27, 'Ambre Epices Medina Riad', 'Marrackech'),
(28, 'Riad Palais Calipau', 'Marrackech'),
(29, 'Les Jardins De La Koutoubia', 'Marrackech'),
(30, 'Riad Anya et SPA', 'Marrackech'),
(31, 'Riad Wazani Square et SPA', 'Marrackech');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `codeReservation` varchar(15) NOT NULL,
  `typeChambre` varchar(20) NOT NULL,
  `Prix` varchar(15) NOT NULL,
  `CIN` varchar(15) DEFAULT NULL,
  `IdHotel` int(11) DEFAULT NULL,
  `dat` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`codeReservation`, `typeChambre`, `Prix`, `CIN`, `IdHotel`, `dat`) VALUES
('036904187588156', 'Double', '900 MAD', 'JH301645', 26, '2025-01-03'),
('102615273697415', 'Individuelle', '918 MAD', 'BB203338', 2, '2025-01-04'),
('583836046269006', 'Double', '1050 MAD', 'DF546978', 31, '2024-12-12'),
('964153729442982', 'Individuelle', '382 MAD', 'BB203338', 1, '2024-12-27');

-- --------------------------------------------------------

--
-- Structure de la table `voyageur`
--

CREATE TABLE `voyageur` (
  `CIN` varchar(15) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `Telephone` varchar(15) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `voyageur`
--

INSERT INTO `voyageur` (`CIN`, `Nom`, `Prenom`, `Telephone`, `Email`) VALUES
('BB203338', 'SAADALLAH', 'REDA', '0625700603', 'redasaadallah77@gmail.con'),
('DF546978', 'SAADALLAH', 'Ali', '0634346659', 'alisaadallah@gmail.com'),
('JH301645', 'SAADALLAH', 'HAMZA', '0664550264', 'hamzasaadallah@gmail.com');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`IdHotel`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`codeReservation`),
  ADD KEY `fk_reservation_hotel` (`IdHotel`),
  ADD KEY `fk_reservation_voyageur` (`CIN`);

--
-- Index pour la table `voyageur`
--
ALTER TABLE `voyageur`
  ADD PRIMARY KEY (`CIN`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `IdHotel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `fk_reservation_hotel` FOREIGN KEY (`IdHotel`) REFERENCES `hotel` (`IdHotel`),
  ADD CONSTRAINT `fk_reservation_voyageur` FOREIGN KEY (`CIN`) REFERENCES `voyageur` (`CIN`),
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`CIN`) REFERENCES `voyageur` (`CIN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`IdHotel`) REFERENCES `hotel` (`IdHotel`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
