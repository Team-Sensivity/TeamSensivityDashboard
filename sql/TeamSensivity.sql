-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: sensivity
-- Erstellungszeit: 02. Jan 2023 um 06:30
-- Server-Version: 10.7.1-MariaDB-1:10.7.1+maria~focal
-- PHP-Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `TeamSensivity`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bot`
--

CREATE TABLE `bot` (
  `id` int(10) UNSIGNED NOT NULL,
  `logo_url` varchar(255) NOT NULL,
  `guild_id` varchar(255) NOT NULL,
  `discord_role` varchar(255) NOT NULL,
  `game_role` varchar(255) NOT NULL,
  `dashboard_role` varchar(255) NOT NULL,
  `cmd_login_on` int(11) NOT NULL DEFAULT 0,
  `cmd_connect_on` int(11) NOT NULL DEFAULT 0,
  `cmd_points_on` int(11) NOT NULL DEFAULT 0,
  `cmd_swf_on` int(11) NOT NULL DEFAULT 0,
  `cmd_token_on` int(11) NOT NULL DEFAULT 0,
  `cmd_music_on` int(11) NOT NULL DEFAULT 0,
  `cmd_daily_on` int(11) NOT NULL DEFAULT 0,
  `chill_create` int(11) NOT NULL DEFAULT 0,
  `punktesystem` int(11) NOT NULL DEFAULT 0,
  `syncSystem` int(11) NOT NULL DEFAULT 0,
  `DBD_PROFILE_ID` varchar(255) DEFAULT NULL,
  `DBD_FIND_SWF` varchar(255) NOT NULL,
  `chill_channel` varchar(225) NOT NULL,
  `chill_cat` varchar(225) NOT NULL,
  `announcements` varchar(255) NOT NULL,
  `user_online` int(11) NOT NULL DEFAULT 0,
  `user_count` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `bot`
--

INSERT INTO `bot` (`id`, `logo_url`, `guild_id`, `discord_role`, `game_role`, `dashboard_role`, `cmd_login_on`, `cmd_connect_on`, `cmd_points_on`, `cmd_swf_on`, `cmd_token_on`, `cmd_music_on`, `cmd_daily_on`, `chill_create`, `punktesystem`, `syncSystem`, `DBD_PROFILE_ID`, `DBD_FIND_SWF`, `chill_channel`, `chill_cat`, `announcements`, `user_online`, `user_count`) VALUES
(1, 'https://sensivity.team/bot/img/logo-transparent.png', '773995277840941067', '774003817347940373', '1000771948042797199', '1057996485133877319', 0, 1, 1, 0, 0, 1, 1, 1, 1, 1, '1010881220906852412', '1019490513725947985', '1040584326494031922', '774354036920418324', '1040990866606661672', 0, 125);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `dbd_chars`
--

CREATE TABLE `dbd_chars` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `rolle` varchar(255) NOT NULL,
  `pb` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `dbd_chars`
--

INSERT INTO `dbd_chars` (`id`, `name`, `rolle`, `pb`) VALUES
(1, 'Dwight Fairfield', 'Survivor', 'dwight'),
(2, 'Meg Thomas', 'Survivor', 'meg'),
(3, 'Claudette Morel', 'Survivor', 'claudette'),
(4, 'Jake Park', 'Survivor', 'jake'),
(5, 'William \"Bill\" Overbeck', 'Survivior', 'bill'),
(6, 'Nea Karlsson', 'Survivor', 'nea'),
(7, 'David King', 'Survivor', 'david'),
(8, 'Laurie Strode', 'Survivor', 'laurie'),
(9, 'Ace Visconi', 'Survivor', 'ace'),
(10, 'Feng Min', 'Survivor', 'feng'),
(11, 'Quentin Smith', 'Survivor', 'quentin'),
(12, 'Detective David Tapp', 'Survivor', 'tapp'),
(13, 'Kate Denson', 'Survivor', 'kate'),
(14, 'Adam Francis', 'Survivor', 'adam'),
(15, 'Jeffrey \"Jeff\" Johansen', 'Survivor', 'jeff'),
(16, 'Jane Romero', 'Survivor', 'jane'),
(17, 'Ashley J. Williams', 'Survivor', 'ashley'),
(18, 'Yui Kimura', 'Survivor', 'yui'),
(19, 'Zarina Kassir', 'Survivor', 'zarina'),
(20, 'Cheryl Mason', 'Survivor', 'cheryl'),
(21, 'Leon S. Kennedy', 'Survivor', 'leon'),
(22, 'Mikaela Reid', 'Survivor', 'mikaela'),
(23, 'Jonah Vasquez', 'Survivor', 'jonah'),
(24, 'Yoichi Asakawa', 'Survivor', 'yoichi'),
(25, 'Haddie Kaur', 'Survivor', 'haddie'),
(26, 'Felix Richter', 'Survivor', 'felix'),
(27, 'Elodie Rakoto', 'Survivor', 'elodie'),
(28, 'Yun-Jin Lee', 'Survivor', 'yun-jin'),
(29, 'Jill Valentine', 'Survivor', 'jill'),
(30, 'Nancy Wheeler', 'Survivor', 'nancy'),
(31, 'Steve Harrington', 'Survivor', 'steve'),
(32, 'Ada Wong', 'Survivor', 'ada'),
(33, 'Rebecca Chambers', 'Survivor', 'rebecca'),
(34, 'Vittorio Toscano', 'Survivor', 'vittorio'),
(35, 'The Trapper', 'Killer', 'trapper'),
(36, 'The Wraith', 'Killer', 'wraith'),
(37, 'The Hillbilly', 'Killer', 'hillbilly'),
(38, 'The Nurse', 'Killer', 'nurse'),
(39, 'The Shape', 'Killer', 'shape'),
(40, 'The Hag', 'Killer', 'hag'),
(41, 'The Doctor', 'Killer', 'doctor'),
(42, 'The Huntress', 'Killer', 'huntress'),
(43, 'The Cannibal', 'Killer', 'cannibal'),
(44, 'The Nightmare', 'Killer', 'nightmare'),
(45, 'The Pig', 'Killer', 'pig'),
(46, 'The Clown', 'Killer', 'clown'),
(47, 'The Spirit', 'Killer', 'spirit'),
(48, 'The Legion', 'Killer', 'legion'),
(49, 'The Plague', 'Killer', 'plague'),
(50, 'The Ghost Face', 'Killer', 'ghostface'),
(51, 'The Demogorgon', 'Killer', 'demogorgon'),
(52, 'The Oni', 'Killer', 'oni'),
(53, 'The Deathslinger', 'Killer', 'deathslinger'),
(54, 'The Executioner', 'Killer', 'executioner'),
(55, 'The Cenobite', 'Killer', 'cenobite'),
(56, 'The Blight', 'Killer', 'blight'),
(57, 'The Twins', 'Killer', 'twins'),
(58, 'The Trickster', 'Killer', 'trickster'),
(59, 'The Artist', 'Killer', 'artist'),
(60, 'The Onryo', 'Killer', 'onryo'),
(61, 'The Dredge', 'Killer', 'dredge'),
(62, 'The Mastermind', 'Killer', 'mastermind'),
(63, 'The Nemesis', 'Killer', 'nemesis'),
(64, 'The Knight', 'Killer', 'knight');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `discord_role`
--

CREATE TABLE `discord_role` (
  `id` int(11) NOT NULL,
  `role_id` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `role_position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `discord_role`
--

