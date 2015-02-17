-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 10, 2014 at 01:13 AM
-- Server version: 5.5.31
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jgnv`
--
CREATE DATABASE IF NOT EXISTS `jgnv` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `jgnv`;

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE IF NOT EXISTS `activities` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) unsigned DEFAULT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `type` tinyint(4) NOT NULL COMMENT 'Defined in bootstrap.php',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `model` varchar(255) DEFAULT NULL,
  `model_id` int(11) unsigned DEFAULT NULL,
  `from` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_activities_parent` (`parent_id`),
  KEY `fk_activities_user` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=98 ;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `parent_id`, `user_id`, `type`, `created`, `modified`, `model`, `model_id`, `from`) VALUES
(14, NULL, 3, 4, '2014-11-30 11:46:11', '2014-11-30 11:46:11', 'User', 3, NULL),
(15, NULL, 3, 4, '2014-11-30 18:12:30', '2014-11-30 18:12:30', 'User', 3, NULL),
(16, 15, 3, 8, '2014-11-30 18:18:01', '2014-11-30 18:18:01', 'User', 3, NULL),
(17, NULL, 4, 4, '2014-11-30 18:18:05', '2014-11-30 18:18:05', 'User', 4, NULL),
(18, NULL, 4, 4, '2014-11-30 18:21:35', '2014-11-30 18:21:35', 'User', 4, NULL),
(19, NULL, 4, 4, '2014-11-30 18:22:15', '2014-11-30 18:22:15', 'User', 4, NULL),
(20, 19, 4, 8, '2014-11-30 18:55:38', '2014-11-30 18:55:38', 'User', 4, NULL),
(21, NULL, 4, 4, '2014-11-30 18:55:44', '2014-11-30 18:55:44', 'User', 4, '::1'),
(22, 21, 4, 8, '2014-11-30 18:56:24', '2014-11-30 18:56:24', 'User', 4, NULL),
(23, NULL, 4, 4, '2014-11-30 18:59:03', '2014-11-30 18:59:03', 'User', 4, '192.168.0.130'),
(24, 23, 4, 8, '2014-11-30 18:59:11', '2014-11-30 18:59:11', 'User', 4, NULL),
(25, NULL, 4, 4, '2014-11-30 18:59:45', '2014-11-30 18:59:45', 'User', 4, '192.168.0.130'),
(26, 25, 4, 8, '2014-11-30 19:01:22', '2014-11-30 19:01:22', 'User', 4, '192.168.0.130'),
(27, NULL, 4, 4, '2014-11-30 19:02:04', '2014-11-30 19:02:04', 'User', 4, '192.168.0.130'),
(28, 27, 4, 8, '2014-11-30 19:02:14', '2014-11-30 19:02:14', 'User', 4, '192.168.0.130'),
(29, NULL, 4, 4, '2014-11-30 19:02:21', '2014-11-30 19:02:21', 'User', 4, '192.168.0.130'),
(30, NULL, 4, 1, '2014-11-30 19:28:41', '2014-11-30 19:28:41', 'Task', 4, '192.168.0.130'),
(31, NULL, 4, 1, '2014-11-30 19:32:26', '2014-11-30 19:32:26', 'Task', 4, '192.168.0.130'),
(32, NULL, 4, 1, '2014-11-30 19:37:37', '2014-11-30 19:37:37', 'Task', 1, '192.168.0.130'),
(33, NULL, 4, 1, '2014-11-30 19:38:24', '2014-11-30 19:38:24', 'Task', 2, '192.168.0.130'),
(34, NULL, 4, 1, '2014-11-30 19:39:24', '2014-11-30 19:39:24', 'Task', 4, '192.168.0.130'),
(35, NULL, 4, 1, '2014-11-30 19:40:04', '2014-11-30 19:40:04', 'Task', 1, '192.168.0.130'),
(36, NULL, 4, 1, '2014-11-30 19:42:19', '2014-11-30 19:42:19', 'Task', 2, '192.168.0.130'),
(37, NULL, 4, 1, '2014-11-30 19:42:22', '2014-11-30 19:42:22', 'Task', 2, '192.168.0.130'),
(38, NULL, 4, 1, '2014-11-30 19:45:04', '2014-11-30 19:45:04', 'Task', 3, '192.168.0.130'),
(39, NULL, 4, 1, '2014-11-30 19:45:10', '2014-11-30 19:45:10', 'Task', 4, '192.168.0.130'),
(40, NULL, 4, 1, '2014-11-30 19:45:25', '2014-11-30 19:45:25', 'Task', 3, '192.168.0.130'),
(41, NULL, 4, 1, '2014-11-30 19:45:42', '2014-11-30 19:45:42', 'Task', 1, '192.168.0.130'),
(42, NULL, 4, 1, '2014-11-30 19:47:20', '2014-11-30 19:47:20', 'Task', 3, '192.168.0.130'),
(43, NULL, 4, 1, '2014-11-30 19:48:02', '2014-11-30 19:48:02', 'Task', 3, '192.168.0.130'),
(44, NULL, 4, 1, '2014-11-30 19:49:47', '2014-11-30 19:49:47', 'Task', 3, '192.168.0.130'),
(45, NULL, 4, 1, '2014-11-30 20:22:41', '2014-11-30 20:22:41', 'Task', 3, '192.168.0.130'),
(46, NULL, 4, 1, '2014-11-30 20:24:22', '2014-11-30 20:24:22', 'Task', 4, '192.168.0.130'),
(47, NULL, 4, 1, '2014-11-30 20:25:43', '2014-11-30 20:25:43', 'Task', 3, '192.168.0.130'),
(48, NULL, 4, 1, '2014-11-30 20:29:00', '2014-11-30 20:29:00', 'Task', 4, '192.168.0.130'),
(49, NULL, 4, 1, '2014-11-30 20:30:41', '2014-11-30 20:30:41', 'Task', 4, '192.168.0.130'),
(50, NULL, 4, 1, '2014-11-30 20:31:19', '2014-11-30 20:31:19', 'Task', 1, '192.168.0.130'),
(51, NULL, 4, 1, '2014-11-30 20:31:47', '2014-11-30 20:31:47', 'Task', 2, '192.168.0.130'),
(52, NULL, 4, 1, '2014-11-30 20:32:02', '2014-11-30 20:32:02', 'Task', 3, '192.168.0.130'),
(53, NULL, 4, 1, '2014-11-30 20:32:06', '2014-11-30 20:32:06', 'Task', 4, '192.168.0.130'),
(54, NULL, 4, 1, '2014-11-30 20:32:20', '2014-11-30 20:32:20', 'Task', 4, '192.168.0.130'),
(55, NULL, 4, 1, '2014-11-30 20:32:26', '2014-11-30 20:32:26', 'Task', 2, '192.168.0.130'),
(56, NULL, 4, 1, '2014-11-30 20:32:40', '2014-11-30 20:32:40', 'Task', 3, '192.168.0.130'),
(57, NULL, 4, 1, '2014-11-30 20:32:50', '2014-11-30 20:32:50', 'Task', 3, '192.168.0.130'),
(58, NULL, 4, 1, '2014-11-30 20:33:12', '2014-11-30 20:33:12', 'Task', 1, '192.168.0.130'),
(59, NULL, 4, 1, '2014-11-30 20:33:46', '2014-11-30 20:33:46', 'Task', 2, '192.168.0.130'),
(60, NULL, 4, 1, '2014-11-30 20:33:54', '2014-11-30 20:33:54', 'Task', 3, '192.168.0.130'),
(61, NULL, 4, 1, '2014-11-30 20:34:06', '2014-11-30 20:34:06', 'Task', 1, '192.168.0.130'),
(62, NULL, 4, 1, '2014-11-30 20:34:48', '2014-11-30 20:34:48', 'Task', 1, '192.168.0.130'),
(63, NULL, 4, 1, '2014-11-30 20:35:00', '2014-11-30 20:35:00', 'Task', 2, '192.168.0.130'),
(64, NULL, 4, 1, '2014-11-30 20:35:12', '2014-11-30 20:35:12', 'Task', 2, '192.168.0.130'),
(65, NULL, 4, 1, '2014-11-30 20:35:40', '2014-11-30 20:35:40', 'Task', 2, '192.168.0.130'),
(66, NULL, 4, 1, '2014-11-30 20:35:41', '2014-11-30 20:35:41', 'Task', 2, '192.168.0.130'),
(67, NULL, 4, 1, '2014-11-30 20:35:47', '2014-11-30 20:35:47', 'Task', 1, '192.168.0.130'),
(68, NULL, 4, 1, '2014-11-30 20:36:40', '2014-11-30 20:36:40', 'Task', 3, '192.168.0.130'),
(69, NULL, 4, 1, '2014-11-30 20:36:42', '2014-11-30 20:36:42', 'Task', 1, '192.168.0.130'),
(70, NULL, 4, 1, '2014-11-30 20:39:14', '2014-11-30 20:39:14', 'Task', 3, '192.168.0.130'),
(71, NULL, 4, 1, '2014-11-30 20:39:31', '2014-11-30 20:39:31', 'Task', 1, '192.168.0.130'),
(72, NULL, 4, 1, '2014-11-30 20:40:36', '2014-11-30 20:40:36', 'Task', 4, '192.168.0.130'),
(73, NULL, 4, 1, '2014-11-30 20:42:04', '2014-11-30 20:42:04', 'Task', 2, '192.168.0.130'),
(74, NULL, 4, 1, '2014-11-30 20:42:55', '2014-11-30 20:42:55', 'Task', 4, '192.168.0.130'),
(75, NULL, 4, 1, '2014-11-30 20:42:59', '2014-11-30 20:42:59', 'Task', 2, '192.168.0.130'),
(76, NULL, 4, 1, '2014-11-30 20:43:22', '2014-11-30 20:43:22', 'Task', 1, '192.168.0.130'),
(77, NULL, 4, 1, '2014-11-30 20:43:28', '2014-11-30 20:43:28', 'Task', 4, '192.168.0.130'),
(78, NULL, 4, 1, '2014-11-30 20:43:32', '2014-11-30 20:43:32', 'Task', 3, '192.168.0.130'),
(79, NULL, 4, 1, '2014-11-30 20:44:31', '2014-11-30 20:44:31', 'Task', 1, '192.168.0.130'),
(80, NULL, 4, 1, '2014-11-30 20:48:54', '2014-11-30 20:48:54', 'Task', 2, '192.168.0.130'),
(81, NULL, 4, 1, '2014-11-30 20:48:59', '2014-11-30 20:48:59', 'Task', 3, '192.168.0.130'),
(82, NULL, 4, 1, '2014-11-30 20:49:02', '2014-11-30 20:49:02', 'Task', 4, '192.168.0.130'),
(83, NULL, 4, 1, '2014-11-30 20:49:03', '2014-11-30 20:49:03', 'Task', 4, '192.168.0.130'),
(84, NULL, 4, 1, '2014-11-30 20:49:18', '2014-11-30 20:49:18', 'Task', 1, '192.168.0.130'),
(85, NULL, 4, 1, '2014-11-30 20:49:50', '2014-11-30 20:49:50', 'Task', 1, '192.168.0.130'),
(86, NULL, 4, 1, '2014-11-30 20:50:20', '2014-11-30 20:50:20', 'Task', 1, '192.168.0.130'),
(87, NULL, 4, 1, '2014-11-30 20:50:40', '2014-11-30 20:50:40', 'Task', 3, '192.168.0.130'),
(88, NULL, 4, 1, '2014-11-30 20:50:45', '2014-11-30 20:50:45', 'Task', 4, '192.168.0.130'),
(89, NULL, 4, 1, '2014-11-30 20:50:47', '2014-11-30 20:50:47', 'Task', 2, '192.168.0.130'),
(90, NULL, 4, 1, '2014-11-30 20:51:09', '2014-11-30 20:51:09', 'Task', 4, '192.168.0.130'),
(91, NULL, 4, 1, '2014-11-30 20:51:47', '2014-11-30 20:51:47', 'Task', 3, '192.168.0.130'),
(92, NULL, 4, 4, '2014-11-30 21:14:39', '2014-11-30 21:14:39', 'User', 4, '192.168.0.140'),
(93, NULL, 4, 1, '2014-11-30 21:15:16', '2014-11-30 21:15:16', 'Task', 4, '192.168.0.140'),
(94, NULL, 4, 4, '2014-11-30 22:36:01', '2014-11-30 22:36:01', 'User', 4, '192.168.0.191'),
(95, NULL, 4, 4, '2014-12-01 08:28:40', '2014-12-01 08:28:40', 'User', 4, '192.168.0.130'),
(96, NULL, 4, 1, '2014-12-01 08:29:05', '2014-12-01 08:29:05', 'Task', 3, '192.168.0.130'),
(97, NULL, 4, 4, '2014-12-01 08:58:23', '2014-12-01 08:58:23', 'User', 4, '192.168.0.191');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel` varchar(40) NOT NULL,
  `tel2` varchar(255) NOT NULL,
  `contato` varchar(255) NOT NULL,
  `site` varchar(255) NOT NULL,
  `ativo` tinyint(1) NOT NULL,
  `obs` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `email`, `tel`, `tel2`, `contato`, `site`, `ativo`, `obs`) VALUES
(1, 'Próprio', 'joaogabrielv@gmail.com', '(21) 3798-1898', '(21) 98289-9289', 'João', 'www.phpage.com.br', 1, 'Este cliente sou eu mesmo.');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `task_id` int(10) unsigned NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_notes_user` (`user_id`),
  KEY `fk_notes_task` (`task_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned DEFAULT NULL,
  `client_id` int(11) unsigned DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `expected_start_date` datetime NOT NULL,
  `expected_deadline` datetime NOT NULL,
  `start_date` datetime NOT NULL,
  `finish_date` datetime NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_projects_client` (`client_id`),
  KEY `fk_projects_user` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `user_id`, `client_id`, `name`, `description`, `expected_start_date`, `expected_deadline`, `start_date`, `finish_date`, `status`, `created`, `modified`) VALUES
