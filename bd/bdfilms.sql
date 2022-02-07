-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 04 fév. 2022 à 16:19
-- Version du serveur : 10.4.19-MariaDB
-- Version de PHP : 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bdfilms`
--

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

CREATE TABLE `film` (
  `num` int(4) NOT NULL,
  `titre` varchar(50) NOT NULL DEFAULT '',
  `titrevo` varchar(50) NOT NULL DEFAULT '',
  `resume` text NOT NULL,
  `annee` char(4) NOT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `numRealisateur` int(4) NOT NULL,
  `categorie` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `film`
--

INSERT INTO `film` (`num`, `titre`, `titrevo`, `resume`, `annee`, `photo`, `numRealisateur`, `categorie`) VALUES
(1, 'Le Seigneur des anneaux : le retour du roi', 'Lord of ring', 'Tandis que les ténèbres se répandent sur la Terre du Milieu, Aragorn se révèle être l\'héritier caché des rois antiques. Quant à Frodon, toujours tenté par l Anneau, il voyage à travers les contrées ennemies, se reposant sur Sam et Gollum...', '2010', 'images/leSeigneurDesAnneaux.jpg', 3, 'Fantastique'),
(2, 'Pentagon papers', 'The post', 'Un des premiers scoops de l \'histoire du journalisme américain au début des années 1970', '2017', 'images/pentagonPapers.jpg', 5, 'Drame historique'),
(3, 'Shining', 'Shining', 'TB basé sur un roman de Stephen King', '1980', 'images/shining.jpg', 2, 'Horreur'),
(4, 'Blade runner 2049', 'Blade runner 2049', '2049, toujours à Los Angeles. Les multinationales, ont depuis longtemps mainmise sur l\'exploitation des mondes environnants, avec à leurs services des androïdes génétiquement modifiés de plus en plus efficaces et dociles...', '2017', 'images/bladeRunner.jpg', 7, 'Science fiction'),
(5, 'La Guerre des mondes', 'War of the Worlds', 'Ray Ferrier est un père divorcé vivant dans le New Jersey, en banlieue de New York.Le soir, un orage éclate et déclenche d\'étranges phénomènes. Bientôt, d\'énormes engins mécaniques surgissent de sous la terre ...', '2005', 'images/laGuerreDesMondes.jpg', 5, 'Sience fiction'),
(6, 'Le pont des espions', 'Bridge of Spies', 'En pleine guerre froide, James B. Donovan, un avocat américain, accepte de défendre Rudolf Abel , un espion soviétique installé depuis des années aux États-Unis.', '2015', 'images/lePontDesEspions.jpg', 5, 'Drame historique'),
(7, 'King Kong', 'King Kong', 'Remake explicite et fidèle du King Kong sorti en 1933', '2005', 'images/kingKong.jpg', 3, 'Fantastique'),
(8, 'Le Film Lego 2', 'The Lego Movie 2: The Second Part', 'Animation 3D', '2019', 'images/lego2.jpg', 6, 'Animation'),
(9, 'Shrek 4, il était une fin', 'Shrek Forever After', 'L\'ogre vert le plus sympathique du cinéma revient aux côtés de sa femme Fiona, de son fidèle compagnon l\'Âne et du Chat Potté un peu enrobé, dans une nouvelle aventure délirante et décalée.', '1980', 'images/shrek.jpg', 6, 'Animation'),
(10, 'Dune', 'Dune', 'Aucun', '1984', 'images/dune.jpg', 8, 'Science fiction'),
(11, 'Mulholland Drive', 'Mulholland Drive', 'Histoire d\'une aspirante actrice appelée Betty Elms fraîchement arrivée à Los Angeles, en Californie ; elle rencontre et se lie d\'amitié avec une femme amnésique, victime d\'un accident, grâce auquel elle a échappé à un meurtre.', '2001', 'images/mulhollandDrive.jpg', 8, 'Drame');

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE `note` (
  `Num_utilisateur` int(11) NOT NULL,
  `Num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `realisateur`
--

CREATE TABLE `realisateur` (
  `num` int(4) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `dateNaiss` date NOT NULL,
  `dateDeces` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `realisateur`
--

INSERT INTO `realisateur` (`num`, `nom`, `prenom`, `dateNaiss`, `dateDeces`) VALUES
(1, 'Chaplin', 'Charles', '1889-04-16', '1977-12-25'),
(2, 'Kubrick', 'Stanley', '1928-07-26', '1999-03-07'),
(3, 'Jackson', 'Peter', '1961-10-31', NULL),
(4, 'Almodovar', 'Pedro', '1951-09-25', NULL),
(5, 'Spielberg', 'Steven', '1946-12-18', NULL),
(6, 'Mitchel', 'Mike', '1970-10-18', NULL),
(7, 'Villeneuve', 'Denis', '1967-10-03', NULL),
(8, 'Lynch', 'David', '1946-01-20', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `Num_utilisateur` int(30) NOT NULL,
  `Nom_utilisateur` varchar(60) NOT NULL,
  `Prenom_utilisateur` varchar(60) NOT NULL,
  `mail_utilisateur` varchar(60) NOT NULL,
  `mot_de_passe` varchar(30) NOT NULL,
  `statut` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`num`),
  ADD KEY `numRealisateur` (`numRealisateur`);

--
-- Index pour la table `realisateur`
--
ALTER TABLE `realisateur`
  ADD PRIMARY KEY (`num`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`Num_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `film`
--
ALTER TABLE `film`
  MODIFY `num` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `realisateur`
--
ALTER TABLE `realisateur`
  MODIFY `num` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `Num_utilisateur` int(30) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `film_ibfk_1` FOREIGN KEY (`numRealisateur`) REFERENCES `realisateur` (`num`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
