-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.29-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5272
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS = @@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS = 0 */;
/*!40101 SET @OLD_SQL_MODE = @@SQL_MODE, SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table rychecky.certificate
DROP TABLE IF EXISTS `certificate`;
CREATE TABLE IF NOT EXISTS `certificate` (
  `row_id`         int(11)                          NOT NULL                   AUTO_INCREMENT
  COMMENT 'ID záznamu',
  `certificate_id` int(11)                                                     DEFAULT NULL
  COMMENT 'ID certifikátu',
  `type`           varchar(255) COLLATE utf8_czech_ci                          DEFAULT NULL
  COMMENT 'Typ certifikátu',
  `name`           varchar(255) COLLATE utf8_czech_ci                          DEFAULT NULL
  COMMENT 'Název certifikátu',
  `detail`         mediumtext COLLATE utf8_czech_ci COMMENT 'Detailní popis',
  `issue_date`     date                                                        DEFAULT NULL
  COMMENT 'Datum vystavení',
  `issue_by`       varchar(255) COLLATE utf8_czech_ci                          DEFAULT NULL
  COMMENT 'Vystavitel',
  `url`            varchar(255) COLLATE utf8_czech_ci                          DEFAULT NULL
  COMMENT 'URL certifikátu',
  `locale`         varchar(2) COLLATE utf8_czech_ci NOT NULL                   DEFAULT 'cs',
  `visible`        tinyint(4)                                                  DEFAULT '1'
  COMMENT 'Viditelný?',
  `added`          timestamp                        NULL                       DEFAULT CURRENT_TIMESTAMP
  COMMENT 'Přidáno',
  `timestamp`      timestamp                        NULL                       DEFAULT CURRENT_TIMESTAMP
  ON UPDATE CURRENT_TIMESTAMP
  COMMENT 'Změněno',
  PRIMARY KEY (`row_id`),
  KEY `visible` (`visible`),
  KEY `certificate_id` (`certificate_id`)
)
  ENGINE = InnoDB
  AUTO_INCREMENT = 5
  DEFAULT CHARSET = utf8
  COLLATE = utf8_czech_ci
  ROW_FORMAT = COMPRESSED
  COMMENT ='Seznam dovedností/znalostí';

-- Dumping data for table rychecky.certificate: ~4 rows (approximately)
/*!40000 ALTER TABLE `certificate`
  DISABLE KEYS */;
INSERT INTO `certificate` (`row_id`, `certificate_id`, `type`, `name`, `detail`, `issue_date`, `issue_by`, `url`, `locale`, `visible`, `added`, `timestamp`)
VALUES
  (1, 1, 'MOOC', 'Usable Security',
      'On-line kurz zabývající se tématem návrhu a vytváření zabezpečených systémů s ohledem na použitelnost a UX. Základní principy vztahu interakcí člověk-počítač a bezpečnosti, způsob jejich měření včetně implementace v systému.',
      '2015-08-10', 'University of Maryland, College Park',
      'https://www.coursera.org/account/accomplishments/verify/E2GJU2HNKU', 'cs', 1, '2016-04-14 20:01:32',
   '2016-05-05 21:54:39'),
  (2, 2, 'MOOC', 'Front-End JavaScript Frameworks: AngularJS',
      'Seznámení s tvorbou single page applications pomocí frameworku AngularJS a základy práce s nástroji jako, Node.js, Grunt...',
      '2016-06-30', 'The Hong Kong University of Science and Technology',
      'https://www.coursera.org/account/accomplishments/verify/6C8YVQ9YJC7Q', 'cs', 1, '2016-08-11 16:14:28',
   '2017-11-03 08:11:09'),
  (3, 1, 'MOOC', 'Usable Security',
      'On-line course focused on designing and creating secured systems, their usability and UX. Basic principles of human-computer interaction and security. Measuring results and implementation included.',
      '2015-08-10', 'University of Maryland, College Park',
      'https://www.coursera.org/account/accomplishments/verify/E2GJU2HNKU', 'en', 1, '2016-04-14 20:01:32',
   '2017-11-03 08:09:43'),
  (4, 2, 'MOOC', 'Front-End JavaScript Frameworks: AngularJS',
      'Creating web applications with AngularJS, basic work with another utilities as Node.js, Grunt...', '2016-06-30',
      'The Hong Kong University of Science and Technology',
      'https://www.coursera.org/account/accomplishments/verify/6C8YVQ9YJC7Q', 'en', 1, '2016-08-11 16:14:28',
   '2017-11-03 08:11:03');
/*!40000 ALTER TABLE `certificate`
  ENABLE KEYS */;

-- Dumping structure for table rychecky.experience
DROP TABLE IF EXISTS `experience`;
CREATE TABLE IF NOT EXISTS `experience` (
  `row_id`        int(11)                          NOT NULL                   AUTO_INCREMENT
  COMMENT 'ID záznamu',
  `experience_id` int(11)                                                     DEFAULT NULL
  COMMENT 'ID zkušenosti',
  `type`          varchar(255) COLLATE utf8_czech_ci                          DEFAULT NULL
  COMMENT 'Typ zkušenosti',
  `title`         varchar(255) COLLATE utf8_czech_ci                          DEFAULT NULL
  COMMENT 'Název zkušenosti',
  `company`       varchar(255) COLLATE utf8_czech_ci                          DEFAULT NULL
  COMMENT 'Společnost',
  `date_start`    date                                                        DEFAULT NULL
  COMMENT 'Datum začátku',
  `date_end`      date                                                        DEFAULT NULL
  COMMENT 'Datum konce',
  `detail`        mediumtext COLLATE utf8_czech_ci COMMENT 'Detailní popis',
  `note`          mediumtext COLLATE utf8_czech_ci COMMENT 'Poznámka',
  `locale`        varchar(2) COLLATE utf8_czech_ci NOT NULL                   DEFAULT 'cs',
  `visible`       tinyint(4)                                                  DEFAULT '1'
  COMMENT 'Viditelný?',
  `added`         timestamp                        NULL                       DEFAULT CURRENT_TIMESTAMP
  COMMENT 'Přidáno',
  `timestamp`     timestamp                        NULL                       DEFAULT CURRENT_TIMESTAMP
  ON UPDATE CURRENT_TIMESTAMP
  COMMENT 'Změněno',
  PRIMARY KEY (`row_id`),
  KEY `hobby_id_visible` (`experience_id`, `visible`)
)
  ENGINE = InnoDB
  AUTO_INCREMENT = 13
  DEFAULT CHARSET = utf8
  COLLATE = utf8_czech_ci
  ROW_FORMAT = COMPACT
  COMMENT ='Seznam zkušeností/vzdělání';

-- Dumping data for table rychecky.experience: ~12 rows (approximately)
/*!40000 ALTER TABLE `experience`
  DISABLE KEYS */;
INSERT INTO `experience` (`row_id`, `experience_id`, `type`, `title`, `company`, `date_start`, `date_end`, `detail`, `note`, `locale`, `visible`, `added`, `timestamp`)
VALUES
  (1, 1, 'Zaměstnání', 'Operátor reaktorových smyček', 'Centrum výzkumu Řež s.r.o', '2011-01-01', '2014-05-01',
      'Operátor experimentálních smyček výzkumného reaktoru LVR-15. Materiálový výzkum pro jaderné elektrárny na vodní, superkritické vodní a vysokoteplotní héliové smyčce…',
      'Částečný úvazek při studiu. Pracovník se zdroji ionizujícího záření.', 'cs', 1, '2016-04-14 19:42:13',
   '2016-05-04 21:05:18'),
  (2, 2, 'Zaměstnání', 'Full Stack Developer', 'Centrum výzkumu Řež s.r.o', '2013-07-01', '2018-04-30', 'Tvorba <a href="javascript:void(0)" onclick="portfolio(7)">robustního interního systému pro personální, finanční a projektové řízení</a> od základu. Práce na backendu i frontendu, business logic, návrh databáze...\n<br />\nSpravování několika veřejných webů společnosti věnující se jaderné problematice.\n<br />\nRozdílné CMS, firemní komunikace, dotační programy EU…', NULL, 'cs', 1, '2016-04-14 19:42:13', '2018-04-13 09:23:50'),
  (3, 3, 'Vzdělání', 'Strojírenství se zaměřením na počítačové aplikace', 'Střední škola letecké a výpočetní techniky Odolena Voda', '2006-09-01', '2010-06-30', 'Střední škola letecké a výpočetní techniky v Odolene Vodě. Strojírenství, kostrukce, práce v CAD a CNC systémech a tvorba webových prezentací…', 'Odmaturováno s vyznamenáním.', 'cs', 1, '2016-04-14 19:42:13', '2017-10-30 13:50:48'),
  (4, 4, 'Vzdělání', 'ZŠ Kralupy n. Vlt.', 'Základní škola Jana Amose Komenského', '1996-09-01', '2006-06-30', 'Veřejná základní škola v Kralupech nad Vltavou.', NULL, 'cs', 1, '2016-05-04 20:22:09', '2017-11-03 08:52:36'),
  (5, 5, 'Vzdělání', 'ČVUT FBMI (nedokončeno)', 'ČVUT v Praze', '2010-10-01', '2013-02-01', 'Bakalářské studium oboru Biomedicínská informatika. Multidisciplinární obor kombinující programování s lékařskými vědami.', 'Ukončeno po třech semestrech.', 'cs', 1, '2016-05-04 20:23:15', '2017-11-03 08:56:03'),
  (6, 6, 'Zaměstnání', 'Administrativní práce na konstrukčním oddělení', 'ÚJV Řež, a. s.', '2009-07-01', '2009-08-01', 'Tvorba a kompletování výrobní dokumentace ke specializovaným strojírenským výrobkům.', 'Brigáda při studiu.', 'cs', 1, '2016-04-14 19:42:13', '2017-10-27 05:56:01'),
  (7, 1, 'Zaměstnání', 'Reactor Loop Operator', 'Research Centre Rez', '2011-01-01', '2014-05-01', 'Operator of experimental loops of research reactor LVR-15. Material-based research for nuclear stations on water loop, supercritical water loop and high-temperature helium loop.', 'Part-time job while studying. Worker with radioactive materials.', 'en', 1, '2016-04-14 19:42:13', '2018-04-12 21:52:07'),
  (8, 2, 'Zaměstnání', 'Full Stack Developer', 'Research Centre Rez', '2013-07-01', '2018-04-30', 'Creation of <a href="javascript:void(0)" onclick="portfolio(7)">robust internal system for personal, financial and project management</a> from the scratch. Working on backend and frontend, business logic, drafts of database.\n<br />\nAdministration of several nuclear company’s public websites.\nMultiple CMS, company communication, the EU subsidy programs also fall within my competency\n<br />\nMultiple CMS, company communication, the EU subsidy programs also fall within my competency.', NULL, 'en', 1, '2016-04-14 19:42:13', '2018-04-13 09:23:49'),
  (9, 3, 'Vzdělání', 'Engineering with Computer Technologies', 'Secondary School for Aviation and Computing Technology Odolená Voda', '2006-09-01', '2010-06-30', 'Secondary School for Aviation and Computing Technology in Odolená Voda. Engineering, construction, working in CAD and CNC, creation of web presentations', 'Graduated with honors.', 'en', 1, '2016-04-14 19:42:13', '2018-04-12 21:51:24'),
  (10, 4, 'Vzdělání', 'Elementary School Kralupy n. Vlt.', 'Jan Amos Komensky Elementary School', '1996-09-01', '2006-06-30', 'Public elementary school of city of Kralupy nad Vltavou.', NULL, 'en', 1, '2016-05-04 20:22:09', '2017-11-03 08:57:42'),
  (11, 5, 'Vzdělání', 'CTU FBMI (terminated)', 'CTU in Prague', '2010-10-01', '2013-02-01', 'University study in field of Biomedicine Informatics. Multidisciplinary field consisted of programming and medicine science.', 'Terminated after year and half.', 'en', 1, '2016-05-04 20:23:15', '2017-11-03 08:57:00'),
  (12, 6, 'Zaměstnání', 'Administrative Worker at the Construction Department', 'Nuclear Research Institute Rez',
       '2009-07-01', '2009-08-01',
       'Creation and compiling of technical documentation for specialized engineering products.',
       'Part-time job while studying.', 'en', 1, '2016-04-14 19:42:13', '2018-04-12 21:51:50');
