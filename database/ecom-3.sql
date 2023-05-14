-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 26, 2023 at 11:34 AM
-- Server version: 8.0.32-0ubuntu0.20.04.2
-- PHP Version: 7.4.3-4ubuntu2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `id` int NOT NULL,
  `libelle` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` varchar(255) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id`, `libelle`, `description`, `date_creation`) VALUES
(37, 'jeu_societe', ' La forme d&#39un jeu de plateau avec des pions ou d&#39un jeu de cartes.', '2023-03-20 10:59:03'),
(38, 'jeu_en_bois', ' Jeux traditionnels dont certains sont de grands classiques', '2023-03-20 11:00:47'),
(39, 'lego', 'est une gamme de jouets de construction', '2023-03-20 11:01:57'),
(40, 'strategie', 'Ideal pour utiliser ses m?ninges.', '2023-04-14 23:06:06');

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `id` int NOT NULL,
  `id_client` int NOT NULL,
  `nom_prenom` varchar(70) NOT NULL,
  `total` decimal(7,2) NOT NULL,
  `numero_commande` varchar(100) NOT NULL,
  `taille` decimal(10,4) NOT NULL,
  `poids` decimal(10,4) NOT NULL,
  `adresse_livraison` varchar(150) NOT NULL,
  `ville` varchar(150) NOT NULL,
  `code_postal` int NOT NULL,
  `valide` int DEFAULT '0',
  `commande_livre` int NOT NULL DEFAULT '0',
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `livraison` varchar(15) NOT NULL,
  `commission` decimal(5,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`id`, `id_client`, `nom_prenom`, `total`, `numero_commande`, `taille`, `poids`, `adresse_livraison`, `ville`, `code_postal`, `valide`, `commande_livre`, `date_creation`, `livraison`, `commission`) VALUES
(1, 54, 'Marie Bergere', '302.15', '525ccf9ab2f7e20547924b7c0c6558', '54.8000', '5.6300', '2 rue du quartier', 'Paris', 75011, 0, 0, '2023-01-17 09:34:03', 'express', '0.00'),
(2, 54, 'Sarah Bergere', '88.24', 'da04a102d803aa46e379edd9abb23a', '74.8000', '2.6000', '2 rue du moulin', 'Jouy le Moutier', 95280, 0, 0, '2023-01-10 09:34:52', 'relais', '1.66'),
(3, 51, 'Matéo Gentel-Dehenne', '199.35', '4c57a4869c161ffa227b6ff34dfa2b', '37.1000', '2.1400', '52 Rue de Sévigné', 'Sucy-en-Brie', 94370, 0, 0, '2022-03-26 09:48:22', 'relais', '9.95'),
(4, 52, 'Alexandre Tran', '78.00', 'a7ed612b3a57364ff20393b5c11cab', '24.2000', '2.8000', '32 boulevard de l\'hautil', 'Cergy', 95000, 0, 0, '2023-01-26 09:55:56', 'standard', '3.90'),
(5, 46, 'Sarah Bergere', '24.00', '5e2245208b78a31e381d2df9ef140c', '29.2000', '0.2320', '10 square de coquelicots', 'Jouy le Moutier', 95280, 0, 0, '2023-04-26 09:58:10', 'relais', '1.20'),
(6, 46, 'Sarah Bergere', '33.26', 'bd9c71db8c8cdab465af3bddbeeca5', '24.0000', '1.1000', '10 square de coquelicots', 'Jouy le Moutier', 95280, 0, 0, '2023-04-26 10:00:16', 'relais', '1.66'),
(7, 46, 'Sarah Bergere', '24.00', '15b1fe1daf058b2fdd013c696e9c77', '4.0000', '2.0000', '10 square de coquelicots', 'Jouy le Moutier', 95280, 0, 0, '2022-09-26 10:02:02', 'relais', '0.00'),
(8, 56, 'Sarah Bergere', '59.87', '5939a5fcbbba3deebfddb60dae1948', '48.0000', '2.2000', '3 Rue Jean Jacques Rousseau', 'Fontenay sous bois', 94120, 0, 0, '2023-04-26 10:04:16', 'express', '3.33'),
(9, 56, 'Christian Bergere', '10.80', 'dce9fd4e937c6ede2cc916b538e185', '14.6000', '0.1160', '3 Rue Jean Jacques Rousseau', 'Fontenay sous bois', 94120, 0, 0, '2023-03-10 10:06:15', 'express', '0.60'),
(10, 53, 'Adel Youssouf Ali', '138.55', '4b8f576b7ff40d611407817a4eddd2', '5.0000', '1.5000', '21 Boulevard de l\'Oise', 'Cergy', 95000, 0, 0, '2023-01-02 10:07:54', 'relais', '6.93'),
(11, 53, 'Adel Youssouf Ali', '80.00', 'f97be70bd0a92ae317be560414bf54', '40.0000', '2.0200', '21 Boulevard de l\'Oise', 'Cergy', 95000, 0, 0, '2022-12-17 10:08:37', 'relais', '4.00'),
(12, 55, 'Laure Esnée', '219.31', '7ed34e4d1506ec7329d8dbab0b2d9a', '24.0000', '3.2000', '3 Rue Jean Jacques Rousseau', 'Fontenay sous bois', 94120, 0, 0, '0202-11-26 10:10:13', 'express', '10.97'),
(13, 57, 'Charles Pierrard', '79.99', '2c48f9534788d1d1ccb81479c0533a', '16.8000', '2.8400', '133 Avenue des Champs-Élysées', 'Paris', 75008, 0, 0, '2023-02-25 11:11:42', 'express', '4.00'),
(14, 57, 'Charles Pierrard', '60.74', '0f861453e6163422eac72b8d20c94f', '47.4000', '1.7000', '133 Avenue des Champs-Élysées', 'Paris', 75008, 0, 0, '2022-11-03 11:18:17', 'relais', '1.66');

