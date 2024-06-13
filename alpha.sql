-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Jun-2024 às 21:02
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `alpha`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `login` varchar(30) NOT NULL,
  `cpf_cnpj` varchar(35) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` varchar(300) NOT NULL,
  `data_inicio` datetime NOT NULL,
  `data_fim` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `eventos`
--

INSERT INTO `eventos` (`id`, `login`, `cpf_cnpj`, `titulo`, `descricao`, `data_inicio`, `data_fim`) VALUES
(15, 'acad', '2354265758356', 'zumba', 'teste2', '2023-10-19 09:23:00', '2023-10-19 09:23:00'),
(13, 'acad', '2354265758356', 'zumba', 'teste', '2023-10-11 08:50:00', '2023-10-12 08:50:00'),
(16, 'acad', '2354265758356', 'ioga', 'ioga', '2024-06-13 15:58:00', '2024-06-16 15:59:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `parceria`
--

CREATE TABLE `parceria` (
  `id_parceria` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `nivel` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(50) NOT NULL,
  `motivo` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `parceria`
--

INSERT INTO `parceria` (`id_parceria`, `nome`, `nivel`, `email`, `telefone`, `motivo`) VALUES
(41, 'Teste2', 'profissionais', 'teste1@gmail.com', '1235431111111', 'teste'),
(43, 'Academia01', 'academia', 'academia01@gmail.com', '11900000001', 'Primeira'),
(44, 'Academia02', 'academia', 'academia02@gmail.com', '11900000002', 'Segunda'),
(45, 'Academia03', 'academia', 'academia03@gmail.com', '11900000003', 'Terceira'),
(46, 'Academia04', 'academia', 'academia04@gmail.com', '11900000004', 'Quarta');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbabdomen`
--

