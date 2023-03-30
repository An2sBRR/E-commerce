-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- G&eacuten&eacuter&eacute le : lun. 27 mars 2023 à 15:41
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
-- Base de donn&eacutees : `ecom`
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
-- D&eacutechargement des donn&eacutees de la table `categorie`
--

INSERT INTO `categorie` (`id`, `libelle`, `description`, `date_creation`) VALUES
(37, 'jeu_societe', ' la forme d\'un jeu de plateau avec des pions ou d\'un jeu de cartes.', '2023-03-20 10:59:03'),
(38, 'jeu_en_bois', ' jeux traditionnels dont certains sont de grands classiques', '2023-03-20 11:00:47'),
(39, 'lego', 'est une gamme de jouets de construction', '2023-03-20 11:01:57');

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
  `date_creation` datetime NOT NULL,
  `description` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `image` varchar(150) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- D&eacutechargement des donn&eacutees de la table `produit`
--

INSERT INTO `produit` (`id`, `libelle`, `prix`, `discount`, `id_categorie`, `date_creation`, `description`, `image`) VALUES
(22, 'UNO', '12', 10, 37, '2023-03-20 00:00:00', 'super jeu en amis ou en famille', '../data/UNO.jpg');
-- Ne pas oublier de changer les liens d'images pour les produits suivant!!!!!!!!!!!!!!!

INSERT INTO produit (id, libelle, prix, discount, id_categorie, date_creation, description, image) VALUES
(23, 'Monopoly', '35', 15, 37, '2023-03-20 00:00:00', 'Jeu de soci&eacutet&eacute classique pour toute la famille', '../data/monopoly.jpg');

INSERT INTO produit (id, libelle, prix, discount, id_categorie, date_creation, description, image) VALUES
(24, 'Jenga', '15', 0, 37, '2023-03-21 00:00:00', 'Jeu d adresse pour toute la famille', '../data/jenga.jpg');

INSERT INTO produit (id, libelle, prix, discount, id_categorie, date_creation, description, image) VALUES
(25, 'Dobble', '10', 5, 37, '2023-03-22 00:00:00', 'Jeu d observation et de rapidit&eacute pour tous', '../data/dobble.jpg');

INSERT INTO produit (id, libelle, prix, discount, id_categorie, date_creation, description, image) VALUES
(26, 'Scrabble', '25', 10, 37, '2023-03-23 00:00:00', 'Jeu de lettres pour les amateurs de mots', '../data/scrabble.jpg');

INSERT INTO produit (id, libelle, prix, discount, id_categorie, date_creation, description, image) VALUES
(27, 'Puissance 4', '20', 0, 37, '2023-03-24 00:00:00', 'Jeu de strat&eacutegie pour deux joueurs', '../data/puissance-4.jpg');

INSERT INTO produit (id, libelle, prix, discount, id_categorie, date_creation, description, image) VALUES
(26, 'LEGO Star Wars: X-wing Starfighter', '70', 0, 39, '2023-03-23 00:00:00', 'Rejoignez la lutte contre l Empire avec ce modèle X-wing Starfighter de LEGO Star Wars', '../data/X-wing.jpeg');

INSERT INTO produit (id, libelle, prix, discount, id_categorie, date_creation, description, image) VALUES
(27, 'LEGO City: Le Poste de Police', '60', 0, 39, '2023-03-24 00:00:00', 'Assurez la s&eacutecurit&eacute de LEGO City avec le poste de police et ses figurines', '../data/police.jpeg');

INSERT INTO produit (id, libelle, prix, discount, id_categorie, date_creation, description, image) VALUES
(26, 'LEGO City - La caserne de pompiers', '89.99', 20, 39, '2023-03-23 00:00:00', 'Ensemble de construction de la caserne de pompiers LEGO City', '../data/pompier.jpeg');

INSERT INTO produit (id, libelle, prix, discount, id_categorie, date_creation, description, image) VALUES
(28, 'LEGO Creator - Le march&eacute d hiver', '79.99', 10, 39, '2023-03-25 00:00:00', 'Ensemble de construction du march&eacute d hiver LEGO Creator', '../data/hiver.jpeg');

INSERT INTO produit (id, libelle, prix, discount, id_categorie, date_creation, description, image) VALUES
(29, 'Jeu d &eacutechecs en bois', '49.99', 0, 38, '2023-03-26 00:00:00', 'Jeu d &eacutechecs classique en bois pour tous les niveaux', '../data/echec.jpeg');

