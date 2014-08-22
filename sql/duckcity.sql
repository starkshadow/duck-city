-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 22 Août 2014 à 10:26
-- Version du serveur: 5.5.29
-- Version de PHP: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données: `duckcity`
--

-- --------------------------------------------------------

--
-- Structure de la table `accessories`
--

CREATE TABLE `accessories` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `product_id` bigint(20) NOT NULL,
  `description` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Contenu de la table `accessories`
--

INSERT INTO `accessories` (`id`, `name`, `product_id`, `description`, `created`, `modified`) VALUES
(1, 'duck-base-face', 0, 'canard de base jaune', '2014-08-17 13:37:16', '2014-08-17 13:30:45'),
(2, 'duck-base-profil', 0, 'canard de base jaune', '2014-08-17 13:37:16', '2014-08-17 13:30:45'),
(3, 'duck-rouge-face', 0, 'canard de couleur rouge', '2014-08-17 13:37:16', '2014-08-17 13:30:45'),
(4, 'duck-rouge-profil', 0, 'canard de couleur rouge', '2014-08-17 13:37:16', '2014-08-17 13:30:45'),
(5, 'duck-rose-face', 0, 'canard de couleur rose', '2014-08-17 13:37:16', '2014-08-17 13:30:45'),
(6, 'duck-rose-profil', 0, 'canard de couleur rose', '2014-08-17 13:37:16', '2014-08-17 13:30:45'),
(7, 'duck-bleu-face', 0, 'canard de couleur bleu', '2014-08-17 13:37:16', '2014-08-17 13:30:45'),
(8, 'duck-bleu-profil', 0, 'canard de couleur bleu', '2014-08-17 13:37:16', '2014-08-17 13:30:45'),
(9, 'duck-peau-blanche-face', 0, 'canard de couleur de peau clair', '2014-08-17 13:37:16', '2014-08-17 13:30:45'),
(10, 'duck-peau-blanche-profil', 0, 'canard de couleur de peau clair', '2014-08-17 13:37:16', '2014-08-17 13:30:45'),
(11, 'duck-peau-metisse-face', 0, 'canard de couleur de peau métisse', '2014-08-17 13:37:16', '2014-08-17 13:30:45'),
(12, 'duck-peau-metisse-profil', 0, 'canard de couleur de peau métisse', '2014-08-17 13:37:16', '2014-08-17 13:30:45'),
(13, 'duck-peau-black-face', 0, 'canard de couleur de peau foncé', '2014-08-17 13:37:16', '2014-08-17 13:30:45'),
(14, 'duck-peau-black-profil', 0, 'canard de couleur de peau foncé', '2014-08-17 13:37:16', '2014-08-17 13:30:45'),
(15, 'costume-vacancier-face', 0, 'canard habillé en vacancier', '2014-08-17 13:37:16', '2014-08-17 13:30:45'),
(16, 'costume-vacancier-profil', 0, 'canard habillé en vacancier', '2014-08-17 13:37:16', '2014-08-17 13:30:45'),
(17, 'costume-geek-face', 0, 'canard habillé en geek', '2014-08-17 13:37:16', '2014-08-17 13:30:45'),
(18, 'costume-geek-profil', 0, 'canard habillé en geek', '2014-08-17 13:37:16', '2014-08-17 13:30:45'),
(19, 'costume-class-face', 0, 'canard habillé de façon classe', '2014-08-17 13:37:16', '2014-08-17 13:30:45'),
(20, 'costume-class-profil', 0, 'canard habillé de façon classe', '2014-08-17 13:37:16', '2014-08-17 13:30:45'),
(21, 'accessoire-trident-face', 0, 'accessoire trident du diable', '2014-08-17 13:37:16', '2014-08-17 13:30:45'),
(22, 'accessoire-trident-profil', 0, 'accessoire trident du diable', '2014-08-17 13:37:16', '2014-08-17 13:30:45'),
(23, 'accessoire-signe-diable-face', 0, 'accessoire signe du diable', '2014-08-17 13:37:16', '2014-08-17 13:30:45'),
(24, 'accessoire-signe-diable-profil', 0, 'accessoire signe du diable', '2014-08-17 13:37:16', '2014-08-17 13:30:45'),
(25, 'accessoire-lunettes-solaire-face', 0, 'accessoire lunettes solaire', '2014-08-17 13:37:16', '2014-08-17 13:30:45'),
(26, 'accessoire-lunettes-solaire-profil', 0, 'accessoire lunettes solaire', '2014-08-17 13:37:16', '2014-08-17 13:30:45'),
(27, 'accessoire-lunettes-geek-face', 0, 'accessoire lunette de geek', '2014-08-17 13:37:16', '2014-08-17 13:30:45'),
(28, 'accessoire-lunettes-geek-face', 0, 'accessoire lunette de geek', '2014-08-17 13:37:16', '2014-08-17 13:30:45'),
(29, 'accessoire-corne-face', 0, 'accessoire corne du diable', '2014-08-17 13:37:16', '2014-08-17 13:30:45'),
(30, 'accessoire-corne-profil', 0, 'accessoire corne du diable', '2014-08-17 13:37:16', '2014-08-17 13:30:45'),
(31, 'duck-base-face', 23, 'canard de base jaune', '2014-08-21 15:18:45', '2014-08-21 15:18:45');

