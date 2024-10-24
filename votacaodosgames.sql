-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 24-Out-2024 às 01:20
-- Versão do servidor: 5.7.11
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `votacaodosgames`
--
CREATE DATABASE IF NOT EXISTS `votacaodosgames` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `votacaodosgames`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogos`
--

DROP TABLE IF EXISTS `jogos`;
CREATE TABLE IF NOT EXISTS `jogos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomeJogos` varchar(255) NOT NULL,
  `NomeCriador` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `image1` varchar(450) NOT NULL,
  `image2` varchar(450) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `jogos`
--

INSERT INTO `jogos` (`id`, `nomeJogos`, `NomeCriador`, `descricao`, `image1`, `image2`) VALUES
(1, 'Teste', 'Gustavo', 'abc', 'uploads/67e42b6794243971a665a323751c5853.jpg', 'uploads/5f451cf60cedba76695163baaa467614.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `logins`
--

DROP TABLE IF EXISTS `logins`;
CREATE TABLE IF NOT EXISTS `logins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `logins`
--

INSERT INTO `logins` (`id`, `usuario`, `senha`, `cargo`) VALUES
(1, 'Gustavo', 'A665A45920422F9D417E4867EFDC4FB8A04A1F3FFF1FA07E998E86F7F7A27AE3', 'admin'),
(2, 'Lucas@gmail.com', '9834876DCFB05CB167A5C24953EBA58C4AC89B1ADF57F28F2F9D09AF107EE8F0', 'user'),
(3, 'Willian@gmail.com', '46070D4BF934FB0D4B06D9E2C46E346944E322444900A435D7D9A95E6D7435F5', 'user'),
(4, 'Rabinson@gmail.com', 'c7e616822f366fb1b5e0756af498cc11d2c0862edcb32ca65882f622ff39de1b', 'user');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
