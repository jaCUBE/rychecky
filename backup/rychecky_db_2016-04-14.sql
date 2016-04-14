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


-- Exportování struktury pro tabulka rychecky.portfolio
DROP TABLE IF EXISTS `portfolio`;
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
  `show_order` int(11) DEFAULT '0',
  `size` int(11) DEFAULT NULL,
  `github` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `working` tinyint(4) DEFAULT '1',
  `visible` tinyint(4) DEFAULT '1' COMMENT 'Viditelný?',
  `added` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Přidáno',
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Změněno',
  PRIMARY KEY (`row_id`),
  KEY `portfolio_id_visible` (`portfolio_id`,`visible`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci ROW_FORMAT=COMPACT COMMENT='Seznam dovedností/znalostí';

-- Exportování dat pro tabulku rychecky.portfolio: ~19 rows (přibližně)
/*!40000 ALTER TABLE `portfolio` DISABLE KEYS */;
INSERT INTO `portfolio` (`row_id`, `portfolio_id`, `type`, `name`, `name_short`, `detail`, `company`, `url`, `date_create`, `show_order`, `size`, `github`, `working`, `visible`, `added`, `timestamp`) VALUES
	(1, 1, 'Profesionální', 'Centrum výzkumu Řež s.r.o.', 'CVŘ', 'Dvojjazyčný robustní web prezentující společnost Centrum výzkumu Řež s.r.o., jenž se specializuje na jadernou energetiku. Stránky využívají nejmodernější technologie včetně mikroformátů a verze pro mobilní telefony. Je naplněn velkým množstvím informací o infrastruktuře společnosti a prováděném výzkumu zejména na poli jaderné energetiky. Bylo dbáno zejména na odbornou správnost. Web je postaven na systému Wordpress.', 'Centrum výzkumu Řež s.r.o.', 'http://cvrez.cz/', '2013-09-01', 2, 60, NULL, 1, 1, '2016-04-14 18:24:00', '2016-04-14 18:27:11'),
	(2, 3, 'Profesionální', 'Enpedie: portál na podporu veřejné informovanosti v oblasti jaderné energetiky', 'Enpedie', 'Projekt společnosti Centrum výzkumu Řež s.r.o., který si klade za cíl pomocí wiki formátu udržovat a rozšiřovat informovanost o jaderné energetice. Hesla jsou vkládána a revidována odborníky na obor, tudíž jejich relevance je vyšší než z nevalidovaných zdrojů. Web je postaven na systému Mediawiki.', 'Centrum výzkumu Řež s.r.o.', 'http://enpedie.cz/', '2013-11-01', 2, 30, NULL, 1, 1, '2016-04-14 18:24:00', '2016-04-14 18:27:10'),
	(22, 4, 'Profesionální', 'Fukušima', 'Fukušima: otázky', 'Projekt Státního úřadu pro jadernou bezpečnost (SÚJB) společně s Centrem výzkumu Řež s.r.o. Web vznikl na jaře 2011 jako bezprostřední reakce na havárii jaderné elektrárny Fukušima v Japonsku. Dotazy uživatelů kladené elektronicky zodpovídali uznávaní jaderní odborníci z celé republiky, včetně paní Drábové. Web je postaven na systému Drupal.', 'Centrum výzkumu Řež s.r.o.', 'http://otazky-fukusima.cvrez.cz/', '2013-06-01', 3, 20, NULL, 1, 1, '2016-04-14 18:24:00', '2016-04-14 18:27:09'),
	(23, 5, 'Osobní', 'Native Warez Forum', 'NWF', 'Projekt s téměř 45 tisíci návštěvami měsíčně (Google Analytics) a 80 tisíci registrovanými uživateli. Forum slouží pro sdílení souborů mezi uživateli. Systém SMF je silně modifikován vlastními unikátními doplňky. Velká komunita může NWF podporovat i na jeho stránkách na Facebooku a dalších sociálních sítích. Web je postaven na systému Simple Machines Forum (SMF).', NULL, 'http://nwf.cz/', '2010-11-01', 3, 60, NULL, 1, 1, '2016-04-14 18:24:00', '2016-04-14 18:27:07'),
	(24, 6, 'Profesionální', 'ELEXTERN: Electricity Externalities for Better Planning', 'ELEXTERN', 'Webový nástroj pro výpočet nákladů jednotlivých zdrojů energií elektrické energie. Systém započítává ceny externalit jako jsou náklady na léčbu rakoviny způsobené ozářením nebo cena půdy zabrané solárními elekrárnami. Tyto stránky využívají AJAX a Google Chart API.', NULL, 'http://elextern.eu/', '2015-01-01', 2, 40, 'https://github.com/jaCUBE/elextern', 1, 1, '2016-04-14 18:24:00', '2016-04-14 18:26:33'),
	(25, 7, 'Profesionální', 'E2', 'Evidence pracovních aktivit E2', 'Velký interní systém pro správu zaměstnanců a personalistiku ve společnosti zaměřené na jaderný výzkum. Některé vybrané funkce systému: timesheet a přehledy i s grafy, správa dovolený s přehledem, komplexní management pracovních cest a konferencí, řízení rizik, systemizace pracovních míst, přidělování a evidence úkolů atd.  Systém využívá LESS, AJAX, PDO a další pokročilé technologie.Takřka rok práce na plný úvazek, přes 300 uživatelů (zaměstnanců), přes 300 commitů v Gitu, pět tisíc souborů, sto tabulek v databázi...', 'Centrum výzkumu Řež s.r.o.', 'http://e2.cvrez.cz/', '2015-01-01', 1, 100, NULL, 1, 1, '2016-04-14 18:24:00', '2016-04-14 18:27:06'),
	(26, 8, 'Profesionální', 'Portál společnosti CVŘ', 'Portál', 'Administrátorská správa portálu postaveného pod technologií Liferay.', 'Centrum výzkumu Řež s.r.o.', NULL, NULL, 3, 30, NULL, 0, 1, '2016-04-14 18:24:00', '2016-04-14 18:27:30'),
	(27, 9, 'Profesionální', 'Web hotelu Na Plovárně v Humpolci', 'Hotel Na Plovárně', 'Menší webová prezentace hotelu na Vysočině.', NULL, 'http://hotel-humpolec.cz/', '2014-10-01', 3, 30, NULL, 1, 1, '2016-04-14 18:24:00', '2016-04-14 18:27:04'),
	(28, 10, 'Profesionální', 'Web překladatele Translatech', 'Translatech', 'Menší webová prezentace překladatelských služeb v oblasti jaderné energetiky.', NULL, 'http://translatech.cz/', '2014-06-01', 3, 30, NULL, 1, 1, '2016-04-14 18:24:00', '2016-04-14 18:27:03'),
	(29, 11, 'Osobní', 'ČSFD Extended Userscript', 'ČSFD Extended', NULL, NULL, 'https://greasyfork.org/cs/scripts/15784-%C4%8Csfd-extended', '2015-12-31', 3, 20, NULL, 1, 1, '2016-04-14 18:24:00', '2016-04-14 18:27:02'),
	(30, 12, 'Osobní', 'Excel2SQL', NULL, NULL, NULL, 'http://excel2sql.rychecky.cz/', NULL, 3, 30, 'https://github.com/jaCUBE/excel2sql', 1, 1, '2016-04-14 18:24:00', '2016-04-14 18:27:39'),
	(31, 13, 'Osobní', 'SRT Tool', NULL, NULL, NULL, 'http://srt.rychecky.cz/', '2016-04-14', 3, 20, NULL, 1, 1, '2016-04-14 18:24:01', '2016-04-14 18:27:40'),
	(32, 14, 'Profesionální', 'NUSIM 2014', NULL, NULL, NULL, 'http://nusim2014.cz/', NULL, 0, 0, NULL, 0, 1, '2016-04-14 18:24:01', '2016-04-14 18:27:40'),
	(33, 15, 'Profesionální', 'Pátý blok Dukovany', NULL, NULL, 'EventEra', 'http://patyblokdukovany.cz/', NULL, 0, 0, NULL, 1, 1, '2016-04-14 18:24:01', '2016-04-14 18:27:40'),
	(34, 16, 'Profesionální', 'Malé reaktory', NULL, NULL, 'EventEra', 'http://malereaktory.cz/', NULL, 0, 0, NULL, 1, 1, '2016-04-14 18:24:01', '2016-04-14 18:27:40'),
	(35, 17, 'Profesionální', 'Energochemie', NULL, NULL, 'EventEra', 'http://energochemie.cz/', NULL, 0, 0, NULL, 1, 1, '2016-04-14 18:24:01', '2016-04-14 18:27:41'),
	(36, 18, 'Profesionální', 'Horizon 2020 CORONA II', 'CORONA II', NULL, 'Centrum výzkumu Řež s.r.o.', 'http://corona2.eu/', NULL, 0, 30, NULL, 1, 1, '2016-04-14 18:24:01', '2016-04-14 18:27:41'),
	(37, 19, 'Profesionální', 'Efektivní přenos poznatků v energetice', 'EPP Projekt', NULL, 'Centrum výzkumu Řež s.r.o.', 'http://epp-projekt.cz/', NULL, 0, 30, NULL, 1, 1, '2016-04-14 18:24:01', '2016-04-14 18:27:42'),
	(38, 20, 'Profesionální', 'Horizon 2020 VINCO', 'VINCO', NULL, 'Centrum výzkumu Řež s.r.o.', 'http://project-vinco.eu/', NULL, 0, 30, NULL, 1, 1, '2016-04-14 18:24:01', '2016-04-14 18:27:42'),
	(39, 2, 'Profesionální', 'SUStainable ENergy (SUSEN)', 'SUSEN', 'Web velkého výzkumného projektu ve dvou jazycích. Projekt SUSEN představuje dotaci přes dvě miliardy korun, které posílí výzkumnou infrastrukturu v energetice České republiky a budou významným impulsem k rozvoji týmů, znalostí a technologií. Web obsahuje informace o programech a automatické zobrazování aktuálních výběrových řízení díky RSS kanálu.\nVzhledem připomíná mateřský web společnosti CVŘ, v jejíž režii se projekt SUSEN odehrává. Web je postaven na systému Wordpress.', 'Centrum výzkumu Řež s.r.o.', 'http://susen2020.cz/', NULL, 0, 50, NULL, 1, 1, '2016-04-14 18:24:45', '2016-04-14 18:27:57');
/*!40000 ALTER TABLE `portfolio` ENABLE KEYS */;


-- Exportování struktury pro tabulka rychecky.skill
DROP TABLE IF EXISTS `skill`;
CREATE TABLE IF NOT EXISTS `skill` (
  `row_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID záznamu',
  `skill_id` int(11) DEFAULT NULL COMMENT 'ID dovednosti',
  `type` varchar(256) COLLATE utf8_czech_ci DEFAULT NULL COMMENT 'Typ (kategorie) dovednosti',
  `name` varchar(256) COLLATE utf8_czech_ci DEFAULT NULL COMMENT 'Název dovednosti',
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
	(1, 1, 'Programování a vývoj webu', 'HTML', 85, 'Syntaxe jazyku HTML4 a XHTML. Znalost HTML 5 a zkušenosti s tvorbou sémantického webu (mikroformáty).', 1, '2016-04-14 18:14:51', '2016-04-14 18:14:51'),
	(2, 2, 'Programování a vývoj webu', 'CSS + LESS', 85, 'Kaskádové styly a design webových stránek včetně moderního CSS3. Zkušenosti s využitím LESS.', 1, '2016-04-14 18:14:52', '2016-04-14 18:14:52'),
	(3, 3, 'Programování a vývoj webu', 'PHP', 75, 'Ovládání skriptovacího jazyka PHP5 včetně objektově orientovaného programování (OOP).', 1, '2016-04-14 18:14:52', '2016-04-14 18:14:52'),
	(4, 4, 'Programování a vývoj webu', 'SQL + MySQL', 65, 'Používání dotazovacího jazyka SQL. Návrh, správa a optimalizace open source databáze MySQL.', 1, '2016-04-14 18:14:52', '2016-04-14 18:14:52'),
	(5, 5, 'Programování a vývoj webu', 'Javascript + jQuery', 65, 'Implementace Javascriptu do webu, zkušenosti s používáním frameworků jQuery a jQuery UI na reálných projektech.', 1, '2016-04-14 18:14:52', '2016-04-14 18:14:52'),
	(6, 6, 'Programování a vývoj webu', 'SEO', 50, 'Optimalizace pro vyhledávače. Správná syntaxe při psaní kódu, vhodná struktura stránek a metrika návštěvnosti.', 1, '2016-04-14 18:14:52', '2016-04-14 18:14:52'),
	(7, 7, 'Programování a vývoj webu', 'Sociální sítě', 50, 'Schopnost a zkušenost se správou známých sociálních sítí jako Facebook či YouTube. Základní povědomí o pravidlech a omezení, sledování novinek.', 1, '2016-04-14 18:14:52', '2016-04-14 18:14:52'),
	(8, 8, 'Programování a vývoj webu', 'Apache (LAMP)', 25, 'Zkušenosti s konfigurací virtuálního privátního serveru (VPS) včetně instalace PHP, modulů do PHP…', 1, '2016-04-14 18:14:52', '2016-04-14 18:14:52'),
	(9, 9, 'Programování a vývoj webu', 'CMS: SMF', 40, 'Bohaté zkušenosti se systémem Simple Machines Forum (SMF) pro internetová fóra. Znalost vnitřních procesů, psaní vlastních unikátních rozšíření…', 1, '2016-04-14 18:14:52', '2016-04-14 18:14:52'),
	(10, 10, 'Programování a vývoj webu', 'CMS: Wordpress', 40, 'Dobrá znalost systému Wordpress z uživatelského i administrátorského hlediska.', 1, '2016-04-14 18:14:52', '2016-04-14 18:14:52'),
	(11, 11, 'Programování a vývoj webu', 'CMS: MediaWiki', 30, 'Znalosti správy systému na bázi MediaWiki včetně konfigurace.', 1, '2016-04-14 18:14:52', '2016-04-14 18:14:52'),
	(12, 12, 'Programování a vývoj webu', 'CMS: Drupal', 15, 'Základní znalost.', 1, '2016-04-14 18:14:52', '2016-04-14 18:14:52'),
	(13, 13, 'Programování a vývoj webu', 'CMS: PHPBB', 15, 'Základní znalost.', 1, '2016-04-14 18:14:52', '2016-04-14 18:14:52'),
	(14, 14, 'Další IT dovednosti', 'Photoshop', 60, 'Pokročila znalost grafického programu Adobe Photoshop. Zkušenosti se zpracováním fotografií z formátu RAW.', 1, '2016-04-14 18:14:52', '2016-04-14 18:14:52'),
	(15, 15, 'Další IT dovednosti', 'MS Office', 60, 'Dobrá znalost součástí balíku Microsoft Office.', 1, '2016-04-14 18:14:52', '2016-04-14 18:14:52'),
	(16, 16, 'Další IT dovednosti', 'Sony Vegas', 20, 'Základní znalost střihu videa.', 1, '2016-04-14 18:14:52', '2016-04-14 18:14:52'),
	(17, 17, 'Další IT dovednosti', 'Autocad + Inventor', 25, 'Základní znalost programu Autodesk AutoCAD a Autodesk Inventor.', 1, '2016-04-14 18:14:52', '2016-04-14 18:14:52'),
	(18, 18, 'Další IT dovednosti', 'Bezpečnost', 45, 'Zájem o zabezpečení počítačů, sítí, webových stránek. Kryptografie, ochrana dat…', 1, '2016-04-14 18:14:52', '2016-04-14 18:14:52'),
	(19, 19, 'Další IT dovednosti', 'Google', 60, 'Využívání a administrace dokumentů na Google Drive. Využívání Google Chart API pro vykreslování grafů.', 1, '2016-04-14 18:14:52', '2016-04-14 18:14:52'),
	(20, 20, 'Další IT dovednosti', 'C# + .NET', 25, 'Základy objektového programování desktopových aplikací v C# za využití grafického rozhraní Windows a frameworku .NET.', 1, '2016-04-14 18:14:52', '2016-04-14 18:14:52'),
	(21, 21, 'Další IT dovednosti', 'Matlab', 20, 'Základní znalost programovacího jazyka na bázi FORTRAN.', 1, '2016-04-14 18:14:53', '2016-04-14 18:14:53'),
	(22, 22, 'Další IT dovednosti', 'Cinema 4D', 20, 'Základní znalost 3D modelování.', 1, '2016-04-14 18:14:53', '2016-04-14 18:14:53'),
	(23, 23, 'Další IT dovednosti', 'Java', 15, 'Základní znalost.', 1, '2016-04-14 18:14:53', '2016-04-14 18:14:53'),
	(24, 24, 'Další IT dovednosti', 'Hardware', 45, 'Znalost počítačových komponent a periferií.', 1, '2016-04-14 18:14:53', '2016-04-14 18:14:53'),
	(25, 25, 'Další IT dovednosti', 'InDesign', 30, 'Lepší znalost programu pro sázení a typografickou úpravu, Adobe InDesign.', 1, '2016-04-14 18:14:53', '2016-04-14 18:14:53'),
	(26, 26, 'Další IT dovednosti', 'Illustrator', 20, 'Základní znalost programu pro tvorbu vektorové grafiky, Adobe Illustrator.', 1, '2016-04-14 18:14:53', '2016-04-14 18:14:53'),
	(27, 27, 'Jazyky', 'Čeština', 90, 'Znalost češtiny na pokročilé úrovni z hlediska gramatiky a stylistiky. Zkušenosti s proofreadingem a korekturou vědeckých textů.', 1, '2016-04-14 18:14:53', '2016-04-14 18:14:53'),
	(28, 28, 'Jazyky', 'Angličtina', 75, 'Znalost angličtiny na úrovni upper-intermediate. Bezproblémová schopnost komunikovat i číst technickou dokumentaci.', 1, '2016-04-14 18:14:53', '2016-04-14 18:14:53'),
	(29, 29, 'Další dovednosti', 'Marketing & PR', 30, 'Základní znalost firemní komunikace, zkušenosti s prací na oddělení komunikace vědecké společnosti.', 1, '2016-04-14 18:14:53', '2016-04-14 18:14:53'),
	(30, 30, 'Další dovednosti', 'Jaderná energetika', 20, 'Základní fungování jaderného reaktoru. Zkušenost s prací se zdroji ionizujícího záření (pracovník kategorie A).', 1, '2016-04-14 18:14:53', '2016-04-14 18:14:53'),
	(31, 31, 'Další dovednosti', 'Strojírenství', 15, 'Elementární znalost norem či konstrukce.', 1, '2016-04-14 18:14:53', '2016-04-14 18:14:53'),
	(32, 32, 'Programování a vývoj webu', 'Git + GitHub', 35, 'Základní práce s verzovacím systémem Git a repozitáři na GitHubu.', 1, '2016-04-14 18:14:53', '2016-04-14 18:14:53'),
	(33, 33, 'Programování a vývoj webu', 'Python', 20, 'Základní znalost programovacího jazyka Python.', 1, '2016-04-14 18:14:53', '2016-04-14 18:14:53'),
	(34, 34, 'Další dovednosti', 'Fotografování', 40, 'Znalost práce s DSLR (zrcadlovka), principů a praxi fotografie včetně digitálních úprav.', 1, '2016-04-14 18:14:53', '2016-04-14 18:14:53');
/*!40000 ALTER TABLE `skill` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
