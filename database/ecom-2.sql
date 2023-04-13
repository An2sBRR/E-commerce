-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : jeu. 13 avr. 2023 à 21:13
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
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `numero_commande` varchar(100) NOT NULL,
  `taille` int(11) NOT NULL,
  `poids` int(11) NOT NULL,
  `adresse_livraison` varchar(150) NOT NULL,
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
(12, 'jamard', 'louis', 'loulou890', 'Le havre', 'non', '2023-04-03 00:00:00'),
(13, 'gon', 'thomas', 'gonnThom', 'cergy', 'non', '2023-04-12 00:00:00'),
(14, 'jemi', 'paul', 'paulo76', 'fecamp ', 'oui ', '2023-04-12 00:00:00'),
(15, 'dela ', 'alice ', 'alili', 'rouen ', 'oui ', '2023-04-12 00:00:00'),
(16, 'bous', 'amandine', 'bousaman', 'rouen ', 'non', '2023-04-12 00:00:00');

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
(24, 'Jenga', '15', 0, 38, 12, '2023-03-21 00:00:00', 'Jeu d\'adresse pour toute la famille', '../data/jenga.jpg', 8),
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
(37, 'Jeu de palets en bois', '60', 5, 38, 11, '2023-03-31 00:00:00', 'Jeu de palets en bois pour jouer en ext&eacuterieur', '../data/palais.jpeg', 3),
(38, 'Air hockey', '155', 0, 38, 13, '2023-04-12 20:49:55', 'Le but du jeu de la table a glisser est de mettre le palet dans le camp de l\'adversaire tout en protegeant son propre but', '../data/air_hocket.jpg', 10),
(39, 'bomboleo', '163', 15, 38, 13, '2023-04-12 21:26:38', 'jouet en bois familial qui promet de belles parties', '../data/equilibre.jpg', 4),
(40, 'shut the box nombre', '22', 0, 38, 12, '2023-04-12 21:26:38', 'Des en bois, jeu a boire, jeu de societe, jeu d\'ambiance ', '../data/des.jpg', 12),
(41, 'labyrinthe vertical ', '27', 5, 38, 13, '2023-04-12 21:31:38', 'un jeu de patience amusant et captivant, beaucoup de concentration pour arriver au but.', '../data/labi.jpg', 5),
(42, 'Flitter geant ', '310', 0, 38, 13, '2023-04-12 21:31:38', 'un jeu d\'adresse et de coordination. Le jeu est compose d\'un plateau de jeu en bois avec fond inox, de 4 elastiques, de pions et d\'une poudre de glisse', '../data/flitzer.jpg', 7),
(43, 'jeu de toc XL ', '38', 5, 38, 16, '2023-04-12 21:44:05', 'version canadienne des petits chevaux ', '../data/cheveux.jpg', 3),
(44, 'jeu quilles finlandaise ', '28', 0, 38, 15, '2023-04-12 21:44:05', 'jeu de quilles finlandaises, un jeu d\'adresse convivial pour jouer en exterieur', '../data/quille.jpg', 4),
(45, 'Attrape bille Geant ', '138', 10, 38, 15, '2023-04-13 18:11:34', 'un joueur envoie la bille dans le tunnel et un autre essaye de l\'attraper le plutot possible afin de marquer le plus de points possible', '../data/bille.jpg', 6),
(46, 'Billard roulette ', '241', 9, 38, 14, '2023-04-13 18:11:34', 'faire rouler les palets sur la tranche afin de passer sous les arches ', '../data/roulette.jpg', 6),
(47, 'Lego marvel ', '249', 0, 39, 15, '2023-04-13 18:28:48', 'Attention danger etouffement interdit pour les 0-4 ans ', '../data/marvel.png', 10),
(48, 'bloc Mario', '199', 0, 39, 13, '2023-04-13 18:28:48', 'Univers Mario ', '../data/mario1.png', 18),
(49, 'Lego aquarium  ', '30', 0, 39, 13, '2023-04-13 18:28:48', 'incroyable ', '../data/aqua.jpg', 26);

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
(34, 'sarah', 'sarah@gmail.com', '$2y$12$o36yt8YRTuU3Dm5ycdJWNu46Zq0OHgv1HZCNkVWInzW1SRJU/nAz.', 0, 'client', '93b0a79335479dd9cd3fe6b4849be9d042d3c166dd40f401c31009932a5dda2cddc36b92c994c92fab6f81392ecfc88e1f3f6c488ce3207c831602f13eb13a0f', '2023-04-12 21:34:56'),
(35, 'Matheo', 'matheo@gmail.com', '$2y$12$sVajDph6tybrwx5cVAZIgO2TULtQcPXEiLhsetLgh/oX74KgX.4ca', 0, 'admin', 'b7fc7890d78f6ebfc706d3b6127ef999b0b554c5d7c9d8ef7b846f6bf7e5aa76e7887591e877d9caaf67e4097f0a18bc3ba62aa76c7e0c9e0138b92ce04f1139', '2023-04-12 21:42:09'),
(36, 'anissa', 'anissa@gmail.com', '$2y$12$gnIc1jkDGmoF0hrV36pEPebXP5Evg.C4H6sYSQgknvHhUiRo2YF4C', 0, 'livreur', 'e102896f9931b0ebee095270123e43b8177b729eae97e2246febe5f0a1a9699ba4ef4c7ffd40b7606032d366ca6548fbe04c7d808b877a0423d5199d3899a462', '2023-04-12 21:42:19'),
(37, 'sara', 'sar@gmail.com', '$2y$12$RK//5PUb8oCq2kPUtqIlpuVPQSDnX7Si2lypjhXm8ZZa6m1Pk5CGe', 0, 'vendeur', '3fe80f4dc97c3828488b7db3d6439858b52c27b6768eb2b77521a9aa5f935ab82e2ecd88f5a944979318f4ab75e50b119caf72a8edf9c86243a312639123319c', '2023-04-12 21:42:28');

--
-- Index pour les tables déchargées
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
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `employes`
--
ALTER TABLE `employes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
