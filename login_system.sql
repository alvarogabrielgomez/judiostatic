-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 04-Jan-2019 às 04:30
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.3.0

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
(1, 'admin', 'admin', 'admin', 'alvarogabrielgomez@gmail.com', '$2y$10$4JiCiEJuKn.nAzUzKn4oKOJuz7TfmK/up/uhTzSWmwAJ4KwupgSSC', 1, '2018-12-31 03:46:36', '2018-12-31 03:46:58');

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
  `cover_url` varchar(500) DEFAULT NULL,
  `active` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `buss`
--

INSERT INTO `buss` (`buss_id`, `buss_name`, `buss_dir`, `buss_phone`, `buss_url`, `created_at`, `updated_at`, `cover_url`, `active`) VALUES
(1, 'Mollis Vehicula', '1622  Adams Avenue, Frederick MD, 21701', '5555555555555', 'http://ckj1.site11.com', '2018-12-18 14:39:02', '2018-12-18 14:39:02', 'img/buss/buss1.jpg', 1),
(2, 'Vallar Vergulis', '4592  Game Of Thrones, Sin Rostro, 33433', '6666666666666', 'http://ckj1.site11.com', '2018-12-18 14:39:02', '2018-12-18 14:39:02', 'img/buss/buss1.jpg', 1),
(3, 'Pizza Box Boyz', 'Directo en tu corazon', '77777777777777', 'http://ckj1.site11.com', '2018-12-18 14:39:02', '2018-12-18 14:39:02', 'img/buss/buss3.jpg', 1);

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
  `active` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clients`
--

INSERT INTO `clients` (`client_id`, `client_first`, `client_last`, `client_email`, `created_at`, `active`) VALUES
(0, 'Alvaro', 'Gomez', 'alvarogabrielgomez@gmail.com', '2018-12-31 03:54:49', 1);

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
(1, 1, 1, '2018-12-18 14:33:38', '2018-12-18 14:37:26', '0000-00-00 00:00:00', '10.10', '11.11', 'Oferta Lorem ipsum dolor sit amer us nec mollis vehicula, magna tortor finibus libero', 'Oferta Lorem ipsum dolor sit amer us nec mollis vehicula, magna tortor finibus libero, vitae posuere ante lectus in enim. mollis vehicula, magna tortor finibus libero, vitae', 'img/tumb1.jpg'),
(2, 2, 1, '2018-12-18 14:33:38', '2018-12-18 19:26:59', '0000-00-00 00:00:00', '34.10', '50.10', 'UNA COCACOLA CRIMINAL PARA TI Y 2 PANAS', 'Por poco tiempo podras disfrutar de esta promocion con tus panas, compartiendo una cocacola criminal y unas hamburquesas mientras se dan besitos #NoHomo', 'img/tumb2.jpg'),
(3, 1, 1, '2018-12-04 14:33:38', '2018-12-14 14:37:26', '0000-00-00 00:00:00', '39.10', '100.10', 'TITULO NUMERO DOS CRIMINAL CON TUS PAPITAS', 'Oferta Lorem ipsum dolor sit amer us nec mollis vehicula, magna tortor finibus libero, vitae posuere ante lectus in enim. mollis vehicula, magna tortor finibus libero, vitae', 'img/tumb3.jpg'),
(4, 1, 1, '2018-12-04 14:33:38', '2018-12-18 23:40:53', '0000-00-00 00:00:00', '39.10', '40.10', 'TITULO NUMERO TRES CRIMINAL CON TU JUGUETITO GAY', 'Oferta Lorem ipsum dolor sit amer us nec mollis vehicula, magna tortor finibus libero, vitae posuere ante lectus in enim. mollis vehicula, magna tortor finibus libero, vitae', 'img/tumb4.jpg'),
(5, 2, 1, '2018-12-18 14:33:38', '2018-12-18 19:26:59', '0000-00-00 00:00:00', '34.10', '50.10', 'UNA SOPA DE MACACO BIEN CALIENTE', 'Gracias a esta promocion podras tener en tu poder una explosion de sabor macaquil brasilero, uma delisia', 'img/tumb3.jpg'),
(6, 3, 1, '2018-12-18 14:33:38', '2019-01-04 03:14:07', '0000-00-00 00:00:00', '199.10', '400.40', 'UNA PIZZA DE HUEVO SANCOCHADO', 'Para los amantes del huevo, aca tenemos la que frao', 'img/tumb1.jpg');

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
(278, 5, '2', 1, '251683315', '2019-01-04 02:48:36', '2019-01-04 02:48:36', 0),
(279, 3, '1', 1, '131694622', '2019-01-04 02:48:55', '2019-01-04 02:48:55', 0),
(280, 1, '1', 1, '111994544', '2019-01-04 02:49:17', '2019-01-04 02:49:17', 0),
(281, 4, '1', 1, '141680112', '2019-01-04 02:49:33', '2019-01-04 02:49:33', 0),
(282, 4, '1', 1, '141822803', '2019-01-04 02:49:54', '2019-01-04 02:49:54', 0),
(283, 3, '1', 1, '131370073', '2019-01-04 02:50:10', '2019-01-04 02:50:10', 0),
(284, 2, '2', 1, '221298552', '2019-01-04 02:50:43', '2019-01-04 02:50:43', 0),
(285, 2, '2', 1, '212068932', '2019-01-04 02:54:26', '2019-01-04 02:54:26', 0),
(286, 5, '2', 1, '154414832', '2019-01-04 02:55:40', '2019-01-04 02:55:40', 0),
(287, 5, '2', 0, '059740872', '2019-01-04 03:02:46', '2019-01-04 03:02:46', 0),
(288, 6, '3', 0, '069055313', '2019-01-04 03:13:09', '2019-01-04 03:13:09', 0),
(289, 6, '3', 0, '063172783', '2019-01-04 03:15:02', '2019-01-04 03:15:02', 0);

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
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`),
  ADD UNIQUE KEY `client_email` (`client_email`);

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
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buss`
--
ALTER TABLE `buss`
  MODIFY `buss_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=290;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
