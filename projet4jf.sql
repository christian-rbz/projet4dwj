-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 13 juin 2020 à 15:28
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet4jf`
--

-- --------------------------------------------------------

--
-- Structure de la table `chapters`
--

DROP TABLE IF EXISTS `chapters`;
CREATE TABLE IF NOT EXISTS `chapters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `chapters`
--

INSERT INTO `chapters` (`id`, `title`, `content`) VALUES
(1, 'Chapitre 1 : Un nouveau départ', '<p>Publicam igitur se publicam ut neque rem loco ceteris contra in tum spatio futuros aliquantum tum nos cum publicae curriculoque ut cum consuetudo sumus turpes in tum contra in oporteat de et causa fateatur accipienda curriculoque peccatis rem peccatis casus prospicere maiorum longe nec in lex casus Deflexit rsqqsfsqsqfq ogemus nec causa minime amicitia prospicere loco Etenim nos et spatio et oporteat de accipienda rogemus sumus et est iam res Deflexit excusatio ut prospicere si ut si est rei peccatis loco nos minime rei rem Etenim maiorum rogemus in rei fateatur causa oporteat faciamus tum fateatur quis accipienda longe nos peccatis.</p>'),
(2, 'Chapitre 2 : Une rencontre inattendue', 'Quisque faceremus in quisque Quam Quam modum detrahique ab in precari facimus aliquem satis detrahunt rebus quae sit animatus multa in supplicare acerbius insectarique non ipsi fiunt nulli enim vehementius invehi multaeque commodis supplicare se amici ut quae iis de non multa quae in detrahique amicorum Quam indigno sit amici multa acerbius supplicare prima acerbius nostris animatus nulli sunt satis ad numquam in animatus sit numquam quisque non acerbius boni fiunt Nec non nostra nostris in insectarique Nec se sic causa ab trium sit acerbius faceremus in amicum detrahunt detrahique suis in res de detrahique amicorum ab prima commodis enim'),
(3, 'Chapitre 3 : Renaissance', '<p>His consuetudine ut virosque contenta contenta interpretemur magnificentia est contenta metiamur virosque bonos docti verborum interpretemur docti ex qui Philos docti Galos contenta contenta vitae vita his omittamus eos omittamus docti communis eos bonos numeremus contenta vitae omittamus Galos verborum Philos magnificentia qui eam consuetudine reperiuntur bonos omittamus vitae vita vitae his vita habentur nostri nec virtutem Philos omittamus eos nostri qui omittamus Catones omnino Catones reperiuntur Philos quidam communis Paulos his virtutem his communis communis his contenta magnificentia virosque quidam numeremus Galos nostri sermonisque verborum virosque ut Scipiones ex consuetudine vita quidam vitae omnino reperiuntur eos virtutem bonos virtutem.</p>');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_chapter` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `date_comment` datetime NOT NULL DEFAULT current_timestamp(),
  `signaled` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=98 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `id_chapter`, `pseudo`, `comment`, `date_comment`, `signaled`) VALUES
(96, 1, 'Philippe', 'Lorem ipsum dolor sit amet', '2020-06-13 17:22:03', 1),
(60, 30, 'Pseudo <script> test </script>', 'test <script> test 2 </script>', '2020-05-23 01:48:52', 2),
(76, 30, 'test', 'test', '2020-05-29 09:06:46', 0),
(94, 3, 'Christian', 'Commentaire', '2020-06-12 03:02:28', 2),
(97, 2, 'Jean-Baptiste', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus.', '2020-06-13 17:22:43', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identifiant` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `identifiant`, `email`, `password`) VALUES
(1, 'Jean', 'christian.reubrez@gmail.com', '$2y$10$aC3fU2XiMZ0dwq3L/kMhVejmcTw7b9zqdVAwSlqUk1Chg5URes3l2');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
