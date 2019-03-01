-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 13-Fev-2019 às 10:19
-- Versão do servidor: 10.1.37-MariaDB-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `omeljwzp_login_system`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_uid` varchar(255) NOT NULL,
  `admin_first` varchar(255) NOT NULL,
  `admin_last` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pwd` varchar(255) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_uid`, `admin_first`, `admin_last`, `admin_email`, `admin_pwd`, `active`, `created_at`, `updated_at`) VALUES
(0, 'ckjones1', 'Alvaro Gabriel', 'Gomez Andazol', 'alvarogabrielgomez@gmail.com', '$2y$10$VGodjNv/qQ9coslQ.PjyjeXNMHP72nxbs88Hr.8slh4gK2SmQm4o2', 1, '2019-01-09 21:42:18', '2019-01-09 21:42:32'),
(3, 'test', 'test', 'test', 'test@gmail.com', '$2y$10$9ib8CoH5t3YKrJjAHtvxmOzhFy04uZXTpWiz3u3Xj8nhq4JXziJa.', 1, '2019-01-07 19:13:47', '2019-01-07 19:13:47'),
(4, 'jojojo', 'probando', 'mamaguevo', 'quenotas@gmail.com', '$2y$10$r5YbMrQhaqDhXbob8K6l1.VuNlof8NXuraDIqQu79CbcRmHbjecuC', 1, '2019-01-31 01:15:16', '2019-01-31 01:15:16');

-- --------------------------------------------------------

--
-- Estrutura da tabela `buss`
--

CREATE TABLE `buss` (
  `buss_id` int(10) UNSIGNED NOT NULL,
  `buss_name` varchar(500) DEFAULT 'Mollis Vehicula',
  `buss_dir` varchar(500) DEFAULT '1622  Adams Avenue, Frederick MD, 21701',
  `buss_phone` varchar(255) DEFAULT '5555555555555',
  `buss_url` varchar(500) DEFAULT 'http://ckj1.site11.com',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cover_url` varchar(500) NOT NULL DEFAULT 'img/buss/buss1.jpg',
  `active` int(1) NOT NULL DEFAULT '1',
  `auth` varchar(255) NOT NULL DEFAULT '1',
  `buss_uid` varchar(255) NOT NULL,
  `buss_pwd` varchar(255) NOT NULL,
  `buss_limits` int(2) UNSIGNED DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `buss`
--

