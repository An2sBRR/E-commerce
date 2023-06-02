-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 02, 2023 at 09:19 PM
-- Server version: 8.0.33-0ubuntu0.20.04.2
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
  `libelle` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `description` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id`, `libelle`, `description`, `date_creation`) VALUES
(37, 'Jeux de soci&eacute;t&eacute;', ' La forme d&#039;un jeu de plateau avec des pions ou d&#039;un jeu de cartes.', '2023-03-20 10:59:03'),
(38, 'Jeux en bois', ' Jeux traditionnels dont certains sont de grands classiques', '2023-03-20 11:00:47'),
(39, 'Lego', 'Lego est une gamme de jouets de construction', '2023-03-20 11:01:57'),
(40, 'Strat&eacute;gie', 'Id&eacute;al pour utiliser ses m&eacute;ninges.', '2023-04-14 23:06:06');

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
  `commission` decimal(5,2) NOT NULL DEFAULT '0.00',
  `id_livreur` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`id`, `id_client`, `nom_prenom`, `total`, `numero_commande`, `taille`, `poids`, `adresse_livraison`, `ville`, `code_postal`, `valide`, `commande_livre`, `date_creation`, `livraison`, `commission`, `id_livreur`) VALUES
(1, 54, 'Marie Bergere', '302.15', '525ccf9ab2f7e20547924b7c0c6558', '54.8000', '5.6300', '2 rue du quartier', 'Paris', 75011, 1, 1, '2023-01-17 09:34:03', 'express', '0.00', 58),
(2, 54, 'Sarah Bergere', '88.24', 'da04a102d803aa46e379edd9abb23a', '74.8000', '2.6000', '2 rue du moulin', 'Jouy le Moutier', 95280, 1, 1, '2023-01-10 09:34:52', 'relais', '1.66', 58),
(3, 51, 'Matéo Gentel-Dehenne', '199.35', '4c57a4869c161ffa227b6ff34dfa2b', '37.1000', '2.1400', '52 Rue de Sévigné', 'Sucy-en-Brie', 94370, 1, 1, '2022-03-26 09:48:22', 'relais', '9.95', 45),
(4, 52, 'Alexandre Tran', '78.00', 'a7ed612b3a57364ff20393b5c11cab', '24.2000', '2.8000', '32 boulevard de l&#039;hautil', 'Cergy', 95000, 1, 1, '2023-01-26 09:55:56', 'standard', '3.90', 58),
(5, 46, 'Sarah Bergere', '24.00', '5e2245208b78a31e381d2df9ef140c', '29.2000', '0.2320', '10 square de coquelicots', 'Jouy le Moutier', 95280, 1, 1, '2023-04-26 09:58:10', 'relais', '1.20', 45),
(6, 46, 'Sarah Bergere', '33.26', 'bd9c71db8c8cdab465af3bddbeeca5', '24.0000', '1.1000', '10 square de coquelicots', 'Jouy le Moutier', 95280, 1, 1, '2023-04-26 10:00:16', 'relais', '1.66', 58),
(7, 46, 'Sarah Bergere', '24.00', '15b1fe1daf058b2fdd013c696e9c77', '4.0000', '2.0000', '10 square de coquelicots', 'Jouy le Moutier', 95280, 1, 1, '2022-09-26 10:02:02', 'relais', '0.00', 58),
(8, 56, 'Sarah Bergere', '59.87', '5939a5fcbbba3deebfddb60dae1948', '48.0000', '2.2000', '3 Rue Jean Jacques Rousseau', 'Fontenay sous bois', 94120, 1, 1, '2023-04-26 10:04:16', 'express', '3.33', 58),
(9, 56, 'Christian Bergere', '10.80', 'dce9fd4e937c6ede2cc916b538e185', '14.6000', '0.1160', '3 Rue Jean Jacques Rousseau', 'Fontenay sous bois', 94120, 1, 1, '2023-03-10 10:06:15', 'express', '0.60', 45),
(10, 53, 'Adel Youssouf Ali', '138.55', '4b8f576b7ff40d611407817a4eddd2', '5.0000', '1.5000', '21 Boulevard de l&#039;Oise', 'Cergy', 95000, 1, 1, '2023-01-02 10:07:54', 'relais', '6.93', 45),
(11, 53, 'Adel Youssouf Ali', '80.00', 'f97be70bd0a92ae317be560414bf54', '40.0000', '2.0200', '21 Boulevard de l&#039;Oise', 'Cergy', 95000, 1, 1, '2022-12-17 10:08:37', 'relais', '4.00', 45),
(12, 55, 'Laure Esnée', '219.31', '7ed34e4d1506ec7329d8dbab0b2d9a', '24.0000', '3.2000', '3 Rue Jean Jacques Rousseau', 'Fontenay sous bois', 94120, 1, 1, '2022-11-26 10:10:13', 'express', '10.97', 58),
(13, 57, 'Charles Pierrard', '79.99', '2c48f9534788d1d1ccb81479c0533a', '16.8000', '2.8400', '133 Avenue des Champs-Élysées', 'Paris', 75008, 1, 1, '2023-02-25 11:11:42', 'express', '4.00', 45),
(14, 57, 'Charles Pierrard', '60.74', '0f861453e6163422eac72b8d20c94f', '47.4000', '1.7000', '133 Avenue des Champs-Élysées', 'Paris', 75008, 1, 1, '2022-11-03 11:18:17', 'relais', '1.66', 58),
(15, 46, 'Sarah Bergere', '52.80', '977efdf79674f19e36b8bbe1f4a566', '26.2000', '0.4560', '21 Boulevard de l&#039;Oise', 'jouy-le-moutier', 95000, 1, 1, '2023-05-14 19:32:52', 'relais', '2.64', 58),
(16, 51, 'Mat&eacute;o gd', '45.00', 'c1593146ffadddeede911f2ee1ef6c', '5.2000', '0.8000', '21 boulevard de l&#039;oise', 'Cergy', 95000, 1, 1, '2023-05-15 10:32:30', 'express', '2.50', 45),
(17, 60, 'Theresa Gray', '84.56', '6636ba1125a03fcd54cea12eeb927d', '61.0700', '1.7400', '32 boulevard de l&#039;hautil', 'Cergy', 95000, 1, 1, '2023-05-30 14:28:37', 'express', '4.70', 59),
(18, 46, 'Sarah Bergere', '71.52', '18cbe74ee21e92d4e58203a9a97db7', '48.0000', '2.2000', '10 square de coquelicots', 'Jouy le Moutier', 95280, 1, 0, '2023-05-30 14:35:20', 'standard', '3.33', 58),
(19, 49, 'Math&eacute;o Pereira', '59.83', '9bf428bc4048c5f88f36bfa43ada52', '40.0000', '1.6000', '115 Place du Commerce', 'Plaisir', 78370, 1, 0, '2023-05-30 15:43:44', 'relais', '3.32', 59),
(20, 52, 'Alexandre Tran', '126.20', '074c1741e327e453d7b1337cb201a2', '14.0000', '2.3000', '32 boulevard de l&#039;hautil', 'Cergy', 95000, 1, 0, '2023-05-30 15:48:05', 'relais', '0.00', 59),
(21, 53, 'Adel Youssouf Ali', '55.95', '0a0e71ba21fd9a1cf08adb6096ff90', '2.6700', '1.3400', '21 Boulevard de l&#039;Oise', 'Cergy', 95000, 1, 0, '2023-05-30 15:52:20', 'relais', '2.70', 45),
(22, 51, 'Mat&eacute;o Gentel-Dehenne', '560.70', '887a4415c705fb34283b073fef0fd3', '60.0000', '5.4000', '32 boulevard de l&#039;hautil', 'Cergy', 95000, 1, 0, '2023-06-02 15:12:15', 'standard', '0.00', 59),
(23, 54, 'Marie Bergere', '98.72', 'e61967d65af6df7ed6dadf205116bb', '56.4000', '3.5000', '10 square de coquelicots', 'Jouy le Moutier', 95280, 1, 0, '2023-06-02 15:19:10', 'express', '1.66', 59),
(24, 54, 'Marie Bergere', '91.25', '1ddab73867747b3536345a6446bd84', '120.6000', '2.7000', '2 rue du moulin', 'Jouy le Moutier', 95280, 1, 0, '2023-06-02 15:28:20', 'relais', '0.00', 45),
(25, 56, 'Christian Bergere', '119.66', '79f001379be2bf02cb06407cc677ed', '56.0000', '3.9200', '3 Rue Jean Jacques Rousseau', 'Fontenay sous bois', 94120, 1, 0, '2023-06-02 17:23:32', 'relais', '6.65', 59),
(26, 63, 'Math&eacute;o Costa', '45.79', '80f1e3aad4161ba9676cdbea7ce595', '24.0000', '2.5670', '15 rue de la friche', 'Osny', 95520, 0, 0, '2023-06-02 20:35:54', 'relais', '0.40', 59),
(27, 63, 'Math&eacute;o Costa', '74.89', '1f4086cc3f3aa07bdd5369ec63dfa2', '19.0000', '0.9700', '15 rue de la friche', 'Osny', 95520, 0, 0, '2023-06-02 20:51:25', 'relais', '0.00', 59),
(28, 60, 'Tessa Gray', '25.19', '48ba60e30635c89cefce099eb4185c', '5.0000', '0.4700', '133 Avenue des Champs-&Eacute;lys&eacute;es', 'Paris', 75008, 0, 0, '2023-06-02 20:56:03', 'express', '0.00', 59);

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
(3, 51, 1, 0),
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
(21, 51, 14, 1),
(22, 29, 15, 1),
(23, 32, 16, 1),
(24, 55, 17, 1),
(25, 60, 17, 4),
(26, 52, 18, 2),
(27, 50, 19, 2),
(28, 45, 20, 1),
(29, 55, 21, 1),
(30, 71, 22, 10),
(31, 51, 23, 1),
(32, 69, 23, 1),
(33, 63, 23, 2),
(34, 23, 24, 3),
(35, 69, 25, 4),
(36, 79, 26, 1),
(37, 70, 26, 1),
(38, 74, 26, 1),
(39, 72, 27, 1),
(40, 67, 27, 1),
(41, 72, 28, 1);

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

--
-- Dumping data for table `livreur`
--

INSERT INTO `livreur` (`id`, `id_utilisateurs`, `type_permis`, `horaire_debut`, `horaire_fin`) VALUES
(1, 45, '2', '09:30:00', '18:30:00'),
(2, 59, '3', '06:30:00', '16:30:00'),
(3, 58, '4', '07:30:00', '15:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE `produit` (
  `id` int NOT NULL,
  `libelle` varchar(100) CHARACTER SET armscii8 NOT NULL,
  `prix` decimal(5,2) NOT NULL,
  `hauteur` decimal(14,4) NOT NULL,
  `poids` decimal(14,4) NOT NULL,
  `discount` int NOT NULL,
  `id_categorie` int NOT NULL,
  `id_utilisateurs` int NOT NULL,
  `date_creation` datetime NOT NULL,
  `description` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `image` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `quantite` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`id`, `libelle`, `prix`, `hauteur`, `poids`, `discount`, `id_categorie`, `id_utilisateurs`, `date_creation`, `description`, `image`, `quantite`) VALUES
(22, 'UNO', '12.00', '14.6000', '0.1160', 0, 37, 48, '2023-03-20 00:00:00', 'Super jeu en amis ou en famille', '../data/UNO.jpg', 12),
(23, 'Monopoly', '35.00', '40.2000', '0.9000', 15, 37, 44, '2023-03-20 00:00:00', 'Jeu de soci&eacutet&eacute classique pour toute la famille', '../data/monopoly.jpg', 6),
(24, 'Jenga', '15.00', '12.0000', '0.7800', 0, 38, 50, '2023-03-21 00:00:00', 'Jeu d&#39adresse pour toute la famille', '../data/jenga.jpg', 8),
(25, 'Dobble', '10.00', '15.0000', '0.1300', 5, 37, 50, '2023-03-22 00:00:00', 'Jeu d&#39observation et de rapidit&eacute pour tous', '../data/dobble.jpg', 0),
(26, 'Scrabble', '25.00', '26.8000', '1.3500', 10, 37, 44, '2023-03-23 00:00:00', 'Jeu de lettres pour les amateurs de mots', '../data/scrabble.jpg', 3),
(27, 'Puissance 4', '20.00', '27.9400', '0.4600', 0, 37, 48, '2023-03-24 00:00:00', 'Jeu de strat&eacutegie pour deux joueurs', '../data/puissance-4.jpg', 18),
(28, 'LEGO Star Wars: X-wing Starfighter', '110.00', '28.2000', '0.9900', 12, 39, 50, '2023-03-23 00:00:00', 'Rejoignez la lutte contre l&#39Empire avec ce mod?le X-wing Starfighter de LEGO Star Wars', '../data/X-wing.jpeg', 7),
(29, 'LEGO City: Le Poste de Police', '60.00', '26.2000', '0.4560', 12, 39, 48, '2023-03-24 00:00:00', 'Assurez la s&eacutecurit&eacute de LEGO City avec le poste de police et ses figurines', '../data/police.jpeg', 7),
(30, 'LEGO City - La caserne de pompiers', '90.00', '37.8000', '1.5000', 20, 39, 48, '2023-03-23 00:00:00', 'Ensemble de construction de la caserne de pompiers LEGO City', '../data/pompier.jpeg', 9),
(31, 'LEGO Creator - Le march&eacute; d&#039;hiver', '80.00', '7.0600', '0.2800', 0, 39, 48, '2023-03-25 00:00:00', 'Ensemble de construction du march&eacute; d&#039;hiver LEGO Creator', '../data/hiver.jpeg', 14),
(32, 'Jeu d&#39&eacutechecs en bois', '50.00', '5.2000', '0.8000', 0, 38, 48, '2023-03-26 00:00:00', 'Jeu d&#39&eacutechecs classique en bois pour tous les niveaux', '../data/echec.jpeg', 1),
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
(45, 'Attrape bille Geant', '138.00', '14.0000', '2.3000', 10, 38, 44, '2023-04-13 18:48:34', 'Un joueur envoie la bille dans le tunnel et un autre essaye de l&#39attraper le plutot possible afin de marquer le plus de points possible', '../data/bille.jpg', 5),
(46, 'Billard roulette', '241.00', '24.0000', '3.2000', 9, 38, 50, '2023-04-13 18:48:34', 'Faire rouler les palets sur la tranche afin de passer sous les arches ', '../data/roulette.jpg', 5),
(47, 'Lego marvel', '249.00', '12.4000', '3.1300', 0, 39, 44, '2023-04-13 18:28:48', 'Attention danger etouffement interdit pour les 0-4 ans ', '../data/marvel.png', 9),
(48, 'Bloc Mario', '199.00', '10.3000', '0.7900', 0, 39, 50, '2023-04-13 18:28:48', 'Univers Mario ', '../data/mario1.png', 16),
(49, 'Lego aquarium  ', '50.00', '5.9000', '0.3000', 0, 39, 48, '2023-04-13 18:28:48', 'Incroyable ', '../data/aqua.jpg', 26),
(50, 'Carcassone', '34.99', '20.0000', '0.8000', 5, 40, 50, '2023-04-14 23:04:04', 'Carcassonne est un jeu de tuile o&ugrave toute la famille peut d&eacutefendre ses chateaux et pr&egraves pour gagner le plus de point', '../data/carcassonne.jpeg', 6),
(51, 'Risk', '27.50', '27.4000', '0.9000', 0, 40, 44, '2023-04-14 23:21:02', 'Risk est un jeu o&ugrave le but du jeu est de menez des strat&eacutegies pour acc&eacuteder &agrave la gloire!', '../data/risk.jpeg', 0),
(52, 'Les Aventuriers du Rail', '35.01', '24.0000', '1.1000', 5, 40, 50, '2023-04-14 23:33:02', 'Cr&eacuteer votre voyage et visitez les plus grandes villes d&#39Europe tout en gagnant la partie.', '../data/aventuriers.jpeg', 3),
(53, 'Blocus', '22.99', '12.3000', '0.5000', 0, 40, 48, '2023-04-14 23:34:02', 'Bloquer vos adversaires sans piti&eacute', '../data/blocus.jpeg', 14),
(54, 'Splendor marvel', '36.90', '2.5000', '4.0000', 0, 37, 44, '2023-04-15 17:16:25', 'Jeu familial par excellence ', '../data/2marvel.jpg', 15),
(55, 'Marvel champions', '53.95', '2.6700', '1.3400', 0, 40, 50, '2023-04-15 17:20:55', 'Marvel champions JCE est un jeu de carte strategique ', '../data/1marvel.jpg', 10),
(56, 'Course folle marvel', '19.99', '26.7000', '4.1000', 0, 40, 50, '2023-04-15 17:20:55', 'Jeu strategique sur le theme de marvel ', '../data/3marvel.jpg', 25),
(57, 'Monopoly marvel', '24.00', '4.0000', '2.0000', 0, 37, 44, '2023-04-15 17:20:55', 'Jouez en famille ou entre amis au Monopoly avengers ', '../data/4marvel.jpeg', 4),
(58, 'Lego marvel hulkbuster', '50.00', '5.3000', '2.6000', 0, 39, 50, '2023-04-15 17:33:27', 'Bruce banner enfile l&#39armure Hulkbuster pour defendre le Wakanda ', '../data/5marvel.jpeg', 6),
(59, 'Captain marvel lego ', '58.20', '2.6000', '4.9000', 5, 39, 50, '2023-04-15 17:33:27', 'Jeu de construction Captain marvel contient 3 figurines : captain marvel, nick fury et Talos', '../data/6marvel.jpg', 5),
(60, 'Uno', '10.00', '14.6000', '0.1000', 0, 37, 50, '2023-05-19 00:05:29', 'Assemblez les cartes par couleur ou par valeur et jouez des cartes sp&eacute;ciales pour pimenter l&#039;action.', '../data/6466a1298c4c7Uno.png', 11),
(61, 'Monopoly', '23.99', '12.0000', '0.9300', 0, 37, 61, '2023-05-30 14:31:25', 'Voici un classique des soir&eacute;es de jeux en famille ! Au Monopoly, les joueurs doivent acheter, vendre et planifier pour devenir le plus riche.', '../data/6475ec9ddca6bmonopoly.jpeg', 15),
(62, 'Dixit', '48.00', '7.0000', '0.8700', 15, 37, 48, '2023-05-31 17:40:24', 'Le principe de Dixit est simple : les joueurs doivent deviner et faire deviner des cartes illustr&eacute;es. &Agrave; chaque tour, un joueur devient le conteur qui choisit une carte et la d&eacute;crit avec une phase, un mot ou un son. ', '../data/64776a682a9fcdixit.jpeg', 10),
(63, 'Nain Jaune', '14.99', '7.5000', '0.8100', 0, 37, 44, '2023-05-31 17:55:45', 'Le v&eacute;ritable jeu de nain avec des barquettes amovibles pour ramasser le pot. Des jetons de mises de valeurs diff&eacute;rentes pimentent le jeu !', '../data/64776e0156455nain_jaune.png', 43),
(64, 'Dobble', '20.14', '26.0000', '0.2900', 0, 37, 61, '2023-05-31 18:04:56', 'Un jeu amusant qui teste votre vitesse, les habilet&eacute;s d&#039;observation et r&eacute;flexes! Dobble repose sur l&#039;&oelig;il et des r&eacute;flexes rapides pour cr&eacute;er l&#039;excitation forte. ', '../data/64777028626c7dobble.jpeg', 10),
(65, 'Le seigneur des anneaux : Fondcombe', '499.00', '36.0000', '1.2000', 0, 39, 61, '2023-05-31 18:46:03', 'Nich&eacute; dans la vall&eacute;e de la Terre du Milieu o&ugrave; commen&ccedil;a la c&eacute;l&egrave;bre qu&ecirc;te, cet impressionnant projet de 6 167 pi&egrave;ces regorge de d&eacute;tails que les fans des films vont adorer.', '../data/647779cbe980flego-seigneur.jpg', 4),
(66, 'Harry Potter - Poudlard', '500.00', '58.0000', '1.4000', 10, 39, 44, '2023-05-31 18:52:54', 'Cet ensemble LEGO Harry Potter de collection tr&egrave;s d&eacute;taill&eacute; comprend plus de 6 000 pi&egrave;ces et offre une exp&eacute;rience de construction enrichissante.', '../data/64777b662a02flego_harry_potter.jpeg', 21),
(67, 'Civilization', '44.90', '14.0000', '0.5000', 0, 40, 44, '2023-05-31 19:00:04', 'Dans ce jeu de strat&eacute;gie, vous prendrez la t&ecirc;te d&#039;une civilisation tout au long de l&#039;histoire. Vous contr&ocirc;lerez son d&eacute;veloppement technologique, son &eacute;conomie, sa culture et son pouvoir militaire.', '../data/64777d1433d05civilization.jpg', 3),
(68, 'Scotland Yard', '30.99', '14.0000', '0.8700', 30, 40, 61, '2023-05-31 19:02:51', 'Un des joueurs est Mister X, gangster en fuite dans Londres. Les autres joueurs, incarnant des d&eacute;tectives de Scotland Yard, doivent le capturer en coordonnant leurs mouvements. ', '../data/64777dbb02192scotland_yard.jpeg', 7),
(69, 'Cluedo', '34.99', '14.0000', '0.9800', 5, 37, 50, '2023-06-01 01:13:41', 'Cluedo est un jeu de soci&eacute;t&eacute; dans lequel les joueurs doivent d&eacute;couvrir parmi eux qui est le meurtrier d&#039;un crime commis dans un manoir anglais, le Manoir Tudor.', '../data/6477d4a56e646cluedo.jpeg', 5),
(70, 'LEGO Friends - La clinique v&eacute;t&eacute;rinaire', '19.99', '8.0000', '0.3670', 5, 39, 44, '2023-06-02 13:46:41', 'Laissez les enfants exprimer leur amour pour les animaux gr&acirc;ce au set pour enfants d&egrave;s 4 ans LEGO Friends La clinique v&eacute;t&eacute;rinaire.', '../data/6479d6a1acbaeLEGO-Friends-41695-La-clinique-veterinaire.jpg', 19),
(71, 'LEGO Bouquet de Fleurs Sauvages', '62.30', '6.0000', '0.5400', 0, 39, 44, '2023-06-02 13:50:20', 'Comprenant 8 vari&eacute;t&eacute;s de fleurs diff&eacute;rentes, ce bouquet est enti&egrave;rement r&eacute;alis&eacute; &agrave; partir de pi&egrave;ces LEGO astucieusement combin&eacute;es et peut &ecirc;tre personnalis&eacute; &agrave; volont&eacute;.', '../data/6479d77c0d6ebLEGO-Icons-10313-Bouquet-de-Fleurs-Sauvages.jpg', 20),
(72, 'Jeu d&#039;&eacute;chec', '27.99', '5.0000', '0.4700', 0, 40, 44, '2023-06-02 14:25:45', 'Chaque joueur poss&egrave;de au d&eacute;part un roi, une dame, deux tours, deux fous, deux cavaliers et huit pions. Le but du jeu est d&#039;infliger &agrave; son adversaire un &eacute;chec et mat.', '../data/6479dfc960815jeu_echec.jpg', 12),
(73, '7 Wonders', '41.99', '9.0000', '0.6500', 5, 40, 44, '2023-06-02 14:28:40', 'Prenez la t&ecirc;te d&#039;une cit&eacute; du monde antique, exploitez les ressources de vos terres, d&eacute;veloppez vos relations commerciales... et prenez garde aux autres cit&eacute;s rivales !', '../data/6479e078a11b57wonders.jpg', 14),
(74, 'Loup Garou ', '17.50', '4.0000', '0.4000', 4, 40, 44, '2023-06-02 14:40:48', 'Chaque nuit, de cruels loups-garous &eacute;liminent un villageois. Le lendemain, les camarades de la victime se vengent en exterminant un monstre pr&eacute;sum&eacute;. ', '../data/6479e350be8a0loupgarou.jpg', 14),
(75, '6 qui prends', '15.49', '5.0000', '0.4000', 50, 37, 61, '2023-06-02 14:47:09', 'Dans ce jeu de d&eacute;fausse d&eacute;j&agrave; culte, il vous faudra placer astucieusement vos cartes &agrave; t&ecirc;te de boeuf dans les diff&eacute;rentes rang&eacute;es sans jamais poser la sixi&egrave;me. Ambiance garantie !', '../data/6479e4cd97d507quiprend.jpg', 15),
(76, 'Time&#039;s Up Family', '22.99', '8.0000', '0.9000', 15, 37, 61, '2023-06-02 14:56:45', ' Amusez-vous &agrave; d&eacute;couvrir des objets, des m&eacute;tiers et des animaux. D&eacute;crivez-les, faites-les deviner en ne pronon&ccedil;ant qu&rsquo;un mot, puis pour finir, mimez-les. Soyez vif et malin !', '../data/6479e70d00525timesUp.jpg', 9),
(77, 'Cranium', '19.00', '5.0000', '0.6000', 25, 37, 61, '2023-06-02 15:02:08', 'Cranium permet de faire des activit&eacute;s d&eacute;lirantes autour de 600 questions originales telles que : sculpter la muraille de chine, &eacute;peler &#039; moumoute &#039; &agrave; l&rsquo;envers ou dessiner les yeux ferm&eacute;s ! ', '../data/6479e8507c64ecranium.jpg', 5),
(78, 'LEGO La Maison de L&agrave;-haut ', '54.99', '12.0000', '1.5000', 5, 39, 61, '2023-06-02 15:05:56', 'Un ensemble qui laissera petits et grands bouche b&eacute;e, gr&acirc;ce au mod&egrave;le constructible de la c&eacute;l&egrave;bre maison inspir&eacute;e du film d&#039;animation &laquo; L&agrave;-Haut &raquo;.', '../data/6479e934a0904Lego_la_haut.jpg', 2),
(79, 'Jenga', '8.00', '12.0000', '1.8000', 0, 38, 62, '2023-06-02 15:48:42', 'Le Jenga est un jeu d&#039;adresse et de r&eacute;flexion o&ugrave; les joueurs retirent progressivement les pi&egrave;ces d&#039;une tour pour les replacer &agrave; son sommet.', '../data/6479f33aeabf1jenga.jpg', 64),
(80, 'La Bonne Paye', '36.99', '10.0000', '0.9000', 10, 37, 62, '2023-06-02 17:21:16', 'Comme dans la vraie vie ! Avec le jeu de soci&eacute;t&eacute; La Bonne paye, recevez votre paie &agrave; la fin du mois et g&eacute;rez votre budget au mieux. ', '../data/647a08eceebf0la_bonne_paye.jpg', 15);

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
(48, 'Felgines', 'Sara', 'sar', 'cergy', 'sar@gmail.com', '$2y$12$1tGLvPlbaCNEgnrvhbHhauc7sMp1IR.HbnWpTNrN8Lij9dLnU.Fii', 0, 'vendeur', '20174d5f152f1e2e7d4362eb88918376266742fe08fba3d8b990b4a06d3001ce0a79adb9a967bee29aa048b782652d25dc400a4da4918ac767556818d1de3ef7', '2023-04-14 11:39:38'),
(46, 'Bergere', 'Sarah', 'sarah', 'cergy', 'sarah@gmail.com', '$2y$12$QaPBVQRWBYfIuIHJnFGX..ldKZcD9Ak3mCbWqWziDSzk.G5qjvbiq', 0, 'client', 'baf29e1a6b54e18858440e2b73e60dafa349d7ec331fd8f7618a46c1c5ed6aad6cc5388b1aff1b1a6e7c0053cbde90f8614d29831c5f7072c51ff7f1591170dc', '2023-04-14 11:18:40'),
(44, 'admin', 'admin', 'JeuxVentes', 'cergy', 'admin@gmail.com', '$2y$12$KYSOw5EpAyEFcswT1ePfwOMeiBdeZ5nMUwD5UWs2Kfe9CCh5jx1AK', 0, 'admin', '195a209040e13afd03586bbe0ce2a854895c43777b4f4983892750ee07bd24a602e1dd23e330e07ad93529ce4511de12f4c1d42a12b959f33bc234a9e085ff4b', '2023-04-14 11:17:59'),
(45, 'Ait-chadi', 'Anissa', 'anissa', 'cergy', 'anissa@gmail.com', '$2y$12$L14fDS32iH1vnsm5ucoIkONpBQKwcS9Om56g0.zU7eLA2JJFNRIl6', 0, 'livreur', '310ea189128817ab662e9cd095f35091565224f59c0c2d74b5b498f7590d745f8a81cc81fe47ea34b7234e6ae1d2a13886d341d648ff7638561224dee50fb95a', '2023-04-14 11:18:23'),
(49, 'Pereira', 'Matheo', 'mat786', 'Beynes', 'mat@gmail.com', '$2y$12$5aMOyIYYuUWUkZP2HxF.kOBansdImaeI1igd3BPNwzqsMrzz3Ob5K', 1, 'client', '1a43e2a8dc4bbc6aaaf43f14c9874874025e454b6daebd1733f3c5d545e73bfeb7edf3ab3bb160d08207614ff831330bf16717a81e935e156d636ff1baf4dc1e', '2023-04-15 09:24:06'),
(50, 'Jamard', 'Louis', 'lou.jm', 'le havre ', 'louis@gmail.com', '$2y$12$dWVPB1lnzehoC9lpz68eTO42YYyFo3O.NIAdBriRX1pf0VqH2FTRm', 0, 'vendeur', 'ae84346622a9c028b4037a30fdeaa9fdfa0a791ca82064c25f8dd52f1b6f89b6dab6f7849090fba10742c2465616928ddfe4acb240c311e8ea806372ddc167ea', '2023-04-15 18:47:42'),
(51, 'Gentel-Dehenne', 'Matéo', 'mgd', 'Sucy', 'mateo@gmail.com', '$2y$12$nyZju0RpTMVZMxvXTUOuIedk9GyPz1JGBIk2gAQis6jSqJId35Jtm', 1, 'client', '145f9a27e5d89bffbcf0d64781a4777ebb3834e753b928197da12b2b305b77552fa74714b6bdab69e2f22569548225733a5c0b1f4e44c84a81a3711cfc1db3c2', '2023-04-26 09:23:57'),
(52, 'Tran', 'Alexandre', 'ice-crimes', 'Cergy', 'icecrimes@gmail.com', '$2y$12$.r55XvbLzwFkkCovXmkFIe11QeTGqo8Th4.smqP9mJGuWKVONvty.', 0, 'client', '46bf9db51ca71be70202c83e554c20cb28d0da4f33f7592b2151e6c58fde4abfb3b9d77451b160e3e2ef03edc85e1e5147a5ff02d0f51bb470569a92e9e345d4', '2023-04-26 09:24:29'),
(53, 'Youssouf Ali', 'Adel', 'adelysf', 'Marseille', 'adel@gmail.com', '$2y$12$lCu4D0PB458nXjd6N9DO/uG8cOefgyo9EK.wNAlr7uKmvqWrJDGWq', 0, 'client', 'fe6ebfb44c103cf4c52b4f3acedf3d48ac60a1a189f2263b8cae014d88191540795e7276b01aa69767483412f963f11c660b85b6a79b58e04d032605c940a572', '2023-04-26 09:25:01'),
(54, 'Bergere', 'Marie', 'marie_dehaud', 'Paris', 'mariedehaud@gmail.com', '$2y$12$k5tSv/SS2L.Mn5K44K.UM.D9Run7lYrGBarnjculleMo015zv794G', 0, 'client', '3e7130f5ba5f06c085c6b61c2d8c5b9774cde31b9d3c3feb78a0a82d9d51dafb67cc49bf9500a483f343434ada263160e6e2c0222a1b4d2072f817bf8918ebe2', '2023-04-26 09:26:15'),
(55, 'Esnee', 'Laure', 'laureesn', 'Fontenay Sous Bois', 'laureesn@gmail.com', '$2y$12$KCX99WR0gqybho8CUy3PyeOtoehX/3uX2Wd7oSUuLAo/SdchKd1rG', 0, 'client', '843b2dae0b278310478a8eabbb9b599cda497079c932ed8532957858c69680e594d19eadfab18fa848900d6ef2fa59b6a31f5e8e9f56d1db50f7f1d892407d5b', '2023-04-26 09:26:49'),
(56, 'Bergere', 'Christian', 'abcd', 'Fontenay Sous Bois ', 'christianbergere@gmail.com', '$2y$12$EMu4G7rkzLK6mNHJJ/tzM.85GKkcM9CTKvPTdLmRABOTv4uGSDD1C', 1, 'client', 'd873c560fd3abb739b50c0cd8c6dc704fad096d9b80d0716b480945181b2e4712347f714d495f590710cbe4357bcc7892131531c725e86ff05e3ab932b589ce4', '2023-04-26 09:27:29'),
(57, 'Pierrard', 'Charles', 'charles', 'Paris', 'charles@gmail.com', '$2y$12$Hn3uvfHz36b08owarIe67eaxS.ZTnqT24141yAqNbUZF2E/fPbUqi', 0, 'client', '00d32ae0271c441fe7f691c7e6f9b66cda862e5a52b8db20f4ad0618ed4fdf50005ac9e71092906342e8e3fd156bda16851f06a0f59a68db0b8af009f45364ca', '2023-04-26 09:28:31'),
(58, 'Dupont', 'Léa', 'leadpt', 'Cergy', 'leadupont@gmail.com', '$2y$12$BZnwScTRcUd9HS7MbwjtzeQ8j63G8F1.PVYBBaSwpyMN6.9fOgqhi', 0, 'livreur', '6d8a38e027678d7e03d54dd473f584787f98f5fc60946c816640b41b22fb0fc63a5bf8eb037ce38f20d960f94fd5ee803fb19cf4e0ec31cfa33794b4546d1a1d', '2023-05-17 00:10:24'),
(59, 'Carstairs', 'Jem', 'jemC', 'Cergy', 'jemcarstairs@gmail.com', '$2y$12$hR5HLt.ZseLYsRuJzTFaruBpAENW3SquRy6iblHCiOQF8jko6frEG', 0, 'livreur', 'fbbc8677d5c54f5a6eacc8057e961e98758a25335a06483bb6bdc7ca2bce1bc589e7012d8737507d473eb4fb68d1e68184b4ea78a92ea97415332159de69e0b4', '2023-05-30 14:06:51'),
(60, 'Gray', 'Theresa', 'tessa', 'Cergy', 'tessagray@gmail.com', '$2y$12$LYCxF7gUpeS21WzqmrK.vOx3JVTtaP/cq1y/at0LFatk8GFPfePWC', 1, 'client', 'b955ef22948ded934c9fdc153031ed4fd99db206d2cd2ff51f271285a6c25d64fd15f2fb7bf4c9ee52a2bf6fa6406355dbe218939088d1b3eb7750b313f1b5d0', '2023-05-30 14:27:08'),
(61, 'Herondale', 'Will', 'willh', 'Cergy', 'willherondale@gmail.com', '$2y$12$RcVixOM9sqxE/Gki9Ut4oOabVlkiyB/DqIA3CcCcnQSrixTWo8xke', 0, 'vendeur', '4e0427fbdf6c8d46d4092dc85d29e21d38fab749e0df975e5d1c5a2cfff3f7d8315fd28232e0ec101a1359fbec6dd3e659472f62a5b3bc467dce9af3aa4017a4', '2023-05-30 14:30:04'),
(62, 'Leroy', 'Clément', 'clem', 'Jouy le Moutier', 'clement@gmail.com', '$2y$12$bsJPtsA5epsObhlYldU.dOBBVMFjbhu.G0ycRnxarspqi1Y0rAoh2', 0, 'vendeur', '89889c3443a82cb3067bfd13ef91c64872b923e82e96e0701960387c4dc6450aa801d21beed55deefb11f3cfbf372819a9370a22c1e0967665d80b1779c6c46c', '2023-06-02 15:44:13'),
(63, 'Costa', 'Mathéo', 'rui', 'Osny', 'matheocosta@gmail.com', '$2y$12$TC7yU7vkoacV6OxM7U7CEukqkltlqU7RL1GaYhjTwvojOcaF0WFzG', 0, 'client', '6fa0b50345652966ba5f82594b23e86bc31fcf0af5d27b2ceb0e0be4dd89e89fb9f7bdf1f27d02c340e6413a4c5353e95f1970740e32177202c11ef45b2b7ad7', '2023-06-02 20:32:15');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `livreur`
--
ALTER TABLE `livreur`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
