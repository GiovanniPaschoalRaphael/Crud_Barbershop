-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 08-Abr-2020 às 20:23
-- Versão do servidor: 5.7.23
-- versão do PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barbershop`
--
CREATE DATABASE IF NOT EXISTS `barbershop` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `barbershop`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

DROP TABLE IF EXISTS `administrador`;
CREATE TABLE IF NOT EXISTS `administrador` (
  `login` varchar(30) NOT NULL,
  `senha` varchar(30) NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`login`, `senha`) VALUES
('Barbershop', 'corte12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `agendamento`
--

DROP TABLE IF EXISTS `agendamento`;
CREATE TABLE IF NOT EXISTS `agendamento` (
  `id_agendamento` int(11) NOT NULL AUTO_INCREMENT,
  `horario` datetime NOT NULL,
  `comparece` enum('S','N') NOT NULL DEFAULT 'S',
  `historico` enum('S','N') NOT NULL DEFAULT 'N',
  `cliente_id_cliente` int(11) NOT NULL,
  `funcionario_id_funcionario` int(11) NOT NULL,
  `servico_id_servico` int(11) NOT NULL,
  PRIMARY KEY (`id_agendamento`),
  KEY `fk_agendamento_cliente_idx` (`cliente_id_cliente`),
  KEY `fk_agendamento_funcionario1_idx` (`funcionario_id_funcionario`),
  KEY `fk_agendamento_servico1_idx` (`servico_id_servico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Acionadores `agendamento`
--
DROP TRIGGER IF EXISTS `agendamento_AFTER_INSERT`;
DELIMITER $$
CREATE TRIGGER `agendamento_AFTER_INSERT` AFTER INSERT ON `agendamento` FOR EACH ROW BEGIN
	update funcionario
    set qtd_agendamento = qtd_agendamento +1
    where id_funcionario = new.funcionario_id_funcionario;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `agendamento_AFTER_UPDATE`;
DELIMITER $$
CREATE TRIGGER `agendamento_AFTER_UPDATE` AFTER UPDATE ON `agendamento` FOR EACH ROW BEGIN
	update cliente
    set qtd_comparecimento = qtd_comparecimento + 1
    where id_cliente = new.cliente_id_cliente and new.comparece='S' and new.historico='S';
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome_cli` varchar(200) NOT NULL,
  `telefone_cli` varchar(11) NOT NULL,
  `qtd_comparecimento` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
CREATE TABLE IF NOT EXISTS `funcionario` (
  `id_funcionario` int(11) NOT NULL AUTO_INCREMENT,
  `nome_func` varchar(200) NOT NULL,
  `telefone_func` varchar(11) NOT NULL,
  `email_func` varchar(100) NOT NULL,
  `qtd_agendamento` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_funcionario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id_funcionario`, `nome_func`, `telefone_func`, `email_func`, `qtd_agendamento`) VALUES
(1, 'Jorge Roberto', '18981913451', 'jorge@hotmail.com', 0),
(2, 'Igor Gomes', '18912456204', 'igor@outlook.com', 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `funcionarios_cadastrados`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `funcionarios_cadastrados`;
CREATE TABLE IF NOT EXISTS `funcionarios_cadastrados` (
`Id_Funcionario` int(11)
,`Nome` varchar(200)
,`Telefone` varchar(11)
,`Email` varchar(100)
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

DROP TABLE IF EXISTS `servico`;
CREATE TABLE IF NOT EXISTS `servico` (
  `id_servico` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `preco` double NOT NULL,
  PRIMARY KEY (`id_servico`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`id_servico`, `nome`, `preco`) VALUES
(1, 'Cabelo', 18),
(2, 'Barba', 15),
(3, 'Sobrancelha', 10),
(4, 'Cabelo + Barba', 30),
(5, 'Cabelo + Barba + Sobrancelha', 40);

-- --------------------------------------------------------

--
-- Structure for view `funcionarios_cadastrados`
--
DROP TABLE IF EXISTS `funcionarios_cadastrados`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `funcionarios_cadastrados`  AS  select `funcionario`.`id_funcionario` AS `Id_Funcionario`,`funcionario`.`nome_func` AS `Nome`,`funcionario`.`telefone_func` AS `Telefone`,`funcionario`.`email_func` AS `Email` from `funcionario` ;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `agendamento`
--
ALTER TABLE `agendamento`
  ADD CONSTRAINT `fk_agendamento_cliente` FOREIGN KEY (`cliente_id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_agendamento_funcionario1` FOREIGN KEY (`funcionario_id_funcionario`) REFERENCES `funcionario` (`id_funcionario`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_agendamento_servico1` FOREIGN KEY (`servico_id_servico`) REFERENCES `servico` (`id_servico`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