INSERT INTO `buss` (`buss_id`, `buss_name`, `buss_dir`, `buss_phone`, `buss_url`, `created_at`, `updated_at`, `cover_url`, `active`, `auth`, `buss_uid`, `buss_pwd`, `buss_limits`) VALUES
(1, 'Mollis Vehicula', '1622  Adams Avenue, Frederick MD, 21701', '5555555555555', 'http://ckj1.site11.com', '2018-12-18 14:39:02', '2019-01-23 05:33:04', 'img/buss/buss1.jpg', 1, '1', '', '', 4),
(2, 'Vallar Vergulis', '4592  Game Of Thrones, Sin Rostro, 33433', '6666666666666', 'http://ckj1.site11.com', '2018-12-18 14:39:02', '2018-12-18 14:39:02', 'img/buss/buss1.jpg', 1, '1', '', '', 3),
(3, 'Pizza Box Boyz', 'Directo en tu corazon', '77777777777777', 'http://ckj1.site11.com', '2018-12-18 14:39:02', '2018-12-18 14:39:02', 'img/buss/buss3.jpg', 1, '1', '', '', 3),
(5, 'Pizza Hot', 'El guevo 1943, al lado de mc donalds', '22222222222', 'http://jdaskldjad.com', '2019-01-08 02:04:38', '2019-01-08 02:46:04', 'img/buss/buss1.jpg', 1, '304f125cea3e43472e5f7af586df85ce2cfe0726', 'pizzahot', '$2y$10$EvRpabl2ff5ONtEpVgJHCeGA5Z.7nqMh0SP6CA588pJSPml.vcw0S', 3),
(6, 'Mc Donalds', 'ashjdasd,2313, asdasd', '22202020202', 'http://jdasahdasskldjad.com', '2019-01-08 02:48:05', '2019-01-08 02:48:05', 'img/buss/buss1.jpg', 1, '2e035407014b0f29aad698851641b12e58eff3e2', 'mcdonalds', '$2y$10$nTxbMQmM1QnX.kVsWn5v/Od9HMx4dN98eLjHLa4uxz.5a8qyHc8fS', 3),
(7, 'Vitae Posuere', 'Rua Anuar JosÃ© Elias, 474 SÃ£o JosÃ© do Rio Preto-SP 15077-110', '(17) 6397-4869', 'ckj.one', '2019-01-12 04:29:23', '2019-01-12 04:29:23', 'img/buss/buss1.jpg', 1, '7742051e9aac5b530142a071a1096dfa354e14e7', 'vitae', '$2y$10$OadBz3z6EvB43eT5ezPea.FMlJqocrEA15vAHc1GgnBDAKzp.9Kr6', 3),
(8, 'La Mansion Del Pan', 'Rua SÃ£o TomÃ©, 1734 Cruzeiro-SP', '(12) 7278-4383', 'ckj.one', '2019-01-12 04:45:36', '2019-01-12 04:45:36', 'img/buss/buss1.jpg', 1, '5ac6e601c6a0958222ca1c19965042275793a4cc', 'mansion', '$2y$10$TEug5BGTPDghjKiGe4EjFOCc.Zeny1ZhGoFMxexpZFWA3YBzXRfZO', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `buylimits`
--

CREATE TABLE `buylimits` (
  `limits_id` int(10) UNSIGNED NOT NULL,
  `buss_id` int(10) UNSIGNED DEFAULT '1',
  `client_id` int(10) UNSIGNED DEFAULT '1',
  `post_id` int(10) UNSIGNED DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `limit_count` int(1) UNSIGNED DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `buylimits`
--

INSERT INTO `buylimits` (`limits_id`, `buss_id`, `client_id`, `post_id`, `created_at`, `updated_at`, `limit_count`) VALUES
(79, 2, 0, 12, '2019-02-09 11:09:04', '2019-02-09 11:09:04', 1),
(80, 7, 0, 21, '2019-02-09 11:09:54', '2019-02-09 11:09:54', 1),
(81, 1, NULL, 20, '2019-02-11 18:49:50', '2019-02-11 18:49:50', 1),
(82, 1, 0, 20, '2019-02-12 22:07:48', '2019-02-12 22:07:48', 1),
(83, 7, 100, 21, '2019-02-13 09:39:08', '2019-02-13 09:39:08', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `clients`
--

CREATE TABLE `clients` (
  `client_id` int(10) UNSIGNED NOT NULL,
  `client_first` varchar(255) NOT NULL,
  `client_last` varchar(255) NOT NULL,
  `client_email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` int(1) NOT NULL DEFAULT '1',
  `client_uid` varchar(255) DEFAULT NULL,
  `client_pwd` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clients`
--

INSERT INTO `clients` (`client_id`, `client_first`, `client_last`, `client_email`, `created_at`, `active`, `client_uid`, `client_pwd`) VALUES
(0, 'Alvaro Gabriel', 'Andazol', 'alvarogabrielgomez@gmail.com', '2019-01-23 02:10:52', 1, NULL, NULL),
(2, 'elguevo', 'test', 'quenotas@gmail.com', '2019-01-04 17:54:35', 1, NULL, NULL),
(3, 'MAMAGUEVO', 'JODER', 'test2@gmail.com', '2019-01-11 16:15:33', 1, NULL, NULL),
(4, 'Alvaro Gabriel', 'Andazol', 'omeletasdas@gag.com', '2019-01-22 21:46:45', 1, NULL, NULL),
(99, 'Alvaro Gabriel', 'Andazol', 'test@gmail.com', '2019-01-23 02:49:07', 1, NULL, NULL),
(100, 'El Super Guevo', 'Rodriguez', 'elguevo@gmail.com', '2019-01-31 01:31:15', 1, 'elguevo', '$2y$10$Fq2BoAGit7Og7l54M67ot.Y1uZPuVgRZSzHD0uYfiG4fRo6M12Vwu'),
(101, 'samir', 'samir', 'samir@tidsoftware.com.br', '2019-02-11 18:49:50', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estados_list`
--

CREATE TABLE `estados_list` (
  `estado_id` int(11) NOT NULL,
  `pais_code` varchar(2) NOT NULL DEFAULT 'BR',
  `estado_name` varchar(255) NOT NULL,
  `estado_code` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `estados_list`
--

INSERT INTO `estados_list` (`estado_id`, `pais_code`, `estado_name`, `estado_code`) VALUES
(1, 'BR', 'Sao Paulo', 'SP'),
(2, 'VE', 'Distrito Capital', 'DC');

-- --------------------------------------------------------

--
-- Estrutura da tabela `municipios_list`
--

CREATE TABLE `municipios_list` (
  `municipios_id` int(11) NOT NULL,
  `pais_code` varchar(2) NOT NULL DEFAULT 'BR',
  `estado_code` varchar(2) NOT NULL DEFAULT 'SP',
  `municipio_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `municipios_list`
--

INSERT INTO `municipios_list` (`municipios_id`, `pais_code`, `estado_code`, `municipio_name`) VALUES
(1, 'BR', 'SP', 'Piracicaba'),
(2, 'VE', 'DC', 'Caracas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `paises_list`
--

CREATE TABLE `paises_list` (
  `pais_id` int(11) NOT NULL,
  `pais_name` varchar(255) NOT NULL,
  `pais_code` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `paises_list`
--

INSERT INTO `paises_list` (`pais_id`, `pais_name`, `pais_code`) VALUES
(1, 'Brasil', 'BR'),
(2, 'Venezuela', 'VE');

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE `posts` (
  `post_id` int(10) UNSIGNED NOT NULL,
  `buss_id` int(10) UNSIGNED NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `offer_end_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `price_new` decimal(6,2) UNSIGNED NOT NULL DEFAULT '10.10',
  `price_from` decimal(6,2) UNSIGNED NOT NULL DEFAULT '11.11',
  `title` varchar(255) NOT NULL DEFAULT 'Oferta Lorem ipsum dolor sit amer us nec mollis vehicula, magna tortor finibus libero',
  `description` varchar(255) NOT NULL DEFAULT 'Oferta Lorem ipsum dolor sit amer us nec mollis vehicula, magna tortor finibus libero, vitae posuere ante lectus in enim. mollis vehicula, magna tortor finibus libero, vitae',
  `post_hero_img_url` varchar(500) DEFAULT 'img/tumb1.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`post_id`, `buss_id`, `active`, `created_at`, `updated_at`, `offer_end_at`, `price_new`, `price_from`, `title`, `description`, `post_hero_img_url`) VALUES
(1, 1, 1, '2019-01-26 14:33:38', '2019-02-06 13:10:51', '2019-03-15 01:00:00', '10.10', '11.11', 'Oferta Lorem ipsum dolor sit amer us nec mollis vehicula, magna tortor finibus libero', 'Oferta Lorem ipsum dolor sit amer us nec mollis vehicula, magna tortor finibus libero, vitae posuere ante lectus in enim. mollis vehicula, magna tortor finibus libero, vitae', 'img/tumb1.jpg'),
(11, 1, 1, '2019-01-12 04:11:47', '2019-02-06 13:10:59', '2019-03-01 02:00:00', '12.00', '37.00', 'PromoÃ§Ã£o do Ximxim de Galinha 2x3 mais um refrigerante', 'Um saboroso prato de promoÃ§Ã£o do Ximxim de Galinha onde pelo preÃ§o de dois vocÃª ganha trÃªs mais um refrigerante. Oferta perfeita', 'img/posts/ximxim-de-gallinha.jpg'),
(12, 2, 1, '2019-01-12 04:17:48', '2019-02-06 13:11:06', '2019-03-04 02:00:00', '12.00', '26.00', 'Feijoada com limÃ£o e carne de porco extra', 'Uma feijoada clÃ¡ssica com o sabor que vocÃª sÃ³ encontra aqui. Esta oportunidade vocÃª terÃ¡ carne de porco extra e um preÃ§o muito mais barato', 'img/posts/frijolada.jpg'),
(13, 1, 1, '2019-01-12 04:20:58', '2019-02-06 13:11:14', '2019-03-28 01:00:00', '7.00', '14.00', ' PromoÃ§Ã£o de 600 gr de Brigadeiros', 'Um sabor saboroso de chocolate recheado com mais chocolate, coberto com mais chocolate. 600 gramas, entÃ£o vocÃª comeÃ§a bem o ano.', 'img/posts/brigadier.jpg'),
(14, 7, 1, '2019-01-12 04:31:38', '2019-02-06 13:11:20', '2019-03-21 02:00:00', '23.00', '45.00', ' Churrasco para dois mais quatro cervejas de 400 ml', 'Sabemos que sua predileÃ§Ã£o especial Ã© com uma boa carne de churrazco, Ã© por isso que temos essa boa oferta para vocÃª', 'img/posts/churrasco.jpg'),
(15, 7, 1, '2019-01-26 04:38:10', '2019-02-06 13:11:25', '2019-03-22 01:00:00', '30.00', '50.00', ' 5 Caipirinhas pelo preÃ§o de 3', 'O melhor para passar o calor sÃ£o boas caipirinhas\\r\\n', 'img/posts/caipirinha.jpg'),
(16, 8, 1, '2019-01-24 04:48:43', '2019-01-24 23:33:22', '0000-00-00 00:00:00', '29.00', '50.00', '50 pÃ£o de queijo para vocÃª', 'Para uma reuniÃ£o ou apenas para comer por prazer, temos uma incrÃ­vel quantidade de pÃ£o de queijo para vocÃª', 'img/posts/pao-queijo.jpg'),
(19, 5, 1, '2019-01-27 05:28:06', '2019-02-06 13:13:59', '2019-04-18 01:00:00', '12.00', '13.00', 'Nullam auctor eros magna, ac finibus', 'Sed bibendum bibendum nulla, in rhoncus eros rhoncus sit amet. Sed accumsan rutrum egestas. Cras egestas lorem ut cursus dignissim. Phasellus sit amet ligula sed arcu malesuada laoreet in nec ligula. Cras cursus arcu a sem bibendum rutrum.', 'img/tumb1.jpg'),
(20, 1, 1, '2019-01-25 05:31:17', '2019-02-06 13:14:22', '2019-02-14 02:00:00', '11.00', '122.00', 'Curabitur pharetra lacinia tempor', ' Donec ornare odio ante, id ullamcorper lacus molestie et. Maecenas molestie elit et tincidunt eleifend. Duis a elementum eros, eu scelerisque ex. Quisque porta dui elit,', 'img/tumb1.jpg'),
(21, 7, 1, '2019-01-01 05:31:51', '2019-02-06 13:14:46', '2019-03-01 02:00:00', '11.00', '12.00', ' Vivamus finibus augue ac ex congue ', ' Phasellus porta, velit a congue laoreet, justo nisl consectetur diam, vitae rhoncus enim est eget nisl. Phasellus velit leo, vestibulum consequat egestas in, euismod vel lorem. ', 'img/tumb1.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `buss_id` varchar(255) NOT NULL DEFAULT '1',
  `client_id` int(10) UNSIGNED NOT NULL,
  `transaction_qr` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `finished` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `post_id`, `buss_id`, `client_id`, `transaction_qr`, `created_at`, `updated_at`, `finished`) VALUES
(371, 1, '1', 0, '017827271', '2019-01-23 02:45:03', '2019-01-23 02:45:03', 0),
(372, 1, '1', 10, '1017765541', '2019-01-23 02:49:07', '2019-01-23 02:49:07', 0),
(373, 1, '1', 99, '9919058571', '2019-01-23 02:54:54', '2019-01-23 02:54:54', 0),
(374, 1, '1', 99, '9912778591', '2019-01-23 03:00:01', '2019-01-23 03:00:01', 0),
(375, 1, '1', 99, '9918932801', '2019-01-23 03:03:21', '2019-01-23 03:03:21', 0),
(376, 1, '1', 99, '9917353411', '2019-01-23 03:08:05', '2019-01-23 03:08:05', 0),
(377, 1, '1', 99, '9916541031', '2019-01-23 03:08:40', '2019-01-23 03:08:40', 0),
(378, 1, '1', 0, '015385501', '2019-01-23 03:11:36', '2019-01-23 03:11:36', 0),
(379, 1, '1', 0, '015284001', '2019-01-23 03:12:36', '2019-01-23 03:12:36', 0),
(380, 1, '1', 0, '017995361', '2019-01-23 03:14:47', '2019-01-23 03:14:47', 0),
(381, 1, '1', 0, '0152251', '2019-01-23 04:17:06', '2019-01-23 04:17:06', 0),
(382, 1, '1', 0, '0182041', '2019-01-23 04:19:51', '2019-01-23 04:19:51', 0),
(383, 1, '1', 0, '01686391', '2019-01-23 04:20:32', '2019-01-23 04:20:32', 0),
(384, 1, '1', 0, '015790581', '2019-01-22 04:21:14', '2019-01-22 04:21:14', 0),
(385, 1, '1', 0, '016883891', '2019-01-22 04:21:48', '2019-01-22 04:21:48', 0),
(386, 1, '1', 0, '014298041', '2019-01-23 04:43:20', '2019-01-23 04:43:20', 0),
(387, 1, '1', 0, '013662001', '2019-01-23 04:43:34', '2019-01-23 04:43:34', 0),
(388, 1, '1', 0, '014059531', '2019-01-23 04:43:46', '2019-01-23 04:43:46', 0),
(389, 17, '8', 0, '0173912728', '2019-01-23 04:48:30', '2019-01-23 04:48:30', 0),
(390, 17, '8', 0, '0173108708', '2019-01-23 04:48:47', '2019-01-23 04:48:47', 0),
(391, 17, '8', 0, '0172557008', '2019-01-23 04:51:10', '2019-01-23 04:51:10', 0),
(392, 12, '2', 0, '0128628932', '2019-01-23 04:51:56', '2019-01-23 04:51:56', 0),
(393, 12, '2', 0, '0126342772', '2019-01-23 04:52:11', '2019-01-23 04:52:11', 0),
(394, 12, '2', 0, '0125227332', '2019-01-23 04:52:25', '2019-01-23 04:52:25', 0),
(395, 14, '7', 0, '0149855337', '2019-01-23 04:53:36', '2019-01-23 04:53:36', 0),
(396, 15, '7', 0, '0159182427', '2019-01-23 04:58:11', '2019-01-23 04:58:11', 0),
(397, 15, '7', 0, '0158201037', '2019-01-23 05:23:14', '2019-01-23 05:23:14', 0),
(398, 15, '7', 0, '0154449527', '2019-01-23 05:23:27', '2019-01-23 05:23:27', 0),
(399, 15, '7', 0, '0153742177', '2019-01-23 05:23:48', '2019-01-23 05:23:48', 0),
(400, 15, '7', 0, '0158560357', '2019-01-23 05:24:38', '2019-01-23 05:24:38', 0),
(401, 15, '7', 0, '0152269197', '2019-01-23 05:31:18', '2019-01-23 05:31:18', 0),
(402, 15, '7', 0, '0151853127', '2019-01-23 05:32:23', '2019-01-23 05:32:23', 0),
(403, 1, '1', 0, '014278701', '2019-01-23 05:33:17', '2019-01-23 05:33:17', 0),
(404, 1, '1', 0, '01167401', '2019-01-23 05:33:34', '2019-01-23 05:33:34', 0),
(405, 1, '1', 0, '014097311', '2019-01-23 05:33:47', '2019-01-23 05:33:47', 0),
(406, 1, '1', 0, '012373691', '2019-01-23 05:33:59', '2019-01-23 05:33:59', 0),
(407, 1, '1', 0, '011608421', '2019-01-24 05:52:48', '2019-01-24 05:52:48', 0),
(408, 1, '1', 0, '013000501', '2019-01-24 05:53:00', '2019-01-24 05:53:00', 0),
(409, 1, '1', 0, '013244371', '2019-01-24 05:54:32', '2019-01-24 05:54:32', 0),
(410, 1, '1', 0, '019287091', '2019-01-24 05:54:45', '2019-01-24 05:54:45', 0),
(411, 1, '1', 0, '015628321', '2019-01-25 06:00:56', '2019-01-25 06:00:56', 0),
(412, 1, '1', 0, '016989891', '2019-01-25 06:02:37', '2019-01-25 06:02:37', 0),
(413, 1, '1', 0, '012777851', '2019-01-25 06:07:21', '2019-01-25 06:07:21', 0),
(414, 1, '1', 0, '019654411', '2019-01-25 06:19:46', '2019-01-25 06:19:46', 0),
(415, 1, '1', 0, '014622561', '2019-01-25 06:20:20', '2019-01-25 06:20:20', 0),
(416, 1, '1', 0, '013363391', '2019-01-25 06:20:33', '2019-01-25 06:20:33', 0),
(417, 1, '1', 0, '012568101', '2019-01-26 06:21:07', '2019-01-26 06:21:07', 0),
(418, 1, '1', 0, '019738701', '2019-01-26 06:21:20', '2019-01-26 06:21:20', 0),
(419, 1, '1', 0, '016561431', '2019-01-26 06:21:33', '2019-01-26 06:21:33', 0),
(420, 1, '1', 0, '019286121', '2019-01-26 06:21:48', '2019-01-26 06:21:48', 0),
(421, 1, '1', 0, '014541391', '2019-01-23 06:24:01', '2019-01-23 06:24:01', 0),
(422, 1, '1', 0, '016302351', '2019-01-23 06:30:38', '2019-01-23 06:30:38', 0),
(423, 1, '1', 0, '018596691', '2019-01-23 06:30:39', '2019-01-23 06:30:39', 0),
(424, 1, '1', 0, '01581841', '2019-01-23 06:30:57', '2019-01-23 06:30:57', 0),
(425, 1, '1', 0, '015800571', '2019-01-23 06:31:59', '2019-01-23 06:31:59', 0),
(426, 1, '1', 0, '019816441', '2019-01-23 06:43:52', '2019-01-23 06:43:52', 0),
(427, 1, '1', 0, '013363881', '2019-01-23 06:43:53', '2019-01-23 06:43:53', 0),
(428, 1, '1', 0, '017863621', '2019-01-23 06:44:13', '2019-01-23 06:44:13', 0),
(429, 1, '1', 0, '019252751', '2019-01-23 06:44:36', '2019-01-23 06:44:36', 0),
(430, 1, '1', 0, '016957071', '2019-01-23 06:47:02', '2019-01-23 06:47:02', 0),
(431, 1, '1', 0, '011427381', '2019-01-23 06:47:05', '2019-01-23 06:47:05', 0),
(432, 1, '1', 0, '01665741', '2019-01-23 06:47:06', '2019-01-23 06:47:06', 0),
(433, 1, '1', 0, '018055011', '2019-01-23 06:47:06', '2019-01-23 06:47:06', 0),
(434, 1, '1', 0, '014836701', '2019-01-23 06:49:05', '2019-01-23 06:49:05', 0),
(435, 1, '1', 0, '014964601', '2019-01-23 06:49:07', '2019-01-23 06:49:07', 0),
(436, 1, '1', 0, '015472791', '2019-01-23 06:50:38', '2019-01-23 06:50:38', 0),
(437, 1, '1', 0, '013575851', '2019-01-23 06:50:38', '2019-01-23 06:50:38', 0),
(438, 1, '1', 0, '019680401', '2019-01-23 06:51:09', '2019-01-23 06:51:09', 0),
(439, 1, '1', 0, '01518841', '2019-01-23 06:51:12', '2019-01-23 06:51:12', 0),
(440, 1, '1', 0, '015962061', '2019-01-23 06:51:42', '2019-01-23 06:51:42', 0),
(441, 1, '1', 0, '013871761', '2019-01-23 06:52:30', '2019-01-23 06:52:30', 0),
(442, 1, '1', 0, '012707321', '2019-01-23 06:52:53', '2019-01-23 06:52:53', 0),
(443, 1, '1', 0, '011516371', '2019-01-23 06:53:15', '2019-01-23 06:53:15', 0),
(444, 1, '1', 0, '013189401', '2019-01-23 06:53:32', '2019-01-23 06:53:32', 0),
(445, 1, '1', 0, '011460741', '2019-01-23 06:57:13', '2019-01-23 06:57:13', 0),
(446, 1, '1', 0, '018890441', '2019-01-23 06:57:13', '2019-01-23 06:57:13', 0),
(447, 1, '1', 0, '014823121', '2019-01-23 06:57:13', '2019-01-23 06:57:13', 0),
(448, 1, '1', 0, '016858871', '2019-01-23 06:57:13', '2019-01-23 06:57:13', 0),
(449, 1, '1', 0, '017115991', '2019-01-23 06:57:38', '2019-01-23 06:57:38', 0),
(450, 1, '1', 0, '018828831', '2019-01-23 07:00:00', '2019-01-23 07:00:00', 0),
(451, 1, '1', 0, '019356331', '2019-01-23 07:00:53', '2019-01-23 07:00:53', 0),
(452, 1, '1', 0, '016898301', '2019-01-23 07:04:58', '2019-01-23 07:04:58', 0),
(453, 1, '1', 0, '019374921', '2019-01-23 07:07:04', '2019-01-23 07:07:04', 0),
(454, 1, '1', 0, '018723621', '2019-01-23 07:07:55', '2019-01-23 07:07:55', 0),
(455, 1, '1', 0, '016839091', '2019-01-23 07:07:55', '2019-01-23 07:07:55', 0),
(456, 1, '1', 0, '018616211', '2019-01-23 07:07:56', '2019-01-23 07:07:56', 0),
(457, 1, '1', 0, '018803351', '2019-01-23 07:07:56', '2019-01-23 07:07:56', 0),
(458, 1, '1', 0, '019101261', '2019-01-23 07:09:06', '2019-01-23 07:09:06', 0),
(459, 1, '1', 0, '015920731', '2019-01-23 07:09:29', '2019-01-23 07:09:29', 0),
(460, 12, '2', 0, '0128663332', '2019-01-23 07:18:39', '2019-01-23 07:18:39', 0),
(461, 12, '2', 0, '0122923022', '2019-01-23 07:18:51', '2019-01-23 07:18:51', 0),
(462, 11, '1', 0, '0112854851', '2019-01-24 18:41:31', '2019-01-24 18:41:31', 0),
(463, 3, '1', 0, '034155761', '2019-01-25 14:49:59', '2019-01-25 14:49:59', 0),
(464, 2, '2', 0, '026659042', '2019-01-27 23:45:46', '2019-01-27 23:45:46', 0),
(465, 19, '5', 0, '0194789955', '2019-01-28 04:45:13', '2019-01-28 04:45:13', 0),
(466, 15, '7', 0, '0152487517', '2019-01-30 19:54:36', '2019-01-30 19:54:36', 0),
(467, 15, '7', 0, '0152788707', '2019-01-30 19:57:21', '2019-01-30 19:57:21', 0),
(468, 15, '7', 0, '0157962747', '2019-01-30 19:58:11', '2019-01-30 19:58:11', 0),
(469, 1, '1', 0, '018295481', '2019-01-30 22:36:57', '2019-01-30 22:36:57', 0),
(470, 16, '8', 0, '0168669788', '2019-01-30 23:36:49', '2019-01-30 23:36:49', 0),
(471, 16, '8', 0, '0161743018', '2019-01-30 23:37:34', '2019-01-30 23:37:34', 0),
(472, 16, '8', 0, '0169719158', '2019-01-30 23:37:52', '2019-01-30 23:37:52', 0),
(473, 5, '2', 0, '059620042', '2019-01-30 23:39:10', '2019-01-30 23:39:10', 0),
(474, 5, '2', 0, '053803042', '2019-01-30 23:39:46', '2019-01-30 23:39:46', 0),
(475, 15, '7', 0, '0154476597', '2019-01-31 00:10:56', '2019-01-31 00:10:56', 0),
(476, 15, '7', 100, '100156960137', '2019-01-31 01:50:02', '2019-01-31 01:50:02', 0),
(477, 15, '7', 0, '0156083057', '2019-01-31 02:22:14', '2019-01-31 02:22:14', 0),
(478, 15, '7', 0, '0158023057', '2019-01-31 02:40:29', '2019-01-31 02:40:29', 0),
(479, 15, '7', 0, '0151707787', '2019-01-31 02:41:56', '2019-01-31 02:41:56', 0),
(480, 15, '7', 100, '100155718427', '2019-01-31 03:20:03', '2019-01-31 03:20:03', 0),
(481, 15, '7', 100, '100154639337', '2019-01-31 03:20:23', '2019-01-31 03:20:23', 0),
(482, 15, '7', 100, '100159140097', '2019-01-31 03:21:03', '2019-01-31 03:21:03', 0),
(483, 12, '2', 0, '0124767522', '2019-02-09 11:09:04', '2019-02-09 11:09:04', 0),
(484, 21, '7', 0, '0212892117', '2019-02-09 11:09:54', '2019-02-09 11:09:54', 0),
(485, 20, '1', 101, '101206056911', '2019-02-11 18:49:50', '2019-02-11 18:49:50', 0),
(486, 20, '1', 0, '0203339341', '2019-02-12 22:07:48', '2019-02-12 22:07:48', 0),
(487, 21, '7', 100, '100213394897', '2019-02-13 09:39:08', '2019-02-13 09:39:08', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_uid` (`admin_uid`),
  ADD UNIQUE KEY `admin_email` (`admin_email`);

--
-- Indexes for table `buss`
--
ALTER TABLE `buss`
  ADD PRIMARY KEY (`buss_id`);

--
-- Indexes for table `buylimits`
--
ALTER TABLE `buylimits`
  ADD PRIMARY KEY (`limits_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`),
  ADD UNIQUE KEY `client_email` (`client_email`),
  ADD UNIQUE KEY `client_uid` (`client_uid`);

--
-- Indexes for table `estados_list`
--
ALTER TABLE `estados_list`
  ADD PRIMARY KEY (`estado_id`);

--
-- Indexes for table `municipios_list`
--
ALTER TABLE `municipios_list`
  ADD PRIMARY KEY (`municipios_id`);

--
-- Indexes for table `paises_list`
--
ALTER TABLE `paises_list`
  ADD PRIMARY KEY (`pais_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `buss`
--
ALTER TABLE `buss`
  MODIFY `buss_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `buylimits`
--
ALTER TABLE `buylimits`
  MODIFY `limits_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `estados_list`
--
ALTER TABLE `estados_list`
  MODIFY `estado_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `municipios_list`
--
ALTER TABLE `municipios_list`
  MODIFY `municipios_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `paises_list`
--
ALTER TABLE `paises_list`
  MODIFY `pais_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=488;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
