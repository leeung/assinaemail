-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Jan-2024 às 19:17
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `assinatura`
--
CREATE DATABASE IF NOT EXISTS `assinatura` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `assinatura`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `assinatura`
--

CREATE TABLE `assinatura` (
  `id` int(11) NOT NULL DEFAULT 0,
  `nome` varchar(40) NOT NULL,
  `funcao` varchar(40) NOT NULL,
  `contato` varchar(30) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `arquivo` varchar(200) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `logAlteracao` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `assinatura`
--

INSERT INTO `assinatura` (`id`, `nome`, `funcao`, `contato`, `email`, `arquivo`, `url`, `logAlteracao`) VALUES
(0, 'asdfasdfa', 'asdf', 'asdfas', 'dfasdf', 'view\\assinaturas\\f61b26d635309536c3c83c0adc3cb972.png', 'http://192.168.0.200/assinaemail/view/assinaturas/f61b26d635309536c3c83c0adc3cb972.png', 'inserindo 10/01/2024 02:01:59->::1'),
(0, 'asdf', 'asdf', 'asdf', 'asdf', 'view\\assinaturas\\912ec803b2ce49e4a541068d495ab570.png', 'http://192.168.0.200/assinaemail/view/assinaturas/912ec803b2ce49e4a541068d495ab570.png', 'inserindo 10/01/2024 07:01:42->::1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(8) NOT NULL,
  `senha` varchar(8) NOT NULL,
  `nome` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
