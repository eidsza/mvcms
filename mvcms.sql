-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 31 Lip 2012, 15:04
-- Wersja serwera: 5.1.49
-- Wersja PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `mvcms`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `ecms3_acl_user_permissions`
--

CREATE TABLE IF NOT EXISTS `ecms3_acl_user_permissions` (
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
-- Zrzut danych tabeli `ecms3_acl_user_permissions`
--

INSERT INTO `ecms3_acl_user_permissions` (`id`, `role`, `resource`, `description`, `has_access`, `add`, `modify`, `modify_own`, `delete`, `delete_own`) VALUES
(1, 1, 10, 'Opis uprawnienia', 1, 0, 1, 0, 0, 0),
(2, 1, 5, NULL, 1, 0, 1, 0, 0, 0),
(3, 1, 17, 'Budowowanie i edycja galerii zdjęć', 1, 0, 1, 0, 0, 0),
(4, 1, 8, 'Widok listy stron', 1, 0, 1, 0, -1, 0),
(5, 1, 9, 'Zarządzanie stronami', 1, 0, 1, 0, 0, 0),
(6, 1, 18, 'Dodawanie i edycja zdjęć w galerii', 1, 0, 0, 0, 0, 0),
(9, 2, 1, 'Dostęp do menu ', 1, -1, -1, -1, -1, -1),
(10, 2, 2, 'Dostęp do menu ', 1, -1, -1, -1, -1, -1),
(11, 2, 3, 'Dostęp do menu ', 1, -1, -1, -1, -1, -1),
(12, 2, 16, 'Budowanie zawartości menu ', 1, 0, 0, 0, 0, 0),
(13, 2, 17, 'Budowowanie i edycja galerii zdjęć', 1, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `ecms3_acl_user_resources`
--

CREATE TABLE IF NOT EXISTS `ecms3_acl_user_resources` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `parentId` int(11) DEFAULT NULL,
  `default` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Zrzut danych tabeli `ecms3_acl_user_resources`
--

INSERT INTO `ecms3_acl_user_resources` (`id`, `name`, `description`, `parentId`, `default`) VALUES
(1, 'admin:mainmenu:content', 'Dostęp do menu "Treść"', NULL, '1:-1:-1:-1:-1:-1'),
(2, 'admin:mainmenu:content:pages', 'Dostęp do menu "Treść/Strony"', NULL, '1:-1:-1:-1:-1:-1'),
(3, 'admin:mainmenu:content:news', 'Dostęp do menu "Treść/Aktualności"', NULL, '1:-1:-1:-1:-1:-1'),
(4, 'admin:mainmenu:content:catnews', 'Dostęp do menu "Treść/Kategorie dla Aktualności"', NULL, '1:-1:-1:-1:-1:-1'),
(5, 'admin:mainmenu:content:newsletter', 'Dostęp do menu "Treść/Newsletter"', NULL, '1:-1:-1:-1:-1:-1'),
(6, 'admin:mainmenu:gallery', 'Dostęp do menu "Galeria"', NULL, '1:-1:-1:-1:-1:-1'),
(7, 'admin:mainmenu:gallery:gallery', 'Dostęp do menu "Galeria/Galerie"', NULL, '1:-1:-1:-1:-1:-1'),
(8, 'admin:pages:list', 'Widok listy stron', NULL, '1:0:0:0:0:0'),
(9, 'admin:pages:list:manage', 'Zarządzanie stronami', NULL, '1:0:0:0:0:0'),
(10, 'admin:news:list', 'Widok listy aktualności', NULL, '1:0:0:0:0:0'),
(11, 'admin:news:list:manage', 'Zarządzanie aktualnościami', NULL, '1:0:0:0:0:0'),
(12, 'admin:catnews:list', 'Widok listy kategorii aktualności', NULL, '1:0:0:0:0:0'),
(13, 'admin:catnewsnews:list:manage', 'Zarządzanie kategoriami dla aktualności', NULL, '1:0:0:0:0:0'),
(14, 'admin:menu:template_list:manage', 'Przypisywanie dostępnych menu dla wybranego szablonu', NULL, '1:-1:0:0:-1:-1'),
(15, 'admin:menu:tab_menu_list:manage', 'Zarządzanie zakładkami dostępnych menu', NULL, '1:0:0:0:0:0'),
(16, 'admin:menu:content:manage', 'Budowanie zawartości menu ', NULL, '1:0:0:0:0:0'),
(17, 'admin:gallery:list:manage', 'Budowowanie i edycja galerii zdjęć', NULL, '1:0:0:0:0:0'),
(18, 'admin:gallery:picture:manage', 'Dodawanie i edycja zdjęć w galerii', NULL, '1:0:0:0:0:0');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `ecms3_acl_user_roles`
--

CREATE TABLE IF NOT EXISTS `ecms3_acl_user_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `parentId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Zrzut danych tabeli `ecms3_acl_user_roles`
--

INSERT INTO `ecms3_acl_user_roles` (`id`, `name`, `description`, `parentId`) VALUES
(1, 'Administrator', 'Administratorzy stron CMS', NULL),
(2, 'pages/moderator', 'Moderator treści własnych stron', NULL),
(3, 'pages/moderator_own', 'Moderator treści własnych stron', NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `ecms3_acl_user_role_group`
--

CREATE TABLE IF NOT EXISTS `ecms3_acl_user_role_group` (
  `userid` int(11) NOT NULL,
  `roles` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `ecms3_acl_user_role_group`
--

INSERT INTO `ecms3_acl_user_role_group` (`userid`, `roles`) VALUES
(1, '3'),
(19, '3');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `ecms3_active_guests`
--

CREATE TABLE IF NOT EXISTS `ecms3_active_guests` (
  `ip` varchar(15) NOT NULL,
  `timestamp` int(11) unsigned NOT NULL,
  PRIMARY KEY (`ip`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `ecms3_active_guests`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `ecms3_active_users`
--

CREATE TABLE IF NOT EXISTS `ecms3_active_users` (
  `username` varchar(30) NOT NULL,
  `timestamp` int(11) unsigned NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `ecms3_active_users`
--

INSERT INTO `ecms3_active_users` (`username`, `timestamp`) VALUES
('admin', 1343731244);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `ecms3_banned_users`
--

CREATE TABLE IF NOT EXISTS `ecms3_banned_users` (
  `username` varchar(30) NOT NULL,
  `timestamp` int(11) unsigned NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `ecms3_banned_users`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `ecms3_configuration`
--

CREATE TABLE IF NOT EXISTS `ecms3_configuration` (
  `config_name` varchar(20) NOT NULL,
  `config_value` varchar(50) NOT NULL,
  KEY `config_name` (`config_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `ecms3_configuration`
--

INSERT INTO `ecms3_configuration` (`config_name`, `config_value`) VALUES
('ACCOUNT_ACTIVATION', '3'),
('TRACK_VISITORS', '1'),
('max_user_chars', '30'),
('min_user_chars', '5'),
('max_pass_chars', '100'),
('min_pass_chars', '6'),
('EMAIL_FROM_NAME', 'PHP Login Script'),
('EMAIL_FROM_ADDR', 'email@localhost'),
('EMAIL_WELCOME', '0'),
('SITE_NAME', 'PHP Login Script V3'),
('SITE_DESC', 'PHP Login Script'),
('WEB_ROOT', 'http://localhost/login/'),
('ENABLE_CAPTCHA', '0'),
('COOKIE_EXPIRE', '100'),
('COOKIE_PATH', '/'),
('home_page', 'main.php'),
('ALL_LOWERCASE', '0'),
('Version', '3.1'),
('USER_TIMEOUT', '10'),
('GUEST_TIMEOUT', '5'),
('ACCOUNT_ACTIVATION', '3'),
('TRACK_VISITORS', '1'),
('max_user_chars', '30'),
('min_user_chars', '5'),
('max_pass_chars', '100'),
('min_pass_chars', '6'),
('EMAIL_FROM_NAME', 'PHP Login Script'),
('EMAIL_FROM_ADDR', 'email@localhost'),
('EMAIL_WELCOME', '0'),
('SITE_NAME', 'PHP Login Script V3'),
('SITE_DESC', 'PHP Login Script'),
('WEB_ROOT', 'http://localhost/login/'),
('ENABLE_CAPTCHA', '0'),
('COOKIE_EXPIRE', '100'),
('COOKIE_PATH', '/'),
('home_page', 'main.php'),
('ALL_LOWERCASE', '0'),
('Version', '3.1'),
('USER_TIMEOUT', '10'),
('GUEST_TIMEOUT', '5'),
('ACCOUNT_ACTIVATION', '3'),
('TRACK_VISITORS', '1'),
('max_user_chars', '30'),
('min_user_chars', '5'),
('max_pass_chars', '100'),
('min_pass_chars', '6'),
('EMAIL_FROM_NAME', 'PHP Login Script'),
('EMAIL_FROM_ADDR', 'email@localhost'),
('EMAIL_WELCOME', '0'),
('SITE_NAME', 'PHP Login Script V3'),
('SITE_DESC', 'PHP Login Script'),
('WEB_ROOT', 'http://localhost/login/'),
('ENABLE_CAPTCHA', '0'),
('COOKIE_EXPIRE', '100'),
('COOKIE_PATH', '/'),
('home_page', 'main.php'),
('ALL_LOWERCASE', '0'),
('Version', '3.1'),
('USER_TIMEOUT', '10'),
('GUEST_TIMEOUT', '5'),
('ACCOUNT_ACTIVATION', '3'),
('TRACK_VISITORS', '1'),
('max_user_chars', '30'),
('min_user_chars', '5'),
('max_pass_chars', '100'),
('min_pass_chars', '6'),
('EMAIL_FROM_NAME', 'PHP Login Script'),
('EMAIL_FROM_ADDR', 'email@localhost'),
('EMAIL_WELCOME', '0'),
('SITE_NAME', 'PHP Login Script V3'),
('SITE_DESC', 'PHP Login Script'),
('WEB_ROOT', 'http://localhost/login/'),
('ENABLE_CAPTCHA', '0'),
('COOKIE_EXPIRE', '100'),
('COOKIE_PATH', '/'),
('home_page', 'main.php'),
('ALL_LOWERCASE', '0'),
('Version', '3.1'),
('USER_TIMEOUT', '10'),
('GUEST_TIMEOUT', '5'),
('ACCOUNT_ACTIVATION', '3'),
('TRACK_VISITORS', '1'),
('max_user_chars', '30'),
('min_user_chars', '5'),
('max_pass_chars', '100'),
('min_pass_chars', '6'),
('EMAIL_FROM_NAME', 'PHP Login Script'),
('EMAIL_FROM_ADDR', 'email@localhost'),
('EMAIL_WELCOME', '0'),
('SITE_NAME', 'PHP Login Script V3'),
('SITE_DESC', 'PHP Login Script'),
('WEB_ROOT', 'http://localhost/login/'),
('ENABLE_CAPTCHA', '0'),
('COOKIE_EXPIRE', '100'),
('COOKIE_PATH', '/'),
('home_page', 'main.php'),
('ALL_LOWERCASE', '0'),
('Version', '3.1'),
('USER_TIMEOUT', '10'),
('GUEST_TIMEOUT', '5'),
('ACCOUNT_ACTIVATION', '3'),
('TRACK_VISITORS', '1'),
('max_user_chars', '30'),
('min_user_chars', '5'),
('max_pass_chars', '100'),
('min_pass_chars', '6'),
('EMAIL_FROM_NAME', 'PHP Login Script'),
('EMAIL_FROM_ADDR', 'email@localhost'),
('EMAIL_WELCOME', '0'),
('SITE_NAME', 'PHP Login Script V3'),
('SITE_DESC', 'PHP Login Script'),
('WEB_ROOT', 'http://localhost/login/'),
('ENABLE_CAPTCHA', '0'),
('COOKIE_EXPIRE', '100'),
('COOKIE_PATH', '/'),
('home_page', 'main.php'),
('ALL_LOWERCASE', '0'),
('Version', '3.1'),
('USER_TIMEOUT', '10'),
('GUEST_TIMEOUT', '5');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `ecms3_gallery`
--

CREATE TABLE IF NOT EXISTS `ecms3_gallery` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image_file` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `date_insert` datetime NOT NULL,
  `fk_category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=2 ;

--
-- Zrzut danych tabeli `ecms3_gallery`
--

INSERT INTO `ecms3_gallery` (`id`, `image_file`, `date_insert`, `fk_category_id`) VALUES
(1, 'MS.jpg', '2012-06-25 15:01:42', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `ecms3_gallery_category`
--

CREATE TABLE IF NOT EXISTS `ecms3_gallery_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `date_insert` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=2 ;

--
-- Zrzut danych tabeli `ecms3_gallery_category`
--

INSERT INTO `ecms3_gallery_category` (`id`, `name`, `date_insert`) VALUES
(1, 'Nowa galeria', '2012-06-25 15:00:24');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `ecms3_gallery_category_translations`
--

CREATE TABLE IF NOT EXISTS `ecms3_gallery_category_translations` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `ecms3_gallery_category_translations`
--

INSERT INTO `ecms3_gallery_category_translations` (`id`, `fk_gallery_category_id`, `category_title`, `category_description`, `isVisible`, `isVisibleDescription`, `date_publish`, `date_update`, `lang`) VALUES
(1, 1, 'Nowa galeria', '', 1, 1, '2012-06-25 15:00:24', '2012-06-25 15:00:24', 'pl'),
(2, 1, 'Nowa galeria', '', 1, 1, '2012-06-25 15:00:24', '2012-06-25 15:00:24', 'en');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `ecms3_gallery_translations`
--

CREATE TABLE IF NOT EXISTS `ecms3_gallery_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fk_gallery_id` int(10) unsigned NOT NULL,
  `fk_category_id` int(10) unsigned NOT NULL,
  `img_title` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `description` text COLLATE utf8_polish_ci,
  `lang` varchar(5) COLLATE utf8_polish_ci NOT NULL DEFAULT 'pl',
  `isVisible` tinyint(1) NOT NULL DEFAULT '1',
  `isVisibleDescription` tinyint(1) NOT NULL DEFAULT '1',
  `isMain` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=107 ;

--
-- Zrzut danych tabeli `ecms3_gallery_translations`
--

INSERT INTO `ecms3_gallery_translations` (`id`, `fk_gallery_id`, `fk_category_id`, `img_title`, `description`, `lang`, `isVisible`, `isVisibleDescription`, `isMain`) VALUES
(104, 52, 7, 'MS_1337338457.jpg', '', 'en', 1, 0, 0),
(105, 1, 1, 'MS.jpg', '', 'pl', 1, 0, 1),
(106, 1, 1, 'MS.jpg', '', 'en', 1, 0, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `ecms3_menu`
--

CREATE TABLE IF NOT EXISTS `ecms3_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(512) COLLATE utf8_polish_ci NOT NULL,
  `tech_name` varchar(512) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=16 ;

--
-- Zrzut danych tabeli `ecms3_menu`
--

INSERT INTO `ecms3_menu` (`id`, `name`, `tech_name`) VALUES
(1, 'Menu główne', 'main-menu'),
(12, 'Menu Stopki', 'custom-menu'),
(13, 'Menu Prawe', 'custom-menu'),
(14, 'Menu Lewe 1', 'custom-menu'),
(15, 'Menu Lewe 2', 'custom-menu');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `ecms3_menu_pages`
--

CREATE TABLE IF NOT EXISTS `ecms3_menu_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_menu_id` int(11) NOT NULL,
  `fk_page_id` int(11) DEFAULT NULL,
  `page_link` varchar(255) COLLATE utf8_polish_ci NOT NULL DEFAULT 'index.php',
  `lft` int(11) NOT NULL,
  `rgt` int(11) NOT NULL,
  `depth` tinyint(4) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `page_type` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `info` varchar(128) COLLATE utf8_polish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=244 ;

--
-- Zrzut danych tabeli `ecms3_menu_pages`
--

INSERT INTO `ecms3_menu_pages` (`id`, `fk_menu_id`, `fk_page_id`, `page_link`, `lft`, `rgt`, `depth`, `parent`, `page_type`, `info`) VALUES
(1, 1, 0, 'index.php', 1, 12, 0, NULL, 'rootpage', 'root'),
(209, 12, 0, 'index.php', 1, 2, 0, NULL, 'rootpage', 'root'),
(216, 13, 0, 'index.php', 1, 4, 0, 0, 'rootpage', 'root'),
(218, 14, 0, 'index.php', 1, 2, 0, 0, 'rootpage', 'root'),
(219, 15, 0, 'index.php', 1, 2, 0, 0, 'rootpage', 'root'),
(242, 1, 48, 'index.php?pid=48', 2, 3, 1, 0, 'page', ''),
(243, 1, 45, 'index.php?pid=45', 4, 5, 1, 0, 'page', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `ecms3_menu_pages_translations`
--

CREATE TABLE IF NOT EXISTS `ecms3_menu_pages_translations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_menu_pages_id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `title` varchar(256) COLLATE utf8_polish_ci NOT NULL,
  `menu_ln` varchar(2) CHARACTER SET utf8 NOT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=397 ;

--
-- Zrzut danych tabeli `ecms3_menu_pages_translations`
--

INSERT INTO `ecms3_menu_pages_translations` (`id`, `fk_menu_pages_id`, `name`, `title`, `menu_ln`, `is_visible`) VALUES
(393, 242, 'ddd', 'dd', 'pl', 1),
(394, 242, 'ddd', 'dd', 'en', 1),
(395, 243, 'strona główna', 'szkolenia', 'pl', 1),
(396, 243, 'strona główna', 'szkolenia', 'en', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `ecms3_news`
--

CREATE TABLE IF NOT EXISTS `ecms3_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `date_insert` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=18 ;

--
-- Zrzut danych tabeli `ecms3_news`
--

INSERT INTO `ecms3_news` (`id`, `name`, `date_insert`) VALUES
(16, 'news1', '2012-02-29 13:18:52'),
(17, 'nowosc', '2012-04-18 10:27:55');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `ecms3_news_category`
--

CREATE TABLE IF NOT EXISTS `ecms3_news_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `date_insert` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=15 ;

--
-- Zrzut danych tabeli `ecms3_news_category`
--

INSERT INTO `ecms3_news_category` (`id`, `name`, `date_insert`) VALUES
(14, 'Kategoria domyślna', '2012-02-29 13:18:02');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `ecms3_news_category_translations`
--

CREATE TABLE IF NOT EXISTS `ecms3_news_category_translations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_news_category_id` int(11) NOT NULL,
  `category_title` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `category_description` text COLLATE utf8_polish_ci,
  `is_visible` tinyint(1) NOT NULL DEFAULT '1',
  `date_publish` datetime NOT NULL,
  `date_update` datetime NOT NULL,
  `lang` varchar(2) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=19 ;

--
-- Zrzut danych tabeli `ecms3_news_category_translations`
--

INSERT INTO `ecms3_news_category_translations` (`id`, `fk_news_category_id`, `category_title`, `category_description`, `is_visible`, `date_publish`, `date_update`, `lang`) VALUES
(17, 14, 'Kategoria domyślna', '<p>\r\n	Opis kategorii</p>\r\n', 1, '2012-02-29 13:18:02', '2012-02-29 13:18:02', 'pl'),
(18, 14, 'Kategoria domyślna', '<p>\r\n	Opis kategorii</p>\r\n', 1, '2012-02-29 13:18:02', '2012-02-29 13:18:02', 'en');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `ecms3_news_translations`
--

CREATE TABLE IF NOT EXISTS `ecms3_news_translations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_news_id` int(11) NOT NULL,
  `fk_category_id` int(11) NOT NULL,
  `news_title` varchar(128) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `news_pre_content` text CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `news_content` text CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `news_meta` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `date_publish` datetime NOT NULL,
  `date_update` datetime NOT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT '1',
  `lang` varchar(2) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=28 ;

--
-- Zrzut danych tabeli `ecms3_news_translations`
--

INSERT INTO `ecms3_news_translations` (`id`, `fk_news_id`, `fk_category_id`, `news_title`, `news_pre_content`, `news_content`, `news_meta`, `date_publish`, `date_update`, `is_visible`, `lang`) VALUES
(24, 16, 14, 'Artykuł 1', '<p>\r\n	Litwo! Ojczyzno moja! Ty jesteś jak zdrowie. Ile cię trzeba było gorąca). wachlarz pozłocist powiewając rozlewał deszcz iskier rzęsisty. Głowa do Ojczyzn pierwszy człowiek, co wzdłuż i obrok, i jadł. wtem z rana w cząstce spadły dalekim mieści kończył nauki, końca doczekał nareszcie. Wbiega i nie lada kogo. Bo nie bywa od przodków wiarę prawa i każdy mimowolnie głowy jako wierzchołki i cztery źrenic po kim on zmienił się nagle, stronnicy Sokół na krzesła poręczu rozpięta. A na wielkim figurując świecie. Teraz wszedł służący, i mniej krzykliwy i stajennym i cztery ich rzędy siedziało trzeba cenić, ten Bonapart czarował, no, tak gadać: Cóż złego, że ją nudzi rzecz kończył: Wyczha! poszli, a potem Sędzia tuż to mówiąc, że tamuje progresy, że w czasie krajowych zamieszków. Dobra, całe zniszczone sekwestrami rządu bezładnością opieki, wyrokami sądu w wiecznej wiośnie pachnące kwitną lasy. z łowów wracając trafia się, że go pilnował i klasnęła w stajnię wzięto, już bronić nie uszło baczności, Że nie policzę. Opuszczali rodziców uroda jej oczyma spotkał się nagłe, jej pełnienie! Lecz mniej zgorszenia. Ach, ja sam głosem swoim.</p>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	Ołtarzyk złoty zawsze służy której już do drugiej stron i mniej trudnych i wróciwszy w oszmiańskim powiecie przyjechał pan Podkomorzy i dalej drzeć pazurami, a szczególniej mu z Wereszczaką, Giedrojć z Wereszczaką, Giedrojć z kształtu, jeśli równie pędzel, noty, druki. Aż osłupiał Tadeusz przyglądał się dawniej zdały. I starzy i cofnął się, by stary stojący zegar kurantowy w zamek na polowanie i niech Jaśnie Wielmożny Podkomorzy i liczba żołnierza i stołem siadał i w ulicę się wstążkami jaskrawych stokrotek. Grządki widać, że miał wielką, i nazwisko każdego z łowów wracając trafia się, spójrzał, lecz go grzecznie, na początek dać małą wieś, a potem zaczęła rozmowę. Wracał z nim czerwone jak zaraza. Przecież nieraz dziad żebrzący chleba bez wstydu królewic wszystkie dzisiejsze łowy. Asesora z domu i knieje więc i wznosi chmurę pyłu. dalej drzeć pazurami, a Pan świata wie, jak od Moskali, skakał kryć się uparta coraz straszniej, srożój. Wtem, wielkim figurując świecie. Teraz mu odwiązał, pas lity przy niej z łąk, i młoda. Jej zjawienie się drzwiczki Świeżo trącone. blisko drzwi od baśni historyje gadał. On za stołem siadał.</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	wytknął</div>\r\n', '', '2012-02-29 13:18:52', '2012-04-18 13:17:00', 1, 'pl'),
(25, 16, 14, 'Article 1', '<p>\r\n	Lorem ipsum dolor sit amet magna. Curabitur volutpat ut, magna. Integer faucibus orci pellentesque adipiscing dui sodales neque dui, eu risus. Aliquam eleifend nibh, fermentum pellentesque erat libero, id eros. Vestibulum ornare vitae, vulputate ante. Praesent dictum orci. Nam nunc justo, hendrerit vitae, vestibulum eget, condimentum nec, dolor. Aliquam vestibulum nec, dictum justo arcu, in faucibus eros. Mauris urna. Nulla nec odio. Cras vitae massa. Phasellus id turpis vitae nibh risus, pellentesque accumsan. In vehicula enim aliquam eget, ultricies tincidunt, risus vehicula dignissim. Etiam lobortis elit. Sed sollicitudin non, dolor. Vestibulum ante ipsum orci, viverra et, enim. Phasellus vitae tellus. Donec odio fermentum rutrum. Nunc dictum ut, semper id, cursus vitae, lectus. Pellentesque commodo volutpat ut, libero. Morbi pede. Donec porttitor laoreet molestie lorem lorem fermentum diam elementum orci ac elit iaculis leo. Cras ornare vitae, dictum velit, vitae lacus. Maecenas malesuada fames ac diam. Aliquam urna. Aenean interdum wisi arcu, rutrum et, placerat nisl sit amet, consectetuer viverra accumsan, dolor sit amet ante. Mauris metus. Donec urna orci luctus eu, vulputate sagittis, nunc sit amet neque. Nunc tempor magna.</p>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	Nulla venenatis suscipit. Suspendisse bibendum tempus. Nullam laoreet hendrerit sollicitudin. Praesent rutrum. In hac habitasse platea dictumst. Praesent odio fermentum turpis nec massa volutpat a, condimentum nulla. Morbi egestas, dui non sem. Nam laoreet hendrerit sollicitudin. Fusce consequat ipsum quis libero. Cras tempus ornare laoreet. Nam quis molestie justo imperdiet id, elit. Nullam suscipit quis, massa. Maecenas pulvinar eget, purus. Aenean scelerisque, dui tincidunt et, dictum id, eleifend posuere egestas blandit, enim sodales libero. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam commodo, est et mi. Curabitur nec lectus elit, consequat lobortis volutpat. Nam vestibulum volutpat, velit tempus enim diam, venenatis in, adipiscing elit nibh, fringilla sem eget tempus erat vitae felis tincidunt eget, aliquet molestie. Quisque cursus, lacus quis diam sit amet cursus sapien. Maecenas eget velit. Cum sociis natoque penatibus et malesuada elit a elit ultricies porta. Sed placerat. Vivamus laoreet nisl pede, at consequat non, ultrices posuere cubilia Curae, Mauris interdum arcu congue at, porttitor odio. Vestibulum ante nec tellus. Donec ligula enim metus sem, imperdiet id, vulputate quam. Pellentesque eu auctor.</div>\r\n', '', '2012-02-29 13:18:52', '2012-02-29 13:19:32', 1, 'en'),
(26, 17, 14, 'NOWOŚĆ', '<p>\r\n	nowość óóóóóóóóóó</p>\r\n<p>\r\n	zamieszków</p>\r\n', '<p>\r\n	nowość óóóóóóóóó</p>\r\n<p>\r\n	zamieszków</p>\r\n', '', '2012-04-18 10:27:55', '2012-04-18 10:28:27', 1, 'pl'),
(27, 17, 14, 'NOWOŚĆ', '<p>\r\n	nowość óóóóóóóóóó</p>\r\n', '<p>\r\n	nowość óóóóóóóóó</p>\r\n', '', '2012-04-18 10:27:55', '2012-04-18 10:27:55', 1, 'en');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `ecms3_pages`
--

CREATE TABLE IF NOT EXISTS `ecms3_pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_polish_ci DEFAULT NULL,
  `date_insert` datetime NOT NULL,
  `date_update` datetime NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `allow_comments` tinyint(1) NOT NULL DEFAULT '0',
  `permissions` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=49 ;

--
-- Zrzut danych tabeli `ecms3_pages`
--

INSERT INTO `ecms3_pages` (`id`, `name`, `date_insert`, `date_update`, `is_active`, `allow_comments`, `permissions`) VALUES
(45, 'strona główna', '2012-07-26 14:22:21', '2012-07-26 14:22:21', 1, 0, NULL),
(48, 'ddd', '2012-07-26 14:55:24', '2012-07-26 14:55:24', 1, 0, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `ecms3_page_translations`
--

CREATE TABLE IF NOT EXISTS `ecms3_page_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fk_page_id` int(10) unsigned NOT NULL,
  `page_title` varchar(128) COLLATE utf8_polish_ci DEFAULT NULL,
  `page_ln` varchar(2) COLLATE utf8_polish_ci NOT NULL DEFAULT 'pl',
  `is_visible` tinyint(1) NOT NULL DEFAULT '1',
  `is_main` tinyint(1) NOT NULL DEFAULT '0',
  `date_publish` datetime NOT NULL,
  `date_update` datetime NOT NULL,
  `page_precontent` text COLLATE utf8_polish_ci,
  `page_content` text COLLATE utf8_polish_ci,
  `page_meta` text COLLATE utf8_polish_ci,
  `page_meta_keys` text CHARACTER SET utf8,
  `page_meta_title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=87 ;

--
-- Zrzut danych tabeli `ecms3_page_translations`
--

INSERT INTO `ecms3_page_translations` (`id`, `fk_page_id`, `page_title`, `page_ln`, `is_visible`, `is_main`, `date_publish`, `date_update`, `page_precontent`, `page_content`, `page_meta`, `page_meta_keys`, `page_meta_title`) VALUES
(79, 45, 'szkolenia', 'pl', 1, 1, '2012-07-26 14:22:21', '2012-07-27 10:42:37', '', '<p>\r\n	asdf</p>\r\n<p>\r\n	[[contactform]]</p>\r\n', '', NULL, NULL),
(80, 45, 'szkolenia', 'en', 1, 1, '2012-07-26 14:22:21', '2012-07-26 14:22:21', '<p>\r\n	asdfasdf</p>\r\n', '<p>\r\n	asdfasf</p>\r\n', '', NULL, NULL),
(85, 48, 'dd', 'pl', 1, 0, '2012-07-26 14:55:24', '2012-07-26 14:55:24', '<p>\r\n	asd</p>\r\n', '<p>\r\n	adsf</p>\r\n', '', NULL, NULL),
(86, 48, 'dd', 'en', 1, 0, '2012-07-26 14:55:24', '2012-07-26 14:55:24', '<p>\r\n	asd</p>\r\n', '<p>\r\n	adsf</p>\r\n', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `ecms3_template_modules`
--

CREATE TABLE IF NOT EXISTS `ecms3_template_modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `template_name` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `module_type` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `module_id_attr` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `module_name` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `fk_module_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=22 ;

--
-- Zrzut danych tabeli `ecms3_template_modules`
--

INSERT INTO `ecms3_template_modules` (`id`, `template_name`, `module_type`, `module_id_attr`, `module_name`, `fk_module_id`) VALUES
(1, 'pawlowski', 'menu', 'custom_menu_1', 'Menu Główne', 1),
(2, 'pawlowski', 'menu', 'custom_menu_2', 'Menu Stopki', 12),
(3, 'terapia', 'menu', 'custom_menu_1', 'Menu Główne', 1),
(4, 'terapia', 'menu', 'custom_menu_2', 'Menu Stopki', 12),
(5, 'laboratorium', 'menu', 'custom_menu_1', 'Menu Główne', 1),
(6, 'laboratorium', 'menu', 'custom_menu_2', 'Menu Stopki', 12),
(7, 'expateam', 'menu', 'custom_menu_1', 'Menu Główne', 1),
(8, 'expateam', 'menu', 'custom_menu_2', 'Menu Stopki', 12),
(9, 'expateam', 'menu', 'custom_menu_3', 'Menu Prawe', 13),
(10, 'agrofarm', 'menu', 'custom_menu_1', 'Menu Główne', 1),
(11, 'agrofarm', 'menu', 'custom_menu_2', 'Menu Stopki', 12),
(12, 'pracabezgranic', 'menu', 'custom_menu_1', 'Menu Główne', 1),
(13, 'pracabezgranic', 'menu', 'custom_menu_2', 'Menu Stopki', 12),
(14, 'pracabezgranic', 'menu', 'custom_menu_3', 'Menu Lewe 1', 14),
(15, 'pracabezgranic', 'menu', 'custom_menu_4', 'Menu Lewe 2', 15),
(16, 'zwrotpodatku', 'menu', 'custom_menu_1', 'Menu Główne', 1),
(17, 'zwrotpodatku', 'menu', 'custom_menu_2', 'Menu Stopki', 12),
(18, 'zwrotpodatku', 'menu', 'custom_menu_3', 'Menu Lewe 1', 14),
(19, 'zwrotpodatku', 'menu', 'custom_menu_4', 'Menu Lewe 2', 15),
(20, 'mvcms', 'menu', 'custom_menu_1', 'Menu Główne', 1),
(21, 'mvcms', 'menu', 'custom_menu_2', 'Menu Stopki', 12);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `ecms3_users`
--

CREATE TABLE IF NOT EXISTS `ecms3_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(40) DEFAULT NULL,
  `firstname` varchar(20) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `lastname` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `usersalt` varchar(8) NOT NULL,
  `userid` varchar(32) DEFAULT NULL,
  `userlevel` tinyint(1) unsigned NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `timestamp` int(11) unsigned NOT NULL,
  `actkey` varchar(35) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `regdate` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Zrzut danych tabeli `ecms3_users`
--

INSERT INTO `ecms3_users` (`id`, `username`, `password`, `firstname`, `lastname`, `usersalt`, `userid`, `userlevel`, `email`, `timestamp`, `actkey`, `ip`, `regdate`) VALUES
(1, 'admin', '56debb4ccc8e74601de80ed40c089b9e3a9ae68e', 'Daniel', 'Szantar', 'XpmIUwXe', 'f98deba8fe735bef097c1b3ec157e8ad', 9, 'eidsza@tlen.pl', 1343731244, 'I7pHII6t1J2x7NJQ', '::1', 1340616079),
(19, 'Daniel', '7b70496633ba65b360c69a0c5e86dde7a52139db', 'Daniel', 'Szantar', 'RSb8v7yT', '0', 1, 'eidsza@tlen.pl', 1340967007, 'T12YUaSdGz4je2Bh', '::1', 1340967007);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `ecms_active_guests`
--

CREATE TABLE IF NOT EXISTS `ecms_active_guests` (
  `ip` varchar(15) NOT NULL,
  `timestamp` int(11) unsigned NOT NULL,
  PRIMARY KEY (`ip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `ecms_active_guests`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `ecms_active_users`
--

CREATE TABLE IF NOT EXISTS `ecms_active_users` (
  `username` varchar(30) NOT NULL,
  `timestamp` int(11) unsigned NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `ecms_active_users`
--

INSERT INTO `ecms_active_users` (`username`, `timestamp`) VALUES
('admin', 1340700747);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `ecms_banned_users`
--

CREATE TABLE IF NOT EXISTS `ecms_banned_users` (
  `username` varchar(30) NOT NULL,
  `timestamp` int(11) unsigned NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `ecms_banned_users`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `ecms_folio`
--

CREATE TABLE IF NOT EXISTS `ecms_folio` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `image_file` varchar(255) NOT NULL,
  `date_insert` datetime NOT NULL,
  `lang` varchar(5) NOT NULL DEFAULT 'pl',
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `isVisible` tinyint(1) NOT NULL DEFAULT '1',
  `isMain` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=68 ;

--
-- Zrzut danych tabeli `ecms_folio`
--

INSERT INTO `ecms_folio` (`id`, `category_id`, `title`, `description`, `image_file`, `date_insert`, `lang`, `isActive`, `isVisible`, `isMain`) VALUES
(1, 4, 'flats2.jpg', '', 'flats2.jpg', '2012-02-17 12:02:47', 'pl', 1, 1, 0),
(2, 4, 'houses.jpg', '', 'houses.jpg', '2012-02-17 12:02:54', 'pl', 1, 1, 0),
(3, 4, 'housewindow.jpg', '', 'housewindow.jpg', '2012-02-17 12:02:58', 'pl', 1, 1, 0),
(4, 4, 'housewindow2.jpg', '', 'housewindow2.jpg', '2012-02-17 12:02:02', 'pl', 1, 1, 0),
(5, 4, 'tapeta-2.jpg', '', 'tapeta-2.jpg', '2012-02-18 09:02:24', 'pl', 1, 1, 0),
(6, 1, 'tapeta-5.jpg', '', 'tapeta-5.jpg', '2012-02-18 09:02:35', 'pl', 1, 1, 0),
(7, 1, 'tapeta-7.jpg', '', 'tapeta-7.jpg', '2012-02-19 12:02:30', 'pl', 1, 1, 0),
(8, 1, 'tapeta.jpg', '', 'tapeta.jpg', '2012-02-19 12:02:48', 'pl', 1, 1, 0),
(9, 1, 'tapeta-2.jpg', '', 'tapeta-2.jpg', '2012-02-19 12:02:49', 'pl', 1, 1, 0),
(10, 1, 'tapeta-3.jpg', '', 'tapeta-3.jpg', '2012-02-19 12:02:50', 'pl', 1, 1, 0),
(11, 1, 'tapeta-4.jpg', '', 'tapeta-4.jpg', '2012-02-19 12:02:50', 'pl', 1, 1, 0),
(12, 1, 'tapeta-6.jpg', '', 'tapeta-6.jpg', '2012-02-19 12:02:51', 'pl', 1, 1, 0),
(13, 1, 'tapeta-7.jpg', '', 'tapeta-7.jpg', '2012-02-19 12:02:52', 'pl', 1, 1, 0),
(14, 1, 'tapeta.jpg', '', 'tapeta.jpg', '2012-02-19 12:02:38', 'pl', 1, 1, 0),
(15, 1, 'tapeta-2.jpg', '', 'tapeta-2.jpg', '2012-02-19 12:02:39', 'pl', 1, 1, 0),
(16, 1, 'tapeta-3.jpg', '', 'tapeta-3.jpg', '2012-02-19 12:02:39', 'pl', 1, 1, 0),
(17, 1, 'tapeta-4.jpg', '', 'tapeta-4.jpg', '2012-02-19 12:02:40', 'pl', 1, 1, 0),
(18, 1, 'tapeta-6.jpg', '', 'tapeta-6.jpg', '2012-02-19 12:02:41', 'pl', 1, 1, 0),
(19, 1, 'tapeta-7.jpg', '', 'tapeta-7.jpg', '2012-02-19 12:02:41', 'pl', 1, 1, 0),
(20, 6, 'tapeta-6.jpg', '', 'tapeta-6.jpg', '2012-02-19 01:02:54', 'pl', 1, 1, 0),
(21, 6, 'tapeta-7.jpg', '', 'tapeta-7.jpg', '2012-02-19 01:02:55', 'pl', 1, 1, 0),
(22, 6, 'tapeta.jpg', '', 'tapeta.jpg', '2012-02-19 01:02:31', 'pl', 1, 1, 0),
(23, 6, 'tapeta-2.jpg', '', 'tapeta-2.jpg', '2012-02-19 01:02:32', 'pl', 1, 1, 0),
(24, 6, 'tapeta-3.jpg', '', 'tapeta-3.jpg', '2012-02-19 01:02:33', 'pl', 1, 1, 0),
(25, 6, 'tapeta-6.jpg', '', 'tapeta-6.jpg', '2012-02-19 01:02:34', 'pl', 1, 1, 0),
(26, 6, 'tapeta-7.jpg', '', 'tapeta-7.jpg', '2012-02-19 01:02:34', 'pl', 1, 1, 0),
(27, 6, 'tapeta-6.jpg', '', 'tapeta-6.jpg', '2012-02-19 01:02:31', 'pl', 1, 1, 0),
(28, 6, 'tapeta-7.jpg', '', 'tapeta-7.jpg', '2012-02-19 01:02:21', 'pl', 1, 1, 0),
(29, 7, 'tapeta-7.jpg', '', 'tapeta-7.jpg', '2012-02-19 01:02:24', 'pl', 1, 1, 0),
(30, 6, 'tapeta-6.jpg', '', 'tapeta-6.jpg', '2012-02-19 02:02:43', 'pl', 1, 1, 0),
(31, 6, 'tapeta.jpg', '', 'tapeta.jpg', '2012-02-19 02:02:53', 'pl', 1, 1, 0),
(32, 7, 'tapeta-3.jpg', '', 'tapeta-3.jpg', '2012-02-19 02:02:46', 'pl', 1, 1, 0),
(33, 7, 'tapeta-4.jpg', '', 'tapeta-4.jpg', '2012-02-19 02:02:48', 'pl', 1, 1, 0),
(34, 7, 'tapeta-5.jpg', '', 'tapeta-5.jpg', '2012-02-19 02:02:49', 'pl', 1, 1, 0),
(35, 6, 'tapeta.jpg', '', 'tapeta.jpg', '2012-02-19 04:02:50', 'pl', 1, 1, 0),
(36, 6, 'tapeta-6.jpg', '', 'tapeta-6.jpg', '2012-02-19 04:02:52', 'pl', 1, 1, 0),
(37, 8, 'tapeta-5.jpg', '', 'tapeta-5.jpg', '2012-02-19 04:02:36', 'pl', 1, 1, 0),
(38, 6, 'Flow.jpg', '', 'Flow.jpg', '2012-02-19 07:02:31', 'pl', 1, 1, 0),
(39, 7, 'squares.jpg', '', 'squares.jpg', '2012-05-18 09:05:25', 'pl', 1, 1, 0),
(40, 9, 'MS.jpg', '', 'MS.jpg', '2012-05-18 12:05:12', 'pl', 1, 1, 0),
(41, 12, 'MS_1337336920.jpg', '', 'MS_1337336920.jpg', '2012-05-18 12:05:41', 'pl', 1, 1, 0),
(42, 13, 'MS_1337336937.jpg', '', 'MS_1337336937.jpg', '2012-05-18 12:05:58', 'pl', 1, 1, 0),
(43, 14, 'MS.jpg', '', 'MS.jpg', '2012-05-18 12:05:16', 'pl', 1, 1, 0),
(44, 7, 'MS_1337337413.jpg', '', 'MS_1337337413.jpg', '2012-05-18 12:05:54', 'pl', 1, 1, 0),
(45, 7, 'MS_1337337453.jpg', '', 'MS_1337337453.jpg', '2012-05-18 12:05:34', 'pl', 1, 1, 0),
(46, 14, 'MS_1337337473.jpg', '', 'MS_1337337473.jpg', '2012-05-18 12:05:54', 'pl', 1, 1, 0),
(47, 15, 'MS_1337337575.jpg', '', 'MS_1337337575.jpg', '2012-05-18 12:05:36', 'pl', 1, 1, 0),
(48, 16, 'housewindow2.jpg', '', 'housewindow2.jpg', '2012-05-18 12:05:59', 'pl', 1, 1, 0),
(49, 16, 'Loft%20Room%20Scene%20with%20Tile%20Surround.jpg', '', 'Loft%20Room%20Scene%20with%20Tile%20Surround.jpg', '2012-05-18 12:05:00', 'pl', 1, 1, 0),
(50, 16, 'MS_1337337780.jpg', '', 'MS_1337337780.jpg', '2012-05-18 12:05:01', 'pl', 1, 1, 0),
(51, 17, 'housewindow2_1337337870.jpg', '', 'housewindow2_1337337870.jpg', '2012-05-18 12:05:34', 'pl', 1, 1, 0),
(52, 17, 'Loft%20Room%20Scene%20with%20Tile%20Surround_1337337875.jpg', '', 'Loft%20Room%20Scene%20with%20Tile%20Surround_1337337875.jpg', '2012-05-18 12:05:36', 'pl', 1, 1, 0),
(53, 18, 'MS.jpg', '', 'MS.jpg', '2012-05-18 12:05:25', 'pl', 1, 1, 0),
(54, 19, 'MS.jpg', '', 'MS.jpg', '2012-05-18 12:05:03', 'pl', 1, 1, 0),
(55, 7, 'MS_1337338443.jpg', '', 'MS_1337338443.jpg', '2012-05-18 12:05:04', 'pl', 1, 1, 0),
(56, 7, 'MS_1337338457.jpg', '', 'MS_1337338457.jpg', '2012-05-18 12:05:18', 'pl', 1, 1, 0),
(57, 19, 'squares.jpg', '', 'squares.jpg', '2012-05-21 09:05:27', 'pl', 1, 1, 0),
(58, 19, 'MS_1337584545.jpg', '', 'MS_1337584545.jpg', '2012-05-21 09:05:46', 'pl', 1, 1, 0),
(59, 19, 'eva-mendes-100-04.jpg', '', 'eva-mendes-100-04.jpg', '2012-05-21 10:05:54', 'pl', 1, 1, 0),
(60, 19, 'MS.jpg', '', 'MS.jpg', '2012-05-21 11:05:58', 'pl', 1, 1, 0),
(61, 19, 'squares.jpg', '', 'squares.jpg', '2012-05-21 11:05:00', 'pl', 1, 1, 0),
(62, 19, 'squares2.jpg', '', 'squares2.jpg', '2012-05-21 11:05:03', 'pl', 1, 1, 0),
(63, 19, 'MS_1337592684.jpg', '', 'MS_1337592684.jpg', '2012-05-21 11:05:25', 'pl', 1, 1, 0),
(64, 19, 'squares2.jpg', '', 'squares2.jpg', '2012-05-21 11:05:20', 'pl', 1, 1, 0),
(65, 19, 'squares3.jpg', '', 'squares3.jpg', '2012-05-21 11:05:23', 'pl', 1, 1, 0),
(66, 19, 'tapeta.jpg', '', 'tapeta.jpg', '2012-05-21 11:05:25', 'pl', 1, 1, 0),
(67, 1, 'MS.jpg', '', 'MS.jpg', '2012-06-25 03:06:42', 'pl', 1, 1, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `ecms_folio_album`
--

CREATE TABLE IF NOT EXISTS `ecms_folio_album` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `description` varchar(1024) COLLATE utf8_polish_ci DEFAULT NULL,
  `sortorder` varchar(1024) COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `date_update` datetime NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `isVisible` tinyint(1) NOT NULL DEFAULT '1',
  `lang` varchar(2) COLLATE utf8_polish_ci NOT NULL DEFAULT 'pl',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `ecms_folio_album`
--

INSERT INTO `ecms_folio_album` (`id`, `title`, `description`, `sortorder`, `date_update`, `isActive`, `isVisible`, `lang`) VALUES
(1, 'Nowy ablum', '<p>\r\n	opis</p>\r\n', '4', '2012-02-17 12:02:08', 1, 1, 'pl'),
(2, 'Jeszcze jeden album', '<p>\r\n	opis do nowego albumu</p>\r\n', '4,5,1', '2011-06-28 12:06:58', 1, 1, 'pl');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `ecms_folio_category`
--

CREATE TABLE IF NOT EXISTS `ecms_folio_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `date_update` datetime NOT NULL,
  `lang` varchar(5) NOT NULL DEFAULT 'pl',
  `isVisible` tinyint(1) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Zrzut danych tabeli `ecms_folio_category`
--

INSERT INTO `ecms_folio_category` (`id`, `title`, `description`, `date_update`, `lang`, `isVisible`, `isActive`) VALUES
(1, 'folio', '', '2011-04-27 06:57:28', 'pl', 1, 1),
(4, 'Nowa kategoria', '<p>\r\n	nowa kategoria</p>\r\n', '2011-04-29 12:04:17', 'pl', 1, 1),
(5, 'Nowa kategoria', '<p>\r\n	Opis kategorii</p>\r\n', '2011-07-05 01:07:58', 'en', 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `ecms_langs`
--

CREATE TABLE IF NOT EXISTS `ecms_langs` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `symbol` varchar(2) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `name` varchar(128) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `isVisibleInMenu` tinyint(1) NOT NULL DEFAULT '1',
  `isVisibleFlag` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `ecms_langs`
--

INSERT INTO `ecms_langs` (`id`, `symbol`, `name`, `isActive`, `isVisibleInMenu`, `isVisibleFlag`) VALUES
(1, 'pl', 'Polski', 1, 0, 0),
(2, 'en', 'English', 1, 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `ecms_nested_pages`
--

CREATE TABLE IF NOT EXISTS `ecms_nested_pages` (
  `node_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `lft` mediumint(8) unsigned NOT NULL,
  `rgt` mediumint(8) unsigned NOT NULL,
  `moved` tinyint(1) NOT NULL,
  `date_insert` datetime NOT NULL,
  `date_update` datetime NOT NULL,
  `menu_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `page_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `page_link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `page_content` text CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `page_meta` text COLLATE utf8_unicode_ci,
  `lang` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `menu_visible` tinyint(1) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`node_id`),
  KEY `lft` (`lft`,`rgt`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=67 ;

--
-- Zrzut danych tabeli `ecms_nested_pages`
--

INSERT INTO `ecms_nested_pages` (`node_id`, `lft`, `rgt`, `moved`, `date_insert`, `date_update`, `menu_title`, `page_title`, `page_link`, `page_content`, `page_meta`, `lang`, `menu_visible`, `is_active`, `is_default`) VALUES
(35, 1, 28, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'root', NULL, NULL, NULL, NULL, '', 1, 1, 0),
(54, 4, 5, 0, '2011-11-27 17:48:07', '2011-11-28 12:06:54', 'Hotel', 'Witamy w Hotelu PawÅ‚owski', '', '<div>\r\n	<div class="box pad1">\r\n		&nbsp;</div>\r\n</div>\r\n<p>\r\n	&nbsp;</p>\r\n', '', 'pl', 1, 1, 0),
(55, 6, 7, 0, '2011-11-27 17:48:51', '2011-11-27 18:29:06', 'AktualnoÅ›Ä‡i', 'AktualnoÅ›ci', '', '<p>\r\n	[[news]]</p>\r\n', '', 'pl', 1, 1, 0),
(56, 8, 9, 0, '2011-11-27 17:49:15', '2011-11-27 17:49:15', 'UsÅ‚ugi', 'UsÅ‚ugi', '', '', '', 'pl', 1, 1, 0),
(57, 10, 21, 0, '2011-11-27 17:49:37', '2011-11-27 17:49:37', 'Galeria', 'Galeria', '', '', '', 'pl', 1, 1, 0),
(58, 22, 23, 0, '2011-11-27 17:49:58', '2011-11-27 17:49:58', 'Restauracja', 'Restauracja', '', '', '', 'pl', 1, 1, 0),
(59, 24, 25, 0, '2011-11-27 17:50:16', '2011-11-27 17:50:16', 'Kontakt', 'Kontakt', '', '', '', 'pl', 1, 1, 0),
(60, 11, 12, 0, '2011-11-27 17:52:53', '2011-11-28 13:47:45', 'Pokoje', 'Pokoje', '', '<p>\r\n	[[gallery=fullgallery]]</p>\r\n', '', 'pl', 1, 1, 0),
(61, 13, 18, 0, '2011-11-27 17:53:18', '2011-11-27 17:53:18', 'Imprezy okolicznoÅ›ciowe', 'Imprezy okolicznoÅ›ciowe', '', '', '', 'pl', 1, 1, 0),
(63, 14, 15, 0, '2011-11-27 17:54:09', '2011-11-27 17:54:09', 'Wesela', 'Wesela', '', '', '', 'pl', 1, 1, 0),
(64, 16, 17, 0, '2011-11-27 17:54:22', '2011-11-27 17:54:22', 'Komunie', 'Komunie', '', '', '', 'pl', 1, 1, 0),
(65, 19, 20, 0, '2011-11-27 17:54:39', '2011-11-27 17:54:39', 'Restauracja', 'Restauracja', '', '', '', 'pl', 1, 1, 0),
(46, 2, 3, 0, '2011-06-29 12:17:41', '2011-06-29 12:19:54', 'news', 'news', '', '<p>\r\n	[[news]]</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	[[subtree=36]]</p>\r\n', '', 'pl', 1, 0, 0),
(66, 26, 27, 0, '2011-11-28 08:03:58', '2011-11-28 08:03:58', 'Hotel', 'Hotel', '', '', '', 'en', 1, 1, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `ecms_news`
--

CREATE TABLE IF NOT EXISTS `ecms_news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned NOT NULL DEFAULT '1',
  `title` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `pre_content` varchar(2408) COLLATE utf8_polish_ci DEFAULT NULL,
  `content` text COLLATE utf8_polish_ci,
  `lang` varchar(5) COLLATE utf8_polish_ci NOT NULL,
  `date_publish` datetime NOT NULL,
  `date_update` datetime NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `isVisible` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=19 ;

--
-- Zrzut danych tabeli `ecms_news`
--

INSERT INTO `ecms_news` (`id`, `category_id`, `title`, `pre_content`, `content`, `lang`, `date_publish`, `date_update`, `isActive`, `isVisible`) VALUES
(2, 1, 'Lorem 1', '<p>\r\n	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris quis porttitor lorem. Nullam nec elit leo, id rutrum velit. Vivamus ullamcorper massa in erat pretium pellentesque eget quis elit. Vivamus sed risus velit.</p>\r\n', '<p>\r\n	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris quis porttitor lorem. Nullam nec elit leo, id rutrum velit. Vivamus ullamcorper massa in erat pretium pellentesque eget quis elit. Vivamus sed risus velit. Nullam sed dolor vel sem bibendum ultrices in non ante. In ultrices commodo est, at lobortis massa rutrum nec. Nulla sit amet magna urna. Etiam nisi nunc, tempor a pellentesque non, volutpat non nulla. Vivamus hendrerit faucibus dui vel congue. Donec ut arcu enim. Fusce quis justo ac nulla molestie porta. In sed consectetur ante. In molestie urna at purus varius nec dignissim odio elementum. Aliquam erat volutpat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse enim nunc, eleifend ut sagittis ac, tristique non ante. Praesent elit neque, varius non suscipit vitae, ultrices quis massa. Aliquam quis enim metus, ac molestie nisl. Mauris vestibulum risus eget nunc semper et commodo arcu faucibus.</p>\r\n<p>\r\n	Aliquam turpis neque, congue at commodo vitae, tristique id eros. Donec ipsum erat, gravida vel sodales a, tempor vel arcu. Curabitur a nisi at arcu sollicitudin ornare vitae ac lectus. Nunc nec libero lectus, et vulputate ipsum. Quisque quis felis quam. Morbi eget sapien sit amet nibh suscipit blandit rhoncus in tellus. Curabitur non luctus est. In ultrices orci vitae nisl interdum ultrices. Nulla placerat, ligula et porta pulvinar, arcu lacus lacinia est, nec aliquam orci ante quis nisi. Curabitur rutrum massa eu sem pulvinar rhoncus. Integer blandit urna nec libero condimentum malesuada. Aenean nunc felis, rutrum vitae mattis sed, mattis in turpis. Cras porta diam ac risus lacinia vel sollicitudin purus posuere. Praesent risus erat, congue eget blandit non, venenatis sed augue. Fusce in aliquet quam. Praesent a nunc lectus. Phasellus ac purus felis. Pellentesque mollis vulputate nisi, elementum tincidunt lacus consequat eget. Integer nec enim eu ipsum blandit rutrum.</p>\r\n', 'pl', '2011-03-03 00:00:00', '2011-06-29 12:06:05', 1, 1),
(9, 1, 'Lorem 2', '<p>\r\n	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris quis porttitor lorem. Nullam nec elit leo, id</p>\r\n<p>\r\n	&nbsp;</p>\r\n', '<p>\r\n	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris quis porttitor lorem. Nullam nec elit leo, id rutrum velit. Vivamus ullamcorper massa in erat pretium pellentesque eget quis elit. Vivamus sed risus velit. Nullam sed dolor vel sem bibendum ultrices in non ante. In ultrices commodo est, at lobortis massa rutrum nec. Nulla sit amet magna urna. Etiam nisi nunc, tempor a pellentesque non, volutpat non nulla. Vivamus hendrerit faucibus dui vel congue. Donec ut arcu enim. Fusce quis justo ac nulla molestie porta. In sed consectetur ante. In molestie urna at purus varius nec dignissim odio elementum. Aliquam erat volutpat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse enim nunc, eleifend ut sagittis ac, tristique non ante. Praesent elit neque, varius non suscipit vitae, ultrices quis massa. Aliquam quis enim metus, ac molestie nisl. Mauris vestibulum risus eget nunc semper et commodo arcu faucibus.</p>\r\n<p>\r\n	Aliquam turpis neque, congue at commodo vitae, tristique id eros. Donec ipsum erat, gravida vel sodales a, tempor vel arcu. Curabitur a nisi at arcu sollicitudin ornare vitae ac lectus. Nunc nec libero lectus, et vulputate ipsum. Quisque quis felis quam. Morbi eget sapien sit amet nibh suscipit blandit rhoncus in tellus. Curabitur non luctus est. In ultrices orci vitae nisl interdum ultrices. Nulla placerat, ligula et porta pulvinar, arcu lacus lacinia est, nec aliquam orci ante quis nisi. Curabitur rutrum massa eu sem pulvinar rhoncus. Integer blandit urna nec libero condimentum malesuada. Aenean nunc felis, rutrum vitae mattis sed, mattis in turpis. Cras porta diam ac risus lacinia vel sollicitudin purus posuere. Praesent risus erat, congue eget blandit non, venenatis sed augue. Fusce in aliquet quam. Praesent a nunc lectus. Phasellus ac purus felis. Pellentesque mollis vulputate nisi, elementum tincidunt lacus consequat eget. Integer nec enim eu ipsum blandit rutrum.</p>\r\n', 'pl', '2011-03-17 00:00:00', '2011-06-29 12:06:59', 1, 1),
(10, 1, 'Lorem 3', '<p>\r\n	ddd</p>\r\n', '<p>\r\n	a to jeszcze odnoÅ›nik do newsa w newsie : [[news=1]]</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris quis porttitor lorem. Nullam nec elit leo, id rutrum velit. Vivamus ullamcorper massa in erat pretium pellentesque eget quis elit. Vivamus sed risus velit. Nullam sed dolor vel sem bibendum ultrices in non ante. In ultrices commodo est, at lobortis massa rutrum nec. Nulla sit amet magna urna. Etiam nisi nunc, tempor a pellentesque non, volutpat non nulla. Vivamus hendrerit faucibus dui vel congue. Donec ut arcu enim. Fusce quis justo ac nulla molestie porta. In sed consectetur ante. In molestie urna at purus varius nec dignissim odio elementum. Aliquam erat volutpat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse enim nunc, eleifend ut sagittis ac, tristique non ante. Praesent elit neque, varius non suscipit vitae, ultrices quis massa. Aliquam quis enim metus, ac molestie nisl. Mauris vestibulum risus eget nunc semper et commodo arcu faucibus.</p>\r\n<p>\r\n	Aliquam turpis neque, congue at commodo vitae, tristique id eros. Donec ipsum erat, gravida vel sodales a, tempor vel arcu. Curabitur a nisi at arcu sollicitudin ornare vitae ac lectus. Nunc nec libero lectus, et vulputate ipsum. Quisque quis felis quam. Morbi eget sapien sit amet nibh suscipit blandit rhoncus in tellus. Curabitur non luctus est. In ultrices orci vitae nisl interdum ultrices. Nulla placerat, ligula et porta pulvinar, arcu lacus lacinia est, nec aliquam orci ante quis nisi. Curabitur rutrum massa eu sem pulvinar rhoncus. Integer blandit urna nec libero condimentum malesuada. Aenean nunc felis, rutrum vitae mattis sed, mattis in turpis. Cras porta diam ac risus lacinia vel sollicitudin purus posuere. Praesent risus erat, congue eget blandit non, venenatis sed augue. Fusce in aliquet quam. Praesent a nunc lectus. Phasellus ac purus felis. Pellentesque mollis vulputate nisi, elementum tincidunt lacus consequat eget. Integer nec enim eu ipsum blandit rutrum.</p>\r\n', 'pl', '2011-03-19 00:00:00', '2011-06-29 12:06:10', 1, 1),
(13, 5, 'Wydarzenie 1a', '<p>\r\n	adfasdf</p>\r\n', '<p>\r\n	adfasdf</p>\r\n', 'pl', '2011-07-01 00:00:00', '2011-07-05 11:07:36', 1, 1),
(14, 3, 'Wydarzenie 2', '<p>\r\n	adfasdf</p>\r\n', '<p>\r\n	sdfadf</p>\r\n', 'pl', '2011-07-07 00:00:00', '2011-07-05 10:07:53', 1, 1),
(15, 4, 'Przedmioty 1', '<p>\r\n	asdf</p>\r\n', '<p>\r\n	af</p>\r\n', 'pl', '2011-07-03 00:00:00', '2011-07-05 10:56:02', 1, 1),
(16, 4, 'Przedmioty 2', '<p>\r\n	asdf</p>\r\n', '<p>\r\n	afds</p>\r\n', 'pl', '2011-07-04 00:00:00', '2011-07-05 10:56:18', 1, 1),
(17, 5, 'Wydarzenie 3', '<p>\r\n	adf</p>\r\n', '<p>\r\n	adfasdf</p>\r\n', 'pl', '2011-07-01 00:00:00', '2011-07-05 11:07:45', 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `ecms_newsletter`
--

CREATE TABLE IF NOT EXISTS `ecms_newsletter` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `lang` varchar(2) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `insertDate` datetime NOT NULL,
  `guid` varchar(38) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `modpages` tinyint(1) NOT NULL DEFAULT '1',
  `modnews` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin2 AUTO_INCREMENT=5 ;

--
-- Zrzut danych tabeli `ecms_newsletter`
--

INSERT INTO `ecms_newsletter` (`id`, `email`, `lang`, `insertDate`, `guid`, `isActive`, `modpages`, `modnews`) VALUES
(1, 'eidsza@tlen.pl', 'pl', '2011-04-06 06:43:10', '{3E582553-3354-4AFB-BED0-7C6A129E3311}', 0, 1, 1),
(2, 'eidsza@gmail.com', 'pl', '2012-02-10 12:43:01', '{0599EB0B-02A5-41F7-A156-4BFD938DED2C}', 1, 1, 1),
(4, 'ayah_sw@tlen.pl', 'pl', '2012-02-17 10:56:31', '{4FB47C09-46B3-4E98-9D74-9587DFD3B8BF}', 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `ecms_news_category`
--

CREATE TABLE IF NOT EXISTS `ecms_news_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(512) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `isActive` tinyint(1) NOT NULL,
  `isVisible` tinyint(1) NOT NULL,
  `date_update` datetime NOT NULL,
  `lang` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Zrzut danych tabeli `ecms_news_category`
--

INSERT INTO `ecms_news_category` (`id`, `title`, `description`, `isActive`, `isVisible`, `date_update`, `lang`) VALUES
(1, 'DomyÅ›lna kategoria', '', 1, 1, '2011-07-05 13:23:27', 'pl'),
(2, 'jeszcze jedna', '<p>\r\n	jeszcze jedna kategoria</p>\r\n<p>\r\n	adsf</p>\r\n', 1, 1, '2011-07-05 08:07:30', 'pl'),
(3, 'Wydarzenia', '<p>\r\n	Ostatnie Wydarzenia.</p>\r\n', 1, 1, '2011-07-05 10:52:18', 'pl'),
(4, 'Nowe przedmioty', '<p>\r\n	nowe przedmioty</p>\r\n', 1, 1, '2011-07-05 10:52:43', 'pl'),
(5, 'Co oferujemy', '', 1, 1, '2011-07-05 11:44:22', 'pl');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `ecms_sc_main`
--

CREATE TABLE IF NOT EXISTS `ecms_sc_main` (
  `sc_name` varchar(255) NOT NULL,
  `sc_count` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`sc_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `ecms_sc_main`
--

INSERT INTO `ecms_sc_main` (`sc_name`, `sc_count`) VALUES
('C:/xampp/htdocs/ecms/index.php', 471),
('D:/xampp/htdocs/ecms/index.php', 2),
('D:/xampp/htdocs/ecms3/index.php', 444),
('E:/XAMPP/xampp/htdocs/counter/test.php', 1),
('E:/XAMPP/xampp/htdocs/ecms/admin/index.php', 14),
('E:/XAMPP/xampp/htdocs/ecms/index.php', 782),
('E:/XAMPP/xampp/htdocs/ecms3/index.php', 1683),
('E:/XAMPP/xampp/htdocs/ecms33/index.php', 27),
('total', 106);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `ecms_sc_users`
--

CREATE TABLE IF NOT EXISTS `ecms_sc_users` (
  `sc_ip` char(16) NOT NULL,
  `sc_time` int(10) unsigned NOT NULL,
  `sc_location` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`sc_ip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `ecms_sc_users`
--

INSERT INTO `ecms_sc_users` (`sc_ip`, `sc_time`, `sc_location`) VALUES
('::1', 1343644920, 'E:/XAMPP/xampp/htdocs/ecms3/index.php');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `ecms_sidebar_plugins`
--

CREATE TABLE IF NOT EXISTS `ecms_sidebar_plugins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sidebarId` varchar(10) NOT NULL,
  `widgetName` varchar(128) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `pluginTitle` varchar(64) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `pluginId` varchar(64) NOT NULL,
  `pluginOptions` varchar(255) DEFAULT NULL,
  `sortorder` int(11) NOT NULL,
  `lang` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Zrzut danych tabeli `ecms_sidebar_plugins`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `ecms_users`
--

CREATE TABLE IF NOT EXISTS `ecms_users` (
  `username` varchar(30) NOT NULL,
  `password` varchar(32) DEFAULT NULL,
  `userid` varchar(32) DEFAULT NULL,
  `userlevel` tinyint(1) unsigned NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `firstname` varchar(20) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `lastname` varchar(30) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `timestamp` int(11) unsigned NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `ecms_users`
--

INSERT INTO `ecms_users` (`username`, `password`, `userid`, `userlevel`, `email`, `firstname`, `lastname`, `timestamp`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', '11cffef02142a2e918fd7b597b32153d', 9, 'eidsza@tlen.pl', NULL, NULL, 1343644932),
('daniel', 'aa47f8215c6f30a0dcdb2a36a9f4168e', '25e0c5888940b5df0ab9d1f2114b2e15', 9, 'eidsza@tlen.pl', NULL, NULL, 1342763467);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `ecms_widgets`
--

CREATE TABLE IF NOT EXISTS `ecms_widgets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) CHARACTER SET utf8 NOT NULL,
  `html` text COLLATE utf8_polish_ci NOT NULL,
  `options` varchar(512) CHARACTER SET utf8 NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=12 ;

--
-- Zrzut danych tabeli `ecms_widgets`
--

INSERT INTO `ecms_widgets` (`id`, `name`, `html`, `options`, `isActive`) VALUES
(5, 'newscategory', '<div class="plugin-portlet" id="news-category">\r\n         <div class="portlet-header">Aktualności - wybrana kategoria</div>\r\n         <div class="portlet-content">\r\n         <p>Aktualności - kategorie. Plagin pokazuje ostatnio dodane aktulaności z wybranej kategorii. Możliwość wywołania pluginu w\r\n         treśći strony za pomocą tagu [[newscategory=1]] gdzie {1} jest numerem id kategorii, lub [[newscategory=2,5]], gdzie {2} oznacza id kategroii\r\n         a {5} oznacza limit poazywanych wpisów (5 ostatnich)</p>\r\n         <div class="widget-inside">\r\n         <form method="post" action="plugins.php?update=1" name="widgetoptionsform">\r\n           <input type="hidden" name="pluginname" value="%s" id="pluginname"/>\r\n           <input type="hidden" name="pluginid" value="%s" id="pluginid"/>\r\n         <div class="options">\r\n         <p><label for="">Tytuł:</label></p>\r\n         <input type="text" name="title" value="%s" />\r\n         <p><label for="">Kategoria aktualności:</label></p>\r\n         <select id="" class="widefat" name="newscategory">\r\n         %s\r\n         </select>\r\n         <p><label for="">Ilość pokazywancyh aktulaności w tej kategorii:</label></p>\r\n         <input type="text" name="limit" value="%s" />\r\n         </div>\r\n         <div class="widget-control-actions">\r\n            <div class="alignleft">\r\n            <a class="widget-control-remove" href="#remove">Usuń</a>\r\n            |\r\n            <a class="widget-control-close" href="#close">Zamknij</a>\r\n            </div>\r\n            <div class="alignright">\r\n            <img class="ajax-feedback" alt="" title="" src="http://localhost/wordpress/wp-admin/images/wpspin_light.gif" style="visibility: hidden;">\r\n            <input id="widget-pages-2-savewidget" class="button-primary widget-control-save" type="submit" value="Zapisz" name="savewidget">\r\n            </div>\r\n            <br class="clear">\r\n          </div>\r\n         </div>\r\n         </form>\r\n         </div>\r\n      </div>', 'a:5:{s:10:"pluginname";s:12:"newscategory";s:8:"pluginid";s:14:"newscategory_1";s:5:"title";s:12:"Aktualności";s:6:"select";a:2:{s:4:"name";s:12:"newscategory";s:8:"selected";s:2:"-1";}s:5:"limit";s:1:"5";}', 1),
(7, 'news', '<div class="plugin-portlet" id="news">\r\n         <div class="portlet-header">Aktualnośći</div>\r\n         <div class="portlet-content">\r\n         <p>Aktualności, aby wybrać astanie 5 najnowszych newsów wpisz opcę [[news=5]]</p>\r\n         <div class="widget-inside">\r\n         <form method="post" action="plugins.php?update=1" name="widgetoptionsform">\r\n         <div class="options">\r\n         <input type="hidden" name="pluginname" value="%s" id="pluginname"/>\r\n         <input type="hidden" name="pluginid" value="%s" id="pluginid"/>\r\n         <p><label for="">Tytuł:</label></p>\r\n         <input type="text" name="title" value="%s" />\r\n         <p><label for="">Ilość pokazywancyh najnowszych aktulaności:</label></p>\r\n         <input type="text" name="limit" value="%s" />\r\n         \r\n         </div>\r\n         <div class="widget-control-actions">\r\n            <div class="alignleft">\r\n            <a class="widget-control-remove" href="#remove">Usuń</a>\r\n            |\r\n            <a class="widget-control-close" href="#close">Zamknij</a>\r\n            </div>\r\n            <div class="alignright">\r\n            <img class="ajax-feedback" alt="" title="" src="images/wpspin_light.gif" style="visibility: hidden;">\r\n            <input id="widget-pages-2-savewidget" class="button-primary widget-control-save" type="submit" value="Zapisz" name="savewidget">\r\n            </div>\r\n            <br class="clear">\r\n          </div>\r\n         </div>\r\n         </form>\r\n         </div>\r\n      </div>', 'a:4:{s:10:"pluginname";s:4:"news";s:8:"pluginid";s:6:"news_1";s:5:"title";s:12:"Aktualności";s:5:"limit";s:1:"5";}', 1),
(8, 'googlemap', '<div class="plugin-portlet" id="googlemap">\r\n         <div class="portlet-header">Mapa google</div>\r\n         <div class="portlet-content">\r\n         <p>Mapa google</p>\r\n         <div class="widget-inside">\r\n         <form method="post"action="plugins.php?update=1" name="widgetoptionsform">\r\n         <div class="options">\r\n         <input type="hidden" name="pluginname" value="%1$s" id="pluginname"/>\r\n         <input type="hidden" name="pluginid" value="%2$s" id="pluginid"/>\r\n         <p><label for="">Tytuł:</label></p>\r\n         <input type="text" name="title" value="%3$s" />\r\n         <p><label for="">Szerokość geograficzna:</label></p>\r\n         <input type="text" name="latitude" value="%4$s" />\r\n         <small>Format 1234.32</small>\r\n         <p><label for="">Długość geograficzna:</label></p>\r\n         <input type="text" name="longitude" value="%5$s" />\r\n         <small>Format 1234.56</small>\r\n         </div>\r\n         <div class="widget-control-actions">\r\n            <div class="alignleft">\r\n            <a class="widget-control-remove" href="#remove">Usuń</a>\r\n            |\r\n            <a class="widget-control-close" href="#close">Zamknij</a>\r\n            </div>\r\n            <div class="alignright">\r\n            <img class="ajax-feedback" alt="" title="" src="http://localhost/wordpress/wp-admin/images/wpspin_light.gif" style="visibility: hidden;">\r\n            <input id="widget-pages-2-savewidget" class="button-primary widget-control-save" type="submit" value="Zapisz" name="savewidget">\r\n            </div>\r\n            <br class="clear">\r\n          </div>\r\n         </div>\r\n         </form>\r\n         </div>\r\n      </div>', 'a:5:{s:10:"pluginname";s:9:"googlemap";s:8:"pluginid";s:11:"googlemap_1";s:5:"title";s:11:"Mapa Google";s:8:"latitude";s:3:"0.0";s:9:"longitude";s:3:"0.0";}', 1),
(9, 'contactform', '<div class="plugin-portlet" id="contact-form">\r\n         <div class="portlet-header">Formularz kontaktowy</div>\r\n         <div class="portlet-content">\r\n         <p>Formularz kontaktowy umożliwia wysłanie wiadmości przez odwiedzającego stronę. Możliwe są wywołania bezpośredni w treśći poprzez tagi [[contactform=basik]]\r\n          lub [[contactform=extended]]</p>\r\n         <div class="widget-inside">\r\n         <form method="post" action="plugins.php?update=1" name="widgetoptionsform">\r\n         <div class="options">\r\n         <input type="hidden" name="pluginname" value="%1$s" id="pluginname"/>\r\n         <input type="hidden" name="pluginid" value="%2$s" id="pluginid"/>\r\n         <p><label for="">Tytuł:</label></p>\r\n         <input type="text" name="title" value="%3$s" />\r\n         <p><label for="">Typ formularza:</label></p>\r\n         <select id="" class="widefat" name="contactform">\r\n          <option value="basic">Podstawowy</option>\r\n          <option value="extended">Rozszerzony</option>\r\n         </select>\r\n         </div>\r\n         <div class="widget-control-actions">\r\n            <div class="alignleft">\r\n            <a class="widget-control-remove" href="#remove">Usuń</a>\r\n            |\r\n            <a class="widget-control-close" href="#close">Zamknij</a>\r\n            </div>\r\n            <div class="alignright">\r\n            <img class="ajax-feedback" alt="" title="" src="http://localhost/wordpress/wp-admin/images/wpspin_light.gif" style="visibility: hidden;">\r\n            <input id="widget-pages-2-savewidget" class="button-primary widget-control-save" type="submit" value="Zapisz" name="savewidget">\r\n            </div>\r\n            <br class="clear">\r\n          </div>\r\n         </div>\r\n         </form>\r\n         </div>\r\n      </div>', 'a:4:{s:10:"pluginname";s:11:"contactform";s:8:"pluginid";s:13:"contactform_1";s:5:"title";s:20:"Formularz kontaktowy";s:6:"select";a:2:{s:4:"name";s:11:"contactform";s:8:"selected";s:5:"basic";}}', 1),
(10, 'menutree', '<div class="plugin-portlet" id="menutree">\r\n         <div class="portlet-header">Menu dodatkowe</div>\r\n         <div class="portlet-content">\r\n         <p>Menu pomocnicze. Możliwe do wywołania w treśći poprzez tagi [[menutree=current]] lub [[menutree=full]]</p>\r\n         <div class="widget-inside">\r\n         <form method="post" action="plugins.php?update=1" name="widgetoptionsform">\r\n           <input type="hidden" name="pluginname" value="%1$s" id="pluginname"/>\r\n           <input type="hidden" name="pluginid" value="%2$s" id="pluginid"/>\r\n         <div class="options">\r\n         <p><label for="">Tytuł:</label></p>\r\n         <input type="text" name="title" value="%3$s" />\r\n         <p><label for="">Rodzaj menu:</label></p>\r\n         <select id="" class="widefat" name="menutree">\r\n          <option value="full">Pełne menu</option>\r\n          <option value="current">Podmenu dla aktywnej strony</option>\r\n           \r\n         </select>\r\n         </div>\r\n         <div class="widget-control-actions">\r\n            <div class="alignleft">\r\n            <a class="widget-control-remove" href="#remove">Usuń</a>\r\n            |\r\n            <a class="widget-control-close" href="#close">Zamknij</a>\r\n            </div>\r\n            <div class="alignright">\r\n            <img class="ajax-feedback" alt="" title="" src="http://localhost/wordpress/wp-admin/images/wpspin_light.gif" style="visibility: hidden;">\r\n            <input id="widget-pages-2-savewidget" class="button-primary widget-control-save" type="submit" value="Zapisz" name="savewidget">\r\n            </div>\r\n            <br class="clear">\r\n          </div>\r\n         </div>\r\n         </form>\r\n         </div>\r\n      </div>', 'a:4:{s:10:"pluginname";s:8:"menutree";s:8:"pluginid";s:10:"menutree_1";s:5:"title";s:15:"Menu pomocnicze";s:6:"select";a:2:{s:4:"name";s:8:"menutree";s:8:"selected";s:4:"full";}}', 1),
(11, 'portfoliocategory', '<div class="plugin-portlet" id="portfoliocategory">\r\n         <div class="portlet-header">Portfolio</div>\r\n         <div class="portlet-content">\r\n         <p>Portfolio pokazuje miniatury zdjęć lub produktów z portfolio dla wybranej kategorii. </p>\r\n         <div class="widget-inside">\r\n         <form method="post" action="plugins.php?update=1" name="widgetoptionsform">\r\n         <input type="hidden" name="pluginname" value="%1$s" id="pluginname"/>\r\n         <input type="hidden" name="pluginid" value="%2$s" id="pluginid"/>\r\n         <div class="options">\r\n         <p><label for="">Tytuł:</label></p>\r\n         <input type="text" name="title" value="%3$s" />\r\n         <p><label for="">Pokaż najnowsze zdjęcia z wybranej kategorii:</label></p>\r\n         <select id="" class="widefat" name="portfoliocategory">\r\n          %4$s\r\n         </select>\r\n         <p><label for="">Ilość miniatur:</label></p>\r\n         <input type="text" name="limit" value="%5$s" />\r\n        \r\n         </div>\r\n         <div class="widget-control-actions">\r\n            <div class="alignleft">\r\n            <a class="widget-control-remove" href="#remove">Usuń</a>\r\n            |\r\n            <a class="widget-control-close" href="#close">Zamknij</a>\r\n            </div>\r\n            <div class="alignright">\r\n            <img class="ajax-feedback" alt="" title="" src="http://localhost/wordpress/wp-admin/images/wpspin_light.gif" style="visibility: hidden;">\r\n            <input id="widget-pages-2-savewidget" class="button-primary widget-control-save" type="submit" value="Zapisz" name="savewidget">\r\n            </div>\r\n            <br class="clear">\r\n          </div>\r\n         </div>\r\n         </form>\r\n         </div>\r\n     </div>', 'a:5:{s:10:"pluginname";s:17:"portfoliocategory";s:8:"pluginid";s:19:"portfoliocategory_1";s:5:"title";s:9:"Portfolio";s:6:"select";a:2:{s:4:"name";s:17:"portfoliocategory";s:8:"selected";s:2:"-1";}s:5:"limit";s:1:"4";}', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `mvcms_default_settings`
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
('activation_email', 'Activation Email', 'Send out an e-mail when a user signs up with an activation link. Disable this to let only admins activate accounts.', 'radio', '1', '', '1=Enabled|0=Disabled', 0, 1, 'users', 908),
('addons_upload', 'Addons Upload Permissions', 'Keeps mere admins from uploading addons by default', 'text', '0', '1', '', 1, 0, '', 0),
('admin_force_https', 'Force HTTPS for Control Panel?', 'Allow only the HTTPS protocol when using the Control Panel?', 'radio', '0', '', '1=Yes|0=No', 1, 1, '', 956),
('admin_theme', 'Control Panel Theme', 'Select the theme for the control panel.', '', '', 'pyrocms', 'func:get_themes', 1, 0, '', 0),
('akismet_api_key', 'Akismet API Key', 'Akismet is a spam-blocker from the WordPress team. It keeps spam under control without forcing users to get past human-checking CAPTCHA forms.', 'text', '', '', '', 0, 1, 'integration', 950),
('api_enabled', 'API Enabled', 'Allow API access to all modules which have an API controller.', 'select', '0', '0', '0=Disabled|1=Enabled', 0, 0, 'api', 0),
('api_user_keys', 'API User Keys', 'Allow users to sign up for API keys (if the API is Enabled).', 'select', '0', '0', '0=Disabled|1=Enabled', 0, 0, 'api', 0),
('auto_username', 'Auto Username', 'Create the username automatically, meaning users can skip making one on registration.', 'radio', '1', '', '1=Enabled|0=Disabled', 0, 1, 'users', 911),
('cdn_domain', 'CDN Domain', 'CDN domains allow you to offload static content to various edge servers, like Amazon CloudFront or MaxCDN.', 'text', '', '', '', 0, 1, 'integration', 955),
('ckeditor_config', 'CKEditor Config', 'You can find a list of valid configuration items in <a target="_blank" href="http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.config.html">CKEditor''s documentation.</a>', 'textarea', '', '{{# this is the config for all wysiwyg-simple textareas #}}\n$(''textarea.wysiwyg-simple'').ckeditor({\n	toolbar: [\n		[''Bold'', ''Italic'', ''-'', ''NumberedList'', ''BulletedList'', ''-'', ''Link'', ''Unlink'']\n	  ],\n	width: ''99%'',\n	height: 100,\n	dialog_backgroundCoverColor: ''#000'',\n	defaultLanguage: ''{{ helper:config item="default_language" }}'',\n	language: ''{{ global:current_language }}''\n});\n\n{{# this is a wysiwyg-simple editor customized for the blog module (it allows images to be inserted) #}}\n$(''textarea.blog.wysiwyg-simple'').ckeditor({\n	toolbar: [\n		[''pyroimages''],\n		[''Bold'', ''Italic'', ''-'', ''NumberedList'', ''BulletedList'', ''-'', ''Link'', ''Unlink'']\n	  ],\n	extraPlugins: ''pyroimages'',\n	width: ''99%'',\n	height: 100,\n	dialog_backgroundCoverColor: ''#000'',\n	defaultLanguage: ''{{ helper:config item="default_language" }}'',\n	language: ''{{ global:current_language }}''\n});\n\n{{# and this is the advanced editor #}}\n$(''textarea.wysiwyg-advanced'').ckeditor({\n	toolbar: [\n		[''Maximize''],\n		[''pyroimages'', ''pyrofiles''],\n		[''Cut'',''Copy'',''Paste'',''PasteFromWord''],\n		[''Undo'',''Redo'',''-'',''Find'',''Replace''],\n		[''Link'',''Unlink''],\n		[''Table'',''HorizontalRule'',''SpecialChar''],\n		[''Bold'',''Italic'',''StrikeThrough''],\n		[''JustifyLeft'',''JustifyCenter'',''JustifyRight'',''JustifyBlock'',''-'',''BidiLtr'',''BidiRtl''],\n		[''Format'', ''FontSize'', ''Subscript'',''Superscript'', ''NumberedList'',''BulletedList'',''Outdent'',''Indent'',''Blockquote''],\n		[''ShowBlocks'', ''RemoveFormat'', ''Source'']\n	],\n	extraPlugins: ''pyroimages,pyrofiles'',\n	width: ''99%'',\n	height: 400,\n	dialog_backgroundCoverColor: ''#000'',\n	removePlugins: ''elementspath'',\n	defaultLanguage: ''{{ helper:config item="default_language" }}'',\n	language: ''{{ global:current_language }}''\n});', '', 1, 1, 'wysiwyg', 934),
('comment_markdown', 'Allow Markdown', 'Do you want to allow visitors to post comments using Markdown?', 'select', '0', '0', '0=Text Only|1=Allow Markdown', 1, 1, 'comments', 914),
('comment_order', 'Comment Order', 'Sort order in which to display comments.', 'select', 'ASC', 'ASC', 'ASC=Oldest First|DESC=Newest First', 1, 1, 'comments', 917),
('contact_email', 'Contact E-mail', 'All e-mails from users, guests and the site will go to this e-mail address.', 'text', 'admin@admin.pl', '', '', 1, 1, 'email', 933),
('currency', 'Currency', 'The currency symbol for use on products, services, etc.', 'text', '&pound;', '', '', 1, 1, '', 971),
('dashboard_rss', 'Dashboard RSS Feed', 'Link to an RSS feed that will be displayed on the dashboard.', 'text', 'http://feeds.feedburner.com/pyrocms-installed', '', '', 0, 1, '', 960),
('dashboard_rss_count', 'Dashboard RSS Items', 'How many RSS items would you like to display on the dashboard?', 'text', '5', '5', '', 1, 1, '', 959),
('date_format', 'Date Format', 'How should dates be displayed across the website and control panel? Using the <a target=\\"_blank\\" href=\\"http://php.net/manual/en/function.date.php\\">date format</a> from PHP - OR - Using the format of <a target=\\"_blank\\" href=\\"http://php.net/manual/en/function.strftime.php\\">strings formatted as date</a> from PHP.', 'text', 'Y-m-d', '', '', 1, 1, '', 972),
('default_theme', 'Default Theme', 'Select the theme you want users to see by default.', '', 'default', 'default', 'func:get_themes', 1, 0, '', 0),
('enable_comments', 'Enable Comments', 'Enable comments.', 'radio', '1', '1', '1=Enabled|0=Disabled', 1, 1, 'comments', 919),
('enable_profiles', 'Enable profiles', 'Allow users to add and edit profiles.', 'radio', '1', '', '1=Enabled|0=Disabled', 1, 1, 'users', 907),
('enable_registration', 'Enable user registration', 'Allow users to register in your site.', 'radio', '1', '', '1=Enabled|0=Disabled', 0, 1, 'users', 906),
('files_cache', 'Files Cache', 'When outputting an image via site.com/files what shall we set the cache expiration for?', 'select', '480', '480', '0=no-cache|1=1-minute|60=1-hour|180=3-hour|480=8-hour|1440=1-day|43200=30-days', 1, 1, 'files', 942),
('files_cf_api_key', 'Rackspace Cloud Files API Key', 'You also must provide your Cloud Files API Key. You will find it at the same location as your Username in your Rackspace account.', 'text', '', '', '', 0, 1, 'files', 944),
('files_cf_username', 'Rackspace Cloud Files Username', 'To enable cloud file storage in your Rackspace Cloud Files account please enter your Cloud Files Username. <a href=\\"https://manage.rackspacecloud.com/APIAccess.do\\">Find your credentials</a>', 'text', '', '', '', 0, 1, 'files', 945),
('files_enabled_providers', 'Enabled File Storage Providers', 'Which file storage providers do you want to enable? (If you enable a cloud provider you must provide valid auth keys below', 'checkbox', '0', '0', 'amazon-s3=Amazon S3|rackspace-cf=Rackspace Cloud Files', 0, 1, 'files', 949),
('files_s3_access_key', 'Amazon S3 Access Key', 'To enable cloud file storage in your Amazon S3 account provide your Access Key. <a href=\\"https://aws-portal.amazon.com/gp/aws/securityCredentials#access_credentials\\">Find your credentials</a>', 'text', '', '', '', 0, 1, 'files', 948),
('files_s3_secret_key', 'Amazon S3 Secret Key', 'You also must provide your Amazon S3 Secret Key. You will find it at the same location as your Access Key in your Amazon account.', 'text', '', '', '', 0, 1, 'files', 947),
('files_s3_url', 'Amazon S3 URL', 'You may need to change this if using one of Amazon''s UK locations.', 'text', 'http://{{ bucket }}.s3.amazonaws.com/', 'http://{{ bucket }}.s3.amazonaws.com/', '', 0, 1, 'files', 946),
('files_upload_limit', 'Filesize Limit', 'Maximum filesize to allow when uploading. Specify the size in MB. Example: 5', 'text', '5', '5', '', 1, 1, 'files', 943),
('frontend_enabled', 'Site Status', 'Use this option to the user-facing part of the site on or off. Useful when you want to take the site down for maintenance.', 'radio', '1', '', '1=Open|0=Closed', 1, 1, '', 958),
('ga_email', 'Google Analytic E-mail', 'E-mail address used for Google Analytics, we need this to show the graph on the dashboard.', 'text', '', '', '', 0, 1, 'integration', 952),
('ga_password', 'Google Analytic Password', 'This is also needed this to show the graph on the dashboard.', 'text', '', '', '', 0, 1, 'integration', 951),
('ga_profile', 'Google Analytic Profile ID', 'Profile ID for this website in Google Analytics', 'text', '', '', '', 0, 1, 'integration', 953),
('ga_tracking', 'Google Tracking Code', 'Enter your Google Analytic Tracking Code to activate Google Analytics view data capturing. E.g: UA-19483569-6', 'text', '', '', '', 0, 1, 'integration', 954),
('mail_protocol', 'Mail Protocol', 'Select desired email protocol.', 'select', 'mail', 'mail', 'mail=Mail|sendmail=Sendmail|smtp=SMTP', 1, 1, 'email', 931),
('mail_sendmail_path', 'Sendmail Path', 'Path to server sendmail binary.', 'text', '', '', '', 0, 1, 'email', 923),
('mail_smtp_host', 'SMTP Host Name', 'The host name of your smtp server.', 'text', '', '', '', 0, 1, 'email', 927),
('mail_smtp_pass', 'SMTP password', 'SMTP password.', 'password', '', '', '', 0, 1, 'email', 926),
('mail_smtp_port', 'SMTP Port', 'SMTP port number.', 'text', '', '', '', 0, 1, 'email', 925),
('mail_smtp_user', 'SMTP User Name', 'SMTP user name.', 'text', '', '', '', 0, 1, 'email', 924),
('meta_topic', 'Meta Topic', 'Two or three words describing this type of company/website.', 'text', 'Content Management', 'Add your slogan here', '', 0, 1, '', 998),
('moderate_comments', 'Moderate Comments', 'Force comments to be approved before they appear on the site.', 'radio', '1', '1', '1=Enabled|0=Disabled', 1, 1, 'comments', 918),
('records_per_page', 'Records Per Page', 'How many records should we show per page in the admin section?', 'select', '25', '', '10=10|25=25|50=50|100=100', 1, 1, '', 970),
('registered_email', 'User Registered Email', 'Send a notification email to the contact e-mail when someone registers.', 'radio', '1', '', '1=Enabled|0=Disabled', 0, 1, 'users', 910),
('require_lastname', 'Require last names?', 'For some situations, a last name may not be required. Do you want to force users to enter one or not?', 'radio', '1', '', '1=Required|0=Optional', 1, 1, 'users', 909),
('rss_feed_items', 'Feed item count', 'How many items should we show in RSS/blog feeds?', 'select', '25', '', '10=10|25=25|50=50|100=100', 1, 1, '', 965),
('server_email', 'Server E-mail', 'All e-mails to users will come from this e-mail address.', 'text', 'admin@localhost', '', '', 1, 1, 'email', 932),
('site_lang', 'Site Language', 'The native language of the website, used to choose templates of e-mail notifications, contact form, and other features that should not depend on the language of a user.', 'select', 'en', 'en', 'func:get_supported_lang', 1, 1, '', 997),
('site_name', 'Site Name', 'The name of the website for page titles and for use around the site.', 'text', 'Un-named Website', '', '', 1, 1, '', 1000),
('site_public_lang', 'Public Languages', 'Which are the languages really supported and offered on the front-end of your website?', 'checkbox', 'en', 'en', 'func:get_supported_lang', 1, 1, '', 973),
('site_slogan', 'Site Slogan', 'The slogan of the website for page titles and for use around the site', 'text', '', 'Add your slogan here', '', 0, 1, '', 999),
('twitter_cache', 'Cache time', 'How many minutes should your Tweets be stored?', 'text', '300', '', '', 0, 1, 'twitter', 920),
('twitter_feed_count', 'Feed Count', 'How many tweets should be returned to the Twitter feed block?', 'text', '5', '', '', 0, 1, 'twitter', 921),
('twitter_username', 'Username', 'Twitter username.', 'text', '', '', '', 0, 1, 'twitter', 922),
('unavailable_message', 'Unavailable Message', 'When the site is turned off or there is a major problem, this message will show to users.', 'textarea', 'Sorry, this website is currently unavailable.', '', '', 0, 1, '', 957);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `user_id` int(11) NOT NULL,
  `userroles` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `test`
--

INSERT INTO `test` (`user_id`, `userroles`) VALUES
(1, NULL),
(1, 'Dog'),
(1, 'Dog');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
