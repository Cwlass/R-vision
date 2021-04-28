-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 07 avr. 2021 à 16:30
-- Version du serveur :  10.4.18-MariaDB
-- Version de PHP : 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `spotify`
--

-- --------------------------------------------------------

--
-- Structure de la table `artiste`
--

CREATE TABLE `artiste` (
  `id` int(12) NOT NULL,
  `name` varchar(20) COLLATE utf8_bin NOT NULL,
  `bio` text COLLATE utf8_bin NOT NULL,
  `gender` enum('Male','Female','Other','') COLLATE utf8_bin NOT NULL,
  `date_of_birth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `artiste`
--

INSERT INTO `artiste` (`id`, `name`, `bio`, `gender`, `date_of_birth`) VALUES
(1, 'Jay Smith', 'Jay Jon Christopher Smith (born 29 April 1981 in Helsingborg, Sweden) is a Swedish singer and guitarist. He won the Swedish Idol 2010 title, beating Minnah Karlsson in the 10 December 2010 finalin the Ericsson Globe theater. Jay Smith also plays in the band Von Benzo, which has released two studio albums.\r\n\r\nDuring Idol 2010, he created controversy announcing that he had smoked marijuana at one point during the program series. In an article in Expressen, Smith said that he could be sentenced to a fine for a minor drug offence. Conversely, TV4 television station allowed him to stay in the competition, provided he would not use drugs again during the show. ', 'Male', '1981-04-29'),
(2, 'Noah Guthrie', 'Youtube singer-song/writer started out doing unique acoustic covers, his career exploded covering \"Sexy and i know it\" in a great bluesy style.\r\nNow he writes his own stuff in a similar bluesy acoustic style', 'Male', '1994-01-25'),
(3, 'David Ferns', 'Just honestly the best musician in the world. His singing skills are truly extraordenary and from what I hear, he is an excelent lover!', 'Male', '1995-04-21'),
(4, 'Eminem', 'Marshall Bruce Mathers III, known professionally as Eminem, is an American rapper, songwriter, and record producer. Eminem is among the best-selling music artists of all time, with estimated worldwide sales of more than 220 million records.', 'Male', '1972-08-07');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(12) NOT NULL,
  `title` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `title`) VALUES
(1, 'ROCK'),
(2, 'POP'),
(3, 'RAP');

-- --------------------------------------------------------

--
-- Structure de la table `playlists`
--

CREATE TABLE `playlists` (
  `id` int(12) NOT NULL,
  `title` varchar(20) COLLATE utf8_bin NOT NULL,
  `creation_date` date NOT NULL,
  `#user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `playlist_content`
--

CREATE TABLE `playlist_content` (
  `playlist_id` int(12) NOT NULL,
  `song_id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `songs`
--

CREATE TABLE `songs` (
  `ID` int(12) NOT NULL,
  `title` varchar(20) COLLATE utf8_bin NOT NULL,
  `release_date` date NOT NULL,
  `categ_id` int(12) NOT NULL,
  `artiste_id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `songs`
--

INSERT INTO `songs` (`ID`, `title`, `release_date`, `categ_id`, `artiste_id`) VALUES
(2, 'Black jesus', '2010-05-16', 1, 1),
(3, 'Bad father', '2014-04-21', 1, 1),
(4, 'Lose yourself', '2002-08-22', 3, 4),
(5, 'The real Slim Shady', '2003-06-20', 3, 4),
(6, 'The best song in the', '2021-04-07', 2, 3),
(7, 'Sexy and i know it', '2012-02-15', 1, 2),
(8, 'Nice Rock Bro', '2021-07-04', 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `ID` int(12) NOT NULL,
  `first_name` varchar(20) COLLATE utf8_bin NOT NULL,
  `last_name` varchar(20) COLLATE utf8_bin NOT NULL,
  `mail` varchar(20) COLLATE utf8_bin NOT NULL,
  `password` varchar(70) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`ID`, `first_name`, `last_name`, `mail`, `password`) VALUES
(1, 'David', 'Ferns', 'david@gmail.com', '$2y$10$L9TvWnxtJb1mbWS3tAenzuYpFbmEUkDUk9uXmbmXw1LIp8khPc.Fy'),
(2, 'Simon', 'Dupont', 'simon@gmail.com', '$2y$10$C5T..0Pv4sl8Lg2Er1aa/u6YkEVpkh.VUUa89oSswPfVTKpfQ5Mdm'),
(3, 'Liora', 'Devillers', 'litch@gmail.com', '$2y$10$KamN0ComNQ64Nzm0sERc2O9EzQHZFDQuF/Uhh1C1zIv0QNoULEMUy');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `artiste`
--
ALTER TABLE `artiste`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `playlists_ibfk_1` (`#user_id`);

--
-- Index pour la table `playlist_content`
--
ALTER TABLE `playlist_content`
  ADD KEY `playlist_id` (`playlist_id`),
  ADD KEY `song_id` (`song_id`);

--
-- Index pour la table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `artiste_id` (`artiste_id`),
  ADD KEY `categ_id` (`categ_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `artiste`
--
ALTER TABLE `artiste`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `songs`
--
ALTER TABLE `songs`
  MODIFY `ID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `playlists`
--
ALTER TABLE `playlists`
  ADD CONSTRAINT `playlists_ibfk_1` FOREIGN KEY (`#user_id`) REFERENCES `users` (`ID`);

--
-- Contraintes pour la table `playlist_content`
--
ALTER TABLE `playlist_content`
  ADD CONSTRAINT `playlist_content_ibfk_1` FOREIGN KEY (`playlist_id`) REFERENCES `playlists` (`id`),
  ADD CONSTRAINT `playlist_content_ibfk_2` FOREIGN KEY (`song_id`) REFERENCES `songs` (`ID`);

--
-- Contraintes pour la table `songs`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `songs_ibfk_1` FOREIGN KEY (`artiste_id`) REFERENCES `artiste` (`id`),
  ADD CONSTRAINT `songs_ibfk_2` FOREIGN KEY (`categ_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
