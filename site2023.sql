-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 06-Out-2022 às 13:17
-- Versão do servidor: 10.5.16-MariaDB
-- versão do PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `id18944596_spacewide_bd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao`
--

CREATE TABLE `avaliacao` (
  `id` int(11) NOT NULL,
  `id_obra_artistica` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `avaliacao` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `avaliacao`
--

INSERT INTO `avaliacao` (`id`, `id_obra_artistica`, `id_usuario`, `avaliacao`) VALUES
(18, 44, 1, 1),
(21, 37, 12, 1),
(22, 41, 12, 1),
(23, 43, 12, 1),
(24, 42, 12, 1),
(25, 13, 12, 1),
(26, 44, 12, 1),
(27, 39, 12, 1),
(28, 40, 12, 1),
(29, 35, 12, 1),
(30, 36, 12, 1),
(31, 38, 12, 1),
(32, 8, 1, -1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentario`
--

CREATE TABLE `comentario` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_obra_artistica` int(11) NOT NULL,
  `comentario` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `data_de_criacao` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_da_ultima_modificacao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `inscricao`
--

CREATE TABLE `inscricao` (
  `id` int(11) NOT NULL,
  `id_usuario_seguidor` int(11) NOT NULL,
  `id_usuario_seguido` int(11) NOT NULL,
  `ativo` tinyint(1) NOT NULL,
  `data_de_criacao` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_da_ultima_modificacao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `obra_artistica`
--

CREATE TABLE `obra_artistica` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `titulo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `subtitulo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `localizacao_da_imagem` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `estado` enum('publicada','pendente','indisponivel','') COLLATE utf8_unicode_ci NOT NULL,
  `data_de_criacao` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_da_ultima_modificacao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `obra_artistica`
--

INSERT INTO `obra_artistica` (`id`, `id_usuario`, `titulo`, `subtitulo`, `localizacao_da_imagem`, `estado`, `data_de_criacao`, `data_da_ultima_modificacao`) VALUES
(7, 1, 'cogumelo', 'imagem de um lindo cogumelo', '/usuarios/1/publicacoes/63375b48691c50.47865413.webp', 'publicada', '2022-09-30 21:10:32', '2022-09-30 21:10:32'),
(8, 1, 'montanha', 'mais uma das imagens que realizei enquanto viajava pelo mundo :)', '/usuarios/1/publicacoes/63375b8438ddb0.85446306.webp', 'publicada', '2022-09-30 21:11:32', '2022-09-30 21:11:32'),
(9, 1, 'montanha purpura', 'mais uma das imagens que realizei enquanto viajava pelo mundo :)', '/usuarios/1/publicacoes/63375b9c36c2a0.36541301.webp', 'publicada', '2022-09-30 21:11:56', '2022-09-30 21:11:56'),
(10, 1, 'musgo', 'capturei este momento no meu jardim', '/usuarios/1/publicacoes/63375be8bebcb3.93067869.webp', 'publicada', '2022-09-30 21:13:12', '2022-09-30 21:19:20'),
(11, 1, 'depressão ', 'solidão', '/usuarios/1/publicacoes/633b0148ef7704.29194951.jpg', 'publicada', '2022-10-03 15:35:36', '2022-10-03 15:35:36'),
(12, 1, 'fotos', '', '/usuarios/1/publicacoes/633b0164787b74.07558835.jpg', 'publicada', '2022-10-03 15:36:04', '2022-10-03 15:36:04'),
(13, 1, 'fotos', '', '/usuarios/1/publicacoes/633b6ebfbdf563.53174466.png', 'publicada', '2022-10-03 23:22:39', '2022-10-03 23:22:39'),
(14, 1, 'issoae', '', '/usuarios/1/publicacoes/633d75c03e4f14.94784418.jpeg', 'publicada', '2022-10-05 12:17:04', '2022-10-05 12:17:04'),
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
(35, 12, 'Mag', '', '/usuarios/12/publicacoes/633e3b6c0e4c02.73168084.jpg', 'publicada', '2022-10-06 02:20:28', '2022-10-06 02:20:28'),
(36, 12, 'Kami', '', '/usuarios/12/publicacoes/633e3ba03062c4.47238110.jpg', 'publicada', '2022-10-06 02:21:20', '2022-10-06 02:21:20'),
(37, 12, 'Layla', '', '/usuarios/12/publicacoes/633e3bc3f1ce24.32776382.jpg', 'publicada', '2022-10-06 02:21:55', '2022-10-06 02:21:55'),
(38, 12, 'Mika', '', '/usuarios/12/publicacoes/633e3c149f1796.88825220.jpg', 'publicada', '2022-10-06 02:23:16', '2022-10-06 02:23:16'),
(39, 12, 'Jane', '', '/usuarios/12/publicacoes/633e3c46663942.00333815.webp', 'publicada', '2022-10-06 02:24:06', '2022-10-06 02:24:06'),
(40, 12, 'Camille', '', '/usuarios/12/publicacoes/633e3c96d3dcd8.58171777.jpg', 'publicada', '2022-10-06 02:25:26', '2022-10-06 02:25:26'),
(41, 12, 'Luana', '', '/usuarios/12/publicacoes/633e3d3a5c3410.98323955.png', 'publicada', '2022-10-06 02:28:10', '2022-10-06 02:28:10'),
(42, 12, 'Escliff', '', '/usuarios/12/publicacoes/633e3d63699438.56627604.jpg', 'publicada', '2022-10-06 02:28:51', '2022-10-06 02:28:51'),
(43, 12, 'Amelia', '', '/usuarios/12/publicacoes/633e3dc3820ff3.56604498.jpg', 'publicada', '2022-10-06 02:30:27', '2022-10-06 02:30:27'),
(44, 12, 'Isla', '', '/usuarios/12/publicacoes/633e3dff8cde47.85622304.jpg', 'publicada', '2022-10-06 02:31:27', '2022-10-06 02:31:27');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `titulo` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tagmap`
--

CREATE TABLE `tagmap` (
  `id` int(11) NOT NULL,
  `id_obra_artistica` int(11) NOT NULL,
  `id_tag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `nome_artistico` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `localizacao_da_imagem_de_perfil` varchar(150) COLLATE utf8_unicode_ci NOT NULL DEFAULT '/usuarios/imagem_de_peril_padrao/imagem_de_peril_padrao.png',
  `acesso` enum('administrador','artista','utente','') COLLATE utf8_unicode_ci NOT NULL,
  `codigo_validador` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `estado` enum('ativo','inativo','suspenso','banido') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'inativo',
  `data_de_criacao` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_da_ultima_modificacao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `nome_artistico`, `email`, `senha`, `localizacao_da_imagem_de_perfil`, `acesso`, `codigo_validador`, `estado`, `data_de_criacao`, `data_da_ultima_modificacao`) VALUES
(1, 'sandros', 'dreco', 'sandro@maias', '$2y$13$DOjdzIU6sIafloKQxwFWeedvjHflxw7CqhrGYLmdNSmrMgmyi5vGe', '/usuarios/1/foto_de_perfil/633d828eb05eb4.89790444.jpeg', 'artista', '63338ad18a2257.75858136', 'ativo', '2022-09-27 23:44:18', '2022-10-06 12:23:28'),
(2, 'gureal', NULL, 'gureal@gmail.com', '$2y$13$/wLc2O3mDBv.Eeey7wU/1eYTE9j1UhIb9.ST6EFYSWkQdPLlK4JVW', '/usuarios/2/foto_de_perfil/6334bd84d638d0.61596159.Array', 'utente', '6334b65f28f577.97185950', 'ativo', '2022-09-28 21:02:23', '2022-09-28 21:57:22'),
(3, 'Jogaejoga', NULL, 'contaprajogo190@gmail.com', '$2y$13$t1sCvxG.TFYuO3kl5ycfSOcblelKcb6I4cvi4xbMWrdiBaFYEIBPi', '/usuarios/imagem_de_perfil_padrao/imagem_de_perfil_padrao.png', 'administrador', '63358c7a153502.81953854', 'ativo', '2022-09-29 12:15:54', '2022-09-29 12:48:53'),
(4, 'dragoncityporra', NULL, 'projetinhofellas2@gmail.com', '$2y$13$jUXG916t.dUifrNRdp3HWOltOawvFwG7FHd.ZvZe3dMsDAUg1DGhy', '/usuarios/imagem_de_perfil_padrao/imagem_de_perfil_padrao.png', 'utente', '633590cec4b000.72937779', 'inativo', '2022-09-29 12:34:23', '2022-09-29 12:34:23'),
(9, 'sandros', NULL, 'sandromaia9800@gmail.com', '$2y$13$u5l13ScBx09AWCbCGMHame.kIQhREEpSqmWUHsO7xGlb1FKsp3/VS', '/usuarios/9/foto_de_perfil/633cc87ad99331.48001343.png', 'utente', '10014210351664578518', 'ativo', '2022-09-30 22:55:18', '2022-10-04 23:57:46'),
(10, 'Raimundo', 'Jack', 'raimundo@gmail', '$2y$13$7zV5dj20YsjmAQGgnFodMOcIgdPsPbl3mJPNl81kFCvbEX8W9h3XK', '/usuarios/10/foto_de_perfil/633e2bd7700303.04638899.jpg', 'artista', '18524800871665018571', 'ativo', '2022-10-06 01:09:32', '2022-10-06 01:14:56'),
(11, 'Ana Clara', '', 'Anaclara@gmail', '$2y$13$jN1kAJBnVS6IJwqKGO6JZe8V7IDF9OG.G1y6Tujyte6vdW.0mIAGm', '/usuarios/11/foto_de_perfil/633e37f06918f3.39452225.jpg', 'artista', '18382139981665021813', 'ativo', '2022-10-06 02:03:34', '2022-10-06 02:05:36'),
(12, 'Romão', 'Roma', 'RomaRomao@gmail', '$2y$13$JQis8DFmt5KTasbVPWgxfepECDNtZMSBeRmOTydcgAvBxV6mhjVxO', '/usuarios/12/foto_de_perfil/633e3b4301b600.40472043.jpg', 'artista', '65125716241665022568', 'ativo', '2022-10-06 02:16:09', '2022-10-06 12:49:35');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_avaliacao_obra_artistica` (`id_obra_artistica`),
  ADD KEY `fk_avaliacao_usuario` (`id_usuario`);

--
-- Índices para tabela `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comentario_obra_artistica` (`id_obra_artistica`),
  ADD KEY `fk_comentario_usuario` (`id_usuario`);

--
-- Índices para tabela `inscricao`
--
ALTER TABLE `inscricao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_inscricao_usuario_seguidor` (`id_usuario_seguidor`),
  ADD KEY `fk_inscricao_usuario_seguido` (`id_usuario_seguido`);

--
-- Índices para tabela `obra_artistica`
--
ALTER TABLE `obra_artistica`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_obra_artistica_usuario` (`id_usuario`);

--
-- Índices para tabela `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tagmap`
--
ALTER TABLE `tagmap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tagmap_obra_artistica` (`id_obra_artistica`),
  ADD KEY `fk_tagmap_tag` (`id_tag`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `inscricao`
--
ALTER TABLE `inscricao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `obra_artistica`
--
ALTER TABLE `obra_artistica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de tabela `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tagmap`
--
ALTER TABLE `tagmap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD CONSTRAINT `fk_avaliacao_obra_artistica` FOREIGN KEY (`id_obra_artistica`) REFERENCES `obra_artistica` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_avaliacao_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `fk_comentario_obra_artistica` FOREIGN KEY (`id_obra_artistica`) REFERENCES `obra_artistica` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_comentario_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `inscricao`
--
ALTER TABLE `inscricao`
  ADD CONSTRAINT `fk_inscricao_usuario_seguido` FOREIGN KEY (`id_usuario_seguido`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_inscricao_usuario_seguidor` FOREIGN KEY (`id_usuario_seguidor`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `obra_artistica`
--
ALTER TABLE `obra_artistica`
  ADD CONSTRAINT `fk_obra_artistica_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tagmap`
--
ALTER TABLE `tagmap`
  ADD CONSTRAINT `fk_tagmap_obra_artistica` FOREIGN KEY (`id_obra_artistica`) REFERENCES `obra_artistica` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tagmap_tag` FOREIGN KEY (`id_tag`) REFERENCES `tag` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
