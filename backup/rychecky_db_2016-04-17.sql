-- --------------------------------------------------------
-- Hostitel:                     127.0.0.1
-- Verze serveru:                10.1.9-MariaDB - mariadb.org binary distribution
-- OS serveru:                   Win32
-- HeidiSQL Verze:               9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Exportování struktury databáze pro
CREATE DATABASE IF NOT EXISTS `rychecky` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci */;
USE `rychecky`;


-- Exportování struktury pro tabulka rychecky.certificate
CREATE TABLE IF NOT EXISTS `certificate` (
  `row_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID záznamu',
  `certificate_id` int(11) DEFAULT NULL COMMENT 'ID certifikátu',
  `type` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL COMMENT 'Typ certifikátu',
  `name` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL COMMENT 'Název certifikátu',
  `detail` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL COMMENT 'Detailní popis',
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
	(1, 1, 'MOOC', 'Usable Security', NULL, '2015-08-10', 'University of Maryland, College Park', 'https://www.coursera.org/account/accomplishments/verify/E2GJU2HNKU', 1, '2016-04-14 22:01:32', '2016-04-14 22:02:53');
/*!40000 ALTER TABLE `certificate` ENABLE KEYS */;


-- Exportování struktury pro tabulka rychecky.experience
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci ROW_FORMAT=COMPACT COMMENT='Seznam dovedností/znalostí';

-- Exportování dat pro tabulku rychecky.experience: ~3 rows (přibližně)
/*!40000 ALTER TABLE `experience` DISABLE KEYS */;
INSERT INTO `experience` (`row_id`, `experience_id`, `type`, `title`, `company`, `date_start`, `date_end`, `detail`, `note`, `visible`, `added`, `timestamp`) VALUES
	(1, 1, 'Zaměstnání', 'Operátor reaktorových smyček', 'Centrum výzkumu Řež s.r.o', '2011-01-01', '2014-05-01', 'Operátor experimentálních smyček výzkumného reaktoru LVR-15. Materiálový výzkum pro jaderné elektrárny na vodní, superkritické vodní a vysokoteplotní héliové smyčce…', 'Práce na částečný úvazek při studiu.', 1, '2016-04-14 21:42:13', '2016-04-14 21:42:13'),
	(2, 2, 'Zaměstnání', 'Aplikační specialista junior', 'Centrum výzkumu Řež s.r.o', '2013-07-01', NULL, 'Tvorba a spravování několika webů společnosti věnující se jadernému výzkumu. Rozdílné CMS, firemní komunikace, dotační programy EU…', '', 1, '2016-04-14 21:42:13', '2016-04-14 21:42:23'),
	(3, 3, 'Vzdělání', 'SŠLVT Odolena Voda', 'Strojírenství se zaměřením na počítačové aplikace', '2006-09-01', '2010-06-30', 'Střední škola letecké a výpočetní techniky v Odolene Vodě. Strojírenství, kostrukce, práce v CAD a CNC systémech a tvorba webových prezentací… Odmaturováno s vyznamenáním.', 'Odmaturováno s vyznamenáním', 1, '2016-04-14 21:42:13', '2016-04-14 21:42:13');
/*!40000 ALTER TABLE `experience` ENABLE KEYS */;


-- Exportování struktury pro tabulka rychecky.gallery
CREATE TABLE IF NOT EXISTS `gallery` (
  `row_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID záznamu',
  `portfolio_id` int(11) DEFAULT NULL COMMENT 'ID portfolia',
  `filename` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL COMMENT 'Název souboru',
  `visible` tinyint(4) DEFAULT '1' COMMENT 'Viditelný?',
  `added` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Přidáno',
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Změněno',
  PRIMARY KEY (`row_id`),
  KEY `portfolio_id` (`portfolio_id`),
  KEY `visible` (`visible`),
  CONSTRAINT `e2_gallery/portfolio_id` FOREIGN KEY (`portfolio_id`) REFERENCES `portfolio` (`portfolio_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- Exportování dat pro tabulku rychecky.gallery: ~0 rows (přibližně)
/*!40000 ALTER TABLE `gallery` DISABLE KEYS */;
/*!40000 ALTER TABLE `gallery` ENABLE KEYS */;


-- Exportování struktury pro tabulka rychecky.hobby
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci ROW_FORMAT=COMPACT COMMENT='Seznam dovedností/znalostí';

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
	(16, 16, 'Anime', 0.5, 1, '2016-04-14 21:08:59', '2016-04-14 21:09:11');
/*!40000 ALTER TABLE `hobby` ENABLE KEYS */;


-- Exportování struktury pro tabulka rychecky.portfolio
CREATE TABLE IF NOT EXISTS `portfolio` (
  `row_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID záznamu',
  `portfolio_id` int(11) DEFAULT NULL COMMENT 'ID portfolia',
  `type` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL COMMENT 'Typ (kategorie) portfolia',
  `name` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL COMMENT 'Název dovednosti',
  `name_short` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL COMMENT 'Hodnota (míra) dovednosti',
  `detail` text COLLATE utf8_czech_ci COMMENT 'Textový popis',
  `company` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `date_create` date DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `github` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `working` tinyint(4) DEFAULT '1',
  `visible` tinyint(4) DEFAULT '1' COMMENT 'Viditelný?',
  `added` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Přidáno',
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Změněno',
  PRIMARY KEY (`row_id`),
  KEY `portfolio_id_visible` (`portfolio_id`,`visible`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci ROW_FORMAT=COMPACT COMMENT='Seznam dovedností/znalostí';

-- Exportování dat pro tabulku rychecky.portfolio: ~20 rows (přibližně)
/*!40000 ALTER TABLE `portfolio` DISABLE KEYS */;
INSERT INTO `portfolio` (`row_id`, `portfolio_id`, `type`, `name`, `name_short`, `detail`, `company`, `url`, `date_create`, `size`, `github`, `working`, `visible`, `added`, `timestamp`) VALUES
	(1, 1, 'Profesionální', 'Centrum výzkumu Řež s.r.o.', 'CVŘ', 'Dvojjazyčný robustní web prezentující společnost Centrum výzkumu Řež s.r.o., jenž se specializuje na jadernou energetiku. Stránky využívají nejmodernější technologie včetně mikroformátů a verze pro mobilní telefony. Je naplněn velkým množstvím informací o infrastruktuře společnosti a prováděném výzkumu zejména na poli jaderné energetiky. Bylo dbáno zejména na odbornou správnost. Web je postaven na systému Wordpress.', 'Centrum výzkumu Řež s.r.o.', 'http://cvrez.cz/', '2013-09-01', 60, NULL, 1, 1, '2016-04-14 18:24:00', '2016-04-14 18:27:11'),
	(2, 3, 'Profesionální', 'Enpedie: portál na podporu veřejné informovanosti v oblasti jaderné energetiky', 'Enpedie', 'Projekt společnosti Centrum výzkumu Řež s.r.o., který si klade za cíl pomocí wiki formátu udržovat a rozšiřovat informovanost o jaderné energetice. Hesla jsou vkládána a revidována odborníky na obor, tudíž jejich relevance je vyšší než z nevalidovaných zdrojů. Web je postaven na systému Mediawiki.', 'Centrum výzkumu Řež s.r.o.', 'http://enpedie.cz/', '2013-11-01', 30, NULL, 1, 1, '2016-04-14 18:24:00', '2016-04-14 18:27:10'),
	(22, 4, 'Profesionální', 'Fukušima', 'Fukušima: otázky', 'Projekt Státního úřadu pro jadernou bezpečnost (SÚJB) společně s Centrem výzkumu Řež s.r.o. Web vznikl na jaře 2011 jako bezprostřední reakce na havárii jaderné elektrárny Fukušima v Japonsku. Dotazy uživatelů kladené elektronicky zodpovídali uznávaní jaderní odborníci z celé republiky, včetně paní Drábové. Web je postaven na systému Drupal.', 'Centrum výzkumu Řež s.r.o.', 'http://otazky-fukusima.cvrez.cz/', '2013-06-01', 20, NULL, 1, 1, '2016-04-14 18:24:00', '2016-04-14 18:27:09'),
	(23, 5, 'Osobní', 'Native Warez Forum', 'NWF', 'Projekt s téměř 45 tisíci návštěvami měsíčně (Google Analytics) a 80 tisíci registrovanými uživateli. Forum slouží pro sdílení souborů mezi uživateli. Systém SMF je silně modifikován vlastními unikátními doplňky. Velká komunita může NWF podporovat i na jeho stránkách na Facebooku a dalších sociálních sítích. Web je postaven na systému Simple Machines Forum (SMF).', NULL, 'http://nwf.cz/', '2010-11-01', 60, NULL, 1, 1, '2016-04-14 18:24:00', '2016-04-14 18:27:07'),
	(24, 6, 'Profesionální', 'ELEXTERN: Electricity Externalities for Better Planning', 'ELEXTERN', 'Webový nástroj pro výpočet nákladů jednotlivých zdrojů energií elektrické energie. Systém započítává ceny externalit jako jsou náklady na léčbu rakoviny způsobené ozářením nebo cena půdy zabrané solárními elekrárnami. Tyto stránky využívají AJAX a Google Chart API.', NULL, 'http://elextern.eu/', '2015-01-01', 40, 'https://github.com/jaCUBE/elextern', 1, 1, '2016-04-14 18:24:00', '2016-04-14 18:26:33'),
	(25, 7, 'Profesionální', 'E2', 'CVŘ E2', 'Velký interní systém pro správu zaměstnanců a personalistiku ve společnosti zaměřené na jaderný výzkum. Některé vybrané funkce systému: timesheet a přehledy i s grafy, správa dovolený s přehledem, komplexní management pracovních cest a konferencí, řízení rizik, systemizace pracovních míst, přidělování a evidence úkolů atd.  Systém využívá LESS, AJAX, PDO a další pokročilé technologie.Takřka rok práce na plný úvazek, přes 300 uživatelů (zaměstnanců), přes 300 commitů v Gitu, pět tisíc souborů, sto tabulek v databázi...', 'Centrum výzkumu Řež s.r.o.', 'http://e2.cvrez.cz/', '2015-01-01', 100, NULL, 1, 1, '2016-04-14 18:24:00', '2016-04-15 11:25:58'),
	(26, 8, 'Profesionální', 'Portál společnosti CVŘ', 'Portál', 'Administrátorská správa portálu postaveného pod technologií Liferay.', 'Centrum výzkumu Řež s.r.o.', NULL, NULL, 30, NULL, 0, 1, '2016-04-14 18:24:00', '2016-04-14 18:27:30'),
	(27, 9, 'Profesionální', 'Web hotelu Na Plovárně v Humpolci', 'Hotel Na Plovárně', 'Menší webová prezentace hotelu na Vysočině.', NULL, 'http://hotel-humpolec.cz/', '2014-10-01', 30, NULL, 1, 1, '2016-04-14 18:24:00', '2016-04-14 18:27:04'),
	(28, 10, 'Profesionální', 'Web překladatele Translatech', 'Translatech', 'Menší webová prezentace překladatelských služeb v oblasti jaderné energetiky.', NULL, 'http://translatech.cz/', '2014-06-01', 30, NULL, 1, 1, '2016-04-14 18:24:00', '2016-04-14 18:27:03'),
	(29, 11, 'Osobní', 'ČSFD Extended Userscript', 'ČSFD Extended', NULL, NULL, 'https://greasyfork.org/cs/scripts/15784-%C4%8Csfd-extended', '2015-12-31', 20, NULL, 1, 1, '2016-04-14 18:24:00', '2016-04-14 18:27:02'),
	(30, 12, 'Osobní', 'Excel2SQL', 'Excel2SQL', NULL, NULL, 'http://excel2sql.rychecky.cz/', NULL, 30, 'https://github.com/jaCUBE/excel2sql', 1, 1, '2016-04-14 18:24:00', '2016-04-15 11:34:17'),
	(31, 13, 'Osobní', 'SRT Tool', 'SRT Tool', NULL, NULL, 'http://srt.rychecky.cz/', '2016-04-14', 20, NULL, 1, 1, '2016-04-14 18:24:01', '2016-04-15 11:34:18'),
	(32, 14, 'Profesionální', 'NUSIM 2014', 'NUSIM 2014', NULL, NULL, 'http://nusim2014.cz/', NULL, 0, NULL, 0, 1, '2016-04-14 18:24:01', '2016-04-15 11:34:19'),
	(33, 15, 'Profesionální', 'Pátý blok Dukovany', 'Pátý blok Dukovany', NULL, 'EventEra', 'http://patyblokdukovany.cz/', NULL, 0, NULL, 1, 1, '2016-04-14 18:24:01', '2016-04-15 11:34:20'),
	(34, 16, 'Profesionální', 'Malé reaktory', 'Malé reaktory', NULL, 'EventEra', 'http://malereaktory.cz/', NULL, 0, NULL, 1, 1, '2016-04-14 18:24:01', '2016-04-15 11:34:21'),
	(35, 17, 'Profesionální', 'Energochemie', 'Energochemie', NULL, 'EventEra', 'http://energochemie.cz/', NULL, 0, NULL, 1, 1, '2016-04-14 18:24:01', '2016-04-15 11:34:23'),
	(36, 18, 'Profesionální', 'Horizon 2020 CORONA II', 'CORONA II', NULL, 'Centrum výzkumu Řež s.r.o.', 'http://corona2.eu/', NULL, 30, NULL, 1, 1, '2016-04-14 18:24:01', '2016-04-14 18:27:41'),
	(37, 19, 'Profesionální', 'Efektivní přenos poznatků v energetice', 'EPP Projekt', NULL, 'Centrum výzkumu Řež s.r.o.', 'http://epp-projekt.cz/', NULL, 30, NULL, 1, 1, '2016-04-14 18:24:01', '2016-04-14 18:27:42'),
	(38, 20, 'Profesionální', 'Horizon 2020 VINCO', 'VINCO', NULL, 'Centrum výzkumu Řež s.r.o.', 'http://project-vinco.eu/', NULL, 30, NULL, 1, 1, '2016-04-14 18:24:01', '2016-04-14 18:27:42'),
	(39, 2, 'Profesionální', 'SUStainable ENergy (SUSEN)', 'SUSEN', 'Web velkého výzkumného projektu ve dvou jazycích. Projekt SUSEN představuje dotaci přes dvě miliardy korun, které posílí výzkumnou infrastrukturu v energetice České republiky a budou významným impulsem k rozvoji týmů, znalostí a technologií. Web obsahuje informace o programech a automatické zobrazování aktuálních výběrových řízení díky RSS kanálu.\nVzhledem připomíná mateřský web společnosti CVŘ, v jejíž režii se projekt SUSEN odehrává. Web je postaven na systému Wordpress.', 'Centrum výzkumu Řež s.r.o.', 'http://susen2020.cz/', NULL, 50, NULL, 1, 1, '2016-04-14 18:24:45', '2016-04-14 18:27:57');
/*!40000 ALTER TABLE `portfolio` ENABLE KEYS */;


-- Exportování struktury pro tabulka rychecky.skill
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
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
