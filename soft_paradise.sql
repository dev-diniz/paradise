-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 26-Set-2023 às 13:32
-- Versão do servidor: 10.3.38-MariaDB-0ubuntu0.20.04.1
-- versão do PHP: 8.0.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `soft_paradise`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_carrinho`
--

CREATE TABLE `tb_carrinho` (
  `cd_carrinho` int(11) NOT NULL,
  `st_carrinho` char(1) NOT NULL,
  `dt_registro_carrinho` datetime NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `nr_ip` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



--
-- Estrutura da tabela `tb_categoria`
--

CREATE TABLE `tb_categoria` (
  `cd_categoria` int(11) NOT NULL,
  `nm_categoria` varchar(45) NOT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `dt_registro_categoria` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_categoria`
--

INSERT INTO `tb_categoria` (`cd_categoria`, `nm_categoria`, `id_categoria`, `id_usuario`, `dt_registro_categoria`) VALUES
(2, 'Corda', NULL, 1, '2023-08-08 15:06:05'),
(3, 'Guitarra', 2, 1, '2023-08-08 15:06:17'),
(4, 'Guitarras elétricas', 3, 1, '2023-08-09 13:34:52'),
(8, 'Elba Ramalho', NULL, 1, '2023-08-18 15:04:35'),
(10, 'violãozinho', 2, 1, '2023-09-22 17:07:40');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_endereco_usuario`
--

CREATE TABLE `tb_endereco_usuario` (
  `cd_endereco_usuario` int(11) NOT NULL,
  `nm_tipo_logradouro` varchar(20) NOT NULL,
  `nm_logradouro` varchar(60) NOT NULL,
  `nr_logradouro` varchar(20) NOT NULL,
  `nm_complemento` varchar(50) DEFAULT NULL,
  `cd_postal` varchar(9) NOT NULL,
  `nm_bairro` varchar(50) NOT NULL,
  `nm_cidade` varchar(60) NOT NULL,
  `nm_estado` varchar(60) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `ds_ponto_referencia` longtext DEFAULT NULL,
  `st_endereco` char(1) NOT NULL,
  `dt_registro_endereco` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Estrutura da tabela `tb_forma_pagamento`
--

CREATE TABLE `tb_forma_pagamento` (
  `cd_forma_pagamento` int(11) NOT NULL,
  `nm_forma_pagamento` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_imagem_produto`
--

