-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28-Fev-2019 às 15:32
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login_system`
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
(83, 7, 100, 21, '2019-02-13 09:39:08', '2019-02-13 09:39:08', 1),
(84, 8, NULL, 16, '2019-02-13 16:04:10', '2019-02-13 16:04:10', 1),
(85, 5, 102, 19, '2019-02-13 18:17:51', '2019-02-13 18:22:57', 3),
(86, 7, 102, 15, '2019-02-13 18:24:04', '2019-02-13 18:24:04', 1),
(87, 5, 0, 19, '2019-02-13 18:26:08', '2019-02-13 18:26:08', 1),
(88, 7, 0, 15, '2019-02-27 13:10:55', '2019-02-27 14:30:13', 3),
(89, 5, 0, 19, '2019-02-27 14:30:47', '2019-02-27 20:55:05', 3),
(90, 1, 0, 11, '2019-02-27 14:31:09', '2019-02-27 18:08:35', 2),
(91, 7, 0, 15, '2019-02-28 11:46:52', '2019-02-28 11:46:52', 1),
(92, 5, 0, 19, '2019-02-28 11:55:26', '2019-02-28 11:55:26', 1);

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
(101, 'samir', 'samir', 'samir@tidsoftware.com.br', '2019-02-11 18:49:50', 1, NULL, NULL),
(102, 'adasd', 'sasdas', 'sadas@dasd.com', '2019-02-13 16:04:10', 1, NULL, NULL),
(103, 'test', 'test', 'test@test.com', '2019-02-27 18:06:53', 1, 'test', '$2y$10$YWgMImHR/m0LydZ7fCNTUun4RqxWrYHu920T0Yo.uRa2.aElVzWZu');

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
-- Estrutura da tabela `pwdreset`
--

CREATE TABLE `pwdreset` (
  `pwdReset_id` int(11) NOT NULL,
  `pwdReset_email` text NOT NULL,
  `pwdReset_selector` text NOT NULL,
  `pwdReset_token` longtext NOT NULL,
  `pwdReset_expires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(495, 21, '7', 0, '021238027', '2019-02-27 14:29:58', '2019-02-27 14:29:58', 0),
(496, 14, '7', 0, '0146301597', '2019-02-27 14:30:13', '2019-02-27 14:30:13', 0),
(497, 19, '5', 0, '0199527025', '2019-02-27 14:30:47', '2019-02-27 14:30:47', 0),
(498, 11, '1', 0, '0115227551', '2019-02-27 14:31:09', '2019-02-27 14:31:09', 0),
(499, 19, '5', 0, '0197581245', '2019-02-27 17:50:09', '2019-02-27 17:50:09', 0),
(500, 13, '1', 0, '0136632591', '2019-02-27 18:08:35', '2019-02-27 18:08:57', 1),
(501, 19, '5', 0, '0199556325', '2019-02-27 20:55:05', '2019-02-27 20:55:05', 0),
(502, 15, '7', 0, '0155932867', '2019-02-28 11:46:52', '2019-02-28 11:46:52', 0),
(503, 19, '5', 0, '0195122395', '2019-02-28 11:55:26', '2019-02-28 11:55:26', 0);

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
-- Indexes for table `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`pwdReset_id`);

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
  MODIFY `limits_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

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
-- AUTO_INCREMENT for table `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `pwdReset_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=504;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
