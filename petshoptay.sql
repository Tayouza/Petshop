-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Jun-2022 às 23:41
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `petshoptay`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agendadata`
--

CREATE TABLE `agendadata` (
  `id` int(11) NOT NULL,
  `data` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `agendadata`
--

INSERT INTO `agendadata` (`id`, `data`) VALUES
(48, '2022-06-20');

-- --------------------------------------------------------

--
-- Estrutura da tabela `agendahora`
--

CREATE TABLE `agendahora` (
  `id` int(11) NOT NULL,
  `hora` varchar(255) DEFAULT NULL,
  `id_data` int(11) DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `agendahora`
--

INSERT INTO `agendahora` (`id`, `hora`, `id_data`, `ativo`) VALUES
(185, '08:00', 48, 1),
(186, '09:00', 48, 1),
(187, '10:00', 48, 1),
(188, '11:00', 48, 1),
(189, '12:00', 48, 1),
(190, '13:00', 48, 1),
(191, '14:00', 48, 1),
(192, '15:00', 48, 1),
(193, '16:00', 48, 1),
(194, '17:00', 48, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `agendapet`
--

CREATE TABLE `agendapet` (
  `id` int(11) NOT NULL,
  `id_pet` int(11) NOT NULL,
  `id_data` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidade`
--

CREATE TABLE `cidade` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `id_estado` int(11) DEFAULT NULL,
  `id_pais` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cidade`
--

INSERT INTO `cidade` (`id`, `nome`, `id_estado`, `id_pais`) VALUES
(18, 'Javascript', 17, 24),
(19, 'Porto Alegre', 18, 25);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `nacionalidade` varchar(255) NOT NULL,
  `cpf` varchar(13) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `endereco` varchar(450) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `complemento` varchar(25) NOT NULL,
  `id_cidade` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `id_pais` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `nacionalidade`, `cpf`, `email`, `telefone`, `cep`, `endereco`, `numero`, `complemento`, `id_cidade`, `id_estado`, `id_pais`) VALUES
(14, 'Taylor', 'Brasileiro', '999.999.999-9', 'taylorsouza97@hotmail.com', '(51) 9 9639-0912', '90050-170', 'Rua Sarmento Leite', '846', 'Ap 203', 19, 18, 25);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado`
--

CREATE TABLE `estado` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `uf` varchar(10) DEFAULT NULL,
  `id_pais` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `estado`
--

INSERT INTO `estado` (`id`, `nome`, `uf`, `id_pais`) VALUES
(17, 'Logicalândia', 'LG', 24),
(18, 'Rio Grande do Sul', 'RS', 25);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pais`
--

CREATE TABLE `pais` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `sigla` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pais`
--

INSERT INTO `pais` (`id`, `nome`, `sigla`) VALUES
(24, 'Coders', 'COD'),
(25, 'Brasil', 'BR');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pet`
--

CREATE TABLE `pet` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `id_tutor` int(11) DEFAULT NULL,
  `raca` varchar(255) DEFAULT NULL,
  `idade` varchar(255) DEFAULT NULL,
  `infos` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pet`
--

INSERT INTO `pet` (`id`, `nome`, `id_tutor`, `raca`, `idade`, `infos`) VALUES
(7, 'Marcus Vinicius', 14, 'Poodle', '5 anos', 'Aprendeu a falar, não se assuste');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `agendadata`
--
ALTER TABLE `agendadata`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `agendahora`
--
ALTER TABLE `agendahora`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agendahora_ibfk_1` (`id_data`);

--
-- Índices para tabela `agendapet`
--
ALTER TABLE `agendapet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agendapet_ibfk_1` (`id_data`),
  ADD KEY `agendapet_ibfk_2` (`id_pet`);

--
-- Índices para tabela `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cidade_ibfk_1` (`id_estado`),
  ADD KEY `cidade_ibfk_2` (`id_pais`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_ibfk_1` (`id_cidade`),
  ADD KEY `cliente_ibfk_2` (`id_estado`),
  ADD KEY `cliente_ibfk_3` (`id_pais`);

--
-- Índices para tabela `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estado_ibfk_1` (`id_pais`);

--
-- Índices para tabela `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pet_ibfk_1` (`id_tutor`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agendadata`
--
ALTER TABLE `agendadata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de tabela `agendahora`
--
ALTER TABLE `agendahora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT de tabela `agendapet`
--
ALTER TABLE `agendapet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `cidade`
--
ALTER TABLE `cidade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `estado`
--
ALTER TABLE `estado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `pais`
--
ALTER TABLE `pais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `pet`
--
ALTER TABLE `pet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `agendahora`
--
ALTER TABLE `agendahora`
  ADD CONSTRAINT `agendahora_ibfk_1` FOREIGN KEY (`id_data`) REFERENCES `agendadata` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `agendapet`
--
ALTER TABLE `agendapet`
  ADD CONSTRAINT `agendapet_ibfk_1` FOREIGN KEY (`id_data`) REFERENCES `agendahora` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `agendapet_ibfk_2` FOREIGN KEY (`id_pet`) REFERENCES `pet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `cidade`
--
ALTER TABLE `cidade`
  ADD CONSTRAINT `cidade_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cidade_ibfk_2` FOREIGN KEY (`id_pais`) REFERENCES `pais` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`id_cidade`) REFERENCES `cidade` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cliente_ibfk_2` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cliente_ibfk_3` FOREIGN KEY (`id_pais`) REFERENCES `pais` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `estado`
--
ALTER TABLE `estado`
  ADD CONSTRAINT `estado_ibfk_1` FOREIGN KEY (`id_pais`) REFERENCES `pais` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `pet`
--
ALTER TABLE `pet`
  ADD CONSTRAINT `pet_ibfk_1` FOREIGN KEY (`id_tutor`) REFERENCES `cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