CREATE TABLE `tb_imagem_produto` (
  `cd_imagem_produto` int(11) NOT NULL,
  `url_produto` varchar(150) NOT NULL,
  `dt_registro_imagem` datetime NOT NULL DEFAULT current_timestamp(),
  `id_produto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_imagem_produto`
--

INSERT INTO `tb_imagem_produto` (`cd_imagem_produto`, `url_produto`, `dt_registro_imagem`, `id_produto`) VALUES
(46, '42cd7385429692672d6d17bfb60bf562.jpg', '2023-09-26 13:06:10', 23);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_item_carrinho`
--

CREATE TABLE `tb_item_carrinho` (
  `cd_item_carrinho` int(11) NOT NULL,
  `qt_produto` int(11) NOT NULL,
  `dt_registro_item` datetime NOT NULL,
  `id_carrinho` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_marca`
--

CREATE TABLE `tb_marca` (
  `cd_marca` int(11) NOT NULL,
  `nm_marca` varchar(60) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `dt_registro_marca` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_marca`
--

INSERT INTO `tb_marca` (`cd_marca`, `nm_marca`, `id_usuario`, `dt_registro_marca`) VALUES
(1, 'GuitarHero', 1, '2023-08-08 15:05:27'),
(2, 'Violãocello', 1, '2023-08-09 13:34:56'),
(3, 'Leviatos', 1, '2023-09-23 14:40:15');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pagamento`
--

CREATE TABLE `tb_pagamento` (
  `cd_pagamento` int(11) NOT NULL,
  `vl_pagamento` decimal(10,2) DEFAULT NULL,
  `id_carrinho` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_forma_pagamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produto`
--

CREATE TABLE `tb_produto` (
  `cd_produto` int(11) NOT NULL,
  `nm_produto` varchar(120) NOT NULL,
  `vl_produto` decimal(10,2) DEFAULT NULL,
  `st_produto` char(1) NOT NULL,
  `nm_tag_pesquisa` varchar(100) NOT NULL,
  `ds_produto` longtext NOT NULL,
  `dt_registro_produto` datetime NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_marca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_produto`
--

INSERT INTO `tb_produto` (`cd_produto`, `nm_produto`, `vl_produto`, `st_produto`, `nm_tag_pesquisa`, `ds_produto`, `dt_registro_produto`, `id_categoria`, `id_usuario`, `id_marca`) VALUES
(23, 'Cavaquingo v5', '150.00', '1', 'vioão pequeno, cavaquinnho, violãozinho', 'Cavaquinho pequeno 50 cavalos', '2023-09-26 13:05:37', 10, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_telefone_usuario`
--

CREATE TABLE `tb_telefone_usuario` (
  `cd_telefone_usuario` int(11) NOT NULL,
  `cd_ddd` int(3) NOT NULL,
  `nr_telefone` varchar(12) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipo_usuario`
--

CREATE TABLE `tb_tipo_usuario` (
  `cd_tipo_usuario` int(11) NOT NULL,
  `nm_tipo_usuario` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_tipo_usuario`
--

INSERT INTO `tb_tipo_usuario` (`cd_tipo_usuario`, `nm_tipo_usuario`) VALUES
(1, 'Admin'),
(4, 'Cliente'),
(2, 'Gerente'),
(3, 'Vendedor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `cd_usuario` int(11) NOT NULL,
  `nm_usuario` varchar(60) NOT NULL,
  `nm_sobrenome_usuario` varchar(60) DEFAULT NULL,
  `dt_nascimento` date DEFAULT NULL,
  `nm_email` varchar(60) NOT NULL,
  `cd_cpf_cnpj` varchar(14) NOT NULL,
  `st_usuario` char(1) NOT NULL DEFAULT '1',
  `cd_senha` varchar(50) NOT NULL,
  `id_tipo_usuario` int(11) NOT NULL,
  `dt_registro_usuario` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`cd_usuario`, `nm_usuario`, `nm_sobrenome_usuario`, `dt_nascimento`, `nm_email`, `cd_cpf_cnpj`, `st_usuario`, `cd_senha`, `id_tipo_usuario`, `dt_registro_usuario`) VALUES
(1, 'Gustavo', 'O', '2003-04-21', 'Diniz45@gmail.com', '685.465.132-13', '1', '81dc9bdb52d04dc20036dbd8313ed055', 1, '2023-08-08 15:04:16');
-- senha: 1234

-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_carrinho`
--
ALTER TABLE `tb_carrinho`
  ADD PRIMARY KEY (`cd_carrinho`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `tb_categoria`
--
ALTER TABLE `tb_categoria`
  ADD PRIMARY KEY (`cd_categoria`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `FK_categoria` (`id_categoria`);

--
-- Índices para tabela `tb_endereco_usuario`
--
ALTER TABLE `tb_endereco_usuario`
  ADD PRIMARY KEY (`cd_endereco_usuario`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `tb_forma_pagamento`
--
ALTER TABLE `tb_forma_pagamento`
  ADD PRIMARY KEY (`cd_forma_pagamento`);

--
-- Índices para tabela `tb_imagem_produto`
--
ALTER TABLE `tb_imagem_produto`
  ADD PRIMARY KEY (`cd_imagem_produto`),
  ADD KEY `id_produto` (`id_produto`);

--
-- Índices para tabela `tb_item_carrinho`
--
ALTER TABLE `tb_item_carrinho`
  ADD PRIMARY KEY (`cd_item_carrinho`),
  ADD KEY `id_carrinho` (`id_carrinho`),
  ADD KEY `id_produto` (`id_produto`);

--
-- Índices para tabela `tb_marca`
--
ALTER TABLE `tb_marca`
  ADD PRIMARY KEY (`cd_marca`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `tb_pagamento`
--
ALTER TABLE `tb_pagamento`
  ADD PRIMARY KEY (`cd_pagamento`),
  ADD KEY `id_carrinho` (`id_carrinho`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_forma_pagamento` (`id_forma_pagamento`);

--
-- Índices para tabela `tb_produto`
--
ALTER TABLE `tb_produto`
  ADD PRIMARY KEY (`cd_produto`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_marca` (`id_marca`);

--
-- Índices para tabela `tb_telefone_usuario`
--
ALTER TABLE `tb_telefone_usuario`
  ADD PRIMARY KEY (`cd_telefone_usuario`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `tb_tipo_usuario`
--
ALTER TABLE `tb_tipo_usuario`
  ADD PRIMARY KEY (`cd_tipo_usuario`),
  ADD UNIQUE KEY `tipo_usuario_unico` (`nm_tipo_usuario`);

--
-- Índices para tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`cd_usuario`),
  ADD UNIQUE KEY `email_usuario_unico` (`nm_email`),
  ADD KEY `id_tipo_usuario` (`id_tipo_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_carrinho`
--
ALTER TABLE `tb_carrinho`
  MODIFY `cd_carrinho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tb_categoria`
--
ALTER TABLE `tb_categoria`
  MODIFY `cd_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `tb_endereco_usuario`
--
ALTER TABLE `tb_endereco_usuario`
  MODIFY `cd_endereco_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_forma_pagamento`
--
ALTER TABLE `tb_forma_pagamento`
  MODIFY `cd_forma_pagamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_imagem_produto`
--
ALTER TABLE `tb_imagem_produto`
  MODIFY `cd_imagem_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de tabela `tb_item_carrinho`
--
ALTER TABLE `tb_item_carrinho`
  MODIFY `cd_item_carrinho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT de tabela `tb_marca`
--
ALTER TABLE `tb_marca`
  MODIFY `cd_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_pagamento`
--
ALTER TABLE `tb_pagamento`
  MODIFY `cd_pagamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_produto`
--
ALTER TABLE `tb_produto`
  MODIFY `cd_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `tb_telefone_usuario`
--
ALTER TABLE `tb_telefone_usuario`
  MODIFY `cd_telefone_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_tipo_usuario`
--
ALTER TABLE `tb_tipo_usuario`
  MODIFY `cd_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `cd_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_carrinho`
--
ALTER TABLE `tb_carrinho`
  ADD CONSTRAINT `tb_carrinho_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuario` (`cd_usuario`);

--
-- Limitadores para a tabela `tb_categoria`
--
ALTER TABLE `tb_categoria`
  ADD CONSTRAINT `FK_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `tb_categoria` (`cd_categoria`),
  ADD CONSTRAINT `tb_categoria_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuario` (`cd_usuario`);

--
-- Limitadores para a tabela `tb_endereco_usuario`
--
ALTER TABLE `tb_endereco_usuario`
  ADD CONSTRAINT `tb_endereco_usuario_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuario` (`cd_usuario`);

--
-- Limitadores para a tabela `tb_imagem_produto`
--
ALTER TABLE `tb_imagem_produto`
  ADD CONSTRAINT `tb_imagem_produto_ibfk_1` FOREIGN KEY (`id_produto`) REFERENCES `tb_produto` (`cd_produto`);

--
-- Limitadores para a tabela `tb_item_carrinho`
--
ALTER TABLE `tb_item_carrinho`
  ADD CONSTRAINT `tb_item_carrinho_ibfk_1` FOREIGN KEY (`id_carrinho`) REFERENCES `tb_carrinho` (`cd_carrinho`),
  ADD CONSTRAINT `tb_item_carrinho_ibfk_2` FOREIGN KEY (`id_produto`) REFERENCES `tb_produto` (`cd_produto`);

--
-- Limitadores para a tabela `tb_marca`
--
ALTER TABLE `tb_marca`
  ADD CONSTRAINT `tb_marca_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuario` (`cd_usuario`);

--
-- Limitadores para a tabela `tb_pagamento`
--
ALTER TABLE `tb_pagamento`
  ADD CONSTRAINT `tb_pagamento_ibfk_1` FOREIGN KEY (`id_carrinho`) REFERENCES `tb_carrinho` (`cd_carrinho`),
  ADD CONSTRAINT `tb_pagamento_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuario` (`cd_usuario`),
  ADD CONSTRAINT `tb_pagamento_ibfk_3` FOREIGN KEY (`id_forma_pagamento`) REFERENCES `tb_forma_pagamento` (`cd_forma_pagamento`);

--
-- Limitadores para a tabela `tb_produto`
--
ALTER TABLE `tb_produto`
  ADD CONSTRAINT `tb_produto_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `tb_categoria` (`cd_categoria`),
  ADD CONSTRAINT `tb_produto_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuario` (`cd_usuario`),
  ADD CONSTRAINT `tb_produto_ibfk_3` FOREIGN KEY (`id_marca`) REFERENCES `tb_marca` (`cd_marca`);

--
-- Limitadores para a tabela `tb_telefone_usuario`
--
ALTER TABLE `tb_telefone_usuario`
  ADD CONSTRAINT `tb_telefone_usuario_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuario` (`cd_usuario`);

--
-- Limitadores para a tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD CONSTRAINT `tb_usuario_ibfk_1` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tb_tipo_usuario` (`cd_tipo_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;