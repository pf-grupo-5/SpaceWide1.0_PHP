-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 20, 2022 at 10:40 PM
-- Server version: 10.5.16-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id18944596_spacewide_bd`
--

-- --------------------------------------------------------

--
-- Table structure for table `obra_artistica`
--

CREATE TABLE `obra_artistica` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `titulo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `subtitulo` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `localizacao_da_imagem` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `estado` enum('publicada','pendente','indisponivel','') COLLATE utf8_unicode_ci NOT NULL,
  `data_de_criacao` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_da_ultima_modificacao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `obra_artistica`
--

INSERT INTO `obra_artistica` (`id`, `id_usuario`, `titulo`, `subtitulo`, `localizacao_da_imagem`, `estado`, `data_de_criacao`, `data_da_ultima_modificacao`) VALUES
(12, 1, 'fotos', '', '/usuarios/1/publicacoes/633b0164787b74.07558835.jpg', 'pendente', '2022-10-03 15:36:04', '2022-10-19 23:27:37'),
(14, 1, 'issoae', '', '/usuarios/1/publicacoes/633d75c03e4f14.94784418.jpeg', 'pendente', '2022-10-05 12:17:04', '2022-10-19 23:27:46'),
(15, 10, 'L', '', '/usuarios/10/publicacoes/633e2c2a693a48.90462818.jpg', 'publicada', '2022-10-06 01:15:22', '2022-10-06 01:15:22'),
(16, 10, 'Mav', '', '/usuarios/10/publicacoes/633e2c400ac2f2.39587885.jpg', 'publicada', '2022-10-06 01:15:44', '2022-10-06 01:15:44'),
(17, 10, 'Bosque', '', '/usuarios/10/publicacoes/633e2c5b1e92e5.85689971.jpg', 'publicada', '2022-10-06 01:16:11', '2022-10-06 01:16:11'),
(18, 10, 'Casa', '', '/usuarios/10/publicacoes/633e2c739552c3.10192418.jpg', 'publicada', '2022-10-06 01:16:35', '2022-10-06 01:16:35'),
(19, 10, 'Chuva', '', '/usuarios/10/publicacoes/633e2c82d15031.52600916.jpg', 'publicada', '2022-10-06 01:16:50', '2022-10-06 01:16:50'),
(20, 10, 'Karvaak', '', '/usuarios/10/publicacoes/633e2cb825e6f7.61521527.jpg', 'publicada', '2022-10-06 01:17:44', '2022-10-06 01:17:44'),
(21, 10, 'Hall', '', '/usuarios/10/publicacoes/633e2cf65dd0b8.41816725.jpg', 'publicada', '2022-10-06 01:18:46', '2022-10-06 01:18:46'),
(22, 10, 'fotos', '', '/usuarios/10/publicacoes/633e367522c7f6.93956742.jpg', 'publicada', '2022-10-06 01:59:17', '2022-10-06 01:59:17'),
(23, 10, 'Primeira a óleo', '', '/usuarios/10/publicacoes/633e36b5073245.65496296.jpg', 'publicada', '2022-10-06 02:00:21', '2022-10-06 02:00:21'),
(24, 10, 'Lua cheia', '', '/usuarios/10/publicacoes/633e36f8b0a9b8.87411864.jpg', 'publicada', '2022-10-06 02:01:28', '2022-10-06 02:01:28'),
(25, 11, 'rascunho', '', '/usuarios/11/publicacoes/633e380f9a05b9.86129958.jpg', 'publicada', '2022-10-06 02:06:07', '2022-10-06 02:06:07'),
(26, 11, 'Flower', '', '/usuarios/11/publicacoes/633e3826b92244.87825194.jpg', 'publicada', '2022-10-06 02:06:30', '2022-10-06 02:06:30'),
(27, 11, 'Yellow Garden', '', '/usuarios/11/publicacoes/633e38b3d14989.95684280.jpg', 'publicada', '2022-10-06 02:08:51', '2022-10-06 02:08:51'),
(28, 11, 'Ball Girl', '', '/usuarios/11/publicacoes/633e38d90d8188.05459098.jpg', 'publicada', '2022-10-06 02:09:29', '2022-10-06 02:09:29'),
(29, 11, 'Noble', '', '/usuarios/11/publicacoes/633e38f2e83620.19988082.jpg', 'publicada', '2022-10-06 02:09:54', '2022-10-06 02:09:54'),
(30, 11, 'Violet', '', '/usuarios/11/publicacoes/633e39147e1239.49974314.jpg', 'publicada', '2022-10-06 02:10:28', '2022-10-06 02:10:28'),
(31, 11, 'Bambi group', '', '/usuarios/11/publicacoes/633e3939af7ce9.49546600.jpg', 'publicada', '2022-10-06 02:11:05', '2022-10-06 02:11:05'),
(32, 11, 'My friends', '', '/usuarios/11/publicacoes/633e39574ad3e5.99401870.jpg', 'publicada', '2022-10-06 02:11:35', '2022-10-06 02:11:35'),
(33, 11, 'Samanta', '', '/usuarios/11/publicacoes/633e397b5ce564.50319939.jpg', 'publicada', '2022-10-06 02:12:11', '2022-10-06 02:12:11'),
(34, 11, 'Paint-Paint', '', '/usuarios/11/publicacoes/633e39a2cdfab7.20535962.jpg', 'publicada', '2022-10-06 02:12:50', '2022-10-06 02:12:50'),
(35, 12, 'Maga', 'flor', '/usuarios/12/publicacoes/633e3b6c0e4c02.73168084.jpg', 'publicada', '2022-10-06 02:20:28', '2022-10-20 11:59:53'),
(36, 12, 'Kami', 'flor', '/usuarios/12/publicacoes/633e3ba03062c4.47238110.jpg', 'publicada', '2022-10-06 02:21:20', '2022-10-20 12:01:17'),
(37, 12, 'Layla', 'flor', '/usuarios/12/publicacoes/633e3bc3f1ce24.32776382.jpg', 'publicada', '2022-10-06 02:21:55', '2022-10-20 12:01:17'),
(38, 12, 'Mika', 'flor', '/usuarios/12/publicacoes/633e3c149f1796.88825220.jpg', 'publicada', '2022-10-06 02:23:16', '2022-10-20 12:01:41'),
(39, 12, 'Jane', 'flor', '/usuarios/12/publicacoes/633e3c46663942.00333815.webp', 'publicada', '2022-10-06 02:24:06', '2022-10-20 12:01:41'),
(40, 12, 'Camille', 'flor', '/usuarios/12/publicacoes/633e3c96d3dcd8.58171777.jpg', 'publicada', '2022-10-06 02:25:26', '2022-10-20 12:01:41'),
(41, 12, 'Luana', 'flor', '/usuarios/12/publicacoes/633e3d3a5c3410.98323955.png', 'publicada', '2022-10-06 02:28:10', '2022-10-20 12:01:41'),
(42, 12, 'Escliff', 'flor', '/usuarios/12/publicacoes/633e3d63699438.56627604.jpg', 'publicada', '2022-10-06 02:28:51', '2022-10-20 12:01:41'),
(43, 12, 'Amelia', 'flor', '/usuarios/12/publicacoes/633e3dc3820ff3.56604498.jpg', 'publicada', '2022-10-06 02:30:27', '2022-10-20 12:01:50'),
(44, 12, 'Isla', 'flor', '/usuarios/12/publicacoes/633e3dff8cde47.85622304.jpg', 'publicada', '2022-10-06 02:31:27', '2022-10-20 12:01:50'),
(48, 1, 'as', 'hudhr', '/usuarios/1/publicacoes/6350e9059e0822.60237388.webp', 'publicada', '2022-10-20 06:21:57', '2022-10-20 06:21:57'),
(49, 23, '1', 'Paisagem', '/usuarios/23/publicacoes/63513aa3662a08.72955720.jpg', 'publicada', '2022-10-20 12:10:11', '2022-10-20 12:11:30'),
(50, 23, '2', 'Paisagem', '/usuarios/23/publicacoes/63513abcb768e4.20930366.jpg', 'publicada', '2022-10-20 12:10:36', '2022-10-20 12:10:36'),
(51, 23, '3', 'Paisagem', '/usuarios/23/publicacoes/63513aca4510a6.35045954.jpg', 'publicada', '2022-10-20 12:10:50', '2022-10-20 12:10:50'),
(52, 23, '4', 'Paisagem', '/usuarios/23/publicacoes/63513ad284bb97.87760804.jpg', 'publicada', '2022-10-20 12:10:58', '2022-10-20 12:10:58'),
(53, 23, '5', 'Paisagem', '/usuarios/23/publicacoes/63513ade496029.12051792.jpg', 'publicada', '2022-10-20 12:11:10', '2022-10-20 12:11:10'),
(54, 23, '7', 'Paisagem', '/usuarios/23/publicacoes/63513ae9e9e6f0.22454072.jpg', 'publicada', '2022-10-20 12:11:21', '2022-10-20 12:11:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `obra_artistica`
--
ALTER TABLE `obra_artistica`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `obra_artistica`
--
ALTER TABLE `obra_artistica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
