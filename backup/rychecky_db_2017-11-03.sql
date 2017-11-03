-- phpMyAdmin SQL Dump
-- version 4.4.15.1
-- http://www.phpmyadmin.net
--
-- Počítač: wm99.wedos.net:3306
-- Vytvořeno: Pát 03. lis 2017, 04:34
-- Verze serveru: 10.0.21-MariaDB
-- Verze PHP: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `d31607_rych`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `certificate`
--

CREATE TABLE IF NOT EXISTS `certificate` (
  `row_id` int(11) NOT NULL COMMENT 'ID záznamu',
  `certificate_id` int(11) DEFAULT NULL COMMENT 'ID certifikátu',
  `type` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL COMMENT 'Typ certifikátu',
  `name` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL COMMENT 'Název certifikátu',
  `detail` mediumtext COLLATE utf8_czech_ci COMMENT 'Detailní popis',
  `issue_date` date DEFAULT NULL COMMENT 'Datum vystavení',
  `issue_by` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL COMMENT 'Vystavitel',
  `url` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL COMMENT 'URL certifikátu',
  `locale` varchar(2) COLLATE utf8_czech_ci NOT NULL DEFAULT 'cs',
  `visible` tinyint(4) DEFAULT '1' COMMENT 'Viditelný?',
  `added` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Přidáno',
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Změněno'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci ROW_FORMAT=COMPRESSED COMMENT='Seznam dovedností/znalostí';

--
-- Vypisuji data pro tabulku `certificate`
--

INSERT INTO `certificate` (`row_id`, `certificate_id`, `type`, `name`, `detail`, `issue_date`, `issue_by`, `url`, `locale`, `visible`, `added`, `timestamp`) VALUES
(1, 1, 'MOOC', 'Usable Security', 'On-line kurz zabývající se tématem návrhu a vytváření zabezpečených systémů s ohledem na použitelnost a UX. Základní principy vztahu interakcí člověk-počítač a bezpečnosti, způsob jejich měření včetně implementace v systému.', '2015-08-10', 'University of Maryland, College Park', 'https://www.coursera.org/account/accomplishments/verify/E2GJU2HNKU', 'cs', 1, '2016-04-14 18:01:32', '2016-05-05 19:54:39'),
(2, 2, 'MOOC', 'Front-End JavaScript Frameworks: AngularJS', 'Seznámení s tvorbou single page applications pomocí frameworku AngularJS a základy práce s nástroji jako Grunt a Node.js.', '2016-06-30', 'The Hong Kong University of Science and Technology', 'https://www.coursera.org/account/accomplishments/verify/6C8YVQ9YJC7Q', 'cs', 1, '2016-08-11 14:14:28', '2017-10-30 12:53:16');

-- --------------------------------------------------------

--
-- Struktura tabulky `experience`
--

CREATE TABLE IF NOT EXISTS `experience` (
  `row_id` int(11) NOT NULL COMMENT 'ID záznamu',
  `experience_id` int(11) DEFAULT NULL COMMENT 'ID zkušenosti',
  `type` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL COMMENT 'Typ zkušenosti',
  `title` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL COMMENT 'Název zkušenosti',
  `company` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL COMMENT 'Společnost',
  `date_start` date DEFAULT NULL COMMENT 'Datum začátku',
  `date_end` date DEFAULT NULL COMMENT 'Datum konce',
  `detail` mediumtext COLLATE utf8_czech_ci COMMENT 'Detailní popis',
  `note` mediumtext COLLATE utf8_czech_ci COMMENT 'Poznámka',
  `locale` varchar(2) COLLATE utf8_czech_ci NOT NULL DEFAULT 'cs',
  `timeline` tinyint(4) DEFAULT '1' COMMENT 'Zobrazit zkušenost na timeline?',
  `visible` tinyint(4) DEFAULT '1' COMMENT 'Viditelný?',
  `added` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Přidáno',
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Změněno'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci ROW_FORMAT=COMPACT COMMENT='Seznam zkušeností/vzdělání';

--
-- Vypisuji data pro tabulku `experience`
--

INSERT INTO `experience` (`row_id`, `experience_id`, `type`, `title`, `company`, `date_start`, `date_end`, `detail`, `note`, `locale`, `timeline`, `visible`, `added`, `timestamp`) VALUES
(1, 1, 'Zaměstnání', 'Operátor reaktorových smyček', 'Centrum výzkumu Řež s.r.o', '2011-01-01', '2014-05-01', 'Operátor experimentálních smyček výzkumného reaktoru LVR-15. Materiálový výzkum pro jaderné elektrárny na vodní, superkritické vodní a vysokoteplotní héliové smyčce…', 'Částečný úvazek při studiu. Pracovník se zdroji ionizujícího záření.', 'cs', 1, 1, '2016-04-14 17:42:13', '2016-05-04 19:05:18'),
(2, 2, 'Zaměstnání', 'Full Stack Developer', 'Centrum výzkumu Řež s.r.o', '2013-07-01', '2017-10-31', 'Tvorba <a href="javascript:void(0)" onclick="portfolio(7)">robustního interního systému pro personální, finanční a projektové řízení</a>. Práce na backendu i frontendu, business logic, návrh databáze...\n<br />\nSpravování několika veřejných webů společnosti věnující se jaderné problematice.\n<br />\nRozdílné CMS, firemní komunikace, dotační programy EU…', NULL, 'cs', 1, 1, '2016-04-14 17:42:13', '2017-10-27 03:56:47'),
(3, 3, 'Vzdělání', 'Strojírenství se zaměřením na počítačové aplikace', 'Střední škola letecké a výpočetní techniky Odolena Voda', '2006-09-01', '2010-06-30', 'Střední škola letecké a výpočetní techniky v Odolene Vodě. Strojírenství, kostrukce, práce v CAD a CNC systémech a tvorba webových prezentací…', 'Odmaturováno s vyznamenáním.', 'cs', 1, 1, '2016-04-14 17:42:13', '2017-10-30 12:50:48'),
(4, 4, 'Vzdělání', 'ZŠ Kralupy', 'Základní škola Jana Amose Komenského', '1996-09-01', '2006-06-30', 'Veřejná základní škola v Kralupech nad Vltavou.', NULL, 'cs', 0, 1, '2016-05-04 18:22:09', '2017-10-30 12:50:39'),
(5, 5, 'Vzdělání', 'ČVUT FBMI (nedokončeno)', 'ČVUT', '2010-10-01', '2013-02-01', 'Bakalářské studium oboru Biomedicínská informatika.', 'Tři semestry.', 'cs', 0, 1, '2016-05-04 18:23:15', '2017-10-27 03:54:52'),
(6, 6, 'Zaměstnání', 'Administrativní práce na konstrukčním oddělení', 'ÚJV Řež, a. s.', '2009-07-01', '2009-08-01', 'Tvorba a kompletování výrobní dokumentace ke specializovaným strojírenským výrobkům.', 'Brigáda při studiu.', 'cs', 0, 1, '2016-04-14 17:42:13', '2017-10-27 03:56:01');

-- --------------------------------------------------------

--
-- Struktura tabulky `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `row_id` int(11) NOT NULL COMMENT 'ID záznamu',
  `portfolio_id` int(11) DEFAULT NULL COMMENT 'ID portfolia',
  `filename` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL COMMENT 'Název souboru',
  `title` varchar(512) COLLATE utf8_czech_ci DEFAULT NULL COMMENT 'Popis obrázku',
  `thumbnail` int(11) DEFAULT '0' COMMENT 'Thumbnail?',
  `order` int(11) DEFAULT '0' COMMENT 'Hodnota pořadí',
  `visible` tinyint(4) DEFAULT '1' COMMENT 'Viditelný?',
  `added` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Přidáno',
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Změněno'
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci ROW_FORMAT=COMPRESSED;

--
-- Vypisuji data pro tabulku `gallery`
--

INSERT INTO `gallery` (`row_id`, `portfolio_id`, `filename`, `title`, `thumbnail`, `order`, `visible`, `added`, `timestamp`) VALUES
(1, 6, 'elextern_th.png', NULL, 1, 0, 1, '2016-04-17 12:19:55', '2016-09-07 19:26:51'),
(2, 7, 'e2_th.png', NULL, 1, 0, 1, '2016-04-17 12:19:55', '2016-09-07 19:26:51'),
(3, 19, 'epp_th.png', NULL, 1, 0, 1, '2016-04-17 12:19:55', '2016-09-07 19:26:56'),
(4, 1, 'cvrez_th.png', NULL, 1, 0, 1, '2016-04-17 12:19:55', '2016-09-07 19:26:48'),
(5, 18, 'corona2_th.png', NULL, 1, 0, 1, '2016-04-17 12:19:55', '2016-09-07 19:26:56'),
(6, 11, 'csfd_e_th.png', NULL, 1, 0, 1, '2016-04-17 12:19:55', '2016-09-07 19:26:54'),
(7, 12, 'excel2sql_th.png', NULL, 1, 0, 1, '2016-04-17 13:09:33', '2016-09-07 19:26:55'),
(8, 5, 'nwf_th.png', NULL, 1, 0, 1, '2016-04-17 13:19:31', '2016-09-07 19:26:50'),
(9, 2, 'susen_th.png', NULL, 1, 0, 1, '2016-04-17 13:20:22', '2016-09-07 19:26:49'),
(10, 3, 'enpedie_th.png', NULL, 1, 0, 1, '2016-04-17 15:21:17', '2016-09-07 19:26:50'),
(11, 17, 'energochemie_th.png', NULL, 1, 0, 1, '2016-04-17 15:21:47', '2016-09-07 19:26:56'),
(12, 4, 'fukusima_th.png', NULL, 1, 0, 1, '2016-04-17 15:23:13', '2016-09-07 19:26:50'),
(13, 13, 'srt_th.png', NULL, 1, 0, 1, '2016-04-17 15:24:59', '2016-09-07 19:26:55'),
(15, 16, 'malereaktory_th.png', NULL, 1, 0, 1, '2016-09-07 17:05:19', '2016-09-07 19:26:55'),
(16, 9, 'naplovarne_th.png', NULL, 1, 0, 1, '2016-09-07 17:07:47', '2016-09-07 19:26:54'),
(17, 15, 'patyblokdukovany_th.png', NULL, 1, 0, 1, '2016-09-07 17:12:39', '2016-09-07 19:26:55'),
(18, 20, 'vinco_th.png', NULL, 1, 0, 1, '2016-09-07 17:14:15', '2016-09-07 19:26:57'),
(19, 10, 'translatech_th.png', NULL, 1, 0, 1, '2016-09-07 17:15:51', '2016-09-07 19:26:54'),
(20, 7, 'e2_activity_form.png', 'Formulář pro úpravu výzkumného projektu v databázi.', 0, 20, 1, '2016-09-07 18:09:37', '2016-09-07 19:29:46'),
(21, 7, 'e2_event.png', 'Profil konference s možností navázat služební cesty, abstrakty vědeckých přednášek...', 0, 0, 1, '2016-09-07 18:09:37', '2016-09-07 19:26:51'),
(22, 7, 'e2_cabinet.png', 'Přehled zasedacích místností společnosti s možností vytváření rezervací a provázání na jednotlivé zaměstnance.', 0, 0, 1, '2016-09-07 18:09:37', '2016-09-07 19:26:52'),
(23, 7, 'e2_citation.png', 'Nastavitelný generátor citací vědeckých prací zaměstnanců dle formátu ISO.', 0, 0, 1, '2016-09-07 18:09:37', '2016-09-07 19:26:52'),
(24, 7, 'e2_diredoc.png', 'Roztříděná řídící dokumentace společnosti s evidencí přečtení jednotlivými lidmi.', 0, 0, 1, '2016-09-07 18:09:37', '2016-09-07 19:26:53'),
(26, 7, 'e2_index.png', 'Domovská stránka systému E2 s rozcestníkem a důležitými údaji.', 0, 100, 1, '2016-09-07 18:09:37', '2016-09-07 19:29:43'),
(27, 7, 'e2_timesheet2.png', 'Timesheet zaměstnance, který je provázaný s jeho úvazky v projektech.', 0, 0, 1, '2016-09-07 18:09:37', '2016-09-07 19:26:53'),
(28, 7, 'e2_user.png', 'Profil zaměstnance se všemi informacemi, které se k němu vážou.', 0, 0, 1, '2016-09-07 18:09:37', '2016-09-07 19:26:54');

-- --------------------------------------------------------

--
-- Struktura tabulky `hobby`
--

CREATE TABLE IF NOT EXISTS `hobby` (
  `row_id` int(11) NOT NULL COMMENT 'ID záznamu',
  `hobby_id` int(11) DEFAULT NULL COMMENT 'ID koníčku',
  `name` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL COMMENT 'Název koníčku',
  `size` int(11) DEFAULT '1' COMMENT 'Velikost slova v cloudu',
  `locale` varchar(2) COLLATE utf8_czech_ci NOT NULL DEFAULT 'cs',
  `visible` tinyint(4) DEFAULT '1' COMMENT 'Viditelný?',
  `added` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Přidáno',
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Změněno'
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci ROW_FORMAT=COMPRESSED COMMENT='Seznam dovedností/znalostí';

--
-- Vypisuji data pro tabulku `hobby`
--

INSERT INTO `hobby` (`row_id`, `hobby_id`, `name`, `size`, `locale`, `visible`, `added`, `timestamp`) VALUES
(1, 1, 'Informační technologie', 100, 'cs', 1, '2016-04-14 17:04:57', '2016-05-05 19:55:35'),
(2, 2, 'Sociální sítě', 80, 'cs', 1, '2016-04-14 17:05:33', '2016-05-05 19:55:37'),
(3, 3, 'Seriály', 60, 'cs', 1, '2016-04-14 17:05:46', '2016-05-05 19:55:39'),
(4, 4, 'Věda & technika', 80, 'cs', 1, '2016-04-14 17:05:56', '2016-05-05 19:55:40'),
(5, 5, 'Četba & literatura', 80, 'cs', 1, '2016-04-14 17:07:27', '2016-05-05 19:56:46'),
(6, 6, 'Webové technologie', 100, 'cs', 1, '2016-04-14 17:07:38', '2016-05-05 19:55:44'),
(7, 7, 'Filmy', 70, 'cs', 1, '2016-04-14 17:07:45', '2016-05-05 19:55:45'),
(8, 8, 'Mobilní telefony', 50, 'cs', 1, '2016-04-14 17:07:56', '2016-05-05 19:55:46'),
(9, 9, 'Programování', 80, 'cs', 1, '2016-04-14 17:08:06', '2016-05-05 19:55:48'),
(10, 10, 'Hudba', 70, 'cs', 1, '2016-04-14 17:08:11', '2016-05-05 19:55:49'),
(11, 11, 'Hardware', 60, 'cs', 1, '2016-04-14 17:08:18', '2016-05-05 19:55:51'),
(12, 12, 'Počítačové hry', 70, 'cs', 1, '2016-04-14 17:08:24', '2016-05-05 19:55:52'),
(13, 13, 'Grafika & design', 60, 'cs', 1, '2016-04-14 17:08:39', '2016-05-05 19:55:54'),
(14, 14, 'Počítačová bezpečnost', 70, 'cs', 1, '2016-04-14 17:08:48', '2016-05-05 19:55:55'),
(15, 15, 'Fotografování', 60, 'cs', 1, '2016-04-14 17:08:55', '2016-05-05 19:55:57'),
(16, 16, 'Anime', 50, 'cs', 1, '2016-04-14 17:08:59', '2016-05-05 19:55:58'),
(17, 17, 'Tvorba titulků', 70, 'cs', 1, '2016-05-04 16:57:06', '2016-05-05 19:56:00'),
(18, 18, 'Elektronika', 50, 'cs', 1, '2016-04-14 17:08:59', '2016-05-05 19:55:58'),
(19, 19, 'Kryptografie', 40, 'cs', 1, '2016-04-14 17:08:59', '2016-05-07 07:53:38'),
(20, 20, 'Kočky', 40, 'cs', 1, '2016-04-14 17:08:59', '2016-05-07 07:53:39'),
(21, 21, 'Japonsko', 40, 'cs', 1, '2016-05-05 20:11:03', '2016-05-05 20:11:06'),
(22, 22, 'Fyzika', 40, 'cs', 1, '2016-05-07 07:53:30', '2016-05-07 07:53:34');

-- --------------------------------------------------------

--
-- Struktura tabulky `info`
--

CREATE TABLE IF NOT EXISTS `info` (
  `row_id` int(11) NOT NULL COMMENT 'ID záznamu',
  `name` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL COMMENT 'Název informace (konstanty)',
  `value` varchar(512) COLLATE utf8_czech_ci DEFAULT NULL COMMENT 'Hodnota',
  `visible` tinyint(4) DEFAULT '1' COMMENT 'Viditelný?',
  `added` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Přidáno',
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Změněno'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci ROW_FORMAT=COMPACT COMMENT='Tabulka se základními informacemi';

--
-- Vypisuji data pro tabulku `info`
--

INSERT INTO `info` (`row_id`, `name`, `value`, `visible`, `added`, `timestamp`) VALUES
(1, 'addr_street', 'Havlíčkova', 1, '2016-05-05 20:15:53', '2016-05-05 20:16:18'),
(2, 'addr_street_number', '981', 1, '2016-05-05 20:16:08', '2016-05-05 20:16:15'),
(3, 'addr_city', 'Kralupy nad Vltavou', 1, '2016-05-05 20:16:12', '2016-05-05 20:16:27'),
(4, 'addr_zip', '278 01', 1, '2016-05-05 20:16:34', '2016-05-05 20:16:45'),
(5, 'phone', '720 219 057', 1, '2016-05-05 20:16:44', '2016-05-05 20:16:44'),
(6, 'phone_prefix', '+420', 1, '2016-05-05 20:16:53', '2016-05-05 20:16:53'),
(7, 'name', 'Jakub', 1, '2016-05-05 20:16:56', '2016-05-05 20:16:56'),
(8, 'surname', 'Rychecký', 1, '2016-05-05 20:16:59', '2016-05-05 20:17:05'),
(9, 'email', 'jakub@rychecky.cz', 1, '2016-05-05 20:17:18', '2016-05-05 20:17:18'),
(10, 'url_cv', 'http://cv.rychecky.cz/', 1, '2016-05-05 20:17:28', '2016-05-05 20:17:28'),
(11, 'skype', 'fext.cz', 1, '2016-05-07 07:14:24', '2016-05-07 07:14:24'),
(12, 'google_analytics', 'UA-33858105-3', 1, '2016-05-07 07:48:49', '2016-05-07 07:48:49'),
(13, 'bank', '670100-2206152631/6210', 1, '2017-10-27 04:11:37', '2017-10-27 04:11:37');

-- --------------------------------------------------------

--
-- Struktura tabulky `portfolio`
--

CREATE TABLE IF NOT EXISTS `portfolio` (
  `row_id` int(11) NOT NULL COMMENT 'ID záznamu',
  `portfolio_id` int(11) DEFAULT NULL COMMENT 'ID portfolia',
  `type` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL COMMENT 'Typ (kategorie) portfolia',
  `name` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL COMMENT 'Název dovednosti',
  `name_short` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL COMMENT 'Hodnota (míra) dovednosti',
  `detail` mediumtext COLLATE utf8_czech_ci COMMENT 'Textový popis',
  `detail_short` mediumtext COLLATE utf8_czech_ci COMMENT 'Zkrácený textový popis',
  `company` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `github` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `interesting` tinyint(4) DEFAULT '0' COMMENT 'Zajímavé?',
  `working` tinyint(4) DEFAULT '1',
  `locale` varchar(2) COLLATE utf8_czech_ci NOT NULL DEFAULT 'cs',
  `visible` tinyint(4) DEFAULT '1' COMMENT 'Viditelný?',
  `added` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Přidáno',
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Změněno'
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci ROW_FORMAT=COMPRESSED COMMENT='Seznam dovedností/znalostí';

--
-- Vypisuji data pro tabulku `portfolio`
--

INSERT INTO `portfolio` (`row_id`, `portfolio_id`, `type`, `name`, `name_short`, `detail`, `detail_short`, `company`, `url`, `date_start`, `date_end`, `size`, `github`, `interesting`, `working`, `locale`, `visible`, `added`, `timestamp`) VALUES
(1, 1, 'Profesionální', 'Centrum výzkumu Řež s.r.o.', 'CVŘ', 'Dvojjazyčný robustní web prezentující společnost Centrum výzkumu Řež s.r.o., jenž se specializuje na jadernou energetiku. Stránky využívají nejmodernější technologie včetně mikroformátů a verze pro mobilní telefony. Je naplněn velkým množstvím informací o infrastruktuře společnosti a prováděném výzkumu zejména na poli jaderné energetiky. Bylo dbáno zejména na odbornou správnost. Web je postaven na systému Wordpress.', 'Obsáhlý web společnosti v oblasti jaderného výzkumu.', 'Centrum výzkumu Řež s.r.o.', 'http://cvrez.cz/', '2013-09-01', NULL, 60, NULL, 1, 1, 'cs', 1, '2016-04-14 14:24:00', '2016-04-17 13:32:53'),
(2, 3, 'Profesionální', 'Enpedie: portál na podporu veřejné informovanosti v oblasti jaderné energetiky', 'Enpedie', 'Projekt společnosti Centrum výzkumu Řež s.r.o., který si klade za cíl pomocí wiki formátu udržovat a rozšiřovat informovanost o jaderné energetice. Hesla jsou vkládána a revidována odborníky na obor, tudíž jejich relevance je vyšší než z nevalidovaných zdrojů. Web je postaven na systému Mediawiki.', 'Wiki hesel s tématikou nejenom jaderné energetiky.', 'Centrum výzkumu Řež s.r.o.', 'http://enpedie.cz/', '2013-11-01', '2017-10-31', 30, NULL, 1, 1, 'cs', 1, '2016-04-14 14:24:00', '2017-10-24 18:31:22'),
(22, 4, 'Profesionální', 'Fukušima', 'Fukušima: otázky', 'Projekt Státního úřadu pro jadernou bezpečnost (SÚJB) společně s Centrem výzkumu Řež s.r.o. Web vznikl na jaře 2011 jako bezprostřední reakce na havárii jaderné elektrárny Fukušima v Japonsku. Dotazy uživatelů kladené elektronicky zodpovídali uznávaní jaderní odborníci z celé republiky, včetně paní Drábové. Web je postaven na systému Drupal.', 'Dotazy a odpovědi k havárii Fukušimy v&nbsp;Japonsku.', 'Centrum výzkumu Řež s.r.o.', 'http://otazky-fukusima.cvrez.cz/', '2013-06-01', '2013-06-01', 30, NULL, 0, 1, 'cs', 1, '2016-04-14 14:24:00', '2016-04-17 13:52:57'),
(23, 5, 'Osobní', 'Native Warez Forum', 'NWF', 'Projekt s téměř 45 tisíci návštěvami měsíčně (Google Analytics) a 80 tisíci registrovanými uživateli. Forum slouží pro sdílení souborů mezi uživateli. Systém SMF je silně modifikován vlastními unikátními doplňky. Velká komunita může NWF podporovat i na jeho stránkách na Facebooku a dalších sociálních sítích. Web je postaven na systému Simple Machines Forum (SMF).', 'Fórum pro sdílení souborů s téměr 80&nbsp;tisíci uživateli.', NULL, 'http://nwf.cz/', '2010-11-01', NULL, 70, NULL, 1, 1, 'cs', 1, '2016-04-14 14:24:00', '2016-04-17 13:53:03'),
(24, 6, 'Profesionální', 'ELEXTERN: Electricity Externalities for Better Planning', 'ELEXTERN', 'Webový nástroj pro výpočet nákladů jednotlivých zdrojů energií elektrické energie. Systém započítává ceny externalit jako jsou náklady na léčbu rakoviny způsobené ozářením nebo cena půdy zabrané solárními elekrárnami. Tyto stránky využívají AJAX a Google Chart API.', 'Kalkulátor nákladů jednotlivých zdrojů elektřiny. Interaktivní znázornění v grafech.', NULL, 'http://elextern.eu/', '2015-01-01', NULL, 50, 'https://github.com/jaCUBE/elextern', 1, 1, 'cs', 1, '2016-04-14 14:24:00', '2016-04-17 13:32:54'),
(25, 7, 'Profesionální', 'E2', 'CVŘ E2', '<p>Velký interní systém pro správu ~350 zaměstnanců a stovek projektů ve společnosti zabývající se jaderným výzkumem.</p>\r\n\r\n<p>\r\nVybrané funkce:\r\n<ul>\r\n<li>timesheet a využití vědecké infrastruktury včetně jaderných reaktorů,</li>\r\n<li>správa dovolených,</li>\r\n<li>komplexní management pracovních cest,</li>\r\n<li>databáze vědeckých publikací zaměstnanců,</li>\r\n<li>řízení rizik společnosti,</li>\r\n<li>management projektů včetně finančního řízení,</li>\r\n<li>přidělování a evidence úkolů...</li>\r\n</ul>\r\n</p>\r\n\r\n<p>V současnosti jde přibližně o 40 takovýchto <em>modulů</em>.</p>\r\n\r\n<p>Systém využívá zejména PHP, LESS, PDO, Bootstrap a další moderní technologie. Přes 700 commitů v git obsahuje stovky tříd a tisíce metod v bezmála 100 000 řádcích kódu.</p>\r\n\r\n<p>Databáze s více než miliónem záznamů pak obsluhuje v průměru dvanáct dotazů za sekundu.</p>', 'Robustní systém pro personální, projektové a finanční řízení vědecké organizace.', 'Centrum výzkumu Řež s.r.o.', 'http://e2.cvrez.cz/', '2015-01-01', NULL, 100, NULL, 1, 1, 'cs', 1, '2016-04-14 14:24:00', '2016-09-07 18:55:42'),
(26, 8, 'Profesionální', 'Portál společnosti CVŘ', 'Interní portál CVŘ', 'Administrátorská správa portálu postaveného pod technologií Liferay.', 'Správa interního portálu na systému LifeRay.', 'Centrum výzkumu Řež s.r.o.', NULL, '2015-01-01', '2015-01-01', 30, NULL, 0, 0, 'cs', 1, '2016-04-14 14:24:00', '2016-04-17 13:42:46'),
(27, 9, 'Profesionální', 'Web hotelu Na Plovárně v Humpolci', 'Hotel Na Plovárně', 'Menší webová prezentace hotelu na Vysočině.', 'Prezentace hotelu a restaurantu.', NULL, 'http://hotel-humpolec.cz/', '2014-10-01', '2014-10-01', 30, NULL, 0, 1, 'cs', 1, '2016-04-14 14:24:00', '2016-09-07 17:16:47'),
(28, 10, 'Profesionální', 'Web překladatele Translatech', 'Translatech', 'Menší webová prezentace překladatelských služeb v oblasti jaderné energetiky.', 'Web odborného překladatele.', NULL, 'http://translatech.cz/', '2014-06-01', '2014-06-01', 30, NULL, 0, 1, 'cs', 1, '2016-04-14 14:24:00', '2016-04-17 13:42:52'),
(29, 11, 'Osobní', 'ČSFD Extended Userscript', 'ČSFD Extended', NULL, 'Javascript do prohlížeče, který rozšiřuje funkce filmového serveru ČSFD.', NULL, 'https://greasyfork.org/cs/scripts/15784-%C4%8Csfd-extended', '2015-12-31', NULL, 20, 'https://github.com/jaCUBE/CSFD-Extended', 1, 1, 'cs', 1, '2016-04-14 14:24:00', '2016-04-17 13:33:05'),
(30, 12, 'Osobní', 'Excel2SQL', 'Excel2SQL', NULL, 'Nástroj pro převod dat z tabulky Excel do&nbsp;SQL kódu.', NULL, 'http://excel2sql.rychecky.cz/', '2015-10-10', '2017-01-10', 30, 'https://github.com/jaCUBE/excel2sql', 1, 1, 'cs', 1, '2016-04-14 14:24:00', '2017-10-24 18:31:11'),
(31, 13, 'Osobní', 'SRT Tool', 'SRT Tool', NULL, 'Utilita kontrolující typografii českých filmových titulků.', NULL, 'http://srt.rychecky.cz/', '2016-04-14', '2016-04-14', 20, NULL, 0, 1, 'cs', 1, '2016-04-14 14:24:01', '2017-10-24 18:31:03'),
(32, 14, 'Profesionální', 'NUSIM', 'NUSIM', NULL, 'Web a registrační systém jaderné konference.', NULL, 'http://nusim.cz/', '2014-10-06', '2014-10-06', 30, NULL, 0, 1, 'cs', 1, '2016-04-14 14:24:01', '2017-10-24 18:33:05'),
(33, 15, 'Profesionální', 'Pátý blok Dukovany', 'Pátý blok Dukovany', NULL, 'Web a registrační systém konference o jaderné elektrárně Dukovany.', 'EventEra', 'http://patyblokdukovany.cz/', '2015-01-09', '2015-01-09', 30, NULL, 0, 1, 'cs', 1, '2016-04-14 14:24:01', '2016-04-17 13:42:57'),
(34, 16, 'Profesionální', 'Malé reaktory', 'Malé reaktory', NULL, 'Web a registrační systém konference Malé modulární reaktory.', 'EventEra', 'http://malereaktory.cz/', '2016-01-12', '2016-01-12', 30, NULL, 0, 1, 'cs', 1, '2016-04-14 14:24:01', '2017-10-24 18:34:03'),
(35, 17, 'Profesionální', 'Energochemie', 'Energochemie', NULL, 'Web a registrační systém 38. ročníku semináře Energochemie.', 'EventEra', 'http://energochemie.cz/', '2016-04-17', '2016-04-17', 30, NULL, 0, 1, 'cs', 1, '2016-04-14 14:24:01', '2016-04-17 13:43:00'),
(36, 18, 'Profesionální', 'Horizon 2020 CORONA II', 'CORONA II', NULL, 'Web evropského projektu pro výuku jaderných reaktorů.', 'Centrum výzkumu Řež s.r.o.', 'http://corona2.eu/', '2015-11-17', '2017-10-31', 30, NULL, 0, 1, 'cs', 1, '2016-04-14 14:24:01', '2017-10-24 18:30:40'),
(37, 19, 'Profesionální', 'Efektivní přenos poznatků v energetice', 'EPP Projekt', NULL, 'Stránky evropského projektu pro přenos poznatků.', 'Centrum výzkumu Řež s.r.o.', 'http://epp-projekt.cz/', '2013-11-17', '2013-11-17', 30, NULL, 0, 1, 'cs', 1, '2016-04-14 14:24:01', '2016-09-07 17:17:04'),
(38, 20, 'Profesionální', 'Horizon 2020 VINCO', 'VINCO', NULL, 'Stránky projekty pro plynem chlazené reaktory.', 'Centrum výzkumu Řež s.r.o.', 'http://project-vinco.eu/', '2016-02-17', '2017-10-31', 30, NULL, 0, 1, 'cs', 1, '2016-04-14 14:24:01', '2017-10-24 18:30:46'),
(39, 2, 'Profesionální', 'SUStainable ENergy (SUSEN)', 'SUSEN', 'Web velkého výzkumného projektu ve dvou jazycích. Projekt SUSEN představuje dotaci přes dvě miliardy korun, které posílí výzkumnou infrastrukturu v energetice České republiky a budou významným impulsem k rozvoji týmů, znalostí a technologií. Web obsahuje informace o programech a automatické zobrazování aktuálních výběrových řízení díky RSS kanálu.\nVzhledem připomíná mateřský web společnosti CVŘ, v jejíž režii se projekt SUSEN odehrává. Web je postaven na systému Wordpress.', 'Webová prezentace velkého výzkumného projektu Udržitelná energetika.', 'Centrum výzkumu Řež s.r.o.', 'http://susen2020.cz/', '2014-04-17', '2017-10-31', 40, NULL, 0, 1, 'cs', 1, '2016-04-14 14:24:45', '2017-10-24 18:30:43');

-- --------------------------------------------------------

--
-- Struktura tabulky `skill`
--

CREATE TABLE IF NOT EXISTS `skill` (
  `row_id` int(11) NOT NULL COMMENT 'ID záznamu',
  `skill_id` int(11) DEFAULT NULL COMMENT 'ID dovednosti',
  `type` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL COMMENT 'Typ (kategorie) dovednosti',
  `name` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL COMMENT 'Název dovednosti',
  `value` int(11) DEFAULT NULL COMMENT 'Hodnota (míra) dovednosti',
  `detail` mediumtext COLLATE utf8_czech_ci COMMENT 'Textový popis',
  `locale` varchar(2) COLLATE utf8_czech_ci NOT NULL DEFAULT 'cs',
  `visible` tinyint(4) DEFAULT '1' COMMENT 'Viditelný?',
  `added` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Přidáno',
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Změněno'
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci ROW_FORMAT=COMPRESSED COMMENT='Seznam dovedností/znalostí';

--
-- Vypisuji data pro tabulku `skill`
--

INSERT INTO `skill` (`row_id`, `skill_id`, `type`, `name`, `value`, `detail`, `locale`, `visible`, `added`, `timestamp`) VALUES
(1, 1, 'Webdev', 'HTML', 80, 'Syntaxe jazyku HTML4 a XHTML. Znalost HTML 5 a zkušenosti s tvorbou sémantického webu (mikroformáty).', 'cs', 1, '2016-04-14 14:14:51', '2016-05-07 08:57:49'),
(2, 2, 'Webdev', 'CSS + LESS', 80, 'Kaskádové styly a design webových stránek včetně moderního CSS3. Zkušenosti s využitím LESS.', 'cs', 1, '2016-04-14 14:14:52', '2016-05-07 08:57:50'),
(3, 3, 'Webdev', 'PHP', 70, 'Ovládání skriptovacího jazyka PHP včetně objektově orientovaného programování (OOP).', 'cs', 1, '2016-04-14 14:14:52', '2017-10-24 12:09:04'),
(4, 4, 'Webdev', 'SQL + MySQL', 60, 'Používání dotazovacího jazyka SQL. Návrh, správa a optimalizace open source databáze MySQL.', 'cs', 1, '2016-04-14 14:14:52', '2016-05-07 08:57:53'),
(5, 5, 'Webdev', 'Javascript + jQuery', 60, 'Implementace Javascriptu do webu, zkušenosti s používáním knihoven jQuery a jQuery UI na reálných projektech.', 'cs', 1, '2016-04-14 14:14:52', '2016-06-08 05:38:22'),
(6, 6, 'Webdev', 'SEO', 45, 'Optimalizace pro vyhledávače. Správná syntaxe při psaní kódu, vhodná struktura stránek a metrika návštěvnosti.', 'cs', 1, '2016-04-14 14:14:52', '2016-05-07 08:57:58'),
(7, 7, 'Webdev', 'Sociální sítě', 50, 'Schopnost a zkušenost se správou známých sociálních sítí jako Facebook či YouTube. Základní povědomí o pravidlech a omezení, sledování novinek.', 'cs', 1, '2016-04-14 14:14:52', '2016-04-14 18:49:15'),
(8, 8, 'Webdev', 'Apache (LAMP)', 20, 'Zkušenosti s konfigurací virtuálního privátního serveru (VPS) včetně instalace PHP, modulů do PHP…', 'cs', 1, '2016-04-14 14:14:52', '2016-05-07 08:58:05'),
(9, 9, 'Webdev', 'CMS: SMF', 35, 'Bohaté zkušenosti se systémem Simple Machines Forum (SMF) pro internetová fóra. Znalost vnitřních procesů, psaní vlastních unikátních rozšíření…', 'cs', 1, '2016-04-14 14:14:52', '2016-05-07 08:58:06'),
(10, 10, 'Webdev', 'CMS: Wordpress', 35, 'Dobrá znalost systému Wordpress z uživatelského i administrátorského hlediska.', 'cs', 1, '2016-04-14 14:14:52', '2016-05-07 08:58:08'),
(11, 11, 'Webdev', 'CMS: MediaWiki', 20, 'Znalosti správy systému na bázi MediaWiki včetně konfigurace.', 'cs', 1, '2016-04-14 14:14:52', '2016-05-07 08:58:12'),
(12, 12, 'Webdev', 'CMS: Drupal', 10, 'Základní znalost.', 'cs', 1, '2016-04-14 14:14:52', '2016-05-07 08:58:13'),
(13, 13, 'Webdev', 'CMS: PHPBB', 10, 'Základní znalost.', 'cs', 1, '2016-04-14 14:14:52', '2016-05-07 08:58:15'),
(14, 14, 'ICT', 'Photoshop', 60, 'Pokročilá znalost grafického programu Adobe Photoshop. Zkušenosti se zpracováním fotografií z formátu RAW.', 'cs', 1, '2016-04-14 14:14:52', '2016-06-08 12:06:31'),
(15, 15, 'ICT', 'MS Office', 60, 'Dobrá znalost součástí balíku Microsoft Office.', 'cs', 1, '2016-04-14 14:14:52', '2016-04-14 18:40:00'),
(16, 16, 'ICT', 'Sony Vegas', 20, 'Základní znalost střihu videa.', 'cs', 1, '2016-04-14 14:14:52', '2016-04-14 18:40:03'),
(17, 17, 'ICT', 'Autocad + Inventor', 25, 'Základní znalost programu Autodesk AutoCAD a Autodesk Inventor.', 'cs', 1, '2016-04-14 14:14:52', '2016-04-14 18:40:03'),
(18, 18, 'ICT', 'Bezpečnost', 45, 'Zájem o zabezpečení počítačů, sítí, webových stránek. Kryptografie, ochrana dat…', 'cs', 1, '2016-04-14 14:14:52', '2016-04-14 18:40:01'),
(19, 19, 'ICT', 'Google', 60, 'Využívání a administrace dokumentů na Google Drive. Využívání Google Chart API pro vykreslování grafů.', 'cs', 1, '2016-04-14 14:14:52', '2016-04-14 18:40:00'),
(20, 20, 'ICT', 'C# + .NET', 25, 'Základy objektového programování desktopových aplikací v C# za využití grafického rozhraní Windows a frameworku .NET.', 'cs', 1, '2016-04-14 14:14:52', '2016-04-14 18:40:03'),
(21, 21, 'ICT', 'Matlab', 20, 'Základní znalost programovacího jazyka na bázi FORTRAN.', 'cs', 1, '2016-04-14 14:14:53', '2016-04-14 18:40:03'),
(22, 22, 'ICT', 'Cinema 4D', 20, 'Základní znalost 3D modelování.', 'cs', 1, '2016-04-14 14:14:53', '2016-04-14 18:40:04'),
(23, 23, 'ICT', 'Java', 15, 'Základní znalost.', 'cs', 1, '2016-04-14 14:14:53', '2016-04-14 18:40:04'),
(24, 24, 'ICT', 'Hardware', 45, 'Znalost počítačových komponent a periferií.', 'cs', 1, '2016-04-14 14:14:53', '2016-04-14 18:40:01'),
(25, 25, 'ICT', 'InDesign', 30, 'Lepší znalost programu pro sázení a typografickou úpravu, Adobe InDesign.', 'cs', 1, '2016-04-14 14:14:53', '2016-04-14 18:40:01'),
(26, 26, 'ICT', 'Illustrator', 20, 'Základní znalost programu pro tvorbu vektorové grafiky, Adobe Illustrator.', 'cs', 1, '2016-04-14 14:14:53', '2016-04-14 18:40:04'),
(27, 27, 'Jazyky', 'Čeština', 90, 'Znalost češtiny na pokročilé úrovni z hlediska gramatiky a stylistiky. Zkušenosti s proofreadingem a korekturou vědeckých textů.', 'cs', 1, '2016-04-14 14:14:53', '2016-04-14 14:14:53'),
(28, 28, 'Jazyky', 'Angličtina', 70, 'Znalost angličtiny na úrovni upper-intermediate. Bezproblémová schopnost komunikovat i číst technickou dokumentaci.', 'cs', 1, '2016-04-14 14:14:53', '2016-05-07 08:58:24'),
(29, 29, 'Ostatní', 'Marketing & PR', 30, 'Základní znalost firemní komunikace, zkušenosti s prací na oddělení komunikace vědecké společnosti.', 'cs', 1, '2016-04-14 14:14:53', '2016-04-14 18:39:39'),
(30, 30, 'Ostatní', 'Jaderná energetika', 20, 'Základní fungování jaderného reaktoru. Zkušenost s prací se zdroji ionizujícího záření (pracovník kategorie A).', 'cs', 1, '2016-04-14 14:14:53', '2016-04-14 18:39:39'),
(31, 31, 'Ostatní', 'Strojírenství', 15, 'Elementární znalost norem či konstrukce.', 'cs', 1, '2016-04-14 14:14:53', '2016-04-14 18:39:39'),
(32, 32, 'Webdev', 'Git + GitHub', 25, 'Základní práce s verzovacím systémem Git a repozitáři na GitHubu.', 'cs', 1, '2016-04-14 14:14:53', '2016-05-07 08:57:41'),
(33, 33, 'Webdev', 'Python', 10, 'Základní znalost programovacího jazyka Python.', 'cs', 1, '2016-04-14 14:14:53', '2016-05-07 08:57:38'),
(34, 34, 'Ostatní', 'Fotografování', 40, 'Znalost práce s DSLR (zrcadlovka), principů a praxi fotografie včetně digitálních úprav.', 'cs', 1, '2016-04-14 14:14:53', '2016-04-14 18:39:37'),
(35, 35, 'Webdev', 'AngularJS', 10, 'Základní znalost práce s Javascriptovým front-end frameworkem AngularJS.', 'cs', 1, '2016-06-08 05:38:09', '2016-06-08 05:39:31'),
(36, 36, 'Webdev', 'Bootstrap', 50, 'Znalost frameworku Bootstrap a jeho nasazení na reálných webech.', 'cs', 1, '2016-06-08 05:39:13', '2016-06-08 05:39:29'),
(37, 37, 'Webdev', 'Grunt', 10, 'Základní znalost task runneru Grunt.', 'cs', 1, '2016-06-08 12:05:50', '2016-06-08 12:05:50');

-- --------------------------------------------------------

--
-- Struktura tabulky `social`
--

CREATE TABLE IF NOT EXISTS `social` (
  `row_id` int(11) NOT NULL COMMENT 'ID záznamu',
  `social_id` int(11) NOT NULL DEFAULT '0' COMMENT 'ID profilu na sociální síti',
  `name` varchar(1024) COLLATE utf8_czech_ci DEFAULT NULL COMMENT 'Název sítě',
  `url` varchar(1024) COLLATE utf8_czech_ci DEFAULT NULL COMMENT 'URL profilu',
  `text` varchar(1024) COLLATE utf8_czech_ci DEFAULT NULL COMMENT 'Jiný text',
  `icon` varchar(1024) COLLATE utf8_czech_ci DEFAULT NULL COMMENT 'Ikona FontAwesome',
  `color` varchar(32) COLLATE utf8_czech_ci DEFAULT NULL COMMENT 'Barva (hex)',
  `order` int(11) DEFAULT '0' COMMENT 'Hodnota pořadí',
  `visible` tinyint(4) DEFAULT '1' COMMENT 'Viditelný?',
  `added` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Přidáno',
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Změněno'
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci ROW_FORMAT=COMPRESSED COMMENT='Odkazy na profily na sociálních sítích';

--
-- Vypisuji data pro tabulku `social`
--

INSERT INTO `social` (`row_id`, `social_id`, `name`, `url`, `text`, `icon`, `color`, `order`, `visible`, `added`, `timestamp`) VALUES
(1, 2, 'Facebook', 'https://www.facebook.com/jakub.rychecky', NULL, 'fa-facebook', '#3F5C9A', 90, 1, '2016-05-04 16:52:27', '2016-05-04 17:57:50'),
(2, 1, 'LinkedIn', 'https://www.linkedin.com/in/rychecky', NULL, 'fa-linkedin', '#1884BB', 100, 1, '2016-05-04 16:52:55', '2016-05-04 17:57:19'),
(3, 4, 'ČSFD', 'http://www.csfd.cz/uzivatel/99999-jacube/', NULL, 'fa-film', '#CF080F', 50, 1, '2016-05-04 16:53:09', '2016-05-05 20:09:31'),
(4, 6, 'DatabazeKnih', 'http://www.databazeknih.cz/uzivatele/jacube-38935', NULL, 'fa-book', '#9F393A', 0, 1, '2016-05-04 16:53:27', '2016-05-04 17:59:22'),
(5, 3, 'GitHub', 'https://github.com/jaCUBE', NULL, 'fa-github', '#444444', 30, 1, '2016-05-04 16:53:44', '2016-05-05 20:09:28'),
(6, 5, 'Steam', 'http://steamcommunity.com/id/jacube/', NULL, 'fa-steam', '#000000', 50, 1, '2016-05-04 16:54:24', '2016-05-05 20:09:34'),
(8, 8, 'Last.fm', 'http://www.last.fm/user/jaCUBExCZ', NULL, 'fa-lastfm', '#B90000', 30, 1, '2016-05-04 16:55:47', '2016-05-05 20:10:10'),
(9, 9, 'Flickr', 'https://www.flickr.com/photos/rychecky/', NULL, 'fa-picture-o', '#FF0084', 20, 1, '2016-05-04 16:56:09', '2016-05-05 20:09:41'),
(10, 7, 'Titulky.com', 'http://www.titulky.com/?UserDetail=449856', NULL, 'fa-align-center', '#4376A1', 0, 1, '2016-05-04 16:56:51', '2016-05-05 20:09:54'),
(11, 11, 'Greasy Fork', 'https://greasyfork.org/cs/users/14126-jacube', NULL, 'fa-code', '#670000', 0, 1, '2016-08-11 14:13:36', '2016-08-11 14:13:36');

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `certificate`
--
ALTER TABLE `certificate`
  ADD PRIMARY KEY (`row_id`),
  ADD KEY `visible` (`visible`),
  ADD KEY `certificate_id` (`certificate_id`);

--
-- Klíče pro tabulku `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`row_id`),
  ADD KEY `hobby_id_visible` (`experience_id`,`visible`);

--
-- Klíče pro tabulku `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`row_id`),
  ADD KEY `portfolio_id` (`portfolio_id`),
  ADD KEY `visible` (`visible`),
  ADD KEY `thumbnail` (`thumbnail`);

--
-- Klíče pro tabulku `hobby`
--
ALTER TABLE `hobby`
  ADD PRIMARY KEY (`row_id`),
  ADD KEY `visible` (`visible`);

--
-- Klíče pro tabulku `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`row_id`),
  ADD KEY `visible` (`visible`);

