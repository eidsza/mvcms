-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 05 Sie 2012, 21:05
-- Wersja serwera: 5.5.16
-- Wersja PHP: 5.3.8

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
-- Struktura tabeli dla  `mvcms_acl_user_permissions`
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
-- Struktura tabeli dla  `mvcms_acl_user_resources`
--

CREATE TABLE IF NOT EXISTS `mvcms_acl_user_resources` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `parentId` int(11) DEFAULT NULL,
  `default` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Zrzut danych tabeli `mvcms_acl_user_resources`
--

INSERT INTO `mvcms_acl_user_resources` (`id`, `name`, `description`, `parentId`, `default`) VALUES
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
-- Struktura tabeli dla  `mvcms_acl_user_roles`
--

CREATE TABLE IF NOT EXISTS `mvcms_acl_user_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `short_desc` varchar(255) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `parentId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Zrzut danych tabeli `mvcms_acl_user_roles`
--

INSERT INTO `mvcms_acl_user_roles` (`id`, `name`, `short_desc`, `desc`, `parentId`) VALUES
(1, 'Administrator', 'Administratorzy', '', NULL),
(2, 'Moderator stron', 'Moderator treści stron', '', NULL),
(3, 'Moderator własnych stron', 'Moderator treści własnych stron', '', NULL),
(4, 'Użytkownicy', 'Zarejestrowani użytkownicy', 'Zarejestrowani użytkownicy', NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `mvcms_acl_user_role_group`
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
-- Struktura tabeli dla  `mvcms_active_guests`
--

CREATE TABLE IF NOT EXISTS `mvcms_active_guests` (
  `ip` varchar(15) NOT NULL,
  `timestamp` int(11) unsigned NOT NULL,
  PRIMARY KEY (`ip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `mvcms_active_users`
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
('admin', 1344104502);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `mvcms_banned_users`
--

CREATE TABLE IF NOT EXISTS `mvcms_banned_users` (
  `username` varchar(30) NOT NULL,
  `timestamp` int(11) unsigned NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Struktura tabeli dla  `mvcms_langs`
--

CREATE TABLE IF NOT EXISTS `mvcms_langs` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `symbol` varchar(2) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `name` varchar(128) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `isVisibleInMenu` tinyint(1) NOT NULL DEFAULT '1',
  `isVisibleFlag` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `mvcms_langs`
--

INSERT INTO `mvcms_langs` (`id`, `symbol`, `name`, `isActive`, `isVisibleInMenu`, `isVisibleFlag`) VALUES
(1, 'pl', 'Polski', 1, 0, 0),
(2, 'en', 'English', 1, 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `mvcms_menu`
--

CREATE TABLE IF NOT EXISTS `mvcms_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(512) COLLATE utf8_polish_ci NOT NULL,
  `tech_name` varchar(512) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=28 ;

--
-- Zrzut danych tabeli `mvcms_menu`
--

INSERT INTO `mvcms_menu` (`id`, `name`, `tech_name`) VALUES
(1, 'Menu główne', 'main-menu'),
(12, 'Menu Stopki', 'custom-menu'),
(13, 'Menu Prawe', 'custom-menu'),
(14, 'Menu Lewe 1', 'custom-menu'),
(15, 'Menu Lewe 2', 'custom-menu'),
(18, 'Nowe menu', 'custom-menu'),
(22, 'Nowe menu', 'custom-menu'),
(23, 'Nowe menu', 'custom-menu'),
(25, 'Nowe menu', 'custom-menu'),
(26, 'Nowe menu', 'custom-menu'),
(27, 'admin', 'custom-menu');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `mvcms_menu_pages`
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
  `info` varchar(128) COLLATE utf8_polish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=241 ;

--
-- Zrzut danych tabeli `mvcms_menu_pages`
--

INSERT INTO `mvcms_menu_pages` (`id`, `fk_menu_id`, `fk_page_id`, `page_link`, `lft`, `rgt`, `depth`, `parent`, `page_type`, `info`) VALUES
(1, 1, 0, 'index.php', 1, 14, 0, NULL, 'rootpage', 'root'),
(208, 1, 35, 'index.php?pid=35', 8, 9, 1, 0, 'page', ''),
(209, 12, 0, 'index.php', 1, 6, 0, NULL, 'rootpage', 'root'),
(210, 12, 35, 'index.php?pid=35', 2, 3, 1, 0, 'page', ''),
(211, 12, NULL, 'http://google.pl', 4, 5, 1, 0, 'link', 'customlink'),
(212, 1, 36, 'index.php?pid=36', 2, 3, 1, 0, 'page', ''),
(213, 1, 37, 'index.php?pid=37', 6, 7, 1, 0, 'page', ''),
(214, 1, 38, 'index.php?pid=38', 10, 11, 1, 0, 'page', ''),
(215, 1, 39, 'index.php?pid=39', 4, 5, 1, 0, 'page', ''),
(216, 13, 0, 'index.php', 1, 4, 0, 0, 'rootpage', 'root'),
(217, 1, NULL, 'http://gggg', 12, 13, 1, 0, 'link', 'customlink'),
(218, 14, 0, 'index.php', 1, 16, 0, 0, 'rootpage', 'root'),
(219, 15, 0, 'index.php', 1, 4, 0, 0, 'rootpage', 'root'),
(220, 13, 39, 'index.php?pid=39', 2, 3, 1, 0, 'page', ''),
(221, 14, 35, 'index.php?pid=35', 2, 3, 1, 0, 'page', ''),
(222, 15, 36, 'index.php?pid=36', 2, 3, 1, 219, 'page', ''),
(223, 14, 39, 'index.php?pid=39', 4, 5, 1, 0, 'page', ''),
(224, 14, 35, 'index.php?pid=35', 6, 7, 1, 0, 'page', ''),
(225, 14, 36, 'index.php?pid=36', 8, 9, 1, 0, 'page', ''),
(226, 14, 37, 'index.php?pid=37', 10, 11, 1, 0, 'page', ''),
(227, 14, 40, 'index.php?pid=40', 12, 13, 1, 0, 'page', ''),
(228, 14, 41, 'index.php?pid=41', 14, 15, 1, 218, 'page', ''),
(231, 18, 0, 'index.php', 1, 2, 0, NULL, 'rootpage', 'root'),
(235, 22, 0, 'index.php', 1, 2, 0, NULL, 'rootpage', 'root'),
(236, 23, 0, 'index.php', 1, 2, 0, NULL, 'rootpage', 'root'),
(238, 25, 0, 'index.php', 1, 2, 0, NULL, 'rootpage', 'root'),
(239, 26, 0, 'index.php', 1, 2, 0, NULL, 'rootpage', 'root'),
(240, 27, 0, 'index.php', 1, 2, 0, NULL, 'rootpage', 'root');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `mvcms_menu_pages_translations`
--

CREATE TABLE IF NOT EXISTS `mvcms_menu_pages_translations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_menu_pages_id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `title` varchar(256) COLLATE utf8_polish_ci NOT NULL,
  `menu_ln` varchar(2) CHARACTER SET utf8 NOT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=391 ;

--
-- Zrzut danych tabeli `mvcms_menu_pages_translations`
--

INSERT INTO `mvcms_menu_pages_translations` (`id`, `fk_menu_pages_id`, `name`, `title`, `menu_ln`, `is_visible`) VALUES
(357, 208, 'Kontakt', 'Kontakt z nami', 'pl', 1),
(358, 208, 'Kontakt', 'Kontakt z nami', 'en', 1),
(359, 210, 'Kontakt', 'Kontakt z nami', 'pl', 1),
(360, 210, 'Kontakt', 'Kontakt z nami', 'en', 1),
(361, 211, 'Google', 'Google', 'pl', 1),
(362, 211, 'Google', 'Google', 'en', 1),
(363, 212, 'Witamy', 'Witamy', 'pl', 1),
(364, 212, 'Witamy', 'Witamy', 'en', 1),
(365, 213, 'Rodzaje badań', 'Rodzaje badań', 'pl', 1),
(366, 213, 'Wyniki', 'Rodzaje badań', 'en', 1),
(367, 214, 'Aktualności', 'Aktualności', 'pl', 1),
(368, 214, 'news', 'Aktualności', 'en', 1),
(369, 215, 'galeria', 'Galeria', 'pl', 1),
(370, 215, 'galeria', 'Galeria', 'en', 1),
(371, 217, 'asdfasdf', 'asdfasdf', 'pl', 0),
(372, 217, 'asdfasdf', 'asdfasdf', 'en', 1),
(373, 220, 'galeria', 'Galeria', 'pl', 1),
(374, 220, 'galeria', 'Galeria', 'en', 1),
(375, 221, 'Kontakt', 'Kontakt z nami', 'pl', 1),
(376, 221, 'Kontakt', 'Kontakt z nami', 'en', 1),
(377, 222, 'Witamy', 'Witamy', 'pl', 1),
(378, 222, 'Witamy', 'Witamy', 'en', 1),
(379, 223, 'galeria', 'Galeria', 'pl', 1),
(380, 223, 'galeria', 'Galeria', 'en', 1),
(381, 224, 'Kontakt', 'Kontakt z nami', 'pl', 1),
(382, 224, 'Kontakt', 'Kontakt z nami', 'en', 1),
(383, 225, 'Witamy', 'Witamy', 'pl', 1),
(384, 225, 'Witamy', 'Witamy', 'en', 1),
(385, 226, 'Wyniki', 'Rodzaje badań', 'pl', 1),
(386, 226, 'Wyniki', 'Rodzaje badań', 'en', 1),
(387, 227, 'formularz', 'Formularz', 'pl', 1),
(388, 227, 'formularz', 'Formularz', 'en', 1),
(389, 228, 'dddddd', 'afasdfasdfasdf', 'pl', 1),
(390, 228, 'dddddd', 'afasdfasdfasdf', 'en', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `mvcms_pages`
--

CREATE TABLE IF NOT EXISTS `mvcms_pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `date_insert` datetime NOT NULL,
  `date_update` datetime NOT NULL,
  `username` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `acl_role` varchar(20) COLLATE utf8_polish_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=96 ;

--
-- Zrzut danych tabeli `mvcms_pages`
--

INSERT INTO `mvcms_pages` (`id`, `name`, `date_insert`, `date_update`, `username`, `acl_role`, `is_active`) VALUES
(88, 'Strona testowa', '2012-08-03 14:17:53', '2012-08-03 21:10:25', 'admin', '1|2', 1),
(89, 'Druga strona', '2012-08-03 14:19:06', '2012-08-03 14:19:06', 'admin', '0', 1),
(90, 'jeszcze jeden test', '2012-08-03 14:21:32', '2012-08-03 14:21:32', 'admin', '0', 1),
(91, 'kolejna', '2012-08-03 14:22:46', '2012-08-03 14:22:46', 'admin', '0', 1),
(92, 'i jeszcze jedna', '2012-08-03 14:24:16', '2012-08-03 14:24:16', 'admin', '0', 1),
(93, 'a teraz nie glowna', '2012-08-03 14:24:29', '2012-08-03 15:08:33', 'admin', '0', 1),
(94, 'i ostatni test', '2012-08-03 14:24:47', '2012-08-03 14:24:47', 'admin', '0', 1),
(95, 'asdfasdfasdfasdf', '2012-08-03 14:27:03', '2012-08-03 15:03:51', 'admin', '0', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `mvcms_page_translations`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=172 ;

--
-- Zrzut danych tabeli `mvcms_page_translations`
--

INSERT INTO `mvcms_page_translations` (`id`, `fk_page_id`, `page_title`, `page_slug`, `page_ln`, `is_visible`, `is_main`, `date_publish`, `date_update`, `page_precontent`, `page_content`, `page_meta_title`, `page_meta_keywords`, `page_meta_description`, `page_comments`) VALUES
(156, 88, 'Strona testowa', 'strona-testowa', 'pl', 1, 0, '2012-08-03 00:00:00', '2012-08-03 21:10:25', '', '', '', '', '', 1),
(157, 88, 'Strona testowa', 'strona-testowa', 'en', 1, 0, '2012-08-03 00:00:00', '2012-08-03 14:17:53', '', '', '', '', '', 0),
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
(170, 95, 'Nowy tytuł strony', 'nowy-tytul-strony', 'pl', 1, 0, '2012-08-03 00:00:00', '2012-08-03 15:03:51', '', '', '', '', '', 0),
(171, 95, 'asdfasdfasdfasdf', 'asdfasdfasdfasdf', 'en', 1, 0, '2012-08-03 00:00:00', '2012-08-03 14:27:03', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `mvcms_template_modules`
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
(19, 'zwrotpodatku', 'menu', 'custom_menu_4', 'Menu Lewe 2', 15);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `mvcms_users`
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
  `email` varchar(50) DEFAULT NULL,
  `timestamp` int(11) unsigned NOT NULL,
  `actkey` varchar(35) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `regdate` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Zrzut danych tabeli `mvcms_users`
--

INSERT INTO `mvcms_users` (`id`, `username`, `password`, `firstname`, `lastname`, `usersalt`, `userid`, `userlevel`, `email`, `timestamp`, `actkey`, `ip`, `regdate`) VALUES
(1, 'admin', '56debb4ccc8e74601de80ed40c089b9e3a9ae68e', 'Daniel', 'Szantar', 'XpmIUwXe', '8d9e76922c5be57f91b0b061e8a72610', 9, 'eidsza@tlen.pl', 1344104502, 'I7pHII6t1J2x7NJQ', '::1', 1340616079),
(19, 'Daniel', '7b70496633ba65b360c69a0c5e86dde7a52139db', 'Daniel', 'Szantar', 'RSb8v7yT', '0', 1, 'eidsza@tlen.pl', 1340967007, 'T12YUaSdGz4je2Bh', '::1', 1340967007);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
