-- MySQL dump 10.13  Distrib 8.0.30, for Linux (x86_64)
--
-- Host: localhost    Database: spacewide_db
-- ------------------------------------------------------
-- Server version	8.0.30-0 ubuntu 0.22.04.1
--
-- By Sandro

------------------------------------------------------------------
--
--

DROP TABLE IF EXISTS `avaliacao`;
CREATE TABLE `avaliacao` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_usuario` int NOT NULL,
  `id_obra_artistica` int NOT NULL,
  `avaliacao` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_avaliacao_usuario` (`id_usuario`),
  KEY `fk_avaliacao_obra_artistica` (`id_obra_artistica`),
  CONSTRAINT `fk_avaliacao_obra_artistica` FOREIGN KEY (`id_obra_artistica`) REFERENCES `obra_artistica` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_avaliacao_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `avaliacao` WRITE;
UNLOCK TABLES;

------------------------------------------------------------------
--
--

DROP TABLE IF EXISTS `comentario`;
CREATE TABLE `comentario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_usuario` int NOT NULL,
  `id_obra_artistica` int NOT NULL,
  `comentario` varchar(500) NOT NULL,
  `data_de_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_da_ultima_modificacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_comentario_usuario` (`id_usuario`),
  KEY `fk_comentario_obra_artistica` (`id_obra_artistica`),
  CONSTRAINT `fk_comentario_obra_artistica` FOREIGN KEY (`id_obra_artistica`) REFERENCES `obra_artistica` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_comentario_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `comentario` WRITE;
UNLOCK TABLES;

------------------------------------------------------------------
--
--

DROP TABLE IF EXISTS `inscricao`;
CREATE TABLE `inscricao` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_usuario_seguidor` int NOT NULL,
  `id_usuario_seguido` int NOT NULL,
  `ativo` tinyint(1) NOT NULL,
  `data_de_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_da_ultima_modificacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_inscricao_usuario_seguidor` (`id_usuario_seguidor`),
  KEY `fk_inscricao_usuario_seguido` (`id_usuario_seguido`),
  CONSTRAINT `fk_inscricao_usuario_seguido` FOREIGN KEY (`id_usuario_seguido`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_inscricao_usuario_seguidor` FOREIGN KEY (`id_usuario_seguidor`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `inscricao` WRITE;
UNLOCK TABLES;

------------------------------------------------------------------
--
--

DROP TABLE IF EXISTS `obra_artistica`;
CREATE TABLE `obra_artistica` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_usuario` int NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `subtitulo` int NOT NULL,
  `localizacao_da_imagem` int NOT NULL,
  `estado` enum('publicada','pendente','indisponivel','') NOT NULL,
  `data_de_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_da_ultima_modificacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `titulo` (`titulo`),
  KEY `fk_obra_artistica_usuario` (`id_usuario`),
  CONSTRAINT `fk_obra_artistica_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE SET DEFAULT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `obra_artistica` WRITE;
UNLOCK TABLES;

------------------------------------------------------------------
--
--

DROP TABLE IF EXISTS `tag`;
CREATE TABLE `tag` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `titulo` (`titulo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `tag` WRITE;
UNLOCK TABLES;

------------------------------------------------------------------
--
--

DROP TABLE IF EXISTS `tagmap`;
CREATE TABLE `tagmap` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_obra_artistica` int NOT NULL,
  `id_tag` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tagmap_obra_artistica` (`id_obra_artistica`),
  KEY `fk_tagmap_tag` (`id_tag`),
  CONSTRAINT `fk_tagmap_obra_artistica` FOREIGN KEY (`id_obra_artistica`) REFERENCES `obra_artistica` (`id`) ON DELETE CASCADE ON UPDATE  CASCADE,
  CONSTRAINT `fk_tagmap_tag` FOREIGN KEY (`id_tag`) REFERENCES `tag` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `tagmap` WRITE;
UNLOCK TABLES;

------------------------------------------------------------------
--
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(70) NOT NULL,
  `nome_artistico` varchar(50) DEFAULT NULL,
  `email` varchar(80) NOT NULL,
  `senha` varchar(256) NOT NULL,
  `localizacao_da_imagem_de_perfil` varchar(150) NOT NULL DEFAULT 'usuarios/imagem_de_perfil_padrao/imagem_de_perfil_padrao.png',
  `acesso` enum('administrador','artista','utente') NOT NULL,
  `codigo_validador` varchar(30) NOT NULL,
  `estado` enum('ativo','inativo','suspenso','banido') NOT NULL DEFAULT 'inativo',
  `data_de_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_da_ultima_modificacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `usuario` WRITE;
UNLOCK TABLES;