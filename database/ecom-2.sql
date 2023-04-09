-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : sam. 08 avr. 2023 à 18:07
-- Version du serveur : 5.7.39
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecom`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `libelle` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `description` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `libelle`, `description`, `date_creation`) VALUES
(37, 'jeu_societe', ' La forme d&#39un jeu de plateau avec des pions ou d&#39un jeu de cartes.', '2023-03-20 10:59:03'),
(38, 'jeu_en_bois', ' Jeux traditionnels dont certains sont de grands classiques', '2023-03-20 11:00:47'),
(39, 'lego', 'est une gamme de jouets de construction', '2023-03-20 11:01:57');

-- --------------------------------------------------------

--
-- Structure de la table `colis`
--

CREATE TABLE `colis` (
  `id` int(11) NOT NULL,
  `numero` varchar(150) NOT NULL,
  `taille` int(11) NOT NULL,
  `poids` int(11) NOT NULL,
  `adresse_livraison` varchar(250) NOT NULL,
  `date_livraison` date NOT NULL,
  `date_validation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `valide` int(11) DEFAULT '0',
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `employes`
--

CREATE TABLE `employes` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `prenom` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `contrat` varchar(10) NOT NULL DEFAULT 'non',
  `date_embauche` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `employes`
--

INSERT INTO `employes` (`id`, `nom`, `prenom`, `pseudo`, `ville`, `contrat`, `date_embauche`) VALUES
(11, 'dumont ', 'isabelle', 'dmt.is', 'cergy', 'ok', '2023-04-03 00:00:00'),
(12, 'jamard', 'louis', 'loulou890', 'Le havre', 'non', '2023-04-03 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `ligne_commande`
--

CREATE TABLE `ligne_commande` (
  `id` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  `quantite` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `libelle` varchar(100) CHARACTER SET armscii8 NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  `discount` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `id_employes` int(11) NOT NULL,
  `date_creation` datetime NOT NULL,
  `description` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `image` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `quantite` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `libelle`, `prix`, `discount`, `id_categorie`, `id_employes`, `date_creation`, `description`, `image`, `quantite`) VALUES
(22, 'UNO', '12', 0, 37, 11, '2023-03-20 00:00:00', 'Super jeu en amis ou en famille', '../data/UNO.jpg', 15),
(23, 'Monopoly', '35', 15, 37, 11, '2023-03-20 00:00:00', 'Jeu de soci&eacutet&eacute classique pour toute la famille', '../data/monopoly.jpg', 10),
(24, 'Jenga', '15', 0, 37, 12, '2023-03-21 00:00:00', 'Jeu d&#39adresse pour toute la famille', '../data/jenga.jpg', 8),
(25, 'Dobble', '10', 5, 37, 11, '2023-03-22 00:00:00', 'Jeu d&#39observation et de rapidit&eacute pour tous', '../data/dobble.jpg', 0),
(26, 'Scrabble', '25', 10, 37, 11, '2023-03-23 00:00:00', 'Jeu de lettres pour les amateurs de mots', '../data/scrabble.jpg', 4),
(27, 'Puissance 4', '20', 0, 37, 11, '2023-03-24 00:00:00', 'Jeu de strat&eacutegie pour deux joueurs', '../data/puissance-4.jpg', 18),
(28, 'LEGO Star Wars: X-wing Starfighter', '70', 12, 39, 11, '2023-03-23 00:00:00', 'Rejoignez la lutte contre l&#39Empire avec ce mod?le X-wing Starfighter de LEGO Star Wars', '../data/X-wing.jpeg', 7),
(29, 'LEGO City: Le Poste de Police', '60', 12, 39, 12, '2023-03-24 00:00:00', 'Assurez la s&eacutecurit&eacute de LEGO City avec le poste de police et ses figurines', '../data/police.jpeg', 8),
(30, 'LEGO City - La caserne de pompiers', '90', 20, 39, 11, '2023-03-23 00:00:00', 'Ensemble de construction de la caserne de pompiers LEGO City', '../data/pompier.jpeg', 9),
(31, 'LEGO Creator - Le march&eacute d hiver', '80', 10, 39, 12, '2023-03-25 00:00:00', 'Ensemble de construction du march&eacute d&#39hiver LEGO Creator', '../data/hiver.jpeg', 14),
(32, 'Jeu d&#39&eacutechecs en bois', '50', 0, 38, 11, '2023-03-26 00:00:00', 'Jeu d&#39&eacutechecs classique en bois pour tous les niveaux', '../data/echec.jpeg', 3),
(33, 'Mikado en bois', '15', 5, 38, 11, '2023-03-27 00:00:00', 'Jeu de Mikado traditionnel en bois pour toute la famille', '../data/mikado.jpeg', 7),
(34, 'Jeu de dames en bois', '25', 0, 38, 12, '2023-03-28 00:00:00', 'Jeu de dames classique en bois pour tous les niveaux', '../data/dames.jpeg', 7),
(35, 'Jeu de croquet en bois', '100', 20, 38, 11, '2023-03-29 00:00:00', 'Jeu de croquet en bois pour jouer en ext&eacuterieur', '../data/croquet.jpg', 5),
(36, 'Jeu de quilles en bois', '80', 10, 38, 12, '2023-03-30 00:00:00', 'Jeu de quilles en bois pour jouer en ext&eacuterieur', '../data/quilles.jpg', 4),
(37, 'Jeu de palets en bois', '60', 5, 38, 11, '2023-03-31 00:00:00', 'Jeu de palets en bois pour jouer en ext&eacuterieur', '../data/palais.jpeg', 3);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `abonnement` tinyint(1) NOT NULL DEFAULT '0',
  `statut` varchar(40) NOT NULL DEFAULT 'client',
  `token` text NOT NULL,
  `date_inscription` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `pseudo`, `email`, `password`, `abonnement`, `statut`, `token`, `date_inscription`) VALUES
