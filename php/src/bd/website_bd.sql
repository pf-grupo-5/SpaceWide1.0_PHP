-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql307.epizy.com
-- Generation Time: Sep 04, 2022 at 10:24 PM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_32094758_website_bd`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(75) CHARACTER SET utf8mb4 NOT NULL,
  `senha` varchar(256) CHARACTER SET utf8mb4 NOT NULL,
  `estado` enum('ativo','inativo','suspenso','banido') CHARACTER SET utf8mb4 NOT NULL DEFAULT 'inativo',
  `codigo_validador` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `data_de_criacao` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_da_ultima_modificacao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `administrador`
--

INSERT INTO `administrador` (`id`, `nome`, `email`, `senha`, `estado`, `codigo_validador`, `data_de_criacao`, `data_da_ultima_modificacao`) VALUES
(3, 'lisa', 'su@lisa', '$2y$13$GIJkIcgezt45bjhRdffEZ..oIzWI/z.zzhIZ8D19eU8C9diVkm9Oy', 'suspenso', '95697061', '2022-08-19 23:40:01', '2022-08-25 18:07:38'),
(6, 'davi', 'the@man', '$2y$13$RVwf8ofQXlXF8jlEJq4XGubPwvQPtNtuRgTY5TtOb9iKCUCIGi9xW', 'banido', '97968042', '2022-08-21 12:23:46', '2022-08-24 23:07:23'),
(7, 'Henrique', 'roma@roma', '$2y$13$fkPxLscjOBYkIH2.BFjqpelrmcvFareFig1MZ7ZXEA.G9qIvUm9t.', 'ativo', '72460664', '2022-08-23 16:13:25', '2022-09-02 14:16:56'),
(8, 'anya', 'anya@anya', '$2y$13$c7CwpNfzsqH7fRelHyyJJOceRF78mWY.e7vhBUx24hS7SjywGeVsq', 'ativo', '89357431', '2022-08-23 22:59:50', '2022-08-23 22:59:50'),
(14, 'sandro renato de souza maia', 'sandromaia9800@gmail.com', '$2y$13$p.dw6tttii8EXw99gHEcdOxfNYnLuaySwgqpMk536uXNhPIAlniCa', 'ativo', '19292478', '2022-08-28 22:27:44', '2022-08-28 22:28:15'),
(15, 'lisa', 'raphael@renoar.com', '$2y$13$0U01tN9K90qCkIbqhpQLR.pQ2nRIfRgouA.ZMba8RQeoxjt.TLbrC', 'inativo', '58441107', '2022-08-28 23:58:24', '2022-08-28 23:58:24');

-- --------------------------------------------------------

--
-- Table structure for table `artista`
--

CREATE TABLE `artista` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `senha` varchar(256) CHARACTER SET utf8mb4 NOT NULL,
  `localizacao_da_imagem` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '/usuarios/foto_de_perfil_padrao/foto_de_perfil_padrao.jpg',
  `estado` enum('ativo','inativo','suspenso','banido') CHARACTER SET utf8mb4 NOT NULL DEFAULT 'inativo',
  `codigo_validador` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `data_de_criacao` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_da_ultima_modificacao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `artista`
--

INSERT INTO `artista` (`id`, `nome`, `email`, `senha`, `localizacao_da_imagem`, `estado`, `codigo_validador`, `data_de_criacao`, `data_da_ultima_modificacao`) VALUES
(1, '', 'raphael@renoir', '$2y$13$xMM6CiOu8IxK5aOKd/Y/k.CW1bKhje0ikffETRfvwgkaOrtvO/J0G', '/usuarios/artista/foto_de_perfil/1/6311e17d383ea0.19250957.jpg', 'ativo', '11287357', '2022-08-12 12:08:47', '2022-09-02 23:16:55'),
(2, 'hamood', 'hamood@hamood.com', '$2y$13$E19jYgnTXA0hlHycQ1luZeuQSZ/M3KgsxYQ/qo1AD5tOEuHgHxgGu', '/usuarios/foto_de_perfil_padrao/foto_de_perfil_padrao.jpg', 'ativo', '57005790', '2022-08-12 12:34:03', '2022-08-12 12:34:03'),
(3, 'lisa', 'lisa@lovelace', '$2y$13$czums23azOKY.3jfiP1HqOpTsoMYeUfjNKN4RaDMVIHryApDPUhB6', '/usuarios/foto_de_perfil_padrao/foto_de_perfil_padrao.jpg', 'ativo', '75512164', '2022-08-16 22:22:35', '2022-08-16 22:22:35'),
(4, 'kayla', 'kayla@mariah', '$2y$13$Imp296Vm9M1YTVRQ2t5A4OeuD6LsS39wjr7uNnK.ukfPpve8QKSRu', '/usuarios/foto_de_perfil_padrao/foto_de_perfil_padrao.jpg', 'inativo', '43660308', '2022-08-19 12:11:59', '2022-08-25 18:02:46'),
(5, 'Xi Jinping', 'xijinping@cn', '$2y$13$SVpKJllHBlRy50xCjFjb7OwfJfvAINqtB3r0AGGcyn/Xo2Oeghwwi', '/usuarios/cliente/foto_de_perfil/16/6311539285e2b7.76594417.jpg', 'ativo', '57696912', '2022-09-02 02:19:59', '2022-09-02 02:19:59');

-- --------------------------------------------------------

--
-- Table structure for table `avaliacao`
--

CREATE TABLE `avaliacao` (
  `id` int(11) NOT NULL,
  `id_obra_artistica` int(11) NOT NULL,
  `id_artista` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `avaliacao` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(75) CHARACTER SET utf8mb4 NOT NULL,
  `senha` varchar(256) CHARACTER SET utf8mb4 NOT NULL,
  `localizacao_da_imagem` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '/usuarios/foto_de_perfil_padrao/foto_de_perfil_padrao.jpg',
  `estado` enum('ativo','inativo','suspenso','banido') CHARACTER SET utf8mb4 NOT NULL DEFAULT 'inativo',
  `codigo_validador` varchar(20) CHARACTER SET utf8mb4 DEFAULT NULL,
  `data_de_criacao` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_da_ultima_modificacao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `email`, `senha`, `localizacao_da_imagem`, `estado`, `codigo_validador`, `data_de_criacao`, `data_da_ultima_modificacao`) VALUES
(13, 'Karlos Abi', 'karlosabi@gmail.com', '$2y$13$u1ygaryyJuNeV4Ztfmr9tODhdaLD6IwFgHEQsjnACWc1WEH2/xNpG', '/usuarios/foto_de_perfil_padrao/foto_de_perfil_padrao.jpg', 'ativo', '38681642', '2022-09-02 01:38:36', '2022-09-02 01:51:59'),
(14, 'Amelie Oliveira Santos', 'oliveiramelia@protonmail.cn', '$2y$13$gKtTeUf8MN0C7A6lS5xPo.Y5KJjoIKQ3AB9DNFaWcbiUPYzbUTSNK', '/usuarios/foto_de_perfil_padrao/foto_de_perfil_padrao.jpg', 'ativo', '56848668', '2022-09-02 01:43:25', '2022-09-02 01:51:59'),
(15, 'Hanna Swartz', 'hannaswartz@hotmail.com', '$2y$13$Xrx2FiBv/iXEU4z6mQvj.elEc31eQBVUlV21Mkb2tc4XCQBIQ3cwa', '/usuarios/foto_de_perfil_padrao/foto_de_perfil_padrao.jpg', 'ativo', '41770510', '2022-09-02 01:45:40', '2022-09-02 01:51:59'),
(17, 'Mitsuki', '', '$2y$13$/taSCSsfwGMpqvwU6tpxMuxvOOzIBmg/EHwJTWQDRKxOBPg.6IBY6', '/usuarios/foto_de_perfil_padrao/foto_de_perfil_padrao.jpg', 'inativo', '51167647', '2022-09-04 23:00:56', '2022-09-04 23:00:56'),
(18, 'Jonatthan Lovelance', 'sandromaia9800@gmail.com', '$2y$13$dMYUnZ8ilqMFhmT4BDwgR.H050wOzQzCi4Do4c/bph0gKHGoVznt.', '/usuarios/foto_de_perfil_padrao/foto_de_perfil_padrao.jpg', 'inativo', '83619791', '2022-09-04 23:04:44', '2022-09-04 23:04:44'),
(19, 'Jonatthan Lovelance', 'jota@lance', '$2y$13$v.J7AszShpg6FXbzSG04LO4B5oTJCU/JdVm9eNH1rQBbv9bI3qEam', '/usuarios/foto_de_perfil_padrao/foto_de_perfil_padrao.jpg', 'ativo', '81920794', '2022-09-04 23:05:15', '2022-09-04 23:15:43'),
(20, 'Kayla Mariah', 'kalyta@mariah', '$2y$13$gDqXhQONbqOURifmMmhWmu8XC6LJ3LgCFQQhYoLzC5aid1JOajCTG', '/usuarios/foto_de_perfil_padrao/foto_de_perfil_padrao.jpg', 'ativo', '27408453', '2022-09-04 23:06:06', '2022-09-04 23:15:43'),
(21, 'Henrique Romao de Oliveira', 'henrique@oli', '$2y$13$M/X0d0PfWUD6lTCLp..KEuohAf58s.ED8xTcVDyZNqw92yw0cUzxm', '/usuarios/foto_de_perfil_padrao/foto_de_perfil_padrao.jpg', 'ativo', '80882067', '2022-09-04 23:07:04', '2022-09-04 23:15:43'),
(22, 'Davi Carvalho Santos', 'thanos@destroyer', '$2y$13$XP/WOI4wynLaWE.rr3G/R.g9axdNg/UYaoBaHVrGXL9IliQECKvtS', '/usuarios/foto_de_perfil_padrao/foto_de_perfil_padrao.jpg', 'ativo', '13450463', '2022-09-04 23:08:03', '2022-09-04 23:15:43'),
(23, 'Sandro Renato de Souza Maia', 'sandro@ren', '$2y$13$PaCXmx91d.aPikPI7qCkX.Alev/DSX66NYOkD2EbPLkILHnWB3VBO', '/usuarios/foto_de_perfil_padrao/foto_de_perfil_padrao.jpg', 'ativo', '18580405', '2022-09-04 23:08:48', '2022-09-04 23:15:43'),
(24, 'Kaylan Caminha', 'kaylan@cami', '$2y$13$MduzdU6J03H.D7yx0WSqKOD37XuCBnVUy9gzyRyYCK38NfSB1LYKu', '/usuarios/foto_de_perfil_padrao/foto_de_perfil_padrao.jpg', 'ativo', '21750206', '2022-09-04 23:09:17', '2022-09-04 23:15:43'),
(25, 'Debora Nai', 'debora@nai', '$2y$13$BBqJpGO/uAY1VAxbI7XY4O1ZDwg2PlKfaRI0L3v/c7onkHv4rA1mG', '/usuarios/foto_de_perfil_padrao/foto_de_perfil_padrao.jpg', 'ativo', '90475919', '2022-09-04 23:09:49', '2022-09-04 23:15:43'),
(26, 'Alberto Passos', 'alberto@passos', '$2y$13$HvjaLS6yBQvdkf20.Ul..O8Rz4NJDGN.coBASEcX7ITX2w8cW6TXO', '/usuarios/foto_de_perfil_padrao/foto_de_perfil_padrao.jpg', 'ativo', '28702611', '2022-09-04 23:10:31', '2022-09-04 23:15:43'),
(27, 'Nathalie Phierre', 'nat@phierre', '$2y$13$YdPFKEmS2lT4FuzCbJRbb.FHLyLAorbjRlLl2VGmq7osmMfxYbE3G', '/usuarios/foto_de_perfil_padrao/foto_de_perfil_padrao.jpg', 'ativo', '46795563', '2022-09-04 23:12:06', '2022-09-04 23:16:00'),
(28, 'Juan Luis Corominas', 'juan@corominas', '$2y$13$/BfHaUpoVcCQtQaMQB7uueI2O3eQKAHDA3J7rqghPRl71v5FbpTd.', '/usuarios/foto_de_perfil_padrao/foto_de_perfil_padrao.jpg', 'inativo', '19300834', '2022-09-04 23:35:27', '2022-09-04 23:35:27'),
(29, 'Dulce Gonzalo Raya', 'gonzalo@raya', '$2y$13$vT0/hZ5LDSi9VUddU3kN0Os6RsWd6IUWJ5UEMVXgtew73cYC8qh2u', '/usuarios/foto_de_perfil_padrao/foto_de_perfil_padrao.jpg', 'inativo', '56010702', '2022-09-04 23:36:08', '2022-09-04 23:36:08'),
(30, 'Yago Rivera', 'yago@rivera', '$2y$13$fTcodJSdpA6OygWIqb7jc.tuqigxdf14E9ZW5WTNHuCiHsjXFdqdu', '/usuarios/foto_de_perfil_padrao/foto_de_perfil_padrao.jpg', 'inativo', '77192272', '2022-09-04 23:37:26', '2022-09-04 23:37:26'),
(31, 'Levi Campos', 'levi@campos', '$2y$13$I9NKn5Ua/vsMFzCbKr2Pv.bmD3c095.eU7Zq9l6t4l1dfXmlfzQmK', '/usuarios/foto_de_perfil_padrao/foto_de_perfil_padrao.jpg', 'inativo', '88100123', '2022-09-04 23:37:50', '2022-09-04 23:37:50'),
(32, 'Emmanuelly Rocha', 'emmanuelly4023@gmail.com', '$2y$13$REvUwt7/btO9QUvixlSnG.3UwQ9P1.Rgi8TQHx9.zOIMKIj7mnf72', '/usuarios/foto_de_perfil_padrao/foto_de_perfil_padrao.jpg', 'inativo', '61904765', '2022-09-04 23:38:56', '2022-09-04 23:38:56'),
(33, 'Raul Texeira', 'raultexeira@gmail.com', '$2y$13$HLXG.U0Z6bUUbRUWF0Mli.s1iD/cC3Aa7nlGOHwBZR1hZAdO9lS52', '/usuarios/foto_de_perfil_padrao/foto_de_perfil_padrao.jpg', 'inativo', '49948786', '2022-09-04 23:39:50', '2022-09-04 23:39:50'),
(34, 'Kaique da Paz', 'kaiquepaz42@nasa.cn', '$2y$13$3NaIKFAEXNLDrlo/9riTIeyaGKPpC/Dr685Poe5B7SibIhD0ikpI2', '/usuarios/foto_de_perfil_padrao/foto_de_perfil_padrao.jpg', 'inativo', '52576242', '2022-09-04 23:40:37', '2022-09-04 23:40:37'),
(35, 'Sevginur Bilge', 'suvginurbulge4@zemail.tk', '$2y$13$DWmZ7XAUp4zOJXM0de8RwOrZ4zhNvMdzxbo.KCocBl45DvBUzJ73O', '/usuarios/foto_de_perfil_padrao/foto_de_perfil_padrao.jpg', 'inativo', '30227370', '2022-09-04 23:42:00', '2022-09-04 23:42:00');

-- --------------------------------------------------------

--
-- Table structure for table `comentario`
--

CREATE TABLE `comentario` (
  `id` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `id_artista` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `texto` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `data_de_criacao` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_da_ultima_modificacao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `obra_artistica`
--

CREATE TABLE `obra_artistica` (
  `id` int(11) NOT NULL,
  `id_artista` int(11) NOT NULL,
  `titulo` varchar(75) CHARACTER SET utf8mb4 NOT NULL,
  `subtitulo` varchar(90) CHARACTER SET utf8mb4 DEFAULT NULL,
  `localizacao_da_imagem` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `estado` enum('publicada','pendente','indisponivel','retirada') CHARACTER SET utf8mb4 NOT NULL DEFAULT 'publicada',
  `data_de_criacao` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_da_ultima_modificacao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `obra_artistica`
--

INSERT INTO `obra_artistica` (`id`, `id_artista`, `titulo`, `subtitulo`, `localizacao_da_imagem`, `estado`, `data_de_criacao`, `data_da_ultima_modificacao`) VALUES
(7, 1, 'Harmony', '', '/usuarios/artista/publicacoes/1/62f640f4d63d22.78711246.webp', 'publicada', '2022-08-12 13:05:28', '2022-08-12 13:05:28'),
(8, 1, 'Berries and cooffe cozy breakf', 'oil painting', '/usuarios/artista/publicacoes/1/62f924d1e7fc02.56796039.png', 'publicada', '2022-08-14 17:42:06', '2022-08-14 17:42:06'),
(9, 1, 'Planet', 'Green ', '/usuarios/artista/publicacoes/1/62f92cf82d2f67.08117769.jpg', 'publicada', '2022-08-14 18:16:52', '2022-08-14 18:16:52'),
(10, 1, 'War disease', 'Sad smoke', '/usuarios/artista/publicacoes/1/62f92d648e3041.90989361.jpg', 'publicada', '2022-08-14 18:18:40', '2022-08-14 18:18:40'),
(11, 1, 'O castelo da bruxa', '', '/usuarios/artista/publicacoes/1/62f9305fb6c814.14918463.jpg', 'publicada', '2022-08-14 18:31:23', '2022-08-14 18:31:23'),
(12, 1, 'Puce', 'Jason Anderson', '/usuarios/artista/publicacoes/1/62f9308cf1aa00.53716581.jpg', 'publicada', '2022-08-14 18:32:09', '2022-08-14 18:32:09'),
(14, 1, 'Jade', 'Black cat', '/usuarios/artista/publicacoes/1/62f931fa40c510.62079027.png', 'publicada', '2022-08-14 18:38:14', '2022-08-14 18:38:14'),
(15, 1, 'Le Martyre de Saint Denis', 'Leon Bonnat', '/usuarios/artista/publicacoes/1/62f93254bef782.48996024.jpg', 'publicada', '2022-08-14 18:39:45', '2022-08-14 18:39:45'),
(16, 1, 'Pascal Campion', 'A Little Longer', '/usuarios/artista/publicacoes/1/62f932b74a1380.36271200.jpg', 'publicada', '2022-08-14 18:41:23', '2022-08-14 18:41:23'),
(18, 1, 'The Mekanik Doll', 'Maya & Zbrush', '/usuarios/artista/publicacoes/1/62f9337d2c8352.62432496.jpg', 'publicada', '2022-08-14 18:44:41', '2022-08-14 18:44:41'),
(19, 1, 'Floresta com cervos', '...', '/usuarios/artista/publicacoes/1/62f934a2089226.98519682.jpg', 'publicada', '2022-08-14 18:49:34', '2022-08-14 18:49:34'),
(20, 1, '....', '....', '/usuarios/artista/publicacoes/1/62f9364dedb156.59241053.jpg', 'publicada', '2022-08-14 18:56:42', '2022-08-14 18:56:42'),
(21, 1, 'Fuji', '    -   ', '/usuarios/artista/publicacoes/1/62f936b6756136.82219604.webp', 'publicada', '2022-08-14 18:58:26', '2022-08-14 18:58:26'),
(22, 1, 'Peixe amarelo', 'Mar profundo', '/usuarios/artista/publicacoes/1/62f936fb682958.70409358.jpg', 'publicada', '2022-08-14 18:59:35', '2022-08-14 18:59:35'),
(23, 1, 'Castelo', 'Inglaterrra', '/usuarios/artista/publicacoes/1/62f937478961b2.60896965.jpg', 'publicada', '2022-08-14 19:00:51', '2022-08-14 19:00:51'),
(24, 1, 'Braboleta', '', '/usuarios/artista/publicacoes/1/62f93791c31229.35260239.jpg', 'publicada', '2022-08-14 19:02:06', '2022-08-14 19:02:06'),
(26, 1, 'volker hermes', 'vine', '/usuarios/artista/publicacoes/1/62f93b0891ccf5.68705272.png', 'publicada', '2022-08-14 19:16:53', '2022-08-14 19:16:53'),
(27, 1, 'purple planet', 'roxao', '/usuarios/artista/publicacoes/1/62f9426b6f50a5.58192816.jpg', 'publicada', '2022-08-14 19:48:24', '2022-08-14 19:48:24'),
(28, 1, 'dream of freedom', '...', '/usuarios/artista/publicacoes/1/62f942c127c302.09101245.jpg', 'publicada', '2022-08-14 19:49:49', '2022-08-14 19:49:49'),
(29, 1, 'charcoal feelings l', '', '/usuarios/artista/publicacoes/1/62f94313a321d0.23898826.jpg', 'publicada', '2022-08-14 19:51:12', '2022-08-14 19:51:12'),
(31, 1, 'mar japonÃªs', '', '/usuarios/artista/publicacoes/1/62f9437aeae974.89519490.jpg', 'publicada', '2022-08-14 19:52:55', '2022-08-14 19:52:55'),
(32, 1, 'anna', '', '/usuarios/artista/publicacoes/1/62fa4a53f02d50.33381938.jpg', 'publicada', '2022-08-15 14:34:22', '2022-08-15 14:34:22'),
(35, 1, 'i\'m groot', '', '/usuarios/artista/publicacoes/1/62fa4dda945a96.33256740.jpg', 'publicada', '2022-08-15 14:49:24', '2022-08-15 14:49:24'),
(36, 1, 'Machintosh', '', '/usuarios/artista/publicacoes/1/62fa4ebc376132.58163694.webp', 'publicada', '2022-08-15 14:53:10', '2022-08-15 14:53:10'),
(37, 1, 'felix, the cat', '', '/usuarios/artista/publicacoes/1/62fad4610e16e7.79875381.gif', 'publicada', '2022-08-16 00:23:21', '2022-08-16 00:23:21'),
(39, 1, 'Derealisation', 'rainbow', '/usuarios/artista/publicacoes/1/62fbaef5c1fc45.45708200.webp', 'publicada', '2022-08-16 15:55:56', '2022-08-16 15:55:56'),
(40, 1, 'hell 16th century', '', '/usuarios/artista/publicacoes/1/62fbaf81ea6111.85102919.webp', 'publicada', '2022-08-16 15:58:16', '2022-08-18 13:08:35'),
(41, 3, 'Old Shepherd', 'Landseer', '/usuarios/artista/publicacoes/3/62fc0bbab81504.82276553.jpg', 'publicada', '2022-08-16 22:31:44', '2022-08-18 01:30:31'),
(43, 3, 'cyberpunk 7702', '', '/usuarios/artista/publicacoes/3/62fc0c4324c1a8.10246729.png', 'publicada', '2022-08-16 22:34:01', '2022-08-18 01:40:31'),
(46, 4, '....', '', '/usuarios/artista/publicacoes/4/62ff6fcec03396.25407780.jpg', 'publicada', '2022-08-19 12:15:24', '2022-08-21 16:49:04'),
(47, 4, 'cavalo', '', '/usuarios/artista/publicacoes/4/62ff707901bbd5.71258662.webp', 'pendente', '2022-08-19 12:18:14', '2022-08-26 18:33:10'),
(48, 4, 'peixe', 'agua', '/usuarios/artista/publicacoes/4/62ff70f75ac947.54347527.webp', 'publicada', '2022-08-19 12:20:21', '2022-08-21 17:22:29'),
(49, 1, 'o melhor casal', 'do mundo, obviamente', '/usuarios/artista/publicacoes/1/62ffa0ad2646b2.19752216.jpg', 'indisponivel', '2022-08-19 15:43:53', '2022-08-26 18:33:10'),
(50, 1, 'sem titulo', '', '/usuarios/artista/publicacoes/1/62ffbacab54b14.16123272.png', 'publicada', '2022-08-19 17:35:19', '2022-08-19 17:35:19'),
(51, 3, 'miauuuu', 'abstrato', '/usuarios/artista/publicacoes/3/6300167de3b079.09008308.jpg', 'publicada', '2022-08-20 00:06:33', '2022-08-21 18:24:36'),
(52, 3, 'convergencia', 'agua', '/usuarios/artista/publicacoes/3/63001b379794c1.18349861.jpg', 'publicada', '2022-08-20 00:26:43', '2022-08-21 18:26:03'),
(53, 3, 'blosson on behance', '', '/usuarios/artista/publicacoes/3/63001b64698839.11157469.jpg', 'publicada', '2022-08-20 00:27:28', '2022-08-21 18:34:07'),
(54, 3, 'underthought', '', '/usuarios/artista/publicacoes/3/63001bac7f80a2.51816863.jpg', 'publicada', '2022-08-20 00:28:40', '2022-08-20 00:28:40'),
(56, 4, 'cafezinhoo da manhÃ£', '', '/usuarios/artista/publicacoes/4/63024478648dd1.73967321.jpg', 'publicada', '2022-08-21 15:47:10', '2022-08-21 18:34:32'),
(57, 1, 'da', '', '/usuarios/artista/publicacoes/1/63039a420f4324.55292048.webp', 'publicada', '2022-08-22 16:05:25', '2022-08-22 16:05:25'),
(58, 1, 'Lua nova', '', '/usuarios/artista/publicacoes/1/6303cec3291239.45395702.png', 'publicada', '2022-08-22 19:49:26', '2022-08-22 19:49:26'),
(59, 1, 'lysistrata', '', '/usuarios/artista/publicacoes/1/630409288803f0.58909328.jpg', 'publicada', '2022-08-22 23:58:35', '2022-08-22 23:58:35'),
(60, 1, 'gus', '', '/usuarios/artista/publicacoes/1/6304098144ca69.47558686.jpg', 'publicada', '2022-08-23 00:00:03', '2022-08-23 00:00:03'),
(61, 1, 'ra touro', '', '/usuarios/artista/publicacoes/1/630ad13c822826.80226775.jpg', 'publicada', '2022-08-28 03:25:34', '2022-08-28 03:25:34'),
(62, 1, 'pepe, the god', 'lux', '/usuarios/artista/publicacoes/1/630ad1ce7a40b9.90025933.jpg', 'publicada', '2022-08-28 03:28:00', '2022-08-28 03:28:00'),
(63, 1, 'space walker', '', '/usuarios/artista/publicacoes/1/630ad20f5a2269.55971015.jpg', 'publicada', '2022-08-28 03:29:05', '2022-08-28 03:29:05'),
(64, 1, 'fox traveler', 'snow', '/usuarios/artista/publicacoes/1/631009376fa4b5.48070759.jpg', 'publicada', '2022-09-01 02:25:32', '2022-09-01 02:25:32'),
(76, 3, '...', '...', '/usuarios/artista/publicacoes/3/6312041200b099.29492936.webp', 'publicada', '2022-09-02 14:28:04', '2022-09-02 14:28:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artista`
--
ALTER TABLE `artista`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `avaliacao_idfk_1` (`id_obra_artistica`) USING BTREE,
  ADD UNIQUE KEY `avaliacao_idfk_2` (`id_artista`) USING BTREE,
  ADD UNIQUE KEY `avaliacao_idfk_3` (`id_cliente`) USING BTREE;

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `comentario_idfk_2` (`id_post`) USING BTREE,
  ADD UNIQUE KEY `comentario_idfk_1` (`id_artista`) USING BTREE,
  ADD UNIQUE KEY `comentario_idfk_3` (`id_cliente`) USING BTREE;

--
-- Indexes for table `obra_artistica`
--
ALTER TABLE `obra_artistica`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_artista` (`id_artista`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `artista`
--
ALTER TABLE `artista`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `obra_artistica`
--
ALTER TABLE `obra_artistica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD CONSTRAINT `avaliacao_idfk_1` FOREIGN KEY (`id_obra_artistica`) REFERENCES `obra_artistica` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `avaliacao_idfk_2` FOREIGN KEY (`id_artista`) REFERENCES `artista` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
