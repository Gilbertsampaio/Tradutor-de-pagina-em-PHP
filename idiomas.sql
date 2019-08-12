-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 12-Ago-2019 às 17:39
-- Versão do servidor: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idiomas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `novidade`
--

CREATE TABLE `novidade` (
  `ID` int(11) NOT NULL,
  `data` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `titulo_br` varchar(255) NOT NULL,
  `titulo_us` varchar(255) NOT NULL,
  `titulo_es` varchar(255) NOT NULL,
  `titulo_fr` varchar(255) NOT NULL,
  `texto_br` text NOT NULL,
  `texto_us` text NOT NULL,
  `texto_es` text NOT NULL,
  `texto_fr` text NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `novidade`
--

INSERT INTO `novidade` (`ID`, `data`, `foto`, `titulo_br`, `titulo_us`, `titulo_es`, `titulo_fr`, `texto_br`, `texto_us`, `texto_es`, `texto_fr`, `status`) VALUES
(2, '11/08/2019', '42c303ffff14a32f2625453244ad5264.jpg', 'Dia dos Pais', 'Father''s Day', 'Día de los padres', 'Fête des pères', 'Eu quero parabenizar à todos os pais do Brasil.', 'I want to congratulate all the parents in Brazil.', 'Quiero felicitar a todos los padres en Brasil.', 'Je tiens à féliciter tous les parents au Brésil.', 'Inativo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `novidade`
--
ALTER TABLE `novidade`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `novidade`
--
ALTER TABLE `novidade`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
