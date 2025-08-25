-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3406
-- Tempo de geração: 18/07/2025 às 15:56
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `lojaze`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastro`
--

CREATE TABLE `cadastro` (
  `nome` varchar(255) DEFAULT NULL,
  `cpf` bigint(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `genero` varchar(10) DEFAULT NULL,
  `cep` bigint(10) DEFAULT NULL,
  `numero` int(15) DEFAULT NULL,
  `telefone` bigint(15) DEFAULT NULL,
  `numero_cartao` bigint(20) DEFAULT NULL,
  `codigo_cartao` int(5) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `id_cadastro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cadastro`
--

INSERT INTO `cadastro` (`nome`, `cpf`, `email`, `genero`, `cep`, `numero`, `telefone`, `numero_cartao`, `codigo_cartao`, `senha`, `id_cadastro`) VALUES
('teste', 12345678911, 'teste@gmail.com', 'Masculino', 12345678, 222, 47997070707, 1234567812341616, 385, 'vaidacerto', 1),

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cadastro`
--
ALTER TABLE `cadastro`
  ADD PRIMARY KEY (`id_cadastro`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cadastro`
--
ALTER TABLE `cadastro`
  MODIFY `id_cadastro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
