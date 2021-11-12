-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 12/11/2021 às 13:22
-- Versão do servidor: 10.4.14-MariaDB
-- Versão do PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dev_cronotimer`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(25) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `moeda_id` int(11) DEFAULT NULL,
  `preco_hora` decimal(8,2) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '''0''=>''Ativo'', ''1''=>''Inativo''',
  `data_cadastro` date NOT NULL,
  `alterado_em` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nome`, `telefone`, `celular`, `email`, `moeda_id`, `preco_hora`, `status`, `data_cadastro`, `alterado_em`) VALUES
(39, 'Marcio', '(21) 2606-7336', '(21) 9 6426-9267', 'contato@viasign.com.br', 4, '15.62', 0, '2018-09-16', '2018-12-28 12:08:50'),
(40, 'André Knosel', '(21) 3119-2055', '(21) 9 6479-2356', 'impressao@aksign.com.br', 4, '18.75', 0, '2018-09-16', '2018-12-28 12:06:48'),
(41, 'Thiago Peruca', '', '(21) 9 6444-7678', 'thiagosign@hotmail.com.br', 4, '15.62', 1, '2018-09-18', '0000-00-00 00:00:00'),
(42, 'Rogério', '', '(21) 9 6413-5436', 'rogerio@formulaplusrj.com.br', 4, '18.75', 1, '2018-10-29', '2018-12-28 12:15:30'),
(43, 'Ricardo Tannure', '(418)', '(418) 561-5323', 'rtannure@outlook.com', 2, '10.00', 1, '2018-10-29', '2018-12-27 01:12:34');

-- --------------------------------------------------------

--
-- Estrutura para tabela `fatura`
--

