-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 30 juin 2022 à 11:28
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `forum`
--

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `mdp` text NOT NULL,
  `age` int(11) NOT NULL,
  `sexe` text NOT NULL,
  `description_profil` text NOT NULL,
  `astrologie` varchar(255) NOT NULL,
  `image_membre` varchar(255) NOT NULL,
  `confirmKey` varchar(255) NOT NULL,
  `confirme` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `pseudo`, `mail`, `avatar`, `mdp`, `age`, `sexe`, `description_profil`, `astrologie`, `image_membre`, `confirmKey`, `confirme`) VALUES
(53, 'teste ', 'cdnids@gmail.com', '53.jpg', '8cb2237d0679ca88db6464eac60da96345513964', 26, '', ' \r\n                \r\n                \r\n                Bonjour à tous ! :)\r\n                \r\n                         ', 'Bélier', '', '', 0),
(54, 'salim_32', 'fffzzzzfffff@gmail.com', '54.jpg', '8cb2237d0679ca88db6464eac60da96345513964', 32, '', ' Chance est le parcours de coaching personnalisé pour se réinventer professionnellement. En 12 semaines, 100% en ligne, nous vous accompagnons méthodiquement dans la définition et l’aboutissement d’un projet solide aligné avec vos envies et vos besoins.\r\n                 ', 'Bélier', '', '', 0),
(58, 'lalalab', '555555@gmail.com', '', '8cb2237d0679ca88db6464eac60da96345513964', 36, 'Homme', '', '', '', '', 0),
(59, 'Louise ', '55555445@gmail.com', '59.jpg', '8cb2237d0679ca88db6464eac60da96345513964', 26, 'Homme', ' \r\n               Noun Project features the most diverse collection of icons and stock photos ever. Download SVG and PNG. Browse over 3 million art-quality icons and photos.  ', 'Bélier', '', '', 0),
(82, 'patrcick', '155454@gmail.com', '', '8cb2237d0679ca88db6464eac60da96345513964', 89, 'Homme', '', '', '', '', 0),
(83, 'gilles94', 'lelle@gmail.com', '', '8cb2237d0679ca88db6464eac60da96345513964', 56, 'Homme', '', '', '', '', 0),
(90, 'bobetpat', 'bob@gmail.com', '', '8cb2237d0679ca88db6464eac60da96345513964', 23, 'Homme', ' \r\n                 ', 'Bélier', '', '', 0),
(91, 'patrick947748', 'patrick@gmail.com', '91.jpg', '8cb2237d0679ca88db6464eac60da96345513964', 26, 'Homme', ' \r\n                \r\n                \r\n              teste de description       ', 'Bélier', '', '', 0),
(92, 'patrick', 'patrick02@gmail.com', '', '8cb2237d0679ca88db6464eac60da96345513964', 26, 'Homme', '', '', '', '', 0),
(93, 'nico', 'niconico@gmail.com', '', '8cb2237d0679ca88db6464eac60da96345513964', 56, 'Homme', '', '', '', '', 0),
(94, 'gerome77', 'gege@gmail.com', '', '8cb2237d0679ca88db6464eac60da96345513964', 56, 'Homme', '', '', '', '', 0),
(95, 'gerome7755', 'aaaaaaaaaaa@gmail.com', '', '8cb2237d0679ca88db6464eac60da96345513964', 56, 'Homme', '', '', '', '', 0),
(96, 'gerodme7755', 'aaaaadaaaaaa@gmail.com', '', '8cb2237d0679ca88db6464eac60da96345513964', 56, 'Homme', '', '', '', '', 0),
(97, 'ssssssssssss', 'ssssssssss@gmail.com', '', '8cb2237d0679ca88db6464eac60da96345513964', 22, 'Homme', '', '', '', '', 0),
(98, 'lulu', 'lulu@gmail.com', '', '8cb2237d0679ca88db6464eac60da96345513964', 89, 'Homme', '', '', '', '', 0),
(99, 'dddddddd', '56666@gmail.com', '', '8cb2237d0679ca88db6464eac60da96345513964', 26, 'Homme', '', '', '', '', 0),
(100, 'adolphe', 'adolphe@gmail.com', '', '8cb2237d0679ca88db6464eac60da96345513964', 56, 'Homme', '', '', '', '', 0),
(101, 'thomas88', 'tomas@gmail.com', '', '8cb2237d0679ca88db6464eac60da96345513964', 55, 'Homme', '', '', '', '', 0),
(102, 'zzzzzzzzzzz', 'liam@gmail.com', '', '8cb2237d0679ca88db6464eac60da96345513964', 56, 'Homme', '', '', '', '', 0),
(103, 'liam', 'edwardo@gmail.com', '', '8cb2237d0679ca88db6464eac60da96345513964', 33, 'Homme', '', '', '', '', 0),
(104, 'nico', 'test@gmail.com', '', '8cb2237d0679ca88db6464eac60da96345513964', 56, 'Homme', '', '', '', '', 0),
(105, 'sandra', 'sandra@gmail.com', '', '8cb2237d0679ca88db6464eac60da96345513964', 32, 'Homme', '', '', '', '', 0),
(106, 'sandra02', '3232@gmail.com', '', '8cb2237d0679ca88db6464eac60da96345513964', 32, 'Homme', '', '', '', '', 0),
(107, 'sandra', 'ddddd@gmail.com', '', '8cb2237d0679ca88db6464eac60da96345513964', 32, 'Homme', '', '', '', '', 0),
(108, 'nico', 'nicooo@gmail.com', '', '8cb2237d0679ca88db6464eac60da96345513964', 56, 'Homme', '', '', '', '', 0),
(109, 'nico', '2626@gmail.com', '', '8cb2237d0679ca88db6464eac60da96345513964', 26, 'Homme', '', '', '', '', 0),
(110, 'dddddddd', 'paddtrick@gmail.com', '', '8cb2237d0679ca88db6464eac60da96345513964', 56, 'Homme', '', '', '', '', 0),
(111, 'remi_77148', '444444@gmail.com', '', '8cb2237d0679ca88db6464eac60da96345513964', 44, 'Homme', '', '', '', '', 0),
(112, 'eeee', 'eeeeeeeeeee@gmail.com', '', '8cb2237d0679ca88db6464eac60da96345513964', 26, 'Homme', '', '', '', '', 0),
(113, 'euro', 'aaaaaaa@gmail.com', '', '8cb2237d0679ca88db6464eac60da96345513964', 56, 'Homme', '', '', '', '', 0),
(114, 'ssss', 'sssss@gmail.com', '', '8cb2237d0679ca88db6464eac60da96345513964', 9, 'Homme', '', '', '', '', 0),
(115, 'ssss', 'ssqeer@gmail.com', '', '8cb2237d0679ca88db6464eac60da96345513964', 55, 'Homme', '', '', '', '', 0),
(116, 'eeeeeee', 'eeeeeeeeee@gmail.com', '', '8cb2237d0679ca88db6464eac60da96345513964', 23, 'Femme', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `id_expediteur` int(11) NOT NULL,
  `id_destinataire` int(11) NOT NULL,
  `message` text NOT NULL,
  `lu` int(11) NOT NULL,
  `objet` text NOT NULL,
  `img_msg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `id_expediteur`, `id_destinataire`, `message`, `lu`, `objet`, `img_msg`) VALUES
(31, 46, 49, 'tdffffffffff', 0, '', ''),
(33, 46, 49, 'sssssssss', 0, 'dddddddddddddddd', ''),
(34, 46, 49, 'sssssssss', 0, 'dddddddddddddddd', ''),
(36, 46, 53, 'ssssssssss', 1, 'ssssssssssssss', ''),
(37, 46, 53, 'ss', 1, 'ss', ''),
(38, 46, 46, 'sssssssssssss', 1, 'sssssssssss', ''),
(44, 53, 53, 'dddddddddddddd', 1, 'RE:ss', ''),
(47, 64, 65, 'oui ', 1, 'RE:salut ', ''),
(49, 53, 53, 'ssssss', 1, 'RE:ss', ''),
(50, 53, 53, 'sssssssssss', 0, 'RE:ss', ''),
(51, 53, 53, 'zzzzzzzzzz', 1, 'RE:ss', 'np_Crossfit guy at the gym_4Z19O5_free.jpg'),
(52, 53, 53, 'test', 1, 'RE:ss', 'np_Portrait of teenage girl in neon lit studio_0J23d0_free.jpg'),
(53, 53, 53, 'zzzzzzzzzzzz', 1, 'RE:ss', 'np_Man with shirt off in boxing practice_4jxZX0_free.jpg'),
(54, 53, 53, 'zzzzzzzzzzzzz', 1, 'RE:ss', 'np_Portrait of teenage girl in neon lit studio_0J23d0_free.jpg'),
(55, 53, 53, 'sssssss', 1, 'RE:ss', 'np_Teenage girl in dark coat wearing sunglasses and standing outdoor_0JxYK4_free.jpg'),
(56, 53, 53, 'ssssssssssss', 1, 'RE:ss', 'np_Man with shirt off in boxing practice_4jxZX0_free.jpg'),
(57, 53, 53, 'ssssssssss', 1, 'RE:ss', 'np_Dog and girl with their eyes closed nap on the bed together_0KM1Z4_free.jpg'),
(58, 53, 53, 'ssssssssss', 1, 'RE:ss', ''),
(59, 53, 53, 'cxcccccccccc', 1, 'RE:ss', 'np_Portrait of teenage girl in neon lit studio_0J23d0_free.jpg'),
(64, 91, 93, 'ok ', 1, 'test', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