--
-- Klíče pro tabulku `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`row_id`),
  ADD KEY `portfolio_id_visible` (`portfolio_id`,`visible`);

--
-- Klíče pro tabulku `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`row_id`),
  ADD KEY `skill_id_visible` (`skill_id`,`visible`),
  ADD KEY `skill_value` (`value`);

--
-- Klíče pro tabulku `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`row_id`),
  ADD KEY `visible` (`visible`),
  ADD KEY `social_id` (`social_id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `certificate`
--
ALTER TABLE `certificate`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID záznamu',AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pro tabulku `experience`
--
ALTER TABLE `experience`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID záznamu',AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pro tabulku `gallery`
--
ALTER TABLE `gallery`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID záznamu',AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT pro tabulku `hobby`
--
ALTER TABLE `hobby`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID záznamu',AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT pro tabulku `info`
--
ALTER TABLE `info`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID záznamu',AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pro tabulku `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID záznamu',AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT pro tabulku `skill`
--
ALTER TABLE `skill`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID záznamu',AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT pro tabulku `social`
--
ALTER TABLE `social`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID záznamu',AUTO_INCREMENT=12;
--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `e2_gallery/portfolio_id` FOREIGN KEY (`portfolio_id`) REFERENCES `portfolio` (`portfolio_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