CREATE TABLE `fatura` (
  `id_fatura` int(11) NOT NULL,
  `cliente_fatura` int(11) NOT NULL,
  `data_emissao` date NOT NULL,
  `data_vencimento` date NOT NULL,
  `moeda` varchar(5) NOT NULL,
  `valor_hora` varchar(11) NOT NULL,
  `total_fatura` decimal(8,2) DEFAULT NULL,
  `total_pendente` decimal(8,2) NOT NULL,
  `status_fatura` int(1) NOT NULL DEFAULT 0 COMMENT '1 é verdadeiro e 0 como falso'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `fatura`
--

INSERT INTO `fatura` (`id_fatura`, `cliente_fatura`, `data_emissao`, `data_vencimento`, `moeda`, `valor_hora`, `total_fatura`, `total_pendente`, `status_fatura`) VALUES
(1244, 43, '0000-00-00', '0000-00-00', 'R$', '25.00', '1185.00', '0.00', 1),
(1245, 41, '0000-00-00', '0000-00-00', 'R$', '15.62', '326.00', '0.00', 0),
(1246, 42, '0000-00-00', '0000-00-00', 'R$', '18.75', '373.00', '0.00', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `itenspagamento`
--

CREATE TABLE `itenspagamento` (
  `id_pagamento` int(11) NOT NULL,
  `fatura_id` int(11) NOT NULL,
  `valor_pago` decimal(8,2) NOT NULL,
  `tipo_pagamento` int(11) NOT NULL,
  `descricao_pagamento` varchar(140) DEFAULT NULL,
  `data_pagamento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `itenstrabalho`
--

CREATE TABLE `itenstrabalho` (
  `id_trabalho` int(11) NOT NULL,
  `nota` varchar(140) DEFAULT NULL,
  `data_inicio` datetime NOT NULL,
  `data_final` datetime DEFAULT NULL,
  `inicio` varchar(14) DEFAULT NULL,
  `final` varchar(14) DEFAULT NULL,
  `projeto_id` int(11) NOT NULL,
  `tarefa_id` int(11) NOT NULL,
  `horas` varchar(10) DEFAULT NULL,
  `horaInt` varchar(10) DEFAULT NULL,
  `livre` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1 é verdadeiro e 0 como falso ( indica se é cobravel ou não )',
  `moeda` varchar(5) NOT NULL,
  `rendimento` varchar(20) DEFAULT NULL,
  `faturado` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1 é verdadeiro e 0 como falso',
  `fatura_id` int(11) DEFAULT NULL COMMENT 'identificador com ID da fatura referente'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `itenstrabalho`
--

INSERT INTO `itenstrabalho` (`id_trabalho`, `nota`, `data_inicio`, `data_final`, `inicio`, `final`, `projeto_id`, `tarefa_id`, `horas`, `horaInt`, `livre`, `moeda`, `rendimento`, `faturado`, `fatura_id`) VALUES
(205, 'continuando landing page do APP', '2018-10-22 09:43:32', '2018-10-22 12:10:54', '09:43:32', '12:10:54', 18, 2, '02:27:22', '2,46', 0, 'R$', '46,05', 1, 1246),
(206, 'layout dia do medico', '2018-10-18 15:53:10', '2018-10-18 16:33:49', '15:53:10', '16:33:49', 18, 2, '00:40:39', '0,68', 0, 'R$', '12,70', 1, 1246),
(207, 'modernização da logo asbene', '2018-11-01 10:31:47', '2018-11-01 13:48:56', '10:31:47', '13:48:56', 17, 5, '03:17:09', '3,29', 0, 'R$', '51,32', 1, 1245),
(208, 'Logo asbene', '2018-11-01 14:08:09', '2018-11-01 14:33:20', '14:08:09', '14:33:20', 17, 5, '00:25:11', '0,42', 0, 'R$', '6,56', 1, 1245),
(209, 'novembro azul, layout post e display pra campanha', '2018-11-01 17:06:24', '2018-11-01 18:03:45', '17:06:24', '18:03:45', 18, 2, '00:57:21', '0,96', 0, 'R$', '17,92', 1, 1246),
(210, 'criando primeiro esboço freehand baseando a ideia por traz da identidade', '2018-09-12 13:29:31', '2018-09-12 18:11:47', '13:29:31', '18:11:47', 16, 5, '04:42:16', '4,70', 0, 'R$', '117,61', 1, 1244),
(211, ' pesquisando e criando novos rascunhos em busca de um icone, vale a pena tentar algum icone pra marcar a lembrança', '2018-09-13 16:43:07', '2018-09-13 23:19:55', '16:43:07', '23:19:55', 16, 5, '06:36:48', '6,61', 0, 'R$', '165,33', 1, 1244),
(212, ' fazendo nova pesquisa, os resultados iniciais nao me agradaram muito...novos rascunhos com uma ideia mais consistente', '2018-09-16 10:10:09', '2018-09-16 12:25:51', '10:10:09', '12:25:51', 16, 5, '02:15:42', '2,26', 0, 'R$', '56,54', 1, 1244),
(213, ' finalizando esboço no papel, iniciando a vetorização do logotipo', '2018-09-20 08:27:26', '2018-09-20 13:51:57', '08:27:26', '13:51:57', 16, 5, '05:24:31', '5,41', 0, 'R$', '135,22', 1, 1244),
(214, 'escolhendo typologia', '2018-09-21 09:33:06', '2018-09-21 12:59:13', '09:33:06', '12:59:13', 16, 5, '03:26:07', '3,44', 0, 'R$', '85,88', 1, 1244),
(215, ' trabalhando logotipo', '2018-09-25 12:33:58', '2018-09-25 16:26:23', '12:33:58', '16:26:23', 16, 5, '03:52:25', '3,87', 0, 'R$', '96,84', 1, 1244),
(216, ' escolhendo nova typo, falta alguma coisa...', '2018-09-26 11:36:39', '2018-09-26 13:25:41', '11:36:39', '13:25:41', 16, 5, '01:49:02', '1,82', 0, 'R$', '45,43', 1, 1244),
(217, ' trabalhando typologia...o nome me leva a querer trabalhar soh com tipologia,', '2018-09-27 15:26:09', '2018-09-27 17:54:24', '15:26:09', '17:54:24', 16, 5, '02:28:15', '2,47', 0, 'R$', '61,77', 1, 1244),
(218, ' trabalhando estrutura da logomarca', '2018-10-06 17:19:45', '2018-10-06 21:32:48', '17:19:45', '21:32:48', 16, 5, '04:13:03', '4,22', 0, 'R$', '105,44', 1, 1244),
(219, 'estilizando B do logotipo, atraindo uma forma de balao, onde enriquecemos a simplicidade da forma da tipologia', '2018-10-22 12:11:33', '2018-10-22 15:43:17', '12:11:33', '15:43:17', 16, 5, '03:31:44', '3,53', 0, 'R$', '88,22', 1, 1244),
(220, ' alterando typologia criando apresentação, alteração nas cores, inclusao a mais de amarelo, e uma nova escolha de tom de amarelo.', '2018-10-22 16:46:56', '2018-10-22 20:56:06', '16:46:56', '20:56:06', 16, 5, '04:09:10', '4,15', 0, 'R$', '103,82', 1, 1244),
(221, ' finalizando PDF da apresentação', '2018-10-25 12:18:35', '2018-10-25 14:40:01', '12:18:35', '14:40:01', 16, 5, '02:21:26', '2,36', 0, 'R$', '58,93', 1, 1244),
(222, 'encapsulando apresentação em um PDF\r', '2018-10-25 08:03:24', '2018-10-25 09:58:58', '08:03:24', '09:58:58', 16, 5, '01:55:34', '1,93', 0, 'R$', '48,15', 1, 1244),
(223, 'organizando e diagramando apresentação', '2018-10-21 20:01:36', '2018-10-21 20:41:44', '20:01:36', '20:41:44', 16, 5, '00:40:08', '0,67', 0, 'R$', '16,72', 1, 1244),
(224, 'layout Novembro Azul', '2018-11-02 11:13:19', '2018-11-02 12:52:00', '11:13:19', '12:52:00', 17, 2, '01:38:41', '1,64', 0, 'R$', '25,69', 1, 1245),
(225, 'finalizando post novembro azul', '2018-11-02 15:53:06', '2018-11-02 16:16:04', '15:53:06', '16:16:04', 17, 2, '00:22:58', '0,38', 0, 'R$', '5,98', 1, 1245),
(227, 'criando padroes pra apresentação', '2018-11-04 16:31:05', '2018-11-04 19:27:43', '16:31:05', '19:27:43', 17, 5, '02:56:38', '2,94', 0, 'R$', '45,98', 1, 1245),
(228, 'reunindo textos do aplicativo e formulando conteúdos pro site do app', '2018-11-04 21:57:26', '2018-11-04 23:54:48', '21:57:26', '23:54:48', 18, 3, '01:57:22', '1,96', 0, 'R$', '36,68', 1, 1246),
(229, 'configurando o hello bar', '2018-11-04 23:55:33', '2018-11-05 00:34:42', '23:55:33', '00:34:42', 18, 3, '00:39:09', '0,65', 0, 'R$', '12,23', 1, 1246),
(231, 'defini um novo formato pra logo, mais proximo do desenho original', '2018-11-05 11:59:16', '2018-11-05 14:09:02', '11:59:16', '14:09:02', 17, 5, '02:09:46', '2,16', 0, 'R$', '33,78', 1, 1245),
(232, 'logo asbene definindo coloração padrao', '2018-11-05 20:38:01', '2018-11-05 21:58:51', '20:38:01', '21:58:51', 17, 5, '01:20:50', '1,35', 0, 'R$', '21,04', 1, 1245),
(233, 'criando versoes diferentes da logo, logotipo modernista definido', '2018-11-06 09:48:28', '2018-11-06 12:37:48', '09:48:28', '12:37:48', 17, 5, '02:49:20', '2,82', 0, 'R$', '44,08', 1, 1245),
(234, 'finalizando detalhes da logo e criando apresentação', '2018-11-06 15:49:32', '2018-11-06 21:43:38', '15:49:32', '21:43:38', 17, 5, '05:54:06', '5,90', 0, 'R$', '92,18', 1, 1245),
(235, 'incorporando o google maps na página, gerando api de conexao com google', '2018-11-07 12:03:52', '2018-11-07 16:34:23', '12:03:52', '16:34:23', 18, 3, '04:30:31', '4,51', 0, 'R$', '84,54', 1, 1246),
(236, 'configurando apis e finalizanado a implementação dos scripts', '2018-11-08 13:28:13', '2018-11-08 16:56:29', '13:28:13', '16:56:29', 18, 3, '03:28:16', '3,47', 0, 'R$', '65,08', 1, 1246),
(237, 'black friday logo', '2018-11-09 14:12:40', '2018-11-09 14:58:26', '14:12:40', '14:58:26', 18, 2, '00:45:46', '0,76', 0, 'R$', '14,30', 1, 1246),
(238, 'alterando textos formulados a partir dos conteudos extraidos do proprio app', '2018-11-09 18:30:21', '2018-11-09 21:18:33', '18:30:21', '21:18:33', 18, 3, '02:48:12', '2,80', 0, 'R$', '52,56', 1, 1246),
(239, 'post instagram e display para black friday', '2018-11-12 12:57:00', '2018-11-12 14:37:03', '12:57:00', '14:37:03', 18, 2, '01:40:03', '1,67', 0, 'R$', '31,27', 1, 1246),
(240, 'fazendo pesquisa de referencias pro layout', '2018-11-12 20:46:36', '2018-11-12 21:59:25', '20:46:36', '21:59:25', 16, 3, '01:12:49', '1,21', 0, 'C$', '12,14', 0, 0),
(241, 'apresentação slide ASBENE', '2018-11-16 13:11:16', '2018-11-16 18:37:43', '13:11:16', '18:37:43', 17, 2, '05:26:27', '5,44', 0, 'R$', '84,99', 0, 0),
(242, 'estruturando layouts das paginas,', '2018-11-16 20:12:05', '2018-11-16 22:06:48', '20:12:05', '22:06:48', 17, 2, '01:54:43', '1,91', 0, 'R$', '29,86', 0, 0),
(243, 'finalizando layouts e estruturando paginação', '2018-11-17 09:23:58', '2018-11-17 14:04:52', '09:23:58', '14:04:52', 17, 2, '04:40:54', '4,68', 0, 'R$', '73,13', 0, 0),
(244, 'organizando páginas e finalizando apresentação', '2018-11-17 14:25:43', '2018-11-17 16:06:02', '14:25:43', '16:06:02', 17, 2, '01:40:19', '1,67', 0, 'R$', '26,12', 0, 0),
(245, 'ediçao do menu, refatorando codigo, ajuste no mapa, google requer cadastro com cartao, voltando as configuraçoes pro openstreet', '2018-11-20 12:59:44', '2018-11-20 16:10:23', '12:59:44', '16:10:23', 18, 3, '03:10:39', '3,18', 0, 'R$', '59,58', 0, 0),
(247, '', '2018-11-21 17:36:06', '2018-11-21 17:37:16', '17:36:06', '17:37:16', 15, 3, '00:01:10', '0,02', 0, 'R$', '0,30', 0, 0),
(248, 'novo rascunho de diagramaçao do topo, começando a estruturar o css', '2018-11-21 21:37:58', '2018-11-21 22:06:09', '21:37:58', '22:06:09', 16, 3, '00:28:11', '0,47', 0, 'C$', '4,70', 0, 0),
(249, 'estruturando tema osclass', '2018-11-23 09:34:51', '2018-11-23 11:42:59', '09:34:51', '11:42:59', 16, 3, '02:08:08', '2,14', 0, 'C$', '21,36', 0, 0),
(250, 'alterando rodape', '2018-11-23 12:41:28', '2018-11-23 14:23:42', '12:41:28', '14:23:42', 16, 3, '01:42:14', '1,70', 0, 'C$', '17,04', 0, 0),
(251, 'ajustes no openstreet map, editado e enviado o pedido de alteraçao do mapa', '2018-11-24 07:54:48', '2018-11-24 11:56:29', '07:54:48', '11:56:29', 18, 3, '04:01:41', '4,03', 0, 'R$', '75,53', 0, 0),
(252, 'implementaçao da api do google analytics', '2018-11-25 08:21:04', '2018-11-25 10:40:41', '08:21:04', '10:40:41', 18, 3, '02:19:37', '2,33', 0, 'R$', '43,63', 0, 0),
(253, 'estruturando animação do rodape', '2018-11-28 08:16:34', '2018-11-28 12:13:20', '08:16:34', '12:13:20', 16, 3, '03:56:46', '3,95', 0, 'C$', '39,46', 0, 0),
(254, 'Panfleto asbene, rascunho e estruturação', '2018-11-28 17:49:25', '2018-11-28 19:02:49', '17:49:25', '19:02:49', 17, 2, '01:13:24', '1,22', 0, 'R$', '19,11', 0, 0),
(255, 'panfleto asbene, criando fundo dos layouts', '2018-11-29 08:37:04', '2018-11-29 10:49:00', '08:37:04', '10:49:00', 17, 2, '02:11:56', '2,20', 0, 'R$', '34,35', 0, 0),
(256, 'panfleto asbene, diagramação frente do panfleto', '2018-11-29 13:10:20', '2018-11-29 17:23:21', '13:10:20', '17:23:21', 17, 2, '04:13:01', '4,22', 0, 'R$', '65,87', 0, 0),
(257, 'finalizando frente, diagramando verso', '2018-11-30 15:26:58', '2018-11-30 20:03:52', '15:26:58', '20:03:52', 17, 2, '04:36:54', '4,62', 0, 'R$', '72,09', 0, 0),
(258, 'inserindo as fotos e colocando sombra, finalizando diagramação da parte externa', '2018-12-01 09:38:17', '2018-12-01 11:01:49', '09:38:17', '11:01:49', 17, 2, '01:23:32', '1,39', 0, 'R$', '21,75', 0, 0),
(259, 'finalizando layout e fazendo mockup, fazendo apresentação...', '2018-12-01 14:58:43', '2018-12-01 18:06:02', '14:58:43', '18:06:02', 17, 2, '03:07:19', '3,12', 0, 'R$', '48,76', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `moedas`
--

CREATE TABLE `moedas` (
  `id_moeda` int(11) NOT NULL,
  `codigo` varchar(11) NOT NULL,
  `simbolo` varchar(11) NOT NULL,
  `descricao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `moedas`
--

INSERT INTO `moedas` (`id_moeda`, `codigo`, `simbolo`, `descricao`) VALUES
(2, 'CAD', 'C$', 'Dólar Canadense'),
(4, 'BRL', 'R$', 'Real Brasileiro');

-- --------------------------------------------------------

--
-- Estrutura para tabela `projetos`
--

CREATE TABLE `projetos` (
  `id_projeto` int(11) NOT NULL,
  `nome_projeto` varchar(25) NOT NULL,
  `descricao_projeto` varchar(75) DEFAULT NULL,
  `preco_projeto` decimal(8,2) DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `projetos`
--

INSERT INTO `projetos` (`id_projeto`, `nome_projeto`, `descricao_projeto`, `preco_projeto`, `cliente_id`) VALUES
(9, 'Loja 2A', 'E-Commerce de materiais Gráficos', '18.75', 40),
(15, 'Viasign', '', '15.62', 39),
(16, 'Byebye', 'www.byebye.ca', '10.00', 43),
(17, 'TH2', 'Bureau Gráfico', '15.62', 41),
(18, 'Fórmula Plus', 'Farmácia de Manipulação', '18.75', 42);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tarefas`
--

CREATE TABLE `tarefas` (
  `id_tarefa` int(11) NOT NULL,
  `nome_tarefa` varchar(50) NOT NULL,
  `descricao_tarefa` varchar(140) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `tarefas`
--

INSERT INTO `tarefas` (`id_tarefa`, `nome_tarefa`, `descricao_tarefa`) VALUES
(1, 'Desenvolvimento Web', 'Criação de Soluções Específicas'),
(2, 'Layouts', 'Criação de Arte Final'),
(3, 'Website', 'Criação de Página Web'),
(4, 'Atualização de Software', 'S-GPro v 2.0.1'),
(5, 'Branding', 'Criação de Logomarca & Identidade Visual'),
(6, 'Desenvolvimento Windows Apps', 'Desenvolvimento de aplicativo para windows');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `password_conf` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tipo` int(1) NOT NULL,
  `data_cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `alterado_em` datetime DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '''0''=>''Ativo'', ''1''=>''Inativo'''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`user_id`, `username`, `password`, `password_conf`, `email`, `tipo`, `data_cadastro`, `alterado_em`, `status`) VALUES
(1, 'rtannure', '1234', '1234', 'rtannure@hotmail.com', 1, '0000-00-00 00:00:00', '2018-12-28 13:59:19', 0),
(2, 'rog', 'jhmer123', 'jhmer123', '', 1, '2018-12-27 12:00:22', '2018-12-28 13:45:48', 1),
(6, 'codex', 'jhmer123', 'jhmer123', 'marcelomotta@outlook.com.br', 3, '2018-12-28 13:59:00', NULL, 0);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `fk_moeda` (`moeda_id`);

--
-- Índices de tabela `fatura`
--
ALTER TABLE `fatura`
  ADD PRIMARY KEY (`id_fatura`),
  ADD KEY `fk_clienteF` (`cliente_fatura`) USING BTREE;

--
-- Índices de tabela `itenspagamento`
--
ALTER TABLE `itenspagamento`
  ADD PRIMARY KEY (`id_pagamento`),
  ADD KEY `fk_idFatura` (`fatura_id`) USING BTREE;

--
-- Índices de tabela `itenstrabalho`
--
ALTER TABLE `itenstrabalho`
  ADD PRIMARY KEY (`id_trabalho`),
  ADD KEY `fk_projetos` (`projeto_id`),
  ADD KEY `fk_idItemFatura` (`fatura_id`),
  ADD KEY `fk_tarefas` (`tarefa_id`);

--
-- Índices de tabela `moedas`
--
ALTER TABLE `moedas`
  ADD PRIMARY KEY (`id_moeda`);

--
-- Índices de tabela `projetos`
--
ALTER TABLE `projetos`
  ADD PRIMARY KEY (`id_projeto`),
  ADD KEY `fk_clienteProj` (`cliente_id`);

--
-- Índices de tabela `tarefas`
--
ALTER TABLE `tarefas`
  ADD PRIMARY KEY (`id_tarefa`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de tabela `fatura`
--
ALTER TABLE `fatura`
  MODIFY `id_fatura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1247;

--
-- AUTO_INCREMENT de tabela `itenspagamento`
--
ALTER TABLE `itenspagamento`
  MODIFY `id_pagamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `itenstrabalho`
--
ALTER TABLE `itenstrabalho`
  MODIFY `id_trabalho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=260;

--
-- AUTO_INCREMENT de tabela `moedas`
--
ALTER TABLE `moedas`
  MODIFY `id_moeda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `projetos`
--
ALTER TABLE `projetos`
  MODIFY `id_projeto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `tarefas`
--
ALTER TABLE `tarefas`
  MODIFY `id_tarefa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `cs_fk_moeda` FOREIGN KEY (`moeda_id`) REFERENCES `moedas` (`id_moeda`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Restrições para tabelas `fatura`
--
ALTER TABLE `fatura`
  ADD CONSTRAINT `cfk_clienteF` FOREIGN KEY (`cliente_fatura`) REFERENCES `clientes` (`id_cliente`);

--
-- Restrições para tabelas `itenspagamento`
--
ALTER TABLE `itenspagamento`
  ADD CONSTRAINT `cs_fk_idFatura` FOREIGN KEY (`fatura_id`) REFERENCES `fatura` (`id_fatura`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `itenstrabalho`
--
ALTER TABLE `itenstrabalho`
  ADD CONSTRAINT `cfk_projetos` FOREIGN KEY (`projeto_id`) REFERENCES `projetos` (`id_projeto`),
  ADD CONSTRAINT `cfk_tarefas` FOREIGN KEY (`tarefa_id`) REFERENCES `tarefas` (`id_tarefa`);

--
-- Restrições para tabelas `projetos`
--
ALTER TABLE `projetos`
  ADD CONSTRAINT `cfk_clienteProj` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