-- --------------------------------------------------------

--
-- Table structure for table `ligne_commande`
--

CREATE TABLE `ligne_commande` (
  `id` int NOT NULL,
  `id_produit` int NOT NULL,
  `id_commande` int NOT NULL,
  `quantite` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `ligne_commande`
--

INSERT INTO `ligne_commande` (`id`, `id_produit`, `id_commande`, `quantite`) VALUES
(1, 47, 1, 1),
(2, 41, 1, 1),
(3, 51, 1, 1),
(4, 50, 2, 1),
(5, 51, 2, 2),
(6, 48, 3, 1),
(7, 26, 3, 1),
(8, 32, 4, 1),
(9, 44, 4, 1),
(10, 22, 5, 2),
(11, 52, 6, 1),
(12, 57, 7, 1),
(13, 52, 8, 2),
(14, 22, 9, 1),
(15, 39, 10, 1),
(16, 35, 11, 1),
(17, 46, 12, 1),
(18, 37, 13, 1),
(19, 53, 13, 1),
(20, 50, 14, 1),
(21, 51, 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `livreur`
--

CREATE TABLE `livreur` (
  `id` int NOT NULL,
  `id_utilisateurs` int NOT NULL,
  `type_permis` varchar(100) NOT NULL,
  `horaire_debut` time NOT NULL,
  `horaire_fin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE `produit` (
  `id` int NOT NULL,
  `libelle` varchar(100) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `prix` decimal(5,2) NOT NULL,
  `hauteur` decimal(14,4) NOT NULL,
  `poids` decimal(14,4) NOT NULL,
  `discount` int NOT NULL,
  `id_categorie` int NOT NULL,
  `id_utilisateurs` int NOT NULL,
  `date_creation` datetime NOT NULL,
  `description` varchar(255) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `image` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `quantite` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`id`, `libelle`, `prix`, `hauteur`, `poids`, `discount`, `id_categorie`, `id_utilisateurs`, `date_creation`, `description`, `image`, `quantite`) VALUES
(22, 'UNO', '12.00', '14.6000', '0.1160', 0, 37, 48, '2023-03-20 00:00:00', 'Super jeu en amis ou en famille', '../data/UNO.jpg', 12),
(23, 'Monopoly', '35.00', '40.2000', '0.9000', 15, 37, 44, '2023-03-20 00:00:00', 'Jeu de soci&eacutet&eacute classique pour toute la famille', '../data/monopoly.jpg', 9),
(24, 'Jenga', '15.00', '12.0000', '0.7800', 0, 38, 50, '2023-03-21 00:00:00', 'Jeu d&#39adresse pour toute la famille', '../data/jenga.jpg', 8),
(25, 'Dobble', '10.00', '15.0000', '0.1300', 5, 37, 50, '2023-03-22 00:00:00', 'Jeu d&#39observation et de rapidit&eacute pour tous', '../data/dobble.jpg', 0),
(26, 'Scrabble', '25.00', '26.8000', '1.3500', 10, 37, 44, '2023-03-23 00:00:00', 'Jeu de lettres pour les amateurs de mots', '../data/scrabble.jpg', 3),
(27, 'Puissance 4', '20.00', '27.9400', '0.4600', 0, 37, 48, '2023-03-24 00:00:00', 'Jeu de strat&eacutegie pour deux joueurs', '../data/puissance-4.jpg', 18),
(28, 'LEGO Star Wars: X-wing Starfighter', '110.00', '28.2000', '0.9900', 12, 39, 50, '2023-03-23 00:00:00', 'Rejoignez la lutte contre l&#39Empire avec ce mod?le X-wing Starfighter de LEGO Star Wars', '../data/X-wing.jpeg', 7),
(29, 'LEGO City: Le Poste de Police', '60.00', '26.2000', '0.4560', 12, 39, 48, '2023-03-24 00:00:00', 'Assurez la s&eacutecurit&eacute de LEGO City avec le poste de police et ses figurines', '../data/police.jpeg', 8),
(30, 'LEGO City - La caserne de pompiers', '90.00', '37.8000', '1.5000', 20, 39, 48, '2023-03-23 00:00:00', 'Ensemble de construction de la caserne de pompiers LEGO City', '../data/pompier.jpeg', 9),
(31, 'LEGO Creator - Le march&eacute d hiver', '80.00', '7.0600', '0.2800', 10, 39, 48, '2023-03-25 00:00:00', 'Ensemble de construction du march&eacute d&#39hiver LEGO Creator', '../data/hiver.jpeg', 14),
(32, 'Jeu d&#39&eacutechecs en bois', '50.00', '5.2000', '0.8000', 0, 38, 48, '2023-03-26 00:00:00', 'Jeu d&#39&eacutechecs classique en bois pour tous les niveaux', '../data/echec.jpeg', 2),
(33, 'Mikado en bois', '15.00', '7.5000', '0.2000', 5, 38, 48, '2023-03-27 00:00:00', 'Jeu de Mikado traditionnel en bois pour toute la famille', '../data/mikado.jpeg', 7),
(34, 'Jeu de dames en bois', '25.00', '4.0000', '0.3500', 0, 38, 48, '2023-03-28 00:00:00', 'Jeu de dames classique en bois pour tous les niveaux', '../data/dames.jpeg', 7),
(35, 'Jeu de croquet en bois', '100.00', '40.0000', '2.0200', 20, 38, 48, '2023-03-29 00:00:00', 'Jeu de croquet en bois pour jouer en ext&eacuterieur', '../data/croquet.jpg', 4),
(36, 'Jeu de quilles en bois', '80.00', '19.0000', '2.0000', 10, 38, 48, '2023-03-30 00:00:00', 'Jeu de quilles en bois pour jouer en ext&eacuterieur', '../data/quilles.jpg', 4),
(37, 'Jeu de palets en bois', '60.00', '4.5000', '2.3400', 5, 38, 48, '2023-03-31 00:00:00', 'Jeu de palets en bois pour jouer en ext&eacuterieur', '../data/palais.jpeg', 2),
(38, 'Air hockey', '155.00', '10.0000', '9.3900', 0, 38, 50, '2023-04-12 20:49:55', 'Le but du jeu de la table a glisser est de mettre le palet dans le camp de l&#39adversaire tout en protegeant son propre but', '../data/air_hocket.jpg', 10),
(39, 'Bomboleo', '163.00', '5.0000', '1.5000', 15, 38, 50, '2023-04-12 21:26:38', 'Jouet en bois familial qui promet de belles parties', '../data/equilibre.jpg', 3),
(40, 'Shut the box nombre', '22.00', '22.0000', '0.8000', 0, 38, 48, '2023-04-12 21:26:38', 'Des en bois, jeu a boire, jeu de societe, jeu d&#39ambiance ', '../data/des.jpg', 12),
(41, 'Labyrinthe vertical ', '27.00', '15.0000', '1.6000', 5, 38, 44, '2023-04-12 21:31:38', 'Un jeu de patience amusant et captivant, beaucoup de concentration pour arriver au but.', '../data/labi.jpg', 4),
(42, 'Flitter geant ', '310.00', '5.0000', '2.1000', 0, 38, 48, '2023-04-12 21:31:38', 'Un jeu d&#39adresse et de coordination. Le jeu est compose d&#39un plateau de jeu en bois avec fond inox, de 4 elastiques, de pions et d&#39une poudre de glisse', '../data/flitzer.jpg', 7),
(43, 'Jeu de toc XL ', '38.00', '15.0000', '1.3000', 5, 38, 48, '2023-04-12 21:44:05', 'Version canadienne des petits chevaux ', '../data/cheveux.jpg', 3),
(44, 'Jeu quilles finlandaise ', '28.00', '19.0000', '2.0000', 0, 38, 50, '2023-04-12 21:44:05', 'Jeu de quilles finlandaises, un jeu d&#39adresse convivial pour jouer en exterieur', '../data/quille.jpg', 3),
(45, 'Attrape bille Geant', '138.00', '14.0000', '2.3000', 10, 38, 44, '2023-04-13 18:48:34', 'Un joueur envoie la bille dans le tunnel et un autre essaye de l&#39attraper le plutot possible afin de marquer le plus de points possible', '../data/bille.jpg', 6),
(46, 'Billard roulette', '241.00', '24.0000', '3.2000', 9, 38, 50, '2023-04-13 18:48:34', 'Faire rouler les palets sur la tranche afin de passer sous les arches ', '../data/roulette.jpg', 5),
(47, 'Lego marvel', '249.00', '12.4000', '3.1300', 0, 39, 44, '2023-04-13 18:28:48', 'Attention danger etouffement interdit pour les 0-4 ans ', '../data/marvel.png', 9),
(48, 'Bloc Mario', '199.00', '10.3000', '0.7900', 0, 39, 50, '2023-04-13 18:28:48', 'Univers Mario ', '../data/mario1.png', 16),
(49, 'Lego aquarium  ', '50.00', '5.9000', '0.3000', 0, 39, 48, '2023-04-13 18:28:48', 'Incroyable ', '../data/aqua.jpg', 26),
(50, 'Carcassone', '34.99', '20.0000', '0.8000', 5, 40, 50, '2023-04-14 23:04:04', 'Carcassonne est un jeu de tuile o&ugrave toute la famille peut d&eacutefendre ses chateaux et pr&egraves pour gagner le plus de point', '../data/carcassonne.jpeg', 8),
(51, 'Risk', '27.50', '27.4000', '0.9000', 0, 40, 44, '2023-04-14 23:21:02', 'Risk est un jeu o&ugrave le but du jeu est de menez des strat&eacutegies pour acc&eacuteder &agrave la gloire!', '../data/risk.jpeg', 0),
(52, 'Les Aventuriers du Rail', '35.01', '24.0000', '1.1000', 5, 40, 50, '2023-04-14 23:33:02', 'Cr&eacuteer votre voyage et visitez les plus grandes villes d&#39Europe tout en gagnant la partie.', '../data/aventuriers.jpeg', 5),
(53, 'Blocus', '22.99', '12.3000', '0.5000', 0, 40, 48, '2023-04-14 23:34:02', 'Bloquer vos adversaires sans piti&eacute', '../data/blocus.jpeg', 14),
(54, 'Splendor marvel', '36.90', '2.5000', '4.0000', 0, 37, 44, '2023-04-15 17:16:25', 'Jeu familial par excellence ', '../data/2marvel.jpg', 15),
(55, 'marvel champions', '53.95', '2.6700', '1.3400', 0, 40, 50, '2023-04-15 17:20:55', 'marvel champions JCE est un jeu de carte strategique ', '../data/1marvel.jpg', 12),
(56, 'course folle marvel', '19.99', '26.7000', '4.1000', 0, 40, 50, '2023-04-15 17:20:55', 'jeu strategique sur le theme de marvel ', '../data/3marvel.jpg', 25),
(57, 'monopoly marvel', '24.00', '4.0000', '2.0000', 0, 37, 44, '2023-04-15 17:20:55', 'jouez en famille ou entre amis au Monopoly avengers ', '../data/4marvel.jpeg', 4),
(58, 'lego marvel hulkbuster', '50.00', '5.3000', '2.6000', 0, 39, 50, '2023-04-15 17:33:27', 'Bruce banner enfile l&#39armure Hulkbuster pour defendre le Wakanda ', '../data/5marvel.jpeg', 6),
(59, 'captain marvel lego ', '58.20', '2.6000', '4.9000', 5, 39, 50, '2023-04-15 17:33:27', 'jeu de construction Captain marvel contient 3 figurines : captain marvel, nick fury et Talos', '../data/6marvel.jpg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int NOT NULL,
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `pseudo`, `ville`, `email`, `password`, `abonnement`, `statut`, `token`, `date_inscription`) VALUES
(48, 'felgines', 'sara', 'sar', 'cergy', 'sar@gmail.com', '$2y$12$1tGLvPlbaCNEgnrvhbHhauc7sMp1IR.HbnWpTNrN8Lij9dLnU.Fii', 0, 'vendeur', '20174d5f152f1e2e7d4362eb88918376266742fe08fba3d8b990b4a06d3001ce0a79adb9a967bee29aa048b782652d25dc400a4da4918ac767556818d1de3ef7', '2023-04-14 11:39:38'),
(46, 'bergere', 'sarah', 'sarah', 'cergy', 'sarah@gmail.com', '$2y$12$QaPBVQRWBYfIuIHJnFGX..ldKZcD9Ak3mCbWqWziDSzk.G5qjvbiq', 0, 'client', 'baf29e1a6b54e18858440e2b73e60dafa349d7ec331fd8f7618a46c1c5ed6aad6cc5388b1aff1b1a6e7c0053cbde90f8614d29831c5f7072c51ff7f1591170dc', '2023-04-14 11:18:40'),
(44, 'admin', 'admin', 'JeuxVentes', 'cergy', 'admin@gmail.com', '$2y$12$KYSOw5EpAyEFcswT1ePfwOMeiBdeZ5nMUwD5UWs2Kfe9CCh5jx1AK', 0, 'admin', '195a209040e13afd03586bbe0ce2a854895c43777b4f4983892750ee07bd24a602e1dd23e330e07ad93529ce4511de12f4c1d42a12b959f33bc234a9e085ff4b', '2023-04-14 11:17:59'),
(45, 'ait-chadi', 'anissa', 'anissa', 'cergy', 'anissa@gmail.com', '$2y$12$L14fDS32iH1vnsm5ucoIkONpBQKwcS9Om56g0.zU7eLA2JJFNRIl6', 0, 'livreur', '310ea189128817ab662e9cd095f35091565224f59c0c2d74b5b498f7590d745f8a81cc81fe47ea34b7234e6ae1d2a13886d341d648ff7638561224dee50fb95a', '2023-04-14 11:18:23'),
(49, 'pereira', 'matheo', 'mat786', 'Beynes', 'mat@gmail.com', '$2y$12$5aMOyIYYuUWUkZP2HxF.kOBansdImaeI1igd3BPNwzqsMrzz3Ob5K', 1, 'client', '1a43e2a8dc4bbc6aaaf43f14c9874874025e454b6daebd1733f3c5d545e73bfeb7edf3ab3bb160d08207614ff831330bf16717a81e935e156d636ff1baf4dc1e', '2023-04-15 09:24:06'),
(50, 'jamard', 'louis', 'lou.jm', 'le havre ', 'louis@gmail.com', '$2y$12$dWVPB1lnzehoC9lpz68eTO42YYyFo3O.NIAdBriRX1pf0VqH2FTRm', 0, 'vendeur', 'ae84346622a9c028b4037a30fdeaa9fdfa0a791ca82064c25f8dd52f1b6f89b6dab6f7849090fba10742c2465616928ddfe4acb240c311e8ea806372ddc167ea', '2023-04-15 18:47:42'),
(51, 'Gentel-Dehenne', 'Matéo', 'mgd', 'Sucy', 'mateo@gmail.com', '$2y$12$nyZju0RpTMVZMxvXTUOuIedk9GyPz1JGBIk2gAQis6jSqJId35Jtm', 1, 'client', '145f9a27e5d89bffbcf0d64781a4777ebb3834e753b928197da12b2b305b77552fa74714b6bdab69e2f22569548225733a5c0b1f4e44c84a81a3711cfc1db3c2', '2023-04-26 09:23:57'),
(52, 'Tran', 'Alexandre', 'ice-crimes', 'Cergy', 'icecrimes@gmail.com', '$2y$12$.r55XvbLzwFkkCovXmkFIe11QeTGqo8Th4.smqP9mJGuWKVONvty.', 0, 'client', '46bf9db51ca71be70202c83e554c20cb28d0da4f33f7592b2151e6c58fde4abfb3b9d77451b160e3e2ef03edc85e1e5147a5ff02d0f51bb470569a92e9e345d4', '2023-04-26 09:24:29'),
(53, 'Youssouf Ali', 'Adel', 'adelysf', 'Marseille', 'adel@gmail.com', '$2y$12$lCu4D0PB458nXjd6N9DO/uG8cOefgyo9EK.wNAlr7uKmvqWrJDGWq', 0, 'client', 'fe6ebfb44c103cf4c52b4f3acedf3d48ac60a1a189f2263b8cae014d88191540795e7276b01aa69767483412f963f11c660b85b6a79b58e04d032605c940a572', '2023-04-26 09:25:01'),
(54, 'Bergere', 'Marie', 'marie_dehaud', 'Paris', 'mariedehaud@gmail.com', '$2y$12$k5tSv/SS2L.Mn5K44K.UM.D9Run7lYrGBarnjculleMo015zv794G', 0, 'client', '3e7130f5ba5f06c085c6b61c2d8c5b9774cde31b9d3c3feb78a0a82d9d51dafb67cc49bf9500a483f343434ada263160e6e2c0222a1b4d2072f817bf8918ebe2', '2023-04-26 09:26:15'),
(55, 'Esnee', 'Laure', 'laureesn', 'Fontenay Sous Bois', 'laureesn@gmail.com', '$2y$12$KCX99WR0gqybho8CUy3PyeOtoehX/3uX2Wd7oSUuLAo/SdchKd1rG', 0, 'client', '843b2dae0b278310478a8eabbb9b599cda497079c932ed8532957858c69680e594d19eadfab18fa848900d6ef2fa59b6a31f5e8e9f56d1db50f7f1d892407d5b', '2023-04-26 09:26:49'),
(56, 'Bergere', 'Christian', 'abcd', 'Fontenay Sous Bois ', 'christianbergere@gmail.com', '$2y$12$EMu4G7rkzLK6mNHJJ/tzM.85GKkcM9CTKvPTdLmRABOTv4uGSDD1C', 1, 'client', 'd873c560fd3abb739b50c0cd8c6dc704fad096d9b80d0716b480945181b2e4712347f714d495f590710cbe4357bcc7892131531c725e86ff05e3ab932b589ce4', '2023-04-26 09:27:29'),
(57, 'Pierrard', 'Charles', 'charles', 'Paris', 'charles@gmail.com', '$2y$12$Hn3uvfHz36b08owarIe67eaxS.ZTnqT24141yAqNbUZF2E/fPbUqi', 0, 'client', '00d32ae0271c441fe7f691c7e6f9b66cda862e5a52b8db20f4ad0618ed4fdf50005ac9e71092906342e8e3fd156bda16851f06a0f59a68db0b8af009f45364ca', '2023-04-26 09:28:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `livreur`
--
ALTER TABLE `livreur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `livreur`
--
ALTER TABLE `livreur`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