INSERT INTO produit (id, libelle, prix, discount, id_categorie, date_creation, description, image) VALUES
(30, 'Mikado en bois', '14.99', 5, 38, '2023-03-27 00:00:00', 'Jeu de Mikado traditionnel en bois pour toute la famille', '../data/mikado.jpeg');

INSERT INTO produit (id, libelle, prix, discount, id_categorie, date_creation, description, image) VALUES
(31, 'Jeu de dames en bois', '24.99', 0, 38, '2023-03-28 00:00:00', 'Jeu de dames classique en bois pour tous les niveaux', '../data/dames.jpeg');

INSERT INTO produit (id, libelle, prix, discount, id_categorie, date_creation, description, image) VALUES
(32, 'Jeu de croquet en bois', '99.99', 20, 38, '2023-03-29 00:00:00', 'Jeu de croquet en bois pour jouer en ext&eacuterieur', '../data/croquet.jpg');

INSERT INTO produit (id, libelle, prix, discount, id_categorie, date_creation, description, image) VALUES
(33, 'Jeu de quilles en bois', '79.99', 10, 38, '2023-03-30 00:00:00', 'Jeu de quilles en bois pour jouer en ext&eacuterieur', '../data/quilles.jpg');

INSERT INTO produit (id, libelle, prix, discount, id_categorie, date_creation, description, image) VALUES
(34, 'Jeu de palets en bois', '59.99', 5, 38, '2023-03-31 00:00:00', 'Jeu de palets en bois pour jouer en ext&eacuterieur', '../data/palais.jpeg');
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
-- D&eacutechargement des donn&eacutees de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `pseudo`, `email`, `password`, `abonnement`, `statut`, `token`, `date_inscription`) VALUES
(23, 'sarah', 'sarah@gmail.com', '$2y$12$3j/03UvQHLKgpAgJE557qu2EUyldlYALCeFe3.HYS8ui9./aNWaei', 1, 'client', 'b742d564daf840edb51be1a60818fecea4046d354e5ce951e091740f3128015d2c372761e2320a29679ed97fbce51f24475f6ddbb7d1ecebb4142c8fa5ce28d6', '2023-03-27 17:00:09'),
(24, 'sar', 'sar@gmail.com', '$2y$12$aIFiRHL1ZdesM8vHduL8B.HC7pGhpStm0Y8YDYGgJi7FwPqPZajoC', 0, 'vendeur', 'cd696f9fa293cf2f7b6b1e73965203a98ed3dfa0b6bf40db89f9e1765a9f26ab3a1c233896b0bd6efc30bb1b20cc5a86e082bf31335ccdf0ab78197a4492126d', '2023-03-27 17:00:25'),
(22, 'le7', 'matheo@gmail.com', '$2y$12$khRsjTWFpYaFbzJ8vOFplesUec6.WdayhQMwIMG5B7O8EUCvqygzO', 0, 'admin', '2cfff788d2895a4a1e67ff2cfd5743608c5d238cff727ac868a1975052d37e2d479814e5e106080ff982d696bc8c54ced62fc6c00c8ffad3a1ffb8dc008efb64', '2023-03-27 16:59:52'),
(21, 'anissa', 'anissa@gmail.com', '$2y$12$FUyEl019velfXCidKIZywuVUb4O1/Fn79YVNinATuZ/3w3Uo8ldtK', 0, 'livreur', 'ffd834eabfe60da3ed33e1d7d51dd93791682f987790ec1884ca39247a93a701887d17585a44bf1242920045693465fdcbacb6cf7fb2cc450fa5fba206e09df8', '2023-03-27 16:59:37');

-- --------------------------------------------------------

--
-- Structure de la table `vendeur`
--

CREATE TABLE `vendeur` (
  `id` int(20) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `pr&eacutenom` varchar(100) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `debut_contrat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- D&eacutechargement des donn&eacutees de la table `vendeur`
--

INSERT INTO `vendeur` (`id`, `nom`, `pr&eacutenom`, `ville`, `debut_contrat`) VALUES
(2, 'tes', 'aa', 'aaa', '2023-03-27 00:00:00');

--
-- Index pour les tables d&eacutecharg&eacutees
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
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
-- Index pour la table `vendeur`
--
ALTER TABLE `vendeur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables d&eacutecharg&eacutees
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `vendeur`
--
ALTER TABLE `vendeur`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
