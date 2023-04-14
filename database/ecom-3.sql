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
  `nom_prenom` varchar(70) NOT NULL,
  `total` decimal(7,2) NOT NULL,
  `numero_commande` varchar(100) NOT NULL,
  `taille` decimal(10,4) NOT NULL,
  `poids` decimal(10,4)  NOT NULL,
  `adresse_livraison` varchar(150) NOT NULL,
  `ville` varchar(150) NOT NULL,
  `code_postal` int(5) NOT NULL,
  `valide` int(11) DEFAULT '0',
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `livraison` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `commande` (`id`, `id_client`, `nom_prenom`, `total`, `numero_commande`,`taille`,`poids`,`adresse_livraison`,`ville`,`code_postal`,`valide`,`date_creation`, `livraison`) VALUES
(1, 46, 'Sarah Bergere', 59.50, '81e1b6ee19cf9a5772e2821265a503', 0.3740, 10.0, "2 Chemin des paradis", "Cergy", 95000, 0, '2023-04-14 13:35:02', 'standard');

-- --------------------------------------------------------

--
-- Structure de la table `ligne_commande`
--

CREATE TABLE `ligne_commande` (
  `id` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `ligne_commande` (`id`, `id_produit`, `id_commande`, `quantite`) VALUES
(1, 23, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `libelle` varchar(100) CHARACTER SET armscii8 NOT NULL,
  `prix` decimal(5,2) NOT NULL,
  `hauteur` decimal(14,4) NOT NULL,
  `poids` decimal(14,4) NOT NULL,
  `discount` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `id_utilisateurs` int(11) NOT NULL,
  `date_creation` datetime NOT NULL,
  `description` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `image` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `quantite` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `libelle`, `prix`, `hauteur`, `poids`, `discount`, `id_categorie`, `id_utilisateurs`, `date_creation`, `description`, `image`, `quantite`) VALUES
(22, 'UNO', '12', 0.187, 5, 0, 37, 48, '2023-03-20 00:00:00', 'Super jeu en amis ou en famille', '../data/UNO.jpg', 15),
(23, 'Monopoly', '35', 0.187, 5, 15, 37, 48, '2023-03-20 00:00:00', 'Jeu de soci&eacutet&eacute classique pour toute la famille', '../data/monopoly.jpg', 10),
(24, 'Jenga', '15', 0.187, 5, 0, 38, 48, '2023-03-21 00:00:00', 'Jeu d\'adresse pour toute la famille', '../data/jenga.jpg', 8),
(25, 'Dobble', '10', 0.187, 5, 5, 37, 48, '2023-03-22 00:00:00', 'Jeu d&#39observation et de rapidit&eacute pour tous', '../data/dobble.jpg', 0),
(26, 'Scrabble', '25', 0.187, 5, 10, 37, 48, '2023-03-23 00:00:00', 'Jeu de lettres pour les amateurs de mots', '../data/scrabble.jpg', 4),
(27, 'Puissance 4', '20', 0.187, 5, 0, 37, 48, '2023-03-24 00:00:00', 'Jeu de strat&eacutegie pour deux joueurs', '../data/puissance-4.jpg', 18),
(28, 'LEGO Star Wars: X-wing Starfighter', '70', 0.187, 5, 12, 39, 48, '2023-03-23 00:00:00', 'Rejoignez la lutte contre l&#39Empire avec ce mod?le X-wing Starfighter de LEGO Star Wars', '../data/X-wing.jpeg', 7),
(29, 'LEGO City: Le Poste de Police', '60', 0.187, 5, 12, 39, 48, '2023-03-24 00:00:00', 'Assurez la s&eacutecurit&eacute de LEGO City avec le poste de police et ses figurines', '../data/police.jpeg', 8),
(30, 'LEGO City - La caserne de pompiers', '90', 0.187, 5, 20, 39, 48, '2023-03-23 00:00:00', 'Ensemble de construction de la caserne de pompiers LEGO City', '../data/pompier.jpeg', 9),
(31, 'LEGO Creator - Le march&eacute d hiver', '80', 0.187, 5, 10, 39, 48, '2023-03-25 00:00:00', 'Ensemble de construction du march&eacute d&#39hiver LEGO Creator', '../data/hiver.jpeg', 14),
(32, 'Jeu d&#39&eacutechecs en bois', '50', 0.187, 5, 0, 38, 48, '2023-03-26 00:00:00', 'Jeu d&#39&eacutechecs classique en bois pour tous les niveaux', '../data/echec.jpeg', 3),
(33, 'Mikado en bois', '15', 0.187, 5, 5, 38, 48, '2023-03-27 00:00:00', 'Jeu de Mikado traditionnel en bois pour toute la famille', '../data/mikado.jpeg', 7),
(34, 'Jeu de dames en bois', '25', 0.187, 5, 0, 38, 48, '2023-03-28 00:00:00', 'Jeu de dames classique en bois pour tous les niveaux', '../data/dames.jpeg', 7),
(35, 'Jeu de croquet en bois', '100', 0.187, 5, 20, 38, 48, '2023-03-29 00:00:00', 'Jeu de croquet en bois pour jouer en ext&eacuterieur', '../data/croquet.jpg', 5),
(36, 'Jeu de quilles en bois', '80', 0.187, 5, 10, 38, 48, '2023-03-30 00:00:00', 'Jeu de quilles en bois pour jouer en ext&eacuterieur', '../data/quilles.jpg', 4),
(37, 'Jeu de palets en bois', '60', 0.187, 5, 5, 38, 48, '2023-03-31 00:00:00', 'Jeu de palets en bois pour jouer en ext&eacuterieur', '../data/palais.jpeg', 3),
(38, 'Air hockey', '155', 0.187, 5, 0, 38, 13, '2023-04-12 20:49:55', 'Le but du jeu de la table a glisser est de mettre le palet dans le camp de l\'adversaire tout en protegeant son propre but', '../data/air_hocket.jpg', 10),
(39, 'bomboleo', '163', 0.187, 5, 15, 38, 13, '2023-04-12 21:26:38', 'jouet en bois familial qui promet de belles parties', '../data/equilibre.jpg', 4),
(40, 'shut the box nombre', '22', 0.187, 5, 0, 38, 48, '2023-04-12 21:26:38', 'Des en bois, jeu a boire, jeu de societe, jeu d\'ambiance ', '../data/des.jpg', 12),
(41, 'labyrinthe vertical ', '27', 0.187, 5, 5, 38, 48, '2023-04-12 21:31:38', 'un jeu de patience amusant et captivant, beaucoup de concentration pour arriver au but.', '../data/labi.jpg', 5),
(42, 'Flitter geant ', '310', 0.187, 5, 0, 38, 48, '2023-04-12 21:31:38', 'un jeu d\'adresse et de coordination. Le jeu est compose d\'un plateau de jeu en bois avec fond inox, de 4 elastiques, de pions et d\'une poudre de glisse', '../data/flitzer.jpg', 7),
(43, 'jeu de toc XL ', '38', 0.187, 5, 5, 38, 48, '2023-04-12 21:44:05', 'version canadienne des petits chevaux ', '../data/cheveux.jpg', 3),
(44, 'jeu quilles finlandaise ', '28', 0.187, 5, 0, 38, 48, '2023-04-12 21:44:05', 'jeu de quilles finlandaises, un jeu d\'adresse convivial pour jouer en exterieur', '../data/quille.jpg', 4),
(45, 'Attrape bille Geant ', '138', 0.187, 5, 10, 38, 48, '2023-04-13 18:48:34', 'un joueur envoie la bille dans le tunnel et un autre essaye de l\'attraper le plutot possible afin de marquer le plus de points possible', '../data/bille.jpg', 6),
(46, 'Billard roulette ', '241', 0.187, 5, 9, 38, 48, '2023-04-13 18:48:34', 'faire rouler les palets sur la tranche afin de passer sous les arches ', '../data/roulette.jpg', 6),
(47, 'Lego marvel ', '249', 0.187, 5, 0, 39, 15, '2023-04-13 18:28:48', 'Attention danger etouffement interdit pour les 0-4 ans ', '../data/marvel.png', 10),
(48, 'bloc Mario', '199', 0.187, 5, 0, 39, 13, '2023-04-13 18:28:48', 'Univers Mario ', '../data/mario1.png', 18),
(49, 'Lego aquarium  ', '30', 0.187, 5, 0, 39, 13, '2023-04-13 18:28:48', 'incroyable ', '../data/aqua.jpg', 26);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `ville` varchar(100) NOT NULL,
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

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `pseudo`, `ville`, `email`, `password`, `abonnement`, `statut`, `token`, `date_inscription`) VALUES
(48, 'felgines', 'sara', 'sar', 'cergy', 'sar@gmail.com', '$2y$12$1tGLvPlbaCNEgnrvhbHhauc7sMp1IR.HbnWpTNrN8Lij9dLnU.Fii', 0, 'vendeur', '20174d5f152f1e2e7d4362eb88918376266742fe08fba3d8b990b4a06d3001ce0a79adb9a967bee29aa048b782652d25dc400a4da4918ac767556818d1de3ef7', '2023-04-14 11:39:38'),
(46, 'bergere', 'sarah', 'sarah', 'cergy', 'sarah@gmail.com', '$2y$12$QaPBVQRWBYfIuIHJnFGX..ldKZcD9Ak3mCbWqWziDSzk.G5qjvbiq', 0, 'client', 'baf29e1a6b54e18858440e2b73e60dafa349d7ec331fd8f7618a46c1c5ed6aad6cc5388b1aff1b1a6e7c0053cbde90f8614d29831c5f7072c51ff7f1591170dc', '2023-04-14 11:18:40'),
(44, 'costa', 'matheo', 'matheo', 'cergy', 'matheo@gmail.com', '$2y$12$KYSOw5EpAyEFcswT1ePfwOMeiBdeZ5nMUwD5UWs2Kfe9CCh5jx1AK', 0, 'admin', '195a209040e13afd03586bbe0ce2a854895c43777b4f4983892750ee07bd24a602e1dd23e330e07ad93529ce4511de12f4c1d42a12b959f33bc234a9e085ff4b', '2023-04-14 11:17:59'),
(45, 'ait-chadi', 'anissa', 'anissa', 'cergy', 'anissa@gmail.com', '$2y$12$L14fDS32iH1vnsm5ucoIkONpBQKwcS9Om56g0.zU7eLA2JJFNRIl6', 0, 'livreur', '310ea189128817ab662e9cd095f35091565224f59c0c2d74b5b498f7590d745f8a81cc81fe47ea34b7234e6ae1d2a13886d341d648ff7638561224dee50fb95a', '2023-04-14 11:18:23');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
