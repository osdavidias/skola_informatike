-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.21 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for skola_informatike
CREATE DATABASE IF NOT EXISTS `skola_informatike` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `skola_informatike`;


-- Dumping structure for table skola_informatike.polaznici
CREATE TABLE IF NOT EXISTS `polaznici` (
  `br_polaznika` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `adresa` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mjesto` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `slika` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tecaj` int(11) NOT NULL,
  PRIMARY KEY (`br_polaznika`),
  UNIQUE KEY `mail` (`mail`),
  UNIQUE KEY `username` (`username`),
  KEY `tecaj` (`tecaj`),
  CONSTRAINT `FK_polaznici_predavaci` FOREIGN KEY (`tecaj`) REFERENCES `predavaci` (`br_predavaca`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table skola_informatike.polaznici: ~4 rows (approximately)
/*!40000 ALTER TABLE `polaznici` DISABLE KEYS */;
INSERT INTO `polaznici` (`br_polaznika`, `ime`, `prezime`, `adresa`, `mjesto`, `slika`, `mail`, `username`, `password`, `tecaj`) VALUES
	(5, 'Ivo', 'Ivić', 'Visoka 16', 'Osijek', 'cov2.jpg', 'ivo@hotmail.com', 'ivkan', '81dc9bdb52d04dc20036dbd8313ed055', 2),
	(6, 'Ana', 'Anić', 'Strossmayerova 120', 'Osijek', 'cura.jpg', 'ana.anic@net.hr', 'ana1', 'b59c67bf196a4758191e42f76670ceba', 1),
	(7, 'Darko', 'Darkić', 'Neka 124', 'Osijek', 'bean.jpg', 'darkod@gmail.com', 'dark', 'e2fc714c4727ee9395f324cd2e7f331f', 1),
	(8, 'Crnko', 'Crnić', 'Strma 45', 'Osijek', 'neki.jpg', 'ccrni@mail.com', 'crni', '4a7d1ed414474e4033ac29ccb8653d9b', 3);
/*!40000 ALTER TABLE `polaznici` ENABLE KEYS */;


-- Dumping structure for table skola_informatike.predavaci
CREATE TABLE IF NOT EXISTS `predavaci` (
  `br_predavaca` int(11) NOT NULL,
  `ime_predavaca` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prezime_predavaca` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `naziv_tecaja` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `slika_predavaca` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`br_predavaca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table skola_informatike.predavaci: ~3 rows (approximately)
/*!40000 ALTER TABLE `predavaci` DISABLE KEYS */;
INSERT INTO `predavaci` (`br_predavaca`, `ime_predavaca`, `prezime_predavaca`, `naziv_tecaja`, `slika_predavaca`) VALUES
	(1, 'Pero', 'Perić', 'PHP', 'pre1.jpg'),
	(2, 'Jure', 'Jurić', 'C#', 'pre2.jpg'),
	(3, 'Miki', 'Mikić', 'Java', 'pre3.jpg');
/*!40000 ALTER TABLE `predavaci` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