(1, 3, 1, 'JGNV - Jobs General Noting and Viewing', 'Este projeto é este próprio sistema', '2014-11-29 13:01:00', '2014-12-15 23:55:00', '2014-11-29 13:01:00', '2014-12-29 13:01:00', 0, '2014-11-29 13:03:09', '2014-11-30 09:07:02'),
(2, 3, NULL, 'Novo Projeto', 'teste', '2014-11-29 23:15:00', '2014-11-29 23:35:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2014-11-29 23:18:30', '2014-11-29 23:26:23');

-- --------------------------------------------------------

--
-- Table structure for table `projects_users`
--

CREATE TABLE IF NOT EXISTS `projects_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_projects_users_project` (`project_id`),
  KEY `fk_projects_users_user` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `projects_users`
--

INSERT INTO `projects_users` (`id`, `project_id`, `user_id`) VALUES
(3, 2, 4),
(6, 1, 3),
(7, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned DEFAULT NULL,
  `project_id` int(11) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `expected_start_date` datetime NOT NULL,
  `expected_deadline` datetime NOT NULL,
  `start_date` datetime NOT NULL,
  `finish_date` datetime NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `recipient_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tasks_project` (`project_id`),
  KEY `fk_tasks_user` (`user_id`),
  KEY `fk_tasks_recipient` (`recipient_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `user_id`, `project_id`, `name`, `description`, `expected_start_date`, `expected_deadline`, `start_date`, `finish_date`, `status`, `created`, `modified`, `recipient_id`) VALUES
(1, 3, 1, 'Criar banco de dados e estrutura básica em CakePHP', '', '2014-11-29 10:00:00', '2014-11-29 13:00:00', '2014-11-29 10:15:00', '2014-11-29 13:03:00', 0, '2014-11-29 13:05:02', '2014-11-29 22:33:25', 4),
(2, 3, 1, 'Criar repositório no github', '', '2014-11-29 13:45:00', '2014-11-29 13:45:00', '2014-11-29 13:45:00', '2014-11-29 13:45:00', 0, '2014-11-29 13:46:09', '2014-11-29 22:33:30', 4),
(3, 3, 1, 'Criar tela de login', 'Criar tela de login', '2014-11-29 19:50:00', '2014-11-29 19:50:00', '2014-11-29 19:50:00', '2014-11-29 19:50:00', 0, '2014-11-29 19:51:26', '2014-11-29 22:33:34', 4),
(4, 3, 1, 'Testar esta funcionalidade', 'O nome já diz tudo', '2014-11-29 22:30:00', '2014-11-29 22:35:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2014-11-29 22:31:18', '2014-11-29 22:31:18', 4);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE IF NOT EXISTS `teams` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `description`, `created`, `modified`) VALUES
(1, 'Desenvolvedores Back-end', 'Esta equipe agrupa todos os usuário envolvidos com o desenvolvimento mais focado em back-end.', '2014-11-29 12:59:42', '2014-11-29 12:59:42'),
(2, 'Desenvolvedores Front-end', 'Esta equipe agrupa todos os envolvidos em atividades voltadas para o front-end como HTML, CSS e Javascript, por exemplo', '2014-11-29 13:00:51', '2014-11-29 13:00:51');

-- --------------------------------------------------------

--
-- Table structure for table `teams_users`
--

CREATE TABLE IF NOT EXISTS `teams_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `team_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_teams_users_team` (`team_id`),
  KEY `fk_teams_users_user` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `teams_users`
--

INSERT INTO `teams_users` (`id`, `team_id`, `user_id`) VALUES
(5, 1, 3),
(6, 2, 3),
(7, 1, 4),
(8, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(40) NOT NULL,
  `tokenhash` varchar(255) NOT NULL DEFAULT '',
  `tokenhash_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `name` varchar(127) NOT NULL,
  `email` varchar(127) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `tokenhash`, `tokenhash_date`, `name`, `email`, `created`, `modified`) VALUES
(3, 'admin', '$2a$10$4/g7CTyFn9ee.Ky8NDEqcuoB/FTRfw6eNVJQQXtVakpYsN08xobxG', 'admin', '', '2014-11-29 20:38:00', 'Administrador', 'joaogabrielv@gmail.com', '2014-11-29 20:39:20', '2014-11-30 11:15:13'),
(4, 'joao', '$2a$10$8RnjUdHiB0aPS/W4aAVYauCbnu5PYlHRBXDUPXSbu3QDgym/eJ66C', 'common_user', '', '2014-11-29 20:45:00', 'João Gabriel', 'joaogabrielv@gmail.com', '2014-11-29 20:46:13', '2014-11-29 20:46:13');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `activities_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `notes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `projects_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `projects_users`
--
ALTER TABLE `projects_users`
  ADD CONSTRAINT `projects_users_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `projects_users_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `tasks_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `tasks_ibfk_3` FOREIGN KEY (`recipient_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `teams_users`
--
ALTER TABLE `teams_users`
  ADD CONSTRAINT `teams_users_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `teams_users_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