-- --------------------------------------------------------

--
-- Structure de la table `boughtproducts`
--

CREATE TABLE `boughtproducts` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `user_address` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `product_price` double DEFAULT NULL,
  `product_quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `hexacode` varchar(255) NOT NULL COMMENT 'code of the color in hexadecimal',
  `product_id` bigint(20) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `colors`
--

INSERT INTO `colors` (`id`, `name`, `hexacode`, `product_id`, `created`, `modified`) VALUES
(1, 'black', '#FFFF', 23, '2014-08-21 15:49:18', '2014-08-21 15:49:18'),
(2, 'white', '#0000', 23, '2014-08-21 15:49:18', '2014-08-21 15:49:18');

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `_create` tinyint(1) NOT NULL,
  `_update` tinyint(1) NOT NULL,
  `_delete` tinyint(1) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` double DEFAULT NULL,
  `description` text,
  `theme` text,
  `imgprofil` varchar(255) DEFAULT NULL,
  `imgface` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Contenu de la table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `theme`, `imgprofil`, `imgface`, `user_id`, `created`, `modified`) VALUES
(1, 'duck army', 12.99, 'Le canard militaire est habillé d''un treillis militaire beige avec comme accessoire un casque. Ce canard militaire surveillera votre voiture de tous les dangers.', 'Ce canard militaire surveillera votre voiture de tous les dangers.', '/duck-city/data/products/1/duck_army_p.png', '/duck-city/data/products/1/duck_army_p.png', NULL, '2014-08-17 13:36:30', '2014-08-17 13:30:45'),
(3, 'duck cowboy', 12.99, 'Le canard cowboy est habillé d''une veste à frange marron, d''un bandana rouge et d''un chapeau le cowboy marron. Il tirera plus vite que son ombre sur les voleurs qui approcherons de votre voiture.', 'Le canard cowboy tirera plus vite que son ombre sur les voleurs qui approcherons de votre voiture.', '/duck-city/data/products/3/duck_cowboy_p.png', '/duck-city/data/products/3/duck_cowboy_p.png', NULL, '2014-08-17 13:36:30', '2014-08-17 13:30:45'),
(5, 'duck indien', 12.99, 'Le canard Indien porte une grande coiffe en plumes ainsi que des vêtements rappelant les indiens. Le canard indien vous invoquera la pluie ou le beau temps à votre demande.', 'Le canard indien vous invoquera la pluie ou le beau temps à votre demande.', '/duck-city/data/products/5/duck_indien_p.png', '/duck-city/data/products/5/duck_indien_p.png', NULL, '2014-08-17 13:36:30', '2014-08-17 13:30:45'),
(7, 'duck dj', 12.99, 'Le canard DJ porte un gros casque de musique orange sur une coiffure afro et un costume rose fluo. Le canard DJ mettra l''ambiance à l''arrière de votre voiture.', 'Le canard DJ mettra l''ambiance à l''arrière de votre voiture.', '/duck-city/data/products/7/duck_dj_p.png', '/duck-city/data/products/7/duck_dj_p.png', NULL, '2014-08-17 13:36:30', '2014-08-17 13:30:45'),
(9, 'duck disco', 12.99, 'Le canard disco a les cheveux et la peau noire et ses yeux sont légèrement maquillés. Sur ce canard on retrouve deux traits de couleur unie rose, et bleu cyan, et deux autres traits rouge et blanc à pois bleu.  ', 'Avec le canard disco, le son montera haut!', '/duck-city/data/products/9/duck_disco_p.png', '/duck-city/data/products/9/duck_disco_p.png', NULL, '2014-08-17 13:36:30', '2014-08-17 13:30:45'),
(11, 'duck diva', 12.99, 'Le canard diva est blonde, elle porte une belle robe blanche et noire ainsi qu''un collier de perle.  La diva fera craquer tout les passants. ', 'La diva fera craquer tout les passants.', '/duck-city/data/products/11/duck_diva_p.png', '/duck-city/data/products/11/duck_diva_p.png', NULL, '2014-08-17 13:36:30', '2014-08-17 13:30:45'),
(13, 'duck rock', 12.99, 'Le canard rockeur est habillé d''une veste sans manches noire, et d''un collier à piques. Il a aussi un tatouage d''étoile et de fil barbelé sur l''aile. Il est coiffé d''une très jolie crête jaune de rockeur. Le canard rockeur, avec lui vous serez vainqueurs.', 'Le canard rockeur, avec lui vous serez vainqueurs.', '/duck-city/data/products/13/duck_rock_p.png', '/duck-city/data/products/13/duck_rock_p.png', NULL, '2014-08-17 13:36:30', '2014-08-17 13:30:45'),
(15, 'duck paparazzi', 12.99, 'Le canard paparazzi est habillé d''un costume et d''un chapeau gris. Il est prêt à photographier avec son appareil au cou. Grâce au canard paparazzi, vous ne raterez plus aucune des stars qui passerons à coté de votre voiture.', 'Grâce au canard paparazzi, vous ne raterez plus aucune des stars qui passerons à coté de votre voiture.', '/duck-city/data/products/15/duck_paparazzi_p.png', '/duck-city/data/products/15/duck_paparazzi_p.png', NULL, '2014-08-17 13:36:30', '2014-08-17 13:30:45'),
(17, 'duck princesse', 12.99, 'Le canard princesse est habillé d''une robe rose et blanche, et d''un collier de perle. Elle porte une couronne sur sa belle coiffure blonde. La princesse duck donnera un coté girly à votre pare-choc.', 'La princesse duck donnera un coté girly à votre pare-choc.', '/duck-city/data/products/17/duck_princesse_p.png', '/duck-city/data/products/17/duck_princesse_p.png', NULL, '2014-08-17 13:36:30', '2014-08-17 13:30:45'),
(19, 'duck queen', 12.99, 'Le canard reine d''Angleterre porte l''uniforme royal de la reine, cnullest-à-dire une étoile, une écharpe et sans oublier la couronne royale. Le canard Queen deviendra l''objet incontournable en Angleterre.', 'Le canard Queen deviendra l''objet incontournable en Angleterre.', '/duck-city/data/products/19/duck_queen_p.png', '/duck-city/data/products/19/duck_queen_p.png', NULL, '2014-08-17 13:36:30', '2014-08-17 13:30:45'),
(21, 'duck royal guard', 12.99, 'Le canard de la garde royale porte le célèbre uniforme rouge ainsi que le chapeau à poil noir. Pour pouvoir protéger la reine d''Angleterre, il ne faut surtout pas oublier la garde royale. ', 'Pour pouvoir protéger la reine d''Angleterre, il ne faut surtout pas oublier la garde royale. ', '/duck-city/data/products/21/duck_royal_guard_p.png', '/duck-city/data/products/21/duck_royal_guard_p.png', NULL, '2014-08-17 13:36:30', '2014-08-17 13:30:45'),
(23, 'duckdodgers', 12.99, 'Le canard militaire est habillé d''un treillis militaire beige avec comme accessoire un casque. Ce canard militaire surveillera votre voiture de tous les dangers.', NULL, '/duck-city/data/products/23/duckdodgers_p.png', '/duck-city/data/products/23/duckdodgers_p.png', 27, '2014-08-21 15:17:41', '2014-08-21 15:17:41'),
(24, 'Duck space', 12.99, 'Le canard space porte l''uniforme orange des spationaute américain ainsi que son casque pour aller dans l''espace.', 'Le canard spationaute vous emmènera dans la lune.', '/duck-city/data/products/24/duckspace_p.png', '/duck-city/data/products/24/duckspace_f.png', NULL, '2014-08-21 00:00:00', '2014-08-21 00:00:00'),
(25, 'duck aquarius', 12.99, 'Le canard Verseau pour les personnes nées entre le 21 janvier et le 19 février.', 'Verseau : Avec des si on mettrait Paris en bouteille', '/duck-city/data/products/25/duckaquarius_p.png', '/duck-city/data/products/25/duckaquarius_f.png', NULL, '2014-08-21 00:00:00', '2014-08-21 00:00:00'),
(26, 'duck aries', 12.99, 'Le canard Bélier pour les personnes nées entre le 21 mars et le 20 avril.\r\n', 'Bélier : Mettre la charue avant les boeufs', '/duck-city/data/products/26/duckaries_p.png', '/duck-city/data/products/26/duckaries_f.png', NULL, '2014-08-21 00:00:00', '2014-08-21 00:00:00'),
(27, 'duck cancer', 12.99, 'Le canard Cancer pour les personnes nées entre le 22 juin et le 22 juillet.', 'Cancer : Ce que femme veut, dieu le veux ', '/duck-city/data/products/27/duckcancer_p.png', '/duck-city/data/products/27/duckcancer_f.png', NULL, '2014-08-21 00:00:00', '2014-08-21 00:00:00'),
(28, 'duck capricorn', 12.99, 'Le canard Capricorne pour les personnes nées entre le 22 décembre et le 20 janvier.', 'Capricorne : Mieux vaut tard que jamais ', '/duck-city/data/products/28/duckcapricorn_p.png', '/duck-city/data/products/28/duckcapricorn_f.png', NULL, '2014-08-21 00:00:00', '2014-08-21 00:00:00'),
(29, 'duck gemini', 12.99, 'Le canard Gémeaux pour les personnes nées entre le 22 mai et le 21 juin.', 'Gémeaux : Qui se ressemble s''assemble ', '/duck-city/data/products/29/duckgemini_p.png', '/duck-city/data/products/29/duckgemini_f.png', NULL, '2014-08-21 00:00:00', '2014-08-21 00:00:00'),
(30, 'duck leo', 12.99, 'Le canard Lion pour les personnes nées entre le 23 juillet et le 22 août.', 'Lion : Heureux au jeu malheureux en amour ', '/duck-city/data/products/30/duckleo_p.png', '/duck-city/data/products/30/duckleo_f.png', NULL, '2014-08-21 00:00:00', '2014-08-21 00:00:00'),
(31, 'duck libra', 12.99, 'Le canard Balance pour les personnes nées entre le 23 septembre et le 22 octobre.', 'Balance : Un homme averti en vaux deux', '/duck-city/data/products/31/ducklibra_p.png', '/duck-city/data/products/31/ducklibra_f.png', NULL, '2014-08-21 00:00:00', '2014-08-21 00:00:00'),
(32, 'duck pisces', 12.99, 'Le canard Poissons pour les personnes nées entre le 20 février et le 20 mars.', 'Poisson : Qui a bu boira', '/duck-city/data/products/32/duckpisces_p.png', '/duck-city/data/products/32/duckpisces_f.png', NULL, '2014-08-21 00:00:00', '2014-08-21 00:00:00'),
(33, 'duck sagittarius', 12.99, 'Le canard Sagittaire pour les personnes nées entre le 23 novembre et le 21 décembre.', 'Sagittaire : Plus on est de fou plus on rit ', '/duck-city/data/products/33/ducksagittarius_p.png', '/duck-city/data/products/33/ducksagittarius_f.png', NULL, '2014-08-21 00:00:00', '2014-08-21 00:00:00'),
(34, 'duck scorpio', 12.99, 'Le canard Scorpion pour les personnes nées entre le 23 octobre et le 22 novembre.', 'Scorpion : Qui s''y frotte s''y pique', '/duck-city/data/products/34/duckscorpio_p.png', '/duck-city/data/products/34/duckscorpio_f.png', NULL, '2014-08-21 00:00:00', '2014-08-21 00:00:00'),
(35, 'duck taurus', 12.99, 'Le canard Taureau pour les personnes nées entre le 21 avril et le 21 mai.', 'Taureau : L''appétit viens en mangeant.. ', '/duck-city/data/products/35/ducktaurus_p.png', '/duck-city/data/products/35/ducktaurus_f.png', NULL, '2014-08-21 00:00:00', '2014-08-21 00:00:00'),
(36, 'duck virgo', 12.99, 'Le canard Vierge pour les personnes nées entre le 23 août et le 22 septembre.', 'Vierge : Le travail c''est la santé', '/duck-city/data/products/36/duckvirgo_p.png', '/duck-city/data/products/36/duckvirgo_f.png', NULL, '2014-08-21 00:00:00', '2014-08-21 00:00:00'),
(37, 'duck punk', 12.99, 'Le canard punk est habillé d''une veste noire, et d''un collier à clou. Il a un tatouage de tête de mort sur l''aile et une très jolie crête noire. Le canard punk fera ressortir le coté rebel qui sommeil en vous.', 'Le canard punk fera ressortir le coté rebel qui sommeil en vous.', '/duck-city/data/products/37/duckpunk_p.png', '/duck-city/data/products/37/duckpunk_p.png', NULL, '2014-08-21 00:00:00', '2014-08-21 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `selectedproducts`
--

CREATE TABLE `selectedproducts` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `suits`
--

CREATE TABLE `suits` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `product_id` bigint(20) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` text NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `avatar_thumb` varchar(255) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `postcode` int(11) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `isadmin` tinyint(1) DEFAULT '-1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `email`, `password`, `firstname`, `lastname`, `avatar`, `avatar_thumb`, `number`, `street`, `city`, `postcode`, `country`, `isadmin`, `created`, `modified`) VALUES
(2, NULL, 'toto@bidon.com', 'eqffkdfdshfqshfsjksdhfjs&é&escs121ç', 'toto', 'idon', NULL, NULL, 4, NULL, NULL, NULL, NULL, -1, '2014-08-17 14:00:31', '2014-08-17 14:00:31'),
(9, 'Fanny', 'cayzeele1@hotmail.fr', '0b9c2625dc21ef05f6ad4ddf47c5f203837aa32c', 'fanny', 'cayzeele', '', '', 4, 'rue joliot curie', 'comines', 59560, 'france', 1, '2014-08-17 15:30:55', '2014-08-21 21:42:53'),
(21, 'Pit', 'mystic_mistean@msn.com', '6a7ec80c83773755d46811cb30e38ffbdf306c62', 'hanssens', 'peter', NULL, NULL, 43, 'Sint-Jansstraat', 'Wervik', 8940, 'Belgique', -1, '2014-08-18 03:24:51', '2014-08-18 03:24:51'),
(22, '__Daffy66', 'daffy.duck@gmail.com', '5f4e2019da6c56f66f7116b4a9d7757126600152', 'duck', 'daffy', '/duck-city/data/users/22/avatar.jpg', '/duck-city/data/users/22/avatar_thumb.jpg', 4, 'rud cannard', 'Duckcity', 654654, 'Duckland', -1, '2014-08-18 04:21:14', '2014-08-20 17:01:33'),
(23, 'fsdfd', 'efarfefe456@msn.com', '8306c9723de075cb830d2af05957291fe1787acb', 'blbabl', 'daffy', NULL, NULL, 43, 'rud cannard', 'Duckcity', 8940, 'Duckland', -1, '2014-08-18 05:32:48', '2014-08-18 05:32:48'),
(24, 'dqkljsdlkjf', 'lqskjdf@dljqskjf.com', '8306c9723de075cb830d2af05957291fe1787acb', '', '', NULL, NULL, 89, 'ezoijfsko', 'fklfklsdlj', 8452, 'djfsdfsjk', -1, '2014-08-18 11:50:06', '2014-08-18 11:50:06'),
(27, '_test_', 'test2@bidon.com', '911ddc3b8f9a13b5499b6bc4638a2b4f3f68bf23', 'Toto', 'Test', '/duck-city/data/users/25/avatar.jpg', '/duck-city/data/users/25/avatar_thumb.jpg', 9, 'avaeni dlkqsfj', 'Blabal', 49857, 'BaleLand', -1, '2014-08-21 11:17:30', '2014-08-21 11:17:50'),
(28, 'sdfqsdfsd', 'fqdfdsqs@fdklqjskl.com', '8306c9723de075cb830d2af05957291fe1787acb', 'sdgfd', 'dfsf', NULL, NULL, 56, 'qsdfqsdqs', 'qsdfsqfs', 9863, 'qzsdqsdqs', -1, '2014-08-21 18:03:34', '2014-08-21 18:03:34'),
(29, 'schoumie', 'schoumie2@gmail.com', 'b426373ce3bce4b965cc4b6f9770879e8a63a67f', 'schoumzelle', 'camille', '/duck-city/data/users/29/avatar.png', '/duck-city/data/users/29/avatar_thumb.png', 4, 'rue de la joie ', 'Duckcity', 50000, 'Duckland', -1, '2014-08-21 18:37:51', '2014-08-21 20:13:30');