(23, 'sarah', 'sarah@gmail.com', '$2y$12$3j/03UvQHLKgpAgJE557qu2EUyldlYALCeFe3.HYS8ui9./aNWaei', 1, 'client', 'b742d564daf840edb51be1a60818fecea4046d354e5ce951e091740f3128015d2c372761e2320a29679ed97fbce51f24475f6ddbb7d1ecebb4142c8fa5ce28d6', '2023-03-27 17:00:09'),
(26, 'sara', 'sar@gmail.com', '$2y$12$NyNXsG93VafAKj9SXE8nIOHliQC.pJDls3UazHR/OlqHXMQT0YTam', 0, 'vendeur', 'df2e9b0c9a18ddfd210e2aae1c82df4cedc963db18f761e6b2dd20ad382a9f2794a0b663f4241c288142b04e7e35ab5dedcb2add157c8c825e978d8765efd277', '2023-04-01 17:54:38'),
(22, 'le7', 'matheo@gmail.com', '$2y$12$khRsjTWFpYaFbzJ8vOFplesUec6.WdayhQMwIMG5B7O8EUCvqygzO', 0, 'admin', '2cfff788d2895a4a1e67ff2cfd5743608c5d238cff727ac868a1975052d37e2d479814e5e106080ff982d696bc8c54ced62fc6c00c8ffad3a1ffb8dc008efb64', '2023-03-27 16:59:52'),
(21, 'anissa', 'anissa@gmail.com', '$2y$12$FUyEl019velfXCidKIZywuVUb4O1/Fn79YVNinATuZ/3w3Uo8ldtK', 0, 'livreur', 'ffd834eabfe60da3ed33e1d7d51dd93791682f987790ec1884ca39247a93a701887d17585a44bf1242920045693465fdcbacb6cf7fb2cc450fa5fba206e09df8', '2023-03-27 16:59:37');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `colis`
--
ALTER TABLE `colis`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `employes`
--
ALTER TABLE `employes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT pour la table `colis`
--
ALTER TABLE `colis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `employes`
--
ALTER TABLE `employes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