/*!40000 ALTER TABLE `experience`
  ENABLE KEYS */;

-- Dumping structure for table rychecky.hobby
DROP TABLE IF EXISTS `hobby`;
CREATE TABLE IF NOT EXISTS `hobby` (
  `row_id`    int(11)                          NOT NULL                   AUTO_INCREMENT
  COMMENT 'ID záznamu',
  `hobby_id`  int(11)                                                     DEFAULT NULL
  COMMENT 'ID koníčku',
  `name`      varchar(255) COLLATE utf8_czech_ci                          DEFAULT NULL
  COMMENT 'Název koníčku',
  `size`      int(11)                                                     DEFAULT '1'
  COMMENT 'Velikost slova v cloudu',
  `locale`    varchar(2) COLLATE utf8_czech_ci NOT NULL                   DEFAULT 'cs',
  `visible`   tinyint(4)                                                  DEFAULT '1'
  COMMENT 'Viditelný?',
  `added`     timestamp                        NULL                       DEFAULT CURRENT_TIMESTAMP
  COMMENT 'Přidáno',
  `timestamp` timestamp                        NULL                       DEFAULT CURRENT_TIMESTAMP
  ON UPDATE CURRENT_TIMESTAMP
  COMMENT 'Změněno',
  PRIMARY KEY (`row_id`),
  KEY `visible` (`visible`)
)
  ENGINE = InnoDB
  AUTO_INCREMENT = 45
  DEFAULT CHARSET = utf8
  COLLATE = utf8_czech_ci
  ROW_FORMAT = COMPRESSED
  COMMENT ='Seznam dovedností/znalostí';

-- Dumping data for table rychecky.hobby: ~44 rows (approximately)
/*!40000 ALTER TABLE `hobby`
  DISABLE KEYS */;
INSERT INTO `hobby` (`row_id`, `hobby_id`, `name`, `size`, `locale`, `visible`, `added`, `timestamp`) VALUES
  (1, 1, 'Informační technologie', 100, 'cs', 1, '2016-04-14 19:04:57', '2016-05-05 21:55:35'),
  (2, 2, 'Sociální sítě', 80, 'cs', 1, '2016-04-14 19:05:33', '2016-05-05 21:55:37'),
  (3, 3, 'Seriály', 60, 'cs', 1, '2016-04-14 19:05:46', '2016-05-05 21:55:39'),
  (4, 4, 'Věda & vzdělání', 80, 'cs', 1, '2016-04-14 19:05:56', '2017-11-03 04:58:38'),
  (5, 5, 'Četba & literatura', 80, 'cs', 1, '2016-04-14 19:07:27', '2016-05-05 21:56:46'),
  (6, 6, 'Webové technologie', 100, 'cs', 1, '2016-04-14 19:07:38', '2016-05-05 21:55:44'),
  (7, 7, 'Filmy', 70, 'cs', 1, '2016-04-14 19:07:45', '2016-05-05 21:55:45'),
  (8, 8, 'Mobilní telefony', 50, 'cs', 1, '2016-04-14 19:07:56', '2016-05-05 21:55:46'),
  (9, 9, 'Programování', 80, 'cs', 1, '2016-04-14 19:08:06', '2016-05-05 21:55:48'),
  (10, 10, 'Hudba', 70, 'cs', 1, '2016-04-14 19:08:11', '2016-05-05 21:55:49'),
  (11, 11, 'Hardware', 60, 'cs', 1, '2016-04-14 19:08:18', '2016-05-05 21:55:51'),
  (12, 12, 'Počítačové hry', 80, 'cs', 1, '2016-04-14 19:08:24', '2017-11-03 08:40:37'),
  (13, 13, 'Grafika & design', 60, 'cs', 1, '2016-04-14 19:08:39', '2016-05-05 21:55:54'),
  (14, 14, 'Počítačová bezpečnost', 60, 'cs', 1, '2016-04-14 19:08:48', '2017-11-03 08:40:40'),
  (15, 15, 'Fotografování', 40, 'cs', 1, '2016-04-14 19:08:55', '2017-11-03 08:40:45'),
  (16, 16, 'Anime', 40, 'cs', 1, '2016-04-14 19:08:59', '2017-11-03 08:41:03'),
  (17, 17, 'Tvorba titulků', 70, 'cs', 1, '2016-05-04 18:57:06', '2016-05-05 21:56:00'),
  (18, 18, 'Elektronika', 50, 'cs', 1, '2016-04-14 19:08:59', '2016-05-05 21:55:58'),
  (19, 19, 'Kryptografie', 40, 'cs', 1, '2016-04-14 19:08:59', '2016-05-07 09:53:38'),
  (20, 20, 'Kočky', 40, 'cs', 1, '2016-04-14 19:08:59', '2016-05-07 09:53:39'),
  (21, 21, 'Japonsko', 40, 'cs', 1, '2016-05-05 22:11:03', '2016-05-05 22:11:06'),
  (22, 22, 'Fyzika', 40, 'cs', 1, '2016-05-07 09:53:30', '2016-05-07 09:53:34'),
  (23, 1, 'Information technology', 100, 'en', 1, '2016-04-14 19:04:57', '2017-11-03 04:58:46'),
  (24, 2, 'Social networks', 80, 'en', 1, '2016-04-14 19:05:33', '2017-11-03 04:58:48'),
  (25, 3, 'TV series', 60, 'en', 1, '2016-04-14 19:05:46', '2017-11-03 04:58:48'),
  (26, 4, 'Science & Education', 80, 'en', 1, '2016-04-14 19:05:56', '2017-11-03 08:41:53'),
  (27, 5, 'Books Reading', 80, 'en', 1, '2016-04-14 19:07:27', '2017-11-03 08:41:31'),
  (28, 6, 'Web development', 100, 'en', 1, '2016-04-14 19:07:38', '2017-11-03 04:58:50'),
  (29, 7, 'Movies', 70, 'en', 1, '2016-04-14 19:07:45', '2017-11-03 04:58:51'),
  (30, 8, 'Smartphones', 50, 'en', 1, '2016-04-14 19:07:56', '2017-11-03 04:58:52'),
  (31, 9, 'Programming', 80, 'en', 1, '2016-04-14 19:08:06', '2017-11-03 04:58:52'),
  (32, 10, 'Music', 70, 'en', 1, '2016-04-14 19:08:11', '2017-11-03 04:58:54'),
  (33, 11, 'Hardware', 60, 'en', 1, '2016-04-14 19:08:18', '2017-11-03 04:58:55'),
  (34, 12, 'Computer games', 80, 'en', 1, '2016-04-14 19:08:24', '2017-11-03 08:40:34'),
  (35, 13, 'Graphics & Design', 60, 'en', 1, '2016-04-14 19:08:39', '2017-11-03 08:42:00'),
  (36, 14, 'Computer security', 60, 'en', 1, '2016-04-14 19:08:48', '2017-11-03 08:40:42'),
  (37, 15, 'Photography', 40, 'en', 1, '2016-04-14 19:08:55', '2017-11-03 08:40:44'),
  (38, 16, 'Anime', 40, 'en', 1, '2016-04-14 19:08:59', '2017-11-03 08:41:01'),
  (39, 17, 'Subtitles making', 70, 'en', 1, '2016-05-04 18:57:06', '2017-11-03 04:59:10'),
  (40, 18, 'Electronics', 50, 'en', 1, '2016-04-14 19:08:59', '2017-11-03 04:59:03'),
  (41, 19, 'Cryptography', 40, 'en', 1, '2016-04-14 19:08:59', '2017-11-03 04:59:03'),
  (42, 20, 'Cats', 40, 'en', 1, '2016-04-14 19:08:59', '2017-11-03 04:59:12'),
  (43, 21, 'Japan', 40, 'en', 1, '2016-05-05 22:11:03', '2017-11-03 04:59:13'),
  (44, 22, 'Physics', 40, 'en', 1, '2016-05-07 09:53:30', '2017-11-03 04:59:14');
