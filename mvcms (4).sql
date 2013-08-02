-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas wygenerowania: 23 Lip 2013, 12:15
-- Wersja serwera: 5.5.27
-- Wersja PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `mvcms`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `mvcms_acl_user_permissions`
--

CREATE TABLE IF NOT EXISTS `mvcms_acl_user_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` int(11) DEFAULT NULL,
  `resource` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `has_access` tinyint(1) DEFAULT '0',
  `add` tinyint(1) DEFAULT '0',
  `modify` tinyint(1) DEFAULT '0',
  `modify_own` tinyint(1) DEFAULT '0',
  `delete` tinyint(1) DEFAULT '0',
  `delete_own` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Zrzut danych tabeli `mvcms_acl_user_permissions`
--

INSERT INTO `mvcms_acl_user_permissions` (`id`, `role`, `resource`, `description`, `has_access`, `add`, `modify`, `modify_own`, `delete`, `delete_own`) VALUES
(1, 1, 10, 'Opis uprawnienia', 1, 0, 1, 0, 0, 0),
(2, 1, 5, NULL, 1, 0, 1, 0, 0, 0),
(3, 1, 17, 'Budowowanie i edycja galerii zdjęć', 1, 0, 1, 0, 0, 0),
(4, 1, 8, 'Widok listy stron', 1, 0, 1, 1, -1, 0),
(5, 1, 9, 'Zarządzanie stronami', 1, 0, 1, 0, 0, 0),
(6, 1, 18, 'Dodawanie i edycja zdjęć w galerii', 1, 0, 0, 0, 0, 0),
(9, 2, 1, 'Dostęp do menu ', 1, -1, -1, -1, -1, -1),
(10, 2, 2, 'Dostęp do menu ', 1, -1, -1, -1, -1, -1),
(11, 2, 3, 'Dostęp do menu ', 1, -1, -1, -1, -1, -1),
(12, 2, 16, 'Budowanie zawartości menu ', 1, 0, 0, 0, 0, 0),
(13, 2, 17, 'Budowowanie i edycja galerii zdjęć', 1, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `mvcms_acl_user_resources`
--

CREATE TABLE IF NOT EXISTS `mvcms_acl_user_resources` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `parentId` int(11) DEFAULT NULL,
  `default` varchar(20) NOT NULL,
  `type` varchar(8) NOT NULL DEFAULT 'BACKEND',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Zrzut danych tabeli `mvcms_acl_user_resources`
--

INSERT INTO `mvcms_acl_user_resources` (`id`, `name`, `description`, `parentId`, `default`, `type`) VALUES
(1, 'admin:mainmenu:content', 'Dostęp do menu "Treść"', NULL, '1:-1:-1:-1:-1:-1', 'BACKEND'),
(2, 'admin:mainmenu:content:pages', 'Dostęp do menu "Treść/Strony"', NULL, '1:-1:-1:-1:-1:-1', 'BACKEND'),
(3, 'admin:mainmenu:content:news', 'Dostęp do menu "Treść/Aktualności"', NULL, '1:-1:-1:-1:-1:-1', 'BACKEND'),
(4, 'admin:mainmenu:content:catnews', 'Dostęp do menu "Treść/Kategorie dla Aktualności"', NULL, '1:-1:-1:-1:-1:-1', 'BACKEND'),
(5, 'admin:mainmenu:content:newsletter', 'Dostęp do menu "Treść/Newsletter"', NULL, '1:-1:-1:-1:-1:-1', 'BACKEND'),
(6, 'admin:mainmenu:gallery', 'Dostęp do menu "Galeria"', NULL, '1:-1:-1:-1:-1:-1', 'BACKEND'),
(7, 'admin:mainmenu:gallery:gallery', 'Dostęp do menu "Galeria/Galerie"', NULL, '1:-1:-1:-1:-1:-1', 'BACKEND'),
(8, 'admin:pages:list', 'Widok listy stron', NULL, '1:0:0:0:0:0', 'BACKEND'),
(9, 'admin:pages:list:manage', 'Zarządzanie stronami', NULL, '1:0:0:0:0:0', 'BACKEND'),
(10, 'admin:news:list', 'Widok listy aktualności', NULL, '1:0:0:0:0:0', 'BACKEND'),
(11, 'admin:news:list:manage', 'Zarządzanie aktualnościami', NULL, '1:0:0:0:0:0', 'BACKEND'),
(12, 'admin:catnews:list', 'Widok listy kategorii aktualności', NULL, '1:0:0:0:0:0', 'BACKEND'),
(13, 'admin:catnewsnews:list:manage', 'Zarządzanie kategoriami dla aktualności', NULL, '1:0:0:0:0:0', 'BACKEND'),
(14, 'admin:menu:template_list:manage', 'Przypisywanie dostępnych menu dla wybranego szablonu', NULL, '1:-1:0:0:-1:-1', 'BACKEND'),
(15, 'admin:menu:tab_menu_list:manage', 'Zarządzanie zakładkami dostępnych menu', NULL, '1:0:0:0:0:0', 'BACKEND'),
(16, 'admin:menu:content:manage', 'Budowanie zawartości menu ', NULL, '1:0:0:0:0:0', 'BACKEND'),
(17, 'admin:gallery:list:manage', 'Budowowanie i edycja galerii zdjęć', NULL, '1:0:0:0:0:0', 'BACKEND'),
(18, 'admin:gallery:picture:manage', 'Dodawanie i edycja zdjęć w galerii', NULL, '1:0:0:0:0:0', 'BACKEND');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `mvcms_acl_user_roles`
--

CREATE TABLE IF NOT EXISTS `mvcms_acl_user_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `short_desc` varchar(255) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `parentId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Zrzut danych tabeli `mvcms_acl_user_roles`
--

INSERT INTO `mvcms_acl_user_roles` (`id`, `name`, `short_desc`, `desc`, `parentId`) VALUES
(1, 'Administrator', 'Administratorzy', '', NULL),
(2, 'Moderator stron', 'Moderator treści stron', '', NULL),
(3, 'Moderator własnych stron', 'Moderator treści własnych stron', '', NULL),
(4, 'Użytkownicy', 'Zarejestrowani użytkownicy', 'Zarejestrowani użytkownicy', NULL),
(5, 'Moderator ofert', 'Moderator ofert', 'Moderator ofert nieruchomości', NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `mvcms_acl_user_role_group`
--

CREATE TABLE IF NOT EXISTS `mvcms_acl_user_role_group` (
  `userid` int(11) NOT NULL,
  `roles` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `mvcms_acl_user_role_group`
--

INSERT INTO `mvcms_acl_user_role_group` (`userid`, `roles`) VALUES
(1, '3'),
(19, '3');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `mvcms_active_guests`
--

CREATE TABLE IF NOT EXISTS `mvcms_active_guests` (
  `ip` varchar(15) NOT NULL,
  `timestamp` int(11) unsigned NOT NULL,
  PRIMARY KEY (`ip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `mvcms_active_users`
--

CREATE TABLE IF NOT EXISTS `mvcms_active_users` (
  `username` varchar(30) NOT NULL,
  `timestamp` int(11) unsigned NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `mvcms_active_users`
--

INSERT INTO `mvcms_active_users` (`username`, `timestamp`) VALUES
('admin', 1374574125),
('Daniel', 1346397396),
('eidsza2', 1346764055);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `mvcms_banned_users`
--

CREATE TABLE IF NOT EXISTS `mvcms_banned_users` (
  `username` varchar(30) NOT NULL,
  `timestamp` int(11) unsigned NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `mvcms_country_area`
--

CREATE TABLE IF NOT EXISTS `mvcms_country_area` (
  `id` smallint(3) unsigned NOT NULL AUTO_INCREMENT,
  `wid` tinyint(2) unsigned NOT NULL,
  `area` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `wid` (`wid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

--
-- Zrzut danych tabeli `mvcms_country_area`
--

INSERT INTO `mvcms_country_area` (`id`, `wid`, `area`) VALUES
(1, 1, 'bolesławiecki'),
(2, 1, 'dzierżoniowski'),
(3, 1, 'głogowski'),
(4, 1, 'górowski'),
(5, 1, 'jaworski'),
(6, 1, 'jeleniogórski'),
(7, 1, 'kamiennogórski'),
(8, 1, 'kłodzki'),
(9, 1, 'legnicki'),
(10, 1, 'lubański'),
(11, 1, 'lubiński'),
(12, 1, 'lwówecki'),
(13, 1, 'milicki'),
(14, 1, 'oleśnicki'),
(15, 1, 'oławski'),
(16, 1, 'polkowicki'),
(17, 1, 'strzeliński'),
(18, 1, 'średzki'),
(19, 1, 'świdnicki'),
(20, 1, 'trzebnicki'),
(21, 1, 'wałbrzyski'),
(22, 1, 'wołowski'),
(23, 1, 'wrocławski'),
(24, 1, 'ząbkowicki'),
(25, 1, 'zgorzelecki'),
(26, 1, 'złotoryjski'),
(27, 2, 'aleksandrowski'),
(28, 2, 'brodnicki'),
(29, 2, 'bydgoski'),
(30, 2, 'chełmiński'),
(31, 2, 'golubsko-dobrzyński'),
(32, 2, 'grudziądzki'),
(33, 2, 'inowrocławski'),
(34, 2, 'lipnowski'),
(35, 2, 'mogileński'),
(36, 2, 'nakielski'),
(37, 2, 'radziejowski'),
(38, 2, 'rypiński'),
(39, 2, 'sępoleński'),
(40, 2, 'świecki'),
(41, 2, 'toruński'),
(42, 2, 'tucholski'),
(43, 2, 'wąbrzeski'),
(44, 2, 'włocławski'),
(45, 2, 'żniński'),
(46, 3, 'bialski'),
(47, 3, 'biłgorajski'),
(48, 3, 'chełmski'),
(49, 3, 'hrubieszowski'),
(50, 3, 'janowski'),
(51, 3, 'krasnostawski'),
(52, 3, 'kraśnicki'),
(53, 3, 'lubartowski'),
(54, 3, 'lubelski'),
(55, 3, 'łęczyński'),
(56, 3, 'łukowski'),
(57, 3, 'opolski'),
(58, 3, 'parczewski'),
(59, 3, 'puławski'),
(60, 3, 'radzyński'),
(61, 3, 'rycki'),
(62, 3, 'świdnicki'),
(63, 3, 'tomaszowski'),
(64, 3, 'włodawski'),
(65, 3, 'zamojski'),
(66, 4, 'gorzowski'),
(67, 4, 'krośnieński'),
(68, 4, 'międzyrzecki'),
(69, 4, 'nowosolski'),
(70, 4, 'słubicki'),
(71, 4, 'strzelecko-drezdenec'),
(72, 4, 'sulęciński'),
(73, 4, 'świebodziński'),
(74, 4, 'zielonogórski'),
(75, 4, 'żagański'),
(76, 4, 'żarski'),
(77, 4, 'wschowski'),
(78, 5, 'bełchatowski'),
(79, 5, 'kutnowski'),
(80, 5, 'łaski'),
(81, 5, 'łęczycki'),
(82, 5, 'łowicki'),
(83, 5, 'łódzki wschodni'),
(84, 5, 'opoczyński'),
(85, 5, 'pabianicki'),
(86, 5, 'pajęczański'),
(87, 5, 'piotrkowski'),
(88, 5, 'poddębicki'),
(89, 5, 'radomszczański'),
(90, 5, 'rawski'),
(91, 5, 'sieradzki'),
(92, 5, 'skierniewicki'),
(93, 5, 'tomaszowski'),
(94, 5, 'wieluński'),
(95, 5, 'wieruszowski'),
(96, 5, 'zduńskowolski'),
(97, 5, 'zgierski'),
(98, 5, 'brzeziński'),
(99, 6, 'bocheński'),
(100, 6, 'brzeski'),
(101, 6, 'chrzanowski'),
(102, 6, 'dąbrowski'),
(103, 6, 'gorlicki'),
(104, 6, 'krakowski'),
(105, 6, 'limanowski'),
(106, 6, 'miechowski'),
(107, 6, 'myślenicki'),
(108, 6, 'nowosądecki'),
(109, 6, 'nowotarski'),
(110, 6, 'olkuski'),
(111, 6, 'oświęcimski'),
(112, 6, 'proszowicki'),
(113, 6, 'suski'),
(114, 6, 'tarnowski'),
(115, 6, 'tatrzański'),
(116, 6, 'wadowicki'),
(117, 6, 'wielicki'),
(118, 7, 'białobrzeski'),
(119, 7, 'ciechanowski'),
(120, 7, 'garwoliński'),
(121, 7, 'gostyniński'),
(122, 7, 'grodziski'),
(123, 7, 'grójecki'),
(124, 7, 'kozienicki'),
(125, 7, 'legionowski'),
(126, 7, 'lipski'),
(127, 7, 'łosicki'),
(128, 7, 'makowski'),
(129, 7, 'miński'),
(130, 7, 'mławski'),
(131, 7, 'nowodworski'),
(132, 7, 'ostrołęcki'),
(133, 7, 'ostrowski'),
(134, 7, 'otwocki'),
(135, 7, 'piaseczyński'),
(136, 7, 'płocki'),
(137, 7, 'płoński'),
(138, 7, 'pruszkowski'),
(139, 7, 'przasnyski'),
(140, 7, 'przysuski'),
(141, 7, 'pułtuski'),
(142, 7, 'radomski'),
(143, 7, 'siedlecki'),
(144, 7, 'sierpecki'),
(145, 7, 'sochaczewski'),
(146, 7, 'sokołowski'),
(147, 7, 'szydłowiecki'),
(148, 7, 'warszawski zachodni'),
(149, 7, 'węgrowski'),
(150, 7, 'wołomiński'),
(151, 7, 'wyszkowski'),
(152, 7, 'zwoleński'),
(153, 7, 'żuromiński'),
(154, 7, 'żyrardowski'),
(155, 8, 'brzeski'),
(156, 8, 'głubczycki'),
(157, 8, 'kędzierzyńsko-koziel'),
(158, 8, 'kluczborski'),
(159, 8, 'krapkowicki'),
(160, 8, 'namysłowski'),
(161, 8, 'nyski'),
(162, 8, 'oleski'),
(163, 8, 'opolski'),
(164, 8, 'prudnicki'),
(165, 8, 'strzelecki'),
(166, 9, 'bieszczadzki'),
(167, 9, 'brzozowski'),
(168, 9, 'dębicki'),
(169, 9, 'jarosławski'),
(170, 9, 'jasielski'),
(171, 9, 'kolbuszowski'),
(172, 9, 'krośnieński'),
(173, 9, 'leżajski'),
(174, 9, 'lubaczowski'),
(175, 9, 'łańcucki'),
(176, 9, 'mielecki'),
(177, 9, 'niżański'),
(178, 9, 'przemyski'),
(179, 9, 'przeworski'),
(180, 9, 'ropczycko-sędziszows'),
(181, 9, 'rzeszowski'),
(182, 9, 'sanocki'),
(183, 9, 'stalowowolski'),
(184, 9, 'strzyżowski'),
(185, 9, 'tarnobrzeski'),
(186, 9, 'leski'),
(187, 10, 'augustowski'),
(188, 10, 'białostocki'),
(189, 10, 'bielski'),
(190, 10, 'grajewski'),
(191, 10, 'hajnowski'),
(192, 10, 'kolneński'),
(193, 10, 'łomżyński'),
(194, 10, 'moniecki'),
(195, 10, 'sejneński'),
(196, 10, 'siemiatycki'),
(197, 10, 'sokólski'),
(198, 10, 'suwalski'),
(199, 10, 'wysokomazowiecki'),
(200, 10, 'zambrowski'),
(201, 11, 'bytowski'),
(202, 11, 'chojnicki'),
(203, 11, 'człuchowski'),
(204, 11, 'gdański'),
(205, 11, 'kartuski'),
(206, 11, 'kościerski'),
(207, 11, 'kwidzyński'),
(208, 11, 'lęborski'),
(209, 11, 'malborski'),
(210, 11, 'nowodworski'),
(211, 11, 'pucki'),
(212, 11, 'słupski'),
(213, 11, 'starogardzki'),
(214, 11, 'tczewski'),
(215, 11, 'wejherowski'),
(216, 11, 'sztumski'),
(217, 12, 'będziński'),
(218, 12, 'bielski'),
(219, 12, 'cieszyński'),
(220, 12, 'częstochowski'),
(221, 12, 'gliwicki'),
(222, 12, 'kłobucki'),
(223, 12, 'lubliniecki'),
(224, 12, 'mikołowski'),
(225, 12, 'myszkowski'),
(226, 12, 'pszczyński'),
(227, 12, 'raciborski'),
(228, 12, 'rybnicki'),
(229, 12, 'tarnogórski'),
(230, 12, 'bieruńsko-lędziński'),
(231, 12, 'wodzisławski'),
(232, 12, 'zawierciański'),
(233, 12, 'żywiecki'),
(234, 13, 'buski'),
(235, 13, 'jędrzejowski'),
(236, 13, 'kazimierski'),
(237, 13, 'kielecki'),
(238, 13, 'konecki'),
(239, 13, 'opatowski'),
(240, 13, 'ostrowiecki'),
(241, 13, 'pińczowski'),
(242, 13, 'sandomierski'),
(243, 13, 'skarżyski'),
(244, 13, 'starachowicki'),
(245, 13, 'staszowski'),
(246, 13, 'włoszczowski'),
(247, 14, 'bartoszycki'),
(248, 14, 'braniewski'),
(249, 14, 'działdowski'),
(250, 14, 'elbląski'),
(251, 14, 'ełcki'),
(252, 14, 'giżycki'),
(253, 14, 'iławski'),
(254, 14, 'kętrzyński'),
(255, 14, 'lidzbarski'),
(256, 14, 'mrągowski'),
(257, 14, 'nidzicki'),
(258, 14, 'nowomiejski'),
(259, 14, 'olecki'),
(260, 14, 'olsztyński'),
(261, 14, 'ostródzki'),
(262, 14, 'piski'),
(263, 14, 'szczycieński'),
(264, 14, 'gołdapski'),
(265, 14, 'węgorzewski'),
(266, 15, 'chodzieski'),
(267, 15, 'czarnkowsko-trzciane'),
(268, 15, 'gnieźnieński'),
(269, 15, 'gostyński'),
(270, 15, 'grodziski'),
(271, 15, 'jarociński'),
(272, 15, 'kaliski'),
(273, 15, 'kępiński'),
(274, 15, 'kolski'),
(275, 15, 'koniński'),
(276, 15, 'kościański'),
(277, 15, 'krotoszyński'),
(278, 15, 'leszczyński'),
(279, 15, 'międzychodzki'),
(280, 15, 'nowotomyski'),
(281, 15, 'obornicki'),
(282, 15, 'ostrowski'),
(283, 15, 'ostrzeszowski'),
(284, 15, 'pilski'),
(285, 15, 'pleszewski'),
(286, 15, 'poznański'),
(287, 15, 'rawicki'),
(288, 15, 'słupecki'),
(289, 15, 'szamotulski'),
(290, 15, 'średzki'),
(291, 15, 'śremski'),
(292, 15, 'turecki'),
(293, 15, 'wągrowiecki'),
(294, 15, 'wolsztyński'),
(295, 15, 'wrzesiński'),
(296, 15, 'złotowski'),
(297, 16, 'białogardzki'),
(298, 16, 'choszczeński'),
(299, 16, 'drawski'),
(300, 16, 'goleniowski'),
(301, 16, 'gryficki'),
(302, 16, 'gryfiński'),
(303, 16, 'kamieński'),
(304, 16, 'kołobrzeski'),
(305, 16, 'koszaliński'),
(306, 16, 'myśliborski'),
(307, 16, 'policki'),
(308, 16, 'pyrzycki'),
(309, 16, 'sławieński'),
(310, 16, 'stargardzki'),
(311, 16, 'szczecinecki'),
(312, 16, 'świdwiński'),
(313, 16, 'wałecki'),
(314, 16, 'łobeski');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `mvcms_country_state`
--

CREATE TABLE IF NOT EXISTS `mvcms_country_state` (
  `id` tinyint(2) unsigned NOT NULL AUTO_INCREMENT,
  `state` varchar(19) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

--
-- Zrzut danych tabeli `mvcms_country_state`
--

INSERT INTO `mvcms_country_state` (`id`, `state`) VALUES
(1, 'dolnośląskie'),
(2, 'kujawsko-pomorskie'),
(3, 'lubelskie'),
(4, 'lubuskie'),
(5, 'łódzkie'),
(6, 'małopolskie'),
(7, 'mazowieckie'),
(8, 'opolskie'),
(9, 'podkarpackie'),
(10, 'podlaskie'),
(11, 'pomorskie'),
(12, 'śląskie'),
(13, 'świętokrzyskie'),
(14, 'warmińsko-mazurskie'),
(15, 'wielkopolskie'),
(16, 'zachodniopomorskie');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `mvcms_default_modules`
--

CREATE TABLE IF NOT EXISTS `mvcms_default_modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `version` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `skip_xss` tinyint(1) NOT NULL,
  `is_frontend` tinyint(1) NOT NULL,
  `is_backend` tinyint(1) NOT NULL,
  `menu` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `installed` tinyint(1) NOT NULL,
  `is_core` tinyint(1) NOT NULL,
  `updated_on` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `enabled` (`enabled`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Zrzut danych tabeli `mvcms_default_modules`
--

INSERT INTO `mvcms_default_modules` (`id`, `name`, `slug`, `version`, `type`, `description`, `skip_xss`, `is_frontend`, `is_backend`, `menu`, `enabled`, `installed`, `is_core`, `updated_on`) VALUES
(1, 'a:15:{s:2:"en";s:4:"Blog";s:2:"ar";s:16:"المدوّنة";s:2:"br";s:4:"Blog";s:2:"pt";s:4:"Blog";s:2:"el";s:18:"Ιστολόγιο";s:2:"he";s:8:"בלוג";s:2:"id";s:4:"Blog";s:2:"lt";s:6:"Blogas";s:2:"pl";s:4:"Blog";s:2:"ru";s:8:"Блог";s:2:"zh";s:6:"文章";s:2:"hu";s:4:"Blog";s:2:"fi";s:5:"Blogi";s:2:"th";s:15:"บล็อก";s:2:"se";s:5:"Blogg";}', 'blog', '2.0', NULL, 'a:23:{s:2:"en";s:18:"Post blog entries.";s:2:"ar";s:48:"أنشر المقالات على مدوّنتك.";s:2:"br";s:30:"Escrever publicações de blog";s:2:"pt";s:39:"Escrever e editar publicações no blog";s:2:"cs";s:49:"Publikujte nové články a příspěvky na blog.";s:2:"da";s:17:"Skriv blogindlæg";s:2:"de";s:47:"Veröffentliche neue Artikel und Blog-Einträge";s:2:"sl";s:23:"Objavite blog prispevke";s:2:"fi";s:28:"Kirjoita blogi artikkeleita.";s:2:"el";s:93:"Δημιουργήστε άρθρα και εγγραφές στο ιστολόγιο σας.";s:2:"es";s:54:"Escribe entradas para los artículos y blog (web log).";s:2:"fr";s:46:"Envoyez de nouveaux posts et messages de blog.";s:2:"he";s:19:"ניהול בלוג";s:2:"id";s:15:"Post entri blog";s:2:"it";s:36:"Pubblica notizie e post per il blog.";s:2:"lt";s:40:"Rašykite naujienas bei blog''o įrašus.";s:2:"nl";s:41:"Post nieuwsartikelen en blogs op uw site.";s:2:"pl";s:27:"Dodawaj nowe wpisy na blogu";s:2:"ru";s:49:"Управление записями блога.";s:2:"zh";s:42:"發表新聞訊息、部落格等文章。";s:2:"th";s:48:"โพสต์รายการบล็อก";s:2:"hu";s:32:"Blog bejegyzések létrehozása.";s:2:"se";s:18:"Inlägg i bloggen.";}', 1, 1, 1, 'content', 1, 1, 1, 1344595496),
(2, 'a:23:{s:2:"en";s:8:"Comments";s:2:"ar";s:18:"التعليقات";s:2:"br";s:12:"Comentários";s:2:"pt";s:12:"Comentários";s:2:"cs";s:11:"Komentáře";s:2:"da";s:11:"Kommentarer";s:2:"de";s:10:"Kommentare";s:2:"el";s:12:"Σχόλια";s:2:"es";s:11:"Comentarios";s:2:"fi";s:9:"Kommentit";s:2:"fr";s:12:"Commentaires";s:2:"he";s:12:"תגובות";s:2:"id";s:8:"Komentar";s:2:"it";s:8:"Commenti";s:2:"lt";s:10:"Komentarai";s:2:"nl";s:8:"Reacties";s:2:"pl";s:10:"Komentarze";s:2:"ru";s:22:"Комментарии";s:2:"sl";s:10:"Komentarji";s:2:"zh";s:6:"回應";s:2:"hu";s:16:"Hozzászólások";s:2:"th";s:33:"ความคิดเห็น";s:2:"se";s:11:"Kommentarer";}', 'comments', '1.0', NULL, 'a:23:{s:2:"en";s:76:"Users and guests can write comments for content like blog, pages and photos.";s:2:"ar";s:152:"يستطيع الأعضاء والزوّار كتابة التعليقات على المُحتوى كالأخبار، والصفحات والصّوَر.";s:2:"br";s:97:"Usuários e convidados podem escrever comentários para quase tudo com suporte nativo ao captcha.";s:2:"pt";s:100:"Utilizadores e convidados podem escrever comentários para quase tudo com suporte nativo ao captcha.";s:2:"cs";s:100:"Uživatelé a hosté mohou psát komentáře k obsahu, např. neovinkám, stránkám a fotografiím.";s:2:"da";s:83:"Brugere og besøgende kan skrive kommentarer til indhold som blog, sider og fotoer.";s:2:"de";s:65:"Benutzer und Gäste können für fast alles Kommentare schreiben.";s:2:"el";s:224:"Οι χρήστες και οι επισκέπτες μπορούν να αφήνουν σχόλια για περιεχόμενο όπως το ιστολόγιο, τις σελίδες και τις φωτογραφίες.";s:2:"es";s:130:"Los usuarios y visitantes pueden escribir comentarios en casi todo el contenido con el soporte de un sistema de captcha incluído.";s:2:"fi";s:107:"Käyttäjät ja vieraat voivat kirjoittaa kommentteja eri sisältöihin kuten uutisiin, sivuihin ja kuviin.";s:2:"fr";s:130:"Les utilisateurs et les invités peuvent écrire des commentaires pour quasiment tout grâce au générateur de captcha intégré.";s:2:"he";s:94:"משתמשי האתר יכולים לרשום תגובות למאמרים, תמונות וכו";s:2:"id";s:100:"Pengguna dan pengunjung dapat menuliskan komentaruntuk setiap konten seperti blog, halaman dan foto.";s:2:"it";s:85:"Utenti e visitatori possono scrivere commenti ai contenuti quali blog, pagine e foto.";s:2:"lt";s:75:"Vartotojai ir svečiai gali komentuoti jūsų naujienas, puslapius ar foto.";s:2:"nl";s:52:"Gebruikers en gasten kunnen reageren op bijna alles.";s:2:"pl";s:93:"Użytkownicy i goście mogą dodawać komentarze z wbudowanym systemem zabezpieczeń captcha.";s:2:"ru";s:187:"Пользователи и гости могут добавлять комментарии к новостям, информационным страницам и фотографиям.";s:2:"sl";s:89:"Uporabniki in obiskovalci lahko vnesejo komentarje na vsebino kot je blok, stra ali slike";s:2:"zh";s:75:"用戶和訪客可以針對新聞、頁面與照片等內容發表回應。";s:2:"hu";s:117:"A felhasználók és a vendégek hozzászólásokat írhatnak a tartalomhoz (bejegyzésekhez, oldalakhoz, fotókhoz).";s:2:"th";s:240:"ผู้ใช้งานและผู้เยี่ยมชมสามารถเขียนความคิดเห็นในเนื้อหาของหน้าเว็บบล็อกและภาพถ่าย";s:2:"se";s:98:"Användare och besökare kan skriva kommentarer till innehåll som blogginlägg, sidor och bilder.";}', 0, 0, 1, 'content', 1, 1, 1, 1344595496),
(5, 'a:22:{s:2:"en";s:6:"Groups";s:2:"ar";s:18:"المجموعات";s:2:"br";s:6:"Grupos";s:2:"pt";s:6:"Grupos";s:2:"cs";s:7:"Skupiny";s:2:"da";s:7:"Grupper";s:2:"de";s:7:"Gruppen";s:2:"el";s:12:"Ομάδες";s:2:"es";s:6:"Grupos";s:2:"fi";s:7:"Ryhmät";s:2:"fr";s:7:"Groupes";s:2:"he";s:12:"קבוצות";s:2:"id";s:4:"Grup";s:2:"it";s:6:"Gruppi";s:2:"lt";s:7:"Grupės";s:2:"nl";s:7:"Groepen";s:2:"ru";s:12:"Группы";s:2:"sl";s:7:"Skupine";s:2:"zh";s:6:"群組";s:2:"hu";s:9:"Csoportok";s:2:"th";s:15:"กลุ่ม";s:2:"se";s:7:"Grupper";}', 'groups', '1.0', NULL, 'a:22:{s:2:"en";s:54:"Users can be placed into groups to manage permissions.";s:2:"ar";s:100:"يمكن وضع المستخدمين في مجموعات لتسهيل إدارة صلاحياتهم.";s:2:"br";s:72:"Usuários podem ser inseridos em grupos para gerenciar suas permissões.";s:2:"pt";s:74:"Utilizadores podem ser inseridos em grupos para gerir as suas permissões.";s:2:"cs";s:77:"Uživatelé mohou být rozřazeni do skupin pro lepší správu oprávnění.";s:2:"da";s:49:"Brugere kan inddeles i grupper for adgangskontrol";s:2:"de";s:85:"Benutzer können zu Gruppen zusammengefasst werden um diesen Zugriffsrechte zu geben.";s:2:"el";s:168:"Οι χρήστες μπορούν να τοποθετηθούν σε ομάδες και έτσι να διαχειριστείτε τα δικαιώματά τους.";s:2:"es";s:75:"Los usuarios podrán ser colocados en grupos para administrar sus permisos.";s:2:"fi";s:84:"Käyttäjät voidaan liittää ryhmiin, jotta käyttöoikeuksia voidaan hallinnoida.";s:2:"fr";s:82:"Les utilisateurs peuvent appartenir à des groupes afin de gérer les permissions.";s:2:"he";s:62:"נותן אפשרות לאסוף משתמשים לקבוצות";s:2:"id";s:68:"Pengguna dapat dikelompokkan ke dalam grup untuk mengatur perizinan.";s:2:"it";s:69:"Gli utenti possono essere inseriti in gruppi per gestirne i permessi.";s:2:"lt";s:67:"Vartotojai gali būti priskirti grupei tam, kad valdyti jų teises.";s:2:"nl";s:73:"Gebruikers kunnen in groepen geplaatst worden om rechten te kunnen geven.";s:2:"ru";s:134:"Пользователей можно объединять в группы, для управления правами доступа.";s:2:"sl";s:64:"Uporabniki so lahko razvrščeni v skupine za urejanje dovoljenj";s:2:"zh";s:45:"用戶可以依群組分類並管理其權限";s:2:"hu";s:73:"A felhasználók csoportokba rendezhetőek a jogosultságok kezelésére.";s:2:"th";s:132:"สามารถวางผู้ใช้ลงในกลุ่มเพื่อการจัดการสิทธิ์";s:2:"se";s:76:"Användare kan delas in i grupper för att hantera roller och behörigheter.";}', 0, 0, 1, 'users', 1, 1, 1, 1344595496),
(8, 'a:23:{s:2:"en";s:7:"Modules";s:2:"ar";s:14:"الوحدات";s:2:"br";s:8:"Módulos";s:2:"pt";s:8:"Módulos";s:2:"cs";s:6:"Moduly";s:2:"da";s:7:"Moduler";s:2:"de";s:6:"Module";s:2:"el";s:16:"Πρόσθετα";s:2:"es";s:8:"Módulos";s:2:"fi";s:8:"Moduulit";s:2:"fr";s:7:"Modules";s:2:"he";s:14:"מודולים";s:2:"id";s:5:"Modul";s:2:"it";s:6:"Moduli";s:2:"lt";s:8:"Moduliai";s:2:"nl";s:7:"Modules";s:2:"pl";s:7:"Moduły";s:2:"ru";s:12:"Модули";s:2:"sl";s:6:"Moduli";s:2:"zh";s:6:"模組";s:2:"hu";s:7:"Modulok";s:2:"th";s:15:"โมดูล";s:2:"se";s:7:"Moduler";}', 'modules', '1.0', NULL, 'a:23:{s:2:"en";s:59:"Allows admins to see a list of currently installed modules.";s:2:"ar";s:91:"تُمكّن المُدراء من معاينة جميع الوحدات المُثبّتة.";s:2:"br";s:75:"Permite aos administradores ver a lista dos módulos instalados atualmente.";s:2:"pt";s:75:"Permite aos administradores ver a lista dos módulos instalados atualmente.";s:2:"cs";s:68:"Umožňuje administrátorům vidět seznam nainstalovaných modulů.";s:2:"da";s:63:"Lader administratorer se en liste over de installerede moduler.";s:2:"de";s:56:"Zeigt Administratoren alle aktuell installierten Module.";s:2:"el";s:152:"Επιτρέπει στους διαχειριστές να προβάλουν μια λίστα των εγκατεστημένων πρόσθετων.";s:2:"es";s:71:"Permite a los administradores ver una lista de los módulos instalados.";s:2:"fi";s:60:"Listaa järjestelmänvalvojalle käytössä olevat moduulit.";s:2:"fr";s:66:"Permet aux administrateurs de voir la liste des modules installés";s:2:"he";s:160:"נותן אופציה למנהל לראות רשימה של המודולים אשר מותקנים כעת באתר או להתקין מודולים נוספים";s:2:"id";s:57:"Memperlihatkan kepada admin daftar modul yang terinstall.";s:2:"it";s:83:"Permette agli amministratori di vedere una lista dei moduli attualmente installati.";s:2:"lt";s:75:"Vartotojai ir svečiai gali komentuoti jūsų naujienas, puslapius ar foto.";s:2:"nl";s:79:"Stelt admins in staat om een overzicht van geinstalleerde modules te genereren.";s:2:"pl";s:81:"Umożliwiają administratorowi wgląd do listy obecnie zainstalowanych modułów.";s:2:"ru";s:83:"Список модулей, которые установлены на сайте.";s:2:"sl";s:65:"Dovoljuje administratorjem pregled trenutno nameščenih modulov.";s:2:"zh";s:54:"管理員可以檢視目前已經安裝模組的列表";s:2:"hu";s:79:"Lehetővé teszi az adminoknak, hogy lássák a telepített modulok listáját.";s:2:"th";s:162:"ช่วยให้ผู้ดูแลระบบดูรายการของโมดูลที่ติดตั้งในปัจจุบัน";s:2:"se";s:67:"Gör det möjligt för administratören att se installerade mouler.";}', 0, 0, 1, '0', 1, 1, 1, 1344595496),
(9, 'a:23:{s:2:"en";s:10:"Navigation";s:2:"ar";s:14:"الروابط";s:2:"br";s:11:"Navegação";s:2:"pt";s:11:"Navegação";s:2:"cs";s:8:"Navigace";s:2:"da";s:10:"Navigation";s:2:"de";s:10:"Navigation";s:2:"el";s:16:"Πλοήγηση";s:2:"es";s:11:"Navegación";s:2:"fi";s:10:"Navigointi";s:2:"fr";s:10:"Navigation";s:2:"he";s:10:"ניווט";s:2:"id";s:8:"Navigasi";s:2:"it";s:11:"Navigazione";s:2:"lt";s:10:"Navigacija";s:2:"nl";s:9:"Navigatie";s:2:"pl";s:9:"Nawigacja";s:2:"ru";s:18:"Навигация";s:2:"sl";s:10:"Navigacija";s:2:"zh";s:12:"導航選單";s:2:"th";s:36:"ตัวช่วยนำทาง";s:2:"hu";s:11:"Navigáció";s:2:"se";s:10:"Navigation";}', 'navigation', '1.1', NULL, 'a:23:{s:2:"en";s:78:"Manage links on navigation menus and all the navigation groups they belong to.";s:2:"ar";s:85:"إدارة روابط وقوائم ومجموعات الروابط في الموقع.";s:2:"br";s:91:"Gerenciar links do menu de navegação e todos os grupos de navegação pertencentes a ele.";s:2:"pt";s:93:"Gerir todos os grupos dos menus de navegação e os links de navegação pertencentes a eles.";s:2:"cs";s:73:"Správa odkazů v navigaci a všech souvisejících navigačních skupin.";s:2:"da";s:82:"Håndtér links på navigationsmenuerne og alle navigationsgrupperne de tilhører.";s:2:"de";s:76:"Verwalte Links in Navigationsmenüs und alle zugehörigen Navigationsgruppen";s:2:"el";s:207:"Διαχειριστείτε τους συνδέσμους στα μενού πλοήγησης και όλες τις ομάδες συνδέσμων πλοήγησης στις οποίες ανήκουν.";s:2:"es";s:102:"Administra links en los menús de navegación y en todos los grupos de navegación al cual pertenecen.";s:2:"fi";s:91:"Hallitse linkkejä navigointi valikoissa ja kaikkia navigointi ryhmiä, joihin ne kuuluvat.";s:2:"fr";s:97:"Gérer les liens du menu Navigation et tous les groupes de navigation auxquels ils appartiennent.";s:2:"he";s:73:"ניהול שלוחות תפריטי ניווט וקבוצות ניווט";s:2:"id";s:73:"Mengatur tautan pada menu navigasi dan semua pengelompokan grup navigasi.";s:2:"it";s:97:"Gestisci i collegamenti dei menu di navigazione e tutti i gruppi di navigazione da cui dipendono.";s:2:"lt";s:95:"Tvarkyk nuorodas navigacijų menių ir visas navigacijų grupes kurioms tos nuorodos priklauso.";s:2:"nl";s:92:"Beheer koppelingen op de navigatiemenu&apos;s en alle navigatiegroepen waar ze onder vallen.";s:2:"pl";s:95:"Zarządzaj linkami w menu nawigacji oraz wszystkimi grupami nawigacji do których one należą.";s:2:"ru";s:136:"Управление ссылками в меню навигации и группах, к которым они принадлежат.";s:2:"sl";s:64:"Uredi povezave v meniju in vse skupine povezav ki jim pripadajo.";s:2:"zh";s:72:"管理導航選單中的連結，以及它們所隸屬的導航群組。";s:2:"th";s:108:"จัดการการเชื่อมโยงนำทางและกลุ่มนำทาง";s:2:"hu";s:100:"Linkek kezelése a navigációs menükben és a navigációs csoportok kezelése, amikhez tartoznak.";s:2:"se";s:33:"Hantera länkar och länkgrupper.";}', 0, 0, 1, 'design', 1, 1, 1, 1344595496),
(10, 'a:23:{s:2:"en";s:5:"Pages";s:2:"ar";s:14:"الصفحات";s:2:"br";s:8:"Páginas";s:2:"pt";s:8:"Páginas";s:2:"cs";s:8:"Stránky";s:2:"da";s:5:"Sider";s:2:"de";s:6:"Seiten";s:2:"el";s:14:"Σελίδες";s:2:"es";s:8:"Páginas";s:2:"fi";s:5:"Sivut";s:2:"fr";s:5:"Pages";s:2:"he";s:8:"דפים";s:2:"id";s:7:"Halaman";s:2:"it";s:6:"Pagine";s:2:"lt";s:9:"Puslapiai";s:2:"nl";s:13:"Pagina&apos;s";s:2:"pl";s:6:"Strony";s:2:"ru";s:16:"Страницы";s:2:"sl";s:6:"Strani";s:2:"zh";s:6:"頁面";s:2:"hu";s:7:"Oldalak";s:2:"th";s:21:"หน้าเพจ";s:2:"se";s:5:"Sidor";}', 'pages', '2.0', NULL, 'a:23:{s:2:"en";s:55:"Add custom pages to the site with any content you want.";s:2:"ar";s:99:"إضافة صفحات مُخصّصة إلى الموقع تحتوي أية مُحتوى تريده.";s:2:"br";s:82:"Adicionar páginas personalizadas ao site com qualquer conteúdo que você queira.";s:2:"pt";s:86:"Adicionar páginas personalizadas ao seu site com qualquer conteúdo que você queira.";s:2:"cs";s:74:"Přidávejte vlastní stránky na web s jakýmkoliv obsahem budete chtít.";s:2:"da";s:71:"Tilføj brugerdefinerede sider til dit site med det indhold du ønsker.";s:2:"de";s:49:"Füge eigene Seiten mit anpassbaren Inhalt hinzu.";s:2:"el";s:152:"Προσθέστε και επεξεργαστείτε σελίδες στον ιστότοπό σας με ό,τι περιεχόμενο θέλετε.";s:2:"es";s:77:"Agrega páginas customizadas al sitio con cualquier contenido que tu quieras.";s:2:"fi";s:47:"Lisää mitä tahansa sisältöä sivustollesi.";s:2:"fr";s:89:"Permet d''ajouter sur le site des pages personalisées avec le contenu que vous souhaitez.";s:2:"he";s:35:"ניהול דפי תוכן האתר";s:2:"id";s:75:"Menambahkan halaman ke dalam situs dengan konten apapun yang Anda perlukan.";s:2:"it";s:73:"Aggiungi pagine personalizzate al sito con qualsiesi contenuto tu voglia.";s:2:"lt";s:46:"Pridėkite nuosavus puslapius betkokio turinio";s:2:"nl";s:70:"Voeg aangepaste pagina&apos;s met willekeurige inhoud aan de site toe.";s:2:"pl";s:53:"Dodaj własne strony z dowolną treścią do witryny.";s:2:"ru";s:134:"Управление информационными страницами сайта, с произвольным содержимым.";s:2:"sl";s:44:"Dodaj stran s kakršno koli vsebino želite.";s:2:"zh";s:39:"為您的網站新增自定的頁面。";s:2:"th";s:168:"เพิ่มหน้าเว็บที่กำหนดเองไปยังเว็บไซต์ของคุณตามที่ต้องการ";s:2:"hu";s:67:"Saját oldalak hozzáadása a weboldalhoz, akármilyen tartalommal.";s:2:"se";s:39:"Lägg till egna sidor till webbplatsen.";}', 1, 1, 1, 'content', 1, 1, 1, 1344595496),
(11, 'a:23:{s:2:"en";s:11:"Permissions";s:2:"ar";s:18:"الصلاحيات";s:2:"br";s:11:"Permissões";s:2:"pt";s:11:"Permissões";s:2:"cs";s:12:"Oprávnění";s:2:"da";s:14:"Adgangskontrol";s:2:"de";s:14:"Zugriffsrechte";s:2:"el";s:20:"Δικαιώματα";s:2:"es";s:8:"Permisos";s:2:"fi";s:16:"Käyttöoikeudet";s:2:"fr";s:11:"Permissions";s:2:"he";s:12:"הרשאות";s:2:"id";s:9:"Perizinan";s:2:"it";s:8:"Permessi";s:2:"lt";s:7:"Teisės";s:2:"nl";s:15:"Toegangsrechten";s:2:"pl";s:11:"Uprawnienia";s:2:"ru";s:25:"Права доступа";s:2:"sl";s:10:"Dovoljenja";s:2:"zh";s:6:"權限";s:2:"hu";s:14:"Jogosultságok";s:2:"th";s:18:"สิทธิ์";s:2:"se";s:13:"Behörigheter";}', 'permissions', '0.6', NULL, 'a:23:{s:2:"en";s:68:"Control what type of users can see certain sections within the site.";s:2:"ar";s:127:"التحكم بإعطاء الصلاحيات للمستخدمين للوصول إلى أقسام الموقع المختلفة.";s:2:"br";s:68:"Controle quais tipos de usuários podem ver certas seções no site.";s:2:"pt";s:75:"Controle quais os tipos de utilizadores podem ver certas secções no site.";s:2:"cs";s:93:"Spravujte oprávnění pro jednotlivé typy uživatelů a ke kterým sekcím mají přístup.";s:2:"da";s:72:"Kontroller hvilken type brugere der kan se bestemte sektioner på sitet.";s:2:"de";s:70:"Regelt welche Art von Benutzer welche Sektion in der Seite sehen kann.";s:2:"el";s:180:"Ελέγξτε τα δικαιώματα χρηστών και ομάδων χρηστών όσο αφορά σε διάφορες λειτουργίες του ιστοτόπου.";s:2:"es";s:81:"Controla que tipo de usuarios pueden ver secciones específicas dentro del sitio.";s:2:"fi";s:72:"Hallitse minkä tyyppisiin osioihin käyttäjät pääsevät sivustolla.";s:2:"fr";s:104:"Permet de définir les autorisations des groupes d''utilisateurs pour afficher les différentes sections.";s:2:"he";s:75:"ניהול הרשאות כניסה לאיזורים מסוימים באתר";s:2:"id";s:76:"Mengontrol tipe pengguna mana yang dapat mengakses suatu bagian dalam situs.";s:2:"it";s:78:"Controlla che tipo di utenti posssono accedere a determinate sezioni del sito.";s:2:"lt";s:72:"Kontroliuokite kokio tipo varotojai kokią dalį puslapio gali pasiekti.";s:2:"nl";s:71:"Bepaal welke typen gebruikers toegang hebben tot gedeeltes van de site.";s:2:"pl";s:79:"Ustaw, którzy użytkownicy mogą mieć dostęp do odpowiednich sekcji witryny.";s:2:"ru";s:209:"Управление правами доступа, ограничение доступа определённых групп пользователей к произвольным разделам сайта.";s:2:"sl";s:85:"Uredite dovoljenja kateri tip uporabnika lahko vidi določena področja vaše strani.";s:2:"zh";s:81:"用來控制不同類別的用戶，設定其瀏覽特定網站內容的權限。";s:2:"hu";s:129:"A felhasználók felügyelet alatt tartására, hogy milyen típusú felhasználók, mit láthatnak, mely szakaszain az oldalnak.";s:2:"th";s:117:"ควบคุมว่าผู้ใช้งานจะเห็นหมวดหมู่ไหนบ้าง";s:2:"se";s:27:"Hantera gruppbehörigheter.";}', 0, 0, 1, 'users', 1, 1, 1, 1344595496),
(13, 'a:23:{s:2:"en";s:8:"Settings";s:2:"ar";s:18:"الإعدادات";s:2:"br";s:15:"Configurações";s:2:"pt";s:15:"Configurações";s:2:"cs";s:10:"Nastavení";s:2:"da";s:13:"Indstillinger";s:2:"de";s:13:"Einstellungen";s:2:"el";s:18:"Ρυθμίσεις";s:2:"es";s:15:"Configuraciones";s:2:"fi";s:9:"Asetukset";s:2:"fr";s:11:"Paramètres";s:2:"he";s:12:"הגדרות";s:2:"id";s:10:"Pengaturan";s:2:"it";s:12:"Impostazioni";s:2:"lt";s:10:"Nustatymai";s:2:"nl";s:12:"Instellingen";s:2:"pl";s:10:"Ustawienia";s:2:"ru";s:18:"Настройки";s:2:"sl";s:10:"Nastavitve";s:2:"zh";s:12:"網站設定";s:2:"hu";s:14:"Beállítások";s:2:"th";s:21:"ตั้งค่า";s:2:"se";s:14:"Inställningar";}', 'settings', '1.0', NULL, 'a:23:{s:2:"en";s:89:"Allows administrators to update settings like Site Name, messages and email address, etc.";s:2:"ar";s:161:"تمكن المدراء من تحديث الإعدادات كإسم الموقع، والرسائل وعناوين البريد الإلكتروني، .. إلخ.";s:2:"br";s:120:"Permite com que administradores e a equipe consigam trocar as configurações do website incluindo o nome e descrição.";s:2:"pt";s:113:"Permite com que os administradores consigam alterar as configurações do website incluindo o nome e descrição.";s:2:"cs";s:102:"Umožňuje administrátorům měnit nastavení webu jako jeho jméno, zprávy a emailovou adresu apod.";s:2:"da";s:90:"Lader administratorer opdatere indstillinger som sidenavn, beskeder og email adresse, etc.";s:2:"de";s:92:"Erlaubt es Administratoren die Einstellungen der Seite wie Name und Beschreibung zu ändern.";s:2:"el";s:230:"Επιτρέπει στους διαχειριστές να τροποποιήσουν ρυθμίσεις όπως το Όνομα του Ιστοτόπου, τα μηνύματα και τις διευθύνσεις email, κ.α.";s:2:"es";s:131:"Permite a los administradores y al personal configurar los detalles del sitio como el nombre del sitio y la descripción del mismo.";s:2:"fi";s:105:"Mahdollistaa sivuston asetusten muokkaamisen, kuten sivuston nimen, viestit ja sähköpostiosoitteet yms.";s:2:"fr";s:105:"Permet aux admistrateurs et au personnel de modifier les paramètres du site : nom du site et description";s:2:"he";s:116:"ניהול הגדרות שונות של האתר כגון: שם האתר, הודעות, כתובות דואר וכו";s:2:"id";s:112:"Memungkinkan administrator untuk dapat memperbaharui pengaturan seperti nama situs, pesan dan alamat email, dsb.";s:2:"it";s:109:"Permette agli amministratori di aggiornare impostazioni quali Nome del Sito, messaggi e indirizzo email, etc.";s:2:"lt";s:104:"Leidžia administratoriams keisti puslapio vavadinimą, žinutes, administratoriaus el. pašta ir kitą.";s:2:"nl";s:114:"Maakt het administratoren en medewerkers mogelijk om websiteinstellingen zoals naam en beschrijving te veranderen.";s:2:"pl";s:103:"Umożliwia administratorom zmianę ustawień strony jak nazwa strony, opis, e-mail administratora, itd.";s:2:"ru";s:135:"Управление настройками сайта - Имя сайта, сообщения, почтовые адреса и т.п.";s:2:"sl";s:98:"Dovoljuje administratorjem posodobitev nastavitev kot je Ime strani, sporočil, email naslova itd.";s:2:"zh";s:99:"網站管理者可更新的重要網站設定。例如：網站名稱、訊息、電子郵件等。";s:2:"hu";s:125:"Lehetővé teszi az adminok számára a beállítások frissítését, mint a weboldal neve, üzenetek, e-mail címek, stb...";s:2:"th";s:232:"ให้ผู้ดูแลระบบสามารถปรับปรุงการตั้งค่าเช่นชื่อเว็บไซต์ ข้อความและอีเมล์เป็นต้น";s:2:"se";s:84:"Administratören kan uppdatera webbplatsens titel, meddelanden och E-postadress etc.";}', 1, 0, 1, 'administration', 1, 1, 1, 1344595496),
(16, 'a:19:{s:2:"en";s:15:"Email Templates";s:2:"ar";s:48:"قوالب الرسائل الإلكترونية";s:2:"br";s:17:"Modelos de e-mail";s:2:"pt";s:17:"Modelos de e-mail";s:2:"da";s:16:"Email skabeloner";s:2:"el";s:22:"Δυναμικά email";s:2:"es";s:19:"Plantillas de email";s:2:"fr";s:17:"Modèles d''emails";s:2:"he";s:12:"תבניות";s:2:"id";s:14:"Template Email";s:2:"lt";s:22:"El. laiškų šablonai";s:2:"nl";s:15:"Email sjablonen";s:2:"ru";s:25:"Шаблоны почты";s:2:"sl";s:14:"Email predloge";s:2:"zh";s:12:"郵件範本";s:2:"hu";s:15:"E-mail sablonok";s:2:"fi";s:25:"Sähköposti viestipohjat";s:2:"th";s:33:"แม่แบบอีเมล";s:2:"se";s:12:"E-postmallar";}', 'templates', '1.1.0', NULL, 'a:19:{s:2:"en";s:46:"Create, edit, and save dynamic email templates";s:2:"ar";s:97:"أنشئ، عدّل واحفظ قوالب البريد الإلكترني الديناميكية.";s:2:"br";s:51:"Criar, editar e salvar modelos de e-mail dinâmicos";s:2:"pt";s:51:"Criar, editar e salvar modelos de e-mail dinâmicos";s:2:"da";s:49:"Opret, redigér og gem dynamiske emailskabeloner.";s:2:"el";s:108:"Δημιουργήστε, επεξεργαστείτε και αποθηκεύστε δυναμικά email.";s:2:"es";s:54:"Crear, editar y guardar plantillas de email dinámicas";s:2:"fr";s:61:"Créer, éditer et sauver dynamiquement des modèles d''emails";s:2:"he";s:54:"ניהול של תבניות דואר אלקטרוני";s:2:"id";s:55:"Membuat, mengedit, dan menyimpan template email dinamis";s:2:"lt";s:58:"Kurk, tvarkyk ir saugok dinaminius el. laiškų šablonus.";s:2:"nl";s:49:"Maak, bewerk, en beheer dynamische emailsjablonen";s:2:"ru";s:127:"Создавайте, редактируйте и сохраняйте динамические почтовые шаблоны";s:2:"sl";s:52:"Ustvari, uredi in shrani spremenljive email predloge";s:2:"zh";s:61:"新增、編輯與儲存可顯示動態資料的 email 範本";s:2:"hu";s:63:"Csináld, szerkeszd és mentsd el a dinamikus e-mail sablonokat";s:2:"fi";s:66:"Lisää, muokkaa ja tallenna dynaamisia sähköposti viestipohjia.";s:2:"th";s:129:"การสร้างแก้ไขและบันทึกแม่แบบอีเมลแบบไดนามิก";s:2:"se";s:49:"Skapa, redigera och spara dynamiska E-postmallar.";}', 1, 0, 1, 'design', 1, 1, 1, 1344595496),
(17, 'a:23:{s:2:"en";s:6:"Themes";s:2:"ar";s:14:"السّمات";s:2:"br";s:5:"Temas";s:2:"pt";s:5:"Temas";s:2:"cs";s:14:"Motivy vzhledu";s:2:"da";s:6:"Temaer";s:2:"de";s:6:"Themen";s:2:"el";s:31:"Θέματα Εμφάνισης";s:2:"es";s:5:"Temas";s:2:"fi";s:6:"Teemat";s:2:"fr";s:7:"Thèmes";s:2:"he";s:23:"ערכות נושאים";s:2:"id";s:4:"Tema";s:2:"it";s:4:"Temi";s:2:"lt";s:5:"Temos";s:2:"nl";s:7:"Thema''s";s:2:"pl";s:6:"Motywy";s:2:"ru";s:8:"Темы";s:2:"sl";s:8:"Predloge";s:2:"zh";s:12:"佈景主題";s:2:"hu";s:8:"Sablonok";s:2:"th";s:9:"ธีม";s:2:"se";s:5:"Teman";}', 'themes', '1.0', NULL, 'a:23:{s:2:"en";s:86:"Allows admins and staff to switch themes, upload new themes, and manage theme options.";s:2:"ar";s:170:"تمكّن الإدارة وأعضاء الموقع تغيير سِمة الموقع، وتحميل سمات جديدة وإدارتها بطريقة مرئية سلسة.";s:2:"br";s:125:"Permite aos administradores e membros da equipe fazer upload de novos temas e gerenciá-los através de uma interface visual.";s:2:"pt";s:100:"Permite aos administradores fazer upload de novos temas e geri-los através de uma interface visual.";s:2:"cs";s:106:"Umožňuje administrátorům a dalším osobám měnit vzhled webu, nahrávat nové motivy a spravovat je.";s:2:"da";s:108:"Lader administratore ændre websidens tema, uploade nye temaer og håndtére dem med en mere visual tilgang.";s:2:"de";s:121:"Ermöglicht es dem Administrator das Seiten Thema auszuwählen, neue Themen hochzulanden oder diese visuell zu verwalten.";s:2:"el";s:222:"Επιτρέπει στους διαχειριστές να αλλάξουν το θέμα προβολής του ιστοτόπου να ανεβάσουν νέα θέματα και να τα διαχειριστούν.";s:2:"es";s:132:"Permite a los administradores y miembros del personal cambiar el tema del sitio web, subir nuevos temas y manejar los ya existentes.";s:2:"fi";s:129:"Mahdollistaa sivuston teeman vaihtamisen, uusien teemojen lataamisen ja niiden hallinnoinnin visuaalisella käyttöliittymällä.";s:2:"fr";s:144:"Permet aux administrateurs et au personnel de modifier le thème du site, de charger de nouveaux thèmes et de le gérer de façon plus visuelle";s:2:"he";s:63:"ניהול של ערכות נושאים שונות - עיצוב";s:2:"id";s:104:"Memungkinkan admin dan staff untuk mengubah tema tampilan, mengupload tema baru, dan mengatur opsi tema.";s:2:"it";s:120:"Permette ad amministratori e staff di cambiare il tema del sito, carica nuovi temi e gestiscili in um modo più visuale.";s:2:"lt";s:105:"Leidžiama administratoriams ir personalui keisti puslapio temą, įkraunant naują temą ir valdyti ją.";s:2:"nl";s:153:"Maakt het voor administratoren en medewerkers mogelijk om het thema van de website te wijzigen, nieuwe thema&apos;s te uploaden en ze visueel te beheren.";s:2:"pl";s:100:"Umożliwia administratorowi zmianę motywu strony, wgrywanie nowych motywów oraz zarządzanie nimi.";s:2:"ru";s:102:"Управление темами оформления сайта, загрузка новых тем.";s:2:"sl";s:133:"Dovoljuje adminom in osebju spremembo izgleda spletne strani, namestitev novega izgleda in urejanja le tega v bolj vizualnem pristopu";s:2:"zh";s:108:"讓管理者可以更改網站顯示風貌，以視覺化的操作上傳並管理這些網站佈景主題。";s:2:"th";s:219:"ช่วยให้ผู้ดูแลระบบสามารถอัปโหลดรูปแบบใหม่และการจัดการตัวเลือกชุดรูปแบบได้";s:2:"hu";s:107:"Az adminok megváltoztathatják az oldal kinézetét, feltölthetnek új kinézeteket és kezelhetik őket.";s:2:"se";s:94:"Hantera webbplatsens utseende genom teman, ladda upp nya teman och hantera temainställningar.";}', 0, 0, 1, 'design', 1, 1, 1, 1344595496),
(21, 'a:23:{s:2:"en";s:5:"Users";s:2:"ar";s:20:"المستخدمون";s:2:"br";s:9:"Usuários";s:2:"pt";s:12:"Utilizadores";s:2:"cs";s:11:"Uživatelé";s:2:"da";s:7:"Brugere";s:2:"de";s:8:"Benutzer";s:2:"el";s:14:"Χρήστες";s:2:"es";s:8:"Usuarios";s:2:"fi";s:12:"Käyttäjät";s:2:"fr";s:12:"Utilisateurs";s:2:"he";s:14:"משתמשים";s:2:"id";s:8:"Pengguna";s:2:"it";s:6:"Utenti";s:2:"lt";s:10:"Vartotojai";s:2:"nl";s:10:"Gebruikers";s:2:"pl";s:12:"Użytkownicy";s:2:"ru";s:24:"Пользователи";s:2:"sl";s:10:"Uporabniki";s:2:"zh";s:6:"用戶";s:2:"hu";s:14:"Felhasználók";s:2:"th";s:27:"ผู้ใช้งาน";s:2:"se";s:10:"Användare";}', 'users', '0.9', NULL, 'a:23:{s:2:"en";s:81:"Let users register and log in to the site, and manage them via the control panel.";s:2:"ar";s:133:"تمكين المستخدمين من التسجيل والدخول إلى الموقع، وإدارتهم من لوحة التحكم.";s:2:"br";s:125:"Permite com que usuários se registrem e entrem no site e também que eles sejam gerenciáveis apartir do painel de controle.";s:2:"pt";s:125:"Permite com que os utilizadores se registem e entrem no site e também que eles sejam geriveis apartir do painel de controlo.";s:2:"cs";s:103:"Umožňuje uživatelům se registrovat a přihlašovat a zároveň jejich správu v Kontrolním panelu.";s:2:"da";s:89:"Lader brugere registrere sig og logge ind på sitet, og håndtér dem via kontrolpanelet.";s:2:"de";s:108:"Erlaube Benutzern das Registrieren und Einloggen auf der Seite und verwalte sie über die Admin-Oberfläche.";s:2:"el";s:208:"Παρέχει λειτουργίες εγγραφής και σύνδεσης στους επισκέπτες. Επίσης από εδώ γίνεται η διαχείριση των λογαριασμών.";s:2:"es";s:138:"Permite el registro de nuevos usuarios quienes podrán loguearse en el sitio. Estos podrán controlarse desde el panel de administración.";s:2:"fi";s:126:"Antaa käyttäjien rekisteröityä ja kirjautua sisään sivustolle sekä mahdollistaa niiden muokkaamisen hallintapaneelista.";s:2:"fr";s:112:"Permet aux utilisateurs de s''enregistrer et de se connecter au site et de les gérer via le panneau de contrôle";s:2:"he";s:62:"ניהול משתמשים: רישום, הפעלה ומחיקה";s:2:"id";s:102:"Memungkinkan pengguna untuk mendaftar dan masuk ke dalam situs, dan mengaturnya melalui control panel.";s:2:"it";s:95:"Fai iscrivere de entrare nel sito gli utenti, e gestiscili attraverso il pannello di controllo.";s:2:"lt";s:106:"Leidžia vartotojams registruotis ir prisijungti prie puslapio, ir valdyti juos per administravimo panele.";s:2:"nl";s:88:"Laat gebruikers registreren en inloggen op de site, en beheer ze via het controlepaneel.";s:2:"pl";s:87:"Pozwól użytkownikom na logowanie się na stronie i zarządzaj nimi za pomocą panelu.";s:2:"ru";s:155:"Управление зарегистрированными пользователями, активирование новых пользователей.";s:2:"sl";s:96:"Dovoli uporabnikom za registracijo in prijavo na strani, urejanje le teh preko nadzorne plošče";s:2:"zh";s:87:"讓用戶可以註冊並登入網站，並且管理者可在控制台內進行管理。";s:2:"th";s:210:"ให้ผู้ใช้ลงทะเบียนและเข้าสู่เว็บไซต์และจัดการกับพวกเขาผ่านทางแผงควบคุม";s:2:"hu";s:120:"Hogy a felhasználók tudjanak az oldalra regisztrálni és belépni, valamint lehessen őket kezelni a vezérlőpulton.";s:2:"se";s:111:"Låt dina besökare registrera sig och logga in på webbplatsen. Hantera sedan användarna via kontrollpanelen.";}', 0, 0, 1, '0', 1, 1, 1, 1344595496);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `mvcms_default_settings`
--

CREATE TABLE IF NOT EXISTS `mvcms_default_settings` (
  `slug` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `type` set('text','textarea','password','select','select-multiple','radio','checkbox') COLLATE utf8_unicode_ci NOT NULL,
  `default` text COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `options` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_required` int(1) NOT NULL,
  `is_gui` int(1) NOT NULL,
  `module` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`slug`),
  UNIQUE KEY `unique_slug` (`slug`),
  KEY `slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `mvcms_default_settings`
--

INSERT INTO `mvcms_default_settings` (`slug`, `title`, `description`, `type`, `default`, `value`, `options`, `is_required`, `is_gui`, `module`, `order`) VALUES
('settings_comments_alowed', 'Włącz komentarze', 'Czy chcesz pozwolić użytkownikom pisać komentarze?', 'radio', '0', '1', '1=Tak|0=Nie', 1, 0, 'comments', 0),
('settings_comments_moderation', 'Moderacja komentarzy', 'Ustaw czy przed pojawieniem się na stronie komentarze<br /> muszą zostać zatwierdzone przez administratora.', 'radio', '1', '1', '1=Tak|0=Nie', 1, 0, 'comments', 0),
('settings_cookie_expire', 'Czas ważności ciasteczek', 'Czas po kórym upława ważność ciasteczek dla Twojej witryny (w dniach).', 'text', '100', '100', '', 0, 0, 'general', 0),
('settings_cookie_path', 'Ścieżka ciasteczek', 'Widoczność ciasteczka będzie niezależna od położenia pliku, jeśli podana <br />została ścieżka \\"/\\".Natomiast domyślnie path przyjmuje wartość ścieżki do strony, <br />z której wysłano żądanie zapisu ciasteczka.', 'text', '/', '/', '', 0, 0, 'general', 0),
('settings_email_contact', 'Email kontaktowy', 'Wszystkie e-maile od użytkowników, gości <br />oraz samej strony internetowej będą kierowane na ten adres.', 'text', 'admin@domena.pl', 'admin@domena.pl', '', 1, 0, 'email', 0),
('settings_email_from_name', 'Nazwa nadawcy wiadomości', 'Ta nazwa będzie nadawcą wszystkich e-maili do użytkowników.', 'text', 'Administrator', 'Administrator', '', 0, 0, 'email', 0),
('settings_email_protocol', 'Protokół serwera', 'Wybierz protokół pocztowy.', 'select', 'EMAIL', 'EMAIL', 'SMTP=SMTP|EMAIL=EMAIL', 1, 0, 'email', 0),
('settings_email_server', 'Email serwera', 'Wszystkie e-maile do użytkowników będą pochodziły z tego adresu.', 'text', '', 'bok@admin.pl', '', 1, 0, 'email', 0),
('settings_email_smtp', 'Adres serwera SMTP', 'Podaj nazwę serwera SMTP.', 'text', '', '', '', 0, 0, 'email', 0),
('settings_email_smtp_port', 'Port serwera SMTP', 'Podaj port serwera SMTP.', 'text', '25', '25', '', 0, 0, 'email', 0),
('settings_email_smtp_username', 'Nazwa użytkownika serwera SMTP', 'Podaj nazwę użytkownika SMTP.', 'text', '', '', '', 0, 0, 'email', 0),
('settings_enable_captcha', 'Włącz weryfikację CAPTCHA', '', 'radio', '0', '0', '1=Tak|0=Nie', 1, 0, 'users', 0),
('settings_guest_timeout', '''Timeout dla gości', 'Timeout gościa w minutach.', 'text', '5', '5', '', 1, 0, 'users', 0),
('settings_max_username_chars', 'Maksymalna długość nazwy użytkownika', 'Maksymalna ilość znaków dla nazwy użytkownika.', 'text', '30', '30', '', 1, 0, 'users', 0),
('settings_meta_subject', 'Meta temat', 'Dwa lub trzy słowa, które będą opisywać tę stronę.', 'text', 'Wpisz tutaj temat Twojego serwisu', 'Wpisz tutaj temat Twojego serwisu', '', 0, 0, 'general', 0),
('settings_min_password_chars', 'Minimalna długość hasła', 'Minimalna ilość znaków dla hasła użytkownika.', 'text', '6', '6', '', 1, 0, 'users', 0),
('settings_min_username_chars', 'Minimalna długość nazwy użytkownika', 'Minimalna ilość znaków dla nazwy użytkownika.', 'text', '5', '5', '', 1, 0, 'users', 0),
('settings_page_service_message', 'Wiadomość serwisowa', 'Kiedy strona jest wyłączona lub gdy wystąpi jakiś poważny problem,<br/> ta wiadomość będzie wyświetlana użytkownikom.', 'textarea', 'Przepraszamy! W chwili obecnej trwa przerwa techniczna. Zapraszamy za jakiś czas.', 'Przepraszamy! W chwili obecnej trwa przerwa techniczna. Zapraszamy za jakiś czas.', '', 1, 0, 'general', 0),
('settings_page_status', 'Status strony', 'Opcja ta pozwala na włączanie i wyłączanie strony <br/>dla zwykłych użytkowników i gości. Przydatna opcja m.in. podczas prowadzenia<br/> prac konserwacyjnych lub wprowadzania usprawnień w serwisie.', 'radio', '1', '1', '1=Otwarta|0=Zamknięta', 1, 0, 'general', 0),
('settings_records_per_page', 'Rekordów na stronę', 'Jak wiele rekordów na stronę powinno być pokazywane w sekcji <br /> aktualności lub innych podobnych modułach?', 'select', '10', '25', '5=5|10=10|25=25|50=50|100=100', 1, 1, 'general', 0),
('settings_site_name', 'Nazwa serwisu', 'Nazwa serwisu dla tytułów stron oraz do użytku w serwisie.', 'text', 'MVCMS - Pierwsza strona', 'asdfjaksfd to jest ajsd f', '', 0, 0, 'general', 0),
('settings_site_slogan', 'Slogan serwisu', 'Slogan serwisu dla tytułów stron oraz do użytku w serwisie.', 'text', 'Wpisz tutaj slogan dla Twojego serwisu', 'Wpisz tutaj slogan dla Twojego serwisu', '', 0, 0, 'general', 0),
('settings_smtp_password', 'Hasło SMTP', 'Podaj hasło do serwera SMTP.', 'password', '', '', '', 0, 0, 'email', 0),
('settings_track_visitors', 'Śledzenie odwiedzających', 'Pozwala rejestrować wizyty aktywnych użytkowników oraz gości<br /> odwiedzających Twoją stronę stronę.', 'radio', '1', '1', '1=Tak|0=Nie', 1, 0, 'users', 0),
('settings_user_activation', 'Email aktywacyjny', 'Wyślij e-mail do administratora strony, kiedy nowy użytkownik po <br />zarejestrowaniu się aktywuje swoje konto. Wyłączenie tej opcji <br />spowoduje, że tylko administratorzy będą mogli aktywować konta użytkowników.', 'radio', '1', '1', '1=Tak|0=Nie', 1, 0, 'users', 0),
('settings_user_registration', 'Pozwól na rejestrację użytkowników', 'Pozwala na rejesrację użytkownika poprzez formularz na Twojej stronie.', 'radio', '0', '0', '1=Tak|0=Nie', 1, 0, 'users', 0),
('settings_user_timeout', 'Timeout dla użytkownika', 'Timeout użytkownika w minutach.', 'text', '10', '10', '', 1, 0, 'users', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `mvcms_gallery_category`
--

CREATE TABLE IF NOT EXISTS `mvcms_gallery_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `date_insert` datetime NOT NULL,
  `username` varchar(20) CHARACTER SET utf8 NOT NULL,
  `acl_role` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1;

--
-- Zrzut danych tabeli `mvcms_gallery_category`
--

INSERT INTO `mvcms_gallery_category` (`id`, `name`, `date_insert`, `username`, `acl_role`) VALUES
(1, 'Nowa galeria', '2012-06-25 15:00:24', '', NULL),
(5, 'testowa', '2013-05-09 08:31:21', 'admin', NULL),
(6, 'testowa galeria', '2013-05-24 11:08:50', 'admin', NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `mvcms_gallery_category_translations`
--

CREATE TABLE IF NOT EXISTS `mvcms_gallery_category_translations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_gallery_category_id` int(11) NOT NULL,
  `category_title` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `category_description` text COLLATE utf8_polish_ci,
  `isVisible` tinyint(1) NOT NULL DEFAULT '1',
  `isVisibleDescription` tinyint(1) NOT NULL DEFAULT '0',
  `date_publish` datetime NOT NULL,
  `date_update` datetime NOT NULL,
  `lang` varchar(2) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

--
-- Zrzut danych tabeli `mvcms_gallery_category_translations`
--

INSERT INTO `mvcms_gallery_category_translations` (`id`, `fk_gallery_category_id`, `category_title`, `category_description`, `isVisible`, `isVisibleDescription`, `date_publish`, `date_update`, `lang`) VALUES
(1, 1, 'Nowa galeria', '', 1, 0, '2012-06-25 15:00:24', '2012-06-25 15:00:24', 'pl'),
(2, 1, 'Nowa galeria', '', 1, 0, '2012-06-25 15:00:24', '2012-06-25 15:00:24', 'en'),
(10, 5, 'testowa', NULL, 1, 0, '2013-05-09 08:31:21', '2013-05-09 08:31:21', 'pl'),
(11, 5, 'testowa', NULL, 1, 0, '2013-05-09 08:31:21', '2013-05-09 08:31:21', 'en'),
(12, 6, 'testowa galeria', NULL, 1, 0, '2013-05-24 11:08:50', '2013-05-24 11:08:50', 'pl'),
(13, 6, 'testowa galeria', NULL, 1, 0, '2013-05-24 11:08:50', '2013-05-24 11:08:50', 'en');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `mvcms_langs`
--

CREATE TABLE IF NOT EXISTS `mvcms_langs` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `symbol` varchar(2) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `name` varchar(128) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `isVisibleInMenu` tinyint(1) NOT NULL DEFAULT '1',
  `isVisibleFlag` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Zrzut danych tabeli `mvcms_langs`
--

INSERT INTO `mvcms_langs` (`id`, `symbol`, `name`, `isActive`, `isVisibleInMenu`, `isVisibleFlag`) VALUES
(1, 'pl', 'Polski', 1, 0, 0),
(2, 'en', 'English', 1, 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `mvcms_menu`
--

CREATE TABLE IF NOT EXISTS `mvcms_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(512) COLLATE utf8_polish_ci NOT NULL,
  `tech_name` varchar(512) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

--
-- Zrzut danych tabeli `mvcms_menu`
--

INSERT INTO `mvcms_menu` (`id`, `name`, `tech_name`) VALUES
(1, 'Menu główne', 'main-menu'),
(12, 'Menu Stopki', 'custom-menu'),
(13, 'Menu Prawe', 'custom-menu'),
(14, 'Menu Lewe 1', 'custom-menu'),
(43, 'Menu dla strony głónej', 'custom-menu'),
(44, 'Nowe menu', 'custom-menu');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `mvcms_menu_pages`
--

CREATE TABLE IF NOT EXISTS `mvcms_menu_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_menu_id` int(11) NOT NULL,
  `fk_page_id` int(11) DEFAULT NULL,
  `page_link` varchar(255) COLLATE utf8_polish_ci NOT NULL DEFAULT 'index.php',
  `lft` int(11) NOT NULL,
  `rgt` int(11) NOT NULL,
  `depth` tinyint(4) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `page_type` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `target` varchar(10) COLLATE utf8_polish_ci NOT NULL DEFAULT '_self',
  `info` varchar(128) COLLATE utf8_polish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

--
-- Zrzut danych tabeli `mvcms_menu_pages`
--

INSERT INTO `mvcms_menu_pages` (`id`, `fk_menu_id`, `fk_page_id`, `page_link`, `lft`, `rgt`, `depth`, `parent`, `page_type`, `target`, `info`) VALUES
(1, 1, 0, 'index.php', 1, 14, 0, NULL, 'rootpage', '_self', 'root'),
(208, 1, 35, 'index.php?pid=35', 8, 9, 1, 0, 'page', '_self', ''),
(209, 12, 0, 'index.php', 1, 10, 0, NULL, 'rootpage', '_self', 'root'),
(210, 12, 35, 'index.php?pid=35', 8, 9, 1, 0, 'page', '_self', ''),
(211, 12, NULL, 'http://google.pl', 2, 5, 1, 0, 'link', '_self', 'customlink'),
(212, 1, 36, 'index.php?pid=36', 12, 13, 1, 0, 'page', '_self', ''),
(213, 1, 37, 'index.php?pid=37', 2, 5, 1, 0, 'page', '_self', ''),
(214, 1, 38, 'index.php?pid=38', 6, 7, 1, 0, 'page', '_self', ''),
(215, 1, 39, 'index.php?pid=39', 3, 4, 2, 213, 'page', '_self', ''),
(216, 13, 0, 'index.php', 1, 10, 0, 0, 'rootpage', '_self', 'root'),
(217, 1, NULL, 'http://gggg', 10, 11, 1, 0, 'link', '_self', 'customlink'),
(218, 14, 0, 'index.php', 1, 10, 0, 0, 'rootpage', '_self', 'root'),
(220, 13, 39, 'index.php?pid=39', 2, 3, 1, 0, 'page', '_self', ''),
(221, 14, 35, 'index.php?pid=35', 2, 3, 1, 0, 'page', '_self', ''),
(223, 14, 39, 'index.php?pid=39', 4, 5, 1, 0, 'page', '_self', ''),
(224, 14, 35, 'index.php?pid=35', 6, 7, 1, 0, 'page', '_self', ''),
(227, 14, 40, 'index.php?pid=40', 8, 9, 1, 0, 'page', '_self', ''),
(242, 12, NULL, 'http://google.pl', 3, 4, 2, 211, 'link', '_blank', 'customlink'),
(243, 12, 88, 'http://localhost/mvcms/page/88', 6, 7, 1, 0, 'page', '_self', 'customlink'),
(251, 13, 96, 'http://localhost/mvcms/page/96', 4, 5, 1, 216, 'page', '_self', 'page'),
(252, 13, 91, 'http://localhost/mvcms/page/91', 6, 7, 1, 216, 'page', '_self', 'page'),
(275, 13, 89, 'http://localhost/mvcms/page/89', 8, 9, 1, 216, 'page', '_self', 'page'),
(281, 43, 0, '/', 1, 12, 0, NULL, 'rootpage', '', 'root'),
(282, 43, 88, 'http://localhost/mvcms/page/88', 2, 3, 1, 281, 'page', '_self', 'page'),
(283, 43, 89, 'http://localhost/mvcms/page/89', 4, 5, 1, 281, 'page', '_self', 'page'),
(284, 43, 90, 'http://localhost/mvcms/page/90', 6, 7, 1, 281, 'page', '_self', 'page'),
(285, 43, 91, 'http://localhost/mvcms/page/91', 8, 9, 1, 281, 'page', '_self', 'page'),
(286, 43, 92, 'http://localhost/mvcms/page/92', 10, 11, 1, 281, 'page', '_self', 'page'),
(287, 44, 0, '/', 1, 2, 0, NULL, 'rootpage', '', 'root');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `mvcms_menu_pages_translations`
--

CREATE TABLE IF NOT EXISTS `mvcms_menu_pages_translations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_menu_pages_id` int(11) NOT NULL,
  `oryginal_name` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `name` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `title` varchar(256) COLLATE utf8_polish_ci NOT NULL,
  `menu_ln` varchar(2) CHARACTER SET utf8 NOT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

--
-- Zrzut danych tabeli `mvcms_menu_pages_translations`
--

INSERT INTO `mvcms_menu_pages_translations` (`id`, `fk_menu_pages_id`, `oryginal_name`, `name`, `title`, `menu_ln`, `is_visible`) VALUES
(357, 208, '', 'Kontakt', 'Kontakt z nami', 'pl', 1),
(358, 208, '', 'Kontakt', 'Kontakt z nami', 'en', 1),
(359, 210, '', 'Kontakt', 'Kontakt z nami', 'pl', 1),
(360, 210, '', 'Kontakt', 'Kontakt z nami', 'en', 1),
(361, 211, '', 'Google', 'Google', 'pl', 1),
(362, 211, '', 'Google en', 'Google en', 'en', 1),
(363, 212, '', 'Witamy', 'Witamy', 'pl', 1),
(364, 212, '', 'Witamy', 'Witamy', 'en', 1),
(365, 213, '', 'Rodzaje badań', 'Rodzaje badań', 'pl', 1),
(366, 213, '', 'Wyniki', 'Rodzaje badań', 'en', 1),
(367, 214, '', 'Aktualności', 'Aktualności', 'pl', 1),
(368, 214, '', 'news', 'Aktualności', 'en', 1),
(369, 215, '', 'galeria', 'Galeria', 'pl', 1),
(370, 215, '', 'galeria', 'Galeria', 'en', 1),
(371, 217, '', 'asdfasdf', 'asdfasdf', 'pl', 0),
(372, 217, '', 'asdfasdf', 'asdfasdf', 'en', 1),
(373, 220, '', 'galeria', 'Galeria', 'pl', 1),
(374, 220, '', 'galeria', 'Galeria', 'en', 1),
(375, 221, '', 'Kontakt', 'Kontakt z nami', 'pl', 1),
(376, 221, '', 'Kontakt', 'Kontakt z nami', 'en', 1),
(379, 223, '', 'galeria', 'Galeria', 'pl', 1),
(380, 223, '', 'galeria', 'Galeria', 'en', 1),
(381, 224, '', 'Kontakt', 'Kontakt z nami', 'pl', 1),
(382, 224, '', 'Kontakt', 'Kontakt z nami', 'en', 1),
(387, 227, '', 'formularz', 'Formularz', 'pl', 1),
(388, 227, '', 'formularz', 'Formularz', 'en', 1),
(391, 242, 'google', 'google z taką strasznie długą etykietą do zapisania', 'google. pl tyt', 'pl', 1),
(392, 242, 'google', 'google', 'google. pl', 'en', 1),
(393, 243, 'Strona testowa', 'Strona testowa', 'Strona testowa', 'pl', 1),
(394, 243, 'Strona testowa', 'Strona testowa', 'Strona testowa', 'en', 1),
(407, 251, 'strona z dzisiaj', 'strona z dzisiaj', 'strona z dzisiaj', 'pl', 1),
(408, 251, 'strona z dzisiaj', 'strona z dzisiaj', 'strona z dzisiaj', 'en', 1),
(409, 252, 'kolejna', 'kolejna', 'kolejna', 'pl', 1),
(410, 252, 'kolejna', 'kolejna', 'kolejna', 'en', 1),
(435, 275, 'Druga strona', 'Druga strona', 'Druga strona', 'pl', 1),
(436, 275, 'Druga strona', 'Druga strona', 'Druga strona', 'en', 1),
(447, 282, 'Strona testowa', 'Strona testowa', 'Strona testowa', 'pl', 1),
(448, 282, 'Strona testowa', 'Strona testowa', 'Strona testowa', 'en', 1),
(449, 283, 'Druga strona', 'Druga strona', 'Druga strona', 'pl', 1),
(450, 283, 'Druga strona', 'Druga strona', 'Druga strona', 'en', 1),
(451, 284, 'jeszcze jeden test', 'jeszcze jeden test', 'jeszcze jeden test', 'pl', 1),
(452, 284, 'jeszcze jeden test', 'jeszcze jeden test', 'jeszcze jeden test', 'en', 1),
(453, 285, 'kolejna', 'kolejna', 'kolejna', 'pl', 1),
(454, 285, 'kolejna', 'kolejna', 'kolejna', 'en', 1),
(455, 286, 'i jeszcze jedna', 'i jeszcze jedna', 'i jeszcze jedna', 'pl', 1),
(456, 286, 'i jeszcze jedna', 'i jeszcze jedna', 'i jeszcze jedna', 'en', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `mvcms_news`
--

CREATE TABLE IF NOT EXISTS `mvcms_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `date_insert` datetime NOT NULL,
  `username` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `acl_role` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1;

--
-- Zrzut danych tabeli `mvcms_news`
--

INSERT INTO `mvcms_news` (`id`, `name`, `date_insert`, `username`, `acl_role`) VALUES
(47, 'dddddddddddddddd', '2012-08-13 13:39:16', 'admin', '0'),
(49, 'ssssssssssssss', '2012-08-13 13:40:56', 'admin', '0'),
(51, 'Artykuł testowy', '2012-08-17 08:01:19', 'admin', '4');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `mvcms_news_category`
--

CREATE TABLE IF NOT EXISTS `mvcms_news_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `date_insert` datetime NOT NULL,
  `username` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `acl_role` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1;

--
-- Zrzut danych tabeli `mvcms_news_category`
--

INSERT INTO `mvcms_news_category` (`id`, `name`, `date_insert`, `username`, `acl_role`) VALUES
(14, 'Kategoria domyślna', '2012-02-29 13:18:02', '', '4');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `mvcms_news_category_translations`
--

CREATE TABLE IF NOT EXISTS `mvcms_news_category_translations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_news_category_id` int(11) NOT NULL,
  `category_title` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `category_description` text COLLATE utf8_polish_ci,
  `is_visible` tinyint(1) NOT NULL DEFAULT '1',
  `date_publish` datetime NOT NULL,
  `date_update` datetime NOT NULL,
  `cat_ln` varchar(2) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

--
-- Zrzut danych tabeli `mvcms_news_category_translations`
--

INSERT INTO `mvcms_news_category_translations` (`id`, `fk_news_category_id`, `category_title`, `category_description`, `is_visible`, `date_publish`, `date_update`, `cat_ln`) VALUES
(17, 14, 'Kategoria domyślna', '<p>\r\n	Opis kategorii</p>\r\n', 1, '2012-08-16 00:00:00', '2012-08-16 11:17:35', 'pl'),
(18, 14, 'Kategoria domyślna', '<p>\r\n	Opis kategorii</p>\r\n', 1, '2012-02-29 13:18:02', '2012-02-29 13:18:02', 'en');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `mvcms_news_translations`
--

CREATE TABLE IF NOT EXISTS `mvcms_news_translations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_news_id` int(11) NOT NULL,
  `fk_category_id` int(11) NOT NULL,
  `news_slug` varchar(128) COLLATE utf8_persian_ci NOT NULL,
  `news_title` varchar(128) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `news_precontent` text CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `news_content` text CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `news_meta_keywords` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `date_publish` datetime NOT NULL,
  `date_update` datetime NOT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT '1',
  `news_ln` varchar(2) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `news_comments` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=1 ;

--
-- Zrzut danych tabeli `mvcms_news_translations`
--

INSERT INTO `mvcms_news_translations` (`id`, `fk_news_id`, `fk_category_id`, `news_slug`, `news_title`, `news_precontent`, `news_content`, `news_meta_keywords`, `date_publish`, `date_update`, `is_visible`, `news_ln`, `news_comments`) VALUES
(76, 47, 14, 'dddddddddddddddd33', 'dddddddddddddddd33', '', '', '', '2012-08-16 00:00:00', '2012-08-16 14:19:07', 1, 'pl', 0),
(77, 47, 14, 'dddddddddddddddd', 'dddddddddddddddd', '', '', '', '2012-08-14 00:00:00', '2012-08-14 10:26:41', 1, 'en', 0),
(80, 49, 14, 'ssssssssssssss', 'ssssssssssssss', '', '', '', '2012-08-16 00:00:00', '2012-08-16 12:33:13', 1, 'pl', 0),
(81, 49, 14, 'ssssssssssssss', 'ssssssssssssss', '', '', '', '2012-08-16 00:00:00', '2012-08-16 12:33:24', 1, 'en', 0),
(84, 51, 14, 'artykul-testowy', 'Artykuł testowy', '', '', '', '2012-08-17 00:00:00', '2012-08-17 08:01:19', 1, 'pl', 0),
(85, 51, 14, 'artykul-testowy', 'Artykuł testowy', '', '', '', '2012-08-17 00:00:00', '2012-08-17 08:01:19', 1, 'en', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `mvcms_pages`
--

CREATE TABLE IF NOT EXISTS `mvcms_pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `date_insert` datetime NOT NULL,
  `date_update` datetime NOT NULL,
  `username` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `acl_role` varchar(20) COLLATE utf8_polish_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `page_module_options` varchar(1024) COLLATE utf8_polish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=97 ;

--
-- Zrzut danych tabeli `mvcms_pages`
--

INSERT INTO `mvcms_pages` (`id`, `name`, `date_insert`, `date_update`, `username`, `acl_role`, `is_active`, `page_module_options`) VALUES
(88, 'Strona testowa', '2012-08-03 14:17:53', '2013-05-08 12:33:48', 'admin', '3|4', 1, 'a:4:{i:16;s:1:"1";i:17;s:2:"12";i:18;s:2:"14";i:19;s:2:"13";}'),
(89, 'Druga strona', '2012-08-03 14:19:06', '2012-08-03 14:19:06', 'admin', '0', 1, NULL),
(90, 'jeszcze jeden test', '2012-08-03 14:21:32', '2012-08-03 14:21:32', 'admin', '0', 1, NULL),
(91, 'kolejna', '2012-08-03 14:22:46', '2012-08-03 14:22:46', 'admin', '0', 1, NULL),
(92, 'i jeszcze jedna', '2012-08-03 14:24:16', '2012-08-03 14:24:16', 'admin', '0', 1, NULL),
(93, 'a teraz nie glowna', '2012-08-03 14:24:29', '2012-08-03 15:08:33', 'admin', '0', 1, NULL),
(94, 'i ostatni test', '2012-08-03 14:24:47', '2012-08-03 14:24:47', 'admin', '0', 1, NULL),
(96, 'strona z dzisiaj', '2012-08-06 10:52:50', '2012-08-06 10:52:50', 'admin', '0', 0, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `mvcms_page_translations`
--

CREATE TABLE IF NOT EXISTS `mvcms_page_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fk_page_id` int(10) unsigned NOT NULL,
  `page_title` varchar(128) COLLATE utf8_polish_ci DEFAULT NULL,
  `page_slug` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `page_ln` varchar(2) COLLATE utf8_polish_ci NOT NULL DEFAULT 'pl',
  `is_visible` tinyint(1) NOT NULL DEFAULT '1',
  `is_main` tinyint(1) NOT NULL DEFAULT '0',
  `date_publish` datetime NOT NULL,
  `date_update` datetime NOT NULL,
  `page_precontent` text COLLATE utf8_polish_ci,
  `page_content` text COLLATE utf8_polish_ci,
  `page_meta_title` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL,
  `page_meta_keywords` text COLLATE utf8_polish_ci NOT NULL,
  `page_meta_description` text COLLATE utf8_polish_ci NOT NULL,
  `page_comments` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=174 ;

--
-- Zrzut danych tabeli `mvcms_page_translations`
--

INSERT INTO `mvcms_page_translations` (`id`, `fk_page_id`, `page_title`, `page_slug`, `page_ln`, `is_visible`, `is_main`, `date_publish`, `date_update`, `page_precontent`, `page_content`, `page_meta_title`, `page_meta_keywords`, `page_meta_description`, `page_comments`) VALUES
(156, 88, 'Strona testowa', 'strona-testowa', 'pl', 1, 0, '0000-00-00 00:00:00', '2013-05-08 12:33:48', '', '', '', '', '', 1),
(157, 88, 'Test site', 'test-site', 'en', 1, 0, '2012-08-07 00:00:00', '2012-08-07 10:05:23', '', '', '', '', '', 1),
(158, 89, 'Druga strona', 'druga-strona', 'pl', 1, 0, '2012-08-03 00:00:00', '2012-08-03 14:19:06', '', '', '', '', '', 0),
(159, 89, 'Druga strona', 'druga-strona', 'en', 1, 0, '2012-08-03 00:00:00', '2012-08-03 14:19:06', '', '', '', '', '', 0),
(160, 90, 'jeszcze jeden test', 'jeszcze-jeden-test', 'pl', 1, 0, '2012-08-03 00:00:00', '2012-08-03 14:21:32', '', '', '', '', '', 0),
(161, 90, 'jeszcze jeden test', 'jeszcze-jeden-test', 'en', 1, 0, '2012-08-03 00:00:00', '2012-08-03 14:21:32', '', '', '', '', '', 0),
(162, 91, 'kolejna', 'kolejna', 'pl', 1, 0, '2012-08-03 00:00:00', '2012-08-03 14:22:46', '', '', '', '', '', 0),
(163, 91, 'kolejna', 'kolejna', 'en', 1, 0, '2012-08-03 00:00:00', '2012-08-03 14:22:46', '', '', '', '', '', 0),
(164, 92, 'i jeszcze jedna', 'i-jeszcze-jedna', 'pl', 1, 0, '2012-08-03 00:00:00', '2012-08-03 14:24:16', '', '', '', '', '', 0),
(165, 92, 'i jeszcze jedna', 'i-jeszcze-jedna', 'en', 1, 0, '2012-08-03 00:00:00', '2012-08-03 14:24:16', '', '', '', '', '', 0),
(166, 93, 'a teraz nie glowna', 'a-teraz-nie-glowna', 'pl', 0, 0, '2012-08-03 00:00:00', '2012-08-03 15:08:33', '', '', '', '', '', 1),
(167, 93, 'a teraz nie glowna', 'a-teraz-nie-glowna', 'en', 1, 0, '2012-08-03 00:00:00', '2012-08-03 14:24:29', '', '', '', '', '', 0),
(168, 94, 'i ostatni test', 'i-ostatni-test', 'pl', 1, 1, '2012-08-03 00:00:00', '2012-08-03 14:24:47', '', '', '', '', '', 0),
(169, 94, 'i ostatni test', 'i-ostatni-test', 'en', 1, 1, '2012-08-03 00:00:00', '2012-08-03 14:24:47', '', '', '', '', '', 0),
(172, 96, 'strona z dzisiaj', 'strona-z-dzisiaj', 'pl', 0, 0, '2012-08-06 00:00:00', '2012-08-06 10:52:50', '', '', '', '', '', 0),
(173, 96, 'strona z dzisiaj', 'strona-z-dzisiaj', 'en', 0, 0, '2012-08-06 00:00:00', '2012-08-06 10:52:50', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `mvcms_templates`
--

CREATE TABLE IF NOT EXISTS `mvcms_templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tech_name` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Zrzut danych tabeli `mvcms_templates`
--

INSERT INTO `mvcms_templates` (`id`, `tech_name`, `name`, `description`) VALUES
(1, 'expateam', 'expateam', 'Szablon dla expateam');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `mvcms_template_modules`
--

CREATE TABLE IF NOT EXISTS `mvcms_template_modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `template_name` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `module_type` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `module_id_attr` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `module_name` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `fk_module_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=20 ;

--
-- Zrzut danych tabeli `mvcms_template_modules`
--

INSERT INTO `mvcms_template_modules` (`id`, `template_name`, `module_type`, `module_id_attr`, `module_name`, `fk_module_id`) VALUES
(1, 'pawlowski', 'menu', 'custom_menu_1', 'Menu Główne', 43),
(2, 'pawlowski', 'menu', 'custom_menu_2', 'Menu Stopki', 1),
(3, 'terapia', 'menu', 'custom_menu_1', 'Menu Główne', 43),
(4, 'terapia', 'menu', 'custom_menu_2', 'Menu Stopki', 1),
(5, 'laboratorium', 'menu', 'custom_menu_1', 'Menu Główne', 43),
(6, 'laboratorium', 'menu', 'custom_menu_2', 'Menu Stopki', 1),
(7, 'expateam', 'menu', 'custom_menu_1', 'Menu Główne', 43),
(8, 'expateam', 'menu', 'custom_menu_2', 'Menu Stopki', 1),
(9, 'expateam', 'menu', 'custom_menu_3', 'Menu Prawe', 1),
(10, 'agrofarm', 'menu', 'custom_menu_1', 'Menu Główne', 43),
(11, 'agrofarm', 'menu', 'custom_menu_2', 'Menu Stopki', 1),
(12, 'pracabezgranic', 'menu', 'custom_menu_1', 'Menu Główne', 43),
(13, 'pracabezgranic', 'menu', 'custom_menu_2', 'Menu Stopki', 1),
(14, 'pracabezgranic', 'menu', 'custom_menu_3', 'Menu Lewe 1', 1),
(15, 'pracabezgranic', 'menu', 'custom_menu_4', 'Menu Lewe 2', 12),
(16, 'zwrotpodatku', 'menu', 'custom_menu_1', 'Menu Główne', 43),
(17, 'zwrotpodatku', 'menu', 'custom_menu_2', 'Menu Stopki', 1),
(18, 'zwrotpodatku', 'menu', 'custom_menu_3', 'Menu Lewe 1', 1),
(19, 'zwrotpodatku', 'menu', 'custom_menu_4', 'Menu Lewe 2', 12);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `mvcms_users`
--

CREATE TABLE IF NOT EXISTS `mvcms_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(40) DEFAULT NULL,
  `firstname` varchar(20) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `lastname` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `usersalt` varchar(8) NOT NULL,
  `userid` varchar(32) DEFAULT NULL,
  `userlevel` tinyint(1) unsigned NOT NULL,
  `user_role` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `timestamp` int(11) unsigned NOT NULL,
  `actkey` varchar(35) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `regdate` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Zrzut danych tabeli `mvcms_users`
--

INSERT INTO `mvcms_users` (`id`, `username`, `password`, `firstname`, `lastname`, `usersalt`, `userid`, `userlevel`, `user_role`, `email`, `timestamp`, `actkey`, `ip`, `regdate`) VALUES
(1, 'admin', '56debb4ccc8e74601de80ed40c089b9e3a9ae68e', 'Daniel', 'Szantar', 'XpmIUwXe', 'ea04cff6df2a1747abcaa5486c1e1f6e', 3, 1, 'eidsza@tlen.pl', 1374574125, 'I7pHII6t1J2x7NJQ', '::1', 1340616079),
(27, 'Danielek', 'e782cfa5c00f5c2fcbafecb0e95bea9c4af43659', 'Daniel', 'Szantar', '8guz5Smm', '0', 3, 5, 'eidsza@tlen.pl', 1346395686, 'xeUVKlxntqd710gZ', '::1', 1346395686),
(29, 'Danielek2', 'b0d7ff096e9b771fe693dfb019774abc9c26473b', 'Daniel', 'Szantar', 'LFmdeNTM', '0', 1, 5, 'eidsza@tlen.pl', 1346396108, 'luC4k5t8BhjaKIF9', '::1', 1346396108),
(30, 'eidsza2', 'ebcbc6f2b1e2123300e8dc6f8df63b0b741a7194', 'Daniel', 'Szantar', 'G9JKOkfm', '26dbf0dada8cdfd9bd0888c9f753ea20', 3, 1, 'eidsza@tlen.pl', 1346764055, 'j5dMdaTZBz4p0nL4', '::1', 1346764028);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `mvcms_user_profile`
--

CREATE TABLE IF NOT EXISTS `mvcms_user_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `fk_state_id` int(11) NOT NULL,
  `fk_area_id` int(11) NOT NULL,
  `department_name` varchar(128) DEFAULT NULL,
  `city_name` varchar(50) DEFAULT NULL,
  `city_code` varchar(6) DEFAULT NULL,
  `streetname` varchar(128) DEFAULT NULL,
  `house_number` varchar(5) DEFAULT NULL,
  `contact_phone` varchar(20) DEFAULT NULL,
  `PESEL` varchar(11) DEFAULT NULL,
  `NIP` varchar(14) DEFAULT NULL,
  `REGON` varchar(14) DEFAULT NULL,
  `contact_email` varchar(30) DEFAULT NULL,
  `website` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Zrzut danych tabeli `mvcms_user_profile`
--

INSERT INTO `mvcms_user_profile` (`id`, `fk_user_id`, `status`, `fk_state_id`, `fk_area_id`, `department_name`, `city_name`, `city_code`, `streetname`, `house_number`, `contact_phone`, `PESEL`, `NIP`, `REGON`, `contact_email`, `website`) VALUES
(1, 26, 2, 1, 25, 'Matrix', 'z', '59-900', 'Bohaterów II AWP', '10A/2', '+48 ', '', '615-128-33-256', '12345678910', 'roman@roman.pl', 'http://www.matrix.pl'),
(2, 27, 1, 1, 25, '', 'Zgorzelec', '59-900', 'Bohaterów II AWP', '10A/2', '+48 723 013 630', '75122012815', '', '', '', ''),
(3, 29, 1, 1, 25, '', 'Zgorzelec', '59-900', '', '', '+48 ', '75122012815', '', '', '', ''),
(4, 30, 1, 1, 1, '', '', '', '', '', '+48 ', '', '', '', '', '');

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `mvcms_country_area`
--
ALTER TABLE `mvcms_country_area`
  ADD CONSTRAINT `area_ibfk_1` FOREIGN KEY (`wid`) REFERENCES `mvcms_country_state` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
