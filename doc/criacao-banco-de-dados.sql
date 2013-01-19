-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 18, 2013 at 10:29 PM
-- Server version: 5.5.28
-- PHP Version: 5.4.6-1ubuntu1.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `financas`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorias_despesas_extras`
--

CREATE TABLE IF NOT EXISTS `categorias_despesas_extras` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `categorias_despesas_extras`
--

INSERT INTO `categorias_despesas_extras` (`id`, `nome`) VALUES
(1, 'Médico'),
(2, 'Dentista'),
(3, 'Hospital'),
(4, 'Manutenção Veículo'),
(5, 'Manutenção Casa'),
(6, 'Material escolar'),
(7, 'Uniforme'),
(8, 'Viagens'),
(9, 'Cinema / Teatro'),
(10, 'Restaurantes / Bares'),
(11, 'Locadora de filmes'),
(12, 'Roupas'),
(13, 'Calçados'),
(14, 'Acessórios'),
(15, 'Presentes');

-- --------------------------------------------------------

--
-- Table structure for table `categorias_despesas_fixas`
--

CREATE TABLE IF NOT EXISTS `categorias_despesas_fixas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `categorias_despesas_fixas`
--

INSERT INTO `categorias_despesas_fixas` (`id`, `nome`) VALUES
(1, 'Aluguel'),
(2, 'Condomínio'),
(3, 'Prestação da casa'),
(4, 'Seguro da casa'),
(5, 'Diarista'),
(6, 'Mensalista'),
(7, 'Prestação Veículo'),
(8, 'Seguro Veículo'),
(9, 'Estacionamento'),
(10, 'Seguro saúde'),
(11, 'Plano saúde'),
(12, 'Colégio'),
(13, 'Faculdade'),
(14, 'Cursos'),
(15, 'IPTU'),
(16, 'IPVA'),
(17, 'Contas e refinanciamentos');

-- --------------------------------------------------------

--
-- Table structure for table `categorias_despesas_variaveis`
--

CREATE TABLE IF NOT EXISTS `categorias_despesas_variaveis` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `categorias_despesas_variaveis`
--

INSERT INTO `categorias_despesas_variaveis` (`id`, `nome`) VALUES
(1, 'Luz'),
(2, 'Água'),
(3, 'Telefone'),
(4, 'Celular'),
(5, 'Gás'),
(6, 'Mensalidade TV'),
(7, 'Internet'),
(8, 'Metrô'),
(9, 'Ônibus'),
(10, 'Combustível'),
(11, 'Estacionamento'),
(12, 'Supermercado'),
(13, 'Feira'),
(14, 'Padaria'),
(15, 'Medicamentos'),
(16, 'Cabeleireiro'),
(17, 'Manicure'),
(18, 'Esteticista'),
(19, 'Academia'),
(20, 'Clube');

-- --------------------------------------------------------

--
-- Table structure for table `categorias_investimentos`
--

CREATE TABLE IF NOT EXISTS `categorias_investimentos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `categorias_investimentos`
--

INSERT INTO `categorias_investimentos` (`id`, `nome`) VALUES
(1, 'Ações'),
(2, 'Tesouro direto'),
(3, 'Renda fixa / Poupança'),
(4, 'Previdência privada'),
(5, 'Outros');

-- --------------------------------------------------------

--
-- Table structure for table `categorias_receitas`
--

CREATE TABLE IF NOT EXISTS `categorias_receitas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `categorias_receitas`
--

INSERT INTO `categorias_receitas` (`id`, `nome`) VALUES
(1, 'Salário'),
(2, 'Aluguel'),
(3, 'Horas extras'),
(4, '13º Salário'),
(5, 'Férias'),
(6, 'Outros');

-- --------------------------------------------------------

--
-- Table structure for table `despesas_extras`
--

CREATE TABLE IF NOT EXISTS `despesas_extras` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_usuario` int(10) unsigned NOT NULL,
  `id_categoria_despesa_extra` int(10) unsigned NOT NULL,
  `data` date NOT NULL,
  `valor` double(10,2) NOT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_despesas_extras_1` (`id_categoria_despesa_extra`),
  KEY `fk_despesas_extras_2` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;


-- --------------------------------------------------------

--
-- Table structure for table `despesas_fixas`
--

CREATE TABLE IF NOT EXISTS `despesas_fixas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_usuario` int(10) unsigned NOT NULL,
  `id_categoria_despesa_fixa` int(10) unsigned NOT NULL,
  `data` date NOT NULL,
  `valor` double(10,2) NOT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_despesas_fixas_1` (`id_categoria_despesa_fixa`),
  KEY `fk_despesas_fixas_2` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `despesas_variaveis`
--

CREATE TABLE IF NOT EXISTS `despesas_variaveis` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_usuario` int(10) unsigned NOT NULL,
  `id_categoria_despesa_variavel` int(10) unsigned NOT NULL,
  `data` date NOT NULL,
  `valor` double(10,2) NOT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_despesas_variaveis_1` (`id_categoria_despesa_variavel`),
  KEY `fk_despesas_variaveis_2` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `investimentos`
--

CREATE TABLE IF NOT EXISTS `investimentos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_usuario` int(10) unsigned NOT NULL,
  `id_categoria_investimento` int(10) unsigned NOT NULL,
  `data` date NOT NULL,
  `valor` double(10,2) NOT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_investimentos_1` (`id_categoria_investimento`),
  KEY `fk_investimentos_2` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `receitas`
--

CREATE TABLE IF NOT EXISTS `receitas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_usuario` int(10) unsigned NOT NULL,
  `id_categoria_receita` int(10) unsigned NOT NULL,
  `data` date NOT NULL,
  `valor` double(10,2) NOT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_receitas_1` (`id_categoria_receita`),
  KEY `fk_receitas_2` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` TEXT COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'Administrador', 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `despesas_extras`
--
ALTER TABLE `despesas_extras`
  ADD CONSTRAINT `fk_despesas_extras_1` FOREIGN KEY (`id_categoria_despesa_extra`) REFERENCES `categorias_despesas_extras` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_despesas_extras_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `despesas_fixas`
--
ALTER TABLE `despesas_fixas`
  ADD CONSTRAINT `fk_despesas_fixas_1` FOREIGN KEY (`id_categoria_despesa_fixa`) REFERENCES `categorias_despesas_fixas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_despesas_fixas_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `despesas_variaveis`
--
ALTER TABLE `despesas_variaveis`
  ADD CONSTRAINT `fk_despesas_variaveis_1` FOREIGN KEY (`id_categoria_despesa_variavel`) REFERENCES `categorias_despesas_variaveis` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_despesas_variaveis_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `investimentos`
--
ALTER TABLE `investimentos`
  ADD CONSTRAINT `fk_investimentos_1` FOREIGN KEY (`id_categoria_investimento`) REFERENCES `categorias_investimentos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_investimentos_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `receitas`
--
ALTER TABLE `receitas`
  ADD CONSTRAINT `fk_receitas_1` FOREIGN KEY (`id_categoria_receita`) REFERENCES `categorias_receitas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_receitas_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
