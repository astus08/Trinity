-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 20 Avril 2017 à 08:25
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `trinity`
--

-- --------------------------------------------------------

--
-- Structure de la table `activities`
--

CREATE TABLE `activities` (
  `id_activity` int(11) NOT NULL,
  `title` varchar(25) DEFAULT NULL,
  `description` text,
  `dateActivity` datetime DEFAULT NULL,
  `reccurence` int(11) DEFAULT NULL,
  `prix` int(11) DEFAULT NULL,
  `vote_enable` int(11) NOT NULL,
  `place` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `activities`
--

INSERT INTO `activities` (`id_activity`, `title`, `description`, `dateActivity`, `reccurence`, `prix`, `vote_enable`, `place`) VALUES
(1, 'Surf', 'Du surf', '2017-04-11 15:50:36', 0, 30, 0, 'lol mdr'),
(2, 'Geek\'o bowling', 'Du bowling pour les geeks', '2017-09-01 14:50:54', 0, 15, 1, 'lol mdr'),
(3, 'Natation', 'Nager comme les poissons', '2017-12-16 15:30:42', 0, 8, 1, 'lol mdr'),
(4, 'Boxe', 'Pour se taper dessus', '2017-06-06 20:30:12', 0, 15, 1, 'lol mdr'),
(5, 'Acrobranche', 'Monter dans les arbres', '2018-04-03 22:00:46', 0, 20, 1, 'lol mdr'),
(6, 'Ping-Pong', 'Comme du tennis, mais en plus petit', '2017-04-11 07:45:42', 0, 9, 1, 'lol mdr'),
(7, 'Escrime', 'Combats dignes de Zoro', '2017-10-30 19:45:05', 0, 10, 1, 'lol mdr'),
(8, 'Paintball', 'Pan-pan', '2017-05-30 19:00:30', 0, 25, 1, 'lol mdr'),
(9, 'Futsal', 'Du football. Mais dans une salle.', '2017-09-21 17:30:29', 0, 12, 1, 'lol mdr');

-- --------------------------------------------------------

--
-- Structure de la table `activities_subscribes`
--

CREATE TABLE `activities_subscribes` (
  `id_activity_subscribe` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_activity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `activities_vote`
--

CREATE TABLE `activities_vote` (
  `id_activity_vote` int(11) NOT NULL,
  `dateVote` datetime DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_activity` int(11) DEFAULT NULL,
  `date_sugg_vote` date NOT NULL,
  `time_sugg_vote` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `activities_vote`
--

INSERT INTO `activities_vote` (`id_activity_vote`, `dateVote`, `id_user`, `id_activity`, `date_sugg_vote`, `time_sugg_vote`) VALUES
(9, '2017-04-19 14:55:59', 1, 3, '2017-11-16', '15:30:42');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `categoryName` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`id_category`, `categoryName`) VALUES
(1, 'vetements'),
(2, 'goodies');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id_comment` int(11) NOT NULL,
  `content` text,
  `dateComment` datetime DEFAULT NULL,
  `id_picture_activity` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `comments`
--

INSERT INTO `comments` (`id_comment`, `content`, `dateComment`, `id_picture_activity`, `id_user`) VALUES
(1, 'commentaire', '2017-04-19 10:44:16', 19, 1);

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

CREATE TABLE `likes` (
  `id_like` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_picture_activity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `likes`
--

INSERT INTO `likes` (`id_like`, `id_user`, `id_picture_activity`) VALUES
(1, 1, 19);

-- --------------------------------------------------------

--
-- Structure de la table `pictures_activity`
--

CREATE TABLE `pictures_activity` (
  `id_picture_activity` int(11) NOT NULL,
  `path` varchar(512) DEFAULT NULL,
  `datePictureActivity` datetime DEFAULT NULL,
  `id_activity` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `pictures_activity`
--

INSERT INTO `pictures_activity` (`id_picture_activity`, `path`, `datePictureActivity`, `id_activity`, `id_user`) VALUES
(1, 'http://chan.catiewayne.com/c/src/138578149239.png', '2017-04-13 00:00:00', 1, 1),
(2, 'http://placehold.it/200x200', '2017-04-13 00:00:00', 1, 1),
(3, 'http://placehold.it/200x200', '2017-04-13 00:00:00', 1, 1),
(4, 'http://placehold.it/200x200', '2017-04-13 00:00:00', 1, 1),
(5, 'http://placehold.it/200x200', '2017-04-13 00:00:00', 1, 1),
(6, 'http://placehold.it/200x200', '2017-04-13 00:00:00', 1, 1),
(7, 'http://placehold.it/200x200', '2017-04-13 00:00:00', 1, 1),
(8, 'http://placehold.it/200x200', '2017-04-13 00:00:00', 1, 1),
(9, 'http://placehold.it/200x200', '2017-04-13 00:00:00', 1, 1),
(10, 'http://placehold.it/200x200', '2017-04-13 00:00:00', 1, 1),
(11, 'http://placehold.it/200x200', '2017-04-13 00:00:00', 1, 1),
(12, 'http://placehold.it/200x200', '2017-04-13 00:00:00', 1, 1),
(13, 'http://placehold.it/200x200', '2017-04-13 00:00:00', 1, 1),
(14, 'http://placehold.it/200x200', '2017-04-13 00:00:00', 2, 1),
(15, 'http://placehold.it/200x200', '2017-04-13 00:00:00', 2, 1),
(16, 'http://placehold.it/200x200', '2017-04-13 00:00:00', 2, 1),
(17, 'http://placehold.it/200x200', '2017-04-13 00:00:00', 2, 1),
(18, 'http://placehold.it/200x200', '2017-04-13 00:00:00', 2, 1),
(19, 'http://placehold.it/200x200', '2017-04-13 00:00:00', 3, 1),
(20, 'http://placehold.it/200x200', '2017-04-13 00:00:00', 3, 1),
(21, 'http://placehold.it/200x200', '2017-04-13 00:00:00', 3, 1),
(22, 'http://placehold.it/200x200', '2017-04-13 00:00:00', 4, 1),
(23, 'http://placehold.it/200x200', '2017-04-13 00:00:00', 4, 1),
(24, 'http://placehold.it/200x200', '2017-04-13 00:00:00', 5, 1),
(25, 'http://placehold.it/200x200', '2017-04-13 00:00:00', 6, 1),
(26, 'http://placehold.it/200x200', '2017-04-13 00:00:00', 7, 1);

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL,
  `img` varchar(512) DEFAULT NULL,
  `title` varchar(25) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `description` text,
  `quantity` int(11) DEFAULT NULL,
  `id_category` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `products`
--

INSERT INTO `products` (`id_product`, `img`, `title`, `price`, `description`, `quantity`, `id_category`) VALUES
(1, 'images/products/default.png', 'Casquette', 20, 'une belle casquette bde exia', 15, 1),
(2, 'images/products/default.png', 'Pull', 45, 'une beau pull bde exia', 25, 1),
(3, 'images/products/default.png', 'Chaussette', 15, 'de belle chaussettes bde exia', 15, 1),
(4, 'images/products/default.png', 'Hand Spinner', 5, 'un beau spinner bde exia', 15, 2),
(5, 'images/products/default.png', 'magnette cube', 10, 'Des aimants en forme de cube bde exia', 15, 2);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id_roles` int(11) NOT NULL,
  `roleName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `roles`
--

INSERT INTO `roles` (`id_roles`, `roleName`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Structure de la table `suggestions`
--

CREATE TABLE `suggestions` (
  `id_suggestion` int(11) NOT NULL,
  `content` text,
  `dateSuggestion` datetime DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `birthDate` date DEFAULT NULL,
  `id_roles` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id_user`, `lastName`, `firstName`, `avatar`, `email`, `pwd`, `birthDate`, `id_roles`) VALUES
(1, 'admin', 'admin', 'images/avatar/uploads/bender__futurama_by_supernaturalsarah.jpg', 'admin@admin.admin', '$2y$10$mncWy40DNBmODe9cLRkvuud2HTbqgjYWruQnRytA.W4ApVZT4sWhe', '1997-06-30', 1),
(2, 'test1', 'firstName1', 'images/avatar/default.png', 'test1@test.test', '$2y$10$mAHByzd2wfZcNpfS1vGpHeOsk0LU1chy62IxdvJZkqn0qQJl2SLaq', NULL, 1),
(3, 'test2', 'firstName2', 'images/avatar/default.png', 'test2@test.test', '$2y$10$mAHByzd2wfZcNpfS1vGpHeOsk0LU1chy62IxdvJZkqn0qQJl2SLaq', NULL, 1),
(4, 'test3', 'firstName3', 'images/avatar/default.png', 'test3@test.test', '$2y$10$mAHByzd2wfZcNpfS1vGpHeOsk0LU1chy62IxdvJZkqn0qQJl2SLaq', NULL, 1),
(5, 'test4', 'firstName4', 'images/avatar/default.png', 'test4@test.test', '$2y$10$mAHByzd2wfZcNpfS1vGpHeOsk0LU1chy62IxdvJZkqn0qQJl2SLaq', NULL, 1),
(6, 'test5', 'firstName5', 'images/avatar/default.png', 'test5@test.test', '$2y$10$mAHByzd2wfZcNpfS1vGpHeOsk0LU1chy62IxdvJZkqn0qQJl2SLaq', NULL, 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id_activity`);

--
-- Index pour la table `activities_subscribes`
--
ALTER TABLE `activities_subscribes`
  ADD PRIMARY KEY (`id_activity_subscribe`),
  ADD KEY `FK_activities_subscribes_id_user` (`id_user`),
  ADD KEY `FK_activities_subscribes_id_activity` (`id_activity`);

--
-- Index pour la table `activities_vote`
--
ALTER TABLE `activities_vote`
  ADD PRIMARY KEY (`id_activity_vote`),
  ADD KEY `FK_activities_vote_id_user` (`id_user`),
  ADD KEY `FK_activities_vote_id_activity` (`id_activity`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `FK_comments_id_picture_activity` (`id_picture_activity`),
  ADD KEY `FK_comments_id_user` (`id_user`);

--
-- Index pour la table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id_like`),
  ADD KEY `FK_likes_id_user` (`id_user`),
  ADD KEY `FK_likes_id_picture_activity` (`id_picture_activity`);

--
-- Index pour la table `pictures_activity`
--
ALTER TABLE `pictures_activity`
  ADD PRIMARY KEY (`id_picture_activity`),
  ADD KEY `FK_pictures_activity_id_activity` (`id_activity`),
  ADD KEY `FK_pictures_activity_id_user` (`id_user`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `FK_products_id_category` (`id_category`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_roles`);

--
-- Index pour la table `suggestions`
--
ALTER TABLE `suggestions`
  ADD PRIMARY KEY (`id_suggestion`),
  ADD KEY `FK_suggestions_id_user` (`id_user`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `FK_users_id_roles` (`id_roles`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `activities`
--
ALTER TABLE `activities`
  MODIFY `id_activity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `activities_subscribes`
--
ALTER TABLE `activities_subscribes`
  MODIFY `id_activity_subscribe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `activities_vote`
--
ALTER TABLE `activities_vote`
  MODIFY `id_activity_vote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `likes`
--
ALTER TABLE `likes`
  MODIFY `id_like` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `pictures_activity`
--
ALTER TABLE `pictures_activity`
  MODIFY `id_picture_activity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_roles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `suggestions`
--
ALTER TABLE `suggestions`
  MODIFY `id_suggestion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `activities_subscribes`
--
ALTER TABLE `activities_subscribes`
  ADD CONSTRAINT `FK_activities_subscribes_id_activity` FOREIGN KEY (`id_activity`) REFERENCES `activities` (`id_activity`),
  ADD CONSTRAINT `FK_activities_subscribes_id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Contraintes pour la table `activities_vote`
--
ALTER TABLE `activities_vote`
  ADD CONSTRAINT `FK_activities_vote_id_activity` FOREIGN KEY (`id_activity`) REFERENCES `activities` (`id_activity`),
  ADD CONSTRAINT `FK_activities_vote_id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `FK_comments_id_picture_activity` FOREIGN KEY (`id_picture_activity`) REFERENCES `pictures_activity` (`id_picture_activity`),
  ADD CONSTRAINT `FK_comments_id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Contraintes pour la table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `FK_likes_id_picture_activity` FOREIGN KEY (`id_picture_activity`) REFERENCES `pictures_activity` (`id_picture_activity`),
  ADD CONSTRAINT `FK_likes_id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Contraintes pour la table `pictures_activity`
--
ALTER TABLE `pictures_activity`
  ADD CONSTRAINT `FK_pictures_activity_id_activity` FOREIGN KEY (`id_activity`) REFERENCES `activities` (`id_activity`),
  ADD CONSTRAINT `FK_pictures_activity_id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_products_id_category` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`);

--
-- Contraintes pour la table `suggestions`
--
ALTER TABLE `suggestions`
  ADD CONSTRAINT `FK_suggestions_id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_users_id_roles` FOREIGN KEY (`id_roles`) REFERENCES `roles` (`id_roles`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