CREATE TABLE `tbabdomen` (
  `login_usuario` varchar(50) NOT NULL,
  `nome_personal` varchar(50) NOT NULL,
  `telefone_personal` varchar(30) NOT NULL,
  `email_personal` varchar(150) NOT NULL,
  `exercicio1` varchar(50) NOT NULL,
  `series1` varchar(10) NOT NULL,
  `repeticoes1` varchar(10) NOT NULL,
  `exercicio2` varchar(50) NOT NULL,
  `series2` varchar(10) NOT NULL,
  `repeticoes2` varchar(10) NOT NULL,
  `exercicio3` varchar(50) NOT NULL,
  `series3` varchar(10) NOT NULL,
  `repeticoes3` varchar(10) NOT NULL,
  `exercicio4` varchar(50) NOT NULL,
  `series4` varchar(10) NOT NULL,
  `repeticoes4` varchar(10) NOT NULL,
  `exercicio5` varchar(50) NOT NULL,
  `series5` varchar(10) NOT NULL,
  `repeticoes5` varchar(10) NOT NULL,
  `exercicio6` varchar(50) NOT NULL,
  `series6` varchar(10) NOT NULL,
  `repeticoes6` varchar(10) NOT NULL,
  `exercicio7` varchar(50) NOT NULL,
  `series7` varchar(10) NOT NULL,
  `repeticoes7` varchar(10) NOT NULL,
  `exercicio8` varchar(50) NOT NULL,
  `series8` varchar(10) NOT NULL,
  `repeticoes8` varchar(10) NOT NULL,
  `observacao` varchar(80) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbantebraco`
--

CREATE TABLE `tbantebraco` (
  `login_usuario` varchar(50) NOT NULL,
  `nome_personal` varchar(50) NOT NULL,
  `telefone_personal` varchar(30) NOT NULL,
  `email_personal` varchar(150) NOT NULL,
  `exercicio1` varchar(50) NOT NULL,
  `series1` varchar(10) NOT NULL,
  `repeticoes1` varchar(10) NOT NULL,
  `exercicio2` varchar(50) NOT NULL,
  `series2` varchar(10) NOT NULL,
  `repeticoes2` varchar(10) NOT NULL,
  `exercicio3` varchar(50) NOT NULL,
  `series3` varchar(10) NOT NULL,
  `repeticoes3` varchar(10) NOT NULL,
  `exercicio4` varchar(50) NOT NULL,
  `series4` varchar(10) NOT NULL,
  `repeticoes4` varchar(10) NOT NULL,
  `exercicio5` varchar(50) NOT NULL,
  `series5` varchar(10) NOT NULL,
  `repeticoes5` varchar(10) NOT NULL,
  `exercicio6` varchar(50) NOT NULL,
  `series6` varchar(10) NOT NULL,
  `repeticoes6` varchar(10) NOT NULL,
  `exercicio7` varchar(50) NOT NULL,
  `series7` varchar(10) NOT NULL,
  `repeticoes7` varchar(10) NOT NULL,
  `exercicio8` varchar(50) NOT NULL,
  `series8` varchar(10) NOT NULL,
  `repeticoes8` varchar(10) NOT NULL,
  `observacao` varchar(80) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbbiceps`
--

CREATE TABLE `tbbiceps` (
  `login_usuario` varchar(50) NOT NULL,
  `nome_personal` varchar(50) NOT NULL,
  `telefone_personal` varchar(30) NOT NULL,
  `email_personal` varchar(150) NOT NULL,
  `exercicio1` varchar(50) NOT NULL,
  `series1` varchar(10) NOT NULL,
  `repeticoes1` varchar(10) NOT NULL,
  `exercicio2` varchar(50) NOT NULL,
  `series2` varchar(10) NOT NULL,
  `repeticoes2` varchar(10) NOT NULL,
  `exercicio3` varchar(50) NOT NULL,
  `series3` varchar(10) NOT NULL,
  `repeticoes3` varchar(10) NOT NULL,
  `exercicio4` varchar(50) NOT NULL,
  `series4` varchar(10) NOT NULL,
  `repeticoes4` varchar(10) NOT NULL,
  `exercicio5` varchar(50) NOT NULL,
  `series5` varchar(10) NOT NULL,
  `repeticoes5` varchar(10) NOT NULL,
  `exercicio6` varchar(50) NOT NULL,
  `series6` varchar(10) NOT NULL,
  `repeticoes6` varchar(10) NOT NULL,
  `exercicio7` varchar(50) NOT NULL,
  `series7` varchar(10) NOT NULL,
  `repeticoes7` varchar(10) NOT NULL,
  `exercicio8` varchar(50) NOT NULL,
  `series8` varchar(10) NOT NULL,
  `repeticoes8` varchar(10) NOT NULL,
  `observacao` varchar(80) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcardio`
--

CREATE TABLE `tbcardio` (
  `login` varchar(50) NOT NULL,
  `data_hora` date NOT NULL,
  `tempo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tbcardio`
--

INSERT INTO `tbcardio` (`login`, `data_hora`, `tempo`) VALUES
('123', '0000-00-00', 3),
('123', '0000-00-00', 1),
('123', '0000-00-00', 2),
('123', '0000-00-00', 4),
('123', '0000-00-00', 5),
('123', '0000-00-00', 6),
('123', '0000-00-00', 7),
('123', '0000-00-00', 8),
('123', '2023-09-27', 8),
('123', '2023-09-27', 3),
('123', '2023-09-27', 9),
('1235', '2023-09-27', 2),
('1235', '2023-09-27', 1),
('1235', '2023-09-27', 3),
('1235', '2023-09-27', 4),
('1235', '2023-09-27', 2),
('1235', '2023-09-27', 3),
('1235', '2023-09-27', 5),
('1235', '2023-09-27', 4),
('1235', '2023-09-27', 2),
('1235', '2023-09-27', 1),
('123', '2023-09-28', 2),
('123', '2023-09-28', 3),
('123', '2023-09-28', 4),
('123', '2023-09-28', 5),
('123', '2023-10-03', 2),
('123', '2023-10-03', 3),
('123', '2023-10-03', 1),
('123', '2023-10-03', 4),
('123', '2023-10-03', 3),
('123', '2023-10-03', 1),
('123', '2023-10-03', 1),
('123', '2023-10-03', 1),
('123', '2023-10-03', 1),
('123', '2023-10-05', 3),
('edu', '2023-10-11', 5),
('edu', '2023-10-11', 2),
('edu', '2023-10-11', 11),
('usu1', '2024-06-13', 6),
('usu1', '2024-06-13', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcostas`
--

CREATE TABLE `tbcostas` (
  `login_usuario` varchar(50) NOT NULL,
  `nome_personal` varchar(50) NOT NULL,
  `telefone_personal` varchar(30) NOT NULL,
  `email_personal` varchar(150) NOT NULL,
  `exercicio1` varchar(50) NOT NULL,
  `series1` varchar(10) NOT NULL,
  `repeticoes1` varchar(10) NOT NULL,
  `exercicio2` varchar(50) NOT NULL,
  `series2` varchar(10) NOT NULL,
  `repeticoes2` varchar(10) NOT NULL,
  `exercicio3` varchar(50) NOT NULL,
  `series3` varchar(10) NOT NULL,
  `repeticoes3` varchar(10) NOT NULL,
  `exercicio4` varchar(50) NOT NULL,
  `series4` varchar(10) NOT NULL,
  `repeticoes4` varchar(10) NOT NULL,
  `exercicio5` varchar(50) NOT NULL,
  `series5` varchar(10) NOT NULL,
  `repeticoes5` varchar(10) NOT NULL,
  `exercicio6` varchar(50) NOT NULL,
  `series6` varchar(10) NOT NULL,
  `repeticoes6` varchar(10) NOT NULL,
  `exercicio7` varchar(50) NOT NULL,
  `series7` varchar(10) NOT NULL,
  `repeticoes7` varchar(10) NOT NULL,
  `exercicio8` varchar(50) NOT NULL,
  `series8` varchar(10) NOT NULL,
  `repeticoes8` varchar(10) NOT NULL,
  `observacao` varchar(80) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbequipamento`
--

CREATE TABLE `tbequipamento` (
  `id` int(11) NOT NULL,
  `caminho` varchar(255) NOT NULL,
  `cpf_cnpj` varchar(14) NOT NULL,
  `nome_equipamento` varchar(255) NOT NULL,
  `login_academia` varchar(255) NOT NULL,
  `qnt_equipamento` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tbequipamento`
--

INSERT INTO `tbequipamento` (`id`, `caminho`, `cpf_cnpj`, `nome_equipamento`, `login_academia`, `qnt_equipamento`) VALUES
(1, '../../../img/imgs/teste.jpg', '1234354657823', 'Teste', 'Teste', 5),
(7, '../../../img/imgs/RTX (4).png', '2354265758356', 'Teste1', 'acad', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbficha`
--

CREATE TABLE `tbficha` (
  `id_pd` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `login` varchar(30) NOT NULL,
  `nivel` varchar(30) NOT NULL,
  `plano` int(11) NOT NULL,
  `academia_selecionada` varchar(30) NOT NULL,
  `data_registro` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tbficha`
--

INSERT INTO `tbficha` (`id_pd`, `nome`, `login`, `nivel`, `plano`, `academia_selecionada`, `data_registro`) VALUES
(12, '123', '123', 'usuario', 1, 'teste3', '0000-00-00 00:00:00'),
(11, '123', '123', 'usuario', 1, 'teste3', '0000-00-00 00:00:00'),
(10, '123', '123', 'usuario', 1, 'teste3', '0000-00-00 00:00:00'),
(9, '123', '123', 'usuario', 1, 'teste3', '0000-00-00 00:00:00'),
(19, 'Trumann1', '123', 'usuario', 3, 'Teste', '2023-10-04 12:20:11'),
(23, '123', '1234', 'usuario', 3, 'Teste', '2023-10-04 22:44:13'),
(26, 'Eduardo Neves', 'edu', 'usuario', 3, 'teste1', '2023-10-11 12:16:00'),
(27, 'Usuario 3', 'usu3', 'usuario', 3, 'teste1', '2024-06-13 21:01:19');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbfichaof`
--

CREATE TABLE `tbfichaof` (
  `id_pd` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `login2` varchar(30) NOT NULL,
  `nivel` varchar(30) NOT NULL,
  `plano` int(11) NOT NULL,
  `nome_academia` varchar(30) NOT NULL,
  `data_hora` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tbfichaof`
--

INSERT INTO `tbfichaof` (`id_pd`, `nome`, `login2`, `nivel`, `plano`, `nome_academia`, `data_hora`) VALUES
(24, 'Eduardo Neves ', 'edu', 'usuario', 3, 'Teste', '2023-10-05 00:12:32'),
(22, 'Trumann1', '123', 'usuario', 3, 'Teste', '2023-10-04 22:31:25'),
(25, 'Trumann1', '123', 'usuario', 3, 'Teste', '2023-10-05 12:58:33');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbfuncionario`
--

CREATE TABLE `tbfuncionario` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `login` varchar(30) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `numero` char(30) NOT NULL,
  `data_registro` date NOT NULL,
  `palavra_chave` varchar(40) NOT NULL,
  `nome_academia` varchar(100) NOT NULL,
  `login_academia` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tbfuncionario`
--

INSERT INTO `tbfuncionario` (`id`, `nome`, `login`, `senha`, `email`, `numero`, `data_registro`, `palavra_chave`, `nome_academia`, `login_academia`) VALUES
(2, 'Guilherme', 'gtz2', '123', 'gtz@gmail.com', '123432546732', '0000-00-00', '', 'teste2', ''),
(11, 'Teste', 'teste3', '', 'teste@gmail.com', '1341412312', '0000-00-00', 'teste1', 'teste1', ''),
(16, 'Trumann', '123', '123', 'teste@gmail.com', '1233454365787', '2023-10-06', '1234', 'Teste', 'acad');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbfundo_acad`
--

CREATE TABLE `tbfundo_acad` (
  `login` varchar(50) NOT NULL,
  `caminho` varchar(900) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tbfundo_acad`
--

INSERT INTO `tbfundo_acad` (`login`, `caminho`) VALUES
('teste2', '../../../img/imgs/index.PNG'),
('acad', '../../../img/imgs/_3e8bf816-ad54-4624-a962-c6089118fcc8.jpeg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbimagens_acad`
--

CREATE TABLE `tbimagens_acad` (
  `login` varchar(50) NOT NULL,
  `caminho` varchar(900) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbimagens_acad_funcionario`
--

CREATE TABLE `tbimagens_acad_funcionario` (
  `login` varchar(50) NOT NULL,
  `caminho` varchar(900) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tbimagens_acad_funcionario`
--

INSERT INTO `tbimagens_acad_funcionario` (`login`, `caminho`) VALUES
('123', '../../../img/651f67997b386_teste.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbimagens_usuario`
--

CREATE TABLE `tbimagens_usuario` (
  `login` varchar(50) NOT NULL,
  `caminho` varchar(900) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tbimagens_usuario`
--

INSERT INTO `tbimagens_usuario` (`login`, `caminho`) VALUES
('123', '../img/imgs/RTX (5).png'),
('edu', '../img/imgs/ITSAS.png'),
('usu3', '../img/imgs/Screenshot_1.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbombro`
--

CREATE TABLE `tbombro` (
  `login_usuario` varchar(50) NOT NULL,
  `nome_personal` varchar(50) NOT NULL,
  `telefone_personal` varchar(30) NOT NULL,
  `email_personal` varchar(150) NOT NULL,
  `exercicio1` varchar(50) NOT NULL,
  `series1` varchar(10) NOT NULL,
  `repeticoes1` varchar(10) NOT NULL,
  `exercicio2` varchar(50) NOT NULL,
  `series2` varchar(10) NOT NULL,
  `repeticoes2` varchar(10) NOT NULL,
  `exercicio3` varchar(50) NOT NULL,
  `series3` varchar(10) NOT NULL,
  `repeticoes3` varchar(10) NOT NULL,
  `exercicio4` varchar(50) NOT NULL,
  `series4` varchar(10) NOT NULL,
  `repeticoes4` varchar(10) NOT NULL,
  `exercicio5` varchar(50) NOT NULL,
  `series5` varchar(10) NOT NULL,
  `repeticoes5` varchar(10) NOT NULL,
  `exercicio6` varchar(50) NOT NULL,
  `series6` varchar(10) NOT NULL,
  `repeticoes6` varchar(10) NOT NULL,
  `exercicio7` varchar(50) NOT NULL,
  `series7` varchar(10) NOT NULL,
  `repeticoes7` varchar(10) NOT NULL,
  `exercicio8` varchar(50) NOT NULL,
  `series8` varchar(10) NOT NULL,
  `repeticoes8` varchar(10) NOT NULL,
  `observacao` varchar(80) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbparceiro`
--

CREATE TABLE `tbparceiro` (
  `nome` varchar(50) NOT NULL,
  `login` varchar(30) NOT NULL,
  `telefone` char(20) NOT NULL,
  `cpf_cnpj` varchar(20) NOT NULL,
  `cidade` varchar(80) NOT NULL,
  `bairro` varchar(80) NOT NULL,
  `rua` varchar(150) NOT NULL,
  `numero` int(11) NOT NULL,
  `cep` char(18) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tipo` varchar(15) NOT NULL,
  `plano` int(11) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `palavra_chave` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tbparceiro`
--

INSERT INTO `tbparceiro` (`nome`, `login`, `telefone`, `cpf_cnpj`, `cidade`, `bairro`, `rua`, `numero`, `cep`, `email`, `tipo`, `plano`, `senha`, `palavra_chave`) VALUES
('teste1', 'teste2', '', '1234354657823', '', '', '', 0, '', 'teste2@gmail.com', 'academia', 3, '123', 'teste'),
('Teste', 'acad', '12343456587790', '2354265758356', 'Ferraz', 'Sitio Paredao', 'Rua Uma ai', 175, '08501080', '123@teste.com', 'academia', 3, '123', '123'),
('loja', 'loja', '1235431111111', '12335426', 'fv', 'paredao', 'teste', 123, '1235132', 'teste@gmail.com', 'loja', 3, '123', '123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbpeito`
--

CREATE TABLE `tbpeito` (
  `login_usuario` varchar(50) NOT NULL,
  `nome_personal` varchar(50) NOT NULL,
  `telefone_personal` varchar(30) NOT NULL,
  `email_personal` varchar(150) NOT NULL,
  `exercicio1` varchar(50) NOT NULL,
  `series1` varchar(10) NOT NULL,
  `repeticoes1` varchar(10) NOT NULL,
  `exercicio2` varchar(50) NOT NULL,
  `series2` varchar(10) NOT NULL,
  `repeticoes2` varchar(10) NOT NULL,
  `exercicio3` varchar(50) NOT NULL,
  `series3` varchar(10) NOT NULL,
  `repeticoes3` varchar(10) NOT NULL,
  `exercicio4` varchar(50) NOT NULL,
  `series4` varchar(10) NOT NULL,
  `repeticoes4` varchar(10) NOT NULL,
  `exercicio5` varchar(50) NOT NULL,
  `series5` varchar(10) NOT NULL,
  `repeticoes5` varchar(10) NOT NULL,
  `exercicio6` varchar(50) NOT NULL,
  `series6` varchar(10) NOT NULL,
  `repeticoes6` varchar(10) NOT NULL,
  `exercicio7` varchar(50) NOT NULL,
  `series7` varchar(10) NOT NULL,
  `repeticoes7` varchar(10) NOT NULL,
  `exercicio8` varchar(50) NOT NULL,
  `series8` varchar(10) NOT NULL,
  `repeticoes8` varchar(10) NOT NULL,
  `observacao` varchar(80) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tbpeito`
--

INSERT INTO `tbpeito` (`login_usuario`, `nome_personal`, `telefone_personal`, `email_personal`, `exercicio1`, `series1`, `repeticoes1`, `exercicio2`, `series2`, `repeticoes2`, `exercicio3`, `series3`, `repeticoes3`, `exercicio4`, `series4`, `repeticoes4`, `exercicio5`, `series5`, `repeticoes5`, `exercicio6`, `series6`, `repeticoes6`, `exercicio7`, `series7`, `repeticoes7`, `exercicio8`, `series8`, `repeticoes8`, `observacao`) VALUES
(' usu3', 'Trumann', '1233454365787', 'teste@gmail.com', 'Supino Reto', '4', '12', 'Supino Inclinado', '4', '12', 'Supino declinado', '4', '12', 'Crucifixo', '4', '12', 'Supino na máquina', '4', '12', 'Pullover inclinado', '4', '12', '', '', '', '', '', '', 'Execução cadenciada');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbperguntasficha`
--

CREATE TABLE `tbperguntasficha` (
  `login` varchar(45) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `numero` char(30) NOT NULL,
  `data` date NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `altura` char(8) NOT NULL,
  `peso` char(8) NOT NULL,
  `objetivo` varchar(200) NOT NULL,
  `restricao` varchar(200) NOT NULL,
  `medicamento` varchar(200) NOT NULL,
  `experiencia` varchar(200) NOT NULL,
  `frequencia` varchar(200) NOT NULL,
  `dia` varchar(50) NOT NULL,
  `tempo` varchar(50) NOT NULL,
  `treinamento` varchar(100) NOT NULL,
  `alergia` varchar(200) NOT NULL,
  `extra` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tbperguntasficha`
--

INSERT INTO `tbperguntasficha` (`login`, `cpf`, `email`, `numero`, `data`, `sexo`, `altura`, `peso`, `objetivo`, `restricao`, `medicamento`, `experiencia`, `frequencia`, `dia`, `tempo`, `treinamento`, `alergia`, `extra`) VALUES
(' usu3', ' 33333333333', 'usuario3@gmail.com', '11900000003', '2023-10-18', 'masculino', '2', '3', 'teste', 'teste', 'teste', 'teste', 'teste', 'teste', 'teste', 'teste', 'teste', 'teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbperna`
--

CREATE TABLE `tbperna` (
  `login_usuario` varchar(50) NOT NULL,
  `nome_personal` varchar(50) NOT NULL,
  `telefone_personal` varchar(30) NOT NULL,
  `email_personal` varchar(150) NOT NULL,
  `exercicio1` varchar(50) NOT NULL,
  `series1` varchar(10) NOT NULL,
  `repeticoes1` varchar(10) NOT NULL,
  `exercicio2` varchar(50) NOT NULL,
  `series2` varchar(10) NOT NULL,
  `repeticoes2` varchar(10) NOT NULL,
  `exercicio3` varchar(50) NOT NULL,
  `series3` varchar(10) NOT NULL,
  `repeticoes3` varchar(10) NOT NULL,
  `exercicio4` varchar(50) NOT NULL,
  `series4` varchar(10) NOT NULL,
  `repeticoes4` varchar(10) NOT NULL,
  `exercicio5` varchar(50) NOT NULL,
  `series5` varchar(10) NOT NULL,
  `repeticoes5` varchar(10) NOT NULL,
  `exercicio6` varchar(50) NOT NULL,
  `series6` varchar(10) NOT NULL,
  `repeticoes6` varchar(10) NOT NULL,
  `exercicio7` varchar(50) NOT NULL,
  `series7` varchar(10) NOT NULL,
  `repeticoes7` varchar(10) NOT NULL,
  `exercicio8` varchar(50) NOT NULL,
  `series8` varchar(10) NOT NULL,
  `repeticoes8` varchar(10) NOT NULL,
  `observacao` varchar(80) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tbperna`
--

INSERT INTO `tbperna` (`login_usuario`, `nome_personal`, `telefone_personal`, `email_personal`, `exercicio1`, `series1`, `repeticoes1`, `exercicio2`, `series2`, `repeticoes2`, `exercicio3`, `series3`, `repeticoes3`, `exercicio4`, `series4`, `repeticoes4`, `exercicio5`, `series5`, `repeticoes5`, `exercicio6`, `series6`, `repeticoes6`, `exercicio7`, `series7`, `repeticoes7`, `exercicio8`, `series8`, `repeticoes8`, `observacao`) VALUES
(' usu3', 'Trumann', '1233454365787', 'teste@gmail.com', 'Avanço', '4', '12', 'Leg Press 45° ', '4', '12', 'Agachamento', '4', '12', 'Agachamento Hack', '4', '12', 'Agachamento no Smith', '4', '12', 'Stiff', '4', '12', 'Mesa flexora', '4', '12', 'Agachamento sumô', '4', '12', 'Agachamentos cadenciados');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbtrapezio`
--

CREATE TABLE `tbtrapezio` (
  `login_usuario` varchar(50) NOT NULL,
  `nome_personal` varchar(50) NOT NULL,
  `telefone_personal` varchar(30) NOT NULL,
  `email_personal` varchar(150) NOT NULL,
  `exercicio1` varchar(50) NOT NULL,
  `series1` varchar(10) NOT NULL,
  `repeticoes1` varchar(10) NOT NULL,
  `exercicio2` varchar(50) NOT NULL,
  `series2` varchar(10) NOT NULL,
  `repeticoes2` varchar(10) NOT NULL,
  `exercicio3` varchar(50) NOT NULL,
  `series3` varchar(10) NOT NULL,
  `repeticoes3` varchar(10) NOT NULL,
  `exercicio4` varchar(50) NOT NULL,
  `series4` varchar(10) NOT NULL,
  `repeticoes4` varchar(10) NOT NULL,
  `exercicio5` varchar(50) NOT NULL,
  `series5` varchar(10) NOT NULL,
  `repeticoes5` varchar(10) NOT NULL,
  `exercicio6` varchar(50) NOT NULL,
  `series6` varchar(10) NOT NULL,
  `repeticoes6` varchar(10) NOT NULL,
  `exercicio7` varchar(50) NOT NULL,
  `series7` varchar(10) NOT NULL,
  `repeticoes7` varchar(10) NOT NULL,
  `exercicio8` varchar(50) NOT NULL,
  `series8` varchar(10) NOT NULL,
  `repeticoes8` varchar(10) NOT NULL,
  `observacao` varchar(80) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbtriceps`
--

CREATE TABLE `tbtriceps` (
  `login_usuario` varchar(50) NOT NULL,
  `nome_personal` varchar(50) NOT NULL,
  `telefone_personal` varchar(30) NOT NULL,
  `email_personal` varchar(150) NOT NULL,
  `exercicio1` varchar(50) NOT NULL,
  `series1` varchar(10) NOT NULL,
  `repeticoes1` varchar(10) NOT NULL,
  `exercicio2` varchar(50) NOT NULL,
  `series2` varchar(10) NOT NULL,
  `repeticoes2` varchar(10) NOT NULL,
  `exercicio3` varchar(50) NOT NULL,
  `series3` varchar(10) NOT NULL,
  `repeticoes3` varchar(10) NOT NULL,
  `exercicio4` varchar(50) NOT NULL,
  `series4` varchar(10) NOT NULL,
  `repeticoes4` varchar(10) NOT NULL,
  `exercicio5` varchar(50) NOT NULL,
  `series5` varchar(10) NOT NULL,
  `repeticoes5` varchar(10) NOT NULL,
  `exercicio6` varchar(50) NOT NULL,
  `series6` varchar(10) NOT NULL,
  `repeticoes6` varchar(10) NOT NULL,
  `exercicio7` varchar(50) NOT NULL,
  `series7` varchar(10) NOT NULL,
  `repeticoes7` varchar(10) NOT NULL,
  `exercicio8` varchar(50) NOT NULL,
  `series8` varchar(10) NOT NULL,
  `repeticoes8` varchar(10) NOT NULL,
  `observacao` varchar(80) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbusuario`
--

CREATE TABLE `tbusuario` (
  `nome` varchar(50) NOT NULL,
  `login` varchar(30) NOT NULL,
  `cpf` char(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `numero` char(25) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `palavra_chave` varchar(30) NOT NULL,
  `plano` int(11) NOT NULL,
  `nivel` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tbusuario`
--

INSERT INTO `tbusuario` (`nome`, `login`, `cpf`, `email`, `numero`, `senha`, `palavra_chave`, `plano`, `nivel`) VALUES
('ITSAS', 'adm', '000000000000', 'itsastech.ltda@gmail.com', '', '123', 'tcc2023', 0, 'adm'),
('Usuario 3', 'usu3', '33333333333', 'usuario3@gmail.com', '11900000003', '123', 'usuario3', 3, 'usuario'),
('usuario2', 'usu2', '22222222222', 'usuario2@gmail.com', '11900000002', '123', 'usuario2', 2, 'usuario'),
('Usuario 1', 'usu1', '11111111111', 'usuario1@gmail.com', '11900000001', '123', 'usuario1', 1, 'usuario');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `parceria`
--
ALTER TABLE `parceria`
  ADD PRIMARY KEY (`id_parceria`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices para tabela `tbabdomen`
--
ALTER TABLE `tbabdomen`
  ADD UNIQUE KEY `login_usuario` (`login_usuario`);

--
-- Índices para tabela `tbantebraco`
--
ALTER TABLE `tbantebraco`
  ADD UNIQUE KEY `login_usuario` (`login_usuario`);

--
-- Índices para tabela `tbbiceps`
--
ALTER TABLE `tbbiceps`
  ADD UNIQUE KEY `login_usuario` (`login_usuario`);

--
-- Índices para tabela `tbcostas`
--
ALTER TABLE `tbcostas`
  ADD UNIQUE KEY `login_usuario` (`login_usuario`);

--
-- Índices para tabela `tbequipamento`
--
ALTER TABLE `tbequipamento`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tbficha`
--
ALTER TABLE `tbficha`
  ADD PRIMARY KEY (`id_pd`);

--
-- Índices para tabela `tbfichaof`
--
ALTER TABLE `tbfichaof`
  ADD PRIMARY KEY (`id_pd`);

--
-- Índices para tabela `tbfuncionario`
--
ALTER TABLE `tbfuncionario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Índices para tabela `tbfundo_acad`
--
ALTER TABLE `tbfundo_acad`
  ADD UNIQUE KEY `login` (`login`);

--
-- Índices para tabela `tbimagens_acad`
--
ALTER TABLE `tbimagens_acad`
  ADD UNIQUE KEY `login` (`login`);

--
-- Índices para tabela `tbimagens_acad_funcionario`
--
ALTER TABLE `tbimagens_acad_funcionario`
  ADD UNIQUE KEY `login` (`login`);

--
-- Índices para tabela `tbimagens_usuario`
--
ALTER TABLE `tbimagens_usuario`
  ADD UNIQUE KEY `login` (`login`);

--
-- Índices para tabela `tbombro`
--
ALTER TABLE `tbombro`
  ADD UNIQUE KEY `login_usuario` (`login_usuario`);

--
-- Índices para tabela `tbparceiro`
--
ALTER TABLE `tbparceiro`
  ADD UNIQUE KEY `cpf_cnpj` (`cpf_cnpj`);

--
-- Índices para tabela `tbpeito`
--
ALTER TABLE `tbpeito`
  ADD UNIQUE KEY `login_usuario` (`login_usuario`);

--
-- Índices para tabela `tbperguntasficha`
--
ALTER TABLE `tbperguntasficha`
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- Índices para tabela `tbperna`
--
ALTER TABLE `tbperna`
  ADD UNIQUE KEY `login_usuario` (`login_usuario`);

--
-- Índices para tabela `tbtrapezio`
--
ALTER TABLE `tbtrapezio`
  ADD UNIQUE KEY `login_usuario` (`login_usuario`);

--
-- Índices para tabela `tbtriceps`
--
ALTER TABLE `tbtriceps`
  ADD UNIQUE KEY `login_usuario` (`login_usuario`);

--
-- Índices para tabela `tbusuario`
--
ALTER TABLE `tbusuario`
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `parceria`
--
ALTER TABLE `parceria`
  MODIFY `id_parceria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de tabela `tbequipamento`
--
ALTER TABLE `tbequipamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tbficha`
--
ALTER TABLE `tbficha`
  MODIFY `id_pd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `tbfichaof`
--
ALTER TABLE `tbfichaof`
  MODIFY `id_pd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `tbfuncionario`
--
ALTER TABLE `tbfuncionario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
