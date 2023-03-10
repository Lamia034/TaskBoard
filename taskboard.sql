-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 27 fév. 2023 à 21:10
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `taskboard`
--

-- --------------------------------------------------------

--
-- Structure de la table `tasks`
--

CREATE TABLE `tasks` (
  `TaskId` int(11) NOT NULL,
  `TaskName` varchar(50) NOT NULL,
  `TaskStatus` varchar(10) NOT NULL,
  `TaskDeadline` date DEFAULT NULL,
  `UserId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tasks`
--

INSERT INTO `tasks` (`TaskId`, `TaskName`, `TaskStatus`, `TaskDeadline`, `UserId`) VALUES
(9, 'pp', 'Done', '2023-01-24', 0),
(14, 'Array', 'Array', NULL, 0),
(15, 'Array', 'Array', NULL, 0),
(24, 'xx', 'Done', '2023-01-27', 0),
(26, 'ff', 'Doing', '2022-12-08', 0),
(27, 'mmmm', 'Doing', '2023-01-26', 0),
(30, 'll', 'Doing', '2023-01-01', 0),
(31, 'ss', 'Doing', '2023-02-02', 0),
(32, 'll', 'Doing', '2022-12-01', 0),
(33, 'something', 'ToDo', '2023-01-24', 0),
(34, 'other', 'ToDo', '2023-01-25', 0),
(35, 'ss', 'ToDo', '2023-01-23', 0),
(36, 'first', 'Doing', '2023-01-25', 25),
(37, 'sec', 'ToDo', '2023-01-29', 25),
(38, 'thir', 'Done', '2023-01-18', 25),
(39, 'Ggt', 'Doing', '2023-01-22', 21),
(40, 'mm', 'ToDo', '2023-01-12', 21),
(53, 'sqq', 'Done', '2023-01-08', 21),
(54, 'wwwwww', 'Done', '2023-01-22', 21),
(55, 'iiiiiiiiiii', 'Done', '2023-01-25', 21),
(56, 'qqqqqqq', 'Doing', '2023-01-08', 21),
(57, 'aaaaaaaaaaaaaaaaaaaa', 'Done', '2023-01-01', 21),
(58, 'yyyyyyy', 'ToDo', '2023-01-04', 21),
(59, 'uuuuuuuuuu', 'ToDo', '2023-02-02', 21),
(60, 'lamia', 'ToDo', '2023-01-05', 21),
(61, 'samia', 'Doing', '2023-02-05', 21),
(62, 'pop', 'Done', '2023-02-04', 21),
(63, 'test', 'Doing', '2023-02-12', 25),
(64, 'makettage pfr', 'Done', '2023-02-22', 29),
(65, 'hotel', 'Done', '2023-02-22', 29),
(66, 'mavisa', 'Doing', '2023-02-23', 29),
(67, 'milliondolar', 'ToDo', '2023-02-27', 29),
(68, 'culture web', 'Doing', '2023-02-23', 29),
(69, 'derniere version makettage ', 'Done', '2023-02-27', 29),
(70, 'video 3 min parle de moi mem', 'ToDo', '2023-02-26', 29);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `UserId` int(11) NOT NULL,
  `UserName` varchar(10) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`UserId`, `UserName`, `Email`, `Password`) VALUES
(21, 'l', 'l@gmail.com', '$2y$10$PGUb97t/XuBYEvROj/ei5OyPDlLsIwce.YVO/cRB9ZuMNYe/Od/wa'),
(25, 'lamia', 'lamia@gmail.com', '$2y$10$IuU4enqnAZV//RZSJo25Yu.cjU0Px8jFVCoGWjTTFMGkA8g/QqOcC'),
(28, 'mona', 'mona@gmail.com', '$2y$10$5XdHhOsvikACWhv1fBXybexTFLtSOmuUZMHVr6T2p7SXGujxqmfWa'),
(29, 'prv', 'prv@gmail.com', '$2y$10$x6rJpueUUZvMtye4OUoh7us1wZdwQTGORhse9j5Y73D7xqCZzoCg.');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`TaskId`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `TaskId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
