-- --------------------------------------------------------
-- Hostitel:                     127.0.0.1
-- Verze serveru:                10.1.8-MariaDB - mariadb.org binary distribution
-- OS serveru:                   Win32
-- HeidiSQL Verze:               9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Exportování struktury pro tabulka rychecky.certificate
DROP TABLE IF EXISTS `certificate`;
CREATE TABLE IF NOT EXISTS `certificate` (
  `row_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID záznamu',
  `certificate_id` int(11) DEFAULT NULL COMMENT 'ID certifikátu',
  `type` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL COMMENT 'Typ certifikátu',
  `name` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL COMMENT 'Název certifikátu',
  `detail` text COLLATE utf8_czech_ci COMMENT 'Detailní popis',
  `issue_date` date DEFAULT NULL COMMENT 'Datum vystavení',
  `issue_by` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL COMMENT 'Vystavitel',
  `url` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL COMMENT 'URL certifikátu',
  `visible` tinyint(4) DEFAULT '1' COMMENT 'Viditelný?',
  `added` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Přidáno',
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Změněno',
  PRIMARY KEY (`row_id`),
  KEY `visible` (`visible`),
  KEY `certificate_id` (`certificate_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci ROW_FORMAT=COMPACT COMMENT='Seznam dovedností/znalostí';

-- Exportování dat pro tabulku rychecky.certificate: ~0 rows (přibližně)
/*!40000 ALTER TABLE `certificate` DISABLE KEYS */;
INSERT INTO `certificate` (`row_id`, `certificate_id`, `type`, `name`, `detail`, `issue_date`, `issue_by`, `url`, `visible`, `added`, `timestamp`) VALUES
	(1, 1, 'MOOC', 'Usable Security', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vitae massa non libero blandit rhoncus non sit amet quam. Nunc neque justo, auctor et luctus eget, faucibus ac mauris. Donec eleifend, velit at malesuada pulvinar, leo lorem pulvinar nunc, ut ornare erat metus nec odio. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin venenatis finibus diam, sodales lacinia leo. Morbi tempor fermentum neque eu ornare. Pellentesque convallis odio ligula, a pharetra sem dignissim sit amet. Sed sit amet aliquam risus. Nulla sagittis ex sit amet eros pretium, et interdum metus vestibulum. Vestibulum tellus lorem, finibus eu mollis quis, varius in nulla.\r\n\r\nVestibulum non arcu nec lectus molestie facilisis vel eu dolor. Aenean a nibh ac sem semper tincidunt. Praesent id massa at libero pharetra tincidunt a et erat. Quisque id nibh at ex mollis suscipit. Aenean tristique mattis justo vitae venenatis. Praesent sed enim euismod, scelerisque diam eu, interdum sapien. Pellentesque aliquam, nulla ut consectetur consequat, ligula elit condimentum velit, ut hendrerit nisi elit in tortor. Curabitur in lorem vitae mi blandit venenatis sit amet non mi. Praesent rutrum est lacus. Donec commodo placerat nisl, eget bibendum nunc auctor rutrum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque et lacus nisl. Duis mattis, eros eu aliquam hendrerit, ante metus varius velit, in viverra eros tellus efficitur nunc. In hac habitasse platea dictumst. Aenean a placerat leo.', '2015-08-10', 'University of Maryland, College Park', 'https://www.coursera.org/account/accomplishments/verify/E2GJU2HNKU', 1, '2016-04-14 22:01:32', '2016-05-04 23:30:15');
/*!40000 ALTER TABLE `certificate` ENABLE KEYS */;


-- Exportování struktury pro tabulka rychecky.experience
DROP TABLE IF EXISTS `experience`;
CREATE TABLE IF NOT EXISTS `experience` (
  `row_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID záznamu',
  `experience_id` int(11) DEFAULT NULL COMMENT 'ID zkušenosti',
  `type` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL COMMENT 'Typ zkušenosti',
  `title` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL COMMENT 'Název zkušenosti',
  `company` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL COMMENT 'Společnost',
  `date_start` date DEFAULT NULL COMMENT 'Datum začátku',
  `date_end` date DEFAULT NULL COMMENT 'Datum konce',
  `detail` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL COMMENT 'Detailní popis',
  `note` text COLLATE utf8_czech_ci COMMENT 'Poznámka',
  `visible` tinyint(4) DEFAULT '1' COMMENT 'Viditelný?',
  `added` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Přidáno',
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Změněno',
  PRIMARY KEY (`row_id`),
  KEY `hobby_id_visible` (`experience_id`,`visible`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci ROW_FORMAT=COMPACT COMMENT='Seznam dovedností/znalostí';

-- Exportování dat pro tabulku rychecky.experience: ~5 rows (přibližně)
/*!40000 ALTER TABLE `experience` DISABLE KEYS */;
INSERT INTO `experience` (`row_id`, `experience_id`, `type`, `title`, `company`, `date_start`, `date_end`, `detail`, `note`, `visible`, `added`, `timestamp`) VALUES
	(1, 1, 'Zaměstnání', 'Operátor reaktorových smyček', 'Centrum výzkumu Řež s.r.o', '2011-01-01', '2014-05-01', 'Operátor experimentálních smyček výzkumného reaktoru LVR-15. Materiálový výzkum pro jaderné elektrárny na vodní, superkritické vodní a vysokoteplotní héliové smyčce…', 'Částečný úvazek při studiu. Pracovník se zdroji ionizujícího záření.', 1, '2016-04-14 21:42:13', '2016-05-04 23:05:18'),
	(2, 2, 'Zaměstnání', 'Aplikační specialista junior', 'Centrum výzkumu Řež s.r.o', '2013-07-01', NULL, 'Tvorba a spravování několika webů společnosti věnující se jadernému výzkumu. Rozdílné CMS, firemní komunikace, dotační programy EU…', NULL, 1, '2016-04-14 21:42:13', '2016-05-04 22:23:30'),
	(3, 3, 'Vzdělání', 'SŠLVT Odolena Voda', 'Strojírenství se zaměřením na počítačové aplikace', '2006-09-01', '2010-06-30', 'Střední škola letecké a výpočetní techniky v Odolene Vodě. Strojírenství, kostrukce, práce v CAD a CNC systémech a tvorba webových prezentací… Odmaturováno s vyznamenáním.', 'Odmaturováno s vyznamenáním.', 1, '2016-04-14 21:42:13', '2016-05-04 23:05:39'),
	(4, 4, 'Vzdělání', 'ZŠ Kralupy', 'Základní škola Jana Amose Komenského', '1996-09-01', '2005-05-04', 'Veřejná základní škola v Kralupech nad Vltavou', NULL, 1, '2016-05-04 22:22:09', '2016-05-04 22:34:35'),
	(5, 5, 'Vzdělání', 'ČVUT FBMI', 'ČVUT', '2013-05-04', '2014-10-04', 'Tři semestry bakalářského studia obooru Biomedicínská informatika. Nedokončeno.', 'nedokončeno', 1, '2016-05-04 22:23:15', '2016-05-04 23:01:19');
/*!40000 ALTER TABLE `experience` ENABLE KEYS */;


-- Exportování struktury pro tabulka rychecky.gallery
DROP TABLE IF EXISTS `gallery`;
CREATE TABLE IF NOT EXISTS `gallery` (
  `row_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID záznamu',
  `portfolio_id` int(11) DEFAULT NULL COMMENT 'ID portfolia',
  `path` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL COMMENT 'Cesta k souboru',
  `filename` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL COMMENT 'Název souboru',
  `visible` tinyint(4) DEFAULT '1' COMMENT 'Viditelný?',
  `added` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Přidáno',
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Změněno',
  PRIMARY KEY (`row_id`),
  KEY `portfolio_id` (`portfolio_id`),
  KEY `visible` (`visible`),
  CONSTRAINT `e2_gallery/portfolio_id` FOREIGN KEY (`portfolio_id`) REFERENCES `portfolio` (`portfolio_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- Exportování dat pro tabulku rychecky.gallery: ~13 rows (přibližně)
/*!40000 ALTER TABLE `gallery` DISABLE KEYS */;
INSERT INTO `gallery` (`row_id`, `portfolio_id`, `path`, `filename`, `visible`, `added`, `timestamp`) VALUES
	(1, 6, '/portfolio/', 'elextern_th.png', 1, '2016-04-17 16:19:55', '2016-04-17 16:27:12'),
	(2, 7, '/portfolio/', 'e2_th.png', 1, '2016-04-17 16:19:55', '2016-04-17 16:36:51'),
	(3, 19, '/portfolio/', 'epp_th.png', 1, '2016-04-17 16:19:55', '2016-04-17 16:36:51'),
	(4, 1, '/portfolio/', 'cvrez_th.png', 1, '2016-04-17 16:19:55', '2016-04-17 16:36:51'),
	(5, 18, '/portfolio/', 'corona2_th.png', 1, '2016-04-17 16:19:55', '2016-04-17 16:42:40'),
	(6, 11, '/portfolio/', 'csfd_e_th.png', 1, '2016-04-17 16:19:55', '2016-04-17 16:45:25'),
	(7, 12, '/portfolio/', 'excel2sql_th.png', 1, '2016-04-17 17:09:33', '2016-04-17 17:09:34'),
	(8, 5, '/portfolio/', 'nwf_th.png', 1, '2016-04-17 17:19:31', '2016-04-17 17:19:38'),
	(9, 2, '/portfolio/', 'susen_th.png', 1, '2016-04-17 17:20:22', '2016-04-17 17:20:42'),
	(10, 3, '/portfolio/', 'enpedie_th.png', 1, '2016-04-17 19:21:17', '2016-04-17 19:21:17'),
	(11, 17, '/portfolio/', 'energochemie_th.png', 1, '2016-04-17 19:21:47', '2016-04-17 19:21:53'),
	(12, 4, '/portfolio/', 'fukusima_th.png', 1, '2016-04-17 19:23:13', '2016-04-17 19:23:36'),
	(13, 13, '/portfolio/', 'srt_th.png', 1, '2016-04-17 19:24:59', '2016-04-17 19:25:14');
/*!40000 ALTER TABLE `gallery` ENABLE KEYS */;


-- Exportování struktury pro tabulka rychecky.hobby
DROP TABLE IF EXISTS `hobby`;
CREATE TABLE IF NOT EXISTS `hobby` (
  `row_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID záznamu',
  `hobby_id` int(11) DEFAULT NULL COMMENT 'ID koníčku',
  `name` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL COMMENT 'Název koníčku',
  `size` float DEFAULT '1' COMMENT 'Velikost slova v cloudu',
  `visible` tinyint(4) DEFAULT '1' COMMENT 'Viditelný?',
  `added` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Přidáno',
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Změněno',
  PRIMARY KEY (`row_id`),
  KEY `visible` (`visible`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci ROW_FORMAT=COMPACT COMMENT='Seznam dovedností/znalostí';

-- Exportování dat pro tabulku rychecky.hobby: ~16 rows (přibližně)
/*!40000 ALTER TABLE `hobby` DISABLE KEYS */;
INSERT INTO `hobby` (`row_id`, `hobby_id`, `name`, `size`, `visible`, `added`, `timestamp`) VALUES
	(1, 1, 'Informační technologie', 1, 1, '2016-04-14 21:04:57', '2016-04-14 21:06:53'),
	(2, 2, 'Sociální sítě', 0.8, 1, '2016-04-14 21:05:33', '2016-04-14 21:06:59'),
	(3, 3, 'Seriály', 0.6, 1, '2016-04-14 21:05:46', '2016-04-14 21:07:06'),
	(4, 4, 'Věda & technika', 0.8, 1, '2016-04-14 21:05:56', '2016-04-14 21:07:15'),
	(5, 5, 'Čtení', 0.8, 1, '2016-04-14 21:07:27', '2016-04-14 21:07:27'),
	(6, 6, 'Webové technologie', 1, 1, '2016-04-14 21:07:38', '2016-04-14 21:07:38'),
	(7, 7, 'Filmy', 0.7, 1, '2016-04-14 21:07:45', '2016-04-14 21:07:50'),
	(8, 8, 'Mobilní telefony', 0.5, 1, '2016-04-14 21:07:56', '2016-04-14 21:09:02'),
	(9, 9, 'Programování', 0.8, 1, '2016-04-14 21:08:06', '2016-04-14 21:09:03'),
	(10, 10, 'Hudba', 0.7, 1, '2016-04-14 21:08:11', '2016-04-14 21:09:04'),
	(11, 11, 'Hardware', 0.6, 1, '2016-04-14 21:08:18', '2016-04-14 21:09:05'),
	(12, 12, 'Počítačové hry', 0.7, 1, '2016-04-14 21:08:24', '2016-04-14 21:09:06'),
	(13, 13, 'Grafika & design', 0.6, 1, '2016-04-14 21:08:39', '2016-04-14 21:09:07'),
	(14, 14, 'Počítačová bezpečnost', 0.7, 1, '2016-04-14 21:08:48', '2016-04-14 21:09:09'),
	(15, 15, 'Fotografování', 0.6, 1, '2016-04-14 21:08:55', '2016-04-14 21:09:10'),
	(16, 16, 'Anime', 0.5, 1, '2016-04-14 21:08:59', '2016-04-14 21:09:11'),
	(17, 17, 'Tvorba titulků', 0.7, 1, '2016-05-04 20:57:06', '2016-05-04 21:53:37');
/*!40000 ALTER TABLE `hobby` ENABLE KEYS */;


-- Exportování struktury pro tabulka rychecky.portfolio
DROP TABLE IF EXISTS `portfolio`;
CREATE TABLE IF NOT EXISTS `portfolio` (
  `row_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID záznamu',
  `portfolio_id` int(11) DEFAULT NULL COMMENT 'ID portfolia',
  `type` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL COMMENT 'Typ (kategorie) portfolia',
  `name` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL COMMENT 'Název dovednosti',
  `name_short` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL COMMENT 'Hodnota (míra) dovednosti',
  `detail` text COLLATE utf8_czech_ci COMMENT 'Textový popis',
  `detail_short` text COLLATE utf8_czech_ci COMMENT 'Zkrácený textový popis',
  `company` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `github` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `interesting` tinyint(4) DEFAULT '0' COMMENT 'Zajímavé?',
  `working` tinyint(4) DEFAULT '1',
  `visible` tinyint(4) DEFAULT '1' COMMENT 'Viditelný?',
  `added` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Přidáno',
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Změněno',
  PRIMARY KEY (`row_id`),
  KEY `portfolio_id_visible` (`portfolio_id`,`visible`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci ROW_FORMAT=COMPACT COMMENT='Seznam dovedností/znalostí';

-- Exportování dat pro tabulku rychecky.portfolio: ~20 rows (přibližně)
/*!40000 ALTER TABLE `portfolio` DISABLE KEYS */;
INSERT INTO `portfolio` (`row_id`, `portfolio_id`, `type`, `name`, `name_short`, `detail`, `detail_short`, `company`, `url`, `date_start`, `date_end`, `size`, `github`, `interesting`, `working`, `visible`, `added`, `timestamp`) VALUES
	(1, 1, 'Profesionální', 'Centrum výzkumu Řež s.r.o.', 'CVŘ', 'Dvojjazyčný robustní web prezentující společnost Centrum výzkumu Řež s.r.o., jenž se specializuje na jadernou energetiku. Stránky využívají nejmodernější technologie včetně mikroformátů a verze pro mobilní telefony. Je naplněn velkým množstvím informací o infrastruktuře společnosti a prováděném výzkumu zejména na poli jaderné energetiky. Bylo dbáno zejména na odbornou správnost. Web je postaven na systému Wordpress.', 'Obsáhlý web společnosti v oblasti jaderného výzkumu.', 'Centrum výzkumu Řež s.r.o.', 'http://cvrez.cz/', '2013-09-01', NULL, 60, NULL, 1, 1, 1, '2016-04-14 18:24:00', '2016-04-17 17:32:53'),
	(2, 3, 'Profesionální', 'Enpedie: portál na podporu veřejné informovanosti v oblasti jaderné energetiky', 'Enpedie', 'Projekt společnosti Centrum výzkumu Řež s.r.o., který si klade za cíl pomocí wiki formátu udržovat a rozšiřovat informovanost o jaderné energetice. Hesla jsou vkládána a revidována odborníky na obor, tudíž jejich relevance je vyšší než z nevalidovaných zdrojů. Web je postaven na systému Mediawiki.', 'Wiki hesel s tématikou nejenom jaderné energetiky.', 'Centrum výzkumu Řež s.r.o.', 'http://enpedie.cz/', '2013-11-01', NULL, 30, NULL, 1, 1, 1, '2016-04-14 18:24:00', '2016-04-17 17:52:26'),
	(22, 4, 'Profesionální', 'Fukušima', 'Fukušima: otázky', 'Projekt Státního úřadu pro jadernou bezpečnost (SÚJB) společně s Centrem výzkumu Řež s.r.o. Web vznikl na jaře 2011 jako bezprostřední reakce na havárii jaderné elektrárny Fukušima v Japonsku. Dotazy uživatelů kladené elektronicky zodpovídali uznávaní jaderní odborníci z celé republiky, včetně paní Drábové. Web je postaven na systému Drupal.', 'Dotazy a odpovědi k havárii Fukušimy v&nbsp;Japonsku.', 'Centrum výzkumu Řež s.r.o.', 'http://otazky-fukusima.cvrez.cz/', '2013-06-01', '2013-06-01', 30, NULL, 0, 1, 1, '2016-04-14 18:24:00', '2016-04-17 17:52:57'),
	(23, 5, 'Osobní', 'Native Warez Forum', 'NWF', 'Projekt s téměř 45 tisíci návštěvami měsíčně (Google Analytics) a 80 tisíci registrovanými uživateli. Forum slouží pro sdílení souborů mezi uživateli. Systém SMF je silně modifikován vlastními unikátními doplňky. Velká komunita může NWF podporovat i na jeho stránkách na Facebooku a dalších sociálních sítích. Web je postaven na systému Simple Machines Forum (SMF).', 'Fórum pro sdílení souborů s téměr 80&nbsp;tisíci uživateli.', NULL, 'http://nwf.cz/', '2010-11-01', NULL, 70, NULL, 1, 1, 1, '2016-04-14 18:24:00', '2016-04-17 17:53:03'),
	(24, 6, 'Profesionální', 'ELEXTERN: Electricity Externalities for Better Planning', 'ELEXTERN', 'Webový nástroj pro výpočet nákladů jednotlivých zdrojů energií elektrické energie. Systém započítává ceny externalit jako jsou náklady na léčbu rakoviny způsobené ozářením nebo cena půdy zabrané solárními elekrárnami. Tyto stránky využívají AJAX a Google Chart API.', 'Kalkulátor nákladů jednotlivých zdrojů elektřiny. Interaktivní znázornění v grafech.', NULL, 'http://elextern.eu/', '2015-01-01', NULL, 50, 'https://github.com/jaCUBE/elextern', 1, 1, 1, '2016-04-14 18:24:00', '2016-04-17 17:32:54'),
	(25, 7, 'Profesionální', 'E2', 'CVŘ E2', 'Velký interní systém pro správu zaměstnanců a personalistiku ve společnosti zaměřené na jaderný výzkum. Některé vybrané funkce systému: timesheet a přehledy i s grafy, správa dovolený s přehledem, komplexní management pracovních cest a konferencí, řízení rizik, systemizace pracovních míst, přidělování a evidence úkolů atd.  Systém využívá LESS, AJAX, PDO a další pokročilé technologie.Takřka rok práce na plný úvazek, přes 300 uživatelů (zaměstnanců), přes 300 commitů v Gitu, pět tisíc souborů, sto tabulek v databázi...', 'Robustní systém pro personální, projektové a finanční řízení vědecké organizace.', 'Centrum výzkumu Řež s.r.o.', 'http://e2.cvrez.cz/', '2015-01-01', NULL, 100, NULL, 1, 1, 1, '2016-04-14 18:24:00', '2016-04-17 17:32:52'),
	(26, 8, 'Profesionální', 'Portál společnosti CVŘ', 'Interní portál CVŘ', 'Administrátorská správa portálu postaveného pod technologií Liferay.', 'Správa interního portálu na systému LifeRay.', 'Centrum výzkumu Řež s.r.o.', NULL, '2015-01-01', '2015-01-01', 30, NULL, 0, 0, 1, '2016-04-14 18:24:00', '2016-04-17 17:42:46'),
	(27, 9, 'Profesionální', 'Web hotelu Na Plovárně v Humpolci', 'Hotel Na Plovárně', 'Menší webová prezentace hotelu na Vysočině.', 'Web hotelu a restaurantu.', NULL, 'http://hotel-humpolec.cz/', '2014-10-01', '2014-10-01', 30, NULL, 0, 1, 1, '2016-04-14 18:24:00', '2016-04-17 17:42:51'),
	(28, 10, 'Profesionální', 'Web překladatele Translatech', 'Translatech', 'Menší webová prezentace překladatelských služeb v oblasti jaderné energetiky.', 'Web odborného překladatele.', NULL, 'http://translatech.cz/', '2014-06-01', '2014-06-01', 30, NULL, 0, 1, 1, '2016-04-14 18:24:00', '2016-04-17 17:42:52'),
	(29, 11, 'Osobní', 'ČSFD Extended Userscript', 'ČSFD Extended', NULL, 'Javascript do prohlížeče, který rozšiřuje funkce filmového serveru ČSFD.', NULL, 'https://greasyfork.org/cs/scripts/15784-%C4%8Csfd-extended', '2015-12-31', NULL, 20, 'https://github.com/jaCUBE/CSFD-Extended', 1, 1, 1, '2016-04-14 18:24:00', '2016-04-17 17:33:05'),
	(30, 12, 'Osobní', 'Excel2SQL', 'Excel2SQL', NULL, 'Nástroj pro převod dat z tabulky Excel do&nbsp;SQL kódu.', NULL, 'http://excel2sql.rychecky.cz/', '2015-10-10', NULL, 30, 'https://github.com/jaCUBE/excel2sql', 1, 1, 1, '2016-04-14 18:24:00', '2016-04-17 17:53:20'),
	(31, 13, 'Osobní', 'SRT Tool', 'SRT Tool', NULL, 'Utilita kontrolující typografii českých filmových titulků.', NULL, 'http://srt.rychecky.cz/', '2016-04-14', NULL, 20, NULL, 0, 1, 1, '2016-04-14 18:24:01', '2016-04-17 17:26:47'),
	(32, 14, 'Profesionální', 'NUSIM 2014', 'NUSIM 2014', NULL, 'Web a registrační systém konference NUSIM 2014.', NULL, 'http://nusim2014.cz/', '2014-10-06', '2014-10-06', 30, NULL, 0, 0, 1, '2016-04-14 18:24:01', '2016-04-17 17:42:56'),
	(33, 15, 'Profesionální', 'Pátý blok Dukovany', 'Pátý blok Dukovany', NULL, 'Web a registrační systém konference o jaderné elektrárně Dukovany.', 'EventEra', 'http://patyblokdukovany.cz/', '2015-01-09', '2015-01-09', 30, NULL, 0, 1, 1, '2016-04-14 18:24:01', '2016-04-17 17:42:57'),
	(34, 16, 'Profesionální', 'Malé reaktory', 'Malé reaktory', NULL, 'Web a registrační systém konference Malé reaktory.', 'EventEra', 'http://malereaktory.cz/', '2016-01-12', '2016-01-12', 30, NULL, 0, 1, 1, '2016-04-14 18:24:01', '2016-04-17 17:42:59'),
	(35, 17, 'Profesionální', 'Energochemie', 'Energochemie', NULL, 'Web a registrační systém 38. ročníku semináře Energochemie.', 'EventEra', 'http://energochemie.cz/', '2016-04-17', '2016-04-17', 30, NULL, 0, 1, 1, '2016-04-14 18:24:01', '2016-04-17 17:43:00'),
	(36, 18, 'Profesionální', 'Horizon 2020 CORONA II', 'CORONA II', NULL, 'Web evropského projektu pro výuku jaderných reaktorů.', 'Centrum výzkumu Řež s.r.o.', 'http://corona2.eu/', '2015-11-17', NULL, 30, NULL, 0, 1, 1, '2016-04-14 18:24:01', '2016-04-17 17:22:58'),
	(37, 19, 'Profesionální', 'Efektivní přenos poznatků v energetice', 'EPP Projekt', NULL, NULL, 'Centrum výzkumu Řež s.r.o.', 'http://epp-projekt.cz/', '2013-11-17', '2013-11-17', 30, NULL, 0, 1, 1, '2016-04-14 18:24:01', '2016-04-17 17:43:03'),
	(38, 20, 'Profesionální', 'Horizon 2020 VINCO', 'VINCO', NULL, NULL, 'Centrum výzkumu Řež s.r.o.', 'http://project-vinco.eu/', '2016-02-17', NULL, 30, NULL, 0, 1, 1, '2016-04-14 18:24:01', '2016-04-17 16:48:16'),
	(39, 2, 'Profesionální', 'SUStainable ENergy (SUSEN)', 'SUSEN', 'Web velkého výzkumného projektu ve dvou jazycích. Projekt SUSEN představuje dotaci přes dvě miliardy korun, které posílí výzkumnou infrastrukturu v energetice České republiky a budou významným impulsem k rozvoji týmů, znalostí a technologií. Web obsahuje informace o programech a automatické zobrazování aktuálních výběrových řízení díky RSS kanálu.\nVzhledem připomíná mateřský web společnosti CVŘ, v jejíž režii se projekt SUSEN odehrává. Web je postaven na systému Wordpress.', 'Webová prezentace velkého výzkumného projektu Udržitelná energetika.', 'Centrum výzkumu Řež s.r.o.', 'http://susen2020.cz/', '2014-04-17', NULL, 40, NULL, 0, 1, 1, '2016-04-14 18:24:45', '2016-04-17 17:29:48');
/*!40000 ALTER TABLE `portfolio` ENABLE KEYS */;


-- Exportování struktury pro tabulka rychecky.skill
DROP TABLE IF EXISTS `skill`;
CREATE TABLE IF NOT EXISTS `skill` (
  `row_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID záznamu',
  `skill_id` int(11) DEFAULT NULL COMMENT 'ID dovednosti',
  `type` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL COMMENT 'Typ (kategorie) dovednosti',
  `name` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL COMMENT 'Název dovednosti',
  `value` int(11) DEFAULT NULL COMMENT 'Hodnota (míra) dovednosti',
  `detail` text COLLATE utf8_czech_ci COMMENT 'Textový popis',
  `visible` tinyint(4) DEFAULT '1' COMMENT 'Viditelný?',
  `added` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Přidáno',
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Změněno',
  PRIMARY KEY (`row_id`),
  KEY `skill_id_visible` (`skill_id`,`visible`),
  KEY `skill_value` (`value`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci COMMENT='Seznam dovedností/znalostí';

-- Exportování dat pro tabulku rychecky.skill: ~34 rows (přibližně)
/*!40000 ALTER TABLE `skill` DISABLE KEYS */;
INSERT INTO `skill` (`row_id`, `skill_id`, `type`, `name`, `value`, `detail`, `visible`, `added`, `timestamp`) VALUES
	(1, 1, 'Webdev', 'HTML', 85, 'Syntaxe jazyku HTML4 a XHTML. Znalost HTML 5 a zkušenosti s tvorbou sémantického webu (mikroformáty).', 1, '2016-04-14 18:14:51', '2016-04-14 22:49:13'),
	(2, 2, 'Webdev', 'CSS + LESS', 85, 'Kaskádové styly a design webových stránek včetně moderního CSS3. Zkušenosti s využitím LESS.', 1, '2016-04-14 18:14:52', '2016-04-14 22:49:14'),
	(3, 3, 'Webdev', 'PHP', 75, 'Ovládání skriptovacího jazyka PHP5 včetně objektově orientovaného programování (OOP).', 1, '2016-04-14 18:14:52', '2016-04-14 22:49:14'),
	(4, 4, 'Webdev', 'SQL + MySQL', 65, 'Používání dotazovacího jazyka SQL. Návrh, správa a optimalizace open source databáze MySQL.', 1, '2016-04-14 18:14:52', '2016-04-14 22:49:14'),
	(5, 5, 'Webdev', 'Javascript + jQuery', 65, 'Implementace Javascriptu do webu, zkušenosti s používáním frameworků jQuery a jQuery UI na reálných projektech.', 1, '2016-04-14 18:14:52', '2016-04-14 22:49:15'),
	(6, 6, 'Webdev', 'SEO', 50, 'Optimalizace pro vyhledávače. Správná syntaxe při psaní kódu, vhodná struktura stránek a metrika návštěvnosti.', 1, '2016-04-14 18:14:52', '2016-04-14 22:49:15'),
	(7, 7, 'Webdev', 'Sociální sítě', 50, 'Schopnost a zkušenost se správou známých sociálních sítí jako Facebook či YouTube. Základní povědomí o pravidlech a omezení, sledování novinek.', 1, '2016-04-14 18:14:52', '2016-04-14 22:49:15'),
	(8, 8, 'Webdev', 'Apache (LAMP)', 25, 'Zkušenosti s konfigurací virtuálního privátního serveru (VPS) včetně instalace PHP, modulů do PHP…', 1, '2016-04-14 18:14:52', '2016-04-14 22:49:16'),
	(9, 9, 'Webdev', 'CMS: SMF', 40, 'Bohaté zkušenosti se systémem Simple Machines Forum (SMF) pro internetová fóra. Znalost vnitřních procesů, psaní vlastních unikátních rozšíření…', 1, '2016-04-14 18:14:52', '2016-04-14 22:49:15'),
	(10, 10, 'Webdev', 'CMS: Wordpress', 40, 'Dobrá znalost systému Wordpress z uživatelského i administrátorského hlediska.', 1, '2016-04-14 18:14:52', '2016-04-14 22:49:16'),
	(11, 11, 'Webdev', 'CMS: MediaWiki', 30, 'Znalosti správy systému na bázi MediaWiki včetně konfigurace.', 1, '2016-04-14 18:14:52', '2016-04-14 22:49:16'),
	(12, 12, 'Webdev', 'CMS: Drupal', 15, 'Základní znalost.', 1, '2016-04-14 18:14:52', '2016-04-14 22:49:17'),
	(13, 13, 'Webdev', 'CMS: PHPBB', 15, 'Základní znalost.', 1, '2016-04-14 18:14:52', '2016-04-14 22:49:18'),
	(14, 14, 'ICT', 'Photoshop', 60, 'Pokročila znalost grafického programu Adobe Photoshop. Zkušenosti se zpracováním fotografií z formátu RAW.', 1, '2016-04-14 18:14:52', '2016-04-14 22:39:58'),
	(15, 15, 'ICT', 'MS Office', 60, 'Dobrá znalost součástí balíku Microsoft Office.', 1, '2016-04-14 18:14:52', '2016-04-14 22:40:00'),
	(16, 16, 'ICT', 'Sony Vegas', 20, 'Základní znalost střihu videa.', 1, '2016-04-14 18:14:52', '2016-04-14 22:40:03'),
	(17, 17, 'ICT', 'Autocad + Inventor', 25, 'Základní znalost programu Autodesk AutoCAD a Autodesk Inventor.', 1, '2016-04-14 18:14:52', '2016-04-14 22:40:03'),
	(18, 18, 'ICT', 'Bezpečnost', 45, 'Zájem o zabezpečení počítačů, sítí, webových stránek. Kryptografie, ochrana dat…', 1, '2016-04-14 18:14:52', '2016-04-14 22:40:01'),
	(19, 19, 'ICT', 'Google', 60, 'Využívání a administrace dokumentů na Google Drive. Využívání Google Chart API pro vykreslování grafů.', 1, '2016-04-14 18:14:52', '2016-04-14 22:40:00'),
	(20, 20, 'ICT', 'C# + .NET', 25, 'Základy objektového programování desktopových aplikací v C# za využití grafického rozhraní Windows a frameworku .NET.', 1, '2016-04-14 18:14:52', '2016-04-14 22:40:03'),
	(21, 21, 'ICT', 'Matlab', 20, 'Základní znalost programovacího jazyka na bázi FORTRAN.', 1, '2016-04-14 18:14:53', '2016-04-14 22:40:03'),
	(22, 22, 'ICT', 'Cinema 4D', 20, 'Základní znalost 3D modelování.', 1, '2016-04-14 18:14:53', '2016-04-14 22:40:04'),
	(23, 23, 'ICT', 'Java', 15, 'Základní znalost.', 1, '2016-04-14 18:14:53', '2016-04-14 22:40:04'),
	(24, 24, 'ICT', 'Hardware', 45, 'Znalost počítačových komponent a periferií.', 1, '2016-04-14 18:14:53', '2016-04-14 22:40:01'),
	(25, 25, 'ICT', 'InDesign', 30, 'Lepší znalost programu pro sázení a typografickou úpravu, Adobe InDesign.', 1, '2016-04-14 18:14:53', '2016-04-14 22:40:01'),
	(26, 26, 'ICT', 'Illustrator', 20, 'Základní znalost programu pro tvorbu vektorové grafiky, Adobe Illustrator.', 1, '2016-04-14 18:14:53', '2016-04-14 22:40:04'),
	(27, 27, 'Jazyky', 'Čeština', 90, 'Znalost češtiny na pokročilé úrovni z hlediska gramatiky a stylistiky. Zkušenosti s proofreadingem a korekturou vědeckých textů.', 1, '2016-04-14 18:14:53', '2016-04-14 18:14:53'),
	(28, 28, 'Jazyky', 'Angličtina', 75, 'Znalost angličtiny na úrovni upper-intermediate. Bezproblémová schopnost komunikovat i číst technickou dokumentaci.', 1, '2016-04-14 18:14:53', '2016-04-14 18:14:53'),
	(29, 29, 'Ostatní', 'Marketing & PR', 30, 'Základní znalost firemní komunikace, zkušenosti s prací na oddělení komunikace vědecké společnosti.', 1, '2016-04-14 18:14:53', '2016-04-14 22:39:39'),
	(30, 30, 'Ostatní', 'Jaderná energetika', 20, 'Základní fungování jaderného reaktoru. Zkušenost s prací se zdroji ionizujícího záření (pracovník kategorie A).', 1, '2016-04-14 18:14:53', '2016-04-14 22:39:39'),
	(31, 31, 'Ostatní', 'Strojírenství', 15, 'Elementární znalost norem či konstrukce.', 1, '2016-04-14 18:14:53', '2016-04-14 22:39:39'),
	(32, 32, 'Webdev', 'Git + GitHub', 35, 'Základní práce s verzovacím systémem Git a repozitáři na GitHubu.', 1, '2016-04-14 18:14:53', '2016-04-14 22:49:16'),
	(33, 33, 'Webdev', 'Python', 20, 'Základní znalost programovacího jazyka Python.', 1, '2016-04-14 18:14:53', '2016-04-14 22:49:17'),
	(34, 34, 'Ostatní', 'Fotografování', 40, 'Znalost práce s DSLR (zrcadlovka), principů a praxi fotografie včetně digitálních úprav.', 1, '2016-04-14 18:14:53', '2016-04-14 22:39:37');
/*!40000 ALTER TABLE `skill` ENABLE KEYS */;


-- Exportování struktury pro tabulka rychecky.social
DROP TABLE IF EXISTS `social`;
CREATE TABLE IF NOT EXISTS `social` (
  `row_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID záznamu',
  `social_id` int(11) NOT NULL DEFAULT '0' COMMENT 'ID profilu na sociální síti',
  `name` varchar(1024) COLLATE utf8_czech_ci DEFAULT NULL COMMENT 'Název sítě',
  `url` varchar(1024) COLLATE utf8_czech_ci DEFAULT NULL COMMENT 'URL profilu',
  `text` varchar(1024) COLLATE utf8_czech_ci DEFAULT NULL COMMENT 'Jiný text',
  `icon` varchar(1024) COLLATE utf8_czech_ci DEFAULT NULL COMMENT 'Ikona FontAwesome',
  `color` varchar(32) COLLATE utf8_czech_ci DEFAULT NULL COMMENT 'Barva (hex)',
  `value` int(11) DEFAULT '0' COMMENT 'Hodnota pořadí',
  `visible` tinyint(4) DEFAULT '1' COMMENT 'Viditelný?',
  `added` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Přidáno',
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Změněno',
  PRIMARY KEY (`row_id`),
  KEY `visible` (`visible`),
  KEY `social_id` (`social_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci COMMENT='Odkazy na profily na sociálních sítích';

-- Exportování dat pro tabulku rychecky.social: ~10 rows (přibližně)
/*!40000 ALTER TABLE `social` DISABLE KEYS */;
INSERT INTO `social` (`row_id`, `social_id`, `name`, `url`, `text`, `icon`, `color`, `value`, `visible`, `added`, `timestamp`) VALUES
	(1, 2, 'Facebook', 'https://www.facebook.com/jakub.rychecky', NULL, 'fa-facebook', '#3F5C9A', 90, 1, '2016-05-04 20:52:27', '2016-05-04 21:57:50'),
	(2, 1, 'LinkedIn', 'https://www.linkedin.com/in/rychecky', NULL, 'fa-linkedin', '#1884BB', 100, 1, '2016-05-04 20:52:55', '2016-05-04 21:57:19'),
	(3, 4, 'ČSFD', 'http://www.csfd.cz/uzivatel/99999-jacube/', NULL, 'fa-film', '#CF080F', 30, 1, '2016-05-04 20:53:09', '2016-05-04 21:58:57'),
	(4, 6, 'DatabazeKnih', 'http://www.databazeknih.cz/uzivatele/jacube-38935', NULL, 'fa-book', '#9F393A', 0, 1, '2016-05-04 20:53:27', '2016-05-04 21:59:22'),
	(5, 3, 'GitHub', 'https://github.com/jaCUBE', NULL, 'fa-github', '#444444', 50, 1, '2016-05-04 20:53:44', '2016-05-04 21:58:39'),
	(6, 5, 'Steam', 'http://steamcommunity.com/id/jacube/', NULL, 'fa-steam', '#000000', 30, 1, '2016-05-04 20:54:24', '2016-05-04 21:21:34'),
	(7, 7, 'Skype', NULL, 'fext.cz', 'fa-skype', NULL, 0, 0, '2016-05-04 20:55:18', '2016-05-04 21:09:13'),
	(8, 8, 'Last.fm', 'http://www.last.fm/user/jaCUBExCZ', NULL, 'fa-lastfm', '#B90000', 0, 1, '2016-05-04 20:55:47', '2016-05-04 22:00:07'),
	(9, 9, 'Flickr', 'https://www.flickr.com/photos/rychecky/', NULL, 'fa-picture-o', '#FF0084', 0, 1, '2016-05-04 20:56:09', '2016-05-04 21:59:49'),
	(10, 10, 'Titulky.com', 'http://www.titulky.com/?UserDetail=449856', NULL, 'fa-align-center', '#4376A1', 0, 1, '2016-05-04 20:56:51', '2016-05-04 22:00:24');
/*!40000 ALTER TABLE `social` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
