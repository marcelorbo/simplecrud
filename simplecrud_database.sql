-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 14-Mar-2020 às 23:44
-- Versão do servidor: 5.7.23-23
-- versão do PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estart83_public`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `doadores`
--

CREATE TABLE `doadores` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `nome` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpf` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `celular` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datanascimento` date DEFAULT NULL,
  `intervalodoacao` int(11) DEFAULT NULL,
  `valordoacao` decimal(15,2) DEFAULT NULL,
  `formapagamento` int(11) DEFAULT NULL,
  `observacoes` text COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `doadores_enderecos`
--

CREATE TABLE `doadores_enderecos` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `cep` varchar(9) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logradouro` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `complemento` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bairro` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cidade` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uf` char(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `iddoador` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `formas_pagamento`
--

CREATE TABLE `formas_pagamento` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `nome` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `observacoes` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `situacao` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `formas_pagamento`
--

INSERT INTO `formas_pagamento` (`id`, `created_at`, `updated_at`, `nome`, `observacoes`, `situacao`) VALUES
(1, '2020-03-14 20:53:53', '0000-00-00 00:00:00', 'Débito', '', 1),
(2, '2020-03-14 20:53:54', '0000-00-00 00:00:00', 'Crédito', '', 1),
(3, '2020-03-14 20:53:54', '0000-00-00 00:00:00', 'Boleto', '', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `intervalos_doacao`
--

CREATE TABLE `intervalos_doacao` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `nome` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `observacoes` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `situacao` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `intervalos_doacao`
--

INSERT INTO `intervalos_doacao` (`id`, `created_at`, `updated_at`, `nome`, `observacoes`, `situacao`) VALUES
(1, '2020-03-14 20:52:50', '0000-00-00 00:00:00', 'Bimestral', '', 1),
(2, '2020-03-14 20:52:50', '0000-00-00 00:00:00', 'Semestral', '', 1),
(3, '2020-03-14 20:52:50', '0000-00-00 00:00:00', 'Anual', '', 1),
(4, '2020-03-14 20:52:51', '0000-00-00 00:00:00', 'Mensal', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doadores`
--
ALTER TABLE `doadores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `intervalodoacao` (`intervalodoacao`),
  ADD KEY `formapagamento` (`formapagamento`);

--
-- Indexes for table `doadores_enderecos`
--
ALTER TABLE `doadores_enderecos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_id_doador` (`iddoador`);

--
-- Indexes for table `formas_pagamento`
--
ALTER TABLE `formas_pagamento`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `intervalos_doacao`
--
ALTER TABLE `intervalos_doacao`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doadores`
--
ALTER TABLE `doadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `doadores_enderecos`
--
ALTER TABLE `doadores_enderecos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `formas_pagamento`
--
ALTER TABLE `formas_pagamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `intervalos_doacao`
--
ALTER TABLE `intervalos_doacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
