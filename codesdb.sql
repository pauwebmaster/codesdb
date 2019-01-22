-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 23 Oca 2019, 01:37:35
-- Sunucu sürümü: 5.7.24-0ubuntu0.18.10.1
-- PHP Sürümü: 7.2.10-0ubuntu1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `codesdb`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `codes`
--

CREATE TABLE `codes` (
  `id` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `codes`
--

INSERT INTO `codes` (`id`, `name`, `surname`, `content`) VALUES
(189, 'Cedric', 'Orp-Jauche', 'arrayl'),
(190, 'Henry', 'Huissen', 'hendrerit.id@loremvitaeodio.co.uk'),
(191, 'Dale', 'Falerone', 'erat.Vivamus@justoPraesentluctus.ca'),
(192, 'Drake', 'Denver', 'cursus.et.eros@ametconsectetueradipiscing.net'),
(193, 'Russell', 'Pordenone', 'ac@eleifendvitaeerat.edu'),
(194, 'Rigel', 'Saint-Lô', 'sed.leo.Cras@lectusa.net'),
(195, 'Len', 'Minto', 'fermentum@Proinultrices.co.uk'),
(196, 'Jameson', 'Fort St. John', 'at.nisi@erat.net'),
(197, 'Felix', 'Meerut', 'aliquam.eu@ultriciesligula.ca'),
(198, 'Eaton', 'Rosciano', 'elit@necmollis.net'),
(199, 'Beau', 'Fürstenwalde', 'in.molestie@id.co.uk'),
(200, 'Eagan', 'Empedrado', 'risus.Donec.nibh@auctorodio.com'),
(201, 'Jermaine', 'Assen', 'elit.fermentum.risus@vitaesemper.ca'),
(202, 'Jack', 'Asti', 'ullamcorper.magna@consequatenim.net'),
(203, 'Chandler', 'Caldera', 'In.lorem.Donec@quisdiam.com'),
(204, 'Martin', 'Mellery', 'mi@Nuncquisarcu.co.uk'),
(205, 'Thor', 'West Valley City', 'ipsum@Nuncpulvinararcu.com'),
(206, 'Quinn', 'Gullegem', 'Fusce@Nulla.net'),
(207, 'Brock', 'Lutsel K\'e', 'sed@veliteu.org'),
(208, 'Kenyon', 'Arquata del Tronto', 'eu@mauris.com'),
(209, 'Arsenio', 'Cambridge', 'neque@magna.org'),
(210, 'Hamish', 'Skövde', 'nec.cursus@volutpatornare.org'),
(211, 'Akeem', 'LiŽge', 'eu.arcu@felisadipiscingfringilla.com'),
(212, 'Gil', 'Igboho', 'elit.pharetra@magnis.com'),
(213, 'Brian', 'Crehen', 'fringilla.ornare@gravida.co.uk'),
(214, 'Deacon', 'Grand-Halleux', 'metus.vitae@vel.net'),
(215, 'Edward', 'Helkijn', 'ut@mauris.co.uk'),
(216, 'Theodore', 'Hannover', 'eu@inhendreritconsectetuer.net'),
(217, 'Carlos', 'Mjölby', 'Mauris.blandit.enim@Nulla.org'),
(218, 'Galvin', 'Rigolet', 'Phasellus.nulla.Integer@accumsan.co.uk'),
(219, 'Trevor', 'Serralunga d\'Alba', 'elementum@ut.net'),
(220, 'Dennis', 'Southwell', 'eleifend.Cras.sed@nec.ca'),
(221, 'Alden', 'Sant\'Agata sul Santerno', 'malesuada@risus.ca'),
(222, 'Rajah', 'Nueva Imperial', 'Suspendisse@Sedmalesuadaaugue.ca'),
(223, 'Lewis', 'Gonars', 'turpis.In@ipsum.org'),
(224, 'Seth', 'Cassano Spinola', 'mauris.rhoncus@faucibus.org'),
(225, 'Samson', 'Malbaie', 'ac.turpis@sed.edu'),
(226, 'Cameron', 'Olmen', 'nunc@etliberoProin.org'),
(227, 'Brennan', 'Jalandhar (Jullundur)', 'quis.turpis.vitae@auctorullamcorper.com'),
(228, 'Julian', 'Annapolis County', 'Integer.sem@mollisInteger.co.uk'),
(229, 'Joel', 'Salem', 'cursus.et.magna@nibhvulputatemauris.org'),
(230, 'Leo', 'Warminster', 'Lorem.ipsum@Suspendisseacmetus.org'),
(231, 'Trevor', 'Kansas City', 'purus.mauris@estNunc.net'),
(232, 'Tad', 'Passau', 'Sed.nec@interdumligulaeu.co.uk'),
(233, 'Duncan', 'Balurghat', 'et.magnis.dis@consectetuer.edu'),
(234, 'Cameron', 'Koszalin', 'non@nisimagnased.com'),
(235, 'Jared', 'Fort Providence', 'Sed.auctor@arcuCurabiturut.edu'),
(236, 'Ahmed', 'Sant\'Agata Bolognese', 'turpis.non.enim@eratvelpede.org'),
(237, 'Steel', 'Wechelderzande', 'felis.Nulla.tempor@auctornunc.net'),
(238, 'Andrew', 'Zuienkerke', 'condimentum@gravidamolestie.com'),
(239, 'Dane', 'Coalhurst', 'Suspendisse.sagittis@intempuseu.co.uk'),
(240, 'Amos', 'Tramatza', 'pede@Naminterdum.ca'),
(241, 'Kane', 'North Saanich', 'nisi.nibh.lacinia@loremtristique.co.uk'),
(242, 'Channing', 'Torchiarolo', 'mauris.ut@loremsitamet.net'),
(243, 'Dustin', 'Zelem', 'amet@ipsum.co.uk'),
(244, 'Hiram', 'Rocca Massima', 'Aliquam.auctor.velit@ametmetus.net'),
(245, 'Stone', 'Launceston', 'tincidunt@laoreetlibero.co.uk'),
(246, 'Robert', 'Fusignano', 'elit.pharetra.ut@neceleifendnon.co.uk'),
(247, 'Ryder', 'Nieuwmunster', 'Donec.porttitor@etmagnisdis.ca'),
(248, 'Jerry', 'Elmshorn', 'consectetuer.cursus.et@nulla.ca'),
(249, 'Keegan', 'Lowell', 'velit.Sed.malesuada@lacus.co.uk'),
(250, 'Ira', 'Köflach', 'lobortis.ultrices@vitaeodio.co.uk'),
(251, 'Alvin', 'Goderich', 'erat@malesuadavel.co.uk'),
(252, 'Stewart', 'Bocchigliero', 'orci@lorem.net'),
(253, 'Rashad', 'Paredones', 'ultrices.Duis@mollisnon.co.uk'),
(254, 'Gavin', 'Picture Butte', 'metus.In@magnaa.edu'),
(255, 'Macaulay', 'Casalvieri', 'nec@tellusjustosit.edu'),
(256, 'Thane', 'Hualqui', 'turpis@Vestibulum.ca'),
(257, 'Preston', 'Phoenix', 'risus@sempererat.edu'),
(258, 'Thomas', 'Valtournenche', 'quis.pede.Praesent@Phasellusnulla.co.uk'),
(259, 'Francis', 'Worcester', 'posuere.cubilia.Curae@necmalesuadaut.net'),
(260, 'Camden', 'Cap-de-la-Madeleine', 'tincidunt@lectus.org'),
(261, 'Cadman', 'Aurora', 'orci.in@consectetueradipiscingelit.org');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `codes`
--
ALTER TABLE `codes`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `codes`
--
ALTER TABLE `codes`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=262;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