INSERT INTO `discord_role` (`id`, `role_id`, `color`, `role_name`, `role_position`) VALUES
(1, '986341971360641048', '#2ecc71', 'Team Sensivity', 38),
(2, '1034829494458007575', '#2ecc71', 'Team Sensivity', 37),
(3, '799744335939239976', '#2ecc71', 'TeamLeitung', 36),
(4, '1000841476969861132', '#9c1e1e', 'Datenschutzbeauftragter', 35),
(5, '1037181872402346005', '#c27c0e', 'Developer', 34),
(6, '1003405315607367750', '#1f8b4c', 'Grüner Notarzt', 33),
(7, '1012765376490258462', '#1f8b4c', 'Hodel', 32),
(8, '1000774425748189284', '#9b59b6', 'Streamer/Youtuber', 31),
(9, '822074360814108704', '#f47fff', 'Server Booster', 30),
(10, '1003413847882858636', '#ffb568', 'maxi max', 29),
(11, '1003413735685246987', '#f192c8', 'sammy sam', 28),
(12, '1000774810890150009', '#ad1457', 'Gamer', 27),
(13, '774003817347940373', '#3498db', 'Team Sensivity', 26),
(14, '1057996485133877319', '#71368a', 'Dashboard', 25),
(15, '925119317262098554', '#206694', 'Team Sensivity', 24),
(16, '826451670707863582', '#992d22', 'Kranke Menschen', 23),
(17, '1018955755417780224', '#c27c0e', 'LanParty', 22),
(18, '1004466368793555106', '#2ecc71', 'Bots', 21),
(19, '1004464679877357602', '#95a5a6', 'The Obsession', 20),
(20, '826998925537050644', '#95a5a6', '⠀⠀⠀⠀⠀⠀⠀🎥 TWITCH 🎥⠀⠀⠀⠀⠀⠀⠀', 19),
(21, '826998925537050647', '#c27c0e', 'Subscriber | Stufe 3', 18),
(22, '826998925537050646', '#c27c0e', 'Subscriber | Stufe 2', 17),
(23, '826998925537050645', '#c27c0e', 'Subscriber | Stufe 1', 16),
(24, '1000771948042797199', '#95a5a6', '⠀⠀⠀⠀⠀⠀⠀🎮 GAMES 🎮⠀⠀⠀⠀⠀⠀⠀', 15),
(25, '1058094256968966194', '#c27c0e', 'Vorsitzender - Betreutes Denken EV', 14),
(26, '1000773758086291496', '#a84300', 'League of Legends', 13),
(27, '1000773883160428584', '#a84300', 'Dead by Daylight', 12),
(28, '1000773942111379506', '#a84300', 'Fall Guys', 11),
(29, '1000774184609271839', '#a84300', 'Minecraft', 10),
(30, '1000775135193739264', '#a84300', 'Valorant', 9),
(31, '1000777996283682920', '#a84300', 'Space Engineers', 8),
(32, '1000778163091148840', '#a84300', 'ECO', 7),
(33, '1001078591787909133', '#a84300', 'Sea of Thieves', 6),
(34, '1016104142923649176', '#95a5a6', 'ChappyBot', 5),
(35, '1042890328887263294', '#95a5a6', 'Pipedream', 4),
(36, '1049392664556097598', '#95a5a6', 'Snowsgiving Bot', 3),
(37, '1052523152263086184', '#95a5a6', 'Premium Members', 2),
(38, '1052523156352536640', '#f47fff', 'Supporter ABO', 1),
(39, '773995277840941067', '#95a5a6', '@everyone', 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `eco_server`
--

CREATE TABLE `eco_server` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `datum` datetime NOT NULL DEFAULT current_timestamp(),
  `genehmigt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `eco_server`
--

INSERT INTO `eco_server` (`id`, `user_id`, `datum`, `genehmigt`) VALUES
(1, 1, '2022-10-05 08:07:08', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `karmasystem`
--

CREATE TABLE `karmasystem` (
  `id` int(11) NOT NULL,
  `moved` varchar(255) NOT NULL,
  `seconds` int(11) NOT NULL,
  `user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `league_turnier`
--

CREATE TABLE `league_turnier` (
  `id` int(11) NOT NULL,
  `turnier_name` varchar(255) NOT NULL,
  `team_size` int(11) NOT NULL,
  `pick_type` varchar(255) NOT NULL,
  `map_type` varchar(255) NOT NULL,
  `spec_type` varchar(255) NOT NULL,
  `provider_id` int(11) NOT NULL,
  `turnier_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `organisator` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `titel` varchar(255) NOT NULL,
  `text` longtext NOT NULL,
  `datum` date NOT NULL DEFAULT current_timestamp(),
  `tags` varchar(255) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `news`
--

INSERT INTO `news` (`id`, `titel`, `text`, `datum`, `tags`, `banner`, `author`) VALUES
(7, 'Frohe Weihnachten!!', '<p>@everyone Frohe Weihnachten euch allen!! Habt ein paar schÃƒÂ¶ne Tage mit eurer Familie!</p><p>Eure @TeamLeitung</p>', '2022-12-24', '1056247255851614298', 'https://sensivity.team/bot/img/weihnachten.png', '111'),
(8, 'Musik Bot', '<p>Der Musik Bot lÃƒÂ¤uft ab heute <b>nicht mehr</b>&nbsp', '2022-11-27', '1040991083749974086, 1050396098285543544', 'https://sensivity.team/bot/img/musik.png', '111'),
(9, 'Das Mee6 PunkteSystem wird zu beginn des Jahres abgeschaltet!', 'Diese Funktion wird von uns deaktiviert, dafÃƒÂ¼r wird Anfang des Jahres unser eigenes PunkteSystem InÃ‚Â­kraftÃ‚Â­treÃ‚Â­ten. Ab dann kÃƒÂ¶nnt ihr Punkte mit Nachrichten sammeln oder indem ihr aktiv in SprachkanÃƒÂ¤len seid.&nbsp', '2022-12-08', '1040991083749974086, 1050396098285543544', '', '111'),
(10, 'Neues PunkteSystem!!', '<div class=\"contents-2MsGLg\" style=\"margin: 0px', '2022-12-29', '1056247255851614298', 'https://sensivity.team/assets/img/mockup/ipad-2.png', '111');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `news_tags`
--

CREATE TABLE `news_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `discord_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `news_tags`
--

INSERT INTO `news_tags` (`id`, `name`, `discord_id`) VALUES
(5, 'Update', '1040991083749974086'),
(6, 'Maintenance', '1040991204696936528'),
(7, 'Deactivate', '1050396098285543544'),
(8, 'Announcement', '1056247255851614298');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `online`
--

CREATE TABLE `online` (
  `id` int(11) NOT NULL,
  `discord_id` varchar(225) NOT NULL,
  `date` date NOT NULL,
  `day` int(11) NOT NULL,
  `min` int(11) NOT NULL,
  `gesamt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `online`
--

INSERT INTO `online` (`id`, `discord_id`, `date`, `day`, `min`, `gesamt`) VALUES
(2, '422148236875137059', '2022-11-09', 3, 2, 2),
(4, '422148236875137059', '2022-11-11', 5, 2, 2),
(5, '422148236875137059', '2022-12-14', 3, 2, 2),
(6, '422148236875137059', '2022-12-29', 4, 121, 121),
(7, '261522614084698112', '2022-12-29', 4, 125, 125),
(8, '393364459227185153', '2022-12-29', 4, 74, 74),
(9, '397010748867477504', '2022-12-29', 4, 50, 50),
(10, '181090908572221450', '2022-12-29', 4, 199, 199),
(11, '282905508346724352', '2022-12-29', 4, 227, 227),
(12, '418786086391906307', '2022-12-29', 4, 9, 9),
(13, '261782768399155201', '2022-12-29', 4, 60, 60),
(14, '378961812462370817', '2022-12-29', 4, 78, 0),
(15, '375225894064619530', '2022-12-29', 4, 55, 0),
(16, '315873285898502144', '2022-12-29', 4, 1, 0),
(17, '331889893812862996', '2022-12-29', 4, 110, 0),
(18, '422148236875137059', '2022-12-30', 5, 121, 121),
(19, '247724034240937984', '2022-12-29', 4, 123, 0),
(20, '247724034240937984', '2022-12-30', 5, 106, 106),
(21, '282905508346724352', '2022-12-30', 5, 149, 227),
(22, '197390975184797696', '2022-12-29', 4, 227, 0),
(23, '197390975184797696', '2022-12-30', 5, 85, 85),
(24, '381123296462241804', '2022-12-29', 4, 227, 0),
(25, '381123296462241804', '2022-12-30', 5, 185, 0),
(26, '393364459227185153', '2022-12-30', 5, 42, 42),
(27, '1044361376761647145', '2022-12-30', 5, 2, 0),
(28, '418786086391906307', '2022-12-30', 5, 190, 190),
(29, '261782768399155201', '2022-12-30', 5, 68, 68),
(30, '261522614084698112', '2022-12-30', 5, 316, 316),
(31, '261782768399155201', '2022-12-31', 6, 466, 466),
(32, '393364459227185153', '2022-12-31', 6, 72, 72),
(33, '479716820253671427', '2022-12-30', 5, 19, 0),
(34, '479716820253671427', '2022-12-31', 6, 21, 0),
(35, '261522614084698112', '2022-12-31', 6, 291, 291),
(36, '409264145322737664', '2022-12-30', 5, 292, 0),
(37, '409264145322737664', '2022-12-31', 6, 32, 0),
(38, '534098133127397387', '2022-12-30', 5, 68, 0),
(39, '534098133127397387', '2022-12-31', 6, 242, 242),
(40, '197390975184797696', '2022-12-31', 6, 88, 88),
(41, '704448708376526868', '2022-12-31', 6, 9, 9),
(42, '1044361376761647145', '2022-12-31', 6, 48, 0),
(43, '422148236875137059', '2022-12-31', 6, 40, 121),
(44, '378961812462370817', '2022-12-31', 6, 2, 2),
(45, '418786086391906307', '2022-12-31', 6, 268, 190),
(46, '411988803981410304', '2022-12-31', 6, 47, 0),
(47, '282905508346724352', '2022-12-31', 6, 338, 227),
(48, '422148236875137059', '2023-01-01', 0, 216, 216),
(49, '261522614084698112', '2023-01-01', 0, 303, 303),
(50, '704448708376526868', '2023-01-01', 0, 68, 9),
(51, '247724034240937984', '2023-01-01', 0, 147, 147),
(52, '435697587849265155', '2023-01-01', 0, 132, 0),
(53, '282225571134439425', '2023-01-01', 0, 167, 0),
(54, '534098133127397387', '2023-01-01', 0, 159, 159),
(55, '397010748867477504', '2023-01-01', 0, 198, 50),
(56, '337597703838236673', '2023-01-01', 0, 259, 0),
(57, '282905508346724352', '2023-01-01', 0, 391, 227),
(58, '261782768399155201', '2023-01-01', 0, 86, 466),
(59, '197390975184797696', '2023-01-01', 0, 536, 88),
(60, '418786086391906307', '2023-01-01', 0, 560, 190),
(61, '418786086391906307', '2023-01-02', 1, 22, 190);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `securitytokens`
--

CREATE TABLE `securitytokens` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) NOT NULL,
  `identifier` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `securitytoken` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `server_infos`
--

CREATE TABLE `server_infos` (
  `id` int(11) NOT NULL,
  `servername` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `start_status` int(11) NOT NULL,
  `neustart_status` int(11) NOT NULL,
  `stop_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `server_infos`
--

INSERT INTO `server_infos` (`id`, `servername`, `status`, `start_status`, `neustart_status`, `stop_status`) VALUES
(1, 'eco', 0, 0, 0, 1),
(2, 'satisfactory', 0, 0, 0, 1),
(3, 'minecraft_lobby', 0, 0, 0, 1),
(4, 'minecraft_bungee', 0, 0, 0, 1),
(5, 'minecraft_fools', 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `swf`
--

CREATE TABLE `swf` (
  `id` varchar(225) NOT NULL,
  `player_1` varchar(255) DEFAULT NULL,
  `player_2` varchar(255) DEFAULT NULL,
  `player_3` varchar(255) DEFAULT NULL,
  `player_4` varchar(255) DEFAULT NULL,
  `reserviert_1` varchar(255) DEFAULT NULL,
  `reserviert_2` varchar(255) DEFAULT NULL,
  `reserviert_3` varchar(255) DEFAULT NULL,
  `messageid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `token`
--

CREATE TABLE `token` (
  `discord_id` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `token`
--

INSERT INTO `token` (`discord_id`, `token`) VALUES
('422148236875137059', '05a32e09-b3df-42b1-9ed2-0f21d6246868');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `passwort` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `vorname` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `nachname` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `passwortcode` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `passwortcode_time` timestamp NULL DEFAULT NULL,
  `discord_id` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `discord_pb` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `discord_username` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `discord_banner` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `discord_status` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'OFFLINE',
  `steam_id` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `riot_puuid` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `riot_summoner_id` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `summoner_name` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `website_url` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `dbd_main` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `survivor_main` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `killer_main` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `minecraft_uuid` varchar(225) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `modal` int(11) NOT NULL DEFAULT 0,
  `points` int(11) NOT NULL DEFAULT 0,
  `daily` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `email`, `passwort`, `vorname`, `nachname`, `created_at`, `updated_at`, `passwortcode`, `passwortcode_time`, `discord_id`, `discord_pb`, `discord_username`, `discord_banner`, `discord_status`, `steam_id`, `riot_puuid`, `riot_summoner_id`, `summoner_name`, `website_url`, `dbd_main`, `survivor_main`, `killer_main`, `minecraft_uuid`, `modal`, `points`, `daily`) VALUES
(1, NULL, NULL, NULL, NULL, '2022-12-29 13:03:02', '2023-01-01 23:41:42', NULL, NULL, '231168070687784960', 'https://cdn.discordapp.com/avatars/231168070687784960/a1853af4cba1d83a04e9f799dd0fb0b8.png', 'Robert#9887', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '231168070687784960', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(2, NULL, NULL, NULL, NULL, '2022-12-29 13:03:02', '2023-01-01 22:01:34', NULL, NULL, '338645983611322368', 'https://cdn.discordapp.com/avatars/338645983611322368/d41e665f24ac4be22c08919e267d141f.png', 'Jonas L. | Minecoll_YT#0741', '#3f4b32', 'OFFLINE', NULL, NULL, NULL, NULL, '338645983611322368', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(3, NULL, NULL, NULL, NULL, '2022-12-29 13:03:02', '2022-12-29 13:03:02', NULL, NULL, '266232312922898432', 'https://cdn.discordapp.com/avatars/266232312922898432/daf023bf5178760465a30db15066d533.png', 'yannik134#1398', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '266232312922898432', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(4, NULL, NULL, NULL, NULL, '2022-12-29 13:03:02', '2023-01-01 21:12:03', NULL, NULL, '409264145322737664', 'https://cdn.discordapp.com/avatars/409264145322737664/d460a329535ac05f066439eefb4cb42f.png', 'Star#4548', '#000000', 'OFFLINE', NULL, NULL, NULL, NULL, '409264145322737664', NULL, NULL, NULL, NULL, 0, 324, '2022-12-29'),
(5, NULL, NULL, NULL, NULL, '2022-12-29 13:03:03', '2023-01-01 19:21:32', NULL, NULL, '570641835144511500', 'https://cdn.discordapp.com/avatars/570641835144511500/473686e9fa9b24a8051225ea79a29e37.png', 'helen#5156', '#5c1e6b', 'OFFLINE', NULL, NULL, NULL, NULL, '570641835144511500', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(6, NULL, NULL, NULL, NULL, '2022-12-29 13:03:03', '2023-01-01 21:17:15', NULL, NULL, '337597703838236673', 'https://cdn.discordapp.com/avatars/337597703838236673/cb3545ae46044fe706c43f8f94bab182.png', 'Fieldagent#0213', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '337597703838236673', NULL, NULL, NULL, NULL, 0, 259, '2022-12-29'),
(7, NULL, NULL, NULL, NULL, '2022-12-29 13:03:03', '2022-12-29 13:03:03', NULL, NULL, '933468167030845510', 'https://cdn.discordapp.com/embed/avatars/3.png', 'Surface Dent#1468', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '933468167030845510', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(8, NULL, NULL, NULL, NULL, '2022-12-29 13:03:03', '2023-01-01 22:57:28', NULL, NULL, '153265182057955328', 'https://cdn.discordapp.com/avatars/153265182057955328/b7fec98b4ebf75019aa6f3090dde8509.png', 'Achim#2591', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '153265182057955328', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(9, NULL, NULL, NULL, NULL, '2022-12-29 13:03:03', '2022-12-29 13:03:03', NULL, NULL, '788843479932731423', 'https://cdn.discordapp.com/embed/avatars/1.png', 'Lyoner#4131', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '788843479932731423', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(10, NULL, NULL, NULL, NULL, '2022-12-29 13:03:04', '2023-01-01 21:40:12', NULL, NULL, '448463581953130507', 'https://cdn.discordapp.com/avatars/448463581953130507/c7970b5496f71223752ce16ce53b6465.png', 'larrylauch#6720', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '448463581953130507', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(11, NULL, NULL, NULL, NULL, '2022-12-29 13:03:04', '2023-01-01 22:10:54', NULL, NULL, '261782768399155201', 'https://cdn.discordapp.com/avatars/261782768399155201/871e829cf4af69a1757a37fea5d6a0bc.png', 'Juicy Broccoli#6392', '#3b6f5e', 'OFFLINE', NULL, NULL, NULL, NULL, '261782768399155201', NULL, NULL, NULL, NULL, 0, 1091, '2022-12-29'),
(12, NULL, NULL, NULL, NULL, '2022-12-29 13:03:04', '2022-12-29 21:50:49', NULL, NULL, '315873285898502144', 'https://cdn.discordapp.com/avatars/315873285898502144/7146c8094e9c6db13cd52b625b66332a.png', 'Moflix#8118', '#36393f', 'OFFLINE', NULL, NULL, NULL, NULL, '315873285898502144', NULL, NULL, NULL, NULL, 0, 1, '2022-12-29'),
(13, NULL, NULL, NULL, NULL, '2022-12-29 13:03:04', '2022-12-29 13:03:04', NULL, NULL, '827990989167001621', 'https://cdn.discordapp.com/embed/avatars/1.png', 'Fonfosters#4941', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '827990989167001621', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(14, NULL, NULL, NULL, NULL, '2022-12-29 13:03:05', '2023-01-02 00:19:05', NULL, NULL, '479716820253671427', 'https://cdn.discordapp.com/avatars/479716820253671427/b15381b58f0dc94ae5a38f73676569f4.png', 'AngusMcFire#0520', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '479716820253671427', NULL, NULL, NULL, NULL, 0, 40, '2022-12-29'),
(15, NULL, NULL, NULL, NULL, '2022-12-29 13:03:05', '2023-01-01 23:03:44', NULL, NULL, '181786542522630144', 'https://cdn.discordapp.com/avatars/181786542522630144/4200aae069e2cfd1b4788f359de1dc38.png', 'DeiTYmon#8445', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '181786542522630144', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(16, NULL, NULL, NULL, NULL, '2022-12-29 13:03:05', '2023-01-02 03:14:00', NULL, NULL, '333992760376033291', 'https://cdn.discordapp.com/avatars/333992760376033291/780e4a068f9bc8280dc9166036e5a629.png', 'sHaδοw | Hakan#3424', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '333992760376033291', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(17, NULL, NULL, NULL, NULL, '2022-12-29 13:03:05', '2022-12-29 13:03:05', NULL, NULL, '377097200527867907', 'https://cdn.discordapp.com/avatars/377097200527867907/3717ce6b69d9b28bdf3bdcd88e9345c3.png', 'DaKenny#3594', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '377097200527867907', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(18, NULL, NULL, NULL, NULL, '2022-12-29 13:03:06', '2022-12-29 13:03:06', NULL, NULL, '923980184175136830', 'https://cdn.discordapp.com/avatars/923980184175136830/9afcec45c2f59861b109b6c7f0cb2895.png', 'Der Fremde#4634', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '923980184175136830', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(19, NULL, NULL, NULL, NULL, '2022-12-29 13:03:06', '2023-01-01 19:10:18', NULL, NULL, '393364459227185153', 'https://cdn.discordapp.com/avatars/393364459227185153/3474c18c43f2957132843244cbafa46e.png', 'F3lix#6307', '#3f3636', 'OFFLINE', NULL, NULL, NULL, NULL, '393364459227185153', NULL, NULL, NULL, NULL, 0, 668, '2022-12-29'),
(20, NULL, NULL, NULL, NULL, '2022-12-29 13:03:06', '2022-12-29 13:03:06', NULL, NULL, '751469850865434774', 'https://cdn.discordapp.com/embed/avatars/3.png', 'Julian.#7213', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '751469850865434774', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(21, NULL, NULL, NULL, NULL, '2022-12-29 13:03:06', '2023-01-01 23:59:25', NULL, NULL, '307920696472895492', 'https://cdn.discordapp.com/avatars/307920696472895492/558fc63959a053311f6db16d6e5130e4.png', 'Just_Yavan#6018', '#4e338d', 'OFFLINE', NULL, NULL, NULL, NULL, '307920696472895492', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(22, NULL, NULL, NULL, NULL, '2022-12-29 13:03:06', '2023-01-01 23:44:37', NULL, NULL, '415913865478668289', 'https://cdn.discordapp.com/avatars/415913865478668289/8e39b31fa4295f22a55f35f23fd09775.png', 'CuzJan#0439', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '415913865478668289', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(23, NULL, NULL, NULL, NULL, '2022-12-29 13:03:07', '2022-12-31 08:36:37', NULL, NULL, '538747972502945802', 'https://cdn.discordapp.com/avatars/538747972502945802/0d5026b6a1f49340f5a53fa00babe38f.png', 'RodschiBodschi#0388', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '538747972502945802', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(24, NULL, NULL, NULL, NULL, '2022-12-29 13:03:07', '2023-01-01 20:38:21', NULL, NULL, '704448708376526868', 'https://cdn.discordapp.com/avatars/704448708376526868/bbfb9dad0e549352e03340c7d735891d.png', 'Inga2000#4989', '#3f1111', 'OFFLINE', NULL, NULL, NULL, NULL, '704448708376526868', NULL, NULL, NULL, NULL, 0, 79, '2022-12-29'),
(25, NULL, NULL, NULL, NULL, '2022-12-29 13:03:07', '2022-12-29 13:03:07', NULL, NULL, '365127301954011138', 'https://cdn.discordapp.com/avatars/365127301954011138/8a7a0838cb2570711dd931909d4a7c37.png', 'oberstgruppenführer levi.#5691', '#0b001f', 'OFFLINE', NULL, NULL, NULL, NULL, '365127301954011138', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(26, NULL, NULL, NULL, NULL, '2022-12-29 13:03:07', '2023-01-02 00:29:41', NULL, NULL, '359737000468807681', 'https://cdn.discordapp.com/avatars/359737000468807681/377747dc3975b8ddadd90403700d567e.png', 'nikolina_007#6569', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '359737000468807681', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(27, NULL, NULL, NULL, NULL, '2022-12-29 13:03:08', '2022-12-29 13:03:08', NULL, NULL, '410879258827685888', 'https://cdn.discordapp.com/embed/avatars/3.png', 'xGeilo#7578', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '410879258827685888', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(28, NULL, NULL, NULL, NULL, '2022-12-29 13:03:08', '2022-12-29 13:03:08', NULL, NULL, '872615651687165983', 'https://cdn.discordapp.com/embed/avatars/0.png', 'clawdismybae#4030', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '872615651687165983', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(29, NULL, NULL, NULL, NULL, '2022-12-29 13:03:08', '2023-01-02 00:47:20', NULL, NULL, '265151831796219905', 'https://cdn.discordapp.com/avatars/265151831796219905/cc0a85caaeb61887c781f9c4f3b5b2d2.png', '0n4rc0n#2561', '#00b410', 'OFFLINE', NULL, NULL, NULL, NULL, '265151831796219905', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(30, NULL, NULL, NULL, NULL, '2022-12-29 13:03:08', '2022-12-29 13:03:08', NULL, NULL, '393360844630786049', 'https://cdn.discordapp.com/avatars/393360844630786049/3fd5db7bf8cbe568d9894307d1b007ba.png', 'ImGaming_#6731', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '393360844630786049', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(31, NULL, NULL, NULL, NULL, '2022-12-29 13:03:08', '2023-01-01 21:27:47', NULL, NULL, '108145074818281472', 'https://cdn.discordapp.com/avatars/108145074818281472/47af31747560aa3b40d785c62bd0220b.png', 'Davakl#7106', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '108145074818281472', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(32, NULL, NULL, NULL, NULL, '2022-12-29 13:03:09', '2023-01-01 17:42:10', NULL, NULL, '331889893812862996', 'https://cdn.discordapp.com/avatars/331889893812862996/b744d2bf8d6c22a770d9695df2ae9491.png', 'Muuuh#9139', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '331889893812862996', NULL, NULL, NULL, NULL, 0, 110, '2022-12-29'),
(33, NULL, NULL, NULL, NULL, '2022-12-29 13:03:09', '2023-01-01 23:22:46', NULL, NULL, '411988803981410304', 'https://cdn.discordapp.com/avatars/411988803981410304/7de452a812e14b42ba5e830c215b865e.png', 'Kaneki#4688', '#7c008f', 'OFFLINE', NULL, NULL, NULL, NULL, '411988803981410304', NULL, NULL, NULL, NULL, 0, 47, '2022-12-29'),
(34, NULL, NULL, NULL, NULL, '2022-12-29 13:03:09', '2023-01-02 00:14:04', NULL, NULL, '415946141025304576', 'https://cdn.discordapp.com/avatars/415946141025304576/39080be493a07a7ea70a66d70fbb2797.png', 'Ad1nick#5767', '#770bb9', 'OFFLINE', NULL, NULL, NULL, NULL, '415946141025304576', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(35, NULL, NULL, NULL, NULL, '2022-12-29 13:03:09', '2023-01-01 19:41:06', NULL, NULL, '242288292744134657', 'https://cdn.discordapp.com/avatars/242288292744134657/7cc2de5a845fb595fb4c1ea665fcf0b8.png', 'P1L4#6574', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '242288292744134657', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(36, NULL, NULL, NULL, NULL, '2022-12-29 13:03:10', '2022-12-29 13:03:10', NULL, NULL, '315142192068820992', 'https://cdn.discordapp.com/embed/avatars/3.png', 'Yannis K#0543', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '315142192068820992', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(37, NULL, NULL, NULL, NULL, '2022-12-29 13:03:10', '2023-01-02 06:06:47', NULL, NULL, '905515852059799562', 'https://cdn.discordapp.com/avatars/905515852059799562/03309890007f3ffc0ac3a6d66bfdfd9d.png', 'ayy..#6251', 'https://cdn.discordapp.com/banners/905515852059799562/a_6d440135db4392305f1a145be4fb5609.gif', 'OFFLINE', NULL, NULL, NULL, NULL, '905515852059799562', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(38, NULL, NULL, NULL, NULL, '2022-12-29 13:03:10', '2022-12-29 13:03:10', NULL, NULL, '1036267062265385120', 'https://cdn.discordapp.com/avatars/1036267062265385120/645d821811b952e520369cd8c97b28d6.png', 'Gehli#7876', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '1036267062265385120', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(39, NULL, NULL, NULL, NULL, '2022-12-29 13:03:40', '2022-12-29 13:03:40', NULL, NULL, '761202004462534706', 'https://cdn.discordapp.com/embed/avatars/1.png', 'manu1754#7541', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '761202004462534706', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(40, NULL, NULL, NULL, NULL, '2022-12-29 13:03:40', '2023-01-01 22:00:04', NULL, NULL, '439089487960735744', 'https://cdn.discordapp.com/avatars/439089487960735744/ed7149528915f3588555df716a8127b9.png', 'watchleft#2816', '#3f363d', 'OFFLINE', NULL, NULL, NULL, NULL, '439089487960735744', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(41, NULL, NULL, NULL, NULL, '2022-12-29 13:03:40', '2022-12-29 13:03:40', NULL, NULL, '718124285473980456', 'https://cdn.discordapp.com/avatars/718124285473980456/8d3ef18091cb16c2b3d92ca41c5409ca.png', 'dako#5133', '#393a3c', 'OFFLINE', NULL, NULL, NULL, NULL, '718124285473980456', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(42, NULL, NULL, NULL, NULL, '2022-12-29 13:03:40', '2022-12-31 00:20:35', NULL, NULL, '501051467935907841', 'https://cdn.discordapp.com/avatars/501051467935907841/5e4b48091127981cf4cecba21eee591b.png', 'Mystery_Maux#1519', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '501051467935907841', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(43, NULL, NULL, NULL, NULL, '2022-12-29 13:03:41', '2022-12-29 17:29:56', NULL, NULL, '550458542692237342', 'https://cdn.discordapp.com/avatars/550458542692237342/57203ffa264cfc0520f8e6c08861098e.png', 'TeloYou#3223', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '550458542692237342', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(44, NULL, NULL, NULL, NULL, '2022-12-29 13:03:41', '2022-12-29 21:08:11', NULL, NULL, '375225894064619530', 'https://cdn.discordapp.com/avatars/375225894064619530/b29f606d0c598f143b68a2113887fde8.png', 'sadik kidas#5421', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '375225894064619530', NULL, NULL, NULL, NULL, 0, 55, '2022-12-29'),
(45, NULL, NULL, NULL, NULL, '2022-12-29 13:03:41', '2022-12-29 13:03:41', NULL, NULL, '478153429252833282', 'https://cdn.discordapp.com/avatars/478153429252833282/51b0d29dfd22bd1075ff7733e37582fd.png', 'Lutz#3330', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '478153429252833282', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(46, NULL, NULL, NULL, NULL, '2022-12-29 13:03:41', '2022-12-29 13:03:41', NULL, NULL, '627612540016525332', 'https://cdn.discordapp.com/avatars/627612540016525332/6999ee6122ae226672a66f14c2a97ac2.png', 'oschkosch#9485', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '627612540016525332', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(47, NULL, NULL, NULL, NULL, '2022-12-29 13:03:41', '2022-12-29 13:03:41', NULL, NULL, '402191115433934848', 'https://cdn.discordapp.com/avatars/402191115433934848/5bf14d039e52e3c4395cba8560b2441c.png', 'Lovemymates#9395', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '402191115433934848', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(48, NULL, NULL, NULL, NULL, '2022-12-29 13:03:42', '2022-12-31 14:39:28', NULL, NULL, '355777981764993034', 'https://cdn.discordapp.com/avatars/355777981764993034/875ed511d72ad38e0ae049bb81957b50.png', 'Mary 808#2537', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '355777981764993034', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(49, NULL, NULL, NULL, NULL, '2022-12-29 13:03:42', '2022-12-29 13:03:42', NULL, NULL, '691355282760138823', 'https://cdn.discordapp.com/avatars/691355282760138823/9ab0a20e592498986a454efb5e133dc7.png', 'Bauer schäfer#5779', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '691355282760138823', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(50, NULL, NULL, NULL, NULL, '2022-12-29 13:03:42', '2022-12-30 12:15:26', NULL, NULL, '500994133444263946', 'https://cdn.discordapp.com/avatars/500994133444263946/460d86caac191801d43713c37e7b0717.png', 'Michelle.#6945', '#a8173a', 'OFFLINE', NULL, NULL, NULL, NULL, '500994133444263946', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(51, NULL, NULL, NULL, NULL, '2022-12-29 13:03:42', '2022-12-29 13:03:42', NULL, NULL, '869618304363421726', 'https://cdn.discordapp.com/avatars/869618304363421726/3641982183285ef5026def082864f5e1.png', 'sammm#9015', '#667c9a', 'OFFLINE', NULL, NULL, NULL, NULL, '869618304363421726', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(52, NULL, NULL, NULL, NULL, '2022-12-29 13:03:43', '2022-12-29 13:03:43', NULL, NULL, '788846873162809356', 'https://cdn.discordapp.com/embed/avatars/4.png', 'lyoner#7459', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '788846873162809356', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(53, NULL, NULL, NULL, NULL, '2022-12-29 13:03:43', '2023-01-02 05:41:43', NULL, NULL, '423520562955157506', 'https://cdn.discordapp.com/avatars/423520562955157506/2bc74d804e2e2f4df756a698eb34bb6b.png', 'Kiwi KEKW#3989', '#4b264b', 'IDLE', NULL, NULL, NULL, NULL, '423520562955157506', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(54, NULL, NULL, NULL, NULL, '2022-12-29 13:03:43', '2023-01-01 18:58:14', NULL, NULL, '422075068319924224', 'https://cdn.discordapp.com/avatars/422075068319924224/c6dc72a2751241176c46004a237af49f.png', 'Umbreon_btw#7049', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '422075068319924224', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(55, NULL, NULL, NULL, NULL, '2022-12-29 13:03:43', '2022-12-29 13:03:43', NULL, NULL, '613064434381881381', 'https://cdn.discordapp.com/avatars/613064434381881381/736bea91d4666f605a046624fa61184f.png', 'Latte#8897', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '613064434381881381', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(56, NULL, NULL, NULL, NULL, '2022-12-29 13:03:43', '2022-12-29 13:03:43', NULL, NULL, '626152052963147787', 'https://cdn.discordapp.com/avatars/626152052963147787/1cb3c6668bf4cd1b8d4332f5e59bf657.png', 'Pipedream#2570', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '626152052963147787', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(57, NULL, NULL, NULL, NULL, '2022-12-29 13:03:44', '2022-12-29 13:03:44', NULL, NULL, '695220841096675358', 'https://cdn.discordapp.com/embed/avatars/3.png', 'Brocki321#1588', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '695220841096675358', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(58, NULL, NULL, NULL, NULL, '2022-12-29 13:03:44', '2023-01-01 23:34:28', NULL, NULL, '367679686945275914', 'https://cdn.discordapp.com/avatars/367679686945275914/c334a197d0c5ac8c41807b1ba5b5641c.png', 'Fabian#0628', 'https://cdn.discordapp.com/banners/367679686945275914/f19e1eaa36cf75a6995380934714de34.png', 'OFFLINE', NULL, NULL, NULL, NULL, '367679686945275914', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(59, NULL, NULL, NULL, NULL, '2022-12-29 13:03:44', '2023-01-02 01:56:13', NULL, NULL, '181090908572221450', 'https://cdn.discordapp.com/avatars/181090908572221450/fe43ccd161c5b3d1ebf5266f2e14643e.png', 'max#9819', '#26272c', 'OFFLINE', NULL, NULL, NULL, NULL, '181090908572221450', NULL, NULL, NULL, NULL, 0, 134460, '2022-12-29'),
(60, NULL, NULL, NULL, NULL, '2022-12-29 13:03:44', '2023-01-02 02:44:36', NULL, NULL, '614125986908471298', 'https://cdn.discordapp.com/avatars/614125986908471298/338f06d5c4565572444dfa07ffd974cf.png', 'Daniel/Kouta#4357', '#666775', 'OFFLINE', NULL, NULL, NULL, NULL, '614125986908471298', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(61, NULL, NULL, NULL, NULL, '2022-12-29 13:03:44', '2022-12-29 13:03:44', NULL, NULL, '751461728910311484', 'https://cdn.discordapp.com/embed/avatars/0.png', 'marieschmitt#1085', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '751461728910311484', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(62, NULL, NULL, NULL, NULL, '2022-12-29 13:03:45', '2023-01-01 22:52:32', NULL, NULL, '518138649234112523', 'https://cdn.discordapp.com/avatars/518138649234112523/de669f3a874b7e7411ceb7cf4d819589.png', 'AicFire#1011', '#c58913', 'OFFLINE', NULL, NULL, NULL, NULL, '518138649234112523', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(63, NULL, NULL, NULL, NULL, '2022-12-29 13:03:45', '2023-01-02 02:19:55', NULL, NULL, '274961335694000138', 'https://cdn.discordapp.com/avatars/274961335694000138/96a0e008ca7b89c2e610ceb13393db33.png', 'Daniell#6198', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '274961335694000138', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(64, NULL, NULL, NULL, NULL, '2022-12-29 13:03:45', '2022-12-29 13:03:45', NULL, NULL, '138646443345969152', 'https://cdn.discordapp.com/avatars/138646443345969152/a_fa0fc7405bb55683d1c20e37d95c633e.gif', 'DaGammla#0001', 'https://cdn.discordapp.com/banners/138646443345969152/a_4c18a533a6b4ca47dc3f43d260693df8.gif', 'OFFLINE', NULL, NULL, NULL, NULL, '138646443345969152', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(65, NULL, NULL, NULL, NULL, '2022-12-29 13:03:45', '2022-12-29 13:03:45', NULL, NULL, '774356922018430976', 'https://cdn.discordapp.com/avatars/774356922018430976/7a8d8d2e740bc433f781db14c34bc0d0.png', 'Svenja#2783', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '774356922018430976', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(66, NULL, NULL, NULL, NULL, '2022-12-29 13:03:46', '2022-12-29 13:03:46', NULL, NULL, '693233769678766151', 'https://cdn.discordapp.com/avatars/693233769678766151/80126233e538eb2604f3ea9ed30d507b.png', 'ChappyBot#2888', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '693233769678766151', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(67, NULL, NULL, NULL, NULL, '2022-12-29 13:03:46', '2022-12-29 13:03:46', NULL, NULL, '443470059013144607', 'https://cdn.discordapp.com/embed/avatars/3.png', 'OliveKamm9750#6713', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '443470059013144607', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(68, NULL, NULL, NULL, NULL, '2022-12-29 13:03:46', '2022-12-29 13:03:46', NULL, NULL, '378297226138615810', 'https://cdn.discordapp.com/avatars/378297226138615810/2d70c043b1b345f1faccc62b838b4def.png', 'StraightOuttaSörien#9188', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '378297226138615810', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(69, NULL, NULL, NULL, NULL, '2022-12-29 13:03:46', '2023-01-01 12:17:50', NULL, NULL, '220272325239635969', 'https://cdn.discordapp.com/avatars/220272325239635969/02528e878ee6c0c1369163c95e3f50b2.png', 'Cloudy38#8194', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '220272325239635969', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(70, NULL, NULL, NULL, NULL, '2022-12-29 13:03:46', '2022-12-29 13:03:46', NULL, NULL, '906200924228296714', 'https://cdn.discordapp.com/embed/avatars/3.png', 'LanParty#2618', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '906200924228296714', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(71, NULL, NULL, NULL, NULL, '2022-12-29 13:03:47', '2022-12-31 10:47:48', NULL, NULL, '755491871739871333', 'https://cdn.discordapp.com/avatars/755491871739871333/379ae68060b8930c02905443e92b57a7.png', 'vegangelo#2427', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '755491871739871333', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(72, NULL, NULL, NULL, NULL, '2022-12-29 13:03:47', '2022-12-31 12:35:08', NULL, NULL, '1044361376761647145', 'https://cdn.discordapp.com/avatars/1044361376761647145/0b12060a886fa3ad4875c0be1119dca0.png', 'Jr. Broccoli#1106', '#4eb25f', 'OFFLINE', NULL, NULL, NULL, NULL, '1044361376761647145', NULL, NULL, NULL, NULL, 0, 50, '2022-12-29'),
(73, NULL, NULL, NULL, NULL, '2022-12-29 13:03:47', '2022-12-29 13:03:47', NULL, NULL, '372813115936735232', 'https://cdn.discordapp.com/avatars/372813115936735232/868a79c9e98ef6dce4cc89a922baf64f.png', 'Darkloyd15#6609', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '372813115936735232', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(74, NULL, NULL, NULL, NULL, '2022-12-29 13:03:47', '2022-12-29 13:03:47', NULL, NULL, '558751621572460593', 'https://cdn.discordapp.com/avatars/558751621572460593/3093213ace5b02bcc9ba17689196b1b1.png', 'L2_dreamZ_btw#5980', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '558751621572460593', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(75, NULL, NULL, NULL, NULL, '2022-12-29 13:03:48', '2023-01-01 23:30:34', NULL, NULL, '166947416430346241', 'https://cdn.discordapp.com/avatars/166947416430346241/5dbffa1fbabd9274009a1e2fe1edd6f1.png', 'Kappakid#8500', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '166947416430346241', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(76, NULL, NULL, NULL, NULL, '2022-12-29 13:04:17', '2023-01-02 01:04:12', NULL, NULL, '385773610503110656', 'https://cdn.discordapp.com/avatars/385773610503110656/3bb06473f8984014294bac92771a7d3d.png', 'Lunisi#0638', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '385773610503110656', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(77, NULL, NULL, NULL, NULL, '2022-12-29 13:04:17', '2022-12-29 13:04:17', NULL, NULL, '918580046334156850', 'https://cdn.discordapp.com/embed/avatars/1.png', 'maxmitswag#7856', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '918580046334156850', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(78, NULL, NULL, NULL, NULL, '2022-12-29 13:04:17', '2023-01-02 04:05:56', NULL, NULL, '279693114355089408', 'https://cdn.discordapp.com/embed/avatars/3.png', 'VinnieWestside#5643', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '279693114355089408', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(79, NULL, NULL, NULL, NULL, '2022-12-29 13:04:18', '2023-01-01 19:07:00', NULL, NULL, '332811754268786688', 'https://cdn.discordapp.com/avatars/332811754268786688/577075783734b75fd81642c47836f974.png', 'GoodieYo#6714', 'https://cdn.discordapp.com/banners/332811754268786688/a_47806c640614e3f9848dcb7d4096d9cc.gif', 'OFFLINE', NULL, NULL, NULL, NULL, '332811754268786688', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(80, NULL, NULL, NULL, NULL, '2022-12-29 13:04:18', '2023-01-01 23:40:12', NULL, NULL, '295970058822221824', 'https://cdn.discordapp.com/avatars/295970058822221824/49f9bfd059487101440f670e49558d29.png', 'Luke2508#6737', '#022f8d', 'OFFLINE', NULL, NULL, NULL, NULL, '295970058822221824', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(81, NULL, NULL, NULL, NULL, '2022-12-29 13:04:18', '2023-01-01 21:13:08', NULL, NULL, '242281593438339074', 'https://cdn.discordapp.com/avatars/242281593438339074/6f98e5859f1e9d6d05a104455bdfbb72.png', 'KillerTic#1751', '#36393f', 'OFFLINE', NULL, NULL, NULL, NULL, '242281593438339074', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(82, NULL, NULL, NULL, NULL, '2022-12-29 13:04:18', '2022-12-29 13:04:18', NULL, NULL, '443470404011556879', 'https://cdn.discordapp.com/avatars/443470404011556879/d47406e56b5e6236a7e98388954e3a8d.png', 'Niclas#3955', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '443470404011556879', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(83, NULL, NULL, NULL, NULL, '2022-12-29 13:04:18', '2022-12-29 13:04:18', NULL, NULL, '774356631319609420', 'https://cdn.discordapp.com/embed/avatars/2.png', 'laura_k186#8587', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '774356631319609420', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(84, NULL, NULL, NULL, NULL, '2022-12-29 13:04:19', '2023-01-01 23:00:52', NULL, NULL, '261522614084698112', 'https://cdn.discordapp.com/avatars/261522614084698112/6b6dc3e32231c983db6e6b1b74cb4612.png', '11nils11#1287', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '261522614084698112', NULL, NULL, NULL, NULL, 0, 1706, '2022-12-29'),
(85, NULL, NULL, NULL, NULL, '2022-12-29 13:04:19', '2023-01-01 19:25:52', NULL, NULL, '282225571134439425', 'https://cdn.discordapp.com/avatars/282225571134439425/a_7aa2730b2190513bb3b2a31c65288a1d.gif', 'bryanilias#0110', 'https://cdn.discordapp.com/banners/282225571134439425/bc26cf939b18fd4cf814a1d6e3c4a148.png', 'OFFLINE', NULL, NULL, NULL, NULL, '282225571134439425', NULL, NULL, NULL, NULL, 0, 167, '2022-12-29'),
(86, NULL, NULL, NULL, NULL, '2022-12-29 13:04:19', '2023-01-01 23:27:46', NULL, NULL, '247724034240937984', 'https://cdn.discordapp.com/avatars/247724034240937984/7775e5db49047ede5b780140c31884ee.png', 'Samuel#1886', '#000000', 'OFFLINE', NULL, NULL, NULL, NULL, '247724034240937984', NULL, NULL, NULL, NULL, 0, 522, '2022-12-29'),
(87, NULL, NULL, NULL, NULL, '2022-12-29 13:04:20', '2022-12-29 13:04:20', NULL, NULL, '339045627818147850', 'https://cdn.discordapp.com/avatars/339045627818147850/6113b53d201d8b1698d55e22b0e7e87a.png', 'Jascha#3625', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '339045627818147850', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(88, NULL, NULL, NULL, NULL, '2022-12-29 13:04:20', '2022-12-29 13:04:20', NULL, NULL, '774357382415384607', 'https://cdn.discordapp.com/embed/avatars/2.png', 'pollygym#2597', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '774357382415384607', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(89, NULL, NULL, NULL, NULL, '2022-12-29 13:04:20', '2023-01-01 22:23:10', NULL, NULL, '201383309219987458', 'https://cdn.discordapp.com/embed/avatars/2.png', 'Marcel#9777', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '201383309219987458', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(90, NULL, NULL, NULL, NULL, '2022-12-29 13:04:20', '2022-12-29 13:04:20', NULL, NULL, '300966440712929280', 'https://cdn.discordapp.com/avatars/300966440712929280/747eca174b2fa7e1cd85529fc9f9c419.png', 'Sniper20#1306', '#c000f1', 'OFFLINE', NULL, NULL, NULL, NULL, '300966440712929280', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(91, NULL, NULL, NULL, NULL, '2022-12-29 13:04:20', '2022-12-29 13:04:20', NULL, NULL, '813860575976882179', 'https://cdn.discordapp.com/embed/avatars/3.png', 'angi_blz#2553', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '813860575976882179', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(92, NULL, NULL, NULL, NULL, '2022-12-29 13:04:21', '2023-01-02 00:23:29', NULL, NULL, '418786086391906307', 'https://cdn.discordapp.com/avatars/418786086391906307/f3fe0adde36b748670ddf989f5b1594b.png', 'electronx3#1526', '#8b8ee7', 'OFFLINE', NULL, NULL, NULL, NULL, '418786086391906307', NULL, NULL, NULL, NULL, 0, 1173, '2022-12-29'),
(93, NULL, NULL, NULL, NULL, '2022-12-29 13:04:21', '2023-01-01 23:30:21', NULL, NULL, '197390975184797696', 'https://cdn.discordapp.com/avatars/197390975184797696/35b9349ba69801e50d2e4630a68eb3b7.png', 'Jangerlp#5158', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '197390975184797696', NULL, NULL, NULL, NULL, 0, 1534, '2022-12-29'),
(94, NULL, NULL, NULL, NULL, '2022-12-29 13:04:21', '2023-01-01 21:36:11', NULL, NULL, '397010748867477504', 'https://cdn.discordapp.com/avatars/397010748867477504/0a9589f09e998c26fa04ccfa6ce252ec.png', 'Maax#8553', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '397010748867477504', NULL, NULL, NULL, NULL, 0, 258, '2022-12-29'),
(95, NULL, NULL, NULL, NULL, '2022-12-29 13:04:21', '2022-12-29 13:04:21', NULL, NULL, '540819883445714974', 'https://cdn.discordapp.com/avatars/540819883445714974/17f6ac4659abf6137e47116a7689e2b1.png', 'xlcarinalx#7698', '#5c0000', 'OFFLINE', NULL, NULL, NULL, NULL, '540819883445714974', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(96, NULL, NULL, NULL, NULL, '2022-12-29 13:04:21', '2022-12-29 13:04:21', NULL, NULL, '786669086959861771', 'https://cdn.discordapp.com/embed/avatars/4.png', 'alinamarie#5159', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '786669086959861771', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(97, NULL, NULL, NULL, NULL, '2022-12-29 13:04:22', '2022-12-29 13:04:22', NULL, NULL, '967854121677906000', 'https://cdn.discordapp.com/embed/avatars/1.png', '22nils22#2681', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '967854121677906000', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(98, NULL, NULL, NULL, NULL, '2022-12-29 13:04:22', '2023-01-01 23:00:52', NULL, NULL, '534098133127397387', 'https://cdn.discordapp.com/avatars/534098133127397387/8c44f64b0279d93f5708472ccb41d699.png', 'zzzz#6774', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '534098133127397387', NULL, NULL, NULL, NULL, 0, 999, '2022-12-29'),
(99, NULL, NULL, NULL, NULL, '2022-12-29 13:04:22', '2023-01-01 21:45:44', NULL, NULL, '282905508346724352', 'https://cdn.discordapp.com/avatars/282905508346724352/c943949d4f16e8e45ec3da856cce1870.png', 'DuDehl#5594', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '282905508346724352', NULL, NULL, NULL, NULL, 0, 1107, '2022-12-29'),
(100, NULL, NULL, NULL, NULL, '2022-12-29 13:04:22', '2022-12-29 13:04:22', NULL, NULL, '861748279935107112', 'https://cdn.discordapp.com/avatars/861748279935107112/ae92e9bea98babaa3f63f37b43f42b9b.png', 'Samuel_MasterOfTheUniverse#1180', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '861748279935107112', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(101, NULL, NULL, NULL, NULL, '2022-12-29 13:04:23', '2022-12-30 02:19:23', NULL, NULL, '828791712259768352', 'https://cdn.discordapp.com/avatars/828791712259768352/499a98c7a7365e04eb1f6e3c5cfa5cbc.png', 'Team Sensivity#0615', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '828791712259768352', NULL, NULL, NULL, NULL, 0, 1, '2022-12-29'),
(102, NULL, NULL, NULL, NULL, '2022-12-29 13:04:23', '2022-12-29 13:04:23', NULL, NULL, '385779705124618252', 'https://cdn.discordapp.com/avatars/385779705124618252/712ed0da487f04a114fee4bbf43c2004.png', 'RandomName#2110', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '385779705124618252', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(103, NULL, NULL, NULL, NULL, '2022-12-29 13:04:23', '2022-12-29 13:04:23', NULL, NULL, '805115480406097980', 'https://cdn.discordapp.com/avatars/805115480406097980/0fadaef522bf52fc44c91f7967b950ef.png', 'Jxrome.glm#2750', '#1a1a1a', 'OFFLINE', NULL, NULL, NULL, NULL, '805115480406097980', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(104, NULL, NULL, NULL, NULL, '2022-12-29 13:04:23', '2023-01-02 01:24:31', NULL, NULL, '229966426507575296', 'https://cdn.discordapp.com/avatars/229966426507575296/9b76fe4a31a27968e6d58828e4f0094a.png', 'BlackHeart#0015', '#aeaeae', 'OFFLINE', NULL, NULL, NULL, NULL, '229966426507575296', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(105, NULL, NULL, NULL, NULL, '2022-12-29 13:04:23', '2023-01-02 03:37:47', NULL, NULL, '356881460273348610', 'https://cdn.discordapp.com/avatars/356881460273348610/a_53d94463bcd2616093d7921eafb87e6e.gif', 'T45H#5329', 'https://cdn.discordapp.com/banners/356881460273348610/a_d389440de92617eff29553d147f31a3e.gif', 'OFFLINE', NULL, NULL, NULL, NULL, '356881460273348610', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(106, NULL, NULL, NULL, NULL, '2022-12-29 13:04:24', '2023-01-01 22:29:12', NULL, NULL, '381123296462241804', 'https://cdn.discordapp.com/avatars/381123296462241804/cd0c9cd547763a14d2d75ac41ce57a0f.png', 'striker200#2489', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '381123296462241804', NULL, NULL, NULL, NULL, 0, 412, '2022-12-29'),
(107, NULL, NULL, NULL, NULL, '2022-12-29 13:04:24', '2022-12-29 13:04:24', NULL, NULL, '452155949818576896', 'https://cdn.discordapp.com/avatars/452155949818576896/9476cbf46ecdd331a382ca4ea1d03ace.png', 'Akane#6674', '#000000', 'OFFLINE', NULL, NULL, NULL, NULL, '452155949818576896', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(108, NULL, NULL, NULL, NULL, '2022-12-29 13:04:24', '2023-01-01 21:40:53', NULL, NULL, '436892395813077002', 'https://cdn.discordapp.com/avatars/436892395813077002/27a24b8cfd8293dcab03db2a115e8442.png', 'TheBrenner#7458', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '436892395813077002', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(109, NULL, NULL, NULL, NULL, '2022-12-29 13:04:24', '2022-12-29 13:04:24', NULL, NULL, '459677861192794112', 'https://cdn.discordapp.com/embed/avatars/1.png', 'kenanyilmaz#2586', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '459677861192794112', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(110, NULL, NULL, NULL, NULL, '2022-12-29 13:04:25', '2022-12-29 13:04:25', NULL, NULL, '882572432932757567', 'https://cdn.discordapp.com/embed/avatars/0.png', 'Leon Britz#5710', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '882572432932757567', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(111, 'michel.gruenig@gmail.com', '$2y$10$x/xMPdyDOckt7FgMVTAB5OvkTt/c/9bkQhTQhW6zKftAKsOya3hP6', 'Michel', 'Grünig', '2022-12-29 13:04:25', '2023-01-02 06:14:49', NULL, NULL, '422148236875137059', 'https://cdn.discordapp.com/avatars/422148236875137059/2b872fd5a8c8909c7fd3b463a7e80dc4.png', 'michel929#9299', 'https://cdn.discordapp.com/banners/422148236875137059/ac9653cb3754958402fa53db5b365c2b.png', 'ONLINE', '76561198358961534', NULL, NULL, NULL, '422148236875137059', NULL, NULL, NULL, NULL, 0, 1021, '2022-12-29'),
(112, NULL, NULL, NULL, NULL, '2022-12-29 13:04:25', '2023-01-02 01:39:32', NULL, NULL, '324535775355994123', 'https://cdn.discordapp.com/avatars/324535775355994123/28c4fbdc0122423e676747a21e3b637a.png', 'KamiAhiro#3906', '#3f85e2', 'OFFLINE', NULL, NULL, NULL, NULL, '324535775355994123', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(113, NULL, NULL, NULL, NULL, '2022-12-29 13:04:55', '2023-01-01 21:56:46', NULL, NULL, '693240272544595990', 'https://cdn.discordapp.com/avatars/693240272544595990/37b2c39e50356ef67ab746ab84e69700.png', 'voluminöseProstituierte#2060', '#36393f', 'OFFLINE', NULL, NULL, NULL, NULL, '693240272544595990', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(114, NULL, NULL, NULL, NULL, '2022-12-29 13:04:55', '2022-12-31 17:19:45', NULL, NULL, '378961812462370817', 'https://cdn.discordapp.com/embed/avatars/2.png', 'jona112112#5632', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '378961812462370817', NULL, NULL, NULL, NULL, 0, 231, '2022-12-29'),
(115, NULL, NULL, NULL, NULL, '2022-12-29 13:04:56', '2022-12-30 03:05:40', NULL, NULL, '261815554438987777', 'https://cdn.discordapp.com/avatars/261815554438987777/65d35cf0cd44b7291e313e9d5ae6d770.png', '_Manuel#1153', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '261815554438987777', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(116, NULL, NULL, NULL, NULL, '2022-12-29 13:04:56', '2022-12-29 13:04:56', NULL, NULL, '240571361922121729', 'https://cdn.discordapp.com/avatars/240571361922121729/dc191636b5bdec29bb140f2f75b9c43b.png', 'DioDayum#7869', '#84b6ab', 'OFFLINE', NULL, NULL, NULL, NULL, '240571361922121729', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(117, NULL, NULL, NULL, NULL, '2022-12-29 13:04:56', '2022-12-29 13:04:56', NULL, NULL, '1032381694826778704', 'https://cdn.discordapp.com/avatars/1032381694826778704/22552073602dc2a5537651af5d44bb6e.png', 'Snowsgiving Bot#0669', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '1032381694826778704', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(118, NULL, NULL, NULL, NULL, '2022-12-29 13:04:56', '2022-12-29 13:04:56', NULL, NULL, '367701300735115265', 'https://cdn.discordapp.com/embed/avatars/2.png', 'Michael Bock#5772', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '367701300735115265', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(119, NULL, NULL, NULL, NULL, '2022-12-29 13:04:56', '2023-01-01 23:25:02', NULL, NULL, '947810416233439302', 'https://cdn.discordapp.com/avatars/947810416233439302/19c24985d0bc44aa5ab947aacb86d1d1.png', 'Shadow133335#5083', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '947810416233439302', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(120, NULL, NULL, NULL, NULL, '2022-12-29 13:04:57', '2022-12-29 13:04:57', NULL, NULL, '734581522295947356', 'https://cdn.discordapp.com/avatars/734581522295947356/44623c0e16d62a0869ebd50242605d96.png', 'The Obsession#6821', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '734581522295947356', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(121, NULL, NULL, NULL, NULL, '2022-12-29 13:04:57', '2022-12-29 13:04:57', NULL, NULL, '709751040404357200', 'https://cdn.discordapp.com/avatars/709751040404357200/74b4770da5213ca339502a1ce602bc0f.png', 'Michelist18#6684', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '709751040404357200', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(122, NULL, NULL, NULL, NULL, '2022-12-29 13:04:57', '2022-12-29 13:04:57', NULL, NULL, '517078759308787732', 'https://cdn.discordapp.com/avatars/517078759308787732/a167ea3877128da67fa6ddcb1f5cfc79.png', 'Lootwig#9333', '#ffffff', 'OFFLINE', NULL, NULL, NULL, NULL, '517078759308787732', NULL, NULL, NULL, NULL, 0, 0, '2022-12-29'),
(123, NULL, NULL, NULL, NULL, '2022-12-29 13:04:57', '2023-01-02 02:45:00', NULL, NULL, '435697587849265155', 'https://cdn.discordapp.com/avatars/435697587849265155/a_28de5743c642cf2cf4d4802a294b3db3.gif', 'Silverr#0713', 'https://cdn.discordapp.com/banners/435697587849265155/a_7df2670eb4a1d60195c5ce69c14d5163.gif', 'OFFLINE', NULL, NULL, NULL, NULL, '435697587849265155', NULL, NULL, NULL, NULL, 0, 132, '2022-12-29');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user_role`
--

CREATE TABLE `user_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `discord_id` varchar(255) NOT NULL,
  `discord_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `user_role`
--

INSERT INTO `user_role` (`id`, `discord_id`, `discord_role`) VALUES
(1, '231168070687784960', '774003817347940373'),
(2, '231168070687784960', '1000771948042797199'),
(3, '231168070687784960', '1000773883160428584'),
(4, '338645983611322368', '1000774184609271839'),
(5, '338645983611322368', '1001078591787909133'),
(6, '570641835144511500', '1000775135193739264'),
(7, '337597703838236673', '1000774810890150009'),
(8, '337597703838236673', '1000773758086291496'),
(9, '337597703838236673', '1000773942111379506'),
(10, '337597703838236673', '1000778163091148840'),
(11, '261782768399155201', '1003405315607367750'),
(12, '261782768399155201', '826451670707863582'),
(13, '479716820253671427', '1018955755417780224'),
(14, '479716820253671427', '1000777996283682920'),
(15, '704448708376526868', '822074360814108704'),
(16, '411988803981410304', '1000774425748189284'),
(17, '869618304363421726', '1003413735685246987'),
(18, '626152052963147787', '1004466368793555106'),
(19, '626152052963147787', '1042890328887263294'),
(20, '181090908572221450', '799744335939239976'),
(21, '181090908572221450', '1003413847882858636'),
(22, '693233769678766151', '1016104142923649176'),
(23, '261522614084698112', '1012765376490258462'),
(24, '247724034240937984', '1000841476969861132'),
(25, '339045627818147850', '925119317262098554'),
(26, '534098133127397387', '1037181872402346005'),
(27, '828791712259768352', '1034829494458007575'),
(28, '422148236875137059', '1057996485133877319'),
(29, '422148236875137059', '826998925537050644'),
(30, '422148236875137059', '826998925537050647'),
(31, '1032381694826778704', '1049392664556097598'),
(32, '734581522295947356', '1004464679877357602');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `bot`
--
ALTER TABLE `bot`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `dbd_chars`
--
ALTER TABLE `dbd_chars`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `discord_role`
--
ALTER TABLE `discord_role`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `eco_server`
--
ALTER TABLE `eco_server`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `karmasystem`
--
ALTER TABLE `karmasystem`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `league_turnier`
--
ALTER TABLE `league_turnier`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `news_tags`
--
ALTER TABLE `news_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `online`
--
ALTER TABLE `online`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `securitytokens`
--
ALTER TABLE `securitytokens`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `server_infos`
--
ALTER TABLE `server_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indizes für die Tabelle `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `bot`
--
ALTER TABLE `bot`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `dbd_chars`
--
ALTER TABLE `dbd_chars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT für Tabelle `discord_role`
--
ALTER TABLE `discord_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT für Tabelle `eco_server`
--
ALTER TABLE `eco_server`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `karmasystem`
--
ALTER TABLE `karmasystem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `league_turnier`
--
ALTER TABLE `league_turnier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT für Tabelle `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT für Tabelle `news_tags`
--
ALTER TABLE `news_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT für Tabelle `online`
--
ALTER TABLE `online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT für Tabelle `securitytokens`
--
ALTER TABLE `securitytokens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `server_infos`
--
ALTER TABLE `server_infos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT für Tabelle `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