/*!40000 ALTER TABLE `hobby`
  ENABLE KEYS */;

-- Dumping structure for table rychecky.image
DROP TABLE IF EXISTS `image`;
CREATE TABLE IF NOT EXISTS `image` (
  `row_id`       int(11)   NOT NULL                   AUTO_INCREMENT
  COMMENT 'ID záznamu',
  `portfolio_id` int(11)                              DEFAULT NULL
  COMMENT 'ID portfolia',
  `filename`     varchar(255) COLLATE utf8_czech_ci   DEFAULT NULL
  COMMENT 'Název souboru',
  `title`        varchar(512) COLLATE utf8_czech_ci   DEFAULT NULL
  COMMENT 'Popis obrázku',
  `thumbnail`    int(11)                              DEFAULT '0'
  COMMENT 'Thumbnail?',
  `order`        int(11)                              DEFAULT '0'
  COMMENT 'Hodnota pořadí',
  `visible`      tinyint(4)                           DEFAULT '1'
  COMMENT 'Viditelný?',
  `added`        timestamp NULL                       DEFAULT CURRENT_TIMESTAMP
  COMMENT 'Přidáno',
  `timestamp`    timestamp NULL                       DEFAULT CURRENT_TIMESTAMP
  ON UPDATE CURRENT_TIMESTAMP
  COMMENT 'Změněno',
  PRIMARY KEY (`row_id`),
  KEY `portfolio_id` (`portfolio_id`),
  KEY `visible` (`visible`),
  KEY `thumbnail` (`thumbnail`),
  CONSTRAINT `e2_gallery/portfolio_id` FOREIGN KEY (`portfolio_id`) REFERENCES `portfolio` (`portfolio_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
)
  ENGINE = InnoDB
  AUTO_INCREMENT = 32
  DEFAULT CHARSET = utf8
  COLLATE = utf8_czech_ci
  ROW_FORMAT = COMPRESSED;

-- Dumping data for table rychecky.image: ~29 rows (approximately)
/*!40000 ALTER TABLE `image`
  DISABLE KEYS */;
INSERT INTO `image` (`row_id`, `portfolio_id`, `filename`, `title`, `thumbnail`, `order`, `visible`, `added`, `timestamp`)
VALUES
  (1, 6, 'elextern_th.png', NULL, 1, 0, 1, '2016-04-17 14:19:55', '2016-09-07 21:26:51'),
  (2, 7, 'e2_th.png', NULL, 1, 0, 1, '2016-04-17 14:19:55', '2016-09-07 21:26:51'),
  (3, 19, 'epp_th.png', NULL, 1, 0, 1, '2016-04-17 14:19:55', '2016-09-07 21:26:56'),
  (4, 1, 'cvrez_th.png', NULL, 1, 0, 1, '2016-04-17 14:19:55', '2016-09-07 21:26:48'),
  (5, 18, 'corona2_th.png', NULL, 1, 0, 1, '2016-04-17 14:19:55', '2016-09-07 21:26:56'),
  (6, 11, 'csfd_e_th.png', NULL, 1, 0, 1, '2016-04-17 14:19:55', '2016-09-07 21:26:54'),
  (7, 12, 'excel2sql_th.png', NULL, 1, 0, 1, '2016-04-17 15:09:33', '2016-09-07 21:26:55'),
  (8, 5, 'nwf_th.png', NULL, 1, 0, 1, '2016-04-17 15:19:31', '2016-09-07 21:26:50'),
  (9, 2, 'susen_th.png', NULL, 1, 0, 1, '2016-04-17 15:20:22', '2016-09-07 21:26:49'),
  (10, 3, 'enpedie_th.png', NULL, 1, 0, 1, '2016-04-17 17:21:17', '2016-09-07 21:26:50'),
  (11, 17, 'energochemie_th.png', NULL, 1, 0, 1, '2016-04-17 17:21:47', '2016-09-07 21:26:56'),
  (12, 4, 'fukusima_th.png', NULL, 1, 0, 1, '2016-04-17 17:23:13', '2016-09-07 21:26:50'),
  (13, 13, 'srt_th.png', NULL, 1, 0, 1, '2016-04-17 17:24:59', '2016-09-07 21:26:55'),
  (15, 16, 'malereaktory_th.png', NULL, 1, 0, 1, '2016-09-07 19:05:19', '2016-09-07 21:26:55'),
  (16, 9, 'naplovarne_th.png', NULL, 1, 0, 1, '2016-09-07 19:07:47', '2016-09-07 21:26:54'),
  (17, 15, 'patyblokdukovany_th.png', NULL, 1, 0, 1, '2016-09-07 19:12:39', '2016-09-07 21:26:55'),
  (18, 20, 'vinco_th.png', NULL, 1, 0, 1, '2016-09-07 19:14:15', '2016-09-07 21:26:57'),
  (19, 10, 'translatech_th.png', NULL, 1, 0, 1, '2016-09-07 19:15:51', '2016-09-07 21:26:54'),
  (20, 7, 'e2_activity_form.png', 'Formulář pro úpravu výzkumného projektu v databázi.', 0, 20, 1, '2016-09-07 20:09:37', '2016-09-07 21:29:46'),
  (21, 7, 'e2_event.png', 'Profil konference s možností navázat služební cesty, abstrakty vědeckých přednášek...', 0, 0, 1, '2016-09-07 20:09:37', '2016-09-07 21:26:51'),
  (22, 7, 'e2_cabinet.png', 'Rezervační systém zasedacích místností společnosti s provázáním na jednotlivé zaměstnance.', 0, 0, 1, '2016-09-07 20:09:37', '2018-04-11 12:07:31'),
  (23, 7, 'e2_citation.png', 'Nastavitelný generátor citací vědeckých prací zaměstnanců dle formátu ISO.', 0, 0, 1,
   '2016-09-07 20:09:37', '2016-09-07 21:26:52'),
  (24, 7, 'e2_diredoc.png', 'Evevidence řídící dokumentace společnosti a její přečtení zaměstnanci společnosti.', 0, 0,
   1, '2016-09-07 20:09:37', '2018-04-11 12:07:05'),
  (26, 7, 'e2_index.png', 'Domovská stránka systému E2 s rozcestníkem a důležitými údaji.', 0, 100, 1,
   '2016-09-07 20:09:37', '2016-09-07 21:29:43'),
  (27, 7, 'e2_timesheet2.png', 'Timesheet zaměstnance, který je provázaný s jeho úvazky v projektech.', 0, 0, 1,
   '2016-09-07 20:09:37', '2016-09-07 21:26:53'),
  (28, 7, 'e2_user.png', 'Profil zaměstnance se všemi informacemi, které se k němu vážou.', 0, 0, 1,
   '2016-09-07 20:09:37', '2016-09-07 21:26:54'),
  (29, 7, 'e2_industry.png', 'Profil průmyslového partnera pro napojení na projekty a publikace.', 0, 0, 1,
   '2016-09-07 20:09:37', '2016-09-07 21:26:54'),
  (30, 7, 'e2_risk.png', 'Řízení projektových, procesních i bezpečnostních rizik s evidencí opatření.', 0, 0, 1,
   '2016-09-07 20:09:37', '2016-09-07 21:26:54'),
  (31, 21, 'niklourkova_th.png', NULL, 1, 0, 1, '2018-04-11 12:24:10', '2018-04-11 12:24:10');
/*!40000 ALTER TABLE `image`
  ENABLE KEYS */;

-- Dumping structure for table rychecky.portfolio
DROP TABLE IF EXISTS `portfolio`;
CREATE TABLE IF NOT EXISTS `portfolio` (
  `row_id`       int(11)                          NOT NULL                   AUTO_INCREMENT
  COMMENT 'ID záznamu',
  `portfolio_id` int(11)                                                     DEFAULT NULL
  COMMENT 'ID portfolia',
  `type`         varchar(255) COLLATE utf8_czech_ci                          DEFAULT NULL
  COMMENT 'Typ (kategorie) portfolia',
  `name`         varchar(255) COLLATE utf8_czech_ci                          DEFAULT NULL
  COMMENT 'Název dovednosti',
  `name_short`   varchar(255) COLLATE utf8_czech_ci                          DEFAULT NULL
  COMMENT 'Hodnota (míra) dovednosti',
  `detail`       mediumtext COLLATE utf8_czech_ci COMMENT 'Textový popis',
  `detail_short` mediumtext COLLATE utf8_czech_ci COMMENT 'Zkrácený textový popis',
  `company`      varchar(255) COLLATE utf8_czech_ci                          DEFAULT NULL,
  `url`          varchar(255) COLLATE utf8_czech_ci                          DEFAULT NULL,
  `date_start`   date                                                        DEFAULT NULL,
  `date_end`     date                                                        DEFAULT NULL,
  `size`         int(11)                                                     DEFAULT NULL,
  `github`       varchar(255) COLLATE utf8_czech_ci                          DEFAULT NULL,
  `interesting`  tinyint(4)                                                  DEFAULT '0'
  COMMENT 'Zajímavé?',
  `locale`       varchar(2) COLLATE utf8_czech_ci NOT NULL                   DEFAULT 'cs',
  `visible`      tinyint(4)                                                  DEFAULT '1'
  COMMENT 'Viditelný?',
  `added`        timestamp                        NULL                       DEFAULT CURRENT_TIMESTAMP
  COMMENT 'Přidáno',
  `timestamp`    timestamp                        NULL                       DEFAULT CURRENT_TIMESTAMP
  ON UPDATE CURRENT_TIMESTAMP
  COMMENT 'Změněno',
  PRIMARY KEY (`row_id`),
  KEY `portfolio_id_visible` (`portfolio_id`, `visible`)
)
  ENGINE = InnoDB
  AUTO_INCREMENT = 62
  DEFAULT CHARSET = utf8
  COLLATE = utf8_czech_ci
  ROW_FORMAT = COMPRESSED
  COMMENT ='Seznam dovedností/znalostí';

-- Dumping data for table rychecky.portfolio: ~42 rows (approximately)
/*!40000 ALTER TABLE `portfolio`
  DISABLE KEYS */;
INSERT INTO `portfolio` (`row_id`, `portfolio_id`, `type`, `name`, `name_short`, `detail`, `detail_short`, `company`, `url`, `date_start`, `date_end`, `size`, `github`, `interesting`, `locale`, `visible`, `added`, `timestamp`)
VALUES
  (1, 1, 'Profesionální', 'Centrum výzkumu Řež s.r.o.', 'CVŘ',
      'Dvojjazyčný robustní web prezentující společnost Centrum výzkumu Řež s.r.o., jenž se specializuje na jadernou energetiku. Stránky využívají nejmodernější technologie včetně mikroformátů a verze pro mobilní telefony. Je naplněn velkým množstvím informací o infrastruktuře společnosti a prováděném výzkumu zejména na poli jaderné energetiky. Bylo dbáno zejména na odbornou správnost. Web je postaven na systému Wordpress.',
      'Obsáhlý web společnosti v oblasti jaderného výzkumu.', 'Centrum výzkumu Řež s.r.o.', 'http://cvrez.cz/',
      '2013-09-01', '2017-12-31', 60, NULL, 1, 'cs', 1, '2016-04-14 16:24:00', '2018-04-11 12:26:00'),
  (2, 3, 'Profesionální', 'Enpedie: portál na podporu veřejné informovanosti v oblasti jaderné energetiky', 'Enpedie', 'Projekt společnosti Centrum výzkumu Řež s.r.o., který si klade za cíl pomocí wiki formátu udržovat a rozšiřovat informovanost o jaderné energetice. Hesla jsou vkládána a revidována odborníky na obor, tudíž jejich relevance je vyšší než z nevalidovaných zdrojů. Web je postaven na systému Mediawiki.', 'Wiki hesel s tématikou nejenom jaderné energetiky.', 'Centrum výzkumu Řež s.r.o.', 'http://enpedie.cz/', '2013-11-01', '2017-10-31', 30, NULL, 1, 'cs', 1, '2016-04-14 16:24:00', '2017-10-24 20:31:22'),
  (22, 4, 'Profesionální', 'Fukušima', 'Fukušima: otázky', 'Projekt Státního úřadu pro jadernou bezpečnost (SÚJB) společně s Centrem výzkumu Řež s.r.o. Web vznikl na jaře 2011 jako bezprostřední reakce na havárii jaderné elektrárny Fukušima v Japonsku. Dotazy uživatelů kladené elektronicky zodpovídali uznávaní jaderní odborníci z celé republiky, včetně paní Drábové. Web je postaven na systému Drupal.', 'Dotazy a odpovědi k havárii Fukušimy v&nbsp;Japonsku.', 'Centrum výzkumu Řež s.r.o.', 'http://otazky-fukusima.cvrez.cz/', '2013-06-01', '2013-06-01', 30, NULL, 0, 'cs', 1, '2016-04-14 16:24:00', '2016-04-17 15:52:57'),
  (23, 5, 'Osobní', 'Native Warez Forum', 'NWF', 'Projekt s téměř 45 tisíci návštěvami měsíčně (Google Analytics) a 80 tisíci registrovanými uživateli. Forum slouží pro sdílení souborů mezi uživateli. Systém SMF je silně modifikován vlastními unikátními doplňky. Velká komunita může NWF podporovat i na jeho stránkách na Facebooku a dalších sociálních sítích. Web je postaven na systému Simple Machines Forum (SMF).', 'Fórum pro sdílení souborů s 80&nbsp;tisíci uživateli.', NULL, 'http://nwf.cz/', '2010-11-01', NULL, 70, NULL, 1, 'cs', 1, '2016-04-14 16:24:00', '2017-11-03 09:05:48'),
  (24, 6, 'Profesionální', 'ELEXTERN: Electricity Externalities for Better Planning', 'ELEXTERN', 'Webový nástroj pro výpočet nákladů jednotlivých zdrojů energií elektrické energie. Systém započítává ceny externalit jako jsou náklady na léčbu rakoviny způsobené ozářením nebo cena půdy zabrané solárními elekrárnami. Vytvořeno ve spolupráci s výzkumníky. Stránky využívají AJAX a Google Chart API.', 'Kalkulátor nákladů jednotlivých zdrojů elektřiny. Interaktivní znázornění v grafech.', NULL, 'http://elextern.eu/', '2015-01-01', NULL, 50, 'https://github.com/jaCUBE/elextern', 1, 'cs', 1, '2016-04-14 16:24:00', '2017-11-03 09:10:24'),
  (25, 7, 'Profesionální', 'E2', 'CVŘ E2', '<p>Velký interní systém pro správu ~350 zaměstnanců a stovek projektů ve společnosti zabývající se jaderným výzkumem.</p>\r\n\r\n<p>\r\nVybrané funkce:\r\n<ul>\r\n<li>timesheet a využití vědecké infrastruktury včetně jaderných reaktorů,</li>\r\n<li>správa dovolených,</li>\r\n<li>komplexní management pracovních cest,</li>\r\n<li>databáze vědeckých publikací zaměstnanců,</li>\r\n<li>řízení rizik společnosti,</li>\r\n<li>management projektů včetně finančního řízení,</li>\r\n<li>přidělování a evidence úkolů...</li>\r\n</ul>\r\n</p>\r\n\r\n<p>V současnosti jde přibližně o 70 takovýchto <em>modulů</em>.</p>\r\n\r\n<hr />\r\n<div class="text-muted">Například: zaměstnanec se přihlásí do svého účtu, po přihlášení najde interní novinky o společnosti, změny jeho úvazků v projektech, jídelníček a další důležité informace. Jakožto vedoucí pracovník vytvoří nábor na žádanou pozici, který se automaticky rozešle ke schválení ředitelům. <em>Zajde si na oběd.</em> Po návratu zjistí, že k riziku jeho projektu někdo vyplnil komentář. Před odchodem domů ještě stihne vyplnit svůj osobní timesheet, který na jednom místě sbírá informace „kdo kdy kde na čem pracoval“.</div>\r\n<hr />\r\n\r\n<p>Systém využívá zejména PHP, LESS, PDO, Bootstrap a další moderní technologie. Přes 1024 commitů v git obsahuje stovky tříd a tisíce metod v bezmála 100 000 řádcích kódu.</p>\r\n\r\n<p>Databáze s pěti milióny záznamů v 300 tabulkách a views pak obsluhuje v průměru třicet dotazů za sekundu.</p>', 'Robustní integrovaný systém pro personální, projektové a finanční řízení vědecké organizace.', 'Centrum výzkumu Řež s.r.o.', 'http://e2.cvrez.cz/', '2015-01-01', NULL, 100, NULL, 1, 'cs', 1, '2016-04-14 16:24:00', '2018-04-11 12:18:14'),
  (26, 8, 'Profesionální', 'Portál společnosti CVŘ', 'Interní portál CVŘ', NULL, 'Správa interního portálu na systému LifeRay.', 'Centrum výzkumu Řež s.r.o.', NULL, '2015-01-01', '2015-01-01', 30, NULL, 0, 'cs', 1, '2016-04-14 16:24:00', '2017-11-03 09:11:10'),
  (27, 9, 'Profesionální', 'Web hotelu Na Plovárně v Humpolci', 'Hotel Na Plovárně', NULL, 'Prezentace hotelu a restaurantu.', NULL, 'http://hotel-humpolec.cz/', '2014-10-01', '2014-10-01', 30, NULL, 0, 'cs', 1, '2016-04-14 16:24:00', '2017-11-03 07:58:45'),
  (28, 10, 'Profesionální', 'Web překladatele Translatech', 'Translatech', NULL, 'Web odborného překladatele.', NULL, 'http://translatech.cz/', '2014-06-01', '2014-06-01', 30, NULL, 0, 'cs', 1, '2016-04-14 16:24:00', '2017-11-03 07:58:44'),
  (29, 11, 'Osobní', 'ČSFD Extended Userscript', 'ČSFD Extended', NULL, 'Javascript do prohlížeče, který rozšiřuje funkce filmového serveru ČSFD.', NULL, 'https://greasyfork.org/cs/scripts/15784-%C4%8Csfd-extended', '2015-12-31', NULL, 20, 'https://github.com/jaCUBE/CSFD-Extended', 1, 'cs', 1, '2016-04-14 16:24:00', '2016-04-17 15:33:05'),
  (30, 12, 'Osobní', 'Excel2SQL', 'Excel2SQL', NULL, 'Nástroj pro převod dat z tabulky Excel do&nbsp;SQL dotazu.', NULL, 'http://excel2sql.rychecky.cz/', '2015-10-10', '2017-01-10', 30, 'https://github.com/jaCUBE/excel2sql', 1, 'cs', 1, '2016-04-14 16:24:00', '2017-11-03 08:00:36'),
  (31, 13, 'Osobní', 'SRT Tool', 'SRT Tool', NULL, 'Utilita kontrolující typografii českých filmových titulků.', NULL, 'http://srt.rychecky.cz/', '2016-04-14', '2016-04-14', 20, NULL, 0, 'cs', 1, '2016-04-14 16:24:01', '2017-10-24 20:31:03'),
  (32, 14, 'Profesionální', 'NUSIM', 'NUSIM', NULL, 'Web a registrační systém jaderné konference.', NULL, 'http://nusim.cz/', '2014-10-06', '2014-10-06', 30, NULL, 0, 'cs', 1, '2016-04-14 16:24:01', '2017-10-24 20:33:05'),
  (33, 15, 'Profesionální', 'Pátý blok Dukovany', 'Pátý blok Dukovany', NULL, 'Web a registrační systém konference o jaderné elektrárně Dukovany.', 'EventEra', 'http://patyblokdukovany.cz/', '2015-01-09', '2015-01-09', 30, NULL, 0, 'cs', 1, '2016-04-14 16:24:01', '2016-04-17 15:42:57'),
  (34, 16, 'Profesionální', 'Malé reaktory', 'Malé reaktory', NULL, 'Web a registrační systém konference Malé modulární reaktory.', 'EventEra', 'http://malereaktory.cz/', '2016-01-12', '2016-01-12', 30, NULL, 0, 'cs', 1, '2016-04-14 16:24:01', '2017-10-24 20:34:03'),
  (35, 17, 'Profesionální', 'Energochemie', 'Energochemie', NULL, 'Web a registrační systém semináře Energochemie.', 'EventEra', 'http://energochemie.cz/', '2016-04-17', '2016-04-17', 30, NULL, 0, 'cs', 1, '2016-04-14 16:24:01', '2017-11-03 08:04:29'),
  (36, 18, 'Profesionální', 'Horizon 2020 CORONA II', 'CORONA II', NULL, 'Web evropského projektu pro výuku jaderných reaktorů.', 'Centrum výzkumu Řež s.r.o.', 'http://corona2.eu/', '2015-11-17', '2017-10-31', 30, NULL, 0, 'cs', 1, '2016-04-14 16:24:01', '2017-10-24 20:30:40'),
  (37, 19, 'Profesionální', 'Efektivní přenos poznatků v energetice', 'EPP Projekt', NULL, 'Stránky evropského projektu pro přenos poznatků.', 'Centrum výzkumu Řež s.r.o.', 'http://epp-projekt.cz/', '2013-11-17', '2013-11-17', 30, NULL, 0, 'cs', 1, '2016-04-14 16:24:01', '2016-09-07 19:17:04'),
  (38, 20, 'Profesionální', 'Horizon 2020 VINCO', 'VINCO', NULL, 'Stránky projektu pro plynem chlazené reaktory.', 'Centrum výzkumu Řež s.r.o.', 'http://project-vinco.eu/', '2016-02-17', '2017-10-31', 30, NULL, 0, 'cs', 1, '2016-04-14 16:24:01', '2017-11-03 08:03:00'),
  (39, 2, 'Profesionální', 'SUStainable ENergy (SUSEN)', 'SUSEN', 'Web velkého výzkumného projektu ve dvou jazycích. Projekt SUSEN představuje dotaci přes dvě miliardy korun, které posílí výzkumnou infrastrukturu v energetice České republiky a budou významným impulsem k rozvoji týmů, znalostí a technologií. Web obsahuje informace o programech a automatické zobrazování aktuálních výběrových řízení díky RSS kanálu.\nVzhledem připomíná mateřský web společnosti CVŘ, v jejíž režii se projekt SUSEN odehrává. Web je postaven na systému Wordpress.', 'Webová prezentace velkého výzkumného projektu Udržitelná energetika.', 'Centrum výzkumu Řež s.r.o.', 'http://susen2020.cz/', '2014-04-17', '2017-10-31', 40, NULL, 0, 'en', 1, '2016-04-14 16:24:45', '2017-11-03 05:09:51'),
  (40, 1, 'Profesionální', 'Research Cenre Rez', 'RCR', 'Web presentation for Research Centre Rez, nuclear energy research company. Rich multilingual content about research infrastructure, technical was crucial. Based on Wordpress.', 'Rich public website for nuclear research company.', 'Research Centre Rez', 'http://cvrez.cz/', '2013-09-01', NULL, 60, NULL, 1, 'en', 1, '2016-04-14 16:24:00', '2017-11-03 07:56:57'),
  (41, 2, 'Profesionální', 'SUStainable ENergy (SUSEN)', 'SUSEN', 'Web velkého výzkumného projektu ve dvou jazycích. Projekt SUSEN představuje dotaci přes dvě miliardy korun, které posílí výzkumnou infrastrukturu v energetice České republiky a budou významným impulsem k rozvoji týmů, znalostí a technologií. Web obsahuje informace o programech a automatické zobrazování aktuálních výběrových řízení díky RSS kanálu.\nVzhledem připomíná mateřský web společnosti CVŘ, v jejíž režii se projekt SUSEN odehrává. Web je postaven na systému Wordpress.', 'Webová prezentace velkého výzkumného projektu Udržitelná energetika.', 'Centrum výzkumu Řež s.r.o.', 'http://susen2020.cz/', '2014-04-17', '2017-10-31', 40, NULL, 0, 'en', 1, '2016-04-14 16:24:45', '2017-11-03 05:09:54'),
  (42, 3, 'Profesionální', 'Enpedie: portál na podporu veřejné informovanosti v oblasti jaderné energetiky', 'Enpedie', 'Projekt společnosti Centrum výzkumu Řež s.r.o., který si klade za cíl pomocí wiki formátu udržovat a rozšiřovat informovanost o jaderné energetice. Hesla jsou vkládána a revidována odborníky na obor, tudíž jejich relevance je vyšší než z nevalidovaných zdrojů. Web je postaven na systému Mediawiki.', 'Wiki hesel s tématikou nejenom jaderné energetiky.', 'Centrum výzkumu Řež s.r.o.', 'http://enpedie.cz/', '2013-11-01', '2017-10-31', 30, NULL, 1, 'en', 1, '2016-04-14 16:24:00', '2017-11-03 05:09:53'),
  (43, 4, 'Profesionální', 'Fukušima', 'Fukušima: otázky', 'Projekt Státního úřadu pro jadernou bezpečnost (SÚJB) společně s Centrem výzkumu Řež s.r.o. Web vznikl na jaře 2011 jako bezprostřední reakce na havárii jaderné elektrárny Fukušima v Japonsku. Dotazy uživatelů kladené elektronicky zodpovídali uznávaní jaderní odborníci z celé republiky, včetně paní Drábové. Web je postaven na systému Drupal.', 'Dotazy a odpovědi k havárii Fukušimy v&nbsp;Japonsku.', 'Centrum výzkumu Řež s.r.o.', 'http://otazky-fukusima.cvrez.cz/', '2013-06-01', '2013-06-01', 30, NULL, 0, 'en', 1, '2016-04-14 16:24:00', '2017-11-03 05:09:54'),
  (44, 5, 'Osobní', 'Native Warez Forum', 'NWF', 'The project of 80,000 registered accounts and 45,000 monthly website visits. Forum for sharing files among its users. The source code is heavily modified by our unique features and extensions. Huge community supports NWF on Facebook. NWF is builded up upon Simple Machines Forum (SMF).', 'Community sharing forum, home of 80,000 users.', NULL, 'http://nwf.cz/', '2010-11-01', NULL, 70, NULL, 1, 'en', 1, '2016-04-14 16:24:00', '2017-11-03 09:05:43'),
  (45, 6, 'Profesionální', 'ELEXTERN: Electricity Externalities for Better Planning', 'ELEXTERN', 'Web tool for energy costs calculation for all spectrum of energy sources. The system calculates land price for photovoltaic, irradiation cancer treatment... ELEXTERN has been done in cooperation with researchers. Calculator uses AJAX and Google Chart API.', 'Calculator of energy generation externality costs. Interactive tool with charts.', NULL, 'http://elextern.eu/', '2015-01-01', NULL, 50, 'https://github.com/jaCUBE/elextern', 1, 'en', 1, '2016-04-14 16:24:00', '2017-11-03 09:10:11'),
  (46, 7, 'Profesionální', 'E2', 'CVŘ E2', '<p>Velký interní systém pro správu ~350 zaměstnanců a stovek projektů ve společnosti zabývající se jaderným výzkumem.</p>\r\n\r\n<p>\r\nVybrané funkce:\r\n<ul>\r\n<li>timesheet a využití vědecké infrastruktury včetně jaderných reaktorů,</li>\r\n<li>správa dovolených,</li>\r\n<li>komplexní management pracovních cest,</li>\r\n<li>databáze vědeckých publikací zaměstnanců,</li>\r\n<li>řízení rizik společnosti,</li>\r\n<li>management projektů včetně finančního řízení,</li>\r\n<li>přidělování a evidence úkolů...</li>\r\n</ul>\r\n</p>\r\n\r\n<p>V současnosti jde přibližně o 70 takovýchto <em>modulů</em>.</p>\r\n\r\n<hr />\r\n<div class="text-muted">Například: zaměstnanec se přihlásí do svého účtu, po přihlášení najde interní novinky o společnosti, změny jeho úvazků v projektech, jídelníček a další důležité informace. Jakožto vedoucí pracovník vytvoří nábor na žádanou pozici, který se automaticky rozešle ke schválení ředitelům. <em>Zajde si na oběd.</em> Po návratu zjistí, že k riziku jeho projektu někdo vyplnil komentář. Před odchodem domů ještě stihne vyplnit svůj osobní timesheet, který na jednom místě sbírá informace „kdo kdy kde na čem pracoval“.</div>\r\n<hr />\r\n\r\n<p>Systém využívá zejména PHP, LESS, PDO, Bootstrap a další moderní technologie. Přes 1024 commitů v git obsahuje stovky tříd a tisíce metod v bezmála 100 000 řádcích kódu.</p>\r\n\r\n<p>Databáze s pěti milióny záznamů v 300 tabulkách a views pak obsluhuje v průměru třicet dotazů za sekundu.</p>', 'Robustní integrovaný systém pro personální, projektové a finanční řízení vědecké organizace.', 'Centrum výzkumu Řež s.r.o.', 'http://e2.cvrez.cz/', '2015-01-01', NULL, 100, NULL, 1, 'en', 1, '2016-04-14 16:24:00', '2018-04-13 09:24:16'),
  (47, 8, 'Profesionální', 'Portál společnosti CVŘ', 'Internal RCR Portal', NULL, 'Administration of research company internel LifeRay portal.', 'Centrum výzkumu Řež s.r.o.', NULL, '2015-01-01', '2015-01-01', 30, NULL, 0, 'en', 1, '2016-04-14 16:24:00', '2017-11-03 09:11:12'),
  (48, 9, 'Profesionální', 'Website of Na Plovárne Hotel', 'Na Plovárne Hotel', NULL, 'Hotel and restaurant public website.', NULL, 'http://hotel-humpolec.cz/', '2014-10-01', '2014-10-01', 30, NULL, 0, 'en', 1, '2016-04-14 16:24:00', '2017-11-03 09:00:26'),
  (49, 10, 'Profesionální', 'Web překladatele Translatech', 'Translatech', NULL, 'Scientific translator business website.', NULL, 'http://translatech.cz/', '2014-06-01', '2014-06-01', 30, NULL, 0, 'en', 1, '2016-04-14 16:24:00', '2017-11-03 07:59:03'),
  (50, 11, 'Osobní', 'ČSFD Extended Userscript', 'CSFD Extended', NULL, 'Client-side Javascript for browser. It provides more features for popular czech movie databse CSFD.', NULL, 'https://greasyfork.org/cs/scripts/15784-%C4%8Csfd-extended', '2015-12-31', NULL, 20, 'https://github.com/jaCUBE/CSFD-Extended', 1, 'en', 1, '2016-04-14 16:24:00', '2017-11-03 07:59:59'),
  (51, 12, 'Osobní', 'Excel2SQL', 'Excel2SQL', NULL, 'A tool for easy convert data from Excel table into SQL query.', NULL, 'http://excel2sql.rychecky.cz/', '2015-10-10', '2017-01-10', 30, 'https://github.com/jaCUBE/excel2sql', 1, 'en', 1, '2016-04-14 16:24:00', '2017-11-03 08:00:25'),
  (52, 13, 'Osobní', 'SRT Tool', 'SRT Tool', NULL, 'Utility for typography check for Czech movie subtitles.', NULL, 'http://srt.rychecky.cz/', '2016-04-14', '2016-04-14', 20, NULL, 0, 'en', 1, '2016-04-14 16:24:01', '2017-11-03 08:01:09'),
  (53, 14, 'Profesionální', 'NUSIM', 'NUSIM', NULL, 'Web and registration of nuclear conference.', NULL, 'http://nusim.cz/', '2014-10-06', '2014-10-06', 30, NULL, 0, 'en', 1, '2016-04-14 16:24:01', '2017-11-03 08:01:24'),
  (54, 15, 'Profesionální', 'Pátý blok Dukovany', 'Pátý blok Dukovany', NULL, 'Web a registrační systém konference o jaderné elektrárně Dukovany.', 'EventEra', 'http://patyblokdukovany.cz/', '2015-01-09', '2015-01-09', 30, NULL, 0, 'en', 1, '2016-04-14 16:24:01', '2017-11-03 05:10:00'),
  (55, 16, 'Profesionální', 'Small Modular Reactors', 'SMR', NULL, 'Web and registration system for Small Modular Reactors events.', 'EventEra', 'http://malereaktory.cz/', '2016-01-12', '2016-01-12', 30, NULL, 0, 'en', 1, '2016-04-14 16:24:01', '2017-11-03 08:05:26'),
  (56, 17, 'Profesionální', 'Energochemie', 'Energochemie', NULL, 'Web and registration system for Energochemie seminar.', 'EventEra', 'http://energochemie.cz/', '2016-04-17', '2016-04-17', 30, NULL, 0, 'en', 1, '2016-04-14 16:24:01', '2017-11-03 08:04:50'),
  (57, 18, 'Profesionální', 'Horizon 2020 CORONA II', 'CORONA II', NULL, 'Nuclear reactor educational project website.', 'Centrum výzkumu Řež s.r.o.', 'http://corona2.eu/', '2015-11-17', '2017-10-31', 30, NULL, 0, 'en', 1, '2016-04-14 16:24:01', '2017-11-03 08:04:09'),
  (58, 19, 'Profesionální', 'Efektivní přenos poznatků v energetice', 'EPP Projekt', NULL, 'European knowledge transfer project website.', 'Centrum výzkumu Řež s.r.o.', 'http://epp-projekt.cz/', '2013-11-17', '2013-11-17', 30, NULL, 0, 'en', 1, '2016-04-14 16:24:01', '2017-11-03 08:03:49'),
  (59, 20, 'Profesionální', 'Horizon 2020 VINCO', 'VINCO', NULL, 'Gas cooling reactors project website.', 'Centrum výzkumu Řež s.r.o.', 'http://project-vinco.eu/', '2016-02-17', '2017-10-31', 30, NULL, 0, 'en', 1, '2016-04-14 16:24:01', '2017-11-03 08:03:26'),
  (60, 21, 'Profesionální', 'Nikola Lourková: webové portfolium umělce', 'niklourkova.cz', 'Jednoduché webové portfolium studenta múzických umění. Umožňuje filtrování a vyhledávání v dílech, sloužilo jako osahání si Bootstrap 4 těsně po jeho vydání.', 'Webové portfolium začínajícího umělce.', NULL, 'http://niklourkova.cz/', '2018-01-13', '2018-01-13', 30, NULL, 0, 'cs', 1, '2018-04-11 12:20:23', '2018-04-11 12:22:13'),
  (61, 21, 'Profesionální', 'Nikola Lourková: webové portfolium umělce', 'niklourkova.cz',
       'Jednoduché webové portfolium studenta múzických umění. Umožňuje filtrování a vyhledávání v dílech, sloužilo jako osahání si Bootstrap 4 těsně po jeho vydání.',
       'Webové portfolium začínajícího umělce.', NULL, 'http://niklourkova.cz/', '2018-01-13', '2018-01-13', 30, NULL,
   0, 'en', 1, '2018-04-11 12:20:23', '2018-04-11 12:22:14');
/*!40000 ALTER TABLE `portfolio`
  ENABLE KEYS */;

-- Dumping structure for table rychecky.skill
DROP TABLE IF EXISTS `skill`;
CREATE TABLE IF NOT EXISTS `skill` (
  `row_id`    int(11)                          NOT NULL                   AUTO_INCREMENT
  COMMENT 'ID záznamu',
  `skill_id`  int(11)                                                     DEFAULT NULL
  COMMENT 'ID dovednosti',
  `type`      varchar(255) COLLATE utf8_czech_ci                          DEFAULT NULL
  COMMENT 'Typ (kategorie) dovednosti',
  `name`      varchar(255) COLLATE utf8_czech_ci                          DEFAULT NULL
  COMMENT 'Název dovednosti',
  `value`     int(11)                                                     DEFAULT NULL
  COMMENT 'Hodnota (míra) dovednosti',
  `detail`    mediumtext COLLATE utf8_czech_ci COMMENT 'Textový popis',
  `locale`    varchar(2) COLLATE utf8_czech_ci NOT NULL                   DEFAULT 'cs',
  `visible`   tinyint(4)                                                  DEFAULT '1'
  COMMENT 'Viditelný?',
  `added`     timestamp                        NULL                       DEFAULT CURRENT_TIMESTAMP
  COMMENT 'Přidáno',
  `timestamp` timestamp                        NULL                       DEFAULT CURRENT_TIMESTAMP
  ON UPDATE CURRENT_TIMESTAMP
  COMMENT 'Změněno',
  PRIMARY KEY (`row_id`),
  KEY `skill_id_visible` (`skill_id`, `visible`),
  KEY `skill_value` (`value`)
)
  ENGINE = InnoDB
  AUTO_INCREMENT = 77
  DEFAULT CHARSET = utf8
  COLLATE = utf8_czech_ci
  ROW_FORMAT = COMPRESSED
  COMMENT ='Seznam dovedností/znalostí';

-- Dumping data for table rychecky.skill: ~76 rows (approximately)
/*!40000 ALTER TABLE `skill`
  DISABLE KEYS */;
INSERT INTO `skill` (`row_id`, `skill_id`, `type`, `name`, `value`, `detail`, `locale`, `visible`, `added`, `timestamp`)
VALUES
  (1, 1, 'Webdev', 'HTML', 80,
   'Syntaxe jazyku HTML a XHTML. Znalost HTML5 a zkušenosti s tvorbou sémantického webu (mikroformáty).', 'cs', 1,
   '2016-04-14 16:14:51', '2017-11-03 04:37:25'),
  (2, 2, 'Webdev', 'CSS + LESS', 80, 'Kaskádové styly a design webových stránek včetně moderního CSS3. Zkušenosti s využitím LESS preprocesoru.', 'cs', 1, '2016-04-14 16:14:52', '2017-11-03 04:39:07'),
  (3, 3, 'Webdev', 'PHP', 70, 'Ovládání skriptovacího jazyka PHP včetně objektově orientovaného programování (OOP).', 'cs', 1, '2016-04-14 16:14:52', '2017-10-24 14:09:04'),
  (4, 4, 'Webdev', 'SQL + MySQL', 60, 'Používání dotazovacího jazyka SQL. Návrh, správa a optimalizace open source databáze MySQL.', 'cs', 1, '2016-04-14 16:14:52', '2016-05-07 10:57:53'),
  (5, 5, 'Webdev', 'Javascript + jQuery', 60, 'Implementace Javascriptu do webu, zkušenosti s používáním knihovny jQuery na reálných projektech.', 'cs', 1, '2016-04-14 16:14:52', '2017-11-03 04:41:36'),
  (6, 6, 'Webdev', 'SEO', 45, 'Optimalizace pro vyhledávače. Správná syntaxe při psaní kódu, vhodná struktura stránek a metrika návštěvnosti.', 'cs', 1, '2016-04-14 16:14:52', '2016-05-07 10:57:58'),
  (7, 7, 'ICT', 'Sociální sítě', 50, 'Schopnost a zkušenost se správou známých sociálních sítí jako Facebook či YouTube. Základní povědomí o pravidlech a omezení, sledování novinek.', 'cs', 1, '2016-04-14 16:14:52', '2018-04-11 12:30:19'),
  (8, 8, 'Webdev', 'Apache (LAMP)', 20, 'Zkušenosti s konfigurací virtuálního privátního serveru (VPS) včetně instalace PHP, modulů do PHP…', 'cs', 1, '2016-04-14 16:14:52', '2016-05-07 10:58:05'),
  (9, 9, 'Webdev', 'CMS: SMF', 35, 'Bohaté zkušenosti se systémem Simple Machines Forum (SMF) pro internetová fóra. Znalost vnitřních procesů, psaní vlastních unikátních rozšíření…', 'cs', 1, '2016-04-14 16:14:52', '2016-05-07 10:58:06'),
  (10, 10, 'Webdev', 'CMS: Wordpress', 35, 'Dobrá znalost systému Wordpress z uživatelského i administrátorského hlediska.', 'cs', 1, '2016-04-14 16:14:52', '2016-05-07 10:58:08'),
  (11, 11, 'Webdev', 'CMS: MediaWiki', 20, 'Znalosti správy systému na bázi MediaWiki včetně konfigurace.', 'cs', 1, '2016-04-14 16:14:52', '2016-05-07 10:58:12'),
  (12, 12, 'Webdev', 'CMS: Drupal', 10, 'Základy.', 'cs', 1, '2016-04-14 16:14:52', '2017-11-03 08:36:12'),
  (13, 13, 'Webdev', 'CMS: PHPBB', 10, 'Základy.', 'cs', 1, '2016-04-14 16:14:52', '2017-11-03 08:36:14'),
  (14, 14, 'ICT', 'Photoshop', 60, 'Pokročilá znalost grafického programu Adobe Photoshop. Zkušenosti se zpracováním fotografií z formátu RAW.', 'cs', 1, '2016-04-14 16:14:52', '2016-06-08 14:06:31'),
  (15, 15, 'ICT', 'MS Office', 60, 'Dobrá znalost součástí balíku Microsoft Office.', 'cs', 1, '2016-04-14 16:14:52', '2016-04-14 20:40:00'),
  (16, 16, 'ICT', 'Sony Vegas', 20, 'Základní znalost střihu videa.', 'cs', 1, '2016-04-14 16:14:52', '2016-04-14 20:40:03'),
  (17, 17, 'ICT', 'Autocad + Inventor', 25, 'Základní znalost programu Autodesk AutoCAD a Autodesk Inventor.', 'cs', 1, '2016-04-14 16:14:52', '2016-04-14 20:40:03'),
  (18, 18, 'ICT', 'Bezpečnost', 45, 'Zabezpečení počítačů, sítí, webových stránek, kryptografie, ochrana dat…\r\n', 'cs', 1, '2016-04-14 16:14:52', '2017-11-03 08:35:39'),
  (19, 19, 'ICT', 'Google', 60, 'Google API, Google Analytics, Google Drive...', 'cs', 1, '2016-04-14 16:14:52', '2017-11-03 08:33:33'),
  (20, 20, 'ICT', 'C# + .NET', 25, 'Základy objektového programování desktopových aplikací v C# za využití grafického rozhraní Windows a frameworku .NET.', 'cs', 1, '2016-04-14 16:14:52', '2016-04-14 20:40:03'),
  (21, 21, 'ICT', 'Matlab', 20, 'Základní znalost programovacího jazyka na bázi FORTRAN.', 'cs', 1, '2016-04-14 16:14:53', '2016-04-14 20:40:03'),
  (22, 22, 'ICT', 'Cinema 4D', 20, 'Základní znalost 3D modelovacího software.', 'cs', 1, '2016-04-14 16:14:53', '2017-11-03 08:31:49'),
  (23, 23, 'ICT', 'Java', 15, 'Základní znalost.', 'cs', 1, '2016-04-14 16:14:53', '2016-04-14 20:40:04'),
  (24, 24, 'ICT', 'Hardware', 45, 'Znalost počítačových komponent a periferií.', 'cs', 1, '2016-04-14 16:14:53', '2016-04-14 20:40:01'),
  (25, 25, 'ICT', 'InDesign', 30, 'Lepší znalost programu pro sázení a typografickou úpravu, Adobe InDesign.', 'cs', 1, '2016-04-14 16:14:53', '2016-04-14 20:40:01'),
  (26, 26, 'ICT', 'Illustrator', 20, 'Základní znalost programu pro tvorbu vektorové grafiky, Adobe Illustrator.', 'cs', 1, '2016-04-14 16:14:53', '2016-04-14 20:40:04'),
  (27, 27, 'Jazyky', 'Čeština', 100, 'Rodilý mluvčí. Znalost češtiny na pokročilé úrovni z hlediska gramatiky a stylistiky. Zkušenosti s proofreadingem a korekturou vědeckých textů.', 'cs', 1, '2016-04-14 16:14:53', '2017-11-03 08:23:11'),
  (28, 28, 'Jazyky', 'Angličtina', 60, 'Znalost angličtiny na úrovni upper-intermediate. Bezproblémová schopnost komunikovat i číst technickou dokumentaci.', 'cs', 1, '2016-04-14 16:14:53', '2017-11-03 08:23:22'),
  (29, 29, 'Ostatní', 'Marketing & PR', 30, 'Základní znalost firemní komunikace, zkušenosti s prací na oddělení komunikace vědecké společnosti.', 'cs', 1, '2016-04-14 16:14:53', '2016-04-14 20:39:39'),
  (30, 30, 'Ostatní', 'Jaderná energetika', 20, 'Základní fungování jaderného reaktoru. Zkušenost s prací se zdroji ionizujícího záření (pracovník kategorie A).', 'cs', 1, '2016-04-14 16:14:53', '2016-04-14 20:39:39'),
  (31, 31, 'Ostatní', 'Strojírenství', 15, 'Elementární znalost norem či konstrukce.', 'cs', 1, '2016-04-14 16:14:53', '2016-04-14 20:39:39'),
  (32, 32, 'Webdev', 'Git + GitHub', 25, 'Základní práce s verzovacím systémem Git a repozitáři na GitHubu.', 'cs', 1, '2016-04-14 16:14:53', '2016-05-07 10:57:41'),
  (33, 33, 'Webdev', 'Python', 10, 'Základní znalost programovacího jazyka Python.', 'cs', 1, '2016-04-14 16:14:53', '2016-05-07 10:57:38'),
  (34, 34, 'Ostatní', 'Fotografování', 40, 'Znalost práce s DSLR (zrcadlovka), principů a praxi fotografie včetně digitálních úprav.', 'cs', 1, '2016-04-14 16:14:53', '2016-04-14 20:39:37'),
  (35, 35, 'Webdev', 'AngularJS', 10, 'Základní znalost práce s Javascriptovým front-end frameworkem AngularJS.', 'cs', 1, '2016-06-08 07:38:09', '2016-06-08 07:39:31'),
  (36, 36, 'Webdev', 'Bootstrap', 50, 'Zkušenosti s frameworkem Bootstrap a tvorbou rezponzivních webových aplikací.', 'cs', 1, '2016-06-08 07:39:13', '2017-11-03 09:34:46'),
  (37, 37, 'Webdev', 'Grunt', 10, 'Základní znalost task runneru Grunt.', 'cs', 1, '2016-06-08 14:05:50', '2016-06-08 14:05:50'),
  (38, 1, 'Webdev', 'HTML', 80, 'HTML and XHTML syntax. Knowledge of HTML5 and experiences with semantics website.', 'en', 1, '2016-04-14 16:14:51', '2017-11-03 04:38:06'),
  (39, 2, 'Webdev', 'CSS + LESS', 80, 'Cascade styles and website design, CSS3 included. Experiences with LESS preprocessor.', 'en', 1, '2016-04-14 16:14:52', '2017-11-03 04:39:31'),
  (40, 3, 'Webdev', 'PHP', 70, 'PHP script language acquaintance, object-oriented programming included.', 'en', 1, '2016-04-14 16:14:52', '2017-11-03 04:40:20'),
  (41, 4, 'Webdev', 'SQL + MySQL', 60, 'Usage of SQL query language. Design and administration MySQL based open source databases.\r\n', 'en', 1, '2016-04-14 16:14:52', '2017-11-03 04:41:13'),
  (42, 5, 'Webdev', 'Javascript + jQuery', 60, 'Javascript website programming, rich real project experiences with jQuery library.', 'en', 1, '2016-04-14 16:14:52', '2017-11-03 04:42:34'),
  (43, 6, 'Webdev', 'SEO', 45, 'Search engine optimization. Following code guidelines and standards, proper structure of pages, website traffic tracking and reporting.', 'en', 1, '2016-04-14 16:14:52', '2017-11-03 09:31:35'),
  (44, 7, 'ICT', 'Social Networks', 50, 'Abilitiy and experiences of administration popular social network pages like Faceook and YouTube. Knowledge of social network rules, communication, limitations...', 'en', 1, '2016-04-14 16:14:52', '2018-04-11 12:30:32'),
  (45, 8, 'Webdev', 'Apache (LAMP)', 20, 'Experience with configuration of VPS (Virtual Private Server) including installation of PHP and modules to PHP.', 'en', 1, '2016-04-14 16:14:52', '2018-04-12 21:45:14'),
  (46, 9, 'Webdev', 'CMS: SMF', 35, 'Big experience with Simple Machines Forum system. Knowledge of internal processes, creation of my own, unique expansions.', 'en', 1, '2016-04-14 16:14:52', '2018-04-12 21:43:59'),
  (47, 10, 'Webdev', 'CMS: Wordpress', 35, 'Good knowledge of Wordpress system, both as administrator and user.', 'en', 1, '2016-04-14 16:14:52', '2018-04-12 21:44:09'),
  (48, 11, 'Webdev', 'CMS: MediaWiki', 20, 'Knowledge of Media Wiki system administration including configuration.', 'en', 1, '2016-04-14 16:14:52', '2018-04-12 21:50:18'),
  (49, 12, 'Webdev', 'CMS: Drupal', 10, 'Basics.', 'en', 1, '2016-04-14 16:14:52', '2017-11-03 08:36:10'),
  (50, 13, 'Webdev', 'CMS: PHPBB', 10, 'Basic knowledge.', 'en', 1, '2016-04-14 16:14:52', '2018-04-12 21:45:26'),
  (51, 14, 'ICT', 'Photoshop', 60, 'Good knowledge of Adobe Photoshop graphics editor. I have an experience with editing photos in RAW format.', 'en', 1, '2016-04-14 16:14:52', '2018-04-12 21:46:32'),
  (52, 15, 'ICT', 'MS Office', 60, 'Good knowledge of Adobe Photoshop graphics editor. I have an experience with editing photos in RAW format.', 'en', 1, '2016-04-14 16:14:52', '2018-04-12 21:46:39'),
  (53, 16, 'ICT', 'Sony Vegas', 20, 'Basic knowledge of video editing, including video cutting.', 'en', 1, '2016-04-14 16:14:52', '2018-04-12 21:47:25'),
  (54, 17, 'ICT', 'Autocad + Inventor', 25, 'Basic knowledge of Autodesk AutoCAD and Autodesk Inventor software.', 'en', 1, '2016-04-14 16:14:52', '2018-04-12 21:48:06'),
  (55, 18, 'ICT', 'Security', 45, 'Computer and network security, webpage security, cryptography, data protection...', 'en', 1, '2016-04-14 16:14:52', '2017-11-03 08:35:48'),
  (56, 19, 'ICT', 'Google', 60, 'Google API, Google Analytics, Google Drive...', 'en', 1, '2016-04-14 16:14:52', '2017-11-03 08:33:35'),
  (57, 20, 'ICT', 'C# + .NET', 25, 'Basic knowledge of object oriented programmin in C# with Windows GUI and .NET framework.', 'en', 1, '2016-04-14 16:14:52', '2018-04-12 21:48:00'),
  (58, 21, 'ICT', 'Matlab', 20, 'Basic knowledge of programming language based on FORTRAN.', 'en', 1, '2016-04-14 16:14:53', '2018-04-12 21:47:55'),
  (59, 22, 'ICT', 'Cinema 4D', 20, 'Basic knowledge of 3D modelling software.', 'en', 1, '2016-04-14 16:14:53', '2018-04-12 21:47:52'),
  (60, 23, 'ICT', 'Java', 15, 'Basic knowledge.', 'en', 1, '2016-04-14 16:14:53', '2018-04-12 21:47:38'),
  (61, 24, 'ICT', 'Hardware', 45, 'Knowledge of computer components and peripherals.', 'en', 1, '2016-04-14 16:14:53', '2018-04-12 21:47:01'),
  (62, 25, 'ICT', 'InDesign', 30, 'Above-average knowledge of desktop publishing and typographic editing in Adobe InDesign application.', 'en', 1, '2016-04-14 16:14:53', '2018-04-12 21:47:13'),
  (63, 26, 'ICT', 'Illustrator', 20, 'Basic knowledge of vector graphic editor - Adobe Illustrator.', 'en', 1, '2016-04-14 16:14:53', '2018-04-12 21:48:18'),
  (64, 27, 'Languages', 'Czech', 100, 'Native speaker. Advanced grammar knowledge, experiences of proofreading scientific texts.', 'en', 1, '2016-04-14 16:14:53', '2017-11-03 08:23:12'),
  (65, 28, 'Languages', 'English', 60, 'Upper-intermediate level. Fully sufficient considered communication or technical docs.', 'en', 1, '2016-04-14 16:14:53', '2017-11-03 08:23:24'),
  (66, 29, 'Others', 'Marketing & PR', 30, 'Basic knowledge of company communication, experience with job at Science communication department.', 'en', 1, '2016-04-14 16:14:53', '2018-04-12 21:49:08'),
  (67, 30, 'Others', 'Nuclear Power Generation', 20, 'Basics of nuclear reactor principle. Experiences of working with radioactive materials.', 'en', 1, '2016-04-14 16:14:53', '2017-11-03 09:37:48'),
  (68, 31, 'Others', 'Engineering', 15, 'Basic knowledge of standards and construction.', 'en', 1, '2016-04-14 16:14:53', '2018-04-12 21:49:47'),
  (69, 32, 'Webdev', 'Git + GitHub', 25, 'Basic experience with version control system Git and GitHub repository.', 'en', 1, '2016-04-14 16:14:53', '2018-04-12 21:44:28'),
  (70, 33, 'Webdev', 'Python', 10, 'Basic knowledge.', 'en', 1, '2016-04-14 16:14:53', '2018-04-12 21:45:42'),
  (71, 34, 'Others', 'Photography', 40, 'Good experience with DSLR (reflex camera). Knowledge of principles of photography and experience of photograph practice, including digital editing.', 'en', 1, '2016-04-14 16:14:53', '2018-04-12 21:48:51'),
  (72, 35, 'Webdev', 'AngularJS', 10, 'Basic knowledge.', 'en', 1, '2016-06-08 07:38:09', '2018-04-12 21:45:44'),
  (73, 36, 'Webdev', 'Bootstrap', 50,
   'Experiences of famous Bootstrap framework and building responsive web apps with it.', 'en', 1,
   '2016-06-08 07:39:13', '2017-11-03 09:34:45'),
  (74, 37, 'Webdev', 'Grunt', 10, 'Basic knowledge.', 'en', 1, '2016-06-08 14:05:50', '2018-04-12 21:45:48'),
  (75, 38, 'Webdev', 'Laravel <span class="badge badge-secondary">NOVÉ</span>', 10, 'Učím se to. :)', 'cs', 1,
   '2018-04-11 12:30:39', '2018-04-11 12:32:09'),
  (76, 38, 'Webdev', 'Laravel <span class="badge badge-secondary">NEW</span>', 10, 'I\'m just learning it. :)', 'en', 1,
   '2018-04-11 12:31:45', '2018-04-11 12:33:51');
/*!40000 ALTER TABLE `skill`
  ENABLE KEYS */;

-- Dumping structure for table rychecky.social
DROP TABLE IF EXISTS `social`;
CREATE TABLE IF NOT EXISTS `social` (
  `row_id`    int(11)   NOT NULL                    AUTO_INCREMENT
  COMMENT 'ID záznamu',
  `social_id` int(11)   NOT NULL                    DEFAULT '0'
  COMMENT 'ID profilu na sociální síti',
  `name`      varchar(1024) COLLATE utf8_czech_ci   DEFAULT NULL
  COMMENT 'Název sítě',
  `url`       varchar(1024) COLLATE utf8_czech_ci   DEFAULT NULL
  COMMENT 'URL profilu',
  `icon`      varchar(1024) COLLATE utf8_czech_ci   DEFAULT NULL
  COMMENT 'Ikona FontAwesome',
  `color`     varchar(32) COLLATE utf8_czech_ci     DEFAULT NULL
  COMMENT 'Barva (hex)',
  `order`     int(11)                               DEFAULT '0'
  COMMENT 'Hodnota pořadí',
  `visible`   tinyint(4)                            DEFAULT '1'
  COMMENT 'Viditelný?',
  `added`     timestamp NULL                        DEFAULT CURRENT_TIMESTAMP
  COMMENT 'Přidáno',
  `timestamp` timestamp NULL                        DEFAULT CURRENT_TIMESTAMP
  ON UPDATE CURRENT_TIMESTAMP
  COMMENT 'Změněno',
  PRIMARY KEY (`row_id`),
  KEY `visible` (`visible`),
  KEY `social_id` (`social_id`)
)
  ENGINE = InnoDB
  AUTO_INCREMENT = 12
  DEFAULT CHARSET = utf8
  COLLATE = utf8_czech_ci
  ROW_FORMAT = COMPRESSED
  COMMENT ='Odkazy na profily na sociálních sítích';

-- Dumping data for table rychecky.social: ~10 rows (approximately)
/*!40000 ALTER TABLE `social`
  DISABLE KEYS */;
INSERT INTO `social` (`row_id`, `social_id`, `name`, `url`, `icon`, `color`, `order`, `visible`, `added`, `timestamp`)
VALUES
  (1, 2, 'Facebook', 'https://www.facebook.com/jakub.rychecky', 'fa-facebook', '#3F5C9A', 90, 1, '2016-05-04 18:52:27',
   '2016-05-04 19:57:50'),
  (2, 1, 'LinkedIn', 'https://www.linkedin.com/in/rychecky', 'fa-linkedin', '#1884BB', 100, 1, '2016-05-04 18:52:55',
   '2016-05-04 19:57:19'),
  (3, 4, 'ČSFD', 'http://www.csfd.cz/uzivatel/99999-jacube/', 'fa-film', '#CF080F', 50, 1, '2016-05-04 18:53:09',
   '2016-05-05 22:09:31'),
  (4, 6, 'DatabazeKnih', 'http://www.databazeknih.cz/uzivatele/jacube-38935', 'fa-book', '#9F393A', 0, 1,
   '2016-05-04 18:53:27', '2016-05-04 19:59:22'),
  (5, 3, 'GitHub', 'https://github.com/jaCUBE', 'fa-github', '#444444', 30, 1, '2016-05-04 18:53:44',
   '2016-05-05 22:09:28'),
  (6, 5, 'Steam', 'http://steamcommunity.com/id/jacube/', 'fa-steam', '#000000', 50, 1, '2016-05-04 18:54:24',
   '2016-05-05 22:09:34'),
  (8, 8, 'Last.fm', 'http://www.last.fm/user/jaCUBExCZ', 'fa-lastfm', '#B90000', 30, 1, '2016-05-04 18:55:47',
   '2016-05-05 22:10:10'),
  (9, 9, 'Flickr', 'https://www.flickr.com/photos/rychecky/', 'fa-picture-o', '#FF0084', 20, 1, '2016-05-04 18:56:09',
   '2016-05-05 22:09:41'),
  (10, 7, 'Titulky.com', 'http://www.titulky.com/?UserDetail=449856', 'fa-align-center', '#4376A1', 0, 1,
   '2016-05-04 18:56:51', '2016-05-05 22:09:54'),
  (11, 11, 'Greasy Fork', 'https://greasyfork.org/cs/users/14126-jacube', 'fa-code', '#670000', 0, 1,
   '2016-08-11 16:13:36', '2016-08-11 16:13:36');
/*!40000 ALTER TABLE `social`
  ENABLE KEYS */;

/*!40101 SET SQL_MODE = IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS = IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
